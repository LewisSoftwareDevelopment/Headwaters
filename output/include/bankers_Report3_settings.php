<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers_Report3 = array();
	$tdatabankers_Report3[".NumberOfChars"] = 80; 
	$tdatabankers_Report3[".ShortName"] = "bankers_Report3";
	$tdatabankers_Report3[".OwnerID"] = "";
	$tdatabankers_Report3[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsbankers_Report3 = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers_Report3["English"] = array();
	$fieldToolTipsbankers_Report3["English"] = array();
	$fieldLabelsbankers_Report3["English"]["Year__CURDATE____3"] = "Year (CURDATE())-3";
	$fieldToolTipsbankers_Report3["English"]["Year (CURDATE())-3"] = "";
	if (count($fieldToolTipsbankers_Report3["English"]))
		$tdatabankers_Report3[".isUseToolTips"] = true;
}
	
	
	$tdatabankers_Report3[".NCSearch"] = true;



$tdatabankers_Report3[".shortTableName"] = "bankers_Report3";
$tdatabankers_Report3[".nSecOptions"] = 0;
$tdatabankers_Report3[".recsPerRowList"] = 1;
$tdatabankers_Report3[".mainTableOwnerID"] = "";
$tdatabankers_Report3[".moveNext"] = 1;
$tdatabankers_Report3[".nType"] = 2;

$tdatabankers_Report3[".strOriginalTableName"] = "bankers";




$tdatabankers_Report3[".showAddInPopup"] = false;

$tdatabankers_Report3[".showEditInPopup"] = false;

$tdatabankers_Report3[".showViewInPopup"] = false;

$tdatabankers_Report3[".fieldsForRegister"] = array();

$tdatabankers_Report3[".listAjax"] = false;

	$tdatabankers_Report3[".audit"] = false;

	$tdatabankers_Report3[".locking"] = false;

$tdatabankers_Report3[".listIcons"] = true;
$tdatabankers_Report3[".edit"] = true;
$tdatabankers_Report3[".inlineEdit"] = true;
$tdatabankers_Report3[".inlineAdd"] = true;
$tdatabankers_Report3[".view"] = true;

$tdatabankers_Report3[".exportTo"] = true;

$tdatabankers_Report3[".printFriendly"] = true;

$tdatabankers_Report3[".delete"] = true;

$tdatabankers_Report3[".showSimpleSearchOptions"] = false;

$tdatabankers_Report3[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers_Report3[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers_Report3[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankers_Report3[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers_Report3[".isUseTimeForSearch"] = false;




$tdatabankers_Report3[".allSearchFields"] = array();

$tdatabankers_Report3[".allSearchFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".googleLikeFields"][] = "Year (CURDATE())-3";


$tdatabankers_Report3[".advSearchFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers_Report3[".strOrderBy"] = $tstrOrderBy;

$tdatabankers_Report3[".orderindexes"] = array();

$tdatabankers_Report3[".sqlHead"] = " Select Year (CURDATE())-3";
$tdatabankers_Report3[".sqlFrom"] = "";
$tdatabankers_Report3[".sqlWhereExpr"] = "";
$tdatabankers_Report3[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers_Report3[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers_Report3[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers_Report3 = array();
$tdatabankers_Report3[".Keys"] = $tableKeysbankers_Report3;

$tdatabankers_Report3[".listFields"] = array();
$tdatabankers_Report3[".listFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".viewFields"] = array();
$tdatabankers_Report3[".viewFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".addFields"] = array();

$tdatabankers_Report3[".inlineAddFields"] = array();
$tdatabankers_Report3[".inlineAddFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".editFields"] = array();

$tdatabankers_Report3[".inlineEditFields"] = array();
$tdatabankers_Report3[".inlineEditFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".exportFields"] = array();
$tdatabankers_Report3[".exportFields"][] = "Year (CURDATE())-3";

$tdatabankers_Report3[".printFields"] = array();
$tdatabankers_Report3[".printFields"][] = "Year (CURDATE())-3";

//	Year (CURDATE())-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Year (CURDATE())-3";
	$fdata["GoodName"] = "Year__CURDATE____3";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Year (CURDATE())-3"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Year (CURDATE())-3"; 
		$fdata["FullName"] = "Year (CURDATE())-3";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers_Report3["Year (CURDATE())-3"] = $fdata;

	
$tables_data["bankers Report3"]=&$tdatabankers_Report3;
$field_labels["bankers_Report3"] = &$fieldLabelsbankers_Report3;
$fieldToolTips["bankers Report3"] = &$fieldToolTipsbankers_Report3;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers Report3"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankers Report3"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers_Report3()
{
$proto0=array();
$proto0["m_strHead"] = " Select";
$proto0["m_strFieldList"] = "Year (CURDATE())-3";
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
						$proto5=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "Year (CURDATE())-3"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankers_Report3 = createSqlQuery_bankers_Report3();
	$tdatabankers_Report3[".sqlquery"] = $queryData_bankers_Report3;
	
if(isset($tdatabankers_Report3["field2"])){
	$tdatabankers_Report3["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers_Report3["field2"]["LookupOrderBy"] = "name";
	$tdatabankers_Report3["field2"]["LookupType"] = 4;
	$tdatabankers_Report3["field2"]["LinkField"] = "email";
	$tdatabankers_Report3["field2"]["DisplayField"] = "name";
	$tdatabankers_Report3[".hasCustomViewField"] = true;
}

$tableEvents["bankers Report3"] = new eventsBase;
$tdatabankers_Report3[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankers Report3");

?>