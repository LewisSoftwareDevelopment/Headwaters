<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/Snapshot_variables.php");
include("classes/searchcontrol.php");
include("classes/advancedsearchcontrol.php");
include("classes/panelsearchcontrol.php");
include("classes/searchclause.php");

$sessionPrefix = $strTableName;

//Basic includes js files
$includes="";
// predefined fields num
$predefFieldNum = 0;

$chrt_array=array();
$rpt_array=array();

//	check if logged in
if( (!isLogged() || CheckPermissionsEvent($strTableName, 'S') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && !@$chrt_array['status'] && !@$rpt_array['status'])
|| (@$rpt_array['status'] == "private" && @$rpt_array['owner'] != @$_SESSION["UserID"])
|| (@$chrt_array['status'] == "private" && @$chrt_array['owner'] != @$_SESSION["UserID"]) )
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$layout = new TLayout("search2","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["top"] = array();
$layout->containers["search"] = array();

$layout->containers["search"][] = array("name"=>"srchheader","block"=>"","substyle"=>2);


$layout->containers["search"][] = array("name"=>"srchconditions","block"=>"conditions_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"srchfields","block"=>"","substyle"=>1);


$layout->skins["fields"] = "fields";

$layout->containers["search"][] = array("name"=>"srchbuttons","block"=>"","substyle"=>2);


$layout->skins["search"] = "1";
$layout->blocks["top"][] = "search";$page_layouts["Snapshot_search"] = $layout;


include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

// id that used to add to controls names
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
	
// for usual page show proccess
$mode = SEARCH_SIMPLE;
$templatefile = "Snapshot_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode = SEARCH_LOAD_CONTROL;
}	

$timepicker = false;

$params = array();
$params["id"] = $id;
$params["mode"] = $mode;
$params["timepicker"] = $timepicker;
$params['xt'] = &$xt;
$params['templatefile'] = $templatefile;
$params['shortTableName'] = 'Snapshot';
$params['origTName'] = $strOriginalTableName;
$params['sessionPrefix'] = $sessionPrefix;
$params['tName'] = $strTableName;
$params['includes_js'] = $includes_js;
$params['includes_jsreq'] = $includes_jsreq;
$params['includes_css'] = $includes_css;
$params['locale_info'] = $locale_info;
$params['pageType'] = PAGE_SEARCH;

$pageObject = new RunnerPage($params);

// create reusable searchControl builder instance
$searchControllerId = (postvalue('searchControllerId') ? postvalue('searchControllerId') : $pageObject->id);

//	Before Process event
if($eventObj->exists("BeforeProcessSearch"))
	$eventObj->BeforeProcessSearch($conn, $pageObject);

// add constants and files for simple view
if ($mode==SEARCH_SIMPLE)
{
	$searchControlBuilder = new AdvancedSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);

	// add button events if exist
	$pageObject->addButtonHandlers();

	$includes .="<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
	//$includes.="<script language=\"JavaScript\" src=\"include/customlabels.js\"></script>\r\n";
		$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";	

	// if not simple, this div already exist on page
	if (!isMobile())
		$includes.="<div id=\"search_suggest\" class=\"search_suggest\"></div>";

	// search panel radio button assign
	$searchRadio = $searchControlBuilder->getSearchRadio();
	$xt->assign_section("all_checkbox_label", $searchRadio['all_checkbox_label'][0], $searchRadio['all_checkbox_label'][1]);
	$xt->assign_section("any_checkbox_label", $searchRadio['any_checkbox_label'][0], $searchRadio['any_checkbox_label'][1]);
	$xt->assignbyref("all_checkbox",$searchRadio['all_checkbox']);
	$xt->assignbyref("any_checkbox",$searchRadio['any_checkbox']);
	
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Live"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Live")] = GetTableURL($pageObject->pSet->getLookupTable("Live"));
	
	$pageObject->fillFieldToolTips("Live");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Live");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Live";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Live_label","<label for=\"".GetInputElementId("Live", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Live_label", true);
	
	$xt->assign("Live_fieldblock", true);
	$xt->assignbyref("Live_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Live_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Live_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Live", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Live");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Live", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Live", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("InMarketLOI"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("InMarketLOI")] = GetTableURL($pageObject->pSet->getLookupTable("InMarketLOI"));
	
	$pageObject->fillFieldToolTips("InMarketLOI");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("InMarketLOI");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "InMarketLOI";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("InMarketLOI_label","<label for=\"".GetInputElementId("InMarketLOI", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("InMarketLOI_label", true);
	
	$xt->assign("InMarketLOI_fieldblock", true);
	$xt->assignbyref("InMarketLOI_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("InMarketLOI_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("InMarketLOI_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_InMarketLOI", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("InMarketLOI");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"InMarketLOI", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"InMarketLOI", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Closed"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Closed")] = GetTableURL($pageObject->pSet->getLookupTable("Closed"));
	
	$pageObject->fillFieldToolTips("Closed");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Closed");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Closed";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Closed_label","<label for=\"".GetInputElementId("Closed", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Closed_label", true);
	
	$xt->assign("Closed_fieldblock", true);
	$xt->assignbyref("Closed_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Closed_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Closed_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Closed", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Closed");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closed", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closed", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL")] = GetTableURL($pageObject->pSet->getLookupTable("EL"));
	
	$pageObject->fillFieldToolTips("EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL_label","<label for=\"".GetInputElementId("EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL_label", true);
	
	$xt->assign("EL_fieldblock", true);
	$xt->assignbyref("EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC")] = GetTableURL($pageObject->pSet->getLookupTable("IBC"));
	
	$pageObject->fillFieldToolTips("IBC");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC_label","<label for=\"".GetInputElementId("IBC", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC_label", true);
	
	$xt->assign("IBC_fieldblock", true);
	$xt->assignbyref("IBC_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda12")] = GetTableURL($pageObject->pSet->getLookupTable("nda12"));
	
	$pageObject->fillFieldToolTips("nda12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda12_label","<label for=\"".GetInputElementId("nda12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda12_label", true);
	
	$xt->assign("nda12_fieldblock", true);
	$xt->assignbyref("nda12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda11")] = GetTableURL($pageObject->pSet->getLookupTable("nda11"));
	
	$pageObject->fillFieldToolTips("nda11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda11_label","<label for=\"".GetInputElementId("nda11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda11_label", true);
	
	$xt->assign("nda11_fieldblock", true);
	$xt->assignbyref("nda11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda10")] = GetTableURL($pageObject->pSet->getLookupTable("nda10"));
	
	$pageObject->fillFieldToolTips("nda10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda10_label","<label for=\"".GetInputElementId("nda10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda10_label", true);
	
	$xt->assign("nda10_fieldblock", true);
	$xt->assignbyref("nda10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda9")] = GetTableURL($pageObject->pSet->getLookupTable("nda9"));
	
	$pageObject->fillFieldToolTips("nda9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda9_label","<label for=\"".GetInputElementId("nda9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda9_label", true);
	
	$xt->assign("nda9_fieldblock", true);
	$xt->assignbyref("nda9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda8")] = GetTableURL($pageObject->pSet->getLookupTable("nda8"));
	
	$pageObject->fillFieldToolTips("nda8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda8_label","<label for=\"".GetInputElementId("nda8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda8_label", true);
	
	$xt->assign("nda8_fieldblock", true);
	$xt->assignbyref("nda8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda7")] = GetTableURL($pageObject->pSet->getLookupTable("nda7"));
	
	$pageObject->fillFieldToolTips("nda7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda7_label","<label for=\"".GetInputElementId("nda7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda7_label", true);
	
	$xt->assign("nda7_fieldblock", true);
	$xt->assignbyref("nda7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda6")] = GetTableURL($pageObject->pSet->getLookupTable("nda6"));
	
	$pageObject->fillFieldToolTips("nda6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda6_label","<label for=\"".GetInputElementId("nda6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda6_label", true);
	
	$xt->assign("nda6_fieldblock", true);
	$xt->assignbyref("nda6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda5")] = GetTableURL($pageObject->pSet->getLookupTable("nda5"));
	
	$pageObject->fillFieldToolTips("nda5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda5_label","<label for=\"".GetInputElementId("nda5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda5_label", true);
	
	$xt->assign("nda5_fieldblock", true);
	$xt->assignbyref("nda5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda4")] = GetTableURL($pageObject->pSet->getLookupTable("nda4"));
	
	$pageObject->fillFieldToolTips("nda4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda4_label","<label for=\"".GetInputElementId("nda4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda4_label", true);
	
	$xt->assign("nda4_fieldblock", true);
	$xt->assignbyref("nda4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda3")] = GetTableURL($pageObject->pSet->getLookupTable("nda3"));
	
	$pageObject->fillFieldToolTips("nda3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda3_label","<label for=\"".GetInputElementId("nda3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda3_label", true);
	
	$xt->assign("nda3_fieldblock", true);
	$xt->assignbyref("nda3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda2")] = GetTableURL($pageObject->pSet->getLookupTable("nda2"));
	
	$pageObject->fillFieldToolTips("nda2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda2_label","<label for=\"".GetInputElementId("nda2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda2_label", true);
	
	$xt->assign("nda2_fieldblock", true);
	$xt->assignbyref("nda2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("nda1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("nda1")] = GetTableURL($pageObject->pSet->getLookupTable("nda1"));
	
	$pageObject->fillFieldToolTips("nda1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("nda1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nda1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("nda1_label","<label for=\"".GetInputElementId("nda1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("nda1_label", true);
	
	$xt->assign("nda1_fieldblock", true);
	$xt->assignbyref("nda1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("nda1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("nda1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_nda1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("nda1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"nda1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("NDAYTD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("NDAYTD")] = GetTableURL($pageObject->pSet->getLookupTable("NDAYTD"));
	
	$pageObject->fillFieldToolTips("NDAYTD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("NDAYTD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "NDAYTD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("NDAYTD_label","<label for=\"".GetInputElementId("NDAYTD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("NDAYTD_label", true);
	
	$xt->assign("NDAYTD_fieldblock", true);
	$xt->assignbyref("NDAYTD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("NDAYTD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("NDAYTD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_NDAYTD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("NDAYTD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"NDAYTD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"NDAYTD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELJan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELJan")] = GetTableURL($pageObject->pSet->getLookupTable("ELJan"));
	
	$pageObject->fillFieldToolTips("ELJan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELJan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELJan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELJan_label","<label for=\"".GetInputElementId("ELJan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELJan_label", true);
	
	$xt->assign("ELJan_fieldblock", true);
	$xt->assignbyref("ELJan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELJan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELJan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELJan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELJan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELFeb"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELFeb")] = GetTableURL($pageObject->pSet->getLookupTable("ELFeb"));
	
	$pageObject->fillFieldToolTips("ELFeb");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELFeb");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELFeb";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELFeb_label","<label for=\"".GetInputElementId("ELFeb", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELFeb_label", true);
	
	$xt->assign("ELFeb_fieldblock", true);
	$xt->assignbyref("ELFeb_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELFeb_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELFeb_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELFeb", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELFeb");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELFeb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELFeb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELMar"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELMar")] = GetTableURL($pageObject->pSet->getLookupTable("ELMar"));
	
	$pageObject->fillFieldToolTips("ELMar");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELMar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELMar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELMar_label","<label for=\"".GetInputElementId("ELMar", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELMar_label", true);
	
	$xt->assign("ELMar_fieldblock", true);
	$xt->assignbyref("ELMar_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELMar_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELMar_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELMar", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELMar");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELMar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELMar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELApril"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELApril")] = GetTableURL($pageObject->pSet->getLookupTable("ELApril"));
	
	$pageObject->fillFieldToolTips("ELApril");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELApril");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELApril";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELApril_label","<label for=\"".GetInputElementId("ELApril", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELApril_label", true);
	
	$xt->assign("ELApril_fieldblock", true);
	$xt->assignbyref("ELApril_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELApril_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELApril_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELApril", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELApril");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELApril", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELApril", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELMay"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELMay")] = GetTableURL($pageObject->pSet->getLookupTable("ELMay"));
	
	$pageObject->fillFieldToolTips("ELMay");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELMay");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELMay";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELMay_label","<label for=\"".GetInputElementId("ELMay", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELMay_label", true);
	
	$xt->assign("ELMay_fieldblock", true);
	$xt->assignbyref("ELMay_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELMay_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELMay_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELMay", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELMay");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELMay", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELMay", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELJune"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELJune")] = GetTableURL($pageObject->pSet->getLookupTable("ELJune"));
	
	$pageObject->fillFieldToolTips("ELJune");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELJune");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELJune";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELJune_label","<label for=\"".GetInputElementId("ELJune", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELJune_label", true);
	
	$xt->assign("ELJune_fieldblock", true);
	$xt->assignbyref("ELJune_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELJune_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELJune_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELJune", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELJune");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJune", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJune", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELJuly"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELJuly")] = GetTableURL($pageObject->pSet->getLookupTable("ELJuly"));
	
	$pageObject->fillFieldToolTips("ELJuly");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELJuly");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELJuly";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELJuly_label","<label for=\"".GetInputElementId("ELJuly", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELJuly_label", true);
	
	$xt->assign("ELJuly_fieldblock", true);
	$xt->assignbyref("ELJuly_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELJuly_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELJuly_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELJuly", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELJuly");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJuly", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELJuly", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELAug"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELAug")] = GetTableURL($pageObject->pSet->getLookupTable("ELAug"));
	
	$pageObject->fillFieldToolTips("ELAug");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELAug");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELAug";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELAug_label","<label for=\"".GetInputElementId("ELAug", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELAug_label", true);
	
	$xt->assign("ELAug_fieldblock", true);
	$xt->assignbyref("ELAug_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELAug_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELAug_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELAug", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELAug");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELAug", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELAug", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELSep"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELSep")] = GetTableURL($pageObject->pSet->getLookupTable("ELSep"));
	
	$pageObject->fillFieldToolTips("ELSep");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELSep");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELSep";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELSep_label","<label for=\"".GetInputElementId("ELSep", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELSep_label", true);
	
	$xt->assign("ELSep_fieldblock", true);
	$xt->assignbyref("ELSep_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELSep_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELSep_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELSep", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELSep");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELSep", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELSep", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELOct"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELOct")] = GetTableURL($pageObject->pSet->getLookupTable("ELOct"));
	
	$pageObject->fillFieldToolTips("ELOct");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELOct");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELOct";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELOct_label","<label for=\"".GetInputElementId("ELOct", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELOct_label", true);
	
	$xt->assign("ELOct_fieldblock", true);
	$xt->assignbyref("ELOct_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELOct_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELOct_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELOct", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELOct");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELOct", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELOct", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELNov"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELNov")] = GetTableURL($pageObject->pSet->getLookupTable("ELNov"));
	
	$pageObject->fillFieldToolTips("ELNov");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELNov");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELNov";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELNov_label","<label for=\"".GetInputElementId("ELNov", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELNov_label", true);
	
	$xt->assign("ELNov_fieldblock", true);
	$xt->assignbyref("ELNov_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELNov_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELNov_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELNov", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELNov");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELNov", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELNov", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELDec"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELDec")] = GetTableURL($pageObject->pSet->getLookupTable("ELDec"));
	
	$pageObject->fillFieldToolTips("ELDec");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELDec");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELDec";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELDec_label","<label for=\"".GetInputElementId("ELDec", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELDec_label", true);
	
	$xt->assign("ELDec_fieldblock", true);
	$xt->assignbyref("ELDec_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELDec_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELDec_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELDec", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELDec");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELDec", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELDec", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLJan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLJan")] = GetTableURL($pageObject->pSet->getLookupTable("IMLJan"));
	
	$pageObject->fillFieldToolTips("IMLJan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLJan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLJan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLJan_label","<label for=\"".GetInputElementId("IMLJan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLJan_label", true);
	
	$xt->assign("IMLJan_fieldblock", true);
	$xt->assignbyref("IMLJan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLJan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLJan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLJan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLJan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLeb"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLeb")] = GetTableURL($pageObject->pSet->getLookupTable("IMLeb"));
	
	$pageObject->fillFieldToolTips("IMLeb");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLeb");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLeb";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLeb_label","<label for=\"".GetInputElementId("IMLeb", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLeb_label", true);
	
	$xt->assign("IMLeb_fieldblock", true);
	$xt->assignbyref("IMLeb_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLeb_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLeb_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLeb", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLeb");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLeb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLeb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLMar"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLMar")] = GetTableURL($pageObject->pSet->getLookupTable("IMLMar"));
	
	$pageObject->fillFieldToolTips("IMLMar");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLMar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLMar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLMar_label","<label for=\"".GetInputElementId("IMLMar", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLMar_label", true);
	
	$xt->assign("IMLMar_fieldblock", true);
	$xt->assignbyref("IMLMar_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLMar_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLMar_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLMar", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLMar");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLMar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLMar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLApril"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLApril")] = GetTableURL($pageObject->pSet->getLookupTable("IMLApril"));
	
	$pageObject->fillFieldToolTips("IMLApril");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLApril");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLApril";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLApril_label","<label for=\"".GetInputElementId("IMLApril", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLApril_label", true);
	
	$xt->assign("IMLApril_fieldblock", true);
	$xt->assignbyref("IMLApril_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLApril_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLApril_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLApril", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLApril");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLApril", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLApril", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLMay"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLMay")] = GetTableURL($pageObject->pSet->getLookupTable("IMLMay"));
	
	$pageObject->fillFieldToolTips("IMLMay");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLMay");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLMay";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLMay_label","<label for=\"".GetInputElementId("IMLMay", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLMay_label", true);
	
	$xt->assign("IMLMay_fieldblock", true);
	$xt->assignbyref("IMLMay_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLMay_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLMay_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLMay", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLMay");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLMay", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLMay", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLJune"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLJune")] = GetTableURL($pageObject->pSet->getLookupTable("IMLJune"));
	
	$pageObject->fillFieldToolTips("IMLJune");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLJune");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLJune";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLJune_label","<label for=\"".GetInputElementId("IMLJune", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLJune_label", true);
	
	$xt->assign("IMLJune_fieldblock", true);
	$xt->assignbyref("IMLJune_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLJune_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLJune_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLJune", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLJune");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJune", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJune", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLJuly"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLJuly")] = GetTableURL($pageObject->pSet->getLookupTable("IMLJuly"));
	
	$pageObject->fillFieldToolTips("IMLJuly");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLJuly");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLJuly";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLJuly_label","<label for=\"".GetInputElementId("IMLJuly", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLJuly_label", true);
	
	$xt->assign("IMLJuly_fieldblock", true);
	$xt->assignbyref("IMLJuly_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLJuly_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLJuly_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLJuly", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLJuly");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJuly", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLJuly", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLAug"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLAug")] = GetTableURL($pageObject->pSet->getLookupTable("IMLAug"));
	
	$pageObject->fillFieldToolTips("IMLAug");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLAug");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLAug";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLAug_label","<label for=\"".GetInputElementId("IMLAug", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLAug_label", true);
	
	$xt->assign("IMLAug_fieldblock", true);
	$xt->assignbyref("IMLAug_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLAug_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLAug_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLAug", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLAug");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLAug", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLAug", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLSep"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLSep")] = GetTableURL($pageObject->pSet->getLookupTable("IMLSep"));
	
	$pageObject->fillFieldToolTips("IMLSep");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLSep");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLSep";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLSep_label","<label for=\"".GetInputElementId("IMLSep", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLSep_label", true);
	
	$xt->assign("IMLSep_fieldblock", true);
	$xt->assignbyref("IMLSep_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLSep_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLSep_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLSep", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLSep");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLSep", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLSep", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLOct"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLOct")] = GetTableURL($pageObject->pSet->getLookupTable("IMLOct"));
	
	$pageObject->fillFieldToolTips("IMLOct");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLOct");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLOct";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLOct_label","<label for=\"".GetInputElementId("IMLOct", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLOct_label", true);
	
	$xt->assign("IMLOct_fieldblock", true);
	$xt->assignbyref("IMLOct_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLOct_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLOct_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLOct", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLOct");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLOct", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLOct", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLNov"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLNov")] = GetTableURL($pageObject->pSet->getLookupTable("IMLNov"));
	
	$pageObject->fillFieldToolTips("IMLNov");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLNov");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLNov";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLNov_label","<label for=\"".GetInputElementId("IMLNov", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLNov_label", true);
	
	$xt->assign("IMLNov_fieldblock", true);
	$xt->assignbyref("IMLNov_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLNov_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLNov_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLNov", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLNov");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLNov", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLNov", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IMLDec"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IMLDec")] = GetTableURL($pageObject->pSet->getLookupTable("IMLDec"));
	
	$pageObject->fillFieldToolTips("IMLDec");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IMLDec");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IMLDec";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IMLDec_label","<label for=\"".GetInputElementId("IMLDec", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IMLDec_label", true);
	
	$xt->assign("IMLDec_fieldblock", true);
	$xt->assignbyref("IMLDec_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IMLDec_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IMLDec_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IMLDec", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IMLDec");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLDec", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IMLDec", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC12")] = GetTableURL($pageObject->pSet->getLookupTable("IBC12"));
	
	$pageObject->fillFieldToolTips("IBC12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC12_label","<label for=\"".GetInputElementId("IBC12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC12_label", true);
	
	$xt->assign("IBC12_fieldblock", true);
	$xt->assignbyref("IBC12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC11")] = GetTableURL($pageObject->pSet->getLookupTable("IBC11"));
	
	$pageObject->fillFieldToolTips("IBC11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC11_label","<label for=\"".GetInputElementId("IBC11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC11_label", true);
	
	$xt->assign("IBC11_fieldblock", true);
	$xt->assignbyref("IBC11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC10")] = GetTableURL($pageObject->pSet->getLookupTable("IBC10"));
	
	$pageObject->fillFieldToolTips("IBC10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC10_label","<label for=\"".GetInputElementId("IBC10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC10_label", true);
	
	$xt->assign("IBC10_fieldblock", true);
	$xt->assignbyref("IBC10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC9")] = GetTableURL($pageObject->pSet->getLookupTable("IBC9"));
	
	$pageObject->fillFieldToolTips("IBC9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC9_label","<label for=\"".GetInputElementId("IBC9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC9_label", true);
	
	$xt->assign("IBC9_fieldblock", true);
	$xt->assignbyref("IBC9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC8")] = GetTableURL($pageObject->pSet->getLookupTable("IBC8"));
	
	$pageObject->fillFieldToolTips("IBC8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC8_label","<label for=\"".GetInputElementId("IBC8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC8_label", true);
	
	$xt->assign("IBC8_fieldblock", true);
	$xt->assignbyref("IBC8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC7")] = GetTableURL($pageObject->pSet->getLookupTable("IBC7"));
	
	$pageObject->fillFieldToolTips("IBC7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC7_label","<label for=\"".GetInputElementId("IBC7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC7_label", true);
	
	$xt->assign("IBC7_fieldblock", true);
	$xt->assignbyref("IBC7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC6")] = GetTableURL($pageObject->pSet->getLookupTable("IBC6"));
	
	$pageObject->fillFieldToolTips("IBC6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC6_label","<label for=\"".GetInputElementId("IBC6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC6_label", true);
	
	$xt->assign("IBC6_fieldblock", true);
	$xt->assignbyref("IBC6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC5")] = GetTableURL($pageObject->pSet->getLookupTable("IBC5"));
	
	$pageObject->fillFieldToolTips("IBC5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC5_label","<label for=\"".GetInputElementId("IBC5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC5_label", true);
	
	$xt->assign("IBC5_fieldblock", true);
	$xt->assignbyref("IBC5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC4")] = GetTableURL($pageObject->pSet->getLookupTable("IBC4"));
	
	$pageObject->fillFieldToolTips("IBC4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC4_label","<label for=\"".GetInputElementId("IBC4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC4_label", true);
	
	$xt->assign("IBC4_fieldblock", true);
	$xt->assignbyref("IBC4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC3")] = GetTableURL($pageObject->pSet->getLookupTable("IBC3"));
	
	$pageObject->fillFieldToolTips("IBC3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC3_label","<label for=\"".GetInputElementId("IBC3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC3_label", true);
	
	$xt->assign("IBC3_fieldblock", true);
	$xt->assignbyref("IBC3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC2")] = GetTableURL($pageObject->pSet->getLookupTable("IBC2"));
	
	$pageObject->fillFieldToolTips("IBC2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC2_label","<label for=\"".GetInputElementId("IBC2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC2_label", true);
	
	$xt->assign("IBC2_fieldblock", true);
	$xt->assignbyref("IBC2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC1")] = GetTableURL($pageObject->pSet->getLookupTable("IBC1"));
	
	$pageObject->fillFieldToolTips("IBC1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC1_label","<label for=\"".GetInputElementId("IBC1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC1_label", true);
	
	$xt->assign("IBC1_fieldblock", true);
	$xt->assignbyref("IBC1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL12")] = GetTableURL($pageObject->pSet->getLookupTable("EL12"));
	
	$pageObject->fillFieldToolTips("EL12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL12_label","<label for=\"".GetInputElementId("EL12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL12_label", true);
	
	$xt->assign("EL12_fieldblock", true);
	$xt->assignbyref("EL12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL11")] = GetTableURL($pageObject->pSet->getLookupTable("EL11"));
	
	$pageObject->fillFieldToolTips("EL11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL11_label","<label for=\"".GetInputElementId("EL11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL11_label", true);
	
	$xt->assign("EL11_fieldblock", true);
	$xt->assignbyref("EL11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL10")] = GetTableURL($pageObject->pSet->getLookupTable("EL10"));
	
	$pageObject->fillFieldToolTips("EL10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL10_label","<label for=\"".GetInputElementId("EL10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL10_label", true);
	
	$xt->assign("EL10_fieldblock", true);
	$xt->assignbyref("EL10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL9")] = GetTableURL($pageObject->pSet->getLookupTable("EL9"));
	
	$pageObject->fillFieldToolTips("EL9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL9_label","<label for=\"".GetInputElementId("EL9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL9_label", true);
	
	$xt->assign("EL9_fieldblock", true);
	$xt->assignbyref("EL9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL8")] = GetTableURL($pageObject->pSet->getLookupTable("EL8"));
	
	$pageObject->fillFieldToolTips("EL8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL8_label","<label for=\"".GetInputElementId("EL8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL8_label", true);
	
	$xt->assign("EL8_fieldblock", true);
	$xt->assignbyref("EL8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL7")] = GetTableURL($pageObject->pSet->getLookupTable("EL7"));
	
	$pageObject->fillFieldToolTips("EL7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL7_label","<label for=\"".GetInputElementId("EL7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL7_label", true);
	
	$xt->assign("EL7_fieldblock", true);
	$xt->assignbyref("EL7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL6")] = GetTableURL($pageObject->pSet->getLookupTable("EL6"));
	
	$pageObject->fillFieldToolTips("EL6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL6_label","<label for=\"".GetInputElementId("EL6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL6_label", true);
	
	$xt->assign("EL6_fieldblock", true);
	$xt->assignbyref("EL6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL5")] = GetTableURL($pageObject->pSet->getLookupTable("EL5"));
	
	$pageObject->fillFieldToolTips("EL5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL5_label","<label for=\"".GetInputElementId("EL5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL5_label", true);
	
	$xt->assign("EL5_fieldblock", true);
	$xt->assignbyref("EL5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL4")] = GetTableURL($pageObject->pSet->getLookupTable("EL4"));
	
	$pageObject->fillFieldToolTips("EL4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL4_label","<label for=\"".GetInputElementId("EL4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL4_label", true);
	
	$xt->assign("EL4_fieldblock", true);
	$xt->assignbyref("EL4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL3")] = GetTableURL($pageObject->pSet->getLookupTable("EL3"));
	
	$pageObject->fillFieldToolTips("EL3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL3_label","<label for=\"".GetInputElementId("EL3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL3_label", true);
	
	$xt->assign("EL3_fieldblock", true);
	$xt->assignbyref("EL3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL2")] = GetTableURL($pageObject->pSet->getLookupTable("EL2"));
	
	$pageObject->fillFieldToolTips("EL2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL2_label","<label for=\"".GetInputElementId("EL2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL2_label", true);
	
	$xt->assign("EL2_fieldblock", true);
	$xt->assignbyref("EL2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL1")] = GetTableURL($pageObject->pSet->getLookupTable("EL1"));
	
	$pageObject->fillFieldToolTips("EL1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL1_label","<label for=\"".GetInputElementId("EL1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL1_label", true);
	
	$xt->assign("EL1_fieldblock", true);
	$xt->assignbyref("EL1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL12")] = GetTableURL($pageObject->pSet->getLookupTable("CL12"));
	
	$pageObject->fillFieldToolTips("CL12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL12_label","<label for=\"".GetInputElementId("CL12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL12_label", true);
	
	$xt->assign("CL12_fieldblock", true);
	$xt->assignbyref("CL12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL11")] = GetTableURL($pageObject->pSet->getLookupTable("CL11"));
	
	$pageObject->fillFieldToolTips("CL11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL11_label","<label for=\"".GetInputElementId("CL11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL11_label", true);
	
	$xt->assign("CL11_fieldblock", true);
	$xt->assignbyref("CL11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL10")] = GetTableURL($pageObject->pSet->getLookupTable("CL10"));
	
	$pageObject->fillFieldToolTips("CL10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL10_label","<label for=\"".GetInputElementId("CL10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL10_label", true);
	
	$xt->assign("CL10_fieldblock", true);
	$xt->assignbyref("CL10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL9")] = GetTableURL($pageObject->pSet->getLookupTable("CL9"));
	
	$pageObject->fillFieldToolTips("CL9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL9_label","<label for=\"".GetInputElementId("CL9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL9_label", true);
	
	$xt->assign("CL9_fieldblock", true);
	$xt->assignbyref("CL9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL8")] = GetTableURL($pageObject->pSet->getLookupTable("CL8"));
	
	$pageObject->fillFieldToolTips("CL8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL8_label","<label for=\"".GetInputElementId("CL8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL8_label", true);
	
	$xt->assign("CL8_fieldblock", true);
	$xt->assignbyref("CL8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL7")] = GetTableURL($pageObject->pSet->getLookupTable("CL7"));
	
	$pageObject->fillFieldToolTips("CL7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL7_label","<label for=\"".GetInputElementId("CL7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL7_label", true);
	
	$xt->assign("CL7_fieldblock", true);
	$xt->assignbyref("CL7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL6")] = GetTableURL($pageObject->pSet->getLookupTable("CL6"));
	
	$pageObject->fillFieldToolTips("CL6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL6_label","<label for=\"".GetInputElementId("CL6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL6_label", true);
	
	$xt->assign("CL6_fieldblock", true);
	$xt->assignbyref("CL6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL5")] = GetTableURL($pageObject->pSet->getLookupTable("CL5"));
	
	$pageObject->fillFieldToolTips("CL5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL5_label","<label for=\"".GetInputElementId("CL5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL5_label", true);
	
	$xt->assign("CL5_fieldblock", true);
	$xt->assignbyref("CL5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL4")] = GetTableURL($pageObject->pSet->getLookupTable("CL4"));
	
	$pageObject->fillFieldToolTips("CL4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL4_label","<label for=\"".GetInputElementId("CL4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL4_label", true);
	
	$xt->assign("CL4_fieldblock", true);
	$xt->assignbyref("CL4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL3")] = GetTableURL($pageObject->pSet->getLookupTable("CL3"));
	
	$pageObject->fillFieldToolTips("CL3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL3_label","<label for=\"".GetInputElementId("CL3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL3_label", true);
	
	$xt->assign("CL3_fieldblock", true);
	$xt->assignbyref("CL3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL2")] = GetTableURL($pageObject->pSet->getLookupTable("CL2"));
	
	$pageObject->fillFieldToolTips("CL2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL2_label","<label for=\"".GetInputElementId("CL2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL2_label", true);
	
	$xt->assign("CL2_fieldblock", true);
	$xt->assignbyref("CL2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CL1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CL1")] = GetTableURL($pageObject->pSet->getLookupTable("CL1"));
	
	$pageObject->fillFieldToolTips("CL1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CL1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CL1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CL1_label","<label for=\"".GetInputElementId("CL1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CL1_label", true);
	
	$xt->assign("CL1_fieldblock", true);
	$xt->assignbyref("CL1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CL1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CL1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CL1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CL1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CL1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("PreMarket"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("PreMarket")] = GetTableURL($pageObject->pSet->getLookupTable("PreMarket"));
	
	$pageObject->fillFieldToolTips("PreMarket");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("PreMarket");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "PreMarket";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("PreMarket_label","<label for=\"".GetInputElementId("PreMarket", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("PreMarket_label", true);
	
	$xt->assign("PreMarket_fieldblock", true);
	$xt->assignbyref("PreMarket_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("PreMarket_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("PreMarket_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_PreMarket", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("PreMarket");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PreMarket", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PreMarket", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("InMarket"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("InMarket")] = GetTableURL($pageObject->pSet->getLookupTable("InMarket"));
	
	$pageObject->fillFieldToolTips("InMarket");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("InMarket");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "InMarket";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("InMarket_label","<label for=\"".GetInputElementId("InMarket", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("InMarket_label", true);
	
	$xt->assign("InMarket_fieldblock", true);
	$xt->assignbyref("InMarket_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("InMarket_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("InMarket_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_InMarket", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("InMarket");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"InMarket", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"InMarket", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("UNderLOI"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("UNderLOI")] = GetTableURL($pageObject->pSet->getLookupTable("UNderLOI"));
	
	$pageObject->fillFieldToolTips("UNderLOI");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("UNderLOI");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "UNderLOI";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("UNderLOI_label","<label for=\"".GetInputElementId("UNderLOI", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("UNderLOI_label", true);
	
	$xt->assign("UNderLOI_fieldblock", true);
	$xt->assignbyref("UNderLOI_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("UNderLOI_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("UNderLOI_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_UNderLOI", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("UNderLOI");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"UNderLOI", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"UNderLOI", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Inactive"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Inactive")] = GetTableURL($pageObject->pSet->getLookupTable("Inactive"));
	
	$pageObject->fillFieldToolTips("Inactive");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Inactive");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Inactive";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Inactive_label","<label for=\"".GetInputElementId("Inactive", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Inactive_label", true);
	
	$xt->assign("Inactive_fieldblock", true);
	$xt->assignbyref("Inactive_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Inactive_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Inactive_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Inactive", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Inactive");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Inactive", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Inactive", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("OnHold"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("OnHold")] = GetTableURL($pageObject->pSet->getLookupTable("OnHold"));
	
	$pageObject->fillFieldToolTips("OnHold");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("OnHold");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "OnHold";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("OnHold_label","<label for=\"".GetInputElementId("OnHold", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("OnHold_label", true);
	
	$xt->assign("OnHold_fieldblock", true);
	$xt->assignbyref("OnHold_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("OnHold_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("OnHold_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_OnHold", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("OnHold");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"OnHold", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"OnHold", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Wheelhouse"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Wheelhouse")] = GetTableURL($pageObject->pSet->getLookupTable("Wheelhouse"));
	
	$pageObject->fillFieldToolTips("Wheelhouse");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Wheelhouse");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Wheelhouse";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Wheelhouse_label","<label for=\"".GetInputElementId("Wheelhouse", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Wheelhouse_label", true);
	
	$xt->assign("Wheelhouse_fieldblock", true);
	$xt->assignbyref("Wheelhouse_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Wheelhouse_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Wheelhouse_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Wheelhouse", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Wheelhouse");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Wheelhouse", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Wheelhouse", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Speculative"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Speculative")] = GetTableURL($pageObject->pSet->getLookupTable("Speculative"));
	
	$pageObject->fillFieldToolTips("Speculative");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Speculative");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Speculative";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Speculative_label","<label for=\"".GetInputElementId("Speculative", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Speculative_label", true);
	
	$xt->assign("Speculative_fieldblock", true);
	$xt->assignbyref("Speculative_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Speculative_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Speculative_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Speculative", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Speculative");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Speculative", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Speculative", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Minimum"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Minimum")] = GetTableURL($pageObject->pSet->getLookupTable("Minimum"));
	
	$pageObject->fillFieldToolTips("Minimum");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Minimum");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Minimum";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Minimum_label","<label for=\"".GetInputElementId("Minimum", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Minimum_label", true);
	
	$xt->assign("Minimum_fieldblock", true);
	$xt->assignbyref("Minimum_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Minimum_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Minimum_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Minimum", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Minimum");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Minimum", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Minimum", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10SS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10SS")] = GetTableURL($pageObject->pSet->getLookupTable("EV10SS"));
	
	$pageObject->fillFieldToolTips("EV10SS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10SS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10SS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10SS_label","<label for=\"".GetInputElementId("EV10SS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10SS_label", true);
	
	$xt->assign("EV10SS_fieldblock", true);
	$xt->assignbyref("EV10SS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10SS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10SS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10SS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10SS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25SS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25SS")] = GetTableURL($pageObject->pSet->getLookupTable("EV25SS"));
	
	$pageObject->fillFieldToolTips("EV25SS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25SS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25SS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25SS_label","<label for=\"".GetInputElementId("EV25SS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25SS_label", true);
	
	$xt->assign("EV25SS_fieldblock", true);
	$xt->assignbyref("EV25SS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25SS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25SS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25SS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25SS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75SS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75SS")] = GetTableURL($pageObject->pSet->getLookupTable("EV75SS"));
	
	$pageObject->fillFieldToolTips("EV75SS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75SS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75SS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75SS_label","<label for=\"".GetInputElementId("EV75SS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75SS_label", true);
	
	$xt->assign("EV75SS_fieldblock", true);
	$xt->assignbyref("EV75SS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75SS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75SS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75SS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75SS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100SS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100SS")] = GetTableURL($pageObject->pSet->getLookupTable("EV100SS"));
	
	$pageObject->fillFieldToolTips("EV100SS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100SS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100SS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100SS_label","<label for=\"".GetInputElementId("EV100SS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100SS_label", true);
	
	$xt->assign("EV100SS_fieldblock", true);
	$xt->assignbyref("EV100SS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100SS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100SS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100SS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100SS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150SS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150SS")] = GetTableURL($pageObject->pSet->getLookupTable("EV150SS"));
	
	$pageObject->fillFieldToolTips("EV150SS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150SS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150SS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150SS_label","<label for=\"".GetInputElementId("EV150SS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150SS_label", true);
	
	$xt->assign("EV150SS_fieldblock", true);
	$xt->assignbyref("EV150SS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150SS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150SS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150SS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150SS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150SS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("sst"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("sst")] = GetTableURL($pageObject->pSet->getLookupTable("sst"));
	
	$pageObject->fillFieldToolTips("sst");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("sst");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "sst";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("sst_label","<label for=\"".GetInputElementId("sst", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("sst_label", true);
	
	$xt->assign("sst_fieldblock", true);
	$xt->assignbyref("sst_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("sst_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("sst_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_sst", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("sst");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sst", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sst", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10BS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10BS")] = GetTableURL($pageObject->pSet->getLookupTable("EV10BS"));
	
	$pageObject->fillFieldToolTips("EV10BS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10BS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10BS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10BS_label","<label for=\"".GetInputElementId("EV10BS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10BS_label", true);
	
	$xt->assign("EV10BS_fieldblock", true);
	$xt->assignbyref("EV10BS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10BS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10BS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10BS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10BS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25BS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25BS")] = GetTableURL($pageObject->pSet->getLookupTable("EV25BS"));
	
	$pageObject->fillFieldToolTips("EV25BS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25BS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25BS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25BS_label","<label for=\"".GetInputElementId("EV25BS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25BS_label", true);
	
	$xt->assign("EV25BS_fieldblock", true);
	$xt->assignbyref("EV25BS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25BS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25BS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25BS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25BS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75BS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75BS")] = GetTableURL($pageObject->pSet->getLookupTable("EV75BS"));
	
	$pageObject->fillFieldToolTips("EV75BS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75BS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75BS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75BS_label","<label for=\"".GetInputElementId("EV75BS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75BS_label", true);
	
	$xt->assign("EV75BS_fieldblock", true);
	$xt->assignbyref("EV75BS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75BS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75BS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75BS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75BS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100BS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100BS")] = GetTableURL($pageObject->pSet->getLookupTable("EV100BS"));
	
	$pageObject->fillFieldToolTips("EV100BS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100BS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100BS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100BS_label","<label for=\"".GetInputElementId("EV100BS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100BS_label", true);
	
	$xt->assign("EV100BS_fieldblock", true);
	$xt->assignbyref("EV100BS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100BS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100BS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100BS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100BS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150BS"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150BS")] = GetTableURL($pageObject->pSet->getLookupTable("EV150BS"));
	
	$pageObject->fillFieldToolTips("EV150BS");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150BS");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150BS";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150BS_label","<label for=\"".GetInputElementId("EV150BS", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150BS_label", true);
	
	$xt->assign("EV150BS_fieldblock", true);
	$xt->assignbyref("EV150BS_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150BS_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150BS_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150BS", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150BS");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150BS", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("bst"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("bst")] = GetTableURL($pageObject->pSet->getLookupTable("bst"));
	
	$pageObject->fillFieldToolTips("bst");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("bst");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "bst";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("bst_label","<label for=\"".GetInputElementId("bst", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("bst_label", true);
	
	$xt->assign("bst_fieldblock", true);
	$xt->assignbyref("bst_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("bst_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("bst_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_bst", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("bst");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bst", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bst", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10eq"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10eq")] = GetTableURL($pageObject->pSet->getLookupTable("EV10eq"));
	
	$pageObject->fillFieldToolTips("EV10eq");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10eq");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10eq";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10eq_label","<label for=\"".GetInputElementId("EV10eq", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10eq_label", true);
	
	$xt->assign("EV10eq_fieldblock", true);
	$xt->assignbyref("EV10eq_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10eq_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10eq_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10eq", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10eq");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25eq"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25eq")] = GetTableURL($pageObject->pSet->getLookupTable("EV25eq"));
	
	$pageObject->fillFieldToolTips("EV25eq");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25eq");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25eq";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25eq_label","<label for=\"".GetInputElementId("EV25eq", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25eq_label", true);
	
	$xt->assign("EV25eq_fieldblock", true);
	$xt->assignbyref("EV25eq_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25eq_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25eq_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25eq", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25eq");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75eq"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75eq")] = GetTableURL($pageObject->pSet->getLookupTable("EV75eq"));
	
	$pageObject->fillFieldToolTips("EV75eq");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75eq");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75eq";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75eq_label","<label for=\"".GetInputElementId("EV75eq", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75eq_label", true);
	
	$xt->assign("EV75eq_fieldblock", true);
	$xt->assignbyref("EV75eq_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75eq_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75eq_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75eq", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75eq");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100eq"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100eq")] = GetTableURL($pageObject->pSet->getLookupTable("EV100eq"));
	
	$pageObject->fillFieldToolTips("EV100eq");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100eq");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100eq";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100eq_label","<label for=\"".GetInputElementId("EV100eq", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100eq_label", true);
	
	$xt->assign("EV100eq_fieldblock", true);
	$xt->assignbyref("EV100eq_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100eq_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100eq_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100eq", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100eq");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150eq"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150eq")] = GetTableURL($pageObject->pSet->getLookupTable("EV150eq"));
	
	$pageObject->fillFieldToolTips("EV150eq");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150eq");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150eq";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150eq_label","<label for=\"".GetInputElementId("EV150eq", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150eq_label", true);
	
	$xt->assign("EV150eq_fieldblock", true);
	$xt->assignbyref("EV150eq_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150eq_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150eq_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150eq", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150eq");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150eq", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("eqt"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("eqt")] = GetTableURL($pageObject->pSet->getLookupTable("eqt"));
	
	$pageObject->fillFieldToolTips("eqt");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("eqt");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "eqt";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("eqt_label","<label for=\"".GetInputElementId("eqt", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("eqt_label", true);
	
	$xt->assign("eqt_fieldblock", true);
	$xt->assignbyref("eqt_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("eqt_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("eqt_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_eqt", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("eqt");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"eqt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"eqt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10d"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10d")] = GetTableURL($pageObject->pSet->getLookupTable("EV10d"));
	
	$pageObject->fillFieldToolTips("EV10d");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10d");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10d";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10d_label","<label for=\"".GetInputElementId("EV10d", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10d_label", true);
	
	$xt->assign("EV10d_fieldblock", true);
	$xt->assignbyref("EV10d_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10d_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10d_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10d", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10d");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25d"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25d")] = GetTableURL($pageObject->pSet->getLookupTable("EV25d"));
	
	$pageObject->fillFieldToolTips("EV25d");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25d");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25d";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25d_label","<label for=\"".GetInputElementId("EV25d", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25d_label", true);
	
	$xt->assign("EV25d_fieldblock", true);
	$xt->assignbyref("EV25d_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25d_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25d_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25d", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25d");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75d"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75d")] = GetTableURL($pageObject->pSet->getLookupTable("EV75d"));
	
	$pageObject->fillFieldToolTips("EV75d");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75d");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75d";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75d_label","<label for=\"".GetInputElementId("EV75d", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75d_label", true);
	
	$xt->assign("EV75d_fieldblock", true);
	$xt->assignbyref("EV75d_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75d_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75d_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75d", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75d");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100d"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100d")] = GetTableURL($pageObject->pSet->getLookupTable("EV100d"));
	
	$pageObject->fillFieldToolTips("EV100d");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100d");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100d";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100d_label","<label for=\"".GetInputElementId("EV100d", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100d_label", true);
	
	$xt->assign("EV100d_fieldblock", true);
	$xt->assignbyref("EV100d_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100d_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100d_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100d", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100d");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150d"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150d")] = GetTableURL($pageObject->pSet->getLookupTable("EV150d"));
	
	$pageObject->fillFieldToolTips("EV150d");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150d");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150d";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150d_label","<label for=\"".GetInputElementId("EV150d", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150d_label", true);
	
	$xt->assign("EV150d_fieldblock", true);
	$xt->assignbyref("EV150d_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150d_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150d_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150d", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150d");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150d", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("dt"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("dt")] = GetTableURL($pageObject->pSet->getLookupTable("dt"));
	
	$pageObject->fillFieldToolTips("dt");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("dt");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dt";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("dt_label","<label for=\"".GetInputElementId("dt", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("dt_label", true);
	
	$xt->assign("dt_fieldblock", true);
	$xt->assignbyref("dt_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("dt_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("dt_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_dt", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("dt");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"dt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"dt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10ad"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10ad")] = GetTableURL($pageObject->pSet->getLookupTable("EV10ad"));
	
	$pageObject->fillFieldToolTips("EV10ad");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10ad");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10ad";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10ad_label","<label for=\"".GetInputElementId("EV10ad", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10ad_label", true);
	
	$xt->assign("EV10ad_fieldblock", true);
	$xt->assignbyref("EV10ad_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10ad_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10ad_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10ad", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10ad");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25ad"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25ad")] = GetTableURL($pageObject->pSet->getLookupTable("EV25ad"));
	
	$pageObject->fillFieldToolTips("EV25ad");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25ad");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25ad";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25ad_label","<label for=\"".GetInputElementId("EV25ad", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25ad_label", true);
	
	$xt->assign("EV25ad_fieldblock", true);
	$xt->assignbyref("EV25ad_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25ad_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25ad_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25ad", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25ad");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75ad"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75ad")] = GetTableURL($pageObject->pSet->getLookupTable("EV75ad"));
	
	$pageObject->fillFieldToolTips("EV75ad");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75ad");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75ad";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75ad_label","<label for=\"".GetInputElementId("EV75ad", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75ad_label", true);
	
	$xt->assign("EV75ad_fieldblock", true);
	$xt->assignbyref("EV75ad_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75ad_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75ad_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75ad", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75ad");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100ad"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100ad")] = GetTableURL($pageObject->pSet->getLookupTable("EV100ad"));
	
	$pageObject->fillFieldToolTips("EV100ad");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100ad");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100ad";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100ad_label","<label for=\"".GetInputElementId("EV100ad", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100ad_label", true);
	
	$xt->assign("EV100ad_fieldblock", true);
	$xt->assignbyref("EV100ad_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100ad_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100ad_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100ad", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100ad");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150ad"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150ad")] = GetTableURL($pageObject->pSet->getLookupTable("EV150ad"));
	
	$pageObject->fillFieldToolTips("EV150ad");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150ad");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150ad";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150ad_label","<label for=\"".GetInputElementId("EV150ad", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150ad_label", true);
	
	$xt->assign("EV150ad_fieldblock", true);
	$xt->assignbyref("EV150ad_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150ad_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150ad_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150ad", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150ad");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150ad", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("adt"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("adt")] = GetTableURL($pageObject->pSet->getLookupTable("adt"));
	
	$pageObject->fillFieldToolTips("adt");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("adt");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "adt";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("adt_label","<label for=\"".GetInputElementId("adt", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("adt_label", true);
	
	$xt->assign("adt_fieldblock", true);
	$xt->assignbyref("adt_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("adt_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("adt_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_adt", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("adt");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"adt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"adt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10p"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10p")] = GetTableURL($pageObject->pSet->getLookupTable("EV10p"));
	
	$pageObject->fillFieldToolTips("EV10p");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10p");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10p";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10p_label","<label for=\"".GetInputElementId("EV10p", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10p_label", true);
	
	$xt->assign("EV10p_fieldblock", true);
	$xt->assignbyref("EV10p_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10p_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10p_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10p", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10p");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25p"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25p")] = GetTableURL($pageObject->pSet->getLookupTable("EV25p"));
	
	$pageObject->fillFieldToolTips("EV25p");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25p");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25p";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25p_label","<label for=\"".GetInputElementId("EV25p", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25p_label", true);
	
	$xt->assign("EV25p_fieldblock", true);
	$xt->assignbyref("EV25p_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25p_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25p_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25p", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25p");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75p"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75p")] = GetTableURL($pageObject->pSet->getLookupTable("EV75p"));
	
	$pageObject->fillFieldToolTips("EV75p");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75p");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75p";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75p_label","<label for=\"".GetInputElementId("EV75p", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75p_label", true);
	
	$xt->assign("EV75p_fieldblock", true);
	$xt->assignbyref("EV75p_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75p_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75p_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75p", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75p");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100p"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100p")] = GetTableURL($pageObject->pSet->getLookupTable("EV100p"));
	
	$pageObject->fillFieldToolTips("EV100p");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100p");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100p";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100p_label","<label for=\"".GetInputElementId("EV100p", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100p_label", true);
	
	$xt->assign("EV100p_fieldblock", true);
	$xt->assignbyref("EV100p_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100p_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100p_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100p", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100p");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150p"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150p")] = GetTableURL($pageObject->pSet->getLookupTable("EV150p"));
	
	$pageObject->fillFieldToolTips("EV150p");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150p");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150p";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150p_label","<label for=\"".GetInputElementId("EV150p", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150p_label", true);
	
	$xt->assign("EV150p_fieldblock", true);
	$xt->assignbyref("EV150p_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150p_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150p_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150p", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150p");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150p", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pt"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pt")] = GetTableURL($pageObject->pSet->getLookupTable("pt"));
	
	$pageObject->fillFieldToolTips("pt");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pt");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pt";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pt_label","<label for=\"".GetInputElementId("pt", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pt_label", true);
	
	$xt->assign("pt_fieldblock", true);
	$xt->assignbyref("pt_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pt_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pt_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pt", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pt");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pt", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10pe"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10pe")] = GetTableURL($pageObject->pSet->getLookupTable("EV10pe"));
	
	$pageObject->fillFieldToolTips("EV10pe");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10pe");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10pe";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10pe_label","<label for=\"".GetInputElementId("EV10pe", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10pe_label", true);
	
	$xt->assign("EV10pe_fieldblock", true);
	$xt->assignbyref("EV10pe_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10pe_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10pe_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10pe", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10pe");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25pe"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25pe")] = GetTableURL($pageObject->pSet->getLookupTable("EV25pe"));
	
	$pageObject->fillFieldToolTips("EV25pe");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25pe");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25pe";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25pe_label","<label for=\"".GetInputElementId("EV25pe", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25pe_label", true);
	
	$xt->assign("EV25pe_fieldblock", true);
	$xt->assignbyref("EV25pe_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25pe_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25pe_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25pe", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25pe");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75pe"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75pe")] = GetTableURL($pageObject->pSet->getLookupTable("EV75pe"));
	
	$pageObject->fillFieldToolTips("EV75pe");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75pe");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75pe";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75pe_label","<label for=\"".GetInputElementId("EV75pe", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75pe_label", true);
	
	$xt->assign("EV75pe_fieldblock", true);
	$xt->assignbyref("EV75pe_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75pe_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75pe_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75pe", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75pe");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100pe"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100pe")] = GetTableURL($pageObject->pSet->getLookupTable("EV100pe"));
	
	$pageObject->fillFieldToolTips("EV100pe");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100pe");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100pe";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100pe_label","<label for=\"".GetInputElementId("EV100pe", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100pe_label", true);
	
	$xt->assign("EV100pe_fieldblock", true);
	$xt->assignbyref("EV100pe_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100pe_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100pe_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100pe", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100pe");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150pe"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150pe")] = GetTableURL($pageObject->pSet->getLookupTable("EV150pe"));
	
	$pageObject->fillFieldToolTips("EV150pe");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150pe");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150pe";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150pe_label","<label for=\"".GetInputElementId("EV150pe", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150pe_label", true);
	
	$xt->assign("EV150pe_fieldblock", true);
	$xt->assignbyref("EV150pe_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150pe_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150pe_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150pe", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150pe");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150pe", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pet"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pet")] = GetTableURL($pageObject->pSet->getLookupTable("pet"));
	
	$pageObject->fillFieldToolTips("pet");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pet");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pet";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pet_label","<label for=\"".GetInputElementId("pet", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pet_label", true);
	
	$xt->assign("pet_fieldblock", true);
	$xt->assignbyref("pet_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pet_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pet_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pet", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pet");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pet", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pet", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV10po"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV10po")] = GetTableURL($pageObject->pSet->getLookupTable("EV10po"));
	
	$pageObject->fillFieldToolTips("EV10po");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV10po");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV10po";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV10po_label","<label for=\"".GetInputElementId("EV10po", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV10po_label", true);
	
	$xt->assign("EV10po_fieldblock", true);
	$xt->assignbyref("EV10po_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV10po_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV10po_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV10po", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV10po");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV10po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV25po"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV25po")] = GetTableURL($pageObject->pSet->getLookupTable("EV25po"));
	
	$pageObject->fillFieldToolTips("EV25po");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV25po");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV25po";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV25po_label","<label for=\"".GetInputElementId("EV25po", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV25po_label", true);
	
	$xt->assign("EV25po_fieldblock", true);
	$xt->assignbyref("EV25po_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV25po_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV25po_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV25po", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV25po");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV25po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV75po"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV75po")] = GetTableURL($pageObject->pSet->getLookupTable("EV75po"));
	
	$pageObject->fillFieldToolTips("EV75po");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV75po");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV75po";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV75po_label","<label for=\"".GetInputElementId("EV75po", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV75po_label", true);
	
	$xt->assign("EV75po_fieldblock", true);
	$xt->assignbyref("EV75po_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV75po_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV75po_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV75po", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV75po");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV75po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV100po"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV100po")] = GetTableURL($pageObject->pSet->getLookupTable("EV100po"));
	
	$pageObject->fillFieldToolTips("EV100po");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV100po");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV100po";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV100po_label","<label for=\"".GetInputElementId("EV100po", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV100po_label", true);
	
	$xt->assign("EV100po_fieldblock", true);
	$xt->assignbyref("EV100po_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV100po_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV100po_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV100po", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV100po");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV100po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EV150po"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EV150po")] = GetTableURL($pageObject->pSet->getLookupTable("EV150po"));
	
	$pageObject->fillFieldToolTips("EV150po");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EV150po");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EV150po";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EV150po_label","<label for=\"".GetInputElementId("EV150po", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EV150po_label", true);
	
	$xt->assign("EV150po_fieldblock", true);
	$xt->assignbyref("EV150po_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EV150po_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EV150po_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EV150po", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EV150po");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EV150po", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pot"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pot")] = GetTableURL($pageObject->pSet->getLookupTable("pot"));
	
	$pageObject->fillFieldToolTips("pot");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pot");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pot";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pot_label","<label for=\"".GetInputElementId("pot", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pot_label", true);
	
	$xt->assign("pot_fieldblock", true);
	$xt->assignbyref("pot_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pot_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pot_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pot", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pot");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pot", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pot", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Business Services"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Business Services")] = GetTableURL($pageObject->pSet->getLookupTable("Business Services"));
	
	$pageObject->fillFieldToolTips("Business Services");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Business Services");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Business Services";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Business_Services_label","<label for=\"".GetInputElementId("Business Services", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Business_Services_label", true);
	
	$xt->assign("Business_Services_fieldblock", true);
	$xt->assignbyref("Business_Services_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Business_Services_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Business_Services_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Business_Services", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Business Services");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Business Services", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Business Services", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Consumer Products"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Consumer Products")] = GetTableURL($pageObject->pSet->getLookupTable("Consumer Products"));
	
	$pageObject->fillFieldToolTips("Consumer Products");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Consumer Products");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Consumer Products";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Consumer_Products_label","<label for=\"".GetInputElementId("Consumer Products", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Consumer_Products_label", true);
	
	$xt->assign("Consumer_Products_fieldblock", true);
	$xt->assignbyref("Consumer_Products_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Consumer_Products_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Consumer_Products_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Consumer_Products", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Consumer Products");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Consumer Products", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Consumer Products", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Energy & Natural Resources"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Energy & Natural Resources")] = GetTableURL($pageObject->pSet->getLookupTable("Energy & Natural Resources"));
	
	$pageObject->fillFieldToolTips("Energy & Natural Resources");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Energy & Natural Resources");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Energy & Natural Resources";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Energy___Natural_Resources_label","<label for=\"".GetInputElementId("Energy & Natural Resources", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Energy___Natural_Resources_label", true);
	
	$xt->assign("Energy___Natural_Resources_fieldblock", true);
	$xt->assignbyref("Energy___Natural_Resources_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Energy___Natural_Resources_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Energy___Natural_Resources_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Energy___Natural_Resources", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Energy & Natural Resources");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Energy & Natural Resources", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Energy & Natural Resources", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Financial Services"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Financial Services")] = GetTableURL($pageObject->pSet->getLookupTable("Financial Services"));
	
	$pageObject->fillFieldToolTips("Financial Services");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Financial Services");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Financial Services";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Financial_Services_label","<label for=\"".GetInputElementId("Financial Services", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Financial_Services_label", true);
	
	$xt->assign("Financial_Services_fieldblock", true);
	$xt->assignbyref("Financial_Services_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Financial_Services_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Financial_Services_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Financial_Services", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Financial Services");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Financial Services", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Financial Services", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Industrials"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Industrials")] = GetTableURL($pageObject->pSet->getLookupTable("Industrials"));
	
	$pageObject->fillFieldToolTips("Industrials");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Industrials");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Industrials";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Industrials_label","<label for=\"".GetInputElementId("Industrials", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Industrials_label", true);
	
	$xt->assign("Industrials_fieldblock", true);
	$xt->assignbyref("Industrials_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Industrials_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Industrials_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Industrials", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Industrials");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industrials", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industrials", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Healthcare"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Healthcare")] = GetTableURL($pageObject->pSet->getLookupTable("Healthcare"));
	
	$pageObject->fillFieldToolTips("Healthcare");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Healthcare");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Healthcare";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Healthcare_label","<label for=\"".GetInputElementId("Healthcare", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Healthcare_label", true);
	
	$xt->assign("Healthcare_fieldblock", true);
	$xt->assignbyref("Healthcare_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Healthcare_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Healthcare_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Healthcare", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Healthcare");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Healthcare", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Healthcare", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Technology"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Technology")] = GetTableURL($pageObject->pSet->getLookupTable("Technology"));
	
	$pageObject->fillFieldToolTips("Technology");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Technology");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Technology";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Technology_label","<label for=\"".GetInputElementId("Technology", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Technology_label", true);
	
	$xt->assign("Technology_fieldblock", true);
	$xt->assignbyref("Technology_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Technology_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Technology_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Technology", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Technology");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Technology", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Technology", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Entertainment"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Entertainment")] = GetTableURL($pageObject->pSet->getLookupTable("Entertainment"));
	
	$pageObject->fillFieldToolTips("Entertainment");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Entertainment");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Entertainment";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Entertainment_label","<label for=\"".GetInputElementId("Entertainment", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Entertainment_label", true);
	
	$xt->assign("Entertainment_fieldblock", true);
	$xt->assignbyref("Entertainment_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Entertainment_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Entertainment_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Entertainment", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Entertainment");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Entertainment", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Entertainment", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Real Estate"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Real Estate")] = GetTableURL($pageObject->pSet->getLookupTable("Real Estate"));
	
	$pageObject->fillFieldToolTips("Real Estate");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Real Estate");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Real Estate";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Real_Estate_label","<label for=\"".GetInputElementId("Real Estate", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Real_Estate_label", true);
	
	$xt->assign("Real_Estate_fieldblock", true);
	$xt->assignbyref("Real_Estate_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Real_Estate_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Real_Estate_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Real_Estate", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Real Estate");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Real Estate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Real Estate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Business Services EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Business Services EL")] = GetTableURL($pageObject->pSet->getLookupTable("Business Services EL"));
	
	$pageObject->fillFieldToolTips("Business Services EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Business Services EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Business Services EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Business_Services_EL_label","<label for=\"".GetInputElementId("Business Services EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Business_Services_EL_label", true);
	
	$xt->assign("Business_Services_EL_fieldblock", true);
	$xt->assignbyref("Business_Services_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Business_Services_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Business_Services_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Business_Services_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Business Services EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Business Services EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Business Services EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Consumer EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Consumer EL")] = GetTableURL($pageObject->pSet->getLookupTable("Consumer EL"));
	
	$pageObject->fillFieldToolTips("Consumer EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Consumer EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Consumer EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Consumer_EL_label","<label for=\"".GetInputElementId("Consumer EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Consumer_EL_label", true);
	
	$xt->assign("Consumer_EL_fieldblock", true);
	$xt->assignbyref("Consumer_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Consumer_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Consumer_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Consumer_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Consumer EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Consumer EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Consumer EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Ennergy EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Ennergy EL")] = GetTableURL($pageObject->pSet->getLookupTable("Ennergy EL"));
	
	$pageObject->fillFieldToolTips("Ennergy EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Ennergy EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Ennergy EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Ennergy_EL_label","<label for=\"".GetInputElementId("Ennergy EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Ennergy_EL_label", true);
	
	$xt->assign("Ennergy_EL_fieldblock", true);
	$xt->assignbyref("Ennergy_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Ennergy_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Ennergy_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Ennergy_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Ennergy EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Ennergy EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Ennergy EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Financial EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Financial EL")] = GetTableURL($pageObject->pSet->getLookupTable("Financial EL"));
	
	$pageObject->fillFieldToolTips("Financial EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Financial EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Financial EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Financial_EL_label","<label for=\"".GetInputElementId("Financial EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Financial_EL_label", true);
	
	$xt->assign("Financial_EL_fieldblock", true);
	$xt->assignbyref("Financial_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Financial_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Financial_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Financial_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Financial EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Financial EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Financial EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Industrials EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Industrials EL")] = GetTableURL($pageObject->pSet->getLookupTable("Industrials EL"));
	
	$pageObject->fillFieldToolTips("Industrials EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Industrials EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Industrials EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Industrials_EL_label","<label for=\"".GetInputElementId("Industrials EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Industrials_EL_label", true);
	
	$xt->assign("Industrials_EL_fieldblock", true);
	$xt->assignbyref("Industrials_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Industrials_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Industrials_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Industrials_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Industrials EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industrials EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industrials EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Healthcare EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Healthcare EL")] = GetTableURL($pageObject->pSet->getLookupTable("Healthcare EL"));
	
	$pageObject->fillFieldToolTips("Healthcare EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Healthcare EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Healthcare EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Healthcare_EL_label","<label for=\"".GetInputElementId("Healthcare EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Healthcare_EL_label", true);
	
	$xt->assign("Healthcare_EL_fieldblock", true);
	$xt->assignbyref("Healthcare_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Healthcare_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Healthcare_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Healthcare_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Healthcare EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Healthcare EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Healthcare EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("TMT EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("TMT EL")] = GetTableURL($pageObject->pSet->getLookupTable("TMT EL"));
	
	$pageObject->fillFieldToolTips("TMT EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("TMT EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "TMT EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("TMT_EL_label","<label for=\"".GetInputElementId("TMT EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("TMT_EL_label", true);
	
	$xt->assign("TMT_EL_fieldblock", true);
	$xt->assignbyref("TMT_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("TMT_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("TMT_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_TMT_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("TMT EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TMT EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TMT EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Entertainment EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Entertainment EL")] = GetTableURL($pageObject->pSet->getLookupTable("Entertainment EL"));
	
	$pageObject->fillFieldToolTips("Entertainment EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Entertainment EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Entertainment EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Entertainment_EL_label","<label for=\"".GetInputElementId("Entertainment EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Entertainment_EL_label", true);
	
	$xt->assign("Entertainment_EL_fieldblock", true);
	$xt->assignbyref("Entertainment_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Entertainment_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Entertainment_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Entertainment_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Entertainment EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Entertainment EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Entertainment EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("RealEstate EL"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("RealEstate EL")] = GetTableURL($pageObject->pSet->getLookupTable("RealEstate EL"));
	
	$pageObject->fillFieldToolTips("RealEstate EL");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("RealEstate EL");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "RealEstate EL";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("RealEstate_EL_label","<label for=\"".GetInputElementId("RealEstate EL", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("RealEstate_EL_label", true);
	
	$xt->assign("RealEstate_EL_fieldblock", true);
	$xt->assignbyref("RealEstate_EL_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("RealEstate_EL_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("RealEstate_EL_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_RealEstate_EL", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("RealEstate EL");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"RealEstate EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"RealEstate EL", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBSreferrals"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBSreferrals")] = GetTableURL($pageObject->pSet->getLookupTable("IBSreferrals"));
	
	$pageObject->fillFieldToolTips("IBSreferrals");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBSreferrals");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBSreferrals";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBSreferrals_label","<label for=\"".GetInputElementId("IBSreferrals", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBSreferrals_label", true);
	
	$xt->assign("IBSreferrals_fieldblock", true);
	$xt->assignbyref("IBSreferrals_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBSreferrals_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBSreferrals_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBSreferrals", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBSreferrals");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSreferrals", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSreferrals", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBSibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBSibc")] = GetTableURL($pageObject->pSet->getLookupTable("IBSibc"));
	
	$pageObject->fillFieldToolTips("IBSibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBSibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBSibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBSibc_label","<label for=\"".GetInputElementId("IBSibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBSibc_label", true);
	
	$xt->assign("IBSibc_fieldblock", true);
	$xt->assignbyref("IBSibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBSibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBSibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBSibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBSibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBSel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBSel")] = GetTableURL($pageObject->pSet->getLookupTable("IBSel"));
	
	$pageObject->fillFieldToolTips("IBSel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBSel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBSel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBSel_label","<label for=\"".GetInputElementId("IBSel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBSel_label", true);
	
	$xt->assign("IBSel_fieldblock", true);
	$xt->assignbyref("IBSel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBSel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBSel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBSel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBSel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("PPibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("PPibc")] = GetTableURL($pageObject->pSet->getLookupTable("PPibc"));
	
	$pageObject->fillFieldToolTips("PPibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("PPibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "PPibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("PPibc_label","<label for=\"".GetInputElementId("PPibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("PPibc_label", true);
	
	$xt->assign("PPibc_fieldblock", true);
	$xt->assignbyref("PPibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("PPibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("PPibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_PPibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("PPibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("PPel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("PPel")] = GetTableURL($pageObject->pSet->getLookupTable("PPel"));
	
	$pageObject->fillFieldToolTips("PPel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("PPel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "PPel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("PPel_label","<label for=\"".GetInputElementId("PPel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("PPel_label", true);
	
	$xt->assign("PPel_fieldblock", true);
	$xt->assignbyref("PPel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("PPel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("PPel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_PPel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("PPel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CPibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CPibc")] = GetTableURL($pageObject->pSet->getLookupTable("CPibc"));
	
	$pageObject->fillFieldToolTips("CPibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CPibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CPibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CPibc_label","<label for=\"".GetInputElementId("CPibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CPibc_label", true);
	
	$xt->assign("CPibc_fieldblock", true);
	$xt->assignbyref("CPibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CPibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CPibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CPibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CPibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CPel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CPel")] = GetTableURL($pageObject->pSet->getLookupTable("CPel"));
	
	$pageObject->fillFieldToolTips("CPel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CPel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CPel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CPel_label","<label for=\"".GetInputElementId("CPel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CPel_label", true);
	
	$xt->assign("CPel_fieldblock", true);
	$xt->assignbyref("CPel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CPel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CPel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CPel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CPel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MAibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MAibc")] = GetTableURL($pageObject->pSet->getLookupTable("MAibc"));
	
	$pageObject->fillFieldToolTips("MAibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MAibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MAibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MAibc_label","<label for=\"".GetInputElementId("MAibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MAibc_label", true);
	
	$xt->assign("MAibc_fieldblock", true);
	$xt->assignbyref("MAibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MAibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MAibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MAibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MAibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MAel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MAel")] = GetTableURL($pageObject->pSet->getLookupTable("MAel"));
	
	$pageObject->fillFieldToolTips("MAel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MAel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MAel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MAel_label","<label for=\"".GetInputElementId("MAel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MAel_label", true);
	
	$xt->assign("MAel_fieldblock", true);
	$xt->assignbyref("MAel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MAel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MAel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MAel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MAel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SCibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SCibc")] = GetTableURL($pageObject->pSet->getLookupTable("SCibc"));
	
	$pageObject->fillFieldToolTips("SCibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SCibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SCibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SCibc_label","<label for=\"".GetInputElementId("SCibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SCibc_label", true);
	
	$xt->assign("SCibc_fieldblock", true);
	$xt->assignbyref("SCibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SCibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SCibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SCibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SCibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SCel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SCel")] = GetTableURL($pageObject->pSet->getLookupTable("SCel"));
	
	$pageObject->fillFieldToolTips("SCel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SCel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SCel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SCel_label","<label for=\"".GetInputElementId("SCel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SCel_label", true);
	
	$xt->assign("SCel_fieldblock", true);
	$xt->assignbyref("SCel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SCel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SCel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SCel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SCel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SSibc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SSibc")] = GetTableURL($pageObject->pSet->getLookupTable("SSibc"));
	
	$pageObject->fillFieldToolTips("SSibc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SSibc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SSibc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SSibc_label","<label for=\"".GetInputElementId("SSibc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SSibc_label", true);
	
	$xt->assign("SSibc_fieldblock", true);
	$xt->assignbyref("SSibc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SSibc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SSibc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SSibc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SSibc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSibc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SSel"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SSel")] = GetTableURL($pageObject->pSet->getLookupTable("SSel"));
	
	$pageObject->fillFieldToolTips("SSel");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SSel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SSel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SSel_label","<label for=\"".GetInputElementId("SSel", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SSel_label", true);
	
	$xt->assign("SSel_fieldblock", true);
	$xt->assignbyref("SSel_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SSel_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SSel_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SSel", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SSel");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSel", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBSper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBSper")] = GetTableURL($pageObject->pSet->getLookupTable("IBSper"));
	
	$pageObject->fillFieldToolTips("IBSper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBSper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBSper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBSper_label","<label for=\"".GetInputElementId("IBSper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBSper_label", true);
	
	$xt->assign("IBSper_fieldblock", true);
	$xt->assignbyref("IBSper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBSper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBSper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBSper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBSper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("PPper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("PPper")] = GetTableURL($pageObject->pSet->getLookupTable("PPper"));
	
	$pageObject->fillFieldToolTips("PPper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("PPper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "PPper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("PPper_label","<label for=\"".GetInputElementId("PPper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("PPper_label", true);
	
	$xt->assign("PPper_fieldblock", true);
	$xt->assignbyref("PPper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("PPper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("PPper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_PPper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("PPper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CPper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CPper")] = GetTableURL($pageObject->pSet->getLookupTable("CPper"));
	
	$pageObject->fillFieldToolTips("CPper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CPper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CPper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CPper_label","<label for=\"".GetInputElementId("CPper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CPper_label", true);
	
	$xt->assign("CPper_fieldblock", true);
	$xt->assignbyref("CPper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CPper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CPper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CPper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CPper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MAper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MAper")] = GetTableURL($pageObject->pSet->getLookupTable("MAper"));
	
	$pageObject->fillFieldToolTips("MAper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MAper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MAper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MAper_label","<label for=\"".GetInputElementId("MAper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MAper_label", true);
	
	$xt->assign("MAper_fieldblock", true);
	$xt->assignbyref("MAper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MAper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MAper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MAper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MAper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SCSper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SCSper")] = GetTableURL($pageObject->pSet->getLookupTable("SCSper"));
	
	$pageObject->fillFieldToolTips("SCSper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SCSper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SCSper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SCSper_label","<label for=\"".GetInputElementId("SCSper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SCSper_label", true);
	
	$xt->assign("SCSper_fieldblock", true);
	$xt->assignbyref("SCSper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SCSper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SCSper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SCSper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SCSper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SSper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SSper")] = GetTableURL($pageObject->pSet->getLookupTable("SSper"));
	
	$pageObject->fillFieldToolTips("SSper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SSper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SSper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SSper_label","<label for=\"".GetInputElementId("SSper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SSper_label", true);
	
	$xt->assign("SSper_fieldblock", true);
	$xt->assignbyref("SSper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SSper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SSper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SSper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SSper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBSper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBSper2")] = GetTableURL($pageObject->pSet->getLookupTable("IBSper2"));
	
	$pageObject->fillFieldToolTips("IBSper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBSper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBSper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBSper2_label","<label for=\"".GetInputElementId("IBSper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBSper2_label", true);
	
	$xt->assign("IBSper2_fieldblock", true);
	$xt->assignbyref("IBSper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBSper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBSper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBSper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBSper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("PPper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("PPper2")] = GetTableURL($pageObject->pSet->getLookupTable("PPper2"));
	
	$pageObject->fillFieldToolTips("PPper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("PPper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "PPper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("PPper2_label","<label for=\"".GetInputElementId("PPper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("PPper2_label", true);
	
	$xt->assign("PPper2_fieldblock", true);
	$xt->assignbyref("PPper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("PPper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("PPper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_PPper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("PPper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"PPper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("CPper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("CPper2")] = GetTableURL($pageObject->pSet->getLookupTable("CPper2"));
	
	$pageObject->fillFieldToolTips("CPper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("CPper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "CPper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("CPper2_label","<label for=\"".GetInputElementId("CPper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("CPper2_label", true);
	
	$xt->assign("CPper2_fieldblock", true);
	$xt->assignbyref("CPper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("CPper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("CPper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_CPper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("CPper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"CPper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MAper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MAper2")] = GetTableURL($pageObject->pSet->getLookupTable("MAper2"));
	
	$pageObject->fillFieldToolTips("MAper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MAper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MAper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MAper2_label","<label for=\"".GetInputElementId("MAper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MAper2_label", true);
	
	$xt->assign("MAper2_fieldblock", true);
	$xt->assignbyref("MAper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MAper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MAper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MAper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MAper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MAper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SCSper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SCSper2")] = GetTableURL($pageObject->pSet->getLookupTable("SCSper2"));
	
	$pageObject->fillFieldToolTips("SCSper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SCSper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SCSper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SCSper2_label","<label for=\"".GetInputElementId("SCSper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SCSper2_label", true);
	
	$xt->assign("SCSper2_fieldblock", true);
	$xt->assignbyref("SCSper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SCSper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SCSper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SCSper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SCSper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SCSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("SSper2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("SSper2")] = GetTableURL($pageObject->pSet->getLookupTable("SSper2"));
	
	$pageObject->fillFieldToolTips("SSper2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("SSper2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "SSper2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("SSper2_label","<label for=\"".GetInputElementId("SSper2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("SSper2_label", true);
	
	$xt->assign("SSper2_fieldblock", true);
	$xt->assignbyref("SSper2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("SSper2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("SSper2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_SSper2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("SSper2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"SSper2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBCperMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBCperMD")] = GetTableURL($pageObject->pSet->getLookupTable("IBCperMD"));
	
	$pageObject->fillFieldToolTips("IBCperMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBCperMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBCperMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBCperMD_label","<label for=\"".GetInputElementId("IBCperMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBCperMD_label", true);
	
	$xt->assign("IBCperMD_fieldblock", true);
	$xt->assignbyref("IBCperMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBCperMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBCperMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBCperMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBCperMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBCTotalMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBCTotalMD")] = GetTableURL($pageObject->pSet->getLookupTable("IBCTotalMD"));
	
	$pageObject->fillFieldToolTips("IBCTotalMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBCTotalMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBCTotalMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBCTotalMD_label","<label for=\"".GetInputElementId("IBCTotalMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBCTotalMD_label", true);
	
	$xt->assign("IBCTotalMD_fieldblock", true);
	$xt->assignbyref("IBCTotalMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBCTotalMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBCTotalMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBCTotalMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBCTotalMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBCYTDTarget"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBCYTDTarget")] = GetTableURL($pageObject->pSet->getLookupTable("IBCYTDTarget"));
	
	$pageObject->fillFieldToolTips("IBCYTDTarget");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBCYTDTarget");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBCYTDTarget";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBCYTDTarget_label","<label for=\"".GetInputElementId("IBCYTDTarget", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBCYTDTarget_label", true);
	
	$xt->assign("IBCYTDTarget_fieldblock", true);
	$xt->assignbyref("IBCYTDTarget_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBCYTDTarget_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBCYTDTarget_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBCYTDTarget", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBCYTDTarget");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCYTDTarget", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBCYTDTarget", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBuper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBuper")] = GetTableURL($pageObject->pSet->getLookupTable("IBuper"));
	
	$pageObject->fillFieldToolTips("IBuper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBuper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBuper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBuper_label","<label for=\"".GetInputElementId("IBuper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBuper_label", true);
	
	$xt->assign("IBuper_fieldblock", true);
	$xt->assignbyref("IBuper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBuper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBuper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBuper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBuper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBuper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBuper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELperMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELperMD")] = GetTableURL($pageObject->pSet->getLookupTable("ELperMD"));
	
	$pageObject->fillFieldToolTips("ELperMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELperMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELperMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELperMD_label","<label for=\"".GetInputElementId("ELperMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELperMD_label", true);
	
	$xt->assign("ELperMD_fieldblock", true);
	$xt->assignbyref("ELperMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELperMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELperMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELperMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELperMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELTotalMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELTotalMD")] = GetTableURL($pageObject->pSet->getLookupTable("ELTotalMD"));
	
	$pageObject->fillFieldToolTips("ELTotalMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELTotalMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELTotalMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELTotalMD_label","<label for=\"".GetInputElementId("ELTotalMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELTotalMD_label", true);
	
	$xt->assign("ELTotalMD_fieldblock", true);
	$xt->assignbyref("ELTotalMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELTotalMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELTotalMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELTotalMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELTotalMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ELYTDTarget"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ELYTDTarget")] = GetTableURL($pageObject->pSet->getLookupTable("ELYTDTarget"));
	
	$pageObject->fillFieldToolTips("ELYTDTarget");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ELYTDTarget");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ELYTDTarget";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ELYTDTarget_label","<label for=\"".GetInputElementId("ELYTDTarget", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ELYTDTarget_label", true);
	
	$xt->assign("ELYTDTarget_fieldblock", true);
	$xt->assignbyref("ELYTDTarget_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ELYTDTarget_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ELYTDTarget_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ELYTDTarget", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ELYTDTarget");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELYTDTarget", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ELYTDTarget", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("eluper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("eluper")] = GetTableURL($pageObject->pSet->getLookupTable("eluper"));
	
	$pageObject->fillFieldToolTips("eluper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("eluper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "eluper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("eluper_label","<label for=\"".GetInputElementId("eluper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("eluper_label", true);
	
	$xt->assign("eluper_fieldblock", true);
	$xt->assignbyref("eluper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("eluper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("eluper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_eluper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("eluper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"eluper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"eluper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ClosingperMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ClosingperMD")] = GetTableURL($pageObject->pSet->getLookupTable("ClosingperMD"));
	
	$pageObject->fillFieldToolTips("ClosingperMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ClosingperMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ClosingperMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ClosingperMD_label","<label for=\"".GetInputElementId("ClosingperMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ClosingperMD_label", true);
	
	$xt->assign("ClosingperMD_fieldblock", true);
	$xt->assignbyref("ClosingperMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ClosingperMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ClosingperMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ClosingperMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ClosingperMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingperMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ClosingTotalMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ClosingTotalMD")] = GetTableURL($pageObject->pSet->getLookupTable("ClosingTotalMD"));
	
	$pageObject->fillFieldToolTips("ClosingTotalMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ClosingTotalMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ClosingTotalMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ClosingTotalMD_label","<label for=\"".GetInputElementId("ClosingTotalMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ClosingTotalMD_label", true);
	
	$xt->assign("ClosingTotalMD_fieldblock", true);
	$xt->assignbyref("ClosingTotalMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ClosingTotalMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ClosingTotalMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ClosingTotalMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ClosingTotalMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingTotalMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ClosingYTDMD"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ClosingYTDMD")] = GetTableURL($pageObject->pSet->getLookupTable("ClosingYTDMD"));
	
	$pageObject->fillFieldToolTips("ClosingYTDMD");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ClosingYTDMD");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ClosingYTDMD";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ClosingYTDMD_label","<label for=\"".GetInputElementId("ClosingYTDMD", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ClosingYTDMD_label", true);
	
	$xt->assign("ClosingYTDMD_fieldblock", true);
	$xt->assignbyref("ClosingYTDMD_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ClosingYTDMD_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ClosingYTDMD_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ClosingYTDMD", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ClosingYTDMD");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingYTDMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ClosingYTDMD", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Closinguper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Closinguper")] = GetTableURL($pageObject->pSet->getLookupTable("Closinguper"));
	
	$pageObject->fillFieldToolTips("Closinguper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Closinguper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Closinguper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Closinguper_label","<label for=\"".GetInputElementId("Closinguper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Closinguper_label", true);
	
	$xt->assign("Closinguper_fieldblock", true);
	$xt->assignbyref("Closinguper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Closinguper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Closinguper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Closinguper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Closinguper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closinguper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closinguper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MGMTnetthis"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MGMTnetthis")] = GetTableURL($pageObject->pSet->getLookupTable("MGMTnetthis"));
	
	$pageObject->fillFieldToolTips("MGMTnetthis");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MGMTnetthis");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MGMTnetthis";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MGMTnetthis_label","<label for=\"".GetInputElementId("MGMTnetthis", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MGMTnetthis_label", true);
	
	$xt->assign("MGMTnetthis_fieldblock", true);
	$xt->assignbyref("MGMTnetthis_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MGMTnetthis_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MGMTnetthis_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MGMTnetthis", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MGMTnetthis");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTnetthis", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTnetthis", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MGMTG"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MGMTG")] = GetTableURL($pageObject->pSet->getLookupTable("MGMTG"));
	
	$pageObject->fillFieldToolTips("MGMTG");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MGMTG");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MGMTG";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MGMTG_label","<label for=\"".GetInputElementId("MGMTG", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MGMTG_label", true);
	
	$xt->assign("MGMTG_fieldblock", true);
	$xt->assignbyref("MGMTG_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MGMTG_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MGMTG_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MGMTG", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MGMTG");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTG", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTG", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MGMTnetnext"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MGMTnetnext")] = GetTableURL($pageObject->pSet->getLookupTable("MGMTnetnext"));
	
	$pageObject->fillFieldToolTips("MGMTnetnext");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MGMTnetnext");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MGMTnetnext";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MGMTnetnext_label","<label for=\"".GetInputElementId("MGMTnetnext", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MGMTnetnext_label", true);
	
	$xt->assign("MGMTnetnext_fieldblock", true);
	$xt->assignbyref("MGMTnetnext_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MGMTnetnext_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MGMTnetnext_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MGMTnetnext", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MGMTnetnext");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTnetnext", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTnetnext", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("MGMTN"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("MGMTN")] = GetTableURL($pageObject->pSet->getLookupTable("MGMTN"));
	
	$pageObject->fillFieldToolTips("MGMTN");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("MGMTN");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "MGMTN";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("MGMTN_label","<label for=\"".GetInputElementId("MGMTN", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("MGMTN_label", true);
	
	$xt->assign("MGMTN_fieldblock", true);
	$xt->assignbyref("MGMTN_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("MGMTN_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("MGMTN_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_MGMTN", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("MGMTN");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTN", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"MGMTN", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("NetActual"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("NetActual")] = GetTableURL($pageObject->pSet->getLookupTable("NetActual"));
	
	$pageObject->fillFieldToolTips("NetActual");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("NetActual");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "NetActual";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("NetActual_label","<label for=\"".GetInputElementId("NetActual", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("NetActual_label", true);
	
	$xt->assign("NetActual_fieldblock", true);
	$xt->assignbyref("NetActual_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("NetActual_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("NetActual_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_NetActual", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("NetActual");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"NetActual", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"NetActual", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("TYBG"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("TYBG")] = GetTableURL($pageObject->pSet->getLookupTable("TYBG"));
	
	$pageObject->fillFieldToolTips("TYBG");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("TYBG");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "TYBG";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("TYBG_label","<label for=\"".GetInputElementId("TYBG", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("TYBG_label", true);
	
	$xt->assign("TYBG_fieldblock", true);
	$xt->assignbyref("TYBG_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("TYBG_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("TYBG_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_TYBG", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("TYBG");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TYBG", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TYBG", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("TYBN"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("TYBN")] = GetTableURL($pageObject->pSet->getLookupTable("TYBN"));
	
	$pageObject->fillFieldToolTips("TYBN");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("TYBN");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "TYBN";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("TYBN_label","<label for=\"".GetInputElementId("TYBN", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("TYBN_label", true);
	
	$xt->assign("TYBN_fieldblock", true);
	$xt->assignbyref("TYBN_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("TYBN_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("TYBN_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_TYBN", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("TYBN");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TYBN", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"TYBN", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("YTDgrossact"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("YTDgrossact")] = GetTableURL($pageObject->pSet->getLookupTable("YTDgrossact"));
	
	$pageObject->fillFieldToolTips("YTDgrossact");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("YTDgrossact");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "YTDgrossact";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("YTDgrossact_label","<label for=\"".GetInputElementId("YTDgrossact", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("YTDgrossact_label", true);
	
	$xt->assign("YTDgrossact_fieldblock", true);
	$xt->assignbyref("YTDgrossact_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("YTDgrossact_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("YTDgrossact_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_YTDgrossact", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("YTDgrossact");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDgrossact", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDgrossact", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("YTDnetact"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("YTDnetact")] = GetTableURL($pageObject->pSet->getLookupTable("YTDnetact"));
	
	$pageObject->fillFieldToolTips("YTDnetact");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("YTDnetact");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "YTDnetact";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("YTDnetact_label","<label for=\"".GetInputElementId("YTDnetact", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("YTDnetact_label", true);
	
	$xt->assign("YTDnetact_fieldblock", true);
	$xt->assignbyref("YTDnetact_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("YTDnetact_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("YTDnetact_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_YTDnetact", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("YTDnetact");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDnetact", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDnetact", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("YTDgross"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("YTDgross")] = GetTableURL($pageObject->pSet->getLookupTable("YTDgross"));
	
	$pageObject->fillFieldToolTips("YTDgross");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("YTDgross");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "YTDgross";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("YTDgross_label","<label for=\"".GetInputElementId("YTDgross", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("YTDgross_label", true);
	
	$xt->assign("YTDgross_fieldblock", true);
	$xt->assignbyref("YTDgross_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("YTDgross_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("YTDgross_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_YTDgross", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("YTDgross");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDgross", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"YTDgross", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ytdgrossper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ytdgrossper")] = GetTableURL($pageObject->pSet->getLookupTable("ytdgrossper"));
	
	$pageObject->fillFieldToolTips("ytdgrossper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ytdgrossper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ytdgrossper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ytdgrossper_label","<label for=\"".GetInputElementId("ytdgrossper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ytdgrossper_label", true);
	
	$xt->assign("ytdgrossper_fieldblock", true);
	$xt->assignbyref("ytdgrossper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ytdgrossper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ytdgrossper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ytdgrossper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ytdgrossper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ytdgrossper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ytdgrossper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ytdnetper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ytdnetper")] = GetTableURL($pageObject->pSet->getLookupTable("ytdnetper"));
	
	$pageObject->fillFieldToolTips("ytdnetper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ytdnetper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ytdnetper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ytdnetper_label","<label for=\"".GetInputElementId("ytdnetper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ytdnetper_label", true);
	
	$xt->assign("ytdnetper_fieldblock", true);
	$xt->assignbyref("ytdnetper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ytdnetper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ytdnetper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ytdnetper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ytdnetper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ytdnetper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ytdnetper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("mytdgrossper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("mytdgrossper")] = GetTableURL($pageObject->pSet->getLookupTable("mytdgrossper"));
	
	$pageObject->fillFieldToolTips("mytdgrossper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("mytdgrossper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "mytdgrossper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("mytdgrossper_label","<label for=\"".GetInputElementId("mytdgrossper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("mytdgrossper_label", true);
	
	$xt->assign("mytdgrossper_fieldblock", true);
	$xt->assignbyref("mytdgrossper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("mytdgrossper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("mytdgrossper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_mytdgrossper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("mytdgrossper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"mytdgrossper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"mytdgrossper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("mytdnetper"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("mytdnetper")] = GetTableURL($pageObject->pSet->getLookupTable("mytdnetper"));
	
	$pageObject->fillFieldToolTips("mytdnetper");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("mytdnetper");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "mytdnetper";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("mytdnetper_label","<label for=\"".GetInputElementId("mytdnetper", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("mytdnetper_label", true);
	
	$xt->assign("mytdnetper_fieldblock", true);
	$xt->assignbyref("mytdnetper_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("mytdnetper_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("mytdnetper_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_mytdnetper", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("mytdnetper");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"mytdnetper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"mytdnetper", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	
	//--------------------------------------------------------
	
	$pageObject->body["begin"] .= $includes;
	
	$pageObject->addCommonJs();
	
	$xt->assignbyref("body",$pageObject->body);
	
	$xt->assign("contents_block", true);
	
	$xt->assign("conditions_block",true);
	$xt->assign("search_button",true);
	$xt->assign("reset_button",true);
	$xt->assign("back_button",true);
	
	
	$xt->assign("searchbutton_attrs","id=\"searchButton".$id."\"");
	$xt->assign("resetbutton_attrs","id=\"resetButton".$id."\"");
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	

	// for crosse report 
	
	if (postvalue('axis_x')!=''){
		$xtCrosseElem = "<input type=\"hidden\" id=\"select_group_x\" value=\"".postvalue('axis_x')."\">
						<input type=\"hidden\" id=\"select_group_y\" value=\"".postvalue('axis_y')."\">
						<input type=\"hidden\" id=\"select_data\" value=\"".postvalue('field')."\">
						<input type=\"hidden\" id=\"group_func_hidden\" value=\"".postvalue('group_func')."\">
						";
		$xt->assign("CrossElem",$xtCrosseElem);
	}
	// for crosse report
	if($eventObj->exists("BeforeShowSearch"))
		$eventObj->BeforeShowSearch($xt,$templatefile, $pageObject);
	// load controls for first page loading	
	
	
	$pageObject->fillSetCntrlMaps();
	
	$pageObject->body['end'] .= '<script>';
	$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
	$pageObject->body['end'] .= "window.viewControlsMap = ".my_json_encode($pageObject->viewControlsHTMLMap).";";
	$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
	$pageObject->body['end'] .= '</script>';
		$pageObject->body['end'] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJs()."</script>";
	
	$xt->assignbyref("body",$pageObject->body);
	$xt->display($templatefile);
	exit();	
}
else if($mode==SEARCH_LOAD_CONTROL)
{

	$searchControlBuilder = new PanelSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);
	$ctrlField = postvalue('ctrlField');
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $ctrlField, 0, '', false, true, '', '');	
	
	// build array for encode
	$resArr = array();
	$resArr['control1'] = trim($xt->call_func($ctrlBlockArr['searchcontrol']));
	$resArr['control2'] = trim($xt->call_func($ctrlBlockArr['searchcontrol1']));
	$resArr['comboHtml'] = trim($ctrlBlockArr['searchtype']);
	$resArr['delButt'] = trim($ctrlBlockArr['delCtrlButt']);
	$resArr['delButtId'] =  trim($searchControlBuilder->getDelButtonId($ctrlField, $id));
	$resArr['divInd'] = trim($id);	
	$resArr['fLabel'] = GetFieldLabel(GoodFieldName($strTableName),GoodFieldName($ctrlField));
	$resArr['ctrlMap'] = $pageObject->controlsMap['controls'];
	
	if (postvalue('isNeedSettings') == 'true')
	{
		$pageObject->fillSettings();
		$resArr['settings'] = $pageObject->jsSettings;
	}
	
	// return JSON
	echo my_json_encode($resArr);
	exit();
}

?>
