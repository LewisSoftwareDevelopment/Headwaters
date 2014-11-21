<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/company_variables.php");
include('include/xtempl.php');
include('classes/addpage.php');

global $globalEvents;

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'A') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	
	header("Location: login.php?message=expired"); 
	return;
}

if ((sizeof($_POST)==0) && (postvalue('ferror'))){
	if (postvalue("inline")){
		$returnJSON['success'] = false;
		$returnJSON['message'] = "Error occurred";
		$returnJSON['fatalError'] = true;
		echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
		exit();
	}
	else if (postvalue("fly")){
		echo -1;
		exit();
	}
	else {
		$_SESSION["message_add"] = "<< "."Error occurred"." >>";
	}
}

$layout = new TLayout("add2","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["top"] = array();
$layout->containers["add"] = array();

$layout->containers["add"][] = array("name"=>"addheader","block"=>"","substyle"=>2);


$layout->containers["add"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["add"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"addfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>3);


$layout->containers["fields"][] = array("name"=>"addbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["add"] = "1";
$layout->blocks["top"][] = "add";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["company_add"] = $layout;



$filename = "";
$status = "";
$message = "";
$mesClass = "";
$usermessage = "";
$error_happened = false;
$readavalues = false;

$keys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;
$popUpSave = false;

$sessionPrefix = $strTableName;

$onFly = false;
if(postvalue("onFly"))
	$onFly = true;

if(@$_REQUEST["editType"]=="inline")
	$inlineadd = ADD_INLINE;
elseif(@$_REQUEST["editType"]==ADD_POPUP)
{
	$inlineadd = ADD_POPUP;
	if(@$_POST["a"]=="added" && postvalue("field")=="" && postvalue("category")=="")
		$popUpSave = true;	
}
elseif(@$_REQUEST["editType"]==ADD_MASTER)
	$inlineadd = ADD_MASTER;
elseif($onFly)
{
	$inlineadd = ADD_ONTHEFLY;
	$sessionPrefix = $strTableName."_add";
}
else
	$inlineadd = ADD_SIMPLE;

if($inlineadd == ADD_INLINE)
	$templatefile = "company_inline_add.htm";
else
	$templatefile = "company_add.htm";

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

//If undefined session value for mastet table, but exist post value master table, than take second
//It may be happen only when use dpInline mode on page add
if(!@$_SESSION[$sessionPrefix."_mastertable"] && postvalue("mastertable"))
	$_SESSION[$sessionPrefix."_mastertable"] = postvalue("mastertable");
	
$xt = new Xtempl();
	
// assign an id
$xt->assign("id",$id);
	
$auditObj = GetAuditObject($strTableName);

//array of params for classes
$params = array("pageType" => PAGE_ADD,"id" => $id,"mode" => $inlineadd);


$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['includes_js'] = $includes_js;
$params['locale_info'] = $locale_info;
$params['includes_css'] = $includes_css;
$params['useTabsOnAdd'] = $gSettings->useTabsOnAdd();
$params['templatefile'] = $templatefile;
$params['includes_jsreq'] = $includes_jsreq;
$params['pageAddLikeInline'] = ($inlineadd==ADD_INLINE);
$params['needSearchClauseObj'] = false;
$params['strOriginalTableName'] = $strOriginalTableName;

if($params['useTabsOnAdd'])
	$params['arrAddTabs'] = $gSettings->getAddTabs();
	
$pageObject = new AddPage($params);

if(isset($_REQUEST['afteradd'])){
		header('Location: company_add.php');
	if($eventObj->exists("AfterAdd") && isset($_SESSION['after_add_data'][$_REQUEST['afteradd']])){
	
		$data = $_SESSION['after_add_data'][$_REQUEST['afteradd']];
		$eventObj->AfterAdd($data['avalues'], $data['keys'],$data['inlineadd'], $pageObject);
	
	}
	unset($_SESSION['after_add_data'][$_REQUEST['afteradd']]);
	
	foreach (is_array($_SESSION['after_add_data']) ? $_SESSION['after_add_data'] : array() as $k=>$v){
		if (!is_array($v) or !array_key_exists('time',$v)) {
			unset($_SESSION['after_add_data'][$k]);
			continue;
		}
		if ($v['time'] < time() - 3600){
			unset($_SESSION['after_add_data'][$k]);
		}
	}
		exit;
}

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;

//Array of fields, which appear on add page
$addFields = $pageObject->getFieldsByPageType();

// add button events if exist
if ($inlineadd==ADD_SIMPLE)
	$pageObject->addButtonHandlers();

$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//For show detail tables on master page add
if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables  && !isMobile())
	{
		$ids = $id;
		$countDetailsIsShow = 0;
					$pageObject->jsSettings['tableSettings'][$strTableName]['isShowDetails'] = $countDetailsIsShow > 0 ? true : false;
		$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	}
}

//	Before Process event
if($eventObj->exists("BeforeProcessAdd"))
	$eventObj->BeforeProcessAdd($conn, $pageObject);

// proccess captcha
if ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();
	
// insert new record if we have to
if(@$_POST["a"]=="added")
{
	$afilename_values=array();
	$avalues=array();
	$blobfields=array();
//	processing ID - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
		$control_ID = $pageObject->getControl("ID", $id);
		$control_ID->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ID - end
//	processing Company - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Company = $pageObject->getControl("Company", $id);
		$control_Company->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Company - end
//	processing EL Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_EL_Date = $pageObject->getControl("EL Date", $id);
		$control_EL_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing EL Date - end
//	processing IBC Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_IBC_Date = $pageObject->getControl("IBC Date", $id);
		$control_IBC_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing IBC Date - end
//	processing Est. Close Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Est__Close_Date = $pageObject->getControl("Est. Close Date", $id);
		$control_Est__Close_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Est. Close Date - end
//	processing Project Name - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Project_Name = $pageObject->getControl("Project Name", $id);
		$control_Project_Name->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Project Name - end
//	processing EL Expiration Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_EL_Expiration_Date = $pageObject->getControl("EL Expiration Date", $id);
		$control_EL_Expiration_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing EL Expiration Date - end
//	processing Status - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Status = $pageObject->getControl("Status", $id);
		$control_Status->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Status - end
//	processing Deal Type - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Deal_Type = $pageObject->getControl("Deal Type", $id);
		$control_Deal_Type->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Deal Type - end
//	processing Deal Slot - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Deal_Slot = $pageObject->getControl("Deal Slot", $id);
		$control_Deal_Slot->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Deal Slot - end
//	processing Closed Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Closed_Date = $pageObject->getControl("Closed Date", $id);
		$control_Closed_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Closed Date - end
//	processing Dead Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Dead_Date = $pageObject->getControl("Dead Date", $id);
		$control_Dead_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Dead Date - end
//	processing Primary Banker - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Primary_Banker = $pageObject->getControl("Primary Banker", $id);
		$control_Primary_Banker->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Primary Banker - end
//	processing Practice Area - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Practice_Area = $pageObject->getControl("Practice Area", $id);
		$control_Practice_Area->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Practice Area - end
//	processing Industry - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Industry = $pageObject->getControl("Industry", $id);
		$control_Industry->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Industry - end
//	processing Projected Transaction Size - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Projected_Transaction_Size = $pageObject->getControl("Projected Transaction Size", $id);
		$control_Projected_Transaction_Size->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Projected Transaction Size - end
//	processing Enterpise Value - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Enterpise_Value = $pageObject->getControl("Enterpise Value", $id);
		$control_Enterpise_Value->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Enterpise Value - end
//	processing Final Transaction Size - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Final_Transaction_Size = $pageObject->getControl("Final Transaction Size", $id);
		$control_Final_Transaction_Size->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Final Transaction Size - end
//	processing Projected Fee - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Projected_Fee = $pageObject->getControl("Projected Fee", $id);
		$control_Projected_Fee->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Projected Fee - end
//	processing Fee Minimum - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Minimum = $pageObject->getControl("Fee Minimum", $id);
		$control_Fee_Minimum->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Minimum - end
//	processing Engagment Fee - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Engagment_Fee = $pageObject->getControl("Engagment Fee", $id);
		$control_Engagment_Fee->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Engagment Fee - end
//	processing Fee Details - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Details = $pageObject->getControl("Fee Details", $id);
		$control_Fee_Details->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Details - end
//	processing Split to Corporate - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Split_to_Corporate = $pageObject->getControl("Split to Corporate", $id);
		$control_Split_to_Corporate->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Split to Corporate - end
//	processing Monthly Retainer - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Monthly_Retainer = $pageObject->getControl("Monthly Retainer", $id);
		$control_Monthly_Retainer->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Monthly Retainer - end
//	processing Final Total Sucess Fee - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Final_Total_Sucess_Fee = $pageObject->getControl("Final Total Sucess Fee", $id);
		$control_Final_Total_Sucess_Fee->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Final Total Sucess Fee - end
//	processing Ownership Class - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Ownership_Class = $pageObject->getControl("Ownership Class", $id);
		$control_Ownership_Class->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Ownership Class - end
//	processing Referral Type - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Referral_Type = $pageObject->getControl("Referral Type", $id);
		$control_Referral_Type->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Referral Type - end
//	processing Referral Source-Company - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Referral_Source_Company = $pageObject->getControl("Referral Source-Company", $id);
		$control_Referral_Source_Company->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Referral Source-Company - end
//	processing Referral Scource-Ind. - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Referral_Scource_Ind_ = $pageObject->getControl("Referral Scource-Ind.", $id);
		$control_Referral_Scource_Ind_->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Referral Scource-Ind. - end
//	processing Description - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Description = $pageObject->getControl("Description", $id);
		$control_Description->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Description - end
//	processing Team Split-1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_1 = $pageObject->getControl("Team Split-1", $id);
		$control_Team_Split_1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-1 - end
//	processing Team-1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_1 = $pageObject->getControl("Team-1", $id);
		$control_Team_1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-1 - end
//	processing Team Split-2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_2 = $pageObject->getControl("Team Split-2", $id);
		$control_Team_Split_2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-2 - end
//	processing Team-2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_2 = $pageObject->getControl("Team-2", $id);
		$control_Team_2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-2 - end
//	processing Team Split-3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_3 = $pageObject->getControl("Team Split-3", $id);
		$control_Team_Split_3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-3 - end
//	processing Team-3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_3 = $pageObject->getControl("Team-3", $id);
		$control_Team_3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-3 - end
//	processing Team Split-4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_4 = $pageObject->getControl("Team Split-4", $id);
		$control_Team_Split_4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-4 - end
//	processing Team-4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_4 = $pageObject->getControl("Team-4", $id);
		$control_Team_4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-4 - end
//	processing Team Split-5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_5 = $pageObject->getControl("Team Split-5", $id);
		$control_Team_Split_5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-5 - end
//	processing Team-5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_5 = $pageObject->getControl("Team-5", $id);
		$control_Team_5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-5 - end
//	processing Team Split-6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_Split_6 = $pageObject->getControl("Team Split-6", $id);
		$control_Team_Split_6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team Split-6 - end
//	processing Team-6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Team_6 = $pageObject->getControl("Team-6", $id);
		$control_Team_6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Team-6 - end
//	processing Fee Split-1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_1 = $pageObject->getControl("Fee Split-1", $id);
		$control_Fee_Split_1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-1 - end
//	processing Fee To-1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_1 = $pageObject->getControl("Fee To-1", $id);
		$control_Fee_To_1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-1 - end
//	processing Fee Split-2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_2 = $pageObject->getControl("Fee Split-2", $id);
		$control_Fee_Split_2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-2 - end
//	processing Fee To-2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_2 = $pageObject->getControl("Fee To-2", $id);
		$control_Fee_To_2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-2 - end
//	processing Fee Split-3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_3 = $pageObject->getControl("Fee Split-3", $id);
		$control_Fee_Split_3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-3 - end
//	processing Fee To-3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_3 = $pageObject->getControl("Fee To-3", $id);
		$control_Fee_To_3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-3 - end
//	processing Fee Split-4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_4 = $pageObject->getControl("Fee Split-4", $id);
		$control_Fee_Split_4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-4 - end
//	processing Fee To-4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_4 = $pageObject->getControl("Fee To-4", $id);
		$control_Fee_To_4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-4 - end
//	processing Fee Split-5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_5 = $pageObject->getControl("Fee Split-5", $id);
		$control_Fee_Split_5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-5 - end
//	processing Fee To-5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_5 = $pageObject->getControl("Fee To-5", $id);
		$control_Fee_To_5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-5 - end
//	processing Fee Split-6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_Split_6 = $pageObject->getControl("Fee Split-6", $id);
		$control_Fee_Split_6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee Split-6 - end
//	processing Fee To-6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Fee_To_6 = $pageObject->getControl("Fee To-6", $id);
		$control_Fee_To_6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Fee To-6 - end
//	processing Paul - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Paul = $pageObject->getControl("Paul", $id);
		$control_Paul->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Paul - end
//	processing McBroom - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_McBroom = $pageObject->getControl("McBroom", $id);
		$control_McBroom->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing McBroom - end
//	processing Pipeline - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Pipeline = $pageObject->getControl("Pipeline", $id);
		$control_Pipeline->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Pipeline - end
//	processing Month of Close - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Month_of_Close = $pageObject->getControl("Month of Close", $id);
		$control_Month_of_Close->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Month of Close - end
//	processing Gross This - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Gross_This = $pageObject->getControl("Gross This", $id);
		$control_Gross_This->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Gross This - end
//	processing Gross Next - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Gross_Next = $pageObject->getControl("Gross Next", $id);
		$control_Gross_Next->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Gross Next - end




	$failed_inline_add=false;
//	add filenames to values
	foreach($afilename_values as $akey=>$value)
		$avalues[$akey]=$value;
	
//	before Add event
	$retval = true;
	if($eventObj->exists("BeforeAdd"))
		$retval = $eventObj->BeforeAdd($avalues,$usermessage,(bool)$inlineadd, $pageObject);
	if($retval && $pageObject->isCaptchaOk)
	{
		//add or set updated lat-lng values for all map fileds with 'UpdateLatLng' ticked
		setUpdatedLatLng($avalues, $pageObject->cipherer->pSet);
		
		$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
		if(DoInsertRecord($strOriginalTableName,$avalues,$blobfields,$id,$pageObject, $pageObject->cipherer))
		{
			$IsSaved=true;
//	after edit event
			if($auditObj || $eventObj->exists("AfterAdd"))
			{
				foreach($keys as $idx=>$val)
					$avalues[$idx]=$val;
			}
			
			if($auditObj)
				$auditObj->LogAdd($strTableName,$avalues,$keys);
				
// Give possibility to all edit controls to clean their data				
//	processing ID - start
			$inlineAddOption = true;
			$inlineAddOption = $inlineadd==ADD_INLINE;
			if($inlineAddOption)
			{
				$control_ID->afterSuccessfulSave();
			}
//	processing ID - end
//	processing Company - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Company->afterSuccessfulSave();
			}
//	processing Company - end
//	processing EL Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_EL_Date->afterSuccessfulSave();
			}
//	processing EL Date - end
//	processing IBC Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_IBC_Date->afterSuccessfulSave();
			}
//	processing IBC Date - end
//	processing Est. Close Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Est__Close_Date->afterSuccessfulSave();
			}
//	processing Est. Close Date - end
//	processing Project Name - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Project_Name->afterSuccessfulSave();
			}
//	processing Project Name - end
//	processing EL Expiration Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_EL_Expiration_Date->afterSuccessfulSave();
			}
//	processing EL Expiration Date - end
//	processing Status - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Status->afterSuccessfulSave();
			}
//	processing Status - end
//	processing Deal Type - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Deal_Type->afterSuccessfulSave();
			}
//	processing Deal Type - end
//	processing Deal Slot - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Deal_Slot->afterSuccessfulSave();
			}
//	processing Deal Slot - end
//	processing Closed Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Closed_Date->afterSuccessfulSave();
			}
//	processing Closed Date - end
//	processing Dead Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Dead_Date->afterSuccessfulSave();
			}
//	processing Dead Date - end
//	processing Primary Banker - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Primary_Banker->afterSuccessfulSave();
			}
//	processing Primary Banker - end
//	processing Practice Area - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Practice_Area->afterSuccessfulSave();
			}
//	processing Practice Area - end
//	processing Industry - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Industry->afterSuccessfulSave();
			}
//	processing Industry - end
//	processing Projected Transaction Size - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Projected_Transaction_Size->afterSuccessfulSave();
			}
//	processing Projected Transaction Size - end
//	processing Enterpise Value - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Enterpise_Value->afterSuccessfulSave();
			}
//	processing Enterpise Value - end
//	processing Final Transaction Size - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Final_Transaction_Size->afterSuccessfulSave();
			}
//	processing Final Transaction Size - end
//	processing Projected Fee - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Projected_Fee->afterSuccessfulSave();
			}
//	processing Projected Fee - end
//	processing Fee Minimum - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Minimum->afterSuccessfulSave();
			}
//	processing Fee Minimum - end
//	processing Engagment Fee - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Engagment_Fee->afterSuccessfulSave();
			}
//	processing Engagment Fee - end
//	processing Fee Details - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Details->afterSuccessfulSave();
			}
//	processing Fee Details - end
//	processing Split to Corporate - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Split_to_Corporate->afterSuccessfulSave();
			}
//	processing Split to Corporate - end
//	processing Monthly Retainer - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Monthly_Retainer->afterSuccessfulSave();
			}
//	processing Monthly Retainer - end
//	processing Final Total Sucess Fee - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Final_Total_Sucess_Fee->afterSuccessfulSave();
			}
//	processing Final Total Sucess Fee - end
//	processing Ownership Class - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Ownership_Class->afterSuccessfulSave();
			}
//	processing Ownership Class - end
//	processing Referral Type - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Referral_Type->afterSuccessfulSave();
			}
//	processing Referral Type - end
//	processing Referral Source-Company - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Referral_Source_Company->afterSuccessfulSave();
			}
//	processing Referral Source-Company - end
//	processing Referral Scource-Ind. - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Referral_Scource_Ind_->afterSuccessfulSave();
			}
//	processing Referral Scource-Ind. - end
//	processing Description - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Description->afterSuccessfulSave();
			}
//	processing Description - end
//	processing Team Split-1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_1->afterSuccessfulSave();
			}
//	processing Team Split-1 - end
//	processing Team-1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_1->afterSuccessfulSave();
			}
//	processing Team-1 - end
//	processing Team Split-2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_2->afterSuccessfulSave();
			}
//	processing Team Split-2 - end
//	processing Team-2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_2->afterSuccessfulSave();
			}
//	processing Team-2 - end
//	processing Team Split-3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_3->afterSuccessfulSave();
			}
//	processing Team Split-3 - end
//	processing Team-3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_3->afterSuccessfulSave();
			}
//	processing Team-3 - end
//	processing Team Split-4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_4->afterSuccessfulSave();
			}
//	processing Team Split-4 - end
//	processing Team-4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_4->afterSuccessfulSave();
			}
//	processing Team-4 - end
//	processing Team Split-5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_5->afterSuccessfulSave();
			}
//	processing Team Split-5 - end
//	processing Team-5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_5->afterSuccessfulSave();
			}
//	processing Team-5 - end
//	processing Team Split-6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_Split_6->afterSuccessfulSave();
			}
//	processing Team Split-6 - end
//	processing Team-6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Team_6->afterSuccessfulSave();
			}
//	processing Team-6 - end
//	processing Fee Split-1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_1->afterSuccessfulSave();
			}
//	processing Fee Split-1 - end
//	processing Fee To-1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_1->afterSuccessfulSave();
			}
//	processing Fee To-1 - end
//	processing Fee Split-2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_2->afterSuccessfulSave();
			}
//	processing Fee Split-2 - end
//	processing Fee To-2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_2->afterSuccessfulSave();
			}
//	processing Fee To-2 - end
//	processing Fee Split-3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_3->afterSuccessfulSave();
			}
//	processing Fee Split-3 - end
//	processing Fee To-3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_3->afterSuccessfulSave();
			}
//	processing Fee To-3 - end
//	processing Fee Split-4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_4->afterSuccessfulSave();
			}
//	processing Fee Split-4 - end
//	processing Fee To-4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_4->afterSuccessfulSave();
			}
//	processing Fee To-4 - end
//	processing Fee Split-5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_5->afterSuccessfulSave();
			}
//	processing Fee Split-5 - end
//	processing Fee To-5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_5->afterSuccessfulSave();
			}
//	processing Fee To-5 - end
//	processing Fee Split-6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_Split_6->afterSuccessfulSave();
			}
//	processing Fee Split-6 - end
//	processing Fee To-6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Fee_To_6->afterSuccessfulSave();
			}
//	processing Fee To-6 - end
//	processing Paul - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Paul->afterSuccessfulSave();
			}
//	processing Paul - end
//	processing McBroom - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_McBroom->afterSuccessfulSave();
			}
//	processing McBroom - end
//	processing Pipeline - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Pipeline->afterSuccessfulSave();
			}
//	processing Pipeline - end
//	processing Month of Close - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Month_of_Close->afterSuccessfulSave();
			}
//	processing Month of Close - end
//	processing Gross This - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Gross_This->afterSuccessfulSave();
			}
//	processing Gross This - end
//	processing Gross Next - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Gross_Next->afterSuccessfulSave();
			}
//	processing Gross Next - end

			$afterAdd_id = '';	
			if($eventObj->exists("AfterAdd") && $inlineadd!=ADD_MASTER){
				$eventObj->AfterAdd($avalues,$keys,(bool)$inlineadd, $pageObject);
			} else if ($eventObj->exists("AfterAdd") && $inlineadd==ADD_MASTER){
				if($onFly)
					$eventObj->AfterAdd($avalues,$keys,(bool)$inlineadd, $pageObject);
				else{
					$afterAdd_id = generatePassword(20);	
				
					$_SESSION['after_add_data'][$afterAdd_id] = array(
						'avalues'=>$avalues,
						'keys'=>$keys,
						'inlineadd'=>(bool)$inlineadd,
						'time' => time()
					);	
				}
			}
				
			if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
			{
				$permis = array();
				$keylink = "";$k = 0;
				foreach($keys as $idx=>$val)
				{
					if($k!=0)
						$keylink .="&";
					$keylink .="editid".(++$k)."=".htmlspecialchars(rawurlencode(@$val));
				}
				$permis = $pageObject->getPermissions();				
				if (count($keys))
				{
					$message .="</br>";
					if($pageObject->pSet->hasEditPage() && $permis['edit'])
						$message .='&nbsp;<a href=\'company_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'company_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
				}
				$mesClass = "mes_ok";	
			}
		}
		elseif($inlineadd!=ADD_INLINE)
			$mesClass = "mes_not";	
	}
	else
	{
		$message = $usermessage;
		$status = "DECLINED";
		$readavalues = true;
	}
}
if($message)
	$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if (no_output_done() && $inlineadd==ADD_SIMPLE && $IsSaved)
{
	// saving message
	$_SESSION["message_add"] = ($message ? $message : "");
	// redirect
	header("Location: company_".$pageObject->getPageType().".php");
	// turned on output buffering, so we need to stop script
	exit();
}

if($inlineadd==ADD_MASTER && $IsSaved)
	$_SESSION["message_add"] = ($message ? $message : "");
	
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if($inlineadd==ADD_SIMPLE && isset($_SESSION["message_add"]))
{
	$message = $_SESSION["message_add"];
	unset($_SESSION["message_add"]);
}

$defvalues=array();

//	copy record
if(array_key_exists("copyid1",$_REQUEST) || array_key_exists("editid1",$_REQUEST))
{
	$copykeys=array();
	if(array_key_exists("copyid1",$_REQUEST))
	{
		$copykeys["ID"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["ID"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = $gQuery->gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs = db_query($strSQL,$conn);
	$defvalues = $pageObject->cipherer->DecryptFetchedArray($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["ID"]="";
//call CopyOnLoad event
	if($eventObj->exists("CopyOnLoad"))
		$eventObj->CopyOnLoad($defvalues,$strWhere, $pageObject);
}
else
{
	$defvalues["Team Split-1"] = 1.00;
	$defvalues["Pipeline"] = "Standard Margine Pipeline - Non-Corporate";
}



if($readavalues)
{
	$defvalues["Company"]=@$avalues["Company"];
	$defvalues["EL Date"]=@$avalues["EL Date"];
	$defvalues["Project Name"]=@$avalues["Project Name"];
	$defvalues["Status"]=@$avalues["Status"];
	$defvalues["Deal Type"]=@$avalues["Deal Type"];
	$defvalues["Projected Fee"]=@$avalues["Projected Fee"];
	$defvalues["Projected Transaction Size"]=@$avalues["Projected Transaction Size"];
	$defvalues["Est. Close Date"]=@$avalues["Est. Close Date"];
	$defvalues["Primary Banker"]=@$avalues["Primary Banker"];
	$defvalues["Practice Area"]=@$avalues["Practice Area"];
	$defvalues["Ownership Class"]=@$avalues["Ownership Class"];
	$defvalues["Industry"]=@$avalues["Industry"];
	$defvalues["Referral Type"]=@$avalues["Referral Type"];
	$defvalues["Referral Source-Company"]=@$avalues["Referral Source-Company"];
	$defvalues["Referral Scource-Ind."]=@$avalues["Referral Scource-Ind."];
	$defvalues["Description"]=@$avalues["Description"];
	$defvalues["Dead Date"]=@$avalues["Dead Date"];
	$defvalues["EL Expiration Date"]=@$avalues["EL Expiration Date"];
	$defvalues["Engagment Fee"]=@$avalues["Engagment Fee"];
	$defvalues["Fee Minimum"]=@$avalues["Fee Minimum"];
	$defvalues["Final Total Sucess Fee"]=@$avalues["Final Total Sucess Fee"];
	$defvalues["Final Transaction Size"]=@$avalues["Final Transaction Size"];
	$defvalues["Monthly Retainer"]=@$avalues["Monthly Retainer"];
	$defvalues["Closed Date"]=@$avalues["Closed Date"];
	$defvalues["Team Split-1"]=@$avalues["Team Split-1"];
	$defvalues["Team-1"]=@$avalues["Team-1"];
	$defvalues["Team Split-2"]=@$avalues["Team Split-2"];
	$defvalues["Team-2"]=@$avalues["Team-2"];
	$defvalues["Team Split-3"]=@$avalues["Team Split-3"];
	$defvalues["Team Split-4"]=@$avalues["Team Split-4"];
	$defvalues["Team Split-5"]=@$avalues["Team Split-5"];
	$defvalues["Team Split-6"]=@$avalues["Team Split-6"];
	$defvalues["Team-3"]=@$avalues["Team-3"];
	$defvalues["Team-4"]=@$avalues["Team-4"];
	$defvalues["Team-5"]=@$avalues["Team-5"];
	$defvalues["Team-6"]=@$avalues["Team-6"];
	$defvalues["Fee Split-1"]=@$avalues["Fee Split-1"];
	$defvalues["Fee Split-2"]=@$avalues["Fee Split-2"];
	$defvalues["Fee Split-3"]=@$avalues["Fee Split-3"];
	$defvalues["Fee Split-4"]=@$avalues["Fee Split-4"];
	$defvalues["Fee Split-5"]=@$avalues["Fee Split-5"];
	$defvalues["Fee Split-6"]=@$avalues["Fee Split-6"];
	$defvalues["Fee To-1"]=@$avalues["Fee To-1"];
	$defvalues["Fee To-2"]=@$avalues["Fee To-2"];
	$defvalues["Fee To-3"]=@$avalues["Fee To-3"];
	$defvalues["Fee To-4"]=@$avalues["Fee To-4"];
	$defvalues["Fee To-5"]=@$avalues["Fee To-5"];
	$defvalues["Fee To-6"]=@$avalues["Fee To-6"];
	$defvalues["Enterpise Value"]=@$avalues["Enterpise Value"];
	$defvalues["Fee Details"]=@$avalues["Fee Details"];
	$defvalues["Split to Corporate"]=@$avalues["Split to Corporate"];
	$defvalues["Paul"]=@$avalues["Paul"];
	$defvalues["McBroom"]=@$avalues["McBroom"];
	$defvalues["IBC Date"]=@$avalues["IBC Date"];
	$defvalues["Gross Next"]=@$avalues["Gross Next"];
	$defvalues["Gross This"]=@$avalues["Gross This"];
	$defvalues["Month of Close"]=@$avalues["Month of Close"];
	$defvalues["Deal Slot"]=@$avalues["Deal Slot"];
	$defvalues["Pipeline"]=@$avalues["Pipeline"];
}

if($eventObj->exists("ProcessValuesAdd"))
	$eventObj->ProcessValuesAdd($defvalues, $pageObject);


//for basic files
$includes="";

if($inlineadd!=ADD_INLINE)
{
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$includes .="<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
				$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
		if (!isMobile())
			$includes.="<div id=\"search_suggest\"></div>\r\n";
	}
	
	if(!$pageObject->isAppearOnTabs("Company"))
		$xt->assign("Company_fieldblock",true);
	else
		$xt->assign("Company_tabfieldblock",true);
	$xt->assign("Company_label",true);
	if(isEnableSection508())
		$xt->assign_section("Company_label","<label for=\"".GetInputElementId("Company", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("EL Date"))
		$xt->assign("EL_Date_fieldblock",true);
	else
		$xt->assign("EL_Date_tabfieldblock",true);
	$xt->assign("EL_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("EL_Date_label","<label for=\"".GetInputElementId("EL Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Project Name"))
		$xt->assign("Project_Name_fieldblock",true);
	else
		$xt->assign("Project_Name_tabfieldblock",true);
	$xt->assign("Project_Name_label",true);
	if(isEnableSection508())
		$xt->assign_section("Project_Name_label","<label for=\"".GetInputElementId("Project Name", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Status"))
		$xt->assign("Status_fieldblock",true);
	else
		$xt->assign("Status_tabfieldblock",true);
	$xt->assign("Status_label",true);
	if(isEnableSection508())
		$xt->assign_section("Status_label","<label for=\"".GetInputElementId("Status", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Deal Type"))
		$xt->assign("Deal_Type_fieldblock",true);
	else
		$xt->assign("Deal_Type_tabfieldblock",true);
	$xt->assign("Deal_Type_label",true);
	if(isEnableSection508())
		$xt->assign_section("Deal_Type_label","<label for=\"".GetInputElementId("Deal Type", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Projected Fee"))
		$xt->assign("Projected_Fee_fieldblock",true);
	else
		$xt->assign("Projected_Fee_tabfieldblock",true);
	$xt->assign("Projected_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Projected_Fee_label","<label for=\"".GetInputElementId("Projected Fee", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Projected Transaction Size"))
		$xt->assign("Projected_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Projected_Transaction_Size_tabfieldblock",true);
	$xt->assign("Projected_Transaction_Size_label",true);
	if(isEnableSection508())
		$xt->assign_section("Projected_Transaction_Size_label","<label for=\"".GetInputElementId("Projected Transaction Size", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Est. Close Date"))
		$xt->assign("Est__Close_Date_fieldblock",true);
	else
		$xt->assign("Est__Close_Date_tabfieldblock",true);
	$xt->assign("Est__Close_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Est__Close_Date_label","<label for=\"".GetInputElementId("Est. Close Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Primary Banker"))
		$xt->assign("Primary_Banker_fieldblock",true);
	else
		$xt->assign("Primary_Banker_tabfieldblock",true);
	$xt->assign("Primary_Banker_label",true);
	if(isEnableSection508())
		$xt->assign_section("Primary_Banker_label","<label for=\"".GetInputElementId("Primary Banker", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Practice Area"))
		$xt->assign("Practice_Area_fieldblock",true);
	else
		$xt->assign("Practice_Area_tabfieldblock",true);
	$xt->assign("Practice_Area_label",true);
	if(isEnableSection508())
		$xt->assign_section("Practice_Area_label","<label for=\"".GetInputElementId("Practice Area", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Ownership Class"))
		$xt->assign("Ownership_Class_fieldblock",true);
	else
		$xt->assign("Ownership_Class_tabfieldblock",true);
	$xt->assign("Ownership_Class_label",true);
	if(isEnableSection508())
		$xt->assign_section("Ownership_Class_label","<label for=\"".GetInputElementId("Ownership Class", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Industry"))
		$xt->assign("Industry_fieldblock",true);
	else
		$xt->assign("Industry_tabfieldblock",true);
	$xt->assign("Industry_label",true);
	if(isEnableSection508())
		$xt->assign_section("Industry_label","<label for=\"".GetInputElementId("Industry", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Referral Type"))
		$xt->assign("Referral_Type_fieldblock",true);
	else
		$xt->assign("Referral_Type_tabfieldblock",true);
	$xt->assign("Referral_Type_label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Type_label","<label for=\"".GetInputElementId("Referral Type", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Referral Source-Company"))
		$xt->assign("Referral_Source_Company_fieldblock",true);
	else
		$xt->assign("Referral_Source_Company_tabfieldblock",true);
	$xt->assign("Referral_Source_Company_label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Source_Company_label","<label for=\"".GetInputElementId("Referral Source-Company", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Referral Scource-Ind."))
		$xt->assign("Referral_Scource_Ind__fieldblock",true);
	else
		$xt->assign("Referral_Scource_Ind__tabfieldblock",true);
	$xt->assign("Referral_Scource_Ind__label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Scource_Ind__label","<label for=\"".GetInputElementId("Referral Scource-Ind.", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Description"))
		$xt->assign("Description_fieldblock",true);
	else
		$xt->assign("Description_tabfieldblock",true);
	$xt->assign("Description_label",true);
	if(isEnableSection508())
		$xt->assign_section("Description_label","<label for=\"".GetInputElementId("Description", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Dead Date"))
		$xt->assign("Dead_Date_fieldblock",true);
	else
		$xt->assign("Dead_Date_tabfieldblock",true);
	$xt->assign("Dead_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Dead_Date_label","<label for=\"".GetInputElementId("Dead Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("EL Expiration Date"))
		$xt->assign("EL_Expiration_Date_fieldblock",true);
	else
		$xt->assign("EL_Expiration_Date_tabfieldblock",true);
	$xt->assign("EL_Expiration_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("EL_Expiration_Date_label","<label for=\"".GetInputElementId("EL Expiration Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Engagment Fee"))
		$xt->assign("Engagment_Fee_fieldblock",true);
	else
		$xt->assign("Engagment_Fee_tabfieldblock",true);
	$xt->assign("Engagment_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Engagment_Fee_label","<label for=\"".GetInputElementId("Engagment Fee", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Minimum"))
		$xt->assign("Fee_Minimum_fieldblock",true);
	else
		$xt->assign("Fee_Minimum_tabfieldblock",true);
	$xt->assign("Fee_Minimum_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Minimum_label","<label for=\"".GetInputElementId("Fee Minimum", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Final Total Sucess Fee"))
		$xt->assign("Final_Total_Sucess_Fee_fieldblock",true);
	else
		$xt->assign("Final_Total_Sucess_Fee_tabfieldblock",true);
	$xt->assign("Final_Total_Sucess_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Final_Total_Sucess_Fee_label","<label for=\"".GetInputElementId("Final Total Sucess Fee", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Final Transaction Size"))
		$xt->assign("Final_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Final_Transaction_Size_tabfieldblock",true);
	$xt->assign("Final_Transaction_Size_label",true);
	if(isEnableSection508())
		$xt->assign_section("Final_Transaction_Size_label","<label for=\"".GetInputElementId("Final Transaction Size", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Monthly Retainer"))
		$xt->assign("Monthly_Retainer_fieldblock",true);
	else
		$xt->assign("Monthly_Retainer_tabfieldblock",true);
	$xt->assign("Monthly_Retainer_label",true);
	if(isEnableSection508())
		$xt->assign_section("Monthly_Retainer_label","<label for=\"".GetInputElementId("Monthly Retainer", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Closed Date"))
		$xt->assign("Closed_Date_fieldblock",true);
	else
		$xt->assign("Closed_Date_tabfieldblock",true);
	$xt->assign("Closed_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Closed_Date_label","<label for=\"".GetInputElementId("Closed Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-1"))
		$xt->assign("Team_Split_1_fieldblock",true);
	else
		$xt->assign("Team_Split_1_tabfieldblock",true);
	$xt->assign("Team_Split_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_1_label","<label for=\"".GetInputElementId("Team Split-1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-1"))
		$xt->assign("Team_1_fieldblock",true);
	else
		$xt->assign("Team_1_tabfieldblock",true);
	$xt->assign("Team_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_1_label","<label for=\"".GetInputElementId("Team-1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-2"))
		$xt->assign("Team_Split_2_fieldblock",true);
	else
		$xt->assign("Team_Split_2_tabfieldblock",true);
	$xt->assign("Team_Split_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_2_label","<label for=\"".GetInputElementId("Team Split-2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-2"))
		$xt->assign("Team_2_fieldblock",true);
	else
		$xt->assign("Team_2_tabfieldblock",true);
	$xt->assign("Team_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_2_label","<label for=\"".GetInputElementId("Team-2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-3"))
		$xt->assign("Team_Split_3_fieldblock",true);
	else
		$xt->assign("Team_Split_3_tabfieldblock",true);
	$xt->assign("Team_Split_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_3_label","<label for=\"".GetInputElementId("Team Split-3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-4"))
		$xt->assign("Team_Split_4_fieldblock",true);
	else
		$xt->assign("Team_Split_4_tabfieldblock",true);
	$xt->assign("Team_Split_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_4_label","<label for=\"".GetInputElementId("Team Split-4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-5"))
		$xt->assign("Team_Split_5_fieldblock",true);
	else
		$xt->assign("Team_Split_5_tabfieldblock",true);
	$xt->assign("Team_Split_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_5_label","<label for=\"".GetInputElementId("Team Split-5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team Split-6"))
		$xt->assign("Team_Split_6_fieldblock",true);
	else
		$xt->assign("Team_Split_6_tabfieldblock",true);
	$xt->assign("Team_Split_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_6_label","<label for=\"".GetInputElementId("Team Split-6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-3"))
		$xt->assign("Team_3_fieldblock",true);
	else
		$xt->assign("Team_3_tabfieldblock",true);
	$xt->assign("Team_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_3_label","<label for=\"".GetInputElementId("Team-3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-4"))
		$xt->assign("Team_4_fieldblock",true);
	else
		$xt->assign("Team_4_tabfieldblock",true);
	$xt->assign("Team_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_4_label","<label for=\"".GetInputElementId("Team-4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-5"))
		$xt->assign("Team_5_fieldblock",true);
	else
		$xt->assign("Team_5_tabfieldblock",true);
	$xt->assign("Team_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_5_label","<label for=\"".GetInputElementId("Team-5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Team-6"))
		$xt->assign("Team_6_fieldblock",true);
	else
		$xt->assign("Team_6_tabfieldblock",true);
	$xt->assign("Team_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_6_label","<label for=\"".GetInputElementId("Team-6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-1"))
		$xt->assign("Fee_Split_1_fieldblock",true);
	else
		$xt->assign("Fee_Split_1_tabfieldblock",true);
	$xt->assign("Fee_Split_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_1_label","<label for=\"".GetInputElementId("Fee Split-1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-2"))
		$xt->assign("Fee_Split_2_fieldblock",true);
	else
		$xt->assign("Fee_Split_2_tabfieldblock",true);
	$xt->assign("Fee_Split_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_2_label","<label for=\"".GetInputElementId("Fee Split-2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-3"))
		$xt->assign("Fee_Split_3_fieldblock",true);
	else
		$xt->assign("Fee_Split_3_tabfieldblock",true);
	$xt->assign("Fee_Split_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_3_label","<label for=\"".GetInputElementId("Fee Split-3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-4"))
		$xt->assign("Fee_Split_4_fieldblock",true);
	else
		$xt->assign("Fee_Split_4_tabfieldblock",true);
	$xt->assign("Fee_Split_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_4_label","<label for=\"".GetInputElementId("Fee Split-4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-5"))
		$xt->assign("Fee_Split_5_fieldblock",true);
	else
		$xt->assign("Fee_Split_5_tabfieldblock",true);
	$xt->assign("Fee_Split_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_5_label","<label for=\"".GetInputElementId("Fee Split-5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Split-6"))
		$xt->assign("Fee_Split_6_fieldblock",true);
	else
		$xt->assign("Fee_Split_6_tabfieldblock",true);
	$xt->assign("Fee_Split_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_6_label","<label for=\"".GetInputElementId("Fee Split-6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-1"))
		$xt->assign("Fee_To_1_fieldblock",true);
	else
		$xt->assign("Fee_To_1_tabfieldblock",true);
	$xt->assign("Fee_To_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_1_label","<label for=\"".GetInputElementId("Fee To-1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-2"))
		$xt->assign("Fee_To_2_fieldblock",true);
	else
		$xt->assign("Fee_To_2_tabfieldblock",true);
	$xt->assign("Fee_To_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_2_label","<label for=\"".GetInputElementId("Fee To-2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-3"))
		$xt->assign("Fee_To_3_fieldblock",true);
	else
		$xt->assign("Fee_To_3_tabfieldblock",true);
	$xt->assign("Fee_To_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_3_label","<label for=\"".GetInputElementId("Fee To-3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-4"))
		$xt->assign("Fee_To_4_fieldblock",true);
	else
		$xt->assign("Fee_To_4_tabfieldblock",true);
	$xt->assign("Fee_To_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_4_label","<label for=\"".GetInputElementId("Fee To-4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-5"))
		$xt->assign("Fee_To_5_fieldblock",true);
	else
		$xt->assign("Fee_To_5_tabfieldblock",true);
	$xt->assign("Fee_To_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_5_label","<label for=\"".GetInputElementId("Fee To-5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee To-6"))
		$xt->assign("Fee_To_6_fieldblock",true);
	else
		$xt->assign("Fee_To_6_tabfieldblock",true);
	$xt->assign("Fee_To_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_6_label","<label for=\"".GetInputElementId("Fee To-6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Enterpise Value"))
		$xt->assign("Enterpise_Value_fieldblock",true);
	else
		$xt->assign("Enterpise_Value_tabfieldblock",true);
	$xt->assign("Enterpise_Value_label",true);
	if(isEnableSection508())
		$xt->assign_section("Enterpise_Value_label","<label for=\"".GetInputElementId("Enterpise Value", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Fee Details"))
		$xt->assign("Fee_Details_fieldblock",true);
	else
		$xt->assign("Fee_Details_tabfieldblock",true);
	$xt->assign("Fee_Details_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Details_label","<label for=\"".GetInputElementId("Fee Details", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Split to Corporate"))
		$xt->assign("Split_to_Corporate_fieldblock",true);
	else
		$xt->assign("Split_to_Corporate_tabfieldblock",true);
	$xt->assign("Split_to_Corporate_label",true);
	if(isEnableSection508())
		$xt->assign_section("Split_to_Corporate_label","<label for=\"".GetInputElementId("Split to Corporate", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Paul"))
		$xt->assign("Paul_fieldblock",true);
	else
		$xt->assign("Paul_tabfieldblock",true);
	$xt->assign("Paul_label",true);
	if(isEnableSection508())
		$xt->assign_section("Paul_label","<label for=\"".GetInputElementId("Paul", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("McBroom"))
		$xt->assign("McBroom_fieldblock",true);
	else
		$xt->assign("McBroom_tabfieldblock",true);
	$xt->assign("McBroom_label",true);
	if(isEnableSection508())
		$xt->assign_section("McBroom_label","<label for=\"".GetInputElementId("McBroom", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("IBC Date"))
		$xt->assign("IBC_Date_fieldblock",true);
	else
		$xt->assign("IBC_Date_tabfieldblock",true);
	$xt->assign("IBC_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("IBC_Date_label","<label for=\"".GetInputElementId("IBC Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Gross Next"))
		$xt->assign("Gross_Next_fieldblock",true);
	else
		$xt->assign("Gross_Next_tabfieldblock",true);
	$xt->assign("Gross_Next_label",true);
	if(isEnableSection508())
		$xt->assign_section("Gross_Next_label","<label for=\"".GetInputElementId("Gross Next", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Gross This"))
		$xt->assign("Gross_This_fieldblock",true);
	else
		$xt->assign("Gross_This_tabfieldblock",true);
	$xt->assign("Gross_This_label",true);
	if(isEnableSection508())
		$xt->assign_section("Gross_This_label","<label for=\"".GetInputElementId("Gross This", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Month of Close"))
		$xt->assign("Month_of_Close_fieldblock",true);
	else
		$xt->assign("Month_of_Close_tabfieldblock",true);
	$xt->assign("Month_of_Close_label",true);
	if(isEnableSection508())
		$xt->assign_section("Month_of_Close_label","<label for=\"".GetInputElementId("Month of Close", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Deal Slot"))
		$xt->assign("Deal_Slot_fieldblock",true);
	else
		$xt->assign("Deal_Slot_tabfieldblock",true);
	$xt->assign("Deal_Slot_label",true);
	if(isEnableSection508())
		$xt->assign_section("Deal_Slot_label","<label for=\"".GetInputElementId("Deal Slot", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Pipeline"))
		$xt->assign("Pipeline_fieldblock",true);
	else
		$xt->assign("Pipeline_tabfieldblock",true);
	$xt->assign("Pipeline_label",true);
	if(isEnableSection508())
		$xt->assign_section("Pipeline_label","<label for=\"".GetInputElementId("Pipeline", $id, PAGE_ADD)."\">","</label>");
	
	
	
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$pageObject->body["begin"] .= $includes;
				$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
		$xt->assign("back_button",true);
	}
	else
	{		
		$xt->assign("cancelbutton_attrs", "id=\"cancelButton".$id."\"");
		$xt->assign("cancel_button",true);
		$xt->assign("header","");
	}
	$xt->assign("save_button",true);
}
$xt->assign("savebutton_attrs","id=\"saveButton".$id."\"");
$xt->assign("message_block",true);
$xt->assign("message",$message);
if(!strlen($message))
{
	$xt->displayBrickHidden("message");
}

//	show readonly fields
$linkdata="";

$i = 0;
$jsKeys = array();
$keyFields = array();
foreach($keys as $field=>$value)
{
	$keyFields[$i] = $field;
	$jsKeys[$i++] = $value;
}

if(@$_POST["a"]=="added" && $inlineadd==ADD_ONTHEFLY)
{
	if( !$error_happened && $status!="DECLINED")
	{
		$addedData = GetAddedDataLookupQuery($pageObject, $keys, false);
		$data =& $addedData[0];	
		
		if($data)
		{
			$respData = array($addedData[1]["linkField"] => @$data[$addedData[1]["linkFieldIndex"]], $addedData[1]["displayField"] => @$data[$addedData[1]["displayFieldIndex"]]);
		}
		else
		{
			$respData = array($addedData[1]["linkField"] => @$avalues[$addedData[1]["linkField"]], $addedData[1]["displayField"] => @$avalues[$addedData[1]["displayField"]]);
		}		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $jsKeys;
		$returnJSON['keyFields'] = $keyFields;
		$returnJSON['vals'] = $respData;
		$returnJSON['fields'] = $showFields;
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}

if(@$_POST["a"]=="added" && ($inlineadd == ADD_INLINE || $inlineadd == ADD_MASTER || $inlineadd==ADD_POPUP)) 
{
	//Preparation   view values
	//	get current values and show edit controls
	$dispFieldAlias = "";
	$data=0;
	$linkAndDispVals = array();
	if(count($keys))
	{
		$where=KeyWhere($keys);
			
		$forLookup = postvalue('forLookup');
		if ($forLookup)
		{
			$addedData = GetAddedDataLookupQuery($pageObject, $keys, true);
			$data =& $addedData[0];
			$linkAndDispVals = array('linkField' => $addedData[0][$addedData[1]["linkField"]], 'displayField' => $addedData[0][$addedData[1]["displayField"]]);
		}
		else
		{
			$strSQL = $gQuery->gSQLWhere_having_fromQuery('', $where, '');		
		
			LogInfo($strSQL);
			$rs=db_query($strSQL,$conn);
			$data = $pageObject->cipherer->DecryptFetchedArray($rs);
		}
	}
	if(!$data)
	{
		$data=$avalues;
		$HaveData=false;
	}
	//check if correct values added
	$showDetailKeys["bankers"]["masterkey1"] = $data["Primary Banker"];	
	$showDetailKeys["bankers"]["masterkey2"] = $data["Team-1"];	
	$showDetailKeys["bankers"]["masterkey3"] = $data["Team-2"];	
	$showDetailKeys["bankers"]["masterkey4"] = $data["Team-3"];	
	$showDetailKeys["bankers"]["masterkey5"] = $data["Team-4"];	
	$showDetailKeys["bankers"]["masterkey6"] = $data["Team-5"];	
	$showDetailKeys["bankers"]["masterkey7"] = $data["Team-6"];	
	$showDetailKeys["referral company"]["masterkey1"] = $data["Referral Source-Company"];	
	$showDetailKeys["referral individual"]["masterkey1"] = $data["Referral Scource-Ind."];	

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));
	
////////////////////////////////////////////
//	ID
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ID", $data, $keylink);
		$showValues["ID"] = $value;
		$showFields[] = "ID";
	}	
//	Company
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Company", $data, $keylink);
		$showValues["Company"] = $value;
		$showFields[] = "Company";
	}	
//	EL Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("EL Date", $data, $keylink);
		$showValues["EL Date"] = $value;
		$showFields[] = "EL Date";
	}	
//	Project Name
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Project Name", $data, $keylink);
		$showValues["Project Name"] = $value;
		$showFields[] = "Project Name";
	}	
//	Status
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Status", $data, $keylink);
		$showValues["Status"] = $value;
		$showFields[] = "Status";
	}	
//	Deal Type
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Deal Type", $data, $keylink);
		$showValues["Deal Type"] = $value;
		$showFields[] = "Deal Type";
	}	
//	Projected Fee
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Projected Fee", $data, $keylink);
		$showValues["Projected Fee"] = $value;
		$showFields[] = "Projected Fee";
	}	
//	Projected Transaction Size
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Projected Transaction Size", $data, $keylink);
		$showValues["Projected Transaction Size"] = $value;
		$showFields[] = "Projected Transaction Size";
	}	
//	Est. Close Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Est. Close Date", $data, $keylink);
		$showValues["Est. Close Date"] = $value;
		$showFields[] = "Est. Close Date";
	}	
//	Primary Banker
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Primary Banker", $data, $keylink);
		$showValues["Primary Banker"] = $value;
		$showFields[] = "Primary Banker";
	}	
//	Practice Area
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Practice Area", $data, $keylink);
		$showValues["Practice Area"] = $value;
		$showFields[] = "Practice Area";
	}	
//	Ownership Class
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Ownership Class", $data, $keylink);
		$showValues["Ownership Class"] = $value;
		$showFields[] = "Ownership Class";
	}	
//	Industry
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Industry", $data, $keylink);
		$showValues["Industry"] = $value;
		$showFields[] = "Industry";
	}	
//	Referral Type
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Referral Type", $data, $keylink);
		$showValues["Referral Type"] = $value;
		$showFields[] = "Referral Type";
	}	
//	Referral Source-Company
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Referral Source-Company", $data, $keylink);
		$showValues["Referral Source-Company"] = $value;
		$showFields[] = "Referral Source-Company";
	}	
//	Referral Scource-Ind.
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Referral Scource-Ind.", $data, $keylink);
		$showValues["Referral Scource-Ind."] = $value;
		$showFields[] = "Referral Scource-Ind.";
	}	
//	Description
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Description", $data, $keylink);
		$showValues["Description"] = $value;
		$showFields[] = "Description";
	}	
//	Dead Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Dead Date", $data, $keylink);
		$showValues["Dead Date"] = $value;
		$showFields[] = "Dead Date";
	}	
//	EL Expiration Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("EL Expiration Date", $data, $keylink);
		$showValues["EL Expiration Date"] = $value;
		$showFields[] = "EL Expiration Date";
	}	
//	Engagment Fee
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Engagment Fee", $data, $keylink);
		$showValues["Engagment Fee"] = $value;
		$showFields[] = "Engagment Fee";
	}	
//	Fee Minimum
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Minimum", $data, $keylink);
		$showValues["Fee Minimum"] = $value;
		$showFields[] = "Fee Minimum";
	}	
//	Final Total Sucess Fee
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Final Total Sucess Fee", $data, $keylink);
		$showValues["Final Total Sucess Fee"] = $value;
		$showFields[] = "Final Total Sucess Fee";
	}	
//	Final Transaction Size
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Final Transaction Size", $data, $keylink);
		$showValues["Final Transaction Size"] = $value;
		$showFields[] = "Final Transaction Size";
	}	
//	Monthly Retainer
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Monthly Retainer", $data, $keylink);
		$showValues["Monthly Retainer"] = $value;
		$showFields[] = "Monthly Retainer";
	}	
//	Closed Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Closed Date", $data, $keylink);
		$showValues["Closed Date"] = $value;
		$showFields[] = "Closed Date";
	}	
//	Team Split-1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-1", $data, $keylink);
		$showValues["Team Split-1"] = $value;
		$showFields[] = "Team Split-1";
	}	
//	Team-1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-1", $data, $keylink);
		$showValues["Team-1"] = $value;
		$showFields[] = "Team-1";
	}	
//	Team Split-2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-2", $data, $keylink);
		$showValues["Team Split-2"] = $value;
		$showFields[] = "Team Split-2";
	}	
//	Team-2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-2", $data, $keylink);
		$showValues["Team-2"] = $value;
		$showFields[] = "Team-2";
	}	
//	Team Split-3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-3", $data, $keylink);
		$showValues["Team Split-3"] = $value;
		$showFields[] = "Team Split-3";
	}	
//	Team Split-4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-4", $data, $keylink);
		$showValues["Team Split-4"] = $value;
		$showFields[] = "Team Split-4";
	}	
//	Team Split-5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-5", $data, $keylink);
		$showValues["Team Split-5"] = $value;
		$showFields[] = "Team Split-5";
	}	
//	Team Split-6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team Split-6", $data, $keylink);
		$showValues["Team Split-6"] = $value;
		$showFields[] = "Team Split-6";
	}	
//	Team-3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-3", $data, $keylink);
		$showValues["Team-3"] = $value;
		$showFields[] = "Team-3";
	}	
//	Team-4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-4", $data, $keylink);
		$showValues["Team-4"] = $value;
		$showFields[] = "Team-4";
	}	
//	Team-5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-5", $data, $keylink);
		$showValues["Team-5"] = $value;
		$showFields[] = "Team-5";
	}	
//	Team-6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Team-6", $data, $keylink);
		$showValues["Team-6"] = $value;
		$showFields[] = "Team-6";
	}	
//	Fee Split-1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-1", $data, $keylink);
		$showValues["Fee Split-1"] = $value;
		$showFields[] = "Fee Split-1";
	}	
//	Fee Split-2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-2", $data, $keylink);
		$showValues["Fee Split-2"] = $value;
		$showFields[] = "Fee Split-2";
	}	
//	Fee Split-3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-3", $data, $keylink);
		$showValues["Fee Split-3"] = $value;
		$showFields[] = "Fee Split-3";
	}	
//	Fee Split-4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-4", $data, $keylink);
		$showValues["Fee Split-4"] = $value;
		$showFields[] = "Fee Split-4";
	}	
//	Fee Split-5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-5", $data, $keylink);
		$showValues["Fee Split-5"] = $value;
		$showFields[] = "Fee Split-5";
	}	
//	Fee Split-6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Split-6", $data, $keylink);
		$showValues["Fee Split-6"] = $value;
		$showFields[] = "Fee Split-6";
	}	
//	Fee To-1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-1", $data, $keylink);
		$showValues["Fee To-1"] = $value;
		$showFields[] = "Fee To-1";
	}	
//	Fee To-2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-2", $data, $keylink);
		$showValues["Fee To-2"] = $value;
		$showFields[] = "Fee To-2";
	}	
//	Fee To-3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-3", $data, $keylink);
		$showValues["Fee To-3"] = $value;
		$showFields[] = "Fee To-3";
	}	
//	Fee To-4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-4", $data, $keylink);
		$showValues["Fee To-4"] = $value;
		$showFields[] = "Fee To-4";
	}	
//	Fee To-5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-5", $data, $keylink);
		$showValues["Fee To-5"] = $value;
		$showFields[] = "Fee To-5";
	}	
//	Fee To-6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee To-6", $data, $keylink);
		$showValues["Fee To-6"] = $value;
		$showFields[] = "Fee To-6";
	}	
//	Enterpise Value
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Enterpise Value", $data, $keylink);
		$showValues["Enterpise Value"] = $value;
		$showFields[] = "Enterpise Value";
	}	
//	Fee Details
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Fee Details", $data, $keylink);
		$showValues["Fee Details"] = $value;
		$showFields[] = "Fee Details";
	}	
//	Split to Corporate
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Split to Corporate", $data, $keylink);
		$showValues["Split to Corporate"] = $value;
		$showFields[] = "Split to Corporate";
	}	
//	Paul
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Paul", $data, $keylink);
		$showValues["Paul"] = $value;
		$showFields[] = "Paul";
	}	
//	McBroom
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("McBroom", $data, $keylink);
		$showValues["McBroom"] = $value;
		$showFields[] = "McBroom";
	}	
//	IBC Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("IBC Date", $data, $keylink);
		$showValues["IBC Date"] = $value;
		$showFields[] = "IBC Date";
	}	
//	Gross Next
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Gross Next", $data, $keylink);
		$showValues["Gross Next"] = $value;
		$showFields[] = "Gross Next";
	}	
//	Gross This
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Gross This", $data, $keylink);
		$showValues["Gross This"] = $value;
		$showFields[] = "Gross This";
	}	
//	Month of Close
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Month of Close", $data, $keylink);
		$showValues["Month of Close"] = $value;
		$showFields[] = "Month of Close";
	}	
//	Deal Slot
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Deal Slot", $data, $keylink);
		$showValues["Deal Slot"] = $value;
		$showFields[] = "Deal Slot";
	}	
//	Pipeline
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Pipeline", $data, $keylink);
		$showValues["Pipeline"] = $value;
		$showFields[] = "Pipeline";
	}	
		$showRawValues["ID"] = substr($data["ID"],0,100);
		$showRawValues["Company"] = substr($data["Company"],0,100);
		$showRawValues["EL Date"] = substr($data["EL Date"],0,100);
		$showRawValues["Project Name"] = substr($data["Project Name"],0,100);
		$showRawValues["Status"] = substr($data["Status"],0,100);
		$showRawValues["Deal Type"] = substr($data["Deal Type"],0,100);
		$showRawValues["Projected Fee"] = substr($data["Projected Fee"],0,100);
		$showRawValues["Projected Transaction Size"] = substr($data["Projected Transaction Size"],0,100);
		$showRawValues["Est. Close Date"] = substr($data["Est. Close Date"],0,100);
		$showRawValues["Primary Banker"] = substr($data["Primary Banker"],0,100);
		$showRawValues["Practice Area"] = substr($data["Practice Area"],0,100);
		$showRawValues["Ownership Class"] = substr($data["Ownership Class"],0,100);
		$showRawValues["Industry"] = substr($data["Industry"],0,100);
		$showRawValues["Referral Type"] = substr($data["Referral Type"],0,100);
		$showRawValues["Referral Source-Company"] = substr($data["Referral Source-Company"],0,100);
		$showRawValues["Referral Scource-Ind."] = substr($data["Referral Scource-Ind."],0,100);
		$showRawValues["Description"] = substr($data["Description"],0,100);
		$showRawValues["Dead Date"] = substr($data["Dead Date"],0,100);
		$showRawValues["EL Expiration Date"] = substr($data["EL Expiration Date"],0,100);
		$showRawValues["Engagment Fee"] = substr($data["Engagment Fee"],0,100);
		$showRawValues["Fee Minimum"] = substr($data["Fee Minimum"],0,100);
		$showRawValues["Final Total Sucess Fee"] = substr($data["Final Total Sucess Fee"],0,100);
		$showRawValues["Final Transaction Size"] = substr($data["Final Transaction Size"],0,100);
		$showRawValues["Monthly Retainer"] = substr($data["Monthly Retainer"],0,100);
		$showRawValues["Closed Date"] = substr($data["Closed Date"],0,100);
		$showRawValues["Team Split-1"] = substr($data["Team Split-1"],0,100);
		$showRawValues["Team-1"] = substr($data["Team-1"],0,100);
		$showRawValues["Team Split-2"] = substr($data["Team Split-2"],0,100);
		$showRawValues["Team-2"] = substr($data["Team-2"],0,100);
		$showRawValues["Team Split-3"] = substr($data["Team Split-3"],0,100);
		$showRawValues["Team Split-4"] = substr($data["Team Split-4"],0,100);
		$showRawValues["Team Split-5"] = substr($data["Team Split-5"],0,100);
		$showRawValues["Team Split-6"] = substr($data["Team Split-6"],0,100);
		$showRawValues["Team-3"] = substr($data["Team-3"],0,100);
		$showRawValues["Team-4"] = substr($data["Team-4"],0,100);
		$showRawValues["Team-5"] = substr($data["Team-5"],0,100);
		$showRawValues["Team-6"] = substr($data["Team-6"],0,100);
		$showRawValues["Fee Split-1"] = substr($data["Fee Split-1"],0,100);
		$showRawValues["Fee Split-2"] = substr($data["Fee Split-2"],0,100);
		$showRawValues["Fee Split-3"] = substr($data["Fee Split-3"],0,100);
		$showRawValues["Fee Split-4"] = substr($data["Fee Split-4"],0,100);
		$showRawValues["Fee Split-5"] = substr($data["Fee Split-5"],0,100);
		$showRawValues["Fee Split-6"] = substr($data["Fee Split-6"],0,100);
		$showRawValues["Fee To-1"] = substr($data["Fee To-1"],0,100);
		$showRawValues["Fee To-2"] = substr($data["Fee To-2"],0,100);
		$showRawValues["Fee To-3"] = substr($data["Fee To-3"],0,100);
		$showRawValues["Fee To-4"] = substr($data["Fee To-4"],0,100);
		$showRawValues["Fee To-5"] = substr($data["Fee To-5"],0,100);
		$showRawValues["Fee To-6"] = substr($data["Fee To-6"],0,100);
		$showRawValues["Enterpise Value"] = substr($data["Enterpise Value"],0,100);
		$showRawValues["Fee Details"] = substr($data["Fee Details"],0,100);
		$showRawValues["Split to Corporate"] = substr($data["Split to Corporate"],0,100);
		$showRawValues["Paul"] = substr($data["Paul"],0,100);
		$showRawValues["McBroom"] = substr($data["McBroom"],0,100);
		$showRawValues["IBC Date"] = substr($data["IBC Date"],0,100);
		$showRawValues["Gross Next"] = substr($data["Gross Next"],0,100);
		$showRawValues["Gross This"] = substr($data["Gross This"],0,100);
		$showRawValues["Month of Close"] = substr($data["Month of Close"],0,100);
		$showRawValues["Deal Slot"] = substr($data["Deal Slot"],0,100);
		$showRawValues["Pipeline"] = substr($data["Pipeline"],0,100);
	
	// for custom expression for display field
	if ($dispFieldAlias)
	{
		$showValues[] = $data[$dispFieldAlias];	
		$showFields[] = $dispFieldAlias;
		$showRawValues[] = substr($data[$dispFieldAlias],0,100);
	}
	
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_POPUP)
	{	
		if($IsSaved && count($showValues))
		{
			$returnJSON['success'] = true;
			if($HaveData){
				$returnJSON['noKeys'] = false;
			}else{
				$returnJSON['noKeys'] = true;
			}
			
			$returnJSON['keys'] = $jsKeys;
			$returnJSON['keyFields'] = $keyFields;
			$returnJSON['vals'] = $showValues;
			$returnJSON['fields'] = $showFields;
			$returnJSON['rawVals'] = $showRawValues;
			$returnJSON['detKeys'] = $showDetailKeys;
			$returnJSON['userMess'] = $usermessage;
			$returnJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
			// add link and display value if list page is lookup with search
			if(array_key_exists('linkField', $linkAndDispVals))
			{
				$returnJSON['linkValue'] = $linkAndDispVals['linkField'];
				$returnJSON['displayValue'] = $linkAndDispVals['displayField'];
			}
			if($globalEvents->exists("IsRecordEditable", $strTableName))
			{ 
				if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
					$returnJSON['nonEditable'] = true;
			}
			
			if($inlineadd==ADD_POPUP && isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
				$returnJSON['hideCaptcha'] = true;
		}
		else
		{
			$returnJSON['success'] = false;
			$returnJSON['message'] = $message;
			if(!$pageObject->isCaptchaOk)
				$returnJSON['captcha'] = false;
		}
		echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
		exit();
	}
} 

/////////////////////////////////////////////////////////////
if($inlineadd==ADD_MASTER)
{
	$respJSON = array();
	if(($_POST["a"]=="added" && $IsSaved))
	{
		$respJSON['afterAddId'] = $afterAdd_id;
		$respJSON['success'] = true;
		$respJSON['fields'] = $showFields;
		$respJSON['vals'] = $showValues;
		if($onFly){
			if($HaveData)
				$respJSON['noKeys'] = false;
			else
				$respJSON['noKeys'] = true;
			$respJSON['keys'] = $jsKeys;
			$respJSON['keyFields'] = $keyFields;
			$respJSON['rawVals'] = $showRawValues;
			$respJSON['detKeys'] = $showDetailKeys;
			$respJSON['userMess'] = $usermessage;
			$respJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
			if($globalEvents->exists("IsRecordEditable", $strTableName))
			{
				if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
					$respJSON['nonEditable'] = true;
			}
		}
		$respJSON['mKeys'] = array();
		for($i=0;$i<count($dpParams['ids']);$i++)
		{
			$data=0;
			if(count($keys))
			{
				$where=KeyWhere($keys);
							$strSQL = $gQuery->gSQLWhere($where);
				LogInfo($strSQL);
				$rs = db_query($strSQL,$conn);
				$data = $pageObject->cipherer->DecryptFetchedArray($rs);
			}
			if(!$data)
				$data=$avalues;
			
			$mKeyId = 1;
			foreach($mKeys[$dpParams['strTableNames'][$i]] as $mk)
			{
				if($data[$mk])
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = $data[$mk];
				else
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = '';
			}
		}
		if(isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
			$respJSON['hidecaptcha'] = true;
	}
	else{
			$respJSON['success'] = false;
			if(!$pageObject->isCaptchaOk)
				$respJSON['captcha'] = false;
			else
				$respJSON['error'] = $message;
			if($onFly)
				$respJSON['message'] = $message;
		}
	echo "<textarea>".htmlspecialchars(my_json_encode($respJSON))."</textarea>";
	exit();
}

/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////

//	validation stuff
$regex='';
$regexmessage='';
$regextype = '';
$control = array();

foreach($addFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))
	{
		$control[$gfName] = array();
		$control[$gfName]["func"] = "xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["ptype"] = PAGE_ADD;
		$control[$gfName]["params"]["field"] = $fName;
		$control[$gfName]["params"]["value"] = @$defvalues[$fName];
		$control[$gfName]["params"]["pageObj"] = $pageObject;
		if($pageObject->pSet->isUseRTE($fName))
			$_SESSION[$strTableName."_".$fName."_rte"] = @$defvalues[$fName];
		
		//	Begin Add validation
		$arrValidate = $pageObject->pSet->getValidation($fName);
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	//if richEditor for field
	if($pageObject->pSet->isUseRTE($fName))
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="add";
		$controls["controls"]['mode'] = "add";
	}
	else
	{
		if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="inline_add";
			$controls["controls"]['mode'] = "inline_add";
		}
		else
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="add";
			$controls["controls"]['mode'] = "add";
		}
	}
	
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$defvalues[$fName];
	
	// category control field
	$strCategoryControl = $pageObject->isDependOnField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $addFields))
		$vals = array($fName => @$defvalues[$fName], $strCategoryControl => @$defvalues[$strCategoryControl]);
	else
		$vals = array($fName => @$defvalues[$fName]);
	
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
	{
		$controls["controls"]['preloadData'] = $preload;
		if(!@$defvalues[$fName] && count($preload["vals"])>0)
			$defvalues[$fName] = $preload["vals"][0];
	}
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if($pageObject->pSet->getEditFormat($fName) == 'Time')
		$pageObject->fillTimePickSettings($fName, @$defvalues[$fName]);
	
	if((($detailKeys && in_array($fName, $detailKeys)) || $fName == postvalue("category")) && array_key_exists($fName, $defvalues))
	{
		$value = $pageObject->showDBValue($fName, $defvalues);
		
		$xt->assign($gfName."_editcontrol", $value);
	}
}

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_POPUP) && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		include("classes/searchclause.php");
	}
	
	$dControlsMap = array();
	$dViewControlsMap = array();
		
	$flyId = $ids+1;
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_ADD;
		$options["mainMasterPageType"] = PAGE_ADD;
		$options['masterTable'] = "company";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		
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
		$options['flyId'] = $flyId++;
		$mkr = 1;
		
		foreach($mKeys[$strTableName] as $mk)
		{
			if($defvalues[$mk])
				$options['masterKeysReq'][$mkr++] = $defvalues[$mk];
			else
				$options['masterKeysReq'][$mkr++] = '';
		}
		$listPageObject = ListPage::createListPage($strTableName,$options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		$flyId = $listPageObject->recId+1;
		
		//set page events
		foreach($listPageObject->eventsObject->events as $event => $name)
			$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
		
		//add detail settings to master settings
		$listPageObject->addControlsJSAndCSS();
		$listPageObject->fillSetCntrlMaps();
		$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];

		$dControlsMap[$strTableName] = $listPageObject->controlsMap;
		$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
		
		foreach($listPageObject->jsSettings["global"]["shortTNames"] as $tName => $shortTName){
			$pageObject->settingsMap["globalSettings"]["shortTNames"][$tName] = $shortTName;
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
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap;
	$strTableName = "company";
}
/////////////////////////////////////////////////////////////
//fill jsSettings and ControlsHTMLMap
$pageObject->fillSetCntrlMaps();

$pageObject->addCommonJs();

//For mobile version in apple device

if($inlineadd == ADD_SIMPLE)
{
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	$xt->assign("body", $pageObject->body);
	$xt->assign("flybody",true);
}

if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{ 
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody", $pageObject->body);
	$xt->assign("body",true);
}	

$xt->assign("style_block",true);

if($eventObj->exists("BeforeShowAdd"))
	$eventObj->BeforeShowAdd($xt, $templatefile, $pageObject);
	
if($inlineadd != ADD_SIMPLE)
{
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}

if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
	if(count($pageObject->includes_css))
		$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
	if(count($pageObject->includes_cssIE))
		$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON['idStartFrom'] = $id+1;	
	echo (my_json_encode($returnJSON)); 
}
elseif ($inlineadd == ADD_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($addFields as $fName)
	{
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");	
	}	
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON["additionalCSS"] = $pageObject->grabAllCSSFiles();
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);

function GetAddedDataLookupQuery($pageObject, $keys, $forLookup)
{
	global $conn, $strTableName, $strOriginalTableName;
	
	$LookupSQL = "";
	$linkfield = "";
	$dispfield = "";
	$noBlobReplace = false;
	$lookupFieldName = "";
	
	if($LookupSQL && $nLookupType != LT_QUERY)
		$LookupSQL.=" from ".AddTableWrappers($strOriginalTableName);
		
	$data = 0;
	$lookupIndexes = array("linkFieldIndex" => 0, "displayFieldIndex" => 0);
	if(count($keys))
	{
		$where = KeyWhere($keys);
		if($nLookupType == LT_QUERY){
			$LookupSQL = $lookupQueryObj->toSql(whereAdd($lookupQueryObj->m_where->toSql($lookupQueryObj), $where));
		}else 
			$LookupSQL.=" where ".$where;
		$lookupIndexes = GetLookupFieldsIndexes($lookupPSet, $lookupFieldName);
		LogInfo($LookupSQL);
		if($forLookup){
			$rs=db_query($LookupSQL,$conn);
			$data = $pageObject->cipherer->DecryptFetchedArray($rs);
		}else if($LookupSQL)
		{
			$rs = db_query($LookupSQL,$conn);
			$data = db_fetch_numarray($rs);
			$data[$lookupIndexes["linkFieldIndex"]] = $pageObject->cipherer->DecryptField($linkFieldName, $data[$lookupIndexes["linkFieldIndex"]]);
			if($nLookupType == LT_QUERY)
				$data[$lookupIndexes["displayFieldIndex"]] = $pageObject->cipherer->DecryptField($dispfield, $data[$lookupIndexes["displayFieldIndex"]]);		
		}
	}

	return array($data, array("linkField" => $linkFieldName, "displayField" => $dispfield
		, "linkFieldIndex" => $lookupIndexes["linkFieldIndex"], "displayFieldIndex" => $lookupIndexes["displayFieldIndex"]));
}	
	
?>
