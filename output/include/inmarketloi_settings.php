<?php
require_once(getabspath("classes/cipherer.php"));
$tdatainmarketloi = array();
	$tdatainmarketloi[".NumberOfChars"] = 80; 
	$tdatainmarketloi[".ShortName"] = "inmarketloi";
	$tdatainmarketloi[".OwnerID"] = "";
	$tdatainmarketloi[".OriginalTable"] = "inmarketloi";

//	field labels
$fieldLabelsinmarketloi = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsinmarketloi["English"] = array();
	$fieldToolTipsinmarketloi["English"] = array();
	$fieldLabelsinmarketloi["English"]["ID"] = "ID";
	$fieldToolTipsinmarketloi["English"]["ID"] = "";
	$fieldLabelsinmarketloi["English"]["Jan"] = "Jan";
	$fieldToolTipsinmarketloi["English"]["Jan"] = "";
	$fieldLabelsinmarketloi["English"]["Feb"] = "Feb";
	$fieldToolTipsinmarketloi["English"]["Feb"] = "";
	$fieldLabelsinmarketloi["English"]["Mar"] = "Mar";
	$fieldToolTipsinmarketloi["English"]["Mar"] = "";
	$fieldLabelsinmarketloi["English"]["April"] = "April";
	$fieldToolTipsinmarketloi["English"]["April"] = "";
	$fieldLabelsinmarketloi["English"]["May"] = "May";
	$fieldToolTipsinmarketloi["English"]["May"] = "";
	$fieldLabelsinmarketloi["English"]["June"] = "June";
	$fieldToolTipsinmarketloi["English"]["June"] = "";
	$fieldLabelsinmarketloi["English"]["July"] = "July";
	$fieldToolTipsinmarketloi["English"]["July"] = "";
	$fieldLabelsinmarketloi["English"]["Aug"] = "Aug";
	$fieldToolTipsinmarketloi["English"]["Aug"] = "";
	$fieldLabelsinmarketloi["English"]["Sep"] = "Sep";
	$fieldToolTipsinmarketloi["English"]["Sep"] = "";
	$fieldLabelsinmarketloi["English"]["Oct"] = "Oct";
	$fieldToolTipsinmarketloi["English"]["Oct"] = "";
	$fieldLabelsinmarketloi["English"]["Nov"] = "Nov";
	$fieldToolTipsinmarketloi["English"]["Nov"] = "";
	$fieldLabelsinmarketloi["English"]["Dec"] = "Dec";
	$fieldToolTipsinmarketloi["English"]["Dec"] = "";
	if (count($fieldToolTipsinmarketloi["English"]))
		$tdatainmarketloi[".isUseToolTips"] = true;
}
	
	
	$tdatainmarketloi[".NCSearch"] = true;



$tdatainmarketloi[".shortTableName"] = "inmarketloi";
$tdatainmarketloi[".nSecOptions"] = 0;
$tdatainmarketloi[".recsPerRowList"] = 1;
$tdatainmarketloi[".mainTableOwnerID"] = "";
$tdatainmarketloi[".moveNext"] = 1;
$tdatainmarketloi[".nType"] = 0;

$tdatainmarketloi[".strOriginalTableName"] = "inmarketloi";




$tdatainmarketloi[".showAddInPopup"] = false;

$tdatainmarketloi[".showEditInPopup"] = false;

$tdatainmarketloi[".showViewInPopup"] = false;

$tdatainmarketloi[".fieldsForRegister"] = array();

$tdatainmarketloi[".listAjax"] = false;

	$tdatainmarketloi[".audit"] = false;

	$tdatainmarketloi[".locking"] = false;

$tdatainmarketloi[".listIcons"] = true;
$tdatainmarketloi[".edit"] = true;
$tdatainmarketloi[".inlineEdit"] = true;
$tdatainmarketloi[".view"] = true;

$tdatainmarketloi[".exportTo"] = true;



$tdatainmarketloi[".showSimpleSearchOptions"] = false;

$tdatainmarketloi[".showSearchPanel"] = true;

if (isMobile())
	$tdatainmarketloi[".isUseAjaxSuggest"] = false;
else 
	$tdatainmarketloi[".isUseAjaxSuggest"] = true;

$tdatainmarketloi[".rowHighlite"] = true;

// button handlers file names

$tdatainmarketloi[".addPageEvents"] = false;

// use timepicker for search panel
$tdatainmarketloi[".isUseTimeForSearch"] = false;




$tdatainmarketloi[".allSearchFields"] = array();

$tdatainmarketloi[".allSearchFields"][] = "ID";
$tdatainmarketloi[".allSearchFields"][] = "Jan";
$tdatainmarketloi[".allSearchFields"][] = "Feb";
$tdatainmarketloi[".allSearchFields"][] = "Mar";
$tdatainmarketloi[".allSearchFields"][] = "April";
$tdatainmarketloi[".allSearchFields"][] = "May";
$tdatainmarketloi[".allSearchFields"][] = "June";
$tdatainmarketloi[".allSearchFields"][] = "July";
$tdatainmarketloi[".allSearchFields"][] = "Aug";
$tdatainmarketloi[".allSearchFields"][] = "Sep";
$tdatainmarketloi[".allSearchFields"][] = "Oct";
$tdatainmarketloi[".allSearchFields"][] = "Nov";
$tdatainmarketloi[".allSearchFields"][] = "Dec";

$tdatainmarketloi[".googleLikeFields"][] = "ID";
$tdatainmarketloi[".googleLikeFields"][] = "Jan";
$tdatainmarketloi[".googleLikeFields"][] = "Feb";
$tdatainmarketloi[".googleLikeFields"][] = "Mar";
$tdatainmarketloi[".googleLikeFields"][] = "April";
$tdatainmarketloi[".googleLikeFields"][] = "May";
$tdatainmarketloi[".googleLikeFields"][] = "June";
$tdatainmarketloi[".googleLikeFields"][] = "July";
$tdatainmarketloi[".googleLikeFields"][] = "Aug";
$tdatainmarketloi[".googleLikeFields"][] = "Sep";
$tdatainmarketloi[".googleLikeFields"][] = "Oct";
$tdatainmarketloi[".googleLikeFields"][] = "Nov";
$tdatainmarketloi[".googleLikeFields"][] = "Dec";


$tdatainmarketloi[".advSearchFields"][] = "ID";
$tdatainmarketloi[".advSearchFields"][] = "Jan";
$tdatainmarketloi[".advSearchFields"][] = "Feb";
$tdatainmarketloi[".advSearchFields"][] = "Mar";
$tdatainmarketloi[".advSearchFields"][] = "April";
$tdatainmarketloi[".advSearchFields"][] = "May";
$tdatainmarketloi[".advSearchFields"][] = "June";
$tdatainmarketloi[".advSearchFields"][] = "July";
$tdatainmarketloi[".advSearchFields"][] = "Aug";
$tdatainmarketloi[".advSearchFields"][] = "Sep";
$tdatainmarketloi[".advSearchFields"][] = "Oct";
$tdatainmarketloi[".advSearchFields"][] = "Nov";
$tdatainmarketloi[".advSearchFields"][] = "Dec";

$tdatainmarketloi[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatainmarketloi[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatainmarketloi[".strOrderBy"] = $tstrOrderBy;

$tdatainmarketloi[".orderindexes"] = array();

$tdatainmarketloi[".sqlHead"] = "SELECT ID,   Jan,   Feb,   Mar,   April,   May,   June,   July,   Aug,   Sep,   Oct,   Nov,   `Dec`";
$tdatainmarketloi[".sqlFrom"] = "FROM inmarketloi";
$tdatainmarketloi[".sqlWhereExpr"] = "";
$tdatainmarketloi[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatainmarketloi[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatainmarketloi[".arrGroupsPerPage"] = $arrGPP;

$tableKeysinmarketloi = array();
$tableKeysinmarketloi[] = "ID";
$tdatainmarketloi[".Keys"] = $tableKeysinmarketloi;

$tdatainmarketloi[".listFields"] = array();
$tdatainmarketloi[".listFields"][] = "ID";
$tdatainmarketloi[".listFields"][] = "Jan";
$tdatainmarketloi[".listFields"][] = "Feb";
$tdatainmarketloi[".listFields"][] = "Mar";
$tdatainmarketloi[".listFields"][] = "April";
$tdatainmarketloi[".listFields"][] = "May";
$tdatainmarketloi[".listFields"][] = "June";
$tdatainmarketloi[".listFields"][] = "July";
$tdatainmarketloi[".listFields"][] = "Aug";
$tdatainmarketloi[".listFields"][] = "Sep";
$tdatainmarketloi[".listFields"][] = "Oct";
$tdatainmarketloi[".listFields"][] = "Nov";
$tdatainmarketloi[".listFields"][] = "Dec";

$tdatainmarketloi[".viewFields"] = array();
$tdatainmarketloi[".viewFields"][] = "ID";
$tdatainmarketloi[".viewFields"][] = "Jan";
$tdatainmarketloi[".viewFields"][] = "Feb";
$tdatainmarketloi[".viewFields"][] = "Mar";
$tdatainmarketloi[".viewFields"][] = "April";
$tdatainmarketloi[".viewFields"][] = "May";
$tdatainmarketloi[".viewFields"][] = "June";
$tdatainmarketloi[".viewFields"][] = "July";
$tdatainmarketloi[".viewFields"][] = "Aug";
$tdatainmarketloi[".viewFields"][] = "Sep";
$tdatainmarketloi[".viewFields"][] = "Oct";
$tdatainmarketloi[".viewFields"][] = "Nov";
$tdatainmarketloi[".viewFields"][] = "Dec";

$tdatainmarketloi[".addFields"] = array();
$tdatainmarketloi[".addFields"][] = "Jan";
$tdatainmarketloi[".addFields"][] = "Feb";
$tdatainmarketloi[".addFields"][] = "Mar";
$tdatainmarketloi[".addFields"][] = "April";
$tdatainmarketloi[".addFields"][] = "May";
$tdatainmarketloi[".addFields"][] = "June";
$tdatainmarketloi[".addFields"][] = "July";
$tdatainmarketloi[".addFields"][] = "Aug";
$tdatainmarketloi[".addFields"][] = "Sep";
$tdatainmarketloi[".addFields"][] = "Oct";
$tdatainmarketloi[".addFields"][] = "Nov";
$tdatainmarketloi[".addFields"][] = "Dec";

$tdatainmarketloi[".inlineAddFields"] = array();
$tdatainmarketloi[".inlineAddFields"][] = "Jan";
$tdatainmarketloi[".inlineAddFields"][] = "Feb";
$tdatainmarketloi[".inlineAddFields"][] = "Mar";
$tdatainmarketloi[".inlineAddFields"][] = "April";
$tdatainmarketloi[".inlineAddFields"][] = "May";
$tdatainmarketloi[".inlineAddFields"][] = "June";
$tdatainmarketloi[".inlineAddFields"][] = "July";
$tdatainmarketloi[".inlineAddFields"][] = "Aug";
$tdatainmarketloi[".inlineAddFields"][] = "Sep";
$tdatainmarketloi[".inlineAddFields"][] = "Oct";
$tdatainmarketloi[".inlineAddFields"][] = "Nov";
$tdatainmarketloi[".inlineAddFields"][] = "Dec";

$tdatainmarketloi[".editFields"] = array();
$tdatainmarketloi[".editFields"][] = "Jan";
$tdatainmarketloi[".editFields"][] = "Feb";
$tdatainmarketloi[".editFields"][] = "Mar";
$tdatainmarketloi[".editFields"][] = "April";
$tdatainmarketloi[".editFields"][] = "May";
$tdatainmarketloi[".editFields"][] = "June";
$tdatainmarketloi[".editFields"][] = "July";
$tdatainmarketloi[".editFields"][] = "Aug";
$tdatainmarketloi[".editFields"][] = "Sep";
$tdatainmarketloi[".editFields"][] = "Oct";
$tdatainmarketloi[".editFields"][] = "Nov";
$tdatainmarketloi[".editFields"][] = "Dec";

$tdatainmarketloi[".inlineEditFields"] = array();
$tdatainmarketloi[".inlineEditFields"][] = "Jan";
$tdatainmarketloi[".inlineEditFields"][] = "Feb";
$tdatainmarketloi[".inlineEditFields"][] = "Mar";
$tdatainmarketloi[".inlineEditFields"][] = "April";
$tdatainmarketloi[".inlineEditFields"][] = "May";
$tdatainmarketloi[".inlineEditFields"][] = "June";
$tdatainmarketloi[".inlineEditFields"][] = "July";
$tdatainmarketloi[".inlineEditFields"][] = "Aug";
$tdatainmarketloi[".inlineEditFields"][] = "Sep";
$tdatainmarketloi[".inlineEditFields"][] = "Oct";
$tdatainmarketloi[".inlineEditFields"][] = "Nov";
$tdatainmarketloi[".inlineEditFields"][] = "Dec";

$tdatainmarketloi[".exportFields"] = array();
$tdatainmarketloi[".exportFields"][] = "ID";
$tdatainmarketloi[".exportFields"][] = "Jan";
$tdatainmarketloi[".exportFields"][] = "Feb";
$tdatainmarketloi[".exportFields"][] = "Mar";
$tdatainmarketloi[".exportFields"][] = "April";
$tdatainmarketloi[".exportFields"][] = "May";
$tdatainmarketloi[".exportFields"][] = "June";
$tdatainmarketloi[".exportFields"][] = "July";
$tdatainmarketloi[".exportFields"][] = "Aug";
$tdatainmarketloi[".exportFields"][] = "Sep";
$tdatainmarketloi[".exportFields"][] = "Oct";
$tdatainmarketloi[".exportFields"][] = "Nov";
$tdatainmarketloi[".exportFields"][] = "Dec";

$tdatainmarketloi[".printFields"] = array();
$tdatainmarketloi[".printFields"][] = "ID";
$tdatainmarketloi[".printFields"][] = "Jan";
$tdatainmarketloi[".printFields"][] = "Feb";
$tdatainmarketloi[".printFields"][] = "Mar";
$tdatainmarketloi[".printFields"][] = "April";
$tdatainmarketloi[".printFields"][] = "May";
$tdatainmarketloi[".printFields"][] = "June";
$tdatainmarketloi[".printFields"][] = "July";
$tdatainmarketloi[".printFields"][] = "Aug";
$tdatainmarketloi[".printFields"][] = "Sep";
$tdatainmarketloi[".printFields"][] = "Oct";
$tdatainmarketloi[".printFields"][] = "Nov";
$tdatainmarketloi[".printFields"][] = "Dec";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "inmarketloi";
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
	
		
		
	$tdatainmarketloi["ID"] = $fdata;
//	Jan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Jan";
	$fdata["GoodName"] = "Jan";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Jan"; 
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
	
		
		
	$tdatainmarketloi["Jan"] = $fdata;
//	Feb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Feb";
	$fdata["GoodName"] = "Feb";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Feb"; 
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
	
		
		
	$tdatainmarketloi["Feb"] = $fdata;
//	Mar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Mar";
	$fdata["GoodName"] = "Mar";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Mar"; 
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
	
		
		
	$tdatainmarketloi["Mar"] = $fdata;
//	April
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "April";
	$fdata["GoodName"] = "April";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "April"; 
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
	
		
		
	$tdatainmarketloi["April"] = $fdata;
//	May
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "May";
	$fdata["GoodName"] = "May";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "May"; 
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
	
		
		
	$tdatainmarketloi["May"] = $fdata;
//	June
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "June";
	$fdata["GoodName"] = "June";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "June"; 
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
	
		
		
	$tdatainmarketloi["June"] = $fdata;
//	July
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "July";
	$fdata["GoodName"] = "July";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "July"; 
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
	
		
		
	$tdatainmarketloi["July"] = $fdata;
//	Aug
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Aug";
	$fdata["GoodName"] = "Aug";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Aug"; 
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
	
		
		
	$tdatainmarketloi["Aug"] = $fdata;
//	Sep
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Sep";
	$fdata["GoodName"] = "Sep";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Sep"; 
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
	
		
		
	$tdatainmarketloi["Sep"] = $fdata;
//	Oct
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "Oct";
	$fdata["GoodName"] = "Oct";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Oct"; 
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
	
		
		
	$tdatainmarketloi["Oct"] = $fdata;
//	Nov
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Nov";
	$fdata["GoodName"] = "Nov";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Nov"; 
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
	
		
		
	$tdatainmarketloi["Nov"] = $fdata;
//	Dec
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Dec";
	$fdata["GoodName"] = "Dec";
	$fdata["ownerTable"] = "inmarketloi";
	$fdata["Label"] = "Dec"; 
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
	
		
		
	$tdatainmarketloi["Dec"] = $fdata;

	
$tables_data["inmarketloi"]=&$tdatainmarketloi;
$field_labels["inmarketloi"] = &$fieldLabelsinmarketloi;
$fieldToolTips["inmarketloi"] = &$fieldToolTipsinmarketloi;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["inmarketloi"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["inmarketloi"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_inmarketloi()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   Jan,   Feb,   Mar,   April,   May,   June,   July,   Aug,   Sep,   Oct,   Nov,   `Dec`";
$proto0["m_strFrom"] = "FROM inmarketloi";
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
	"m_strTable" => "inmarketloi"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Jan",
	"m_strTable" => "inmarketloi"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Feb",
	"m_strTable" => "inmarketloi"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Mar",
	"m_strTable" => "inmarketloi"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "April",
	"m_strTable" => "inmarketloi"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "May",
	"m_strTable" => "inmarketloi"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "June",
	"m_strTable" => "inmarketloi"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "July",
	"m_strTable" => "inmarketloi"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Aug",
	"m_strTable" => "inmarketloi"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Sep",
	"m_strTable" => "inmarketloi"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "Oct",
	"m_strTable" => "inmarketloi"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Nov",
	"m_strTable" => "inmarketloi"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Dec",
	"m_strTable" => "inmarketloi"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "inmarketloi";
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
$queryData_inmarketloi = createSqlQuery_inmarketloi();
													$tdatainmarketloi[".sqlquery"] = $queryData_inmarketloi;
	
if(isset($tdatainmarketloi["field2"])){
	$tdatainmarketloi["field2"]["LookupTable"] = "carscars_view";
	$tdatainmarketloi["field2"]["LookupOrderBy"] = "name";
	$tdatainmarketloi["field2"]["LookupType"] = 4;
	$tdatainmarketloi["field2"]["LinkField"] = "email";
	$tdatainmarketloi["field2"]["DisplayField"] = "name";
	$tdatainmarketloi[".hasCustomViewField"] = true;
}

$tableEvents["inmarketloi"] = new eventsBase;
$tdatainmarketloi[".hasEvents"] = false;

$cipherer = new RunnerCipherer("inmarketloi");

?>