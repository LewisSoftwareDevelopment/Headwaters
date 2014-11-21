<?php
require_once(getabspath("classes/cipherer.php"));
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value = array();
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".NumberOfChars"] = 80; 
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".ShortName"] = "Live_Sell_Side_Engagements_by_Enterprise_Value";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".OwnerID"] = "";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".OriginalTable"] = "company";

//	field labels
$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"] = array();
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"] = array();
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Company"] = "Company";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Company"] = "";
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Project_Name"] = "Project Name";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Project Name"] = "";
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Status"] = "Status";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Status"] = "";
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Deal Type"] = "";
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Projected Transaction Size"] = "";
	$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Vertical"] = "Vertical";
	$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]["Vertical"] = "";
	if (count($fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value["English"]))
		$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".isUseToolTips"] = true;
}
	
	
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".NCSearch"] = true;



$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".shortTableName"] = "Live_Sell_Side_Engagements_by_Enterprise_Value";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".nSecOptions"] = 0;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".recsPerRowList"] = 1;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".mainTableOwnerID"] = "";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".moveNext"] = 1;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".nType"] = 2;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".strOriginalTableName"] = "company";




$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".showAddInPopup"] = false;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".showEditInPopup"] = false;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".showViewInPopup"] = false;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".fieldsForRegister"] = array();

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listAjax"] = false;

	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".audit"] = false;

	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".locking"] = false;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listIcons"] = true;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".edit"] = true;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEdit"] = true;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAdd"] = true;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".view"] = true;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportTo"] = true;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFriendly"] = true;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".delete"] = true;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".showSimpleSearchOptions"] = false;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".showSearchPanel"] = true;

if (isMobile())
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".isUseAjaxSuggest"] = false;
else 
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addPageEvents"] = false;

// use timepicker for search panel
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".isUseTimeForSearch"] = false;




$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"] = array();

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".allSearchFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".googleLikeFields"][] = "Vertical";


$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".advSearchFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY `Projected Transaction Size` DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".strOrderBy"] = $tstrOrderBy;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".orderindexes"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".orderindexes"][] = array(4, (0 ? "ASC" : "DESC"), "`Projected Transaction Size`");

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".sqlHead"] = "SELECT Company,  `Project Name`,  Status,  `Projected Transaction Size`,  `Deal Type`,  Industry AS Vertical";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".sqlFrom"] = "FROM company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".sqlWhereExpr"] = "(`Deal Type` = 'M&A - Sell-side') AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".arrGroupsPerPage"] = $arrGPP;

$tableKeysLive_Sell_Side_Engagements_by_Enterprise_Value = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".Keys"] = $tableKeysLive_Sell_Side_Engagements_by_Enterprise_Value;

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".listFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".viewFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".addFields"][] = "Deal Type";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineAddFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".editFields"][] = "Deal Type";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".inlineEditFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".exportFields"][] = "Vertical";

$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"] = array();
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Company";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Project Name";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Status";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Projected Transaction Size";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Deal Type";
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".printFields"][] = "Vertical";

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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Company"] = $fdata;
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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Project Name"] = $fdata;
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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Status"] = $fdata;
//	Projected Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Projected Transaction Size";
	$fdata["GoodName"] = "Projected_Transaction_Size";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Projected Transaction Size"; 
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
	
		$fdata["strField"] = "Projected Transaction Size"; 
		$fdata["FullName"] = "`Projected Transaction Size`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 0;
	
		
		
		
		
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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Projected Transaction Size"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Deal Type"] = $fdata;
//	Vertical
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Vertical";
	$fdata["GoodName"] = "Vertical";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Vertical"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Industry"; 
		$fdata["FullName"] = "Industry";
	
		
		
				
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
	
		
		
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["Vertical"] = $fdata;

	
$tables_data["Live Sell-Side Engagements by Enterprise Value"]=&$tdataLive_Sell_Side_Engagements_by_Enterprise_Value;
$field_labels["Live_Sell_Side_Engagements_by_Enterprise_Value"] = &$fieldLabelsLive_Sell_Side_Engagements_by_Enterprise_Value;
$fieldToolTips["Live Sell-Side Engagements by Enterprise Value"] = &$fieldToolTipsLive_Sell_Side_Engagements_by_Enterprise_Value;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Live Sell-Side Engagements by Enterprise Value"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Live Sell-Side Engagements by Enterprise Value"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Live_Sell_Side_Engagements_by_Enterprise_Value()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Project Name`,  Status,  `Projected Transaction Size`,  `Deal Type`,  Industry AS Vertical";
$proto0["m_strFrom"] = "FROM company";
$proto0["m_strWhere"] = "(`Deal Type` = 'M&A - Sell-side') AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto0["m_strOrderBy"] = "ORDER BY `Projected Transaction Size` DESC";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(`Deal Type` = 'M&A - Sell-side') AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(`Deal Type` = 'M&A - Sell-side') AND (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "`Deal Type` = 'M&A - Sell-side'";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "= 'M&A - Sell-side'";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "1";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

			$proto1["m_contained"][]=$obj;
						$proto5=array();
$proto5["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto5["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto5["m_column"]=$obj;
$proto5["m_contained"] = array();
						$proto7=array();
$proto7["m_sql"] = "Status = 'on hold'";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "= 'on hold'";
$proto7["m_havingmode"] = "0";
$proto7["m_inBrackets"] = "0";
$proto7["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto7);

			$proto5["m_contained"][]=$obj;
						$proto9=array();
$proto9["m_sql"] = "Status = 'in market'";
$proto9["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto9["m_column"]=$obj;
$proto9["m_contained"] = array();
$proto9["m_strCase"] = "= 'in market'";
$proto9["m_havingmode"] = "0";
$proto9["m_inBrackets"] = "0";
$proto9["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto9);

			$proto5["m_contained"][]=$obj;
						$proto11=array();
$proto11["m_sql"] = "Status = 'pre market'";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "= 'pre market'";
$proto11["m_havingmode"] = "0";
$proto11["m_inBrackets"] = "0";
$proto11["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto11);

			$proto5["m_contained"][]=$obj;
						$proto13=array();
$proto13["m_sql"] = "Status = 'under loi'";
$proto13["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
$proto13["m_strCase"] = "= 'under loi'";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "0";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

			$proto5["m_contained"][]=$obj;
						$proto15=array();
$proto15["m_sql"] = "Status = 'inactive'";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "= 'inactive'";
$proto15["m_havingmode"] = "0";
$proto15["m_inBrackets"] = "0";
$proto15["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto15);

			$proto5["m_contained"][]=$obj;
$proto5["m_strCase"] = "";
$proto5["m_havingmode"] = "0";
$proto5["m_inBrackets"] = "1";
$proto5["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto5);

			$proto1["m_contained"][]=$obj;
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Project Name",
	"m_strTable" => "company"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Industry",
	"m_strTable" => "company"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "Vertical";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "company";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "ID";
$proto32["m_columns"][] = "Company";
$proto32["m_columns"][] = "Deal Slot";
$proto32["m_columns"][] = "IBC Date";
$proto32["m_columns"][] = "EL Date";
$proto32["m_columns"][] = "Project Name";
$proto32["m_columns"][] = "Status";
$proto32["m_columns"][] = "Deal Type";
$proto32["m_columns"][] = "Projected Fee";
$proto32["m_columns"][] = "Projected Transaction Size";
$proto32["m_columns"][] = "Est. Close Date";
$proto32["m_columns"][] = "Primary Banker";
$proto32["m_columns"][] = "Practice Area";
$proto32["m_columns"][] = "Ownership Class";
$proto32["m_columns"][] = "Industry";
$proto32["m_columns"][] = "Referral Type";
$proto32["m_columns"][] = "Referral Source-Company";
$proto32["m_columns"][] = "Referral Scource-Ind.";
$proto32["m_columns"][] = "Description";
$proto32["m_columns"][] = "Dead Date";
$proto32["m_columns"][] = "EL Expiration Date";
$proto32["m_columns"][] = "Engagment Fee";
$proto32["m_columns"][] = "Fee Minimum";
$proto32["m_columns"][] = "Final Total Sucess Fee";
$proto32["m_columns"][] = "Final Transaction Size";
$proto32["m_columns"][] = "Monthly Retainer";
$proto32["m_columns"][] = "Closed Date";
$proto32["m_columns"][] = "Team Split-1";
$proto32["m_columns"][] = "Team-1";
$proto32["m_columns"][] = "Team Split-2";
$proto32["m_columns"][] = "Team-2";
$proto32["m_columns"][] = "Team Split-3";
$proto32["m_columns"][] = "Team Split-4";
$proto32["m_columns"][] = "Team Split-5";
$proto32["m_columns"][] = "Team Split-6";
$proto32["m_columns"][] = "Team-3";
$proto32["m_columns"][] = "Team-4";
$proto32["m_columns"][] = "Team-5";
$proto32["m_columns"][] = "Team-6";
$proto32["m_columns"][] = "Fee Split-1";
$proto32["m_columns"][] = "Fee Split-2";
$proto32["m_columns"][] = "Fee Split-3";
$proto32["m_columns"][] = "Fee Split-4";
$proto32["m_columns"][] = "Fee Split-5";
$proto32["m_columns"][] = "Fee Split-6";
$proto32["m_columns"][] = "Fee To-1";
$proto32["m_columns"][] = "Fee To-2";
$proto32["m_columns"][] = "Fee To-3";
$proto32["m_columns"][] = "Fee To-4";
$proto32["m_columns"][] = "Fee To-5";
$proto32["m_columns"][] = "Fee To-6";
$proto32["m_columns"][] = "Enterpise Value";
$proto32["m_columns"][] = "Fee Details";
$proto32["m_columns"][] = "Split to Corporate";
$proto32["m_columns"][] = "Paul";
$proto32["m_columns"][] = "McBroom";
$proto32["m_columns"][] = "Month of Close";
$proto32["m_columns"][] = "Gross This";
$proto32["m_columns"][] = "Gross Next";
$proto32["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto32);

$proto31["m_table"] = $obj;
$proto31["m_alias"] = "";
$proto33=array();
$proto33["m_sql"] = "";
$proto33["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto33["m_column"]=$obj;
$proto33["m_contained"] = array();
$proto33["m_strCase"] = "";
$proto33["m_havingmode"] = "0";
$proto33["m_inBrackets"] = "0";
$proto33["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto33);

$proto31["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto31);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto35=array();
						$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto35["m_column"]=$obj;
$proto35["m_bAsc"] = 0;
$proto35["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto35);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Live_Sell_Side_Engagements_by_Enterprise_Value = createSqlQuery_Live_Sell_Side_Engagements_by_Enterprise_Value();
						$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".sqlquery"] = $queryData_Live_Sell_Side_Engagements_by_Enterprise_Value;
	
if(isset($tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"])){
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"]["LookupTable"] = "carscars_view";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"]["LookupOrderBy"] = "name";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"]["LookupType"] = 4;
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"]["LinkField"] = "email";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value["field2"]["DisplayField"] = "name";
	$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".hasCustomViewField"] = true;
}

$tableEvents["Live Sell-Side Engagements by Enterprise Value"] = new eventsBase;
$tdataLive_Sell_Side_Engagements_by_Enterprise_Value[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Live Sell-Side Engagements by Enterprise Value");

?>