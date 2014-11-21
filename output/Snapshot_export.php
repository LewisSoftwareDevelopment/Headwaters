<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/Snapshot_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["Snapshot_export"] = $layout;


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

$xt->display("Snapshot_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Snapshot.xls");

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
	header("Content-Disposition: attachment;Filename=Snapshot.doc");

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
	header("Content-Disposition: attachment;Filename=Snapshot.xml");
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
			$values["Live"] = $pageObject->showDBValue("Live", $row);
			$values["InMarketLOI"] = $pageObject->showDBValue("InMarketLOI", $row);
			$values["Closed"] = $pageObject->showDBValue("Closed", $row);
			$values["EL"] = $pageObject->showDBValue("EL", $row);
			$values["IBC"] = $pageObject->showDBValue("IBC", $row);
			$values["nda12"] = $pageObject->showDBValue("nda12", $row);
			$values["nda11"] = $pageObject->showDBValue("nda11", $row);
			$values["nda10"] = $pageObject->showDBValue("nda10", $row);
			$values["nda9"] = $pageObject->showDBValue("nda9", $row);
			$values["nda8"] = $pageObject->showDBValue("nda8", $row);
			$values["nda7"] = $pageObject->showDBValue("nda7", $row);
			$values["nda6"] = $pageObject->showDBValue("nda6", $row);
			$values["nda5"] = $pageObject->showDBValue("nda5", $row);
			$values["nda4"] = $pageObject->showDBValue("nda4", $row);
			$values["nda3"] = $pageObject->showDBValue("nda3", $row);
			$values["nda2"] = $pageObject->showDBValue("nda2", $row);
			$values["nda1"] = $pageObject->showDBValue("nda1", $row);
			$values["NDAYTD"] = $pageObject->showDBValue("NDAYTD", $row);
			$values["ELJan"] = $pageObject->showDBValue("ELJan", $row);
			$values["ELFeb"] = $pageObject->showDBValue("ELFeb", $row);
			$values["ELMar"] = $pageObject->showDBValue("ELMar", $row);
			$values["ELApril"] = $pageObject->showDBValue("ELApril", $row);
			$values["ELMay"] = $pageObject->showDBValue("ELMay", $row);
			$values["ELJune"] = $pageObject->showDBValue("ELJune", $row);
			$values["ELJuly"] = $pageObject->showDBValue("ELJuly", $row);
			$values["ELAug"] = $pageObject->showDBValue("ELAug", $row);
			$values["ELSep"] = $pageObject->showDBValue("ELSep", $row);
			$values["ELOct"] = $pageObject->showDBValue("ELOct", $row);
			$values["ELNov"] = $pageObject->showDBValue("ELNov", $row);
			$values["ELDec"] = $pageObject->showDBValue("ELDec", $row);
			$values["IMLJan"] = $pageObject->showDBValue("IMLJan", $row);
			$values["IMLeb"] = $pageObject->showDBValue("IMLeb", $row);
			$values["IMLMar"] = $pageObject->showDBValue("IMLMar", $row);
			$values["IMLApril"] = $pageObject->showDBValue("IMLApril", $row);
			$values["IMLMay"] = $pageObject->showDBValue("IMLMay", $row);
			$values["IMLJune"] = $pageObject->showDBValue("IMLJune", $row);
			$values["IMLJuly"] = $pageObject->showDBValue("IMLJuly", $row);
			$values["IMLAug"] = $pageObject->showDBValue("IMLAug", $row);
			$values["IMLSep"] = $pageObject->showDBValue("IMLSep", $row);
			$values["IMLOct"] = $pageObject->showDBValue("IMLOct", $row);
			$values["IMLNov"] = $pageObject->showDBValue("IMLNov", $row);
			$values["IMLDec"] = $pageObject->showDBValue("IMLDec", $row);
			$values["IBC12"] = $pageObject->showDBValue("IBC12", $row);
			$values["IBC11"] = $pageObject->showDBValue("IBC11", $row);
			$values["IBC10"] = $pageObject->showDBValue("IBC10", $row);
			$values["IBC9"] = $pageObject->showDBValue("IBC9", $row);
			$values["IBC8"] = $pageObject->showDBValue("IBC8", $row);
			$values["IBC7"] = $pageObject->showDBValue("IBC7", $row);
			$values["IBC6"] = $pageObject->showDBValue("IBC6", $row);
			$values["IBC5"] = $pageObject->showDBValue("IBC5", $row);
			$values["IBC4"] = $pageObject->showDBValue("IBC4", $row);
			$values["IBC3"] = $pageObject->showDBValue("IBC3", $row);
			$values["IBC2"] = $pageObject->showDBValue("IBC2", $row);
			$values["IBC1"] = $pageObject->showDBValue("IBC1", $row);
			$values["EL12"] = $pageObject->showDBValue("EL12", $row);
			$values["EL11"] = $pageObject->showDBValue("EL11", $row);
			$values["EL10"] = $pageObject->showDBValue("EL10", $row);
			$values["EL9"] = $pageObject->showDBValue("EL9", $row);
			$values["EL8"] = $pageObject->showDBValue("EL8", $row);
			$values["EL7"] = $pageObject->showDBValue("EL7", $row);
			$values["EL6"] = $pageObject->showDBValue("EL6", $row);
			$values["EL5"] = $pageObject->showDBValue("EL5", $row);
			$values["EL4"] = $pageObject->showDBValue("EL4", $row);
			$values["EL3"] = $pageObject->showDBValue("EL3", $row);
			$values["EL2"] = $pageObject->showDBValue("EL2", $row);
			$values["EL1"] = $pageObject->showDBValue("EL1", $row);
			$values["CL12"] = $pageObject->showDBValue("CL12", $row);
			$values["CL11"] = $pageObject->showDBValue("CL11", $row);
			$values["CL10"] = $pageObject->showDBValue("CL10", $row);
			$values["CL9"] = $pageObject->showDBValue("CL9", $row);
			$values["CL8"] = $pageObject->showDBValue("CL8", $row);
			$values["CL7"] = $pageObject->showDBValue("CL7", $row);
			$values["CL6"] = $pageObject->showDBValue("CL6", $row);
			$values["CL5"] = $pageObject->showDBValue("CL5", $row);
			$values["CL4"] = $pageObject->showDBValue("CL4", $row);
			$values["CL3"] = $pageObject->showDBValue("CL3", $row);
			$values["CL2"] = $pageObject->showDBValue("CL2", $row);
			$values["CL1"] = $pageObject->showDBValue("CL1", $row);
			$values["PreMarket"] = $pageObject->showDBValue("PreMarket", $row);
			$values["InMarket"] = $pageObject->showDBValue("InMarket", $row);
			$values["UNderLOI"] = $pageObject->showDBValue("UNderLOI", $row);
			$values["Inactive"] = $pageObject->showDBValue("Inactive", $row);
			$values["OnHold"] = $pageObject->showDBValue("OnHold", $row);
			$values["Wheelhouse"] = $pageObject->showDBValue("Wheelhouse", $row);
			$values["Speculative"] = $pageObject->showDBValue("Speculative", $row);
			$values["Minimum"] = $pageObject->showDBValue("Minimum", $row);
			$values["EV10SS"] = $pageObject->showDBValue("EV10SS", $row);
			$values["EV25SS"] = $pageObject->showDBValue("EV25SS", $row);
			$values["EV75SS"] = $pageObject->showDBValue("EV75SS", $row);
			$values["EV100SS"] = $pageObject->showDBValue("EV100SS", $row);
			$values["EV150SS"] = $pageObject->showDBValue("EV150SS", $row);
			$values["sst"] = $pageObject->showDBValue("sst", $row);
			$values["EV10BS"] = $pageObject->showDBValue("EV10BS", $row);
			$values["EV25BS"] = $pageObject->showDBValue("EV25BS", $row);
			$values["EV75BS"] = $pageObject->showDBValue("EV75BS", $row);
			$values["EV100BS"] = $pageObject->showDBValue("EV100BS", $row);
			$values["EV150BS"] = $pageObject->showDBValue("EV150BS", $row);
			$values["bst"] = $pageObject->showDBValue("bst", $row);
			$values["EV10eq"] = $pageObject->showDBValue("EV10eq", $row);
			$values["EV25eq"] = $pageObject->showDBValue("EV25eq", $row);
			$values["EV75eq"] = $pageObject->showDBValue("EV75eq", $row);
			$values["EV100eq"] = $pageObject->showDBValue("EV100eq", $row);
			$values["EV150eq"] = $pageObject->showDBValue("EV150eq", $row);
			$values["eqt"] = $pageObject->showDBValue("eqt", $row);
			$values["EV10d"] = $pageObject->showDBValue("EV10d", $row);
			$values["EV25d"] = $pageObject->showDBValue("EV25d", $row);
			$values["EV75d"] = $pageObject->showDBValue("EV75d", $row);
			$values["EV100d"] = $pageObject->showDBValue("EV100d", $row);
			$values["EV150d"] = $pageObject->showDBValue("EV150d", $row);
			$values["dt"] = $pageObject->showDBValue("dt", $row);
			$values["EV10ad"] = $pageObject->showDBValue("EV10ad", $row);
			$values["EV25ad"] = $pageObject->showDBValue("EV25ad", $row);
			$values["EV75ad"] = $pageObject->showDBValue("EV75ad", $row);
			$values["EV100ad"] = $pageObject->showDBValue("EV100ad", $row);
			$values["EV150ad"] = $pageObject->showDBValue("EV150ad", $row);
			$values["adt"] = $pageObject->showDBValue("adt", $row);
			$values["EV10p"] = $pageObject->showDBValue("EV10p", $row);
			$values["EV25p"] = $pageObject->showDBValue("EV25p", $row);
			$values["EV75p"] = $pageObject->showDBValue("EV75p", $row);
			$values["EV100p"] = $pageObject->showDBValue("EV100p", $row);
			$values["EV150p"] = $pageObject->showDBValue("EV150p", $row);
			$values["pt"] = $pageObject->showDBValue("pt", $row);
			$values["EV10pe"] = $pageObject->showDBValue("EV10pe", $row);
			$values["EV25pe"] = $pageObject->showDBValue("EV25pe", $row);
			$values["EV75pe"] = $pageObject->showDBValue("EV75pe", $row);
			$values["EV100pe"] = $pageObject->showDBValue("EV100pe", $row);
			$values["EV150pe"] = $pageObject->showDBValue("EV150pe", $row);
			$values["pet"] = $pageObject->showDBValue("pet", $row);
			$values["EV10po"] = $pageObject->showDBValue("EV10po", $row);
			$values["EV25po"] = $pageObject->showDBValue("EV25po", $row);
			$values["EV75po"] = $pageObject->showDBValue("EV75po", $row);
			$values["EV100po"] = $pageObject->showDBValue("EV100po", $row);
			$values["EV150po"] = $pageObject->showDBValue("EV150po", $row);
			$values["pot"] = $pageObject->showDBValue("pot", $row);
			$values["Business Services"] = $pageObject->showDBValue("Business Services", $row);
			$values["Consumer Products"] = $pageObject->showDBValue("Consumer Products", $row);
			$values["Energy & Natural Resources"] = $pageObject->showDBValue("Energy & Natural Resources", $row);
			$values["Financial Services"] = $pageObject->showDBValue("Financial Services", $row);
			$values["Industrials"] = $pageObject->showDBValue("Industrials", $row);
			$values["Healthcare"] = $pageObject->showDBValue("Healthcare", $row);
			$values["Technology"] = $pageObject->showDBValue("Technology", $row);
			$values["Entertainment"] = $pageObject->showDBValue("Entertainment", $row);
			$values["Real Estate"] = $pageObject->showDBValue("Real Estate", $row);
			$values["Business Services EL"] = $pageObject->showDBValue("Business Services EL", $row);
			$values["Consumer EL"] = $pageObject->showDBValue("Consumer EL", $row);
			$values["Ennergy EL"] = $pageObject->showDBValue("Ennergy EL", $row);
			$values["Financial EL"] = $pageObject->showDBValue("Financial EL", $row);
			$values["Industrials EL"] = $pageObject->showDBValue("Industrials EL", $row);
			$values["Healthcare EL"] = $pageObject->showDBValue("Healthcare EL", $row);
			$values["TMT EL"] = $pageObject->showDBValue("TMT EL", $row);
			$values["Entertainment EL"] = $pageObject->showDBValue("Entertainment EL", $row);
			$values["RealEstate EL"] = $pageObject->showDBValue("RealEstate EL", $row);
			$values["IBSreferrals"] = $pageObject->showDBValue("IBSreferrals", $row);
			$values["IBSibc"] = $pageObject->showDBValue("IBSibc", $row);
			$values["IBSel"] = $pageObject->showDBValue("IBSel", $row);
			$values["PPibc"] = $pageObject->showDBValue("PPibc", $row);
			$values["PPel"] = $pageObject->showDBValue("PPel", $row);
			$values["CPibc"] = $pageObject->showDBValue("CPibc", $row);
			$values["CPel"] = $pageObject->showDBValue("CPel", $row);
			$values["MAibc"] = $pageObject->showDBValue("MAibc", $row);
			$values["MAel"] = $pageObject->showDBValue("MAel", $row);
			$values["SCibc"] = $pageObject->showDBValue("SCibc", $row);
			$values["SCel"] = $pageObject->showDBValue("SCel", $row);
			$values["SSibc"] = $pageObject->showDBValue("SSibc", $row);
			$values["SSel"] = $pageObject->showDBValue("SSel", $row);
			$values["IBSper"] = $pageObject->showDBValue("IBSper", $row);
			$values["PPper"] = $pageObject->showDBValue("PPper", $row);
			$values["CPper"] = $pageObject->showDBValue("CPper", $row);
			$values["MAper"] = $pageObject->showDBValue("MAper", $row);
			$values["SCSper"] = $pageObject->showDBValue("SCSper", $row);
			$values["SSper"] = $pageObject->showDBValue("SSper", $row);
			$values["IBSper2"] = $pageObject->showDBValue("IBSper2", $row);
			$values["PPper2"] = $pageObject->showDBValue("PPper2", $row);
			$values["CPper2"] = $pageObject->showDBValue("CPper2", $row);
			$values["MAper2"] = $pageObject->showDBValue("MAper2", $row);
			$values["SCSper2"] = $pageObject->showDBValue("SCSper2", $row);
			$values["SSper2"] = $pageObject->showDBValue("SSper2", $row);
			$values["IBCperMD"] = $pageObject->showDBValue("IBCperMD", $row);
			$values["IBCTotalMD"] = $pageObject->showDBValue("IBCTotalMD", $row);
			$values["IBCYTDTarget"] = $pageObject->showDBValue("IBCYTDTarget", $row);
			$values["IBuper"] = $pageObject->showDBValue("IBuper", $row);
			$values["ELperMD"] = $pageObject->showDBValue("ELperMD", $row);
			$values["ELTotalMD"] = $pageObject->showDBValue("ELTotalMD", $row);
			$values["ELYTDTarget"] = $pageObject->showDBValue("ELYTDTarget", $row);
			$values["eluper"] = $pageObject->showDBValue("eluper", $row);
			$values["ClosingperMD"] = $pageObject->showDBValue("ClosingperMD", $row);
			$values["ClosingTotalMD"] = $pageObject->showDBValue("ClosingTotalMD", $row);
			$values["ClosingYTDMD"] = $pageObject->showDBValue("ClosingYTDMD", $row);
			$values["Closinguper"] = $pageObject->showDBValue("Closinguper", $row);
			$values["MGMTnetthis"] = $pageObject->showDBValue("MGMTnetthis", $row);
			$values["MGMTG"] = $pageObject->showDBValue("MGMTG", $row);
			$values["MGMTnetnext"] = $pageObject->showDBValue("MGMTnetnext", $row);
			$values["MGMTN"] = $pageObject->showDBValue("MGMTN", $row);
			$values["NetActual"] = $pageObject->showDBValue("NetActual", $row);
			$values["TYBG"] = $pageObject->showDBValue("TYBG", $row);
			$values["TYBN"] = $pageObject->showDBValue("TYBN", $row);
			$values["YTDgrossact"] = $pageObject->showDBValue("YTDgrossact", $row);
			$values["YTDnetact"] = $pageObject->showDBValue("YTDnetact", $row);
			$values["YTDgross"] = $pageObject->showDBValue("YTDgross", $row);
			$values["ytdgrossper"] = $pageObject->showDBValue("ytdgrossper", $row);
			$values["ytdnetper"] = $pageObject->showDBValue("ytdnetper", $row);
			$values["mytdgrossper"] = $pageObject->showDBValue("mytdgrossper", $row);
			$values["mytdnetper"] = $pageObject->showDBValue("mytdnetper", $row);
		
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
	header("Content-Disposition: attachment;Filename=Snapshot.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Live\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"InMarketLOI\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Closed\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda12\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda11\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda10\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda9\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda8\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda7\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nda1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NDAYTD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELJan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELFeb\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELMar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELApril\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELMay\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELJune\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELJuly\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELAug\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELSep\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELOct\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELNov\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELDec\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLJan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLeb\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLMar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLApril\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLMay\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLJune\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLJuly\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLAug\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLSep\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLOct\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLNov\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IMLDec\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC12\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC11\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC10\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC9\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC8\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC7\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBC1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL12\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL11\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL10\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL9\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL8\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL7\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EL1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL12\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL11\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL10\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL9\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL8\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL7\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CL1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"PreMarket\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"InMarket\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"UNderLOI\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Inactive\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"OnHold\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Wheelhouse\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Speculative\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Minimum\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10SS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25SS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75SS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100SS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150SS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"sst\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10BS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25BS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75BS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100BS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150BS\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bst\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10eq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25eq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75eq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100eq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150eq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"eqt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10d\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25d\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75d\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100d\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150d\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10ad\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25ad\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75ad\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100ad\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150ad\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"adt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10p\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25p\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75p\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100p\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150p\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10pe\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25pe\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75pe\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100pe\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150pe\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pet\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV10po\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV25po\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV75po\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV100po\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"EV150po\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pot\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Business Services\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Consumer Products\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Energy & Natural Resources\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Financial Services\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Industrials\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Healthcare\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Technology\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Entertainment\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Real Estate\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Business Services EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Consumer EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Ennergy EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Financial EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Industrials EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Healthcare EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TMT EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Entertainment EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"RealEstate EL\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBSreferrals\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBSibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBSel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"PPibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"PPel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CPibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CPel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MAibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MAel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SCibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SCel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SSibc\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SSel\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBSper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"PPper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CPper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MAper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SCSper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SSper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBSper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"PPper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"CPper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MAper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SCSper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"SSper2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBCperMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBCTotalMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBCYTDTarget\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"IBuper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELperMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELTotalMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ELYTDTarget\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"eluper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ClosingperMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ClosingTotalMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ClosingYTDMD\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Closinguper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MGMTnetthis\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MGMTG\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MGMTnetnext\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"MGMTN\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NetActual\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TYBG\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TYBN\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTDgrossact\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTDnetact\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"YTDgross\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ytdgrossper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ytdnetper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"mytdgrossper\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"mytdnetper\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["Live"] = $pageObject->getViewControl("Live")->showDBValue($row, "");
			$values["InMarketLOI"] = $pageObject->getViewControl("InMarketLOI")->showDBValue($row, "");
			$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
			$values["EL"] = $pageObject->getViewControl("EL")->showDBValue($row, "");
			$values["IBC"] = $pageObject->getViewControl("IBC")->showDBValue($row, "");
			$values["nda12"] = $pageObject->getViewControl("nda12")->showDBValue($row, "");
			$values["nda11"] = $pageObject->getViewControl("nda11")->showDBValue($row, "");
			$values["nda10"] = $pageObject->getViewControl("nda10")->showDBValue($row, "");
			$values["nda9"] = $pageObject->getViewControl("nda9")->showDBValue($row, "");
			$values["nda8"] = $pageObject->getViewControl("nda8")->showDBValue($row, "");
			$values["nda7"] = $pageObject->getViewControl("nda7")->showDBValue($row, "");
			$values["nda6"] = $pageObject->getViewControl("nda6")->showDBValue($row, "");
			$values["nda5"] = $pageObject->getViewControl("nda5")->showDBValue($row, "");
			$values["nda4"] = $pageObject->getViewControl("nda4")->showDBValue($row, "");
			$values["nda3"] = $pageObject->getViewControl("nda3")->showDBValue($row, "");
			$values["nda2"] = $pageObject->getViewControl("nda2")->showDBValue($row, "");
			$values["nda1"] = $pageObject->getViewControl("nda1")->showDBValue($row, "");
			$values["NDAYTD"] = $pageObject->getViewControl("NDAYTD")->showDBValue($row, "");
			$values["ELJan"] = $pageObject->getViewControl("ELJan")->showDBValue($row, "");
			$values["ELFeb"] = $pageObject->getViewControl("ELFeb")->showDBValue($row, "");
			$values["ELMar"] = $pageObject->getViewControl("ELMar")->showDBValue($row, "");
			$values["ELApril"] = $pageObject->getViewControl("ELApril")->showDBValue($row, "");
			$values["ELMay"] = $pageObject->getViewControl("ELMay")->showDBValue($row, "");
			$values["ELJune"] = $pageObject->getViewControl("ELJune")->showDBValue($row, "");
			$values["ELJuly"] = $pageObject->getViewControl("ELJuly")->showDBValue($row, "");
			$values["ELAug"] = $pageObject->getViewControl("ELAug")->showDBValue($row, "");
			$values["ELSep"] = $pageObject->getViewControl("ELSep")->showDBValue($row, "");
			$values["ELOct"] = $pageObject->getViewControl("ELOct")->showDBValue($row, "");
			$values["ELNov"] = $pageObject->getViewControl("ELNov")->showDBValue($row, "");
			$values["ELDec"] = $pageObject->getViewControl("ELDec")->showDBValue($row, "");
			$values["IMLJan"] = $pageObject->getViewControl("IMLJan")->showDBValue($row, "");
			$values["IMLeb"] = $pageObject->getViewControl("IMLeb")->showDBValue($row, "");
			$values["IMLMar"] = $pageObject->getViewControl("IMLMar")->showDBValue($row, "");
			$values["IMLApril"] = $pageObject->getViewControl("IMLApril")->showDBValue($row, "");
			$values["IMLMay"] = $pageObject->getViewControl("IMLMay")->showDBValue($row, "");
			$values["IMLJune"] = $pageObject->getViewControl("IMLJune")->showDBValue($row, "");
			$values["IMLJuly"] = $pageObject->getViewControl("IMLJuly")->showDBValue($row, "");
			$values["IMLAug"] = $pageObject->getViewControl("IMLAug")->showDBValue($row, "");
			$values["IMLSep"] = $pageObject->getViewControl("IMLSep")->showDBValue($row, "");
			$values["IMLOct"] = $pageObject->getViewControl("IMLOct")->showDBValue($row, "");
			$values["IMLNov"] = $pageObject->getViewControl("IMLNov")->showDBValue($row, "");
			$values["IMLDec"] = $pageObject->getViewControl("IMLDec")->showDBValue($row, "");
			$values["IBC12"] = $pageObject->getViewControl("IBC12")->showDBValue($row, "");
			$values["IBC11"] = $pageObject->getViewControl("IBC11")->showDBValue($row, "");
			$values["IBC10"] = $pageObject->getViewControl("IBC10")->showDBValue($row, "");
			$values["IBC9"] = $pageObject->getViewControl("IBC9")->showDBValue($row, "");
			$values["IBC8"] = $pageObject->getViewControl("IBC8")->showDBValue($row, "");
			$values["IBC7"] = $pageObject->getViewControl("IBC7")->showDBValue($row, "");
			$values["IBC6"] = $pageObject->getViewControl("IBC6")->showDBValue($row, "");
			$values["IBC5"] = $pageObject->getViewControl("IBC5")->showDBValue($row, "");
			$values["IBC4"] = $pageObject->getViewControl("IBC4")->showDBValue($row, "");
			$values["IBC3"] = $pageObject->getViewControl("IBC3")->showDBValue($row, "");
			$values["IBC2"] = $pageObject->getViewControl("IBC2")->showDBValue($row, "");
			$values["IBC1"] = $pageObject->getViewControl("IBC1")->showDBValue($row, "");
			$values["EL12"] = $pageObject->getViewControl("EL12")->showDBValue($row, "");
			$values["EL11"] = $pageObject->getViewControl("EL11")->showDBValue($row, "");
			$values["EL10"] = $pageObject->getViewControl("EL10")->showDBValue($row, "");
			$values["EL9"] = $pageObject->getViewControl("EL9")->showDBValue($row, "");
			$values["EL8"] = $pageObject->getViewControl("EL8")->showDBValue($row, "");
			$values["EL7"] = $pageObject->getViewControl("EL7")->showDBValue($row, "");
			$values["EL6"] = $pageObject->getViewControl("EL6")->showDBValue($row, "");
			$values["EL5"] = $pageObject->getViewControl("EL5")->showDBValue($row, "");
			$values["EL4"] = $pageObject->getViewControl("EL4")->showDBValue($row, "");
			$values["EL3"] = $pageObject->getViewControl("EL3")->showDBValue($row, "");
			$values["EL2"] = $pageObject->getViewControl("EL2")->showDBValue($row, "");
			$values["EL1"] = $pageObject->getViewControl("EL1")->showDBValue($row, "");
			$values["CL12"] = $pageObject->getViewControl("CL12")->showDBValue($row, "");
			$values["CL11"] = $pageObject->getViewControl("CL11")->showDBValue($row, "");
			$values["CL10"] = $pageObject->getViewControl("CL10")->showDBValue($row, "");
			$values["CL9"] = $pageObject->getViewControl("CL9")->showDBValue($row, "");
			$values["CL8"] = $pageObject->getViewControl("CL8")->showDBValue($row, "");
			$values["CL7"] = $pageObject->getViewControl("CL7")->showDBValue($row, "");
			$values["CL6"] = $pageObject->getViewControl("CL6")->showDBValue($row, "");
			$values["CL5"] = $pageObject->getViewControl("CL5")->showDBValue($row, "");
			$values["CL4"] = $pageObject->getViewControl("CL4")->showDBValue($row, "");
			$values["CL3"] = $pageObject->getViewControl("CL3")->showDBValue($row, "");
			$values["CL2"] = $pageObject->getViewControl("CL2")->showDBValue($row, "");
			$values["CL1"] = $pageObject->getViewControl("CL1")->showDBValue($row, "");
			$values["PreMarket"] = $pageObject->getViewControl("PreMarket")->showDBValue($row, "");
			$values["InMarket"] = $pageObject->getViewControl("InMarket")->showDBValue($row, "");
			$values["UNderLOI"] = $pageObject->getViewControl("UNderLOI")->showDBValue($row, "");
			$values["Inactive"] = $pageObject->getViewControl("Inactive")->showDBValue($row, "");
			$values["OnHold"] = $pageObject->getViewControl("OnHold")->showDBValue($row, "");
			$values["Wheelhouse"] = $pageObject->getViewControl("Wheelhouse")->showDBValue($row, "");
			$values["Speculative"] = $pageObject->getViewControl("Speculative")->showDBValue($row, "");
			$values["Minimum"] = $pageObject->getViewControl("Minimum")->showDBValue($row, "");
			$values["EV10SS"] = $pageObject->getViewControl("EV10SS")->showDBValue($row, "");
			$values["EV25SS"] = $pageObject->getViewControl("EV25SS")->showDBValue($row, "");
			$values["EV75SS"] = $pageObject->getViewControl("EV75SS")->showDBValue($row, "");
			$values["EV100SS"] = $pageObject->getViewControl("EV100SS")->showDBValue($row, "");
			$values["EV150SS"] = $pageObject->getViewControl("EV150SS")->showDBValue($row, "");
			$values["sst"] = $pageObject->getViewControl("sst")->showDBValue($row, "");
			$values["EV10BS"] = $pageObject->getViewControl("EV10BS")->showDBValue($row, "");
			$values["EV25BS"] = $pageObject->getViewControl("EV25BS")->showDBValue($row, "");
			$values["EV75BS"] = $pageObject->getViewControl("EV75BS")->showDBValue($row, "");
			$values["EV100BS"] = $pageObject->getViewControl("EV100BS")->showDBValue($row, "");
			$values["EV150BS"] = $pageObject->getViewControl("EV150BS")->showDBValue($row, "");
			$values["bst"] = $pageObject->getViewControl("bst")->showDBValue($row, "");
			$values["EV10eq"] = $pageObject->getViewControl("EV10eq")->showDBValue($row, "");
			$values["EV25eq"] = $pageObject->getViewControl("EV25eq")->showDBValue($row, "");
			$values["EV75eq"] = $pageObject->getViewControl("EV75eq")->showDBValue($row, "");
			$values["EV100eq"] = $pageObject->getViewControl("EV100eq")->showDBValue($row, "");
			$values["EV150eq"] = $pageObject->getViewControl("EV150eq")->showDBValue($row, "");
			$values["eqt"] = $pageObject->getViewControl("eqt")->showDBValue($row, "");
			$values["EV10d"] = $pageObject->getViewControl("EV10d")->showDBValue($row, "");
			$values["EV25d"] = $pageObject->getViewControl("EV25d")->showDBValue($row, "");
			$values["EV75d"] = $pageObject->getViewControl("EV75d")->showDBValue($row, "");
			$values["EV100d"] = $pageObject->getViewControl("EV100d")->showDBValue($row, "");
			$values["EV150d"] = $pageObject->getViewControl("EV150d")->showDBValue($row, "");
			$values["dt"] = $pageObject->getViewControl("dt")->showDBValue($row, "");
			$values["EV10ad"] = $pageObject->getViewControl("EV10ad")->showDBValue($row, "");
			$values["EV25ad"] = $pageObject->getViewControl("EV25ad")->showDBValue($row, "");
			$values["EV75ad"] = $pageObject->getViewControl("EV75ad")->showDBValue($row, "");
			$values["EV100ad"] = $pageObject->getViewControl("EV100ad")->showDBValue($row, "");
			$values["EV150ad"] = $pageObject->getViewControl("EV150ad")->showDBValue($row, "");
			$values["adt"] = $pageObject->getViewControl("adt")->showDBValue($row, "");
			$values["EV10p"] = $pageObject->getViewControl("EV10p")->showDBValue($row, "");
			$values["EV25p"] = $pageObject->getViewControl("EV25p")->showDBValue($row, "");
			$values["EV75p"] = $pageObject->getViewControl("EV75p")->showDBValue($row, "");
			$values["EV100p"] = $pageObject->getViewControl("EV100p")->showDBValue($row, "");
			$values["EV150p"] = $pageObject->getViewControl("EV150p")->showDBValue($row, "");
			$values["pt"] = $pageObject->getViewControl("pt")->showDBValue($row, "");
			$values["EV10pe"] = $pageObject->getViewControl("EV10pe")->showDBValue($row, "");
			$values["EV25pe"] = $pageObject->getViewControl("EV25pe")->showDBValue($row, "");
			$values["EV75pe"] = $pageObject->getViewControl("EV75pe")->showDBValue($row, "");
			$values["EV100pe"] = $pageObject->getViewControl("EV100pe")->showDBValue($row, "");
			$values["EV150pe"] = $pageObject->getViewControl("EV150pe")->showDBValue($row, "");
			$values["pet"] = $pageObject->getViewControl("pet")->showDBValue($row, "");
			$values["EV10po"] = $pageObject->getViewControl("EV10po")->showDBValue($row, "");
			$values["EV25po"] = $pageObject->getViewControl("EV25po")->showDBValue($row, "");
			$values["EV75po"] = $pageObject->getViewControl("EV75po")->showDBValue($row, "");
			$values["EV100po"] = $pageObject->getViewControl("EV100po")->showDBValue($row, "");
			$values["EV150po"] = $pageObject->getViewControl("EV150po")->showDBValue($row, "");
			$values["pot"] = $pageObject->getViewControl("pot")->showDBValue($row, "");
			$values["Business Services"] = $pageObject->getViewControl("Business Services")->showDBValue($row, "");
			$values["Consumer Products"] = $pageObject->getViewControl("Consumer Products")->showDBValue($row, "");
			$values["Energy & Natural Resources"] = $pageObject->getViewControl("Energy & Natural Resources")->showDBValue($row, "");
			$values["Financial Services"] = $pageObject->getViewControl("Financial Services")->showDBValue($row, "");
			$values["Industrials"] = $pageObject->getViewControl("Industrials")->showDBValue($row, "");
			$values["Healthcare"] = $pageObject->getViewControl("Healthcare")->showDBValue($row, "");
			$values["Technology"] = $pageObject->getViewControl("Technology")->showDBValue($row, "");
			$values["Entertainment"] = $pageObject->getViewControl("Entertainment")->showDBValue($row, "");
			$values["Real Estate"] = $pageObject->getViewControl("Real Estate")->showDBValue($row, "");
			$values["Business Services EL"] = $pageObject->getViewControl("Business Services EL")->showDBValue($row, "");
			$values["Consumer EL"] = $pageObject->getViewControl("Consumer EL")->showDBValue($row, "");
			$values["Ennergy EL"] = $pageObject->getViewControl("Ennergy EL")->showDBValue($row, "");
			$values["Financial EL"] = $pageObject->getViewControl("Financial EL")->showDBValue($row, "");
			$values["Industrials EL"] = $pageObject->getViewControl("Industrials EL")->showDBValue($row, "");
			$values["Healthcare EL"] = $pageObject->getViewControl("Healthcare EL")->showDBValue($row, "");
			$values["TMT EL"] = $pageObject->getViewControl("TMT EL")->showDBValue($row, "");
			$values["Entertainment EL"] = $pageObject->getViewControl("Entertainment EL")->showDBValue($row, "");
			$values["RealEstate EL"] = $pageObject->getViewControl("RealEstate EL")->showDBValue($row, "");
			$values["IBSreferrals"] = $pageObject->getViewControl("IBSreferrals")->showDBValue($row, "");
			$values["IBSibc"] = $pageObject->getViewControl("IBSibc")->showDBValue($row, "");
			$values["IBSel"] = $pageObject->getViewControl("IBSel")->showDBValue($row, "");
			$values["PPibc"] = $pageObject->getViewControl("PPibc")->showDBValue($row, "");
			$values["PPel"] = $pageObject->getViewControl("PPel")->showDBValue($row, "");
			$values["CPibc"] = $pageObject->getViewControl("CPibc")->showDBValue($row, "");
			$values["CPel"] = $pageObject->getViewControl("CPel")->showDBValue($row, "");
			$values["MAibc"] = $pageObject->getViewControl("MAibc")->showDBValue($row, "");
			$values["MAel"] = $pageObject->getViewControl("MAel")->showDBValue($row, "");
			$values["SCibc"] = $pageObject->getViewControl("SCibc")->showDBValue($row, "");
			$values["SCel"] = $pageObject->getViewControl("SCel")->showDBValue($row, "");
			$values["SSibc"] = $pageObject->getViewControl("SSibc")->showDBValue($row, "");
			$values["SSel"] = $pageObject->getViewControl("SSel")->showDBValue($row, "");
			$values["IBSper"] = $pageObject->getViewControl("IBSper")->showDBValue($row, "");
			$values["PPper"] = $pageObject->getViewControl("PPper")->showDBValue($row, "");
			$values["CPper"] = $pageObject->getViewControl("CPper")->showDBValue($row, "");
			$values["MAper"] = $pageObject->getViewControl("MAper")->showDBValue($row, "");
			$values["SCSper"] = $pageObject->getViewControl("SCSper")->showDBValue($row, "");
			$values["SSper"] = $pageObject->getViewControl("SSper")->showDBValue($row, "");
			$values["IBSper2"] = $pageObject->getViewControl("IBSper2")->showDBValue($row, "");
			$values["PPper2"] = $pageObject->getViewControl("PPper2")->showDBValue($row, "");
			$values["CPper2"] = $pageObject->getViewControl("CPper2")->showDBValue($row, "");
			$values["MAper2"] = $pageObject->getViewControl("MAper2")->showDBValue($row, "");
			$values["SCSper2"] = $pageObject->getViewControl("SCSper2")->showDBValue($row, "");
			$values["SSper2"] = $pageObject->getViewControl("SSper2")->showDBValue($row, "");
			$values["IBCperMD"] = $pageObject->getViewControl("IBCperMD")->showDBValue($row, "");
			$values["IBCTotalMD"] = $pageObject->getViewControl("IBCTotalMD")->showDBValue($row, "");
			$values["IBCYTDTarget"] = $pageObject->getViewControl("IBCYTDTarget")->showDBValue($row, "");
			$values["IBuper"] = $pageObject->getViewControl("IBuper")->showDBValue($row, "");
			$values["ELperMD"] = $pageObject->getViewControl("ELperMD")->showDBValue($row, "");
			$values["ELTotalMD"] = $pageObject->getViewControl("ELTotalMD")->showDBValue($row, "");
			$values["ELYTDTarget"] = $pageObject->getViewControl("ELYTDTarget")->showDBValue($row, "");
			$values["eluper"] = $pageObject->getViewControl("eluper")->showDBValue($row, "");
			$values["ClosingperMD"] = $pageObject->getViewControl("ClosingperMD")->showDBValue($row, "");
			$values["ClosingTotalMD"] = $pageObject->getViewControl("ClosingTotalMD")->showDBValue($row, "");
			$values["ClosingYTDMD"] = $pageObject->getViewControl("ClosingYTDMD")->showDBValue($row, "");
			$values["Closinguper"] = $pageObject->getViewControl("Closinguper")->showDBValue($row, "");
			$values["MGMTnetthis"] = $pageObject->getViewControl("MGMTnetthis")->showDBValue($row, "");
			$values["MGMTG"] = $pageObject->getViewControl("MGMTG")->showDBValue($row, "");
			$values["MGMTnetnext"] = $pageObject->getViewControl("MGMTnetnext")->showDBValue($row, "");
			$values["MGMTN"] = $pageObject->getViewControl("MGMTN")->showDBValue($row, "");
			$values["NetActual"] = $pageObject->getViewControl("NetActual")->showDBValue($row, "");
			$values["TYBG"] = $pageObject->getViewControl("TYBG")->showDBValue($row, "");
			$values["TYBN"] = $pageObject->getViewControl("TYBN")->showDBValue($row, "");
			$values["YTDgrossact"] = $pageObject->getViewControl("YTDgrossact")->showDBValue($row, "");
			$values["YTDnetact"] = $pageObject->getViewControl("YTDnetact")->showDBValue($row, "");
			$values["YTDgross"] = $pageObject->getViewControl("YTDgross")->showDBValue($row, "");
			$values["ytdgrossper"] = $pageObject->getViewControl("ytdgrossper")->showDBValue($row, "");
			$values["ytdnetper"] = $pageObject->getViewControl("ytdnetper")->showDBValue($row, "");
			$values["mytdgrossper"] = $pageObject->getViewControl("mytdgrossper")->showDBValue($row, "");
			$values["mytdnetper"] = $pageObject->getViewControl("mytdnetper")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["Live"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["InMarketLOI"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Closed"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda12"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda11"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda10"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda9"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda8"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda7"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["nda1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["NDAYTD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELJan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELFeb"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELMar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELApril"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELMay"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELJune"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELJuly"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELAug"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELSep"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELOct"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELNov"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELDec"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLJan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLeb"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLMar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLApril"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLMay"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLJune"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLJuly"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLAug"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLSep"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLOct"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLNov"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IMLDec"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC12"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC11"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC10"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC9"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC8"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC7"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBC1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL12"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL11"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL10"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL9"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL8"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL7"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EL1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL12"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL11"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL10"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL9"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL8"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL7"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CL1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["PreMarket"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["InMarket"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["UNderLOI"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Inactive"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["OnHold"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Wheelhouse"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Speculative"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Minimum"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10SS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25SS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75SS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100SS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150SS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["sst"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10BS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25BS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75BS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100BS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150BS"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bst"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10eq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25eq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75eq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100eq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150eq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["eqt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10d"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25d"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75d"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100d"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150d"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["dt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10ad"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25ad"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75ad"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100ad"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150ad"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["adt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10p"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25p"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75p"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100p"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150p"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10pe"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25pe"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75pe"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100pe"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150pe"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pet"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV10po"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV25po"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV75po"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV100po"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["EV150po"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pot"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Business Services"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Consumer Products"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Energy & Natural Resources"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Financial Services"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Industrials"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Healthcare"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Technology"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Entertainment"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Real Estate"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Business Services EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Consumer EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Ennergy EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Financial EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Industrials EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Healthcare EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["TMT EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Entertainment EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["RealEstate EL"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBSreferrals"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBSibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBSel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["PPibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["PPel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CPibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CPel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MAibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MAel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SCibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SCel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SSibc"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SSel"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBSper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["PPper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CPper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MAper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SCSper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SSper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBSper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["PPper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["CPper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MAper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SCSper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["SSper2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBCperMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBCTotalMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBCYTDTarget"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["IBuper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELperMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELTotalMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ELYTDTarget"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["eluper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ClosingperMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ClosingTotalMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ClosingYTDMD"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["Closinguper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MGMTnetthis"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MGMTG"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MGMTnetnext"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["MGMTN"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["NetActual"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["TYBG"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["TYBN"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTDgrossact"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTDnetact"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["YTDgross"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ytdgrossper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ytdnetper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["mytdgrossper"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["mytdnetper"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Live").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("In Market LOI").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closed").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda12").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda11").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda10").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda9").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda8").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda7").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nda1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("NDAYTD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELJan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELFeb").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELMar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELApril").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELMay").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELJune").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELJuly").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELAug").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELSep").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELOct").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELNov").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELDec").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLJan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLeb").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLMar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLApril").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLMay").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLJune").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLJuly").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLAug").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLSep").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLOct").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLNov").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IMLDec").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC12").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC11").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC10").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC9").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC8").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC7").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBC1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL12").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL11").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL10").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL9").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL8").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL7").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EL1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL12").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL11").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL10").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL9").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL8").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL7").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CL1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pre Market").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("In Market").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("UNder LOI").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Inactive").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("On Hold").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wheelhouse").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Speculative").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Minimum").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10SS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25SS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75SS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100SS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150SS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Sst").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10BS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25BS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75BS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100BS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150BS").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bst").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10eq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25eq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75eq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100eq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150eq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Eqt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10d").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25d").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75d").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100d").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150d").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Dt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10ad").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25ad").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75ad").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100ad").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150ad").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Adt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10p").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25p").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75p").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100p").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150p").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10pe").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25pe").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75pe").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100pe").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150pe").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pet").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV10po").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV25po").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV75po").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV100po").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("EV150po").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pot").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Business Services").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Consumer Products").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Energy & Natural Resources").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Financial Services").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Industrials").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Healthcare").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Technology").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Entertainment").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Real Estate").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Business Services EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Consumer EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ennergy EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Financial EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Industrials EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Healthcare EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TMT EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Entertainment EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("RealEstate EL").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBSreferrals").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBSibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBSel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("PPibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("PPel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CPibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CPel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MAibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MAel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SCibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SCel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SSibc").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SSel").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBSper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("PPper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CPper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MAper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SCSper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SSper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBSper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("PPper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("CPper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MAper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SCSper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("SSper2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBCper MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBCTotal MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBCYTDTarget").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("IBuper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELper MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELTotal MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("ELYTDTarget").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Eluper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closingper MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closing Total MD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closing YTDMD").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Closinguper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MGMTnetthis").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MGMTG").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MGMTnetnext").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("MGMTN").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Net Actual").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TYBG").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TYBN").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTDgrossact").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTDnetact").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("YTDgross").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ytdgrossper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ytdnetper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mytdgrossper").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mytdnetper").'</td>';	
	}
	else
	{
		echo "<td>"."Live"."</td>";
		echo "<td>"."In Market LOI"."</td>";
		echo "<td>"."Closed"."</td>";
		echo "<td>"."EL"."</td>";
		echo "<td>"."IBC"."</td>";
		echo "<td>"."Nda12"."</td>";
		echo "<td>"."Nda11"."</td>";
		echo "<td>"."Nda10"."</td>";
		echo "<td>"."Nda9"."</td>";
		echo "<td>"."Nda8"."</td>";
		echo "<td>"."Nda7"."</td>";
		echo "<td>"."Nda6"."</td>";
		echo "<td>"."Nda5"."</td>";
		echo "<td>"."Nda4"."</td>";
		echo "<td>"."Nda3"."</td>";
		echo "<td>"."Nda2"."</td>";
		echo "<td>"."Nda1"."</td>";
		echo "<td>"."NDAYTD"."</td>";
		echo "<td>"."ELJan"."</td>";
		echo "<td>"."ELFeb"."</td>";
		echo "<td>"."ELMar"."</td>";
		echo "<td>"."ELApril"."</td>";
		echo "<td>"."ELMay"."</td>";
		echo "<td>"."ELJune"."</td>";
		echo "<td>"."ELJuly"."</td>";
		echo "<td>"."ELAug"."</td>";
		echo "<td>"."ELSep"."</td>";
		echo "<td>"."ELOct"."</td>";
		echo "<td>"."ELNov"."</td>";
		echo "<td>"."ELDec"."</td>";
		echo "<td>"."IMLJan"."</td>";
		echo "<td>"."IMLeb"."</td>";
		echo "<td>"."IMLMar"."</td>";
		echo "<td>"."IMLApril"."</td>";
		echo "<td>"."IMLMay"."</td>";
		echo "<td>"."IMLJune"."</td>";
		echo "<td>"."IMLJuly"."</td>";
		echo "<td>"."IMLAug"."</td>";
		echo "<td>"."IMLSep"."</td>";
		echo "<td>"."IMLOct"."</td>";
		echo "<td>"."IMLNov"."</td>";
		echo "<td>"."IMLDec"."</td>";
		echo "<td>"."IBC12"."</td>";
		echo "<td>"."IBC11"."</td>";
		echo "<td>"."IBC10"."</td>";
		echo "<td>"."IBC9"."</td>";
		echo "<td>"."IBC8"."</td>";
		echo "<td>"."IBC7"."</td>";
		echo "<td>"."IBC6"."</td>";
		echo "<td>"."IBC5"."</td>";
		echo "<td>"."IBC4"."</td>";
		echo "<td>"."IBC3"."</td>";
		echo "<td>"."IBC2"."</td>";
		echo "<td>"."IBC1"."</td>";
		echo "<td>"."EL12"."</td>";
		echo "<td>"."EL11"."</td>";
		echo "<td>"."EL10"."</td>";
		echo "<td>"."EL9"."</td>";
		echo "<td>"."EL8"."</td>";
		echo "<td>"."EL7"."</td>";
		echo "<td>"."EL6"."</td>";
		echo "<td>"."EL5"."</td>";
		echo "<td>"."EL4"."</td>";
		echo "<td>"."EL3"."</td>";
		echo "<td>"."EL2"."</td>";
		echo "<td>"."EL1"."</td>";
		echo "<td>"."CL12"."</td>";
		echo "<td>"."CL11"."</td>";
		echo "<td>"."CL10"."</td>";
		echo "<td>"."CL9"."</td>";
		echo "<td>"."CL8"."</td>";
		echo "<td>"."CL7"."</td>";
		echo "<td>"."CL6"."</td>";
		echo "<td>"."CL5"."</td>";
		echo "<td>"."CL4"."</td>";
		echo "<td>"."CL3"."</td>";
		echo "<td>"."CL2"."</td>";
		echo "<td>"."CL1"."</td>";
		echo "<td>"."Pre Market"."</td>";
		echo "<td>"."In Market"."</td>";
		echo "<td>"."UNder LOI"."</td>";
		echo "<td>"."Inactive"."</td>";
		echo "<td>"."On Hold"."</td>";
		echo "<td>"."Wheelhouse"."</td>";
		echo "<td>"."Speculative"."</td>";
		echo "<td>"."Minimum"."</td>";
		echo "<td>"."EV10SS"."</td>";
		echo "<td>"."EV25SS"."</td>";
		echo "<td>"."EV75SS"."</td>";
		echo "<td>"."EV100SS"."</td>";
		echo "<td>"."EV150SS"."</td>";
		echo "<td>"."Sst"."</td>";
		echo "<td>"."EV10BS"."</td>";
		echo "<td>"."EV25BS"."</td>";
		echo "<td>"."EV75BS"."</td>";
		echo "<td>"."EV100BS"."</td>";
		echo "<td>"."EV150BS"."</td>";
		echo "<td>"."Bst"."</td>";
		echo "<td>"."EV10eq"."</td>";
		echo "<td>"."EV25eq"."</td>";
		echo "<td>"."EV75eq"."</td>";
		echo "<td>"."EV100eq"."</td>";
		echo "<td>"."EV150eq"."</td>";
		echo "<td>"."Eqt"."</td>";
		echo "<td>"."EV10d"."</td>";
		echo "<td>"."EV25d"."</td>";
		echo "<td>"."EV75d"."</td>";
		echo "<td>"."EV100d"."</td>";
		echo "<td>"."EV150d"."</td>";
		echo "<td>"."Dt"."</td>";
		echo "<td>"."EV10ad"."</td>";
		echo "<td>"."EV25ad"."</td>";
		echo "<td>"."EV75ad"."</td>";
		echo "<td>"."EV100ad"."</td>";
		echo "<td>"."EV150ad"."</td>";
		echo "<td>"."Adt"."</td>";
		echo "<td>"."EV10p"."</td>";
		echo "<td>"."EV25p"."</td>";
		echo "<td>"."EV75p"."</td>";
		echo "<td>"."EV100p"."</td>";
		echo "<td>"."EV150p"."</td>";
		echo "<td>"."Pt"."</td>";
		echo "<td>"."EV10pe"."</td>";
		echo "<td>"."EV25pe"."</td>";
		echo "<td>"."EV75pe"."</td>";
		echo "<td>"."EV100pe"."</td>";
		echo "<td>"."EV150pe"."</td>";
		echo "<td>"."Pet"."</td>";
		echo "<td>"."EV10po"."</td>";
		echo "<td>"."EV25po"."</td>";
		echo "<td>"."EV75po"."</td>";
		echo "<td>"."EV100po"."</td>";
		echo "<td>"."EV150po"."</td>";
		echo "<td>"."Pot"."</td>";
		echo "<td>"."Business Services"."</td>";
		echo "<td>"."Consumer Products"."</td>";
		echo "<td>"."Energy & Natural Resources"."</td>";
		echo "<td>"."Financial Services"."</td>";
		echo "<td>"."Industrials"."</td>";
		echo "<td>"."Healthcare"."</td>";
		echo "<td>"."Technology"."</td>";
		echo "<td>"."Entertainment"."</td>";
		echo "<td>"."Real Estate"."</td>";
		echo "<td>"."Business Services EL"."</td>";
		echo "<td>"."Consumer EL"."</td>";
		echo "<td>"."Ennergy EL"."</td>";
		echo "<td>"."Financial EL"."</td>";
		echo "<td>"."Industrials EL"."</td>";
		echo "<td>"."Healthcare EL"."</td>";
		echo "<td>"."TMT EL"."</td>";
		echo "<td>"."Entertainment EL"."</td>";
		echo "<td>"."RealEstate EL"."</td>";
		echo "<td>"."IBSreferrals"."</td>";
		echo "<td>"."IBSibc"."</td>";
		echo "<td>"."IBSel"."</td>";
		echo "<td>"."PPibc"."</td>";
		echo "<td>"."PPel"."</td>";
		echo "<td>"."CPibc"."</td>";
		echo "<td>"."CPel"."</td>";
		echo "<td>"."MAibc"."</td>";
		echo "<td>"."MAel"."</td>";
		echo "<td>"."SCibc"."</td>";
		echo "<td>"."SCel"."</td>";
		echo "<td>"."SSibc"."</td>";
		echo "<td>"."SSel"."</td>";
		echo "<td>"."IBSper"."</td>";
		echo "<td>"."PPper"."</td>";
		echo "<td>"."CPper"."</td>";
		echo "<td>"."MAper"."</td>";
		echo "<td>"."SCSper"."</td>";
		echo "<td>"."SSper"."</td>";
		echo "<td>"."IBSper2"."</td>";
		echo "<td>"."PPper2"."</td>";
		echo "<td>"."CPper2"."</td>";
		echo "<td>"."MAper2"."</td>";
		echo "<td>"."SCSper2"."</td>";
		echo "<td>"."SSper2"."</td>";
		echo "<td>"."IBCper MD"."</td>";
		echo "<td>"."IBCTotal MD"."</td>";
		echo "<td>"."IBCYTDTarget"."</td>";
		echo "<td>"."IBuper"."</td>";
		echo "<td>"."ELper MD"."</td>";
		echo "<td>"."ELTotal MD"."</td>";
		echo "<td>"."ELYTDTarget"."</td>";
		echo "<td>"."Eluper"."</td>";
		echo "<td>"."Closingper MD"."</td>";
		echo "<td>"."Closing Total MD"."</td>";
		echo "<td>"."Closing YTDMD"."</td>";
		echo "<td>"."Closinguper"."</td>";
		echo "<td>"."MGMTnetthis"."</td>";
		echo "<td>"."MGMTG"."</td>";
		echo "<td>"."MGMTnetnext"."</td>";
		echo "<td>"."MGMTN"."</td>";
		echo "<td>"."Net Actual"."</td>";
		echo "<td>"."TYBG"."</td>";
		echo "<td>"."TYBN"."</td>";
		echo "<td>"."YTDgrossact"."</td>";
		echo "<td>"."YTDnetact"."</td>";
		echo "<td>"."YTDgross"."</td>";
		echo "<td>"."Ytdgrossper"."</td>";
		echo "<td>"."Ytdnetper"."</td>";
		echo "<td>"."Mytdgrossper"."</td>";
		echo "<td>"."Mytdnetper"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["Live"] = $pageObject->getViewControl("Live")->showDBValue($row, "");
					$values["InMarketLOI"] = $pageObject->getViewControl("InMarketLOI")->showDBValue($row, "");
					$values["Closed"] = $pageObject->getViewControl("Closed")->showDBValue($row, "");
					$values["EL"] = $pageObject->getViewControl("EL")->showDBValue($row, "");
					$values["IBC"] = $pageObject->getViewControl("IBC")->showDBValue($row, "");
					$values["nda12"] = $pageObject->getViewControl("nda12")->showDBValue($row, "");
					$values["nda11"] = $pageObject->getViewControl("nda11")->showDBValue($row, "");
					$values["nda10"] = $pageObject->getViewControl("nda10")->showDBValue($row, "");
					$values["nda9"] = $pageObject->getViewControl("nda9")->showDBValue($row, "");
					$values["nda8"] = $pageObject->getViewControl("nda8")->showDBValue($row, "");
					$values["nda7"] = $pageObject->getViewControl("nda7")->showDBValue($row, "");
					$values["nda6"] = $pageObject->getViewControl("nda6")->showDBValue($row, "");
					$values["nda5"] = $pageObject->getViewControl("nda5")->showDBValue($row, "");
					$values["nda4"] = $pageObject->getViewControl("nda4")->showDBValue($row, "");
					$values["nda3"] = $pageObject->getViewControl("nda3")->showDBValue($row, "");
					$values["nda2"] = $pageObject->getViewControl("nda2")->showDBValue($row, "");
					$values["nda1"] = $pageObject->getViewControl("nda1")->showDBValue($row, "");
					$values["NDAYTD"] = $pageObject->getViewControl("NDAYTD")->showDBValue($row, "");
					$values["ELJan"] = $pageObject->getViewControl("ELJan")->showDBValue($row, "");
					$values["ELFeb"] = $pageObject->getViewControl("ELFeb")->showDBValue($row, "");
					$values["ELMar"] = $pageObject->getViewControl("ELMar")->showDBValue($row, "");
					$values["ELApril"] = $pageObject->getViewControl("ELApril")->showDBValue($row, "");
					$values["ELMay"] = $pageObject->getViewControl("ELMay")->showDBValue($row, "");
					$values["ELJune"] = $pageObject->getViewControl("ELJune")->showDBValue($row, "");
					$values["ELJuly"] = $pageObject->getViewControl("ELJuly")->showDBValue($row, "");
					$values["ELAug"] = $pageObject->getViewControl("ELAug")->showDBValue($row, "");
					$values["ELSep"] = $pageObject->getViewControl("ELSep")->showDBValue($row, "");
					$values["ELOct"] = $pageObject->getViewControl("ELOct")->showDBValue($row, "");
					$values["ELNov"] = $pageObject->getViewControl("ELNov")->showDBValue($row, "");
					$values["ELDec"] = $pageObject->getViewControl("ELDec")->showDBValue($row, "");
					$values["IMLJan"] = $pageObject->getViewControl("IMLJan")->showDBValue($row, "");
					$values["IMLeb"] = $pageObject->getViewControl("IMLeb")->showDBValue($row, "");
					$values["IMLMar"] = $pageObject->getViewControl("IMLMar")->showDBValue($row, "");
					$values["IMLApril"] = $pageObject->getViewControl("IMLApril")->showDBValue($row, "");
					$values["IMLMay"] = $pageObject->getViewControl("IMLMay")->showDBValue($row, "");
					$values["IMLJune"] = $pageObject->getViewControl("IMLJune")->showDBValue($row, "");
					$values["IMLJuly"] = $pageObject->getViewControl("IMLJuly")->showDBValue($row, "");
					$values["IMLAug"] = $pageObject->getViewControl("IMLAug")->showDBValue($row, "");
					$values["IMLSep"] = $pageObject->getViewControl("IMLSep")->showDBValue($row, "");
					$values["IMLOct"] = $pageObject->getViewControl("IMLOct")->showDBValue($row, "");
					$values["IMLNov"] = $pageObject->getViewControl("IMLNov")->showDBValue($row, "");
					$values["IMLDec"] = $pageObject->getViewControl("IMLDec")->showDBValue($row, "");
					$values["IBC12"] = $pageObject->getViewControl("IBC12")->showDBValue($row, "");
					$values["IBC11"] = $pageObject->getViewControl("IBC11")->showDBValue($row, "");
					$values["IBC10"] = $pageObject->getViewControl("IBC10")->showDBValue($row, "");
					$values["IBC9"] = $pageObject->getViewControl("IBC9")->showDBValue($row, "");
					$values["IBC8"] = $pageObject->getViewControl("IBC8")->showDBValue($row, "");
					$values["IBC7"] = $pageObject->getViewControl("IBC7")->showDBValue($row, "");
					$values["IBC6"] = $pageObject->getViewControl("IBC6")->showDBValue($row, "");
					$values["IBC5"] = $pageObject->getViewControl("IBC5")->showDBValue($row, "");
					$values["IBC4"] = $pageObject->getViewControl("IBC4")->showDBValue($row, "");
					$values["IBC3"] = $pageObject->getViewControl("IBC3")->showDBValue($row, "");
					$values["IBC2"] = $pageObject->getViewControl("IBC2")->showDBValue($row, "");
					$values["IBC1"] = $pageObject->getViewControl("IBC1")->showDBValue($row, "");
					$values["EL12"] = $pageObject->getViewControl("EL12")->showDBValue($row, "");
					$values["EL11"] = $pageObject->getViewControl("EL11")->showDBValue($row, "");
					$values["EL10"] = $pageObject->getViewControl("EL10")->showDBValue($row, "");
					$values["EL9"] = $pageObject->getViewControl("EL9")->showDBValue($row, "");
					$values["EL8"] = $pageObject->getViewControl("EL8")->showDBValue($row, "");
					$values["EL7"] = $pageObject->getViewControl("EL7")->showDBValue($row, "");
					$values["EL6"] = $pageObject->getViewControl("EL6")->showDBValue($row, "");
					$values["EL5"] = $pageObject->getViewControl("EL5")->showDBValue($row, "");
					$values["EL4"] = $pageObject->getViewControl("EL4")->showDBValue($row, "");
					$values["EL3"] = $pageObject->getViewControl("EL3")->showDBValue($row, "");
					$values["EL2"] = $pageObject->getViewControl("EL2")->showDBValue($row, "");
					$values["EL1"] = $pageObject->getViewControl("EL1")->showDBValue($row, "");
					$values["CL12"] = $pageObject->getViewControl("CL12")->showDBValue($row, "");
					$values["CL11"] = $pageObject->getViewControl("CL11")->showDBValue($row, "");
					$values["CL10"] = $pageObject->getViewControl("CL10")->showDBValue($row, "");
					$values["CL9"] = $pageObject->getViewControl("CL9")->showDBValue($row, "");
					$values["CL8"] = $pageObject->getViewControl("CL8")->showDBValue($row, "");
					$values["CL7"] = $pageObject->getViewControl("CL7")->showDBValue($row, "");
					$values["CL6"] = $pageObject->getViewControl("CL6")->showDBValue($row, "");
					$values["CL5"] = $pageObject->getViewControl("CL5")->showDBValue($row, "");
					$values["CL4"] = $pageObject->getViewControl("CL4")->showDBValue($row, "");
					$values["CL3"] = $pageObject->getViewControl("CL3")->showDBValue($row, "");
					$values["CL2"] = $pageObject->getViewControl("CL2")->showDBValue($row, "");
					$values["CL1"] = $pageObject->getViewControl("CL1")->showDBValue($row, "");
					$values["PreMarket"] = $pageObject->getViewControl("PreMarket")->showDBValue($row, "");
					$values["InMarket"] = $pageObject->getViewControl("InMarket")->showDBValue($row, "");
					$values["UNderLOI"] = $pageObject->getViewControl("UNderLOI")->showDBValue($row, "");
					$values["Inactive"] = $pageObject->getViewControl("Inactive")->showDBValue($row, "");
					$values["OnHold"] = $pageObject->getViewControl("OnHold")->showDBValue($row, "");
					$values["Wheelhouse"] = $pageObject->getViewControl("Wheelhouse")->showDBValue($row, "");
					$values["Speculative"] = $pageObject->getViewControl("Speculative")->showDBValue($row, "");
					$values["Minimum"] = $pageObject->getViewControl("Minimum")->showDBValue($row, "");
					$values["EV10SS"] = $pageObject->getViewControl("EV10SS")->showDBValue($row, "");
					$values["EV25SS"] = $pageObject->getViewControl("EV25SS")->showDBValue($row, "");
					$values["EV75SS"] = $pageObject->getViewControl("EV75SS")->showDBValue($row, "");
					$values["EV100SS"] = $pageObject->getViewControl("EV100SS")->showDBValue($row, "");
					$values["EV150SS"] = $pageObject->getViewControl("EV150SS")->showDBValue($row, "");
					$values["sst"] = $pageObject->getViewControl("sst")->showDBValue($row, "");
					$values["EV10BS"] = $pageObject->getViewControl("EV10BS")->showDBValue($row, "");
					$values["EV25BS"] = $pageObject->getViewControl("EV25BS")->showDBValue($row, "");
					$values["EV75BS"] = $pageObject->getViewControl("EV75BS")->showDBValue($row, "");
					$values["EV100BS"] = $pageObject->getViewControl("EV100BS")->showDBValue($row, "");
					$values["EV150BS"] = $pageObject->getViewControl("EV150BS")->showDBValue($row, "");
					$values["bst"] = $pageObject->getViewControl("bst")->showDBValue($row, "");
					$values["EV10eq"] = $pageObject->getViewControl("EV10eq")->showDBValue($row, "");
					$values["EV25eq"] = $pageObject->getViewControl("EV25eq")->showDBValue($row, "");
					$values["EV75eq"] = $pageObject->getViewControl("EV75eq")->showDBValue($row, "");
					$values["EV100eq"] = $pageObject->getViewControl("EV100eq")->showDBValue($row, "");
					$values["EV150eq"] = $pageObject->getViewControl("EV150eq")->showDBValue($row, "");
					$values["eqt"] = $pageObject->getViewControl("eqt")->showDBValue($row, "");
					$values["EV10d"] = $pageObject->getViewControl("EV10d")->showDBValue($row, "");
					$values["EV25d"] = $pageObject->getViewControl("EV25d")->showDBValue($row, "");
					$values["EV75d"] = $pageObject->getViewControl("EV75d")->showDBValue($row, "");
					$values["EV100d"] = $pageObject->getViewControl("EV100d")->showDBValue($row, "");
					$values["EV150d"] = $pageObject->getViewControl("EV150d")->showDBValue($row, "");
					$values["dt"] = $pageObject->getViewControl("dt")->showDBValue($row, "");
					$values["EV10ad"] = $pageObject->getViewControl("EV10ad")->showDBValue($row, "");
					$values["EV25ad"] = $pageObject->getViewControl("EV25ad")->showDBValue($row, "");
					$values["EV75ad"] = $pageObject->getViewControl("EV75ad")->showDBValue($row, "");
					$values["EV100ad"] = $pageObject->getViewControl("EV100ad")->showDBValue($row, "");
					$values["EV150ad"] = $pageObject->getViewControl("EV150ad")->showDBValue($row, "");
					$values["adt"] = $pageObject->getViewControl("adt")->showDBValue($row, "");
					$values["EV10p"] = $pageObject->getViewControl("EV10p")->showDBValue($row, "");
					$values["EV25p"] = $pageObject->getViewControl("EV25p")->showDBValue($row, "");
					$values["EV75p"] = $pageObject->getViewControl("EV75p")->showDBValue($row, "");
					$values["EV100p"] = $pageObject->getViewControl("EV100p")->showDBValue($row, "");
					$values["EV150p"] = $pageObject->getViewControl("EV150p")->showDBValue($row, "");
					$values["pt"] = $pageObject->getViewControl("pt")->showDBValue($row, "");
					$values["EV10pe"] = $pageObject->getViewControl("EV10pe")->showDBValue($row, "");
					$values["EV25pe"] = $pageObject->getViewControl("EV25pe")->showDBValue($row, "");
					$values["EV75pe"] = $pageObject->getViewControl("EV75pe")->showDBValue($row, "");
					$values["EV100pe"] = $pageObject->getViewControl("EV100pe")->showDBValue($row, "");
					$values["EV150pe"] = $pageObject->getViewControl("EV150pe")->showDBValue($row, "");
					$values["pet"] = $pageObject->getViewControl("pet")->showDBValue($row, "");
					$values["EV10po"] = $pageObject->getViewControl("EV10po")->showDBValue($row, "");
					$values["EV25po"] = $pageObject->getViewControl("EV25po")->showDBValue($row, "");
					$values["EV75po"] = $pageObject->getViewControl("EV75po")->showDBValue($row, "");
					$values["EV100po"] = $pageObject->getViewControl("EV100po")->showDBValue($row, "");
					$values["EV150po"] = $pageObject->getViewControl("EV150po")->showDBValue($row, "");
					$values["pot"] = $pageObject->getViewControl("pot")->showDBValue($row, "");
					$values["Business Services"] = $pageObject->getViewControl("Business Services")->showDBValue($row, "");
					$values["Consumer Products"] = $pageObject->getViewControl("Consumer Products")->showDBValue($row, "");
					$values["Energy & Natural Resources"] = $pageObject->getViewControl("Energy & Natural Resources")->showDBValue($row, "");
					$values["Financial Services"] = $pageObject->getViewControl("Financial Services")->showDBValue($row, "");
					$values["Industrials"] = $pageObject->getViewControl("Industrials")->showDBValue($row, "");
					$values["Healthcare"] = $pageObject->getViewControl("Healthcare")->showDBValue($row, "");
					$values["Technology"] = $pageObject->getViewControl("Technology")->showDBValue($row, "");
					$values["Entertainment"] = $pageObject->getViewControl("Entertainment")->showDBValue($row, "");
					$values["Real Estate"] = $pageObject->getViewControl("Real Estate")->showDBValue($row, "");
					$values["Business Services EL"] = $pageObject->getViewControl("Business Services EL")->showDBValue($row, "");
					$values["Consumer EL"] = $pageObject->getViewControl("Consumer EL")->showDBValue($row, "");
					$values["Ennergy EL"] = $pageObject->getViewControl("Ennergy EL")->showDBValue($row, "");
					$values["Financial EL"] = $pageObject->getViewControl("Financial EL")->showDBValue($row, "");
					$values["Industrials EL"] = $pageObject->getViewControl("Industrials EL")->showDBValue($row, "");
					$values["Healthcare EL"] = $pageObject->getViewControl("Healthcare EL")->showDBValue($row, "");
					$values["TMT EL"] = $pageObject->getViewControl("TMT EL")->showDBValue($row, "");
					$values["Entertainment EL"] = $pageObject->getViewControl("Entertainment EL")->showDBValue($row, "");
					$values["RealEstate EL"] = $pageObject->getViewControl("RealEstate EL")->showDBValue($row, "");
					$values["IBSreferrals"] = $pageObject->getViewControl("IBSreferrals")->showDBValue($row, "");
					$values["IBSibc"] = $pageObject->getViewControl("IBSibc")->showDBValue($row, "");
					$values["IBSel"] = $pageObject->getViewControl("IBSel")->showDBValue($row, "");
					$values["PPibc"] = $pageObject->getViewControl("PPibc")->showDBValue($row, "");
					$values["PPel"] = $pageObject->getViewControl("PPel")->showDBValue($row, "");
					$values["CPibc"] = $pageObject->getViewControl("CPibc")->showDBValue($row, "");
					$values["CPel"] = $pageObject->getViewControl("CPel")->showDBValue($row, "");
					$values["MAibc"] = $pageObject->getViewControl("MAibc")->showDBValue($row, "");
					$values["MAel"] = $pageObject->getViewControl("MAel")->showDBValue($row, "");
					$values["SCibc"] = $pageObject->getViewControl("SCibc")->showDBValue($row, "");
					$values["SCel"] = $pageObject->getViewControl("SCel")->showDBValue($row, "");
					$values["SSibc"] = $pageObject->getViewControl("SSibc")->showDBValue($row, "");
					$values["SSel"] = $pageObject->getViewControl("SSel")->showDBValue($row, "");
					$values["IBSper"] = $pageObject->getViewControl("IBSper")->showDBValue($row, "");
					$values["PPper"] = $pageObject->getViewControl("PPper")->showDBValue($row, "");
					$values["CPper"] = $pageObject->getViewControl("CPper")->showDBValue($row, "");
					$values["MAper"] = $pageObject->getViewControl("MAper")->showDBValue($row, "");
					$values["SCSper"] = $pageObject->getViewControl("SCSper")->showDBValue($row, "");
					$values["SSper"] = $pageObject->getViewControl("SSper")->showDBValue($row, "");
					$values["IBSper2"] = $pageObject->getViewControl("IBSper2")->showDBValue($row, "");
					$values["PPper2"] = $pageObject->getViewControl("PPper2")->showDBValue($row, "");
					$values["CPper2"] = $pageObject->getViewControl("CPper2")->showDBValue($row, "");
					$values["MAper2"] = $pageObject->getViewControl("MAper2")->showDBValue($row, "");
					$values["SCSper2"] = $pageObject->getViewControl("SCSper2")->showDBValue($row, "");
					$values["SSper2"] = $pageObject->getViewControl("SSper2")->showDBValue($row, "");
					$values["IBCperMD"] = $pageObject->getViewControl("IBCperMD")->showDBValue($row, "");
					$values["IBCTotalMD"] = $pageObject->getViewControl("IBCTotalMD")->showDBValue($row, "");
					$values["IBCYTDTarget"] = $pageObject->getViewControl("IBCYTDTarget")->showDBValue($row, "");
					$values["IBuper"] = $pageObject->getViewControl("IBuper")->showDBValue($row, "");
					$values["ELperMD"] = $pageObject->getViewControl("ELperMD")->showDBValue($row, "");
					$values["ELTotalMD"] = $pageObject->getViewControl("ELTotalMD")->showDBValue($row, "");
					$values["ELYTDTarget"] = $pageObject->getViewControl("ELYTDTarget")->showDBValue($row, "");
					$values["eluper"] = $pageObject->getViewControl("eluper")->showDBValue($row, "");
					$values["ClosingperMD"] = $pageObject->getViewControl("ClosingperMD")->showDBValue($row, "");
					$values["ClosingTotalMD"] = $pageObject->getViewControl("ClosingTotalMD")->showDBValue($row, "");
					$values["ClosingYTDMD"] = $pageObject->getViewControl("ClosingYTDMD")->showDBValue($row, "");
					$values["Closinguper"] = $pageObject->getViewControl("Closinguper")->showDBValue($row, "");
					$values["MGMTnetthis"] = $pageObject->getViewControl("MGMTnetthis")->showDBValue($row, "");
					$values["MGMTG"] = $pageObject->getViewControl("MGMTG")->showDBValue($row, "");
					$values["MGMTnetnext"] = $pageObject->getViewControl("MGMTnetnext")->showDBValue($row, "");
					$values["MGMTN"] = $pageObject->getViewControl("MGMTN")->showDBValue($row, "");
					$values["NetActual"] = $pageObject->getViewControl("NetActual")->showDBValue($row, "");
					$values["TYBG"] = $pageObject->getViewControl("TYBG")->showDBValue($row, "");
					$values["TYBN"] = $pageObject->getViewControl("TYBN")->showDBValue($row, "");
					$values["YTDgrossact"] = $pageObject->getViewControl("YTDgrossact")->showDBValue($row, "");
					$values["YTDnetact"] = $pageObject->getViewControl("YTDnetact")->showDBValue($row, "");
					$values["YTDgross"] = $pageObject->getViewControl("YTDgross")->showDBValue($row, "");
					$values["ytdgrossper"] = $pageObject->getViewControl("ytdgrossper")->showDBValue($row, "");
					$values["ytdnetper"] = $pageObject->getViewControl("ytdnetper")->showDBValue($row, "");
					$values["mytdgrossper"] = $pageObject->getViewControl("mytdgrossper")->showDBValue($row, "");
					$values["mytdnetper"] = $pageObject->getViewControl("mytdnetper")->showDBValue($row, "");
		
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
			
									echo $values["Live"];
			echo '</td>';
							echo '<td>';
			
									echo $values["InMarketLOI"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Closed"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda12"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda11"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda10"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda9"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda8"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda7"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda6"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["nda1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["NDAYTD"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELJan"]);
					else
						echo $values["ELJan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELFeb"]);
					else
						echo $values["ELFeb"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELMar"]);
					else
						echo $values["ELMar"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELApril"]);
					else
						echo $values["ELApril"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELMay"]);
					else
						echo $values["ELMay"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELJune"]);
					else
						echo $values["ELJune"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELJuly"]);
					else
						echo $values["ELJuly"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELAug"]);
					else
						echo $values["ELAug"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELSep"]);
					else
						echo $values["ELSep"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELOct"]);
					else
						echo $values["ELOct"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELNov"]);
					else
						echo $values["ELNov"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ELDec"]);
					else
						echo $values["ELDec"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLJan"]);
					else
						echo $values["IMLJan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLeb"]);
					else
						echo $values["IMLeb"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLMar"]);
					else
						echo $values["IMLMar"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLApril"]);
					else
						echo $values["IMLApril"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLMay"]);
					else
						echo $values["IMLMay"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLJune"]);
					else
						echo $values["IMLJune"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLJuly"]);
					else
						echo $values["IMLJuly"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLAug"]);
					else
						echo $values["IMLAug"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLSep"]);
					else
						echo $values["IMLSep"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLOct"]);
					else
						echo $values["IMLOct"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLNov"]);
					else
						echo $values["IMLNov"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["IMLDec"]);
					else
						echo $values["IMLDec"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC12"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC11"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC10"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC9"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC8"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC7"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC6"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBC1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL12"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL11"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL10"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL9"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL8"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL7"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL6"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EL1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL12"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL11"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL10"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL9"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL8"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL7"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL6"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CL1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["PreMarket"];
			echo '</td>';
							echo '<td>';
			
									echo $values["InMarket"];
			echo '</td>';
							echo '<td>';
			
									echo $values["UNderLOI"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Inactive"];
			echo '</td>';
							echo '<td>';
			
									echo $values["OnHold"];
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
							echo '<td>';
			
									echo $values["EV10SS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25SS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75SS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100SS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150SS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["sst"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10BS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25BS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75BS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100BS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150BS"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bst"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10eq"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25eq"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75eq"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100eq"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150eq"];
			echo '</td>';
							echo '<td>';
			
									echo $values["eqt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10d"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25d"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75d"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100d"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150d"];
			echo '</td>';
							echo '<td>';
			
									echo $values["dt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10ad"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25ad"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75ad"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100ad"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150ad"];
			echo '</td>';
							echo '<td>';
			
									echo $values["adt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10p"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25p"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75p"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100p"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150p"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10pe"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25pe"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75pe"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100pe"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150pe"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pet"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV10po"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV25po"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV75po"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV100po"];
			echo '</td>';
							echo '<td>';
			
									echo $values["EV150po"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pot"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Business Services"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Consumer Products"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Energy & Natural Resources"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Financial Services"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Industrials"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Healthcare"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Technology"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Entertainment"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Real Estate"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Business Services EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Consumer EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Ennergy EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Financial EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Industrials EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Healthcare EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["TMT EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Entertainment EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["RealEstate EL"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBSreferrals"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBSibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBSel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["PPibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["PPel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CPibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CPel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MAibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MAel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SCibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SCel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SSibc"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SSel"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBSper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["PPper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CPper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MAper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SCSper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SSper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBSper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["PPper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["CPper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MAper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SCSper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["SSper2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBCperMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBCTotalMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBCYTDTarget"];
			echo '</td>';
							echo '<td>';
			
									echo $values["IBuper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ELperMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ELTotalMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ELYTDTarget"];
			echo '</td>';
							echo '<td>';
			
									echo $values["eluper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ClosingperMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ClosingTotalMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ClosingYTDMD"];
			echo '</td>';
							echo '<td>';
			
									echo $values["Closinguper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MGMTnetthis"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MGMTG"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MGMTnetnext"];
			echo '</td>';
							echo '<td>';
			
									echo $values["MGMTN"];
			echo '</td>';
							echo '<td>';
			
									echo $values["NetActual"];
			echo '</td>';
							echo '<td>';
			
									echo $values["TYBG"];
			echo '</td>';
							echo '<td>';
			
									echo $values["TYBN"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTDgrossact"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTDnetact"];
			echo '</td>';
							echo '<td>';
			
									echo $values["YTDgross"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ytdgrossper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ytdnetper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["mytdgrossper"];
			echo '</td>';
							echo '<td>';
			
									echo $values["mytdnetper"];
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
