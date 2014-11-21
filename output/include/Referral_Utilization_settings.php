<?php
require_once(getabspath("classes/cipherer.php"));
$tdataReferral_Utilization = array();
	$tdataReferral_Utilization[".NumberOfChars"] = 80; 
	$tdataReferral_Utilization[".ShortName"] = "Referral_Utilization";
	$tdataReferral_Utilization[".OwnerID"] = "";
	$tdataReferral_Utilization[".OriginalTable"] = "company";

//	field labels
$fieldLabelsReferral_Utilization = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsReferral_Utilization["English"] = array();
	$fieldToolTipsReferral_Utilization["English"] = array();
	$fieldLabelsReferral_Utilization["English"]["IBS"] = "IBS";
	$fieldToolTipsReferral_Utilization["English"]["IBS"] = "";
	$fieldLabelsReferral_Utilization["English"]["company_Count"] = "Company Count";
	$fieldToolTipsReferral_Utilization["English"]["company Count"] = "";
	$fieldLabelsReferral_Utilization["English"]["Name"] = "Name";
	$fieldToolTipsReferral_Utilization["English"]["Name"] = "";
	$fieldLabelsReferral_Utilization["English"]["Corp"] = "Corp";
	$fieldToolTipsReferral_Utilization["English"]["Corp"] = "";
	if (count($fieldToolTipsReferral_Utilization["English"]))
		$tdataReferral_Utilization[".isUseToolTips"] = true;
}
	
	
	$tdataReferral_Utilization[".NCSearch"] = true;



$tdataReferral_Utilization[".shortTableName"] = "Referral_Utilization";
$tdataReferral_Utilization[".nSecOptions"] = 0;
$tdataReferral_Utilization[".recsPerRowList"] = 1;
$tdataReferral_Utilization[".mainTableOwnerID"] = "";
$tdataReferral_Utilization[".moveNext"] = 1;
$tdataReferral_Utilization[".nType"] = 2;

$tdataReferral_Utilization[".strOriginalTableName"] = "company";




$tdataReferral_Utilization[".showAddInPopup"] = false;

$tdataReferral_Utilization[".showEditInPopup"] = false;

$tdataReferral_Utilization[".showViewInPopup"] = false;

$tdataReferral_Utilization[".fieldsForRegister"] = array();

$tdataReferral_Utilization[".listAjax"] = false;

	$tdataReferral_Utilization[".audit"] = false;

	$tdataReferral_Utilization[".locking"] = false;

$tdataReferral_Utilization[".listIcons"] = true;
$tdataReferral_Utilization[".edit"] = true;
$tdataReferral_Utilization[".inlineEdit"] = true;
$tdataReferral_Utilization[".inlineAdd"] = true;
$tdataReferral_Utilization[".view"] = true;

$tdataReferral_Utilization[".exportTo"] = true;

$tdataReferral_Utilization[".printFriendly"] = true;

$tdataReferral_Utilization[".delete"] = true;

$tdataReferral_Utilization[".showSimpleSearchOptions"] = false;

$tdataReferral_Utilization[".showSearchPanel"] = true;

if (isMobile())
	$tdataReferral_Utilization[".isUseAjaxSuggest"] = false;
else 
	$tdataReferral_Utilization[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataReferral_Utilization[".addPageEvents"] = false;

// use timepicker for search panel
$tdataReferral_Utilization[".isUseTimeForSearch"] = false;




$tdataReferral_Utilization[".allSearchFields"] = array();

$tdataReferral_Utilization[".allSearchFields"][] = "Name";
$tdataReferral_Utilization[".allSearchFields"][] = "IBS";
$tdataReferral_Utilization[".allSearchFields"][] = "company Count";
$tdataReferral_Utilization[".allSearchFields"][] = "Corp";

$tdataReferral_Utilization[".googleLikeFields"][] = "Name";
$tdataReferral_Utilization[".googleLikeFields"][] = "IBS";
$tdataReferral_Utilization[".googleLikeFields"][] = "company Count";
$tdataReferral_Utilization[".googleLikeFields"][] = "Corp";


$tdataReferral_Utilization[".advSearchFields"][] = "Name";
$tdataReferral_Utilization[".advSearchFields"][] = "IBS";
$tdataReferral_Utilization[".advSearchFields"][] = "company Count";
$tdataReferral_Utilization[".advSearchFields"][] = "Corp";

$tdataReferral_Utilization[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0) DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataReferral_Utilization[".strOrderBy"] = $tstrOrderBy;

$tdataReferral_Utilization[".orderindexes"] = array();
$tdataReferral_Utilization[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0)");

$tdataReferral_Utilization[".sqlHead"] = "SELECT bankers.Name,  ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0) AS IBS,  ifnull(group_concat(company), 0) AS `company Count`,  ifnull(coalesce(sum(`Referral Type` = 'Corporate to Practice' or `Referral Type` = 'Practice to Practice'), 0), 0) AS Corp";
$tdataReferral_Utilization[".sqlFrom"] = "FROM company  INNER JOIN bankers ON company.`Primary Banker` = bankers.Name";
$tdataReferral_Utilization[".sqlWhereExpr"] = "";
$tdataReferral_Utilization[".sqlTail"] = "GROUP BY bankers.Name";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataReferral_Utilization[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataReferral_Utilization[".arrGroupsPerPage"] = $arrGPP;

$tableKeysReferral_Utilization = array();
$tdataReferral_Utilization[".Keys"] = $tableKeysReferral_Utilization;

$tdataReferral_Utilization[".listFields"] = array();
$tdataReferral_Utilization[".listFields"][] = "Name";
$tdataReferral_Utilization[".listFields"][] = "IBS";
$tdataReferral_Utilization[".listFields"][] = "company Count";
$tdataReferral_Utilization[".listFields"][] = "Corp";

$tdataReferral_Utilization[".viewFields"] = array();
$tdataReferral_Utilization[".viewFields"][] = "Name";
$tdataReferral_Utilization[".viewFields"][] = "IBS";
$tdataReferral_Utilization[".viewFields"][] = "company Count";
$tdataReferral_Utilization[".viewFields"][] = "Corp";

$tdataReferral_Utilization[".addFields"] = array();

$tdataReferral_Utilization[".inlineAddFields"] = array();
$tdataReferral_Utilization[".inlineAddFields"][] = "Name";
$tdataReferral_Utilization[".inlineAddFields"][] = "IBS";
$tdataReferral_Utilization[".inlineAddFields"][] = "company Count";
$tdataReferral_Utilization[".inlineAddFields"][] = "Corp";

$tdataReferral_Utilization[".editFields"] = array();

$tdataReferral_Utilization[".inlineEditFields"] = array();
$tdataReferral_Utilization[".inlineEditFields"][] = "Name";
$tdataReferral_Utilization[".inlineEditFields"][] = "IBS";
$tdataReferral_Utilization[".inlineEditFields"][] = "company Count";
$tdataReferral_Utilization[".inlineEditFields"][] = "Corp";

$tdataReferral_Utilization[".exportFields"] = array();
$tdataReferral_Utilization[".exportFields"][] = "Name";
$tdataReferral_Utilization[".exportFields"][] = "IBS";
$tdataReferral_Utilization[".exportFields"][] = "company Count";
$tdataReferral_Utilization[".exportFields"][] = "Corp";

$tdataReferral_Utilization[".printFields"] = array();
$tdataReferral_Utilization[".printFields"][] = "Name";
$tdataReferral_Utilization[".printFields"][] = "IBS";
$tdataReferral_Utilization[".printFields"][] = "company Count";
$tdataReferral_Utilization[".printFields"][] = "Corp";

//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Name"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Name"; 
		$fdata["FullName"] = "bankers.Name";
	
		
		
				
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
	
		
		
	$tdataReferral_Utilization["Name"] = $fdata;
//	IBS
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "IBS";
	$fdata["GoodName"] = "IBS";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "IBS"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "IBS"; 
		$fdata["FullName"] = "ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0)";
	
		
		
				
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
	
		
		
	$tdataReferral_Utilization["IBS"] = $fdata;
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
		$fdata["FullName"] = "ifnull(group_concat(company), 0)";
	
		
		
				
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
	
		
		
	$tdataReferral_Utilization["company Count"] = $fdata;
//	Corp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Corp";
	$fdata["GoodName"] = "Corp";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Corp"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Corp"; 
		$fdata["FullName"] = "ifnull(coalesce(sum(`Referral Type` = 'Corporate to Practice' or `Referral Type` = 'Practice to Practice'), 0), 0)";
	
		
		
				
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
	
		
		
	$tdataReferral_Utilization["Corp"] = $fdata;

	
$tables_data["Referral Utilization"]=&$tdataReferral_Utilization;
$field_labels["Referral_Utilization"] = &$fieldLabelsReferral_Utilization;
$fieldToolTips["Referral Utilization"] = &$fieldToolTipsReferral_Utilization;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Referral Utilization"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Referral Utilization"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Referral_Utilization()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "bankers.Name,  ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0) AS IBS,  ifnull(group_concat(company), 0) AS `company Count`,  ifnull(coalesce(sum(`Referral Type` = 'Corporate to Practice' or `Referral Type` = 'Practice to Practice'), 0), 0) AS Corp";
$proto0["m_strFrom"] = "FROM company  INNER JOIN bankers ON company.`Primary Banker` = bankers.Name";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0) DESC";
$proto0["m_strTail"] = "GROUP BY bankers.Name";
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
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_functiontype"] = "SQLF_CUSTOM";
$proto8["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "coalesce(sum(`Referral Type` = 'IBS to Practice'), 0)"
));

$proto8["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto8["m_arguments"][]=$obj;
$proto8["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "IBS";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$proto12=array();
$proto12["m_functiontype"] = "SQLF_CUSTOM";
$proto12["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "group_concat(company)"
));

$proto12["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto12["m_arguments"][]=$obj;
$proto12["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto12);

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "company Count";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$proto16=array();
$proto16["m_functiontype"] = "SQLF_CUSTOM";
$proto16["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "coalesce(sum(`Referral Type` = 'Corporate to Practice' or `Referral Type` = 'Practice to Practice'), 0)"
));

$proto16["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto16["m_arguments"][]=$obj;
$proto16["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto16);

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "Corp";
$obj = new SQLFieldListItem($proto15);

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
												$proto23=array();
$proto23["m_link"] = "SQLL_INNERJOIN";
			$proto24=array();
$proto24["m_strName"] = "bankers";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "ID";
$proto24["m_columns"][] = "Name";
$proto24["m_columns"][] = "Start Date";
$proto24["m_columns"][] = "Budget Year";
$proto24["m_columns"][] = "Active";
$proto24["m_columns"][] = "YTD Revenue";
$proto24["m_columns"][] = "Last Year Rev";
$proto24["m_columns"][] = "Prior Year Rev";
$proto24["m_columns"][] = "Last Year Rank";
$proto24["m_columns"][] = "YTD+Last";
$proto24["m_columns"][] = "YTD+Last+Prior";
$proto24["m_columns"][] = "YTD Closing";
$proto24["m_columns"][] = "Last Year Closing";
$proto24["m_columns"][] = "YTD IBC";
$proto24["m_columns"][] = "YTD Engagements";
$proto24["m_columns"][] = "Total Current Engagments";
$proto24["m_columns"][] = "# Wheelhouse";
$proto24["m_columns"][] = "# Speculative";
$proto24["m_columns"][] = "# Minimum";
$proto24["m_columns"][] = "Last Name";
$proto24["m_columns"][] = "First Name";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "company.`Primary Banker` = bankers.Name";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "= bankers.Name";
$proto25["m_havingmode"] = "0";
$proto25["m_inBrackets"] = "0";
$proto25["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto25);

$proto23["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto23);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto27=array();
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto27["m_column"]=$obj;
$obj = new SQLGroupByItem($proto27);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
												$proto29=array();
						$proto30=array();
$proto30["m_functiontype"] = "SQLF_CUSTOM";
$proto30["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "coalesce(sum(`Referral Type` = 'IBS to Practice'), 0)"
));

$proto30["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto30["m_arguments"][]=$obj;
$proto30["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto30);

$proto29["m_column"]=$obj;
$proto29["m_bAsc"] = 0;
$proto29["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto29);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Referral_Utilization = createSqlQuery_Referral_Utilization();
				$tdataReferral_Utilization[".sqlquery"] = $queryData_Referral_Utilization;
	
if(isset($tdataReferral_Utilization["field2"])){
	$tdataReferral_Utilization["field2"]["LookupTable"] = "carscars_view";
	$tdataReferral_Utilization["field2"]["LookupOrderBy"] = "name";
	$tdataReferral_Utilization["field2"]["LookupType"] = 4;
	$tdataReferral_Utilization["field2"]["LinkField"] = "email";
	$tdataReferral_Utilization["field2"]["DisplayField"] = "name";
	$tdataReferral_Utilization[".hasCustomViewField"] = true;
}

$tableEvents["Referral Utilization"] = new eventsBase;
$tdataReferral_Utilization[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Referral Utilization");

?>