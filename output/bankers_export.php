<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/bankers_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["bankers_export"] = $layout;


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
			$keys["ID"] = refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[] = $keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys = array();
			$keys["ID"] = urldecode($arr[0]);
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

$xt->display("bankers_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=bankers.xls");

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
	header("Content-Disposition: attachment;Filename=bankers.doc");

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
	header("Content-Disposition: attachment;Filename=bankers.xml");
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
			$values["First Name"] = $pageObject->showDBValue("First Name", $row);
			$values["YTD+Last"] = $pageObject->showDBValue("YTD+Last", $row);
			$values["Last Name"] = $pageObject->showDBValue("Last Name", $row);
			$values["Active"] = $pageObject->showDBValue("Active", $row);
			$values["Name"] = $pageObject->showDBValue("Name", $row);
			$values["Budget Year"] = $pageObject->showDBValue("Budget Year", $row);
			$values["Start Date"] = $pageObject->showDBValue("Start Date", $row);
			$values["YTD Revenue"] = $pageObject->showDBValue("YTD Revenue", $row);
			$values["Last Year Rev"] = $pageObject->showDBValue("Last Year Rev", $row);
			$values["Prior Year Rev"] = $pageObject->showDBValue("Prior Year Rev", $row);
			$values["Last Year Rank"] = $pageObject->showDBValue("Last Year Rank", $row);
			$values["YTD Closing"] = $pageObject->showDBValue("YTD Closing", $row);
			$values["Last Year Closing"] = $pageObject->showDBValue("Last Year Closing", $row);
			$values["YTD IBC"] = $pageObject->showDBValue("YTD IBC", $row);
			$values["YTD Engagements"] = $pageObject->showDBValue("YTD Engagements", $row);
			$values["Total Current Engagments"] = $pageObject->showDBValue("Total Current Engagments", $row);
			$values["# Wheelhouse"] = $pageObject->showDBValue("# Wheelhouse", $row);
			$values["# Speculative"] = $pageObject->showDBValue("# Speculative", $row);
			$values["# Minimum"] = $pageObject->showDBValue("# Minimum", $row);
			$values["ID"] = $pageObject->showDBValue("ID", $row);
		
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
	header("Content-Disposition: attachment;Filename=bankers.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"First Name\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD+Last\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Last Name\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Active\"";
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
	$outstr.= "\"YTD Revenue\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Last Year Rev\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Prior Year Rev\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Last Year Rank\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD Closing\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Last Year Closing\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD IBC\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTD Engagements\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Total Current Engagments\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"# Wheelhouse\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"# Speculative\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"# Minimum\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ID\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["First Name"] = $pageObject->getViewControl("First Name")->showDBValue($row, "");
			$values["YTD+Last"] = $pageObject->getViewControl("YTD+Last")->showDBValue($row, "");
			$values["Last Name"] = $pageObject->getViewControl("Last Name")->showDBValue($row, "");
			$values["Active"] = $pageObject->getViewControl("Active")->showDBValue($row, "");
			$values["Name"] = $pageObject->getViewControl("Name")->showDBValue($row, "");
			$values["Budget Year"] = $pageObject->getViewControl("Budget Year")->showDBValue($row, "");
			$values["Start Date"] = $pageObject->getViewControl("Start Date")->showDBValue($row, "");
			$values["YTD Revenue"] = $pageObject->getViewControl("YTD Revenue")->showDBValue($row, "");
			$values["Last Year Rev"] = $pageObject->getViewControl("Last Year Rev")->showDBValue($row, "");
			$values["Prior Year Rev"] = $pageObject->getViewControl("Prior Year Rev")->showDBValue($row, "");
			$values["Last Year Rank"] = $pageObject->getViewControl("Last Year Rank")->showDBValue($row, "");
			$values["YTD Closing"] = $pageObject->getViewControl("YTD Closing")->showDBValue($row, "");
			$values["Last Year Closing"] = $pageObject->getViewControl("Last Year Closing")->showDBValue($row, "");
			$values["YTD IBC"] = $pageObject->getViewControl("YTD IBC")->showDBValue($row, "");
			$values["YTD Engagements"] = $pageObject->getViewControl("YTD Engagements")->showDBValue($row, "");
			$values["Total Current Engagments"] = $pageObject->getViewControl("Total Current Engagments")->showDBValue($row, "");
			$values["# Wheelhouse"] = $pageObject->getViewControl("# Wheelhouse")->showDBValue($row, "");
			$values["# Speculative"] = $pageObject->getViewControl("# Speculative")->showDBValue($row, "");
			$values["# Minimum"] = $pageObject->getViewControl("# Minimum")->showDBValue($row, "");
			$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["First Name"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD+Last"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Last Name"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Active"]).'"';
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
			$outstr.='"'.str_replace('"', '""', $values["YTD Revenue"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Last Year Rev"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Prior Year Rev"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Last Year Rank"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD Closing"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Last Year Closing"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD IBC"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTD Engagements"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Total Current Engagments"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["# Wheelhouse"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["# Speculative"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["# Minimum"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ID"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("First Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD+Last").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Last Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Active").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Budget Year").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Start Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD Revenue").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Last Year Rev").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Prior Year Rev").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Last Year Rank").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD Closing").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Last Year Closing").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD IBC").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTD Engagements").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total Current Engagments").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("# Wheelhouse").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("# Speculative").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("# Minimum").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ID").'</td>';	
	}
	else
	{
		echo "<td>"."First Name"."</td>";
		echo "<td>"."YTD+Last"."</td>";
		echo "<td>"."Last Name"."</td>";
		echo "<td>"."Active"."</td>";
		echo "<td>"."Name"."</td>";
		echo "<td>"."Budget Year"."</td>";
		echo "<td>"."Start Date"."</td>";
		echo "<td>"."YTD Revenue"."</td>";
		echo "<td>"."Last Year Rev"."</td>";
		echo "<td>"."Prior Year Rev"."</td>";
		echo "<td>"."Last Year Rank"."</td>";
		echo "<td>"."YTD Closing"."</td>";
		echo "<td>"."Last Year Closing"."</td>";
		echo "<td>"."YTD IBC"."</td>";
		echo "<td>"."YTD Engagements"."</td>";
		echo "<td>"."Total Current Engagments"."</td>";
		echo "<td>"."# Wheelhouse"."</td>";
		echo "<td>"."# Speculative"."</td>";
		echo "<td>"."# Minimum"."</td>";
		echo "<td>"."ID"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["First Name"] = $pageObject->getViewControl("First Name")->showDBValue($row, "");
					$values["YTD+Last"] = $pageObject->getViewControl("YTD+Last")->showDBValue($row, "");
					$values["Last Name"] = $pageObject->getViewControl("Last Name")->showDBValue($row, "");
					$values["Active"] = $pageObject->getViewControl("Active")->showDBValue($row, "");
					$values["Name"] = $pageObject->getViewControl("Name")->showDBValue($row, "");
					$values["Budget Year"] = $pageObject->getViewControl("Budget Year")->showDBValue($row, "");
					$values["Start Date"] = $pageObject->getViewControl("Start Date")->showDBValue($row, "");
					$values["YTD Revenue"] = $pageObject->getViewControl("YTD Revenue")->showDBValue($row, "");
					$values["Last Year Rev"] = $pageObject->getViewControl("Last Year Rev")->showDBValue($row, "");
					$values["Prior Year Rev"] = $pageObject->getViewControl("Prior Year Rev")->showDBValue($row, "");
					$values["Last Year Rank"] = $pageObject->getViewControl("Last Year Rank")->showDBValue($row, "");
					$values["YTD Closing"] = $pageObject->getViewControl("YTD Closing")->showDBValue($row, "");
					$values["Last Year Closing"] = $pageObject->getViewControl("Last Year Closing")->showDBValue($row, "");
					$values["YTD IBC"] = $pageObject->getViewControl("YTD IBC")->showDBValue($row, "");
					$values["YTD Engagements"] = $pageObject->getViewControl("YTD Engagements")->showDBValue($row, "");
					$values["Total Current Engagments"] = $pageObject->getViewControl("Total Current Engagments")->showDBValue($row, "");
					$values["# Wheelhouse"] = $pageObject->getViewControl("# Wheelhouse")->showDBValue($row, "");
					$values["# Speculative"] = $pageObject->getViewControl("# Speculative")->showDBValue($row, "");
					$values["# Minimum"] = $pageObject->getViewControl("# Minimum")->showDBValue($row, "");
					$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";
		
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["First Name"]);
					else
						echo $values["First Name"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD+Last"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Last Name"]);
					else
						echo $values["Last Name"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Active"]);
					else
						echo $values["Active"];
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
			
									echo $values["YTD Revenue"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Last Year Rev"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Prior Year Rev"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Last Year Rank"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["YTD Closing"]);
					else
						echo $values["YTD Closing"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Last Year Closing"]);
					else
						echo $values["Last Year Closing"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTD IBC"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["YTD Engagements"]);
					else
						echo $values["YTD Engagements"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Total Current Engagments"]);
					else
						echo $values["Total Current Engagments"];
			echo '</td>';
							echo '<td>';
			
									echo $values["# Wheelhouse"];
			echo '</td>';
							echo '<td>';
			
									echo $values["# Speculative"];
			echo '</td>';
							echo '<td>';
			
									echo $values["# Minimum"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ID"];
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
