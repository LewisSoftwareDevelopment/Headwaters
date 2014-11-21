<?php
require_once(getabspath("classes/cipherer.php"));
$tdataChanges_Since_Last_Month_Dead = array();
	$tdataChanges_Since_Last_Month_Dead[".NumberOfChars"] = 80; 
	$tdataChanges_Since_Last_Month_Dead[".ShortName"] = "Changes_Since_Last_Month_Dead";
	$tdataChanges_Since_Last_Month_Dead[".OwnerID"] = "";
	$tdataChanges_Since_Last_Month_Dead[".OriginalTable"] = "company";

//	field labels
$fieldLabelsChanges_Since_Last_Month_Dead = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsChanges_Since_Last_Month_Dead["English"] = array();
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"] = array();
	$fieldLabelsChanges_Since_Last_Month_Dead["English"]["Company"] = "Company";
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"]["Company"] = "";
	$fieldLabelsChanges_Since_Last_Month_Dead["English"]["Dead_Date"] = "Dead Date";
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"]["Dead Date"] = "";
	$fieldLabelsChanges_Since_Last_Month_Dead["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"]["Deal Type"] = "";
	$fieldLabelsChanges_Since_Last_Month_Dead["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"]["Deal Slot"] = "";
	$fieldLabelsChanges_Since_Last_Month_Dead["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipsChanges_Since_Last_Month_Dead["English"]["Projected Transaction Size"] = "";
	if (count($fieldToolTipsChanges_Since_Last_Month_Dead["English"]))
		$tdataChanges_Since_Last_Month_Dead[".isUseToolTips"] = true;
}
	
	
	$tdataChanges_Since_Last_Month_Dead[".NCSearch"] = true;



$tdataChanges_Since_Last_Month_Dead[".shortTableName"] = "Changes_Since_Last_Month_Dead";
$tdataChanges_Since_Last_Month_Dead[".nSecOptions"] = 0;
$tdataChanges_Since_Last_Month_Dead[".recsPerRowList"] = 1;
$tdataChanges_Since_Last_Month_Dead[".mainTableOwnerID"] = "";
$tdataChanges_Since_Last_Month_Dead[".moveNext"] = 1;
$tdataChanges_Since_Last_Month_Dead[".nType"] = 2;

$tdataChanges_Since_Last_Month_Dead[".strOriginalTableName"] = "company";




$tdataChanges_Since_Last_Month_Dead[".showAddInPopup"] = false;

$tdataChanges_Since_Last_Month_Dead[".showEditInPopup"] = false;

$tdataChanges_Since_Last_Month_Dead[".showViewInPopup"] = false;

$tdataChanges_Since_Last_Month_Dead[".fieldsForRegister"] = array();

$tdataChanges_Since_Last_Month_Dead[".listAjax"] = false;

	$tdataChanges_Since_Last_Month_Dead[".audit"] = false;

	$tdataChanges_Since_Last_Month_Dead[".locking"] = false;

$tdataChanges_Since_Last_Month_Dead[".listIcons"] = true;
$tdataChanges_Since_Last_Month_Dead[".edit"] = true;
$tdataChanges_Since_Last_Month_Dead[".inlineEdit"] = true;
$tdataChanges_Since_Last_Month_Dead[".inlineAdd"] = true;
$tdataChanges_Since_Last_Month_Dead[".view"] = true;

$tdataChanges_Since_Last_Month_Dead[".exportTo"] = true;

$tdataChanges_Since_Last_Month_Dead[".printFriendly"] = true;

$tdataChanges_Since_Last_Month_Dead[".delete"] = true;

$tdataChanges_Since_Last_Month_Dead[".showSimpleSearchOptions"] = false;

$tdataChanges_Since_Last_Month_Dead[".showSearchPanel"] = true;

if (isMobile())
	$tdataChanges_Since_Last_Month_Dead[".isUseAjaxSuggest"] = false;
else 
	$tdataChanges_Since_Last_Month_Dead[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataChanges_Since_Last_Month_Dead[".addPageEvents"] = false;

// use timepicker for search panel
$tdataChanges_Since_Last_Month_Dead[".isUseTimeForSearch"] = false;




$tdataChanges_Since_Last_Month_Dead[".allSearchFields"] = array();

$tdataChanges_Since_Last_Month_Dead[".allSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".allSearchFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".allSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".allSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".allSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".googleLikeFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".googleLikeFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".googleLikeFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".googleLikeFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".googleLikeFields"][] = "Deal Slot";


$tdataChanges_Since_Last_Month_Dead[".advSearchFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".advSearchFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".advSearchFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".advSearchFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".advSearchFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataChanges_Since_Last_Month_Dead[".strOrderBy"] = $tstrOrderBy;

$tdataChanges_Since_Last_Month_Dead[".orderindexes"] = array();

$tdataChanges_Since_Last_Month_Dead[".sqlHead"] = "SELECT Company,  `Dead Date`,  `Deal Type`,  `Projected Transaction Size`,  `Deal Slot`";
$tdataChanges_Since_Last_Month_Dead[".sqlFrom"] = "FROM company";
$tdataChanges_Since_Last_Month_Dead[".sqlWhereExpr"] = "(Month(`Dead Date`) = Month(CURDATE())-3)";
$tdataChanges_Since_Last_Month_Dead[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataChanges_Since_Last_Month_Dead[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataChanges_Since_Last_Month_Dead[".arrGroupsPerPage"] = $arrGPP;

$tableKeysChanges_Since_Last_Month_Dead = array();
$tdataChanges_Since_Last_Month_Dead[".Keys"] = $tableKeysChanges_Since_Last_Month_Dead;

$tdataChanges_Since_Last_Month_Dead[".listFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".listFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".listFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".listFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".listFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".listFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".viewFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".viewFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".viewFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".viewFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".viewFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".viewFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".addFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".addFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".addFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".addFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".addFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".inlineAddFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".editFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".editFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".editFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".editFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".editFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".inlineEditFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".exportFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".exportFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".exportFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".exportFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".exportFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".exportFields"][] = "Deal Slot";

$tdataChanges_Since_Last_Month_Dead[".printFields"] = array();
$tdataChanges_Since_Last_Month_Dead[".printFields"][] = "Company";
$tdataChanges_Since_Last_Month_Dead[".printFields"][] = "Dead Date";
$tdataChanges_Since_Last_Month_Dead[".printFields"][] = "Deal Type";
$tdataChanges_Since_Last_Month_Dead[".printFields"][] = "Projected Transaction Size";
$tdataChanges_Since_Last_Month_Dead[".printFields"][] = "Deal Slot";

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
	
		
		
	$tdataChanges_Since_Last_Month_Dead["Company"] = $fdata;
//	Dead Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Dead Date";
	$fdata["GoodName"] = "Dead_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Dead Date"; 
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
	
		$fdata["strField"] = "Dead Date"; 
		$fdata["FullName"] = "`Dead Date`";
	
		
		
				
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
	
		
		
	$tdataChanges_Since_Last_Month_Dead["Dead Date"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
	
		
		
	$tdataChanges_Since_Last_Month_Dead["Deal Type"] = $fdata;
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
	
		
		
	$tdataChanges_Since_Last_Month_Dead["Projected Transaction Size"] = $fdata;
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
	
		
		
	$tdataChanges_Since_Last_Month_Dead["Deal Slot"] = $fdata;

	
$tables_data["Changes Since Last Month-Dead"]=&$tdataChanges_Since_Last_Month_Dead;
$field_labels["Changes_Since_Last_Month_Dead"] = &$fieldLabelsChanges_Since_Last_Month_Dead;
$fieldToolTips["Changes Since Last Month-Dead"] = &$fieldToolTipsChanges_Since_Last_Month_Dead;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Changes Since Last Month-Dead"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Changes Since Last Month-Dead"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Changes_Since_Last_Month_Dead()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Dead Date`,  `Deal Type`,  `Projected Transaction Size`,  `Deal Slot`";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(Month(`Dead Date`) = Month(CURDATE())-3)";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Month(`Dead Date`) = Month(CURDATE())-3";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$proto2=array();
$proto2["m_functiontype"] = "SQLF_CUSTOM";
$proto2["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`Dead Date`"
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
	"m_strName" => "Dead Date",
	"m_strTable" => "company"
));

$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
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
$queryData_Changes_Since_Last_Month_Dead = createSqlQuery_Changes_Since_Last_Month_Dead();
					$tdataChanges_Since_Last_Month_Dead[".sqlquery"] = $queryData_Changes_Since_Last_Month_Dead;
	
if(isset($tdataChanges_Since_Last_Month_Dead["field2"])){
	$tdataChanges_Since_Last_Month_Dead["field2"]["LookupTable"] = "carscars_view";
	$tdataChanges_Since_Last_Month_Dead["field2"]["LookupOrderBy"] = "name";
	$tdataChanges_Since_Last_Month_Dead["field2"]["LookupType"] = 4;
	$tdataChanges_Since_Last_Month_Dead["field2"]["LinkField"] = "email";
	$tdataChanges_Since_Last_Month_Dead["field2"]["DisplayField"] = "name";
	$tdataChanges_Since_Last_Month_Dead[".hasCustomViewField"] = true;
}

$tableEvents["Changes Since Last Month-Dead"] = new eventsBase;
$tdataChanges_Since_Last_Month_Dead[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Changes Since Last Month-Dead");

?>