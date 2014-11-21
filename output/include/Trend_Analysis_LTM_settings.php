<?php
require_once(getabspath("classes/cipherer.php"));
$tdataTrend_Analysis_LTM = array();
	$tdataTrend_Analysis_LTM[".NumberOfChars"] = 80; 
	$tdataTrend_Analysis_LTM[".ShortName"] = "Trend_Analysis_LTM";
	$tdataTrend_Analysis_LTM[".OwnerID"] = "";
	$tdataTrend_Analysis_LTM[".OriginalTable"] = "company";

//	field labels
$fieldLabelsTrend_Analysis_LTM = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsTrend_Analysis_LTM["English"] = array();
	$fieldToolTipsTrend_Analysis_LTM["English"] = array();
	$fieldLabelsTrend_Analysis_LTM["English"]["Name"] = "Name";
	$fieldToolTipsTrend_Analysis_LTM["English"]["Name"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["IBS"] = "IBS";
	$fieldToolTipsTrend_Analysis_LTM["English"]["IBS"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["company_Count"] = "Company Count";
	$fieldToolTipsTrend_Analysis_LTM["English"]["company Count"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["CorpPrac"] = "Corp Prac";
	$fieldToolTipsTrend_Analysis_LTM["English"]["CorpPrac"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["el_from"] = "El From";
	$fieldToolTipsTrend_Analysis_LTM["English"]["el from"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["LiveEL"] = "Live EL";
	$fieldToolTipsTrend_Analysis_LTM["English"]["LiveEL"] = "";
	$fieldLabelsTrend_Analysis_LTM["English"]["Closed"] = "Closed";
	$fieldToolTipsTrend_Analysis_LTM["English"]["Closed"] = "";
	if (count($fieldToolTipsTrend_Analysis_LTM["English"]))
		$tdataTrend_Analysis_LTM[".isUseToolTips"] = true;
}
	
	
	$tdataTrend_Analysis_LTM[".NCSearch"] = true;



$tdataTrend_Analysis_LTM[".shortTableName"] = "Trend_Analysis_LTM";
$tdataTrend_Analysis_LTM[".nSecOptions"] = 0;
$tdataTrend_Analysis_LTM[".recsPerRowList"] = 1;
$tdataTrend_Analysis_LTM[".mainTableOwnerID"] = "";
$tdataTrend_Analysis_LTM[".moveNext"] = 1;
$tdataTrend_Analysis_LTM[".nType"] = 2;

$tdataTrend_Analysis_LTM[".strOriginalTableName"] = "company";




$tdataTrend_Analysis_LTM[".showAddInPopup"] = false;

$tdataTrend_Analysis_LTM[".showEditInPopup"] = false;

$tdataTrend_Analysis_LTM[".showViewInPopup"] = false;

$tdataTrend_Analysis_LTM[".fieldsForRegister"] = array();

$tdataTrend_Analysis_LTM[".listAjax"] = false;

	$tdataTrend_Analysis_LTM[".audit"] = false;

	$tdataTrend_Analysis_LTM[".locking"] = false;

$tdataTrend_Analysis_LTM[".listIcons"] = true;
$tdataTrend_Analysis_LTM[".edit"] = true;
$tdataTrend_Analysis_LTM[".inlineEdit"] = true;
$tdataTrend_Analysis_LTM[".inlineAdd"] = true;
$tdataTrend_Analysis_LTM[".view"] = true;

$tdataTrend_Analysis_LTM[".exportTo"] = true;

$tdataTrend_Analysis_LTM[".printFriendly"] = true;

$tdataTrend_Analysis_LTM[".delete"] = true;

$tdataTrend_Analysis_LTM[".showSimpleSearchOptions"] = false;

$tdataTrend_Analysis_LTM[".showSearchPanel"] = true;

if (isMobile())
	$tdataTrend_Analysis_LTM[".isUseAjaxSuggest"] = false;
else 
	$tdataTrend_Analysis_LTM[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataTrend_Analysis_LTM[".addPageEvents"] = false;

// use timepicker for search panel
$tdataTrend_Analysis_LTM[".isUseTimeForSearch"] = false;




$tdataTrend_Analysis_LTM[".allSearchFields"] = array();

$tdataTrend_Analysis_LTM[".allSearchFields"][] = "Name";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "el from";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".allSearchFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "Name";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "el from";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".googleLikeFields"][] = "Closed";


$tdataTrend_Analysis_LTM[".advSearchFields"][] = "Name";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "el from";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".advSearchFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataTrend_Analysis_LTM[".strOrderBy"] = $tstrOrderBy;

$tdataTrend_Analysis_LTM[".orderindexes"] = array();

$tdataTrend_Analysis_LTM[".sqlHead"] = "SELECT bankers.Name,  coalesce(sum(company.`Referral Type` = 'IBS to Practice'), 0) AS IBS,  group_concat(company.company) AS `company Count`,  coalesce(sum(company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice'), 0) AS CorpPrac,  coalesce(sum((company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'MA to Practice')and( company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'  ) ), 0) AS `el from`,  coalesce(sum(company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'), 0) AS LiveEL,  coalesce(sum((company.`Referral Type` = 'MA to Practice' or company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'IBS to Practice')and (company.Status = 'Closed' )), 0) AS Closed";
$tdataTrend_Analysis_LTM[".sqlFrom"] = "FROM company  INNER JOIN bankers ON company.`Primary Banker` = bankers.Name";
$tdataTrend_Analysis_LTM[".sqlWhereExpr"] = "";
$tdataTrend_Analysis_LTM[".sqlTail"] = "GROUP BY bankers.Name";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataTrend_Analysis_LTM[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataTrend_Analysis_LTM[".arrGroupsPerPage"] = $arrGPP;

$tableKeysTrend_Analysis_LTM = array();
$tdataTrend_Analysis_LTM[".Keys"] = $tableKeysTrend_Analysis_LTM;

$tdataTrend_Analysis_LTM[".listFields"] = array();
$tdataTrend_Analysis_LTM[".listFields"][] = "Name";
$tdataTrend_Analysis_LTM[".listFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".listFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".listFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".listFields"][] = "el from";
$tdataTrend_Analysis_LTM[".listFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".listFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".viewFields"] = array();
$tdataTrend_Analysis_LTM[".viewFields"][] = "Name";
$tdataTrend_Analysis_LTM[".viewFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".viewFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".viewFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".viewFields"][] = "el from";
$tdataTrend_Analysis_LTM[".viewFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".viewFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".addFields"] = array();

$tdataTrend_Analysis_LTM[".inlineAddFields"] = array();
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "Name";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "el from";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".inlineAddFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".editFields"] = array();

$tdataTrend_Analysis_LTM[".inlineEditFields"] = array();
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "Name";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "el from";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".inlineEditFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".exportFields"] = array();
$tdataTrend_Analysis_LTM[".exportFields"][] = "Name";
$tdataTrend_Analysis_LTM[".exportFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".exportFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".exportFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".exportFields"][] = "el from";
$tdataTrend_Analysis_LTM[".exportFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".exportFields"][] = "Closed";

$tdataTrend_Analysis_LTM[".printFields"] = array();
$tdataTrend_Analysis_LTM[".printFields"][] = "Name";
$tdataTrend_Analysis_LTM[".printFields"][] = "IBS";
$tdataTrend_Analysis_LTM[".printFields"][] = "company Count";
$tdataTrend_Analysis_LTM[".printFields"][] = "CorpPrac";
$tdataTrend_Analysis_LTM[".printFields"][] = "el from";
$tdataTrend_Analysis_LTM[".printFields"][] = "LiveEL";
$tdataTrend_Analysis_LTM[".printFields"][] = "Closed";

//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Name"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Name"; 
		$fdata["FullName"] = "bankers.Name";
	
		
		
				
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
	
		
		
	$tdataTrend_Analysis_LTM["Name"] = $fdata;
//	IBS
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "IBS";
	$fdata["GoodName"] = "IBS";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "IBS"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "IBS"; 
		$fdata["FullName"] = "coalesce(sum(company.`Referral Type` = 'IBS to Practice'), 0)";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataTrend_Analysis_LTM["IBS"] = $fdata;
//	company Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "company Count";
	$fdata["GoodName"] = "company_Count";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Company Count"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "company Count"; 
		$fdata["FullName"] = "group_concat(company.company)";
	
		
		
				
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
	
		
		
	$tdataTrend_Analysis_LTM["company Count"] = $fdata;
//	CorpPrac
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "CorpPrac";
	$fdata["GoodName"] = "CorpPrac";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Corp Prac"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "CorpPrac"; 
		$fdata["FullName"] = "coalesce(sum(company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice'), 0)";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataTrend_Analysis_LTM["CorpPrac"] = $fdata;
//	el from
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "el from";
	$fdata["GoodName"] = "el_from";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "El From"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "el from"; 
		$fdata["FullName"] = "coalesce(sum((company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'MA to Practice')and( company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'  ) ), 0)";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataTrend_Analysis_LTM["el from"] = $fdata;
//	LiveEL
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "LiveEL";
	$fdata["GoodName"] = "LiveEL";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Live EL"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "LiveEL"; 
		$fdata["FullName"] = "coalesce(sum(company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'), 0)";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataTrend_Analysis_LTM["LiveEL"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Closed"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Closed"; 
		$fdata["FullName"] = "coalesce(sum((company.`Referral Type` = 'MA to Practice' or company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'IBS to Practice')and (company.Status = 'Closed' )), 0)";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdataTrend_Analysis_LTM["Closed"] = $fdata;

	
$tables_data["Trend Analysis LTM"]=&$tdataTrend_Analysis_LTM;
$field_labels["Trend_Analysis_LTM"] = &$fieldLabelsTrend_Analysis_LTM;
$fieldToolTips["Trend Analysis LTM"] = &$fieldToolTipsTrend_Analysis_LTM;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Trend Analysis LTM"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Trend Analysis LTM"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Trend_Analysis_LTM()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "bankers.Name,  coalesce(sum(company.`Referral Type` = 'IBS to Practice'), 0) AS IBS,  group_concat(company.company) AS `company Count`,  coalesce(sum(company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice'), 0) AS CorpPrac,  coalesce(sum((company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'MA to Practice')and( company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'  ) ), 0) AS `el from`,  coalesce(sum(company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'), 0) AS LiveEL,  coalesce(sum((company.`Referral Type` = 'MA to Practice' or company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'IBS to Practice')and (company.Status = 'Closed' )), 0) AS Closed";
$proto0["m_strFrom"] = "FROM company  INNER JOIN bankers ON company.`Primary Banker` = bankers.Name";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY bankers.Name";
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
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_functiontype"] = "SQLF_CUSTOM";
$proto8["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(company.`Referral Type` = 'IBS to Practice')"
));

$proto8["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto8["m_arguments"][]=$obj;
$proto8["m_strFunctionName"] = "coalesce";
$obj = new SQLFunctionCall($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "IBS";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "group_concat(company.company)"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "company Count";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$proto14=array();
$proto14["m_functiontype"] = "SQLF_CUSTOM";
$proto14["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice')"
));

$proto14["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto14["m_arguments"][]=$obj;
$proto14["m_strFunctionName"] = "coalesce";
$obj = new SQLFunctionCall($proto14);

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "CorpPrac";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$proto18=array();
$proto18["m_functiontype"] = "SQLF_CUSTOM";
$proto18["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum((company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'MA to Practice')and( company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive'  ) )"
));

$proto18["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto18["m_arguments"][]=$obj;
$proto18["m_strFunctionName"] = "coalesce";
$obj = new SQLFunctionCall($proto18);

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "el from";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$proto22=array();
$proto22["m_functiontype"] = "SQLF_CUSTOM";
$proto22["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum(company.Status = 'on hold' OR company.Status = 'in market' OR company.Status = 'pre market' OR company.Status = 'under loi' OR company.Status = 'inactive')"
));

$proto22["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto22["m_arguments"][]=$obj;
$proto22["m_strFunctionName"] = "coalesce";
$obj = new SQLFunctionCall($proto22);

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "LiveEL";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$proto26=array();
$proto26["m_functiontype"] = "SQLF_CUSTOM";
$proto26["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "sum((company.`Referral Type` = 'MA to Practice' or company.`Referral Type` = 'Corporate to Practice' or company.`Referral Type` = 'Practice to Practice' or company.`Referral Type` = 'IBS to Practice')and (company.Status = 'Closed' ))"
));

$proto26["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto26["m_arguments"][]=$obj;
$proto26["m_strFunctionName"] = "coalesce";
$obj = new SQLFunctionCall($proto26);

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "Closed";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "company";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "ID";
$proto30["m_columns"][] = "Company";
$proto30["m_columns"][] = "Deal Slot";
$proto30["m_columns"][] = "IBC Date";
$proto30["m_columns"][] = "EL Date";
$proto30["m_columns"][] = "Project Name";
$proto30["m_columns"][] = "Status";
$proto30["m_columns"][] = "Deal Type";
$proto30["m_columns"][] = "Projected Fee";
$proto30["m_columns"][] = "Projected Transaction Size";
$proto30["m_columns"][] = "Est. Close Date";
$proto30["m_columns"][] = "Primary Banker";
$proto30["m_columns"][] = "Practice Area";
$proto30["m_columns"][] = "Ownership Class";
$proto30["m_columns"][] = "Industry";
$proto30["m_columns"][] = "Referral Type";
$proto30["m_columns"][] = "Referral Source-Company";
$proto30["m_columns"][] = "Referral Scource-Ind.";
$proto30["m_columns"][] = "Description";
$proto30["m_columns"][] = "Dead Date";
$proto30["m_columns"][] = "EL Expiration Date";
$proto30["m_columns"][] = "Engagment Fee";
$proto30["m_columns"][] = "Fee Minimum";
$proto30["m_columns"][] = "Final Total Sucess Fee";
$proto30["m_columns"][] = "Final Transaction Size";
$proto30["m_columns"][] = "Monthly Retainer";
$proto30["m_columns"][] = "Closed Date";
$proto30["m_columns"][] = "Team Split-1";
$proto30["m_columns"][] = "Team-1";
$proto30["m_columns"][] = "Team Split-2";
$proto30["m_columns"][] = "Team-2";
$proto30["m_columns"][] = "Team Split-3";
$proto30["m_columns"][] = "Team Split-4";
$proto30["m_columns"][] = "Team Split-5";
$proto30["m_columns"][] = "Team Split-6";
$proto30["m_columns"][] = "Team-3";
$proto30["m_columns"][] = "Team-4";
$proto30["m_columns"][] = "Team-5";
$proto30["m_columns"][] = "Team-6";
$proto30["m_columns"][] = "Fee Split-1";
$proto30["m_columns"][] = "Fee Split-2";
$proto30["m_columns"][] = "Fee Split-3";
$proto30["m_columns"][] = "Fee Split-4";
$proto30["m_columns"][] = "Fee Split-5";
$proto30["m_columns"][] = "Fee Split-6";
$proto30["m_columns"][] = "Fee To-1";
$proto30["m_columns"][] = "Fee To-2";
$proto30["m_columns"][] = "Fee To-3";
$proto30["m_columns"][] = "Fee To-4";
$proto30["m_columns"][] = "Fee To-5";
$proto30["m_columns"][] = "Fee To-6";
$proto30["m_columns"][] = "Enterpise Value";
$proto30["m_columns"][] = "Fee Details";
$proto30["m_columns"][] = "Split to Corporate";
$proto30["m_columns"][] = "Paul";
$proto30["m_columns"][] = "McBroom";
$proto30["m_columns"][] = "Month of Close";
$proto30["m_columns"][] = "Gross This";
$proto30["m_columns"][] = "Gross Next";
$proto30["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto30);

$proto29["m_table"] = $obj;
$proto29["m_alias"] = "";
$proto31=array();
$proto31["m_sql"] = "";
$proto31["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto31["m_column"]=$obj;
$proto31["m_contained"] = array();
$proto31["m_strCase"] = "";
$proto31["m_havingmode"] = "0";
$proto31["m_inBrackets"] = "0";
$proto31["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto31);

$proto29["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto29);

$proto0["m_fromlist"][]=$obj;
												$proto33=array();
$proto33["m_link"] = "SQLL_INNERJOIN";
			$proto34=array();
$proto34["m_strName"] = "bankers";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "ID";
$proto34["m_columns"][] = "Name";
$proto34["m_columns"][] = "Start Date";
$proto34["m_columns"][] = "Budget Year";
$proto34["m_columns"][] = "Active";
$proto34["m_columns"][] = "YTD Revenue";
$proto34["m_columns"][] = "Last Year Rev";
$proto34["m_columns"][] = "Prior Year Rev";
$proto34["m_columns"][] = "Last Year Rank";
$proto34["m_columns"][] = "YTD+Last";
$proto34["m_columns"][] = "YTD+Last+Prior";
$proto34["m_columns"][] = "YTD Closing";
$proto34["m_columns"][] = "Last Year Closing";
$proto34["m_columns"][] = "YTD IBC";
$proto34["m_columns"][] = "YTD Engagements";
$proto34["m_columns"][] = "Total Current Engagments";
$proto34["m_columns"][] = "# Wheelhouse";
$proto34["m_columns"][] = "# Speculative";
$proto34["m_columns"][] = "# Minimum";
$proto34["m_columns"][] = "Last Name";
$proto34["m_columns"][] = "First Name";
$obj = new SQLTable($proto34);

$proto33["m_table"] = $obj;
$proto33["m_alias"] = "";
$proto35=array();
$proto35["m_sql"] = "company.`Primary Banker` = bankers.Name";
$proto35["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto35["m_column"]=$obj;
$proto35["m_contained"] = array();
$proto35["m_strCase"] = "= bankers.Name";
$proto35["m_havingmode"] = "0";
$proto35["m_inBrackets"] = "0";
$proto35["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto35);

$proto33["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto33);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto37=array();
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankers"
));

$proto37["m_column"]=$obj;
$obj = new SQLGroupByItem($proto37);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Trend_Analysis_LTM = createSqlQuery_Trend_Analysis_LTM();
							$tdataTrend_Analysis_LTM[".sqlquery"] = $queryData_Trend_Analysis_LTM;
	
if(isset($tdataTrend_Analysis_LTM["field2"])){
	$tdataTrend_Analysis_LTM["field2"]["LookupTable"] = "carscars_view";
	$tdataTrend_Analysis_LTM["field2"]["LookupOrderBy"] = "name";
	$tdataTrend_Analysis_LTM["field2"]["LookupType"] = 4;
	$tdataTrend_Analysis_LTM["field2"]["LinkField"] = "email";
	$tdataTrend_Analysis_LTM["field2"]["DisplayField"] = "name";
	$tdataTrend_Analysis_LTM[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Trend_Analysis_LTM_events.php"));
$tableEvents["Trend Analysis LTM"] = new eventclass_Trend_Analysis_LTM;
$tdataTrend_Analysis_LTM[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Trend Analysis LTM");

?>