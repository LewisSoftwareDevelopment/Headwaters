<?php
require_once(getabspath("classes/cipherer.php"));
$tdataChanges_Since_Last_Month_EL = array();
	$tdataChanges_Since_Last_Month_EL[".NumberOfChars"] = 80; 
	$tdataChanges_Since_Last_Month_EL[".ShortName"] = "Changes_Since_Last_Month_EL";
	$tdataChanges_Since_Last_Month_EL[".OwnerID"] = "";
	$tdataChanges_Since_Last_Month_EL[".OriginalTable"] = "company";

//	field labels
$fieldLabelsChanges_Since_Last_Month_EL = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsChanges_Since_Last_Month_EL["English"] = array();
	$fieldToolTipsChanges_Since_Last_Month_EL["English"] = array();
	$fieldLabelsChanges_Since_Last_Month_EL["English"]["Company"] = "Company";
	$fieldToolTipsChanges_Since_Last_Month_EL["English"]["Company"] = "";
	$fieldLabelsChanges_Since_Last_Month_EL["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsChanges_Since_Last_Month_EL["English"]["Deal Type"] = "";
	$fieldLabelsChanges_Since_Last_Month_EL["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipsChanges_Since_Last_Month_EL["English"]["Deal Slot"] = "";
	$fieldLabelsChanges_Since_Last_Month_EL["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipsChanges_Since_Last_Month_EL["English"]["Projected Transaction Size"] = "";
	if (count($fieldToolTipsChanges_Since_Last_Month_EL["English"]))
		$tdataChanges_Since_Last_Month_EL[".isUseToolTips"] = true;
}
	
	
	$tdataChanges_Since_Last_Month_EL[".NCSearch"] = true;



$tdataChanges_Since_Last_Month_EL[".shortTableName"] = "Changes_Since_Last_Month_EL";
$tdataChanges_Since_Last_Month_EL[".nSecOptions"] = 0;
$tdataChanges_Since_Last_Month_EL[".recsPerRowList"] = 1;
$tdataChanges_Since_Last_Month_EL[".mainTableOwnerID"] = "";
$tdataChanges_Since_Last_Month_EL[".moveNext"] = 1;
$tdataChanges_Since_Last_Month_EL[".nType"] = 2;

$tdataChanges_Since_Last_Month_EL[".strOriginalTableName"] = "company";




$tdataChanges_Since_Last_Month_EL[".showAddInPopup"] = false;

$tdataChanges_Since_Last_Month_EL[".showEditInPopup"] = false;

$tdataChanges_Since_Last_Month_EL[".showViewInPopup"] = false;

$tdataChanges_Since_Last_Month_EL[".fieldsForRegister"] = array();

$tdataChanges_Since_Last_Month_EL[".listAjax"] = false;

	$tdataChanges_Since_Last_Month_EL[".audit"] = false;

	$tdataChanges_Since_Last_Month_EL[".locking"] = false;

$tdataChanges_Since_Last_Month_EL[".listIcons"] = true;
$tdataChanges_Since_Last_Month_EL[".edit"] = true;
$tdataChanges_Since_Last_Month_EL[".inlineEdit"] = true;
$tdataChanges_Since_Last_Month_EL[".inlineAdd"] = true;
$tdataChanges_Since_Last_Month_EL[".view"] = true;

$tdataChanges_Since_Last_Month_EL[".exportTo"] = true;

$tdataChanges_Since_Last_Month_EL[".printFriendly"] = true;

$tdataChanges_Since_Last_Month_EL[".delete"] = true;

$tdataChanges_Since_Last_Month_EL[".showSimpleSearchOptions"] = false;

$tdataChanges_Since_Last_Month_EL[".showSearchPanel"] = true;

if (isMobile())
	$tdataChanges_Since_Last_Month_EL[".isUseAjaxSuggest"] = false;
else 
	$tdataChanges_Since_Last_Month_EL[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataChanges_Since_Last_Month_EL[".addPageEvents"] = false;

// use timepicker for search panel
$tdataChanges_Since_Last_Month_EL[".isUseTimeForSearch"] = false;




$tdataChanges_Since_Last_Month_EL[".allSearchFields"] = array();

$tdataChanges_Since_Last_Month_EL[".allSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".allSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".allSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".allSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".googleLikeFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".googleLikeFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".googleLikeFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".googleLikeFields"][] = "Deal Slot";


$tdataChanges_Since_Last_Month_EL[".advSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".advSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".advSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".advSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataChanges_Since_Last_Month_EL[".strOrderBy"] = $tstrOrderBy;

$tdataChanges_Since_Last_Month_EL[".orderindexes"] = array();

$tdataChanges_Since_Last_Month_EL[".sqlHead"] = "SELECT Company,  `EL Date` AS `Deal Type`,  `Projected Transaction Size`,  `Deal Slot`";
$tdataChanges_Since_Last_Month_EL[".sqlFrom"] = "FROM company";
$tdataChanges_Since_Last_Month_EL[".sqlWhereExpr"] = "(Month(`EL Date`) = Month(CURDATE())-3)";
$tdataChanges_Since_Last_Month_EL[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataChanges_Since_Last_Month_EL[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataChanges_Since_Last_Month_EL[".arrGroupsPerPage"] = $arrGPP;

$tableKeysChanges_Since_Last_Month_EL = array();
$tdataChanges_Since_Last_Month_EL[".Keys"] = $tableKeysChanges_Since_Last_Month_EL;

$tdataChanges_Since_Last_Month_EL[".listFields"] = array();
$tdataChanges_Since_Last_Month_EL[".listFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".listFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".listFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".listFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".viewFields"] = array();
$tdataChanges_Since_Last_Month_EL[".viewFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".viewFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".viewFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".viewFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".addFields"] = array();
$tdataChanges_Since_Last_Month_EL[".addFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".addFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".addFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".inlineAddFields"] = array();
$tdataChanges_Since_Last_Month_EL[".inlineAddFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".inlineAddFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".inlineAddFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".inlineAddFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".editFields"] = array();
$tdataChanges_Since_Last_Month_EL[".editFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".editFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".editFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".inlineEditFields"] = array();
$tdataChanges_Since_Last_Month_EL[".inlineEditFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".inlineEditFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".inlineEditFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".inlineEditFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".exportFields"] = array();
$tdataChanges_Since_Last_Month_EL[".exportFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".exportFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".exportFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".exportFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_EL[".printFields"] = array();
$tdataChanges_Since_Last_Month_EL[".printFields"][] = "Company";
$tdataChanges_Since_Last_Month_EL[".printFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_EL[".printFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_EL[".printFields"][] = "Deal Slot";

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
	
		
		
	$tdataChanges_Since_Last_Month_EL["Company"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Deal Type";
	$fdata["GoodName"] = "Deal_Type";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Deal Type"; 
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
	
		$fdata["strField"] = "EL Date"; 
		$fdata["FullName"] = "`EL Date`";
	
		
		
				
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
	
		
		
	$tdataChanges_Since_Last_Month_EL["Deal Type"] = $fdata;
//	Projected Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
	
		
		
	$tdataChanges_Since_Last_Month_EL["Projected Transaction Size"] = $fdata;
//	Deal Slot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
	
		
		
	$tdataChanges_Since_Last_Month_EL["Deal Slot"] = $fdata;

	
$tables_data["Changes Since Last Month-EL"]=&$tdataChanges_Since_Last_Month_EL;
$field_labels["Changes_Since_Last_Month_EL"] = &$fieldLabelsChanges_Since_Last_Month_EL;
$fieldToolTips["Changes Since Last Month-EL"] = &$fieldToolTipsChanges_Since_Last_Month_EL;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Changes Since Last Month-EL"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Changes Since Last Month-EL"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Changes_Since_Last_Month_EL()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `EL Date` AS `Deal Type`,  `Projected Transaction Size`,  `Deal Slot`";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(Month(`EL Date`) = Month(CURDATE())-3)";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Month(`EL Date`) = Month(CURDATE())-3";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$proto2=array();
$proto2["m_functiontype"] = "SQLF_CUSTOM";
$proto2["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`EL Date`"
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
	"m_strName" => "EL Date",
	"m_strTable" => "company"
));

$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "Deal Type";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "company";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "ID";
$proto15["m_columns"][] = "Company";
$proto15["m_columns"][] = "Deal Slot";
$proto15["m_columns"][] = "IBC Date";
$proto15["m_columns"][] = "EL Date";
$proto15["m_columns"][] = "Project Name";
$proto15["m_columns"][] = "Status";
$proto15["m_columns"][] = "Deal Type";
$proto15["m_columns"][] = "Projected Fee";
$proto15["m_columns"][] = "Projected Transaction Size";
$proto15["m_columns"][] = "Est. Close Date";
$proto15["m_columns"][] = "Primary Banker";
$proto15["m_columns"][] = "Practice Area";
$proto15["m_columns"][] = "Ownership Class";
$proto15["m_columns"][] = "Industry";
$proto15["m_columns"][] = "Referral Type";
$proto15["m_columns"][] = "Referral Source-Company";
$proto15["m_columns"][] = "Referral Scource-Ind.";
$proto15["m_columns"][] = "Description";
$proto15["m_columns"][] = "Dead Date";
$proto15["m_columns"][] = "EL Expiration Date";
$proto15["m_columns"][] = "Engagment Fee";
$proto15["m_columns"][] = "Fee Minimum";
$proto15["m_columns"][] = "Final Total Sucess Fee";
$proto15["m_columns"][] = "Final Transaction Size";
$proto15["m_columns"][] = "Monthly Retainer";
$proto15["m_columns"][] = "Closed Date";
$proto15["m_columns"][] = "Team Split-1";
$proto15["m_columns"][] = "Team-1";
$proto15["m_columns"][] = "Team Split-2";
$proto15["m_columns"][] = "Team-2";
$proto15["m_columns"][] = "Team Split-3";
$proto15["m_columns"][] = "Team Split-4";
$proto15["m_columns"][] = "Team Split-5";
$proto15["m_columns"][] = "Team Split-6";
$proto15["m_columns"][] = "Team-3";
$proto15["m_columns"][] = "Team-4";
$proto15["m_columns"][] = "Team-5";
$proto15["m_columns"][] = "Team-6";
$proto15["m_columns"][] = "Fee Split-1";
$proto15["m_columns"][] = "Fee Split-2";
$proto15["m_columns"][] = "Fee Split-3";
$proto15["m_columns"][] = "Fee Split-4";
$proto15["m_columns"][] = "Fee Split-5";
$proto15["m_columns"][] = "Fee Split-6";
$proto15["m_columns"][] = "Fee To-1";
$proto15["m_columns"][] = "Fee To-2";
$proto15["m_columns"][] = "Fee To-3";
$proto15["m_columns"][] = "Fee To-4";
$proto15["m_columns"][] = "Fee To-5";
$proto15["m_columns"][] = "Fee To-6";
$proto15["m_columns"][] = "Enterpise Value";
$proto15["m_columns"][] = "Fee Details";
$proto15["m_columns"][] = "Split to Corporate";
$proto15["m_columns"][] = "Paul";
$proto15["m_columns"][] = "McBroom";
$proto15["m_columns"][] = "Month of Close";
$proto15["m_columns"][] = "Gross This";
$proto15["m_columns"][] = "Gross Next";
$proto15["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_alias"] = "";
$proto16=array();
$proto16["m_sql"] = "";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "";
$proto16["m_havingmode"] = "0";
$proto16["m_inBrackets"] = "0";
$proto16["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto16);

$proto14["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto14);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Changes_Since_Last_Month_EL = createSqlQuery_Changes_Since_Last_Month_EL();
				$tdataChanges_Since_Last_Month_EL[".sqlquery"] = $queryData_Changes_Since_Last_Month_EL;
	
if(isset($tdataChanges_Since_Last_Month_EL["field2"])){
	$tdataChanges_Since_Last_Month_EL["field2"]["LookupTable"] = "carscars_view";
	$tdataChanges_Since_Last_Month_EL["field2"]["LookupOrderBy"] = "name";
	$tdataChanges_Since_Last_Month_EL["field2"]["LookupType"] = 4;
	$tdataChanges_Since_Last_Month_EL["field2"]["LinkField"] = "email";
	$tdataChanges_Since_Last_Month_EL["field2"]["DisplayField"] = "name";
	$tdataChanges_Since_Last_Month_EL[".hasCustomViewField"] = true;
}

$tableEvents["Changes Since Last Month-EL"] = new eventsBase;
$tdataChanges_Since_Last_Month_EL[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Changes Since Last Month-EL");

?>