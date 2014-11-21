<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers_Combo = array();
	$tdatabankers_Combo[".NumberOfChars"] = 80; 
	$tdatabankers_Combo[".ShortName"] = "bankers_Combo";
	$tdatabankers_Combo[".OwnerID"] = "";
	$tdatabankers_Combo[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsbankers_Combo = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers_Combo["English"] = array();
	$fieldToolTipsbankers_Combo["English"] = array();
	$fieldLabelsbankers_Combo["English"]["Name"] = "Name";
	$fieldToolTipsbankers_Combo["English"]["Name"] = "";
	$fieldLabelsbankers_Combo["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsbankers_Combo["English"]["Start Date"] = "";
	$fieldLabelsbankers_Combo["English"]["YTD_Revenue"] = "YTD Revenue";
	$fieldToolTipsbankers_Combo["English"]["YTD Revenue"] = "";
	$fieldLabelsbankers_Combo["English"]["Last_Year_Rev"] = "Last Year Rev";
	$fieldToolTipsbankers_Combo["English"]["Last Year Rev"] = "";
	$fieldLabelsbankers_Combo["English"]["Prior_Year_Rev"] = "Prior Year Rev";
	$fieldToolTipsbankers_Combo["English"]["Prior Year Rev"] = "";
	$fieldLabelsbankers_Combo["English"]["Budget_Year"] = "Budget Year";
	$fieldToolTipsbankers_Combo["English"]["Budget Year"] = "";
	$fieldLabelsbankers_Combo["English"]["YTD_Last"] = "YTD+Last";
	$fieldToolTipsbankers_Combo["English"]["YTD+Last"] = "";
	$fieldLabelsbankers_Combo["English"]["YTD_Last_Prior"] = "YTD+Last+Prior";
	$fieldToolTipsbankers_Combo["English"]["YTD+Last+Prior"] = "";
	$fieldLabelsbankers_Combo["English"]["company_Count"] = "Company Count";
	$fieldToolTipsbankers_Combo["English"]["company Count"] = "";
	$fieldLabelsbankers_Combo["English"]["IBC"] = "IBC";
	$fieldToolTipsbankers_Combo["English"]["IBC"] = "";
	if (count($fieldToolTipsbankers_Combo["English"]))
		$tdatabankers_Combo[".isUseToolTips"] = true;
}
	
	
	$tdatabankers_Combo[".NCSearch"] = true;



$tdatabankers_Combo[".shortTableName"] = "bankers_Combo";
$tdatabankers_Combo[".nSecOptions"] = 0;
$tdatabankers_Combo[".recsPerRowList"] = 1;
$tdatabankers_Combo[".mainTableOwnerID"] = "";
$tdatabankers_Combo[".moveNext"] = 1;
$tdatabankers_Combo[".nType"] = 2;

$tdatabankers_Combo[".strOriginalTableName"] = "bankers";




$tdatabankers_Combo[".showAddInPopup"] = false;

$tdatabankers_Combo[".showEditInPopup"] = false;

$tdatabankers_Combo[".showViewInPopup"] = false;

$tdatabankers_Combo[".fieldsForRegister"] = array();

$tdatabankers_Combo[".listAjax"] = false;

	$tdatabankers_Combo[".audit"] = false;

	$tdatabankers_Combo[".locking"] = false;

$tdatabankers_Combo[".listIcons"] = true;
$tdatabankers_Combo[".edit"] = true;
$tdatabankers_Combo[".inlineEdit"] = true;
$tdatabankers_Combo[".inlineAdd"] = true;
$tdatabankers_Combo[".view"] = true;

$tdatabankers_Combo[".exportTo"] = true;

$tdatabankers_Combo[".printFriendly"] = true;

$tdatabankers_Combo[".delete"] = true;

$tdatabankers_Combo[".showSimpleSearchOptions"] = false;

$tdatabankers_Combo[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers_Combo[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers_Combo[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankers_Combo[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers_Combo[".isUseTimeForSearch"] = false;




$tdatabankers_Combo[".allSearchFields"] = array();

$tdatabankers_Combo[".allSearchFields"][] = "Name";
$tdatabankers_Combo[".allSearchFields"][] = "Budget Year";
$tdatabankers_Combo[".allSearchFields"][] = "Start Date";
$tdatabankers_Combo[".allSearchFields"][] = "YTD Revenue";
$tdatabankers_Combo[".allSearchFields"][] = "Last Year Rev";
$tdatabankers_Combo[".allSearchFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".allSearchFields"][] = "YTD+Last";
$tdatabankers_Combo[".allSearchFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".allSearchFields"][] = "company Count";
$tdatabankers_Combo[".allSearchFields"][] = "IBC";

$tdatabankers_Combo[".googleLikeFields"][] = "Name";
$tdatabankers_Combo[".googleLikeFields"][] = "Budget Year";
$tdatabankers_Combo[".googleLikeFields"][] = "Start Date";
$tdatabankers_Combo[".googleLikeFields"][] = "YTD Revenue";
$tdatabankers_Combo[".googleLikeFields"][] = "Last Year Rev";
$tdatabankers_Combo[".googleLikeFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".googleLikeFields"][] = "YTD+Last";
$tdatabankers_Combo[".googleLikeFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".googleLikeFields"][] = "company Count";
$tdatabankers_Combo[".googleLikeFields"][] = "IBC";


$tdatabankers_Combo[".advSearchFields"][] = "Name";
$tdatabankers_Combo[".advSearchFields"][] = "Budget Year";
$tdatabankers_Combo[".advSearchFields"][] = "Start Date";
$tdatabankers_Combo[".advSearchFields"][] = "YTD Revenue";
$tdatabankers_Combo[".advSearchFields"][] = "Last Year Rev";
$tdatabankers_Combo[".advSearchFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".advSearchFields"][] = "YTD+Last";
$tdatabankers_Combo[".advSearchFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".advSearchFields"][] = "company Count";
$tdatabankers_Combo[".advSearchFields"][] = "IBC";

$tdatabankers_Combo[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers_Combo[".strOrderBy"] = $tstrOrderBy;

$tdatabankers_Combo[".orderindexes"] = array();

$tdatabankers_Combo[".sqlHead"] = "SELECT bankers.Name,  bankers.`Budget Year`,  bankers.`Start Date`,  bankers.`YTD Revenue`,  bankers.`Last Year Rev`,  bankers.`Prior Year Rev`,  (bankers.`ytd revenue` + bankers.`last year rev`) AS `YTD+Last`,  (bankers.`ytd revenue` + bankers.`last year rev`+ bankers.`Prior Year Rev`) AS `YTD+Last+Prior`,  group_concat(company) AS `company Count`,  COUNT(`IBC Date`) AS IBC";
$tdatabankers_Combo[".sqlFrom"] = "FROM bankers  LEFT OUTER JOIN bankerrev ON bankers.Name = bankerrev.Name  RIGHT OUTER JOIN company ON company.`Primary Banker` = bankers.Name";
$tdatabankers_Combo[".sqlWhereExpr"] = "";
$tdatabankers_Combo[".sqlTail"] = "GROUP BY bankers.Name";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers_Combo[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers_Combo[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers_Combo = array();
$tdatabankers_Combo[".Keys"] = $tableKeysbankers_Combo;

$tdatabankers_Combo[".listFields"] = array();
$tdatabankers_Combo[".listFields"][] = "Name";
$tdatabankers_Combo[".listFields"][] = "Budget Year";
$tdatabankers_Combo[".listFields"][] = "Start Date";
$tdatabankers_Combo[".listFields"][] = "YTD Revenue";
$tdatabankers_Combo[".listFields"][] = "Last Year Rev";
$tdatabankers_Combo[".listFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".listFields"][] = "YTD+Last";
$tdatabankers_Combo[".listFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".listFields"][] = "company Count";
$tdatabankers_Combo[".listFields"][] = "IBC";

$tdatabankers_Combo[".viewFields"] = array();
$tdatabankers_Combo[".viewFields"][] = "Name";
$tdatabankers_Combo[".viewFields"][] = "Budget Year";
$tdatabankers_Combo[".viewFields"][] = "Start Date";
$tdatabankers_Combo[".viewFields"][] = "YTD Revenue";
$tdatabankers_Combo[".viewFields"][] = "Last Year Rev";
$tdatabankers_Combo[".viewFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".viewFields"][] = "YTD+Last";
$tdatabankers_Combo[".viewFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".viewFields"][] = "company Count";
$tdatabankers_Combo[".viewFields"][] = "IBC";

$tdatabankers_Combo[".addFields"] = array();
$tdatabankers_Combo[".addFields"][] = "Name";
$tdatabankers_Combo[".addFields"][] = "Budget Year";
$tdatabankers_Combo[".addFields"][] = "Start Date";
$tdatabankers_Combo[".addFields"][] = "YTD Revenue";
$tdatabankers_Combo[".addFields"][] = "Last Year Rev";
$tdatabankers_Combo[".addFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".addFields"][] = "YTD+Last";
$tdatabankers_Combo[".addFields"][] = "YTD+Last+Prior";

$tdatabankers_Combo[".inlineAddFields"] = array();
$tdatabankers_Combo[".inlineAddFields"][] = "Name";
$tdatabankers_Combo[".inlineAddFields"][] = "Budget Year";
$tdatabankers_Combo[".inlineAddFields"][] = "Start Date";
$tdatabankers_Combo[".inlineAddFields"][] = "YTD Revenue";
$tdatabankers_Combo[".inlineAddFields"][] = "Last Year Rev";
$tdatabankers_Combo[".inlineAddFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".inlineAddFields"][] = "YTD+Last";
$tdatabankers_Combo[".inlineAddFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".inlineAddFields"][] = "company Count";
$tdatabankers_Combo[".inlineAddFields"][] = "IBC";

$tdatabankers_Combo[".editFields"] = array();
$tdatabankers_Combo[".editFields"][] = "Name";
$tdatabankers_Combo[".editFields"][] = "Budget Year";
$tdatabankers_Combo[".editFields"][] = "Start Date";
$tdatabankers_Combo[".editFields"][] = "YTD Revenue";
$tdatabankers_Combo[".editFields"][] = "Last Year Rev";
$tdatabankers_Combo[".editFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".editFields"][] = "YTD+Last";
$tdatabankers_Combo[".editFields"][] = "YTD+Last+Prior";

$tdatabankers_Combo[".inlineEditFields"] = array();
$tdatabankers_Combo[".inlineEditFields"][] = "Name";
$tdatabankers_Combo[".inlineEditFields"][] = "Budget Year";
$tdatabankers_Combo[".inlineEditFields"][] = "Start Date";
$tdatabankers_Combo[".inlineEditFields"][] = "YTD Revenue";
$tdatabankers_Combo[".inlineEditFields"][] = "Last Year Rev";
$tdatabankers_Combo[".inlineEditFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".inlineEditFields"][] = "YTD+Last";
$tdatabankers_Combo[".inlineEditFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".inlineEditFields"][] = "company Count";
$tdatabankers_Combo[".inlineEditFields"][] = "IBC";

$tdatabankers_Combo[".exportFields"] = array();
$tdatabankers_Combo[".exportFields"][] = "Name";
$tdatabankers_Combo[".exportFields"][] = "Budget Year";
$tdatabankers_Combo[".exportFields"][] = "Start Date";
$tdatabankers_Combo[".exportFields"][] = "YTD Revenue";
$tdatabankers_Combo[".exportFields"][] = "Last Year Rev";
$tdatabankers_Combo[".exportFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".exportFields"][] = "YTD+Last";
$tdatabankers_Combo[".exportFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".exportFields"][] = "company Count";
$tdatabankers_Combo[".exportFields"][] = "IBC";

$tdatabankers_Combo[".printFields"] = array();
$tdatabankers_Combo[".printFields"][] = "Name";
$tdatabankers_Combo[".printFields"][] = "Budget Year";
$tdatabankers_Combo[".printFields"][] = "Start Date";
$tdatabankers_Combo[".printFields"][] = "YTD Revenue";
$tdatabankers_Combo[".printFields"][] = "Last Year Rev";
$tdatabankers_Combo[".printFields"][] = "Prior Year Rev";
$tdatabankers_Combo[".printFields"][] = "YTD+Last";
$tdatabankers_Combo[".printFields"][] = "YTD+Last+Prior";
$tdatabankers_Combo[".printFields"][] = "company Count";
$tdatabankers_Combo[".printFields"][] = "IBC";

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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
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
	
		
		
	$tdatabankers_Combo["Name"] = $fdata;
//	Budget Year
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Budget Year";
	$fdata["GoodName"] = "Budget_Year";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Budget Year"; 
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
	
		$fdata["strField"] = "Budget Year"; 
		$fdata["FullName"] = "bankers.`Budget Year`";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["Budget Year"] = $fdata;
//	Start Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Start Date";
	$fdata["GoodName"] = "Start_Date";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Start Date"; 
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
	
		$fdata["strField"] = "Start Date"; 
		$fdata["FullName"] = "bankers.`Start Date`";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["Start Date"] = $fdata;
//	YTD Revenue
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "YTD Revenue";
	$fdata["GoodName"] = "YTD_Revenue";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Revenue"; 
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
	
		$fdata["strField"] = "YTD Revenue"; 
		$fdata["FullName"] = "bankers.`YTD Revenue`";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["YTD Revenue"] = $fdata;
//	Last Year Rev
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Last Year Rev";
	$fdata["GoodName"] = "Last_Year_Rev";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Year Rev"; 
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
	
		$fdata["strField"] = "Last Year Rev"; 
		$fdata["FullName"] = "bankers.`Last Year Rev`";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["Last Year Rev"] = $fdata;
//	Prior Year Rev
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Prior Year Rev";
	$fdata["GoodName"] = "Prior_Year_Rev";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Prior Year Rev"; 
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
	
		$fdata["strField"] = "Prior Year Rev"; 
		$fdata["FullName"] = "bankers.`Prior Year Rev`";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["Prior Year Rev"] = $fdata;
//	YTD+Last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "YTD+Last";
	$fdata["GoodName"] = "YTD_Last";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD+Last"; 
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
	
		$fdata["strField"] = "YTD+Last"; 
		$fdata["FullName"] = "(bankers.`ytd revenue` + bankers.`last year rev`)";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["YTD+Last"] = $fdata;
//	YTD+Last+Prior
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "YTD+Last+Prior";
	$fdata["GoodName"] = "YTD_Last_Prior";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD+Last+Prior"; 
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
	
		$fdata["strField"] = "YTD+Last+Prior"; 
		$fdata["FullName"] = "(bankers.`ytd revenue` + bankers.`last year rev`+ bankers.`Prior Year Rev`)";
	
		
		
				
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
	
		
		
	$tdatabankers_Combo["YTD+Last+Prior"] = $fdata;
//	company Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
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
	
		
		
	$tdatabankers_Combo["company Count"] = $fdata;
//	IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
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
	
		
		
	$tdatabankers_Combo["IBC"] = $fdata;

	
$tables_data["bankers Combo"]=&$tdatabankers_Combo;
$field_labels["bankers_Combo"] = &$fieldLabelsbankers_Combo;
$fieldToolTips["bankers Combo"] = &$fieldToolTipsbankers_Combo;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers Combo"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankers Combo"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers_Combo()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "bankers.Name,  bankers.`Budget Year`,  bankers.`Start Date`,  bankers.`YTD Revenue`,  bankers.`Last Year Rev`,  bankers.`Prior Year Rev`,  (bankers.`ytd revenue` + bankers.`last year rev`) AS `YTD+Last`,  (bankers.`ytd revenue` + bankers.`last year rev`+ bankers.`Prior Year Rev`) AS `YTD+Last+Prior`,  group_concat(company) AS `company Count`,  COUNT(`IBC Date`) AS IBC";
$proto0["m_strFrom"] = "FROM bankers  LEFT OUTER JOIN bankerrev ON bankers.Name = bankerrev.Name  RIGHT OUTER JOIN company ON company.`Primary Banker` = bankers.Name";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
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
			$obj = new SQLField(array(
	"m_strName" => "Budget Year",
	"m_strTable" => "bankers"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "bankers"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Revenue",
	"m_strTable" => "bankers"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Year Rev",
	"m_strTable" => "bankers"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Prior Year Rev",
	"m_strTable" => "bankers"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(bankers.`ytd revenue` + bankers.`last year rev`)"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "YTD+Last";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(bankers.`ytd revenue` + bankers.`last year rev`+ bankers.`Prior Year Rev`)"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "YTD+Last+Prior";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "group_concat(company)"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "company Count";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$proto24=array();
$proto24["m_functiontype"] = "SQLF_COUNT";
$proto24["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "`IBC Date`"
));

$proto24["m_arguments"][]=$obj;
$proto24["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto24);

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "IBC";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "bankers";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "ID";
$proto27["m_columns"][] = "Name";
$proto27["m_columns"][] = "Start Date";
$proto27["m_columns"][] = "Budget Year";
$proto27["m_columns"][] = "Active";
$proto27["m_columns"][] = "YTD Revenue";
$proto27["m_columns"][] = "Last Year Rev";
$proto27["m_columns"][] = "Prior Year Rev";
$proto27["m_columns"][] = "Last Year Rank";
$proto27["m_columns"][] = "YTD+Last";
$proto27["m_columns"][] = "YTD+Last+Prior";
$proto27["m_columns"][] = "YTD Closing";
$proto27["m_columns"][] = "Last Year Closing";
$proto27["m_columns"][] = "YTD IBC";
$proto27["m_columns"][] = "YTD Engagements";
$proto27["m_columns"][] = "Total Current Engagments";
$proto27["m_columns"][] = "# Wheelhouse";
$proto27["m_columns"][] = "# Speculative";
$proto27["m_columns"][] = "# Minimum";
$proto27["m_columns"][] = "Last Name";
$proto27["m_columns"][] = "First Name";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_alias"] = "";
$proto28=array();
$proto28["m_sql"] = "";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "";
$proto28["m_havingmode"] = "0";
$proto28["m_inBrackets"] = "0";
$proto28["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto0["m_fromlist"][]=$obj;
												$proto30=array();
$proto30["m_link"] = "SQLL_LEFTJOIN";
			$proto31=array();
$proto31["m_strName"] = "bankerrev";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "ID";
$proto31["m_columns"][] = "Year";
$proto31["m_columns"][] = "Revenue total";
$proto31["m_columns"][] = "Name";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_alias"] = "";
$proto32=array();
$proto32["m_sql"] = "bankers.Name = bankerrev.Name";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "= bankerrev.Name";
$proto32["m_havingmode"] = "0";
$proto32["m_inBrackets"] = "0";
$proto32["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto0["m_fromlist"][]=$obj;
												$proto34=array();
$proto34["m_link"] = "SQLL_RIGHTJOIN";
			$proto35=array();
$proto35["m_strName"] = "company";
$proto35["m_columns"] = array();
$proto35["m_columns"][] = "ID";
$proto35["m_columns"][] = "Company";
$proto35["m_columns"][] = "Deal Slot";
$proto35["m_columns"][] = "IBC Date";
$proto35["m_columns"][] = "EL Date";
$proto35["m_columns"][] = "Project Name";
$proto35["m_columns"][] = "Status";
$proto35["m_columns"][] = "Deal Type";
$proto35["m_columns"][] = "Projected Fee";
$proto35["m_columns"][] = "Projected Transaction Size";
$proto35["m_columns"][] = "Est. Close Date";
$proto35["m_columns"][] = "Primary Banker";
$proto35["m_columns"][] = "Practice Area";
$proto35["m_columns"][] = "Ownership Class";
$proto35["m_columns"][] = "Industry";
$proto35["m_columns"][] = "Referral Type";
$proto35["m_columns"][] = "Referral Source-Company";
$proto35["m_columns"][] = "Referral Scource-Ind.";
$proto35["m_columns"][] = "Description";
$proto35["m_columns"][] = "Dead Date";
$proto35["m_columns"][] = "EL Expiration Date";
$proto35["m_columns"][] = "Engagment Fee";
$proto35["m_columns"][] = "Fee Minimum";
$proto35["m_columns"][] = "Final Total Sucess Fee";
$proto35["m_columns"][] = "Final Transaction Size";
$proto35["m_columns"][] = "Monthly Retainer";
$proto35["m_columns"][] = "Closed Date";
$proto35["m_columns"][] = "Team Split-1";
$proto35["m_columns"][] = "Team-1";
$proto35["m_columns"][] = "Team Split-2";
$proto35["m_columns"][] = "Team-2";
$proto35["m_columns"][] = "Team Split-3";
$proto35["m_columns"][] = "Team Split-4";
$proto35["m_columns"][] = "Team Split-5";
$proto35["m_columns"][] = "Team Split-6";
$proto35["m_columns"][] = "Team-3";
$proto35["m_columns"][] = "Team-4";
$proto35["m_columns"][] = "Team-5";
$proto35["m_columns"][] = "Team-6";
$proto35["m_columns"][] = "Fee Split-1";
$proto35["m_columns"][] = "Fee Split-2";
$proto35["m_columns"][] = "Fee Split-3";
$proto35["m_columns"][] = "Fee Split-4";
$proto35["m_columns"][] = "Fee Split-5";
$proto35["m_columns"][] = "Fee Split-6";
$proto35["m_columns"][] = "Fee To-1";
$proto35["m_columns"][] = "Fee To-2";
$proto35["m_columns"][] = "Fee To-3";
$proto35["m_columns"][] = "Fee To-4";
$proto35["m_columns"][] = "Fee To-5";
$proto35["m_columns"][] = "Fee To-6";
$proto35["m_columns"][] = "Enterpise Value";
$proto35["m_columns"][] = "Fee Details";
$proto35["m_columns"][] = "Split to Corporate";
$proto35["m_columns"][] = "Paul";
$proto35["m_columns"][] = "McBroom";
$proto35["m_columns"][] = "Month of Close";
$proto35["m_columns"][] = "Gross This";
$proto35["m_columns"][] = "Gross Next";
$proto35["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto35);

$proto34["m_table"] = $obj;
$proto34["m_alias"] = "";
$proto36=array();
$proto36["m_sql"] = "company.`Primary Banker` = bankers.Name";
$proto36["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
$proto36["m_strCase"] = "= bankers.Name";
$proto36["m_havingmode"] = "0";
$proto36["m_inBrackets"] = "0";
$proto36["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto36);

$proto34["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto34);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto38=array();
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto38["m_column"]=$obj;
$obj = new SQLGroupByItem($proto38);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankers_Combo = createSqlQuery_bankers_Combo();
										$tdatabankers_Combo[".sqlquery"] = $queryData_bankers_Combo;
	
if(isset($tdatabankers_Combo["field2"])){
	$tdatabankers_Combo["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers_Combo["field2"]["LookupOrderBy"] = "name";
	$tdatabankers_Combo["field2"]["LookupType"] = 4;
	$tdatabankers_Combo["field2"]["LinkField"] = "email";
	$tdatabankers_Combo["field2"]["DisplayField"] = "name";
	$tdatabankers_Combo[".hasCustomViewField"] = true;
}

$tableEvents["bankers Combo"] = new eventsBase;
$tdatabankers_Combo[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankers Combo");

?>