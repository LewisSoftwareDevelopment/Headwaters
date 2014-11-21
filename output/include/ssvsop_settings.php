<?php
require_once(getabspath("classes/cipherer.php"));
$tdatassvsop = array();
	$tdatassvsop[".NumberOfChars"] = 80; 
	$tdatassvsop[".ShortName"] = "ssvsop";
	$tdatassvsop[".OwnerID"] = "";
	$tdatassvsop[".OriginalTable"] = "ssvsop";

//	field labels
$fieldLabelsssvsop = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsssvsop["English"] = array();
	$fieldToolTipsssvsop["English"] = array();
	$fieldLabelsssvsop["English"]["ID"] = "ID";
	$fieldToolTipsssvsop["English"]["ID"] = "";
	$fieldLabelsssvsop["English"]["Jan"] = "Jan";
	$fieldToolTipsssvsop["English"]["Jan"] = "";
	$fieldLabelsssvsop["English"]["Feb"] = "Feb";
	$fieldToolTipsssvsop["English"]["Feb"] = "";
	$fieldLabelsssvsop["English"]["Mar"] = "Mar";
	$fieldToolTipsssvsop["English"]["Mar"] = "";
	$fieldLabelsssvsop["English"]["April"] = "April";
	$fieldToolTipsssvsop["English"]["April"] = "";
	$fieldLabelsssvsop["English"]["May"] = "May";
	$fieldToolTipsssvsop["English"]["May"] = "";
	$fieldLabelsssvsop["English"]["June"] = "June";
	$fieldToolTipsssvsop["English"]["June"] = "";
	$fieldLabelsssvsop["English"]["July"] = "July";
	$fieldToolTipsssvsop["English"]["July"] = "";
	$fieldLabelsssvsop["English"]["Aug"] = "Aug";
	$fieldToolTipsssvsop["English"]["Aug"] = "";
	$fieldLabelsssvsop["English"]["Sept"] = "Sept";
	$fieldToolTipsssvsop["English"]["Sept"] = "";
	$fieldLabelsssvsop["English"]["Oct"] = "Oct";
	$fieldToolTipsssvsop["English"]["Oct"] = "";
	$fieldLabelsssvsop["English"]["Nov"] = "Nov";
	$fieldToolTipsssvsop["English"]["Nov"] = "";
	$fieldLabelsssvsop["English"]["Dec"] = "Dec";
	$fieldToolTipsssvsop["English"]["Dec"] = "";
	$fieldLabelsssvsop["English"]["SS"] = "SS";
	$fieldToolTipsssvsop["English"]["SS"] = "";
	$fieldLabelsssvsop["English"]["Live"] = "Live";
	$fieldToolTipsssvsop["English"]["Live"] = "";
	$fieldLabelsssvsop["English"]["ssovel"] = "Ssovel";
	$fieldToolTipsssvsop["English"]["ssovel"] = "";
	if (count($fieldToolTipsssvsop["English"]))
		$tdatassvsop[".isUseToolTips"] = true;
}
	
	
	$tdatassvsop[".NCSearch"] = true;



$tdatassvsop[".shortTableName"] = "ssvsop";
$tdatassvsop[".nSecOptions"] = 0;
$tdatassvsop[".recsPerRowList"] = 1;
$tdatassvsop[".mainTableOwnerID"] = "";
$tdatassvsop[".moveNext"] = 1;
$tdatassvsop[".nType"] = 0;

$tdatassvsop[".strOriginalTableName"] = "ssvsop";




$tdatassvsop[".showAddInPopup"] = false;

$tdatassvsop[".showEditInPopup"] = false;

$tdatassvsop[".showViewInPopup"] = false;

$tdatassvsop[".fieldsForRegister"] = array();

$tdatassvsop[".listAjax"] = false;

	$tdatassvsop[".audit"] = false;

	$tdatassvsop[".locking"] = false;

$tdatassvsop[".listIcons"] = true;
$tdatassvsop[".edit"] = true;
$tdatassvsop[".inlineEdit"] = true;
$tdatassvsop[".view"] = true;

$tdatassvsop[".exportTo"] = true;

$tdatassvsop[".printFriendly"] = true;


$tdatassvsop[".showSimpleSearchOptions"] = false;

$tdatassvsop[".showSearchPanel"] = true;

if (isMobile())
	$tdatassvsop[".isUseAjaxSuggest"] = false;
else 
	$tdatassvsop[".isUseAjaxSuggest"] = true;

$tdatassvsop[".rowHighlite"] = true;

// button handlers file names

$tdatassvsop[".addPageEvents"] = false;

// use timepicker for search panel
$tdatassvsop[".isUseTimeForSearch"] = false;




$tdatassvsop[".allSearchFields"] = array();

$tdatassvsop[".allSearchFields"][] = "ID";
$tdatassvsop[".allSearchFields"][] = "Jan";
$tdatassvsop[".allSearchFields"][] = "Feb";
$tdatassvsop[".allSearchFields"][] = "Mar";
$tdatassvsop[".allSearchFields"][] = "April";
$tdatassvsop[".allSearchFields"][] = "May";
$tdatassvsop[".allSearchFields"][] = "June";
$tdatassvsop[".allSearchFields"][] = "July";
$tdatassvsop[".allSearchFields"][] = "Aug";
$tdatassvsop[".allSearchFields"][] = "Sept";
$tdatassvsop[".allSearchFields"][] = "Oct";
$tdatassvsop[".allSearchFields"][] = "Nov";
$tdatassvsop[".allSearchFields"][] = "Dec";
$tdatassvsop[".allSearchFields"][] = "SS";
$tdatassvsop[".allSearchFields"][] = "Live";
$tdatassvsop[".allSearchFields"][] = "ssovel";

$tdatassvsop[".googleLikeFields"][] = "ID";
$tdatassvsop[".googleLikeFields"][] = "Jan";
$tdatassvsop[".googleLikeFields"][] = "Feb";
$tdatassvsop[".googleLikeFields"][] = "Mar";
$tdatassvsop[".googleLikeFields"][] = "April";
$tdatassvsop[".googleLikeFields"][] = "May";
$tdatassvsop[".googleLikeFields"][] = "June";
$tdatassvsop[".googleLikeFields"][] = "July";
$tdatassvsop[".googleLikeFields"][] = "Aug";
$tdatassvsop[".googleLikeFields"][] = "Sept";
$tdatassvsop[".googleLikeFields"][] = "Oct";
$tdatassvsop[".googleLikeFields"][] = "Nov";
$tdatassvsop[".googleLikeFields"][] = "Dec";
$tdatassvsop[".googleLikeFields"][] = "SS";
$tdatassvsop[".googleLikeFields"][] = "Live";
$tdatassvsop[".googleLikeFields"][] = "ssovel";


$tdatassvsop[".advSearchFields"][] = "ID";
$tdatassvsop[".advSearchFields"][] = "Jan";
$tdatassvsop[".advSearchFields"][] = "Feb";
$tdatassvsop[".advSearchFields"][] = "Mar";
$tdatassvsop[".advSearchFields"][] = "April";
$tdatassvsop[".advSearchFields"][] = "May";
$tdatassvsop[".advSearchFields"][] = "June";
$tdatassvsop[".advSearchFields"][] = "July";
$tdatassvsop[".advSearchFields"][] = "Aug";
$tdatassvsop[".advSearchFields"][] = "Sept";
$tdatassvsop[".advSearchFields"][] = "Oct";
$tdatassvsop[".advSearchFields"][] = "Nov";
$tdatassvsop[".advSearchFields"][] = "Dec";
$tdatassvsop[".advSearchFields"][] = "SS";
$tdatassvsop[".advSearchFields"][] = "Live";
$tdatassvsop[".advSearchFields"][] = "ssovel";

$tdatassvsop[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatassvsop[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatassvsop[".strOrderBy"] = $tstrOrderBy;

$tdatassvsop[".orderindexes"] = array();

$tdatassvsop[".sqlHead"] = "SELECT * ,  (SELECT COUNT(Company) FROM Company WHERE (`Deal Type` = 'M&A - Sell-side') and (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))as SS,   (SELECT COUNT(Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive') as Live,  (Select Round (100*(`ss`/`live`))) as ssovel";
$tdatassvsop[".sqlFrom"] = "FROM ssvsop";
$tdatassvsop[".sqlWhereExpr"] = "";
$tdatassvsop[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatassvsop[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatassvsop[".arrGroupsPerPage"] = $arrGPP;

$tableKeysssvsop = array();
$tableKeysssvsop[] = "ID";
$tdatassvsop[".Keys"] = $tableKeysssvsop;

$tdatassvsop[".listFields"] = array();
$tdatassvsop[".listFields"][] = "Live";
$tdatassvsop[".listFields"][] = "SS";
$tdatassvsop[".listFields"][] = "ssovel";
$tdatassvsop[".listFields"][] = "ID";
$tdatassvsop[".listFields"][] = "Jan";
$tdatassvsop[".listFields"][] = "Feb";
$tdatassvsop[".listFields"][] = "Mar";
$tdatassvsop[".listFields"][] = "April";
$tdatassvsop[".listFields"][] = "May";
$tdatassvsop[".listFields"][] = "June";
$tdatassvsop[".listFields"][] = "July";
$tdatassvsop[".listFields"][] = "Aug";
$tdatassvsop[".listFields"][] = "Sept";
$tdatassvsop[".listFields"][] = "Oct";
$tdatassvsop[".listFields"][] = "Nov";
$tdatassvsop[".listFields"][] = "Dec";

$tdatassvsop[".viewFields"] = array();
$tdatassvsop[".viewFields"][] = "ID";
$tdatassvsop[".viewFields"][] = "Jan";
$tdatassvsop[".viewFields"][] = "Feb";
$tdatassvsop[".viewFields"][] = "Mar";
$tdatassvsop[".viewFields"][] = "April";
$tdatassvsop[".viewFields"][] = "May";
$tdatassvsop[".viewFields"][] = "June";
$tdatassvsop[".viewFields"][] = "July";
$tdatassvsop[".viewFields"][] = "Aug";
$tdatassvsop[".viewFields"][] = "Sept";
$tdatassvsop[".viewFields"][] = "Oct";
$tdatassvsop[".viewFields"][] = "Nov";
$tdatassvsop[".viewFields"][] = "Dec";
$tdatassvsop[".viewFields"][] = "SS";
$tdatassvsop[".viewFields"][] = "Live";
$tdatassvsop[".viewFields"][] = "ssovel";

$tdatassvsop[".addFields"] = array();

$tdatassvsop[".inlineAddFields"] = array();
$tdatassvsop[".inlineAddFields"][] = "SS";
$tdatassvsop[".inlineAddFields"][] = "Live";
$tdatassvsop[".inlineAddFields"][] = "ssovel";

$tdatassvsop[".editFields"] = array();
$tdatassvsop[".editFields"][] = "Jan";
$tdatassvsop[".editFields"][] = "Feb";
$tdatassvsop[".editFields"][] = "Mar";
$tdatassvsop[".editFields"][] = "April";
$tdatassvsop[".editFields"][] = "May";
$tdatassvsop[".editFields"][] = "June";
$tdatassvsop[".editFields"][] = "July";
$tdatassvsop[".editFields"][] = "Aug";
$tdatassvsop[".editFields"][] = "Sept";
$tdatassvsop[".editFields"][] = "Oct";
$tdatassvsop[".editFields"][] = "Nov";
$tdatassvsop[".editFields"][] = "Dec";

$tdatassvsop[".inlineEditFields"] = array();
$tdatassvsop[".inlineEditFields"][] = "Live";
$tdatassvsop[".inlineEditFields"][] = "SS";
$tdatassvsop[".inlineEditFields"][] = "ssovel";
$tdatassvsop[".inlineEditFields"][] = "Jan";
$tdatassvsop[".inlineEditFields"][] = "Feb";
$tdatassvsop[".inlineEditFields"][] = "Mar";
$tdatassvsop[".inlineEditFields"][] = "April";
$tdatassvsop[".inlineEditFields"][] = "May";
$tdatassvsop[".inlineEditFields"][] = "June";
$tdatassvsop[".inlineEditFields"][] = "July";
$tdatassvsop[".inlineEditFields"][] = "Aug";
$tdatassvsop[".inlineEditFields"][] = "Sept";
$tdatassvsop[".inlineEditFields"][] = "Oct";
$tdatassvsop[".inlineEditFields"][] = "Nov";
$tdatassvsop[".inlineEditFields"][] = "Dec";

$tdatassvsop[".exportFields"] = array();
$tdatassvsop[".exportFields"][] = "ID";
$tdatassvsop[".exportFields"][] = "Jan";
$tdatassvsop[".exportFields"][] = "Feb";
$tdatassvsop[".exportFields"][] = "Mar";
$tdatassvsop[".exportFields"][] = "April";
$tdatassvsop[".exportFields"][] = "May";
$tdatassvsop[".exportFields"][] = "June";
$tdatassvsop[".exportFields"][] = "July";
$tdatassvsop[".exportFields"][] = "Aug";
$tdatassvsop[".exportFields"][] = "Sept";
$tdatassvsop[".exportFields"][] = "Oct";
$tdatassvsop[".exportFields"][] = "Nov";
$tdatassvsop[".exportFields"][] = "Dec";
$tdatassvsop[".exportFields"][] = "SS";
$tdatassvsop[".exportFields"][] = "Live";
$tdatassvsop[".exportFields"][] = "ssovel";

$tdatassvsop[".printFields"] = array();
$tdatassvsop[".printFields"][] = "ID";
$tdatassvsop[".printFields"][] = "Jan";
$tdatassvsop[".printFields"][] = "Feb";
$tdatassvsop[".printFields"][] = "Mar";
$tdatassvsop[".printFields"][] = "April";
$tdatassvsop[".printFields"][] = "May";
$tdatassvsop[".printFields"][] = "June";
$tdatassvsop[".printFields"][] = "July";
$tdatassvsop[".printFields"][] = "Aug";
$tdatassvsop[".printFields"][] = "Sept";
$tdatassvsop[".printFields"][] = "Oct";
$tdatassvsop[".printFields"][] = "Nov";
$tdatassvsop[".printFields"][] = "Dec";
$tdatassvsop[".printFields"][] = "SS";
$tdatassvsop[".printFields"][] = "Live";
$tdatassvsop[".printFields"][] = "ssovel";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
				$fdata["FullName"] = "`ssvsop`.`ID`";
	
		
		
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
	
		
		
	$tdatassvsop["ID"] = $fdata;
//	Jan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Jan";
	$fdata["GoodName"] = "Jan";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Jan"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Jan"; 
				$fdata["FullName"] = "`ssvsop`.`Jan`";
	
		
		
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
	
		
		
	$tdatassvsop["Jan"] = $fdata;
//	Feb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Feb";
	$fdata["GoodName"] = "Feb";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Feb"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Feb"; 
				$fdata["FullName"] = "`ssvsop`.`Feb`";
	
		
		
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
	
		
		
	$tdatassvsop["Feb"] = $fdata;
//	Mar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Mar";
	$fdata["GoodName"] = "Mar";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Mar"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Mar"; 
				$fdata["FullName"] = "`ssvsop`.`Mar`";
	
		
		
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
	
		
		
	$tdatassvsop["Mar"] = $fdata;
//	April
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "April";
	$fdata["GoodName"] = "April";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "April"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "April"; 
				$fdata["FullName"] = "`ssvsop`.`April`";
	
		
		
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
	
		
		
	$tdatassvsop["April"] = $fdata;
//	May
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "May";
	$fdata["GoodName"] = "May";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "May"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "May"; 
				$fdata["FullName"] = "`ssvsop`.`May`";
	
		
		
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
	
		
		
	$tdatassvsop["May"] = $fdata;
//	June
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "June";
	$fdata["GoodName"] = "June";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "June"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "June"; 
				$fdata["FullName"] = "`ssvsop`.`June`";
	
		
		
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
	
		
		
	$tdatassvsop["June"] = $fdata;
//	July
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "July";
	$fdata["GoodName"] = "July";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "July"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "July"; 
				$fdata["FullName"] = "`ssvsop`.`July`";
	
		
		
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
	
		
		
	$tdatassvsop["July"] = $fdata;
//	Aug
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Aug";
	$fdata["GoodName"] = "Aug";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Aug"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Aug"; 
				$fdata["FullName"] = "`ssvsop`.`Aug`";
	
		
		
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
	
		
		
	$tdatassvsop["Aug"] = $fdata;
//	Sept
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Sept";
	$fdata["GoodName"] = "Sept";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Sept"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Sept"; 
				$fdata["FullName"] = "`ssvsop`.`Sept`";
	
		
		
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
	
		
		
	$tdatassvsop["Sept"] = $fdata;
//	Oct
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "Oct";
	$fdata["GoodName"] = "Oct";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Oct"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Oct"; 
				$fdata["FullName"] = "`ssvsop`.`Oct`";
	
		
		
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
	
		
		
	$tdatassvsop["Oct"] = $fdata;
//	Nov
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Nov";
	$fdata["GoodName"] = "Nov";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Nov"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Nov"; 
				$fdata["FullName"] = "`ssvsop`.`Nov`";
	
		
		
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
	
		
		
	$tdatassvsop["Nov"] = $fdata;
//	Dec
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Dec";
	$fdata["GoodName"] = "Dec";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Dec"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Dec"; 
				$fdata["FullName"] = "`ssvsop`.`Dec`";
	
		
		
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
	
		
		
	$tdatassvsop["Dec"] = $fdata;
//	SS
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "SS";
	$fdata["GoodName"] = "SS";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "SS"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "SS"; 
				$fdata["FullName"] = "`ssvsop`.`SS`";
	
		
		
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
	
		
		
	$tdatassvsop["SS"] = $fdata;
//	Live
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "Live";
	$fdata["GoodName"] = "Live";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Live"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Live"; 
				$fdata["FullName"] = "`ssvsop`.`Live`";
	
		
		
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
	
		
		
	$tdatassvsop["Live"] = $fdata;
//	ssovel
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "ssovel";
	$fdata["GoodName"] = "ssovel";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Ssovel"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ssovel"; 
				$fdata["FullName"] = "`ssvsop`.`ssovel`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdatassvsop["ssovel"] = $fdata;

	
$tables_data["ssvsop"]=&$tdatassvsop;
$field_labels["ssvsop"] = &$fieldLabelsssvsop;
$fieldToolTips["ssvsop"] = &$fieldToolTipsssvsop;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ssvsop"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["ssvsop"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_ssvsop()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "* ,  (SELECT COUNT(Company) FROM Company WHERE (`Deal Type` = 'M&A - Sell-side') and (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))as SS,   (SELECT COUNT(Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive') as Live,  (Select Round (100*(`ss`/`live`))) as ssovel";
$proto0["m_strFrom"] = "FROM ssvsop";
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
			$obj = new SQLNonParsed(array(
	"m_sql" => "*"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_strHead"] = "SELECT";
$proto8["m_strFieldList"] = "COUNT(Company)";
$proto8["m_strFrom"] = "FROM Company";
$proto8["m_strWhere"] = "(`Deal Type` = 'M&A - Sell-side') and (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto8["m_strOrderBy"] = "";
$proto8["m_strTail"] = "";
$proto8["cipherer"] = null;
$proto9=array();
$proto9["m_sql"] = "(`Deal Type` = 'M&A - Sell-side') and (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
$proto9["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(`Deal Type` = 'M&A - Sell-side') and (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')"
));

$proto9["m_column"]=$obj;
$proto9["m_contained"] = array();
						$proto11=array();
$proto11["m_sql"] = "`Deal Type` = 'M&A - Sell-side'";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "= 'M&A - Sell-side'";
$proto11["m_havingmode"] = "0";
$proto11["m_inBrackets"] = "1";
$proto11["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto11);

			$proto9["m_contained"][]=$obj;
						$proto13=array();
$proto13["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto13["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
						$proto15=array();
$proto15["m_sql"] = "Status = 'on hold'";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "= 'on hold'";
$proto15["m_havingmode"] = "0";
$proto15["m_inBrackets"] = "0";
$proto15["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto15);

			$proto13["m_contained"][]=$obj;
						$proto17=array();
$proto17["m_sql"] = "Status = 'in market'";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "= 'in market'";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

			$proto13["m_contained"][]=$obj;
						$proto19=array();
$proto19["m_sql"] = "Status = 'pre market'";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "= 'pre market'";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

			$proto13["m_contained"][]=$obj;
						$proto21=array();
$proto21["m_sql"] = "Status = 'under loi'";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "= 'under loi'";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

			$proto13["m_contained"][]=$obj;
						$proto23=array();
$proto23["m_sql"] = "Status = 'inactive'";
$proto23["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto23["m_column"]=$obj;
$proto23["m_contained"] = array();
$proto23["m_strCase"] = "= 'inactive'";
$proto23["m_havingmode"] = "0";
$proto23["m_inBrackets"] = "0";
$proto23["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto23);

			$proto13["m_contained"][]=$obj;
$proto13["m_strCase"] = "";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "1";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

			$proto9["m_contained"][]=$obj;
$proto9["m_strCase"] = "";
$proto9["m_havingmode"] = "0";
$proto9["m_inBrackets"] = "0";
$proto9["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto9);

$proto8["m_where"] = $obj;
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

$proto8["m_having"] = $obj;
$proto8["m_fieldlist"] = array();
						$proto27=array();
			$proto28=array();
$proto28["m_functiontype"] = "SQLF_COUNT";
$proto28["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto28["m_arguments"][]=$obj;
$proto28["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto28);

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto8["m_fieldlist"][]=$obj;
$proto8["m_fromlist"] = array();
												$proto30=array();
$proto30["m_link"] = "SQLL_MAIN";
			$proto31=array();
$proto31["m_strName"] = "company";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "ID";
$proto31["m_columns"][] = "Company";
$proto31["m_columns"][] = "Deal Slot";
$proto31["m_columns"][] = "IBC Date";
$proto31["m_columns"][] = "EL Date";
$proto31["m_columns"][] = "Project Name";
$proto31["m_columns"][] = "Status";
$proto31["m_columns"][] = "Deal Type";
$proto31["m_columns"][] = "Projected Fee";
$proto31["m_columns"][] = "Projected Transaction Size";
$proto31["m_columns"][] = "Est. Close Date";
$proto31["m_columns"][] = "Primary Banker";
$proto31["m_columns"][] = "Practice Area";
$proto31["m_columns"][] = "Ownership Class";
$proto31["m_columns"][] = "Industry";
$proto31["m_columns"][] = "Referral Type";
$proto31["m_columns"][] = "Referral Source-Company";
$proto31["m_columns"][] = "Referral Scource-Ind.";
$proto31["m_columns"][] = "Description";
$proto31["m_columns"][] = "Dead Date";
$proto31["m_columns"][] = "EL Expiration Date";
$proto31["m_columns"][] = "Engagment Fee";
$proto31["m_columns"][] = "Fee Minimum";
$proto31["m_columns"][] = "Final Total Sucess Fee";
$proto31["m_columns"][] = "Final Transaction Size";
$proto31["m_columns"][] = "Monthly Retainer";
$proto31["m_columns"][] = "Closed Date";
$proto31["m_columns"][] = "Team Split-1";
$proto31["m_columns"][] = "Team-1";
$proto31["m_columns"][] = "Team Split-2";
$proto31["m_columns"][] = "Team-2";
$proto31["m_columns"][] = "Team Split-3";
$proto31["m_columns"][] = "Team Split-4";
$proto31["m_columns"][] = "Team Split-5";
$proto31["m_columns"][] = "Team Split-6";
$proto31["m_columns"][] = "Team-3";
$proto31["m_columns"][] = "Team-4";
$proto31["m_columns"][] = "Team-5";
$proto31["m_columns"][] = "Team-6";
$proto31["m_columns"][] = "Fee Split-1";
$proto31["m_columns"][] = "Fee Split-2";
$proto31["m_columns"][] = "Fee Split-3";
$proto31["m_columns"][] = "Fee Split-4";
$proto31["m_columns"][] = "Fee Split-5";
$proto31["m_columns"][] = "Fee Split-6";
$proto31["m_columns"][] = "Fee To-1";
$proto31["m_columns"][] = "Fee To-2";
$proto31["m_columns"][] = "Fee To-3";
$proto31["m_columns"][] = "Fee To-4";
$proto31["m_columns"][] = "Fee To-5";
$proto31["m_columns"][] = "Fee To-6";
$proto31["m_columns"][] = "Enterpise Value";
$proto31["m_columns"][] = "Fee Details";
$proto31["m_columns"][] = "Split to Corporate";
$proto31["m_columns"][] = "Paul";
$proto31["m_columns"][] = "McBroom";
$proto31["m_columns"][] = "Month of Close";
$proto31["m_columns"][] = "Gross This";
$proto31["m_columns"][] = "Gross Next";
$proto31["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_alias"] = "";
$proto32=array();
$proto32["m_sql"] = "";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "";
$proto32["m_havingmode"] = "0";
$proto32["m_inBrackets"] = "0";
$proto32["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto8["m_fromlist"][]=$obj;
$proto8["m_groupby"] = array();
$proto8["m_orderby"] = array();
$obj = new SQLQuery($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "SS";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$proto35=array();
$proto35["m_strHead"] = "SELECT";
$proto35["m_strFieldList"] = "COUNT(Company)";
$proto35["m_strFrom"] = "FROM Company";
$proto35["m_strWhere"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto35["m_strOrderBy"] = "";
$proto35["m_strTail"] = "";
$proto35["cipherer"] = null;
$proto36=array();
$proto36["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto36["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
						$proto38=array();
$proto38["m_sql"] = "Status = 'on hold'";
$proto38["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto38["m_column"]=$obj;
$proto38["m_contained"] = array();
$proto38["m_strCase"] = "= 'on hold'";
$proto38["m_havingmode"] = "0";
$proto38["m_inBrackets"] = "0";
$proto38["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto38);

			$proto36["m_contained"][]=$obj;
						$proto40=array();
$proto40["m_sql"] = "Status = 'in market'";
$proto40["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto40["m_column"]=$obj;
$proto40["m_contained"] = array();
$proto40["m_strCase"] = "= 'in market'";
$proto40["m_havingmode"] = "0";
$proto40["m_inBrackets"] = "0";
$proto40["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto40);

			$proto36["m_contained"][]=$obj;
						$proto42=array();
$proto42["m_sql"] = "Status = 'pre market'";
$proto42["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto42["m_column"]=$obj;
$proto42["m_contained"] = array();
$proto42["m_strCase"] = "= 'pre market'";
$proto42["m_havingmode"] = "0";
$proto42["m_inBrackets"] = "0";
$proto42["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto42);

			$proto36["m_contained"][]=$obj;
						$proto44=array();
$proto44["m_sql"] = "Status = 'under loi'";
$proto44["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto44["m_column"]=$obj;
$proto44["m_contained"] = array();
$proto44["m_strCase"] = "= 'under loi'";
$proto44["m_havingmode"] = "0";
$proto44["m_inBrackets"] = "0";
$proto44["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto44);

			$proto36["m_contained"][]=$obj;
						$proto46=array();
$proto46["m_sql"] = "Status = 'inactive'";
$proto46["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto46["m_column"]=$obj;
$proto46["m_contained"] = array();
$proto46["m_strCase"] = "= 'inactive'";
$proto46["m_havingmode"] = "0";
$proto46["m_inBrackets"] = "0";
$proto46["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto46);

			$proto36["m_contained"][]=$obj;
$proto36["m_strCase"] = "";
$proto36["m_havingmode"] = "0";
$proto36["m_inBrackets"] = "0";
$proto36["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto36);

$proto35["m_where"] = $obj;
$proto48=array();
$proto48["m_sql"] = "";
$proto48["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto48["m_column"]=$obj;
$proto48["m_contained"] = array();
$proto48["m_strCase"] = "";
$proto48["m_havingmode"] = "0";
$proto48["m_inBrackets"] = "0";
$proto48["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto48);

$proto35["m_having"] = $obj;
$proto35["m_fieldlist"] = array();
						$proto50=array();
			$proto51=array();
$proto51["m_functiontype"] = "SQLF_COUNT";
$proto51["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto51["m_arguments"][]=$obj;
$proto51["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto51);

$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto35["m_fieldlist"][]=$obj;
$proto35["m_fromlist"] = array();
												$proto53=array();
$proto53["m_link"] = "SQLL_MAIN";
			$proto54=array();
$proto54["m_strName"] = "company";
$proto54["m_columns"] = array();
$proto54["m_columns"][] = "ID";
$proto54["m_columns"][] = "Company";
$proto54["m_columns"][] = "Deal Slot";
$proto54["m_columns"][] = "IBC Date";
$proto54["m_columns"][] = "EL Date";
$proto54["m_columns"][] = "Project Name";
$proto54["m_columns"][] = "Status";
$proto54["m_columns"][] = "Deal Type";
$proto54["m_columns"][] = "Projected Fee";
$proto54["m_columns"][] = "Projected Transaction Size";
$proto54["m_columns"][] = "Est. Close Date";
$proto54["m_columns"][] = "Primary Banker";
$proto54["m_columns"][] = "Practice Area";
$proto54["m_columns"][] = "Ownership Class";
$proto54["m_columns"][] = "Industry";
$proto54["m_columns"][] = "Referral Type";
$proto54["m_columns"][] = "Referral Source-Company";
$proto54["m_columns"][] = "Referral Scource-Ind.";
$proto54["m_columns"][] = "Description";
$proto54["m_columns"][] = "Dead Date";
$proto54["m_columns"][] = "EL Expiration Date";
$proto54["m_columns"][] = "Engagment Fee";
$proto54["m_columns"][] = "Fee Minimum";
$proto54["m_columns"][] = "Final Total Sucess Fee";
$proto54["m_columns"][] = "Final Transaction Size";
$proto54["m_columns"][] = "Monthly Retainer";
$proto54["m_columns"][] = "Closed Date";
$proto54["m_columns"][] = "Team Split-1";
$proto54["m_columns"][] = "Team-1";
$proto54["m_columns"][] = "Team Split-2";
$proto54["m_columns"][] = "Team-2";
$proto54["m_columns"][] = "Team Split-3";
$proto54["m_columns"][] = "Team Split-4";
$proto54["m_columns"][] = "Team Split-5";
$proto54["m_columns"][] = "Team Split-6";
$proto54["m_columns"][] = "Team-3";
$proto54["m_columns"][] = "Team-4";
$proto54["m_columns"][] = "Team-5";
$proto54["m_columns"][] = "Team-6";
$proto54["m_columns"][] = "Fee Split-1";
$proto54["m_columns"][] = "Fee Split-2";
$proto54["m_columns"][] = "Fee Split-3";
$proto54["m_columns"][] = "Fee Split-4";
$proto54["m_columns"][] = "Fee Split-5";
$proto54["m_columns"][] = "Fee Split-6";
$proto54["m_columns"][] = "Fee To-1";
$proto54["m_columns"][] = "Fee To-2";
$proto54["m_columns"][] = "Fee To-3";
$proto54["m_columns"][] = "Fee To-4";
$proto54["m_columns"][] = "Fee To-5";
$proto54["m_columns"][] = "Fee To-6";
$proto54["m_columns"][] = "Enterpise Value";
$proto54["m_columns"][] = "Fee Details";
$proto54["m_columns"][] = "Split to Corporate";
$proto54["m_columns"][] = "Paul";
$proto54["m_columns"][] = "McBroom";
$proto54["m_columns"][] = "Month of Close";
$proto54["m_columns"][] = "Gross This";
$proto54["m_columns"][] = "Gross Next";
$proto54["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto54);

$proto53["m_table"] = $obj;
$proto53["m_alias"] = "";
$proto55=array();
$proto55["m_sql"] = "";
$proto55["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto55["m_column"]=$obj;
$proto55["m_contained"] = array();
$proto55["m_strCase"] = "";
$proto55["m_havingmode"] = "0";
$proto55["m_inBrackets"] = "0";
$proto55["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto55);

$proto53["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto53);

$proto35["m_fromlist"][]=$obj;
$proto35["m_groupby"] = array();
$proto35["m_orderby"] = array();
$obj = new SQLQuery($proto35);

$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "Live";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$proto58=array();
$proto58["m_strHead"] = "Select";
$proto58["m_strFieldList"] = "Round (100*(`ss`/`live`))";
$proto58["m_strFrom"] = "";
$proto58["m_strWhere"] = "";
$proto58["m_strOrderBy"] = "";
$proto58["m_strTail"] = "";
$proto58["cipherer"] = null;
$proto59=array();
$proto59["m_sql"] = "";
$proto59["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto59["m_column"]=$obj;
$proto59["m_contained"] = array();
$proto59["m_strCase"] = "";
$proto59["m_havingmode"] = "0";
$proto59["m_inBrackets"] = "0";
$proto59["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto59);

$proto58["m_where"] = $obj;
$proto61=array();
$proto61["m_sql"] = "";
$proto61["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto61["m_column"]=$obj;
$proto61["m_contained"] = array();
$proto61["m_strCase"] = "";
$proto61["m_havingmode"] = "0";
$proto61["m_inBrackets"] = "0";
$proto61["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto61);

$proto58["m_having"] = $obj;
$proto58["m_fieldlist"] = array();
						$proto63=array();
			$proto64=array();
$proto64["m_functiontype"] = "SQLF_CUSTOM";
$proto64["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "100*(`ss`/`live`)"
));

$proto64["m_arguments"][]=$obj;
$proto64["m_strFunctionName"] = "Round";
$obj = new SQLFunctionCall($proto64);

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto58["m_fieldlist"][]=$obj;
$proto58["m_fromlist"] = array();
$proto58["m_groupby"] = array();
$proto58["m_orderby"] = array();
$obj = new SQLQuery($proto58);

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "ssovel";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto66=array();
$proto66["m_link"] = "SQLL_MAIN";
			$proto67=array();
$proto67["m_strName"] = "ssvsop";
$proto67["m_columns"] = array();
$proto67["m_columns"][] = "ID";
$proto67["m_columns"][] = "Jan";
$proto67["m_columns"][] = "Feb";
$proto67["m_columns"][] = "Mar";
$proto67["m_columns"][] = "April";
$proto67["m_columns"][] = "May";
$proto67["m_columns"][] = "June";
$proto67["m_columns"][] = "July";
$proto67["m_columns"][] = "Aug";
$proto67["m_columns"][] = "Sept";
$proto67["m_columns"][] = "Oct";
$proto67["m_columns"][] = "Nov";
$proto67["m_columns"][] = "Dec";
$obj = new SQLTable($proto67);

$proto66["m_table"] = $obj;
$proto66["m_alias"] = "";
$proto68=array();
$proto68["m_sql"] = "";
$proto68["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto68["m_column"]=$obj;
$proto68["m_contained"] = array();
$proto68["m_strCase"] = "";
$proto68["m_havingmode"] = "0";
$proto68["m_inBrackets"] = "0";
$proto68["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto68);

$proto66["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto66);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_ssvsop = createSqlQuery_ssvsop();
																$tdatassvsop[".sqlquery"] = $queryData_ssvsop;
	
if(isset($tdatassvsop["field2"])){
	$tdatassvsop["field2"]["LookupTable"] = "carscars_view";
	$tdatassvsop["field2"]["LookupOrderBy"] = "name";
	$tdatassvsop["field2"]["LookupType"] = 4;
	$tdatassvsop["field2"]["LinkField"] = "email";
	$tdatassvsop["field2"]["DisplayField"] = "name";
	$tdatassvsop[".hasCustomViewField"] = true;
}

$tableEvents["ssvsop"] = new eventsBase;
$tdatassvsop[".hasEvents"] = false;

$cipherer = new RunnerCipherer("ssvsop");

?>