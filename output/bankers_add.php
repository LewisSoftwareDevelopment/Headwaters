<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/bankers_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["bankers_add"] = $layout;



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
	$templatefile = "bankers_inline_add.htm";
else
	$templatefile = "bankers_add.htm";

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
		header('Location: bankers_add.php');
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
//	processing First Name - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_First_Name = $pageObject->getControl("First Name", $id);
		$control_First_Name->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing First Name - end
//	processing Last Name - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Last_Name = $pageObject->getControl("Last Name", $id);
		$control_Last_Name->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Last Name - end
//	processing YTD+Last - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_YTD_Last = $pageObject->getControl("YTD+Last", $id);
		$control_YTD_Last->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing YTD+Last - end
//	processing Active - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Active = $pageObject->getControl("Active", $id);
		$control_Active->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Active - end
//	processing Name - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Name = $pageObject->getControl("Name", $id);
		$control_Name->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Name - end
//	processing Budget Year - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Budget_Year = $pageObject->getControl("Budget Year", $id);
		$control_Budget_Year->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Budget Year - end
//	processing Start Date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_Start_Date = $pageObject->getControl("Start Date", $id);
		$control_Start_Date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing Start Date - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="company")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
		if(postvalue("masterkey2"))
			$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey2"]);
		}
			
		if(postvalue("masterkey3"))
			$_SESSION[$sessionPrefix."_masterkey3"] = postvalue("masterkey3");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey3"]);
		}
			
		if(postvalue("masterkey4"))
			$_SESSION[$sessionPrefix."_masterkey4"] = postvalue("masterkey4");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey4"]);
		}
			
		if(postvalue("masterkey5"))
			$_SESSION[$sessionPrefix."_masterkey5"] = postvalue("masterkey5");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey5"]);
		}
			
		if(postvalue("masterkey6"))
			$_SESSION[$sessionPrefix."_masterkey6"] = postvalue("masterkey6");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey6"]);
		}
			
		if(postvalue("masterkey7"))
			$_SESSION[$sessionPrefix."_masterkey7"] = postvalue("masterkey7");
		
		if($avalues["Name"]==""){
			$avalues["Name"] = prepare_for_db("Name",$_SESSION[$sessionPrefix."_masterkey7"]);
		}
			
	}


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
//	processing First Name - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_First_Name->afterSuccessfulSave();
			}
//	processing First Name - end
//	processing Last Name - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Last_Name->afterSuccessfulSave();
			}
//	processing Last Name - end
//	processing YTD+Last - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_YTD_Last->afterSuccessfulSave();
			}
//	processing YTD+Last - end
//	processing Active - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Active->afterSuccessfulSave();
			}
//	processing Active - end
//	processing Name - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Name->afterSuccessfulSave();
			}
//	processing Name - end
//	processing Budget Year - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Budget_Year->afterSuccessfulSave();
			}
//	processing Budget Year - end
//	processing Start Date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_Start_Date->afterSuccessfulSave();
			}
//	processing Start Date - end

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
						$message .='&nbsp;<a href=\'bankers_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'bankers_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: bankers_".$pageObject->getPageType().".php");
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
	$defvalues["Active"] = true;
}


//	set default values for the foreign keys

if(@$_SESSION[$sessionPrefix."_mastertable"]=="company")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
	if(postvalue("masterkey2"))
		$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey2"];	
	
	if(postvalue("masterkey3"))
		$_SESSION[$sessionPrefix."_masterkey3"] = postvalue("masterkey3");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey3"];	
	
	if(postvalue("masterkey4"))
		$_SESSION[$sessionPrefix."_masterkey4"] = postvalue("masterkey4");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey4"];	
	
	if(postvalue("masterkey5"))
		$_SESSION[$sessionPrefix."_masterkey5"] = postvalue("masterkey5");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey5"];	
	
	if(postvalue("masterkey6"))
		$_SESSION[$sessionPrefix."_masterkey6"] = postvalue("masterkey6");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey6"];	
	
	if(postvalue("masterkey7"))
		$_SESSION[$sessionPrefix."_masterkey7"] = postvalue("masterkey7");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["Name"] = @$_SESSION[$sessionPrefix."_masterkey7"];	
	
}

if($readavalues)
{
	$defvalues["Name"]=@$avalues["Name"];
	$defvalues["Start Date"]=@$avalues["Start Date"];
	$defvalues["Budget Year"]=@$avalues["Budget Year"];
	$defvalues["Active"]=@$avalues["Active"];
	$defvalues["YTD+Last"]=@$avalues["YTD+Last"];
	$defvalues["Last Name"]=@$avalues["Last Name"];
	$defvalues["First Name"]=@$avalues["First Name"];
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
	
	if(!$pageObject->isAppearOnTabs("Name"))
		$xt->assign("Name_fieldblock",true);
	else
		$xt->assign("Name_tabfieldblock",true);
	$xt->assign("Name_label",true);
	if(isEnableSection508())
		$xt->assign_section("Name_label","<label for=\"".GetInputElementId("Name", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Start Date"))
		$xt->assign("Start_Date_fieldblock",true);
	else
		$xt->assign("Start_Date_tabfieldblock",true);
	$xt->assign("Start_Date_label",true);
	if(isEnableSection508())
		$xt->assign_section("Start_Date_label","<label for=\"".GetInputElementId("Start Date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Budget Year"))
		$xt->assign("Budget_Year_fieldblock",true);
	else
		$xt->assign("Budget_Year_tabfieldblock",true);
	$xt->assign("Budget_Year_label",true);
	if(isEnableSection508())
		$xt->assign_section("Budget_Year_label","<label for=\"".GetInputElementId("Budget Year", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Active"))
		$xt->assign("Active_fieldblock",true);
	else
		$xt->assign("Active_tabfieldblock",true);
	$xt->assign("Active_label",true);
	if(isEnableSection508())
		$xt->assign_section("Active_label","<label for=\"".GetInputElementId("Active", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("YTD+Last"))
		$xt->assign("YTD_Last_fieldblock",true);
	else
		$xt->assign("YTD_Last_tabfieldblock",true);
	$xt->assign("YTD_Last_label",true);
	if(isEnableSection508())
		$xt->assign_section("YTD_Last_label","<label for=\"".GetInputElementId("YTD+Last", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("Last Name"))
		$xt->assign("Last_Name_fieldblock",true);
	else
		$xt->assign("Last_Name_tabfieldblock",true);
	$xt->assign("Last_Name_label",true);
	if(isEnableSection508())
		$xt->assign_section("Last_Name_label","<label for=\"".GetInputElementId("Last Name", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("First Name"))
		$xt->assign("First_Name_fieldblock",true);
	else
		$xt->assign("First_Name_tabfieldblock",true);
	$xt->assign("First_Name_label",true);
	if(isEnableSection508())
		$xt->assign_section("First_Name_label","<label for=\"".GetInputElementId("First Name", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	$showDetailKeys["bankerrev"]["masterkey1"] = $data["Name"];	
	$showDetailKeys["bankerrank"]["masterkey1"] = $data["Name"];	

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
//	Name
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Name", $data, $keylink);
		$showValues["Name"] = $value;
		$showFields[] = "Name";
	}	
//	Start Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Start Date", $data, $keylink);
		$showValues["Start Date"] = $value;
		$showFields[] = "Start Date";
	}	
//	Budget Year
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Budget Year", $data, $keylink);
		$showValues["Budget Year"] = $value;
		$showFields[] = "Budget Year";
	}	
//	Active
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Active", $data, $keylink);
		$showValues["Active"] = $value;
		$showFields[] = "Active";
	}	
//	YTD Revenue
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("YTD Revenue", $data, $keylink);
		$showValues["YTD Revenue"] = $value;
		$showFields[] = "YTD Revenue";
	}	
//	Last Year Rev
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Last Year Rev", $data, $keylink);
		$showValues["Last Year Rev"] = $value;
		$showFields[] = "Last Year Rev";
	}	
//	Prior Year Rev
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Prior Year Rev", $data, $keylink);
		$showValues["Prior Year Rev"] = $value;
		$showFields[] = "Prior Year Rev";
	}	
//	Last Year Rank
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Last Year Rank", $data, $keylink);
		$showValues["Last Year Rank"] = $value;
		$showFields[] = "Last Year Rank";
	}	
//	YTD+Last
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("YTD+Last", $data, $keylink);
		$showValues["YTD+Last"] = $value;
		$showFields[] = "YTD+Last";
	}	
//	YTD Closing
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("YTD Closing", $data, $keylink);
		$showValues["YTD Closing"] = $value;
		$showFields[] = "YTD Closing";
	}	
//	Last Year Closing
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Last Year Closing", $data, $keylink);
		$showValues["Last Year Closing"] = $value;
		$showFields[] = "Last Year Closing";
	}	
//	YTD IBC
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("YTD IBC", $data, $keylink);
		$showValues["YTD IBC"] = $value;
		$showFields[] = "YTD IBC";
	}	
//	YTD Engagements
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("YTD Engagements", $data, $keylink);
		$showValues["YTD Engagements"] = $value;
		$showFields[] = "YTD Engagements";
	}	
//	Total Current Engagments
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Total Current Engagments", $data, $keylink);
		$showValues["Total Current Engagments"] = $value;
		$showFields[] = "Total Current Engagments";
	}	
//	# Wheelhouse
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("# Wheelhouse", $data, $keylink);
		$showValues["# Wheelhouse"] = $value;
		$showFields[] = "# Wheelhouse";
	}	
//	# Speculative
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("# Speculative", $data, $keylink);
		$showValues["# Speculative"] = $value;
		$showFields[] = "# Speculative";
	}	
//	# Minimum
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("# Minimum", $data, $keylink);
		$showValues["# Minimum"] = $value;
		$showFields[] = "# Minimum";
	}	
//	Last Name
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("Last Name", $data, $keylink);
		$showValues["Last Name"] = $value;
		$showFields[] = "Last Name";
	}	
//	First Name
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("First Name", $data, $keylink);
		$showValues["First Name"] = $value;
		$showFields[] = "First Name";
	}	
		$showRawValues["ID"] = substr($data["ID"],0,100);
		$showRawValues["Name"] = substr($data["Name"],0,100);
		$showRawValues["Start Date"] = substr($data["Start Date"],0,100);
		$showRawValues["Budget Year"] = substr($data["Budget Year"],0,100);
		$showRawValues["Active"] = substr($data["Active"],0,100);
		$showRawValues["YTD Revenue"] = substr($data["YTD Revenue"],0,100);
		$showRawValues["Last Year Rev"] = substr($data["Last Year Rev"],0,100);
		$showRawValues["Prior Year Rev"] = substr($data["Prior Year Rev"],0,100);
		$showRawValues["Last Year Rank"] = substr($data["Last Year Rank"],0,100);
		$showRawValues["YTD+Last"] = substr($data["YTD+Last"],0,100);
		$showRawValues["YTD Closing"] = substr($data["YTD Closing"],0,100);
		$showRawValues["Last Year Closing"] = substr($data["Last Year Closing"],0,100);
		$showRawValues["YTD IBC"] = substr($data["YTD IBC"],0,100);
		$showRawValues["YTD Engagements"] = substr($data["YTD Engagements"],0,100);
		$showRawValues["Total Current Engagments"] = substr($data["Total Current Engagments"],0,100);
		$showRawValues["# Wheelhouse"] = substr($data["# Wheelhouse"],0,100);
		$showRawValues["# Speculative"] = substr($data["# Speculative"],0,100);
		$showRawValues["# Minimum"] = substr($data["# Minimum"],0,100);
		$showRawValues["Last Name"] = substr($data["Last Name"],0,100);
		$showRawValues["First Name"] = substr($data["First Name"],0,100);
	
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
		$options['masterTable'] = "bankers";
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
	$strTableName = "bankers";
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
	
	if(postvalue("table")=="company" && postvalue("field")=="Primary_Banker") 
	{
		$lookupFieldName = "Primary Banker";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Primary Banker");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_1") 
	{
		$lookupFieldName = "Team-1";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-1");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_2") 
	{
		$lookupFieldName = "Team-2";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-2");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_3") 
	{
		$lookupFieldName = "Team-3";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-3");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_4") 
	{
		$lookupFieldName = "Team-4";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-4");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_5") 
	{
		$lookupFieldName = "Team-5";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-5");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
	if(postvalue("table")=="company" && postvalue("field")=="Team_6") 
	{
		$lookupFieldName = "Team-6";
		$lookupTable = "bankers";
		$linkFieldName = "Name";
		$dispfield = "Name";
		// Table which contain lookup field!
		$lookupPSet = new ProjectSettings("company", PAGE_ADD);
		$nLookupType = $lookupPSet->getLookupType($lookupFieldName);
		if($nLookupType == LT_QUERY)
		{
			if($lookupPSet->getCustomDisplay($lookupFieldName))
				$pageObject->pSet->getSQLQuery()->AddCustomExpression($dispfield, $pageObject->pSet, "company", "Team-6");
			$lookupQueryObj = $pageObject->pSet->getSQLQuery()->CloneObject();
			if(!$noBlobReplace)
				$lookupQueryObj->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());
		}else{
			$LookupSQL = "select ";
			$LookupSQL .= GetFullFieldName("Name", $strTableName, true);
					if($linkFieldName != $dispfield)
				$LookupSQL .= ",Name";
		}
	}
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
