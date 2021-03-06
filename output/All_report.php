<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");

add_nocache_headers();

include("include/All_variables.php");

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
$layout->blocks["top"][] = "toplinks";$page_layouts["All_report"] = $layout;


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
	var report_filename="All_report.php"
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
		var report_filename="All_report.php"
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
$params['shortTName'] = "All";
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
$fieldArr['name'] = "ID";
//'fName' added for maps
$fieldArr['fName'] = "ID";
$fieldArr['label'] = "ID";
$fieldArr['goodName'] = "ID";
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
$fieldArr['name'] = "Name";
//'fName' added for maps
$fieldArr['fName'] = "Name";
$fieldArr['label'] = "Name";
$fieldArr['goodName'] = "Name";
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
$fieldArr['name'] = "Start Date";
//'fName' added for maps
$fieldArr['fName'] = "Start Date";
$fieldArr['label'] = "Start Date";
$fieldArr['goodName'] = "Start_Date";
$fieldArr['repPage'] = "0";
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
$fieldArr['name'] = "Budget Year";
//'fName' added for maps
$fieldArr['fName'] = "Budget Year";
$fieldArr['label'] = "Budget Year";
$fieldArr['goodName'] = "Budget_Year";
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
$fieldArr['name'] = "Active";
//'fName' added for maps
$fieldArr['fName'] = "Active";
$fieldArr['label'] = "Active";
$fieldArr['goodName'] = "Active";
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
$fieldArr['name'] = "YTD Revenue";
//'fName' added for maps
$fieldArr['fName'] = "YTD Revenue";
$fieldArr['label'] = "YTD Revenue";
$fieldArr['goodName'] = "YTD_Revenue";
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
$fieldArr['name'] = "Last Year Rev";
//'fName' added for maps
$fieldArr['fName'] = "Last Year Rev";
$fieldArr['label'] = "Last Year Rev";
$fieldArr['goodName'] = "Last_Year_Rev";
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
$fieldArr['name'] = "Prior Year Rev";
//'fName' added for maps
$fieldArr['fName'] = "Prior Year Rev";
$fieldArr['label'] = "Prior Year Rev";
$fieldArr['goodName'] = "Prior_Year_Rev";
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
$fieldArr['name'] = "Last Year Rank";
//'fName' added for maps
$fieldArr['fName'] = "Last Year Rank";
$fieldArr['label'] = "Last Year Rank";
$fieldArr['goodName'] = "Last_Year_Rank";
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
$fieldArr['name'] = "YTD+Last";
//'fName' added for maps
$fieldArr['fName'] = "YTD+Last";
$fieldArr['label'] = "YTD+Last";
$fieldArr['goodName'] = "YTD_Last";
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
$fieldArr['name'] = "YTD+Last+Prior";
//'fName' added for maps
$fieldArr['fName'] = "YTD+Last+Prior";
$fieldArr['label'] = "YTD+Last+Prior";
$fieldArr['goodName'] = "YTD_Last_Prior";
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
$fieldArr['name'] = "YTD Closing";
//'fName' added for maps
$fieldArr['fName'] = "YTD Closing";
$fieldArr['label'] = "YTD Closing";
$fieldArr['goodName'] = "YTD_Closing";
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
$fieldArr['name'] = "Last Year Closing";
//'fName' added for maps
$fieldArr['fName'] = "Last Year Closing";
$fieldArr['label'] = "Last Year Closing";
$fieldArr['goodName'] = "Last_Year_Closing";
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
$fieldArr['name'] = "YTD IBC";
//'fName' added for maps
$fieldArr['fName'] = "YTD IBC";
$fieldArr['label'] = "YTD IBC";
$fieldArr['goodName'] = "YTD_IBC";
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
$fieldArr['name'] = "YTD Engagements";
//'fName' added for maps
$fieldArr['fName'] = "YTD Engagements";
$fieldArr['label'] = "YTD Engagements";
$fieldArr['goodName'] = "YTD_Engagements";
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
$fieldArr['name'] = "Total Current Engagments";
//'fName' added for maps
$fieldArr['fName'] = "Total Current Engagments";
$fieldArr['label'] = "Total Current Engagments";
$fieldArr['goodName'] = "Total_Current_Engagments";
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
$fieldArr['name'] = "# Wheelhouse";
//'fName' added for maps
$fieldArr['fName'] = "# Wheelhouse";
$fieldArr['label'] = "# Wheelhouse";
$fieldArr['goodName'] = "__Wheelhouse";
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
$fieldArr['name'] = "# Speculative";
//'fName' added for maps
$fieldArr['fName'] = "# Speculative";
$fieldArr['label'] = "# Speculative";
$fieldArr['goodName'] = "__Speculative";
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
$fieldArr['name'] = "# Minimum";
//'fName' added for maps
$fieldArr['fName'] = "# Minimum";
$fieldArr['label'] = "# Minimum";
$fieldArr['goodName'] = "__Minimum";
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
$fieldArr['name'] = "Last Name";
//'fName' added for maps
$fieldArr['fName'] = "Last Name";
$fieldArr['label'] = "Last Name";
$fieldArr['goodName'] = "Last_Name";
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
$fieldArr['name'] = "First Name";
//'fName' added for maps
$fieldArr['fName'] = "First Name";
$fieldArr['label'] = "First Name";
$fieldArr['goodName'] = "First_Name";
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
	$t="All";
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
$xt->assign("asearchlink_attrs","id=\"asearch_".$id."\" name=\"asearch_".$id."\" onclick=\"window.location.href='All_search.php';return false;\"");
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
