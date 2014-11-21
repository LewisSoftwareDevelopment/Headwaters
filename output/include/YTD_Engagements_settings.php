<?php
require_once(getabspath("classes/cipherer.php"));
$tdataYTD_Engagements = array();
	$tdataYTD_Engagements[".NumberOfChars"] = 80; 
	$tdataYTD_Engagements[".ShortName"] = "YTD_Engagements";
	$tdataYTD_Engagements[".OwnerID"] = "";
	$tdataYTD_Engagements[".OriginalTable"] = "company";

//	field labels
$fieldLabelsYTD_Engagements = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsYTD_Engagements["English"] = array();
	$fieldToolTipsYTD_Engagements["English"] = array();
	$fieldLabelsYTD_Engagements["English"]["Company"] = "Company";
	$fieldToolTipsYTD_Engagements["English"]["Company"] = "";
	$fieldLabelsYTD_Engagements["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipsYTD_Engagements["English"]["Deal Slot"] = "";
	$fieldLabelsYTD_Engagements["English"]["EL_Date"] = "EL Date";
	$fieldToolTipsYTD_Engagements["English"]["EL Date"] = "";
	$fieldLabelsYTD_Engagements["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsYTD_Engagements["English"]["Deal Type"] = "";
	$fieldLabelsYTD_Engagements["English"]["Industry"] = "Industry";
	$fieldToolTipsYTD_Engagements["English"]["Industry"] = "";
	$fieldLabelsYTD_Engagements["English"]["Referral_Type"] = "Referral Type";
	$fieldToolTipsYTD_Engagements["English"]["Referral Type"] = "";
	if (count($fieldToolTipsYTD_Engagements["English"]))
		$tdataYTD_Engagements[".isUseToolTips"] = true;
}
	
	
	$tdataYTD_Engagements[".NCSearch"] = true;



$tdataYTD_Engagements[".shortTableName"] = "YTD_Engagements";
$tdataYTD_Engagements[".nSecOptions"] = 0;
$tdataYTD_Engagements[".recsPerRowList"] = 1;
$tdataYTD_Engagements[".mainTableOwnerID"] = "";
$tdataYTD_Engagements[".moveNext"] = 1;
$tdataYTD_Engagements[".nType"] = 2;

$tdataYTD_Engagements[".strOriginalTableName"] = "company";




$tdataYTD_Engagements[".showAddInPopup"] = false;

$tdataYTD_Engagements[".showEditInPopup"] = false;

$tdataYTD_Engagements[".showViewInPopup"] = false;

$tdataYTD_Engagements[".fieldsForRegister"] = array();

$tdataYTD_Engagements[".listAjax"] = false;

	$tdataYTD_Engagements[".audit"] = false;

	$tdataYTD_Engagements[".locking"] = false;

$tdataYTD_Engagements[".listIcons"] = true;
$tdataYTD_Engagements[".edit"] = true;
$tdataYTD_Engagements[".inlineEdit"] = true;
$tdataYTD_Engagements[".inlineAdd"] = true;
$tdataYTD_Engagements[".view"] = true;

$tdataYTD_Engagements[".exportTo"] = true;

$tdataYTD_Engagements[".printFriendly"] = true;

$tdataYTD_Engagements[".delete"] = true;

$tdataYTD_Engagements[".showSimpleSearchOptions"] = false;

$tdataYTD_Engagements[".showSearchPanel"] = true;

if (isMobile())
	$tdataYTD_Engagements[".isUseAjaxSuggest"] = false;
else 
	$tdataYTD_Engagements[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataYTD_Engagements[".addPageEvents"] = false;

// use timepicker for search panel
$tdataYTD_Engagements[".isUseTimeForSearch"] = false;




$tdataYTD_Engagements[".allSearchFields"] = array();

$tdataYTD_Engagements[".allSearchFields"][] = "EL Date";
$tdataYTD_Engagements[".allSearchFields"][] = "Company";
$tdataYTD_Engagements[".allSearchFields"][] = "Deal Type";
$tdataYTD_Engagements[".allSearchFields"][] = "Deal Slot";
$tdataYTD_Engagements[".allSearchFields"][] = "Referral Type";
$tdataYTD_Engagements[".allSearchFields"][] = "Industry";

$tdataYTD_Engagements[".googleLikeFields"][] = "EL Date";
$tdataYTD_Engagements[".googleLikeFields"][] = "Company";
$tdataYTD_Engagements[".googleLikeFields"][] = "Deal Type";
$tdataYTD_Engagements[".googleLikeFields"][] = "Deal Slot";
$tdataYTD_Engagements[".googleLikeFields"][] = "Referral Type";
$tdataYTD_Engagements[".googleLikeFields"][] = "Industry";


$tdataYTD_Engagements[".advSearchFields"][] = "EL Date";
$tdataYTD_Engagements[".advSearchFields"][] = "Company";
$tdataYTD_Engagements[".advSearchFields"][] = "Deal Type";
$tdataYTD_Engagements[".advSearchFields"][] = "Deal Slot";
$tdataYTD_Engagements[".advSearchFields"][] = "Referral Type";
$tdataYTD_Engagements[".advSearchFields"][] = "Industry";

$tdataYTD_Engagements[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY `EL Date`";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataYTD_Engagements[".strOrderBy"] = $tstrOrderBy;

$tdataYTD_Engagements[".orderindexes"] = array();
$tdataYTD_Engagements[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "`EL Date`");

$tdataYTD_Engagements[".sqlHead"] = "SELECT `EL Date`,  Company,  `Deal Type`,  `Deal Slot`,  `Referral Type`,  Industry";
$tdataYTD_Engagements[".sqlFrom"] = "FROM company";
$tdataYTD_Engagements[".sqlWhereExpr"] = "(Year(`EL Date`) =YEAR(CURDATE())) AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$tdataYTD_Engagements[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataYTD_Engagements[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataYTD_Engagements[".arrGroupsPerPage"] = $arrGPP;

$tableKeysYTD_Engagements = array();
$tdataYTD_Engagements[".Keys"] = $tableKeysYTD_Engagements;

$tdataYTD_Engagements[".listFields"] = array();
$tdataYTD_Engagements[".listFields"][] = "EL Date";
$tdataYTD_Engagements[".listFields"][] = "Company";
$tdataYTD_Engagements[".listFields"][] = "Deal Type";
$tdataYTD_Engagements[".listFields"][] = "Deal Slot";
$tdataYTD_Engagements[".listFields"][] = "Referral Type";
$tdataYTD_Engagements[".listFields"][] = "Industry";

$tdataYTD_Engagements[".viewFields"] = array();
$tdataYTD_Engagements[".viewFields"][] = "EL Date";
$tdataYTD_Engagements[".viewFields"][] = "Company";
$tdataYTD_Engagements[".viewFields"][] = "Deal Type";
$tdataYTD_Engagements[".viewFields"][] = "Deal Slot";
$tdataYTD_Engagements[".viewFields"][] = "Referral Type";
$tdataYTD_Engagements[".viewFields"][] = "Industry";

$tdataYTD_Engagements[".addFields"] = array();
$tdataYTD_Engagements[".addFields"][] = "EL Date";
$tdataYTD_Engagements[".addFields"][] = "Company";
$tdataYTD_Engagements[".addFields"][] = "Deal Type";
$tdataYTD_Engagements[".addFields"][] = "Deal Slot";
$tdataYTD_Engagements[".addFields"][] = "Referral Type";
$tdataYTD_Engagements[".addFields"][] = "Industry";

$tdataYTD_Engagements[".inlineAddFields"] = array();
$tdataYTD_Engagements[".inlineAddFields"][] = "EL Date";
$tdataYTD_Engagements[".inlineAddFields"][] = "Company";
$tdataYTD_Engagements[".inlineAddFields"][] = "Deal Type";
$tdataYTD_Engagements[".inlineAddFields"][] = "Deal Slot";
$tdataYTD_Engagements[".inlineAddFields"][] = "Referral Type";
$tdataYTD_Engagements[".inlineAddFields"][] = "Industry";

$tdataYTD_Engagements[".editFields"] = array();
$tdataYTD_Engagements[".editFields"][] = "EL Date";
$tdataYTD_Engagements[".editFields"][] = "Company";
$tdataYTD_Engagements[".editFields"][] = "Deal Type";
$tdataYTD_Engagements[".editFields"][] = "Deal Slot";
$tdataYTD_Engagements[".editFields"][] = "Referral Type";
$tdataYTD_Engagements[".editFields"][] = "Industry";

$tdataYTD_Engagements[".inlineEditFields"] = array();
$tdataYTD_Engagements[".inlineEditFields"][] = "EL Date";
$tdataYTD_Engagements[".inlineEditFields"][] = "Company";
$tdataYTD_Engagements[".inlineEditFields"][] = "Deal Type";
$tdataYTD_Engagements[".inlineEditFields"][] = "Deal Slot";
$tdataYTD_Engagements[".inlineEditFields"][] = "Referral Type";
$tdataYTD_Engagements[".inlineEditFields"][] = "Industry";

$tdataYTD_Engagements[".exportFields"] = array();
$tdataYTD_Engagements[".exportFields"][] = "EL Date";
$tdataYTD_Engagements[".exportFields"][] = "Company";
$tdataYTD_Engagements[".exportFields"][] = "Deal Type";
$tdataYTD_Engagements[".exportFields"][] = "Deal Slot";
$tdataYTD_Engagements[".exportFields"][] = "Referral Type";
$tdataYTD_Engagements[".exportFields"][] = "Industry";

$tdataYTD_Engagements[".printFields"] = array();
$tdataYTD_Engagements[".printFields"][] = "EL Date";
$tdataYTD_Engagements[".printFields"][] = "Company";
$tdataYTD_Engagements[".printFields"][] = "Deal Type";
$tdataYTD_Engagements[".printFields"][] = "Deal Slot";
$tdataYTD_Engagements[".printFields"][] = "Referral Type";
$tdataYTD_Engagements[".printFields"][] = "Industry";

//	EL Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "EL Date";
	$fdata["GoodName"] = "EL_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "EL Date"; 
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
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdataYTD_Engagements["EL Date"] = $fdata;
//	Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
	
		
		
	$tdataYTD_Engagements["Company"] = $fdata;
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
	
		
		
	$tdataYTD_Engagements["Deal Type"] = $fdata;
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
	
		
		
	$tdataYTD_Engagements["Deal Slot"] = $fdata;
//	Referral Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Referral Type";
	$fdata["GoodName"] = "Referral_Type";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Referral Type"; 
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
	
		$fdata["strField"] = "Referral Type"; 
		$fdata["FullName"] = "`Referral Type`";
	
		
		
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
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataYTD_Engagements["Referral Type"] = $fdata;
//	Industry
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Industry";
	$fdata["GoodName"] = "Industry";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Industry"; 
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
	
		$fdata["strField"] = "Industry"; 
		$fdata["FullName"] = "Industry";
	
		
		
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
			$edata["EditParams"].= " maxlength=500";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataYTD_Engagements["Industry"] = $fdata;

	
$tables_data["YTD Engagements"]=&$tdataYTD_Engagements;
$field_labels["YTD_Engagements"] = &$fieldLabelsYTD_Engagements;
$fieldToolTips["YTD Engagements"] = &$fieldToolTipsYTD_Engagements;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["YTD Engagements"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["YTD Engagements"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_YTD_Engagements()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "`EL Date`,  Company,  `Deal Type`,  `Deal Slot`,  `Referral Type`,  Industry";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(Year(`EL Date`) =YEAR(CURDATE())) AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto0["m_strOrderBy"] = "ORDER BY `EL Date`";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(Year(`EL Date`) =YEAR(CURDATE())) AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(Year(`EL Date`) =YEAR(CURDATE())) AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "Year(`EL Date`) =YEAR(CURDATE())";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
						$proto4=array();
$proto4["m_functiontype"] = "SQLF_CUSTOM";
$proto4["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`EL Date`"
));

$proto4["m_arguments"][]=$obj;
$proto4["m_strFunctionName"] = "Year";
$obj = new SQLFunctionCall($proto4);

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "=YEAR(CURDATE())";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "1";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

			$proto1["m_contained"][]=$obj;
						$proto6=array();
$proto6["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto6["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto6["m_column"]=$obj;
$proto6["m_contained"] = array();
						$proto8=array();
$proto8["m_sql"] = "Status = 'on hold'";
$proto8["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto8["m_column"]=$obj;
$proto8["m_contained"] = array();
$proto8["m_strCase"] = "= 'on hold'";
$proto8["m_havingmode"] = "0";
$proto8["m_inBrackets"] = "0";
$proto8["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto8);

			$proto6["m_contained"][]=$obj;
						$proto10=array();
$proto10["m_sql"] = "Status = 'in market'";
$proto10["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto10["m_column"]=$obj;
$proto10["m_contained"] = array();
$proto10["m_strCase"] = "= 'in market'";
$proto10["m_havingmode"] = "0";
$proto10["m_inBrackets"] = "0";
$proto10["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto10);

			$proto6["m_contained"][]=$obj;
						$proto12=array();
$proto12["m_sql"] = "Status = 'pre market'";
$proto12["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto12["m_column"]=$obj;
$proto12["m_contained"] = array();
$proto12["m_strCase"] = "= 'pre market'";
$proto12["m_havingmode"] = "0";
$proto12["m_inBrackets"] = "0";
$proto12["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto12);

			$proto6["m_contained"][]=$obj;
						$proto14=array();
$proto14["m_sql"] = "Status = 'under loi'";
$proto14["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto14["m_column"]=$obj;
$proto14["m_contained"] = array();
$proto14["m_strCase"] = "= 'under loi'";
$proto14["m_havingmode"] = "0";
$proto14["m_inBrackets"] = "0";
$proto14["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto14);

			$proto6["m_contained"][]=$obj;
						$proto16=array();
$proto16["m_sql"] = "Status = 'inactive'";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "= 'inactive'";
$proto16["m_havingmode"] = "0";
$proto16["m_inBrackets"] = "0";
$proto16["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto16);

			$proto6["m_contained"][]=$obj;
$proto6["m_strCase"] = "";
$proto6["m_havingmode"] = "0";
$proto6["m_inBrackets"] = "1";
$proto6["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto6);

			$proto1["m_contained"][]=$obj;
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
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

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Date",
	"m_strTable" => "company"
));

$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Type",
	"m_strTable" => "company"
));

$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "Industry",
	"m_strTable" => "company"
));

$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto32=array();
$proto32["m_link"] = "SQLL_MAIN";
			$proto33=array();
$proto33["m_strName"] = "company";
$proto33["m_columns"] = array();
$proto33["m_columns"][] = "ID";
$proto33["m_columns"][] = "Company";
$proto33["m_columns"][] = "Deal Slot";
$proto33["m_columns"][] = "IBC Date";
$proto33["m_columns"][] = "EL Date";
$proto33["m_columns"][] = "Project Name";
$proto33["m_columns"][] = "Status";
$proto33["m_columns"][] = "Deal Type";
$proto33["m_columns"][] = "Projected Fee";
$proto33["m_columns"][] = "Projected Transaction Size";
$proto33["m_columns"][] = "Est. Close Date";
$proto33["m_columns"][] = "Primary Banker";
$proto33["m_columns"][] = "Practice Area";
$proto33["m_columns"][] = "Ownership Class";
$proto33["m_columns"][] = "Industry";
$proto33["m_columns"][] = "Referral Type";
$proto33["m_columns"][] = "Referral Source-Company";
$proto33["m_columns"][] = "Referral Scource-Ind.";
$proto33["m_columns"][] = "Description";
$proto33["m_columns"][] = "Dead Date";
$proto33["m_columns"][] = "EL Expiration Date";
$proto33["m_columns"][] = "Engagment Fee";
$proto33["m_columns"][] = "Fee Minimum";
$proto33["m_columns"][] = "Final Total Sucess Fee";
$proto33["m_columns"][] = "Final Transaction Size";
$proto33["m_columns"][] = "Monthly Retainer";
$proto33["m_columns"][] = "Closed Date";
$proto33["m_columns"][] = "Team Split-1";
$proto33["m_columns"][] = "Team-1";
$proto33["m_columns"][] = "Team Split-2";
$proto33["m_columns"][] = "Team-2";
$proto33["m_columns"][] = "Team Split-3";
$proto33["m_columns"][] = "Team Split-4";
$proto33["m_columns"][] = "Team Split-5";
$proto33["m_columns"][] = "Team Split-6";
$proto33["m_columns"][] = "Team-3";
$proto33["m_columns"][] = "Team-4";
$proto33["m_columns"][] = "Team-5";
$proto33["m_columns"][] = "Team-6";
$proto33["m_columns"][] = "Fee Split-1";
$proto33["m_columns"][] = "Fee Split-2";
$proto33["m_columns"][] = "Fee Split-3";
$proto33["m_columns"][] = "Fee Split-4";
$proto33["m_columns"][] = "Fee Split-5";
$proto33["m_columns"][] = "Fee Split-6";
$proto33["m_columns"][] = "Fee To-1";
$proto33["m_columns"][] = "Fee To-2";
$proto33["m_columns"][] = "Fee To-3";
$proto33["m_columns"][] = "Fee To-4";
$proto33["m_columns"][] = "Fee To-5";
$proto33["m_columns"][] = "Fee To-6";
$proto33["m_columns"][] = "Enterpise Value";
$proto33["m_columns"][] = "Fee Details";
$proto33["m_columns"][] = "Split to Corporate";
$proto33["m_columns"][] = "Paul";
$proto33["m_columns"][] = "McBroom";
$proto33["m_columns"][] = "Month of Close";
$proto33["m_columns"][] = "Gross This";
$proto33["m_columns"][] = "Gross Next";
$proto33["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto33);

$proto32["m_table"] = $obj;
$proto32["m_alias"] = "";
$proto34=array();
$proto34["m_sql"] = "";
$proto34["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto34["m_column"]=$obj;
$proto34["m_contained"] = array();
$proto34["m_strCase"] = "";
$proto34["m_havingmode"] = "0";
$proto34["m_inBrackets"] = "0";
$proto34["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto34);

$proto32["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto32);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto36=array();
						$obj = new SQLField(array(
	"m_strName" => "EL Date",
	"m_strTable" => "company"
));

$proto36["m_column"]=$obj;
$proto36["m_bAsc"] = 1;
$proto36["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto36);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_YTD_Engagements = createSqlQuery_YTD_Engagements();
						$tdataYTD_Engagements[".sqlquery"] = $queryData_YTD_Engagements;
	
if(isset($tdataYTD_Engagements["field2"])){
	$tdataYTD_Engagements["field2"]["LookupTable"] = "carscars_view";
	$tdataYTD_Engagements["field2"]["LookupOrderBy"] = "name";
	$tdataYTD_Engagements["field2"]["LookupType"] = 4;
	$tdataYTD_Engagements["field2"]["LinkField"] = "email";
	$tdataYTD_Engagements["field2"]["DisplayField"] = "name";
	$tdataYTD_Engagements[".hasCustomViewField"] = true;
}

$tableEvents["YTD Engagements"] = new eventsBase;
$tdataYTD_Engagements[".hasEvents"] = false;

$cipherer = new RunnerCipherer("YTD Engagements");

?>