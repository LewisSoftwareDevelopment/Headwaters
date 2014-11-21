<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/company_variables.php");

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
$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";$page_layouts["company_print"] = $layout;


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
$arr['fName'] = "Company";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Company");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "EL Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("EL Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Project Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Project Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Status";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Status");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Deal Type";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Deal Type");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Projected Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Projected Fee");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Projected Transaction Size";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Projected Transaction Size");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Est. Close Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Est. Close Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Primary Banker";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Primary Banker");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Practice Area";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Practice Area");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Ownership Class";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Ownership Class");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Industry";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Industry");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Referral Type";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Referral Type");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Referral Source-Company";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Referral Source-Company");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Referral Scource-Ind.";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Referral Scource-Ind.");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Description";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Description");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Dead Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Dead Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "EL Expiration Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("EL Expiration Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Engagment Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Engagment Fee");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Minimum";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Minimum");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Final Total Sucess Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Final Total Sucess Fee");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Final Transaction Size";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Final Transaction Size");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Monthly Retainer";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Monthly Retainer");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Closed Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Closed Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Enterpise Value";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Enterpise Value");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Details";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Details");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Split to Corporate";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Split to Corporate");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Paul";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Paul");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "McBroom";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("McBroom");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "IBC Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("IBC Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Gross Next";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Gross Next");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Gross This";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Gross This");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Month of Close";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Month of Close");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Deal Slot";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Deal Slot");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Pipeline";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Pipeline");
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

//	ID - 
			$record["ID_value"] = $pageObject->showDBValue("ID", $data, $keylink);
			$record["ID_class"] = $pageObject->fieldClass("ID");
//	Company - 
			$record["Company_value"] = $pageObject->showDBValue("Company", $data, $keylink);
			$record["Company_class"] = $pageObject->fieldClass("Company");
//	EL Date - Short Date
			$record["EL_Date_value"] = $pageObject->showDBValue("EL Date", $data, $keylink);
			$record["EL_Date_class"] = $pageObject->fieldClass("EL Date");
//	IBC Date - Short Date
			$record["IBC_Date_value"] = $pageObject->showDBValue("IBC Date", $data, $keylink);
			$record["IBC_Date_class"] = $pageObject->fieldClass("IBC Date");
//	Est. Close Date - Short Date
			$record["Est__Close_Date_value"] = $pageObject->showDBValue("Est. Close Date", $data, $keylink);
			$record["Est__Close_Date_class"] = $pageObject->fieldClass("Est. Close Date");
//	Project Name - 
			$record["Project_Name_value"] = $pageObject->showDBValue("Project Name", $data, $keylink);
			$record["Project_Name_class"] = $pageObject->fieldClass("Project Name");
//	EL Expiration Date - Short Date
			$record["EL_Expiration_Date_value"] = $pageObject->showDBValue("EL Expiration Date", $data, $keylink);
			$record["EL_Expiration_Date_class"] = $pageObject->fieldClass("EL Expiration Date");
//	Status - 
			$record["Status_value"] = $pageObject->showDBValue("Status", $data, $keylink);
			$record["Status_class"] = $pageObject->fieldClass("Status");
//	Deal Type - 
			$record["Deal_Type_value"] = $pageObject->showDBValue("Deal Type", $data, $keylink);
			$record["Deal_Type_class"] = $pageObject->fieldClass("Deal Type");
//	Deal Slot - 
			$record["Deal_Slot_value"] = $pageObject->showDBValue("Deal Slot", $data, $keylink);
			$record["Deal_Slot_class"] = $pageObject->fieldClass("Deal Slot");
//	Closed Date - Short Date
			$record["Closed_Date_value"] = $pageObject->showDBValue("Closed Date", $data, $keylink);
			$record["Closed_Date_class"] = $pageObject->fieldClass("Closed Date");
//	Dead Date - Short Date
			$record["Dead_Date_value"] = $pageObject->showDBValue("Dead Date", $data, $keylink);
			$record["Dead_Date_class"] = $pageObject->fieldClass("Dead Date");
//	Primary Banker - 
			$record["Primary_Banker_value"] = $pageObject->showDBValue("Primary Banker", $data, $keylink);
			$record["Primary_Banker_class"] = $pageObject->fieldClass("Primary Banker");
//	Practice Area - 
			$record["Practice_Area_value"] = $pageObject->showDBValue("Practice Area", $data, $keylink);
			$record["Practice_Area_class"] = $pageObject->fieldClass("Practice Area");
//	Industry - 
			$record["Industry_value"] = $pageObject->showDBValue("Industry", $data, $keylink);
			$record["Industry_class"] = $pageObject->fieldClass("Industry");
//	Projected Transaction Size - Currency
			$record["Projected_Transaction_Size_value"] = $pageObject->showDBValue("Projected Transaction Size", $data, $keylink);
			$record["Projected_Transaction_Size_class"] = $pageObject->fieldClass("Projected Transaction Size");
//	Enterpise Value - 
			$record["Enterpise_Value_value"] = $pageObject->showDBValue("Enterpise Value", $data, $keylink);
			$record["Enterpise_Value_class"] = $pageObject->fieldClass("Enterpise Value");
//	Final Transaction Size - Currency
			$record["Final_Transaction_Size_value"] = $pageObject->showDBValue("Final Transaction Size", $data, $keylink);
			$record["Final_Transaction_Size_class"] = $pageObject->fieldClass("Final Transaction Size");
//	Projected Fee - Currency
			$record["Projected_Fee_value"] = $pageObject->showDBValue("Projected Fee", $data, $keylink);
			$record["Projected_Fee_class"] = $pageObject->fieldClass("Projected Fee");
//	Fee Minimum - Number
			$record["Fee_Minimum_value"] = $pageObject->showDBValue("Fee Minimum", $data, $keylink);
			$record["Fee_Minimum_class"] = $pageObject->fieldClass("Fee Minimum");
//	Engagment Fee - Number
			$record["Engagment_Fee_value"] = $pageObject->showDBValue("Engagment Fee", $data, $keylink);
			$record["Engagment_Fee_class"] = $pageObject->fieldClass("Engagment Fee");
//	Fee Details - 
			$record["Fee_Details_value"] = $pageObject->showDBValue("Fee Details", $data, $keylink);
			$record["Fee_Details_class"] = $pageObject->fieldClass("Fee Details");
//	Split to Corporate - Number
			$record["Split_to_Corporate_value"] = $pageObject->showDBValue("Split to Corporate", $data, $keylink);
			$record["Split_to_Corporate_class"] = $pageObject->fieldClass("Split to Corporate");
//	Monthly Retainer - Number
			$record["Monthly_Retainer_value"] = $pageObject->showDBValue("Monthly Retainer", $data, $keylink);
			$record["Monthly_Retainer_class"] = $pageObject->fieldClass("Monthly Retainer");
//	Final Total Sucess Fee - Number
			$record["Final_Total_Sucess_Fee_value"] = $pageObject->showDBValue("Final Total Sucess Fee", $data, $keylink);
			$record["Final_Total_Sucess_Fee_class"] = $pageObject->fieldClass("Final Total Sucess Fee");
//	Ownership Class - 
			$record["Ownership_Class_value"] = $pageObject->showDBValue("Ownership Class", $data, $keylink);
			$record["Ownership_Class_class"] = $pageObject->fieldClass("Ownership Class");
//	Referral Type - 
			$record["Referral_Type_value"] = $pageObject->showDBValue("Referral Type", $data, $keylink);
			$record["Referral_Type_class"] = $pageObject->fieldClass("Referral Type");
//	Referral Source-Company - 
			$record["Referral_Source_Company_value"] = $pageObject->showDBValue("Referral Source-Company", $data, $keylink);
			$record["Referral_Source_Company_class"] = $pageObject->fieldClass("Referral Source-Company");
//	Referral Scource-Ind. - 
			$record["Referral_Scource_Ind__value"] = $pageObject->showDBValue("Referral Scource-Ind.", $data, $keylink);
			$record["Referral_Scource_Ind__class"] = $pageObject->fieldClass("Referral Scource-Ind.");
//	Description - 
			$record["Description_value"] = $pageObject->showDBValue("Description", $data, $keylink);
			$record["Description_class"] = $pageObject->fieldClass("Description");
//	Team Split-1 - Percent
			$record["Team_Split_1_value"] = $pageObject->showDBValue("Team Split-1", $data, $keylink);
			$record["Team_Split_1_class"] = $pageObject->fieldClass("Team Split-1");
//	Team-1 - 
			$record["Team_1_value"] = $pageObject->showDBValue("Team-1", $data, $keylink);
			$record["Team_1_class"] = $pageObject->fieldClass("Team-1");
//	Team Split-2 - Percent
			$record["Team_Split_2_value"] = $pageObject->showDBValue("Team Split-2", $data, $keylink);
			$record["Team_Split_2_class"] = $pageObject->fieldClass("Team Split-2");
//	Team-2 - 
			$record["Team_2_value"] = $pageObject->showDBValue("Team-2", $data, $keylink);
			$record["Team_2_class"] = $pageObject->fieldClass("Team-2");
//	Team Split-3 - Percent
			$record["Team_Split_3_value"] = $pageObject->showDBValue("Team Split-3", $data, $keylink);
			$record["Team_Split_3_class"] = $pageObject->fieldClass("Team Split-3");
//	Team-3 - 
			$record["Team_3_value"] = $pageObject->showDBValue("Team-3", $data, $keylink);
			$record["Team_3_class"] = $pageObject->fieldClass("Team-3");
//	Team Split-4 - Percent
			$record["Team_Split_4_value"] = $pageObject->showDBValue("Team Split-4", $data, $keylink);
			$record["Team_Split_4_class"] = $pageObject->fieldClass("Team Split-4");
//	Team-4 - 
			$record["Team_4_value"] = $pageObject->showDBValue("Team-4", $data, $keylink);
			$record["Team_4_class"] = $pageObject->fieldClass("Team-4");
//	Team Split-5 - Percent
			$record["Team_Split_5_value"] = $pageObject->showDBValue("Team Split-5", $data, $keylink);
			$record["Team_Split_5_class"] = $pageObject->fieldClass("Team Split-5");
//	Team-5 - 
			$record["Team_5_value"] = $pageObject->showDBValue("Team-5", $data, $keylink);
			$record["Team_5_class"] = $pageObject->fieldClass("Team-5");
//	Team Split-6 - Percent
			$record["Team_Split_6_value"] = $pageObject->showDBValue("Team Split-6", $data, $keylink);
			$record["Team_Split_6_class"] = $pageObject->fieldClass("Team Split-6");
//	Team-6 - 
			$record["Team_6_value"] = $pageObject->showDBValue("Team-6", $data, $keylink);
			$record["Team_6_class"] = $pageObject->fieldClass("Team-6");
//	Fee Split-1 - Percent
			$record["Fee_Split_1_value"] = $pageObject->showDBValue("Fee Split-1", $data, $keylink);
			$record["Fee_Split_1_class"] = $pageObject->fieldClass("Fee Split-1");
//	Fee To-1 - 
			$record["Fee_To_1_value"] = $pageObject->showDBValue("Fee To-1", $data, $keylink);
			$record["Fee_To_1_class"] = $pageObject->fieldClass("Fee To-1");
//	Fee Split-2 - Percent
			$record["Fee_Split_2_value"] = $pageObject->showDBValue("Fee Split-2", $data, $keylink);
			$record["Fee_Split_2_class"] = $pageObject->fieldClass("Fee Split-2");
//	Fee To-2 - 
			$record["Fee_To_2_value"] = $pageObject->showDBValue("Fee To-2", $data, $keylink);
			$record["Fee_To_2_class"] = $pageObject->fieldClass("Fee To-2");
//	Fee Split-3 - Percent
			$record["Fee_Split_3_value"] = $pageObject->showDBValue("Fee Split-3", $data, $keylink);
			$record["Fee_Split_3_class"] = $pageObject->fieldClass("Fee Split-3");
//	Fee To-3 - 
			$record["Fee_To_3_value"] = $pageObject->showDBValue("Fee To-3", $data, $keylink);
			$record["Fee_To_3_class"] = $pageObject->fieldClass("Fee To-3");
//	Fee Split-4 - Percent
			$record["Fee_Split_4_value"] = $pageObject->showDBValue("Fee Split-4", $data, $keylink);
			$record["Fee_Split_4_class"] = $pageObject->fieldClass("Fee Split-4");
//	Fee To-4 - 
			$record["Fee_To_4_value"] = $pageObject->showDBValue("Fee To-4", $data, $keylink);
			$record["Fee_To_4_class"] = $pageObject->fieldClass("Fee To-4");
//	Fee Split-5 - Percent
			$record["Fee_Split_5_value"] = $pageObject->showDBValue("Fee Split-5", $data, $keylink);
			$record["Fee_Split_5_class"] = $pageObject->fieldClass("Fee Split-5");
//	Fee To-5 - 
			$record["Fee_To_5_value"] = $pageObject->showDBValue("Fee To-5", $data, $keylink);
			$record["Fee_To_5_class"] = $pageObject->fieldClass("Fee To-5");
//	Fee Split-6 - Percent
			$record["Fee_Split_6_value"] = $pageObject->showDBValue("Fee Split-6", $data, $keylink);
			$record["Fee_Split_6_class"] = $pageObject->fieldClass("Fee Split-6");
//	Fee To-6 - 
			$record["Fee_To_6_value"] = $pageObject->showDBValue("Fee To-6", $data, $keylink);
			$record["Fee_To_6_class"] = $pageObject->fieldClass("Fee To-6");
//	Paul - Checkbox
			$record["Paul_value"] = $pageObject->showDBValue("Paul", $data, $keylink);
			$record["Paul_class"] = $pageObject->fieldClass("Paul");
//	McBroom - Checkbox
			$record["McBroom_value"] = $pageObject->showDBValue("McBroom", $data, $keylink);
			$record["McBroom_class"] = $pageObject->fieldClass("McBroom");
//	Pipeline - 
			$record["Pipeline_value"] = $pageObject->showDBValue("Pipeline", $data, $keylink);
			$record["Pipeline_class"] = $pageObject->fieldClass("Pipeline");
//	Month of Close - Short Date
			$record["Month_of_Close_value"] = $pageObject->showDBValue("Month of Close", $data, $keylink);
			$record["Month_of_Close_class"] = $pageObject->fieldClass("Month of Close");
//	Gross This - 
			$record["Gross_This_value"] = $pageObject->showDBValue("Gross This", $data, $keylink);
			$record["Gross_This_class"] = $pageObject->fieldClass("Gross This");
//	Gross Next - 
			$record["Gross_Next_value"] = $pageObject->showDBValue("Gross Next", $data, $keylink);
			$record["Gross_Next_class"] = $pageObject->fieldClass("Gross Next");
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

$xt->assign("ID_fieldheadercolumn",true);
$xt->assign("ID_fieldheader",true);
$xt->assign("ID_fieldcolumn",true);
$xt->assign("ID_fieldfootercolumn",true);
$xt->assign("Company_fieldheadercolumn",true);
$xt->assign("Company_fieldheader",true);
$xt->assign("Company_fieldcolumn",true);
$xt->assign("Company_fieldfootercolumn",true);
$xt->assign("EL_Date_fieldheadercolumn",true);
$xt->assign("EL_Date_fieldheader",true);
$xt->assign("EL_Date_fieldcolumn",true);
$xt->assign("EL_Date_fieldfootercolumn",true);
$xt->assign("IBC_Date_fieldheadercolumn",true);
$xt->assign("IBC_Date_fieldheader",true);
$xt->assign("IBC_Date_fieldcolumn",true);
$xt->assign("IBC_Date_fieldfootercolumn",true);
$xt->assign("Est__Close_Date_fieldheadercolumn",true);
$xt->assign("Est__Close_Date_fieldheader",true);
$xt->assign("Est__Close_Date_fieldcolumn",true);
$xt->assign("Est__Close_Date_fieldfootercolumn",true);
$xt->assign("Project_Name_fieldheadercolumn",true);
$xt->assign("Project_Name_fieldheader",true);
$xt->assign("Project_Name_fieldcolumn",true);
$xt->assign("Project_Name_fieldfootercolumn",true);
$xt->assign("EL_Expiration_Date_fieldheadercolumn",true);
$xt->assign("EL_Expiration_Date_fieldheader",true);
$xt->assign("EL_Expiration_Date_fieldcolumn",true);
$xt->assign("EL_Expiration_Date_fieldfootercolumn",true);
$xt->assign("Status_fieldheadercolumn",true);
$xt->assign("Status_fieldheader",true);
$xt->assign("Status_fieldcolumn",true);
$xt->assign("Status_fieldfootercolumn",true);
$xt->assign("Deal_Type_fieldheadercolumn",true);
$xt->assign("Deal_Type_fieldheader",true);
$xt->assign("Deal_Type_fieldcolumn",true);
$xt->assign("Deal_Type_fieldfootercolumn",true);
$xt->assign("Deal_Slot_fieldheadercolumn",true);
$xt->assign("Deal_Slot_fieldheader",true);
$xt->assign("Deal_Slot_fieldcolumn",true);
$xt->assign("Deal_Slot_fieldfootercolumn",true);
$xt->assign("Closed_Date_fieldheadercolumn",true);
$xt->assign("Closed_Date_fieldheader",true);
$xt->assign("Closed_Date_fieldcolumn",true);
$xt->assign("Closed_Date_fieldfootercolumn",true);
$xt->assign("Dead_Date_fieldheadercolumn",true);
$xt->assign("Dead_Date_fieldheader",true);
$xt->assign("Dead_Date_fieldcolumn",true);
$xt->assign("Dead_Date_fieldfootercolumn",true);
$xt->assign("Primary_Banker_fieldheadercolumn",true);
$xt->assign("Primary_Banker_fieldheader",true);
$xt->assign("Primary_Banker_fieldcolumn",true);
$xt->assign("Primary_Banker_fieldfootercolumn",true);
$xt->assign("Practice_Area_fieldheadercolumn",true);
$xt->assign("Practice_Area_fieldheader",true);
$xt->assign("Practice_Area_fieldcolumn",true);
$xt->assign("Practice_Area_fieldfootercolumn",true);
$xt->assign("Industry_fieldheadercolumn",true);
$xt->assign("Industry_fieldheader",true);
$xt->assign("Industry_fieldcolumn",true);
$xt->assign("Industry_fieldfootercolumn",true);
$xt->assign("Projected_Transaction_Size_fieldheadercolumn",true);
$xt->assign("Projected_Transaction_Size_fieldheader",true);
$xt->assign("Projected_Transaction_Size_fieldcolumn",true);
$xt->assign("Projected_Transaction_Size_fieldfootercolumn",true);
$xt->assign("Enterpise_Value_fieldheadercolumn",true);
$xt->assign("Enterpise_Value_fieldheader",true);
$xt->assign("Enterpise_Value_fieldcolumn",true);
$xt->assign("Enterpise_Value_fieldfootercolumn",true);
$xt->assign("Final_Transaction_Size_fieldheadercolumn",true);
$xt->assign("Final_Transaction_Size_fieldheader",true);
$xt->assign("Final_Transaction_Size_fieldcolumn",true);
$xt->assign("Final_Transaction_Size_fieldfootercolumn",true);
$xt->assign("Projected_Fee_fieldheadercolumn",true);
$xt->assign("Projected_Fee_fieldheader",true);
$xt->assign("Projected_Fee_fieldcolumn",true);
$xt->assign("Projected_Fee_fieldfootercolumn",true);
$xt->assign("Fee_Minimum_fieldheadercolumn",true);
$xt->assign("Fee_Minimum_fieldheader",true);
$xt->assign("Fee_Minimum_fieldcolumn",true);
$xt->assign("Fee_Minimum_fieldfootercolumn",true);
$xt->assign("Engagment_Fee_fieldheadercolumn",true);
$xt->assign("Engagment_Fee_fieldheader",true);
$xt->assign("Engagment_Fee_fieldcolumn",true);
$xt->assign("Engagment_Fee_fieldfootercolumn",true);
$xt->assign("Fee_Details_fieldheadercolumn",true);
$xt->assign("Fee_Details_fieldheader",true);
$xt->assign("Fee_Details_fieldcolumn",true);
$xt->assign("Fee_Details_fieldfootercolumn",true);
$xt->assign("Split_to_Corporate_fieldheadercolumn",true);
$xt->assign("Split_to_Corporate_fieldheader",true);
$xt->assign("Split_to_Corporate_fieldcolumn",true);
$xt->assign("Split_to_Corporate_fieldfootercolumn",true);
$xt->assign("Monthly_Retainer_fieldheadercolumn",true);
$xt->assign("Monthly_Retainer_fieldheader",true);
$xt->assign("Monthly_Retainer_fieldcolumn",true);
$xt->assign("Monthly_Retainer_fieldfootercolumn",true);
$xt->assign("Final_Total_Sucess_Fee_fieldheadercolumn",true);
$xt->assign("Final_Total_Sucess_Fee_fieldheader",true);
$xt->assign("Final_Total_Sucess_Fee_fieldcolumn",true);
$xt->assign("Final_Total_Sucess_Fee_fieldfootercolumn",true);
$xt->assign("Ownership_Class_fieldheadercolumn",true);
$xt->assign("Ownership_Class_fieldheader",true);
$xt->assign("Ownership_Class_fieldcolumn",true);
$xt->assign("Ownership_Class_fieldfootercolumn",true);
$xt->assign("Referral_Type_fieldheadercolumn",true);
$xt->assign("Referral_Type_fieldheader",true);
$xt->assign("Referral_Type_fieldcolumn",true);
$xt->assign("Referral_Type_fieldfootercolumn",true);
$xt->assign("Referral_Source_Company_fieldheadercolumn",true);
$xt->assign("Referral_Source_Company_fieldheader",true);
$xt->assign("Referral_Source_Company_fieldcolumn",true);
$xt->assign("Referral_Source_Company_fieldfootercolumn",true);
$xt->assign("Referral_Scource_Ind__fieldheadercolumn",true);
$xt->assign("Referral_Scource_Ind__fieldheader",true);
$xt->assign("Referral_Scource_Ind__fieldcolumn",true);
$xt->assign("Referral_Scource_Ind__fieldfootercolumn",true);
$xt->assign("Description_fieldheadercolumn",true);
$xt->assign("Description_fieldheader",true);
$xt->assign("Description_fieldcolumn",true);
$xt->assign("Description_fieldfootercolumn",true);
$xt->assign("Team_Split_1_fieldheadercolumn",true);
$xt->assign("Team_Split_1_fieldheader",true);
$xt->assign("Team_Split_1_fieldcolumn",true);
$xt->assign("Team_Split_1_fieldfootercolumn",true);
$xt->assign("Team_1_fieldheadercolumn",true);
$xt->assign("Team_1_fieldheader",true);
$xt->assign("Team_1_fieldcolumn",true);
$xt->assign("Team_1_fieldfootercolumn",true);
$xt->assign("Team_Split_2_fieldheadercolumn",true);
$xt->assign("Team_Split_2_fieldheader",true);
$xt->assign("Team_Split_2_fieldcolumn",true);
$xt->assign("Team_Split_2_fieldfootercolumn",true);
$xt->assign("Team_2_fieldheadercolumn",true);
$xt->assign("Team_2_fieldheader",true);
$xt->assign("Team_2_fieldcolumn",true);
$xt->assign("Team_2_fieldfootercolumn",true);
$xt->assign("Team_Split_3_fieldheadercolumn",true);
$xt->assign("Team_Split_3_fieldheader",true);
$xt->assign("Team_Split_3_fieldcolumn",true);
$xt->assign("Team_Split_3_fieldfootercolumn",true);
$xt->assign("Team_3_fieldheadercolumn",true);
$xt->assign("Team_3_fieldheader",true);
$xt->assign("Team_3_fieldcolumn",true);
$xt->assign("Team_3_fieldfootercolumn",true);
$xt->assign("Team_Split_4_fieldheadercolumn",true);
$xt->assign("Team_Split_4_fieldheader",true);
$xt->assign("Team_Split_4_fieldcolumn",true);
$xt->assign("Team_Split_4_fieldfootercolumn",true);
$xt->assign("Team_4_fieldheadercolumn",true);
$xt->assign("Team_4_fieldheader",true);
$xt->assign("Team_4_fieldcolumn",true);
$xt->assign("Team_4_fieldfootercolumn",true);
$xt->assign("Team_Split_5_fieldheadercolumn",true);
$xt->assign("Team_Split_5_fieldheader",true);
$xt->assign("Team_Split_5_fieldcolumn",true);
$xt->assign("Team_Split_5_fieldfootercolumn",true);
$xt->assign("Team_5_fieldheadercolumn",true);
$xt->assign("Team_5_fieldheader",true);
$xt->assign("Team_5_fieldcolumn",true);
$xt->assign("Team_5_fieldfootercolumn",true);
$xt->assign("Team_Split_6_fieldheadercolumn",true);
$xt->assign("Team_Split_6_fieldheader",true);
$xt->assign("Team_Split_6_fieldcolumn",true);
$xt->assign("Team_Split_6_fieldfootercolumn",true);
$xt->assign("Team_6_fieldheadercolumn",true);
$xt->assign("Team_6_fieldheader",true);
$xt->assign("Team_6_fieldcolumn",true);
$xt->assign("Team_6_fieldfootercolumn",true);
$xt->assign("Fee_Split_1_fieldheadercolumn",true);
$xt->assign("Fee_Split_1_fieldheader",true);
$xt->assign("Fee_Split_1_fieldcolumn",true);
$xt->assign("Fee_Split_1_fieldfootercolumn",true);
$xt->assign("Fee_To_1_fieldheadercolumn",true);
$xt->assign("Fee_To_1_fieldheader",true);
$xt->assign("Fee_To_1_fieldcolumn",true);
$xt->assign("Fee_To_1_fieldfootercolumn",true);
$xt->assign("Fee_Split_2_fieldheadercolumn",true);
$xt->assign("Fee_Split_2_fieldheader",true);
$xt->assign("Fee_Split_2_fieldcolumn",true);
$xt->assign("Fee_Split_2_fieldfootercolumn",true);
$xt->assign("Fee_To_2_fieldheadercolumn",true);
$xt->assign("Fee_To_2_fieldheader",true);
$xt->assign("Fee_To_2_fieldcolumn",true);
$xt->assign("Fee_To_2_fieldfootercolumn",true);
$xt->assign("Fee_Split_3_fieldheadercolumn",true);
$xt->assign("Fee_Split_3_fieldheader",true);
$xt->assign("Fee_Split_3_fieldcolumn",true);
$xt->assign("Fee_Split_3_fieldfootercolumn",true);
$xt->assign("Fee_To_3_fieldheadercolumn",true);
$xt->assign("Fee_To_3_fieldheader",true);
$xt->assign("Fee_To_3_fieldcolumn",true);
$xt->assign("Fee_To_3_fieldfootercolumn",true);
$xt->assign("Fee_Split_4_fieldheadercolumn",true);
$xt->assign("Fee_Split_4_fieldheader",true);
$xt->assign("Fee_Split_4_fieldcolumn",true);
$xt->assign("Fee_Split_4_fieldfootercolumn",true);
$xt->assign("Fee_To_4_fieldheadercolumn",true);
$xt->assign("Fee_To_4_fieldheader",true);
$xt->assign("Fee_To_4_fieldcolumn",true);
$xt->assign("Fee_To_4_fieldfootercolumn",true);
$xt->assign("Fee_Split_5_fieldheadercolumn",true);
$xt->assign("Fee_Split_5_fieldheader",true);
$xt->assign("Fee_Split_5_fieldcolumn",true);
$xt->assign("Fee_Split_5_fieldfootercolumn",true);
$xt->assign("Fee_To_5_fieldheadercolumn",true);
$xt->assign("Fee_To_5_fieldheader",true);
$xt->assign("Fee_To_5_fieldcolumn",true);
$xt->assign("Fee_To_5_fieldfootercolumn",true);
$xt->assign("Fee_Split_6_fieldheadercolumn",true);
$xt->assign("Fee_Split_6_fieldheader",true);
$xt->assign("Fee_Split_6_fieldcolumn",true);
$xt->assign("Fee_Split_6_fieldfootercolumn",true);
$xt->assign("Fee_To_6_fieldheadercolumn",true);
$xt->assign("Fee_To_6_fieldheader",true);
$xt->assign("Fee_To_6_fieldcolumn",true);
$xt->assign("Fee_To_6_fieldfootercolumn",true);
$xt->assign("Paul_fieldheadercolumn",true);
$xt->assign("Paul_fieldheader",true);
$xt->assign("Paul_fieldcolumn",true);
$xt->assign("Paul_fieldfootercolumn",true);
$xt->assign("McBroom_fieldheadercolumn",true);
$xt->assign("McBroom_fieldheader",true);
$xt->assign("McBroom_fieldcolumn",true);
$xt->assign("McBroom_fieldfootercolumn",true);
$xt->assign("Pipeline_fieldheadercolumn",true);
$xt->assign("Pipeline_fieldheader",true);
$xt->assign("Pipeline_fieldcolumn",true);
$xt->assign("Pipeline_fieldfootercolumn",true);
$xt->assign("Month_of_Close_fieldheadercolumn",true);
$xt->assign("Month_of_Close_fieldheader",true);
$xt->assign("Month_of_Close_fieldcolumn",true);
$xt->assign("Month_of_Close_fieldfootercolumn",true);
$xt->assign("Gross_This_fieldheadercolumn",true);
$xt->assign("Gross_This_fieldheader",true);
$xt->assign("Gross_This_fieldcolumn",true);
$xt->assign("Gross_This_fieldfootercolumn",true);
$xt->assign("Gross_Next_fieldheadercolumn",true);
$xt->assign("Gross_Next_fieldheader",true);
$xt->assign("Gross_Next_fieldcolumn",true);
$xt->assign("Gross_Next_fieldfootercolumn",true);

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
