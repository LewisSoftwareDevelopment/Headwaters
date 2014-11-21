<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");

add_nocache_headers();

include("include/company_Report_variables.php");

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
$layout->blocks["top"][] = "toplinks";$page_layouts["company_Report_report"] = $layout;


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
	var report_filename="company_Report_report.php"
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
		var report_filename="company_Report_report.php"
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
$params['shortTName'] = "company_Report";
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
$fieldArr['name'] = "Company";
//'fName' added for maps
$fieldArr['fName'] = "Company";
$fieldArr['label'] = "Company";
$fieldArr['goodName'] = "Company";
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
$fieldArr['name'] = "Deal Slot";
//'fName' added for maps
$fieldArr['fName'] = "Deal Slot";
$fieldArr['label'] = "Deal Slot";
$fieldArr['goodName'] = "Deal_Slot";
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
$fieldArr['name'] = "IBC Date";
//'fName' added for maps
$fieldArr['fName'] = "IBC Date";
$fieldArr['label'] = "IBC Date";
$fieldArr['goodName'] = "IBC_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL Date";
//'fName' added for maps
$fieldArr['fName'] = "EL Date";
$fieldArr['label'] = "EL Date";
$fieldArr['goodName'] = "EL_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Project Name";
//'fName' added for maps
$fieldArr['fName'] = "Project Name";
$fieldArr['label'] = "Project Name";
$fieldArr['goodName'] = "Project_Name";
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
$fieldArr['name'] = "Status";
//'fName' added for maps
$fieldArr['fName'] = "Status";
$fieldArr['label'] = "Status";
$fieldArr['goodName'] = "Status";
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
$fieldArr['name'] = "ID";
//'fName' added for maps
$fieldArr['fName'] = "ID";
$fieldArr['label'] = "ID";
$fieldArr['goodName'] = "ID";
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
$fieldArr['name'] = "Deal Type";
//'fName' added for maps
$fieldArr['fName'] = "Deal Type";
$fieldArr['label'] = "Deal Type";
$fieldArr['goodName'] = "Deal_Type";
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
$fieldArr['name'] = "Projected Fee";
//'fName' added for maps
$fieldArr['fName'] = "Projected Fee";
$fieldArr['label'] = "Projected Fee";
$fieldArr['goodName'] = "Projected_Fee";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Projected Transaction Size";
//'fName' added for maps
$fieldArr['fName'] = "Projected Transaction Size";
$fieldArr['label'] = "Projected Transaction Size";
$fieldArr['goodName'] = "Projected_Transaction_Size";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Est. Close Date";
//'fName' added for maps
$fieldArr['fName'] = "Est. Close Date";
$fieldArr['label'] = "Est. Close Date";
$fieldArr['goodName'] = "Est__Close_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Primary Banker";
//'fName' added for maps
$fieldArr['fName'] = "Primary Banker";
$fieldArr['label'] = "Primary Banker";
$fieldArr['goodName'] = "Primary_Banker";
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
$fieldArr['name'] = "Practice Area";
//'fName' added for maps
$fieldArr['fName'] = "Practice Area";
$fieldArr['label'] = "Practice Area";
$fieldArr['goodName'] = "Practice_Area";
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
$fieldArr['name'] = "Ownership Class";
//'fName' added for maps
$fieldArr['fName'] = "Ownership Class";
$fieldArr['label'] = "Ownership Class";
$fieldArr['goodName'] = "Ownership_Class";
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
$fieldArr['name'] = "Industry";
//'fName' added for maps
$fieldArr['fName'] = "Industry";
$fieldArr['label'] = "Industry";
$fieldArr['goodName'] = "Industry";
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
$fieldArr['name'] = "Referral Type";
//'fName' added for maps
$fieldArr['fName'] = "Referral Type";
$fieldArr['label'] = "Referral Type";
$fieldArr['goodName'] = "Referral_Type";
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
$fieldArr['name'] = "Referral Source-Company";
//'fName' added for maps
$fieldArr['fName'] = "Referral Source-Company";
$fieldArr['label'] = "Referral Source-Company";
$fieldArr['goodName'] = "Referral_Source_Company";
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
$fieldArr['name'] = "Referral Scource-Ind.";
//'fName' added for maps
$fieldArr['fName'] = "Referral Scource-Ind.";
$fieldArr['label'] = "Referral Scource-Ind.";
$fieldArr['goodName'] = "Referral_Scource_Ind_";
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
$fieldArr['name'] = "Description";
//'fName' added for maps
$fieldArr['fName'] = "Description";
$fieldArr['label'] = "Description";
$fieldArr['goodName'] = "Description";
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
$fieldArr['name'] = "Dead Date";
//'fName' added for maps
$fieldArr['fName'] = "Dead Date";
$fieldArr['label'] = "Dead Date";
$fieldArr['goodName'] = "Dead_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "EL Expiration Date";
//'fName' added for maps
$fieldArr['fName'] = "EL Expiration Date";
$fieldArr['label'] = "EL Expiration Date";
$fieldArr['goodName'] = "EL_Expiration_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Engagment Fee";
//'fName' added for maps
$fieldArr['fName'] = "Engagment Fee";
$fieldArr['label'] = "Engagment Fee";
$fieldArr['goodName'] = "Engagment_Fee";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Minimum";
//'fName' added for maps
$fieldArr['fName'] = "Fee Minimum";
$fieldArr['label'] = "Fee Minimum";
$fieldArr['goodName'] = "Fee_Minimum";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Final Total Sucess Fee";
//'fName' added for maps
$fieldArr['fName'] = "Final Total Sucess Fee";
$fieldArr['label'] = "Final Total Sucess Fee";
$fieldArr['goodName'] = "Final_Total_Sucess_Fee";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Final Transaction Size";
//'fName' added for maps
$fieldArr['fName'] = "Final Transaction Size";
$fieldArr['label'] = "Final Transaction Size";
$fieldArr['goodName'] = "Final_Transaction_Size";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Monthly Retainer";
//'fName' added for maps
$fieldArr['fName'] = "Monthly Retainer";
$fieldArr['label'] = "Monthly Retainer";
$fieldArr['goodName'] = "Monthly_Retainer";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Closed Date";
//'fName' added for maps
$fieldArr['fName'] = "Closed Date";
$fieldArr['label'] = "Closed Date";
$fieldArr['goodName'] = "Closed_Date";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "th";
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Team Split-1";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-1";
$fieldArr['label'] = "Team Split-1";
$fieldArr['goodName'] = "Team_Split_1";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Percent";
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
$fieldArr['name'] = "Team-1";
//'fName' added for maps
$fieldArr['fName'] = "Team-1";
$fieldArr['label'] = "Team-1";
$fieldArr['goodName'] = "Team_1";
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
$fieldArr['name'] = "Team Split-2";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-2";
$fieldArr['label'] = "Team Split-2";
$fieldArr['goodName'] = "Team_Split_2";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Percent";
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
$fieldArr['name'] = "Team-2";
//'fName' added for maps
$fieldArr['fName'] = "Team-2";
$fieldArr['label'] = "Team-2";
$fieldArr['goodName'] = "Team_2";
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
$fieldArr['name'] = "Team Split-3";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-3";
$fieldArr['label'] = "Team Split-3";
$fieldArr['goodName'] = "Team_Split_3";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Team Split-4";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-4";
$fieldArr['label'] = "Team Split-4";
$fieldArr['goodName'] = "Team_Split_4";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Team Split-5";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-5";
$fieldArr['label'] = "Team Split-5";
$fieldArr['goodName'] = "Team_Split_5";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Team Split-6";
//'fName' added for maps
$fieldArr['fName'] = "Team Split-6";
$fieldArr['label'] = "Team Split-6";
$fieldArr['goodName'] = "Team_Split_6";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Team-3";
//'fName' added for maps
$fieldArr['fName'] = "Team-3";
$fieldArr['label'] = "Team-3";
$fieldArr['goodName'] = "Team_3";
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
$fieldArr['name'] = "Team-4";
//'fName' added for maps
$fieldArr['fName'] = "Team-4";
$fieldArr['label'] = "Team-4";
$fieldArr['goodName'] = "Team_4";
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
$fieldArr['name'] = "Team-5";
//'fName' added for maps
$fieldArr['fName'] = "Team-5";
$fieldArr['label'] = "Team-5";
$fieldArr['goodName'] = "Team_5";
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
$fieldArr['name'] = "Team-6";
//'fName' added for maps
$fieldArr['fName'] = "Team-6";
$fieldArr['label'] = "Team-6";
$fieldArr['goodName'] = "Team_6";
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
$fieldArr['name'] = "Fee Split-1";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-1";
$fieldArr['label'] = "Fee Split-1";
$fieldArr['goodName'] = "Fee_Split_1";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Split-2";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-2";
$fieldArr['label'] = "Fee Split-2";
$fieldArr['goodName'] = "Fee_Split_2";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Split-3";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-3";
$fieldArr['label'] = "Fee Split-3";
$fieldArr['goodName'] = "Fee_Split_3";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Split-4";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-4";
$fieldArr['label'] = "Fee Split-4";
$fieldArr['goodName'] = "Fee_Split_4";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Split-5";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-5";
$fieldArr['label'] = "Fee Split-5";
$fieldArr['goodName'] = "Fee_Split_5";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee Split-6";
//'fName' added for maps
$fieldArr['fName'] = "Fee Split-6";
$fieldArr['label'] = "Fee Split-6";
$fieldArr['goodName'] = "Fee_Split_6";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Fee To-1";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-1";
$fieldArr['label'] = "Fee To-1";
$fieldArr['goodName'] = "Fee_To_1";
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
$fieldArr['name'] = "Fee To-2";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-2";
$fieldArr['label'] = "Fee To-2";
$fieldArr['goodName'] = "Fee_To_2";
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
$fieldArr['name'] = "Fee To-3";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-3";
$fieldArr['label'] = "Fee To-3";
$fieldArr['goodName'] = "Fee_To_3";
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
$fieldArr['name'] = "Fee To-4";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-4";
$fieldArr['label'] = "Fee To-4";
$fieldArr['goodName'] = "Fee_To_4";
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
$fieldArr['name'] = "Fee To-5";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-5";
$fieldArr['label'] = "Fee To-5";
$fieldArr['goodName'] = "Fee_To_5";
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
$fieldArr['name'] = "Fee To-6";
//'fName' added for maps
$fieldArr['fName'] = "Fee To-6";
$fieldArr['label'] = "Fee To-6";
$fieldArr['goodName'] = "Fee_To_6";
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
$fieldArr['name'] = "Enterpise Value";
//'fName' added for maps
$fieldArr['fName'] = "Enterpise Value";
$fieldArr['label'] = "Enterpise Value";
$fieldArr['goodName'] = "Enterpise_Value";
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
$fieldArr['name'] = "Fee Details";
//'fName' added for maps
$fieldArr['fName'] = "Fee Details";
$fieldArr['label'] = "Fee Details";
$fieldArr['goodName'] = "Fee_Details";
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
$fieldArr['name'] = "Split to Corporate";
//'fName' added for maps
$fieldArr['fName'] = "Split to Corporate";
$fieldArr['label'] = "Split to Corporate";
$fieldArr['goodName'] = "Split_to_Corporate";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Number";
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
$fieldArr['name'] = "Paul";
//'fName' added for maps
$fieldArr['fName'] = "Paul";
$fieldArr['label'] = "Paul";
$fieldArr['goodName'] = "Paul";
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
$fieldArr['name'] = "McBroom";
//'fName' added for maps
$fieldArr['fName'] = "McBroom";
$fieldArr['label'] = "Mc Broom";
$fieldArr['goodName'] = "McBroom";
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
	$t="company_Report";
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
$xt->assign("asearchlink_attrs","id=\"asearch_".$id."\" name=\"asearch_".$id."\" onclick=\"window.location.href='company_Report_search.php';return false;\"");
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
