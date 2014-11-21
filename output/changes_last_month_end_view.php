<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/changes_last_month_end_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["changes_last_month_end_view"] = $layout;




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
	header("Location: changes_last_month_end_list.php?a=return");
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
$arr['fName'] = "LMLive";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("LMLive");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Closed";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Closed");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Dead";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Dead");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "NewEl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("NewEl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "CurrentLive";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("CurrentLive");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "CClient";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("CClient");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "CDealtype";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("CDealtype");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "CAmount";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("CAmount");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "CSlot";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("CSlot");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "DClient";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("DClient");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "DDealtype";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("DDealtype");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "DAmount";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("DAmount");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "DSlot";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("DSlot");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ELClinet";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ELClinet");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ELDealType";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ELDealType");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ELAmount";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ELAmount");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ELSlot";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ELSlot");
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
//LMLive - 
	
	$value = $pageObject->showDBValue("LMLive", $data, $keylink);
	if($mainTableOwnerID=="LMLive")
		$ownerIdValue=$value;
	$xt->assign("LMLive_value",$value);
	if(!$pageObject->isAppearOnTabs("LMLive"))
		$xt->assign("LMLive_fieldblock",true);
	else
		$xt->assign("LMLive_tabfieldblock",true);
////////////////////////////////////////////
//Closed - 
	
	$value = $pageObject->showDBValue("Closed", $data, $keylink);
	if($mainTableOwnerID=="Closed")
		$ownerIdValue=$value;
	$xt->assign("Closed_value",$value);
	if(!$pageObject->isAppearOnTabs("Closed"))
		$xt->assign("Closed_fieldblock",true);
	else
		$xt->assign("Closed_tabfieldblock",true);
////////////////////////////////////////////
//Dead - 
	
	$value = $pageObject->showDBValue("Dead", $data, $keylink);
	if($mainTableOwnerID=="Dead")
		$ownerIdValue=$value;
	$xt->assign("Dead_value",$value);
	if(!$pageObject->isAppearOnTabs("Dead"))
		$xt->assign("Dead_fieldblock",true);
	else
		$xt->assign("Dead_tabfieldblock",true);
////////////////////////////////////////////
//NewEl - 
	
	$value = $pageObject->showDBValue("NewEl", $data, $keylink);
	if($mainTableOwnerID=="NewEl")
		$ownerIdValue=$value;
	$xt->assign("NewEl_value",$value);
	if(!$pageObject->isAppearOnTabs("NewEl"))
		$xt->assign("NewEl_fieldblock",true);
	else
		$xt->assign("NewEl_tabfieldblock",true);
////////////////////////////////////////////
//CurrentLive - 
	
	$value = $pageObject->showDBValue("CurrentLive", $data, $keylink);
	if($mainTableOwnerID=="CurrentLive")
		$ownerIdValue=$value;
	$xt->assign("CurrentLive_value",$value);
	if(!$pageObject->isAppearOnTabs("CurrentLive"))
		$xt->assign("CurrentLive_fieldblock",true);
	else
		$xt->assign("CurrentLive_tabfieldblock",true);
////////////////////////////////////////////
//CClient - 
	
	$value = $pageObject->showDBValue("CClient", $data, $keylink);
	if($mainTableOwnerID=="CClient")
		$ownerIdValue=$value;
	$xt->assign("CClient_value",$value);
	if(!$pageObject->isAppearOnTabs("CClient"))
		$xt->assign("CClient_fieldblock",true);
	else
		$xt->assign("CClient_tabfieldblock",true);
////////////////////////////////////////////
//CDealtype - 
	
	$value = $pageObject->showDBValue("CDealtype", $data, $keylink);
	if($mainTableOwnerID=="CDealtype")
		$ownerIdValue=$value;
	$xt->assign("CDealtype_value",$value);
	if(!$pageObject->isAppearOnTabs("CDealtype"))
		$xt->assign("CDealtype_fieldblock",true);
	else
		$xt->assign("CDealtype_tabfieldblock",true);
////////////////////////////////////////////
//CAmount - 
	
	$value = $pageObject->showDBValue("CAmount", $data, $keylink);
	if($mainTableOwnerID=="CAmount")
		$ownerIdValue=$value;
	$xt->assign("CAmount_value",$value);
	if(!$pageObject->isAppearOnTabs("CAmount"))
		$xt->assign("CAmount_fieldblock",true);
	else
		$xt->assign("CAmount_tabfieldblock",true);
////////////////////////////////////////////
//CSlot - 
	
	$value = $pageObject->showDBValue("CSlot", $data, $keylink);
	if($mainTableOwnerID=="CSlot")
		$ownerIdValue=$value;
	$xt->assign("CSlot_value",$value);
	if(!$pageObject->isAppearOnTabs("CSlot"))
		$xt->assign("CSlot_fieldblock",true);
	else
		$xt->assign("CSlot_tabfieldblock",true);
////////////////////////////////////////////
//DClient - 
	
	$value = $pageObject->showDBValue("DClient", $data, $keylink);
	if($mainTableOwnerID=="DClient")
		$ownerIdValue=$value;
	$xt->assign("DClient_value",$value);
	if(!$pageObject->isAppearOnTabs("DClient"))
		$xt->assign("DClient_fieldblock",true);
	else
		$xt->assign("DClient_tabfieldblock",true);
////////////////////////////////////////////
//DDealtype - 
	
	$value = $pageObject->showDBValue("DDealtype", $data, $keylink);
	if($mainTableOwnerID=="DDealtype")
		$ownerIdValue=$value;
	$xt->assign("DDealtype_value",$value);
	if(!$pageObject->isAppearOnTabs("DDealtype"))
		$xt->assign("DDealtype_fieldblock",true);
	else
		$xt->assign("DDealtype_tabfieldblock",true);
////////////////////////////////////////////
//DAmount - 
	
	$value = $pageObject->showDBValue("DAmount", $data, $keylink);
	if($mainTableOwnerID=="DAmount")
		$ownerIdValue=$value;
	$xt->assign("DAmount_value",$value);
	if(!$pageObject->isAppearOnTabs("DAmount"))
		$xt->assign("DAmount_fieldblock",true);
	else
		$xt->assign("DAmount_tabfieldblock",true);
////////////////////////////////////////////
//DSlot - 
	
	$value = $pageObject->showDBValue("DSlot", $data, $keylink);
	if($mainTableOwnerID=="DSlot")
		$ownerIdValue=$value;
	$xt->assign("DSlot_value",$value);
	if(!$pageObject->isAppearOnTabs("DSlot"))
		$xt->assign("DSlot_fieldblock",true);
	else
		$xt->assign("DSlot_tabfieldblock",true);
////////////////////////////////////////////
//ELClinet - 
	
	$value = $pageObject->showDBValue("ELClinet", $data, $keylink);
	if($mainTableOwnerID=="ELClinet")
		$ownerIdValue=$value;
	$xt->assign("ELClinet_value",$value);
	if(!$pageObject->isAppearOnTabs("ELClinet"))
		$xt->assign("ELClinet_fieldblock",true);
	else
		$xt->assign("ELClinet_tabfieldblock",true);
////////////////////////////////////////////
//ELDealType - 
	
	$value = $pageObject->showDBValue("ELDealType", $data, $keylink);
	if($mainTableOwnerID=="ELDealType")
		$ownerIdValue=$value;
	$xt->assign("ELDealType_value",$value);
	if(!$pageObject->isAppearOnTabs("ELDealType"))
		$xt->assign("ELDealType_fieldblock",true);
	else
		$xt->assign("ELDealType_tabfieldblock",true);
////////////////////////////////////////////
//ELAmount - 
	
	$value = $pageObject->showDBValue("ELAmount", $data, $keylink);
	if($mainTableOwnerID=="ELAmount")
		$ownerIdValue=$value;
	$xt->assign("ELAmount_value",$value);
	if(!$pageObject->isAppearOnTabs("ELAmount"))
		$xt->assign("ELAmount_fieldblock",true);
	else
		$xt->assign("ELAmount_tabfieldblock",true);
////////////////////////////////////////////
//ELSlot - 
	
	$value = $pageObject->showDBValue("ELSlot", $data, $keylink);
	if($mainTableOwnerID=="ELSlot")
		$ownerIdValue=$value;
	$xt->assign("ELSlot_value",$value);
	if(!$pageObject->isAppearOnTabs("ELSlot"))
		$xt->assign("ELSlot_fieldblock",true);
	else
		$xt->assign("ELSlot_tabfieldblock",true);

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
		$options['masterTable'] = "changes last month end";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "changes last month end";
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
	$strTableName = "changes last month end";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='changes_last_month_end_edit.php?".$editlink."'\"");

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
