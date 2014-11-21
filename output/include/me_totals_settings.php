<?php
require_once(getabspath("classes/cipherer.php"));
$tdatame_totals = array();
	$tdatame_totals[".NumberOfChars"] = 80; 
	$tdatame_totals[".ShortName"] = "me_totals";
	$tdatame_totals[".OwnerID"] = "";
	$tdatame_totals[".OriginalTable"] = "me-totals";

//	field labels
$fieldLabelsme_totals = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsme_totals["English"] = array();
	$fieldToolTipsme_totals["English"] = array();
	$fieldLabelsme_totals["English"]["ID"] = "ID";
	$fieldToolTipsme_totals["English"]["ID"] = "";
	$fieldLabelsme_totals["English"]["CClient"] = "CClient";
	$fieldToolTipsme_totals["English"]["CClient"] = "";
	$fieldLabelsme_totals["English"]["CDealtype"] = "CDealtype";
	$fieldToolTipsme_totals["English"]["CDealtype"] = "";
	$fieldLabelsme_totals["English"]["CAmount"] = "CAmount";
	$fieldToolTipsme_totals["English"]["CAmount"] = "";
	$fieldLabelsme_totals["English"]["CSlot"] = "CSlot";
	$fieldToolTipsme_totals["English"]["CSlot"] = "";
	$fieldLabelsme_totals["English"]["DClient"] = "DClient";
	$fieldToolTipsme_totals["English"]["DClient"] = "";
	$fieldLabelsme_totals["English"]["DDealtype"] = "DDealtype";
	$fieldToolTipsme_totals["English"]["DDealtype"] = "";
	$fieldLabelsme_totals["English"]["DAmount"] = "DAmount";
	$fieldToolTipsme_totals["English"]["DAmount"] = "";
	$fieldLabelsme_totals["English"]["DSlot"] = "DSlot";
	$fieldToolTipsme_totals["English"]["DSlot"] = "";
	$fieldLabelsme_totals["English"]["ELClient"] = "ELClient";
	$fieldToolTipsme_totals["English"]["ELClient"] = "";
	$fieldLabelsme_totals["English"]["ELDealType"] = "ELDeal Type";
	$fieldToolTipsme_totals["English"]["ELDealType"] = "";
	$fieldLabelsme_totals["English"]["ELAmount"] = "ELAmount";
	$fieldToolTipsme_totals["English"]["ELAmount"] = "";
	$fieldLabelsme_totals["English"]["ELSlot"] = "ELSlot";
	$fieldToolTipsme_totals["English"]["ELSlot"] = "";
	if (count($fieldToolTipsme_totals["English"]))
		$tdatame_totals[".isUseToolTips"] = true;
}
	
	
	$tdatame_totals[".NCSearch"] = true;



$tdatame_totals[".shortTableName"] = "me_totals";
$tdatame_totals[".nSecOptions"] = 0;
$tdatame_totals[".recsPerRowList"] = 1;
$tdatame_totals[".mainTableOwnerID"] = "";
$tdatame_totals[".moveNext"] = 1;
$tdatame_totals[".nType"] = 0;

$tdatame_totals[".strOriginalTableName"] = "me-totals";




$tdatame_totals[".showAddInPopup"] = false;

$tdatame_totals[".showEditInPopup"] = false;

$tdatame_totals[".showViewInPopup"] = false;

$tdatame_totals[".fieldsForRegister"] = array();

$tdatame_totals[".listAjax"] = false;

	$tdatame_totals[".audit"] = false;

	$tdatame_totals[".locking"] = false;

$tdatame_totals[".listIcons"] = true;
$tdatame_totals[".edit"] = true;
$tdatame_totals[".inlineEdit"] = true;
$tdatame_totals[".inlineAdd"] = true;
$tdatame_totals[".view"] = true;

$tdatame_totals[".exportTo"] = true;

$tdatame_totals[".printFriendly"] = true;

$tdatame_totals[".delete"] = true;

$tdatame_totals[".showSimpleSearchOptions"] = false;

$tdatame_totals[".showSearchPanel"] = true;

if (isMobile())
	$tdatame_totals[".isUseAjaxSuggest"] = false;
else 
	$tdatame_totals[".isUseAjaxSuggest"] = true;

$tdatame_totals[".rowHighlite"] = true;

// button handlers file names

$tdatame_totals[".addPageEvents"] = false;

// use timepicker for search panel
$tdatame_totals[".isUseTimeForSearch"] = false;




$tdatame_totals[".allSearchFields"] = array();

$tdatame_totals[".allSearchFields"][] = "ID";
$tdatame_totals[".allSearchFields"][] = "CClient";
$tdatame_totals[".allSearchFields"][] = "CDealtype";
$tdatame_totals[".allSearchFields"][] = "CAmount";
$tdatame_totals[".allSearchFields"][] = "CSlot";
$tdatame_totals[".allSearchFields"][] = "DClient";
$tdatame_totals[".allSearchFields"][] = "DDealtype";
$tdatame_totals[".allSearchFields"][] = "DAmount";
$tdatame_totals[".allSearchFields"][] = "DSlot";
$tdatame_totals[".allSearchFields"][] = "ELClient";
$tdatame_totals[".allSearchFields"][] = "ELDealType";
$tdatame_totals[".allSearchFields"][] = "ELAmount";
$tdatame_totals[".allSearchFields"][] = "ELSlot";

$tdatame_totals[".googleLikeFields"][] = "ID";
$tdatame_totals[".googleLikeFields"][] = "CClient";
$tdatame_totals[".googleLikeFields"][] = "CDealtype";
$tdatame_totals[".googleLikeFields"][] = "CAmount";
$tdatame_totals[".googleLikeFields"][] = "CSlot";
$tdatame_totals[".googleLikeFields"][] = "DClient";
$tdatame_totals[".googleLikeFields"][] = "DDealtype";
$tdatame_totals[".googleLikeFields"][] = "DAmount";
$tdatame_totals[".googleLikeFields"][] = "DSlot";
$tdatame_totals[".googleLikeFields"][] = "ELClient";
$tdatame_totals[".googleLikeFields"][] = "ELDealType";
$tdatame_totals[".googleLikeFields"][] = "ELAmount";
$tdatame_totals[".googleLikeFields"][] = "ELSlot";


$tdatame_totals[".advSearchFields"][] = "ID";
$tdatame_totals[".advSearchFields"][] = "CClient";
$tdatame_totals[".advSearchFields"][] = "CDealtype";
$tdatame_totals[".advSearchFields"][] = "CAmount";
$tdatame_totals[".advSearchFields"][] = "CSlot";
$tdatame_totals[".advSearchFields"][] = "DClient";
$tdatame_totals[".advSearchFields"][] = "DDealtype";
$tdatame_totals[".advSearchFields"][] = "DAmount";
$tdatame_totals[".advSearchFields"][] = "DSlot";
$tdatame_totals[".advSearchFields"][] = "ELClient";
$tdatame_totals[".advSearchFields"][] = "ELDealType";
$tdatame_totals[".advSearchFields"][] = "ELAmount";
$tdatame_totals[".advSearchFields"][] = "ELSlot";

$tdatame_totals[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatame_totals[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatame_totals[".strOrderBy"] = $tstrOrderBy;

$tdatame_totals[".orderindexes"] = array();

$tdatame_totals[".sqlHead"] = "SELECT `me-totals`.ID,  `me-close`.CClient,  `me-close`.CDealtype,  `me-close`.CAmount,  `me-close`.CSlot,  `me-dead`.DClient,  `me-dead`.DDealtype,  `me-dead`.DAmount,  `me-dead`.DSlot,  `me-el`.ELClient,  `me-el`.ELDealType,  `me-el`.ELAmount,  `me-el`.ELSlot";
$tdatame_totals[".sqlFrom"] = "FROM `me-totals`  LEFT OUTER JOIN `me-close` ON `me-totals`.ID = `me-close`.ID  LEFT OUTER JOIN `me-el` ON `me-totals`.ID = `me-el`.ID  LEFT OUTER JOIN `me-dead` ON `me-totals`.ID = `me-dead`.ID";
$tdatame_totals[".sqlWhereExpr"] = "";
$tdatame_totals[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatame_totals[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatame_totals[".arrGroupsPerPage"] = $arrGPP;

$tableKeysme_totals = array();
$tdatame_totals[".Keys"] = $tableKeysme_totals;

$tdatame_totals[".listFields"] = array();
$tdatame_totals[".listFields"][] = "ID";
$tdatame_totals[".listFields"][] = "CClient";
$tdatame_totals[".listFields"][] = "CDealtype";
$tdatame_totals[".listFields"][] = "CAmount";
$tdatame_totals[".listFields"][] = "CSlot";
$tdatame_totals[".listFields"][] = "DClient";
$tdatame_totals[".listFields"][] = "DDealtype";
$tdatame_totals[".listFields"][] = "DAmount";
$tdatame_totals[".listFields"][] = "DSlot";
$tdatame_totals[".listFields"][] = "ELClient";
$tdatame_totals[".listFields"][] = "ELDealType";
$tdatame_totals[".listFields"][] = "ELAmount";
$tdatame_totals[".listFields"][] = "ELSlot";

$tdatame_totals[".viewFields"] = array();
$tdatame_totals[".viewFields"][] = "ID";
$tdatame_totals[".viewFields"][] = "CClient";
$tdatame_totals[".viewFields"][] = "CDealtype";
$tdatame_totals[".viewFields"][] = "CAmount";
$tdatame_totals[".viewFields"][] = "CSlot";
$tdatame_totals[".viewFields"][] = "DClient";
$tdatame_totals[".viewFields"][] = "DDealtype";
$tdatame_totals[".viewFields"][] = "DAmount";
$tdatame_totals[".viewFields"][] = "DSlot";
$tdatame_totals[".viewFields"][] = "ELClient";
$tdatame_totals[".viewFields"][] = "ELDealType";
$tdatame_totals[".viewFields"][] = "ELAmount";
$tdatame_totals[".viewFields"][] = "ELSlot";

$tdatame_totals[".addFields"] = array();
$tdatame_totals[".addFields"][] = "ID";
$tdatame_totals[".addFields"][] = "CClient";
$tdatame_totals[".addFields"][] = "CDealtype";
$tdatame_totals[".addFields"][] = "CAmount";
$tdatame_totals[".addFields"][] = "CSlot";
$tdatame_totals[".addFields"][] = "DClient";
$tdatame_totals[".addFields"][] = "DDealtype";
$tdatame_totals[".addFields"][] = "DAmount";
$tdatame_totals[".addFields"][] = "DSlot";
$tdatame_totals[".addFields"][] = "ELClient";
$tdatame_totals[".addFields"][] = "ELDealType";
$tdatame_totals[".addFields"][] = "ELAmount";
$tdatame_totals[".addFields"][] = "ELSlot";

$tdatame_totals[".inlineAddFields"] = array();
$tdatame_totals[".inlineAddFields"][] = "ID";
$tdatame_totals[".inlineAddFields"][] = "CClient";
$tdatame_totals[".inlineAddFields"][] = "CDealtype";
$tdatame_totals[".inlineAddFields"][] = "CAmount";
$tdatame_totals[".inlineAddFields"][] = "CSlot";
$tdatame_totals[".inlineAddFields"][] = "DClient";
$tdatame_totals[".inlineAddFields"][] = "DDealtype";
$tdatame_totals[".inlineAddFields"][] = "DAmount";
$tdatame_totals[".inlineAddFields"][] = "DSlot";
$tdatame_totals[".inlineAddFields"][] = "ELClient";
$tdatame_totals[".inlineAddFields"][] = "ELDealType";
$tdatame_totals[".inlineAddFields"][] = "ELAmount";
$tdatame_totals[".inlineAddFields"][] = "ELSlot";

$tdatame_totals[".editFields"] = array();
$tdatame_totals[".editFields"][] = "ID";
$tdatame_totals[".editFields"][] = "CClient";
$tdatame_totals[".editFields"][] = "CDealtype";
$tdatame_totals[".editFields"][] = "CAmount";
$tdatame_totals[".editFields"][] = "CSlot";
$tdatame_totals[".editFields"][] = "DClient";
$tdatame_totals[".editFields"][] = "DDealtype";
$tdatame_totals[".editFields"][] = "DAmount";
$tdatame_totals[".editFields"][] = "DSlot";
$tdatame_totals[".editFields"][] = "ELClient";
$tdatame_totals[".editFields"][] = "ELDealType";
$tdatame_totals[".editFields"][] = "ELAmount";
$tdatame_totals[".editFields"][] = "ELSlot";

$tdatame_totals[".inlineEditFields"] = array();
$tdatame_totals[".inlineEditFields"][] = "ID";
$tdatame_totals[".inlineEditFields"][] = "CClient";
$tdatame_totals[".inlineEditFields"][] = "CDealtype";
$tdatame_totals[".inlineEditFields"][] = "CAmount";
$tdatame_totals[".inlineEditFields"][] = "CSlot";
$tdatame_totals[".inlineEditFields"][] = "DClient";
$tdatame_totals[".inlineEditFields"][] = "DDealtype";
$tdatame_totals[".inlineEditFields"][] = "DAmount";
$tdatame_totals[".inlineEditFields"][] = "DSlot";
$tdatame_totals[".inlineEditFields"][] = "ELClient";
$tdatame_totals[".inlineEditFields"][] = "ELDealType";
$tdatame_totals[".inlineEditFields"][] = "ELAmount";
$tdatame_totals[".inlineEditFields"][] = "ELSlot";

$tdatame_totals[".exportFields"] = array();
$tdatame_totals[".exportFields"][] = "ID";
$tdatame_totals[".exportFields"][] = "CClient";
$tdatame_totals[".exportFields"][] = "CDealtype";
$tdatame_totals[".exportFields"][] = "CAmount";
$tdatame_totals[".exportFields"][] = "CSlot";
$tdatame_totals[".exportFields"][] = "DClient";
$tdatame_totals[".exportFields"][] = "DDealtype";
$tdatame_totals[".exportFields"][] = "DAmount";
$tdatame_totals[".exportFields"][] = "DSlot";
$tdatame_totals[".exportFields"][] = "ELClient";
$tdatame_totals[".exportFields"][] = "ELDealType";
$tdatame_totals[".exportFields"][] = "ELAmount";
$tdatame_totals[".exportFields"][] = "ELSlot";

$tdatame_totals[".printFields"] = array();
$tdatame_totals[".printFields"][] = "ID";
$tdatame_totals[".printFields"][] = "CClient";
$tdatame_totals[".printFields"][] = "CDealtype";
$tdatame_totals[".printFields"][] = "CAmount";
$tdatame_totals[".printFields"][] = "CSlot";
$tdatame_totals[".printFields"][] = "DClient";
$tdatame_totals[".printFields"][] = "DDealtype";
$tdatame_totals[".printFields"][] = "DAmount";
$tdatame_totals[".printFields"][] = "DSlot";
$tdatame_totals[".printFields"][] = "ELClient";
$tdatame_totals[".printFields"][] = "ELDealType";
$tdatame_totals[".printFields"][] = "ELAmount";
$tdatame_totals[".printFields"][] = "ELSlot";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "me-totals";
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
		$fdata["FullName"] = "`me-totals`.ID";
	
		
		
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
	
		
		
	$tdatame_totals["ID"] = $fdata;
//	CClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "CClient";
	$fdata["GoodName"] = "CClient";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CClient"; 
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
	
		$fdata["strField"] = "CClient"; 
		$fdata["FullName"] = "`me-close`.CClient";
	
		
		
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
	
		
		
	$tdatame_totals["CClient"] = $fdata;
//	CDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "CDealtype";
	$fdata["GoodName"] = "CDealtype";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CDealtype"; 
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
	
		$fdata["strField"] = "CDealtype"; 
		$fdata["FullName"] = "`me-close`.CDealtype";
	
		
		
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
	
		
		
	$tdatame_totals["CDealtype"] = $fdata;
//	CAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "CAmount";
	$fdata["GoodName"] = "CAmount";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CAmount"; 
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
	
		$fdata["strField"] = "CAmount"; 
		$fdata["FullName"] = "`me-close`.CAmount";
	
		
		
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
	
		
		
	$tdatame_totals["CAmount"] = $fdata;
//	CSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "CSlot";
	$fdata["GoodName"] = "CSlot";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CSlot"; 
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
	
		$fdata["strField"] = "CSlot"; 
		$fdata["FullName"] = "`me-close`.CSlot";
	
		
		
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
	
		
		
	$tdatame_totals["CSlot"] = $fdata;
//	DClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "DClient";
	$fdata["GoodName"] = "DClient";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DClient"; 
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
	
		$fdata["strField"] = "DClient"; 
		$fdata["FullName"] = "`me-dead`.DClient";
	
		
		
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
	
		
		
	$tdatame_totals["DClient"] = $fdata;
//	DDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "DDealtype";
	$fdata["GoodName"] = "DDealtype";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DDealtype"; 
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
	
		$fdata["strField"] = "DDealtype"; 
		$fdata["FullName"] = "`me-dead`.DDealtype";
	
		
		
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
	
		
		
	$tdatame_totals["DDealtype"] = $fdata;
//	DAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "DAmount";
	$fdata["GoodName"] = "DAmount";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DAmount"; 
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
	
		$fdata["strField"] = "DAmount"; 
		$fdata["FullName"] = "`me-dead`.DAmount";
	
		
		
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
	
		
		
	$tdatame_totals["DAmount"] = $fdata;
//	DSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "DSlot";
	$fdata["GoodName"] = "DSlot";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DSlot"; 
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
	
		$fdata["strField"] = "DSlot"; 
		$fdata["FullName"] = "`me-dead`.DSlot";
	
		
		
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
	
		
		
	$tdatame_totals["DSlot"] = $fdata;
//	ELClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "ELClient";
	$fdata["GoodName"] = "ELClient";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELClient"; 
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
	
		$fdata["strField"] = "ELClient"; 
		$fdata["FullName"] = "`me-el`.ELClient";
	
		
		
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
	
		
		
	$tdatame_totals["ELClient"] = $fdata;
//	ELDealType
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "ELDealType";
	$fdata["GoodName"] = "ELDealType";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELDeal Type"; 
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
	
		$fdata["strField"] = "ELDealType"; 
		$fdata["FullName"] = "`me-el`.ELDealType";
	
		
		
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
	
		
		
	$tdatame_totals["ELDealType"] = $fdata;
//	ELAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "ELAmount";
	$fdata["GoodName"] = "ELAmount";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELAmount"; 
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
	
		$fdata["strField"] = "ELAmount"; 
		$fdata["FullName"] = "`me-el`.ELAmount";
	
		
		
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
	
		
		
	$tdatame_totals["ELAmount"] = $fdata;
//	ELSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "ELSlot";
	$fdata["GoodName"] = "ELSlot";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELSlot"; 
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
	
		$fdata["strField"] = "ELSlot"; 
		$fdata["FullName"] = "`me-el`.ELSlot";
	
		
		
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
	
		
		
	$tdatame_totals["ELSlot"] = $fdata;

	
$tables_data["me-totals"]=&$tdatame_totals;
$field_labels["me_totals"] = &$fieldLabelsme_totals;
$fieldToolTips["me-totals"] = &$fieldToolTipsme_totals;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["me-totals"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["me-totals"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_me_totals()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "`me-totals`.ID,  `me-close`.CClient,  `me-close`.CDealtype,  `me-close`.CAmount,  `me-close`.CSlot,  `me-dead`.DClient,  `me-dead`.DDealtype,  `me-dead`.DAmount,  `me-dead`.DSlot,  `me-el`.ELClient,  `me-el`.ELDealType,  `me-el`.ELAmount,  `me-el`.ELSlot";
$proto0["m_strFrom"] = "FROM `me-totals`  LEFT OUTER JOIN `me-close` ON `me-totals`.ID = `me-close`.ID  LEFT OUTER JOIN `me-el` ON `me-totals`.ID = `me-el`.ID  LEFT OUTER JOIN `me-dead` ON `me-totals`.ID = `me-dead`.ID";
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
	"m_strTable" => "me-totals"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "CClient",
	"m_strTable" => "me-close"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "CDealtype",
	"m_strTable" => "me-close"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "CAmount",
	"m_strTable" => "me-close"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "CSlot",
	"m_strTable" => "me-close"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "DClient",
	"m_strTable" => "me-dead"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "DDealtype",
	"m_strTable" => "me-dead"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "DAmount",
	"m_strTable" => "me-dead"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "DSlot",
	"m_strTable" => "me-dead"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "ELClient",
	"m_strTable" => "me-el"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ELDealType",
	"m_strTable" => "me-el"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "ELAmount",
	"m_strTable" => "me-el"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "ELSlot",
	"m_strTable" => "me-el"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "me-totals";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "ID";
$proto32["m_columns"][] = "CClient";
$proto32["m_columns"][] = "CDealtype";
$proto32["m_columns"][] = "CAmount";
$proto32["m_columns"][] = "CSlot";
$proto32["m_columns"][] = "DClient";
$proto32["m_columns"][] = "DDealtype";
$proto32["m_columns"][] = "DAmount";
$proto32["m_columns"][] = "DSlot";
$proto32["m_columns"][] = "ELClient";
$proto32["m_columns"][] = "ELDealtype";
$proto32["m_columns"][] = "ELAmount";
$proto32["m_columns"][] = "ELSlot";
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
												$proto35=array();
$proto35["m_link"] = "SQLL_LEFTJOIN";
			$proto36=array();
$proto36["m_strName"] = "me-close";
$proto36["m_columns"] = array();
$proto36["m_columns"][] = "ID";
$proto36["m_columns"][] = "CClient";
$proto36["m_columns"][] = "CDealtype";
$proto36["m_columns"][] = "CAmount";
$proto36["m_columns"][] = "CSlot";
$obj = new SQLTable($proto36);

$proto35["m_table"] = $obj;
$proto35["m_alias"] = "";
$proto37=array();
$proto37["m_sql"] = "`me-totals`.ID = `me-close`.ID";
$proto37["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto37["m_column"]=$obj;
$proto37["m_contained"] = array();
$proto37["m_strCase"] = "= `me-close`.ID";
$proto37["m_havingmode"] = "0";
$proto37["m_inBrackets"] = "0";
$proto37["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto37);

$proto35["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto35);

$proto0["m_fromlist"][]=$obj;
												$proto39=array();
$proto39["m_link"] = "SQLL_LEFTJOIN";
			$proto40=array();
$proto40["m_strName"] = "me-el";
$proto40["m_columns"] = array();
$proto40["m_columns"][] = "ID";
$proto40["m_columns"][] = "ELClient";
$proto40["m_columns"][] = "ELDealType";
$proto40["m_columns"][] = "ELAmount";
$proto40["m_columns"][] = "ELSlot";
$obj = new SQLTable($proto40);

$proto39["m_table"] = $obj;
$proto39["m_alias"] = "";
$proto41=array();
$proto41["m_sql"] = "`me-totals`.ID = `me-el`.ID";
$proto41["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto41["m_column"]=$obj;
$proto41["m_contained"] = array();
$proto41["m_strCase"] = "= `me-el`.ID";
$proto41["m_havingmode"] = "0";
$proto41["m_inBrackets"] = "0";
$proto41["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto41);

$proto39["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto39);

$proto0["m_fromlist"][]=$obj;
												$proto43=array();
$proto43["m_link"] = "SQLL_LEFTJOIN";
			$proto44=array();
$proto44["m_strName"] = "me-dead";
$proto44["m_columns"] = array();
$proto44["m_columns"][] = "ID";
$proto44["m_columns"][] = "DClient";
$proto44["m_columns"][] = "DDealtype";
$proto44["m_columns"][] = "DAmount";
$proto44["m_columns"][] = "DSlot";
$obj = new SQLTable($proto44);

$proto43["m_table"] = $obj;
$proto43["m_alias"] = "";
$proto45=array();
$proto45["m_sql"] = "`me-totals`.ID = `me-dead`.ID";
$proto45["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto45["m_column"]=$obj;
$proto45["m_contained"] = array();
$proto45["m_strCase"] = "= `me-dead`.ID";
$proto45["m_havingmode"] = "0";
$proto45["m_inBrackets"] = "0";
$proto45["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto45);

$proto43["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto43);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_me_totals = createSqlQuery_me_totals();
													$tdatame_totals[".sqlquery"] = $queryData_me_totals;
	
if(isset($tdatame_totals["field2"])){
	$tdatame_totals["field2"]["LookupTable"] = "carscars_view";
	$tdatame_totals["field2"]["LookupOrderBy"] = "name";
	$tdatame_totals["field2"]["LookupType"] = 4;
	$tdatame_totals["field2"]["LinkField"] = "email";
	$tdatame_totals["field2"]["DisplayField"] = "name";
	$tdatame_totals[".hasCustomViewField"] = true;
}

$tableEvents["me-totals"] = new eventsBase;
$tdatame_totals[".hasEvents"] = false;

$cipherer = new RunnerCipherer("me-totals");

?>