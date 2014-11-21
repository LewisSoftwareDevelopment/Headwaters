<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");

add_nocache_headers();

include("include/Snapshot_variables.php");

if(!isLogged())
{ 
	$_SESSION["MyURL"] = $_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

if(isLoggedAsGuest())
{
	$_SESSION["MyURL"] = $_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
}

if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"], "Search"))
{
	echo "<p>"."You don't have permissions to access this table"." <a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}

include('include/xtempl.php');
include('classes/runnerpage.php');
include('classes/searchclause.php');
include("classes/searchpanel.php");
include("classes/searchpanelsimple.php");	
include("classes/searchcontrol.php");
include("classes/panelsearchcontrol.php");	

$xt = new Xtempl();

$layout = new TLayout("report6","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["center"] = array();
$layout->containers["message"] = array();

$layout->containers["message"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->skins["message"] = "2";
$layout->blocks["center"][] = "message";
$layout->containers["pageinfo"] = array();

$layout->containers["pageinfo"][] = array("name"=>"details_found","block"=>"details_block","substyle"=>1);


$layout->containers["pageinfo"][] = array("name"=>"page_of","block"=>"pages_block","substyle"=>1);


$layout->containers["pageinfo"][] = array("name"=>"recsperpage","block"=>"recordspp_block","substyle"=>1);


$layout->skins["pageinfo"] = "1";
$layout->blocks["center"][] = "pageinfo";
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"report","block"=>"","substyle"=>1);


$layout->skins["grid"] = "grid";
$layout->blocks["center"][] = "grid";
$layout->containers["pagination"] = array();

$layout->containers["pagination"][] = array("name"=>"pagination","block"=>"pagination_block","substyle"=>1);


$layout->skins["pagination"] = "2";
$layout->blocks["center"][] = "pagination";
$layout->containers["form"] = array();

$layout->containers["form"][] = array("name"=>"reportvariable","block"=>"","substyle"=>1);


$layout->skins["form"] = "empty";
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

$layout->containers["toplinks"][] = array("name"=>"toplinks_print","block"=>"prints_block","substyle"=>1);


$layout->containers["toplinks"][] = array("name"=>"toplinks_advsearch","block"=>"asearch_link","substyle"=>1);




$layout->containers["toplinks"][] = array("name"=>"toplinks_export_links","block"=>"export_link","substyle"=>1);


$layout->containers["toplinks"][] = array("name"=>"loggedas","block"=>"security_block","substyle"=>1);



$layout->skins["toplinks"] = "2";
$layout->blocks["top"][] = "toplinks";$page_layouts["Snapshot_report"] = $layout;


$sessionPrefix = $strTableName;

$cross_table=0;

if($cross_table)
{
	include("classes/crosstable_report.php");
//	include("include/reportfunctions.php");
	if(postvalue("group_func")!="")
		$_SESSION[$sessionPrefix."_group_func"]=postvalue("group_func");
	if(postvalue("field")!="")
		$_SESSION[$sessionPrefix."_field"]=postvalue("field");
	if(postvalue("axis_x")!="")
		$_SESSION[$sessionPrefix."_gr_x"]=postvalue("axis_x");
	if(postvalue("axis_y")!="")
		$_SESSION[$sessionPrefix."_gr_y"]=postvalue("axis_y");
	if(postvalue("rname")!="")
		$_SESSION[$sessionPrefix."_rname"]=postvalue("rname");
}
if(!postvalue("crosstable_refresh"))
{
	/*if(!postvalue("rname"))
	{
	?>
	<script>
	var report_filename="Snapshot_report.php"
	</script>
	<?php
	}
	else
	{
	?>
	<script>
	var report_filename="dreport.php"
	</script>
	<?php
	}*/
	if(!$_SESSION[$sessionPrefix."_rname"])
	{
	$xt->assign("report_filename",'<script>
		var report_filename="Snapshot_report.php"
		</script>');
	
	}
	else
	{
	
	$xt->assign("report_filename",'<script>
		var report_filename="dreport.php"
		</script>');
	}
}
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
	
// assign an id
$xt->assign("id",$id);

//	process reqest data, fill session variables
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

if(!$_SESSION[$sessionPrefix."_pagenumber"])
	$_SESSION[$sessionPrefix."_pagenumber"]=1;

if(!$_SESSION[$sessionPrefix."_pagesize"])
{
		$_SESSION[$sessionPrefix."_pagesize"] = 20;
}

if(isset($_REQUEST["goto"]))
	$_SESSION[$sessionPrefix."_pagenumber"]=intval($_REQUEST["goto"]);

//array of params for, most of them used by searchPanel class
$params = array("id" => $id,
				"mode" => LIST_SIMPLE,
				"tName" => $strTableName,
				"pageType" => PAGE_REPORT,
				"isDisplayLoading" => $gSettings->displayLoading(),
				"isGroupSecurity" => $isGroupSecurity,
				"arrRecsPerPage" => $gSettings->getRecordsPerPageArray(),
				"arrGroupsPerPage" => $gSettings->getGroupsPerPageArray(),
				"reportGroupFields" => $gSettings->isReportWithGroups());
$params["xt"] = &$xt;


$pageObject = new RunnerPage($params);

$pageObject->searchClauseObj->parseRequest();
$_SESSION[$pageObject->sessionPrefix.'_advsearch'] = serialize($pageObject->searchClauseObj);	
if (isset($_SESSION[$pageObject->sessionPrefix.'_advsearch']))
{
	$pageObject->searchClauseObj = unserialize($_SESSION[$pageObject->sessionPrefix.'_advsearch']);
	$pageObject->searchClauseObj->cipherer = $pageObject->cipherer;
}

$pageObject->jsSettings['tableSettings'][$pageObject->tName]['isUsedSearchFor'] = $pageObject->searchClauseObj->isUsedSearchFor;

// add button events if exist
$pageObject->addButtonHandlers();

$pageObject->addCommonJs();

$pageObject->commonAssign();

//	Before Process event
if($eventObj->exists("BeforeProcessReport"))
	$eventObj->BeforeProcessReport($conn, $pageObject);




$pagestart = ($_SESSION[$sessionPrefix."_pagenumber"]-1)*$_SESSION[$sessionPrefix."_pagesize"];
$pagelen = $_SESSION[$sessionPrefix."_pagesize"];

////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['a']) && $_REQUEST['a'] == 'advsearch')
	$search = true;
else
	$search = false;

include_once('classes/reportlib.php');

// array with all params
$params = array();

$params['sessionPrefix'] = $sessionPrefix;
// report table info
$params['tName'] = $strTableName;
$params['shortTName'] = "Snapshot";
$params['repGroupFieldsCount'] = 0;
$params['repPageSummary'] = 0;
$params['repGlobalSummary'] = 0;
$params['repLayout'] = 6;
$params['showGroupSummaryCount'] = 0;
$params['repShowDet'] = 1;

// report field info
$repGroupFields = array();
$params['repGroupFields'] = &$repGroupFields;

// current table key fields
$params['tKeyFields'] = $gSettings->getTableKeys();
// if any field used for totals
$params['isExistTotalFields'] = false;
// table fields list


$params['fieldsArr'] = array();
$fieldArr = array();
$fieldArr['name'] = "mytdnetper";
//'fName' added for maps
$fieldArr['fName'] = "mytdnetper";
$fieldArr['label'] = "Mytdnetper";
$fieldArr['goodName'] = "mytdnetper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "mytdgrossper";
//'fName' added for maps
$fieldArr['fName'] = "mytdgrossper";
$fieldArr['label'] = "Mytdgrossper";
$fieldArr['goodName'] = "mytdgrossper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ytdnetper";
//'fName' added for maps
$fieldArr['fName'] = "ytdnetper";
$fieldArr['label'] = "Ytdnetper";
$fieldArr['goodName'] = "ytdnetper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ytdgrossper";
//'fName' added for maps
$fieldArr['fName'] = "ytdgrossper";
$fieldArr['label'] = "Ytdgrossper";
$fieldArr['goodName'] = "ytdgrossper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELOct";
//'fName' added for maps
$fieldArr['fName'] = "ELOct";
$fieldArr['label'] = "ELOct";
$fieldArr['goodName'] = "ELOct";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLDec";
//'fName' added for maps
$fieldArr['fName'] = "IMLDec";
$fieldArr['label'] = "IMLDec";
$fieldArr['goodName'] = "IMLDec";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLNov";
//'fName' added for maps
$fieldArr['fName'] = "IMLNov";
$fieldArr['label'] = "IMLNov";
$fieldArr['goodName'] = "IMLNov";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLOct";
//'fName' added for maps
$fieldArr['fName'] = "IMLOct";
$fieldArr['label'] = "IMLOct";
$fieldArr['goodName'] = "IMLOct";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLSep";
//'fName' added for maps
$fieldArr['fName'] = "IMLSep";
$fieldArr['label'] = "IMLSep";
$fieldArr['goodName'] = "IMLSep";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLAug";
//'fName' added for maps
$fieldArr['fName'] = "IMLAug";
$fieldArr['label'] = "IMLAug";
$fieldArr['goodName'] = "IMLAug";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLJuly";
//'fName' added for maps
$fieldArr['fName'] = "IMLJuly";
$fieldArr['label'] = "IMLJuly";
$fieldArr['goodName'] = "IMLJuly";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLJune";
//'fName' added for maps
$fieldArr['fName'] = "IMLJune";
$fieldArr['label'] = "IMLJune";
$fieldArr['goodName'] = "IMLJune";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLMay";
//'fName' added for maps
$fieldArr['fName'] = "IMLMay";
$fieldArr['label'] = "IMLMay";
$fieldArr['goodName'] = "IMLMay";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLApril";
//'fName' added for maps
$fieldArr['fName'] = "IMLApril";
$fieldArr['label'] = "IMLApril";
$fieldArr['goodName'] = "IMLApril";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLMar";
//'fName' added for maps
$fieldArr['fName'] = "IMLMar";
$fieldArr['label'] = "IMLMar";
$fieldArr['goodName'] = "IMLMar";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLeb";
//'fName' added for maps
$fieldArr['fName'] = "IMLeb";
$fieldArr['label'] = "IMLeb";
$fieldArr['goodName'] = "IMLeb";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IMLJan";
//'fName' added for maps
$fieldArr['fName'] = "IMLJan";
$fieldArr['label'] = "IMLJan";
$fieldArr['goodName'] = "IMLJan";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELDec";
//'fName' added for maps
$fieldArr['fName'] = "ELDec";
$fieldArr['label'] = "ELDec";
$fieldArr['goodName'] = "ELDec";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELJan";
//'fName' added for maps
$fieldArr['fName'] = "ELJan";
$fieldArr['label'] = "ELJan";
$fieldArr['goodName'] = "ELJan";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELFeb";
//'fName' added for maps
$fieldArr['fName'] = "ELFeb";
$fieldArr['label'] = "ELFeb";
$fieldArr['goodName'] = "ELFeb";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELMar";
//'fName' added for maps
$fieldArr['fName'] = "ELMar";
$fieldArr['label'] = "ELMar";
$fieldArr['goodName'] = "ELMar";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELApril";
//'fName' added for maps
$fieldArr['fName'] = "ELApril";
$fieldArr['label'] = "ELApril";
$fieldArr['goodName'] = "ELApril";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELMay";
//'fName' added for maps
$fieldArr['fName'] = "ELMay";
$fieldArr['label'] = "ELMay";
$fieldArr['goodName'] = "ELMay";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELJune";
//'fName' added for maps
$fieldArr['fName'] = "ELJune";
$fieldArr['label'] = "ELJune";
$fieldArr['goodName'] = "ELJune";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELJuly";
//'fName' added for maps
$fieldArr['fName'] = "ELJuly";
$fieldArr['label'] = "ELJuly";
$fieldArr['goodName'] = "ELJuly";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELAug";
//'fName' added for maps
$fieldArr['fName'] = "ELAug";
$fieldArr['label'] = "ELAug";
$fieldArr['goodName'] = "ELAug";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELSep";
//'fName' added for maps
$fieldArr['fName'] = "ELSep";
$fieldArr['label'] = "ELSep";
$fieldArr['goodName'] = "ELSep";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELNov";
//'fName' added for maps
$fieldArr['fName'] = "ELNov";
$fieldArr['label'] = "ELNov";
$fieldArr['goodName'] = "ELNov";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Live";
//'fName' added for maps
$fieldArr['fName'] = "Live";
$fieldArr['label'] = "Live";
$fieldArr['goodName'] = "Live";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "InMarketLOI";
//'fName' added for maps
$fieldArr['fName'] = "InMarketLOI";
$fieldArr['label'] = "In Market LOI";
$fieldArr['goodName'] = "InMarketLOI";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Closed";
//'fName' added for maps
$fieldArr['fName'] = "Closed";
$fieldArr['label'] = "Closed";
$fieldArr['goodName'] = "Closed";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL";
//'fName' added for maps
$fieldArr['fName'] = "EL";
$fieldArr['label'] = "EL";
$fieldArr['goodName'] = "EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC";
//'fName' added for maps
$fieldArr['fName'] = "IBC";
$fieldArr['label'] = "IBC";
$fieldArr['goodName'] = "IBC";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda12";
//'fName' added for maps
$fieldArr['fName'] = "nda12";
$fieldArr['label'] = "Nda12";
$fieldArr['goodName'] = "nda12";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "PreMarket";
//'fName' added for maps
$fieldArr['fName'] = "PreMarket";
$fieldArr['label'] = "Pre Market";
$fieldArr['goodName'] = "PreMarket";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "InMarket";
//'fName' added for maps
$fieldArr['fName'] = "InMarket";
$fieldArr['label'] = "In Market";
$fieldArr['goodName'] = "InMarket";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "UNderLOI";
//'fName' added for maps
$fieldArr['fName'] = "UNderLOI";
$fieldArr['label'] = "UNder LOI";
$fieldArr['goodName'] = "UNderLOI";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda11";
//'fName' added for maps
$fieldArr['fName'] = "nda11";
$fieldArr['label'] = "Nda11";
$fieldArr['goodName'] = "nda11";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Inactive";
//'fName' added for maps
$fieldArr['fName'] = "Inactive";
$fieldArr['label'] = "Inactive";
$fieldArr['goodName'] = "Inactive";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "OnHold";
//'fName' added for maps
$fieldArr['fName'] = "OnHold";
$fieldArr['label'] = "On Hold";
$fieldArr['goodName'] = "OnHold";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Wheelhouse";
//'fName' added for maps
$fieldArr['fName'] = "Wheelhouse";
$fieldArr['label'] = "Wheelhouse";
$fieldArr['goodName'] = "Wheelhouse";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda10";
//'fName' added for maps
$fieldArr['fName'] = "nda10";
$fieldArr['label'] = "Nda10";
$fieldArr['goodName'] = "nda10";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Speculative";
//'fName' added for maps
$fieldArr['fName'] = "Speculative";
$fieldArr['label'] = "Speculative";
$fieldArr['goodName'] = "Speculative";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Minimum";
//'fName' added for maps
$fieldArr['fName'] = "Minimum";
$fieldArr['label'] = "Minimum";
$fieldArr['goodName'] = "Minimum";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Business Services";
//'fName' added for maps
$fieldArr['fName'] = "Business Services";
$fieldArr['label'] = "Business Services";
$fieldArr['goodName'] = "Business_Services";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda9";
//'fName' added for maps
$fieldArr['fName'] = "nda9";
$fieldArr['label'] = "Nda9";
$fieldArr['goodName'] = "nda9";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Consumer Products";
//'fName' added for maps
$fieldArr['fName'] = "Consumer Products";
$fieldArr['label'] = "Consumer Products";
$fieldArr['goodName'] = "Consumer_Products";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Energy & Natural Resources";
//'fName' added for maps
$fieldArr['fName'] = "Energy & Natural Resources";
$fieldArr['label'] = "Energy & Natural Resources";
$fieldArr['goodName'] = "Energy___Natural_Resources";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Financial Services";
//'fName' added for maps
$fieldArr['fName'] = "Financial Services";
$fieldArr['label'] = "Financial Services";
$fieldArr['goodName'] = "Financial_Services";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda8";
//'fName' added for maps
$fieldArr['fName'] = "nda8";
$fieldArr['label'] = "Nda8";
$fieldArr['goodName'] = "nda8";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Industrials";
//'fName' added for maps
$fieldArr['fName'] = "Industrials";
$fieldArr['label'] = "Industrials";
$fieldArr['goodName'] = "Industrials";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Healthcare";
//'fName' added for maps
$fieldArr['fName'] = "Healthcare";
$fieldArr['label'] = "Healthcare";
$fieldArr['goodName'] = "Healthcare";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Technology";
//'fName' added for maps
$fieldArr['fName'] = "Technology";
$fieldArr['label'] = "Technology";
$fieldArr['goodName'] = "Technology";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda7";
//'fName' added for maps
$fieldArr['fName'] = "nda7";
$fieldArr['label'] = "Nda7";
$fieldArr['goodName'] = "nda7";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Entertainment";
//'fName' added for maps
$fieldArr['fName'] = "Entertainment";
$fieldArr['label'] = "Entertainment";
$fieldArr['goodName'] = "Entertainment";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Real Estate";
//'fName' added for maps
$fieldArr['fName'] = "Real Estate";
$fieldArr['label'] = "Real Estate";
$fieldArr['goodName'] = "Real_Estate";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Business Services EL";
//'fName' added for maps
$fieldArr['fName'] = "Business Services EL";
$fieldArr['label'] = "Business Services EL";
$fieldArr['goodName'] = "Business_Services_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda6";
//'fName' added for maps
$fieldArr['fName'] = "nda6";
$fieldArr['label'] = "Nda6";
$fieldArr['goodName'] = "nda6";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Consumer EL";
//'fName' added for maps
$fieldArr['fName'] = "Consumer EL";
$fieldArr['label'] = "Consumer EL";
$fieldArr['goodName'] = "Consumer_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBSreferrals";
//'fName' added for maps
$fieldArr['fName'] = "IBSreferrals";
$fieldArr['label'] = "IBSreferrals";
$fieldArr['goodName'] = "IBSreferrals";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Ennergy EL";
//'fName' added for maps
$fieldArr['fName'] = "Ennergy EL";
$fieldArr['label'] = "Ennergy EL";
$fieldArr['goodName'] = "Ennergy_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda5";
//'fName' added for maps
$fieldArr['fName'] = "nda5";
$fieldArr['label'] = "Nda5";
$fieldArr['goodName'] = "nda5";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBSibc";
//'fName' added for maps
$fieldArr['fName'] = "IBSibc";
$fieldArr['label'] = "IBSibc";
$fieldArr['goodName'] = "IBSibc";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Financial EL";
//'fName' added for maps
$fieldArr['fName'] = "Financial EL";
$fieldArr['label'] = "Financial EL";
$fieldArr['goodName'] = "Financial_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBSel";
//'fName' added for maps
$fieldArr['fName'] = "IBSel";
$fieldArr['label'] = "IBSel";
$fieldArr['goodName'] = "IBSel";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda4";
//'fName' added for maps
$fieldArr['fName'] = "nda4";
$fieldArr['label'] = "Nda4";
$fieldArr['goodName'] = "nda4";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Industrials EL";
//'fName' added for maps
$fieldArr['fName'] = "Industrials EL";
$fieldArr['label'] = "Industrials EL";
$fieldArr['goodName'] = "Industrials_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Healthcare EL";
//'fName' added for maps
$fieldArr['fName'] = "Healthcare EL";
$fieldArr['label'] = "Healthcare EL";
$fieldArr['goodName'] = "Healthcare_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TMT EL";
//'fName' added for maps
$fieldArr['fName'] = "TMT EL";
$fieldArr['label'] = "TMT EL";
$fieldArr['goodName'] = "TMT_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda3";
//'fName' added for maps
$fieldArr['fName'] = "nda3";
$fieldArr['label'] = "Nda3";
$fieldArr['goodName'] = "nda3";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Entertainment EL";
//'fName' added for maps
$fieldArr['fName'] = "Entertainment EL";
$fieldArr['label'] = "Entertainment EL";
$fieldArr['goodName'] = "Entertainment_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "RealEstate EL";
//'fName' added for maps
$fieldArr['fName'] = "RealEstate EL";
$fieldArr['label'] = "RealEstate EL";
$fieldArr['goodName'] = "RealEstate_EL";
$fieldArr['repPage'] = "1";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda2";
//'fName' added for maps
$fieldArr['fName'] = "nda2";
$fieldArr['label'] = "Nda2";
$fieldArr['goodName'] = "nda2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "nda1";
//'fName' added for maps
$fieldArr['fName'] = "nda1";
$fieldArr['label'] = "Nda1";
$fieldArr['goodName'] = "nda1";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "NDAYTD";
//'fName' added for maps
$fieldArr['fName'] = "NDAYTD";
$fieldArr['label'] = "NDAYTD";
$fieldArr['goodName'] = "NDAYTD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC12";
//'fName' added for maps
$fieldArr['fName'] = "IBC12";
$fieldArr['label'] = "IBC12";
$fieldArr['goodName'] = "IBC12";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC11";
//'fName' added for maps
$fieldArr['fName'] = "IBC11";
$fieldArr['label'] = "IBC11";
$fieldArr['goodName'] = "IBC11";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC10";
//'fName' added for maps
$fieldArr['fName'] = "IBC10";
$fieldArr['label'] = "IBC10";
$fieldArr['goodName'] = "IBC10";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC9";
//'fName' added for maps
$fieldArr['fName'] = "IBC9";
$fieldArr['label'] = "IBC9";
$fieldArr['goodName'] = "IBC9";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC8";
//'fName' added for maps
$fieldArr['fName'] = "IBC8";
$fieldArr['label'] = "IBC8";
$fieldArr['goodName'] = "IBC8";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC7";
//'fName' added for maps
$fieldArr['fName'] = "IBC7";
$fieldArr['label'] = "IBC7";
$fieldArr['goodName'] = "IBC7";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC6";
//'fName' added for maps
$fieldArr['fName'] = "IBC6";
$fieldArr['label'] = "IBC6";
$fieldArr['goodName'] = "IBC6";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC5";
//'fName' added for maps
$fieldArr['fName'] = "IBC5";
$fieldArr['label'] = "IBC5";
$fieldArr['goodName'] = "IBC5";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC4";
//'fName' added for maps
$fieldArr['fName'] = "IBC4";
$fieldArr['label'] = "IBC4";
$fieldArr['goodName'] = "IBC4";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC3";
//'fName' added for maps
$fieldArr['fName'] = "IBC3";
$fieldArr['label'] = "IBC3";
$fieldArr['goodName'] = "IBC3";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC2";
//'fName' added for maps
$fieldArr['fName'] = "IBC2";
$fieldArr['label'] = "IBC2";
$fieldArr['goodName'] = "IBC2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBC1";
//'fName' added for maps
$fieldArr['fName'] = "IBC1";
$fieldArr['label'] = "IBC1";
$fieldArr['goodName'] = "IBC1";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL12";
//'fName' added for maps
$fieldArr['fName'] = "EL12";
$fieldArr['label'] = "EL12";
$fieldArr['goodName'] = "EL12";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL11";
//'fName' added for maps
$fieldArr['fName'] = "EL11";
$fieldArr['label'] = "EL11";
$fieldArr['goodName'] = "EL11";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL10";
//'fName' added for maps
$fieldArr['fName'] = "EL10";
$fieldArr['label'] = "EL10";
$fieldArr['goodName'] = "EL10";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL9";
//'fName' added for maps
$fieldArr['fName'] = "EL9";
$fieldArr['label'] = "EL9";
$fieldArr['goodName'] = "EL9";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL8";
//'fName' added for maps
$fieldArr['fName'] = "EL8";
$fieldArr['label'] = "EL8";
$fieldArr['goodName'] = "EL8";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "PPibc";
//'fName' added for maps
$fieldArr['fName'] = "PPibc";
$fieldArr['label'] = "PPibc";
$fieldArr['goodName'] = "PPibc";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL7";
//'fName' added for maps
$fieldArr['fName'] = "EL7";
$fieldArr['label'] = "EL7";
$fieldArr['goodName'] = "EL7";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "PPel";
//'fName' added for maps
$fieldArr['fName'] = "PPel";
$fieldArr['label'] = "PPel";
$fieldArr['goodName'] = "PPel";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL6";
//'fName' added for maps
$fieldArr['fName'] = "EL6";
$fieldArr['label'] = "EL6";
$fieldArr['goodName'] = "EL6";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CPibc";
//'fName' added for maps
$fieldArr['fName'] = "CPibc";
$fieldArr['label'] = "CPibc";
$fieldArr['goodName'] = "CPibc";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL5";
//'fName' added for maps
$fieldArr['fName'] = "EL5";
$fieldArr['label'] = "EL5";
$fieldArr['goodName'] = "EL5";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CPel";
//'fName' added for maps
$fieldArr['fName'] = "CPel";
$fieldArr['label'] = "CPel";
$fieldArr['goodName'] = "CPel";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL4";
//'fName' added for maps
$fieldArr['fName'] = "EL4";
$fieldArr['label'] = "EL4";
$fieldArr['goodName'] = "EL4";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MAibc";
//'fName' added for maps
$fieldArr['fName'] = "MAibc";
$fieldArr['label'] = "MAibc";
$fieldArr['goodName'] = "MAibc";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL3";
//'fName' added for maps
$fieldArr['fName'] = "EL3";
$fieldArr['label'] = "EL3";
$fieldArr['goodName'] = "EL3";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MAel";
//'fName' added for maps
$fieldArr['fName'] = "MAel";
$fieldArr['label'] = "MAel";
$fieldArr['goodName'] = "MAel";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL2";
//'fName' added for maps
$fieldArr['fName'] = "EL2";
$fieldArr['label'] = "EL2";
$fieldArr['goodName'] = "EL2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SCibc";
//'fName' added for maps
$fieldArr['fName'] = "SCibc";
$fieldArr['label'] = "SCibc";
$fieldArr['goodName'] = "SCibc";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL1";
//'fName' added for maps
$fieldArr['fName'] = "EL1";
$fieldArr['label'] = "EL1";
$fieldArr['goodName'] = "EL1";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SCel";
//'fName' added for maps
$fieldArr['fName'] = "SCel";
$fieldArr['label'] = "SCel";
$fieldArr['goodName'] = "SCel";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL12";
//'fName' added for maps
$fieldArr['fName'] = "CL12";
$fieldArr['label'] = "CL12";
$fieldArr['goodName'] = "CL12";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SSibc";
//'fName' added for maps
$fieldArr['fName'] = "SSibc";
$fieldArr['label'] = "SSibc";
$fieldArr['goodName'] = "SSibc";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL11";
//'fName' added for maps
$fieldArr['fName'] = "CL11";
$fieldArr['label'] = "CL11";
$fieldArr['goodName'] = "CL11";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SSel";
//'fName' added for maps
$fieldArr['fName'] = "SSel";
$fieldArr['label'] = "SSel";
$fieldArr['goodName'] = "SSel";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL10";
//'fName' added for maps
$fieldArr['fName'] = "CL10";
$fieldArr['label'] = "CL10";
$fieldArr['goodName'] = "CL10";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBSper";
//'fName' added for maps
$fieldArr['fName'] = "IBSper";
$fieldArr['label'] = "IBSper";
$fieldArr['goodName'] = "IBSper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL9";
//'fName' added for maps
$fieldArr['fName'] = "CL9";
$fieldArr['label'] = "CL9";
$fieldArr['goodName'] = "CL9";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "PPper";
//'fName' added for maps
$fieldArr['fName'] = "PPper";
$fieldArr['label'] = "PPper";
$fieldArr['goodName'] = "PPper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL8";
//'fName' added for maps
$fieldArr['fName'] = "CL8";
$fieldArr['label'] = "CL8";
$fieldArr['goodName'] = "CL8";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CPper";
//'fName' added for maps
$fieldArr['fName'] = "CPper";
$fieldArr['label'] = "CPper";
$fieldArr['goodName'] = "CPper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL7";
//'fName' added for maps
$fieldArr['fName'] = "CL7";
$fieldArr['label'] = "CL7";
$fieldArr['goodName'] = "CL7";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MAper";
//'fName' added for maps
$fieldArr['fName'] = "MAper";
$fieldArr['label'] = "MAper";
$fieldArr['goodName'] = "MAper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL6";
//'fName' added for maps
$fieldArr['fName'] = "CL6";
$fieldArr['label'] = "CL6";
$fieldArr['goodName'] = "CL6";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SCSper";
//'fName' added for maps
$fieldArr['fName'] = "SCSper";
$fieldArr['label'] = "SCSper";
$fieldArr['goodName'] = "SCSper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL5";
//'fName' added for maps
$fieldArr['fName'] = "CL5";
$fieldArr['label'] = "CL5";
$fieldArr['goodName'] = "CL5";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SSper";
//'fName' added for maps
$fieldArr['fName'] = "SSper";
$fieldArr['label'] = "SSper";
$fieldArr['goodName'] = "SSper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL4";
//'fName' added for maps
$fieldArr['fName'] = "CL4";
$fieldArr['label'] = "CL4";
$fieldArr['goodName'] = "CL4";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL3";
//'fName' added for maps
$fieldArr['fName'] = "CL3";
$fieldArr['label'] = "CL3";
$fieldArr['goodName'] = "CL3";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBSper2";
//'fName' added for maps
$fieldArr['fName'] = "IBSper2";
$fieldArr['label'] = "IBSper2";
$fieldArr['goodName'] = "IBSper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL2";
//'fName' added for maps
$fieldArr['fName'] = "CL2";
$fieldArr['label'] = "CL2";
$fieldArr['goodName'] = "CL2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "PPper2";
//'fName' added for maps
$fieldArr['fName'] = "PPper2";
$fieldArr['label'] = "PPper2";
$fieldArr['goodName'] = "PPper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CL1";
//'fName' added for maps
$fieldArr['fName'] = "CL1";
$fieldArr['label'] = "CL1";
$fieldArr['goodName'] = "CL1";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "CPper2";
//'fName' added for maps
$fieldArr['fName'] = "CPper2";
$fieldArr['label'] = "CPper2";
$fieldArr['goodName'] = "CPper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MAper2";
//'fName' added for maps
$fieldArr['fName'] = "MAper2";
$fieldArr['label'] = "MAper2";
$fieldArr['goodName'] = "MAper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SCSper2";
//'fName' added for maps
$fieldArr['fName'] = "SCSper2";
$fieldArr['label'] = "SCSper2";
$fieldArr['goodName'] = "SCSper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "SSper2";
//'fName' added for maps
$fieldArr['fName'] = "SSper2";
$fieldArr['label'] = "SSper2";
$fieldArr['goodName'] = "SSper2";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10SS";
//'fName' added for maps
$fieldArr['fName'] = "EV10SS";
$fieldArr['label'] = "EV10SS";
$fieldArr['goodName'] = "EV10SS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25SS";
//'fName' added for maps
$fieldArr['fName'] = "EV25SS";
$fieldArr['label'] = "EV25SS";
$fieldArr['goodName'] = "EV25SS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75SS";
//'fName' added for maps
$fieldArr['fName'] = "EV75SS";
$fieldArr['label'] = "EV75SS";
$fieldArr['goodName'] = "EV75SS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100SS";
//'fName' added for maps
$fieldArr['fName'] = "EV100SS";
$fieldArr['label'] = "EV100SS";
$fieldArr['goodName'] = "EV100SS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150SS";
//'fName' added for maps
$fieldArr['fName'] = "EV150SS";
$fieldArr['label'] = "EV150SS";
$fieldArr['goodName'] = "EV150SS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "sst";
//'fName' added for maps
$fieldArr['fName'] = "sst";
$fieldArr['label'] = "Sst";
$fieldArr['goodName'] = "sst";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10BS";
//'fName' added for maps
$fieldArr['fName'] = "EV10BS";
$fieldArr['label'] = "EV10BS";
$fieldArr['goodName'] = "EV10BS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25BS";
//'fName' added for maps
$fieldArr['fName'] = "EV25BS";
$fieldArr['label'] = "EV25BS";
$fieldArr['goodName'] = "EV25BS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75BS";
//'fName' added for maps
$fieldArr['fName'] = "EV75BS";
$fieldArr['label'] = "EV75BS";
$fieldArr['goodName'] = "EV75BS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100BS";
//'fName' added for maps
$fieldArr['fName'] = "EV100BS";
$fieldArr['label'] = "EV100BS";
$fieldArr['goodName'] = "EV100BS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150BS";
//'fName' added for maps
$fieldArr['fName'] = "EV150BS";
$fieldArr['label'] = "EV150BS";
$fieldArr['goodName'] = "EV150BS";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "bst";
//'fName' added for maps
$fieldArr['fName'] = "bst";
$fieldArr['label'] = "Bst";
$fieldArr['goodName'] = "bst";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10eq";
//'fName' added for maps
$fieldArr['fName'] = "EV10eq";
$fieldArr['label'] = "EV10eq";
$fieldArr['goodName'] = "EV10eq";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25eq";
//'fName' added for maps
$fieldArr['fName'] = "EV25eq";
$fieldArr['label'] = "EV25eq";
$fieldArr['goodName'] = "EV25eq";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75eq";
//'fName' added for maps
$fieldArr['fName'] = "EV75eq";
$fieldArr['label'] = "EV75eq";
$fieldArr['goodName'] = "EV75eq";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100eq";
//'fName' added for maps
$fieldArr['fName'] = "EV100eq";
$fieldArr['label'] = "EV100eq";
$fieldArr['goodName'] = "EV100eq";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150eq";
//'fName' added for maps
$fieldArr['fName'] = "EV150eq";
$fieldArr['label'] = "EV150eq";
$fieldArr['goodName'] = "EV150eq";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "eqt";
//'fName' added for maps
$fieldArr['fName'] = "eqt";
$fieldArr['label'] = "Eqt";
$fieldArr['goodName'] = "eqt";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10d";
//'fName' added for maps
$fieldArr['fName'] = "EV10d";
$fieldArr['label'] = "EV10d";
$fieldArr['goodName'] = "EV10d";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25d";
//'fName' added for maps
$fieldArr['fName'] = "EV25d";
$fieldArr['label'] = "EV25d";
$fieldArr['goodName'] = "EV25d";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75d";
//'fName' added for maps
$fieldArr['fName'] = "EV75d";
$fieldArr['label'] = "EV75d";
$fieldArr['goodName'] = "EV75d";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100d";
//'fName' added for maps
$fieldArr['fName'] = "EV100d";
$fieldArr['label'] = "EV100d";
$fieldArr['goodName'] = "EV100d";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150d";
//'fName' added for maps
$fieldArr['fName'] = "EV150d";
$fieldArr['label'] = "EV150d";
$fieldArr['goodName'] = "EV150d";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "dt";
//'fName' added for maps
$fieldArr['fName'] = "dt";
$fieldArr['label'] = "Dt";
$fieldArr['goodName'] = "dt";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10ad";
//'fName' added for maps
$fieldArr['fName'] = "EV10ad";
$fieldArr['label'] = "EV10ad";
$fieldArr['goodName'] = "EV10ad";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25ad";
//'fName' added for maps
$fieldArr['fName'] = "EV25ad";
$fieldArr['label'] = "EV25ad";
$fieldArr['goodName'] = "EV25ad";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75ad";
//'fName' added for maps
$fieldArr['fName'] = "EV75ad";
$fieldArr['label'] = "EV75ad";
$fieldArr['goodName'] = "EV75ad";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100ad";
//'fName' added for maps
$fieldArr['fName'] = "EV100ad";
$fieldArr['label'] = "EV100ad";
$fieldArr['goodName'] = "EV100ad";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150ad";
//'fName' added for maps
$fieldArr['fName'] = "EV150ad";
$fieldArr['label'] = "EV150ad";
$fieldArr['goodName'] = "EV150ad";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "adt";
//'fName' added for maps
$fieldArr['fName'] = "adt";
$fieldArr['label'] = "Adt";
$fieldArr['goodName'] = "adt";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10p";
//'fName' added for maps
$fieldArr['fName'] = "EV10p";
$fieldArr['label'] = "EV10p";
$fieldArr['goodName'] = "EV10p";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25p";
//'fName' added for maps
$fieldArr['fName'] = "EV25p";
$fieldArr['label'] = "EV25p";
$fieldArr['goodName'] = "EV25p";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75p";
//'fName' added for maps
$fieldArr['fName'] = "EV75p";
$fieldArr['label'] = "EV75p";
$fieldArr['goodName'] = "EV75p";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100p";
//'fName' added for maps
$fieldArr['fName'] = "EV100p";
$fieldArr['label'] = "EV100p";
$fieldArr['goodName'] = "EV100p";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150p";
//'fName' added for maps
$fieldArr['fName'] = "EV150p";
$fieldArr['label'] = "EV150p";
$fieldArr['goodName'] = "EV150p";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "pt";
//'fName' added for maps
$fieldArr['fName'] = "pt";
$fieldArr['label'] = "Pt";
$fieldArr['goodName'] = "pt";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10pe";
//'fName' added for maps
$fieldArr['fName'] = "EV10pe";
$fieldArr['label'] = "EV10pe";
$fieldArr['goodName'] = "EV10pe";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25pe";
//'fName' added for maps
$fieldArr['fName'] = "EV25pe";
$fieldArr['label'] = "EV25pe";
$fieldArr['goodName'] = "EV25pe";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75pe";
//'fName' added for maps
$fieldArr['fName'] = "EV75pe";
$fieldArr['label'] = "EV75pe";
$fieldArr['goodName'] = "EV75pe";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100pe";
//'fName' added for maps
$fieldArr['fName'] = "EV100pe";
$fieldArr['label'] = "EV100pe";
$fieldArr['goodName'] = "EV100pe";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150pe";
//'fName' added for maps
$fieldArr['fName'] = "EV150pe";
$fieldArr['label'] = "EV150pe";
$fieldArr['goodName'] = "EV150pe";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "pet";
//'fName' added for maps
$fieldArr['fName'] = "pet";
$fieldArr['label'] = "Pet";
$fieldArr['goodName'] = "pet";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV10po";
//'fName' added for maps
$fieldArr['fName'] = "EV10po";
$fieldArr['label'] = "EV10po";
$fieldArr['goodName'] = "EV10po";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV25po";
//'fName' added for maps
$fieldArr['fName'] = "EV25po";
$fieldArr['label'] = "EV25po";
$fieldArr['goodName'] = "EV25po";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV75po";
//'fName' added for maps
$fieldArr['fName'] = "EV75po";
$fieldArr['label'] = "EV75po";
$fieldArr['goodName'] = "EV75po";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV100po";
//'fName' added for maps
$fieldArr['fName'] = "EV100po";
$fieldArr['label'] = "EV100po";
$fieldArr['goodName'] = "EV100po";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EV150po";
//'fName' added for maps
$fieldArr['fName'] = "EV150po";
$fieldArr['label'] = "EV150po";
$fieldArr['goodName'] = "EV150po";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "pot";
//'fName' added for maps
$fieldArr['fName'] = "pot";
$fieldArr['label'] = "Pot";
$fieldArr['goodName'] = "pot";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBCperMD";
//'fName' added for maps
$fieldArr['fName'] = "IBCperMD";
$fieldArr['label'] = "IBCper MD";
$fieldArr['goodName'] = "IBCperMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBCTotalMD";
//'fName' added for maps
$fieldArr['fName'] = "IBCTotalMD";
$fieldArr['label'] = "IBCTotal MD";
$fieldArr['goodName'] = "IBCTotalMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBCYTDTarget";
//'fName' added for maps
$fieldArr['fName'] = "IBCYTDTarget";
$fieldArr['label'] = "IBCYTDTarget";
$fieldArr['goodName'] = "IBCYTDTarget";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "IBuper";
//'fName' added for maps
$fieldArr['fName'] = "IBuper";
$fieldArr['label'] = "IBuper";
$fieldArr['goodName'] = "IBuper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELperMD";
//'fName' added for maps
$fieldArr['fName'] = "ELperMD";
$fieldArr['label'] = "ELper MD";
$fieldArr['goodName'] = "ELperMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELTotalMD";
//'fName' added for maps
$fieldArr['fName'] = "ELTotalMD";
$fieldArr['label'] = "ELTotal MD";
$fieldArr['goodName'] = "ELTotalMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ELYTDTarget";
//'fName' added for maps
$fieldArr['fName'] = "ELYTDTarget";
$fieldArr['label'] = "ELYTDTarget";
$fieldArr['goodName'] = "ELYTDTarget";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "eluper";
//'fName' added for maps
$fieldArr['fName'] = "eluper";
$fieldArr['label'] = "Eluper";
$fieldArr['goodName'] = "eluper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ClosingperMD";
//'fName' added for maps
$fieldArr['fName'] = "ClosingperMD";
$fieldArr['label'] = "Closingper MD";
$fieldArr['goodName'] = "ClosingperMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ClosingTotalMD";
//'fName' added for maps
$fieldArr['fName'] = "ClosingTotalMD";
$fieldArr['label'] = "Closing Total MD";
$fieldArr['goodName'] = "ClosingTotalMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "ClosingYTDMD";
//'fName' added for maps
$fieldArr['fName'] = "ClosingYTDMD";
$fieldArr['label'] = "Closing YTDMD";
$fieldArr['goodName'] = "ClosingYTDMD";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Closinguper";
//'fName' added for maps
$fieldArr['fName'] = "Closinguper";
$fieldArr['label'] = "Closinguper";
$fieldArr['goodName'] = "Closinguper";
$fieldArr['repPage'] = "0";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MGMTnetthis";
//'fName' added for maps
$fieldArr['fName'] = "MGMTnetthis";
$fieldArr['label'] = "MGMTnetthis";
$fieldArr['goodName'] = "MGMTnetthis";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MGMTG";
//'fName' added for maps
$fieldArr['fName'] = "MGMTG";
$fieldArr['label'] = "MGMTG";
$fieldArr['goodName'] = "MGMTG";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MGMTnetnext";
//'fName' added for maps
$fieldArr['fName'] = "MGMTnetnext";
$fieldArr['label'] = "MGMTnetnext";
$fieldArr['goodName'] = "MGMTnetnext";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "MGMTN";
//'fName' added for maps
$fieldArr['fName'] = "MGMTN";
$fieldArr['label'] = "MGMTN";
$fieldArr['goodName'] = "MGMTN";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "NetActual";
//'fName' added for maps
$fieldArr['fName'] = "NetActual";
$fieldArr['label'] = "Net Actual";
$fieldArr['goodName'] = "NetActual";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TYBG";
//'fName' added for maps
$fieldArr['fName'] = "TYBG";
$fieldArr['label'] = "TYBG";
$fieldArr['goodName'] = "TYBG";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TYBN";
//'fName' added for maps
$fieldArr['fName'] = "TYBN";
$fieldArr['label'] = "TYBN";
$fieldArr['goodName'] = "TYBN";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "YTDgrossact";
//'fName' added for maps
$fieldArr['fName'] = "YTDgrossact";
$fieldArr['label'] = "YTDgrossact";
$fieldArr['goodName'] = "YTDgrossact";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "YTDnetact";
//'fName' added for maps
$fieldArr['fName'] = "YTDnetact";
$fieldArr['label'] = "YTDnetact";
$fieldArr['goodName'] = "YTDnetact";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "YTDgross";
//'fName' added for maps
$fieldArr['fName'] = "YTDgross";
$fieldArr['label'] = "YTDgross";
$fieldArr['goodName'] = "YTDgross";
$fieldArr['repPage'] = "0";
$fieldArr['viewFormat'] = "Currency";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;

$pageObject->setGoogleMapsParams($params['fieldsArr']);

if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}


$gsqlWhereExpr = "";

if($gSettings->noRecordsOnFirstPage() && ! count($_GET) && ! count($_POST))
	$gsqlWhereExpr = "1=0";

$strSecuritySql = SecuritySQL("Search", $strTableName);
$gsqlWhereExpr = whereAdd($gsqlWhereExpr, $strSecuritySql);

if($cross_table)
{
	
	$cross_array = array();
	$t="Snapshot";
	$cross_array["tables"][]=$t;
	foreach($repGroupFields as $ind=>$value)
	{
		$cross_array["group_fields"][$ind]["name"]=$value["strGroupField"];
		$cross_array["group_fields"][$ind]["int_type"]=$value["groupInterval"];
		if($value["crossTabAxis"]==0)
			$t_axis="x";
		elseif($value["crossTabAxis"]==1)
			$t_axis="y";
		else
			$t_axis="all";
		$cross_array["group_fields"][$ind]["group_type"]=$t_axis;
	}
	$sum_x = 0;
	$sum_y = 0;
	if($sum_x || $sum_y)
		$cross_array["group_fields"][$ind+1]["sum_total"] = true;
	else
		$cross_array["group_fields"][$ind+1]["sum_total"] = false;
	if($sum_x)
		$cross_array["group_fields"][$ind+1]["sum_x"]=true;
	else
		$cross_array["group_fields"][$ind+1]["sum_x"]=false;
	if($sum_y)
		$cross_array["group_fields"][$ind+1]["sum_y"]=true;
	else
		$cross_array["group_fields"][$ind+1]["sum_y"]=false;
	
	foreach($params["fieldsArr"] as $ind=>$value)
	{
		$cross_array["totals"][$value["name"]]["name"]=$value["name"];
		$cross_array["totals"][$value["name"]]["label"]=$value["label"];
		if($value["totalMax"])
			$cross_array["totals"][$value["name"]]["max"]=true;
		else
			$cross_array["totals"][$value["name"]]["max"]=false;
		if($value["totalMin"])
			$cross_array["totals"][$value["name"]]["min"]=true;
		else
			$cross_array["totals"][$value["name"]]["min"]=false;
		if($value["totalSum"])
			$cross_array["totals"][$value["name"]]["sum"]=true;
		else
			$cross_array["totals"][$value["name"]]["sum"]=false;
		if($value["totalAvg"])
			$cross_array["totals"][$value["name"]]["avg"]=true;
		else
			$cross_array["totals"][$value["name"]]["avg"]=false;
	}
		
	$strWhereClause = $pageObject->searchClauseObj->getWhere($pageObject->pSet->getListOfFieldsByExprType(false), $pageObject->controls);
	$strHavingClause = $pageObject->searchClauseObj->getWhere($pageObject->pSet->getListOfFieldsByExprType(true), $pageObject->controls);
	$strSearchCriteria = postvalue('criteria');
	
	$strSecuritySql = SecuritySQL("Search", $pageObject->tName);
	$strWhereClause = whereAdd($strWhereClause, $strSecuritySql);

	$strSQL = $gQuery->gSQLWhere_having_fromQuery($gsqlWhereExpr, $strWhereClause, $strHavingClause, $strSearchCriteria);

	$cross_array=array("tables"=>$cross_array["tables"],"group_fields"=>$cross_array["group_fields"],"totals"=>$cross_array["totals"],
		"table_type"=>"project", "fromWizard" => true);
	$crosstableObj = new CrossTableReport($cross_array);
	if(postvalue("crosstable_refresh"))
	{
		$crosstableObj->ajax_refresh_crosstable();
		exit();
	}
	$xt->assign("select_group_x","<select id=select_group_x onchange=\"refresh_group('".$_SESSION[$sessionPrefix."_rname"]."');\">".$crosstableObj->getGroupFields("x")."</select>");
	$xt->assign("select_group_y","<select id=select_group_y onchange=\"refresh_group('".$_SESSION[$sessionPrefix."_rname"]."');\">".$crosstableObj->getGroupFields("y")."</select>");
	$grid_row["data"]=$crosstableObj->getCrossTableData();
	$arr_res=$crosstableObj->getValuesControl();
	$res=$arr_res[0];
	$first_field_index=$arr_res[1];
	$arr_value=$crosstableObj->getSelectedValue();
	$first_field=$arr_value[$first_field_index];
	if($res)
	{
		$xt->assign("select_data","<select id=select_data onchange='refresh_crosstable(true);return false;'>".$res."</select>");
		$xt->assign("group_func",$crosstableObj->getRadioGroupFunctions($first_field_index,$_SESSION[$sessionPrefix."_group_func"]));
		$group_func=$crosstableObj->getTotalsName($crosstableObj->getGroupFunction($first_field,$_SESSION[$sessionPrefix."_group_func"]));
		$xt->assign("totals",$group_func);
	}
	if(count($grid_row["data"])>0)
	{
		$xt->assign("grid_row",$grid_row);
		$xt->assignbyref("group_header",$crosstableObj->getCrossTableHeader());
		$xt->assignbyref("col_summary",$crosstableObj->getCrossTableSummary());	
		$xt->assignbyref("total_summary",$crosstableObj->getTotalSummary());
		if($sum_x || $sum_y)
			$xt->assign("cross_totals",true);
	}
	else
	{
		$xt->assign("message_block",true);
		$xt->assign("container_grid",false);
		$xt->assign("message","No records found");
	}
}
else
{
	$gsqlWhereExpr = whereAdd($strSecuritySql, $gQuery->WhereToSql());
	if($gSettings->noRecordsOnFirstPage() && ! count($_GET) && ! count($_POST))
		$gsqlWhereExpr = whereAdd($gsqlWhereExpr, "1=0");	
	$aarr = array($gQuery->HeadToSql(), $gQuery->FromToSql(), $gsqlWhereExpr, $gQuery->GroupByToSql(), $gQuery->Having()->toSql($gQuery));
	$rb = new Report($aarr, $pageObject->pSet->GetTableData(".orderindexes"), $pageObject->searchClauseObj, $conn, $_SESSION[$sessionPrefix."_pagesize"], -1, $params, $pageObject); 

	$_SESSION[$sessionPrefix.'_advsearch'] = serialize($pageObject->searchClauseObj);
	$_SESSION[$sessionPrefix."_where"]= $gsqlWhereExpr;
		
	$arrReport = $rb->getReport($pagestart);

	foreach($arrReport['page'] as $key => $value)
		$xt->assign($key, $value);

	foreach($arrReport['global'] as $key => $value)
		$xt->assign($key, $value);

	if(count($arrReport['list'])>0)
	{
		$xt->assign('grid_row', array('data' => $arrReport['list']));
	}
	else
	{
		$xt->assign("message_block",true);
		$xt->assign("container_grid",false);
		$xt->assign("message","No records found");
	}
	
	////////////////////////////////////////////////////////////////////////////////////////

	$mypage = $_SESSION[$sessionPrefix."_pagenumber"];
	$maxpages = $arrReport['maxpages'];

	//	prepare for create pagination
		if($maxpages>1){	
			
				$xt->assign("pagination_block", true);
						$pagination = "<table rows='1' cols='1' align='center' width='auto' border='0' name='paginationTable".$pageObject->id."'>";
						$pagination.= "<tr valign='center'><td align='center'>";
						$counterstart = $mypage - 9;
						if($mypage % 10)
							$counterstart = $mypage -($mypage % 10) + 1;
						$counterend = $counterstart + 9;
						if($counterend > $maxpages)
							$counterend = $maxpages;
						if($counterstart != 1) 
						{
							$pagination.= $pageObject->getPaginationLink(1,"First")."&nbsp;:&nbsp;";
							$pagination.= $pageObject->getPaginationLink($counterstart - 1,"Previous")."&nbsp;";
						}
						$pagination.= "<b>[</b>";
						for($counter = $counterstart; $counter <= $counterend; $counter ++) 
						{
							if($counter != $mypage)
								$pagination.= "&nbsp;".$pageObject->getPaginationLink($counter,$counter,true);
							else
								$pagination.= "&nbsp;<b>".$counter."</b>";
						}
						$pagination.= "&nbsp;<b>]</b>";
						if($counterend != $maxpages) 
						{
							$pagination.= "&nbsp;".$pageObject->getPaginationLink($counterend + 1,"Next")."&nbsp;:&nbsp;";
							$pagination.= "&nbsp;".$pageObject->getPaginationLink($maxpages,"Last");
						}
						$pagination.= "</td></tr></table>";
						$xt->assign("pagination", $pagination);
	
		}
}
	$xt->assign("security_block", true);

	$xt->assign("username", htmlspecialchars($_SESSION["UserName"]));
	$xt->assign("logoutlink_attrs", "onclick=\"window.location.href='login.php?a=logout';return false;\"");
	$xt->assign("guestloginlink_attrs", "onclick=\"window.location.href='login.php';return false;\"");
	
	$xt->assign("loggedas_message", !isLoggedAsGuest()); 
	$xt->assign("guestloginbutton", isLoggedAsGuest());
	$xt->assign("logoutbutton", isSingleSign() && !isLoggedAsGuest());
if($pageObject->isShowMenu())
	$xt->assign("menu_block",true);
	
if (isMobile()){
	$xt->assign('tableinfomobile_block', true);
}
	
$allow_add=true;
$allow_delete=true;
$allow_edit=true;
$allow_search=true;
$allow_export=true;
$allow_import=true;

$xt->assign("toplinks_block",$allow_search);
$xt->assign("asearch_link",$allow_search);
$xt->assign("asearchlink_attrs","id=\"asearch_".$id."\" name=\"asearch_".$id."\" onclick=\"window.location.href='Snapshot_search.php';return false;\"");
$xt->assign("print_link",$allow_export);
if(!$cross_table)
	$xt->assign("printall_link",$allow_export);
$xt->assign("export_link",$allow_export);
$xt->assign("printlink_attrs","id=print_".$id." href='#'");
$xt->assign("printalllink_attrs","id=printAll_".$id." href='#'");
$xt->assign("excellink_attrs","id=export_to_excel".$id." href='#'");
$xt->assign("wordlink_attrs","id=export_to_word".$id." href='#'");
$xt->assign("pdflink_attrs","id=export_to_pdf".$id." href='#'");
$xt->assign("prints_block",$allow_export);
$xt->assign("advsearchlink_attrs", "id=\"advButton".$id."\"");

if($cross_table)
	$xt->assign("crosstable_attrs","rname=".$_SESSION[$sessionPrefix."_rname"]."&axis_x=".$_SESSION[$sessionPrefix."_gr_x"]."&axis_y=".$_SESSION[$sessionPrefix."_gr_y"]."&field=".$_SESSION[$sessionPrefix."_field"]."&group_func=".$_SESSION[$sessionPrefix."_group_func"]);

if(!$cross_table && $allow_search && ($pageObject->reportGroupFields && count($pageObject->arrGroupsPerPage) || !$pageObject->reportGroupFields && count($pageObject->arrRecsPerPage)))
{
	$xt->assign("recordspp_block",true);
	$pageObject->createPerPage();
}
	
$xt->assign("grid_block",$allow_search);

$xt->assign("changepwd_link",$_SESSION["AccessLevel"] != ACCESS_LEVEL_GUEST);
$xt->assign("changepwdlink_attrs","onclick=\"window.location.href='changepwd.php';return false;\"");

// assign for lheader

// create searchPanel
$args = array();
$args['pageObj'] = &$pageObject;
$searchPanelObj = new SearchPanelSimple($args);
$searchPanelObj->buildSearchPanel('adv_search_panel');
$xt->assign("searchPanel", true);

$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>";

if($cross_table)
{
	$pageObject->body["begin"] .= '<script type="text/javascript" src="include/crosstable.js"></script>';
	//$pageObject->body["begin"] .= '<script type="text/javascript" src="include/json.js"></script>';
}

$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";

$pageObject->body["begin"] .= ($pageObject->isDisplayLoading ? "<script type=\"text/javascript\">Runner.runLoading();</script>" : "");
if (!isMobile())
$pageObject->body["begin"] .= "<div id=\"search_suggest\" class=\"search_suggest\"></div>";
	
// assign body end in such way, to prevent collisions with flyId increment 

// assign body end
$pageObject->body['end'] = array();
$pageObject->body['end']["method"] = "assignBodyEnd";
$pageObject->body['end']["object"] = &$pageObject;

$xt->assignbyref('body', $pageObject->body);

$xt->assign("left_block", true);

if(!$cross_table)
{
	$xt->assign("details_block", $arrReport['countRows']!=0);
	$xt->assign("records_found", $arrReport['countRows']);
	$xt->assign("pages_block", $arrReport['countRows']!=0);
	$xt->assign("page", $mypage);
	$xt->assign("maxpages", $maxpages);
}

$xt->assign("style_block",true);
$xt->assign("shiftstyle_block", true);
// end assign for lheader

if($eventObj->exists("BeforeShowReport"))
	$eventObj->BeforeShowReport($xt, $pageObject->templatefile, $pageObject);
$xt->display($pageObject->templatefile);

?>
