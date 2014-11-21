<?php
require_once(getabspath("classes/cipherer.php"));
$tdataChanges_Since_Last_Month_Closed = array();
	$tdataChanges_Since_Last_Month_Closed[".NumberOfChars"] = 80; 
	$tdataChanges_Since_Last_Month_Closed[".ShortName"] = "Changes_Since_Last_Month_Closed";
	$tdataChanges_Since_Last_Month_Closed[".OwnerID"] = "";
	$tdataChanges_Since_Last_Month_Closed[".OriginalTable"] = "company";

//	field labels
$fieldLabelsChanges_Since_Last_Month_Closed = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsChanges_Since_Last_Month_Closed["English"] = array();
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"] = array();
	$fieldLabelsChanges_Since_Last_Month_Closed["English"]["Company"] = "Company";
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"]["Company"] = "";
	$fieldLabelsChanges_Since_Last_Month_Closed["English"]["Closed_Date"] = "Closed Date";
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"]["Closed Date"] = "";
	$fieldLabelsChanges_Since_Last_Month_Closed["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"]["Deal Type"] = "";
	$fieldLabelsChanges_Since_Last_Month_Closed["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"]["Deal Slot"] = "";
	$fieldLabelsChanges_Since_Last_Month_Closed["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipsChanges_Since_Last_Month_Closed["English"]["Projected Transaction Size"] = "";
	if (count($fieldToolTipsChanges_Since_Last_Month_Closed["English"]))
		$tdataChanges_Since_Last_Month_Closed[".isUseToolTips"] = true;
}
	
	
	$tdataChanges_Since_Last_Month_Closed[".NCSearch"] = true;



$tdataChanges_Since_Last_Month_Closed[".shortTableName"] = "Changes_Since_Last_Month_Closed";
$tdataChanges_Since_Last_Month_Closed[".nSecOptions"] = 0;
$tdataChanges_Since_Last_Month_Closed[".recsPerRowList"] = 1;
$tdataChanges_Since_Last_Month_Closed[".mainTableOwnerID"] = "";
$tdataChanges_Since_Last_Month_Closed[".moveNext"] = 1;
$tdataChanges_Since_Last_Month_Closed[".nType"] = 2;

$tdataChanges_Since_Last_Month_Closed[".strOriginalTableName"] = "company";




$tdataChanges_Since_Last_Month_Closed[".showAddInPopup"] = false;

$tdataChanges_Since_Last_Month_Closed[".showEditInPopup"] = false;

$tdataChanges_Since_Last_Month_Closed[".showViewInPopup"] = false;

$tdataChanges_Since_Last_Month_Closed[".fieldsForRegister"] = array();

$tdataChanges_Since_Last_Month_Closed[".listAjax"] = false;

	$tdataChanges_Since_Last_Month_Closed[".audit"] = false;

	$tdataChanges_Since_Last_Month_Closed[".locking"] = false;

$tdataChanges_Since_Last_Month_Closed[".listIcons"] = true;
$tdataChanges_Since_Last_Month_Closed[".edit"] = true;
$tdataChanges_Since_Last_Month_Closed[".inlineEdit"] = true;
$tdataChanges_Since_Last_Month_Closed[".inlineAdd"] = true;
$tdataChanges_Since_Last_Month_Closed[".view"] = true;

$tdataChanges_Since_Last_Month_Closed[".exportTo"] = true;

$tdataChanges_Since_Last_Month_Closed[".printFriendly"] = true;

$tdataChanges_Since_Last_Month_Closed[".delete"] = true;

$tdataChanges_Since_Last_Month_Closed[".showSimpleSearchOptions"] = false;

$tdataChanges_Since_Last_Month_Closed[".showSearchPanel"] = true;

if (isMobile())
	$tdataChanges_Since_Last_Month_Closed[".isUseAjaxSuggest"] = false;
else 
	$tdataChanges_Since_Last_Month_Closed[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataChanges_Since_Last_Month_Closed[".addPageEvents"] = false;

// use timepicker for search panel
$tdataChanges_Since_Last_Month_Closed[".isUseTimeForSearch"] = false;




$tdataChanges_Since_Last_Month_Closed[".allSearchFields"] = array();

$tdataChanges_Since_Last_Month_Closed[".allSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".allSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".allSearchFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".allSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".allSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".googleLikeFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".googleLikeFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".googleLikeFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".googleLikeFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".googleLikeFields"][] = "Deal Slot";


$tdataChanges_Since_Last_Month_Closed[".advSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".advSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".advSearchFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".advSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".advSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataChanges_Since_Last_Month_Closed[".strOrderBy"] = $tstrOrderBy;

$tdataChanges_Since_Last_Month_Closed[".orderindexes"] = array();

$tdataChanges_Since_Last_Month_Closed[".sqlHead"] = "SELECT Company,  `Deal Type`,  `Closed Date`,  `Projected Transaction Size`,  `Deal Slot`";
$tdataChanges_Since_Last_Month_Closed[".sqlFrom"] = "FROM company";
$tdataChanges_Since_Last_Month_Closed[".sqlWhereExpr"] = "(Month(`Closed Date`) = Month(CURDATE())-3)";
$tdataChanges_Since_Last_Month_Closed[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataChanges_Since_Last_Month_Closed[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataChanges_Since_Last_Month_Closed[".arrGroupsPerPage"] = $arrGPP;

$tableKeysChanges_Since_Last_Month_Closed = array();
$tdataChanges_Since_Last_Month_Closed[".Keys"] = $tableKeysChanges_Since_Last_Month_Closed;

$tdataChanges_Since_Last_Month_Closed[".listFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".listFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".listFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".listFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".listFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".listFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".viewFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".viewFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".viewFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".viewFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".viewFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".viewFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".addFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".addFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".addFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".addFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".addFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".inlineAddFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".editFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".editFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".editFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".editFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".editFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".inlineEditFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".exportFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".exportFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".exportFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".exportFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".exportFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".exportFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Closed[".printFields"] = array();
$tdataChanges_Since_Last_Month_Closed[".printFields"][] = "Company";
$tdataChanges_Since_Last_Month_Closed[".printFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Closed[".printFields"][] = "Closed Date";
$tdataChanges_Since_Last_Month_Closed[".printFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Closed[".printFields"][] = "Deal Slot";

//	Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Company";
	$fdata["GoodName"] = "Company";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Company"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Company"; 
		$fdata["FullName"] = "Company";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataChanges_Since_Last_Month_Closed["Company"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Deal Type";
	$fdata["GoodName"] = "Deal_Type";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Deal Type"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Deal Type"; 
		$fdata["FullName"] = "`Deal Type`";
	
		
		
				
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
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataChanges_Since_Last_Month_Closed["Deal Type"] = $fdata;
//	Closed Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Closed Date";
	$fdata["GoodName"] = "Closed_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Closed Date"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Closed Date"; 
		$fdata["FullName"] = "`Closed Date`";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataChanges_Since_Last_Month_Closed["Closed Date"] = $fdata;
//	Projected Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Projected Transaction Size";
	$fdata["GoodName"] = "Projected_Transaction_Size";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Projected Transaction Size"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Projected Transaction Size"; 
		$fdata["FullName"] = "`Projected Transaction Size`";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month_Closed["Projected Transaction Size"] = $fdata;
//	Deal Slot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Deal Slot";
	$fdata["GoodName"] = "Deal_Slot";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Deal Slot"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Deal Slot"; 
		$fdata["FullName"] = "`Deal Slot`";
	
		
		
				
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
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataChanges_Since_Last_Month_Closed["Deal Slot"] = $fdata;

	
$tables_data["Changes Since Last Month-Closed"]=&$tdataChanges_Since_Last_Month_Closed;
$field_labels["Changes_Since_Last_Month_Closed"] = &$fieldLabelsChanges_Since_Last_Month_Closed;
$fieldToolTips["Changes Since Last Month-Closed"] = &$fieldToolTipsChanges_Since_Last_Month_Closed;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Changes Since Last Month-Closed"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Changes Since Last Month-Closed"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Changes_Since_Last_Month_Closed()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Deal Type`,  `Closed Date`,  `Projected Transaction Size`,  `Deal Slot`";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(Month(`Closed Date`) = Month(CURDATE())-3)";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Month(`Closed Date`) = Month(CURDATE())-3";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$proto2=array();
$proto2["m_functiontype"] = "SQLF_CUSTOM";
$proto2["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`Closed Date`"
));

$proto2["m_arguments"][]=$obj;
$proto2["m_strFunctionName"] = "Month";
$obj = new SQLFunctionCall($proto2);

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "= Month(CURDATE())-3";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = "0";
$proto4["m_inBrackets"] = "0";
$proto4["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto4);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto6=array();
			$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "Closed Date",
	"m_strTable" => "company"
));

$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "company";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "ID";
$proto17["m_columns"][] = "Company";
$proto17["m_columns"][] = "Deal Slot";
$proto17["m_columns"][] = "IBC Date";
$proto17["m_columns"][] = "EL Date";
$proto17["m_columns"][] = "Project Name";
$proto17["m_columns"][] = "Status";
$proto17["m_columns"][] = "Deal Type";
$proto17["m_columns"][] = "Projected Fee";
$proto17["m_columns"][] = "Projected Transaction Size";
$proto17["m_columns"][] = "Est. Close Date";
$proto17["m_columns"][] = "Primary Banker";
$proto17["m_columns"][] = "Practice Area";
$proto17["m_columns"][] = "Ownership Class";
$proto17["m_columns"][] = "Industry";
$proto17["m_columns"][] = "Referral Type";
$proto17["m_columns"][] = "Referral Source-Company";
$proto17["m_columns"][] = "Referral Scource-Ind.";
$proto17["m_columns"][] = "Description";
$proto17["m_columns"][] = "Dead Date";
$proto17["m_columns"][] = "EL Expiration Date";
$proto17["m_columns"][] = "Engagment Fee";
$proto17["m_columns"][] = "Fee Minimum";
$proto17["m_columns"][] = "Final Total Sucess Fee";
$proto17["m_columns"][] = "Final Transaction Size";
$proto17["m_columns"][] = "Monthly Retainer";
$proto17["m_columns"][] = "Closed Date";
$proto17["m_columns"][] = "Team Split-1";
$proto17["m_columns"][] = "Team-1";
$proto17["m_columns"][] = "Team Split-2";
$proto17["m_columns"][] = "Team-2";
$proto17["m_columns"][] = "Team Split-3";
$proto17["m_columns"][] = "Team Split-4";
$proto17["m_columns"][] = "Team Split-5";
$proto17["m_columns"][] = "Team Split-6";
$proto17["m_columns"][] = "Team-3";
$proto17["m_columns"][] = "Team-4";
$proto17["m_columns"][] = "Team-5";
$proto17["m_columns"][] = "Team-6";
$proto17["m_columns"][] = "Fee Split-1";
$proto17["m_columns"][] = "Fee Split-2";
$proto17["m_columns"][] = "Fee Split-3";
$proto17["m_columns"][] = "Fee Split-4";
$proto17["m_columns"][] = "Fee Split-5";
$proto17["m_columns"][] = "Fee Split-6";
$proto17["m_columns"][] = "Fee To-1";
$proto17["m_columns"][] = "Fee To-2";
$proto17["m_columns"][] = "Fee To-3";
$proto17["m_columns"][] = "Fee To-4";
$proto17["m_columns"][] = "Fee To-5";
$proto17["m_columns"][] = "Fee To-6";
$proto17["m_columns"][] = "Enterpise Value";
$proto17["m_columns"][] = "Fee Details";
$proto17["m_columns"][] = "Split to Corporate";
$proto17["m_columns"][] = "Paul";
$proto17["m_columns"][] = "McBroom";
$proto17["m_columns"][] = "Month of Close";
$proto17["m_columns"][] = "Gross This";
$proto17["m_columns"][] = "Gross Next";
$proto17["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_alias"] = "";
$proto18=array();
$proto18["m_sql"] = "";
$proto18["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto18["m_column"]=$obj;
$proto18["m_contained"] = array();
$proto18["m_strCase"] = "";
$proto18["m_havingmode"] = "0";
$proto18["m_inBrackets"] = "0";
$proto18["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto18);

$proto16["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto16);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Changes_Since_Last_Month_Closed = createSqlQuery_Changes_Since_Last_Month_Closed();
					$tdataChanges_Since_Last_Month_Closed[".sqlquery"] = $queryData_Changes_Since_Last_Month_Closed;
	
if(isset($tdataChanges_Since_Last_Month_Closed["field2"])){
	$tdataChanges_Since_Last_Month_Closed["field2"]["LookupTable"] = "carscars_view";
	$tdataChanges_Since_Last_Month_Closed["field2"]["LookupOrderBy"] = "name";
	$tdataChanges_Since_Last_Month_Closed["field2"]["LookupType"] = 4;
	$tdataChanges_Since_Last_Month_Closed["field2"]["LinkField"] = "email";
	$tdataChanges_Since_Last_Month_Closed["field2"]["DisplayField"] = "name";
	$tdataChanges_Since_Last_Month_Closed[".hasCustomViewField"] = true;
}

$tableEvents["Changes Since Last Month-Closed"] = new eventsBase;
$tdataChanges_Since_Last_Month_Closed[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Changes Since Last Month-Closed");

?>