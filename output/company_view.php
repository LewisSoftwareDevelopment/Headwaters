<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/company_variables.php");
include('include/xtempl.php');
include('classes/viewpage.php');
include("classes/searchclause.php");

add_nocache_headers();

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'S') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$layout = new TLayout("view2","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["top"] = array();
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";
$layout->containers["view"] = array();

$layout->containers["view"][] = array("name"=>"viewheader","block"=>"","substyle"=>2);


$layout->containers["view"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"viewfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"viewbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["view"] = "1";
$layout->blocks["top"][] = "view";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["company_view"] = $layout;




//$cipherer = new RunnerCipherer($strTableName);
	
$xt = new Xtempl();

$query = $gQuery->Copy();

$filename = "";	
$message = "";
$key = array();
$next = array();
$prev = array();
$all = postvalue("all");
$pdf = postvalue("pdf");
$mypage = 1;

//Show view page as popUp or not
$inlineview = (postvalue("onFly") ? true : false);

//If show view as popUp, get parent Id
if($inlineview)
	$parId = postvalue("parId");
else
	$parId = 0;

//Set page id	
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;

//$isNeedSettings = true;//($inlineview && postvalue("isNeedSettings") == 'true') || (!$inlineview);	
	
// assign an id
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_VIEW, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
$params["all"] = $all;

//Get array of tabs for edit page
$params['useTabsOnView'] = $gSettings->useTabsOnView();
if($params['useTabsOnView'])
	$params['arrViewTabs'] = $gSettings->getViewTabs();
$pageObject = new ViewPage($params);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

// proccess big google maps

// add button events if exist
$pageObject->addButtonHandlers();

//For show detail tables on master page view
$dpParams = array();
if($pageObject->isShowDetailTables && !isMobile())
{
	$ids = $id;
	$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array();
}

//	Before Process event
if($eventObj->exists("BeforeProcessView"))
	$eventObj->BeforeProcessView($conn, $pageObject);
	
//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();

if (!sizeof($data)) {
	header("Location: company_list.php?a=return");
	exit();
}

$out = "";
$first = true;
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
$arr['fName'] = "IBC Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("IBC Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Est. Close Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Est. Close Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Project Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Project Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "EL Expiration Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("EL Expiration Date");
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
$arr['fName'] = "Deal Slot";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Deal Slot");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Closed Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Closed Date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Dead Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Dead Date");
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
$arr['fName'] = "Industry";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Industry");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Projected Transaction Size";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Projected Transaction Size");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Enterpise Value";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Enterpise Value");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Final Transaction Size";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Final Transaction Size");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Projected Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Projected Fee");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Minimum";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Minimum");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Engagment Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Engagment Fee");
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
$arr['fName'] = "Monthly Retainer";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Monthly Retainer");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Final Total Sucess Fee";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Final Total Sucess Fee");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Ownership Class";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Ownership Class");
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
$arr['fName'] = "Team-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Team Split-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Team Split-6");
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
$arr['fName'] = "Fee To-1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee Split-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee Split-6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Fee To-6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Fee To-6");
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
$arr['fName'] = "Pipeline";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Pipeline");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Month of Close";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Month of Close");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Gross This";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Gross This");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Gross Next";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Gross Next");
$fieldsArr[] = $arr;

$mainTableOwnerID = $pageObject->pSet->getTableOwnerIdField();
$ownerIdValue="";

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars($pageObject->showDBValue("ID", $data)));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));

////////////////////////////////////////////
//ID - 
	
	$value = $pageObject->showDBValue("ID", $data, $keylink);
	if($mainTableOwnerID=="ID")
		$ownerIdValue=$value;
	$xt->assign("ID_value",$value);
	if(!$pageObject->isAppearOnTabs("ID"))
		$xt->assign("ID_fieldblock",true);
	else
		$xt->assign("ID_tabfieldblock",true);
////////////////////////////////////////////
//Company - 
	
	$value = $pageObject->showDBValue("Company", $data, $keylink);
	if($mainTableOwnerID=="Company")
		$ownerIdValue=$value;
	$xt->assign("Company_value",$value);
	if(!$pageObject->isAppearOnTabs("Company"))
		$xt->assign("Company_fieldblock",true);
	else
		$xt->assign("Company_tabfieldblock",true);
////////////////////////////////////////////
//EL Date - Short Date
	
	$value = $pageObject->showDBValue("EL Date", $data, $keylink);
	if($mainTableOwnerID=="EL Date")
		$ownerIdValue=$value;
	$xt->assign("EL_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("EL Date"))
		$xt->assign("EL_Date_fieldblock",true);
	else
		$xt->assign("EL_Date_tabfieldblock",true);
////////////////////////////////////////////
//IBC Date - Short Date
	
	$value = $pageObject->showDBValue("IBC Date", $data, $keylink);
	if($mainTableOwnerID=="IBC Date")
		$ownerIdValue=$value;
	$xt->assign("IBC_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("IBC Date"))
		$xt->assign("IBC_Date_fieldblock",true);
	else
		$xt->assign("IBC_Date_tabfieldblock",true);
////////////////////////////////////////////
//Est. Close Date - Short Date
	
	$value = $pageObject->showDBValue("Est. Close Date", $data, $keylink);
	if($mainTableOwnerID=="Est. Close Date")
		$ownerIdValue=$value;
	$xt->assign("Est__Close_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("Est. Close Date"))
		$xt->assign("Est__Close_Date_fieldblock",true);
	else
		$xt->assign("Est__Close_Date_tabfieldblock",true);
////////////////////////////////////////////
//Project Name - 
	
	$value = $pageObject->showDBValue("Project Name", $data, $keylink);
	if($mainTableOwnerID=="Project Name")
		$ownerIdValue=$value;
	$xt->assign("Project_Name_value",$value);
	if(!$pageObject->isAppearOnTabs("Project Name"))
		$xt->assign("Project_Name_fieldblock",true);
	else
		$xt->assign("Project_Name_tabfieldblock",true);
////////////////////////////////////////////
//EL Expiration Date - Short Date
	
	$value = $pageObject->showDBValue("EL Expiration Date", $data, $keylink);
	if($mainTableOwnerID=="EL Expiration Date")
		$ownerIdValue=$value;
	$xt->assign("EL_Expiration_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("EL Expiration Date"))
		$xt->assign("EL_Expiration_Date_fieldblock",true);
	else
		$xt->assign("EL_Expiration_Date_tabfieldblock",true);
////////////////////////////////////////////
//Status - 
	
	$value = $pageObject->showDBValue("Status", $data, $keylink);
	if($mainTableOwnerID=="Status")
		$ownerIdValue=$value;
	$xt->assign("Status_value",$value);
	if(!$pageObject->isAppearOnTabs("Status"))
		$xt->assign("Status_fieldblock",true);
	else
		$xt->assign("Status_tabfieldblock",true);
////////////////////////////////////////////
//Deal Type - 
	
	$value = $pageObject->showDBValue("Deal Type", $data, $keylink);
	if($mainTableOwnerID=="Deal Type")
		$ownerIdValue=$value;
	$xt->assign("Deal_Type_value",$value);
	if(!$pageObject->isAppearOnTabs("Deal Type"))
		$xt->assign("Deal_Type_fieldblock",true);
	else
		$xt->assign("Deal_Type_tabfieldblock",true);
////////////////////////////////////////////
//Deal Slot - 
	
	$value = $pageObject->showDBValue("Deal Slot", $data, $keylink);
	if($mainTableOwnerID=="Deal Slot")
		$ownerIdValue=$value;
	$xt->assign("Deal_Slot_value",$value);
	if(!$pageObject->isAppearOnTabs("Deal Slot"))
		$xt->assign("Deal_Slot_fieldblock",true);
	else
		$xt->assign("Deal_Slot_tabfieldblock",true);
////////////////////////////////////////////
//Closed Date - Short Date
	
	$value = $pageObject->showDBValue("Closed Date", $data, $keylink);
	if($mainTableOwnerID=="Closed Date")
		$ownerIdValue=$value;
	$xt->assign("Closed_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("Closed Date"))
		$xt->assign("Closed_Date_fieldblock",true);
	else
		$xt->assign("Closed_Date_tabfieldblock",true);
////////////////////////////////////////////
//Dead Date - Short Date
	
	$value = $pageObject->showDBValue("Dead Date", $data, $keylink);
	if($mainTableOwnerID=="Dead Date")
		$ownerIdValue=$value;
	$xt->assign("Dead_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("Dead Date"))
		$xt->assign("Dead_Date_fieldblock",true);
	else
		$xt->assign("Dead_Date_tabfieldblock",true);
////////////////////////////////////////////
//Primary Banker - 
	
	$value = $pageObject->showDBValue("Primary Banker", $data, $keylink);
	if($mainTableOwnerID=="Primary Banker")
		$ownerIdValue=$value;
	$xt->assign("Primary_Banker_value",$value);
	if(!$pageObject->isAppearOnTabs("Primary Banker"))
		$xt->assign("Primary_Banker_fieldblock",true);
	else
		$xt->assign("Primary_Banker_tabfieldblock",true);
////////////////////////////////////////////
//Practice Area - 
	
	$value = $pageObject->showDBValue("Practice Area", $data, $keylink);
	if($mainTableOwnerID=="Practice Area")
		$ownerIdValue=$value;
	$xt->assign("Practice_Area_value",$value);
	if(!$pageObject->isAppearOnTabs("Practice Area"))
		$xt->assign("Practice_Area_fieldblock",true);
	else
		$xt->assign("Practice_Area_tabfieldblock",true);
////////////////////////////////////////////
//Industry - 
	
	$value = $pageObject->showDBValue("Industry", $data, $keylink);
	if($mainTableOwnerID=="Industry")
		$ownerIdValue=$value;
	$xt->assign("Industry_value",$value);
	if(!$pageObject->isAppearOnTabs("Industry"))
		$xt->assign("Industry_fieldblock",true);
	else
		$xt->assign("Industry_tabfieldblock",true);
////////////////////////////////////////////
//Projected Transaction Size - Currency
	
	$value = $pageObject->showDBValue("Projected Transaction Size", $data, $keylink);
	if($mainTableOwnerID=="Projected Transaction Size")
		$ownerIdValue=$value;
	$xt->assign("Projected_Transaction_Size_value",$value);
	if(!$pageObject->isAppearOnTabs("Projected Transaction Size"))
		$xt->assign("Projected_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Projected_Transaction_Size_tabfieldblock",true);
////////////////////////////////////////////
//Enterpise Value - 
	
	$value = $pageObject->showDBValue("Enterpise Value", $data, $keylink);
	if($mainTableOwnerID=="Enterpise Value")
		$ownerIdValue=$value;
	$xt->assign("Enterpise_Value_value",$value);
	if(!$pageObject->isAppearOnTabs("Enterpise Value"))
		$xt->assign("Enterpise_Value_fieldblock",true);
	else
		$xt->assign("Enterpise_Value_tabfieldblock",true);
////////////////////////////////////////////
//Final Transaction Size - Currency
	
	$value = $pageObject->showDBValue("Final Transaction Size", $data, $keylink);
	if($mainTableOwnerID=="Final Transaction Size")
		$ownerIdValue=$value;
	$xt->assign("Final_Transaction_Size_value",$value);
	if(!$pageObject->isAppearOnTabs("Final Transaction Size"))
		$xt->assign("Final_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Final_Transaction_Size_tabfieldblock",true);
////////////////////////////////////////////
//Projected Fee - Currency
	
	$value = $pageObject->showDBValue("Projected Fee", $data, $keylink);
	if($mainTableOwnerID=="Projected Fee")
		$ownerIdValue=$value;
	$xt->assign("Projected_Fee_value",$value);
	if(!$pageObject->isAppearOnTabs("Projected Fee"))
		$xt->assign("Projected_Fee_fieldblock",true);
	else
		$xt->assign("Projected_Fee_tabfieldblock",true);
////////////////////////////////////////////
//Fee Minimum - Number
	
	$value = $pageObject->showDBValue("Fee Minimum", $data, $keylink);
	if($mainTableOwnerID=="Fee Minimum")
		$ownerIdValue=$value;
	$xt->assign("Fee_Minimum_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Minimum"))
		$xt->assign("Fee_Minimum_fieldblock",true);
	else
		$xt->assign("Fee_Minimum_tabfieldblock",true);
////////////////////////////////////////////
//Engagment Fee - Number
	
	$value = $pageObject->showDBValue("Engagment Fee", $data, $keylink);
	if($mainTableOwnerID=="Engagment Fee")
		$ownerIdValue=$value;
	$xt->assign("Engagment_Fee_value",$value);
	if(!$pageObject->isAppearOnTabs("Engagment Fee"))
		$xt->assign("Engagment_Fee_fieldblock",true);
	else
		$xt->assign("Engagment_Fee_tabfieldblock",true);
////////////////////////////////////////////
//Fee Details - 
	
	$value = $pageObject->showDBValue("Fee Details", $data, $keylink);
	if($mainTableOwnerID=="Fee Details")
		$ownerIdValue=$value;
	$xt->assign("Fee_Details_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Details"))
		$xt->assign("Fee_Details_fieldblock",true);
	else
		$xt->assign("Fee_Details_tabfieldblock",true);
////////////////////////////////////////////
//Split to Corporate - Number
	
	$value = $pageObject->showDBValue("Split to Corporate", $data, $keylink);
	if($mainTableOwnerID=="Split to Corporate")
		$ownerIdValue=$value;
	$xt->assign("Split_to_Corporate_value",$value);
	if(!$pageObject->isAppearOnTabs("Split to Corporate"))
		$xt->assign("Split_to_Corporate_fieldblock",true);
	else
		$xt->assign("Split_to_Corporate_tabfieldblock",true);
////////////////////////////////////////////
//Monthly Retainer - Number
	
	$value = $pageObject->showDBValue("Monthly Retainer", $data, $keylink);
	if($mainTableOwnerID=="Monthly Retainer")
		$ownerIdValue=$value;
	$xt->assign("Monthly_Retainer_value",$value);
	if(!$pageObject->isAppearOnTabs("Monthly Retainer"))
		$xt->assign("Monthly_Retainer_fieldblock",true);
	else
		$xt->assign("Monthly_Retainer_tabfieldblock",true);
////////////////////////////////////////////
//Final Total Sucess Fee - Number
	
	$value = $pageObject->showDBValue("Final Total Sucess Fee", $data, $keylink);
	if($mainTableOwnerID=="Final Total Sucess Fee")
		$ownerIdValue=$value;
	$xt->assign("Final_Total_Sucess_Fee_value",$value);
	if(!$pageObject->isAppearOnTabs("Final Total Sucess Fee"))
		$xt->assign("Final_Total_Sucess_Fee_fieldblock",true);
	else
		$xt->assign("Final_Total_Sucess_Fee_tabfieldblock",true);
////////////////////////////////////////////
//Ownership Class - 
	
	$value = $pageObject->showDBValue("Ownership Class", $data, $keylink);
	if($mainTableOwnerID=="Ownership Class")
		$ownerIdValue=$value;
	$xt->assign("Ownership_Class_value",$value);
	if(!$pageObject->isAppearOnTabs("Ownership Class"))
		$xt->assign("Ownership_Class_fieldblock",true);
	else
		$xt->assign("Ownership_Class_tabfieldblock",true);
////////////////////////////////////////////
//Referral Type - 
	
	$value = $pageObject->showDBValue("Referral Type", $data, $keylink);
	if($mainTableOwnerID=="Referral Type")
		$ownerIdValue=$value;
	$xt->assign("Referral_Type_value",$value);
	if(!$pageObject->isAppearOnTabs("Referral Type"))
		$xt->assign("Referral_Type_fieldblock",true);
	else
		$xt->assign("Referral_Type_tabfieldblock",true);
////////////////////////////////////////////
//Referral Source-Company - 
	
	$value = $pageObject->showDBValue("Referral Source-Company", $data, $keylink);
	if($mainTableOwnerID=="Referral Source-Company")
		$ownerIdValue=$value;
	$xt->assign("Referral_Source_Company_value",$value);
	if(!$pageObject->isAppearOnTabs("Referral Source-Company"))
		$xt->assign("Referral_Source_Company_fieldblock",true);
	else
		$xt->assign("Referral_Source_Company_tabfieldblock",true);
////////////////////////////////////////////
//Referral Scource-Ind. - 
	
	$value = $pageObject->showDBValue("Referral Scource-Ind.", $data, $keylink);
	if($mainTableOwnerID=="Referral Scource-Ind.")
		$ownerIdValue=$value;
	$xt->assign("Referral_Scource_Ind__value",$value);
	if(!$pageObject->isAppearOnTabs("Referral Scource-Ind."))
		$xt->assign("Referral_Scource_Ind__fieldblock",true);
	else
		$xt->assign("Referral_Scource_Ind__tabfieldblock",true);
////////////////////////////////////////////
//Description - 
	
	$value = $pageObject->showDBValue("Description", $data, $keylink);
	if($mainTableOwnerID=="Description")
		$ownerIdValue=$value;
	$xt->assign("Description_value",$value);
	if(!$pageObject->isAppearOnTabs("Description"))
		$xt->assign("Description_fieldblock",true);
	else
		$xt->assign("Description_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-1 - Percent
	
	$value = $pageObject->showDBValue("Team Split-1", $data, $keylink);
	if($mainTableOwnerID=="Team Split-1")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_1_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-1"))
		$xt->assign("Team_Split_1_fieldblock",true);
	else
		$xt->assign("Team_Split_1_tabfieldblock",true);
////////////////////////////////////////////
//Team-1 - 
	
	$value = $pageObject->showDBValue("Team-1", $data, $keylink);
	if($mainTableOwnerID=="Team-1")
		$ownerIdValue=$value;
	$xt->assign("Team_1_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-1"))
		$xt->assign("Team_1_fieldblock",true);
	else
		$xt->assign("Team_1_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-2 - Percent
	
	$value = $pageObject->showDBValue("Team Split-2", $data, $keylink);
	if($mainTableOwnerID=="Team Split-2")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_2_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-2"))
		$xt->assign("Team_Split_2_fieldblock",true);
	else
		$xt->assign("Team_Split_2_tabfieldblock",true);
////////////////////////////////////////////
//Team-2 - 
	
	$value = $pageObject->showDBValue("Team-2", $data, $keylink);
	if($mainTableOwnerID=="Team-2")
		$ownerIdValue=$value;
	$xt->assign("Team_2_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-2"))
		$xt->assign("Team_2_fieldblock",true);
	else
		$xt->assign("Team_2_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-3 - Percent
	
	$value = $pageObject->showDBValue("Team Split-3", $data, $keylink);
	if($mainTableOwnerID=="Team Split-3")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_3_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-3"))
		$xt->assign("Team_Split_3_fieldblock",true);
	else
		$xt->assign("Team_Split_3_tabfieldblock",true);
////////////////////////////////////////////
//Team-3 - 
	
	$value = $pageObject->showDBValue("Team-3", $data, $keylink);
	if($mainTableOwnerID=="Team-3")
		$ownerIdValue=$value;
	$xt->assign("Team_3_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-3"))
		$xt->assign("Team_3_fieldblock",true);
	else
		$xt->assign("Team_3_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-4 - Percent
	
	$value = $pageObject->showDBValue("Team Split-4", $data, $keylink);
	if($mainTableOwnerID=="Team Split-4")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_4_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-4"))
		$xt->assign("Team_Split_4_fieldblock",true);
	else
		$xt->assign("Team_Split_4_tabfieldblock",true);
////////////////////////////////////////////
//Team-4 - 
	
	$value = $pageObject->showDBValue("Team-4", $data, $keylink);
	if($mainTableOwnerID=="Team-4")
		$ownerIdValue=$value;
	$xt->assign("Team_4_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-4"))
		$xt->assign("Team_4_fieldblock",true);
	else
		$xt->assign("Team_4_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-5 - Percent
	
	$value = $pageObject->showDBValue("Team Split-5", $data, $keylink);
	if($mainTableOwnerID=="Team Split-5")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_5_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-5"))
		$xt->assign("Team_Split_5_fieldblock",true);
	else
		$xt->assign("Team_Split_5_tabfieldblock",true);
////////////////////////////////////////////
//Team-5 - 
	
	$value = $pageObject->showDBValue("Team-5", $data, $keylink);
	if($mainTableOwnerID=="Team-5")
		$ownerIdValue=$value;
	$xt->assign("Team_5_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-5"))
		$xt->assign("Team_5_fieldblock",true);
	else
		$xt->assign("Team_5_tabfieldblock",true);
////////////////////////////////////////////
//Team Split-6 - Percent
	
	$value = $pageObject->showDBValue("Team Split-6", $data, $keylink);
	if($mainTableOwnerID=="Team Split-6")
		$ownerIdValue=$value;
	$xt->assign("Team_Split_6_value",$value);
	if(!$pageObject->isAppearOnTabs("Team Split-6"))
		$xt->assign("Team_Split_6_fieldblock",true);
	else
		$xt->assign("Team_Split_6_tabfieldblock",true);
////////////////////////////////////////////
//Team-6 - 
	
	$value = $pageObject->showDBValue("Team-6", $data, $keylink);
	if($mainTableOwnerID=="Team-6")
		$ownerIdValue=$value;
	$xt->assign("Team_6_value",$value);
	if(!$pageObject->isAppearOnTabs("Team-6"))
		$xt->assign("Team_6_fieldblock",true);
	else
		$xt->assign("Team_6_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-1 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-1", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-1")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_1_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-1"))
		$xt->assign("Fee_Split_1_fieldblock",true);
	else
		$xt->assign("Fee_Split_1_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-1 - 
	
	$value = $pageObject->showDBValue("Fee To-1", $data, $keylink);
	if($mainTableOwnerID=="Fee To-1")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_1_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-1"))
		$xt->assign("Fee_To_1_fieldblock",true);
	else
		$xt->assign("Fee_To_1_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-2 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-2", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-2")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_2_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-2"))
		$xt->assign("Fee_Split_2_fieldblock",true);
	else
		$xt->assign("Fee_Split_2_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-2 - 
	
	$value = $pageObject->showDBValue("Fee To-2", $data, $keylink);
	if($mainTableOwnerID=="Fee To-2")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_2_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-2"))
		$xt->assign("Fee_To_2_fieldblock",true);
	else
		$xt->assign("Fee_To_2_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-3 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-3", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-3")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_3_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-3"))
		$xt->assign("Fee_Split_3_fieldblock",true);
	else
		$xt->assign("Fee_Split_3_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-3 - 
	
	$value = $pageObject->showDBValue("Fee To-3", $data, $keylink);
	if($mainTableOwnerID=="Fee To-3")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_3_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-3"))
		$xt->assign("Fee_To_3_fieldblock",true);
	else
		$xt->assign("Fee_To_3_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-4 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-4", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-4")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_4_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-4"))
		$xt->assign("Fee_Split_4_fieldblock",true);
	else
		$xt->assign("Fee_Split_4_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-4 - 
	
	$value = $pageObject->showDBValue("Fee To-4", $data, $keylink);
	if($mainTableOwnerID=="Fee To-4")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_4_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-4"))
		$xt->assign("Fee_To_4_fieldblock",true);
	else
		$xt->assign("Fee_To_4_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-5 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-5", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-5")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_5_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-5"))
		$xt->assign("Fee_Split_5_fieldblock",true);
	else
		$xt->assign("Fee_Split_5_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-5 - 
	
	$value = $pageObject->showDBValue("Fee To-5", $data, $keylink);
	if($mainTableOwnerID=="Fee To-5")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_5_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-5"))
		$xt->assign("Fee_To_5_fieldblock",true);
	else
		$xt->assign("Fee_To_5_tabfieldblock",true);
////////////////////////////////////////////
//Fee Split-6 - Percent
	
	$value = $pageObject->showDBValue("Fee Split-6", $data, $keylink);
	if($mainTableOwnerID=="Fee Split-6")
		$ownerIdValue=$value;
	$xt->assign("Fee_Split_6_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee Split-6"))
		$xt->assign("Fee_Split_6_fieldblock",true);
	else
		$xt->assign("Fee_Split_6_tabfieldblock",true);
////////////////////////////////////////////
//Fee To-6 - 
	
	$value = $pageObject->showDBValue("Fee To-6", $data, $keylink);
	if($mainTableOwnerID=="Fee To-6")
		$ownerIdValue=$value;
	$xt->assign("Fee_To_6_value",$value);
	if(!$pageObject->isAppearOnTabs("Fee To-6"))
		$xt->assign("Fee_To_6_fieldblock",true);
	else
		$xt->assign("Fee_To_6_tabfieldblock",true);
////////////////////////////////////////////
//Paul - Checkbox
	
	$value = $pageObject->showDBValue("Paul", $data, $keylink);
	if($mainTableOwnerID=="Paul")
		$ownerIdValue=$value;
	$xt->assign("Paul_value",$value);
	if(!$pageObject->isAppearOnTabs("Paul"))
		$xt->assign("Paul_fieldblock",true);
	else
		$xt->assign("Paul_tabfieldblock",true);
////////////////////////////////////////////
//McBroom - Checkbox
	
	$value = $pageObject->showDBValue("McBroom", $data, $keylink);
	if($mainTableOwnerID=="McBroom")
		$ownerIdValue=$value;
	$xt->assign("McBroom_value",$value);
	if(!$pageObject->isAppearOnTabs("McBroom"))
		$xt->assign("McBroom_fieldblock",true);
	else
		$xt->assign("McBroom_tabfieldblock",true);
////////////////////////////////////////////
//Pipeline - 
	
	$value = $pageObject->showDBValue("Pipeline", $data, $keylink);
	if($mainTableOwnerID=="Pipeline")
		$ownerIdValue=$value;
	$xt->assign("Pipeline_value",$value);
	if(!$pageObject->isAppearOnTabs("Pipeline"))
		$xt->assign("Pipeline_fieldblock",true);
	else
		$xt->assign("Pipeline_tabfieldblock",true);
////////////////////////////////////////////
//Month of Close - Short Date
	
	$value = $pageObject->showDBValue("Month of Close", $data, $keylink);
	if($mainTableOwnerID=="Month of Close")
		$ownerIdValue=$value;
	$xt->assign("Month_of_Close_value",$value);
	if(!$pageObject->isAppearOnTabs("Month of Close"))
		$xt->assign("Month_of_Close_fieldblock",true);
	else
		$xt->assign("Month_of_Close_tabfieldblock",true);
////////////////////////////////////////////
//Gross This - 
	
	$value = $pageObject->showDBValue("Gross This", $data, $keylink);
	if($mainTableOwnerID=="Gross This")
		$ownerIdValue=$value;
	$xt->assign("Gross_This_value",$value);
	if(!$pageObject->isAppearOnTabs("Gross This"))
		$xt->assign("Gross_This_fieldblock",true);
	else
		$xt->assign("Gross_This_tabfieldblock",true);
////////////////////////////////////////////
//Gross Next - 
	
	$value = $pageObject->showDBValue("Gross Next", $data, $keylink);
	if($mainTableOwnerID=="Gross Next")
		$ownerIdValue=$value;
	$xt->assign("Gross_Next_value",$value);
	if(!$pageObject->isAppearOnTabs("Gross Next"))
		$xt->assign("Gross_Next_fieldblock",true);
	else
		$xt->assign("Gross_Next_tabfieldblock",true);

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
	}
	
	$dControlsMap = array();
	$dViewControlsMap = array();
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_VIEW;
		$options["mainMasterPageType"] = PAGE_VIEW;
		$options['masterTable'] = "company";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "company";
			continue;
		}
		
		$layout = GetPageLayout(GoodFieldName($strTableName), PAGE_LIST);
		if($layout)
		{
			$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
			$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
				, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
			$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
		}
		
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $pageObject->genId()+1;
		$mkr = 1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->permis[$strTableName]['search'] && $listPageObject->rowsFound)
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->addControlsJSAndCSS();
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $keySet=>$val)
			{
				if(!array_key_exists($keySet,$pageObject->settingsMap["globalSettings"]['shortTNames']))
					$pageObject->settingsMap["globalSettings"]['shortTNames'][$keySet] = $val;
			}
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
		
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
		
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap; 
	$strTableName = "company";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin prepare for Next Prev button
if(!@$_SESSION[$strTableName."_noNextPrev"] && !$inlineview && !$pdf)
{
	$pageObject->getNextPrevRecordKeys($data,"Search",$next,$prev);
}
//End prepare for Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}

$pageObject->addCommonJs();

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

if(!$inlineview)
{
	$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
		$pageObject->body["begin"].= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";		
	
	$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
	$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
	$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
	
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
	$xt->assign("pdflink_block",false);
	
	$pageObject->fillSetCntrlMaps();
	
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;
}
$xt->assign("style_block",true);
$xt->assign("stylefiles_block",true);

$editlink="";
$editkeys=array();
	$editkeys["editid1"]=postvalue("editid1");
foreach($editkeys as $key=>$val)
{
	if($editlink)
		$editlink.="&";
	$editlink.=$key."=".$val;
}
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='company_edit.php?".$editlink."'\"");

$strPerm = GetUserPermissions($strTableName);
if(CheckSecurity($ownerIdValue,"Edit") && !$inlineview && strpos($strPerm, "E")!==false)
	$xt->assign("edit_button",true);
else
	$xt->assign("edit_button",false);

if(!$pdf && !$all && !$inlineview)
{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin show Next Prev button
	$nextlink=$prevlink="";
	if(count($next))
	{
		$xt->assign("next_button",true);
	 		$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\"");
	}
	else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile = $pageObject->templatefile;

if(!$all)
{
	if($eventObj->exists("BeforeShowView"))
	{
		$templatefile = $pageObject->templatefile;
		$eventObj->BeforeShowView($xt,$templatefile,$data, $pageObject);
		$pageObject->templatefile = $templatefile;
	}
	if(!$pdf)
	{
		if(!$inlineview)
			$xt->display($pageObject->templatefile);
		else{
				$xt->load_template($pageObject->templatefile);
				$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
				if(count($pageObject->includes_css))
					$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
				if(count($pageObject->includes_cssIE))
					$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);				
				$returnJSON['idStartFrom'] = $id+1;
				$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
				echo (my_json_encode($returnJSON)); 
			}
	}
	break;
}
}


?>
