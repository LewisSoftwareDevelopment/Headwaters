<?php
require_once(getabspath("classes/cipherer.php"));
$tdataRevenue_Estimates = array();
	$tdataRevenue_Estimates[".NumberOfChars"] = 80; 
	$tdataRevenue_Estimates[".ShortName"] = "Revenue_Estimates";
	$tdataRevenue_Estimates[".OwnerID"] = "";
	$tdataRevenue_Estimates[".OriginalTable"] = "company";

//	field labels
$fieldLabelsRevenue_Estimates = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsRevenue_Estimates["English"] = array();
	$fieldToolTipsRevenue_Estimates["English"] = array();
	$fieldLabelsRevenue_Estimates["English"]["Company"] = "Company";
	$fieldToolTipsRevenue_Estimates["English"]["Company"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Status"] = "Status";
	$fieldToolTipsRevenue_Estimates["English"]["Status"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Practice_Area"] = "Practice Area";
	$fieldToolTipsRevenue_Estimates["English"]["Practice Area"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Split_to_Corporate"] = "Split to Corporate";
	$fieldToolTipsRevenue_Estimates["English"]["Split to Corporate"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Paul"] = "Paul";
	$fieldToolTipsRevenue_Estimates["English"]["Paul"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Gross_Next"] = "Gross Next";
	$fieldToolTipsRevenue_Estimates["English"]["Gross Next"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Net_This"] = "Net This";
	$fieldToolTipsRevenue_Estimates["English"]["Net This"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Net_next"] = "Net Next";
	$fieldToolTipsRevenue_Estimates["English"]["Net next"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Month_of_Close"] = "Month of Close";
	$fieldToolTipsRevenue_Estimates["English"]["Month of Close"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Gross_This"] = "Gross This";
	$fieldToolTipsRevenue_Estimates["English"]["Gross This"] = "";
	$fieldLabelsRevenue_Estimates["English"]["McBroom"] = "Mc Broom";
	$fieldToolTipsRevenue_Estimates["English"]["McBroom"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Source"] = "Source";
	$fieldToolTipsRevenue_Estimates["English"]["Source"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_1"] = "Team-1";
	$fieldToolTipsRevenue_Estimates["English"]["Team-1"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_2"] = "Team-2";
	$fieldToolTipsRevenue_Estimates["English"]["Team-2"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_3"] = "Team-3";
	$fieldToolTipsRevenue_Estimates["English"]["Team-3"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_5"] = "Team-5";
	$fieldToolTipsRevenue_Estimates["English"]["Team-5"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_6"] = "Team-6";
	$fieldToolTipsRevenue_Estimates["English"]["Team-6"] = "";
	$fieldLabelsRevenue_Estimates["English"]["Team_4"] = "Team-4";
	$fieldToolTipsRevenue_Estimates["English"]["Team-4"] = "";
	if (count($fieldToolTipsRevenue_Estimates["English"]))
		$tdataRevenue_Estimates[".isUseToolTips"] = true;
}
	
	
	$tdataRevenue_Estimates[".NCSearch"] = true;



$tdataRevenue_Estimates[".shortTableName"] = "Revenue_Estimates";
$tdataRevenue_Estimates[".nSecOptions"] = 0;
$tdataRevenue_Estimates[".recsPerRowList"] = 1;
$tdataRevenue_Estimates[".mainTableOwnerID"] = "";
$tdataRevenue_Estimates[".moveNext"] = 1;
$tdataRevenue_Estimates[".nType"] = 2;

$tdataRevenue_Estimates[".strOriginalTableName"] = "company";




$tdataRevenue_Estimates[".showAddInPopup"] = false;

$tdataRevenue_Estimates[".showEditInPopup"] = false;

$tdataRevenue_Estimates[".showViewInPopup"] = false;

$tdataRevenue_Estimates[".fieldsForRegister"] = array();

$tdataRevenue_Estimates[".listAjax"] = false;

	$tdataRevenue_Estimates[".audit"] = false;

	$tdataRevenue_Estimates[".locking"] = false;

$tdataRevenue_Estimates[".listIcons"] = true;
$tdataRevenue_Estimates[".edit"] = true;
$tdataRevenue_Estimates[".inlineEdit"] = true;
$tdataRevenue_Estimates[".inlineAdd"] = true;
$tdataRevenue_Estimates[".view"] = true;

$tdataRevenue_Estimates[".exportTo"] = true;

$tdataRevenue_Estimates[".printFriendly"] = true;

$tdataRevenue_Estimates[".delete"] = true;

$tdataRevenue_Estimates[".showSimpleSearchOptions"] = false;

$tdataRevenue_Estimates[".showSearchPanel"] = true;

if (isMobile())
	$tdataRevenue_Estimates[".isUseAjaxSuggest"] = false;
else 
	$tdataRevenue_Estimates[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataRevenue_Estimates[".addPageEvents"] = false;

// use timepicker for search panel
$tdataRevenue_Estimates[".isUseTimeForSearch"] = false;




$tdataRevenue_Estimates[".allSearchFields"] = array();

$tdataRevenue_Estimates[".allSearchFields"][] = "Company";
$tdataRevenue_Estimates[".allSearchFields"][] = "Practice Area";
$tdataRevenue_Estimates[".allSearchFields"][] = "Status";
$tdataRevenue_Estimates[".allSearchFields"][] = "Source";
$tdataRevenue_Estimates[".allSearchFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".allSearchFields"][] = "Month of Close";
$tdataRevenue_Estimates[".allSearchFields"][] = "Net This";
$tdataRevenue_Estimates[".allSearchFields"][] = "Gross Next";
$tdataRevenue_Estimates[".allSearchFields"][] = "Net next";
$tdataRevenue_Estimates[".allSearchFields"][] = "Paul";
$tdataRevenue_Estimates[".allSearchFields"][] = "Gross This";
$tdataRevenue_Estimates[".allSearchFields"][] = "McBroom";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-1";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-2";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-3";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-4";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-5";
$tdataRevenue_Estimates[".allSearchFields"][] = "Team-6";

$tdataRevenue_Estimates[".googleLikeFields"][] = "Company";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Practice Area";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Status";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Source";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Month of Close";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Net This";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Gross Next";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Net next";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Paul";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Gross This";
$tdataRevenue_Estimates[".googleLikeFields"][] = "McBroom";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-1";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-2";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-3";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-4";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-5";
$tdataRevenue_Estimates[".googleLikeFields"][] = "Team-6";


$tdataRevenue_Estimates[".advSearchFields"][] = "Company";
$tdataRevenue_Estimates[".advSearchFields"][] = "Practice Area";
$tdataRevenue_Estimates[".advSearchFields"][] = "Status";
$tdataRevenue_Estimates[".advSearchFields"][] = "Source";
$tdataRevenue_Estimates[".advSearchFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".advSearchFields"][] = "Month of Close";
$tdataRevenue_Estimates[".advSearchFields"][] = "Net This";
$tdataRevenue_Estimates[".advSearchFields"][] = "Gross Next";
$tdataRevenue_Estimates[".advSearchFields"][] = "Net next";
$tdataRevenue_Estimates[".advSearchFields"][] = "Paul";
$tdataRevenue_Estimates[".advSearchFields"][] = "Gross This";
$tdataRevenue_Estimates[".advSearchFields"][] = "McBroom";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-1";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-2";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-3";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-4";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-5";
$tdataRevenue_Estimates[".advSearchFields"][] = "Team-6";

$tdataRevenue_Estimates[".isTableType"] = "report";

$tdataRevenue_Estimates[".reportGroupFields"] = true;
	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY Paul DESC, McBroom DESC, Company";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataRevenue_Estimates[".strOrderBy"] = $tstrOrderBy;

$tdataRevenue_Estimates[".orderindexes"] = array();
$tdataRevenue_Estimates[".orderindexes"][] = array(10, (0 ? "ASC" : "DESC"), "Paul");
$tdataRevenue_Estimates[".orderindexes"][] = array(12, (0 ? "ASC" : "DESC"), "McBroom");
$tdataRevenue_Estimates[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "Company");

$tdataRevenue_Estimates[".sqlHead"] = "SELECT Company,  `Practice Area`,  Status,  concat(`Referral Type`, \" \", `Referral Source-Company`) AS Source,  `Split to Corporate`,  `Month of Close`,  (`Gross This` * `Split to Corporate`) AS `Net This`,  `Gross Next`,  (`Gross Next`* `Split to Corporate`) AS `Net next`,  Paul,  `Gross This`,  McBroom,  `Team-1`,  `Team-2`,  `Team-3`,  `Team-4`,  `Team-5`,  `Team-6`";
$tdataRevenue_Estimates[".sqlFrom"] = "FROM company";
$tdataRevenue_Estimates[".sqlWhereExpr"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$tdataRevenue_Estimates[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataRevenue_Estimates[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataRevenue_Estimates[".arrGroupsPerPage"] = $arrGPP;

$tableKeysRevenue_Estimates = array();
$tdataRevenue_Estimates[".Keys"] = $tableKeysRevenue_Estimates;

$tdataRevenue_Estimates[".listFields"] = array();
$tdataRevenue_Estimates[".listFields"][] = "Company";
$tdataRevenue_Estimates[".listFields"][] = "Practice Area";
$tdataRevenue_Estimates[".listFields"][] = "Status";
$tdataRevenue_Estimates[".listFields"][] = "Source";
$tdataRevenue_Estimates[".listFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".listFields"][] = "Month of Close";
$tdataRevenue_Estimates[".listFields"][] = "Net This";
$tdataRevenue_Estimates[".listFields"][] = "Gross Next";
$tdataRevenue_Estimates[".listFields"][] = "Net next";
$tdataRevenue_Estimates[".listFields"][] = "Paul";
$tdataRevenue_Estimates[".listFields"][] = "Gross This";
$tdataRevenue_Estimates[".listFields"][] = "McBroom";
$tdataRevenue_Estimates[".listFields"][] = "Team-1";
$tdataRevenue_Estimates[".listFields"][] = "Team-2";
$tdataRevenue_Estimates[".listFields"][] = "Team-3";
$tdataRevenue_Estimates[".listFields"][] = "Team-4";
$tdataRevenue_Estimates[".listFields"][] = "Team-5";
$tdataRevenue_Estimates[".listFields"][] = "Team-6";

$tdataRevenue_Estimates[".viewFields"] = array();
$tdataRevenue_Estimates[".viewFields"][] = "Company";
$tdataRevenue_Estimates[".viewFields"][] = "Practice Area";
$tdataRevenue_Estimates[".viewFields"][] = "Status";
$tdataRevenue_Estimates[".viewFields"][] = "Source";
$tdataRevenue_Estimates[".viewFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".viewFields"][] = "Month of Close";
$tdataRevenue_Estimates[".viewFields"][] = "Net This";
$tdataRevenue_Estimates[".viewFields"][] = "Gross Next";
$tdataRevenue_Estimates[".viewFields"][] = "Net next";
$tdataRevenue_Estimates[".viewFields"][] = "Paul";
$tdataRevenue_Estimates[".viewFields"][] = "Gross This";
$tdataRevenue_Estimates[".viewFields"][] = "McBroom";
$tdataRevenue_Estimates[".viewFields"][] = "Team-1";
$tdataRevenue_Estimates[".viewFields"][] = "Team-2";
$tdataRevenue_Estimates[".viewFields"][] = "Team-3";
$tdataRevenue_Estimates[".viewFields"][] = "Team-4";
$tdataRevenue_Estimates[".viewFields"][] = "Team-5";
$tdataRevenue_Estimates[".viewFields"][] = "Team-6";

$tdataRevenue_Estimates[".addFields"] = array();
$tdataRevenue_Estimates[".addFields"][] = "Company";
$tdataRevenue_Estimates[".addFields"][] = "Practice Area";
$tdataRevenue_Estimates[".addFields"][] = "Status";
$tdataRevenue_Estimates[".addFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".addFields"][] = "Month of Close";
$tdataRevenue_Estimates[".addFields"][] = "Gross Next";
$tdataRevenue_Estimates[".addFields"][] = "Paul";
$tdataRevenue_Estimates[".addFields"][] = "Gross This";
$tdataRevenue_Estimates[".addFields"][] = "McBroom";
$tdataRevenue_Estimates[".addFields"][] = "Team-1";
$tdataRevenue_Estimates[".addFields"][] = "Team-2";
$tdataRevenue_Estimates[".addFields"][] = "Team-3";
$tdataRevenue_Estimates[".addFields"][] = "Team-4";
$tdataRevenue_Estimates[".addFields"][] = "Team-5";
$tdataRevenue_Estimates[".addFields"][] = "Team-6";

$tdataRevenue_Estimates[".inlineAddFields"] = array();
$tdataRevenue_Estimates[".inlineAddFields"][] = "Company";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Practice Area";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Status";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Source";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Month of Close";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Net This";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Gross Next";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Net next";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Paul";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Gross This";
$tdataRevenue_Estimates[".inlineAddFields"][] = "McBroom";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-1";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-2";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-3";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-4";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-5";
$tdataRevenue_Estimates[".inlineAddFields"][] = "Team-6";

$tdataRevenue_Estimates[".editFields"] = array();
$tdataRevenue_Estimates[".editFields"][] = "Company";
$tdataRevenue_Estimates[".editFields"][] = "Practice Area";
$tdataRevenue_Estimates[".editFields"][] = "Status";
$tdataRevenue_Estimates[".editFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".editFields"][] = "Month of Close";
$tdataRevenue_Estimates[".editFields"][] = "Gross Next";
$tdataRevenue_Estimates[".editFields"][] = "Paul";
$tdataRevenue_Estimates[".editFields"][] = "Gross This";
$tdataRevenue_Estimates[".editFields"][] = "McBroom";
$tdataRevenue_Estimates[".editFields"][] = "Team-1";
$tdataRevenue_Estimates[".editFields"][] = "Team-2";
$tdataRevenue_Estimates[".editFields"][] = "Team-3";
$tdataRevenue_Estimates[".editFields"][] = "Team-4";
$tdataRevenue_Estimates[".editFields"][] = "Team-5";
$tdataRevenue_Estimates[".editFields"][] = "Team-6";

$tdataRevenue_Estimates[".inlineEditFields"] = array();
$tdataRevenue_Estimates[".inlineEditFields"][] = "Company";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Practice Area";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Status";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Source";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Month of Close";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Net This";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Gross Next";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Net next";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Paul";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Gross This";
$tdataRevenue_Estimates[".inlineEditFields"][] = "McBroom";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-1";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-2";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-3";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-4";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-5";
$tdataRevenue_Estimates[".inlineEditFields"][] = "Team-6";

$tdataRevenue_Estimates[".exportFields"] = array();
$tdataRevenue_Estimates[".exportFields"][] = "Company";
$tdataRevenue_Estimates[".exportFields"][] = "Practice Area";
$tdataRevenue_Estimates[".exportFields"][] = "Status";
$tdataRevenue_Estimates[".exportFields"][] = "Source";
$tdataRevenue_Estimates[".exportFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".exportFields"][] = "Month of Close";
$tdataRevenue_Estimates[".exportFields"][] = "Net This";
$tdataRevenue_Estimates[".exportFields"][] = "Gross Next";
$tdataRevenue_Estimates[".exportFields"][] = "Net next";
$tdataRevenue_Estimates[".exportFields"][] = "Paul";
$tdataRevenue_Estimates[".exportFields"][] = "Gross This";
$tdataRevenue_Estimates[".exportFields"][] = "McBroom";
$tdataRevenue_Estimates[".exportFields"][] = "Team-1";
$tdataRevenue_Estimates[".exportFields"][] = "Team-2";
$tdataRevenue_Estimates[".exportFields"][] = "Team-3";
$tdataRevenue_Estimates[".exportFields"][] = "Team-4";
$tdataRevenue_Estimates[".exportFields"][] = "Team-5";
$tdataRevenue_Estimates[".exportFields"][] = "Team-6";

$tdataRevenue_Estimates[".printFields"] = array();
$tdataRevenue_Estimates[".printFields"][] = "Company";
$tdataRevenue_Estimates[".printFields"][] = "Practice Area";
$tdataRevenue_Estimates[".printFields"][] = "Status";
$tdataRevenue_Estimates[".printFields"][] = "Source";
$tdataRevenue_Estimates[".printFields"][] = "Split to Corporate";
$tdataRevenue_Estimates[".printFields"][] = "Month of Close";
$tdataRevenue_Estimates[".printFields"][] = "Net This";
$tdataRevenue_Estimates[".printFields"][] = "Gross Next";
$tdataRevenue_Estimates[".printFields"][] = "Net next";
$tdataRevenue_Estimates[".printFields"][] = "Paul";
$tdataRevenue_Estimates[".printFields"][] = "Gross This";
$tdataRevenue_Estimates[".printFields"][] = "McBroom";
$tdataRevenue_Estimates[".printFields"][] = "Team-1";
$tdataRevenue_Estimates[".printFields"][] = "Team-2";
$tdataRevenue_Estimates[".printFields"][] = "Team-3";
$tdataRevenue_Estimates[".printFields"][] = "Team-4";
$tdataRevenue_Estimates[".printFields"][] = "Team-5";
$tdataRevenue_Estimates[".printFields"][] = "Team-6";

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
	
		
		
	$tdataRevenue_Estimates["Company"] = $fdata;
//	Practice Area
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Practice Area";
	$fdata["GoodName"] = "Practice_Area";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Practice Area"; 
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
	
		$fdata["strField"] = "Practice Area"; 
		$fdata["FullName"] = "`Practice Area`";
	
		
		
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
			$edata["EditParams"].= " maxlength=250";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataRevenue_Estimates["Practice Area"] = $fdata;
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
	
		
		
	$tdataRevenue_Estimates["Status"] = $fdata;
//	Source
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Source";
	$fdata["GoodName"] = "Source";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Source"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Source"; 
		$fdata["FullName"] = "concat(`Referral Type`, \" \", `Referral Source-Company`)";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Source"] = $fdata;
//	Split to Corporate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Split to Corporate";
	$fdata["GoodName"] = "Split_to_Corporate";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Split to Corporate"; 
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
	
		$fdata["strField"] = "Split to Corporate"; 
		$fdata["FullName"] = "`Split to Corporate`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataRevenue_Estimates["Split to Corporate"] = $fdata;
//	Month of Close
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Month of Close";
	$fdata["GoodName"] = "Month_of_Close";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Month of Close"; 
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
	
		$fdata["strField"] = "Month of Close"; 
		$fdata["FullName"] = "`Month of Close`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Month of Close"] = $fdata;
//	Net This
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "Net This";
	$fdata["GoodName"] = "Net_This";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Net This"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Net This"; 
		$fdata["FullName"] = "(`Gross This` * `Split to Corporate`)";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataRevenue_Estimates["Net This"] = $fdata;
//	Gross Next
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "Gross Next";
	$fdata["GoodName"] = "Gross_Next";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Gross Next"; 
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
	
		$fdata["strField"] = "Gross Next"; 
		$fdata["FullName"] = "`Gross Next`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataRevenue_Estimates["Gross Next"] = $fdata;
//	Net next
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Net next";
	$fdata["GoodName"] = "Net_next";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Net Next"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Net next"; 
		$fdata["FullName"] = "(`Gross Next`* `Split to Corporate`)";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataRevenue_Estimates["Net next"] = $fdata;
//	Paul
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Paul";
	$fdata["GoodName"] = "Paul";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Paul"; 
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
	
		$fdata["strField"] = "Paul"; 
		$fdata["FullName"] = "Paul";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Paul"] = $fdata;
//	Gross This
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "Gross This";
	$fdata["GoodName"] = "Gross_This";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Gross This"; 
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
	
		$fdata["strField"] = "Gross This"; 
		$fdata["FullName"] = "`Gross This`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataRevenue_Estimates["Gross This"] = $fdata;
//	McBroom
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "McBroom";
	$fdata["GoodName"] = "McBroom";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Mc Broom"; 
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
	
		$fdata["strField"] = "McBroom"; 
		$fdata["FullName"] = "McBroom";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["McBroom"] = $fdata;
//	Team-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Team-1";
	$fdata["GoodName"] = "Team_1";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-1"; 
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
	
		$fdata["strField"] = "Team-1"; 
		$fdata["FullName"] = "`Team-1`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-1"] = $fdata;
//	Team-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "Team-2";
	$fdata["GoodName"] = "Team_2";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-2"; 
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
	
		$fdata["strField"] = "Team-2"; 
		$fdata["FullName"] = "`Team-2`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-2"] = $fdata;
//	Team-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "Team-3";
	$fdata["GoodName"] = "Team_3";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-3"; 
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
	
		$fdata["strField"] = "Team-3"; 
		$fdata["FullName"] = "`Team-3`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-3"] = $fdata;
//	Team-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "Team-4";
	$fdata["GoodName"] = "Team_4";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-4"; 
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
	
		$fdata["strField"] = "Team-4"; 
		$fdata["FullName"] = "`Team-4`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-4"] = $fdata;
//	Team-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "Team-5";
	$fdata["GoodName"] = "Team_5";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-5"; 
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
	
		$fdata["strField"] = "Team-5"; 
		$fdata["FullName"] = "`Team-5`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-5"] = $fdata;
//	Team-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "Team-6";
	$fdata["GoodName"] = "Team_6";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-6"; 
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
	
		$fdata["strField"] = "Team-6"; 
		$fdata["FullName"] = "`Team-6`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates["Team-6"] = $fdata;

	
$tables_data["Revenue Estimates"]=&$tdataRevenue_Estimates;
$field_labels["Revenue_Estimates"] = &$fieldLabelsRevenue_Estimates;
$fieldToolTips["Revenue Estimates"] = &$fieldToolTipsRevenue_Estimates;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Revenue Estimates"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Revenue Estimates"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Revenue_Estimates()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Practice Area`,  Status,  concat(`Referral Type`, \" \", `Referral Source-Company`) AS Source,  `Split to Corporate`,  `Month of Close`,  (`Gross This` * `Split to Corporate`) AS `Net This`,  `Gross Next`,  (`Gross Next`* `Split to Corporate`) AS `Net next`,  Paul,  `Gross This`,  McBroom,  `Team-1`,  `Team-2`,  `Team-3`,  `Team-4`,  `Team-5`,  `Team-6`";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto0["m_strOrderBy"] = "ORDER BY Paul DESC, McBroom DESC, Company";
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
	"m_strName" => "Practice Area",
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
						$proto21=array();
			$proto22=array();
$proto22["m_functiontype"] = "SQLF_CUSTOM";
$proto22["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`Referral Type`"
));

$proto22["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\" \""
));

$proto22["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "`Referral Source-Company`"
));

$proto22["m_arguments"][]=$obj;
$proto22["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto22);

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "Source";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "Split to Corporate",
	"m_strTable" => "company"
));

$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "Month of Close",
	"m_strTable" => "company"
));

$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`Gross This` * `Split to Corporate`)"
));

$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "Net This";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross Next",
	"m_strTable" => "company"
));

$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`Gross Next`* `Split to Corporate`)"
));

$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "Net next";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$obj = new SQLField(array(
	"m_strName" => "Paul",
	"m_strTable" => "company"
));

$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto38=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross This",
	"m_strTable" => "company"
));

$proto38["m_expr"]=$obj;
$proto38["m_alias"] = "";
$obj = new SQLFieldListItem($proto38);

$proto0["m_fieldlist"][]=$obj;
						$proto40=array();
			$obj = new SQLField(array(
	"m_strName" => "McBroom",
	"m_strTable" => "company"
));

$proto40["m_expr"]=$obj;
$proto40["m_alias"] = "";
$obj = new SQLFieldListItem($proto40);

$proto0["m_fieldlist"][]=$obj;
						$proto42=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-1",
	"m_strTable" => "company"
));

$proto42["m_expr"]=$obj;
$proto42["m_alias"] = "";
$obj = new SQLFieldListItem($proto42);

$proto0["m_fieldlist"][]=$obj;
						$proto44=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-2",
	"m_strTable" => "company"
));

$proto44["m_expr"]=$obj;
$proto44["m_alias"] = "";
$obj = new SQLFieldListItem($proto44);

$proto0["m_fieldlist"][]=$obj;
						$proto46=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-3",
	"m_strTable" => "company"
));

$proto46["m_expr"]=$obj;
$proto46["m_alias"] = "";
$obj = new SQLFieldListItem($proto46);

$proto0["m_fieldlist"][]=$obj;
						$proto48=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-4",
	"m_strTable" => "company"
));

$proto48["m_expr"]=$obj;
$proto48["m_alias"] = "";
$obj = new SQLFieldListItem($proto48);

$proto0["m_fieldlist"][]=$obj;
						$proto50=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-5",
	"m_strTable" => "company"
));

$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto0["m_fieldlist"][]=$obj;
						$proto52=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-6",
	"m_strTable" => "company"
));

$proto52["m_expr"]=$obj;
$proto52["m_alias"] = "";
$obj = new SQLFieldListItem($proto52);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto54=array();
$proto54["m_link"] = "SQLL_MAIN";
			$proto55=array();
$proto55["m_strName"] = "company";
$proto55["m_columns"] = array();
$proto55["m_columns"][] = "ID";
$proto55["m_columns"][] = "Company";
$proto55["m_columns"][] = "Deal Slot";
$proto55["m_columns"][] = "IBC Date";
$proto55["m_columns"][] = "EL Date";
$proto55["m_columns"][] = "Project Name";
$proto55["m_columns"][] = "Status";
$proto55["m_columns"][] = "Deal Type";
$proto55["m_columns"][] = "Projected Fee";
$proto55["m_columns"][] = "Projected Transaction Size";
$proto55["m_columns"][] = "Est. Close Date";
$proto55["m_columns"][] = "Primary Banker";
$proto55["m_columns"][] = "Practice Area";
$proto55["m_columns"][] = "Ownership Class";
$proto55["m_columns"][] = "Industry";
$proto55["m_columns"][] = "Referral Type";
$proto55["m_columns"][] = "Referral Source-Company";
$proto55["m_columns"][] = "Referral Scource-Ind.";
$proto55["m_columns"][] = "Description";
$proto55["m_columns"][] = "Dead Date";
$proto55["m_columns"][] = "EL Expiration Date";
$proto55["m_columns"][] = "Engagment Fee";
$proto55["m_columns"][] = "Fee Minimum";
$proto55["m_columns"][] = "Final Total Sucess Fee";
$proto55["m_columns"][] = "Final Transaction Size";
$proto55["m_columns"][] = "Monthly Retainer";
$proto55["m_columns"][] = "Closed Date";
$proto55["m_columns"][] = "Team Split-1";
$proto55["m_columns"][] = "Team-1";
$proto55["m_columns"][] = "Team Split-2";
$proto55["m_columns"][] = "Team-2";
$proto55["m_columns"][] = "Team Split-3";
$proto55["m_columns"][] = "Team Split-4";
$proto55["m_columns"][] = "Team Split-5";
$proto55["m_columns"][] = "Team Split-6";
$proto55["m_columns"][] = "Team-3";
$proto55["m_columns"][] = "Team-4";
$proto55["m_columns"][] = "Team-5";
$proto55["m_columns"][] = "Team-6";
$proto55["m_columns"][] = "Fee Split-1";
$proto55["m_columns"][] = "Fee Split-2";
$proto55["m_columns"][] = "Fee Split-3";
$proto55["m_columns"][] = "Fee Split-4";
$proto55["m_columns"][] = "Fee Split-5";
$proto55["m_columns"][] = "Fee Split-6";
$proto55["m_columns"][] = "Fee To-1";
$proto55["m_columns"][] = "Fee To-2";
$proto55["m_columns"][] = "Fee To-3";
$proto55["m_columns"][] = "Fee To-4";
$proto55["m_columns"][] = "Fee To-5";
$proto55["m_columns"][] = "Fee To-6";
$proto55["m_columns"][] = "Enterpise Value";
$proto55["m_columns"][] = "Fee Details";
$proto55["m_columns"][] = "Split to Corporate";
$proto55["m_columns"][] = "Paul";
$proto55["m_columns"][] = "McBroom";
$proto55["m_columns"][] = "Month of Close";
$proto55["m_columns"][] = "Gross This";
$proto55["m_columns"][] = "Gross Next";
$proto55["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto55);

$proto54["m_table"] = $obj;
$proto54["m_alias"] = "";
$proto56=array();
$proto56["m_sql"] = "";
$proto56["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto56["m_column"]=$obj;
$proto56["m_contained"] = array();
$proto56["m_strCase"] = "";
$proto56["m_havingmode"] = "0";
$proto56["m_inBrackets"] = "0";
$proto56["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto56);

$proto54["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto54);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto58=array();
						$obj = new SQLField(array(
	"m_strName" => "Paul",
	"m_strTable" => "company"
));

$proto58["m_column"]=$obj;
$proto58["m_bAsc"] = 0;
$proto58["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto58);

$proto0["m_orderby"][]=$obj;					
												$proto60=array();
						$obj = new SQLField(array(
	"m_strName" => "McBroom",
	"m_strTable" => "company"
));

$proto60["m_column"]=$obj;
$proto60["m_bAsc"] = 0;
$proto60["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto60);

$proto0["m_orderby"][]=$obj;					
												$proto62=array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto62["m_column"]=$obj;
$proto62["m_bAsc"] = 1;
$proto62["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto62);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Revenue_Estimates = createSqlQuery_Revenue_Estimates();
																		$tdataRevenue_Estimates[".sqlquery"] = $queryData_Revenue_Estimates;
	
if(isset($tdataRevenue_Estimates["field2"])){
	$tdataRevenue_Estimates["field2"]["LookupTable"] = "carscars_view";
	$tdataRevenue_Estimates["field2"]["LookupOrderBy"] = "name";
	$tdataRevenue_Estimates["field2"]["LookupType"] = 4;
	$tdataRevenue_Estimates["field2"]["LinkField"] = "email";
	$tdataRevenue_Estimates["field2"]["DisplayField"] = "name";
	$tdataRevenue_Estimates[".hasCustomViewField"] = true;
}

$tableEvents["Revenue Estimates"] = new eventsBase;
$tdataRevenue_Estimates[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Revenue Estimates");

?>