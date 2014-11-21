<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/Revenue_Estimates_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["Revenue_Estimates_export"] = $layout;


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

$xt->display("Revenue_Estimates_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Revenue_Estimates.xls");

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
	header("Content-Disposition: attachment;Filename=Revenue_Estimates.doc");

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
	header("Content-Disposition: attachment;Filename=Revenue_Estimates.xml");
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
			$values["Company"] = $pageObject->showDBValue("Company", $row);
			$values["Practice Area"] = $pageObject->showDBValue("Practice Area", $row);
			$values["Status"] = $pageObject->showDBValue("Status", $row);
			$values["Source"] = $pageObject->showDBValue("Source", $row);
			$values["Split to Corporate"] = $pageObject->showDBValue("Split to Corporate", $row);
			$values["Month of Close"] = $pageObject->showDBValue("Month of Close", $row);
			$values["Net This"] = $pageObject->showDBValue("Net This", $row);
			$values["Gross Next"] = $pageObject->showDBValue("Gross Next", $row);
			$values["Net next"] = $pageObject->showDBValue("Net next", $row);
			$values["Paul"] = $pageObject->showDBValue("Paul", $row);
			$values["Gross This"] = $pageObject->showDBValue("Gross This", $row);
			$values["McBroom"] = $pageObject->showDBValue("McBroom", $row);
			$values["Team-1"] = $pageObject->showDBValue("Team-1", $row);
			$values["Team-2"] = $pageObject->showDBValue("Team-2", $row);
			$values["Team-3"] = $pageObject->showDBValue("Team-3", $row);
			$values["Team-4"] = $pageObject->showDBValue("Team-4", $row);
			$values["Team-5"] = $pageObject->showDBValue("Team-5", $row);
			$values["Team-6"] = $pageObject->showDBValue("Team-6", $row);
		
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
	header("Content-Disposition: attachment;Filename=Revenue_Estimates.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Company\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Practice Area\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Status\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Source\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Split to Corporate\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Month of Close\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Net This\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Gross Next\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Net next\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Paul\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Gross This\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"McBroom\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-6\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["Company"] = $pageObject->getViewControl("Company")->showDBValue($row, "");
			$values["Practice Area"] = $pageObject->getViewControl("Practice Area")->showDBValue($row, "");
			$values["Status"] = $pageObject->getViewControl("Status")->showDBValue($row, "");
			$values["Source"] = $pageObject->getViewControl("Source")->showDBValue($row, "");
			$values["Split to Corporate"] = $pageObject->getViewControl("Split to Corporate")->showDBValue($row, "");
			$values["Month of Close"] = $pageObject->getViewControl("Month of Close")->showDBValue($row, "");
			$values["Net This"] = $pageObject->getViewControl("Net This")->showDBValue($row, "");
			$values["Gross Next"] = $pageObject->getViewControl("Gross Next")->showDBValue($row, "");
			$values["Net next"] = $pageObject->getViewControl("Net next")->showDBValue($row, "");
			$values["Paul"] = $pageObject->getViewControl("Paul")->showDBValue($row, "");
			$values["Gross This"] = $pageObject->getViewControl("Gross This")->showDBValue($row, "");
			$values["McBroom"] = $pageObject->getViewControl("McBroom")->showDBValue($row, "");
			$values["Team-1"] = $pageObject->getViewControl("Team-1")->showDBValue($row, "");
			$values["Team-2"] = $pageObject->getViewControl("Team-2")->showDBValue($row, "");
			$values["Team-3"] = $pageObject->getViewControl("Team-3")->showDBValue($row, "");
			$values["Team-4"] = $pageObject->getViewControl("Team-4")->showDBValue($row, "");
			$values["Team-5"] = $pageObject->getViewControl("Team-5")->showDBValue($row, "");
			$values["Team-6"] = $pageObject->getViewControl("Team-6")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["Company"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Practice Area"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Status"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Source"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Split to Corporate"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Month of Close"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Net This"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Gross Next"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Net next"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Paul"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Gross This"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["McBroom"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-6"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Company").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Practice Area").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Status").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Source").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Split to Corporate").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Month of Close").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Net This").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Gross Next").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Net Next").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Paul").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Gross This").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mc Broom").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-6").'</td>';	
	}
	else
	{
		echo "<td>"."Company"."</td>";
		echo "<td>"."Practice Area"."</td>";
		echo "<td>"."Status"."</td>";
		echo "<td>"."Source"."</td>";
		echo "<td>"."Split to Corporate"."</td>";
		echo "<td>"."Month of Close"."</td>";
		echo "<td>"."Net This"."</td>";
		echo "<td>"."Gross Next"."</td>";
		echo "<td>"."Net Next"."</td>";
		echo "<td>"."Paul"."</td>";
		echo "<td>"."Gross This"."</td>";
		echo "<td>"."Mc Broom"."</td>";
		echo "<td>"."Team-1"."</td>";
		echo "<td>"."Team-2"."</td>";
		echo "<td>"."Team-3"."</td>";
		echo "<td>"."Team-4"."</td>";
		echo "<td>"."Team-5"."</td>";
		echo "<td>"."Team-6"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["Company"] = $pageObject->getViewControl("Company")->showDBValue($row, "");
					$values["Practice Area"] = $pageObject->getViewControl("Practice Area")->showDBValue($row, "");
					$values["Status"] = $pageObject->getViewControl("Status")->showDBValue($row, "");
					$values["Source"] = $pageObject->getViewControl("Source")->showDBValue($row, "");
					$values["Split to Corporate"] = $pageObject->getViewControl("Split to Corporate")->showDBValue($row, "");
					$values["Month of Close"] = $pageObject->getViewControl("Month of Close")->showDBValue($row, "");
					$values["Net This"] = $pageObject->getViewControl("Net This")->showDBValue($row, "");
					$values["Gross Next"] = $pageObject->getViewControl("Gross Next")->showDBValue($row, "");
					$values["Net next"] = $pageObject->getViewControl("Net next")->showDBValue($row, "");
					$values["Paul"] = $pageObject->getViewControl("Paul")->showDBValue($row, "");
					$values["Gross This"] = $pageObject->getViewControl("Gross This")->showDBValue($row, "");
					$values["McBroom"] = $pageObject->getViewControl("McBroom")->showDBValue($row, "");
					$values["Team-1"] = $pageObject->getViewControl("Team-1")->showDBValue($row, "");
					$values["Team-2"] = $pageObject->getViewControl("Team-2")->showDBValue($row, "");
					$values["Team-3"] = $pageObject->getViewControl("Team-3")->showDBValue($row, "");
					$values["Team-4"] = $pageObject->getViewControl("Team-4")->showDBValue($row, "");
					$values["Team-5"] = $pageObject->getViewControl("Team-5")->showDBValue($row, "");
					$values["Team-6"] = $pageObject->getViewControl("Team-6")->showDBValue($row, "");
		
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
						echo PrepareForExcel($values["Company"]);
					else
						echo $values["Company"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Practice Area"]);
					else
						echo $values["Practice Area"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Status"]);
					else
						echo $values["Status"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Source"]);
					else
						echo $values["Source"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Split to Corporate"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Month of Close"]);
					else
						echo $values["Month of Close"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Net This"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Gross Next"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Net next"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Paul"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Gross This"];
			echo '</td>';
							echo '<td>';
			
									echo $values["McBroom"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-1"]);
					else
						echo $values["Team-1"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-2"]);
					else
						echo $values["Team-2"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-3"]);
					else
						echo $values["Team-3"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-4"]);
					else
						echo $values["Team-4"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-5"]);
					else
						echo $values["Team-5"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Team-6"]);
					else
						echo $values["Team-6"];
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
