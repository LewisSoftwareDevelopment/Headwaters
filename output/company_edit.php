<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/company_variables.php");
include('include/xtempl.php');
include('classes/editpage.php');
include("classes/searchclause.php");

add_nocache_headers();

global $globalEvents;

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'E') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Edit"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired");
	return;
}

$layout = new TLayout("edit2","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["top"] = array();
$layout->containers["edit"] = array();

$layout->containers["edit"][] = array("name"=>"editheader","block"=>"","substyle"=>2);


$layout->containers["edit"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["edit"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"editfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>3);


$layout->containers["fields"][] = array("name"=>"editbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["edit"] = "1";
$layout->blocks["top"][] = "edit";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["company_edit"] = $layout;




if ((sizeof($_POST)==0) && (postvalue('ferror')) && (!postvalue("editid1"))){
	$returnJSON['success'] = false;
	$returnJSON['message'] = "Error occurred";
	$returnJSON['fatalError'] = true;
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}
else if ((sizeof($_POST)==0) && (postvalue('ferror')) && (postvalue("editid1"))){
	if (postvalue('fly')){
		echo -1;
		exit();
	}
	else {
		$_SESSION["message_edit"] = "<< "."Error occurred"." >>";
	}
}
/////////////////////////////////////////////////////////////
//init variables
/////////////////////////////////////////////////////////////
if(postvalue("editType")=="inline")
	$inlineedit = EDIT_INLINE;
elseif(postvalue("editType")==EDIT_POPUP)
	$inlineedit = EDIT_POPUP;
else
	$inlineedit = EDIT_SIMPLE;

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

$flyId = $id+1;
$xt = new Xtempl();

// assign an id
$xt->assign("id",$id);

$templatefile = ($inlineedit == EDIT_INLINE) ? "company_inline_edit.htm" : "company_edit.htm";

//array of params for classes
$params = array("pageType" => PAGE_EDIT,"id" => $id);


$params['tName'] = $strTableName;
$params['xt'] = &$xt;
$params['mode'] = $inlineedit;
$params['includes_js'] = $includes_js;
$params['includes_jsreq'] = $includes_jsreq;
$params['includes_css'] = $includes_css;
$params['locale_info'] = $locale_info;
$params['templatefile'] = $templatefile;
$params['pageEditLikeInline'] = ($inlineedit == EDIT_INLINE);
//Get array of tabs for edit page
$params['useTabsOnEdit'] = $gSettings->useTabsOnEdit();
if($params['useTabsOnEdit'])
	$params['arrEditTabs'] = $gSettings->getEditTabs();

$pageObject = new EditPage($params);

//	For ajax request 
if($_REQUEST["action"]!="")
{
	if($pageObject->lockingObj)
	{
		$arrkeys = explode("&",refine($_REQUEST["keys"]));
		foreach($arrkeys as $ind=>$val)
			$arrkeys[$ind]=urldecode($val);
		
		if($_REQUEST["action"]=="unlock")
		{
			$pageObject->lockingObj->UnlockRecord($strTableName,$arrkeys,$_REQUEST["sid"]);
			exit();	
		}
		else if($_REQUEST["action"]=="lockadmin" && (IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP))
		{
			$pageObject->lockingObj->UnlockAdmin($strTableName,$arrkeys,$_REQUEST["startEdit"]=="yes");
			if($_REQUEST["startEdit"]=="no")
				echo "unlock";
			else if($_REQUEST["startEdit"]=="yes")
				echo "lock";
			exit();	
		}
		else if($_REQUEST["action"]=="confirm")
		{
			if(!$pageObject->lockingObj->ConfirmLock($strTableName,$arrkeys,$message));
				echo $message;
			exit();	
		}
	}
	else
		exit();
}

$filename = $status = $message = $mesClass = $usermessage = $strWhereClause = $bodyonload = "";
$showValues = $showRawValues = $showFields = $showDetailKeys = $key = $next = $prev = array();
$HaveData = $enableCtrlsForEditing = true;
$error_happened = $readevalues = $IsSaved = false;

$auditObj = GetAuditObject($strTableName);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;


if($pageObject->lockingObj)
{
	$system_attrs = "style='display:none;'";
	$system_message = "";
}

if ($inlineedit!=EDIT_INLINE)
{
	// add button events if exist
	$pageObject->addButtonHandlers();
}

$url_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//	Before Process event
if($eventObj->exists("BeforeProcessEdit"))
	$eventObj->BeforeProcessEdit($conn, $pageObject);

$keys = array();
$skeys = "";
$savedKeys = array();
$keys["ID"] = urldecode(postvalue("editid1"));
$savedKeys["ID"] = urldecode(postvalue("editid1"));
$skeys.= rawurlencode(postvalue("editid1"))."&";

$pageObject->setKeys($keys);

if($skeys!="")
	$skeys = substr($skeys,0,-1);

//For show detail tables on master page edit
if($inlineedit!=EDIT_INLINE)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables && !isMobile())
	{
		$ids = $id;
					$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	}
}
/////////////////////////////////////////////////////////////
//	process entered data, read and save
/////////////////////////////////////////////////////////////

// proccess captcha
if ($inlineedit!=EDIT_INLINE)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();

if(@$_POST["a"] == "edited")
{
	$strWhereClause = whereAdd($strWhereClause,KeyWhere($keys));
		$oldValuesRead = false;	
	if($eventObj->exists("AfterEdit") || $eventObj->exists("BeforeEdit") || $auditObj || isTableGeoUpdatable($pageObject->cipherer->pSet)
		|| $globalEvents->exists("IsRecordEditable", $strTableName))
	{
		//	read old values
		$rsold = db_query($gQuery->gSQLWhere($strWhereClause), $conn);
		$dataold = $pageObject->cipherer->DecryptFetchedArray($rsold);
		$oldValuesRead = true;
	}
	if($globalEvents->exists("IsRecordEditable", $strTableName))
	{
		if(!$globalEvents->IsRecordEditable($dataold, true, $strTableName))
			return SecurityRedirect($inlineedit);
	}
	$evalues = $efilename_values = $blobfields = array();
	

//	processing ID - begin
	$condition = $inlineedit==EDIT_INLINE;//($inlineedit) inline mode

	if($condition)
	{
		$control_ID = $pageObject->getControl("ID", $id);
		$control_ID->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		//	update key value
		if($control_ID->getWebValue()!==false)
			$keys["ID"] = $control_ID->getWebValue();
	}
//	processing ID - end
//	processing Company - begin
	$condition = 1;

	if($condition)
	{
		$control_Company = $pageObject->getControl("Company", $id);
		$control_Company->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Company - end
//	processing EL Date - begin
	$condition = 1;

	if($condition)
	{
		$control_EL_Date = $pageObject->getControl("EL Date", $id);
		$control_EL_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing EL Date - end
//	processing Project Name - begin
	$condition = 1;

	if($condition)
	{
		$control_Project_Name = $pageObject->getControl("Project Name", $id);
		$control_Project_Name->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Project Name - end
//	processing Status - begin
	$condition = 1;

	if($condition)
	{
		$control_Status = $pageObject->getControl("Status", $id);
		$control_Status->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Status - end
//	processing Deal Type - begin
	$condition = 1;

	if($condition)
	{
		$control_Deal_Type = $pageObject->getControl("Deal Type", $id);
		$control_Deal_Type->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Deal Type - end
//	processing Projected Fee - begin
	$condition = 1;

	if($condition)
	{
		$control_Projected_Fee = $pageObject->getControl("Projected Fee", $id);
		$control_Projected_Fee->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Projected Fee - end
//	processing Projected Transaction Size - begin
	$condition = 1;

	if($condition)
	{
		$control_Projected_Transaction_Size = $pageObject->getControl("Projected Transaction Size", $id);
		$control_Projected_Transaction_Size->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Projected Transaction Size - end
//	processing Est. Close Date - begin
	$condition = 1;

	if($condition)
	{
		$control_Est__Close_Date = $pageObject->getControl("Est. Close Date", $id);
		$control_Est__Close_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Est. Close Date - end
//	processing Primary Banker - begin
	$condition = 1;

	if($condition)
	{
		$control_Primary_Banker = $pageObject->getControl("Primary Banker", $id);
		$control_Primary_Banker->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Primary Banker - end
//	processing Practice Area - begin
	$condition = 1;

	if($condition)
	{
		$control_Practice_Area = $pageObject->getControl("Practice Area", $id);
		$control_Practice_Area->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Practice Area - end
//	processing Ownership Class - begin
	$condition = 1;

	if($condition)
	{
		$control_Ownership_Class = $pageObject->getControl("Ownership Class", $id);
		$control_Ownership_Class->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Ownership Class - end
//	processing Industry - begin
	$condition = 1;

	if($condition)
	{
		$control_Industry = $pageObject->getControl("Industry", $id);
		$control_Industry->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Industry - end
//	processing Referral Type - begin
	$condition = 1;

	if($condition)
	{
		$control_Referral_Type = $pageObject->getControl("Referral Type", $id);
		$control_Referral_Type->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Referral Type - end
//	processing Referral Source-Company - begin
	$condition = 1;

	if($condition)
	{
		$control_Referral_Source_Company = $pageObject->getControl("Referral Source-Company", $id);
		$control_Referral_Source_Company->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Referral Source-Company - end
//	processing Referral Scource-Ind. - begin
	$condition = 1;

	if($condition)
	{
		$control_Referral_Scource_Ind_ = $pageObject->getControl("Referral Scource-Ind.", $id);
		$control_Referral_Scource_Ind_->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Referral Scource-Ind. - end
//	processing Description - begin
	$condition = 1;

	if($condition)
	{
		$control_Description = $pageObject->getControl("Description", $id);
		$control_Description->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Description - end
//	processing Dead Date - begin
	$condition = 1;

	if($condition)
	{
		$control_Dead_Date = $pageObject->getControl("Dead Date", $id);
		$control_Dead_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Dead Date - end
//	processing EL Expiration Date - begin
	$condition = 1;

	if($condition)
	{
		$control_EL_Expiration_Date = $pageObject->getControl("EL Expiration Date", $id);
		$control_EL_Expiration_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing EL Expiration Date - end
//	processing Engagment Fee - begin
	$condition = 1;

	if($condition)
	{
		$control_Engagment_Fee = $pageObject->getControl("Engagment Fee", $id);
		$control_Engagment_Fee->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Engagment Fee - end
//	processing Fee Minimum - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Minimum = $pageObject->getControl("Fee Minimum", $id);
		$control_Fee_Minimum->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Minimum - end
//	processing Final Total Sucess Fee - begin
	$condition = 1;

	if($condition)
	{
		$control_Final_Total_Sucess_Fee = $pageObject->getControl("Final Total Sucess Fee", $id);
		$control_Final_Total_Sucess_Fee->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Final Total Sucess Fee - end
//	processing Final Transaction Size - begin
	$condition = 1;

	if($condition)
	{
		$control_Final_Transaction_Size = $pageObject->getControl("Final Transaction Size", $id);
		$control_Final_Transaction_Size->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Final Transaction Size - end
//	processing Monthly Retainer - begin
	$condition = 1;

	if($condition)
	{
		$control_Monthly_Retainer = $pageObject->getControl("Monthly Retainer", $id);
		$control_Monthly_Retainer->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Monthly Retainer - end
//	processing Closed Date - begin
	$condition = 1;

	if($condition)
	{
		$control_Closed_Date = $pageObject->getControl("Closed Date", $id);
		$control_Closed_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Closed Date - end
//	processing Team Split-1 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_1 = $pageObject->getControl("Team Split-1", $id);
		$control_Team_Split_1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-1 - end
//	processing Team-1 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_1 = $pageObject->getControl("Team-1", $id);
		$control_Team_1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-1 - end
//	processing Team Split-2 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_2 = $pageObject->getControl("Team Split-2", $id);
		$control_Team_Split_2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-2 - end
//	processing Team-2 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_2 = $pageObject->getControl("Team-2", $id);
		$control_Team_2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-2 - end
//	processing Team Split-3 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_3 = $pageObject->getControl("Team Split-3", $id);
		$control_Team_Split_3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-3 - end
//	processing Team Split-4 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_4 = $pageObject->getControl("Team Split-4", $id);
		$control_Team_Split_4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-4 - end
//	processing Team Split-5 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_5 = $pageObject->getControl("Team Split-5", $id);
		$control_Team_Split_5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-5 - end
//	processing Team Split-6 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_Split_6 = $pageObject->getControl("Team Split-6", $id);
		$control_Team_Split_6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team Split-6 - end
//	processing Team-3 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_3 = $pageObject->getControl("Team-3", $id);
		$control_Team_3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-3 - end
//	processing Team-4 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_4 = $pageObject->getControl("Team-4", $id);
		$control_Team_4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-4 - end
//	processing Team-5 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_5 = $pageObject->getControl("Team-5", $id);
		$control_Team_5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-5 - end
//	processing Team-6 - begin
	$condition = 1;

	if($condition)
	{
		$control_Team_6 = $pageObject->getControl("Team-6", $id);
		$control_Team_6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Team-6 - end
//	processing Fee Split-1 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_1 = $pageObject->getControl("Fee Split-1", $id);
		$control_Fee_Split_1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-1 - end
//	processing Fee Split-2 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_2 = $pageObject->getControl("Fee Split-2", $id);
		$control_Fee_Split_2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-2 - end
//	processing Fee Split-3 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_3 = $pageObject->getControl("Fee Split-3", $id);
		$control_Fee_Split_3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-3 - end
//	processing Fee Split-4 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_4 = $pageObject->getControl("Fee Split-4", $id);
		$control_Fee_Split_4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-4 - end
//	processing Fee Split-5 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_5 = $pageObject->getControl("Fee Split-5", $id);
		$control_Fee_Split_5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-5 - end
//	processing Fee Split-6 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Split_6 = $pageObject->getControl("Fee Split-6", $id);
		$control_Fee_Split_6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Split-6 - end
//	processing Fee To-1 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_1 = $pageObject->getControl("Fee To-1", $id);
		$control_Fee_To_1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-1 - end
//	processing Fee To-2 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_2 = $pageObject->getControl("Fee To-2", $id);
		$control_Fee_To_2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-2 - end
//	processing Fee To-3 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_3 = $pageObject->getControl("Fee To-3", $id);
		$control_Fee_To_3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-3 - end
//	processing Fee To-4 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_4 = $pageObject->getControl("Fee To-4", $id);
		$control_Fee_To_4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-4 - end
//	processing Fee To-5 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_5 = $pageObject->getControl("Fee To-5", $id);
		$control_Fee_To_5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-5 - end
//	processing Fee To-6 - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_To_6 = $pageObject->getControl("Fee To-6", $id);
		$control_Fee_To_6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee To-6 - end
//	processing Enterpise Value - begin
	$condition = 1;

	if($condition)
	{
		$control_Enterpise_Value = $pageObject->getControl("Enterpise Value", $id);
		$control_Enterpise_Value->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Enterpise Value - end
//	processing Fee Details - begin
	$condition = 1;

	if($condition)
	{
		$control_Fee_Details = $pageObject->getControl("Fee Details", $id);
		$control_Fee_Details->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Fee Details - end
//	processing Split to Corporate - begin
	$condition = 1;

	if($condition)
	{
		$control_Split_to_Corporate = $pageObject->getControl("Split to Corporate", $id);
		$control_Split_to_Corporate->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Split to Corporate - end
//	processing Paul - begin
	$condition = 1;

	if($condition)
	{
		$control_Paul = $pageObject->getControl("Paul", $id);
		$control_Paul->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Paul - end
//	processing McBroom - begin
	$condition = 1;

	if($condition)
	{
		$control_McBroom = $pageObject->getControl("McBroom", $id);
		$control_McBroom->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing McBroom - end
//	processing IBC Date - begin
	$condition = 1;

	if($condition)
	{
		$control_IBC_Date = $pageObject->getControl("IBC Date", $id);
		$control_IBC_Date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing IBC Date - end
//	processing Gross Next - begin
	$condition = 1;

	if($condition)
	{
		$control_Gross_Next = $pageObject->getControl("Gross Next", $id);
		$control_Gross_Next->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Gross Next - end
//	processing Gross This - begin
	$condition = 1;

	if($condition)
	{
		$control_Gross_This = $pageObject->getControl("Gross This", $id);
		$control_Gross_This->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Gross This - end
//	processing Month of Close - begin
	$condition = 1;

	if($condition)
	{
		$control_Month_of_Close = $pageObject->getControl("Month of Close", $id);
		$control_Month_of_Close->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Month of Close - end
//	processing Deal Slot - begin
	$condition = 1;

	if($condition)
	{
		$control_Deal_Slot = $pageObject->getControl("Deal Slot", $id);
		$control_Deal_Slot->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Deal Slot - end
//	processing Pipeline - begin
	$condition = 1;

	if($condition)
	{
		$control_Pipeline = $pageObject->getControl("Pipeline", $id);
		$control_Pipeline->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing Pipeline - end

	foreach($efilename_values as $ekey=>$value)
		$evalues[$ekey] = $value;
		
	if($pageObject->lockingObj)
	{
		$lockmessage = "";
		if(!$pageObject->lockingObj->ConfirmLock($strTableName,$savedKeys,$lockmessage))
		{
			$enableCtrlsForEditing = false;
			$system_attrs = "style='display:block;'";
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,false,$id);
				
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
				exit();
			}
			else
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$system_message = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,true,$id);
				else
					$system_message = $lockmessage;
			}
			$status = "DECLINED";
			$readevalues = true;
		}
	}
	
	if($readevalues==false)
	{
	//	do event
		$retval = true;
		if($eventObj->exists("BeforeEdit"))
			$retval=$eventObj->BeforeEdit($evalues,$strWhereClause,$dataold,$keys,$usermessage,(bool)$inlineedit, $pageObject);
	
		if($retval && $pageObject->isCaptchaOk)
		{		
			if($inlineedit!=EDIT_INLINE)
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
		
			//set updated lat-lng values for all map fileds with 'UpdateLatLng' ticked	
            if(isTableGeoUpdatable($pageObject->cipherer->pSet)) {			
				setUpdatedLatLng($evalues, $pageObject->cipherer->pSet, $dataold);
			}	
			
			if(DoUpdateRecord($strOriginalTableName,$evalues,$blobfields,$strWhereClause,$id,$pageObject, $pageObject->cipherer))
			{
				$IsSaved = true;

			// Give possibility to all edit controls to clean their data				
			//	processing ID - begin
							$condition = $inlineedit==EDIT_INLINE;//($inlineedit) inline mode
			
				if($condition)
				{
					$control_ID->afterSuccessfulSave();
				}
	//	processing ID - end
			//	processing Company - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Company->afterSuccessfulSave();
				}
	//	processing Company - end
			//	processing EL Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_EL_Date->afterSuccessfulSave();
				}
	//	processing EL Date - end
			//	processing Project Name - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Project_Name->afterSuccessfulSave();
				}
	//	processing Project Name - end
			//	processing Status - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Status->afterSuccessfulSave();
				}
	//	processing Status - end
			//	processing Deal Type - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Deal_Type->afterSuccessfulSave();
				}
	//	processing Deal Type - end
			//	processing Projected Fee - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Projected_Fee->afterSuccessfulSave();
				}
	//	processing Projected Fee - end
			//	processing Projected Transaction Size - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Projected_Transaction_Size->afterSuccessfulSave();
				}
	//	processing Projected Transaction Size - end
			//	processing Est. Close Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Est__Close_Date->afterSuccessfulSave();
				}
	//	processing Est. Close Date - end
			//	processing Primary Banker - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Primary_Banker->afterSuccessfulSave();
				}
	//	processing Primary Banker - end
			//	processing Practice Area - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Practice_Area->afterSuccessfulSave();
				}
	//	processing Practice Area - end
			//	processing Ownership Class - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Ownership_Class->afterSuccessfulSave();
				}
	//	processing Ownership Class - end
			//	processing Industry - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Industry->afterSuccessfulSave();
				}
	//	processing Industry - end
			//	processing Referral Type - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Referral_Type->afterSuccessfulSave();
				}
	//	processing Referral Type - end
			//	processing Referral Source-Company - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Referral_Source_Company->afterSuccessfulSave();
				}
	//	processing Referral Source-Company - end
			//	processing Referral Scource-Ind. - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Referral_Scource_Ind_->afterSuccessfulSave();
				}
	//	processing Referral Scource-Ind. - end
			//	processing Description - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Description->afterSuccessfulSave();
				}
	//	processing Description - end
			//	processing Dead Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Dead_Date->afterSuccessfulSave();
				}
	//	processing Dead Date - end
			//	processing EL Expiration Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_EL_Expiration_Date->afterSuccessfulSave();
				}
	//	processing EL Expiration Date - end
			//	processing Engagment Fee - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Engagment_Fee->afterSuccessfulSave();
				}
	//	processing Engagment Fee - end
			//	processing Fee Minimum - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Minimum->afterSuccessfulSave();
				}
	//	processing Fee Minimum - end
			//	processing Final Total Sucess Fee - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Final_Total_Sucess_Fee->afterSuccessfulSave();
				}
	//	processing Final Total Sucess Fee - end
			//	processing Final Transaction Size - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Final_Transaction_Size->afterSuccessfulSave();
				}
	//	processing Final Transaction Size - end
			//	processing Monthly Retainer - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Monthly_Retainer->afterSuccessfulSave();
				}
	//	processing Monthly Retainer - end
			//	processing Closed Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Closed_Date->afterSuccessfulSave();
				}
	//	processing Closed Date - end
			//	processing Team Split-1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_1->afterSuccessfulSave();
				}
	//	processing Team Split-1 - end
			//	processing Team-1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_1->afterSuccessfulSave();
				}
	//	processing Team-1 - end
			//	processing Team Split-2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_2->afterSuccessfulSave();
				}
	//	processing Team Split-2 - end
			//	processing Team-2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_2->afterSuccessfulSave();
				}
	//	processing Team-2 - end
			//	processing Team Split-3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_3->afterSuccessfulSave();
				}
	//	processing Team Split-3 - end
			//	processing Team Split-4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_4->afterSuccessfulSave();
				}
	//	processing Team Split-4 - end
			//	processing Team Split-5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_5->afterSuccessfulSave();
				}
	//	processing Team Split-5 - end
			//	processing Team Split-6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_Split_6->afterSuccessfulSave();
				}
	//	processing Team Split-6 - end
			//	processing Team-3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_3->afterSuccessfulSave();
				}
	//	processing Team-3 - end
			//	processing Team-4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_4->afterSuccessfulSave();
				}
	//	processing Team-4 - end
			//	processing Team-5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_5->afterSuccessfulSave();
				}
	//	processing Team-5 - end
			//	processing Team-6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Team_6->afterSuccessfulSave();
				}
	//	processing Team-6 - end
			//	processing Fee Split-1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_1->afterSuccessfulSave();
				}
	//	processing Fee Split-1 - end
			//	processing Fee Split-2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_2->afterSuccessfulSave();
				}
	//	processing Fee Split-2 - end
			//	processing Fee Split-3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_3->afterSuccessfulSave();
				}
	//	processing Fee Split-3 - end
			//	processing Fee Split-4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_4->afterSuccessfulSave();
				}
	//	processing Fee Split-4 - end
			//	processing Fee Split-5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_5->afterSuccessfulSave();
				}
	//	processing Fee Split-5 - end
			//	processing Fee Split-6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Split_6->afterSuccessfulSave();
				}
	//	processing Fee Split-6 - end
			//	processing Fee To-1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_1->afterSuccessfulSave();
				}
	//	processing Fee To-1 - end
			//	processing Fee To-2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_2->afterSuccessfulSave();
				}
	//	processing Fee To-2 - end
			//	processing Fee To-3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_3->afterSuccessfulSave();
				}
	//	processing Fee To-3 - end
			//	processing Fee To-4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_4->afterSuccessfulSave();
				}
	//	processing Fee To-4 - end
			//	processing Fee To-5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_5->afterSuccessfulSave();
				}
	//	processing Fee To-5 - end
			//	processing Fee To-6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_To_6->afterSuccessfulSave();
				}
	//	processing Fee To-6 - end
			//	processing Enterpise Value - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Enterpise_Value->afterSuccessfulSave();
				}
	//	processing Enterpise Value - end
			//	processing Fee Details - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Fee_Details->afterSuccessfulSave();
				}
	//	processing Fee Details - end
			//	processing Split to Corporate - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Split_to_Corporate->afterSuccessfulSave();
				}
	//	processing Split to Corporate - end
			//	processing Paul - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Paul->afterSuccessfulSave();
				}
	//	processing Paul - end
			//	processing McBroom - begin
							$condition = 1;
			
				if($condition)
				{
					$control_McBroom->afterSuccessfulSave();
				}
	//	processing McBroom - end
			//	processing IBC Date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_IBC_Date->afterSuccessfulSave();
				}
	//	processing IBC Date - end
			//	processing Gross Next - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Gross_Next->afterSuccessfulSave();
				}
	//	processing Gross Next - end
			//	processing Gross This - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Gross_This->afterSuccessfulSave();
				}
	//	processing Gross This - end
			//	processing Month of Close - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Month_of_Close->afterSuccessfulSave();
				}
	//	processing Month of Close - end
			//	processing Deal Slot - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Deal_Slot->afterSuccessfulSave();
				}
	//	processing Deal Slot - end
			//	processing Pipeline - begin
							$condition = 1;
			
				if($condition)
				{
					$control_Pipeline->afterSuccessfulSave();
				}
	//	processing Pipeline - end
				
				//	after edit event
				if($pageObject->lockingObj && $inlineedit == EDIT_INLINE)
					$pageObject->lockingObj->UnlockRecord($strTableName,$savedKeys,"");
				if($auditObj || $eventObj->exists("AfterEdit"))
				{
					foreach($dataold as $idx=>$val)
					{
						if(!array_key_exists($idx,$evalues))
							$evalues[$idx] = $val;
					}
				}

				if($auditObj)
					$auditObj->LogEdit($strTableName,$evalues,$dataold,$keys);
				if($eventObj->exists("AfterEdit"))
					$eventObj->AfterEdit($evalues,KeyWhere($keys),$dataold,$keys,(bool)$inlineedit, $pageObject);
							
				$mesClass = "mes_ok";
			}
			elseif($inlineedit!=EDIT_INLINE)
				$mesClass = "mes_not";	
		}
		else
		{
			$message = $usermessage;
			$readevalues = true;
			$status = "DECLINED";
		}
	}
	if($readevalues)
		$keys = $savedKeys;
}
//else
{
	/////////////////////////
	//Locking recors
	/////////////////////////

	if($pageObject->lockingObj)
	{
		$enableCtrlsForEditing = $pageObject->lockingObj->LockRecord($strTableName,$keys);
		if(!$enableCtrlsForEditing)
		{
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,false,$id);
				else
					$lockmessage = $pageObject->lockingObj->LockUser;
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo my_json_encode($returnJSON);
				exit();
			}
			
			$system_attrs = "style='display:block;'";
			$system_message = $pageObject->lockingObj->LockUser;
			
			if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
			{
				$rb = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,true,$id);
				if($rb!="")
					$system_message = $rb;
			}
		}
	}
}

if($pageObject->lockingObj && $inlineedit!=EDIT_INLINE)
	$pageObject->body["begin"] .='<div class="runner-locking" '.$system_attrs.'>'.$system_message.'</div>';

if($message)
	$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if ($IsSaved && no_output_done() && $inlineedit == EDIT_SIMPLE)
{
	// saving message
	$_SESSION["message_edit"] = ($message ? $message : "");
	// key get query
	$keyGetQ = "";
		$keyGetQ.="editid1=".rawurldecode($keys["ID"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: company_".$pageObject->getPageType().".php?".$keyGetQ);
	// turned on output buffering, so we need to stop script
	exit();
}
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if ($inlineedit == EDIT_SIMPLE && isset($_SESSION["message_edit"]))
{
	$message = $_SESSION["message_edit"];
	unset($_SESSION["message_edit"]);
}


$pageObject->setKeys($keys);
$pageObject->readEditValues = $readevalues;
if($readevalues)
	$pageObject->editValues = $evalues;

//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();
if(!$data)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		header("Location: company_list.php?a=return");
		exit();
	}
	else
		$data = array();
}

if($globalEvents->exists("IsRecordEditable", $strTableName))
{
	if(!$globalEvents->IsRecordEditable($data, true, $strTableName) && $inlineedit != EDIT_INLINE)
	{
		return SecurityRedirect($inlineedit);
	}
}


//global variable use in BuildEditControl function
//	show readonly fields

if($readevalues)
{
	$data["ID"] = $evalues["ID"];
	$data["Company"] = $evalues["Company"];
	$data["EL Date"] = $evalues["EL Date"];
	$data["Project Name"] = $evalues["Project Name"];
	$data["Status"] = $evalues["Status"];
	$data["Deal Type"] = $evalues["Deal Type"];
	$data["Projected Fee"] = $evalues["Projected Fee"];
	$data["Projected Transaction Size"] = $evalues["Projected Transaction Size"];
	$data["Est. Close Date"] = $evalues["Est. Close Date"];
	$data["Primary Banker"] = $evalues["Primary Banker"];
	$data["Practice Area"] = $evalues["Practice Area"];
	$data["Ownership Class"] = $evalues["Ownership Class"];
	$data["Industry"] = $evalues["Industry"];
	$data["Referral Type"] = $evalues["Referral Type"];
	$data["Referral Source-Company"] = $evalues["Referral Source-Company"];
	$data["Referral Scource-Ind."] = $evalues["Referral Scource-Ind."];
	$data["Description"] = $evalues["Description"];
	$data["Dead Date"] = $evalues["Dead Date"];
	$data["EL Expiration Date"] = $evalues["EL Expiration Date"];
	$data["Engagment Fee"] = $evalues["Engagment Fee"];
	$data["Fee Minimum"] = $evalues["Fee Minimum"];
	$data["Final Total Sucess Fee"] = $evalues["Final Total Sucess Fee"];
	$data["Final Transaction Size"] = $evalues["Final Transaction Size"];
	$data["Monthly Retainer"] = $evalues["Monthly Retainer"];
	$data["Closed Date"] = $evalues["Closed Date"];
	$data["Team Split-1"] = $evalues["Team Split-1"];
	$data["Team-1"] = $evalues["Team-1"];
	$data["Team Split-2"] = $evalues["Team Split-2"];
	$data["Team-2"] = $evalues["Team-2"];
	$data["Team Split-3"] = $evalues["Team Split-3"];
	$data["Team Split-4"] = $evalues["Team Split-4"];
	$data["Team Split-5"] = $evalues["Team Split-5"];
	$data["Team Split-6"] = $evalues["Team Split-6"];
	$data["Team-3"] = $evalues["Team-3"];
	$data["Team-4"] = $evalues["Team-4"];
	$data["Team-5"] = $evalues["Team-5"];
	$data["Team-6"] = $evalues["Team-6"];
	$data["Fee Split-1"] = $evalues["Fee Split-1"];
	$data["Fee Split-2"] = $evalues["Fee Split-2"];
	$data["Fee Split-3"] = $evalues["Fee Split-3"];
	$data["Fee Split-4"] = $evalues["Fee Split-4"];
	$data["Fee Split-5"] = $evalues["Fee Split-5"];
	$data["Fee Split-6"] = $evalues["Fee Split-6"];
	$data["Fee To-1"] = $evalues["Fee To-1"];
	$data["Fee To-2"] = $evalues["Fee To-2"];
	$data["Fee To-3"] = $evalues["Fee To-3"];
	$data["Fee To-4"] = $evalues["Fee To-4"];
	$data["Fee To-5"] = $evalues["Fee To-5"];
	$data["Fee To-6"] = $evalues["Fee To-6"];
	$data["Enterpise Value"] = $evalues["Enterpise Value"];
	$data["Fee Details"] = $evalues["Fee Details"];
	$data["Split to Corporate"] = $evalues["Split to Corporate"];
	$data["Paul"] = $evalues["Paul"];
	$data["McBroom"] = $evalues["McBroom"];
	$data["IBC Date"] = $evalues["IBC Date"];
	$data["Gross Next"] = $evalues["Gross Next"];
	$data["Gross This"] = $evalues["Gross This"];
	$data["Month of Close"] = $evalues["Month of Close"];
	$data["Deal Slot"] = $evalues["Deal Slot"];
	$data["Pipeline"] = $evalues["Pipeline"];
}

/////////////////////////////////////////////////////////////
//	assign values to $xt class, prepare page for displaying
/////////////////////////////////////////////////////////////
//Basic includes js files
$includes = "";
//javascript code
	
if($inlineedit != EDIT_INLINE)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		$includes.= "<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
				$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
		
		if (!isMobile())
			$includes.= "<div id=\"search_suggest".$id."\"></div>\r\n";
			
		$pageObject->body["begin"].= $includes;
	}	

	if(!$pageObject->isAppearOnTabs("Company"))
		$xt->assign("Company_fieldblock",true);
	else
		$xt->assign("Company_tabfieldblock",true);
	$xt->assign("Company_label",true);
	if(isEnableSection508())
		$xt->assign_section("Company_label","<label for=\"".GetInputElementId("Company", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("EL Date"))
		$xt->assign("EL_Date_fieldblock",true);
	else
		$xt->assign("EL_Date_tabfieldblock",true);
	$xt->assign("EL_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("EL_Date_label","<label for=\"".GetInputElementId("EL Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Project Name"))
		$xt->assign("Project_Name_fieldblock",true);
	else
		$xt->assign("Project_Name_tabfieldblock",true);
	$xt->assign("Project_Name_label",true);
	if(isEnableSection508())
		$xt->assign_section("Project_Name_label","<label for=\"".GetInputElementId("Project Name", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Status"))
		$xt->assign("Status_fieldblock",true);
	else
		$xt->assign("Status_tabfieldblock",true);
	$xt->assign("Status_label",true);
	if(isEnableSection508())
		$xt->assign_section("Status_label","<label for=\"".GetInputElementId("Status", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Deal Type"))
		$xt->assign("Deal_Type_fieldblock",true);
	else
		$xt->assign("Deal_Type_tabfieldblock",true);
	$xt->assign("Deal_Type_label",true);
	if(isEnableSection508())
		$xt->assign_section("Deal_Type_label","<label for=\"".GetInputElementId("Deal Type", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Projected Fee"))
		$xt->assign("Projected_Fee_fieldblock",true);
	else
		$xt->assign("Projected_Fee_tabfieldblock",true);
	$xt->assign("Projected_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Projected_Fee_label","<label for=\"".GetInputElementId("Projected Fee", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Projected Transaction Size"))
		$xt->assign("Projected_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Projected_Transaction_Size_tabfieldblock",true);
	$xt->assign("Projected_Transaction_Size_label",true);
	if(isEnableSection508())
		$xt->assign_section("Projected_Transaction_Size_label","<label for=\"".GetInputElementId("Projected Transaction Size", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Est. Close Date"))
		$xt->assign("Est__Close_Date_fieldblock",true);
	else
		$xt->assign("Est__Close_Date_tabfieldblock",true);
	$xt->assign("Est__Close_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Est__Close_Date_label","<label for=\"".GetInputElementId("Est. Close Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Primary Banker"))
		$xt->assign("Primary_Banker_fieldblock",true);
	else
		$xt->assign("Primary_Banker_tabfieldblock",true);
	$xt->assign("Primary_Banker_label",true);
	if(isEnableSection508())
		$xt->assign_section("Primary_Banker_label","<label for=\"".GetInputElementId("Primary Banker", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Practice Area"))
		$xt->assign("Practice_Area_fieldblock",true);
	else
		$xt->assign("Practice_Area_tabfieldblock",true);
	$xt->assign("Practice_Area_label",true);
	if(isEnableSection508())
		$xt->assign_section("Practice_Area_label","<label for=\"".GetInputElementId("Practice Area", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Ownership Class"))
		$xt->assign("Ownership_Class_fieldblock",true);
	else
		$xt->assign("Ownership_Class_tabfieldblock",true);
	$xt->assign("Ownership_Class_label",true);
	if(isEnableSection508())
		$xt->assign_section("Ownership_Class_label","<label for=\"".GetInputElementId("Ownership Class", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Industry"))
		$xt->assign("Industry_fieldblock",true);
	else
		$xt->assign("Industry_tabfieldblock",true);
	$xt->assign("Industry_label",true);
	if(isEnableSection508())
		$xt->assign_section("Industry_label","<label for=\"".GetInputElementId("Industry", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Referral Type"))
		$xt->assign("Referral_Type_fieldblock",true);
	else
		$xt->assign("Referral_Type_tabfieldblock",true);
	$xt->assign("Referral_Type_label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Type_label","<label for=\"".GetInputElementId("Referral Type", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Referral Source-Company"))
		$xt->assign("Referral_Source_Company_fieldblock",true);
	else
		$xt->assign("Referral_Source_Company_tabfieldblock",true);
	$xt->assign("Referral_Source_Company_label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Source_Company_label","<label for=\"".GetInputElementId("Referral Source-Company", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Referral Scource-Ind."))
		$xt->assign("Referral_Scource_Ind__fieldblock",true);
	else
		$xt->assign("Referral_Scource_Ind__tabfieldblock",true);
	$xt->assign("Referral_Scource_Ind__label",true);
	if(isEnableSection508())
		$xt->assign_section("Referral_Scource_Ind__label","<label for=\"".GetInputElementId("Referral Scource-Ind.", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Description"))
		$xt->assign("Description_fieldblock",true);
	else
		$xt->assign("Description_tabfieldblock",true);
	$xt->assign("Description_label",true);
	if(isEnableSection508())
		$xt->assign_section("Description_label","<label for=\"".GetInputElementId("Description", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Dead Date"))
		$xt->assign("Dead_Date_fieldblock",true);
	else
		$xt->assign("Dead_Date_tabfieldblock",true);
	$xt->assign("Dead_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Dead_Date_label","<label for=\"".GetInputElementId("Dead Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("EL Expiration Date"))
		$xt->assign("EL_Expiration_Date_fieldblock",true);
	else
		$xt->assign("EL_Expiration_Date_tabfieldblock",true);
	$xt->assign("EL_Expiration_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("EL_Expiration_Date_label","<label for=\"".GetInputElementId("EL Expiration Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Engagment Fee"))
		$xt->assign("Engagment_Fee_fieldblock",true);
	else
		$xt->assign("Engagment_Fee_tabfieldblock",true);
	$xt->assign("Engagment_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Engagment_Fee_label","<label for=\"".GetInputElementId("Engagment Fee", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Minimum"))
		$xt->assign("Fee_Minimum_fieldblock",true);
	else
		$xt->assign("Fee_Minimum_tabfieldblock",true);
	$xt->assign("Fee_Minimum_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Minimum_label","<label for=\"".GetInputElementId("Fee Minimum", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Final Total Sucess Fee"))
		$xt->assign("Final_Total_Sucess_Fee_fieldblock",true);
	else
		$xt->assign("Final_Total_Sucess_Fee_tabfieldblock",true);
	$xt->assign("Final_Total_Sucess_Fee_label",true);
	if(isEnableSection508())
		$xt->assign_section("Final_Total_Sucess_Fee_label","<label for=\"".GetInputElementId("Final Total Sucess Fee", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Final Transaction Size"))
		$xt->assign("Final_Transaction_Size_fieldblock",true);
	else
		$xt->assign("Final_Transaction_Size_tabfieldblock",true);
	$xt->assign("Final_Transaction_Size_label",true);
	if(isEnableSection508())
		$xt->assign_section("Final_Transaction_Size_label","<label for=\"".GetInputElementId("Final Transaction Size", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Monthly Retainer"))
		$xt->assign("Monthly_Retainer_fieldblock",true);
	else
		$xt->assign("Monthly_Retainer_tabfieldblock",true);
	$xt->assign("Monthly_Retainer_label",true);
	if(isEnableSection508())
		$xt->assign_section("Monthly_Retainer_label","<label for=\"".GetInputElementId("Monthly Retainer", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Closed Date"))
		$xt->assign("Closed_Date_fieldblock",true);
	else
		$xt->assign("Closed_Date_tabfieldblock",true);
	$xt->assign("Closed_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Closed_Date_label","<label for=\"".GetInputElementId("Closed Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-1"))
		$xt->assign("Team_Split_1_fieldblock",true);
	else
		$xt->assign("Team_Split_1_tabfieldblock",true);
	$xt->assign("Team_Split_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_1_label","<label for=\"".GetInputElementId("Team Split-1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-1"))
		$xt->assign("Team_1_fieldblock",true);
	else
		$xt->assign("Team_1_tabfieldblock",true);
	$xt->assign("Team_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_1_label","<label for=\"".GetInputElementId("Team-1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-2"))
		$xt->assign("Team_Split_2_fieldblock",true);
	else
		$xt->assign("Team_Split_2_tabfieldblock",true);
	$xt->assign("Team_Split_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_2_label","<label for=\"".GetInputElementId("Team Split-2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-2"))
		$xt->assign("Team_2_fieldblock",true);
	else
		$xt->assign("Team_2_tabfieldblock",true);
	$xt->assign("Team_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_2_label","<label for=\"".GetInputElementId("Team-2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-3"))
		$xt->assign("Team_Split_3_fieldblock",true);
	else
		$xt->assign("Team_Split_3_tabfieldblock",true);
	$xt->assign("Team_Split_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_3_label","<label for=\"".GetInputElementId("Team Split-3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-4"))
		$xt->assign("Team_Split_4_fieldblock",true);
	else
		$xt->assign("Team_Split_4_tabfieldblock",true);
	$xt->assign("Team_Split_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_4_label","<label for=\"".GetInputElementId("Team Split-4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-5"))
		$xt->assign("Team_Split_5_fieldblock",true);
	else
		$xt->assign("Team_Split_5_tabfieldblock",true);
	$xt->assign("Team_Split_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_5_label","<label for=\"".GetInputElementId("Team Split-5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team Split-6"))
		$xt->assign("Team_Split_6_fieldblock",true);
	else
		$xt->assign("Team_Split_6_tabfieldblock",true);
	$xt->assign("Team_Split_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_Split_6_label","<label for=\"".GetInputElementId("Team Split-6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-3"))
		$xt->assign("Team_3_fieldblock",true);
	else
		$xt->assign("Team_3_tabfieldblock",true);
	$xt->assign("Team_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_3_label","<label for=\"".GetInputElementId("Team-3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-4"))
		$xt->assign("Team_4_fieldblock",true);
	else
		$xt->assign("Team_4_tabfieldblock",true);
	$xt->assign("Team_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_4_label","<label for=\"".GetInputElementId("Team-4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-5"))
		$xt->assign("Team_5_fieldblock",true);
	else
		$xt->assign("Team_5_tabfieldblock",true);
	$xt->assign("Team_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_5_label","<label for=\"".GetInputElementId("Team-5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Team-6"))
		$xt->assign("Team_6_fieldblock",true);
	else
		$xt->assign("Team_6_tabfieldblock",true);
	$xt->assign("Team_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Team_6_label","<label for=\"".GetInputElementId("Team-6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-1"))
		$xt->assign("Fee_Split_1_fieldblock",true);
	else
		$xt->assign("Fee_Split_1_tabfieldblock",true);
	$xt->assign("Fee_Split_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_1_label","<label for=\"".GetInputElementId("Fee Split-1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-2"))
		$xt->assign("Fee_Split_2_fieldblock",true);
	else
		$xt->assign("Fee_Split_2_tabfieldblock",true);
	$xt->assign("Fee_Split_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_2_label","<label for=\"".GetInputElementId("Fee Split-2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-3"))
		$xt->assign("Fee_Split_3_fieldblock",true);
	else
		$xt->assign("Fee_Split_3_tabfieldblock",true);
	$xt->assign("Fee_Split_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_3_label","<label for=\"".GetInputElementId("Fee Split-3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-4"))
		$xt->assign("Fee_Split_4_fieldblock",true);
	else
		$xt->assign("Fee_Split_4_tabfieldblock",true);
	$xt->assign("Fee_Split_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_4_label","<label for=\"".GetInputElementId("Fee Split-4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-5"))
		$xt->assign("Fee_Split_5_fieldblock",true);
	else
		$xt->assign("Fee_Split_5_tabfieldblock",true);
	$xt->assign("Fee_Split_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_5_label","<label for=\"".GetInputElementId("Fee Split-5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Split-6"))
		$xt->assign("Fee_Split_6_fieldblock",true);
	else
		$xt->assign("Fee_Split_6_tabfieldblock",true);
	$xt->assign("Fee_Split_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_6_label","<label for=\"".GetInputElementId("Fee Split-6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-1"))
		$xt->assign("Fee_To_1_fieldblock",true);
	else
		$xt->assign("Fee_To_1_tabfieldblock",true);
	$xt->assign("Fee_To_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_1_label","<label for=\"".GetInputElementId("Fee To-1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-2"))
		$xt->assign("Fee_To_2_fieldblock",true);
	else
		$xt->assign("Fee_To_2_tabfieldblock",true);
	$xt->assign("Fee_To_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_2_label","<label for=\"".GetInputElementId("Fee To-2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-3"))
		$xt->assign("Fee_To_3_fieldblock",true);
	else
		$xt->assign("Fee_To_3_tabfieldblock",true);
	$xt->assign("Fee_To_3_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_3_label","<label for=\"".GetInputElementId("Fee To-3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-4"))
		$xt->assign("Fee_To_4_fieldblock",true);
	else
		$xt->assign("Fee_To_4_tabfieldblock",true);
	$xt->assign("Fee_To_4_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_4_label","<label for=\"".GetInputElementId("Fee To-4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-5"))
		$xt->assign("Fee_To_5_fieldblock",true);
	else
		$xt->assign("Fee_To_5_tabfieldblock",true);
	$xt->assign("Fee_To_5_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_5_label","<label for=\"".GetInputElementId("Fee To-5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee To-6"))
		$xt->assign("Fee_To_6_fieldblock",true);
	else
		$xt->assign("Fee_To_6_tabfieldblock",true);
	$xt->assign("Fee_To_6_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_To_6_label","<label for=\"".GetInputElementId("Fee To-6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Enterpise Value"))
		$xt->assign("Enterpise_Value_fieldblock",true);
	else
		$xt->assign("Enterpise_Value_tabfieldblock",true);
	$xt->assign("Enterpise_Value_label",true);
	if(isEnableSection508())
		$xt->assign_section("Enterpise_Value_label","<label for=\"".GetInputElementId("Enterpise Value", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Fee Details"))
		$xt->assign("Fee_Details_fieldblock",true);
	else
		$xt->assign("Fee_Details_tabfieldblock",true);
	$xt->assign("Fee_Details_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fee_Details_label","<label for=\"".GetInputElementId("Fee Details", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Split to Corporate"))
		$xt->assign("Split_to_Corporate_fieldblock",true);
	else
		$xt->assign("Split_to_Corporate_tabfieldblock",true);
	$xt->assign("Split_to_Corporate_label",true);
	if(isEnableSection508())
		$xt->assign_section("Split_to_Corporate_label","<label for=\"".GetInputElementId("Split to Corporate", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Paul"))
		$xt->assign("Paul_fieldblock",true);
	else
		$xt->assign("Paul_tabfieldblock",true);
	$xt->assign("Paul_label",true);
	if(isEnableSection508())
		$xt->assign_section("Paul_label","<label for=\"".GetInputElementId("Paul", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("McBroom"))
		$xt->assign("McBroom_fieldblock",true);
	else
		$xt->assign("McBroom_tabfieldblock",true);
	$xt->assign("McBroom_label",true);
	if(isEnableSection508())
		$xt->assign_section("McBroom_label","<label for=\"".GetInputElementId("McBroom", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("IBC Date"))
		$xt->assign("IBC_Date_fieldblock",true);
	else
		$xt->assign("IBC_Date_tabfieldblock",true);
	$xt->assign("IBC_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("IBC_Date_label","<label for=\"".GetInputElementId("IBC Date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Gross Next"))
		$xt->assign("Gross_Next_fieldblock",true);
	else
		$xt->assign("Gross_Next_tabfieldblock",true);
	$xt->assign("Gross_Next_label",true);
	if(isEnableSection508())
		$xt->assign_section("Gross_Next_label","<label for=\"".GetInputElementId("Gross Next", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Gross This"))
		$xt->assign("Gross_This_fieldblock",true);
	else
		$xt->assign("Gross_This_tabfieldblock",true);
	$xt->assign("Gross_This_label",true);
	if(isEnableSection508())
		$xt->assign_section("Gross_This_label","<label for=\"".GetInputElementId("Gross This", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Month of Close"))
		$xt->assign("Month_of_Close_fieldblock",true);
	else
		$xt->assign("Month_of_Close_tabfieldblock",true);
	$xt->assign("Month_of_Close_label",true);
	if(isEnableSection508())
		$xt->assign_section("Month_of_Close_label","<label for=\"".GetInputElementId("Month of Close", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Deal Slot"))
		$xt->assign("Deal_Slot_fieldblock",true);
	else
		$xt->assign("Deal_Slot_tabfieldblock",true);
	$xt->assign("Deal_Slot_label",true);
	if(isEnableSection508())
		$xt->assign_section("Deal_Slot_label","<label for=\"".GetInputElementId("Deal Slot", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("Pipeline"))
		$xt->assign("Pipeline_fieldblock",true);
	else
		$xt->assign("Pipeline_tabfieldblock",true);
	$xt->assign("Pipeline_label",true);
	if(isEnableSection508())
		$xt->assign_section("Pipeline_label","<label for=\"".GetInputElementId("Pipeline", $id, PAGE_EDIT)."\">","</label>");
		

	$xt->assign("show_key1", htmlspecialchars($pageObject->showDBValue("ID", $data)));
	//$xt->assign('editForm',true);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if(!@$_SESSION[$strTableName."_noNextPrev"] && $inlineedit == EDIT_SIMPLE)
	{
		$next = array();
		$prev = array();
		$pageObject->getNextPrevRecordKeys($data,"Edit",$next,$prev);
	}
	$nextlink = $prevlink = "";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink.= "editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink.= "editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("prev_button",false);
	$xt->assign("resetbutton_attrs",'id="resetButton'.$id.'"');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//End Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if($inlineedit == EDIT_SIMPLE)
	{
		$xt->assign("back_button",true);
		$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	}
	// onmouseover event, for changing focus. Needed to proper submit form
	//$onmouseover = "this.focus();";
	//$onmouseover = 'onmouseover="'.$onmouseover.'"';
	
	$xt->assign("save_button",true);
	if(!$enableCtrlsForEditing)
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\" type=\"disabled\" ");
	else
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\"");
		
	$xt->assign("reset_button",true);

}

$xt->assign("message_block",true);
$xt->assign("message",$message);
if(!strlen($message))
{
	$xt->displayBrickHidden("message");
}
/////////////////////////////////////////////////////////////
//process readonly and auto-update fields
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	return new data to the List page or report an error
/////////////////////////////////////////////////////////////
if (postvalue("a")=="edited" && ($inlineedit == EDIT_INLINE || $inlineedit == EDIT_POPUP))
{
	if(!$data)
	{
		$data = $evalues;
		$HaveData = false;
	}
	//Preparation   view values

//	detail tables
	$showDetailKeys["bankers"]["masterkey1"] = $data["Primary Banker"];		
	$showDetailKeys["bankers"]["masterkey2"] = $data["Team-1"];		
	$showDetailKeys["bankers"]["masterkey3"] = $data["Team-2"];		
	$showDetailKeys["bankers"]["masterkey4"] = $data["Team-3"];		
	$showDetailKeys["bankers"]["masterkey5"] = $data["Team-4"];		
	$showDetailKeys["bankers"]["masterkey6"] = $data["Team-5"];		
	$showDetailKeys["bankers"]["masterkey7"] = $data["Team-6"];		
	$showDetailKeys["referral company"]["masterkey1"] = $data["Referral Source-Company"];		
	$showDetailKeys["referral individual"]["masterkey1"] = $data["Referral Scource-Ind."];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));


//	ID - 
	$value = $pageObject->showDBValue("ID", $data, $keylink);
	$showValues["ID"] = $value;
	$showFields[] = "ID";
		$showRawValues["ID"] = substr($data["ID"],0,100);

//	Company - 
	$value = $pageObject->showDBValue("Company", $data, $keylink);
	$showValues["Company"] = $value;
	$showFields[] = "Company";
		$showRawValues["Company"] = substr($data["Company"],0,100);

//	EL Date - Short Date
	$value = $pageObject->showDBValue("EL Date", $data, $keylink);
	$showValues["EL Date"] = $value;
	$showFields[] = "EL Date";
		$showRawValues["EL Date"] = substr($data["EL Date"],0,100);

//	Project Name - 
	$value = $pageObject->showDBValue("Project Name", $data, $keylink);
	$showValues["Project Name"] = $value;
	$showFields[] = "Project Name";
		$showRawValues["Project Name"] = substr($data["Project Name"],0,100);

//	Status - 
	$value = $pageObject->showDBValue("Status", $data, $keylink);
	$showValues["Status"] = $value;
	$showFields[] = "Status";
		$showRawValues["Status"] = substr($data["Status"],0,100);

//	Deal Type - 
	$value = $pageObject->showDBValue("Deal Type", $data, $keylink);
	$showValues["Deal Type"] = $value;
	$showFields[] = "Deal Type";
		$showRawValues["Deal Type"] = substr($data["Deal Type"],0,100);

//	Projected Fee - Currency
	$value = $pageObject->showDBValue("Projected Fee", $data, $keylink);
	$showValues["Projected Fee"] = $value;
	$showFields[] = "Projected Fee";
		$showRawValues["Projected Fee"] = substr($data["Projected Fee"],0,100);

//	Projected Transaction Size - Currency
	$value = $pageObject->showDBValue("Projected Transaction Size", $data, $keylink);
	$showValues["Projected Transaction Size"] = $value;
	$showFields[] = "Projected Transaction Size";
		$showRawValues["Projected Transaction Size"] = substr($data["Projected Transaction Size"],0,100);

//	Est. Close Date - Short Date
	$value = $pageObject->showDBValue("Est. Close Date", $data, $keylink);
	$showValues["Est. Close Date"] = $value;
	$showFields[] = "Est. Close Date";
		$showRawValues["Est. Close Date"] = substr($data["Est. Close Date"],0,100);

//	Primary Banker - 
	$value = $pageObject->showDBValue("Primary Banker", $data, $keylink);
	$showValues["Primary Banker"] = $value;
	$showFields[] = "Primary Banker";
		$showRawValues["Primary Banker"] = substr($data["Primary Banker"],0,100);

//	Practice Area - 
	$value = $pageObject->showDBValue("Practice Area", $data, $keylink);
	$showValues["Practice Area"] = $value;
	$showFields[] = "Practice Area";
		$showRawValues["Practice Area"] = substr($data["Practice Area"],0,100);

//	Ownership Class - 
	$value = $pageObject->showDBValue("Ownership Class", $data, $keylink);
	$showValues["Ownership Class"] = $value;
	$showFields[] = "Ownership Class";
		$showRawValues["Ownership Class"] = substr($data["Ownership Class"],0,100);

//	Industry - 
	$value = $pageObject->showDBValue("Industry", $data, $keylink);
	$showValues["Industry"] = $value;
	$showFields[] = "Industry";
		$showRawValues["Industry"] = substr($data["Industry"],0,100);

//	Referral Type - 
	$value = $pageObject->showDBValue("Referral Type", $data, $keylink);
	$showValues["Referral Type"] = $value;
	$showFields[] = "Referral Type";
		$showRawValues["Referral Type"] = substr($data["Referral Type"],0,100);

//	Referral Source-Company - 
	$value = $pageObject->showDBValue("Referral Source-Company", $data, $keylink);
	$showValues["Referral Source-Company"] = $value;
	$showFields[] = "Referral Source-Company";
		$showRawValues["Referral Source-Company"] = substr($data["Referral Source-Company"],0,100);

//	Referral Scource-Ind. - 
	$value = $pageObject->showDBValue("Referral Scource-Ind.", $data, $keylink);
	$showValues["Referral Scource-Ind."] = $value;
	$showFields[] = "Referral Scource-Ind.";
		$showRawValues["Referral Scource-Ind."] = substr($data["Referral Scource-Ind."],0,100);

//	Description - 
	$value = $pageObject->showDBValue("Description", $data, $keylink);
	$showValues["Description"] = $value;
	$showFields[] = "Description";
		$showRawValues["Description"] = substr($data["Description"],0,100);

//	Dead Date - Short Date
	$value = $pageObject->showDBValue("Dead Date", $data, $keylink);
	$showValues["Dead Date"] = $value;
	$showFields[] = "Dead Date";
		$showRawValues["Dead Date"] = substr($data["Dead Date"],0,100);

//	EL Expiration Date - Short Date
	$value = $pageObject->showDBValue("EL Expiration Date", $data, $keylink);
	$showValues["EL Expiration Date"] = $value;
	$showFields[] = "EL Expiration Date";
		$showRawValues["EL Expiration Date"] = substr($data["EL Expiration Date"],0,100);

//	Engagment Fee - Number
	$value = $pageObject->showDBValue("Engagment Fee", $data, $keylink);
	$showValues["Engagment Fee"] = $value;
	$showFields[] = "Engagment Fee";
		$showRawValues["Engagment Fee"] = substr($data["Engagment Fee"],0,100);

//	Fee Minimum - Number
	$value = $pageObject->showDBValue("Fee Minimum", $data, $keylink);
	$showValues["Fee Minimum"] = $value;
	$showFields[] = "Fee Minimum";
		$showRawValues["Fee Minimum"] = substr($data["Fee Minimum"],0,100);

//	Final Total Sucess Fee - Number
	$value = $pageObject->showDBValue("Final Total Sucess Fee", $data, $keylink);
	$showValues["Final Total Sucess Fee"] = $value;
	$showFields[] = "Final Total Sucess Fee";
		$showRawValues["Final Total Sucess Fee"] = substr($data["Final Total Sucess Fee"],0,100);

//	Final Transaction Size - Currency
	$value = $pageObject->showDBValue("Final Transaction Size", $data, $keylink);
	$showValues["Final Transaction Size"] = $value;
	$showFields[] = "Final Transaction Size";
		$showRawValues["Final Transaction Size"] = substr($data["Final Transaction Size"],0,100);

//	Monthly Retainer - Number
	$value = $pageObject->showDBValue("Monthly Retainer", $data, $keylink);
	$showValues["Monthly Retainer"] = $value;
	$showFields[] = "Monthly Retainer";
		$showRawValues["Monthly Retainer"] = substr($data["Monthly Retainer"],0,100);

//	Closed Date - Short Date
	$value = $pageObject->showDBValue("Closed Date", $data, $keylink);
	$showValues["Closed Date"] = $value;
	$showFields[] = "Closed Date";
		$showRawValues["Closed Date"] = substr($data["Closed Date"],0,100);

//	Team Split-1 - Percent
	$value = $pageObject->showDBValue("Team Split-1", $data, $keylink);
	$showValues["Team Split-1"] = $value;
	$showFields[] = "Team Split-1";
		$showRawValues["Team Split-1"] = substr($data["Team Split-1"],0,100);

//	Team-1 - 
	$value = $pageObject->showDBValue("Team-1", $data, $keylink);
	$showValues["Team-1"] = $value;
	$showFields[] = "Team-1";
		$showRawValues["Team-1"] = substr($data["Team-1"],0,100);

//	Team Split-2 - Percent
	$value = $pageObject->showDBValue("Team Split-2", $data, $keylink);
	$showValues["Team Split-2"] = $value;
	$showFields[] = "Team Split-2";
		$showRawValues["Team Split-2"] = substr($data["Team Split-2"],0,100);

//	Team-2 - 
	$value = $pageObject->showDBValue("Team-2", $data, $keylink);
	$showValues["Team-2"] = $value;
	$showFields[] = "Team-2";
		$showRawValues["Team-2"] = substr($data["Team-2"],0,100);

//	Team Split-3 - Percent
	$value = $pageObject->showDBValue("Team Split-3", $data, $keylink);
	$showValues["Team Split-3"] = $value;
	$showFields[] = "Team Split-3";
		$showRawValues["Team Split-3"] = substr($data["Team Split-3"],0,100);

//	Team Split-4 - Percent
	$value = $pageObject->showDBValue("Team Split-4", $data, $keylink);
	$showValues["Team Split-4"] = $value;
	$showFields[] = "Team Split-4";
		$showRawValues["Team Split-4"] = substr($data["Team Split-4"],0,100);

//	Team Split-5 - Percent
	$value = $pageObject->showDBValue("Team Split-5", $data, $keylink);
	$showValues["Team Split-5"] = $value;
	$showFields[] = "Team Split-5";
		$showRawValues["Team Split-5"] = substr($data["Team Split-5"],0,100);

//	Team Split-6 - Percent
	$value = $pageObject->showDBValue("Team Split-6", $data, $keylink);
	$showValues["Team Split-6"] = $value;
	$showFields[] = "Team Split-6";
		$showRawValues["Team Split-6"] = substr($data["Team Split-6"],0,100);

//	Team-3 - 
	$value = $pageObject->showDBValue("Team-3", $data, $keylink);
	$showValues["Team-3"] = $value;
	$showFields[] = "Team-3";
		$showRawValues["Team-3"] = substr($data["Team-3"],0,100);

//	Team-4 - 
	$value = $pageObject->showDBValue("Team-4", $data, $keylink);
	$showValues["Team-4"] = $value;
	$showFields[] = "Team-4";
		$showRawValues["Team-4"] = substr($data["Team-4"],0,100);

//	Team-5 - 
	$value = $pageObject->showDBValue("Team-5", $data, $keylink);
	$showValues["Team-5"] = $value;
	$showFields[] = "Team-5";
		$showRawValues["Team-5"] = substr($data["Team-5"],0,100);

//	Team-6 - 
	$value = $pageObject->showDBValue("Team-6", $data, $keylink);
	$showValues["Team-6"] = $value;
	$showFields[] = "Team-6";
		$showRawValues["Team-6"] = substr($data["Team-6"],0,100);

//	Fee Split-1 - Percent
	$value = $pageObject->showDBValue("Fee Split-1", $data, $keylink);
	$showValues["Fee Split-1"] = $value;
	$showFields[] = "Fee Split-1";
		$showRawValues["Fee Split-1"] = substr($data["Fee Split-1"],0,100);

//	Fee Split-2 - Percent
	$value = $pageObject->showDBValue("Fee Split-2", $data, $keylink);
	$showValues["Fee Split-2"] = $value;
	$showFields[] = "Fee Split-2";
		$showRawValues["Fee Split-2"] = substr($data["Fee Split-2"],0,100);

//	Fee Split-3 - Percent
	$value = $pageObject->showDBValue("Fee Split-3", $data, $keylink);
	$showValues["Fee Split-3"] = $value;
	$showFields[] = "Fee Split-3";
		$showRawValues["Fee Split-3"] = substr($data["Fee Split-3"],0,100);

//	Fee Split-4 - Percent
	$value = $pageObject->showDBValue("Fee Split-4", $data, $keylink);
	$showValues["Fee Split-4"] = $value;
	$showFields[] = "Fee Split-4";
		$showRawValues["Fee Split-4"] = substr($data["Fee Split-4"],0,100);

//	Fee Split-5 - Percent
	$value = $pageObject->showDBValue("Fee Split-5", $data, $keylink);
	$showValues["Fee Split-5"] = $value;
	$showFields[] = "Fee Split-5";
		$showRawValues["Fee Split-5"] = substr($data["Fee Split-5"],0,100);

//	Fee Split-6 - Percent
	$value = $pageObject->showDBValue("Fee Split-6", $data, $keylink);
	$showValues["Fee Split-6"] = $value;
	$showFields[] = "Fee Split-6";
		$showRawValues["Fee Split-6"] = substr($data["Fee Split-6"],0,100);

//	Fee To-1 - 
	$value = $pageObject->showDBValue("Fee To-1", $data, $keylink);
	$showValues["Fee To-1"] = $value;
	$showFields[] = "Fee To-1";
		$showRawValues["Fee To-1"] = substr($data["Fee To-1"],0,100);

//	Fee To-2 - 
	$value = $pageObject->showDBValue("Fee To-2", $data, $keylink);
	$showValues["Fee To-2"] = $value;
	$showFields[] = "Fee To-2";
		$showRawValues["Fee To-2"] = substr($data["Fee To-2"],0,100);

//	Fee To-3 - 
	$value = $pageObject->showDBValue("Fee To-3", $data, $keylink);
	$showValues["Fee To-3"] = $value;
	$showFields[] = "Fee To-3";
		$showRawValues["Fee To-3"] = substr($data["Fee To-3"],0,100);

//	Fee To-4 - 
	$value = $pageObject->showDBValue("Fee To-4", $data, $keylink);
	$showValues["Fee To-4"] = $value;
	$showFields[] = "Fee To-4";
		$showRawValues["Fee To-4"] = substr($data["Fee To-4"],0,100);

//	Fee To-5 - 
	$value = $pageObject->showDBValue("Fee To-5", $data, $keylink);
	$showValues["Fee To-5"] = $value;
	$showFields[] = "Fee To-5";
		$showRawValues["Fee To-5"] = substr($data["Fee To-5"],0,100);

//	Fee To-6 - 
	$value = $pageObject->showDBValue("Fee To-6", $data, $keylink);
	$showValues["Fee To-6"] = $value;
	$showFields[] = "Fee To-6";
		$showRawValues["Fee To-6"] = substr($data["Fee To-6"],0,100);

//	Enterpise Value - 
	$value = $pageObject->showDBValue("Enterpise Value", $data, $keylink);
	$showValues["Enterpise Value"] = $value;
	$showFields[] = "Enterpise Value";
		$showRawValues["Enterpise Value"] = substr($data["Enterpise Value"],0,100);

//	Fee Details - 
	$value = $pageObject->showDBValue("Fee Details", $data, $keylink);
	$showValues["Fee Details"] = $value;
	$showFields[] = "Fee Details";
		$showRawValues["Fee Details"] = substr($data["Fee Details"],0,100);

//	Split to Corporate - Number
	$value = $pageObject->showDBValue("Split to Corporate", $data, $keylink);
	$showValues["Split to Corporate"] = $value;
	$showFields[] = "Split to Corporate";
		$showRawValues["Split to Corporate"] = substr($data["Split to Corporate"],0,100);

//	Paul - Checkbox
	$value = $pageObject->showDBValue("Paul", $data, $keylink);
	$showValues["Paul"] = $value;
	$showFields[] = "Paul";
		$showRawValues["Paul"] = substr($data["Paul"],0,100);

//	McBroom - Checkbox
	$value = $pageObject->showDBValue("McBroom", $data, $keylink);
	$showValues["McBroom"] = $value;
	$showFields[] = "McBroom";
		$showRawValues["McBroom"] = substr($data["McBroom"],0,100);

//	IBC Date - Short Date
	$value = $pageObject->showDBValue("IBC Date", $data, $keylink);
	$showValues["IBC Date"] = $value;
	$showFields[] = "IBC Date";
		$showRawValues["IBC Date"] = substr($data["IBC Date"],0,100);

//	Gross Next - 
	$value = $pageObject->showDBValue("Gross Next", $data, $keylink);
	$showValues["Gross Next"] = $value;
	$showFields[] = "Gross Next";
		$showRawValues["Gross Next"] = substr($data["Gross Next"],0,100);

//	Gross This - 
	$value = $pageObject->showDBValue("Gross This", $data, $keylink);
	$showValues["Gross This"] = $value;
	$showFields[] = "Gross This";
		$showRawValues["Gross This"] = substr($data["Gross This"],0,100);

//	Month of Close - Short Date
	$value = $pageObject->showDBValue("Month of Close", $data, $keylink);
	$showValues["Month of Close"] = $value;
	$showFields[] = "Month of Close";
		$showRawValues["Month of Close"] = substr($data["Month of Close"],0,100);

//	Deal Slot - 
	$value = $pageObject->showDBValue("Deal Slot", $data, $keylink);
	$showValues["Deal Slot"] = $value;
	$showFields[] = "Deal Slot";
		$showRawValues["Deal Slot"] = substr($data["Deal Slot"],0,100);

//	Pipeline - 
	$value = $pageObject->showDBValue("Pipeline", $data, $keylink);
	$showValues["Pipeline"] = $value;
	$showFields[] = "Pipeline";
		$showRawValues["Pipeline"] = substr($data["Pipeline"],0,100);
/////////////////////////////////////////////////////////////
//	start inline output
/////////////////////////////////////////////////////////////
	
	if($IsSaved)
	{
		if($pageObject->lockingObj)
			$pageObject->lockingObj->UnlockRecord($strTableName,$keys,"");
		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $pageObject->jsKeys;
		$returnJSON['keyFields'] = $pageObject->keyFields;
		$returnJSON['vals'] = $showValues;
		$returnJSON['fields'] = $showFields;
		$returnJSON['rawVals'] = $showRawValues;
		$returnJSON['detKeys'] = $showDetailKeys;
		$returnJSON['userMess'] = $usermessage;
		$returnJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
		
		if($inlineedit==EDIT_POPUP && isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
			$returnJSON['hideCaptcha'] = true;
			
		if($globalEvents->exists("IsRecordEditable", $strTableName))
		{
			if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
				$returnJSON['nonEditable'] = true;
		}
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
		
		if($pageObject->lockingObj)
			$returnJSON['lockMessage'] = $system_message;
		
		if($inlineedit == EDIT_POPUP && !$pageObject->isCaptchaOk)
			$returnJSON['captcha'] = false;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
} 
/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex = '';
$regexmessage = '';
$regextype = '';
$control = array();

foreach($pageObject->editFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if (!$detailKeys || !in_array($fName, $detailKeys))
	{
		$control[$gfName] = array();
		$control[$gfName]["func"]="xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["ptype"] = PAGE_EDIT;
		$control[$gfName]["params"]["field"] = $fName;
		if(!IsNumberType($pageObject->pSet->getFieldType($fName)) || is_null(@$data[$fName]))
			$control[$gfName]["params"]["value"] = @$data[$fName];
		else
		{
			$control[$gfName]["params"]["value"] = str_replace(".",$locale_info["LOCALE_SDECIMAL"],@$data[$fName]);
		}
		$control[$gfName]["params"]["pageObj"] = $pageObject;
		
		//	Begin Add validation
		$arrValidate = $pageObject->pSet->getValidation($fName);
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation	
		$additionalCtrlParams = array();
		$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
		$control[$gfName]["params"]["additionalCtrlParams"] = $additionalCtrlParams;
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	
	if($inlineedit == EDIT_INLINE)
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="inline_edit";
		$controls["controls"]['mode'] = "inline_edit";
	}
	else{
			if (!$detailKeys || !in_array($fName, $detailKeys))
				$control[$gfName]["params"]["mode"] = "edit";
			$controls["controls"]['mode'] = "edit";
		}
																																																													
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$data[$fName];
		
	// category control field
	$strCategoryControl = $pageObject->isDependOnField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $pageObject->editFields))
		$vals = array($fName => @$data[$fName],$strCategoryControl => @$data[$strCategoryControl]);
	else
		$vals = array($fName => @$data[$fName]);
		
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;
	
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if($pageObject->pSet->getEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, $data[$fName]);
	
	if($pageObject->pSet->getViewFormat($fName) == FORMAT_MAP)	
		$pageObject->googleMapCfg['isUseGoogleMap'] = true;
		
	if($detailKeys && in_array($fName, $detailKeys) && array_key_exists($fName, $data))
	{
		$value = $pageObject->showDBValue($fName, $data);
		
		$xt->assign($gfName."_editcontrol",$value);
	}
}
//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
if($pageObject->lockingObj)
{
	$pageObject->jsSettings['tableSettings'][$strTableName]["sKeys"] = $skeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]["enableCtrls"] = $enableCtrlsForEditing;
	$pageObject->jsSettings['tableSettings'][$strTableName]["confirmTime"] = $pageObject->lockingObj->ConfirmTime;
}

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && $inlineedit!=EDIT_INLINE && !isMobile())
{
	if(count($dpParams['ids']))
	{
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		$xt->assign("detail_tables",true);	
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
		$options["masterPageType"] = PAGE_EDIT;
		$options["mainMasterPageType"] = PAGE_EDIT;
		$options['masterTable'] = "company";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "company";
			continue;
		}
		
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
		$masterKeys = array();
		$mkr = 1;
		
		foreach($mKeys[$strTableName] as $mk){
			$options['masterKeysReq'][$mkr] = $data[$mk];
			$masterKeys['masterKey'.$mkr] = $data[$mk];
			$mkr++;
		}
		
		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->isDispGrid())
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->addControlsJSAndCSS();
			$listPageObject->fillSetCntrlMaps();
			
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			
			foreach($listPageObject->jsSettings["global"]["shortTNames"] as $tName => $shortTName){
				$pageObject->settingsMap["globalSettings"]["shortTNames"][$tName] = $shortTName;
			}
			
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dControlsMap[$strTableName]['masterKeys'] = $masterKeys;
			$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
			
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
			
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
		$flyId = $listPageObject->recId+1;
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap; 
	$strTableName = "company";
}
/////////////////////////////////////////////////////////////
//fill jsSettings and ControlsHTMLMap
$pageObject->flyId = $flyId;
$pageObject->fillSetCntrlMaps();

$pageObject->addCommonJs();

//For mobile version in apple device

if($inlineedit == EDIT_SIMPLE)
{
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	$xt->assign("body", $pageObject->body);
	$xt->assign("flybody",true);
}

if($inlineedit == EDIT_POPUP){
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("body",$pageObject->body);
}

$xt->assign("style_block",true);


$viewlink = "";
$viewkeys = array();
	$viewkeys["editid1"] = postvalue("editid1");
foreach($viewkeys as $key => $val)
{
	if($viewlink)
		$viewlink.="&";
	$viewlink.=$key."=".$val;
}
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='company_view.php?".$viewlink."'\"");
if(CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && $inlineedit == EDIT_SIMPLE)
	$xt->assign("view_button",true);
else
	$xt->assign("view_button",false);

/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if($eventObj->exists("BeforeShowEdit"))
	$eventObj->BeforeShowEdit($xt,$templatefile,$data, $pageObject);

if($inlineedit != EDIT_SIMPLE)
{
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}
	
if($inlineedit == EDIT_POPUP || $inlineedit == EDIT_INLINE)
{
	if($globalEvents->exists("IsRecordEditable", $strTableName))
	{
		if(!$globalEvents->IsRecordEditable($data, true, $strTableName))
			return SecurityRedirect($inlineedit);
	}
}
if($inlineedit == EDIT_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
	if(count($pageObject->includes_css))
		$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
	if(count($pageObject->includes_cssIE))
		$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON['idStartFrom'] = $flyId + 1;
	echo (my_json_encode($returnJSON)); 
}
elseif($inlineedit == EDIT_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($pageObject->editFields as $fName)
	{
		if($detailKeys && in_array($fName, $detailKeys))
			continue;
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");
	}
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON["additionalCSS"] = $pageObject->grabAllCSSFiles();
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);
	
function SecurityRedirect($inlineedit)
{
	if($inlineedit == EDIT_INLINE)
	{
		echo my_json_encode(array("success" => false, "message" => "The record is not editable"));
		return;
	}
	
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: menu.php?message=expired");	
}
?>
