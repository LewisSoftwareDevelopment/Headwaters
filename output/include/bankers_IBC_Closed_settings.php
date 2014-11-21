<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers_IBC_Closed = array();
	$tdatabankers_IBC_Closed[".NumberOfChars"] = 80; 
	$tdatabankers_IBC_Closed[".ShortName"] = "bankers_IBC_Closed";
	$tdatabankers_IBC_Closed[".OwnerID"] = "";
	$tdatabankers_IBC_Closed[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsbankers_IBC_Closed = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers_IBC_Closed["English"] = array();
	$fieldToolTipsbankers_IBC_Closed["English"] = array();
	$fieldLabelsbankers_IBC_Closed["English"]["Rows"] = "Rows";
	$fieldToolTipsbankers_IBC_Closed["English"]["Rows"] = "";
	$fieldLabelsbankers_IBC_Closed["English"]["Primary_Banker"] = "Primary Banker";
	$fieldToolTipsbankers_IBC_Closed["English"]["Primary Banker"] = "";
	$fieldLabelsbankers_IBC_Closed["English"]["company_Count"] = "Company Count";
	$fieldToolTipsbankers_IBC_Closed["English"]["company Count"] = "";
	$fieldLabelsbankers_IBC_Closed["English"]["IBC"] = "IBC";
	$fieldToolTipsbankers_IBC_Closed["English"]["IBC"] = "";
	$fieldLabelsbankers_IBC_Closed["English"]["Closed"] = "Closed";
	$fieldToolTipsbankers_IBC_Closed["English"]["Closed"] = "";
	if (count($fieldToolTipsbankers_IBC_Closed["English"]))
		$tdatabankers_IBC_Closed[".isUseToolTips"] = true;
}
	
	
	$tdatabankers_IBC_Closed[".NCSearch"] = true;



$tdatabankers_IBC_Closed[".shortTableName"] = "bankers_IBC_Closed";
$tdatabankers_IBC_Closed[".nSecOptions"] = 0;
$tdatabankers_IBC_Closed[".recsPerRowList"] = 1;
$tdatabankers_IBC_Closed[".mainTableOwnerID"] = "";
$tdatabankers_IBC_Closed[".moveNext"] = 1;
$tdatabankers_IBC_Closed[".nType"] = 2;

$tdatabankers_IBC_Closed[".strOriginalTableName"] = "bankers";




$tdatabankers_IBC_Closed[".showAddInPopup"] = false;

$tdatabankers_IBC_Closed[".showEditInPopup"] = false;

$tdatabankers_IBC_Closed[".showViewInPopup"] = false;

$tdatabankers_IBC_Closed[".fieldsForRegister"] = array();

$tdatabankers_IBC_Closed[".listAjax"] = false;

	$tdatabankers_IBC_Closed[".audit"] = false;

	$tdatabankers_IBC_Closed[".locking"] = false;

$tdatabankers_IBC_Closed[".listIcons"] = true;
$tdatabankers_IBC_Closed[".edit"] = true;
$tdatabankers_IBC_Closed[".inlineEdit"] = true;
$tdatabankers_IBC_Closed[".inlineAdd"] = true;
$tdatabankers_IBC_Closed[".view"] = true;

$tdatabankers_IBC_Closed[".exportTo"] = true;

$tdatabankers_IBC_Closed[".printFriendly"] = true;

$tdatabankers_IBC_Closed[".delete"] = true;

$tdatabankers_IBC_Closed[".showSimpleSearchOptions"] = false;

$tdatabankers_IBC_Closed[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers_IBC_Closed[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers_IBC_Closed[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankers_IBC_Closed[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers_IBC_Closed[".isUseTimeForSearch"] = false;




$tdatabankers_IBC_Closed[".allSearchFields"] = array();

$tdatabankers_IBC_Closed[".allSearchFields"][] = "Rows";
$tdatabankers_IBC_Closed[".allSearchFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".allSearchFields"][] = "company Count";
$tdatabankers_IBC_Closed[".allSearchFields"][] = "IBC";
$tdatabankers_IBC_Closed[".allSearchFields"][] = "Closed";

$tdatabankers_IBC_Closed[".googleLikeFields"][] = "Rows";
$tdatabankers_IBC_Closed[".googleLikeFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".googleLikeFields"][] = "company Count";
$tdatabankers_IBC_Closed[".googleLikeFields"][] = "IBC";
$tdatabankers_IBC_Closed[".googleLikeFields"][] = "Closed";


$tdatabankers_IBC_Closed[".advSearchFields"][] = "Rows";
$tdatabankers_IBC_Closed[".advSearchFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".advSearchFields"][] = "company Count";
$tdatabankers_IBC_Closed[".advSearchFields"][] = "IBC";
$tdatabankers_IBC_Closed[".advSearchFields"][] = "Closed";

$tdatabankers_IBC_Closed[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY `Primary Banker`";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers_IBC_Closed[".strOrderBy"] = $tstrOrderBy;

$tdatabankers_IBC_Closed[".orderindexes"] = array();
$tdatabankers_IBC_Closed[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "`Primary Banker`");

$tdatabankers_IBC_Closed[".sqlHead"] = "SELECT COUNT(*) AS `Rows`,  `Primary Banker`,  group_concat(company) AS `company Count`,  COUNT(`IBC Date`) AS IBC,  COUNT(`Closed Date`) AS Closed";
$tdatabankers_IBC_Closed[".sqlFrom"] = "FROM company";
$tdatabankers_IBC_Closed[".sqlWhereExpr"] = "(Year(`EL Date`) =YEAR(CURDATE()))";
$tdatabankers_IBC_Closed[".sqlTail"] = "GROUP BY `Primary Banker`";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers_IBC_Closed[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers_IBC_Closed[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers_IBC_Closed = array();
$tdatabankers_IBC_Closed[".Keys"] = $tableKeysbankers_IBC_Closed;

$tdatabankers_IBC_Closed[".listFields"] = array();
$tdatabankers_IBC_Closed[".listFields"][] = "Rows";
$tdatabankers_IBC_Closed[".listFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".listFields"][] = "company Count";
$tdatabankers_IBC_Closed[".listFields"][] = "IBC";
$tdatabankers_IBC_Closed[".listFields"][] = "Closed";

$tdatabankers_IBC_Closed[".viewFields"] = array();
$tdatabankers_IBC_Closed[".viewFields"][] = "Rows";
$tdatabankers_IBC_Closed[".viewFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".viewFields"][] = "company Count";
$tdatabankers_IBC_Closed[".viewFields"][] = "IBC";
$tdatabankers_IBC_Closed[".viewFields"][] = "Closed";

$tdatabankers_IBC_Closed[".addFields"] = array();

$tdatabankers_IBC_Closed[".inlineAddFields"] = array();
$tdatabankers_IBC_Closed[".inlineAddFields"][] = "Rows";
$tdatabankers_IBC_Closed[".inlineAddFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".inlineAddFields"][] = "company Count";
$tdatabankers_IBC_Closed[".inlineAddFields"][] = "IBC";
$tdatabankers_IBC_Closed[".inlineAddFields"][] = "Closed";

$tdatabankers_IBC_Closed[".editFields"] = array();

$tdatabankers_IBC_Closed[".inlineEditFields"] = array();
$tdatabankers_IBC_Closed[".inlineEditFields"][] = "Rows";
$tdatabankers_IBC_Closed[".inlineEditFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".inlineEditFields"][] = "company Count";
$tdatabankers_IBC_Closed[".inlineEditFields"][] = "IBC";
$tdatabankers_IBC_Closed[".inlineEditFields"][] = "Closed";

$tdatabankers_IBC_Closed[".exportFields"] = array();
$tdatabankers_IBC_Closed[".exportFields"][] = "Rows";
$tdatabankers_IBC_Closed[".exportFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".exportFields"][] = "company Count";
$tdatabankers_IBC_Closed[".exportFields"][] = "IBC";
$tdatabankers_IBC_Closed[".exportFields"][] = "Closed";

$tdatabankers_IBC_Closed[".printFields"] = array();
$tdatabankers_IBC_Closed[".printFields"][] = "Rows";
$tdatabankers_IBC_Closed[".printFields"][] = "Primary Banker";
$tdatabankers_IBC_Closed[".printFields"][] = "company Count";
$tdatabankers_IBC_Closed[".printFields"][] = "IBC";
$tdatabankers_IBC_Closed[".printFields"][] = "Closed";

//	Rows
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Rows";
	$fdata["GoodName"] = "Rows";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Rows"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Rows"; 
		$fdata["FullName"] = "COUNT(*)";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers_IBC_Closed["Rows"] = $fdata;
//	Primary Banker
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Primary Banker";
	$fdata["GoodName"] = "Primary_Banker";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Primary Banker"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Primary Banker"; 
		$fdata["FullName"] = "`Primary Banker`";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers_IBC_Closed["Primary Banker"] = $fdata;
//	company Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "company Count";
	$fdata["GoodName"] = "company_Count";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Company Count"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "company Count"; 
		$fdata["FullName"] = "group_concat(company)";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers_IBC_Closed["company Count"] = $fdata;
//	IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "IBC";
	$fdata["GoodName"] = "IBC";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "IBC"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "IBC"; 
		$fdata["FullName"] = "COUNT(`IBC Date`)";
	
		
		
				
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
	
		
		
	$tdatabankers_IBC_Closed["IBC"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Closed"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Closed"; 
		$fdata["FullName"] = "COUNT(`Closed Date`)";
	
		
		
				
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
	
		
		
	$tdatabankers_IBC_Closed["Closed"] = $fdata;

	
$tables_data["bankers IBC/Closed"]=&$tdatabankers_IBC_Closed;
$field_labels["bankers_IBC_Closed"] = &$fieldLabelsbankers_IBC_Closed;
$fieldToolTips["bankers IBC/Closed"] = &$fieldToolTipsbankers_IBC_Closed;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers IBC/Closed"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankers IBC/Closed"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers_IBC_Closed()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "COUNT(*) AS `Rows`,  `Primary Banker`,  group_concat(company) AS `company Count`,  COUNT(`IBC Date`) AS IBC,  COUNT(`Closed Date`) AS Closed";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(Year(`EL Date`) =YEAR(CURDATE()))";
$proto0["m_strOrderBy"] = "ORDER BY `Primary Banker`";
$proto0["m_strTail"] = "GROUP BY `Primary Banker`";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Year(`EL Date`) =YEAR(CURDATE())";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$proto2=array();
$proto2["m_functiontype"] = "SQLF_CUSTOM";
$proto2["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`EL Date`"
));

$proto2["m_arguments"][]=$obj;
$proto2["m_strFunctionName"] = "Year";
$obj = new SQLFunctionCall($proto2);

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "=YEAR(CURDATE())";
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
			$proto7=array();
$proto7["m_functiontype"] = "SQLF_COUNT";
$proto7["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "*"
));

$proto7["m_arguments"][]=$obj;
$proto7["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto7);

$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "Rows";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "group_concat(company)"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "company Count";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$proto14=array();
$proto14["m_functiontype"] = "SQLF_COUNT";
$proto14["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "IBC Date",
	"m_strTable" => "company"
));

$proto14["m_arguments"][]=$obj;
$proto14["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto14);

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "IBC";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$proto17=array();
$proto17["m_functiontype"] = "SQLF_COUNT";
$proto17["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Closed Date",
	"m_strTable" => "company"
));

$proto17["m_arguments"][]=$obj;
$proto17["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto17);

$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "Closed";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "company";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "ID";
$proto20["m_columns"][] = "Company";
$proto20["m_columns"][] = "Deal Slot";
$proto20["m_columns"][] = "IBC Date";
$proto20["m_columns"][] = "EL Date";
$proto20["m_columns"][] = "Project Name";
$proto20["m_columns"][] = "Status";
$proto20["m_columns"][] = "Deal Type";
$proto20["m_columns"][] = "Projected Fee";
$proto20["m_columns"][] = "Projected Transaction Size";
$proto20["m_columns"][] = "Est. Close Date";
$proto20["m_columns"][] = "Primary Banker";
$proto20["m_columns"][] = "Practice Area";
$proto20["m_columns"][] = "Ownership Class";
$proto20["m_columns"][] = "Industry";
$proto20["m_columns"][] = "Referral Type";
$proto20["m_columns"][] = "Referral Source-Company";
$proto20["m_columns"][] = "Referral Scource-Ind.";
$proto20["m_columns"][] = "Description";
$proto20["m_columns"][] = "Dead Date";
$proto20["m_columns"][] = "EL Expiration Date";
$proto20["m_columns"][] = "Engagment Fee";
$proto20["m_columns"][] = "Fee Minimum";
$proto20["m_columns"][] = "Final Total Sucess Fee";
$proto20["m_columns"][] = "Final Transaction Size";
$proto20["m_columns"][] = "Monthly Retainer";
$proto20["m_columns"][] = "Closed Date";
$proto20["m_columns"][] = "Team Split-1";
$proto20["m_columns"][] = "Team-1";
$proto20["m_columns"][] = "Team Split-2";
$proto20["m_columns"][] = "Team-2";
$proto20["m_columns"][] = "Team Split-3";
$proto20["m_columns"][] = "Team Split-4";
$proto20["m_columns"][] = "Team Split-5";
$proto20["m_columns"][] = "Team Split-6";
$proto20["m_columns"][] = "Team-3";
$proto20["m_columns"][] = "Team-4";
$proto20["m_columns"][] = "Team-5";
$proto20["m_columns"][] = "Team-6";
$proto20["m_columns"][] = "Fee Split-1";
$proto20["m_columns"][] = "Fee Split-2";
$proto20["m_columns"][] = "Fee Split-3";
$proto20["m_columns"][] = "Fee Split-4";
$proto20["m_columns"][] = "Fee Split-5";
$proto20["m_columns"][] = "Fee Split-6";
$proto20["m_columns"][] = "Fee To-1";
$proto20["m_columns"][] = "Fee To-2";
$proto20["m_columns"][] = "Fee To-3";
$proto20["m_columns"][] = "Fee To-4";
$proto20["m_columns"][] = "Fee To-5";
$proto20["m_columns"][] = "Fee To-6";
$proto20["m_columns"][] = "Enterpise Value";
$proto20["m_columns"][] = "Fee Details";
$proto20["m_columns"][] = "Split to Corporate";
$proto20["m_columns"][] = "Paul";
$proto20["m_columns"][] = "McBroom";
$proto20["m_columns"][] = "Month of Close";
$proto20["m_columns"][] = "Gross This";
$proto20["m_columns"][] = "Gross Next";
$proto20["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto23=array();
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto23["m_column"]=$obj;
$obj = new SQLGroupByItem($proto23);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
												$proto25=array();
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto25["m_column"]=$obj;
$proto25["m_bAsc"] = 1;
$proto25["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto25);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankers_IBC_Closed = createSqlQuery_bankers_IBC_Closed();
					$tdatabankers_IBC_Closed[".sqlquery"] = $queryData_bankers_IBC_Closed;
	
if(isset($tdatabankers_IBC_Closed["field2"])){
	$tdatabankers_IBC_Closed["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers_IBC_Closed["field2"]["LookupOrderBy"] = "name";
	$tdatabankers_IBC_Closed["field2"]["LookupType"] = 4;
	$tdatabankers_IBC_Closed["field2"]["LinkField"] = "email";
	$tdatabankers_IBC_Closed["field2"]["DisplayField"] = "name";
	$tdatabankers_IBC_Closed[".hasCustomViewField"] = true;
}

$tableEvents["bankers IBC/Closed"] = new eventsBase;
$tdatabankers_IBC_Closed[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankers IBC/Closed");

?>