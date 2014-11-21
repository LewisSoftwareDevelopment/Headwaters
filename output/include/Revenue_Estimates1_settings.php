<?php
require_once(getabspath("classes/cipherer.php"));
$tdataRevenue_Estimates1 = array();
	$tdataRevenue_Estimates1[".NumberOfChars"] = 80; 
	$tdataRevenue_Estimates1[".ShortName"] = "Revenue_Estimates1";
	$tdataRevenue_Estimates1[".OwnerID"] = "";
	$tdataRevenue_Estimates1[".OriginalTable"] = "company";

//	field labels
$fieldLabelsRevenue_Estimates1 = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsRevenue_Estimates1["English"] = array();
	$fieldToolTipsRevenue_Estimates1["English"] = array();
	$fieldLabelsRevenue_Estimates1["English"]["Company"] = "Company";
	$fieldToolTipsRevenue_Estimates1["English"]["Company"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Status"] = "Status";
	$fieldToolTipsRevenue_Estimates1["English"]["Status"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Practice_Area"] = "Practice Area";
	$fieldToolTipsRevenue_Estimates1["English"]["Practice Area"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Split_to_Corporate"] = "Split to Corporate";
	$fieldToolTipsRevenue_Estimates1["English"]["Split to Corporate"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Gross_Next"] = "Gross Next";
	$fieldToolTipsRevenue_Estimates1["English"]["Gross Next"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Net_This"] = "Net This";
	$fieldToolTipsRevenue_Estimates1["English"]["Net This"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Net_next"] = "Net Next";
	$fieldToolTipsRevenue_Estimates1["English"]["Net next"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Month_of_Close"] = "Month of Close";
	$fieldToolTipsRevenue_Estimates1["English"]["Month of Close"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Gross_This"] = "Gross This";
	$fieldToolTipsRevenue_Estimates1["English"]["Gross This"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Source"] = "Source";
	$fieldToolTipsRevenue_Estimates1["English"]["Source"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_1"] = "Team-1";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-1"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_2"] = "Team-2";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-2"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_3"] = "Team-3";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-3"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_5"] = "Team-5";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-5"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_6"] = "Team-6";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-6"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Team_4"] = "Team-4";
	$fieldToolTipsRevenue_Estimates1["English"]["Team-4"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["Pipeline"] = "Pipeline";
	$fieldToolTipsRevenue_Estimates1["English"]["Pipeline"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["This_Year_Buget_Gross"] = "This Year Buget Gross";
	$fieldToolTipsRevenue_Estimates1["English"]["This Year Buget Gross"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["This_Year_Budget_Net"] = "This Year Budget Net";
	$fieldToolTipsRevenue_Estimates1["English"]["This Year Budget Net"] = "";
	$fieldLabelsRevenue_Estimates1["English"]["YTD_Net_Actual"] = "YTD Net Actual";
	$fieldToolTipsRevenue_Estimates1["English"]["YTD Net Actual"] = "";
	if (count($fieldToolTipsRevenue_Estimates1["English"]))
		$tdataRevenue_Estimates1[".isUseToolTips"] = true;
}
	
	
	$tdataRevenue_Estimates1[".NCSearch"] = true;



$tdataRevenue_Estimates1[".shortTableName"] = "Revenue_Estimates1";
$tdataRevenue_Estimates1[".nSecOptions"] = 0;
$tdataRevenue_Estimates1[".recsPerRowList"] = 1;
$tdataRevenue_Estimates1[".mainTableOwnerID"] = "";
$tdataRevenue_Estimates1[".moveNext"] = 1;
$tdataRevenue_Estimates1[".nType"] = 2;

$tdataRevenue_Estimates1[".strOriginalTableName"] = "company";




$tdataRevenue_Estimates1[".showAddInPopup"] = false;

$tdataRevenue_Estimates1[".showEditInPopup"] = false;

$tdataRevenue_Estimates1[".showViewInPopup"] = false;

$tdataRevenue_Estimates1[".fieldsForRegister"] = array();

$tdataRevenue_Estimates1[".listAjax"] = false;

	$tdataRevenue_Estimates1[".audit"] = false;

	$tdataRevenue_Estimates1[".locking"] = false;

$tdataRevenue_Estimates1[".listIcons"] = true;
$tdataRevenue_Estimates1[".edit"] = true;
$tdataRevenue_Estimates1[".inlineEdit"] = true;
$tdataRevenue_Estimates1[".inlineAdd"] = true;
$tdataRevenue_Estimates1[".view"] = true;

$tdataRevenue_Estimates1[".exportTo"] = true;

$tdataRevenue_Estimates1[".printFriendly"] = true;

$tdataRevenue_Estimates1[".delete"] = true;

$tdataRevenue_Estimates1[".showSimpleSearchOptions"] = false;

$tdataRevenue_Estimates1[".showSearchPanel"] = true;

if (isMobile())
	$tdataRevenue_Estimates1[".isUseAjaxSuggest"] = false;
else 
	$tdataRevenue_Estimates1[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataRevenue_Estimates1[".addPageEvents"] = false;

// use timepicker for search panel
$tdataRevenue_Estimates1[".isUseTimeForSearch"] = false;




$tdataRevenue_Estimates1[".allSearchFields"] = array();

$tdataRevenue_Estimates1[".allSearchFields"][] = "Company";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Status";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Source";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Net This";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Net next";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Gross This";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-1";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-2";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-3";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-4";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-5";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Team-6";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".allSearchFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".allSearchFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".allSearchFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".allSearchFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".googleLikeFields"][] = "Company";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Status";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Source";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Net This";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Net next";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Gross This";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-1";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-2";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-3";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-4";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-5";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Team-6";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".googleLikeFields"][] = "YTD Net Actual";


$tdataRevenue_Estimates1[".advSearchFields"][] = "Company";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Status";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Source";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Net This";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Net next";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Gross This";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-1";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-2";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-3";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-4";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-5";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Team-6";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".advSearchFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".advSearchFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".advSearchFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".advSearchFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".isTableType"] = "report";

$tdataRevenue_Estimates1[".reportGroupFields"] = true;
	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY company.Company";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataRevenue_Estimates1[".strOrderBy"] = $tstrOrderBy;

$tdataRevenue_Estimates1[".orderindexes"] = array();
$tdataRevenue_Estimates1[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "company.Company");

$tdataRevenue_Estimates1[".sqlHead"] = "SELECT company.Company,  company.`Practice Area`,  company.Status,  concat(`Referral Type`, \" \", `Referral Source-Company`) AS Source,  company.`Split to Corporate`,  (`Gross This` * `Split to Corporate`) AS `Net This`,  company.`Gross Next`,  (`Gross Next`* `Split to Corporate`) AS `Net next`,  company.`Gross This`,  company.`Team-1`,  company.`Team-2`,  company.`Team-3`,  company.`Team-4`,  company.`Team-5`,  company.`Team-6`,  company.`Month of Close`,  company.Pipeline,  actuals.`This Year Buget Gross`,  actuals.`This Year Budget Net`,  actuals.`YTD Net Actual`";
$tdataRevenue_Estimates1[".sqlFrom"] = "FROM company  , actuals";
$tdataRevenue_Estimates1[".sqlWhereExpr"] = "company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'";
$tdataRevenue_Estimates1[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataRevenue_Estimates1[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataRevenue_Estimates1[".arrGroupsPerPage"] = $arrGPP;

$tableKeysRevenue_Estimates1 = array();
$tdataRevenue_Estimates1[".Keys"] = $tableKeysRevenue_Estimates1;

$tdataRevenue_Estimates1[".listFields"] = array();
$tdataRevenue_Estimates1[".listFields"][] = "Company";
$tdataRevenue_Estimates1[".listFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".listFields"][] = "Status";
$tdataRevenue_Estimates1[".listFields"][] = "Source";
$tdataRevenue_Estimates1[".listFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".listFields"][] = "Net This";
$tdataRevenue_Estimates1[".listFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".listFields"][] = "Net next";
$tdataRevenue_Estimates1[".listFields"][] = "Gross This";
$tdataRevenue_Estimates1[".listFields"][] = "Team-1";
$tdataRevenue_Estimates1[".listFields"][] = "Team-2";
$tdataRevenue_Estimates1[".listFields"][] = "Team-3";
$tdataRevenue_Estimates1[".listFields"][] = "Team-4";
$tdataRevenue_Estimates1[".listFields"][] = "Team-5";
$tdataRevenue_Estimates1[".listFields"][] = "Team-6";
$tdataRevenue_Estimates1[".listFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".listFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".listFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".listFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".listFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".viewFields"] = array();
$tdataRevenue_Estimates1[".viewFields"][] = "Company";
$tdataRevenue_Estimates1[".viewFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".viewFields"][] = "Status";
$tdataRevenue_Estimates1[".viewFields"][] = "Source";
$tdataRevenue_Estimates1[".viewFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".viewFields"][] = "Net This";
$tdataRevenue_Estimates1[".viewFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".viewFields"][] = "Net next";
$tdataRevenue_Estimates1[".viewFields"][] = "Gross This";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-1";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-2";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-3";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-4";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-5";
$tdataRevenue_Estimates1[".viewFields"][] = "Team-6";
$tdataRevenue_Estimates1[".viewFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".viewFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".viewFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".viewFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".viewFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".addFields"] = array();
$tdataRevenue_Estimates1[".addFields"][] = "Company";
$tdataRevenue_Estimates1[".addFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".addFields"][] = "Status";
$tdataRevenue_Estimates1[".addFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".addFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".addFields"][] = "Gross This";
$tdataRevenue_Estimates1[".addFields"][] = "Team-1";
$tdataRevenue_Estimates1[".addFields"][] = "Team-2";
$tdataRevenue_Estimates1[".addFields"][] = "Team-3";
$tdataRevenue_Estimates1[".addFields"][] = "Team-4";
$tdataRevenue_Estimates1[".addFields"][] = "Team-5";
$tdataRevenue_Estimates1[".addFields"][] = "Team-6";
$tdataRevenue_Estimates1[".addFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".addFields"][] = "Pipeline";

$tdataRevenue_Estimates1[".inlineAddFields"] = array();
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Company";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Status";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Source";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Net This";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Net next";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Gross This";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-1";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-2";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-3";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-4";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-5";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Team-6";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".inlineAddFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".editFields"] = array();
$tdataRevenue_Estimates1[".editFields"][] = "Company";
$tdataRevenue_Estimates1[".editFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".editFields"][] = "Status";
$tdataRevenue_Estimates1[".editFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".editFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".editFields"][] = "Gross This";
$tdataRevenue_Estimates1[".editFields"][] = "Team-1";
$tdataRevenue_Estimates1[".editFields"][] = "Team-2";
$tdataRevenue_Estimates1[".editFields"][] = "Team-3";
$tdataRevenue_Estimates1[".editFields"][] = "Team-4";
$tdataRevenue_Estimates1[".editFields"][] = "Team-5";
$tdataRevenue_Estimates1[".editFields"][] = "Team-6";
$tdataRevenue_Estimates1[".editFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".editFields"][] = "Pipeline";

$tdataRevenue_Estimates1[".inlineEditFields"] = array();
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Company";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Status";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Source";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Net This";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Net next";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Gross This";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-1";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-2";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-3";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-4";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-5";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Team-6";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".inlineEditFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".exportFields"] = array();
$tdataRevenue_Estimates1[".exportFields"][] = "Company";
$tdataRevenue_Estimates1[".exportFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".exportFields"][] = "Status";
$tdataRevenue_Estimates1[".exportFields"][] = "Source";
$tdataRevenue_Estimates1[".exportFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".exportFields"][] = "Net This";
$tdataRevenue_Estimates1[".exportFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".exportFields"][] = "Net next";
$tdataRevenue_Estimates1[".exportFields"][] = "Gross This";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-1";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-2";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-3";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-4";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-5";
$tdataRevenue_Estimates1[".exportFields"][] = "Team-6";
$tdataRevenue_Estimates1[".exportFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".exportFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".exportFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".exportFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".exportFields"][] = "YTD Net Actual";

$tdataRevenue_Estimates1[".printFields"] = array();
$tdataRevenue_Estimates1[".printFields"][] = "Company";
$tdataRevenue_Estimates1[".printFields"][] = "Practice Area";
$tdataRevenue_Estimates1[".printFields"][] = "Status";
$tdataRevenue_Estimates1[".printFields"][] = "Source";
$tdataRevenue_Estimates1[".printFields"][] = "Split to Corporate";
$tdataRevenue_Estimates1[".printFields"][] = "Net This";
$tdataRevenue_Estimates1[".printFields"][] = "Gross Next";
$tdataRevenue_Estimates1[".printFields"][] = "Net next";
$tdataRevenue_Estimates1[".printFields"][] = "Gross This";
$tdataRevenue_Estimates1[".printFields"][] = "Team-1";
$tdataRevenue_Estimates1[".printFields"][] = "Team-2";
$tdataRevenue_Estimates1[".printFields"][] = "Team-3";
$tdataRevenue_Estimates1[".printFields"][] = "Team-4";
$tdataRevenue_Estimates1[".printFields"][] = "Team-5";
$tdataRevenue_Estimates1[".printFields"][] = "Team-6";
$tdataRevenue_Estimates1[".printFields"][] = "Month of Close";
$tdataRevenue_Estimates1[".printFields"][] = "Pipeline";
$tdataRevenue_Estimates1[".printFields"][] = "This Year Buget Gross";
$tdataRevenue_Estimates1[".printFields"][] = "This Year Budget Net";
$tdataRevenue_Estimates1[".printFields"][] = "YTD Net Actual";

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
		$fdata["FullName"] = "company.Company";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Company"] = $fdata;
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
		$fdata["FullName"] = "company.`Practice Area`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Practice Area"] = $fdata;
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
		$fdata["FullName"] = "company.Status";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Status"] = $fdata;
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
	
		
		
	$tdataRevenue_Estimates1["Source"] = $fdata;
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
		$fdata["FullName"] = "company.`Split to Corporate`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Split to Corporate"] = $fdata;
//	Net This
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
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
	
		
		
	$tdataRevenue_Estimates1["Net This"] = $fdata;
//	Gross Next
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
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
		$fdata["FullName"] = "company.`Gross Next`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Gross Next"] = $fdata;
//	Net next
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
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
	
		
		
	$tdataRevenue_Estimates1["Net next"] = $fdata;
//	Gross This
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
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
		$fdata["FullName"] = "company.`Gross This`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Gross This"] = $fdata;
//	Team-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
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
		$fdata["FullName"] = "company.`Team-1`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-1"] = $fdata;
//	Team-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
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
		$fdata["FullName"] = "company.`Team-2`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-2"] = $fdata;
//	Team-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
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
		$fdata["FullName"] = "company.`Team-3`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-3"] = $fdata;
//	Team-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
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
		$fdata["FullName"] = "company.`Team-4`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-4"] = $fdata;
//	Team-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
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
		$fdata["FullName"] = "company.`Team-5`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-5"] = $fdata;
//	Team-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
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
		$fdata["FullName"] = "company.`Team-6`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Team-6"] = $fdata;
//	Month of Close
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
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
		$fdata["FullName"] = "company.`Month of Close`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Month of Close"] = $fdata;
//	Pipeline
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "Pipeline";
	$fdata["GoodName"] = "Pipeline";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Pipeline"; 
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
	
		$fdata["strField"] = "Pipeline"; 
		$fdata["FullName"] = "company.Pipeline";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["Pipeline"] = $fdata;
//	This Year Buget Gross
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "This Year Buget Gross";
	$fdata["GoodName"] = "This_Year_Buget_Gross";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "This Year Buget Gross"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "This Year Buget Gross"; 
		$fdata["FullName"] = "actuals.`This Year Buget Gross`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["This Year Buget Gross"] = $fdata;
//	This Year Budget Net
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "This Year Budget Net";
	$fdata["GoodName"] = "This_Year_Budget_Net";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "This Year Budget Net"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "This Year Budget Net"; 
		$fdata["FullName"] = "actuals.`This Year Budget Net`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["This Year Budget Net"] = $fdata;
//	YTD Net Actual
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "YTD Net Actual";
	$fdata["GoodName"] = "YTD_Net_Actual";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "YTD Net Actual"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Net Actual"; 
		$fdata["FullName"] = "actuals.`YTD Net Actual`";
	
		
		
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
	
		
		
	$tdataRevenue_Estimates1["YTD Net Actual"] = $fdata;

	
$tables_data["Revenue Estimates1"]=&$tdataRevenue_Estimates1;
$field_labels["Revenue_Estimates1"] = &$fieldLabelsRevenue_Estimates1;
$fieldToolTips["Revenue Estimates1"] = &$fieldToolTipsRevenue_Estimates1;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Revenue Estimates1"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Revenue Estimates1"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Revenue_Estimates1()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "company.Company,  company.`Practice Area`,  company.Status,  concat(`Referral Type`, \" \", `Referral Source-Company`) AS Source,  company.`Split to Corporate`,  (`Gross This` * `Split to Corporate`) AS `Net This`,  company.`Gross Next`,  (`Gross Next`* `Split to Corporate`) AS `Net next`,  company.`Gross This`,  company.`Team-1`,  company.`Team-2`,  company.`Team-3`,  company.`Team-4`,  company.`Team-5`,  company.`Team-6`,  company.`Month of Close`,  company.Pipeline,  actuals.`This Year Buget Gross`,  actuals.`This Year Budget Net`,  actuals.`YTD Net Actual`";
$proto0["m_strFrom"] = "FROM company  , actuals";
$proto0["m_strWhere"] = "company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'";
$proto0["m_strOrderBy"] = "ORDER BY company.Company";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'";
$proto1["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "company.Status = 'on hold'";
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
$proto5["m_sql"] = "company.Status = 'in market'";
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
$proto7["m_sql"] = "company.Status = 'pre market'";
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
$proto9["m_sql"] = "company.Status = 'under loi'";
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
$proto11["m_sql"] = "company.Status = 'inactive'";
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
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`Gross This` * `Split to Corporate`)"
));

$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "Net This";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross Next",
	"m_strTable" => "company"
));

$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`Gross Next`* `Split to Corporate`)"
));

$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "Net next";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross This",
	"m_strTable" => "company"
));

$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-1",
	"m_strTable" => "company"
));

$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto38=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-2",
	"m_strTable" => "company"
));

$proto38["m_expr"]=$obj;
$proto38["m_alias"] = "";
$obj = new SQLFieldListItem($proto38);

$proto0["m_fieldlist"][]=$obj;
						$proto40=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-3",
	"m_strTable" => "company"
));

$proto40["m_expr"]=$obj;
$proto40["m_alias"] = "";
$obj = new SQLFieldListItem($proto40);

$proto0["m_fieldlist"][]=$obj;
						$proto42=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-4",
	"m_strTable" => "company"
));

$proto42["m_expr"]=$obj;
$proto42["m_alias"] = "";
$obj = new SQLFieldListItem($proto42);

$proto0["m_fieldlist"][]=$obj;
						$proto44=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-5",
	"m_strTable" => "company"
));

$proto44["m_expr"]=$obj;
$proto44["m_alias"] = "";
$obj = new SQLFieldListItem($proto44);

$proto0["m_fieldlist"][]=$obj;
						$proto46=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-6",
	"m_strTable" => "company"
));

$proto46["m_expr"]=$obj;
$proto46["m_alias"] = "";
$obj = new SQLFieldListItem($proto46);

$proto0["m_fieldlist"][]=$obj;
						$proto48=array();
			$obj = new SQLField(array(
	"m_strName" => "Month of Close",
	"m_strTable" => "company"
));

$proto48["m_expr"]=$obj;
$proto48["m_alias"] = "";
$obj = new SQLFieldListItem($proto48);

$proto0["m_fieldlist"][]=$obj;
						$proto50=array();
			$obj = new SQLField(array(
	"m_strName" => "Pipeline",
	"m_strTable" => "company"
));

$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto0["m_fieldlist"][]=$obj;
						$proto52=array();
			$obj = new SQLField(array(
	"m_strName" => "This Year Buget Gross",
	"m_strTable" => "actuals"
));

$proto52["m_expr"]=$obj;
$proto52["m_alias"] = "";
$obj = new SQLFieldListItem($proto52);

$proto0["m_fieldlist"][]=$obj;
						$proto54=array();
			$obj = new SQLField(array(
	"m_strName" => "This Year Budget Net",
	"m_strTable" => "actuals"
));

$proto54["m_expr"]=$obj;
$proto54["m_alias"] = "";
$obj = new SQLFieldListItem($proto54);

$proto0["m_fieldlist"][]=$obj;
						$proto56=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Net Actual",
	"m_strTable" => "actuals"
));

$proto56["m_expr"]=$obj;
$proto56["m_alias"] = "";
$obj = new SQLFieldListItem($proto56);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto58=array();
$proto58["m_link"] = "SQLL_MAIN";
			$proto59=array();
$proto59["m_strName"] = "company";
$proto59["m_columns"] = array();
$proto59["m_columns"][] = "ID";
$proto59["m_columns"][] = "Company";
$proto59["m_columns"][] = "Deal Slot";
$proto59["m_columns"][] = "IBC Date";
$proto59["m_columns"][] = "EL Date";
$proto59["m_columns"][] = "Project Name";
$proto59["m_columns"][] = "Status";
$proto59["m_columns"][] = "Deal Type";
$proto59["m_columns"][] = "Projected Fee";
$proto59["m_columns"][] = "Projected Transaction Size";
$proto59["m_columns"][] = "Est. Close Date";
$proto59["m_columns"][] = "Primary Banker";
$proto59["m_columns"][] = "Practice Area";
$proto59["m_columns"][] = "Ownership Class";
$proto59["m_columns"][] = "Industry";
$proto59["m_columns"][] = "Referral Type";
$proto59["m_columns"][] = "Referral Source-Company";
$proto59["m_columns"][] = "Referral Scource-Ind.";
$proto59["m_columns"][] = "Description";
$proto59["m_columns"][] = "Dead Date";
$proto59["m_columns"][] = "EL Expiration Date";
$proto59["m_columns"][] = "Engagment Fee";
$proto59["m_columns"][] = "Fee Minimum";
$proto59["m_columns"][] = "Final Total Sucess Fee";
$proto59["m_columns"][] = "Final Transaction Size";
$proto59["m_columns"][] = "Monthly Retainer";
$proto59["m_columns"][] = "Closed Date";
$proto59["m_columns"][] = "Team Split-1";
$proto59["m_columns"][] = "Team-1";
$proto59["m_columns"][] = "Team Split-2";
$proto59["m_columns"][] = "Team-2";
$proto59["m_columns"][] = "Team Split-3";
$proto59["m_columns"][] = "Team Split-4";
$proto59["m_columns"][] = "Team Split-5";
$proto59["m_columns"][] = "Team Split-6";
$proto59["m_columns"][] = "Team-3";
$proto59["m_columns"][] = "Team-4";
$proto59["m_columns"][] = "Team-5";
$proto59["m_columns"][] = "Team-6";
$proto59["m_columns"][] = "Fee Split-1";
$proto59["m_columns"][] = "Fee Split-2";
$proto59["m_columns"][] = "Fee Split-3";
$proto59["m_columns"][] = "Fee Split-4";
$proto59["m_columns"][] = "Fee Split-5";
$proto59["m_columns"][] = "Fee Split-6";
$proto59["m_columns"][] = "Fee To-1";
$proto59["m_columns"][] = "Fee To-2";
$proto59["m_columns"][] = "Fee To-3";
$proto59["m_columns"][] = "Fee To-4";
$proto59["m_columns"][] = "Fee To-5";
$proto59["m_columns"][] = "Fee To-6";
$proto59["m_columns"][] = "Enterpise Value";
$proto59["m_columns"][] = "Fee Details";
$proto59["m_columns"][] = "Split to Corporate";
$proto59["m_columns"][] = "Paul";
$proto59["m_columns"][] = "McBroom";
$proto59["m_columns"][] = "Month of Close";
$proto59["m_columns"][] = "Gross This";
$proto59["m_columns"][] = "Gross Next";
$proto59["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto59);

$proto58["m_table"] = $obj;
$proto58["m_alias"] = "";
$proto60=array();
$proto60["m_sql"] = "";
$proto60["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto60["m_column"]=$obj;
$proto60["m_contained"] = array();
$proto60["m_strCase"] = "";
$proto60["m_havingmode"] = "0";
$proto60["m_inBrackets"] = "0";
$proto60["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto60);

$proto58["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto58);

$proto0["m_fromlist"][]=$obj;
												$proto62=array();
$proto62["m_link"] = "SQLL_CROSSJOIN";
			$proto63=array();
$proto63["m_strName"] = "actuals";
$proto63["m_columns"] = array();
$proto63["m_columns"][] = "ID";
$proto63["m_columns"][] = "YTD Net Actual";
$proto63["m_columns"][] = "This Year Buget Gross";
$proto63["m_columns"][] = "This Year Budget Net";
$proto63["m_columns"][] = "YTDgrossact";
$obj = new SQLTable($proto63);

$proto62["m_table"] = $obj;
$proto62["m_alias"] = "";
$proto64=array();
$proto64["m_sql"] = "";
$proto64["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto64["m_column"]=$obj;
$proto64["m_contained"] = array();
$proto64["m_strCase"] = "";
$proto64["m_havingmode"] = "0";
$proto64["m_inBrackets"] = "0";
$proto64["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto64);

$proto62["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto62);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto66=array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto66["m_column"]=$obj;
$proto66["m_bAsc"] = 1;
$proto66["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto66);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Revenue_Estimates1 = createSqlQuery_Revenue_Estimates1();
																				$tdataRevenue_Estimates1[".sqlquery"] = $queryData_Revenue_Estimates1;
	
if(isset($tdataRevenue_Estimates1["field2"])){
	$tdataRevenue_Estimates1["field2"]["LookupTable"] = "carscars_view";
	$tdataRevenue_Estimates1["field2"]["LookupOrderBy"] = "name";
	$tdataRevenue_Estimates1["field2"]["LookupType"] = 4;
	$tdataRevenue_Estimates1["field2"]["LinkField"] = "email";
	$tdataRevenue_Estimates1["field2"]["DisplayField"] = "name";
	$tdataRevenue_Estimates1[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Revenue_Estimates1_events.php"));
$tableEvents["Revenue Estimates1"] = new eventclass_Revenue_Estimates1;
$tdataRevenue_Estimates1[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Revenue Estimates1");

?>