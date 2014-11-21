<?php
require_once(getabspath("classes/cipherer.php"));
$tdatachanges_last_month_end = array();
	$tdatachanges_last_month_end[".NumberOfChars"] = 80; 
	$tdatachanges_last_month_end[".ShortName"] = "changes_last_month_end";
	$tdatachanges_last_month_end[".OwnerID"] = "";
	$tdatachanges_last_month_end[".OriginalTable"] = "changes last month end";

//	field labels
$fieldLabelschanges_last_month_end = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelschanges_last_month_end["English"] = array();
	$fieldToolTipschanges_last_month_end["English"] = array();
	$fieldLabelschanges_last_month_end["English"]["ID"] = "ID";
	$fieldToolTipschanges_last_month_end["English"]["ID"] = "";
	$fieldLabelschanges_last_month_end["English"]["LMLive"] = "LMLive";
	$fieldToolTipschanges_last_month_end["English"]["LMLive"] = "";
	$fieldLabelschanges_last_month_end["English"]["Closed"] = "Closed";
	$fieldToolTipschanges_last_month_end["English"]["Closed"] = "";
	$fieldLabelschanges_last_month_end["English"]["Dead"] = "Dead";
	$fieldToolTipschanges_last_month_end["English"]["Dead"] = "";
	$fieldLabelschanges_last_month_end["English"]["NewEl"] = "New El";
	$fieldToolTipschanges_last_month_end["English"]["NewEl"] = "";
	$fieldLabelschanges_last_month_end["English"]["CurrentLive"] = "Current Live";
	$fieldToolTipschanges_last_month_end["English"]["CurrentLive"] = "";
	$fieldLabelschanges_last_month_end["English"]["CClient"] = "CClient";
	$fieldToolTipschanges_last_month_end["English"]["CClient"] = "";
	$fieldLabelschanges_last_month_end["English"]["CDealtype"] = "CDealtype";
	$fieldToolTipschanges_last_month_end["English"]["CDealtype"] = "";
	$fieldLabelschanges_last_month_end["English"]["CAmount"] = "CAmount";
	$fieldToolTipschanges_last_month_end["English"]["CAmount"] = "";
	$fieldLabelschanges_last_month_end["English"]["CSlot"] = "CSlot";
	$fieldToolTipschanges_last_month_end["English"]["CSlot"] = "";
	$fieldLabelschanges_last_month_end["English"]["DClient"] = "DClient";
	$fieldToolTipschanges_last_month_end["English"]["DClient"] = "";
	$fieldLabelschanges_last_month_end["English"]["DDealtype"] = "DDealtype";
	$fieldToolTipschanges_last_month_end["English"]["DDealtype"] = "";
	$fieldLabelschanges_last_month_end["English"]["DAmount"] = "DAmount";
	$fieldToolTipschanges_last_month_end["English"]["DAmount"] = "";
	$fieldLabelschanges_last_month_end["English"]["DSlot"] = "DSlot";
	$fieldToolTipschanges_last_month_end["English"]["DSlot"] = "";
	$fieldLabelschanges_last_month_end["English"]["ELClinet"] = "ELClinet";
	$fieldToolTipschanges_last_month_end["English"]["ELClinet"] = "";
	$fieldLabelschanges_last_month_end["English"]["ELDealType"] = "ELDeal Type";
	$fieldToolTipschanges_last_month_end["English"]["ELDealType"] = "";
	$fieldLabelschanges_last_month_end["English"]["ELAmount"] = "ELAmount";
	$fieldToolTipschanges_last_month_end["English"]["ELAmount"] = "";
	$fieldLabelschanges_last_month_end["English"]["ELSlot"] = "ELSlot";
	$fieldToolTipschanges_last_month_end["English"]["ELSlot"] = "";
	if (count($fieldToolTipschanges_last_month_end["English"]))
		$tdatachanges_last_month_end[".isUseToolTips"] = true;
}
	
	
	$tdatachanges_last_month_end[".NCSearch"] = true;



$tdatachanges_last_month_end[".shortTableName"] = "changes_last_month_end";
$tdatachanges_last_month_end[".nSecOptions"] = 0;
$tdatachanges_last_month_end[".recsPerRowList"] = 1;
$tdatachanges_last_month_end[".mainTableOwnerID"] = "";
$tdatachanges_last_month_end[".moveNext"] = 1;
$tdatachanges_last_month_end[".nType"] = 0;

$tdatachanges_last_month_end[".strOriginalTableName"] = "changes last month end";




$tdatachanges_last_month_end[".showAddInPopup"] = false;

$tdatachanges_last_month_end[".showEditInPopup"] = false;

$tdatachanges_last_month_end[".showViewInPopup"] = false;

$tdatachanges_last_month_end[".fieldsForRegister"] = array();

$tdatachanges_last_month_end[".listAjax"] = false;

	$tdatachanges_last_month_end[".audit"] = false;

	$tdatachanges_last_month_end[".locking"] = false;

$tdatachanges_last_month_end[".listIcons"] = true;
$tdatachanges_last_month_end[".edit"] = true;
$tdatachanges_last_month_end[".inlineEdit"] = true;
$tdatachanges_last_month_end[".inlineAdd"] = true;
$tdatachanges_last_month_end[".view"] = true;

$tdatachanges_last_month_end[".exportTo"] = true;

$tdatachanges_last_month_end[".printFriendly"] = true;

$tdatachanges_last_month_end[".delete"] = true;

$tdatachanges_last_month_end[".showSimpleSearchOptions"] = false;

$tdatachanges_last_month_end[".showSearchPanel"] = true;

if (isMobile())
	$tdatachanges_last_month_end[".isUseAjaxSuggest"] = false;
else 
	$tdatachanges_last_month_end[".isUseAjaxSuggest"] = true;

$tdatachanges_last_month_end[".rowHighlite"] = true;

// button handlers file names

$tdatachanges_last_month_end[".addPageEvents"] = false;

// use timepicker for search panel
$tdatachanges_last_month_end[".isUseTimeForSearch"] = false;




$tdatachanges_last_month_end[".allSearchFields"] = array();

$tdatachanges_last_month_end[".allSearchFields"][] = "ID";
$tdatachanges_last_month_end[".allSearchFields"][] = "LMLive";
$tdatachanges_last_month_end[".allSearchFields"][] = "Closed";
$tdatachanges_last_month_end[".allSearchFields"][] = "Dead";
$tdatachanges_last_month_end[".allSearchFields"][] = "NewEl";
$tdatachanges_last_month_end[".allSearchFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".allSearchFields"][] = "CClient";
$tdatachanges_last_month_end[".allSearchFields"][] = "CDealtype";
$tdatachanges_last_month_end[".allSearchFields"][] = "CAmount";
$tdatachanges_last_month_end[".allSearchFields"][] = "CSlot";
$tdatachanges_last_month_end[".allSearchFields"][] = "DClient";
$tdatachanges_last_month_end[".allSearchFields"][] = "DDealtype";
$tdatachanges_last_month_end[".allSearchFields"][] = "DAmount";
$tdatachanges_last_month_end[".allSearchFields"][] = "DSlot";
$tdatachanges_last_month_end[".allSearchFields"][] = "ELClinet";
$tdatachanges_last_month_end[".allSearchFields"][] = "ELDealType";
$tdatachanges_last_month_end[".allSearchFields"][] = "ELAmount";
$tdatachanges_last_month_end[".allSearchFields"][] = "ELSlot";

$tdatachanges_last_month_end[".googleLikeFields"][] = "ID";
$tdatachanges_last_month_end[".googleLikeFields"][] = "LMLive";
$tdatachanges_last_month_end[".googleLikeFields"][] = "Closed";
$tdatachanges_last_month_end[".googleLikeFields"][] = "Dead";
$tdatachanges_last_month_end[".googleLikeFields"][] = "NewEl";
$tdatachanges_last_month_end[".googleLikeFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".googleLikeFields"][] = "CClient";
$tdatachanges_last_month_end[".googleLikeFields"][] = "CDealtype";
$tdatachanges_last_month_end[".googleLikeFields"][] = "CAmount";
$tdatachanges_last_month_end[".googleLikeFields"][] = "CSlot";
$tdatachanges_last_month_end[".googleLikeFields"][] = "DClient";
$tdatachanges_last_month_end[".googleLikeFields"][] = "DDealtype";
$tdatachanges_last_month_end[".googleLikeFields"][] = "DAmount";
$tdatachanges_last_month_end[".googleLikeFields"][] = "DSlot";
$tdatachanges_last_month_end[".googleLikeFields"][] = "ELClinet";
$tdatachanges_last_month_end[".googleLikeFields"][] = "ELDealType";
$tdatachanges_last_month_end[".googleLikeFields"][] = "ELAmount";
$tdatachanges_last_month_end[".googleLikeFields"][] = "ELSlot";


$tdatachanges_last_month_end[".advSearchFields"][] = "ID";
$tdatachanges_last_month_end[".advSearchFields"][] = "LMLive";
$tdatachanges_last_month_end[".advSearchFields"][] = "Closed";
$tdatachanges_last_month_end[".advSearchFields"][] = "Dead";
$tdatachanges_last_month_end[".advSearchFields"][] = "NewEl";
$tdatachanges_last_month_end[".advSearchFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".advSearchFields"][] = "CClient";
$tdatachanges_last_month_end[".advSearchFields"][] = "CDealtype";
$tdatachanges_last_month_end[".advSearchFields"][] = "CAmount";
$tdatachanges_last_month_end[".advSearchFields"][] = "CSlot";
$tdatachanges_last_month_end[".advSearchFields"][] = "DClient";
$tdatachanges_last_month_end[".advSearchFields"][] = "DDealtype";
$tdatachanges_last_month_end[".advSearchFields"][] = "DAmount";
$tdatachanges_last_month_end[".advSearchFields"][] = "DSlot";
$tdatachanges_last_month_end[".advSearchFields"][] = "ELClinet";
$tdatachanges_last_month_end[".advSearchFields"][] = "ELDealType";
$tdatachanges_last_month_end[".advSearchFields"][] = "ELAmount";
$tdatachanges_last_month_end[".advSearchFields"][] = "ELSlot";

$tdatachanges_last_month_end[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatachanges_last_month_end[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY ELClinet DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatachanges_last_month_end[".strOrderBy"] = $tstrOrderBy;

$tdatachanges_last_month_end[".orderindexes"] = array();
$tdatachanges_last_month_end[".orderindexes"][] = array(15, (0 ? "ASC" : "DESC"), "ELClinet");

$tdatachanges_last_month_end[".sqlHead"] = "SELECT ID,  LMLive,  Closed,  Dead,  NewEl,  CurrentLive,  CClient,  CDealtype,  CAmount,  CSlot,  DClient,  DDealtype,  DAmount,  DSlot,  ELClinet,  ELDealType,  ELAmount,  ELSlot";
$tdatachanges_last_month_end[".sqlFrom"] = "FROM `changes last month end`";
$tdatachanges_last_month_end[".sqlWhereExpr"] = "";
$tdatachanges_last_month_end[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatachanges_last_month_end[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatachanges_last_month_end[".arrGroupsPerPage"] = $arrGPP;

$tableKeyschanges_last_month_end = array();
$tableKeyschanges_last_month_end[] = "ID";
$tdatachanges_last_month_end[".Keys"] = $tableKeyschanges_last_month_end;

$tdatachanges_last_month_end[".listFields"] = array();
$tdatachanges_last_month_end[".listFields"][] = "ID";
$tdatachanges_last_month_end[".listFields"][] = "LMLive";
$tdatachanges_last_month_end[".listFields"][] = "Closed";
$tdatachanges_last_month_end[".listFields"][] = "Dead";
$tdatachanges_last_month_end[".listFields"][] = "NewEl";
$tdatachanges_last_month_end[".listFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".listFields"][] = "CClient";
$tdatachanges_last_month_end[".listFields"][] = "CDealtype";
$tdatachanges_last_month_end[".listFields"][] = "CAmount";
$tdatachanges_last_month_end[".listFields"][] = "CSlot";
$tdatachanges_last_month_end[".listFields"][] = "DClient";
$tdatachanges_last_month_end[".listFields"][] = "DDealtype";
$tdatachanges_last_month_end[".listFields"][] = "DAmount";
$tdatachanges_last_month_end[".listFields"][] = "DSlot";
$tdatachanges_last_month_end[".listFields"][] = "ELClinet";
$tdatachanges_last_month_end[".listFields"][] = "ELDealType";
$tdatachanges_last_month_end[".listFields"][] = "ELAmount";
$tdatachanges_last_month_end[".listFields"][] = "ELSlot";

$tdatachanges_last_month_end[".viewFields"] = array();
$tdatachanges_last_month_end[".viewFields"][] = "ID";
$tdatachanges_last_month_end[".viewFields"][] = "LMLive";
$tdatachanges_last_month_end[".viewFields"][] = "Closed";
$tdatachanges_last_month_end[".viewFields"][] = "Dead";
$tdatachanges_last_month_end[".viewFields"][] = "NewEl";
$tdatachanges_last_month_end[".viewFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".viewFields"][] = "CClient";
$tdatachanges_last_month_end[".viewFields"][] = "CDealtype";
$tdatachanges_last_month_end[".viewFields"][] = "CAmount";
$tdatachanges_last_month_end[".viewFields"][] = "CSlot";
$tdatachanges_last_month_end[".viewFields"][] = "DClient";
$tdatachanges_last_month_end[".viewFields"][] = "DDealtype";
$tdatachanges_last_month_end[".viewFields"][] = "DAmount";
$tdatachanges_last_month_end[".viewFields"][] = "DSlot";
$tdatachanges_last_month_end[".viewFields"][] = "ELClinet";
$tdatachanges_last_month_end[".viewFields"][] = "ELDealType";
$tdatachanges_last_month_end[".viewFields"][] = "ELAmount";
$tdatachanges_last_month_end[".viewFields"][] = "ELSlot";

$tdatachanges_last_month_end[".addFields"] = array();
$tdatachanges_last_month_end[".addFields"][] = "LMLive";
$tdatachanges_last_month_end[".addFields"][] = "Closed";
$tdatachanges_last_month_end[".addFields"][] = "Dead";
$tdatachanges_last_month_end[".addFields"][] = "NewEl";
$tdatachanges_last_month_end[".addFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".addFields"][] = "CClient";
$tdatachanges_last_month_end[".addFields"][] = "CDealtype";
$tdatachanges_last_month_end[".addFields"][] = "CAmount";
$tdatachanges_last_month_end[".addFields"][] = "CSlot";
$tdatachanges_last_month_end[".addFields"][] = "DClient";
$tdatachanges_last_month_end[".addFields"][] = "DDealtype";
$tdatachanges_last_month_end[".addFields"][] = "DAmount";
$tdatachanges_last_month_end[".addFields"][] = "DSlot";
$tdatachanges_last_month_end[".addFields"][] = "ELClinet";
$tdatachanges_last_month_end[".addFields"][] = "ELDealType";
$tdatachanges_last_month_end[".addFields"][] = "ELAmount";
$tdatachanges_last_month_end[".addFields"][] = "ELSlot";

$tdatachanges_last_month_end[".inlineAddFields"] = array();
$tdatachanges_last_month_end[".inlineAddFields"][] = "LMLive";
$tdatachanges_last_month_end[".inlineAddFields"][] = "Closed";
$tdatachanges_last_month_end[".inlineAddFields"][] = "Dead";
$tdatachanges_last_month_end[".inlineAddFields"][] = "NewEl";
$tdatachanges_last_month_end[".inlineAddFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".inlineAddFields"][] = "CClient";
$tdatachanges_last_month_end[".inlineAddFields"][] = "CDealtype";
$tdatachanges_last_month_end[".inlineAddFields"][] = "CAmount";
$tdatachanges_last_month_end[".inlineAddFields"][] = "CSlot";
$tdatachanges_last_month_end[".inlineAddFields"][] = "DClient";
$tdatachanges_last_month_end[".inlineAddFields"][] = "DDealtype";
$tdatachanges_last_month_end[".inlineAddFields"][] = "DAmount";
$tdatachanges_last_month_end[".inlineAddFields"][] = "DSlot";
$tdatachanges_last_month_end[".inlineAddFields"][] = "ELClinet";
$tdatachanges_last_month_end[".inlineAddFields"][] = "ELDealType";
$tdatachanges_last_month_end[".inlineAddFields"][] = "ELAmount";
$tdatachanges_last_month_end[".inlineAddFields"][] = "ELSlot";

$tdatachanges_last_month_end[".editFields"] = array();
$tdatachanges_last_month_end[".editFields"][] = "LMLive";
$tdatachanges_last_month_end[".editFields"][] = "Closed";
$tdatachanges_last_month_end[".editFields"][] = "Dead";
$tdatachanges_last_month_end[".editFields"][] = "NewEl";
$tdatachanges_last_month_end[".editFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".editFields"][] = "CClient";
$tdatachanges_last_month_end[".editFields"][] = "CDealtype";
$tdatachanges_last_month_end[".editFields"][] = "CAmount";
$tdatachanges_last_month_end[".editFields"][] = "CSlot";
$tdatachanges_last_month_end[".editFields"][] = "DClient";
$tdatachanges_last_month_end[".editFields"][] = "DDealtype";
$tdatachanges_last_month_end[".editFields"][] = "DAmount";
$tdatachanges_last_month_end[".editFields"][] = "DSlot";
$tdatachanges_last_month_end[".editFields"][] = "ELClinet";
$tdatachanges_last_month_end[".editFields"][] = "ELDealType";
$tdatachanges_last_month_end[".editFields"][] = "ELAmount";
$tdatachanges_last_month_end[".editFields"][] = "ELSlot";

$tdatachanges_last_month_end[".inlineEditFields"] = array();
$tdatachanges_last_month_end[".inlineEditFields"][] = "LMLive";
$tdatachanges_last_month_end[".inlineEditFields"][] = "Closed";
$tdatachanges_last_month_end[".inlineEditFields"][] = "Dead";
$tdatachanges_last_month_end[".inlineEditFields"][] = "NewEl";
$tdatachanges_last_month_end[".inlineEditFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".inlineEditFields"][] = "CClient";
$tdatachanges_last_month_end[".inlineEditFields"][] = "CDealtype";
$tdatachanges_last_month_end[".inlineEditFields"][] = "CAmount";
$tdatachanges_last_month_end[".inlineEditFields"][] = "CSlot";
$tdatachanges_last_month_end[".inlineEditFields"][] = "DClient";
$tdatachanges_last_month_end[".inlineEditFields"][] = "DDealtype";
$tdatachanges_last_month_end[".inlineEditFields"][] = "DAmount";
$tdatachanges_last_month_end[".inlineEditFields"][] = "DSlot";
$tdatachanges_last_month_end[".inlineEditFields"][] = "ELClinet";
$tdatachanges_last_month_end[".inlineEditFields"][] = "ELDealType";
$tdatachanges_last_month_end[".inlineEditFields"][] = "ELAmount";
$tdatachanges_last_month_end[".inlineEditFields"][] = "ELSlot";

$tdatachanges_last_month_end[".exportFields"] = array();
$tdatachanges_last_month_end[".exportFields"][] = "ID";
$tdatachanges_last_month_end[".exportFields"][] = "LMLive";
$tdatachanges_last_month_end[".exportFields"][] = "Closed";
$tdatachanges_last_month_end[".exportFields"][] = "Dead";
$tdatachanges_last_month_end[".exportFields"][] = "NewEl";
$tdatachanges_last_month_end[".exportFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".exportFields"][] = "CClient";
$tdatachanges_last_month_end[".exportFields"][] = "CDealtype";
$tdatachanges_last_month_end[".exportFields"][] = "CAmount";
$tdatachanges_last_month_end[".exportFields"][] = "CSlot";
$tdatachanges_last_month_end[".exportFields"][] = "DClient";
$tdatachanges_last_month_end[".exportFields"][] = "DDealtype";
$tdatachanges_last_month_end[".exportFields"][] = "DAmount";
$tdatachanges_last_month_end[".exportFields"][] = "DSlot";
$tdatachanges_last_month_end[".exportFields"][] = "ELClinet";
$tdatachanges_last_month_end[".exportFields"][] = "ELDealType";
$tdatachanges_last_month_end[".exportFields"][] = "ELAmount";
$tdatachanges_last_month_end[".exportFields"][] = "ELSlot";

$tdatachanges_last_month_end[".printFields"] = array();
$tdatachanges_last_month_end[".printFields"][] = "ID";
$tdatachanges_last_month_end[".printFields"][] = "LMLive";
$tdatachanges_last_month_end[".printFields"][] = "Closed";
$tdatachanges_last_month_end[".printFields"][] = "Dead";
$tdatachanges_last_month_end[".printFields"][] = "NewEl";
$tdatachanges_last_month_end[".printFields"][] = "CurrentLive";
$tdatachanges_last_month_end[".printFields"][] = "CClient";
$tdatachanges_last_month_end[".printFields"][] = "CDealtype";
$tdatachanges_last_month_end[".printFields"][] = "CAmount";
$tdatachanges_last_month_end[".printFields"][] = "CSlot";
$tdatachanges_last_month_end[".printFields"][] = "DClient";
$tdatachanges_last_month_end[".printFields"][] = "DDealtype";
$tdatachanges_last_month_end[".printFields"][] = "DAmount";
$tdatachanges_last_month_end[".printFields"][] = "DSlot";
$tdatachanges_last_month_end[".printFields"][] = "ELClinet";
$tdatachanges_last_month_end[".printFields"][] = "ELDealType";
$tdatachanges_last_month_end[".printFields"][] = "ELAmount";
$tdatachanges_last_month_end[".printFields"][] = "ELSlot";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "changes last month end";
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
	
		
		
	$tdatachanges_last_month_end["ID"] = $fdata;
//	LMLive
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "LMLive";
	$fdata["GoodName"] = "LMLive";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "LMLive"; 
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
	
		$fdata["strField"] = "LMLive"; 
		$fdata["FullName"] = "LMLive";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["LMLive"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "Closed"; 
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
	
		$fdata["strField"] = "Closed"; 
		$fdata["FullName"] = "Closed";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["Closed"] = $fdata;
//	Dead
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Dead";
	$fdata["GoodName"] = "Dead";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "Dead"; 
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
	
		$fdata["strField"] = "Dead"; 
		$fdata["FullName"] = "Dead";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["Dead"] = $fdata;
//	NewEl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "NewEl";
	$fdata["GoodName"] = "NewEl";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "New El"; 
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
	
		$fdata["strField"] = "NewEl"; 
		$fdata["FullName"] = "NewEl";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["NewEl"] = $fdata;
//	CurrentLive
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "CurrentLive";
	$fdata["GoodName"] = "CurrentLive";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "Current Live"; 
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
	
		$fdata["strField"] = "CurrentLive"; 
		$fdata["FullName"] = "CurrentLive";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["CurrentLive"] = $fdata;
//	CClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "CClient";
	$fdata["GoodName"] = "CClient";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "CClient";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["CClient"] = $fdata;
//	CDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "CDealtype";
	$fdata["GoodName"] = "CDealtype";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "CDealtype";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["CDealtype"] = $fdata;
//	CAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "CAmount";
	$fdata["GoodName"] = "CAmount";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "CAmount";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["CAmount"] = $fdata;
//	CSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "CSlot";
	$fdata["GoodName"] = "CSlot";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "CSlot";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["CSlot"] = $fdata;
//	DClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "DClient";
	$fdata["GoodName"] = "DClient";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "DClient";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["DClient"] = $fdata;
//	DDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "DDealtype";
	$fdata["GoodName"] = "DDealtype";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "DDealtype";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["DDealtype"] = $fdata;
//	DAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "DAmount";
	$fdata["GoodName"] = "DAmount";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "DAmount";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["DAmount"] = $fdata;
//	DSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "DSlot";
	$fdata["GoodName"] = "DSlot";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "DSlot";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["DSlot"] = $fdata;
//	ELClinet
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "ELClinet";
	$fdata["GoodName"] = "ELClinet";
	$fdata["ownerTable"] = "changes last month end";
	$fdata["Label"] = "ELClinet"; 
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
	
		$fdata["strField"] = "ELClinet"; 
		$fdata["FullName"] = "ELClinet";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["ELClinet"] = $fdata;
//	ELDealType
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "ELDealType";
	$fdata["GoodName"] = "ELDealType";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "ELDealType";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["ELDealType"] = $fdata;
//	ELAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "ELAmount";
	$fdata["GoodName"] = "ELAmount";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "ELAmount";
	
		
		
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
	
		
		
	$tdatachanges_last_month_end["ELAmount"] = $fdata;
//	ELSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "ELSlot";
	$fdata["GoodName"] = "ELSlot";
	$fdata["ownerTable"] = "changes last month end";
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
		$fdata["FullName"] = "ELSlot";
	
		
		
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatachanges_last_month_end["ELSlot"] = $fdata;

	
$tables_data["changes last month end"]=&$tdatachanges_last_month_end;
$field_labels["changes_last_month_end"] = &$fieldLabelschanges_last_month_end;
$fieldToolTips["changes last month end"] = &$fieldToolTipschanges_last_month_end;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["changes last month end"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["changes last month end"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_changes_last_month_end()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  LMLive,  Closed,  Dead,  NewEl,  CurrentLive,  CClient,  CDealtype,  CAmount,  CSlot,  DClient,  DDealtype,  DAmount,  DSlot,  ELClinet,  ELDealType,  ELAmount,  ELSlot";
$proto0["m_strFrom"] = "FROM `changes last month end`";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY ELClinet DESC";
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
	"m_strTable" => "changes last month end"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "LMLive",
	"m_strTable" => "changes last month end"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Closed",
	"m_strTable" => "changes last month end"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Dead",
	"m_strTable" => "changes last month end"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "NewEl",
	"m_strTable" => "changes last month end"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "CurrentLive",
	"m_strTable" => "changes last month end"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "CClient",
	"m_strTable" => "changes last month end"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "CDealtype",
	"m_strTable" => "changes last month end"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "CAmount",
	"m_strTable" => "changes last month end"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "CSlot",
	"m_strTable" => "changes last month end"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "DClient",
	"m_strTable" => "changes last month end"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "DDealtype",
	"m_strTable" => "changes last month end"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "DAmount",
	"m_strTable" => "changes last month end"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "DSlot",
	"m_strTable" => "changes last month end"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "ELClinet",
	"m_strTable" => "changes last month end"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "ELDealType",
	"m_strTable" => "changes last month end"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "ELAmount",
	"m_strTable" => "changes last month end"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "ELSlot",
	"m_strTable" => "changes last month end"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto41=array();
$proto41["m_link"] = "SQLL_MAIN";
			$proto42=array();
$proto42["m_strName"] = "changes last month end";
$proto42["m_columns"] = array();
$proto42["m_columns"][] = "ID";
$proto42["m_columns"][] = "LMLive";
$proto42["m_columns"][] = "Closed";
$proto42["m_columns"][] = "Dead";
$proto42["m_columns"][] = "NewEl";
$proto42["m_columns"][] = "CurrentLive";
$proto42["m_columns"][] = "CClient";
$proto42["m_columns"][] = "CDealtype";
$proto42["m_columns"][] = "CAmount";
$proto42["m_columns"][] = "CSlot";
$proto42["m_columns"][] = "DClient";
$proto42["m_columns"][] = "DDealtype";
$proto42["m_columns"][] = "DAmount";
$proto42["m_columns"][] = "DSlot";
$proto42["m_columns"][] = "ELClinet";
$proto42["m_columns"][] = "ELDealType";
$proto42["m_columns"][] = "ELAmount";
$proto42["m_columns"][] = "ELSlot";
$obj = new SQLTable($proto42);

$proto41["m_table"] = $obj;
$proto41["m_alias"] = "";
$proto43=array();
$proto43["m_sql"] = "";
$proto43["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto43["m_column"]=$obj;
$proto43["m_contained"] = array();
$proto43["m_strCase"] = "";
$proto43["m_havingmode"] = "0";
$proto43["m_inBrackets"] = "0";
$proto43["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto43);

$proto41["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto41);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto45=array();
						$obj = new SQLField(array(
	"m_strName" => "ELClinet",
	"m_strTable" => "changes last month end"
));

$proto45["m_column"]=$obj;
$proto45["m_bAsc"] = 0;
$proto45["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto45);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_changes_last_month_end = createSqlQuery_changes_last_month_end();
																		$tdatachanges_last_month_end[".sqlquery"] = $queryData_changes_last_month_end;
	
if(isset($tdatachanges_last_month_end["field2"])){
	$tdatachanges_last_month_end["field2"]["LookupTable"] = "carscars_view";
	$tdatachanges_last_month_end["field2"]["LookupOrderBy"] = "name";
	$tdatachanges_last_month_end["field2"]["LookupType"] = 4;
	$tdatachanges_last_month_end["field2"]["LinkField"] = "email";
	$tdatachanges_last_month_end["field2"]["DisplayField"] = "name";
	$tdatachanges_last_month_end[".hasCustomViewField"] = true;
}

$tableEvents["changes last month end"] = new eventsBase;
$tdatachanges_last_month_end[".hasEvents"] = false;

$cipherer = new RunnerCipherer("changes last month end");

?>