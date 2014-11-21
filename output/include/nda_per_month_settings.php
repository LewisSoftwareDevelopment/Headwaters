<?php
require_once(getabspath("classes/cipherer.php"));
$tdatanda_per_month = array();
	$tdatanda_per_month[".NumberOfChars"] = 80; 
	$tdatanda_per_month[".ShortName"] = "nda_per_month";
	$tdatanda_per_month[".OwnerID"] = "";
	$tdatanda_per_month[".OriginalTable"] = "nda per month";

//	field labels
$fieldLabelsnda_per_month = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsnda_per_month["English"] = array();
	$fieldToolTipsnda_per_month["English"] = array();
	$fieldLabelsnda_per_month["English"]["ID"] = "ID";
	$fieldToolTipsnda_per_month["English"]["ID"] = "";
	$fieldLabelsnda_per_month["English"]["Date"] = "Date";
	$fieldToolTipsnda_per_month["English"]["Date"] = "";
	$fieldLabelsnda_per_month["English"]["Total_per_Month"] = "Total per Month";
	$fieldToolTipsnda_per_month["English"]["Total per Month"] = "";
	if (count($fieldToolTipsnda_per_month["English"]))
		$tdatanda_per_month[".isUseToolTips"] = true;
}
	
	
	$tdatanda_per_month[".NCSearch"] = true;



$tdatanda_per_month[".shortTableName"] = "nda_per_month";
$tdatanda_per_month[".nSecOptions"] = 0;
$tdatanda_per_month[".recsPerRowList"] = 1;
$tdatanda_per_month[".mainTableOwnerID"] = "";
$tdatanda_per_month[".moveNext"] = 1;
$tdatanda_per_month[".nType"] = 0;

$tdatanda_per_month[".strOriginalTableName"] = "nda per month";




$tdatanda_per_month[".showAddInPopup"] = false;

$tdatanda_per_month[".showEditInPopup"] = false;

$tdatanda_per_month[".showViewInPopup"] = false;

$tdatanda_per_month[".fieldsForRegister"] = array();

$tdatanda_per_month[".listAjax"] = false;

	$tdatanda_per_month[".audit"] = false;

	$tdatanda_per_month[".locking"] = false;

$tdatanda_per_month[".listIcons"] = true;
$tdatanda_per_month[".edit"] = true;
$tdatanda_per_month[".inlineEdit"] = true;
$tdatanda_per_month[".inlineAdd"] = true;
$tdatanda_per_month[".view"] = true;

$tdatanda_per_month[".exportTo"] = true;

$tdatanda_per_month[".printFriendly"] = true;

$tdatanda_per_month[".delete"] = true;

$tdatanda_per_month[".showSimpleSearchOptions"] = false;

$tdatanda_per_month[".showSearchPanel"] = true;

if (isMobile())
	$tdatanda_per_month[".isUseAjaxSuggest"] = false;
else 
	$tdatanda_per_month[".isUseAjaxSuggest"] = true;

$tdatanda_per_month[".rowHighlite"] = true;

// button handlers file names

$tdatanda_per_month[".addPageEvents"] = false;

// use timepicker for search panel
$tdatanda_per_month[".isUseTimeForSearch"] = false;




$tdatanda_per_month[".allSearchFields"] = array();

$tdatanda_per_month[".allSearchFields"][] = "ID";
$tdatanda_per_month[".allSearchFields"][] = "Date";
$tdatanda_per_month[".allSearchFields"][] = "Total per Month";

$tdatanda_per_month[".googleLikeFields"][] = "ID";
$tdatanda_per_month[".googleLikeFields"][] = "Date";
$tdatanda_per_month[".googleLikeFields"][] = "Total per Month";


$tdatanda_per_month[".advSearchFields"][] = "ID";
$tdatanda_per_month[".advSearchFields"][] = "Date";
$tdatanda_per_month[".advSearchFields"][] = "Total per Month";

$tdatanda_per_month[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatanda_per_month[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY `Date` DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatanda_per_month[".strOrderBy"] = $tstrOrderBy;

$tdatanda_per_month[".orderindexes"] = array();
$tdatanda_per_month[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "`Date`");

$tdatanda_per_month[".sqlHead"] = "SELECT ID,  `Date`,  `Total per Month`";
$tdatanda_per_month[".sqlFrom"] = "FROM `nda per month`";
$tdatanda_per_month[".sqlWhereExpr"] = "";
$tdatanda_per_month[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatanda_per_month[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatanda_per_month[".arrGroupsPerPage"] = $arrGPP;

$tableKeysnda_per_month = array();
$tableKeysnda_per_month[] = "ID";
$tdatanda_per_month[".Keys"] = $tableKeysnda_per_month;

$tdatanda_per_month[".listFields"] = array();
$tdatanda_per_month[".listFields"][] = "Date";
$tdatanda_per_month[".listFields"][] = "Total per Month";

$tdatanda_per_month[".viewFields"] = array();
$tdatanda_per_month[".viewFields"][] = "Date";
$tdatanda_per_month[".viewFields"][] = "Total per Month";

$tdatanda_per_month[".addFields"] = array();
$tdatanda_per_month[".addFields"][] = "Date";
$tdatanda_per_month[".addFields"][] = "Total per Month";

$tdatanda_per_month[".inlineAddFields"] = array();
$tdatanda_per_month[".inlineAddFields"][] = "Date";
$tdatanda_per_month[".inlineAddFields"][] = "Total per Month";

$tdatanda_per_month[".editFields"] = array();
$tdatanda_per_month[".editFields"][] = "Date";
$tdatanda_per_month[".editFields"][] = "Total per Month";

$tdatanda_per_month[".inlineEditFields"] = array();
$tdatanda_per_month[".inlineEditFields"][] = "Date";
$tdatanda_per_month[".inlineEditFields"][] = "Total per Month";

$tdatanda_per_month[".exportFields"] = array();
$tdatanda_per_month[".exportFields"][] = "Date";
$tdatanda_per_month[".exportFields"][] = "Total per Month";

$tdatanda_per_month[".printFields"] = array();
$tdatanda_per_month[".printFields"][] = "Date";
$tdatanda_per_month[".printFields"][] = "Total per Month";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "nda per month";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatanda_per_month["ID"] = $fdata;
//	Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Date";
	$fdata["GoodName"] = "Date";
	$fdata["ownerTable"] = "nda per month";
	$fdata["Label"] = "Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Date"; 
		$fdata["FullName"] = "`Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 5; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatanda_per_month["Date"] = $fdata;
//	Total per Month
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Total per Month";
	$fdata["GoodName"] = "Total_per_Month";
	$fdata["ownerTable"] = "nda per month";
	$fdata["Label"] = "Total per Month"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Total per Month"; 
		$fdata["FullName"] = "`Total per Month`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatanda_per_month["Total per Month"] = $fdata;

	
$tables_data["nda per month"]=&$tdatanda_per_month;
$field_labels["nda_per_month"] = &$fieldLabelsnda_per_month;
$fieldToolTips["nda per month"] = &$fieldToolTipsnda_per_month;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["nda per month"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["nda per month"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_nda_per_month()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  `Date`,  `Total per Month`";
$proto0["m_strFrom"] = "FROM `nda per month`";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY `Date` DESC";
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
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "nda per month"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Date",
	"m_strTable" => "nda per month"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Total per Month",
	"m_strTable" => "nda per month"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "nda per month";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "ID";
$proto12["m_columns"][] = "Date";
$proto12["m_columns"][] = "Total per Month";
$obj = new SQLTable($proto12);

$proto11["m_table"] = $obj;
$proto11["m_alias"] = "";
$proto13=array();
$proto13["m_sql"] = "";
$proto13["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
$proto13["m_strCase"] = "";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "0";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

$proto11["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto11);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto15=array();
						$obj = new SQLField(array(
	"m_strName" => "Date",
	"m_strTable" => "nda per month"
));

$proto15["m_column"]=$obj;
$proto15["m_bAsc"] = 0;
$proto15["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto15);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_nda_per_month = createSqlQuery_nda_per_month();
			$tdatanda_per_month[".sqlquery"] = $queryData_nda_per_month;
	
if(isset($tdatanda_per_month["field2"])){
	$tdatanda_per_month["field2"]["LookupTable"] = "carscars_view";
	$tdatanda_per_month["field2"]["LookupOrderBy"] = "name";
	$tdatanda_per_month["field2"]["LookupType"] = 4;
	$tdatanda_per_month["field2"]["LinkField"] = "email";
	$tdatanda_per_month["field2"]["DisplayField"] = "name";
	$tdatanda_per_month[".hasCustomViewField"] = true;
}

include_once(getabspath("include/nda_per_month_events.php"));
$tableEvents["nda per month"] = new eventclass_nda_per_month;
$tdatanda_per_month[".hasEvents"] = true;

$cipherer = new RunnerCipherer("nda per month");

?>