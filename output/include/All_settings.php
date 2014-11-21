<?php
require_once(getabspath("classes/cipherer.php"));
$tdataAll = array();
	$tdataAll[".NumberOfChars"] = 80; 
	$tdataAll[".ShortName"] = "All";
	$tdataAll[".OwnerID"] = "";
	$tdataAll[".OriginalTable"] = "bankers";

//	field labels
$fieldLabelsAll = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsAll["English"] = array();
	$fieldToolTipsAll["English"] = array();
	$fieldLabelsAll["English"]["ID"] = "ID";
	$fieldToolTipsAll["English"]["ID"] = "";
	$fieldLabelsAll["English"]["Name"] = "Name";
	$fieldToolTipsAll["English"]["Name"] = "";
	$fieldLabelsAll["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsAll["English"]["Start Date"] = "";
	$fieldLabelsAll["English"]["Budget_Year"] = "Budget Year";
	$fieldToolTipsAll["English"]["Budget Year"] = "";
	$fieldLabelsAll["English"]["Active"] = "Active";
	$fieldToolTipsAll["English"]["Active"] = "";
	$fieldLabelsAll["English"]["YTD_Revenue"] = "YTD Revenue";
	$fieldToolTipsAll["English"]["YTD Revenue"] = "";
	$fieldLabelsAll["English"]["Last_Year_Rev"] = "Last Year Rev";
	$fieldToolTipsAll["English"]["Last Year Rev"] = "";
	$fieldLabelsAll["English"]["Prior_Year_Rev"] = "Prior Year Rev";
	$fieldToolTipsAll["English"]["Prior Year Rev"] = "";
	$fieldLabelsAll["English"]["Last_Year_Rank"] = "Last Year Rank";
	$fieldToolTipsAll["English"]["Last Year Rank"] = "";
	$fieldLabelsAll["English"]["YTD_Last"] = "YTD+Last";
	$fieldToolTipsAll["English"]["YTD+Last"] = "";
	$fieldLabelsAll["English"]["YTD_Last_Prior"] = "YTD+Last+Prior";
	$fieldToolTipsAll["English"]["YTD+Last+Prior"] = "";
	$fieldLabelsAll["English"]["YTD_Closing"] = "YTD Closing";
	$fieldToolTipsAll["English"]["YTD Closing"] = "";
	$fieldLabelsAll["English"]["Last_Year_Closing"] = "Last Year Closing";
	$fieldToolTipsAll["English"]["Last Year Closing"] = "";
	$fieldLabelsAll["English"]["YTD_IBC"] = "YTD IBC";
	$fieldToolTipsAll["English"]["YTD IBC"] = "";
	$fieldLabelsAll["English"]["YTD_Engagements"] = "YTD Engagements";
	$fieldToolTipsAll["English"]["YTD Engagements"] = "";
	$fieldLabelsAll["English"]["Total_Current_Engagments"] = "Total Current Engagments";
	$fieldToolTipsAll["English"]["Total Current Engagments"] = "";
	$fieldLabelsAll["English"]["__Wheelhouse"] = "# Wheelhouse";
	$fieldToolTipsAll["English"]["# Wheelhouse"] = "";
	$fieldLabelsAll["English"]["__Speculative"] = "# Speculative";
	$fieldToolTipsAll["English"]["# Speculative"] = "";
	$fieldLabelsAll["English"]["__Minimum"] = "# Minimum";
	$fieldToolTipsAll["English"]["# Minimum"] = "";
	$fieldLabelsAll["English"]["Last_Name"] = "Last Name";
	$fieldToolTipsAll["English"]["Last Name"] = "";
	$fieldLabelsAll["English"]["First_Name"] = "First Name";
	$fieldToolTipsAll["English"]["First Name"] = "";
	if (count($fieldToolTipsAll["English"]))
		$tdataAll[".isUseToolTips"] = true;
}
	
	
	$tdataAll[".NCSearch"] = true;



$tdataAll[".shortTableName"] = "All";
$tdataAll[".nSecOptions"] = 0;
$tdataAll[".recsPerRowList"] = 1;
$tdataAll[".mainTableOwnerID"] = "";
$tdataAll[".moveNext"] = 1;
$tdataAll[".nType"] = 2;

$tdataAll[".strOriginalTableName"] = "bankers";




$tdataAll[".showAddInPopup"] = false;

$tdataAll[".showEditInPopup"] = false;

$tdataAll[".showViewInPopup"] = false;

$tdataAll[".fieldsForRegister"] = array();

$tdataAll[".listAjax"] = false;

	$tdataAll[".audit"] = false;

	$tdataAll[".locking"] = false;

$tdataAll[".listIcons"] = true;
$tdataAll[".edit"] = true;
$tdataAll[".inlineEdit"] = true;
$tdataAll[".inlineAdd"] = true;
$tdataAll[".view"] = true;

$tdataAll[".exportTo"] = true;

$tdataAll[".printFriendly"] = true;

$tdataAll[".delete"] = true;

$tdataAll[".showSimpleSearchOptions"] = false;

$tdataAll[".showSearchPanel"] = true;

if (isMobile())
	$tdataAll[".isUseAjaxSuggest"] = false;
else 
	$tdataAll[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataAll[".addPageEvents"] = false;

// use timepicker for search panel
$tdataAll[".isUseTimeForSearch"] = false;




$tdataAll[".allSearchFields"] = array();

$tdataAll[".allSearchFields"][] = "ID";
$tdataAll[".allSearchFields"][] = "Name";
$tdataAll[".allSearchFields"][] = "Start Date";
$tdataAll[".allSearchFields"][] = "Budget Year";
$tdataAll[".allSearchFields"][] = "Active";
$tdataAll[".allSearchFields"][] = "YTD Revenue";
$tdataAll[".allSearchFields"][] = "Last Year Rev";
$tdataAll[".allSearchFields"][] = "Prior Year Rev";
$tdataAll[".allSearchFields"][] = "Last Year Rank";
$tdataAll[".allSearchFields"][] = "YTD+Last";
$tdataAll[".allSearchFields"][] = "YTD+Last+Prior";
$tdataAll[".allSearchFields"][] = "YTD Closing";
$tdataAll[".allSearchFields"][] = "Last Year Closing";
$tdataAll[".allSearchFields"][] = "YTD IBC";
$tdataAll[".allSearchFields"][] = "YTD Engagements";
$tdataAll[".allSearchFields"][] = "Total Current Engagments";
$tdataAll[".allSearchFields"][] = "# Wheelhouse";
$tdataAll[".allSearchFields"][] = "# Speculative";
$tdataAll[".allSearchFields"][] = "# Minimum";
$tdataAll[".allSearchFields"][] = "Last Name";
$tdataAll[".allSearchFields"][] = "First Name";

$tdataAll[".googleLikeFields"][] = "ID";
$tdataAll[".googleLikeFields"][] = "Name";
$tdataAll[".googleLikeFields"][] = "Start Date";
$tdataAll[".googleLikeFields"][] = "Budget Year";
$tdataAll[".googleLikeFields"][] = "Active";
$tdataAll[".googleLikeFields"][] = "YTD Revenue";
$tdataAll[".googleLikeFields"][] = "Last Year Rev";
$tdataAll[".googleLikeFields"][] = "Prior Year Rev";
$tdataAll[".googleLikeFields"][] = "Last Year Rank";
$tdataAll[".googleLikeFields"][] = "YTD+Last";
$tdataAll[".googleLikeFields"][] = "YTD+Last+Prior";
$tdataAll[".googleLikeFields"][] = "YTD Closing";
$tdataAll[".googleLikeFields"][] = "Last Year Closing";
$tdataAll[".googleLikeFields"][] = "YTD IBC";
$tdataAll[".googleLikeFields"][] = "YTD Engagements";
$tdataAll[".googleLikeFields"][] = "Total Current Engagments";
$tdataAll[".googleLikeFields"][] = "# Wheelhouse";
$tdataAll[".googleLikeFields"][] = "# Speculative";
$tdataAll[".googleLikeFields"][] = "# Minimum";
$tdataAll[".googleLikeFields"][] = "Last Name";
$tdataAll[".googleLikeFields"][] = "First Name";


$tdataAll[".advSearchFields"][] = "ID";
$tdataAll[".advSearchFields"][] = "Name";
$tdataAll[".advSearchFields"][] = "Start Date";
$tdataAll[".advSearchFields"][] = "Budget Year";
$tdataAll[".advSearchFields"][] = "Active";
$tdataAll[".advSearchFields"][] = "YTD Revenue";
$tdataAll[".advSearchFields"][] = "Last Year Rev";
$tdataAll[".advSearchFields"][] = "Prior Year Rev";
$tdataAll[".advSearchFields"][] = "Last Year Rank";
$tdataAll[".advSearchFields"][] = "YTD+Last";
$tdataAll[".advSearchFields"][] = "YTD+Last+Prior";
$tdataAll[".advSearchFields"][] = "YTD Closing";
$tdataAll[".advSearchFields"][] = "Last Year Closing";
$tdataAll[".advSearchFields"][] = "YTD IBC";
$tdataAll[".advSearchFields"][] = "YTD Engagements";
$tdataAll[".advSearchFields"][] = "Total Current Engagments";
$tdataAll[".advSearchFields"][] = "# Wheelhouse";
$tdataAll[".advSearchFields"][] = "# Speculative";
$tdataAll[".advSearchFields"][] = "# Minimum";
$tdataAll[".advSearchFields"][] = "Last Name";
$tdataAll[".advSearchFields"][] = "First Name";

$tdataAll[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataAll[".strOrderBy"] = $tstrOrderBy;

$tdataAll[".orderindexes"] = array();

$tdataAll[".sqlHead"] = "SELECT ID,  Name,  `Start Date`,  `Budget Year`,  Active,  `YTD Revenue`,  `Last Year Rev`,  `Prior Year Rev`,  `Last Year Rank`,  `YTD+Last`,  `YTD+Last+Prior`,  `YTD Closing`,  `Last Year Closing`,  `YTD IBC`,  `YTD Engagements`,  `Total Current Engagments`,  `# Wheelhouse`,  `# Speculative`,  `# Minimum`,  `Last Name`,  `First Name`";
$tdataAll[".sqlFrom"] = "FROM bankers";
$tdataAll[".sqlWhereExpr"] = "";
$tdataAll[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataAll[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataAll[".arrGroupsPerPage"] = $arrGPP;

$tableKeysAll = array();
$tdataAll[".Keys"] = $tableKeysAll;

$tdataAll[".listFields"] = array();
$tdataAll[".listFields"][] = "ID";
$tdataAll[".listFields"][] = "Name";
$tdataAll[".listFields"][] = "Start Date";
$tdataAll[".listFields"][] = "Budget Year";
$tdataAll[".listFields"][] = "Active";
$tdataAll[".listFields"][] = "YTD Revenue";
$tdataAll[".listFields"][] = "Last Year Rev";
$tdataAll[".listFields"][] = "Prior Year Rev";
$tdataAll[".listFields"][] = "Last Year Rank";
$tdataAll[".listFields"][] = "YTD+Last";
$tdataAll[".listFields"][] = "YTD+Last+Prior";
$tdataAll[".listFields"][] = "YTD Closing";
$tdataAll[".listFields"][] = "Last Year Closing";
$tdataAll[".listFields"][] = "YTD IBC";
$tdataAll[".listFields"][] = "YTD Engagements";
$tdataAll[".listFields"][] = "Total Current Engagments";
$tdataAll[".listFields"][] = "# Wheelhouse";
$tdataAll[".listFields"][] = "# Speculative";
$tdataAll[".listFields"][] = "# Minimum";
$tdataAll[".listFields"][] = "Last Name";
$tdataAll[".listFields"][] = "First Name";

$tdataAll[".viewFields"] = array();
$tdataAll[".viewFields"][] = "ID";
$tdataAll[".viewFields"][] = "Name";
$tdataAll[".viewFields"][] = "Start Date";
$tdataAll[".viewFields"][] = "Budget Year";
$tdataAll[".viewFields"][] = "Active";
$tdataAll[".viewFields"][] = "YTD Revenue";
$tdataAll[".viewFields"][] = "Last Year Rev";
$tdataAll[".viewFields"][] = "Prior Year Rev";
$tdataAll[".viewFields"][] = "Last Year Rank";
$tdataAll[".viewFields"][] = "YTD+Last";
$tdataAll[".viewFields"][] = "YTD+Last+Prior";
$tdataAll[".viewFields"][] = "YTD Closing";
$tdataAll[".viewFields"][] = "Last Year Closing";
$tdataAll[".viewFields"][] = "YTD IBC";
$tdataAll[".viewFields"][] = "YTD Engagements";
$tdataAll[".viewFields"][] = "Total Current Engagments";
$tdataAll[".viewFields"][] = "# Wheelhouse";
$tdataAll[".viewFields"][] = "# Speculative";
$tdataAll[".viewFields"][] = "# Minimum";
$tdataAll[".viewFields"][] = "Last Name";
$tdataAll[".viewFields"][] = "First Name";

$tdataAll[".addFields"] = array();
$tdataAll[".addFields"][] = "ID";
$tdataAll[".addFields"][] = "Name";
$tdataAll[".addFields"][] = "Start Date";
$tdataAll[".addFields"][] = "Budget Year";
$tdataAll[".addFields"][] = "Active";
$tdataAll[".addFields"][] = "YTD Revenue";
$tdataAll[".addFields"][] = "Last Year Rev";
$tdataAll[".addFields"][] = "Prior Year Rev";
$tdataAll[".addFields"][] = "Last Year Rank";
$tdataAll[".addFields"][] = "YTD+Last";
$tdataAll[".addFields"][] = "YTD+Last+Prior";
$tdataAll[".addFields"][] = "YTD Closing";
$tdataAll[".addFields"][] = "Last Year Closing";
$tdataAll[".addFields"][] = "YTD IBC";
$tdataAll[".addFields"][] = "YTD Engagements";
$tdataAll[".addFields"][] = "Total Current Engagments";
$tdataAll[".addFields"][] = "# Wheelhouse";
$tdataAll[".addFields"][] = "# Speculative";
$tdataAll[".addFields"][] = "# Minimum";
$tdataAll[".addFields"][] = "Last Name";
$tdataAll[".addFields"][] = "First Name";

$tdataAll[".inlineAddFields"] = array();
$tdataAll[".inlineAddFields"][] = "ID";
$tdataAll[".inlineAddFields"][] = "Name";
$tdataAll[".inlineAddFields"][] = "Start Date";
$tdataAll[".inlineAddFields"][] = "Budget Year";
$tdataAll[".inlineAddFields"][] = "Active";
$tdataAll[".inlineAddFields"][] = "YTD Revenue";
$tdataAll[".inlineAddFields"][] = "Last Year Rev";
$tdataAll[".inlineAddFields"][] = "Prior Year Rev";
$tdataAll[".inlineAddFields"][] = "Last Year Rank";
$tdataAll[".inlineAddFields"][] = "YTD+Last";
$tdataAll[".inlineAddFields"][] = "YTD+Last+Prior";
$tdataAll[".inlineAddFields"][] = "YTD Closing";
$tdataAll[".inlineAddFields"][] = "Last Year Closing";
$tdataAll[".inlineAddFields"][] = "YTD IBC";
$tdataAll[".inlineAddFields"][] = "YTD Engagements";
$tdataAll[".inlineAddFields"][] = "Total Current Engagments";
$tdataAll[".inlineAddFields"][] = "# Wheelhouse";
$tdataAll[".inlineAddFields"][] = "# Speculative";
$tdataAll[".inlineAddFields"][] = "# Minimum";
$tdataAll[".inlineAddFields"][] = "Last Name";
$tdataAll[".inlineAddFields"][] = "First Name";

$tdataAll[".editFields"] = array();
$tdataAll[".editFields"][] = "ID";
$tdataAll[".editFields"][] = "Name";
$tdataAll[".editFields"][] = "Start Date";
$tdataAll[".editFields"][] = "Budget Year";
$tdataAll[".editFields"][] = "Active";
$tdataAll[".editFields"][] = "YTD Revenue";
$tdataAll[".editFields"][] = "Last Year Rev";
$tdataAll[".editFields"][] = "Prior Year Rev";
$tdataAll[".editFields"][] = "Last Year Rank";
$tdataAll[".editFields"][] = "YTD+Last";
$tdataAll[".editFields"][] = "YTD+Last+Prior";
$tdataAll[".editFields"][] = "YTD Closing";
$tdataAll[".editFields"][] = "Last Year Closing";
$tdataAll[".editFields"][] = "YTD IBC";
$tdataAll[".editFields"][] = "YTD Engagements";
$tdataAll[".editFields"][] = "Total Current Engagments";
$tdataAll[".editFields"][] = "# Wheelhouse";
$tdataAll[".editFields"][] = "# Speculative";
$tdataAll[".editFields"][] = "# Minimum";
$tdataAll[".editFields"][] = "Last Name";
$tdataAll[".editFields"][] = "First Name";

$tdataAll[".inlineEditFields"] = array();
$tdataAll[".inlineEditFields"][] = "ID";
$tdataAll[".inlineEditFields"][] = "Name";
$tdataAll[".inlineEditFields"][] = "Start Date";
$tdataAll[".inlineEditFields"][] = "Budget Year";
$tdataAll[".inlineEditFields"][] = "Active";
$tdataAll[".inlineEditFields"][] = "YTD Revenue";
$tdataAll[".inlineEditFields"][] = "Last Year Rev";
$tdataAll[".inlineEditFields"][] = "Prior Year Rev";
$tdataAll[".inlineEditFields"][] = "Last Year Rank";
$tdataAll[".inlineEditFields"][] = "YTD+Last";
$tdataAll[".inlineEditFields"][] = "YTD+Last+Prior";
$tdataAll[".inlineEditFields"][] = "YTD Closing";
$tdataAll[".inlineEditFields"][] = "Last Year Closing";
$tdataAll[".inlineEditFields"][] = "YTD IBC";
$tdataAll[".inlineEditFields"][] = "YTD Engagements";
$tdataAll[".inlineEditFields"][] = "Total Current Engagments";
$tdataAll[".inlineEditFields"][] = "# Wheelhouse";
$tdataAll[".inlineEditFields"][] = "# Speculative";
$tdataAll[".inlineEditFields"][] = "# Minimum";
$tdataAll[".inlineEditFields"][] = "Last Name";
$tdataAll[".inlineEditFields"][] = "First Name";

$tdataAll[".exportFields"] = array();
$tdataAll[".exportFields"][] = "ID";
$tdataAll[".exportFields"][] = "Name";
$tdataAll[".exportFields"][] = "Start Date";
$tdataAll[".exportFields"][] = "Budget Year";
$tdataAll[".exportFields"][] = "Active";
$tdataAll[".exportFields"][] = "YTD Revenue";
$tdataAll[".exportFields"][] = "Last Year Rev";
$tdataAll[".exportFields"][] = "Prior Year Rev";
$tdataAll[".exportFields"][] = "Last Year Rank";
$tdataAll[".exportFields"][] = "YTD+Last";
$tdataAll[".exportFields"][] = "YTD+Last+Prior";
$tdataAll[".exportFields"][] = "YTD Closing";
$tdataAll[".exportFields"][] = "Last Year Closing";
$tdataAll[".exportFields"][] = "YTD IBC";
$tdataAll[".exportFields"][] = "YTD Engagements";
$tdataAll[".exportFields"][] = "Total Current Engagments";
$tdataAll[".exportFields"][] = "# Wheelhouse";
$tdataAll[".exportFields"][] = "# Speculative";
$tdataAll[".exportFields"][] = "# Minimum";
$tdataAll[".exportFields"][] = "Last Name";
$tdataAll[".exportFields"][] = "First Name";

$tdataAll[".printFields"] = array();
$tdataAll[".printFields"][] = "ID";
$tdataAll[".printFields"][] = "Name";
$tdataAll[".printFields"][] = "Start Date";
$tdataAll[".printFields"][] = "Budget Year";
$tdataAll[".printFields"][] = "Active";
$tdataAll[".printFields"][] = "YTD Revenue";
$tdataAll[".printFields"][] = "Last Year Rev";
$tdataAll[".printFields"][] = "Prior Year Rev";
$tdataAll[".printFields"][] = "Last Year Rank";
$tdataAll[".printFields"][] = "YTD+Last";
$tdataAll[".printFields"][] = "YTD+Last+Prior";
$tdataAll[".printFields"][] = "YTD Closing";
$tdataAll[".printFields"][] = "Last Year Closing";
$tdataAll[".printFields"][] = "YTD IBC";
$tdataAll[".printFields"][] = "YTD Engagements";
$tdataAll[".printFields"][] = "Total Current Engagments";
$tdataAll[".printFields"][] = "# Wheelhouse";
$tdataAll[".printFields"][] = "# Speculative";
$tdataAll[".printFields"][] = "# Minimum";
$tdataAll[".printFields"][] = "Last Name";
$tdataAll[".printFields"][] = "First Name";

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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
		
		
				
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
	
		
		
	$tdataAll["ID"] = $fdata;
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
	
		
		
	$tdataAll["Name"] = $fdata;
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
	
		
		
	$tdataAll["Start Date"] = $fdata;
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
	
		
		
	$tdataAll["Budget Year"] = $fdata;
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
	
		
		
	$tdataAll["Active"] = $fdata;
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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Revenue"; 
		$fdata["FullName"] = "`YTD Revenue`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD Revenue"] = $fdata;
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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Rev"; 
		$fdata["FullName"] = "`Last Year Rev`";
	
		
		
				
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
	
		
		
	$tdataAll["Last Year Rev"] = $fdata;
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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Prior Year Rev"; 
		$fdata["FullName"] = "`Prior Year Rev`";
	
		
		
				
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
	
		
		
	$tdataAll["Prior Year Rev"] = $fdata;
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
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Rank"; 
		$fdata["FullName"] = "`Last Year Rank`";
	
		
		
				
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
	
		
		
	$tdataAll["Last Year Rank"] = $fdata;
//	YTD+Last
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "YTD+Last";
	$fdata["GoodName"] = "YTD_Last";
	$fdata["ownerTable"] = "bankers";
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
		$fdata["FullName"] = "`YTD+Last`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD+Last"] = $fdata;
//	YTD+Last+Prior
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "YTD+Last+Prior";
	$fdata["GoodName"] = "YTD_Last_Prior";
	$fdata["ownerTable"] = "bankers";
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
		$fdata["FullName"] = "`YTD+Last+Prior`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD+Last+Prior"] = $fdata;
//	YTD Closing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "YTD Closing";
	$fdata["GoodName"] = "YTD_Closing";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Closing"; 
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
	
		$fdata["strField"] = "YTD Closing"; 
		$fdata["FullName"] = "`YTD Closing`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD Closing"] = $fdata;
//	Last Year Closing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Last Year Closing";
	$fdata["GoodName"] = "Last_Year_Closing";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Last Year Closing"; 
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
	
		$fdata["strField"] = "Last Year Closing"; 
		$fdata["FullName"] = "`Last Year Closing`";
	
		
		
				
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
	
		
		
	$tdataAll["Last Year Closing"] = $fdata;
//	YTD IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "YTD IBC";
	$fdata["GoodName"] = "YTD_IBC";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD IBC"; 
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
	
		$fdata["strField"] = "YTD IBC"; 
		$fdata["FullName"] = "`YTD IBC`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD IBC"] = $fdata;
//	YTD Engagements
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "YTD Engagements";
	$fdata["GoodName"] = "YTD_Engagements";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "YTD Engagements"; 
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
	
		$fdata["strField"] = "YTD Engagements"; 
		$fdata["FullName"] = "`YTD Engagements`";
	
		
		
				
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
	
		
		
	$tdataAll["YTD Engagements"] = $fdata;
//	Total Current Engagments
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "Total Current Engagments";
	$fdata["GoodName"] = "Total_Current_Engagments";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Total Current Engagments"; 
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
	
		$fdata["strField"] = "Total Current Engagments"; 
		$fdata["FullName"] = "`Total Current Engagments`";
	
		
		
				
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
	
		
		
	$tdataAll["Total Current Engagments"] = $fdata;
//	# Wheelhouse
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "# Wheelhouse";
	$fdata["GoodName"] = "__Wheelhouse";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Wheelhouse"; 
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
	
		$fdata["strField"] = "# Wheelhouse"; 
		$fdata["FullName"] = "`# Wheelhouse`";
	
		
		
				
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
	
		
		
	$tdataAll["# Wheelhouse"] = $fdata;
//	# Speculative
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "# Speculative";
	$fdata["GoodName"] = "__Speculative";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Speculative"; 
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
	
		$fdata["strField"] = "# Speculative"; 
		$fdata["FullName"] = "`# Speculative`";
	
		
		
				
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
	
		
		
	$tdataAll["# Speculative"] = $fdata;
//	# Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "# Minimum";
	$fdata["GoodName"] = "__Minimum";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "# Minimum"; 
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
	
		$fdata["strField"] = "# Minimum"; 
		$fdata["FullName"] = "`# Minimum`";
	
		
		
				
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
	
		
		
	$tdataAll["# Minimum"] = $fdata;
//	Last Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
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
	
		
		
	$tdataAll["Last Name"] = $fdata;
//	First Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
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
	
		
		
	$tdataAll["First Name"] = $fdata;

	
$tables_data["All"]=&$tdataAll;
$field_labels["All"] = &$fieldLabelsAll;
$fieldToolTips["All"] = &$fieldToolTipsAll;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["All"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["All"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_All()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  Name,  `Start Date`,  `Budget Year`,  Active,  `YTD Revenue`,  `Last Year Rev`,  `Prior Year Rev`,  `Last Year Rank`,  `YTD+Last`,  `YTD+Last+Prior`,  `YTD Closing`,  `Last Year Closing`,  `YTD IBC`,  `YTD Engagements`,  `Total Current Engagments`,  `# Wheelhouse`,  `# Speculative`,  `# Minimum`,  `Last Name`,  `First Name`";
$proto0["m_strFrom"] = "FROM bankers";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
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
			$obj = new SQLField(array(
	"m_strName" => "YTD+Last",
	"m_strTable" => "bankers"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD+Last+Prior",
	"m_strTable" => "bankers"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Closing",
	"m_strTable" => "bankers"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Year Closing",
	"m_strTable" => "bankers"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD IBC",
	"m_strTable" => "bankers"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Engagements",
	"m_strTable" => "bankers"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "Total Current Engagments",
	"m_strTable" => "bankers"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "# Wheelhouse",
	"m_strTable" => "bankers"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "# Speculative",
	"m_strTable" => "bankers"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "# Minimum",
	"m_strTable" => "bankers"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Name",
	"m_strTable" => "bankers"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "First Name",
	"m_strTable" => "bankers"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto47=array();
$proto47["m_link"] = "SQLL_MAIN";
			$proto48=array();
$proto48["m_strName"] = "bankers";
$proto48["m_columns"] = array();
$proto48["m_columns"][] = "ID";
$proto48["m_columns"][] = "Name";
$proto48["m_columns"][] = "Start Date";
$proto48["m_columns"][] = "Budget Year";
$proto48["m_columns"][] = "Active";
$proto48["m_columns"][] = "YTD Revenue";
$proto48["m_columns"][] = "Last Year Rev";
$proto48["m_columns"][] = "Prior Year Rev";
$proto48["m_columns"][] = "Last Year Rank";
$proto48["m_columns"][] = "YTD+Last";
$proto48["m_columns"][] = "YTD+Last+Prior";
$proto48["m_columns"][] = "YTD Closing";
$proto48["m_columns"][] = "Last Year Closing";
$proto48["m_columns"][] = "YTD IBC";
$proto48["m_columns"][] = "YTD Engagements";
$proto48["m_columns"][] = "Total Current Engagments";
$proto48["m_columns"][] = "# Wheelhouse";
$proto48["m_columns"][] = "# Speculative";
$proto48["m_columns"][] = "# Minimum";
$proto48["m_columns"][] = "Last Name";
$proto48["m_columns"][] = "First Name";
$obj = new SQLTable($proto48);

$proto47["m_table"] = $obj;
$proto47["m_alias"] = "";
$proto49=array();
$proto49["m_sql"] = "";
$proto49["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto49["m_column"]=$obj;
$proto49["m_contained"] = array();
$proto49["m_strCase"] = "";
$proto49["m_havingmode"] = "0";
$proto49["m_inBrackets"] = "0";
$proto49["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto49);

$proto47["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto47);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_All = createSqlQuery_All();
																					$tdataAll[".sqlquery"] = $queryData_All;
	
if(isset($tdataAll["field2"])){
	$tdataAll["field2"]["LookupTable"] = "carscars_view";
	$tdataAll["field2"]["LookupOrderBy"] = "name";
	$tdataAll["field2"]["LookupType"] = 4;
	$tdataAll["field2"]["LinkField"] = "email";
	$tdataAll["field2"]["DisplayField"] = "name";
	$tdataAll[".hasCustomViewField"] = true;
}

$tableEvents["All"] = new eventsBase;
$tdataAll[".hasEvents"] = false;

$cipherer = new RunnerCipherer("All");

?>