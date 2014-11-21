<?php
require_once(getabspath("classes/cipherer.php"));
$tdataLive_Engagements_by_Status = array();
	$tdataLive_Engagements_by_Status[".NumberOfChars"] = 80; 
	$tdataLive_Engagements_by_Status[".ShortName"] = "Live_Engagements_by_Status";
	$tdataLive_Engagements_by_Status[".OwnerID"] = "";
	$tdataLive_Engagements_by_Status[".OriginalTable"] = "company";

//	field labels
$fieldLabelsLive_Engagements_by_Status = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsLive_Engagements_by_Status["English"] = array();
	$fieldToolTipsLive_Engagements_by_Status["English"] = array();
	$fieldLabelsLive_Engagements_by_Status["English"]["Company"] = "Company";
	$fieldToolTipsLive_Engagements_by_Status["English"]["Company"] = "";
	$fieldLabelsLive_Engagements_by_Status["English"]["Project_Name"] = "Project Name";
	$fieldToolTipsLive_Engagements_by_Status["English"]["Project Name"] = "";
	$fieldLabelsLive_Engagements_by_Status["English"]["Status"] = "Status";
	$fieldToolTipsLive_Engagements_by_Status["English"]["Status"] = "";
	if (count($fieldToolTipsLive_Engagements_by_Status["English"]))
		$tdataLive_Engagements_by_Status[".isUseToolTips"] = true;
}
	
	
	$tdataLive_Engagements_by_Status[".NCSearch"] = true;



$tdataLive_Engagements_by_Status[".shortTableName"] = "Live_Engagements_by_Status";
$tdataLive_Engagements_by_Status[".nSecOptions"] = 0;
$tdataLive_Engagements_by_Status[".recsPerRowList"] = 1;
$tdataLive_Engagements_by_Status[".mainTableOwnerID"] = "";
$tdataLive_Engagements_by_Status[".moveNext"] = 1;
$tdataLive_Engagements_by_Status[".nType"] = 2;

$tdataLive_Engagements_by_Status[".strOriginalTableName"] = "company";




$tdataLive_Engagements_by_Status[".showAddInPopup"] = false;

$tdataLive_Engagements_by_Status[".showEditInPopup"] = false;

$tdataLive_Engagements_by_Status[".showViewInPopup"] = false;

$tdataLive_Engagements_by_Status[".fieldsForRegister"] = array();

$tdataLive_Engagements_by_Status[".listAjax"] = false;

	$tdataLive_Engagements_by_Status[".audit"] = false;

	$tdataLive_Engagements_by_Status[".locking"] = false;

$tdataLive_Engagements_by_Status[".listIcons"] = true;
$tdataLive_Engagements_by_Status[".edit"] = true;
$tdataLive_Engagements_by_Status[".inlineEdit"] = true;
$tdataLive_Engagements_by_Status[".inlineAdd"] = true;
$tdataLive_Engagements_by_Status[".view"] = true;

$tdataLive_Engagements_by_Status[".exportTo"] = true;

$tdataLive_Engagements_by_Status[".printFriendly"] = true;

$tdataLive_Engagements_by_Status[".delete"] = true;

$tdataLive_Engagements_by_Status[".showSimpleSearchOptions"] = false;

$tdataLive_Engagements_by_Status[".showSearchPanel"] = true;

if (isMobile())
	$tdataLive_Engagements_by_Status[".isUseAjaxSuggest"] = false;
else 
	$tdataLive_Engagements_by_Status[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataLive_Engagements_by_Status[".addPageEvents"] = false;

// use timepicker for search panel
$tdataLive_Engagements_by_Status[".isUseTimeForSearch"] = false;




$tdataLive_Engagements_by_Status[".allSearchFields"] = array();

$tdataLive_Engagements_by_Status[".allSearchFields"][] = "Company";
$tdataLive_Engagements_by_Status[".allSearchFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".allSearchFields"][] = "Status";

$tdataLive_Engagements_by_Status[".googleLikeFields"][] = "Company";
$tdataLive_Engagements_by_Status[".googleLikeFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".googleLikeFields"][] = "Status";


$tdataLive_Engagements_by_Status[".advSearchFields"][] = "Company";
$tdataLive_Engagements_by_Status[".advSearchFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".advSearchFields"][] = "Status";

$tdataLive_Engagements_by_Status[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY Status, Company";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataLive_Engagements_by_Status[".strOrderBy"] = $tstrOrderBy;

$tdataLive_Engagements_by_Status[".orderindexes"] = array();
$tdataLive_Engagements_by_Status[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "Status");
$tdataLive_Engagements_by_Status[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Company");

$tdataLive_Engagements_by_Status[".sqlHead"] = "SELECT Company,  `Project Name`,  Status";
$tdataLive_Engagements_by_Status[".sqlFrom"] = "FROM company";
$tdataLive_Engagements_by_Status[".sqlWhereExpr"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$tdataLive_Engagements_by_Status[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataLive_Engagements_by_Status[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataLive_Engagements_by_Status[".arrGroupsPerPage"] = $arrGPP;

$tableKeysLive_Engagements_by_Status = array();
$tdataLive_Engagements_by_Status[".Keys"] = $tableKeysLive_Engagements_by_Status;

$tdataLive_Engagements_by_Status[".listFields"] = array();
$tdataLive_Engagements_by_Status[".listFields"][] = "Company";
$tdataLive_Engagements_by_Status[".listFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".listFields"][] = "Status";

$tdataLive_Engagements_by_Status[".viewFields"] = array();
$tdataLive_Engagements_by_Status[".viewFields"][] = "Company";
$tdataLive_Engagements_by_Status[".viewFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".viewFields"][] = "Status";

$tdataLive_Engagements_by_Status[".addFields"] = array();
$tdataLive_Engagements_by_Status[".addFields"][] = "Company";
$tdataLive_Engagements_by_Status[".addFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".addFields"][] = "Status";

$tdataLive_Engagements_by_Status[".inlineAddFields"] = array();
$tdataLive_Engagements_by_Status[".inlineAddFields"][] = "Company";
$tdataLive_Engagements_by_Status[".inlineAddFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".inlineAddFields"][] = "Status";

$tdataLive_Engagements_by_Status[".editFields"] = array();
$tdataLive_Engagements_by_Status[".editFields"][] = "Company";
$tdataLive_Engagements_by_Status[".editFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".editFields"][] = "Status";

$tdataLive_Engagements_by_Status[".inlineEditFields"] = array();
$tdataLive_Engagements_by_Status[".inlineEditFields"][] = "Company";
$tdataLive_Engagements_by_Status[".inlineEditFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".inlineEditFields"][] = "Status";

$tdataLive_Engagements_by_Status[".exportFields"] = array();
$tdataLive_Engagements_by_Status[".exportFields"][] = "Company";
$tdataLive_Engagements_by_Status[".exportFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".exportFields"][] = "Status";

$tdataLive_Engagements_by_Status[".printFields"] = array();
$tdataLive_Engagements_by_Status[".printFields"][] = "Company";
$tdataLive_Engagements_by_Status[".printFields"][] = "Project Name";
$tdataLive_Engagements_by_Status[".printFields"][] = "Status";

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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
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
	
		
		
	$tdataLive_Engagements_by_Status["Company"] = $fdata;
//	Project Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Project Name";
	$fdata["GoodName"] = "Project_Name";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Project Name"; 
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
	
		$fdata["strField"] = "Project Name"; 
		$fdata["FullName"] = "`Project Name`";
	
		
		
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
	
		
		
	$tdataLive_Engagements_by_Status["Project Name"] = $fdata;
//	Status
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Status";
	$fdata["GoodName"] = "Status";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Status"; 
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
	
		$fdata["strField"] = "Status"; 
		$fdata["FullName"] = "Status";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataLive_Engagements_by_Status["Status"] = $fdata;

	
$tables_data["Live Engagements by Status"]=&$tdataLive_Engagements_by_Status;
$field_labels["Live_Engagements_by_Status"] = &$fieldLabelsLive_Engagements_by_Status;
$fieldToolTips["Live Engagements by Status"] = &$fieldToolTipsLive_Engagements_by_Status;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Live Engagements by Status"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Live Engagements by Status"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Live_Engagements_by_Status()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Project Name`,  Status";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto0["m_strOrderBy"] = "ORDER BY Status, Company";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto1["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "Status = 'on hold'";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "= 'on hold'";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

			$proto1["m_contained"][]=$obj;
						$proto5=array();
$proto5["m_sql"] = "Status = 'in market'";
$proto5["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto5["m_column"]=$obj;
$proto5["m_contained"] = array();
$proto5["m_strCase"] = "= 'in market'";
$proto5["m_havingmode"] = "0";
$proto5["m_inBrackets"] = "0";
$proto5["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto5);

			$proto1["m_contained"][]=$obj;
						$proto7=array();
$proto7["m_sql"] = "Status = 'pre market'";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "= 'pre market'";
$proto7["m_havingmode"] = "0";
$proto7["m_inBrackets"] = "0";
$proto7["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto7);

			$proto1["m_contained"][]=$obj;
						$proto9=array();
$proto9["m_sql"] = "Status = 'under loi'";
$proto9["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto9["m_column"]=$obj;
$proto9["m_contained"] = array();
$proto9["m_strCase"] = "= 'under loi'";
$proto9["m_havingmode"] = "0";
$proto9["m_inBrackets"] = "0";
$proto9["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto9);

			$proto1["m_contained"][]=$obj;
						$proto11=array();
$proto11["m_sql"] = "Status = 'inactive'";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "= 'inactive'";
$proto11["m_havingmode"] = "0";
$proto11["m_inBrackets"] = "0";
$proto11["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto11);

			$proto1["m_contained"][]=$obj;
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
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

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "Project Name",
	"m_strTable" => "company"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto21=array();
$proto21["m_link"] = "SQLL_MAIN";
			$proto22=array();
$proto22["m_strName"] = "company";
$proto22["m_columns"] = array();
$proto22["m_columns"][] = "ID";
$proto22["m_columns"][] = "Company";
$proto22["m_columns"][] = "Deal Slot";
$proto22["m_columns"][] = "IBC Date";
$proto22["m_columns"][] = "EL Date";
$proto22["m_columns"][] = "Project Name";
$proto22["m_columns"][] = "Status";
$proto22["m_columns"][] = "Deal Type";
$proto22["m_columns"][] = "Projected Fee";
$proto22["m_columns"][] = "Projected Transaction Size";
$proto22["m_columns"][] = "Est. Close Date";
$proto22["m_columns"][] = "Primary Banker";
$proto22["m_columns"][] = "Practice Area";
$proto22["m_columns"][] = "Ownership Class";
$proto22["m_columns"][] = "Industry";
$proto22["m_columns"][] = "Referral Type";
$proto22["m_columns"][] = "Referral Source-Company";
$proto22["m_columns"][] = "Referral Scource-Ind.";
$proto22["m_columns"][] = "Description";
$proto22["m_columns"][] = "Dead Date";
$proto22["m_columns"][] = "EL Expiration Date";
$proto22["m_columns"][] = "Engagment Fee";
$proto22["m_columns"][] = "Fee Minimum";
$proto22["m_columns"][] = "Final Total Sucess Fee";
$proto22["m_columns"][] = "Final Transaction Size";
$proto22["m_columns"][] = "Monthly Retainer";
$proto22["m_columns"][] = "Closed Date";
$proto22["m_columns"][] = "Team Split-1";
$proto22["m_columns"][] = "Team-1";
$proto22["m_columns"][] = "Team Split-2";
$proto22["m_columns"][] = "Team-2";
$proto22["m_columns"][] = "Team Split-3";
$proto22["m_columns"][] = "Team Split-4";
$proto22["m_columns"][] = "Team Split-5";
$proto22["m_columns"][] = "Team Split-6";
$proto22["m_columns"][] = "Team-3";
$proto22["m_columns"][] = "Team-4";
$proto22["m_columns"][] = "Team-5";
$proto22["m_columns"][] = "Team-6";
$proto22["m_columns"][] = "Fee Split-1";
$proto22["m_columns"][] = "Fee Split-2";
$proto22["m_columns"][] = "Fee Split-3";
$proto22["m_columns"][] = "Fee Split-4";
$proto22["m_columns"][] = "Fee Split-5";
$proto22["m_columns"][] = "Fee Split-6";
$proto22["m_columns"][] = "Fee To-1";
$proto22["m_columns"][] = "Fee To-2";
$proto22["m_columns"][] = "Fee To-3";
$proto22["m_columns"][] = "Fee To-4";
$proto22["m_columns"][] = "Fee To-5";
$proto22["m_columns"][] = "Fee To-6";
$proto22["m_columns"][] = "Enterpise Value";
$proto22["m_columns"][] = "Fee Details";
$proto22["m_columns"][] = "Split to Corporate";
$proto22["m_columns"][] = "Paul";
$proto22["m_columns"][] = "McBroom";
$proto22["m_columns"][] = "Month of Close";
$proto22["m_columns"][] = "Gross This";
$proto22["m_columns"][] = "Gross Next";
$obj = new SQLTable($proto22);

$proto21["m_table"] = $obj;
$proto21["m_alias"] = "";
$proto23=array();
$proto23["m_sql"] = "";
$proto23["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto23["m_column"]=$obj;
$proto23["m_contained"] = array();
$proto23["m_strCase"] = "";
$proto23["m_havingmode"] = "0";
$proto23["m_inBrackets"] = "0";
$proto23["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto23);

$proto21["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto21);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto25=array();
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto25["m_column"]=$obj;
$proto25["m_bAsc"] = 1;
$proto25["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto25);

$proto0["m_orderby"][]=$obj;					
												$proto27=array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto27["m_column"]=$obj;
$proto27["m_bAsc"] = 1;
$proto27["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto27);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Live_Engagements_by_Status = createSqlQuery_Live_Engagements_by_Status();
			$tdataLive_Engagements_by_Status[".sqlquery"] = $queryData_Live_Engagements_by_Status;
	
if(isset($tdataLive_Engagements_by_Status["field2"])){
	$tdataLive_Engagements_by_Status["field2"]["LookupTable"] = "carscars_view";
	$tdataLive_Engagements_by_Status["field2"]["LookupOrderBy"] = "name";
	$tdataLive_Engagements_by_Status["field2"]["LookupType"] = 4;
	$tdataLive_Engagements_by_Status["field2"]["LinkField"] = "email";
	$tdataLive_Engagements_by_Status["field2"]["DisplayField"] = "name";
	$tdataLive_Engagements_by_Status[".hasCustomViewField"] = true;
}

$tableEvents["Live Engagements by Status"] = new eventsBase;
$tdataLive_Engagements_by_Status[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Live Engagements by Status");

?>