<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/company_Report_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["company_Report_export"] = $layout;


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

$xt->display("company_Report_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=company_Report.xls");

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
	header("Content-Disposition: attachment;Filename=company_Report.doc");

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
	header("Content-Disposition: attachment;Filename=company_Report.xml");
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
			$values["Deal Slot"] = $pageObject->showDBValue("Deal Slot", $row);
			$values["IBC Date"] = $pageObject->showDBValue("IBC Date", $row);
			$values["EL Date"] = $pageObject->showDBValue("EL Date", $row);
			$values["Project Name"] = $pageObject->showDBValue("Project Name", $row);
			$values["Status"] = $pageObject->showDBValue("Status", $row);
			$values["ID"] = $pageObject->showDBValue("ID", $row);
			$values["Deal Type"] = $pageObject->showDBValue("Deal Type", $row);
			$values["Projected Fee"] = $pageObject->showDBValue("Projected Fee", $row);
			$values["Projected Transaction Size"] = $pageObject->showDBValue("Projected Transaction Size", $row);
			$values["Est. Close Date"] = $pageObject->showDBValue("Est. Close Date", $row);
			$values["Primary Banker"] = $pageObject->showDBValue("Primary Banker", $row);
			$values["Practice Area"] = $pageObject->showDBValue("Practice Area", $row);
			$values["Ownership Class"] = $pageObject->showDBValue("Ownership Class", $row);
			$values["Industry"] = $pageObject->showDBValue("Industry", $row);
			$values["Referral Type"] = $pageObject->showDBValue("Referral Type", $row);
			$values["Referral Source-Company"] = $pageObject->showDBValue("Referral Source-Company", $row);
			$values["Referral Scource-Ind."] = $pageObject->showDBValue("Referral Scource-Ind.", $row);
			$values["Description"] = $pageObject->showDBValue("Description", $row);
			$values["Dead Date"] = $pageObject->showDBValue("Dead Date", $row);
			$values["EL Expiration Date"] = $pageObject->showDBValue("EL Expiration Date", $row);
			$values["Engagment Fee"] = $pageObject->showDBValue("Engagment Fee", $row);
			$values["Fee Minimum"] = $pageObject->showDBValue("Fee Minimum", $row);
			$values["Final Total Sucess Fee"] = $pageObject->showDBValue("Final Total Sucess Fee", $row);
			$values["Final Transaction Size"] = $pageObject->showDBValue("Final Transaction Size", $row);
			$values["Monthly Retainer"] = $pageObject->showDBValue("Monthly Retainer", $row);
			$values["Closed Date"] = $pageObject->showDBValue("Closed Date", $row);
			$values["Team Split-1"] = $pageObject->showDBValue("Team Split-1", $row);
			$values["Team-1"] = $pageObject->showDBValue("Team-1", $row);
			$values["Team Split-2"] = $pageObject->showDBValue("Team Split-2", $row);
			$values["Team-2"] = $pageObject->showDBValue("Team-2", $row);
			$values["Team Split-3"] = $pageObject->showDBValue("Team Split-3", $row);
			$values["Team Split-4"] = $pageObject->showDBValue("Team Split-4", $row);
			$values["Team Split-5"] = $pageObject->showDBValue("Team Split-5", $row);
			$values["Team Split-6"] = $pageObject->showDBValue("Team Split-6", $row);
			$values["Team-3"] = $pageObject->showDBValue("Team-3", $row);
			$values["Team-4"] = $pageObject->showDBValue("Team-4", $row);
			$values["Team-5"] = $pageObject->showDBValue("Team-5", $row);
			$values["Team-6"] = $pageObject->showDBValue("Team-6", $row);
			$values["Fee Split-1"] = $pageObject->showDBValue("Fee Split-1", $row);
			$values["Fee Split-2"] = $pageObject->showDBValue("Fee Split-2", $row);
			$values["Fee Split-3"] = $pageObject->showDBValue("Fee Split-3", $row);
			$values["Fee Split-4"] = $pageObject->showDBValue("Fee Split-4", $row);
			$values["Fee Split-5"] = $pageObject->showDBValue("Fee Split-5", $row);
			$values["Fee Split-6"] = $pageObject->showDBValue("Fee Split-6", $row);
			$values["Fee To-1"] = $pageObject->showDBValue("Fee To-1", $row);
			$values["Fee To-2"] = $pageObject->showDBValue("Fee To-2", $row);
			$values["Fee To-3"] = $pageObject->showDBValue("Fee To-3", $row);
			$values["Fee To-4"] = $pageObject->showDBValue("Fee To-4", $row);
			$values["Fee To-5"] = $pageObject->showDBValue("Fee To-5", $row);
			$values["Fee To-6"] = $pageObject->showDBValue("Fee To-6", $row);
			$values["Enterpise Value"] = $pageObject->showDBValue("Enterpise Value", $row);
			$values["Fee Details"] = $pageObject->showDBValue("Fee Details", $row);
			$values["Split to Corporate"] = $pageObject->showDBValue("Split to Corporate", $row);
			$values["Paul"] = $pageObject->showDBValue("Paul", $row);
			$values["McBroom"] = $pageObject->showDBValue("McBroom", $row);
		
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
	header("Content-Disposition: attachment;Filename=company_Report.csv");
	
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
	$outstr.= "\"Deal Slot\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Project Name\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Status\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ID\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Deal Type\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Projected Fee\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Projected Transaction Size\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Est. Close Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Primary Banker\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Practice Area\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Ownership Class\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Industry\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Referral Type\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Referral Source-Company\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Referral Scource-Ind.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Description\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Dead Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL Expiration Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Engagment Fee\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Minimum\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Final Total Sucess Fee\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Final Transaction Size\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Monthly Retainer\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Closed Date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team-2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Team Split-6\"";
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
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Split-6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee To-6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Enterpise Value\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fee Details\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Split to Corporate\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Paul\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"McBroom\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["Company"] = $pageObject->getViewControl("Company")->showDBValue($row, "");
			$values["Deal Slot"] = $pageObject->getViewControl("Deal Slot")->showDBValue($row, "");
			$values["IBC Date"] = $pageObject->getViewControl("IBC Date")->showDBValue($row, "");
			$values["EL Date"] = $pageObject->getViewControl("EL Date")->showDBValue($row, "");
			$values["Project Name"] = $pageObject->getViewControl("Project Name")->showDBValue($row, "");
			$values["Status"] = $pageObject->getViewControl("Status")->showDBValue($row, "");
			$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
			$values["Deal Type"] = $pageObject->getViewControl("Deal Type")->showDBValue($row, "");
			$values["Projected Fee"] = $row["Projected Fee"];
			$values["Projected Transaction Size"] = $row["Projected Transaction Size"];
			$values["Est. Close Date"] = $pageObject->getViewControl("Est. Close Date")->showDBValue($row, "");
			$values["Primary Banker"] = $pageObject->getViewControl("Primary Banker")->showDBValue($row, "");
			$values["Practice Area"] = $pageObject->getViewControl("Practice Area")->showDBValue($row, "");
			$values["Ownership Class"] = $pageObject->getViewControl("Ownership Class")->showDBValue($row, "");
			$values["Industry"] = $pageObject->getViewControl("Industry")->showDBValue($row, "");
			$values["Referral Type"] = $pageObject->getViewControl("Referral Type")->showDBValue($row, "");
			$values["Referral Source-Company"] = $pageObject->getViewControl("Referral Source-Company")->showDBValue($row, "");
			$values["Referral Scource-Ind."] = $pageObject->getViewControl("Referral Scource-Ind.")->showDBValue($row, "");
			$values["Description"] = $pageObject->getViewControl("Description")->showDBValue($row, "");
			$values["Dead Date"] = $pageObject->getViewControl("Dead Date")->showDBValue($row, "");
			$values["EL Expiration Date"] = $pageObject->getViewControl("EL Expiration Date")->showDBValue($row, "");
			$values["Engagment Fee"] = $row["Engagment Fee"];
			$values["Fee Minimum"] = $row["Fee Minimum"];
			$values["Final Total Sucess Fee"] = $row["Final Total Sucess Fee"];
			$values["Final Transaction Size"] = $row["Final Transaction Size"];
			$values["Monthly Retainer"] = $row["Monthly Retainer"];
			$values["Closed Date"] = $pageObject->getViewControl("Closed Date")->showDBValue($row, "");
			$values["Team Split-1"] = $pageObject->getViewControl("Team Split-1")->showDBValue($row, "");
			$values["Team-1"] = $pageObject->getViewControl("Team-1")->showDBValue($row, "");
			$values["Team Split-2"] = $pageObject->getViewControl("Team Split-2")->showDBValue($row, "");
			$values["Team-2"] = $pageObject->getViewControl("Team-2")->showDBValue($row, "");
			$values["Team Split-3"] = $row["Team Split-3"];
			$values["Team Split-4"] = $row["Team Split-4"];
			$values["Team Split-5"] = $row["Team Split-5"];
			$values["Team Split-6"] = $row["Team Split-6"];
			$values["Team-3"] = $pageObject->getViewControl("Team-3")->showDBValue($row, "");
			$values["Team-4"] = $pageObject->getViewControl("Team-4")->showDBValue($row, "");
			$values["Team-5"] = $pageObject->getViewControl("Team-5")->showDBValue($row, "");
			$values["Team-6"] = $pageObject->getViewControl("Team-6")->showDBValue($row, "");
			$values["Fee Split-1"] = $row["Fee Split-1"];
			$values["Fee Split-2"] = $row["Fee Split-2"];
			$values["Fee Split-3"] = $row["Fee Split-3"];
			$values["Fee Split-4"] = $row["Fee Split-4"];
			$values["Fee Split-5"] = $row["Fee Split-5"];
			$values["Fee Split-6"] = $row["Fee Split-6"];
			$values["Fee To-1"] = $pageObject->getViewControl("Fee To-1")->showDBValue($row, "");
			$values["Fee To-2"] = $pageObject->getViewControl("Fee To-2")->showDBValue($row, "");
			$values["Fee To-3"] = $pageObject->getViewControl("Fee To-3")->showDBValue($row, "");
			$values["Fee To-4"] = $pageObject->getViewControl("Fee To-4")->showDBValue($row, "");
			$values["Fee To-5"] = $pageObject->getViewControl("Fee To-5")->showDBValue($row, "");
			$values["Fee To-6"] = $pageObject->getViewControl("Fee To-6")->showDBValue($row, "");
			$values["Enterpise Value"] = $pageObject->getViewControl("Enterpise Value")->showDBValue($row, "");
			$values["Fee Details"] = $pageObject->getViewControl("Fee Details")->showDBValue($row, "");
			$values["Split to Corporate"] = $row["Split to Corporate"];
			$values["Paul"] = $pageObject->getViewControl("Paul")->showDBValue($row, "");
			$values["McBroom"] = $pageObject->getViewControl("McBroom")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["Deal Slot"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Project Name"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Status"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ID"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Deal Type"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Projected Fee"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Projected Transaction Size"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Est. Close Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Primary Banker"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Practice Area"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Ownership Class"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Industry"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Referral Type"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Referral Source-Company"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Referral Scource-Ind."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Description"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Dead Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL Expiration Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Engagment Fee"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Minimum"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Final Total Sucess Fee"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Final Transaction Size"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Monthly Retainer"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Closed Date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team-2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Team Split-6"]).'"';
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
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Split-6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee To-6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Enterpise Value"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Fee Details"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Split to Corporate"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Paul"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["McBroom"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Deal Slot").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Project Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Status").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ID").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Deal Type").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Projected Fee").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Projected Transaction Size").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Est. Close Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Primary Banker").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Practice Area").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ownership Class").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Industry").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Referral Type").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Referral Source-Company").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Referral Scource-Ind.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Description").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Dead Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL Expiration Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Engagment Fee").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Minimum").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Final Total Sucess Fee").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Final Transaction Size").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Monthly Retainer").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closed Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team Split-6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Team-6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Split-6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee To-6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enterpise Value").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fee Details").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Split to Corporate").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Paul").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mc Broom").'</td>';	
	}
	else
	{
		echo "<td>"."Company"."</td>";
		echo "<td>"."Deal Slot"."</td>";
		echo "<td>"."IBC Date"."</td>";
		echo "<td>"."EL Date"."</td>";
		echo "<td>"."Project Name"."</td>";
		echo "<td>"."Status"."</td>";
		echo "<td>"."ID"."</td>";
		echo "<td>"."Deal Type"."</td>";
		echo "<td>"."Projected Fee"."</td>";
		echo "<td>"."Projected Transaction Size"."</td>";
		echo "<td>"."Est. Close Date"."</td>";
		echo "<td>"."Primary Banker"."</td>";
		echo "<td>"."Practice Area"."</td>";
		echo "<td>"."Ownership Class"."</td>";
		echo "<td>"."Industry"."</td>";
		echo "<td>"."Referral Type"."</td>";
		echo "<td>"."Referral Source-Company"."</td>";
		echo "<td>"."Referral Scource-Ind."."</td>";
		echo "<td>"."Description"."</td>";
		echo "<td>"."Dead Date"."</td>";
		echo "<td>"."EL Expiration Date"."</td>";
		echo "<td>"."Engagment Fee"."</td>";
		echo "<td>"."Fee Minimum"."</td>";
		echo "<td>"."Final Total Sucess Fee"."</td>";
		echo "<td>"."Final Transaction Size"."</td>";
		echo "<td>"."Monthly Retainer"."</td>";
		echo "<td>"."Closed Date"."</td>";
		echo "<td>"."Team Split-1"."</td>";
		echo "<td>"."Team-1"."</td>";
		echo "<td>"."Team Split-2"."</td>";
		echo "<td>"."Team-2"."</td>";
		echo "<td>"."Team Split-3"."</td>";
		echo "<td>"."Team Split-4"."</td>";
		echo "<td>"."Team Split-5"."</td>";
		echo "<td>"."Team Split-6"."</td>";
		echo "<td>"."Team-3"."</td>";
		echo "<td>"."Team-4"."</td>";
		echo "<td>"."Team-5"."</td>";
		echo "<td>"."Team-6"."</td>";
		echo "<td>"."Fee Split-1"."</td>";
		echo "<td>"."Fee Split-2"."</td>";
		echo "<td>"."Fee Split-3"."</td>";
		echo "<td>"."Fee Split-4"."</td>";
		echo "<td>"."Fee Split-5"."</td>";
		echo "<td>"."Fee Split-6"."</td>";
		echo "<td>"."Fee To-1"."</td>";
		echo "<td>"."Fee To-2"."</td>";
		echo "<td>"."Fee To-3"."</td>";
		echo "<td>"."Fee To-4"."</td>";
		echo "<td>"."Fee To-5"."</td>";
		echo "<td>"."Fee To-6"."</td>";
		echo "<td>"."Enterpise Value"."</td>";
		echo "<td>"."Fee Details"."</td>";
		echo "<td>"."Split to Corporate"."</td>";
		echo "<td>"."Paul"."</td>";
		echo "<td>"."Mc Broom"."</td>";
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
					$values["Deal Slot"] = $pageObject->getViewControl("Deal Slot")->showDBValue($row, "");
					$values["IBC Date"] = $pageObject->getViewControl("IBC Date")->showDBValue($row, "");
					$values["EL Date"] = $pageObject->getViewControl("EL Date")->showDBValue($row, "");
					$values["Project Name"] = $pageObject->getViewControl("Project Name")->showDBValue($row, "");
					$values["Status"] = $pageObject->getViewControl("Status")->showDBValue($row, "");
					$values["ID"] = $pageObject->getViewControl("ID")->showDBValue($row, "");
					$values["Deal Type"] = $pageObject->getViewControl("Deal Type")->showDBValue($row, "");
					$values["Projected Fee"] = $pageObject->getViewControl("Projected Fee")->showDBValue($row, "");
					$values["Projected Transaction Size"] = $pageObject->getViewControl("Projected Transaction Size")->showDBValue($row, "");
					$values["Est. Close Date"] = $pageObject->getViewControl("Est. Close Date")->showDBValue($row, "");
					$values["Primary Banker"] = $pageObject->getViewControl("Primary Banker")->showDBValue($row, "");
					$values["Practice Area"] = $pageObject->getViewControl("Practice Area")->showDBValue($row, "");
					$values["Ownership Class"] = $pageObject->getViewControl("Ownership Class")->showDBValue($row, "");
					$values["Industry"] = $pageObject->getViewControl("Industry")->showDBValue($row, "");
					$values["Referral Type"] = $pageObject->getViewControl("Referral Type")->showDBValue($row, "");
					$values["Referral Source-Company"] = $pageObject->getViewControl("Referral Source-Company")->showDBValue($row, "");
					$values["Referral Scource-Ind."] = $pageObject->getViewControl("Referral Scource-Ind.")->showDBValue($row, "");
					$values["Description"] = $pageObject->getViewControl("Description")->showDBValue($row, "");
					$values["Dead Date"] = $pageObject->getViewControl("Dead Date")->showDBValue($row, "");
					$values["EL Expiration Date"] = $pageObject->getViewControl("EL Expiration Date")->showDBValue($row, "");
					$values["Engagment Fee"] = $pageObject->getViewControl("Engagment Fee")->showDBValue($row, "");
					$values["Fee Minimum"] = $pageObject->getViewControl("Fee Minimum")->showDBValue($row, "");
					$values["Final Total Sucess Fee"] = $pageObject->getViewControl("Final Total Sucess Fee")->showDBValue($row, "");
					$values["Final Transaction Size"] = $pageObject->getViewControl("Final Transaction Size")->showDBValue($row, "");
					$values["Monthly Retainer"] = $pageObject->getViewControl("Monthly Retainer")->showDBValue($row, "");
					$values["Closed Date"] = $pageObject->getViewControl("Closed Date")->showDBValue($row, "");
					$values["Team Split-1"] = $pageObject->getViewControl("Team Split-1")->showDBValue($row, "");
					$values["Team-1"] = $pageObject->getViewControl("Team-1")->showDBValue($row, "");
					$values["Team Split-2"] = $pageObject->getViewControl("Team Split-2")->showDBValue($row, "");
					$values["Team-2"] = $pageObject->getViewControl("Team-2")->showDBValue($row, "");
					$values["Team Split-3"] = $pageObject->getViewControl("Team Split-3")->showDBValue($row, "");
					$values["Team Split-4"] = $pageObject->getViewControl("Team Split-4")->showDBValue($row, "");
					$values["Team Split-5"] = $pageObject->getViewControl("Team Split-5")->showDBValue($row, "");
					$values["Team Split-6"] = $pageObject->getViewControl("Team Split-6")->showDBValue($row, "");
					$values["Team-3"] = $pageObject->getViewControl("Team-3")->showDBValue($row, "");
					$values["Team-4"] = $pageObject->getViewControl("Team-4")->showDBValue($row, "");
					$values["Team-5"] = $pageObject->getViewControl("Team-5")->showDBValue($row, "");
					$values["Team-6"] = $pageObject->getViewControl("Team-6")->showDBValue($row, "");
					$values["Fee Split-1"] = $pageObject->getViewControl("Fee Split-1")->showDBValue($row, "");
					$values["Fee Split-2"] = $pageObject->getViewControl("Fee Split-2")->showDBValue($row, "");
					$values["Fee Split-3"] = $pageObject->getViewControl("Fee Split-3")->showDBValue($row, "");
					$values["Fee Split-4"] = $pageObject->getViewControl("Fee Split-4")->showDBValue($row, "");
					$values["Fee Split-5"] = $pageObject->getViewControl("Fee Split-5")->showDBValue($row, "");
					$values["Fee Split-6"] = $pageObject->getViewControl("Fee Split-6")->showDBValue($row, "");
					$values["Fee To-1"] = $pageObject->getViewControl("Fee To-1")->showDBValue($row, "");
					$values["Fee To-2"] = $pageObject->getViewControl("Fee To-2")->showDBValue($row, "");
					$values["Fee To-3"] = $pageObject->getViewControl("Fee To-3")->showDBValue($row, "");
					$values["Fee To-4"] = $pageObject->getViewControl("Fee To-4")->showDBValue($row, "");
					$values["Fee To-5"] = $pageObject->getViewControl("Fee To-5")->showDBValue($row, "");
					$values["Fee To-6"] = $pageObject->getViewControl("Fee To-6")->showDBValue($row, "");
					$values["Enterpise Value"] = $pageObject->getViewControl("Enterpise Value")->showDBValue($row, "");
					$values["Fee Details"] = $pageObject->getViewControl("Fee Details")->showDBValue($row, "");
					$values["Split to Corporate"] = $pageObject->getViewControl("Split to Corporate")->showDBValue($row, "");
					$values["Paul"] = $pageObject->getViewControl("Paul")->showDBValue($row, "");
					$values["McBroom"] = $pageObject->getViewControl("McBroom")->showDBValue($row, "");
		
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
						echo PrepareForExcel($values["Deal Slot"]);
					else
						echo $values["Deal Slot"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IBC Date"]);
					else
						echo $values["IBC Date"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["EL Date"]);
					else
						echo $values["EL Date"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Project Name"]);
					else
						echo $values["Project Name"];
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
							echo '<td>';
			
									echo $values["ID"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Deal Type"]);
					else
						echo $values["Deal Type"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Projected Fee"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Projected Transaction Size"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Est. Close Date"]);
					else
						echo $values["Est. Close Date"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Primary Banker"]);
					else
						echo $values["Primary Banker"];
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
						echo PrepareForExcel($values["Ownership Class"]);
					else
						echo $values["Ownership Class"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Industry"]);
					else
						echo $values["Industry"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Referral Type"]);
					else
						echo $values["Referral Type"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Referral Source-Company"]);
					else
						echo $values["Referral Source-Company"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Referral Scource-Ind."]);
					else
						echo $values["Referral Scource-Ind."];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Description"]);
					else
						echo $values["Description"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Dead Date"]);
					else
						echo $values["Dead Date"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["EL Expiration Date"]);
					else
						echo $values["EL Expiration Date"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Engagment Fee"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Minimum"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Final Total Sucess Fee"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Final Transaction Size"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Monthly Retainer"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Closed Date"]);
					else
						echo $values["Closed Date"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Team Split-1"];
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
							echo '<td>';
			
									echo $values["Team Split-2"];
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
							echo '<td>';
			
									echo $values["Team Split-3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Team Split-4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Team Split-5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Team Split-6"];
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
							echo '<td>';
			
									echo $values["Fee Split-1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Split-2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Split-3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Split-4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Split-5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Fee Split-6"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-1"]);
					else
						echo $values["Fee To-1"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-2"]);
					else
						echo $values["Fee To-2"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-3"]);
					else
						echo $values["Fee To-3"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-4"]);
					else
						echo $values["Fee To-4"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-5"]);
					else
						echo $values["Fee To-5"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee To-6"]);
					else
						echo $values["Fee To-6"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Enterpise Value"]);
					else
						echo $values["Enterpise Value"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fee Details"]);
					else
						echo $values["Fee Details"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Split to Corporate"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Paul"];
			echo '</td>';
							echo '<td>';
			
									echo $values["McBroom"];
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
