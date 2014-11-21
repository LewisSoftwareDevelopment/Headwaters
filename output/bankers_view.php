<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/bankers_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["bankers_view"] = $layout;




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
	header("Location: bankers_list.php?a=return");
	exit();
}

$out = "";
$first = true;
$fieldsArr = array();
$arr = array();
$arr['fName'] = "First Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("First Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "YTD+Last";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("YTD+Last");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Last Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Last Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Active";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Active");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Name";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Name");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Budget Year";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Budget Year");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Start Date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Start Date");
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
$arr['fName'] = "ID";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ID");
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
//First Name - 
	
	$value = $pageObject->showDBValue("First Name", $data, $keylink);
	if($mainTableOwnerID=="First Name")
		$ownerIdValue=$value;
	$xt->assign("First_Name_value",$value);
	if(!$pageObject->isAppearOnTabs("First Name"))
		$xt->assign("First_Name_fieldblock",true);
	else
		$xt->assign("First_Name_tabfieldblock",true);
////////////////////////////////////////////
//YTD+Last - 
	
	$value = $pageObject->showDBValue("YTD+Last", $data, $keylink);
	if($mainTableOwnerID=="YTD+Last")
		$ownerIdValue=$value;
	$xt->assign("YTD_Last_value",$value);
	if(!$pageObject->isAppearOnTabs("YTD+Last"))
		$xt->assign("YTD_Last_fieldblock",true);
	else
		$xt->assign("YTD_Last_tabfieldblock",true);
////////////////////////////////////////////
//Last Name - 
	
	$value = $pageObject->showDBValue("Last Name", $data, $keylink);
	if($mainTableOwnerID=="Last Name")
		$ownerIdValue=$value;
	$xt->assign("Last_Name_value",$value);
	if(!$pageObject->isAppearOnTabs("Last Name"))
		$xt->assign("Last_Name_fieldblock",true);
	else
		$xt->assign("Last_Name_tabfieldblock",true);
////////////////////////////////////////////
//Active - Checkbox
	
	$value = $pageObject->showDBValue("Active", $data, $keylink);
	if($mainTableOwnerID=="Active")
		$ownerIdValue=$value;
	$xt->assign("Active_value",$value);
	if(!$pageObject->isAppearOnTabs("Active"))
		$xt->assign("Active_fieldblock",true);
	else
		$xt->assign("Active_tabfieldblock",true);
////////////////////////////////////////////
//Name - 
	
	$value = $pageObject->showDBValue("Name", $data, $keylink);
	if($mainTableOwnerID=="Name")
		$ownerIdValue=$value;
	$xt->assign("Name_value",$value);
	if(!$pageObject->isAppearOnTabs("Name"))
		$xt->assign("Name_fieldblock",true);
	else
		$xt->assign("Name_tabfieldblock",true);
////////////////////////////////////////////
//Budget Year - 
	
	$value = $pageObject->showDBValue("Budget Year", $data, $keylink);
	if($mainTableOwnerID=="Budget Year")
		$ownerIdValue=$value;
	$xt->assign("Budget_Year_value",$value);
	if(!$pageObject->isAppearOnTabs("Budget Year"))
		$xt->assign("Budget_Year_fieldblock",true);
	else
		$xt->assign("Budget_Year_tabfieldblock",true);
////////////////////////////////////////////
//Start Date - Short Date
	
	$value = $pageObject->showDBValue("Start Date", $data, $keylink);
	if($mainTableOwnerID=="Start Date")
		$ownerIdValue=$value;
	$xt->assign("Start_Date_value",$value);
	if(!$pageObject->isAppearOnTabs("Start Date"))
		$xt->assign("Start_Date_fieldblock",true);
	else
		$xt->assign("Start_Date_tabfieldblock",true);
////////////////////////////////////////////
//YTD Revenue - 
	
	$value = $pageObject->showDBValue("YTD Revenue", $data, $keylink);
	if($mainTableOwnerID=="YTD Revenue")
		$ownerIdValue=$value;
	$xt->assign("YTD_Revenue_value",$value);
	if(!$pageObject->isAppearOnTabs("YTD Revenue"))
		$xt->assign("YTD_Revenue_fieldblock",true);
	else
		$xt->assign("YTD_Revenue_tabfieldblock",true);
////////////////////////////////////////////
//Last Year Rev - 
	
	$value = $pageObject->showDBValue("Last Year Rev", $data, $keylink);
	if($mainTableOwnerID=="Last Year Rev")
		$ownerIdValue=$value;
	$xt->assign("Last_Year_Rev_value",$value);
	if(!$pageObject->isAppearOnTabs("Last Year Rev"))
		$xt->assign("Last_Year_Rev_fieldblock",true);
	else
		$xt->assign("Last_Year_Rev_tabfieldblock",true);
////////////////////////////////////////////
//Prior Year Rev - 
	
	$value = $pageObject->showDBValue("Prior Year Rev", $data, $keylink);
	if($mainTableOwnerID=="Prior Year Rev")
		$ownerIdValue=$value;
	$xt->assign("Prior_Year_Rev_value",$value);
	if(!$pageObject->isAppearOnTabs("Prior Year Rev"))
		$xt->assign("Prior_Year_Rev_fieldblock",true);
	else
		$xt->assign("Prior_Year_Rev_tabfieldblock",true);
////////////////////////////////////////////
//Last Year Rank - 
	
	$value = $pageObject->showDBValue("Last Year Rank", $data, $keylink);
	if($mainTableOwnerID=="Last Year Rank")
		$ownerIdValue=$value;
	$xt->assign("Last_Year_Rank_value",$value);
	if(!$pageObject->isAppearOnTabs("Last Year Rank"))
		$xt->assign("Last_Year_Rank_fieldblock",true);
	else
		$xt->assign("Last_Year_Rank_tabfieldblock",true);
////////////////////////////////////////////
//YTD Closing - 
	
	$value = $pageObject->showDBValue("YTD Closing", $data, $keylink);
	if($mainTableOwnerID=="YTD Closing")
		$ownerIdValue=$value;
	$xt->assign("YTD_Closing_value",$value);
	if(!$pageObject->isAppearOnTabs("YTD Closing"))
		$xt->assign("YTD_Closing_fieldblock",true);
	else
		$xt->assign("YTD_Closing_tabfieldblock",true);
////////////////////////////////////////////
//Last Year Closing - 
	
	$value = $pageObject->showDBValue("Last Year Closing", $data, $keylink);
	if($mainTableOwnerID=="Last Year Closing")
		$ownerIdValue=$value;
	$xt->assign("Last_Year_Closing_value",$value);
	if(!$pageObject->isAppearOnTabs("Last Year Closing"))
		$xt->assign("Last_Year_Closing_fieldblock",true);
	else
		$xt->assign("Last_Year_Closing_tabfieldblock",true);
////////////////////////////////////////////
//YTD IBC - 
	
	$value = $pageObject->showDBValue("YTD IBC", $data, $keylink);
	if($mainTableOwnerID=="YTD IBC")
		$ownerIdValue=$value;
	$xt->assign("YTD_IBC_value",$value);
	if(!$pageObject->isAppearOnTabs("YTD IBC"))
		$xt->assign("YTD_IBC_fieldblock",true);
	else
		$xt->assign("YTD_IBC_tabfieldblock",true);
////////////////////////////////////////////
//YTD Engagements - 
	
	$value = $pageObject->showDBValue("YTD Engagements", $data, $keylink);
	if($mainTableOwnerID=="YTD Engagements")
		$ownerIdValue=$value;
	$xt->assign("YTD_Engagements_value",$value);
	if(!$pageObject->isAppearOnTabs("YTD Engagements"))
		$xt->assign("YTD_Engagements_fieldblock",true);
	else
		$xt->assign("YTD_Engagements_tabfieldblock",true);
////////////////////////////////////////////
//Total Current Engagments - 
	
	$value = $pageObject->showDBValue("Total Current Engagments", $data, $keylink);
	if($mainTableOwnerID=="Total Current Engagments")
		$ownerIdValue=$value;
	$xt->assign("Total_Current_Engagments_value",$value);
	if(!$pageObject->isAppearOnTabs("Total Current Engagments"))
		$xt->assign("Total_Current_Engagments_fieldblock",true);
	else
		$xt->assign("Total_Current_Engagments_tabfieldblock",true);
////////////////////////////////////////////
//# Wheelhouse - 
	
	$value = $pageObject->showDBValue("# Wheelhouse", $data, $keylink);
	if($mainTableOwnerID=="# Wheelhouse")
		$ownerIdValue=$value;
	$xt->assign("__Wheelhouse_value",$value);
	if(!$pageObject->isAppearOnTabs("# Wheelhouse"))
		$xt->assign("__Wheelhouse_fieldblock",true);
	else
		$xt->assign("__Wheelhouse_tabfieldblock",true);
////////////////////////////////////////////
//# Speculative - 
	
	$value = $pageObject->showDBValue("# Speculative", $data, $keylink);
	if($mainTableOwnerID=="# Speculative")
		$ownerIdValue=$value;
	$xt->assign("__Speculative_value",$value);
	if(!$pageObject->isAppearOnTabs("# Speculative"))
		$xt->assign("__Speculative_fieldblock",true);
	else
		$xt->assign("__Speculative_tabfieldblock",true);
////////////////////////////////////////////
//# Minimum - 
	
	$value = $pageObject->showDBValue("# Minimum", $data, $keylink);
	if($mainTableOwnerID=="# Minimum")
		$ownerIdValue=$value;
	$xt->assign("__Minimum_value",$value);
	if(!$pageObject->isAppearOnTabs("# Minimum"))
		$xt->assign("__Minimum_fieldblock",true);
	else
		$xt->assign("__Minimum_tabfieldblock",true);
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
		$options['masterTable'] = "bankers";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "bankers";
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
	$strTableName = "bankers";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='bankers_edit.php?".$editlink."'\"");

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
