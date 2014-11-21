<?php
require_once(getabspath("classes/cipherer.php"));
$tdatautilization_targets = array();
	$tdatautilization_targets[".NumberOfChars"] = 80; 
	$tdatautilization_targets[".ShortName"] = "utilization_targets";
	$tdatautilization_targets[".OwnerID"] = "";
	$tdatautilization_targets[".OriginalTable"] = "utilization targets";

//	field labels
$fieldLabelsutilization_targets = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsutilization_targets["English"] = array();
	$fieldToolTipsutilization_targets["English"] = array();
	$fieldLabelsutilization_targets["English"]["ID"] = "ID";
	$fieldToolTipsutilization_targets["English"]["ID"] = "";
	$fieldLabelsutilization_targets["English"]["IBC_per_MD"] = "IBC per MD";
	$fieldToolTipsutilization_targets["English"]["IBC per MD"] = "";
	$fieldLabelsutilization_targets["English"]["IBC_Total_MD"] = "IBC Total MD";
	$fieldToolTipsutilization_targets["English"]["IBC Total MD"] = "";
	$fieldLabelsutilization_targets["English"]["IBC_YTD_Target"] = "IBC YTD Target";
	$fieldToolTipsutilization_targets["English"]["IBC YTD Target"] = "";
	$fieldLabelsutilization_targets["English"]["EL_per_MD"] = "EL per MD";
	$fieldToolTipsutilization_targets["English"]["EL per MD"] = "";
	$fieldLabelsutilization_targets["English"]["EL_Total_MD"] = "EL Total MD";
	$fieldToolTipsutilization_targets["English"]["EL Total MD"] = "";
	$fieldLabelsutilization_targets["English"]["EL_YTD_Target"] = "EL YTD Target";
	$fieldToolTipsutilization_targets["English"]["EL YTD Target"] = "";
	$fieldLabelsutilization_targets["English"]["Closing_per_MD"] = "Closing per MD";
	$fieldToolTipsutilization_targets["English"]["Closing per MD"] = "";
	$fieldLabelsutilization_targets["English"]["Closing_Total_MD"] = "Closing Total MD";
	$fieldToolTipsutilization_targets["English"]["Closing Total MD"] = "";
	$fieldLabelsutilization_targets["English"]["Closing_YTD_MD"] = "Closing YTD MD";
	$fieldToolTipsutilization_targets["English"]["Closing YTD MD"] = "";
	if (count($fieldToolTipsutilization_targets["English"]))
		$tdatautilization_targets[".isUseToolTips"] = true;
}
	
	
	$tdatautilization_targets[".NCSearch"] = true;



$tdatautilization_targets[".shortTableName"] = "utilization_targets";
$tdatautilization_targets[".nSecOptions"] = 0;
$tdatautilization_targets[".recsPerRowList"] = 1;
$tdatautilization_targets[".mainTableOwnerID"] = "";
$tdatautilization_targets[".moveNext"] = 1;
$tdatautilization_targets[".nType"] = 0;

$tdatautilization_targets[".strOriginalTableName"] = "utilization targets";




$tdatautilization_targets[".showAddInPopup"] = false;

$tdatautilization_targets[".showEditInPopup"] = false;

$tdatautilization_targets[".showViewInPopup"] = false;

$tdatautilization_targets[".fieldsForRegister"] = array();

$tdatautilization_targets[".listAjax"] = false;

	$tdatautilization_targets[".audit"] = false;

	$tdatautilization_targets[".locking"] = false;

$tdatautilization_targets[".listIcons"] = true;
$tdatautilization_targets[".edit"] = true;




$tdatautilization_targets[".showSimpleSearchOptions"] = false;

if (isMobile()){
	$tdatautilization_targets[".showSearchPanel"] = true;
}
else 
	$tdatautilization_targets[".showSearchPanel"] = false;

if (isMobile())
	$tdatautilization_targets[".isUseAjaxSuggest"] = false;
else 
	$tdatautilization_targets[".isUseAjaxSuggest"] = true;

$tdatautilization_targets[".rowHighlite"] = true;

// button handlers file names

$tdatautilization_targets[".addPageEvents"] = false;

// use timepicker for search panel
$tdatautilization_targets[".isUseTimeForSearch"] = false;




$tdatautilization_targets[".allSearchFields"] = array();

$tdatautilization_targets[".allSearchFields"][] = "IBC per MD";
$tdatautilization_targets[".allSearchFields"][] = "IBC Total MD";
$tdatautilization_targets[".allSearchFields"][] = "IBC YTD Target";
$tdatautilization_targets[".allSearchFields"][] = "EL per MD";
$tdatautilization_targets[".allSearchFields"][] = "EL Total MD";
$tdatautilization_targets[".allSearchFields"][] = "EL YTD Target";
$tdatautilization_targets[".allSearchFields"][] = "Closing per MD";
$tdatautilization_targets[".allSearchFields"][] = "Closing Total MD";
$tdatautilization_targets[".allSearchFields"][] = "Closing YTD MD";

$tdatautilization_targets[".googleLikeFields"][] = "ID";
$tdatautilization_targets[".googleLikeFields"][] = "IBC per MD";
$tdatautilization_targets[".googleLikeFields"][] = "IBC Total MD";
$tdatautilization_targets[".googleLikeFields"][] = "IBC YTD Target";
$tdatautilization_targets[".googleLikeFields"][] = "EL per MD";
$tdatautilization_targets[".googleLikeFields"][] = "EL Total MD";
$tdatautilization_targets[".googleLikeFields"][] = "EL YTD Target";
$tdatautilization_targets[".googleLikeFields"][] = "Closing per MD";
$tdatautilization_targets[".googleLikeFields"][] = "Closing Total MD";
$tdatautilization_targets[".googleLikeFields"][] = "Closing YTD MD";


$tdatautilization_targets[".advSearchFields"][] = "IBC per MD";
$tdatautilization_targets[".advSearchFields"][] = "IBC Total MD";
$tdatautilization_targets[".advSearchFields"][] = "IBC YTD Target";
$tdatautilization_targets[".advSearchFields"][] = "EL per MD";
$tdatautilization_targets[".advSearchFields"][] = "EL Total MD";
$tdatautilization_targets[".advSearchFields"][] = "EL YTD Target";
$tdatautilization_targets[".advSearchFields"][] = "Closing per MD";
$tdatautilization_targets[".advSearchFields"][] = "Closing Total MD";
$tdatautilization_targets[".advSearchFields"][] = "Closing YTD MD";

$tdatautilization_targets[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatautilization_targets[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatautilization_targets[".strOrderBy"] = $tstrOrderBy;

$tdatautilization_targets[".orderindexes"] = array();

$tdatautilization_targets[".sqlHead"] = "SELECT ID,  `IBC per MD`,  `IBC Total MD`,  `IBC YTD Target`,  `EL per MD`,  `EL Total MD`,  `EL YTD Target`,  `Closing per MD`,  `Closing Total MD`,  `Closing YTD MD`";
$tdatautilization_targets[".sqlFrom"] = "FROM `utilization targets`";
$tdatautilization_targets[".sqlWhereExpr"] = "";
$tdatautilization_targets[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatautilization_targets[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatautilization_targets[".arrGroupsPerPage"] = $arrGPP;

$tableKeysutilization_targets = array();
$tableKeysutilization_targets[] = "ID";
$tdatautilization_targets[".Keys"] = $tableKeysutilization_targets;

$tdatautilization_targets[".listFields"] = array();
$tdatautilization_targets[".listFields"][] = "IBC per MD";
$tdatautilization_targets[".listFields"][] = "IBC Total MD";
$tdatautilization_targets[".listFields"][] = "IBC YTD Target";
$tdatautilization_targets[".listFields"][] = "EL per MD";
$tdatautilization_targets[".listFields"][] = "EL Total MD";
$tdatautilization_targets[".listFields"][] = "EL YTD Target";
$tdatautilization_targets[".listFields"][] = "Closing per MD";
$tdatautilization_targets[".listFields"][] = "Closing Total MD";
$tdatautilization_targets[".listFields"][] = "Closing YTD MD";

$tdatautilization_targets[".viewFields"] = array();

$tdatautilization_targets[".addFields"] = array();

$tdatautilization_targets[".inlineAddFields"] = array();

$tdatautilization_targets[".editFields"] = array();
$tdatautilization_targets[".editFields"][] = "ID";
$tdatautilization_targets[".editFields"][] = "IBC per MD";
$tdatautilization_targets[".editFields"][] = "EL per MD";
$tdatautilization_targets[".editFields"][] = "Closing per MD";
$tdatautilization_targets[".editFields"][] = "IBC Total MD";
$tdatautilization_targets[".editFields"][] = "EL Total MD";
$tdatautilization_targets[".editFields"][] = "Closing Total MD";
$tdatautilization_targets[".editFields"][] = "IBC YTD Target";
$tdatautilization_targets[".editFields"][] = "EL YTD Target";
$tdatautilization_targets[".editFields"][] = "Closing YTD MD";

$tdatautilization_targets[".inlineEditFields"] = array();

$tdatautilization_targets[".exportFields"] = array();

$tdatautilization_targets[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		
		
		
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
	
		
		
	$tdatautilization_targets["ID"] = $fdata;
//	IBC per MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "IBC per MD";
	$fdata["GoodName"] = "IBC_per_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "IBC per MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "IBC per MD"; 
		$fdata["FullName"] = "`IBC per MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["IBC per MD"] = $fdata;
//	IBC Total MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "IBC Total MD";
	$fdata["GoodName"] = "IBC_Total_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "IBC Total MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "IBC Total MD"; 
		$fdata["FullName"] = "`IBC Total MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["IBC Total MD"] = $fdata;
//	IBC YTD Target
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "IBC YTD Target";
	$fdata["GoodName"] = "IBC_YTD_Target";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "IBC YTD Target"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "IBC YTD Target"; 
		$fdata["FullName"] = "`IBC YTD Target`";
	
		
		
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
	
		
		
	$tdatautilization_targets["IBC YTD Target"] = $fdata;
//	EL per MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "EL per MD";
	$fdata["GoodName"] = "EL_per_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "EL per MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "EL per MD"; 
		$fdata["FullName"] = "`EL per MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["EL per MD"] = $fdata;
//	EL Total MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "EL Total MD";
	$fdata["GoodName"] = "EL_Total_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "EL Total MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "EL Total MD"; 
		$fdata["FullName"] = "`EL Total MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["EL Total MD"] = $fdata;
//	EL YTD Target
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "EL YTD Target";
	$fdata["GoodName"] = "EL_YTD_Target";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "EL YTD Target"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "EL YTD Target"; 
		$fdata["FullName"] = "`EL YTD Target`";
	
		
		
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
	
		
		
	$tdatautilization_targets["EL YTD Target"] = $fdata;
//	Closing per MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "Closing per MD";
	$fdata["GoodName"] = "Closing_per_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "Closing per MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "Closing per MD"; 
		$fdata["FullName"] = "`Closing per MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["Closing per MD"] = $fdata;
//	Closing Total MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Closing Total MD";
	$fdata["GoodName"] = "Closing_Total_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "Closing Total MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "Closing Total MD"; 
		$fdata["FullName"] = "`Closing Total MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["Closing Total MD"] = $fdata;
//	Closing YTD MD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Closing YTD MD";
	$fdata["GoodName"] = "Closing_YTD_MD";
	$fdata["ownerTable"] = "utilization targets";
	$fdata["Label"] = "Closing YTD MD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "Closing YTD MD"; 
		$fdata["FullName"] = "`Closing YTD MD`";
	
		
		
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
	
		
		
	$tdatautilization_targets["Closing YTD MD"] = $fdata;

	
$tables_data["utilization targets"]=&$tdatautilization_targets;
$field_labels["utilization_targets"] = &$fieldLabelsutilization_targets;
$fieldToolTips["utilization targets"] = &$fieldToolTipsutilization_targets;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["utilization targets"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["utilization targets"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_utilization_targets()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  `IBC per MD`,  `IBC Total MD`,  `IBC YTD Target`,  `EL per MD`,  `EL Total MD`,  `EL YTD Target`,  `Closing per MD`,  `Closing Total MD`,  `Closing YTD MD`";
$proto0["m_strFrom"] = "FROM `utilization targets`";
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
	"m_strTable" => "utilization targets"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC per MD",
	"m_strTable" => "utilization targets"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC Total MD",
	"m_strTable" => "utilization targets"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC YTD Target",
	"m_strTable" => "utilization targets"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "EL per MD",
	"m_strTable" => "utilization targets"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Total MD",
	"m_strTable" => "utilization targets"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "EL YTD Target",
	"m_strTable" => "utilization targets"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Closing per MD",
	"m_strTable" => "utilization targets"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Closing Total MD",
	"m_strTable" => "utilization targets"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Closing YTD MD",
	"m_strTable" => "utilization targets"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto25=array();
$proto25["m_link"] = "SQLL_MAIN";
			$proto26=array();
$proto26["m_strName"] = "utilization targets";
$proto26["m_columns"] = array();
$proto26["m_columns"][] = "ID";
$proto26["m_columns"][] = "IBC per MD";
$proto26["m_columns"][] = "IBC Total MD";
$proto26["m_columns"][] = "IBC YTD Target";
$proto26["m_columns"][] = "EL per MD";
$proto26["m_columns"][] = "EL Total MD";
$proto26["m_columns"][] = "EL YTD Target";
$proto26["m_columns"][] = "Closing per MD";
$proto26["m_columns"][] = "Closing Total MD";
$proto26["m_columns"][] = "Closing YTD MD";
$obj = new SQLTable($proto26);

$proto25["m_table"] = $obj;
$proto25["m_alias"] = "";
$proto27=array();
$proto27["m_sql"] = "";
$proto27["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto27["m_column"]=$obj;
$proto27["m_contained"] = array();
$proto27["m_strCase"] = "";
$proto27["m_havingmode"] = "0";
$proto27["m_inBrackets"] = "0";
$proto27["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto27);

$proto25["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto25);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_utilization_targets = createSqlQuery_utilization_targets();
										$tdatautilization_targets[".sqlquery"] = $queryData_utilization_targets;
	
if(isset($tdatautilization_targets["field2"])){
	$tdatautilization_targets["field2"]["LookupTable"] = "carscars_view";
	$tdatautilization_targets["field2"]["LookupOrderBy"] = "name";
	$tdatautilization_targets["field2"]["LookupType"] = 4;
	$tdatautilization_targets["field2"]["LinkField"] = "email";
	$tdatautilization_targets["field2"]["DisplayField"] = "name";
	$tdatautilization_targets[".hasCustomViewField"] = true;
}

include_once(getabspath("include/utilization_targets_events.php"));
$tableEvents["utilization targets"] = new eventclass_utilization_targets;
$tdatautilization_targets[".hasEvents"] = true;

$cipherer = new RunnerCipherer("utilization targets");

?>