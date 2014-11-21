<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/changes_last_month_end_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["changes_last_month_end_add"] = $layout;



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
	$templatefile = "changes_last_month_end_inline_add.htm";
else
	$templatefile = "changes_last_month_end_add.htm";

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
		header('Location: changes_last_month_end_add.php');
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
//	processing LMLive - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_LMLive = $pageObject->getControl("LMLive", $id);
		$control_LMLive->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing LMLive - end
//	processing Closed - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Closed = $pageObject->getControl("Closed", $id);
		$control_Closed->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Closed - end
//	processing Dead - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Dead = $pageObject->getControl("Dead", $id);
		$control_Dead->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Dead - end
//	processing NewEl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_NewEl = $pageObject->getControl("NewEl", $id);
		$control_NewEl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing NewEl - end
//	processing CurrentLive - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_CurrentLive = $pageObject->getControl("CurrentLive", $id);
		$control_CurrentLive->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing CurrentLive - end
//	processing CClient - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_CClient = $pageObject->getControl("CClient", $id);
		$control_CClient->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing CClient - end
//	processing CDealtype - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_CDealtype = $pageObject->getControl("CDealtype", $id);
		$control_CDealtype->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing CDealtype - end
//	processing CAmount - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_CAmount = $pageObject->getControl("CAmount", $id);
		$control_CAmount->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing CAmount - end
//	processing CSlot - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_CSlot = $pageObject->getControl("CSlot", $id);
		$control_CSlot->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing CSlot - end
//	processing DClient - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_DClient = $pageObject->getControl("DClient", $id);
		$control_DClient->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing DClient - end
//	processing DDealtype - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_DDealtype = $pageObject->getControl("DDealtype", $id);
		$control_DDealtype->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing DDealtype - end
//	processing DAmount - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_DAmount = $pageObject->getControl("DAmount", $id);
		$control_DAmount->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing DAmount - end
//	processing DSlot - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_DSlot = $pageObject->getControl("DSlot", $id);
		$control_DSlot->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing DSlot - end
//	processing ELClinet - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ELClinet = $pageObject->getControl("ELClinet", $id);
		$control_ELClinet->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ELClinet - end
//	processing ELDealType - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ELDealType = $pageObject->getControl("ELDealType", $id);
		$control_ELDealType->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ELDealType - end
//	processing ELAmount - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ELAmount = $pageObject->getControl("ELAmount", $id);
		$control_ELAmount->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ELAmount - end
//	processing ELSlot - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ELSlot = $pageObject->getControl("ELSlot", $id);
		$control_ELSlot->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ELSlot - end




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
//	processing LMLive - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_LMLive->afterSuccessfulSave();
			}
//	processing LMLive - end
//	processing Closed - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Closed->afterSuccessfulSave();
			}
//	processing Closed - end
//	processing Dead - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Dead->afterSuccessfulSave();
			}
//	processing Dead - end
//	processing NewEl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_NewEl->afterSuccessfulSave();
			}
//	processing NewEl - end
//	processing CurrentLive - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_CurrentLive->afterSuccessfulSave();
			}
//	processing CurrentLive - end
//	processing CClient - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_CClient->afterSuccessfulSave();
			}
//	processing CClient - end
//	processing CDealtype - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_CDealtype->afterSuccessfulSave();
			}
//	processing CDealtype - end
//	processing CAmount - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_CAmount->afterSuccessfulSave();
			}
//	processing CAmount - end
//	processing CSlot - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_CSlot->afterSuccessfulSave();
			}
//	processing CSlot - end
//	processing DClient - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_DClient->afterSuccessfulSave();
			}
//	processing DClient - end
//	processing DDealtype - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_DDealtype->afterSuccessfulSave();
			}
//	processing DDealtype - end
//	processing DAmount - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_DAmount->afterSuccessfulSave();
			}
//	processing DAmount - end
//	processing DSlot - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_DSlot->afterSuccessfulSave();
			}
//	processing DSlot - end
//	processing ELClinet - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ELClinet->afterSuccessfulSave();
			}
//	processing ELClinet - end
//	processing ELDealType - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ELDealType->afterSuccessfulSave();
			}
//	processing ELDealType - end
//	processing ELAmount - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ELAmount->afterSuccessfulSave();
			}
//	processing ELAmount - end
//	processing ELSlot - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ELSlot->afterSuccessfulSave();
			}
//	processing ELSlot - end

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
						$message .='&nbsp;<a href=\'changes_last_month_end_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'changes_last_month_end_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: changes_last_month_end_".$pageObject->getPageType().".php");
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
}



if($readavalues)
{
	$defvalues["LMLive"]=@$avalues["LMLive"];
	$defvalues["Closed"]=@$avalues["Closed"];
	$defvalues["Dead"]=@$avalues["Dead"];
	$defvalues["NewEl"]=@$avalues["NewEl"];
	$defvalues["CurrentLive"]=@$avalues["CurrentLive"];
	$defvalues["CClient"]=@$avalues["CClient"];
	$defvalues["CDealtype"]=@$avalues["CDealtype"];
	$defvalues["CAmount"]=@$avalues["CAmount"];
	$defvalues["CSlot"]=@$avalues["CSlot"];
	$defvalues["DClient"]=@$avalues["DClient"];
	$defvalues["DDealtype"]=@$avalues["DDealtype"];
	$defvalues["DAmount"]=@$avalues["DAmount"];
	$defvalues["DSlot"]=@$avalues["DSlot"];
	$defvalues["ELClinet"]=@$avalues["ELClinet"];
	$defvalues["ELDealType"]=@$avalues["ELDealType"];
	$defvalues["ELAmount"]=@$avalues["ELAmount"];
	$defvalues["ELSlot"]=@$avalues["ELSlot"];
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
	
	if(!$pageObject->isAppearOnTabs("LMLive"))
		$xt->assign("LMLive_fieldblock",true);
	else
		$xt->assign("LMLive_tabfieldblock",true);
	$xt->assign("LMLive_label",true);
	if(isEnableSection508())
		$xt->assign_section("LMLive_label","<label for=\"".GetInputElementId("LMLive", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Closed"))
		$xt->assign("Closed_fieldblock",true);
	else
		$xt->assign("Closed_tabfieldblock",true);
	$xt->assign("Closed_label",true);
	if(isEnableSection508())
		$xt->assign_section("Closed_label","<label for=\"".GetInputElementId("Closed", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Dead"))
		$xt->assign("Dead_fieldblock",true);
	else
		$xt->assign("Dead_tabfieldblock",true);
	$xt->assign("Dead_label",true);
	if(isEnableSection508())
		$xt->assign_section("Dead_label","<label for=\"".GetInputElementId("Dead", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("NewEl"))
		$xt->assign("NewEl_fieldblock",true);
	else
		$xt->assign("NewEl_tabfieldblock",true);
	$xt->assign("NewEl_label",true);
	if(isEnableSection508())
		$xt->assign_section("NewEl_label","<label for=\"".GetInputElementId("NewEl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("CurrentLive"))
		$xt->assign("CurrentLive_fieldblock",true);
	else
		$xt->assign("CurrentLive_tabfieldblock",true);
	$xt->assign("CurrentLive_label",true);
	if(isEnableSection508())
		$xt->assign_section("CurrentLive_label","<label for=\"".GetInputElementId("CurrentLive", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("CClient"))
		$xt->assign("CClient_fieldblock",true);
	else
		$xt->assign("CClient_tabfieldblock",true);
	$xt->assign("CClient_label",true);
	if(isEnableSection508())
		$xt->assign_section("CClient_label","<label for=\"".GetInputElementId("CClient", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("CDealtype"))
		$xt->assign("CDealtype_fieldblock",true);
	else
		$xt->assign("CDealtype_tabfieldblock",true);
	$xt->assign("CDealtype_label",true);
	if(isEnableSection508())
		$xt->assign_section("CDealtype_label","<label for=\"".GetInputElementId("CDealtype", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("CAmount"))
		$xt->assign("CAmount_fieldblock",true);
	else
		$xt->assign("CAmount_tabfieldblock",true);
	$xt->assign("CAmount_label",true);
	if(isEnableSection508())
		$xt->assign_section("CAmount_label","<label for=\"".GetInputElementId("CAmount", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("CSlot"))
		$xt->assign("CSlot_fieldblock",true);
	else
		$xt->assign("CSlot_tabfieldblock",true);
	$xt->assign("CSlot_label",true);
	if(isEnableSection508())
		$xt->assign_section("CSlot_label","<label for=\"".GetInputElementId("CSlot", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("DClient"))
		$xt->assign("DClient_fieldblock",true);
	else
		$xt->assign("DClient_tabfieldblock",true);
	$xt->assign("DClient_label",true);
	if(isEnableSection508())
		$xt->assign_section("DClient_label","<label for=\"".GetInputElementId("DClient", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("DDealtype"))
		$xt->assign("DDealtype_fieldblock",true);
	else
		$xt->assign("DDealtype_tabfieldblock",true);
	$xt->assign("DDealtype_label",true);
	if(isEnableSection508())
		$xt->assign_section("DDealtype_label","<label for=\"".GetInputElementId("DDealtype", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("DAmount"))
		$xt->assign("DAmount_fieldblock",true);
	else
		$xt->assign("DAmount_tabfieldblock",true);
	$xt->assign("DAmount_label",true);
	if(isEnableSection508())
		$xt->assign_section("DAmount_label","<label for=\"".GetInputElementId("DAmount", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("DSlot"))
		$xt->assign("DSlot_fieldblock",true);
	else
		$xt->assign("DSlot_tabfieldblock",true);
	$xt->assign("DSlot_label",true);
	if(isEnableSection508())
		$xt->assign_section("DSlot_label","<label for=\"".GetInputElementId("DSlot", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ELClinet"))
		$xt->assign("ELClinet_fieldblock",true);
	else
		$xt->assign("ELClinet_tabfieldblock",true);
	$xt->assign("ELClinet_label",true);
	if(isEnableSection508())
		$xt->assign_section("ELClinet_label","<label for=\"".GetInputElementId("ELClinet", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ELDealType"))
		$xt->assign("ELDealType_fieldblock",true);
	else
		$xt->assign("ELDealType_tabfieldblock",true);
	$xt->assign("ELDealType_label",true);
	if(isEnableSection508())
		$xt->assign_section("ELDealType_label","<label for=\"".GetInputElementId("ELDealType", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ELAmount"))
		$xt->assign("ELAmount_fieldblock",true);
	else
		$xt->assign("ELAmount_tabfieldblock",true);
	$xt->assign("ELAmount_label",true);
	if(isEnableSection508())
		$xt->assign_section("ELAmount_label","<label for=\"".GetInputElementId("ELAmount", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ELSlot"))
		$xt->assign("ELSlot_fieldblock",true);
	else
		$xt->assign("ELSlot_tabfieldblock",true);
	$xt->assign("ELSlot_label",true);
	if(isEnableSection508())
		$xt->assign_section("ELSlot_label","<label for=\"".GetInputElementId("ELSlot", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
//	LMLive
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("LMLive", $data, $keylink);
		$showValues["LMLive"] = $value;
		$showFields[] = "LMLive";
	}	
//	Closed
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Closed", $data, $keylink);
		$showValues["Closed"] = $value;
		$showFields[] = "Closed";
	}	
//	Dead
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Dead", $data, $keylink);
		$showValues["Dead"] = $value;
		$showFields[] = "Dead";
	}	
//	NewEl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("NewEl", $data, $keylink);
		$showValues["NewEl"] = $value;
		$showFields[] = "NewEl";
	}	
//	CurrentLive
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("CurrentLive", $data, $keylink);
		$showValues["CurrentLive"] = $value;
		$showFields[] = "CurrentLive";
	}	
//	CClient
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("CClient", $data, $keylink);
		$showValues["CClient"] = $value;
		$showFields[] = "CClient";
	}	
//	CDealtype
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("CDealtype", $data, $keylink);
		$showValues["CDealtype"] = $value;
		$showFields[] = "CDealtype";
	}	
//	CAmount
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("CAmount", $data, $keylink);
		$showValues["CAmount"] = $value;
		$showFields[] = "CAmount";
	}	
//	CSlot
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("CSlot", $data, $keylink);
		$showValues["CSlot"] = $value;
		$showFields[] = "CSlot";
	}	
//	DClient
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("DClient", $data, $keylink);
		$showValues["DClient"] = $value;
		$showFields[] = "DClient";
	}	
//	DDealtype
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("DDealtype", $data, $keylink);
		$showValues["DDealtype"] = $value;
		$showFields[] = "DDealtype";
	}	
//	DAmount
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("DAmount", $data, $keylink);
		$showValues["DAmount"] = $value;
		$showFields[] = "DAmount";
	}	
//	DSlot
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("DSlot", $data, $keylink);
		$showValues["DSlot"] = $value;
		$showFields[] = "DSlot";
	}	
//	ELClinet
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ELClinet", $data, $keylink);
		$showValues["ELClinet"] = $value;
		$showFields[] = "ELClinet";
	}	
//	ELDealType
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ELDealType", $data, $keylink);
		$showValues["ELDealType"] = $value;
		$showFields[] = "ELDealType";
	}	
//	ELAmount
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ELAmount", $data, $keylink);
		$showValues["ELAmount"] = $value;
		$showFields[] = "ELAmount";
	}	
//	ELSlot
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ELSlot", $data, $keylink);
		$showValues["ELSlot"] = $value;
		$showFields[] = "ELSlot";
	}	
		$showRawValues["ID"] = substr($data["ID"],0,100);
		$showRawValues["LMLive"] = substr($data["LMLive"],0,100);
		$showRawValues["Closed"] = substr($data["Closed"],0,100);
		$showRawValues["Dead"] = substr($data["Dead"],0,100);
		$showRawValues["NewEl"] = substr($data["NewEl"],0,100);
		$showRawValues["CurrentLive"] = substr($data["CurrentLive"],0,100);
		$showRawValues["CClient"] = substr($data["CClient"],0,100);
		$showRawValues["CDealtype"] = substr($data["CDealtype"],0,100);
		$showRawValues["CAmount"] = substr($data["CAmount"],0,100);
		$showRawValues["CSlot"] = substr($data["CSlot"],0,100);
		$showRawValues["DClient"] = substr($data["DClient"],0,100);
		$showRawValues["DDealtype"] = substr($data["DDealtype"],0,100);
		$showRawValues["DAmount"] = substr($data["DAmount"],0,100);
		$showRawValues["DSlot"] = substr($data["DSlot"],0,100);
		$showRawValues["ELClinet"] = substr($data["ELClinet"],0,100);
		$showRawValues["ELDealType"] = substr($data["ELDealType"],0,100);
		$showRawValues["ELAmount"] = substr($data["ELAmount"],0,100);
		$showRawValues["ELSlot"] = substr($data["ELSlot"],0,100);
	
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
		$options['masterTable'] = "changes last month end";
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
	$strTableName = "changes last month end";
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
