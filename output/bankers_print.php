<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

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

$layout = new TLayout("print","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["center"] = array();
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"printgrid","block"=>"grid_block","substyle"=>1);


$layout->skins["grid"] = "empty";
$layout->blocks["center"][] = "grid";$layout->blocks["top"] = array();
$layout->containers["master"] = array();

$layout->containers["master"][] = array("name"=>"masterinfoprint","block"=>"mastertable_block","substyle"=>1);


$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";$page_layouts["bankers_print"] = $layout;


include('include/xtempl.php');
include('classes/runnerpage.php');

$cipherer = new RunnerCipherer($strTableName);

$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;
$all = postvalue("all");
$pageName = "print.php";

//array of params for classes
$params = array("id" => $id,
				"tName" => $strTableName,
				"pageType" => PAGE_PRINT);
$params["xt"] = &$xt;
			
$pageObject = new RunnerPage($params);

// add button events if exist
$pageObject->addButtonHandlers();

// Modify query: remove blob fields from fieldlist.
// Blob fields on a print page are shown using imager.php (for example).
// They don't need to be selected from DB in print.php itself.
$noBlobReplace = false;
if(!postvalue("pdf") && !$noBlobReplace)
	$gQuery->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());

//	Before Process event
if($eventObj->exists("BeforeProcessPrint"))
	$eventObj->BeforeProcessPrint($conn, $pageObject);

$strWhereClause="";
$strHavingClause="";
$strSearchCriteria="and";

$selected_recs=array();
if (@$_REQUEST["a"]!="") 
{
	$sWhere = "1=0";	
	
//	process selection
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["ID"]=refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys=array();
			$keys["ID"]=urldecode($arr[0]);
			$selected_recs[]=$keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}
	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
}
else
{
	$strWhereClause=@$_SESSION[$strTableName."_where"];
	$strHavingClause=@$_SESSION[$strTableName."_having"];
	$strSearchCriteria=@$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}
if(postvalue("pdf"))
	$strWhereClause = @$_SESSION[$strTableName."_pdfwhere"];

$_SESSION[$strTableName."_pdfwhere"] = $strWhereClause;


$strOrderBy = $_SESSION[$strTableName."_order"];
if(!$strOrderBy)
	$strOrderBy=$gstrOrderBy;
$strSQL.=" ".trim($strOrderBy);

$strSQLbak = $strSQL;
if($eventObj->exists("BeforeQueryPrint"))
	$eventObj->BeforeQueryPrint($strSQL,$strWhereClause,$strOrderBy, $pageObject);

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
			$masterKeysReq[]=$_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount=$eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
	}
	if($rowcount!==false)
		$numrows=$rowcount;
	else
	{
		$numrows = $gQuery->gSQLRowCount($strWhereClause, $strHavingClause, $strSearchCriteria);
	}
}

LogInfo($strSQL);

$mypage=(integer)$_SESSION[$strTableName."_pagenumber"];
if(!$mypage)
	$mypage=1;

//	page size
$PageSize=(integer)$_SESSION[$strTableName."_pagesize"];
if(!$PageSize)
	$PageSize = $pageObject->pSet->getInitialPageSize();

if($PageSize<0)
	$all = 1;	
	
$recno = 1;
$records = 0;	
$maxpages = 1;
$pageindex = 1;
$pageno=1;

// build arrays for sort (to support old code in user-defined events)
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
}

if(!$all)
{	
	if($numrows)
	{
		$maxRecords = $numrows;
		$maxpages = ceil($maxRecords/$PageSize);
					
		if($mypage > $maxpages)
			$mypage = $maxpages;
		
		if($mypage < 1) 
			$mypage = 1;
		
		$maxrecs = $PageSize;
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort, 
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
	{
			if($numrows)
		{
			$strSQL.=" limit ".(($mypage-1)*$PageSize).",".$PageSize;
		}
		$rs = db_query($strSQL,$conn);
	}
	
	//	hide colunm headers if needed
	$recordsonpage = $numrows-($mypage-1)*$PageSize;
	if($recordsonpage>$PageSize)
		$recordsonpage = $PageSize;
		
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
	$xt->assign("pageno",$mypage);
}
else
{
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray=$eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
		$rs = db_query($strSQL,$conn);
	$recordsonpage = $numrows;
	$maxpages = ceil($recordsonpage/30);
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
}


$fieldsArr = array();
$arr = array();
$arr['fName'] = "ID";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ID");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Start Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Start Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Budget Year";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Budget Year");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Active";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Active");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD Revenue";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD Revenue");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Last Year Rev";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Last Year Rev");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Prior Year Rev";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Prior Year Rev");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Last Year Rank";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Last Year Rank");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD+Last";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD+Last");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD Closing";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD Closing");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Last Year Closing";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Last Year Closing");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD IBC";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD IBC");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD Engagements";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD Engagements");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Total Current Engagments";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Total Current Engagments");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "# Wheelhouse";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("# Wheelhouse");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "# Speculative";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("# Speculative");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "# Minimum";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("# Minimum");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Last Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Last Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "First Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("First Name");
$fieldsArr[] = $arr;
$pageObject->setGoogleMapsParams($fieldsArr);

$colsonpage=1;
if($colsonpage>$recordsonpage)
	$colsonpage=$recordsonpage;
if($colsonpage<1)
	$colsonpage=1;


//	fill $rowinfo array
	$pages = array();
	$rowinfo = array();
	$rowinfo["data"] = array();
	if($eventObj->exists("ListFetchArray"))
		$data = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$data = $cipherer->DecryptFetchedArray($rs);

	while($data)
	{
		if($eventObj->exists("BeforeProcessRowPrint"))
		{
			if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
			{
				if($eventObj->exists("ListFetchArray"))
					$data = $eventObj->ListFetchArray($rs, $pageObject);
				else
					$data = $cipherer->DecryptFetchedArray($rs);
				continue;
			}
		}
		break;
	}
	
	while($data && ($all || $recno<=$PageSize))
	{
		$row = array();
		$row["grid_record"] = array();
		$row["grid_record"]["data"] = array();
		for($col=1;$data && ($all || $recno<=$PageSize) && $col<=1;$col++)
		{
			$record = array();
			$recno++;
			$records++;
			$keylink="";
			$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));

//	First Name - 
			$record["First_Name_value"] = $pageObject->showDBValue("First Name", $data, $keylink);
			$record["First_Name_class"] = $pageObject->fieldClass("First Name");
//	YTD+Last - 
			$record["YTD_Last_value"] = $pageObject->showDBValue("YTD+Last", $data, $keylink);
			$record["YTD_Last_class"] = $pageObject->fieldClass("YTD+Last");
//	Last Name - 
			$record["Last_Name_value"] = $pageObject->showDBValue("Last Name", $data, $keylink);
			$record["Last_Name_class"] = $pageObject->fieldClass("Last Name");
//	Active - Checkbox
			$record["Active_value"] = $pageObject->showDBValue("Active", $data, $keylink);
			$record["Active_class"] = $pageObject->fieldClass("Active");
//	Name - 
			$record["Name_value"] = $pageObject->showDBValue("Name", $data, $keylink);
			$record["Name_class"] = $pageObject->fieldClass("Name");
//	Budget Year - 
			$record["Budget_Year_value"] = $pageObject->showDBValue("Budget Year", $data, $keylink);
			$record["Budget_Year_class"] = $pageObject->fieldClass("Budget Year");
//	Start Date - Short Date
			$record["Start_Date_value"] = $pageObject->showDBValue("Start Date", $data, $keylink);
			$record["Start_Date_class"] = $pageObject->fieldClass("Start Date");
//	YTD Revenue - 
			$record["YTD_Revenue_value"] = $pageObject->showDBValue("YTD Revenue", $data, $keylink);
			$record["YTD_Revenue_class"] = $pageObject->fieldClass("YTD Revenue");
//	Last Year Rev - 
			$record["Last_Year_Rev_value"] = $pageObject->showDBValue("Last Year Rev", $data, $keylink);
			$record["Last_Year_Rev_class"] = $pageObject->fieldClass("Last Year Rev");
//	Prior Year Rev - 
			$record["Prior_Year_Rev_value"] = $pageObject->showDBValue("Prior Year Rev", $data, $keylink);
			$record["Prior_Year_Rev_class"] = $pageObject->fieldClass("Prior Year Rev");
//	Last Year Rank - 
			$record["Last_Year_Rank_value"] = $pageObject->showDBValue("Last Year Rank", $data, $keylink);
			$record["Last_Year_Rank_class"] = $pageObject->fieldClass("Last Year Rank");
//	YTD Closing - 
			$record["YTD_Closing_value"] = $pageObject->showDBValue("YTD Closing", $data, $keylink);
			$record["YTD_Closing_class"] = $pageObject->fieldClass("YTD Closing");
//	Last Year Closing - 
			$record["Last_Year_Closing_value"] = $pageObject->showDBValue("Last Year Closing", $data, $keylink);
			$record["Last_Year_Closing_class"] = $pageObject->fieldClass("Last Year Closing");
//	YTD IBC - 
			$record["YTD_IBC_value"] = $pageObject->showDBValue("YTD IBC", $data, $keylink);
			$record["YTD_IBC_class"] = $pageObject->fieldClass("YTD IBC");
//	YTD Engagements - 
			$record["YTD_Engagements_value"] = $pageObject->showDBValue("YTD Engagements", $data, $keylink);
			$record["YTD_Engagements_class"] = $pageObject->fieldClass("YTD Engagements");
//	Total Current Engagments - 
			$record["Total_Current_Engagments_value"] = $pageObject->showDBValue("Total Current Engagments", $data, $keylink);
			$record["Total_Current_Engagments_class"] = $pageObject->fieldClass("Total Current Engagments");
//	# Wheelhouse - 
			$record["__Wheelhouse_value"] = $pageObject->showDBValue("# Wheelhouse", $data, $keylink);
			$record["__Wheelhouse_class"] = $pageObject->fieldClass("# Wheelhouse");
//	# Speculative - 
			$record["__Speculative_value"] = $pageObject->showDBValue("# Speculative", $data, $keylink);
			$record["__Speculative_class"] = $pageObject->fieldClass("# Speculative");
//	# Minimum - 
			$record["__Minimum_value"] = $pageObject->showDBValue("# Minimum", $data, $keylink);
			$record["__Minimum_class"] = $pageObject->fieldClass("# Minimum");
//	ID - 
			$record["ID_value"] = $pageObject->showDBValue("ID", $data, $keylink);
			$record["ID_class"] = $pageObject->fieldClass("ID");
			if($col<$colsonpage)
				$record["endrecord_block"] = true;
			$record["grid_recordheader"] = true;
			$record["grid_vrecord"] = true;
			
			if($eventObj->exists("BeforeMoveNextPrint"))
				$eventObj->BeforeMoveNextPrint($data,$row,$record, $pageObject);
				
			$row["grid_record"]["data"][] = $record;
			
			if($eventObj->exists("ListFetchArray"))
				$data = $eventObj->ListFetchArray($rs, $pageObject);
			else
				$data = $cipherer->DecryptFetchedArray($rs);
				
			while($data)
			{
				if($eventObj->exists("BeforeProcessRowPrint"))
				{
					if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
					{
						if($eventObj->exists("ListFetchArray"))
							$data = $eventObj->ListFetchArray($rs, $pageObject);
						else
							$data = $cipherer->DecryptFetchedArray($rs);
						continue;
					}
				}
				break;
			}
		}
		if($col <= $colsonpage)
		{
			$row["grid_record"]["data"][count($row["grid_record"]["data"])-1]["endrecord_block"] = false;
		}
		$row["grid_rowspace"]=true;
		$row["grid_recordspace"] = array("data"=>array());
		for($i=0;$i<$colsonpage*2-1;$i++)
			$row["grid_recordspace"]["data"][]=true;
		
		$rowinfo["data"][]=$row;
		
		if($all && $records>=30)
		{
			$page=array("grid_row" =>$rowinfo);
			$page["pageno"]=$pageindex;
			$pageindex++;
			$pages[] = $page;
			$records=0;
			$rowinfo=array();
		}
		
	}
	if(count($rowinfo))
	{
		$page=array("grid_row" =>$rowinfo);
		if($all)
			$page["pageno"]=$pageindex;
		$pages[] = $page;
	}
	
	for($i=0;$i<count($pages);$i++)
	{
	 	if($i<count($pages)-1)
			$pages[$i]["begin"]="<div name=page class=printpage>";
		else
		    $pages[$i]["begin"]="<div name=page>";
			
		$pages[$i]["end"]="</div>";
	}

	$page = array();
	$page["data"] = &$pages;
	$xt->assignbyref("page",$page);

	
//	display master table info
$mastertable = $_SESSION[$strTableName."_mastertable"];
$masterkeys = array();

if($mastertable == "company")
{
//	include proper masterprint.php code
	include("include/company_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey2"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey3"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey4"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey5"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey6"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey7"];
	$params = array("detailtable"=>"bankers","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_company";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["company_masterprint"] = $layout;

	$layout = GetPageLayout("company", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

$strSQL = $_SESSION[$strTableName."_sql"];

$isPdfView = false;
$hasEvents = false;
if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
{
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
}


if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";

$xt->assignbyref("body",$pageObject->body);
$xt->assign("grid_block",true);

$xt->assign("First_Name_fieldheadercolumn",true);
$xt->assign("First_Name_fieldheader",true);
$xt->assign("First_Name_fieldcolumn",true);
$xt->assign("First_Name_fieldfootercolumn",true);
$xt->assign("YTD_Last_fieldheadercolumn",true);
$xt->assign("YTD_Last_fieldheader",true);
$xt->assign("YTD_Last_fieldcolumn",true);
$xt->assign("YTD_Last_fieldfootercolumn",true);
$xt->assign("Last_Name_fieldheadercolumn",true);
$xt->assign("Last_Name_fieldheader",true);
$xt->assign("Last_Name_fieldcolumn",true);
$xt->assign("Last_Name_fieldfootercolumn",true);
$xt->assign("Active_fieldheadercolumn",true);
$xt->assign("Active_fieldheader",true);
$xt->assign("Active_fieldcolumn",true);
$xt->assign("Active_fieldfootercolumn",true);
$xt->assign("Name_fieldheadercolumn",true);
$xt->assign("Name_fieldheader",true);
$xt->assign("Name_fieldcolumn",true);
$xt->assign("Name_fieldfootercolumn",true);
$xt->assign("Budget_Year_fieldheadercolumn",true);
$xt->assign("Budget_Year_fieldheader",true);
$xt->assign("Budget_Year_fieldcolumn",true);
$xt->assign("Budget_Year_fieldfootercolumn",true);
$xt->assign("Start_Date_fieldheadercolumn",true);
$xt->assign("Start_Date_fieldheader",true);
$xt->assign("Start_Date_fieldcolumn",true);
$xt->assign("Start_Date_fieldfootercolumn",true);
$xt->assign("YTD_Revenue_fieldheadercolumn",true);
$xt->assign("YTD_Revenue_fieldheader",true);
$xt->assign("YTD_Revenue_fieldcolumn",true);
$xt->assign("YTD_Revenue_fieldfootercolumn",true);
$xt->assign("Last_Year_Rev_fieldheadercolumn",true);
$xt->assign("Last_Year_Rev_fieldheader",true);
$xt->assign("Last_Year_Rev_fieldcolumn",true);
$xt->assign("Last_Year_Rev_fieldfootercolumn",true);
$xt->assign("Prior_Year_Rev_fieldheadercolumn",true);
$xt->assign("Prior_Year_Rev_fieldheader",true);
$xt->assign("Prior_Year_Rev_fieldcolumn",true);
$xt->assign("Prior_Year_Rev_fieldfootercolumn",true);
$xt->assign("Last_Year_Rank_fieldheadercolumn",true);
$xt->assign("Last_Year_Rank_fieldheader",true);
$xt->assign("Last_Year_Rank_fieldcolumn",true);
$xt->assign("Last_Year_Rank_fieldfootercolumn",true);
$xt->assign("YTD_Closing_fieldheadercolumn",true);
$xt->assign("YTD_Closing_fieldheader",true);
$xt->assign("YTD_Closing_fieldcolumn",true);
$xt->assign("YTD_Closing_fieldfootercolumn",true);
$xt->assign("Last_Year_Closing_fieldheadercolumn",true);
$xt->assign("Last_Year_Closing_fieldheader",true);
$xt->assign("Last_Year_Closing_fieldcolumn",true);
$xt->assign("Last_Year_Closing_fieldfootercolumn",true);
$xt->assign("YTD_IBC_fieldheadercolumn",true);
$xt->assign("YTD_IBC_fieldheader",true);
$xt->assign("YTD_IBC_fieldcolumn",true);
$xt->assign("YTD_IBC_fieldfootercolumn",true);
$xt->assign("YTD_Engagements_fieldheadercolumn",true);
$xt->assign("YTD_Engagements_fieldheader",true);
$xt->assign("YTD_Engagements_fieldcolumn",true);
$xt->assign("YTD_Engagements_fieldfootercolumn",true);
$xt->assign("Total_Current_Engagments_fieldheadercolumn",true);
$xt->assign("Total_Current_Engagments_fieldheader",true);
$xt->assign("Total_Current_Engagments_fieldcolumn",true);
$xt->assign("Total_Current_Engagments_fieldfootercolumn",true);
$xt->assign("__Wheelhouse_fieldheadercolumn",true);
$xt->assign("__Wheelhouse_fieldheader",true);
$xt->assign("__Wheelhouse_fieldcolumn",true);
$xt->assign("__Wheelhouse_fieldfootercolumn",true);
$xt->assign("__Speculative_fieldheadercolumn",true);
$xt->assign("__Speculative_fieldheader",true);
$xt->assign("__Speculative_fieldcolumn",true);
$xt->assign("__Speculative_fieldfootercolumn",true);
$xt->assign("__Minimum_fieldheadercolumn",true);
$xt->assign("__Minimum_fieldheader",true);
$xt->assign("__Minimum_fieldcolumn",true);
$xt->assign("__Minimum_fieldfootercolumn",true);
$xt->assign("ID_fieldheadercolumn",true);
$xt->assign("ID_fieldheader",true);
$xt->assign("ID_fieldcolumn",true);
$xt->assign("ID_fieldfootercolumn",true);

	$record_header=array("data"=>array());
	$record_footer=array("data"=>array());
	for($i=0;$i<$colsonpage;$i++)
	{
		$rheader=array();
		$rfooter=array();
		if($i<$colsonpage-1)
		{
			$rheader["endrecordheader_block"]=true;
			$rfooter["endrecordheader_block"]=true;
		}
		$record_header["data"][]=$rheader;
		$record_footer["data"][]=$rfooter;
	}
	$xt->assignbyref("record_header",$record_header);
	$xt->assignbyref("record_footer",$record_footer);
	$xt->assign("grid_header",true);
	$xt->assign("grid_footer",true);

if($eventObj->exists("BeforeShowPrint"))
	$eventObj->BeforeShowPrint($xt,$pageObject->templatefile, $pageObject);

if(!postvalue("pdf"))
	$xt->display($pageObject->templatefile);
else
{
	$xt->load_template($pageObject->templatefile);
	$page = $xt->fetch_loaded();
	$pagewidth=postvalue("width")*1.05;
	$pageheight=postvalue("height")*1.05;
	$landscape=false;
		if($pagewidth>$pageheight)
		{
			$landscape=true;
			if($pagewidth/$pageheight<297/210)
				$pagewidth = 297/210*$pageheight;
		}
		else
		{
			if($pagewidth/$pageheight<210/297)
				$pagewidth = 210/297*$pageheight;
		}
}
?>
