<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankers = array();
	$tdatabankers[".NumberOfChars"] = 80; 
	$tdatabankers[".ShortName"] = "bankers";
	$tdatabankers[".OwnerID"] = "";
	$tdatabankers[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsbankers = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankers["English"] = array();
	$fieldToolTipsbankers["English"] = array();
	$fieldLabelsbankers["English"]["ID"] = "ID";
	$fieldToolTipsbankers["English"]["ID"] = "";
	$fieldLabelsbankers["English"]["Name"] = "Name";
	$fieldToolTipsbankers["English"]["Name"] = "";
	$fieldLabelsbankers["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsbankers["English"]["Start Date"] = "";
	$fieldLabelsbankers["English"]["Primary_Banker"] = "Primary Banker";
	$fieldToolTipsbankers["English"]["Primary Banker"] = "";
	$fieldLabelsbankers["English"]["Budget_Year"] = "Budget Year";
	$fieldToolTipsbankers["English"]["Budget Year"] = "";
	$fieldLabelsbankers["English"]["Active"] = "Active";
	$fieldToolTipsbankers["English"]["Active"] = "";
	$fieldLabelsbankers["English"]["YTD_Revenue"] = "YTD Revenue";
	$fieldToolTipsbankers["English"]["YTD Revenue"] = "";
	$fieldLabelsbankers["English"]["Last_Year_Rev"] = "Last Year Rev";
	$fieldToolTipsbankers["English"]["Last Year Rev"] = "";
	$fieldLabelsbankers["English"]["Prior_Year_Rev"] = "Prior Year Rev";
	$fieldToolTipsbankers["English"]["Prior Year Rev"] = "";
	$fieldLabelsbankers["English"]["Last_Year_Rank"] = "Last Year Rank";
	$fieldToolTipsbankers["English"]["Last Year Rank"] = "";
	$fieldLabelsbankers["English"]["YTD_Closing"] = "YTD Closing";
	$fieldToolTipsbankers["English"]["YTD Closing"] = "";
	$fieldLabelsbankers["English"]["Last_Year_Closing"] = "Last Year Closing";
	$fieldToolTipsbankers["English"]["Last Year Closing"] = "";
	$fieldLabelsbankers["English"]["YTD_IBC"] = "YTD IBC";
	$fieldToolTipsbankers["English"]["YTD IBC"] = "";
	$fieldLabelsbankers["English"]["YTD_Engagements"] = "YTD Engagements";
	$fieldToolTipsbankers["English"]["YTD Engagements"] = "";
	$fieldLabelsbankers["English"]["Total_Current_Engagments"] = "Total Current Engagments";
	$fieldToolTipsbankers["English"]["Total Current Engagments"] = "";
	$fieldLabelsbankers["English"]["__Wheelhouse"] = "# Wheelhouse";
	$fieldToolTipsbankers["English"]["# Wheelhouse"] = "";
	$fieldLabelsbankers["English"]["__Speculative"] = "# Speculative";
	$fieldToolTipsbankers["English"]["# Speculative"] = "";
	$fieldLabelsbankers["English"]["__Minimum"] = "# Minimum";
	$fieldToolTipsbankers["English"]["# Minimum"] = "";
	$fieldLabelsbankers["English"]["Last_Name"] = "Last Name";
	$fieldToolTipsbankers["English"]["Last Name"] = "";
	$fieldLabelsbankers["English"]["First_Name"] = "First Name";
	$fieldToolTipsbankers["English"]["First Name"] = "";
	$fieldLabelsbankers["English"]["YTD_Last"] = "YTD+Last";
	$fieldToolTipsbankers["English"]["YTD+Last"] = "";
	if (count($fieldToolTipsbankers["English"]))
		$tdatabankers[".isUseToolTips"] = true;
}
	
	
	$tdatabankers[".NCSearch"] = true;



$tdatabankers[".shortTableName"] = "bankers";
$tdatabankers[".nSecOptions"] = 0;
$tdatabankers[".recsPerRowList"] = 1;
$tdatabankers[".mainTableOwnerID"] = "";
$tdatabankers[".moveNext"] = 1;
$tdatabankers[".nType"] = 0;

$tdatabankers[".strOriginalTableName"] = "bankers";




$tdatabankers[".showAddInPopup"] = false;

$tdatabankers[".showEditInPopup"] = false;

$tdatabankers[".showViewInPopup"] = false;

$tdatabankers[".fieldsForRegister"] = array();

$tdatabankers[".listAjax"] = false;

	$tdatabankers[".audit"] = false;

	$tdatabankers[".locking"] = false;

$tdatabankers[".listIcons"] = true;
$tdatabankers[".edit"] = true;
$tdatabankers[".inlineEdit"] = true;
$tdatabankers[".inlineAdd"] = true;
$tdatabankers[".view"] = true;

$tdatabankers[".exportTo"] = true;

$tdatabankers[".printFriendly"] = true;

$tdatabankers[".delete"] = true;

$tdatabankers[".showSimpleSearchOptions"] = false;

$tdatabankers[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankers[".isUseAjaxSuggest"] = false;
else 
	$tdatabankers[".isUseAjaxSuggest"] = true;

$tdatabankers[".rowHighlite"] = true;

// button handlers file names

$tdatabankers[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankers[".isUseTimeForSearch"] = false;




$tdatabankers[".allSearchFields"] = array();

$tdatabankers[".allSearchFields"][] = "First Name";
$tdatabankers[".allSearchFields"][] = "YTD+Last";
$tdatabankers[".allSearchFields"][] = "Last Name";
$tdatabankers[".allSearchFields"][] = "Active";
$tdatabankers[".allSearchFields"][] = "Name";
$tdatabankers[".allSearchFields"][] = "Budget Year";
$tdatabankers[".allSearchFields"][] = "Start Date";
$tdatabankers[".allSearchFields"][] = "YTD Revenue";
$tdatabankers[".allSearchFields"][] = "Last Year Rev";
$tdatabankers[".allSearchFields"][] = "Prior Year Rev";
$tdatabankers[".allSearchFields"][] = "Last Year Rank";
$tdatabankers[".allSearchFields"][] = "YTD Closing";
$tdatabankers[".allSearchFields"][] = "Last Year Closing";
$tdatabankers[".allSearchFields"][] = "YTD IBC";
$tdatabankers[".allSearchFields"][] = "YTD Engagements";
$tdatabankers[".allSearchFields"][] = "Total Current Engagments";
$tdatabankers[".allSearchFields"][] = "# Wheelhouse";
$tdatabankers[".allSearchFields"][] = "# Speculative";
$tdatabankers[".allSearchFields"][] = "# Minimum";
$tdatabankers[".allSearchFields"][] = "ID";

$tdatabankers[".googleLikeFields"][] = "ID";
$tdatabankers[".googleLikeFields"][] = "Name";
$tdatabankers[".googleLikeFields"][] = "Start Date";
$tdatabankers[".googleLikeFields"][] = "Budget Year";
$tdatabankers[".googleLikeFields"][] = "Active";
$tdatabankers[".googleLikeFields"][] = "YTD Revenue";
$tdatabankers[".googleLikeFields"][] = "Last Year Rev";
$tdatabankers[".googleLikeFields"][] = "Prior Year Rev";
$tdatabankers[".googleLikeFields"][] = "Last Year Rank";
$tdatabankers[".googleLikeFields"][] = "YTD+Last";
$tdatabankers[".googleLikeFields"][] = "YTD Closing";
$tdatabankers[".googleLikeFields"][] = "Last Year Closing";
$tdatabankers[".googleLikeFields"][] = "YTD IBC";
$tdatabankers[".googleLikeFields"][] = "YTD Engagements";
$tdatabankers[".googleLikeFields"][] = "Total Current Engagments";
$tdatabankers[".googleLikeFields"][] = "# Wheelhouse";
$tdatabankers[".googleLikeFields"][] = "# Speculative";
$tdatabankers[".googleLikeFields"][] = "# Minimum";
$tdatabankers[".googleLikeFields"][] = "Last Name";
$tdatabankers[".googleLikeFields"][] = "First Name";


$tdatabankers[".advSearchFields"][] = "First Name";
$tdatabankers[".advSearchFields"][] = "YTD+Last";
$tdatabankers[".advSearchFields"][] = "Last Name";
$tdatabankers[".advSearchFields"][] = "Active";
$tdatabankers[".advSearchFields"][] = "Name";
$tdatabankers[".advSearchFields"][] = "Budget Year";
$tdatabankers[".advSearchFields"][] = "Start Date";
$tdatabankers[".advSearchFields"][] = "YTD Revenue";
$tdatabankers[".advSearchFields"][] = "Last Year Rev";
$tdatabankers[".advSearchFields"][] = "Prior Year Rev";
$tdatabankers[".advSearchFields"][] = "Last Year Rank";
$tdatabankers[".advSearchFields"][] = "YTD Closing";
$tdatabankers[".advSearchFields"][] = "Last Year Closing";
$tdatabankers[".advSearchFields"][] = "YTD IBC";
$tdatabankers[".advSearchFields"][] = "YTD Engagements";
$tdatabankers[".advSearchFields"][] = "Total Current Engagments";
$tdatabankers[".advSearchFields"][] = "# Wheelhouse";
$tdatabankers[".advSearchFields"][] = "# Speculative";
$tdatabankers[".advSearchFields"][] = "# Minimum";
$tdatabankers[".advSearchFields"][] = "ID";

$tdatabankers[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
		


$tdatabankers[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY Name";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankers[".strOrderBy"] = $tstrOrderBy;

$tdatabankers[".orderindexes"] = array();
$tdatabankers[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "Name");

$tdatabankers[".sqlHead"] = "SELECT ID,  Name,  `Start Date`,  `Budget Year`,  Active,  `YTD Revenue`,  `Last Year Rev`,  `Prior Year Rev`,  `Last Year Rank`,  (`ytd revenue` + `last year rev`) AS `YTD+Last`,  `YTD Closing`,  `Last Year Closing`,  `YTD IBC`,  `YTD Engagements`,  `Total Current Engagments`,  `# Wheelhouse`,  `# Speculative`,  `# Minimum`,  `Last Name`,  `First Name`";
$tdatabankers[".sqlFrom"] = "FROM bankers";
$tdatabankers[".sqlWhereExpr"] = "";
$tdatabankers[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankers[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankers[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankers = array();
$tableKeysbankers[] = "ID";
$tdatabankers[".Keys"] = $tableKeysbankers;

$tdatabankers[".listFields"] = array();
$tdatabankers[".listFields"][] = "YTD+Last";
$tdatabankers[".listFields"][] = "Last Name";
$tdatabankers[".listFields"][] = "First Name";
$tdatabankers[".listFields"][] = "Active";
$tdatabankers[".listFields"][] = "Name";
$tdatabankers[".listFields"][] = "Budget Year";
$tdatabankers[".listFields"][] = "Start Date";
$tdatabankers[".listFields"][] = "YTD Revenue";
$tdatabankers[".listFields"][] = "Last Year Rev";
$tdatabankers[".listFields"][] = "Prior Year Rev";
$tdatabankers[".listFields"][] = "Last Year Rank";
$tdatabankers[".listFields"][] = "YTD Closing";
$tdatabankers[".listFields"][] = "Last Year Closing";
$tdatabankers[".listFields"][] = "YTD IBC";
$tdatabankers[".listFields"][] = "YTD Engagements";
$tdatabankers[".listFields"][] = "Total Current Engagments";
$tdatabankers[".listFields"][] = "# Wheelhouse";
$tdatabankers[".listFields"][] = "# Speculative";
$tdatabankers[".listFields"][] = "# Minimum";
$tdatabankers[".listFields"][] = "ID";

$tdatabankers[".viewFields"] = array();
$tdatabankers[".viewFields"][] = "First Name";
$tdatabankers[".viewFields"][] = "YTD+Last";
$tdatabankers[".viewFields"][] = "Last Name";
$tdatabankers[".viewFields"][] = "Active";
$tdatabankers[".viewFields"][] = "Name";
$tdatabankers[".viewFields"][] = "Budget Year";
$tdatabankers[".viewFields"][] = "Start Date";
$tdatabankers[".viewFields"][] = "YTD Revenue";
$tdatabankers[".viewFields"][] = "Last Year Rev";
$tdatabankers[".viewFields"][] = "Prior Year Rev";
$tdatabankers[".viewFields"][] = "Last Year Rank";
$tdatabankers[".viewFields"][] = "YTD Closing";
$tdatabankers[".viewFields"][] = "Last Year Closing";
$tdatabankers[".viewFields"][] = "YTD IBC";
$tdatabankers[".viewFields"][] = "YTD Engagements";
$tdatabankers[".viewFields"][] = "Total Current Engagments";
$tdatabankers[".viewFields"][] = "# Wheelhouse";
$tdatabankers[".viewFields"][] = "# Speculative";
$tdatabankers[".viewFields"][] = "# Minimum";
$tdatabankers[".viewFields"][] = "ID";

$tdatabankers[".addFields"] = array();
$tdatabankers[".addFields"][] = "First Name";
$tdatabankers[".addFields"][] = "Last Name";
$tdatabankers[".addFields"][] = "YTD+Last";
$tdatabankers[".addFields"][] = "Active";
$tdatabankers[".addFields"][] = "Name";
$tdatabankers[".addFields"][] = "Budget Year";
$tdatabankers[".addFields"][] = "Start Date";

$tdatabankers[".inlineAddFields"] = array();
$tdatabankers[".inlineAddFields"][] = "YTD+Last";
$tdatabankers[".inlineAddFields"][] = "Last Name";
$tdatabankers[".inlineAddFields"][] = "First Name";
$tdatabankers[".inlineAddFields"][] = "Active";
$tdatabankers[".inlineAddFields"][] = "Name";
$tdatabankers[".inlineAddFields"][] = "Budget Year";
$tdatabankers[".inlineAddFields"][] = "Start Date";

$tdatabankers[".editFields"] = array();
$tdatabankers[".editFields"][] = "First Name";
$tdatabankers[".editFields"][] = "Last Name";
$tdatabankers[".editFields"][] = "YTD+Last";
$tdatabankers[".editFields"][] = "Active";
$tdatabankers[".editFields"][] = "Name";
$tdatabankers[".editFields"][] = "Budget Year";
$tdatabankers[".editFields"][] = "Start Date";

$tdatabankers[".inlineEditFields"] = array();
$tdatabankers[".inlineEditFields"][] = "YTD+Last";
$tdatabankers[".inlineEditFields"][] = "Last Name";
$tdatabankers[".inlineEditFields"][] = "First Name";
$tdatabankers[".inlineEditFields"][] = "Active";
$tdatabankers[".inlineEditFields"][] = "Name";
$tdatabankers[".inlineEditFields"][] = "Budget Year";
$tdatabankers[".inlineEditFields"][] = "Start Date";

$tdatabankers[".exportFields"] = array();
$tdatabankers[".exportFields"][] = "First Name";
$tdatabankers[".exportFields"][] = "YTD+Last";
$tdatabankers[".exportFields"][] = "Last Name";
$tdatabankers[".exportFields"][] = "Active";
$tdatabankers[".exportFields"][] = "Name";
$tdatabankers[".exportFields"][] = "Budget Year";
$tdatabankers[".exportFields"][] = "Start Date";
$tdatabankers[".exportFields"][] = "YTD Revenue";
$tdatabankers[".exportFields"][] = "Last Year Rev";
$tdatabankers[".exportFields"][] = "Prior Year Rev";
$tdatabankers[".exportFields"][] = "Last Year Rank";
$tdatabankers[".exportFields"][] = "YTD Closing";
$tdatabankers[".exportFields"][] = "Last Year Closing";
$tdatabankers[".exportFields"][] = "YTD IBC";
$tdatabankers[".exportFields"][] = "YTD Engagements";
$tdatabankers[".exportFields"][] = "Total Current Engagments";
$tdatabankers[".exportFields"][] = "# Wheelhouse";
$tdatabankers[".exportFields"][] = "# Speculative";
$tdatabankers[".exportFields"][] = "# Minimum";
$tdatabankers[".exportFields"][] = "ID";

$tdatabankers[".printFields"] = array();
$tdatabankers[".printFields"][] = "First Name";
$tdatabankers[".printFields"][] = "YTD+Last";
$tdatabankers[".printFields"][] = "Last Name";
$tdatabankers[".printFields"][] = "Active";
$tdatabankers[".printFields"][] = "Name";
$tdatabankers[".printFields"][] = "Budget Year";
$tdatabankers[".printFields"][] = "Start Date";
$tdatabankers[".printFields"][] = "YTD Revenue";
$tdatabankers[".printFields"][] = "Last Year Rev";
$tdatabankers[".printFields"][] = "Prior Year Rev";
$tdatabankers[".printFields"][] = "Last Year Rank";
$tdatabankers[".printFields"][] = "YTD Closing";
$tdatabankers[".printFields"][] = "Last Year Closing";
$tdatabankers[".printFields"][] = "YTD IBC";
$tdatabankers[".printFields"][] = "YTD Engagements";
$tdatabankers[".printFields"][] = "Total Current Engagments";
$tdatabankers[".printFields"][] = "# Wheelhouse";
$tdatabankers[".printFields"][] = "# Speculative";
$tdatabankers[".printFields"][] = "# Minimum";
$tdatabankers[".printFields"][] = "ID";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
		$fdata["FullName"] = "Name";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Name"] = $fdata;
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
		$fdata["FullName"] = "`Start Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Start Date"] = $fdata;
//	Budget Year
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
		$fdata["FullName"] = "`Budget Year`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Budget Year"] = $fdata;
//	Active
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Active";
	$fdata["GoodName"] = "Active";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Active"; 
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
	
		$fdata["strField"] = "Active"; 
		$fdata["FullName"] = "Active";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Checkbox");
	
		
		
		
			
		
		
		
		
		
		
		
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Checkbox");
	
		
		$edata["AutoUpdate"] = true; 
	
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Active"] = $fdata;
//	YTD Revenue
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "YTD Revenue";
	$fdata["GoodName"] = "YTD_Revenue";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Revenue"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Revenue"; 
		$fdata["FullName"] = "`YTD Revenue`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["YTD Revenue"] = $fdata;
//	Last Year Rev
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "Last Year Rev";
	$fdata["GoodName"] = "Last_Year_Rev";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Year Rev"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Rev"; 
		$fdata["FullName"] = "`Last Year Rev`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Last Year Rev"] = $fdata;
//	Prior Year Rev
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "Prior Year Rev";
	$fdata["GoodName"] = "Prior_Year_Rev";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Prior Year Rev"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Prior Year Rev"; 
		$fdata["FullName"] = "`Prior Year Rev`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Prior Year Rev"] = $fdata;
//	Last Year Rank
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Last Year Rank";
	$fdata["GoodName"] = "Last_Year_Rank";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Year Rank"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Rank"; 
		$fdata["FullName"] = "`Last Year Rank`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Last Year Rank"] = $fdata;
//	YTD+Last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
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
		$fdata["FullName"] = "(`ytd revenue` + `last year rev`)";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["YTD+Last"] = $fdata;
//	YTD Closing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "YTD Closing";
	$fdata["GoodName"] = "YTD_Closing";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Closing"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Closing"; 
		$fdata["FullName"] = "`YTD Closing`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["YTD Closing"] = $fdata;
//	Last Year Closing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Last Year Closing";
	$fdata["GoodName"] = "Last_Year_Closing";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Year Closing"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Closing"; 
		$fdata["FullName"] = "`Last Year Closing`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Last Year Closing"] = $fdata;
//	YTD IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "YTD IBC";
	$fdata["GoodName"] = "YTD_IBC";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD IBC"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD IBC"; 
		$fdata["FullName"] = "`YTD IBC`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["YTD IBC"] = $fdata;
//	YTD Engagements
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "YTD Engagements";
	$fdata["GoodName"] = "YTD_Engagements";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Engagements"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Engagements"; 
		$fdata["FullName"] = "`YTD Engagements`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["YTD Engagements"] = $fdata;
//	Total Current Engagments
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "Total Current Engagments";
	$fdata["GoodName"] = "Total_Current_Engagments";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Total Current Engagments"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Total Current Engagments"; 
		$fdata["FullName"] = "`Total Current Engagments`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Total Current Engagments"] = $fdata;
//	# Wheelhouse
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "# Wheelhouse";
	$fdata["GoodName"] = "__Wheelhouse";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Wheelhouse"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "# Wheelhouse"; 
		$fdata["FullName"] = "`# Wheelhouse`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["# Wheelhouse"] = $fdata;
//	# Speculative
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "# Speculative";
	$fdata["GoodName"] = "__Speculative";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Speculative"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "# Speculative"; 
		$fdata["FullName"] = "`# Speculative`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["# Speculative"] = $fdata;
//	# Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "# Minimum";
	$fdata["GoodName"] = "__Minimum";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Minimum"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "# Minimum"; 
		$fdata["FullName"] = "`# Minimum`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["# Minimum"] = $fdata;
//	Last Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "Last Name";
	$fdata["GoodName"] = "Last_Name";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Name"; 
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
	
		$fdata["strField"] = "Last Name"; 
		$fdata["FullName"] = "`Last Name`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["Last Name"] = $fdata;
//	First Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "First Name";
	$fdata["GoodName"] = "First_Name";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "First Name"; 
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
	
		$fdata["strField"] = "First Name"; 
		$fdata["FullName"] = "`First Name`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankers["First Name"] = $fdata;

	
$tables_data["bankers"]=&$tdatabankers;
$field_labels["bankers"] = &$fieldLabelsbankers;
$fieldToolTips["bankers"] = &$fieldToolTipsbankers;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankers"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="bankerrev";
	$detailsParam["dDataSourceTable"]="bankerrev";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="bankerrev";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 2;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["bankers"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["bankers"][$dIndex]["masterKeys"][]="Name";
		$detailsTablesData["bankers"][$dIndex]["detailKeys"][]="Name";

$dIndex = 2-1;
			$strOriginalDetailsTable="bankerrank";
	$detailsParam["dDataSourceTable"]="bankerrank";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="bankerrank";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 2;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["bankers"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["bankers"][$dIndex]["masterKeys"][]="Name";
		$detailsTablesData["bankers"][$dIndex]["detailKeys"][]="Name";

	
// tables which are master tables for current table (detail)
$masterTablesData["bankers"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="company";
	$masterParams["mDataSourceTable"]="company";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "company";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "1";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 2;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["bankers"][$mIndex] = $masterParams;	
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Primary Banker";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-1";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-2";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-3";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-4";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-5";
		$masterTablesData["bankers"][$mIndex]["masterKeys"][]="Team-6";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";
		$masterTablesData["bankers"][$mIndex]["detailKeys"][]="Name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankers()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  Name,  `Start Date`,  `Budget Year`,  Active,  `YTD Revenue`,  `Last Year Rev`,  `Prior Year Rev`,  `Last Year Rank`,  (`ytd revenue` + `last year rev`) AS `YTD+Last`,  `YTD Closing`,  `Last Year Closing`,  `YTD IBC`,  `YTD Engagements`,  `Total Current Engagments`,  `# Wheelhouse`,  `# Speculative`,  `# Minimum`,  `Last Name`,  `First Name`";
$proto0["m_strFrom"] = "FROM bankers";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY Name";
$proto0["m_strTail"] = "";
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
	"m_strName" => "ID",
	"m_strTable" => "bankers"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
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
	"m_strName" => "Budget Year",
	"m_strTable" => "bankers"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Active",
	"m_strTable" => "bankers"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Revenue",
	"m_strTable" => "bankers"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Year Rev",
	"m_strTable" => "bankers"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Prior Year Rev",
	"m_strTable" => "bankers"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Year Rank",
	"m_strTable" => "bankers"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`ytd revenue` + `last year rev`)"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "YTD+Last";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Closing",
	"m_strTable" => "bankers"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Year Closing",
	"m_strTable" => "bankers"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD IBC",
	"m_strTable" => "bankers"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Engagements",
	"m_strTable" => "bankers"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "Total Current Engagments",
	"m_strTable" => "bankers"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "# Wheelhouse",
	"m_strTable" => "bankers"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "# Speculative",
	"m_strTable" => "bankers"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "# Minimum",
	"m_strTable" => "bankers"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Name",
	"m_strTable" => "bankers"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "First Name",
	"m_strTable" => "bankers"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto45=array();
$proto45["m_link"] = "SQLL_MAIN";
			$proto46=array();
$proto46["m_strName"] = "bankers";
$proto46["m_columns"] = array();
$proto46["m_columns"][] = "ID";
$proto46["m_columns"][] = "Name";
$proto46["m_columns"][] = "Start Date";
$proto46["m_columns"][] = "Budget Year";
$proto46["m_columns"][] = "Active";
$proto46["m_columns"][] = "YTD Revenue";
$proto46["m_columns"][] = "Last Year Rev";
$proto46["m_columns"][] = "Prior Year Rev";
$proto46["m_columns"][] = "Last Year Rank";
$proto46["m_columns"][] = "YTD+Last";
$proto46["m_columns"][] = "YTD+Last+Prior";
$proto46["m_columns"][] = "YTD Closing";
$proto46["m_columns"][] = "Last Year Closing";
$proto46["m_columns"][] = "YTD IBC";
$proto46["m_columns"][] = "YTD Engagements";
$proto46["m_columns"][] = "Total Current Engagments";
$proto46["m_columns"][] = "# Wheelhouse";
$proto46["m_columns"][] = "# Speculative";
$proto46["m_columns"][] = "# Minimum";
$proto46["m_columns"][] = "Last Name";
$proto46["m_columns"][] = "First Name";
$obj = new SQLTable($proto46);

$proto45["m_table"] = $obj;
$proto45["m_alias"] = "";
$proto47=array();
$proto47["m_sql"] = "";
$proto47["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto47["m_column"]=$obj;
$proto47["m_contained"] = array();
$proto47["m_strCase"] = "";
$proto47["m_havingmode"] = "0";
$proto47["m_inBrackets"] = "0";
$proto47["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto47);

$proto45["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto45);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto49=array();
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto49["m_column"]=$obj;
$proto49["m_bAsc"] = 1;
$proto49["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto49);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankers = createSqlQuery_bankers();
																				$tdatabankers[".sqlquery"] = $queryData_bankers;
	
if(isset($tdatabankers["field2"])){
	$tdatabankers["field2"]["LookupTable"] = "carscars_view";
	$tdatabankers["field2"]["LookupOrderBy"] = "name";
	$tdatabankers["field2"]["LookupType"] = 4;
	$tdatabankers["field2"]["LinkField"] = "email";
	$tdatabankers["field2"]["DisplayField"] = "name";
	$tdatabankers[".hasCustomViewField"] = true;
}

include_once(getabspath("include/bankers_events.php"));
$tableEvents["bankers"] = new eventclass_bankers;
$tdatabankers[".hasEvents"] = true;

$cipherer = new RunnerCipherer("bankers");

?>