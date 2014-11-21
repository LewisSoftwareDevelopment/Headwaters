<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankerrev_years = array();
	$tdatabankerrev_years[".NumberOfChars"] = 80; 
	$tdatabankerrev_years[".ShortName"] = "bankerrev_years";
	$tdatabankerrev_years[".OwnerID"] = "";
	$tdatabankerrev_years[".OriginalTable"] = "bankerrev";

//	field labels
$fieldLabelsbankerrev_years = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankerrev_years["English"] = array();
	$fieldToolTipsbankerrev_years["English"] = array();
	if (count($fieldToolTipsbankerrev_years["English"]))
		$tdatabankerrev_years[".isUseToolTips"] = true;
}
	
	
	$tdatabankerrev_years[".NCSearch"] = true;



$tdatabankerrev_years[".shortTableName"] = "bankerrev_years";
$tdatabankerrev_years[".nSecOptions"] = 0;
$tdatabankerrev_years[".recsPerRowList"] = 1;
$tdatabankerrev_years[".mainTableOwnerID"] = "";
$tdatabankerrev_years[".moveNext"] = 1;
$tdatabankerrev_years[".nType"] = 2;

$tdatabankerrev_years[".strOriginalTableName"] = "bankerrev";




$tdatabankerrev_years[".showAddInPopup"] = false;

$tdatabankerrev_years[".showEditInPopup"] = false;

$tdatabankerrev_years[".showViewInPopup"] = false;

$tdatabankerrev_years[".fieldsForRegister"] = array();

$tdatabankerrev_years[".listAjax"] = false;

	$tdatabankerrev_years[".audit"] = false;

	$tdatabankerrev_years[".locking"] = false;

$tdatabankerrev_years[".listIcons"] = true;
$tdatabankerrev_years[".edit"] = true;
$tdatabankerrev_years[".inlineEdit"] = true;
$tdatabankerrev_years[".inlineAdd"] = true;
$tdatabankerrev_years[".view"] = true;

$tdatabankerrev_years[".exportTo"] = true;

$tdatabankerrev_years[".printFriendly"] = true;

$tdatabankerrev_years[".delete"] = true;

$tdatabankerrev_years[".showSimpleSearchOptions"] = false;

$tdatabankerrev_years[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankerrev_years[".isUseAjaxSuggest"] = false;
else 
	$tdatabankerrev_years[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankerrev_years[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankerrev_years[".isUseTimeForSearch"] = false;




$tdatabankerrev_years[".allSearchFields"] = array();





$tdatabankerrev_years[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankerrev_years[".strOrderBy"] = $tstrOrderBy;

$tdatabankerrev_years[".orderindexes"] = array();

$tdatabankerrev_years[".sqlHead"] = " ";
$tdatabankerrev_years[".sqlFrom"] = "";
$tdatabankerrev_years[".sqlWhereExpr"] = "";
$tdatabankerrev_years[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankerrev_years[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankerrev_years[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankerrev_years = array();
$tdatabankerrev_years[".Keys"] = $tableKeysbankerrev_years;

$tdatabankerrev_years[".listFields"] = array();

$tdatabankerrev_years[".viewFields"] = array();

$tdatabankerrev_years[".addFields"] = array();

$tdatabankerrev_years[".inlineAddFields"] = array();

$tdatabankerrev_years[".editFields"] = array();

$tdatabankerrev_years[".inlineEditFields"] = array();

$tdatabankerrev_years[".exportFields"] = array();

$tdatabankerrev_years[".printFields"] = array();


	
$tables_data["bankerrev years"]=&$tdatabankerrev_years;
$field_labels["bankerrev_years"] = &$fieldLabelsbankerrev_years;
$fieldToolTips["bankerrev years"] = &$fieldToolTipsbankerrev_years;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankerrev years"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankerrev years"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankerrev_years()
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
$queryData_bankerrev_years = createSqlQuery_bankerrev_years();
$tdatabankerrev_years[".sqlquery"] = $queryData_bankerrev_years;
	
if(isset($tdatabankerrev_years["field2"])){
	$tdatabankerrev_years["field2"]["LookupTable"] = "carscars_view";
	$tdatabankerrev_years["field2"]["LookupOrderBy"] = "name";
	$tdatabankerrev_years["field2"]["LookupType"] = 4;
	$tdatabankerrev_years["field2"]["LinkField"] = "email";
	$tdatabankerrev_years["field2"]["DisplayField"] = "name";
	$tdatabankerrev_years[".hasCustomViewField"] = true;
}

$tableEvents["bankerrev years"] = new eventsBase;
$tdatabankerrev_years[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankerrev years");

?>