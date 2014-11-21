<?php
require_once(getabspath("classes/cipherer.php"));
$tdataChanges_Since_Last_Month = array();
	$tdataChanges_Since_Last_Month[".NumberOfChars"] = 80; 
	$tdataChanges_Since_Last_Month[".ShortName"] = "Changes_Since_Last_Month";
	$tdataChanges_Since_Last_Month[".OwnerID"] = "";
	$tdataChanges_Since_Last_Month[".OriginalTable"] = "company";

//	field labels
$fieldLabelsChanges_Since_Last_Month = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsChanges_Since_Last_Month["English"] = array();
	$fieldToolTipsChanges_Since_Last_Month["English"] = array();
	$fieldLabelsChanges_Since_Last_Month["English"]["ELClient"] = "ELClient";
	$fieldToolTipsChanges_Since_Last_Month["English"]["ELClient"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["ELDealType"] = "ELDeal Type";
	$fieldToolTipsChanges_Since_Last_Month["English"]["ELDealType"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["ELAmount"] = "ELAmount";
	$fieldToolTipsChanges_Since_Last_Month["English"]["ELAmount"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["ELSlot"] = "ELSlot";
	$fieldToolTipsChanges_Since_Last_Month["English"]["ELSlot"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["DSlot"] = "DSlot";
	$fieldToolTipsChanges_Since_Last_Month["English"]["DSlot"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["DAmount"] = "DAmount";
	$fieldToolTipsChanges_Since_Last_Month["English"]["DAmount"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["DDealtype"] = "DDealtype";
	$fieldToolTipsChanges_Since_Last_Month["English"]["DDealtype"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["CClient"] = "CClient";
	$fieldToolTipsChanges_Since_Last_Month["English"]["CClient"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["CDealtype"] = "CDealtype";
	$fieldToolTipsChanges_Since_Last_Month["English"]["CDealtype"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["CAmount"] = "CAmount";
	$fieldToolTipsChanges_Since_Last_Month["English"]["CAmount"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["CSlot"] = "CSlot";
	$fieldToolTipsChanges_Since_Last_Month["English"]["CSlot"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["DClient"] = "DClient";
	$fieldToolTipsChanges_Since_Last_Month["English"]["DClient"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["Closed"] = "Closed";
	$fieldToolTipsChanges_Since_Last_Month["English"]["Closed"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["Deed"] = "Deed";
	$fieldToolTipsChanges_Since_Last_Month["English"]["Deed"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["EL"] = "EL";
	$fieldToolTipsChanges_Since_Last_Month["English"]["EL"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["Live"] = "Live";
	$fieldToolTipsChanges_Since_Last_Month["English"]["Live"] = "";
	$fieldLabelsChanges_Since_Last_Month["English"]["LM"] = "LM";
	$fieldToolTipsChanges_Since_Last_Month["English"]["LM"] = "";
	if (count($fieldToolTipsChanges_Since_Last_Month["English"]))
		$tdataChanges_Since_Last_Month[".isUseToolTips"] = true;
}
	
	
	$tdataChanges_Since_Last_Month[".NCSearch"] = true;



$tdataChanges_Since_Last_Month[".shortTableName"] = "Changes_Since_Last_Month";
$tdataChanges_Since_Last_Month[".nSecOptions"] = 0;
$tdataChanges_Since_Last_Month[".recsPerRowList"] = 1;
$tdataChanges_Since_Last_Month[".mainTableOwnerID"] = "";
$tdataChanges_Since_Last_Month[".moveNext"] = 1;
$tdataChanges_Since_Last_Month[".nType"] = 2;

$tdataChanges_Since_Last_Month[".strOriginalTableName"] = "company";




$tdataChanges_Since_Last_Month[".showAddInPopup"] = false;

$tdataChanges_Since_Last_Month[".showEditInPopup"] = false;

$tdataChanges_Since_Last_Month[".showViewInPopup"] = false;

$tdataChanges_Since_Last_Month[".fieldsForRegister"] = array();

$tdataChanges_Since_Last_Month[".listAjax"] = false;

	$tdataChanges_Since_Last_Month[".audit"] = false;

	$tdataChanges_Since_Last_Month[".locking"] = false;

$tdataChanges_Since_Last_Month[".listIcons"] = true;
$tdataChanges_Since_Last_Month[".edit"] = true;
$tdataChanges_Since_Last_Month[".inlineEdit"] = true;
$tdataChanges_Since_Last_Month[".inlineAdd"] = true;
$tdataChanges_Since_Last_Month[".view"] = true;

$tdataChanges_Since_Last_Month[".exportTo"] = true;

$tdataChanges_Since_Last_Month[".printFriendly"] = true;

$tdataChanges_Since_Last_Month[".delete"] = true;

$tdataChanges_Since_Last_Month[".showSimpleSearchOptions"] = false;

$tdataChanges_Since_Last_Month[".showSearchPanel"] = true;

if (isMobile())
	$tdataChanges_Since_Last_Month[".isUseAjaxSuggest"] = false;
else 
	$tdataChanges_Since_Last_Month[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataChanges_Since_Last_Month[".addPageEvents"] = false;

// use timepicker for search panel
$tdataChanges_Since_Last_Month[".isUseTimeForSearch"] = false;




$tdataChanges_Since_Last_Month[".allSearchFields"] = array();

$tdataChanges_Since_Last_Month[".allSearchFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "EL";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "Live";
$tdataChanges_Since_Last_Month[".allSearchFields"][] = "LM";

$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "EL";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "Live";
$tdataChanges_Since_Last_Month[".googleLikeFields"][] = "LM";


$tdataChanges_Since_Last_Month[".advSearchFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "EL";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "Live";
$tdataChanges_Since_Last_Month[".advSearchFields"][] = "LM";

$tdataChanges_Since_Last_Month[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataChanges_Since_Last_Month[".strOrderBy"] = $tstrOrderBy;

$tdataChanges_Since_Last_Month[".orderindexes"] = array();

$tdataChanges_Since_Last_Month[".sqlHead"] = "SELECT `me-close`.CClient,  `me-close`.CDealtype,  `me-close`.CAmount,  `me-close`.CSlot,  `me-dead`.DClient,  `me-dead`.DDealtype,  `me-dead`.DAmount,  `me-dead`.DSlot,  `me-el`.ELClient,  `me-el`.ELDealType,  `me-el`.ELAmount,  `me-el`.ELSlot,  ( Select COUNT(`me-close`.CClient) From `me-close` ) AS Closed,  ( Select COUNT(`me-dead`.DClient) FROM `me-dead`) AS Deed,  ( Select COUNT(`me-el`.ELClient) FROM `me-el`) AS EL,  (SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive') as Live  ,  ((SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')  -( Select COUNT(`me-el`.ELClient) FROM `me-el`)+( Select COUNT(`me-dead`.DClient) FROM `me-dead`)+ ( Select COUNT(`me-close`.CClient) From `me-close` )) as LM";
$tdataChanges_Since_Last_Month[".sqlFrom"] = "FROM `me-totals`  LEFT OUTER JOIN `me-close` ON `me-totals`.ID = `me-close`.ID  LEFT OUTER JOIN `me-el` ON `me-totals`.ID = `me-el`.ID  LEFT OUTER JOIN `me-dead` ON `me-totals`.ID = `me-dead`.ID";
$tdataChanges_Since_Last_Month[".sqlWhereExpr"] = "";
$tdataChanges_Since_Last_Month[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataChanges_Since_Last_Month[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataChanges_Since_Last_Month[".arrGroupsPerPage"] = $arrGPP;

$tableKeysChanges_Since_Last_Month = array();
$tdataChanges_Since_Last_Month[".Keys"] = $tableKeysChanges_Since_Last_Month;

$tdataChanges_Since_Last_Month[".listFields"] = array();
$tdataChanges_Since_Last_Month[".listFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".listFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".listFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".listFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".listFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".listFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".listFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".listFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".listFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".listFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".listFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".listFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".listFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".listFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".listFields"][] = "EL";
$tdataChanges_Since_Last_Month[".listFields"][] = "Live";
$tdataChanges_Since_Last_Month[".listFields"][] = "LM";

$tdataChanges_Since_Last_Month[".viewFields"] = array();
$tdataChanges_Since_Last_Month[".viewFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".viewFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".viewFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".viewFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".viewFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".viewFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".viewFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".viewFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".viewFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".viewFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".viewFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".viewFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".viewFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".viewFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".viewFields"][] = "EL";
$tdataChanges_Since_Last_Month[".viewFields"][] = "Live";
$tdataChanges_Since_Last_Month[".viewFields"][] = "LM";

$tdataChanges_Since_Last_Month[".addFields"] = array();

$tdataChanges_Since_Last_Month[".inlineAddFields"] = array();
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "EL";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "Live";
$tdataChanges_Since_Last_Month[".inlineAddFields"][] = "LM";

$tdataChanges_Since_Last_Month[".editFields"] = array();

$tdataChanges_Since_Last_Month[".inlineEditFields"] = array();
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "EL";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "Live";
$tdataChanges_Since_Last_Month[".inlineEditFields"][] = "LM";

$tdataChanges_Since_Last_Month[".exportFields"] = array();
$tdataChanges_Since_Last_Month[".exportFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".exportFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".exportFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".exportFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".exportFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".exportFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".exportFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".exportFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".exportFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".exportFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".exportFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".exportFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".exportFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".exportFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".exportFields"][] = "EL";
$tdataChanges_Since_Last_Month[".exportFields"][] = "Live";
$tdataChanges_Since_Last_Month[".exportFields"][] = "LM";

$tdataChanges_Since_Last_Month[".printFields"] = array();
$tdataChanges_Since_Last_Month[".printFields"][] = "CClient";
$tdataChanges_Since_Last_Month[".printFields"][] = "CDealtype";
$tdataChanges_Since_Last_Month[".printFields"][] = "CAmount";
$tdataChanges_Since_Last_Month[".printFields"][] = "CSlot";
$tdataChanges_Since_Last_Month[".printFields"][] = "DClient";
$tdataChanges_Since_Last_Month[".printFields"][] = "DDealtype";
$tdataChanges_Since_Last_Month[".printFields"][] = "DAmount";
$tdataChanges_Since_Last_Month[".printFields"][] = "DSlot";
$tdataChanges_Since_Last_Month[".printFields"][] = "ELClient";
$tdataChanges_Since_Last_Month[".printFields"][] = "ELDealType";
$tdataChanges_Since_Last_Month[".printFields"][] = "ELAmount";
$tdataChanges_Since_Last_Month[".printFields"][] = "ELSlot";
$tdataChanges_Since_Last_Month[".printFields"][] = "Closed";
$tdataChanges_Since_Last_Month[".printFields"][] = "Deed";
$tdataChanges_Since_Last_Month[".printFields"][] = "EL";
$tdataChanges_Since_Last_Month[".printFields"][] = "Live";
$tdataChanges_Since_Last_Month[".printFields"][] = "LM";

//	CClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "CClient";
	$fdata["GoodName"] = "CClient";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CClient"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["CClient"] = $fdata;
//	CDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "CDealtype";
	$fdata["GoodName"] = "CDealtype";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CDealtype"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["CDealtype"] = $fdata;
//	CAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "CAmount";
	$fdata["GoodName"] = "CAmount";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CAmount"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["CAmount"] = $fdata;
//	CSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "CSlot";
	$fdata["GoodName"] = "CSlot";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "CSlot"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["CSlot"] = $fdata;
//	DClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "DClient";
	$fdata["GoodName"] = "DClient";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DClient"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["DClient"] = $fdata;
//	DDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "DDealtype";
	$fdata["GoodName"] = "DDealtype";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DDealtype"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["DDealtype"] = $fdata;
//	DAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "DAmount";
	$fdata["GoodName"] = "DAmount";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DAmount"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["DAmount"] = $fdata;
//	DSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "DSlot";
	$fdata["GoodName"] = "DSlot";
	$fdata["ownerTable"] = "me-dead";
	$fdata["Label"] = "DSlot"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["DSlot"] = $fdata;
//	ELClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "ELClient";
	$fdata["GoodName"] = "ELClient";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELClient"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["ELClient"] = $fdata;
//	ELDealType
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "ELDealType";
	$fdata["GoodName"] = "ELDealType";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELDeal Type"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["ELDealType"] = $fdata;
//	ELAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "ELAmount";
	$fdata["GoodName"] = "ELAmount";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELAmount"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["ELAmount"] = $fdata;
//	ELSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "ELSlot";
	$fdata["GoodName"] = "ELSlot";
	$fdata["ownerTable"] = "me-el";
	$fdata["Label"] = "ELSlot"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
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
	
		
		
	$tdataChanges_Since_Last_Month["ELSlot"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Closed"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Closed"; 
		$fdata["FullName"] = "( Select COUNT(`me-close`.CClient) From `me-close` )";
	
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month["Closed"] = $fdata;
//	Deed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "Deed";
	$fdata["GoodName"] = "Deed";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Deed"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Deed"; 
		$fdata["FullName"] = "( Select COUNT(`me-dead`.DClient) FROM `me-dead`)";
	
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month["Deed"] = $fdata;
//	EL
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "EL";
	$fdata["GoodName"] = "EL";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "EL"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EL"; 
		$fdata["FullName"] = "( Select COUNT(`me-el`.ELClient) FROM `me-el`)";
	
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month["EL"] = $fdata;
//	Live
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
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
		$fdata["FullName"] = "(SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')";
	
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month["Live"] = $fdata;
//	LM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "LM";
	$fdata["GoodName"] = "LM";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "LM"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "LM"; 
		$fdata["FullName"] = "((SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')  -( Select COUNT(`me-el`.ELClient) FROM `me-el`)+( Select COUNT(`me-dead`.DClient) FROM `me-dead`)+ ( Select COUNT(`me-close`.CClient) From `me-close` ))";
	
		
		
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
	
		
		
	$tdataChanges_Since_Last_Month["LM"] = $fdata;

	
$tables_data["Changes Since Last Month"]=&$tdataChanges_Since_Last_Month;
$field_labels["Changes_Since_Last_Month"] = &$fieldLabelsChanges_Since_Last_Month;
$fieldToolTips["Changes Since Last Month"] = &$fieldToolTipsChanges_Since_Last_Month;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Changes Since Last Month"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Changes Since Last Month"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Changes_Since_Last_Month()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "`me-close`.CClient,  `me-close`.CDealtype,  `me-close`.CAmount,  `me-close`.CSlot,  `me-dead`.DClient,  `me-dead`.DDealtype,  `me-dead`.DAmount,  `me-dead`.DSlot,  `me-el`.ELClient,  `me-el`.ELDealType,  `me-el`.ELAmount,  `me-el`.ELSlot,  ( Select COUNT(`me-close`.CClient) From `me-close` ) AS Closed,  ( Select COUNT(`me-dead`.DClient) FROM `me-dead`) AS Deed,  ( Select COUNT(`me-el`.ELClient) FROM `me-el`) AS EL,  (SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive') as Live  ,  ((SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')  -( Select COUNT(`me-el`.ELClient) FROM `me-el`)+( Select COUNT(`me-dead`.DClient) FROM `me-dead`)+ ( Select COUNT(`me-close`.CClient) From `me-close` )) as LM";
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
	"m_strName" => "CClient",
	"m_strTable" => "me-close"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "CDealtype",
	"m_strTable" => "me-close"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "CAmount",
	"m_strTable" => "me-close"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "CSlot",
	"m_strTable" => "me-close"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "DClient",
	"m_strTable" => "me-dead"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "DDealtype",
	"m_strTable" => "me-dead"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "DAmount",
	"m_strTable" => "me-dead"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "DSlot",
	"m_strTable" => "me-dead"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "ELClient",
	"m_strTable" => "me-el"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "ELDealType",
	"m_strTable" => "me-el"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ELAmount",
	"m_strTable" => "me-el"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "ELSlot",
	"m_strTable" => "me-el"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "( Select COUNT(`me-close`.CClient) From `me-close` )"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "Closed";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "( Select COUNT(`me-dead`.DClient) FROM `me-dead`)"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "Deed";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "( Select COUNT(`me-el`.ELClient) FROM `me-el`)"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "EL";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$proto36=array();
$proto36["m_strHead"] = "SELECT";
$proto36["m_strFieldList"] = "COUNT(`Company`.Company)";
$proto36["m_strFrom"] = "FROM Company";
$proto36["m_strWhere"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto36["m_strOrderBy"] = "";
$proto36["m_strTail"] = "";
$proto36["cipherer"] = null;
$proto37=array();
$proto37["m_sql"] = "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'";
$proto37["m_uniontype"] = "SQLL_OR";
	$obj = new SQLNonParsed(array(
	"m_sql" => "Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'"
));

$proto37["m_column"]=$obj;
$proto37["m_contained"] = array();
						$proto39=array();
$proto39["m_sql"] = "Status = 'on hold'";
$proto39["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto39["m_column"]=$obj;
$proto39["m_contained"] = array();
$proto39["m_strCase"] = "= 'on hold'";
$proto39["m_havingmode"] = "0";
$proto39["m_inBrackets"] = "0";
$proto39["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto39);

			$proto37["m_contained"][]=$obj;
						$proto41=array();
$proto41["m_sql"] = "Status = 'in market'";
$proto41["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto41["m_column"]=$obj;
$proto41["m_contained"] = array();
$proto41["m_strCase"] = "= 'in market'";
$proto41["m_havingmode"] = "0";
$proto41["m_inBrackets"] = "0";
$proto41["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto41);

			$proto37["m_contained"][]=$obj;
						$proto43=array();
$proto43["m_sql"] = "Status = 'pre market'";
$proto43["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto43["m_column"]=$obj;
$proto43["m_contained"] = array();
$proto43["m_strCase"] = "= 'pre market'";
$proto43["m_havingmode"] = "0";
$proto43["m_inBrackets"] = "0";
$proto43["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto43);

			$proto37["m_contained"][]=$obj;
						$proto45=array();
$proto45["m_sql"] = "Status = 'under loi'";
$proto45["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto45["m_column"]=$obj;
$proto45["m_contained"] = array();
$proto45["m_strCase"] = "= 'under loi'";
$proto45["m_havingmode"] = "0";
$proto45["m_inBrackets"] = "0";
$proto45["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto45);

			$proto37["m_contained"][]=$obj;
						$proto47=array();
$proto47["m_sql"] = "Status = 'inactive'";
$proto47["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto47["m_column"]=$obj;
$proto47["m_contained"] = array();
$proto47["m_strCase"] = "= 'inactive'";
$proto47["m_havingmode"] = "0";
$proto47["m_inBrackets"] = "0";
$proto47["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto47);

			$proto37["m_contained"][]=$obj;
$proto37["m_strCase"] = "";
$proto37["m_havingmode"] = "0";
$proto37["m_inBrackets"] = "0";
$proto37["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto37);

$proto36["m_where"] = $obj;
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

$proto36["m_having"] = $obj;
$proto36["m_fieldlist"] = array();
						$proto51=array();
			$proto52=array();
$proto52["m_functiontype"] = "SQLF_COUNT";
$proto52["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto52["m_arguments"][]=$obj;
$proto52["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto52);

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto36["m_fieldlist"][]=$obj;
$proto36["m_fromlist"] = array();
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

$proto36["m_fromlist"][]=$obj;
$proto36["m_groupby"] = array();
$proto36["m_orderby"] = array();
$obj = new SQLQuery($proto36);

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "Live";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto58=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "((SELECT COUNT(`Company`.Company) FROM Company WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive')  -( Select COUNT(`me-el`.ELClient) FROM `me-el`)+( Select COUNT(`me-dead`.DClient) FROM `me-dead`)+ ( Select COUNT(`me-close`.CClient) From `me-close` ))"
));

$proto58["m_expr"]=$obj;
$proto58["m_alias"] = "LM";
$obj = new SQLFieldListItem($proto58);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto60=array();
$proto60["m_link"] = "SQLL_MAIN";
			$proto61=array();
$proto61["m_strName"] = "me-totals";
$proto61["m_columns"] = array();
$proto61["m_columns"][] = "ID";
$proto61["m_columns"][] = "CClient";
$proto61["m_columns"][] = "CDealtype";
$proto61["m_columns"][] = "CAmount";
$proto61["m_columns"][] = "CSlot";
$proto61["m_columns"][] = "DClient";
$proto61["m_columns"][] = "DDealtype";
$proto61["m_columns"][] = "DAmount";
$proto61["m_columns"][] = "DSlot";
$proto61["m_columns"][] = "ELClient";
$proto61["m_columns"][] = "ELDealtype";
$proto61["m_columns"][] = "ELAmount";
$proto61["m_columns"][] = "ELSlot";
$obj = new SQLTable($proto61);

$proto60["m_table"] = $obj;
$proto60["m_alias"] = "";
$proto62=array();
$proto62["m_sql"] = "";
$proto62["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto62["m_column"]=$obj;
$proto62["m_contained"] = array();
$proto62["m_strCase"] = "";
$proto62["m_havingmode"] = "0";
$proto62["m_inBrackets"] = "0";
$proto62["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto62);

$proto60["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto60);

$proto0["m_fromlist"][]=$obj;
												$proto64=array();
$proto64["m_link"] = "SQLL_LEFTJOIN";
			$proto65=array();
$proto65["m_strName"] = "me-close";
$proto65["m_columns"] = array();
$proto65["m_columns"][] = "ID";
$proto65["m_columns"][] = "CClient";
$proto65["m_columns"][] = "CDealtype";
$proto65["m_columns"][] = "CAmount";
$proto65["m_columns"][] = "CSlot";
$obj = new SQLTable($proto65);

$proto64["m_table"] = $obj;
$proto64["m_alias"] = "";
$proto66=array();
$proto66["m_sql"] = "`me-totals`.ID = `me-close`.ID";
$proto66["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto66["m_column"]=$obj;
$proto66["m_contained"] = array();
$proto66["m_strCase"] = "= `me-close`.ID";
$proto66["m_havingmode"] = "0";
$proto66["m_inBrackets"] = "0";
$proto66["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto66);

$proto64["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto64);

$proto0["m_fromlist"][]=$obj;
												$proto68=array();
$proto68["m_link"] = "SQLL_LEFTJOIN";
			$proto69=array();
$proto69["m_strName"] = "me-el";
$proto69["m_columns"] = array();
$proto69["m_columns"][] = "ID";
$proto69["m_columns"][] = "ELClient";
$proto69["m_columns"][] = "ELDealType";
$proto69["m_columns"][] = "ELAmount";
$proto69["m_columns"][] = "ELSlot";
$obj = new SQLTable($proto69);

$proto68["m_table"] = $obj;
$proto68["m_alias"] = "";
$proto70=array();
$proto70["m_sql"] = "`me-totals`.ID = `me-el`.ID";
$proto70["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto70["m_column"]=$obj;
$proto70["m_contained"] = array();
$proto70["m_strCase"] = "= `me-el`.ID";
$proto70["m_havingmode"] = "0";
$proto70["m_inBrackets"] = "0";
$proto70["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto70);

$proto68["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto68);

$proto0["m_fromlist"][]=$obj;
												$proto72=array();
$proto72["m_link"] = "SQLL_LEFTJOIN";
			$proto73=array();
$proto73["m_strName"] = "me-dead";
$proto73["m_columns"] = array();
$proto73["m_columns"][] = "ID";
$proto73["m_columns"][] = "DClient";
$proto73["m_columns"][] = "DDealtype";
$proto73["m_columns"][] = "DAmount";
$proto73["m_columns"][] = "DSlot";
$obj = new SQLTable($proto73);

$proto72["m_table"] = $obj;
$proto72["m_alias"] = "";
$proto74=array();
$proto74["m_sql"] = "`me-totals`.ID = `me-dead`.ID";
$proto74["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "me-totals"
));

$proto74["m_column"]=$obj;
$proto74["m_contained"] = array();
$proto74["m_strCase"] = "= `me-dead`.ID";
$proto74["m_havingmode"] = "0";
$proto74["m_inBrackets"] = "0";
$proto74["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto74);

$proto72["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto72);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Changes_Since_Last_Month = createSqlQuery_Changes_Since_Last_Month();
																	$tdataChanges_Since_Last_Month[".sqlquery"] = $queryData_Changes_Since_Last_Month;
	
if(isset($tdataChanges_Since_Last_Month["field2"])){
	$tdataChanges_Since_Last_Month["field2"]["LookupTable"] = "carscars_view";
	$tdataChanges_Since_Last_Month["field2"]["LookupOrderBy"] = "name";
	$tdataChanges_Since_Last_Month["field2"]["LookupType"] = 4;
	$tdataChanges_Since_Last_Month["field2"]["LinkField"] = "email";
	$tdataChanges_Since_Last_Month["field2"]["DisplayField"] = "name";
	$tdataChanges_Since_Last_Month[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Changes_Since_Last_Month_events.php"));
$tableEvents["Changes Since Last Month"] = new eventclass_Changes_Since_Last_Month;
$tdataChanges_Since_Last_Month[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Changes Since Last Month");

?>