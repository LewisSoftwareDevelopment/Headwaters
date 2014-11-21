<?php
require_once(getabspath("classes/cipherer.php"));
$tdataellive = array();
	$tdataellive[".NumberOfChars"] = 80; 
	$tdataellive[".ShortName"] = "ellive";
	$tdataellive[".OwnerID"] = "";
	$tdataellive[".OriginalTable"] = "ellive";

//	field labels
$fieldLabelsellive = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsellive["English"] = array();
	$fieldToolTipsellive["English"] = array();
	$fieldLabelsellive["English"]["ID"] = "ID";
	$fieldToolTipsellive["English"]["ID"] = "";
	$fieldLabelsellive["English"]["Jan"] = "Jan";
	$fieldToolTipsellive["English"]["Jan"] = "";
	$fieldLabelsellive["English"]["Feb"] = "Feb";
	$fieldToolTipsellive["English"]["Feb"] = "";
	$fieldLabelsellive["English"]["Mar"] = "Mar";
	$fieldToolTipsellive["English"]["Mar"] = "";
	$fieldLabelsellive["English"]["April"] = "April";
	$fieldToolTipsellive["English"]["April"] = "";
	$fieldLabelsellive["English"]["May"] = "May";
	$fieldToolTipsellive["English"]["May"] = "";
	$fieldLabelsellive["English"]["June"] = "June";
	$fieldToolTipsellive["English"]["June"] = "";
	$fieldLabelsellive["English"]["July"] = "July";
	$fieldToolTipsellive["English"]["July"] = "";
	$fieldLabelsellive["English"]["Aug"] = "Aug";
	$fieldToolTipsellive["English"]["Aug"] = "";
	$fieldLabelsellive["English"]["Sep"] = "Sep";
	$fieldToolTipsellive["English"]["Sep"] = "";
	$fieldLabelsellive["English"]["Oct"] = "Oct";
	$fieldToolTipsellive["English"]["Oct"] = "";
	$fieldLabelsellive["English"]["Nov"] = "Nov";
	$fieldToolTipsellive["English"]["Nov"] = "";
	$fieldLabelsellive["English"]["Dec"] = "Dec";
	$fieldToolTipsellive["English"]["Dec"] = "";
	if (count($fieldToolTipsellive["English"]))
		$tdataellive[".isUseToolTips"] = true;
}
	
	
	$tdataellive[".NCSearch"] = true;



$tdataellive[".shortTableName"] = "ellive";
$tdataellive[".nSecOptions"] = 0;
$tdataellive[".recsPerRowList"] = 1;
$tdataellive[".mainTableOwnerID"] = "";
$tdataellive[".moveNext"] = 1;
$tdataellive[".nType"] = 0;

$tdataellive[".strOriginalTableName"] = "ellive";




$tdataellive[".showAddInPopup"] = false;

$tdataellive[".showEditInPopup"] = false;

$tdataellive[".showViewInPopup"] = false;

$tdataellive[".fieldsForRegister"] = array();

$tdataellive[".listAjax"] = false;

	$tdataellive[".audit"] = false;

	$tdataellive[".locking"] = false;

$tdataellive[".listIcons"] = true;
$tdataellive[".edit"] = true;
$tdataellive[".inlineEdit"] = true;
$tdataellive[".view"] = true;

$tdataellive[".exportTo"] = true;



$tdataellive[".showSimpleSearchOptions"] = false;

$tdataellive[".showSearchPanel"] = true;

if (isMobile())
	$tdataellive[".isUseAjaxSuggest"] = false;
else 
	$tdataellive[".isUseAjaxSuggest"] = true;

$tdataellive[".rowHighlite"] = true;

// button handlers file names

$tdataellive[".addPageEvents"] = false;

// use timepicker for search panel
$tdataellive[".isUseTimeForSearch"] = false;




$tdataellive[".allSearchFields"] = array();

$tdataellive[".allSearchFields"][] = "ID";
$tdataellive[".allSearchFields"][] = "Jan";
$tdataellive[".allSearchFields"][] = "Feb";
$tdataellive[".allSearchFields"][] = "Mar";
$tdataellive[".allSearchFields"][] = "April";
$tdataellive[".allSearchFields"][] = "May";
$tdataellive[".allSearchFields"][] = "June";
$tdataellive[".allSearchFields"][] = "July";
$tdataellive[".allSearchFields"][] = "Aug";
$tdataellive[".allSearchFields"][] = "Sep";
$tdataellive[".allSearchFields"][] = "Oct";
$tdataellive[".allSearchFields"][] = "Nov";
$tdataellive[".allSearchFields"][] = "Dec";

$tdataellive[".googleLikeFields"][] = "ID";
$tdataellive[".googleLikeFields"][] = "Jan";
$tdataellive[".googleLikeFields"][] = "Feb";
$tdataellive[".googleLikeFields"][] = "Mar";
$tdataellive[".googleLikeFields"][] = "April";
$tdataellive[".googleLikeFields"][] = "May";
$tdataellive[".googleLikeFields"][] = "June";
$tdataellive[".googleLikeFields"][] = "July";
$tdataellive[".googleLikeFields"][] = "Aug";
$tdataellive[".googleLikeFields"][] = "Sep";
$tdataellive[".googleLikeFields"][] = "Oct";
$tdataellive[".googleLikeFields"][] = "Nov";
$tdataellive[".googleLikeFields"][] = "Dec";


$tdataellive[".advSearchFields"][] = "ID";
$tdataellive[".advSearchFields"][] = "Jan";
$tdataellive[".advSearchFields"][] = "Feb";
$tdataellive[".advSearchFields"][] = "Mar";
$tdataellive[".advSearchFields"][] = "April";
$tdataellive[".advSearchFields"][] = "May";
$tdataellive[".advSearchFields"][] = "June";
$tdataellive[".advSearchFields"][] = "July";
$tdataellive[".advSearchFields"][] = "Aug";
$tdataellive[".advSearchFields"][] = "Sep";
$tdataellive[".advSearchFields"][] = "Oct";
$tdataellive[".advSearchFields"][] = "Nov";
$tdataellive[".advSearchFields"][] = "Dec";

$tdataellive[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataellive[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataellive[".strOrderBy"] = $tstrOrderBy;

$tdataellive[".orderindexes"] = array();

$tdataellive[".sqlHead"] = "SELECT ID,  Jan,  Feb,  Mar,  April,  May,  June,  July,  Aug,  Sep,  Oct,  Nov,  `Dec`";
$tdataellive[".sqlFrom"] = "FROM ellive";
$tdataellive[".sqlWhereExpr"] = "";
$tdataellive[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataellive[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataellive[".arrGroupsPerPage"] = $arrGPP;

$tableKeysellive = array();
$tableKeysellive[] = "ID";
$tdataellive[".Keys"] = $tableKeysellive;

$tdataellive[".listFields"] = array();
$tdataellive[".listFields"][] = "ID";
$tdataellive[".listFields"][] = "Jan";
$tdataellive[".listFields"][] = "Feb";
$tdataellive[".listFields"][] = "Mar";
$tdataellive[".listFields"][] = "April";
$tdataellive[".listFields"][] = "May";
$tdataellive[".listFields"][] = "June";
$tdataellive[".listFields"][] = "July";
$tdataellive[".listFields"][] = "Aug";
$tdataellive[".listFields"][] = "Sep";
$tdataellive[".listFields"][] = "Oct";
$tdataellive[".listFields"][] = "Nov";
$tdataellive[".listFields"][] = "Dec";

$tdataellive[".viewFields"] = array();
$tdataellive[".viewFields"][] = "ID";
$tdataellive[".viewFields"][] = "Jan";
$tdataellive[".viewFields"][] = "Feb";
$tdataellive[".viewFields"][] = "Mar";
$tdataellive[".viewFields"][] = "April";
$tdataellive[".viewFields"][] = "May";
$tdataellive[".viewFields"][] = "June";
$tdataellive[".viewFields"][] = "July";
$tdataellive[".viewFields"][] = "Aug";
$tdataellive[".viewFields"][] = "Sep";
$tdataellive[".viewFields"][] = "Oct";
$tdataellive[".viewFields"][] = "Nov";
$tdataellive[".viewFields"][] = "Dec";

$tdataellive[".addFields"] = array();

$tdataellive[".inlineAddFields"] = array();

$tdataellive[".editFields"] = array();
$tdataellive[".editFields"][] = "Jan";
$tdataellive[".editFields"][] = "Feb";
$tdataellive[".editFields"][] = "Mar";
$tdataellive[".editFields"][] = "April";
$tdataellive[".editFields"][] = "May";
$tdataellive[".editFields"][] = "June";
$tdataellive[".editFields"][] = "July";
$tdataellive[".editFields"][] = "Aug";
$tdataellive[".editFields"][] = "Sep";
$tdataellive[".editFields"][] = "Oct";
$tdataellive[".editFields"][] = "Nov";
$tdataellive[".editFields"][] = "Dec";

$tdataellive[".inlineEditFields"] = array();
$tdataellive[".inlineEditFields"][] = "Jan";
$tdataellive[".inlineEditFields"][] = "Feb";
$tdataellive[".inlineEditFields"][] = "Mar";
$tdataellive[".inlineEditFields"][] = "April";
$tdataellive[".inlineEditFields"][] = "May";
$tdataellive[".inlineEditFields"][] = "June";
$tdataellive[".inlineEditFields"][] = "July";
$tdataellive[".inlineEditFields"][] = "Aug";
$tdataellive[".inlineEditFields"][] = "Sep";
$tdataellive[".inlineEditFields"][] = "Oct";
$tdataellive[".inlineEditFields"][] = "Nov";
$tdataellive[".inlineEditFields"][] = "Dec";

$tdataellive[".exportFields"] = array();
$tdataellive[".exportFields"][] = "ID";
$tdataellive[".exportFields"][] = "Jan";
$tdataellive[".exportFields"][] = "Feb";
$tdataellive[".exportFields"][] = "Mar";
$tdataellive[".exportFields"][] = "April";
$tdataellive[".exportFields"][] = "May";
$tdataellive[".exportFields"][] = "June";
$tdataellive[".exportFields"][] = "July";
$tdataellive[".exportFields"][] = "Aug";
$tdataellive[".exportFields"][] = "Sep";
$tdataellive[".exportFields"][] = "Oct";
$tdataellive[".exportFields"][] = "Nov";
$tdataellive[".exportFields"][] = "Dec";

$tdataellive[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
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
	
		
		
	$tdataellive["ID"] = $fdata;
//	Jan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Jan";
	$fdata["GoodName"] = "Jan";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Jan"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Jan"; 
		$fdata["FullName"] = "Jan";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Jan"] = $fdata;
//	Feb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Feb";
	$fdata["GoodName"] = "Feb";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Feb"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Feb"; 
		$fdata["FullName"] = "Feb";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Feb"] = $fdata;
//	Mar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Mar";
	$fdata["GoodName"] = "Mar";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Mar"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Mar"; 
		$fdata["FullName"] = "Mar";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Mar"] = $fdata;
//	April
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "April";
	$fdata["GoodName"] = "April";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "April"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "April"; 
		$fdata["FullName"] = "April";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["April"] = $fdata;
//	May
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "May";
	$fdata["GoodName"] = "May";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "May"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "May"; 
		$fdata["FullName"] = "May";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["May"] = $fdata;
//	June
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "June";
	$fdata["GoodName"] = "June";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "June"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "June"; 
		$fdata["FullName"] = "June";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["June"] = $fdata;
//	July
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "July";
	$fdata["GoodName"] = "July";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "July"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "July"; 
		$fdata["FullName"] = "July";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["July"] = $fdata;
//	Aug
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Aug";
	$fdata["GoodName"] = "Aug";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Aug"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Aug"; 
		$fdata["FullName"] = "Aug";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Aug"] = $fdata;
//	Sep
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Sep";
	$fdata["GoodName"] = "Sep";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Sep"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Sep"; 
		$fdata["FullName"] = "Sep";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Sep"] = $fdata;
//	Oct
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "Oct";
	$fdata["GoodName"] = "Oct";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Oct"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Oct"; 
		$fdata["FullName"] = "Oct";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Oct"] = $fdata;
//	Nov
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Nov";
	$fdata["GoodName"] = "Nov";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Nov"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Nov"; 
		$fdata["FullName"] = "Nov";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Nov"] = $fdata;
//	Dec
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Dec";
	$fdata["GoodName"] = "Dec";
	$fdata["ownerTable"] = "ellive";
	$fdata["Label"] = "Dec"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Dec"; 
		$fdata["FullName"] = "`Dec`";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataellive["Dec"] = $fdata;

	
$tables_data["ellive"]=&$tdataellive;
$field_labels["ellive"] = &$fieldLabelsellive;
$fieldToolTips["ellive"] = &$fieldToolTipsellive;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ellive"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["ellive"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_ellive()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  Jan,  Feb,  Mar,  April,  May,  June,  July,  Aug,  Sep,  Oct,  Nov,  `Dec`";
$proto0["m_strFrom"] = "FROM ellive";
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
	"m_strTable" => "ellive"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Jan",
	"m_strTable" => "ellive"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Feb",
	"m_strTable" => "ellive"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Mar",
	"m_strTable" => "ellive"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "April",
	"m_strTable" => "ellive"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "May",
	"m_strTable" => "ellive"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "June",
	"m_strTable" => "ellive"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "July",
	"m_strTable" => "ellive"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Aug",
	"m_strTable" => "ellive"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Sep",
	"m_strTable" => "ellive"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "Oct",
	"m_strTable" => "ellive"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Nov",
	"m_strTable" => "ellive"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Dec",
	"m_strTable" => "ellive"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "ellive";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "ID";
$proto32["m_columns"][] = "Jan";
$proto32["m_columns"][] = "Feb";
$proto32["m_columns"][] = "Mar";
$proto32["m_columns"][] = "April";
$proto32["m_columns"][] = "May";
$proto32["m_columns"][] = "June";
$proto32["m_columns"][] = "July";
$proto32["m_columns"][] = "Aug";
$proto32["m_columns"][] = "Sep";
$proto32["m_columns"][] = "Oct";
$proto32["m_columns"][] = "Nov";
$proto32["m_columns"][] = "Dec";
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
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_ellive = createSqlQuery_ellive();
													$tdataellive[".sqlquery"] = $queryData_ellive;
	
if(isset($tdataellive["field2"])){
	$tdataellive["field2"]["LookupTable"] = "carscars_view";
	$tdataellive["field2"]["LookupOrderBy"] = "name";
	$tdataellive["field2"]["LookupType"] = 4;
	$tdataellive["field2"]["LinkField"] = "email";
	$tdataellive["field2"]["DisplayField"] = "name";
	$tdataellive[".hasCustomViewField"] = true;
}

$tableEvents["ellive"] = new eventsBase;
$tdataellive[".hasEvents"] = false;

$cipherer = new RunnerCipherer("ellive");

?>