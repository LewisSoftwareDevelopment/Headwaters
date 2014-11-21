<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/Banker_Productivity_variables.php");

if(!isLogged())
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(CheckPermissionsEvent($strTableName, 'P') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Export"))
{
	echo "<p>"."You don't have permissions to access this table"."<a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}

$layout = new TLayout("export","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["top"] = array();
$layout->containers["export"] = array();

$layout->containers["export"][] = array("name"=>"exportheader","block"=>"","substyle"=>2);


$layout->containers["export"][] = array("name"=>"exprange_header","block"=>"rangeheader_block","substyle"=>3);


$layout->containers["export"][] = array("name"=>"exprange","block"=>"range_block","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expoutput_header","block"=>"","substyle"=>3);


$layout->containers["export"][] = array("name"=>"expoutput","block"=>"","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expbuttons","block"=>"","substyle"=>2);


$layout->skins["export"] = "fields";
$layout->blocks["top"][] = "export";$page_layouts["Banker_Productivity_export"] = $layout;


// Modify query: remove blob fields from fieldlist.
// Blob fields on an export page are shown using imager.php (for example).
// They don't need to be selected from DB in export.php itself.
//$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());

$cipherer = new RunnerCipherer($strTableName);

$strWhereClause = "";
$strHavingClause = "";
$strSearchCriteria = "and";
$selected_recs = array();
$options = "1";

header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 
include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;

$phpVersion = (int)substr(phpversion(), 0, 1); 
if($phpVersion > 4)
{
	include("include/export_functions.php");
	$xt->assign("groupExcel", true);
}
else
	$xt->assign("excel", true);

//array of params for classes
$params = array("pageType" => PAGE_EXPORT, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
if(!$eventObj->exists("ListGetRowCount") && !$eventObj->exists("ListQuery"))
	$params["needSearchClauseObj"] = false;
$pageObject = new RunnerPage($params);

//	Before Process event
if($eventObj->exists("BeforeProcessExport"))
	$eventObj->BeforeProcessExport($conn, $pageObject);

if (@$_REQUEST["a"]!="")
{
	$options = "";
	$sWhere = "1=0";	

//	process selection
	$selected_recs = array();
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$selected_recs[] = $keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<0)
				continue;
			$keys = array();
			$selected_recs[] = $keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}


	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
	
	$_SESSION[$strTableName."_SelectedSQL"] = $strSQL;
	$_SESSION[$strTableName."_SelectedWhere"] = $sWhere;
	$_SESSION[$strTableName."_SelectedRecords"] = $selected_recs;
}

if ($_SESSION[$strTableName."_SelectedSQL"]!="" && @$_REQUEST["records"]=="") 
{
	$strSQL = $_SESSION[$strTableName."_SelectedSQL"];
	$strWhereClause = @$_SESSION[$strTableName."_SelectedWhere"];
	$selected_recs = $_SESSION[$strTableName."_SelectedRecords"];
}
else
{
	$strWhereClause = @$_SESSION[$strTableName."_where"];
	$strHavingClause = @$_SESSION[$strTableName."_having"];
	$strSearchCriteria = @$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}

$mypage = 1;
if(@$_REQUEST["type"])
{
//	order by
	$strOrderBy = $_SESSION[$strTableName."_order"];
	if(!$strOrderBy)
		$strOrderBy = $gstrOrderBy;
	$strSQL.=" ".trim($strOrderBy);

	$strSQLbak = $strSQL;
	if($eventObj->exists("BeforeQueryExport"))
		$eventObj->BeforeQueryExport($strSQL,$strWhereClause,$strOrderBy, $pageObject);
//	Rebuild SQL if needed
	if($strSQL!=$strSQLbak)
	{
//	changed $strSQL - old style	
		$numrows=GetRowCount($strSQL);
	}
	else
	{
		$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
		$strSQL.=" ".trim($strOrderBy);
		$rowcount=false;
		if($eventObj->exists("ListGetRowCount"))
		{
			$masterKeysReq=array();
			for($i = 0; $i < count($pageObject->detailKeysByM); $i ++)
				$masterKeysReq[] = $_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount = $eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
		}
		if($rowcount !== false)
			$numrows = $rowcount;
		else
			$numrows = $gQuery->gSQLRowCount($strWhereClause,$strHavingClause,$strSearchCriteria);
	}
	LogInfo($strSQL);

//	 Pagination:

	$nPageSize = 0;
	if(@$_REQUEST["records"]=="page" && $numrows)
	{
		$mypage = (integer)@$_SESSION[$strTableName."_pagenumber"];
		$nPageSize = (integer)@$_SESSION[$strTableName."_pagesize"];
		
		if(!$nPageSize)
			$nPageSize = $gSettings->getInitialPageSize();
				
		if($nPageSize<0)
			$nPageSize = 0;
			
		if($nPageSize>0)
		{
			if($numrows<=($mypage-1)*$nPageSize)
				$mypage = ceil($numrows/$nPageSize);
		
			if(!$mypage)
				$mypage = 1;
			
					$strSQL.=" limit ".(($mypage-1)*$nPageSize).",".$nPageSize;
		}
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
	{
		$arrFieldForSort = array();
		$arrHowFieldSort = array();
		require_once getabspath('classes/orderclause.php');
		$fieldList = unserialize($_SESSION[$strTableName."_orderFieldsList"]);
		for($i = 0; $i < count($fieldList); $i++)
		{
			$arrFieldForSort[] = $fieldList[$i]->fieldIndex; 
			$arrHowFieldSort[] = $fieldList[$i]->orderDirection; 
		}
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $nPageSize, $mypage, $pageObject);
	}
	if($listarray!==false)
		$rs = $listarray;
	elseif($nPageSize>0)
	{
					$rs = db_query($strSQL,$conn);
	}
	else
		$rs = db_query($strSQL,$conn);

	if(!ini_get("safe_mode"))
		set_time_limit(300);
	
	if(substr(@$_REQUEST["type"],0,5)=="excel")
	{
//	remove grouping
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SMONGROUPING"]="0";
				if($phpVersion > 4)
			ExportToExcel($cipherer, $pageObject);
		else
			ExportToExcel_old($cipherer);
	}
	else if(@$_REQUEST["type"]=="word")
	{
		ExportToWord($cipherer);
	}
	else if(@$_REQUEST["type"]=="xml")
	{
		ExportToXML($cipherer);
	}
	else if(@$_REQUEST["type"]=="csv")
	{
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SDECIMAL"]=".";
		$locale_info["LOCALE_SMONGROUPING"]="0";
		$locale_info["LOCALE_SMONDECIMALSEP"]=".";
		ExportToCSV($cipherer);
	}
	db_close($conn);
	return;
}

// add button events if exist
$pageObject->addButtonHandlers();

if($options)
{
	$xt->assign("rangeheader_block",true);
	$xt->assign("range_block",true);
}

$xt->assign("exportlink_attrs", 'id="saveButton'.$pageObject->id.'"');

$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";

$pageObject->fillSetCntrlMaps();
$pageObject->body['end'] .= '<script>';
$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
$pageObject->body['end'] .= "window.viewControlsMap = ".my_json_encode($pageObject->viewControlsHTMLMap).";";
$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
$pageObject->body['end'] .= '</script>';
$pageObject->body["end"] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
$pageObject->addCommonJs();

$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Banker_Productivity_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Banker_Productivity.xls");

	echo "<html>";
	echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToWord($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=Banker_Productivity.doc");

	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToXML($cipherer)
{
	global $nPageSize,$rs,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: text/xml");
	header("Content-Disposition: attachment;Filename=Banker_Productivity.xml");
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);	
	//if(!$row)
	//	return;
		
	global $cCharset;
	
	echo "<?xml version=\"1.0\" encoding=\"".$cCharset."\" standalone=\"yes\"?>\r\n";
	echo "<table>\r\n";
	$i = 0;
	$pageObject->viewControls->forExport = "xml";
	while((!$nPageSize || $i<$nPageSize) && $row)
	{
		$values = array();
			$values["num"] = $pageObject->showDBValue("num", $row);
			$values["ID"] = $pageObject->showDBValue("ID", $row);
			$values["Name"] = $pageObject->showDBValue("Name", $row);
			$values["Budget Year"] = $pageObject->showDBValue("Budget Year", $row);
			$values["Start Date"] = $pageObject->showDBValue("Start Date", $row);
			$values["YTD"] = $pageObject->showDBValue("YTD", $row);
			$values["y2"] = $pageObject->showDBValue("y2", $row);
			$values["y3"] = $pageObject->showDBValue("y3", $row);
			$values["Last Year Rank"] = $pageObject->showDBValue("Last Year Rank", $row);
			$values["YTD+y2"] = $pageObject->showDBValue("YTD+y2", $row);
			$values["YTD+y2=y3"] = $pageObject->showDBValue("YTD+y2=y3", $row);
			$values["Closed"] = $pageObject->showDBValue("Closed", $row);
			$values["IBC"] = $pageObject->showDBValue("IBC", $row);
			$values["YTD Count"] = $pageObject->showDBValue("YTD Count", $row);
			$values["YTD Engagments"] = $pageObject->showDBValue("YTD Engagments", $row);
			$values["Total Count"] = $pageObject->showDBValue("Total Count", $row);
			$values["Total Engagements"] = $pageObject->showDBValue("Total Engagements", $row);
			$values["Wheelhouse"] = $pageObject->showDBValue("Wheelhouse", $row);
			$values["Speculative"] = $pageObject->showDBValue("Speculative", $row);
			$values["Minimum"] = $pageObject->showDBValue("Minimum", $row);
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		
		if ($eventRes)
		{
			$i++;
			echo "<row>\r\n";
			foreach ($values as $fName => $val)
			{
				$field = htmlspecialchars(XMLNameEncode($fName));
				echo "<".$field.">";
				echo $values[$fName];
				echo "</".$field.">\r\n";
			}
			echo "</row>\r\n";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	echo "</table>\r\n";
}

function ExportToCSV($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: application/csv");
	header("Content-Disposition: attachment;Filename=Banker_Productivity.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"num\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ID\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Name\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Budget Year\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Start Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"y2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"y3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Last Year Rank\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD+y2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD+y2=y3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Closed\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD Count\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD Engagments\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Total Count\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Total Engagements\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Wheelhouse\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Speculative\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Minimum\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["num"] = $pageObject->getViewControl("num")->showDBValue($row, "");
			$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
			$values["Name"] = $pageObject->getViewControl("Name")->showDBValue($row, "");
			$values["Budget Year"] = $pageObject->getViewControl("Budget Year")->showDBValue($row, "");
			$values["Start Date"] = $pageObject->getViewControl("Start Date")->showDBValue($row, "");
			$values["YTD"] = $pageObject->getViewControl("YTD")->showDBValue($row, "");
			$values["y2"] = $pageObject->getViewControl("y2")->showDBValue($row, "");
			$values["y3"] = $pageObject->getViewControl("y3")->showDBValue($row, "");
			$values["Last Year Rank"] = $pageObject->getViewControl("Last Year Rank")->showDBValue($row, "");
			$values["YTD+y2"] = $pageObject->getViewControl("YTD+y2")->showDBValue($row, "");
			$values["YTD+y2=y3"] = $pageObject->getViewControl("YTD+y2=y3")->showDBValue($row, "");
			$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
			$values["IBC"] = $pageObject->getViewControl("IBC")->showDBValue($row, "");
			$values["YTD Count"] = $pageObject->getViewControl("YTD Count")->showDBValue($row, "");
			$values["YTD Engagments"] = $pageObject->getViewControl("YTD Engagments")->showDBValue($row, "");
			$values["Total Count"] = $pageObject->getViewControl("Total Count")->showDBValue($row, "");
			$values["Total Engagements"] = $pageObject->getViewControl("Total Engagements")->showDBValue($row, "");
			$values["Wheelhouse"] = $pageObject->getViewControl("Wheelhouse")->showDBValue($row, "");
			$values["Speculative"] = $pageObject->getViewControl("Speculative")->showDBValue($row, "");
			$values["Minimum"] = $pageObject->getViewControl("Minimum")->showDBValue($row, "");

		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row,$values, $pageObject);
		}
		if ($eventRes)
		{
			$outstr="";
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["num"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ID"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Name"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Budget Year"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Start Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["y2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["y3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Last Year Rank"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD+y2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD+y2=y3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Closed"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD Count"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD Engagments"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Total Count"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Total Engagements"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Wheelhouse"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Speculative"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Minimum"]).'"';
			echo $outstr;
		}
		
		$iNumberOfRows++;
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
			
		if(((!$nPageSize || $iNumberOfRows<$nPageSize) && $row) && $eventRes)
			echo "\r\n";
	}
}

function WriteTableData($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);
//	if(!$row)
//		return;
// write header
	echo "<tr>";
	if($_REQUEST["type"]=="excel")
	{
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Num").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ID").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Budget Year").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Start Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Y2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Y3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Last Year Rank").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD+y2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD+y2=y3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closed").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD Count").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD Engagments").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total Count").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total Engagements").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wheelhouse").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Speculative").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Minimum").'</td>';	
	}
	else
	{
		echo "<td>"."Num"."</td>";
		echo "<td>"."ID"."</td>";
		echo "<td>"."Name"."</td>";
		echo "<td>"."Budget Year"."</td>";
		echo "<td>"."Start Date"."</td>";
		echo "<td>"."YTD"."</td>";
		echo "<td>"."Y2"."</td>";
		echo "<td>"."Y3"."</td>";
		echo "<td>"."Last Year Rank"."</td>";
		echo "<td>"."YTD+y2"."</td>";
		echo "<td>"."YTD+y2=y3"."</td>";
		echo "<td>"."Closed"."</td>";
		echo "<td>"."IBC"."</td>";
		echo "<td>"."YTD Count"."</td>";
		echo "<td>"."YTD Engagments"."</td>";
		echo "<td>"."Total Count"."</td>";
		echo "<td>"."Total Engagements"."</td>";
		echo "<td>"."Wheelhouse"."</td>";
		echo "<td>"."Speculative"."</td>";
		echo "<td>"."Minimum"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["num"] = $pageObject->getViewControl("num")->showDBValue($row, "");
					$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
					$values["Name"] = $pageObject->getViewControl("Name")->showDBValue($row, "");
					$values["Budget Year"] = $pageObject->getViewControl("Budget Year")->showDBValue($row, "");
					$values["Start Date"] = $pageObject->getViewControl("Start Date")->showDBValue($row, "");
					$values["YTD"] = $pageObject->getViewControl("YTD")->showDBValue($row, "");
					$values["y2"] = $pageObject->getViewControl("y2")->showDBValue($row, "");
					$values["y3"] = $pageObject->getViewControl("y3")->showDBValue($row, "");
					$values["Last Year Rank"] = $pageObject->getViewControl("Last Year Rank")->showDBValue($row, "");
					$values["YTD+y2"] = $pageObject->getViewControl("YTD+y2")->showDBValue($row, "");
					$values["YTD+y2=y3"] = $pageObject->getViewControl("YTD+y2=y3")->showDBValue($row, "");
					$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
					$values["IBC"] = $pageObject->getViewControl("IBC")->showDBValue($row, "");
					$values["YTD Count"] = $pageObject->getViewControl("YTD Count")->showDBValue($row, "");
					$values["YTD Engagments"] = $pageObject->getViewControl("YTD Engagments")->showDBValue($row, "");
					$values["Total Count"] = $pageObject->getViewControl("Total Count")->showDBValue($row, "");
					$values["Total Engagements"] = $pageObject->getViewControl("Total Engagements")->showDBValue($row, "");
					$values["Wheelhouse"] = $pageObject->getViewControl("Wheelhouse")->showDBValue($row, "");
					$values["Speculative"] = $pageObject->getViewControl("Speculative")->showDBValue($row, "");
					$values["Minimum"] = $pageObject->getViewControl("Minimum")->showDBValue($row, "");
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";
		
							echo '<td>';
			
									echo $values["num"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ID"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Name"]);
					else
						echo $values["Name"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Budget Year"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Start Date"]);
					else
						echo $values["Start Date"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["y2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["y3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Last Year Rank"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD+y2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD+y2=y3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Closed"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD Count"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["YTD Engagments"]);
					else
						echo $values["YTD Engagments"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Total Count"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Total Engagements"]);
					else
						echo $values["Total Engagements"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Wheelhouse"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Speculative"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Minimum"];
			echo '</td>';
			echo "</tr>";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	
}

function XMLNameEncode($strValue)
{
	$search = array(" ","#","'","/","\\","(",")",",","[");
	$ret = str_replace($search,"",$strValue);
	$search = array("]","+","\"","-","_","|","}","{","=");
	$ret = str_replace($search,"",$ret);
	return $ret;
}

function PrepareForExcel($ret)
{
	//$ret = htmlspecialchars($str); commented for bug #6823
	if (substr($ret,0,1)== "=") 
		$ret = "&#61;".substr($ret,1);
	return $ret;

}

function countTotals(&$totals, $totalsFields, $data)
{
	for($i = 0; $i < count($totalsFields); $i ++) 
	{
		if($totalsFields[$i]['totalsType'] == 'COUNT') 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]!= "");
		else if($totalsFields[$i]['viewFormat'] == "Time") 
		{
			$time = GetTotalsForTime($data[$totalsFields[$i]['fName']]);
			$totals[$totalsFields[$i]['fName']]["value"] += $time[2]+$time[1]*60 + $time[0]*3600;
		} 
		else 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]+ 0);
		
		if($totalsFields[$i]['totalsType'] == 'AVERAGE')
		{
			if(!is_null($data[$totalsFields[$i]['fName']]) && $data[$totalsFields[$i]['fName']]!=="")
				$totals[$totalsFields[$i]['fName']]['numRows']++;
		}
	}
}
?>
