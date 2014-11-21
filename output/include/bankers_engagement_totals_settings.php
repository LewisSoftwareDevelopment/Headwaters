<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers_engagement_totals = array();
	$tdatabankers_engagement_totals[".NumberOfChars"] = 80; 
	$tdatabankers_engagement_totals[".ShortName"] = "bankers_engagement_totals";
	$tdatabankers_engagement_totals[".OwnerID"] = "";
	$tdatabankers_engagement_totals[".OriginalTable"] = "bankerrank";

//	field labels
$fieldLabelsbankers_engagement_totals = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers_engagement_totals["English"] = array();
	$fieldToolTipsbankers_engagement_totals["English"] = array();
	if (count($fieldToolTipsbankers_engagement_totals["English"]))
		$tdatabankers_engagement_totals[".isUseToolTips"] = true;
}
	
	
	$tdatabankers_engagement_totals[".NCSearch"] = true;



$tdatabankers_engagement_totals[".shortTableName"] = "bankers_engagement_totals";
$tdatabankers_engagement_totals[".nSecOptions"] = 0;
$tdatabankers_engagement_totals[".recsPerRowList"] = 1;
$tdatabankers_engagement_totals[".mainTableOwnerID"] = "";
$tdatabankers_engagement_totals[".moveNext"] = 1;
$tdatabankers_engagement_totals[".nType"] = 2;

$tdatabankers_engagement_totals[".strOriginalTableName"] = "bankerrank";




$tdatabankers_engagement_totals[".showAddInPopup"] = false;

$tdatabankers_engagement_totals[".showEditInPopup"] = false;

$tdatabankers_engagement_totals[".showViewInPopup"] = false;

$tdatabankers_engagement_totals[".fieldsForRegister"] = array();

$tdatabankers_engagement_totals[".listAjax"] = false;

	$tdatabankers_engagement_totals[".audit"] = false;

	$tdatabankers_engagement_totals[".locking"] = false;

$tdatabankers_engagement_totals[".listIcons"] = true;
$tdatabankers_engagement_totals[".edit"] = true;
$tdatabankers_engagement_totals[".inlineEdit"] = true;
$tdatabankers_engagement_totals[".inlineAdd"] = true;
$tdatabankers_engagement_totals[".view"] = true;

$tdatabankers_engagement_totals[".exportTo"] = true;

$tdatabankers_engagement_totals[".printFriendly"] = true;

$tdatabankers_engagement_totals[".delete"] = true;

$tdatabankers_engagement_totals[".showSimpleSearchOptions"] = false;

$tdatabankers_engagement_totals[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers_engagement_totals[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers_engagement_totals[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankers_engagement_totals[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers_engagement_totals[".isUseTimeForSearch"] = false;




$tdatabankers_engagement_totals[".allSearchFields"] = array();





$tdatabankers_engagement_totals[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers_engagement_totals[".strOrderBy"] = $tstrOrderBy;

$tdatabankers_engagement_totals[".orderindexes"] = array();

$tdatabankers_engagement_totals[".sqlHead"] = " ";
$tdatabankers_engagement_totals[".sqlFrom"] = "";
$tdatabankers_engagement_totals[".sqlWhereExpr"] = "";
$tdatabankers_engagement_totals[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers_engagement_totals[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers_engagement_totals[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers_engagement_totals = array();
$tdatabankers_engagement_totals[".Keys"] = $tableKeysbankers_engagement_totals;

$tdatabankers_engagement_totals[".listFields"] = array();

$tdatabankers_engagement_totals[".viewFields"] = array();

$tdatabankers_engagement_totals[".addFields"] = array();

$tdatabankers_engagement_totals[".inlineAddFields"] = array();

$tdatabankers_engagement_totals[".editFields"] = array();

$tdatabankers_engagement_totals[".inlineEditFields"] = array();

$tdatabankers_engagement_totals[".exportFields"] = array();

$tdatabankers_engagement_totals[".printFields"] = array();


	
$tables_data["bankers engagement totals"]=&$tdatabankers_engagement_totals;
$field_labels["bankers_engagement_totals"] = &$fieldLabelsbankers_engagement_totals;
$fieldToolTips["bankers engagement totals"] = &$fieldToolTipsbankers_engagement_totals;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers engagement totals"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankers engagement totals"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers_engagement_totals()
{
$proto0=array();
$proto0["m_strHead"] = "";
$proto0["m_strFieldList"] = "";
$proto0["m_strFrom"] = "";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
$proto0["m_fromlist"] = array();
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankers_engagement_totals = createSqlQuery_bankers_engagement_totals();
$tdatabankers_engagement_totals[".sqlquery"] = $queryData_bankers_engagement_totals;
	
if(isset($tdatabankers_engagement_totals["field2"])){
	$tdatabankers_engagement_totals["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers_engagement_totals["field2"]["LookupOrderBy"] = "name";
	$tdatabankers_engagement_totals["field2"]["LookupType"] = 4;
	$tdatabankers_engagement_totals["field2"]["LinkField"] = "email";
	$tdatabankers_engagement_totals["field2"]["DisplayField"] = "name";
	$tdatabankers_engagement_totals[".hasCustomViewField"] = true;
}

$tableEvents["bankers engagement totals"] = new eventsBase;
$tdatabankers_engagement_totals[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankers engagement totals");

?>