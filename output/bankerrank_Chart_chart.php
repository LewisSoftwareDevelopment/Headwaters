<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/bankerrank_Chart_variables.php");

if(!isLogged())
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

if(isLoggedAsGuest())
{
	$_SESSION["MyURL"] = $_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
}

if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	echo "<p>"."You don't have permissions to access this table"." <a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}

//	process request data, fill session variables

if(!count($_POST) && !count($_GET))
{
	$sess_unset = array();
	foreach($_SESSION as $key=>$value)
		if(substr($key,0,strlen($strTableName)+1)==$strTableName."_" &&
			strpos(substr($key,strlen($strTableName)+1),"_")===false)
			$sess_unset[] = $key;
	foreach($sess_unset as $key)
		unset($_SESSION[$key]);
}

include('include/xtempl.php');
include('classes/runnerpage.php');
include('classes/searchclause.php');
include("classes/searchpanel.php");
include("classes/searchpanelsimple.php");	
include("classes/searchcontrol.php");
include("classes/panelsearchcontrol.php");	

$xt = new Xtempl();

$layout = new TLayout("chart6","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["center"] = array();
$layout->containers["message"] = array();

$layout->containers["message"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->skins["message"] = "2";
$layout->blocks["center"][] = "message";
$layout->skins["pageinfo"] = "1";
$layout->blocks["center"][] = "pageinfo";
$layout->containers["form"] = array();

$layout->containers["form"][] = array("name"=>"chart","block"=>"","substyle"=>1);


$layout->skins["form"] = "2";
$layout->blocks["center"][] = "form";$layout->blocks["right"] = array();
$layout->containers["searchpanel"] = array();

$layout->containers["searchpanel"][] = array("name"=>"vsearch1","block"=>"searchform_block","substyle"=>1);


$layout->containers["searchpanel"][] = array("name"=>"vsearch2","block"=>"searchform_block","substyle"=>1);


$layout->containers["searchpanel"][] = array("name"=>"searchpanel","block"=>"searchPanel","substyle"=>1);


$layout->skins["searchpanel"] = "3";
$layout->blocks["right"][] = "searchpanel";
$layout->containers["menu"] = array();

$layout->containers["menu"][] = array("name"=>"vmenu","block"=>"menu_block","substyle"=>1);


$layout->skins["menu"] = "menu";
$layout->blocks["right"][] = "menu";$layout->blocks["top"] = array();
$layout->containers["toplinks"] = array();


$layout->containers["toplinks"][] = array("name"=>"toplinks_advsearch","block"=>"asearch_link","substyle"=>1);





$layout->containers["toplinks"][] = array("name"=>"loggedas","block"=>"security_block","substyle"=>1);



$layout->skins["toplinks"] = "2";
$layout->blocks["top"][] = "toplinks";$page_layouts["bankerrank_Chart_chart"] = $layout;


$sessionPrefix = $strTableName;

if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
// assign an id
$xt->assign("id",$id);

//array of params for, most of them used by searchPanel class
$params = array("id" => $id,
				"tName" => $strTableName,
				"pageType" => PAGE_CHART,
				"shortTableName" => "bankerrank_Chart",
				"isGroupSecurity" => $isGroupSecurity,
				"isDisplayLoading" => $gSettings->displayLoading());
$params["xt"] = &$xt;
			

$pageObject = new RunnerPage($params);

//	Before Process event
if($eventObj->exists("BeforeProcessChart"))
	$eventObj->BeforeProcessChart($conn, $pageObject);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$pageObject->jsSettings['tableSettings'][$pageObject->tName]['isUsedSearchFor'] = $pageObject->searchClauseObj->isUsedSearchFor;
$agregateFields = $pageObject->pSet->getListOfFieldsByExprType(true);
$pageObject->searchClauseObj->haveAgregateFields = count($agregateFields) > 0;
$_SESSION[$sessionPrefix.'_advsearch'] = serialize($pageObject->searchClauseObj);

// add button events if exist
$pageObject->addButtonHandlers();

$pageObject->addCommonJs();

$pageObject->commonAssign();

if($pageObject->isShowMenu())
	$xt->assign("menu_block",true);
	

$xt->assign("security_block", true);

$xt->assign("username", htmlspecialchars($_SESSION["UserName"]));
$xt->assign("logoutlink_attrs", "onclick=\"window.location.href='login.php?a=logout';return false;\"");
$xt->assign("guestloginlink_attrs", "onclick=\"window.location.href='login.php';return false;\"");

$xt->assign("loggedas_message", !isLoggedAsGuest()); 
$xt->assign("guestloginbutton", isLoggedAsGuest());
$xt->assign("logoutbutton", isSingleSign() && !isLoggedAsGuest());


if($pageObject->isDynamicPerm && IsAdmin()) {
	$xt->assign("adminarea_link", true);
	$xt->assign("adminarealink_attrs", "id=\"adminArea".$id."\"");
}

$xt->assign("changepwd_link",$_SESSION["AccessLevel"] != ACCESS_LEVEL_GUEST);
$xt->assign("changepwdlink_attrs","onclick=\"window.location.href='changepwd.php';return false;\"");


$xt->assign("chart_block",true);
$xt->assign("asearch_link",true);
$xt->assign("asearchlink_attrs","id=\"asearch_".$id."\" name=\"asearch_".$id."\" onclick=\"window.location.href='bankerrank_Chart_search.php';return false;\"");
$xt->assign("search_records_block",true);
$xt->assign("exportpdflink_attrs","onclick='chart.saveAsPDF();'");
$xt->assign("searchform_showall",true);
$xt->assign("showallbutton_attrs","onclick=\"window.location.href='bankerrank_Chart_chart.php?a=showall';\"");
$xt->assign("advsearchlink_attrs", "id=\"advButton".$id."\"");

if(!GetChartXML("bankerrank_Chart"))
	$xt->assign("chart_block",false);

// create searchPanel
$args = array();
$args['pageObj'] = &$pageObject;
$searchPanelObj = new SearchPanelSimple($args);
$searchPanelObj->buildSearchPanel('adv_search_panel');
$xt->assign("searchPanel", true);

$pageObject->body['begin'] .= "<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
$pageObject->body['begin'] .= ($pageObject->isDisplayLoading ? "<script type=\"text/javascript\">Runner.runLoading();</script>" : "");
if (!isMobile())
	$pageObject->body['begin'] .= "<div id=\"search_suggest\" class=\"search_suggest\"></div>";

// assign body end in such way, to prevent collisions with flyId increment 
$pageObject->body["end"] .= "<script>".$pageObject->PrepareJs()."</script>";

// assign body end
$pageObject->body['end'] = array();
$pageObject->body['end']["method"] = "assignBodyEnd";
$pageObject->body['end']["object"] = &$pageObject;

$xt->assignbyref('body', $pageObject->body);

$xt->assign("style_block",true);
$xt->assign("shiftstyle_block", true);
// end assign for lheader

if($eventObj->exists("BeforeShowChart"))
	$eventObj->BeforeShowChart($xt, $pageObject->templatefile, $pageObject);

$xt->display($pageObject->templatefile);
?>
