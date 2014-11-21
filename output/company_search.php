<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/company_variables.php");
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
$layout->blocks["top"][] = "search";$page_layouts["company_search"] = $layout;


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
$templatefile = "company_search.htm";

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
$params['shortTableName'] = 'company';
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
	
	if($pageObject->pSet->getLookupTable("ID"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ID")] = GetTableURL($pageObject->pSet->getLookupTable("ID"));
	
	$pageObject->fillFieldToolTips("ID");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ID");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ID";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ID_label","<label for=\"".GetInputElementId("ID", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ID_label", true);
	
	$xt->assign("ID_fieldblock", true);
	$xt->assignbyref("ID_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ID_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ID_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ID", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ID");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ID", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ID", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Company"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Company")] = GetTableURL($pageObject->pSet->getLookupTable("Company"));
	
	$pageObject->fillFieldToolTips("Company");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Company");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Company";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Company_label","<label for=\"".GetInputElementId("Company", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Company_label", true);
	
	$xt->assign("Company_fieldblock", true);
	$xt->assignbyref("Company_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Company_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Company_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Company", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Company");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Company", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Company", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL Date")] = GetTableURL($pageObject->pSet->getLookupTable("EL Date"));
	
	$pageObject->fillFieldToolTips("EL Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL_Date_label","<label for=\"".GetInputElementId("EL Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL_Date_label", true);
	
	$xt->assign("EL_Date_fieldblock", true);
	$xt->assignbyref("EL_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("IBC Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("IBC Date")] = GetTableURL($pageObject->pSet->getLookupTable("IBC Date"));
	
	$pageObject->fillFieldToolTips("IBC Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("IBC Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "IBC Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("IBC_Date_label","<label for=\"".GetInputElementId("IBC Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("IBC_Date_label", true);
	
	$xt->assign("IBC_Date_fieldblock", true);
	$xt->assignbyref("IBC_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("IBC_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("IBC_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_IBC_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("IBC Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"IBC Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Est. Close Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Est. Close Date")] = GetTableURL($pageObject->pSet->getLookupTable("Est. Close Date"));
	
	$pageObject->fillFieldToolTips("Est. Close Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Est. Close Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Est. Close Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Est__Close_Date_label","<label for=\"".GetInputElementId("Est. Close Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Est__Close_Date_label", true);
	
	$xt->assign("Est__Close_Date_fieldblock", true);
	$xt->assignbyref("Est__Close_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Est__Close_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Est__Close_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Est__Close_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Est. Close Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Est. Close Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Est. Close Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Project Name"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Project Name")] = GetTableURL($pageObject->pSet->getLookupTable("Project Name"));
	
	$pageObject->fillFieldToolTips("Project Name");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Project Name");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Project Name";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Project_Name_label","<label for=\"".GetInputElementId("Project Name", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Project_Name_label", true);
	
	$xt->assign("Project_Name_fieldblock", true);
	$xt->assignbyref("Project_Name_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Project_Name_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Project_Name_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Project_Name", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Project Name");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Project Name", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Project Name", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("EL Expiration Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("EL Expiration Date")] = GetTableURL($pageObject->pSet->getLookupTable("EL Expiration Date"));
	
	$pageObject->fillFieldToolTips("EL Expiration Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("EL Expiration Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "EL Expiration Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("EL_Expiration_Date_label","<label for=\"".GetInputElementId("EL Expiration Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("EL_Expiration_Date_label", true);
	
	$xt->assign("EL_Expiration_Date_fieldblock", true);
	$xt->assignbyref("EL_Expiration_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("EL_Expiration_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("EL_Expiration_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_EL_Expiration_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("EL Expiration Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL Expiration Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"EL Expiration Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Status"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Status")] = GetTableURL($pageObject->pSet->getLookupTable("Status"));
	
	$pageObject->fillFieldToolTips("Status");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Status");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Status";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Status_label","<label for=\"".GetInputElementId("Status", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Status_label", true);
	
	$xt->assign("Status_fieldblock", true);
	$xt->assignbyref("Status_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Status_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Status_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Status", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Status");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Status", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Status", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Deal Type"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Deal Type")] = GetTableURL($pageObject->pSet->getLookupTable("Deal Type"));
	
	$pageObject->fillFieldToolTips("Deal Type");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Deal Type");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Deal Type";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Deal_Type_label","<label for=\"".GetInputElementId("Deal Type", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Deal_Type_label", true);
	
	$xt->assign("Deal_Type_fieldblock", true);
	$xt->assignbyref("Deal_Type_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Deal_Type_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Deal_Type_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Deal_Type", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Deal Type");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Deal Type", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Deal Type", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Deal Slot"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Deal Slot")] = GetTableURL($pageObject->pSet->getLookupTable("Deal Slot"));
	
	$pageObject->fillFieldToolTips("Deal Slot");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Deal Slot");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Deal Slot";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Deal_Slot_label","<label for=\"".GetInputElementId("Deal Slot", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Deal_Slot_label", true);
	
	$xt->assign("Deal_Slot_fieldblock", true);
	$xt->assignbyref("Deal_Slot_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Deal_Slot_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Deal_Slot_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Deal_Slot", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Deal Slot");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Deal Slot", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Deal Slot", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Closed Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Closed Date")] = GetTableURL($pageObject->pSet->getLookupTable("Closed Date"));
	
	$pageObject->fillFieldToolTips("Closed Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Closed Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Closed Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Closed_Date_label","<label for=\"".GetInputElementId("Closed Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Closed_Date_label", true);
	
	$xt->assign("Closed_Date_fieldblock", true);
	$xt->assignbyref("Closed_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Closed_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Closed_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Closed_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Closed Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closed Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Closed Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Dead Date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Dead Date")] = GetTableURL($pageObject->pSet->getLookupTable("Dead Date"));
	
	$pageObject->fillFieldToolTips("Dead Date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Dead Date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Dead Date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Dead_Date_label","<label for=\"".GetInputElementId("Dead Date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Dead_Date_label", true);
	
	$xt->assign("Dead_Date_fieldblock", true);
	$xt->assignbyref("Dead_Date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Dead_Date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Dead_Date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Dead_Date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Dead Date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Dead Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Dead Date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Primary Banker"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Primary Banker")] = GetTableURL($pageObject->pSet->getLookupTable("Primary Banker"));
	
	$pageObject->fillFieldToolTips("Primary Banker");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Primary Banker");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Primary Banker";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Primary_Banker_label","<label for=\"".GetInputElementId("Primary Banker", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Primary_Banker_label", true);
	
	$xt->assign("Primary_Banker_fieldblock", true);
	$xt->assignbyref("Primary_Banker_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Primary_Banker_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Primary_Banker_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Primary_Banker", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Primary Banker");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Primary Banker", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Primary Banker", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Practice Area"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Practice Area")] = GetTableURL($pageObject->pSet->getLookupTable("Practice Area"));
	
	$pageObject->fillFieldToolTips("Practice Area");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Practice Area");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Practice Area";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Practice_Area_label","<label for=\"".GetInputElementId("Practice Area", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Practice_Area_label", true);
	
	$xt->assign("Practice_Area_fieldblock", true);
	$xt->assignbyref("Practice_Area_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Practice_Area_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Practice_Area_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Practice_Area", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Practice Area");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Practice Area", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Practice Area", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Industry"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Industry")] = GetTableURL($pageObject->pSet->getLookupTable("Industry"));
	
	$pageObject->fillFieldToolTips("Industry");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Industry");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Industry";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Industry_label","<label for=\"".GetInputElementId("Industry", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Industry_label", true);
	
	$xt->assign("Industry_fieldblock", true);
	$xt->assignbyref("Industry_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Industry_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Industry_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Industry", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Industry");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industry", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Industry", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Projected Transaction Size"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Projected Transaction Size")] = GetTableURL($pageObject->pSet->getLookupTable("Projected Transaction Size"));
	
	$pageObject->fillFieldToolTips("Projected Transaction Size");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Projected Transaction Size");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Projected Transaction Size";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Projected_Transaction_Size_label","<label for=\"".GetInputElementId("Projected Transaction Size", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Projected_Transaction_Size_label", true);
	
	$xt->assign("Projected_Transaction_Size_fieldblock", true);
	$xt->assignbyref("Projected_Transaction_Size_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Projected_Transaction_Size_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Projected_Transaction_Size_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Projected_Transaction_Size", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Projected Transaction Size");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Projected Transaction Size", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Projected Transaction Size", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Enterpise Value"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Enterpise Value")] = GetTableURL($pageObject->pSet->getLookupTable("Enterpise Value"));
	
	$pageObject->fillFieldToolTips("Enterpise Value");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Enterpise Value");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Enterpise Value";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Enterpise_Value_label","<label for=\"".GetInputElementId("Enterpise Value", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Enterpise_Value_label", true);
	
	$xt->assign("Enterpise_Value_fieldblock", true);
	$xt->assignbyref("Enterpise_Value_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Enterpise_Value_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Enterpise_Value_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Enterpise_Value", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Enterpise Value");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Enterpise Value", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Enterpise Value", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Final Transaction Size"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Final Transaction Size")] = GetTableURL($pageObject->pSet->getLookupTable("Final Transaction Size"));
	
	$pageObject->fillFieldToolTips("Final Transaction Size");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Final Transaction Size");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Final Transaction Size";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Final_Transaction_Size_label","<label for=\"".GetInputElementId("Final Transaction Size", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Final_Transaction_Size_label", true);
	
	$xt->assign("Final_Transaction_Size_fieldblock", true);
	$xt->assignbyref("Final_Transaction_Size_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Final_Transaction_Size_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Final_Transaction_Size_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Final_Transaction_Size", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Final Transaction Size");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Final Transaction Size", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Final Transaction Size", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Projected Fee"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Projected Fee")] = GetTableURL($pageObject->pSet->getLookupTable("Projected Fee"));
	
	$pageObject->fillFieldToolTips("Projected Fee");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Projected Fee");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Projected Fee";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Projected_Fee_label","<label for=\"".GetInputElementId("Projected Fee", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Projected_Fee_label", true);
	
	$xt->assign("Projected_Fee_fieldblock", true);
	$xt->assignbyref("Projected_Fee_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Projected_Fee_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Projected_Fee_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Projected_Fee", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Projected Fee");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Projected Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Projected Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Minimum"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Minimum")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Minimum"));
	
	$pageObject->fillFieldToolTips("Fee Minimum");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Minimum");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Minimum";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Minimum_label","<label for=\"".GetInputElementId("Fee Minimum", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Minimum_label", true);
	
	$xt->assign("Fee_Minimum_fieldblock", true);
	$xt->assignbyref("Fee_Minimum_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Minimum_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Minimum_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Minimum", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Minimum");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Minimum", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Minimum", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Engagment Fee"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Engagment Fee")] = GetTableURL($pageObject->pSet->getLookupTable("Engagment Fee"));
	
	$pageObject->fillFieldToolTips("Engagment Fee");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Engagment Fee");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Engagment Fee";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Engagment_Fee_label","<label for=\"".GetInputElementId("Engagment Fee", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Engagment_Fee_label", true);
	
	$xt->assign("Engagment_Fee_fieldblock", true);
	$xt->assignbyref("Engagment_Fee_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Engagment_Fee_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Engagment_Fee_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Engagment_Fee", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Engagment Fee");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Engagment Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Engagment Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Details"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Details")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Details"));
	
	$pageObject->fillFieldToolTips("Fee Details");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Details");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Details";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Details_label","<label for=\"".GetInputElementId("Fee Details", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Details_label", true);
	
	$xt->assign("Fee_Details_fieldblock", true);
	$xt->assignbyref("Fee_Details_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Details_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Details_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Details", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Details");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Details", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Details", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Split to Corporate"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Split to Corporate")] = GetTableURL($pageObject->pSet->getLookupTable("Split to Corporate"));
	
	$pageObject->fillFieldToolTips("Split to Corporate");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Split to Corporate");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Split to Corporate";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Split_to_Corporate_label","<label for=\"".GetInputElementId("Split to Corporate", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Split_to_Corporate_label", true);
	
	$xt->assign("Split_to_Corporate_fieldblock", true);
	$xt->assignbyref("Split_to_Corporate_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Split_to_Corporate_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Split_to_Corporate_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Split_to_Corporate", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Split to Corporate");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Split to Corporate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Split to Corporate", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Monthly Retainer"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Monthly Retainer")] = GetTableURL($pageObject->pSet->getLookupTable("Monthly Retainer"));
	
	$pageObject->fillFieldToolTips("Monthly Retainer");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Monthly Retainer");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Monthly Retainer";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Monthly_Retainer_label","<label for=\"".GetInputElementId("Monthly Retainer", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Monthly_Retainer_label", true);
	
	$xt->assign("Monthly_Retainer_fieldblock", true);
	$xt->assignbyref("Monthly_Retainer_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Monthly_Retainer_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Monthly_Retainer_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Monthly_Retainer", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Monthly Retainer");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Monthly Retainer", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Monthly Retainer", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Final Total Sucess Fee"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Final Total Sucess Fee")] = GetTableURL($pageObject->pSet->getLookupTable("Final Total Sucess Fee"));
	
	$pageObject->fillFieldToolTips("Final Total Sucess Fee");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Final Total Sucess Fee");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Final Total Sucess Fee";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Final_Total_Sucess_Fee_label","<label for=\"".GetInputElementId("Final Total Sucess Fee", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Final_Total_Sucess_Fee_label", true);
	
	$xt->assign("Final_Total_Sucess_Fee_fieldblock", true);
	$xt->assignbyref("Final_Total_Sucess_Fee_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Final_Total_Sucess_Fee_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Final_Total_Sucess_Fee_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Final_Total_Sucess_Fee", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Final Total Sucess Fee");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Final Total Sucess Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Final Total Sucess Fee", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Ownership Class"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Ownership Class")] = GetTableURL($pageObject->pSet->getLookupTable("Ownership Class"));
	
	$pageObject->fillFieldToolTips("Ownership Class");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Ownership Class");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Ownership Class";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Ownership_Class_label","<label for=\"".GetInputElementId("Ownership Class", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Ownership_Class_label", true);
	
	$xt->assign("Ownership_Class_fieldblock", true);
	$xt->assignbyref("Ownership_Class_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Ownership_Class_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Ownership_Class_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Ownership_Class", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Ownership Class");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Ownership Class", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Ownership Class", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Referral Type"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Referral Type")] = GetTableURL($pageObject->pSet->getLookupTable("Referral Type"));
	
	$pageObject->fillFieldToolTips("Referral Type");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Referral Type");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Referral Type";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Referral_Type_label","<label for=\"".GetInputElementId("Referral Type", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Referral_Type_label", true);
	
	$xt->assign("Referral_Type_fieldblock", true);
	$xt->assignbyref("Referral_Type_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Referral_Type_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Referral_Type_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Referral_Type", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Referral Type");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Type", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Type", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Referral Source-Company"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Referral Source-Company")] = GetTableURL($pageObject->pSet->getLookupTable("Referral Source-Company"));
	
	$pageObject->fillFieldToolTips("Referral Source-Company");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Referral Source-Company");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Referral Source-Company";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Referral_Source_Company_label","<label for=\"".GetInputElementId("Referral Source-Company", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Referral_Source_Company_label", true);
	
	$xt->assign("Referral_Source_Company_fieldblock", true);
	$xt->assignbyref("Referral_Source_Company_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Referral_Source_Company_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Referral_Source_Company_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Referral_Source_Company", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Referral Source-Company");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Source-Company", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Source-Company", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Referral Scource-Ind."))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Referral Scource-Ind.")] = GetTableURL($pageObject->pSet->getLookupTable("Referral Scource-Ind."));
	
	$pageObject->fillFieldToolTips("Referral Scource-Ind.");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Referral Scource-Ind.");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Referral Scource-Ind.";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Referral_Scource_Ind__label","<label for=\"".GetInputElementId("Referral Scource-Ind.", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Referral_Scource_Ind__label", true);
	
	$xt->assign("Referral_Scource_Ind__fieldblock", true);
	$xt->assignbyref("Referral_Scource_Ind__editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Referral_Scource_Ind__notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Referral_Scource_Ind__editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Referral_Scource_Ind_", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Referral Scource-Ind.");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Scource-Ind.", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Referral Scource-Ind.", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Description"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Description")] = GetTableURL($pageObject->pSet->getLookupTable("Description"));
	
	$pageObject->fillFieldToolTips("Description");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Description");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Description";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Description_label","<label for=\"".GetInputElementId("Description", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Description_label", true);
	
	$xt->assign("Description_fieldblock", true);
	$xt->assignbyref("Description_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Description_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Description_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Description", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Description");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Description", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Description", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-1")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-1"));
	
	$pageObject->fillFieldToolTips("Team Split-1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_1_label","<label for=\"".GetInputElementId("Team Split-1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_1_label", true);
	
	$xt->assign("Team_Split_1_fieldblock", true);
	$xt->assignbyref("Team_Split_1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-1")] = GetTableURL($pageObject->pSet->getLookupTable("Team-1"));
	
	$pageObject->fillFieldToolTips("Team-1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_1_label","<label for=\"".GetInputElementId("Team-1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_1_label", true);
	
	$xt->assign("Team_1_fieldblock", true);
	$xt->assignbyref("Team_1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-2")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-2"));
	
	$pageObject->fillFieldToolTips("Team Split-2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_2_label","<label for=\"".GetInputElementId("Team Split-2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_2_label", true);
	
	$xt->assign("Team_Split_2_fieldblock", true);
	$xt->assignbyref("Team_Split_2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-2")] = GetTableURL($pageObject->pSet->getLookupTable("Team-2"));
	
	$pageObject->fillFieldToolTips("Team-2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_2_label","<label for=\"".GetInputElementId("Team-2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_2_label", true);
	
	$xt->assign("Team_2_fieldblock", true);
	$xt->assignbyref("Team_2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-3")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-3"));
	
	$pageObject->fillFieldToolTips("Team Split-3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_3_label","<label for=\"".GetInputElementId("Team Split-3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_3_label", true);
	
	$xt->assign("Team_Split_3_fieldblock", true);
	$xt->assignbyref("Team_Split_3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-3")] = GetTableURL($pageObject->pSet->getLookupTable("Team-3"));
	
	$pageObject->fillFieldToolTips("Team-3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_3_label","<label for=\"".GetInputElementId("Team-3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_3_label", true);
	
	$xt->assign("Team_3_fieldblock", true);
	$xt->assignbyref("Team_3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-4")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-4"));
	
	$pageObject->fillFieldToolTips("Team Split-4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_4_label","<label for=\"".GetInputElementId("Team Split-4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_4_label", true);
	
	$xt->assign("Team_Split_4_fieldblock", true);
	$xt->assignbyref("Team_Split_4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-4")] = GetTableURL($pageObject->pSet->getLookupTable("Team-4"));
	
	$pageObject->fillFieldToolTips("Team-4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_4_label","<label for=\"".GetInputElementId("Team-4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_4_label", true);
	
	$xt->assign("Team_4_fieldblock", true);
	$xt->assignbyref("Team_4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-5")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-5"));
	
	$pageObject->fillFieldToolTips("Team Split-5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_5_label","<label for=\"".GetInputElementId("Team Split-5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_5_label", true);
	
	$xt->assign("Team_Split_5_fieldblock", true);
	$xt->assignbyref("Team_Split_5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-5")] = GetTableURL($pageObject->pSet->getLookupTable("Team-5"));
	
	$pageObject->fillFieldToolTips("Team-5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_5_label","<label for=\"".GetInputElementId("Team-5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_5_label", true);
	
	$xt->assign("Team_5_fieldblock", true);
	$xt->assignbyref("Team_5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team Split-6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team Split-6")] = GetTableURL($pageObject->pSet->getLookupTable("Team Split-6"));
	
	$pageObject->fillFieldToolTips("Team Split-6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team Split-6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team Split-6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_Split_6_label","<label for=\"".GetInputElementId("Team Split-6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_Split_6_label", true);
	
	$xt->assign("Team_Split_6_fieldblock", true);
	$xt->assignbyref("Team_Split_6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_Split_6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_Split_6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_Split_6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team Split-6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team Split-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Team-6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Team-6")] = GetTableURL($pageObject->pSet->getLookupTable("Team-6"));
	
	$pageObject->fillFieldToolTips("Team-6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Team-6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Team-6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Team_6_label","<label for=\"".GetInputElementId("Team-6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Team_6_label", true);
	
	$xt->assign("Team_6_fieldblock", true);
	$xt->assignbyref("Team_6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Team_6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Team_6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Team_6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Team-6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Team-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-1")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-1"));
	
	$pageObject->fillFieldToolTips("Fee Split-1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_1_label","<label for=\"".GetInputElementId("Fee Split-1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_1_label", true);
	
	$xt->assign("Fee_Split_1_fieldblock", true);
	$xt->assignbyref("Fee_Split_1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-1")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-1"));
	
	$pageObject->fillFieldToolTips("Fee To-1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_1_label","<label for=\"".GetInputElementId("Fee To-1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_1_label", true);
	
	$xt->assign("Fee_To_1_fieldblock", true);
	$xt->assignbyref("Fee_To_1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-2")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-2"));
	
	$pageObject->fillFieldToolTips("Fee Split-2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_2_label","<label for=\"".GetInputElementId("Fee Split-2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_2_label", true);
	
	$xt->assign("Fee_Split_2_fieldblock", true);
	$xt->assignbyref("Fee_Split_2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-2")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-2"));
	
	$pageObject->fillFieldToolTips("Fee To-2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_2_label","<label for=\"".GetInputElementId("Fee To-2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_2_label", true);
	
	$xt->assign("Fee_To_2_fieldblock", true);
	$xt->assignbyref("Fee_To_2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-3")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-3"));
	
	$pageObject->fillFieldToolTips("Fee Split-3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_3_label","<label for=\"".GetInputElementId("Fee Split-3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_3_label", true);
	
	$xt->assign("Fee_Split_3_fieldblock", true);
	$xt->assignbyref("Fee_Split_3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-3")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-3"));
	
	$pageObject->fillFieldToolTips("Fee To-3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_3_label","<label for=\"".GetInputElementId("Fee To-3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_3_label", true);
	
	$xt->assign("Fee_To_3_fieldblock", true);
	$xt->assignbyref("Fee_To_3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-4")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-4"));
	
	$pageObject->fillFieldToolTips("Fee Split-4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_4_label","<label for=\"".GetInputElementId("Fee Split-4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_4_label", true);
	
	$xt->assign("Fee_Split_4_fieldblock", true);
	$xt->assignbyref("Fee_Split_4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-4")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-4"));
	
	$pageObject->fillFieldToolTips("Fee To-4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_4_label","<label for=\"".GetInputElementId("Fee To-4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_4_label", true);
	
	$xt->assign("Fee_To_4_fieldblock", true);
	$xt->assignbyref("Fee_To_4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-5")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-5"));
	
	$pageObject->fillFieldToolTips("Fee Split-5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_5_label","<label for=\"".GetInputElementId("Fee Split-5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_5_label", true);
	
	$xt->assign("Fee_Split_5_fieldblock", true);
	$xt->assignbyref("Fee_Split_5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-5")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-5"));
	
	$pageObject->fillFieldToolTips("Fee To-5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_5_label","<label for=\"".GetInputElementId("Fee To-5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_5_label", true);
	
	$xt->assign("Fee_To_5_fieldblock", true);
	$xt->assignbyref("Fee_To_5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee Split-6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee Split-6")] = GetTableURL($pageObject->pSet->getLookupTable("Fee Split-6"));
	
	$pageObject->fillFieldToolTips("Fee Split-6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee Split-6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee Split-6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_Split_6_label","<label for=\"".GetInputElementId("Fee Split-6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_Split_6_label", true);
	
	$xt->assign("Fee_Split_6_fieldblock", true);
	$xt->assignbyref("Fee_Split_6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_Split_6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_Split_6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_Split_6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee Split-6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee Split-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Fee To-6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Fee To-6")] = GetTableURL($pageObject->pSet->getLookupTable("Fee To-6"));
	
	$pageObject->fillFieldToolTips("Fee To-6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Fee To-6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fee To-6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Fee_To_6_label","<label for=\"".GetInputElementId("Fee To-6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Fee_To_6_label", true);
	
	$xt->assign("Fee_To_6_fieldblock", true);
	$xt->assignbyref("Fee_To_6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Fee_To_6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Fee_To_6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Fee_To_6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Fee To-6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Fee To-6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Paul"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Paul")] = GetTableURL($pageObject->pSet->getLookupTable("Paul"));
	
	$pageObject->fillFieldToolTips("Paul");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Paul");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Paul";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Paul_label","<label for=\"".GetInputElementId("Paul", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Paul_label", true);
	
	$xt->assign("Paul_fieldblock", true);
	$xt->assignbyref("Paul_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Paul_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Paul_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Paul", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Paul");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Paul", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Paul", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("McBroom"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("McBroom")] = GetTableURL($pageObject->pSet->getLookupTable("McBroom"));
	
	$pageObject->fillFieldToolTips("McBroom");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("McBroom");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "McBroom";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("McBroom_label","<label for=\"".GetInputElementId("McBroom", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("McBroom_label", true);
	
	$xt->assign("McBroom_fieldblock", true);
	$xt->assignbyref("McBroom_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("McBroom_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("McBroom_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_McBroom", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("McBroom");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"McBroom", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"McBroom", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Pipeline"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Pipeline")] = GetTableURL($pageObject->pSet->getLookupTable("Pipeline"));
	
	$pageObject->fillFieldToolTips("Pipeline");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Pipeline");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Pipeline";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Pipeline_label","<label for=\"".GetInputElementId("Pipeline", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Pipeline_label", true);
	
	$xt->assign("Pipeline_fieldblock", true);
	$xt->assignbyref("Pipeline_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Pipeline_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Pipeline_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Pipeline", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Pipeline");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Pipeline", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Pipeline", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Month of Close"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Month of Close")] = GetTableURL($pageObject->pSet->getLookupTable("Month of Close"));
	
	$pageObject->fillFieldToolTips("Month of Close");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Month of Close");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Month of Close";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Month_of_Close_label","<label for=\"".GetInputElementId("Month of Close", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Month_of_Close_label", true);
	
	$xt->assign("Month_of_Close_fieldblock", true);
	$xt->assignbyref("Month_of_Close_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Month_of_Close_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Month_of_Close_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Month_of_Close", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Month of Close");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Month of Close", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Month of Close", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Gross This"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Gross This")] = GetTableURL($pageObject->pSet->getLookupTable("Gross This"));
	
	$pageObject->fillFieldToolTips("Gross This");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Gross This");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Gross This";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Gross_This_label","<label for=\"".GetInputElementId("Gross This", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Gross_This_label", true);
	
	$xt->assign("Gross_This_fieldblock", true);
	$xt->assignbyref("Gross_This_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Gross_This_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Gross_This_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Gross_This", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Gross This");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Gross This", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Gross This", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("Gross Next"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("Gross Next")] = GetTableURL($pageObject->pSet->getLookupTable("Gross Next"));
	
	$pageObject->fillFieldToolTips("Gross Next");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("Gross Next");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Gross Next";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("Gross_Next_label","<label for=\"".GetInputElementId("Gross Next", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("Gross_Next_label", true);
	
	$xt->assign("Gross_Next_fieldblock", true);
	$xt->assignbyref("Gross_Next_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("Gross_Next_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("Gross_Next_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_Gross_Next", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("Gross Next");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Gross Next", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"Gross Next", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
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
