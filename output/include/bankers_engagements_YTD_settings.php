<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers_engagements_YTD = array();
	$tdatabankers_engagements_YTD[".NumberOfChars"] = 80; 
	$tdatabankers_engagements_YTD[".ShortName"] = "bankers_engagements_YTD";
	$tdatabankers_engagements_YTD[".OwnerID"] = "";
	$tdatabankers_engagements_YTD[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsbankers_engagements_YTD = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers_engagements_YTD["English"] = array();
	$fieldToolTipsbankers_engagements_YTD["English"] = array();
	if (count($fieldToolTipsbankers_engagements_YTD["English"]))
		$tdatabankers_engagements_YTD[".isUseToolTips"] = true;
}
	
	
	$tdatabankers_engagements_YTD[".NCSearch"] = true;



$tdatabankers_engagements_YTD[".shortTableName"] = "bankers_engagements_YTD";
$tdatabankers_engagements_YTD[".nSecOptions"] = 0;
$tdatabankers_engagements_YTD[".recsPerRowList"] = 1;
$tdatabankers_engagements_YTD[".mainTableOwnerID"] = "";
$tdatabankers_engagements_YTD[".moveNext"] = 1;
$tdatabankers_engagements_YTD[".nType"] = 2;

$tdatabankers_engagements_YTD[".strOriginalTableName"] = "bankers";




$tdatabankers_engagements_YTD[".showAddInPopup"] = false;

$tdatabankers_engagements_YTD[".showEditInPopup"] = false;

$tdatabankers_engagements_YTD[".showViewInPopup"] = false;

$tdatabankers_engagements_YTD[".fieldsForRegister"] = array();

$tdatabankers_engagements_YTD[".listAjax"] = false;

	$tdatabankers_engagements_YTD[".audit"] = false;

	$tdatabankers_engagements_YTD[".locking"] = false;

$tdatabankers_engagements_YTD[".listIcons"] = true;
$tdatabankers_engagements_YTD[".edit"] = true;
$tdatabankers_engagements_YTD[".inlineEdit"] = true;
$tdatabankers_engagements_YTD[".inlineAdd"] = true;
$tdatabankers_engagements_YTD[".view"] = true;

$tdatabankers_engagements_YTD[".exportTo"] = true;

$tdatabankers_engagements_YTD[".printFriendly"] = true;

$tdatabankers_engagements_YTD[".delete"] = true;

$tdatabankers_engagements_YTD[".showSimpleSearchOptions"] = false;

$tdatabankers_engagements_YTD[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers_engagements_YTD[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers_engagements_YTD[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankers_engagements_YTD[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers_engagements_YTD[".isUseTimeForSearch"] = false;




$tdatabankers_engagements_YTD[".allSearchFields"] = array();





$tdatabankers_engagements_YTD[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers_engagements_YTD[".strOrderBy"] = $tstrOrderBy;

$tdatabankers_engagements_YTD[".orderindexes"] = array();

$tdatabankers_engagements_YTD[".sqlHead"] = " ";
$tdatabankers_engagements_YTD[".sqlFrom"] = "";
$tdatabankers_engagements_YTD[".sqlWhereExpr"] = "";
$tdatabankers_engagements_YTD[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers_engagements_YTD[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers_engagements_YTD[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers_engagements_YTD = array();
$tdatabankers_engagements_YTD[".Keys"] = $tableKeysbankers_engagements_YTD;

$tdatabankers_engagements_YTD[".listFields"] = array();

$tdatabankers_engagements_YTD[".viewFields"] = array();

$tdatabankers_engagements_YTD[".addFields"] = array();

$tdatabankers_engagements_YTD[".inlineAddFields"] = array();

$tdatabankers_engagements_YTD[".editFields"] = array();

$tdatabankers_engagements_YTD[".inlineEditFields"] = array();

$tdatabankers_engagements_YTD[".exportFields"] = array();

$tdatabankers_engagements_YTD[".printFields"] = array();


	
$tables_data["bankers engagements YTD"]=&$tdatabankers_engagements_YTD;
$field_labels["bankers_engagements_YTD"] = &$fieldLabelsbankers_engagements_YTD;
$fieldToolTips["bankers engagements YTD"] = &$fieldToolTipsbankers_engagements_YTD;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers engagements YTD"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankers engagements YTD"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers_engagements_YTD()
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
$queryData_bankers_engagements_YTD = createSqlQuery_bankers_engagements_YTD();
$tdatabankers_engagements_YTD[".sqlquery"] = $queryData_bankers_engagements_YTD;
	
if(isset($tdatabankers_engagements_YTD["field2"])){
	$tdatabankers_engagements_YTD["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers_engagements_YTD["field2"]["LookupOrderBy"] = "name";
	$tdatabankers_engagements_YTD["field2"]["LookupType"] = 4;
	$tdatabankers_engagements_YTD["field2"]["LinkField"] = "email";
	$tdatabankers_engagements_YTD["field2"]["DisplayField"] = "name";
	$tdatabankers_engagements_YTD[".hasCustomViewField"] = true;
}

$tableEvents["bankers engagements YTD"] = new eventsBase;
$tdatabankers_engagements_YTD[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankers engagements YTD");

?>