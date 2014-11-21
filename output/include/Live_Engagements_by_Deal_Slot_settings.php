<?php
require_once(getabspath("classes/cipherer.php"));
$tdataLive_Engagements_by_Deal_Slot = array();
	$tdataLive_Engagements_by_Deal_Slot[".NumberOfChars"] = 80; 
	$tdataLive_Engagements_by_Deal_Slot[".ShortName"] = "Live_Engagements_by_Deal_Slot";
	$tdataLive_Engagements_by_Deal_Slot[".OwnerID"] = "";
	$tdataLive_Engagements_by_Deal_Slot[".OriginalTable"] = "company";

//	field labels
$fieldLabelsLive_Engagements_by_Deal_Slot = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsLive_Engagements_by_Deal_Slot["English"] = array();
	$fieldToolTipsLive_Engagements_by_Deal_Slot["English"] = array();
	$fieldLabelsLive_Engagements_by_Deal_Slot["English"]["Company"] = "Company";
	$fieldToolTipsLive_Engagements_by_Deal_Slot["English"]["Company"] = "";
	$fieldLabelsLive_Engagements_by_Deal_Slot["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipsLive_Engagements_by_Deal_Slot["English"]["Deal Slot"] = "";
	$fieldLabelsLive_Engagements_by_Deal_Slot["English"]["Project_Name"] = "Project Name";
	$fieldToolTipsLive_Engagements_by_Deal_Slot["English"]["Project Name"] = "";
	$fieldLabelsLive_Engagements_by_Deal_Slot["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsLive_Engagements_by_Deal_Slot["English"]["Deal Type"] = "";
	if (count($fieldToolTipsLive_Engagements_by_Deal_Slot["English"]))
		$tdataLive_Engagements_by_Deal_Slot[".isUseToolTips"] = true;
}
	
	
	$tdataLive_Engagements_by_Deal_Slot[".NCSearch"] = true;



$tdataLive_Engagements_by_Deal_Slot[".shortTableName"] = "Live_Engagements_by_Deal_Slot";
$tdataLive_Engagements_by_Deal_Slot[".nSecOptions"] = 0;
$tdataLive_Engagements_by_Deal_Slot[".recsPerRowList"] = 1;
$tdataLive_Engagements_by_Deal_Slot[".mainTableOwnerID"] = "";
$tdataLive_Engagements_by_Deal_Slot[".moveNext"] = 1;
$tdataLive_Engagements_by_Deal_Slot[".nType"] = 2;

$tdataLive_Engagements_by_Deal_Slot[".strOriginalTableName"] = "company";




$tdataLive_Engagements_by_Deal_Slot[".showAddInPopup"] = false;

$tdataLive_Engagements_by_Deal_Slot[".showEditInPopup"] = false;

$tdataLive_Engagements_by_Deal_Slot[".showViewInPopup"] = false;

$tdataLive_Engagements_by_Deal_Slot[".fieldsForRegister"] = array();

$tdataLive_Engagements_by_Deal_Slot[".listAjax"] = false;

	$tdataLive_Engagements_by_Deal_Slot[".audit"] = false;

	$tdataLive_Engagements_by_Deal_Slot[".locking"] = false;

$tdataLive_Engagements_by_Deal_Slot[".listIcons"] = true;
$tdataLive_Engagements_by_Deal_Slot[".edit"] = true;
$tdataLive_Engagements_by_Deal_Slot[".inlineEdit"] = true;
$tdataLive_Engagements_by_Deal_Slot[".inlineAdd"] = true;
$tdataLive_Engagements_by_Deal_Slot[".view"] = true;

$tdataLive_Engagements_by_Deal_Slot[".exportTo"] = true;

$tdataLive_Engagements_by_Deal_Slot[".printFriendly"] = true;

$tdataLive_Engagements_by_Deal_Slot[".delete"] = true;

$tdataLive_Engagements_by_Deal_Slot[".showSimpleSearchOptions"] = false;

$tdataLive_Engagements_by_Deal_Slot[".showSearchPanel"] = true;

if (isMobile())
	$tdataLive_Engagements_by_Deal_Slot[".isUseAjaxSuggest"] = false;
else 
	$tdataLive_Engagements_by_Deal_Slot[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataLive_Engagements_by_Deal_Slot[".addPageEvents"] = false;

// use timepicker for search panel
$tdataLive_Engagements_by_Deal_Slot[".isUseTimeForSearch"] = false;




$tdataLive_Engagements_by_Deal_Slot[".allSearchFields"] = array();

$tdataLive_Engagements_by_Deal_Slot[".allSearchFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".allSearchFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".allSearchFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".allSearchFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".googleLikeFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".googleLikeFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".googleLikeFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".googleLikeFields"][] = "Deal Type";


$tdataLive_Engagements_by_Deal_Slot[".advSearchFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".advSearchFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".advSearchFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".advSearchFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY `Deal Slot` DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataLive_Engagements_by_Deal_Slot[".strOrderBy"] = $tstrOrderBy;

$tdataLive_Engagements_by_Deal_Slot[".orderindexes"] = array();
$tdataLive_Engagements_by_Deal_Slot[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "`Deal Slot`");

$tdataLive_Engagements_by_Deal_Slot[".sqlHead"] = "SELECT Company,  `Deal Slot`,  `Project Name`,  `Deal Type`";
$tdataLive_Engagements_by_Deal_Slot[".sqlFrom"] = "FROM company";
$tdataLive_Engagements_by_Deal_Slot[".sqlWhereExpr"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$tdataLive_Engagements_by_Deal_Slot[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataLive_Engagements_by_Deal_Slot[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataLive_Engagements_by_Deal_Slot[".arrGroupsPerPage"] = $arrGPP;

$tableKeysLive_Engagements_by_Deal_Slot = array();
$tdataLive_Engagements_by_Deal_Slot[".Keys"] = $tableKeysLive_Engagements_by_Deal_Slot;

$tdataLive_Engagements_by_Deal_Slot[".listFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".listFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".listFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".listFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".listFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".viewFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".viewFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".viewFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".viewFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".viewFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".addFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".addFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".addFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".addFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".addFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".inlineAddFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".inlineAddFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".inlineAddFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".inlineAddFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".inlineAddFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".editFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".editFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".editFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".editFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".editFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".inlineEditFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".inlineEditFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".inlineEditFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".inlineEditFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".inlineEditFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".exportFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".exportFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".exportFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".exportFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".exportFields"][] = "Deal Type";

$tdataLive_Engagements_by_Deal_Slot[".printFields"] = array();
$tdataLive_Engagements_by_Deal_Slot[".printFields"][] = "Company";
$tdataLive_Engagements_by_Deal_Slot[".printFields"][] = "Deal Slot";
$tdataLive_Engagements_by_Deal_Slot[".printFields"][] = "Project Name";
$tdataLive_Engagements_by_Deal_Slot[".printFields"][] = "Deal Type";

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
	
		
		
	$tdataLive_Engagements_by_Deal_Slot["Company"] = $fdata;
//	Deal Slot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
	
		
		
	$tdataLive_Engagements_by_Deal_Slot["Deal Slot"] = $fdata;
//	Project Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
	
		
		
	$tdataLive_Engagements_by_Deal_Slot["Project Name"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
	
		
		
	$tdataLive_Engagements_by_Deal_Slot["Deal Type"] = $fdata;

	
$tables_data["Live Engagements by Deal Slot"]=&$tdataLive_Engagements_by_Deal_Slot;
$field_labels["Live_Engagements_by_Deal_Slot"] = &$fieldLabelsLive_Engagements_by_Deal_Slot;
$fieldToolTips["Live Engagements by Deal Slot"] = &$fieldToolTipsLive_Engagements_by_Deal_Slot;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Live Engagements by Deal Slot"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Live Engagements by Deal Slot"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Live_Engagements_by_Deal_Slot()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Deal Slot`,  `Project Name`,  `Deal Type`";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto0["m_strOrderBy"] = "ORDER BY `Deal Slot` DESC";
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
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Project Name",
	"m_strTable" => "company"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto23=array();
$proto23["m_link"] = "SQLL_MAIN";
			$proto24=array();
$proto24["m_strName"] = "company";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "ID";
$proto24["m_columns"][] = "Company";
$proto24["m_columns"][] = "Deal Slot";
$proto24["m_columns"][] = "IBC Date";
$proto24["m_columns"][] = "EL Date";
$proto24["m_columns"][] = "Project Name";
$proto24["m_columns"][] = "Status";
$proto24["m_columns"][] = "Deal Type";
$proto24["m_columns"][] = "Projected Fee";
$proto24["m_columns"][] = "Projected Transaction Size";
$proto24["m_columns"][] = "Est. Close Date";
$proto24["m_columns"][] = "Primary Banker";
$proto24["m_columns"][] = "Practice Area";
$proto24["m_columns"][] = "Ownership Class";
$proto24["m_columns"][] = "Industry";
$proto24["m_columns"][] = "Referral Type";
$proto24["m_columns"][] = "Referral Source-Company";
$proto24["m_columns"][] = "Referral Scource-Ind.";
$proto24["m_columns"][] = "Description";
$proto24["m_columns"][] = "Dead Date";
$proto24["m_columns"][] = "EL Expiration Date";
$proto24["m_columns"][] = "Engagment Fee";
$proto24["m_columns"][] = "Fee Minimum";
$proto24["m_columns"][] = "Final Total Sucess Fee";
$proto24["m_columns"][] = "Final Transaction Size";
$proto24["m_columns"][] = "Monthly Retainer";
$proto24["m_columns"][] = "Closed Date";
$proto24["m_columns"][] = "Team Split-1";
$proto24["m_columns"][] = "Team-1";
$proto24["m_columns"][] = "Team Split-2";
$proto24["m_columns"][] = "Team-2";
$proto24["m_columns"][] = "Team Split-3";
$proto24["m_columns"][] = "Team Split-4";
$proto24["m_columns"][] = "Team Split-5";
$proto24["m_columns"][] = "Team Split-6";
$proto24["m_columns"][] = "Team-3";
$proto24["m_columns"][] = "Team-4";
$proto24["m_columns"][] = "Team-5";
$proto24["m_columns"][] = "Team-6";
$proto24["m_columns"][] = "Fee Split-1";
$proto24["m_columns"][] = "Fee Split-2";
$proto24["m_columns"][] = "Fee Split-3";
$proto24["m_columns"][] = "Fee Split-4";
$proto24["m_columns"][] = "Fee Split-5";
$proto24["m_columns"][] = "Fee Split-6";
$proto24["m_columns"][] = "Fee To-1";
$proto24["m_columns"][] = "Fee To-2";
$proto24["m_columns"][] = "Fee To-3";
$proto24["m_columns"][] = "Fee To-4";
$proto24["m_columns"][] = "Fee To-5";
$proto24["m_columns"][] = "Fee To-6";
$proto24["m_columns"][] = "Enterpise Value";
$proto24["m_columns"][] = "Fee Details";
$proto24["m_columns"][] = "Split to Corporate";
$proto24["m_columns"][] = "Paul";
$proto24["m_columns"][] = "McBroom";
$proto24["m_columns"][] = "Month of Close";
$proto24["m_columns"][] = "Gross This";
$proto24["m_columns"][] = "Gross Next";
$proto24["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "";
$proto25["m_havingmode"] = "0";
$proto25["m_inBrackets"] = "0";
$proto25["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto25);

$proto23["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto23);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto27=array();
						$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto27["m_column"]=$obj;
$proto27["m_bAsc"] = 0;
$proto27["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto27);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Live_Engagements_by_Deal_Slot = createSqlQuery_Live_Engagements_by_Deal_Slot();
				$tdataLive_Engagements_by_Deal_Slot[".sqlquery"] = $queryData_Live_Engagements_by_Deal_Slot;
	
if(isset($tdataLive_Engagements_by_Deal_Slot["field2"])){
	$tdataLive_Engagements_by_Deal_Slot["field2"]["LookupTable"] = "carscars_view";
	$tdataLive_Engagements_by_Deal_Slot["field2"]["LookupOrderBy"] = "name";
	$tdataLive_Engagements_by_Deal_Slot["field2"]["LookupType"] = 4;
	$tdataLive_Engagements_by_Deal_Slot["field2"]["LinkField"] = "email";
	$tdataLive_Engagements_by_Deal_Slot["field2"]["DisplayField"] = "name";
	$tdataLive_Engagements_by_Deal_Slot[".hasCustomViewField"] = true;
}

$tableEvents["Live Engagements by Deal Slot"] = new eventsBase;
$tdataLive_Engagements_by_Deal_Slot[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Live Engagements by Deal Slot");

?>