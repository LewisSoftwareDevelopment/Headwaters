<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/inmarketloi_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["inmarketloi_view"] = $layout;




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
	header("Location: inmarketloi_list.php?a=return");
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
$arr['fName'] = "Jan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Jan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Feb";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Feb");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Mar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Mar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "April";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("April");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "May";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("May");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "June";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("June");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "July";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("July");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Aug";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Aug");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Sep";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Sep");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Oct";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Oct");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Nov";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Nov");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "Dec";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("Dec");
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
//Jan - 
	
	$value = $pageObject->showDBValue("Jan", $data, $keylink);
	if($mainTableOwnerID=="Jan")
		$ownerIdValue=$value;
	$xt->assign("Jan_value",$value);
	if(!$pageObject->isAppearOnTabs("Jan"))
		$xt->assign("Jan_fieldblock",true);
	else
		$xt->assign("Jan_tabfieldblock",true);
////////////////////////////////////////////
//Feb - 
	
	$value = $pageObject->showDBValue("Feb", $data, $keylink);
	if($mainTableOwnerID=="Feb")
		$ownerIdValue=$value;
	$xt->assign("Feb_value",$value);
	if(!$pageObject->isAppearOnTabs("Feb"))
		$xt->assign("Feb_fieldblock",true);
	else
		$xt->assign("Feb_tabfieldblock",true);
////////////////////////////////////////////
//Mar - 
	
	$value = $pageObject->showDBValue("Mar", $data, $keylink);
	if($mainTableOwnerID=="Mar")
		$ownerIdValue=$value;
	$xt->assign("Mar_value",$value);
	if(!$pageObject->isAppearOnTabs("Mar"))
		$xt->assign("Mar_fieldblock",true);
	else
		$xt->assign("Mar_tabfieldblock",true);
////////////////////////////////////////////
//April - 
	
	$value = $pageObject->showDBValue("April", $data, $keylink);
	if($mainTableOwnerID=="April")
		$ownerIdValue=$value;
	$xt->assign("April_value",$value);
	if(!$pageObject->isAppearOnTabs("April"))
		$xt->assign("April_fieldblock",true);
	else
		$xt->assign("April_tabfieldblock",true);
////////////////////////////////////////////
//May - 
	
	$value = $pageObject->showDBValue("May", $data, $keylink);
	if($mainTableOwnerID=="May")
		$ownerIdValue=$value;
	$xt->assign("May_value",$value);
	if(!$pageObject->isAppearOnTabs("May"))
		$xt->assign("May_fieldblock",true);
	else
		$xt->assign("May_tabfieldblock",true);
////////////////////////////////////////////
//June - 
	
	$value = $pageObject->showDBValue("June", $data, $keylink);
	if($mainTableOwnerID=="June")
		$ownerIdValue=$value;
	$xt->assign("June_value",$value);
	if(!$pageObject->isAppearOnTabs("June"))
		$xt->assign("June_fieldblock",true);
	else
		$xt->assign("June_tabfieldblock",true);
////////////////////////////////////////////
//July - 
	
	$value = $pageObject->showDBValue("July", $data, $keylink);
	if($mainTableOwnerID=="July")
		$ownerIdValue=$value;
	$xt->assign("July_value",$value);
	if(!$pageObject->isAppearOnTabs("July"))
		$xt->assign("July_fieldblock",true);
	else
		$xt->assign("July_tabfieldblock",true);
////////////////////////////////////////////
//Aug - 
	
	$value = $pageObject->showDBValue("Aug", $data, $keylink);
	if($mainTableOwnerID=="Aug")
		$ownerIdValue=$value;
	$xt->assign("Aug_value",$value);
	if(!$pageObject->isAppearOnTabs("Aug"))
		$xt->assign("Aug_fieldblock",true);
	else
		$xt->assign("Aug_tabfieldblock",true);
////////////////////////////////////////////
//Sep - 
	
	$value = $pageObject->showDBValue("Sep", $data, $keylink);
	if($mainTableOwnerID=="Sep")
		$ownerIdValue=$value;
	$xt->assign("Sep_value",$value);
	if(!$pageObject->isAppearOnTabs("Sep"))
		$xt->assign("Sep_fieldblock",true);
	else
		$xt->assign("Sep_tabfieldblock",true);
////////////////////////////////////////////
//Oct - 
	
	$value = $pageObject->showDBValue("Oct", $data, $keylink);
	if($mainTableOwnerID=="Oct")
		$ownerIdValue=$value;
	$xt->assign("Oct_value",$value);
	if(!$pageObject->isAppearOnTabs("Oct"))
		$xt->assign("Oct_fieldblock",true);
	else
		$xt->assign("Oct_tabfieldblock",true);
////////////////////////////////////////////
//Nov - 
	
	$value = $pageObject->showDBValue("Nov", $data, $keylink);
	if($mainTableOwnerID=="Nov")
		$ownerIdValue=$value;
	$xt->assign("Nov_value",$value);
	if(!$pageObject->isAppearOnTabs("Nov"))
		$xt->assign("Nov_fieldblock",true);
	else
		$xt->assign("Nov_tabfieldblock",true);
////////////////////////////////////////////
//Dec - 
	
	$value = $pageObject->showDBValue("Dec", $data, $keylink);
	if($mainTableOwnerID=="Dec")
		$ownerIdValue=$value;
	$xt->assign("Dec_value",$value);
	if(!$pageObject->isAppearOnTabs("Dec"))
		$xt->assign("Dec_fieldblock",true);
	else
		$xt->assign("Dec_tabfieldblock",true);

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
		$options['masterTable'] = "inmarketloi";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "inmarketloi";
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
	$strTableName = "inmarketloi";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='inmarketloi_edit.php?".$editlink."'\"");

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
