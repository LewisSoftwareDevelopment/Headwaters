<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/changes_last_month_end_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["changes_last_month_end_export"] = $layout;


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

$xt->display("changes_last_month_end_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=changes_last_month_end.xls");

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
	header("Content-Disposition: attachment;Filename=changes_last_month_end.doc");

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
	header("Content-Disposition: attachment;Filename=changes_last_month_end.xml");
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
			$values["ID"] = $pageObject->showDBValue("ID", $row);
			$values["LMLive"] = $pageObject->showDBValue("LMLive", $row);
			$values["Closed"] = $pageObject->showDBValue("Closed", $row);
			$values["Dead"] = $pageObject->showDBValue("Dead", $row);
			$values["NewEl"] = $pageObject->showDBValue("NewEl", $row);
			$values["CurrentLive"] = $pageObject->showDBValue("CurrentLive", $row);
			$values["CClient"] = $pageObject->showDBValue("CClient", $row);
			$values["CDealtype"] = $pageObject->showDBValue("CDealtype", $row);
			$values["CAmount"] = $pageObject->showDBValue("CAmount", $row);
			$values["CSlot"] = $pageObject->showDBValue("CSlot", $row);
			$values["DClient"] = $pageObject->showDBValue("DClient", $row);
			$values["DDealtype"] = $pageObject->showDBValue("DDealtype", $row);
			$values["DAmount"] = $pageObject->showDBValue("DAmount", $row);
			$values["DSlot"] = $pageObject->showDBValue("DSlot", $row);
			$values["ELClinet"] = $pageObject->showDBValue("ELClinet", $row);
			$values["ELDealType"] = $pageObject->showDBValue("ELDealType", $row);
			$values["ELAmount"] = $pageObject->showDBValue("ELAmount", $row);
			$values["ELSlot"] = $pageObject->showDBValue("ELSlot", $row);
		
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
	header("Content-Disposition: attachment;Filename=changes_last_month_end.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ID\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"LMLive\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Closed\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Dead\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NewEl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CurrentLive\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CClient\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CDealtype\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CAmount\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CSlot\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"DClient\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"DDealtype\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"DAmount\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"DSlot\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELClinet\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELDealType\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELAmount\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELSlot\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
			$values["LMLive"] = $pageObject->getViewControl("LMLive")->showDBValue($row, "");
			$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
			$values["Dead"] = $pageObject->getViewControl("Dead")->showDBValue($row, "");
			$values["NewEl"] = $pageObject->getViewControl("NewEl")->showDBValue($row, "");
			$values["CurrentLive"] = $pageObject->getViewControl("CurrentLive")->showDBValue($row, "");
			$values["CClient"] = $pageObject->getViewControl("CClient")->showDBValue($row, "");
			$values["CDealtype"] = $pageObject->getViewControl("CDealtype")->showDBValue($row, "");
			$values["CAmount"] = $pageObject->getViewControl("CAmount")->showDBValue($row, "");
			$values["CSlot"] = $pageObject->getViewControl("CSlot")->showDBValue($row, "");
			$values["DClient"] = $pageObject->getViewControl("DClient")->showDBValue($row, "");
			$values["DDealtype"] = $pageObject->getViewControl("DDealtype")->showDBValue($row, "");
			$values["DAmount"] = $pageObject->getViewControl("DAmount")->showDBValue($row, "");
			$values["DSlot"] = $pageObject->getViewControl("DSlot")->showDBValue($row, "");
			$values["ELClinet"] = $pageObject->getViewControl("ELClinet")->showDBValue($row, "");
			$values["ELDealType"] = $pageObject->getViewControl("ELDealType")->showDBValue($row, "");
			$values["ELAmount"] = $pageObject->getViewControl("ELAmount")->showDBValue($row, "");
			$values["ELSlot"] = $pageObject->getViewControl("ELSlot")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["ID"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["LMLive"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Closed"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Dead"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["NewEl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CurrentLive"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CClient"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CDealtype"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CAmount"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CSlot"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["DClient"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["DDealtype"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["DAmount"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["DSlot"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELClinet"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELDealType"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELAmount"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELSlot"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ID").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("LMLive").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closed").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Dead").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("New El").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Current Live").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CClient").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CDealtype").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CAmount").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CSlot").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("DClient").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("DDealtype").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("DAmount").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("DSlot").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELClinet").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELDeal Type").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELAmount").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELSlot").'</td>';	
	}
	else
	{
		echo "<td>"."ID"."</td>";
		echo "<td>"."LMLive"."</td>";
		echo "<td>"."Closed"."</td>";
		echo "<td>"."Dead"."</td>";
		echo "<td>"."New El"."</td>";
		echo "<td>"."Current Live"."</td>";
		echo "<td>"."CClient"."</td>";
		echo "<td>"."CDealtype"."</td>";
		echo "<td>"."CAmount"."</td>";
		echo "<td>"."CSlot"."</td>";
		echo "<td>"."DClient"."</td>";
		echo "<td>"."DDealtype"."</td>";
		echo "<td>"."DAmount"."</td>";
		echo "<td>"."DSlot"."</td>";
		echo "<td>"."ELClinet"."</td>";
		echo "<td>"."ELDeal Type"."</td>";
		echo "<td>"."ELAmount"."</td>";
		echo "<td>"."ELSlot"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
					$values["LMLive"] = $pageObject->getViewControl("LMLive")->showDBValue($row, "");
					$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
					$values["Dead"] = $pageObject->getViewControl("Dead")->showDBValue($row, "");
					$values["NewEl"] = $pageObject->getViewControl("NewEl")->showDBValue($row, "");
					$values["CurrentLive"] = $pageObject->getViewControl("CurrentLive")->showDBValue($row, "");
					$values["CClient"] = $pageObject->getViewControl("CClient")->showDBValue($row, "");
					$values["CDealtype"] = $pageObject->getViewControl("CDealtype")->showDBValue($row, "");
					$values["CAmount"] = $pageObject->getViewControl("CAmount")->showDBValue($row, "");
					$values["CSlot"] = $pageObject->getViewControl("CSlot")->showDBValue($row, "");
					$values["DClient"] = $pageObject->getViewControl("DClient")->showDBValue($row, "");
					$values["DDealtype"] = $pageObject->getViewControl("DDealtype")->showDBValue($row, "");
					$values["DAmount"] = $pageObject->getViewControl("DAmount")->showDBValue($row, "");
					$values["DSlot"] = $pageObject->getViewControl("DSlot")->showDBValue($row, "");
					$values["ELClinet"] = $pageObject->getViewControl("ELClinet")->showDBValue($row, "");
					$values["ELDealType"] = $pageObject->getViewControl("ELDealType")->showDBValue($row, "");
					$values["ELAmount"] = $pageObject->getViewControl("ELAmount")->showDBValue($row, "");
					$values["ELSlot"] = $pageObject->getViewControl("ELSlot")->showDBValue($row, "");
		
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
			
									echo $values["ID"];
			echo '</td>';
							echo '<td>';
			
									echo $values["LMLive"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Closed"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Dead"];
			echo '</td>';
							echo '<td>';
			
									echo $values["NewEl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CurrentLive"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["CClient"]);
					else
						echo $values["CClient"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["CDealtype"]);
					else
						echo $values["CDealtype"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CAmount"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["CSlot"]);
					else
						echo $values["CSlot"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["DClient"]);
					else
						echo $values["DClient"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["DDealtype"]);
					else
						echo $values["DDealtype"];
			echo '</td>';
							echo '<td>';
			
									echo $values["DAmount"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["DSlot"]);
					else
						echo $values["DSlot"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELClinet"]);
					else
						echo $values["ELClinet"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELDealType"]);
					else
						echo $values["ELDealType"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ELAmount"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELSlot"]);
					else
						echo $values["ELSlot"];
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
