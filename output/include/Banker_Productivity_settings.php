<?php
require_once(getabspath("classes/cipherer.php"));
$tdataBanker_Productivity = array();
	$tdataBanker_Productivity[".NumberOfChars"] = 80; 
	$tdataBanker_Productivity[".ShortName"] = "Banker_Productivity";
	$tdataBanker_Productivity[".OwnerID"] = "";
	$tdataBanker_Productivity[".OriginalTable"] = "bpengagements";

//	field labels
$fieldLabelsBanker_Productivity = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsBanker_Productivity["English"] = array();
	$fieldToolTipsBanker_Productivity["English"] = array();
	$fieldLabelsBanker_Productivity["English"]["Rows"] = "Rows";
	$fieldToolTipsBanker_Productivity["English"]["Rows"] = "";
	$fieldLabelsBanker_Productivity["English"]["Name"] = "Name";
	$fieldToolTipsBanker_Productivity["English"]["Name"] = "";
	$fieldLabelsBanker_Productivity["English"]["y2"] = "Y2";
	$fieldToolTipsBanker_Productivity["English"]["y2"] = "";
	$fieldLabelsBanker_Productivity["English"]["y3"] = "Y3";
	$fieldToolTipsBanker_Productivity["English"]["y3"] = "";
	$fieldLabelsBanker_Productivity["English"]["YTD"] = "YTD";
	$fieldToolTipsBanker_Productivity["English"]["YTD"] = "";
	$fieldLabelsBanker_Productivity["English"]["Budget_Year"] = "Budget Year";
	$fieldToolTipsBanker_Productivity["English"]["Budget Year"] = "";
	$fieldLabelsBanker_Productivity["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsBanker_Productivity["English"]["Start Date"] = "";
	$fieldLabelsBanker_Productivity["English"]["YTD_y2"] = "YTD+y2";
	$fieldToolTipsBanker_Productivity["English"]["YTD+y2"] = "";
	$fieldLabelsBanker_Productivity["English"]["YTD_y2_y3"] = "YTD+y2=y3";
	$fieldToolTipsBanker_Productivity["English"]["YTD+y2=y3"] = "";
	$fieldLabelsBanker_Productivity["English"]["ID"] = "ID";
	$fieldToolTipsBanker_Productivity["English"]["ID"] = "";
	$fieldLabelsBanker_Productivity["English"]["Closed"] = "Closed";
	$fieldToolTipsBanker_Productivity["English"]["Closed"] = "";
	$fieldLabelsBanker_Productivity["English"]["IBC"] = "IBC";
	$fieldToolTipsBanker_Productivity["English"]["IBC"] = "";
	$fieldLabelsBanker_Productivity["English"]["Last_Year_Rank"] = "Last Year Rank";
	$fieldToolTipsBanker_Productivity["English"]["Last Year Rank"] = "";
	$fieldLabelsBanker_Productivity["English"]["Wheelhouse"] = "Wheelhouse";
	$fieldToolTipsBanker_Productivity["English"]["Wheelhouse"] = "";
	$fieldLabelsBanker_Productivity["English"]["Speculative"] = "Speculative";
	$fieldToolTipsBanker_Productivity["English"]["Speculative"] = "";
	$fieldLabelsBanker_Productivity["English"]["Minimum"] = "Minimum";
	$fieldToolTipsBanker_Productivity["English"]["Minimum"] = "";
	$fieldLabelsBanker_Productivity["English"]["YTD_Count"] = "YTD Count";
	$fieldToolTipsBanker_Productivity["English"]["YTD Count"] = "";
	$fieldLabelsBanker_Productivity["English"]["YTD_Engagments"] = "YTD Engagments";
	$fieldToolTipsBanker_Productivity["English"]["YTD Engagments"] = "";
	$fieldLabelsBanker_Productivity["English"]["Total_Count"] = "Total Count";
	$fieldToolTipsBanker_Productivity["English"]["Total Count"] = "";
	$fieldLabelsBanker_Productivity["English"]["Total_Engagements"] = "Total Engagements";
	$fieldToolTipsBanker_Productivity["English"]["Total Engagements"] = "";
	$fieldLabelsBanker_Productivity["English"]["num"] = "Num";
	$fieldToolTipsBanker_Productivity["English"]["num"] = "";
	if (count($fieldToolTipsBanker_Productivity["English"]))
		$tdataBanker_Productivity[".isUseToolTips"] = true;
}
	
	
	$tdataBanker_Productivity[".NCSearch"] = true;



$tdataBanker_Productivity[".shortTableName"] = "Banker_Productivity";
$tdataBanker_Productivity[".nSecOptions"] = 0;
$tdataBanker_Productivity[".recsPerRowList"] = 1;
$tdataBanker_Productivity[".mainTableOwnerID"] = "";
$tdataBanker_Productivity[".moveNext"] = 1;
$tdataBanker_Productivity[".nType"] = 2;

$tdataBanker_Productivity[".strOriginalTableName"] = "bpengagements";




$tdataBanker_Productivity[".showAddInPopup"] = false;

$tdataBanker_Productivity[".showEditInPopup"] = false;

$tdataBanker_Productivity[".showViewInPopup"] = false;

$tdataBanker_Productivity[".fieldsForRegister"] = array();

$tdataBanker_Productivity[".listAjax"] = false;

	$tdataBanker_Productivity[".audit"] = false;

	$tdataBanker_Productivity[".locking"] = false;

$tdataBanker_Productivity[".listIcons"] = true;
$tdataBanker_Productivity[".edit"] = true;
$tdataBanker_Productivity[".inlineEdit"] = true;
$tdataBanker_Productivity[".inlineAdd"] = true;
$tdataBanker_Productivity[".view"] = true;

$tdataBanker_Productivity[".exportTo"] = true;

$tdataBanker_Productivity[".printFriendly"] = true;

$tdataBanker_Productivity[".delete"] = true;

$tdataBanker_Productivity[".showSimpleSearchOptions"] = false;

$tdataBanker_Productivity[".showSearchPanel"] = true;

if (isMobile())
	$tdataBanker_Productivity[".isUseAjaxSuggest"] = false;
else 
	$tdataBanker_Productivity[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataBanker_Productivity[".addPageEvents"] = false;

// use timepicker for search panel
$tdataBanker_Productivity[".isUseTimeForSearch"] = false;




$tdataBanker_Productivity[".allSearchFields"] = array();

$tdataBanker_Productivity[".allSearchFields"][] = "num";
$tdataBanker_Productivity[".allSearchFields"][] = "ID";
$tdataBanker_Productivity[".allSearchFields"][] = "Name";
$tdataBanker_Productivity[".allSearchFields"][] = "Budget Year";
$tdataBanker_Productivity[".allSearchFields"][] = "Start Date";
$tdataBanker_Productivity[".allSearchFields"][] = "YTD";
$tdataBanker_Productivity[".allSearchFields"][] = "y2";
$tdataBanker_Productivity[".allSearchFields"][] = "y3";
$tdataBanker_Productivity[".allSearchFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".allSearchFields"][] = "YTD+y2";
$tdataBanker_Productivity[".allSearchFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".allSearchFields"][] = "Closed";
$tdataBanker_Productivity[".allSearchFields"][] = "IBC";
$tdataBanker_Productivity[".allSearchFields"][] = "YTD Count";
$tdataBanker_Productivity[".allSearchFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".allSearchFields"][] = "Total Count";
$tdataBanker_Productivity[".allSearchFields"][] = "Total Engagements";
$tdataBanker_Productivity[".allSearchFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".allSearchFields"][] = "Speculative";
$tdataBanker_Productivity[".allSearchFields"][] = "Minimum";

$tdataBanker_Productivity[".googleLikeFields"][] = "num";
$tdataBanker_Productivity[".googleLikeFields"][] = "ID";
$tdataBanker_Productivity[".googleLikeFields"][] = "Name";
$tdataBanker_Productivity[".googleLikeFields"][] = "Budget Year";
$tdataBanker_Productivity[".googleLikeFields"][] = "Start Date";
$tdataBanker_Productivity[".googleLikeFields"][] = "YTD";
$tdataBanker_Productivity[".googleLikeFields"][] = "y2";
$tdataBanker_Productivity[".googleLikeFields"][] = "y3";
$tdataBanker_Productivity[".googleLikeFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".googleLikeFields"][] = "YTD+y2";
$tdataBanker_Productivity[".googleLikeFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".googleLikeFields"][] = "Closed";
$tdataBanker_Productivity[".googleLikeFields"][] = "IBC";
$tdataBanker_Productivity[".googleLikeFields"][] = "YTD Count";
$tdataBanker_Productivity[".googleLikeFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".googleLikeFields"][] = "Total Count";
$tdataBanker_Productivity[".googleLikeFields"][] = "Total Engagements";
$tdataBanker_Productivity[".googleLikeFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".googleLikeFields"][] = "Speculative";
$tdataBanker_Productivity[".googleLikeFields"][] = "Minimum";


$tdataBanker_Productivity[".advSearchFields"][] = "num";
$tdataBanker_Productivity[".advSearchFields"][] = "ID";
$tdataBanker_Productivity[".advSearchFields"][] = "Name";
$tdataBanker_Productivity[".advSearchFields"][] = "Budget Year";
$tdataBanker_Productivity[".advSearchFields"][] = "Start Date";
$tdataBanker_Productivity[".advSearchFields"][] = "YTD";
$tdataBanker_Productivity[".advSearchFields"][] = "y2";
$tdataBanker_Productivity[".advSearchFields"][] = "y3";
$tdataBanker_Productivity[".advSearchFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".advSearchFields"][] = "YTD+y2";
$tdataBanker_Productivity[".advSearchFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".advSearchFields"][] = "Closed";
$tdataBanker_Productivity[".advSearchFields"][] = "IBC";
$tdataBanker_Productivity[".advSearchFields"][] = "YTD Count";
$tdataBanker_Productivity[".advSearchFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".advSearchFields"][] = "Total Count";
$tdataBanker_Productivity[".advSearchFields"][] = "Total Engagements";
$tdataBanker_Productivity[".advSearchFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".advSearchFields"][] = "Speculative";
$tdataBanker_Productivity[".advSearchFields"][] = "Minimum";

$tdataBanker_Productivity[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "ORDER BY bprevstore.y1 DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataBanker_Productivity[".strOrderBy"] = $tstrOrderBy;

$tdataBanker_Productivity[".orderindexes"] = array();
$tdataBanker_Productivity[".orderindexes"][] = array(6, (0 ? "ASC" : "DESC"), "bprevstore.y1");

$tdataBanker_Productivity[".sqlHead"] = "SELECT bprevstore.ID as num,  (@cnt := @cnt + 1) AS ID,  bprevstore.Name,  bankers.`Budget Year`,  bankers.`Start Date`,  bprevstore.y1 AS YTD,  bprevstore.y2,  bprevstore.y3,  bankers.`Last Year Rank`,  (`y1`+`y2`) AS `YTD+y2`,  (`y3`+`y2`+`y1`) AS `YTD+y2=y3`,  ifnull(bpengagements.Closed, 0) AS Closed,  ifnull(bpengagements.IBC, 0) AS IBC,  ifnull(bpengagements.rows, 0) AS `YTD Count`,  ifnull(bpengagements.Engagements, 0) AS `YTD Engagments`,  ifnull(bpengagmentstotal.`rows`, 0) AS `Total Count`,  ifnull(bpengagmentstotal.Engagements, 0) AS `Total Engagements`,  ifnull(bpengagmentstotal.Wheelhouse, 0) AS Wheelhouse,  ifnull(bpengagmentstotal.Speculative, 0) AS Speculative,  ifnull(bpengagmentstotal.Minimum, 0) AS Minimum";
$tdataBanker_Productivity[".sqlFrom"] = "FROM bpengagements  CROSS JOIN (SELECT @cnt := 0) AS dummy  RIGHT OUTER JOIN bprevstore ON bprevstore.Name = bpengagements.Banker  INNER JOIN bankers ON bprevstore.Name = bankers.Name  LEFT OUTER JOIN bpengagmentstotal ON bpengagements.Banker = bpengagmentstotal.Banker";
$tdataBanker_Productivity[".sqlWhereExpr"] = "";
$tdataBanker_Productivity[".sqlTail"] = "GROUP BY bprevstore.Name";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataBanker_Productivity[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataBanker_Productivity[".arrGroupsPerPage"] = $arrGPP;

$tableKeysBanker_Productivity = array();
$tdataBanker_Productivity[".Keys"] = $tableKeysBanker_Productivity;

$tdataBanker_Productivity[".listFields"] = array();
$tdataBanker_Productivity[".listFields"][] = "num";
$tdataBanker_Productivity[".listFields"][] = "ID";
$tdataBanker_Productivity[".listFields"][] = "Name";
$tdataBanker_Productivity[".listFields"][] = "Budget Year";
$tdataBanker_Productivity[".listFields"][] = "Start Date";
$tdataBanker_Productivity[".listFields"][] = "YTD";
$tdataBanker_Productivity[".listFields"][] = "y2";
$tdataBanker_Productivity[".listFields"][] = "y3";
$tdataBanker_Productivity[".listFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".listFields"][] = "YTD+y2";
$tdataBanker_Productivity[".listFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".listFields"][] = "Closed";
$tdataBanker_Productivity[".listFields"][] = "IBC";
$tdataBanker_Productivity[".listFields"][] = "YTD Count";
$tdataBanker_Productivity[".listFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".listFields"][] = "Total Count";
$tdataBanker_Productivity[".listFields"][] = "Total Engagements";
$tdataBanker_Productivity[".listFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".listFields"][] = "Speculative";
$tdataBanker_Productivity[".listFields"][] = "Minimum";

$tdataBanker_Productivity[".viewFields"] = array();
$tdataBanker_Productivity[".viewFields"][] = "num";
$tdataBanker_Productivity[".viewFields"][] = "ID";
$tdataBanker_Productivity[".viewFields"][] = "Name";
$tdataBanker_Productivity[".viewFields"][] = "Budget Year";
$tdataBanker_Productivity[".viewFields"][] = "Start Date";
$tdataBanker_Productivity[".viewFields"][] = "YTD";
$tdataBanker_Productivity[".viewFields"][] = "y2";
$tdataBanker_Productivity[".viewFields"][] = "y3";
$tdataBanker_Productivity[".viewFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".viewFields"][] = "YTD+y2";
$tdataBanker_Productivity[".viewFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".viewFields"][] = "Closed";
$tdataBanker_Productivity[".viewFields"][] = "IBC";
$tdataBanker_Productivity[".viewFields"][] = "YTD Count";
$tdataBanker_Productivity[".viewFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".viewFields"][] = "Total Count";
$tdataBanker_Productivity[".viewFields"][] = "Total Engagements";
$tdataBanker_Productivity[".viewFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".viewFields"][] = "Speculative";
$tdataBanker_Productivity[".viewFields"][] = "Minimum";

$tdataBanker_Productivity[".addFields"] = array();
$tdataBanker_Productivity[".addFields"][] = "ID";
$tdataBanker_Productivity[".addFields"][] = "Closed";
$tdataBanker_Productivity[".addFields"][] = "IBC";

$tdataBanker_Productivity[".inlineAddFields"] = array();
$tdataBanker_Productivity[".inlineAddFields"][] = "num";
$tdataBanker_Productivity[".inlineAddFields"][] = "ID";
$tdataBanker_Productivity[".inlineAddFields"][] = "Name";
$tdataBanker_Productivity[".inlineAddFields"][] = "Budget Year";
$tdataBanker_Productivity[".inlineAddFields"][] = "Start Date";
$tdataBanker_Productivity[".inlineAddFields"][] = "YTD";
$tdataBanker_Productivity[".inlineAddFields"][] = "y2";
$tdataBanker_Productivity[".inlineAddFields"][] = "y3";
$tdataBanker_Productivity[".inlineAddFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".inlineAddFields"][] = "YTD+y2";
$tdataBanker_Productivity[".inlineAddFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".inlineAddFields"][] = "Closed";
$tdataBanker_Productivity[".inlineAddFields"][] = "IBC";
$tdataBanker_Productivity[".inlineAddFields"][] = "YTD Count";
$tdataBanker_Productivity[".inlineAddFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".inlineAddFields"][] = "Total Count";
$tdataBanker_Productivity[".inlineAddFields"][] = "Total Engagements";
$tdataBanker_Productivity[".inlineAddFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".inlineAddFields"][] = "Speculative";
$tdataBanker_Productivity[".inlineAddFields"][] = "Minimum";

$tdataBanker_Productivity[".editFields"] = array();
$tdataBanker_Productivity[".editFields"][] = "ID";
$tdataBanker_Productivity[".editFields"][] = "Closed";
$tdataBanker_Productivity[".editFields"][] = "IBC";

$tdataBanker_Productivity[".inlineEditFields"] = array();
$tdataBanker_Productivity[".inlineEditFields"][] = "num";
$tdataBanker_Productivity[".inlineEditFields"][] = "ID";
$tdataBanker_Productivity[".inlineEditFields"][] = "Name";
$tdataBanker_Productivity[".inlineEditFields"][] = "Budget Year";
$tdataBanker_Productivity[".inlineEditFields"][] = "Start Date";
$tdataBanker_Productivity[".inlineEditFields"][] = "YTD";
$tdataBanker_Productivity[".inlineEditFields"][] = "y2";
$tdataBanker_Productivity[".inlineEditFields"][] = "y3";
$tdataBanker_Productivity[".inlineEditFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".inlineEditFields"][] = "YTD+y2";
$tdataBanker_Productivity[".inlineEditFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".inlineEditFields"][] = "Closed";
$tdataBanker_Productivity[".inlineEditFields"][] = "IBC";
$tdataBanker_Productivity[".inlineEditFields"][] = "YTD Count";
$tdataBanker_Productivity[".inlineEditFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".inlineEditFields"][] = "Total Count";
$tdataBanker_Productivity[".inlineEditFields"][] = "Total Engagements";
$tdataBanker_Productivity[".inlineEditFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".inlineEditFields"][] = "Speculative";
$tdataBanker_Productivity[".inlineEditFields"][] = "Minimum";

$tdataBanker_Productivity[".exportFields"] = array();
$tdataBanker_Productivity[".exportFields"][] = "num";
$tdataBanker_Productivity[".exportFields"][] = "ID";
$tdataBanker_Productivity[".exportFields"][] = "Name";
$tdataBanker_Productivity[".exportFields"][] = "Budget Year";
$tdataBanker_Productivity[".exportFields"][] = "Start Date";
$tdataBanker_Productivity[".exportFields"][] = "YTD";
$tdataBanker_Productivity[".exportFields"][] = "y2";
$tdataBanker_Productivity[".exportFields"][] = "y3";
$tdataBanker_Productivity[".exportFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".exportFields"][] = "YTD+y2";
$tdataBanker_Productivity[".exportFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".exportFields"][] = "Closed";
$tdataBanker_Productivity[".exportFields"][] = "IBC";
$tdataBanker_Productivity[".exportFields"][] = "YTD Count";
$tdataBanker_Productivity[".exportFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".exportFields"][] = "Total Count";
$tdataBanker_Productivity[".exportFields"][] = "Total Engagements";
$tdataBanker_Productivity[".exportFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".exportFields"][] = "Speculative";
$tdataBanker_Productivity[".exportFields"][] = "Minimum";

$tdataBanker_Productivity[".printFields"] = array();
$tdataBanker_Productivity[".printFields"][] = "num";
$tdataBanker_Productivity[".printFields"][] = "ID";
$tdataBanker_Productivity[".printFields"][] = "Name";
$tdataBanker_Productivity[".printFields"][] = "Budget Year";
$tdataBanker_Productivity[".printFields"][] = "Start Date";
$tdataBanker_Productivity[".printFields"][] = "YTD";
$tdataBanker_Productivity[".printFields"][] = "y2";
$tdataBanker_Productivity[".printFields"][] = "y3";
$tdataBanker_Productivity[".printFields"][] = "Last Year Rank";
$tdataBanker_Productivity[".printFields"][] = "YTD+y2";
$tdataBanker_Productivity[".printFields"][] = "YTD+y2=y3";
$tdataBanker_Productivity[".printFields"][] = "Closed";
$tdataBanker_Productivity[".printFields"][] = "IBC";
$tdataBanker_Productivity[".printFields"][] = "YTD Count";
$tdataBanker_Productivity[".printFields"][] = "YTD Engagments";
$tdataBanker_Productivity[".printFields"][] = "Total Count";
$tdataBanker_Productivity[".printFields"][] = "Total Engagements";
$tdataBanker_Productivity[".printFields"][] = "Wheelhouse";
$tdataBanker_Productivity[".printFields"][] = "Speculative";
$tdataBanker_Productivity[".printFields"][] = "Minimum";

//	num
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "num";
	$fdata["GoodName"] = "num";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Num"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "bprevstore.ID";
	
		
		
				
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
	
		
		
	$tdataBanker_Productivity["num"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "";
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
		$fdata["FullName"] = "(@cnt := @cnt + 1)";
	
		
		
				
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
	
		
		
	$tdataBanker_Productivity["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bprevstore";
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
		$fdata["FullName"] = "bprevstore.Name";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Name"] = $fdata;
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
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Budget Year"; 
		$fdata["FullName"] = "bankers.`Budget Year`";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Budget Year"] = $fdata;
//	Start Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Start Date";
	$fdata["GoodName"] = "Start_Date";
	$fdata["ownerTable"] = "bankers";
	$fdata["Label"] = "Start Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Start Date"; 
		$fdata["FullName"] = "bankers.`Start Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
		$edata["DateEditType"] = 0; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataBanker_Productivity["Start Date"] = $fdata;
//	YTD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "YTD";
	$fdata["GoodName"] = "YTD";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "YTD"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "y1"; 
		$fdata["FullName"] = "bprevstore.y1";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["YTD"] = $fdata;
//	y2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "y2";
	$fdata["GoodName"] = "y2";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Y2"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "y2"; 
		$fdata["FullName"] = "bprevstore.y2";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["y2"] = $fdata;
//	y3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "y3";
	$fdata["GoodName"] = "y3";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Y3"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "y3"; 
		$fdata["FullName"] = "bprevstore.y3";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["y3"] = $fdata;
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
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Last Year Rank"; 
		$fdata["FullName"] = "bankers.`Last Year Rank`";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Last Year Rank"] = $fdata;
//	YTD+y2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "YTD+y2";
	$fdata["GoodName"] = "YTD_y2";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD+y2"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD+y2"; 
		$fdata["FullName"] = "(`y1`+`y2`)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["YTD+y2"] = $fdata;
//	YTD+y2=y3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "YTD+y2=y3";
	$fdata["GoodName"] = "YTD_y2_y3";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD+y2=y3"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD+y2=y3"; 
		$fdata["FullName"] = "(`y3`+`y2`+`y1`)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["YTD+y2=y3"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "";
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
		$fdata["FullName"] = "ifnull(bpengagements.Closed, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Closed"] = $fdata;
//	IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "IBC";
	$fdata["GoodName"] = "IBC";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "IBC"; 
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
	
		$fdata["strField"] = "IBC"; 
		$fdata["FullName"] = "ifnull(bpengagements.IBC, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["IBC"] = $fdata;
//	YTD Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "YTD Count";
	$fdata["GoodName"] = "YTD_Count";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD Count"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Count"; 
		$fdata["FullName"] = "ifnull(bpengagements.rows, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["YTD Count"] = $fdata;
//	YTD Engagments
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "YTD Engagments";
	$fdata["GoodName"] = "YTD_Engagments";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTD Engagments"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "YTD Engagments"; 
		$fdata["FullName"] = "ifnull(bpengagements.Engagements, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["YTD Engagments"] = $fdata;
//	Total Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "Total Count";
	$fdata["GoodName"] = "Total_Count";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Total Count"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Total Count"; 
		$fdata["FullName"] = "ifnull(bpengagmentstotal.`rows`, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Total Count"] = $fdata;
//	Total Engagements
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "Total Engagements";
	$fdata["GoodName"] = "Total_Engagements";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Total Engagements"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Total Engagements"; 
		$fdata["FullName"] = "ifnull(bpengagmentstotal.Engagements, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Total Engagements"] = $fdata;
//	Wheelhouse
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "Wheelhouse";
	$fdata["GoodName"] = "Wheelhouse";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Wheelhouse"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Wheelhouse"; 
		$fdata["FullName"] = "ifnull(bpengagmentstotal.Wheelhouse, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Wheelhouse"] = $fdata;
//	Speculative
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "Speculative";
	$fdata["GoodName"] = "Speculative";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Speculative"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Speculative"; 
		$fdata["FullName"] = "ifnull(bpengagmentstotal.Speculative, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Speculative"] = $fdata;
//	Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "Minimum";
	$fdata["GoodName"] = "Minimum";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "Minimum"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Minimum"; 
		$fdata["FullName"] = "ifnull(bpengagmentstotal.Minimum, 0)";
	
		
		
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
	
		
		
	$tdataBanker_Productivity["Minimum"] = $fdata;

	
$tables_data["Banker Productivity"]=&$tdataBanker_Productivity;
$field_labels["Banker_Productivity"] = &$fieldLabelsBanker_Productivity;
$fieldToolTips["Banker Productivity"] = &$fieldToolTipsBanker_Productivity;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Banker Productivity"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Banker Productivity"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Banker_Productivity()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "bprevstore.ID as num,  (@cnt := @cnt + 1) AS ID,  bprevstore.Name,  bankers.`Budget Year`,  bankers.`Start Date`,  bprevstore.y1 AS YTD,  bprevstore.y2,  bprevstore.y3,  bankers.`Last Year Rank`,  (`y1`+`y2`) AS `YTD+y2`,  (`y3`+`y2`+`y1`) AS `YTD+y2=y3`,  ifnull(bpengagements.Closed, 0) AS Closed,  ifnull(bpengagements.IBC, 0) AS IBC,  ifnull(bpengagements.rows, 0) AS `YTD Count`,  ifnull(bpengagements.Engagements, 0) AS `YTD Engagments`,  ifnull(bpengagmentstotal.`rows`, 0) AS `Total Count`,  ifnull(bpengagmentstotal.Engagements, 0) AS `Total Engagements`,  ifnull(bpengagmentstotal.Wheelhouse, 0) AS Wheelhouse,  ifnull(bpengagmentstotal.Speculative, 0) AS Speculative,  ifnull(bpengagmentstotal.Minimum, 0) AS Minimum";
$proto0["m_strFrom"] = "FROM bpengagements  CROSS JOIN (SELECT @cnt := 0) AS dummy  RIGHT OUTER JOIN bprevstore ON bprevstore.Name = bpengagements.Banker  INNER JOIN bankers ON bprevstore.Name = bankers.Name  LEFT OUTER JOIN bpengagmentstotal ON bpengagements.Banker = bpengagmentstotal.Banker";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY bprevstore.y1 DESC";
$proto0["m_strTail"] = "GROUP BY bprevstore.Name";
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
	"m_strTable" => "bprevstore"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "num";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(@cnt := @cnt + 1)"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "ID";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bprevstore"
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
	"m_strName" => "Start Date",
	"m_strTable" => "bankers"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "y1",
	"m_strTable" => "bprevstore"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "YTD";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "y2",
	"m_strTable" => "bprevstore"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "y3",
	"m_strTable" => "bprevstore"
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
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`y1`+`y2`)"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "YTD+y2";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(`y3`+`y2`+`y1`)"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "YTD+y2=y3";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$proto28=array();
$proto28["m_functiontype"] = "SQLF_CUSTOM";
$proto28["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagements.Closed"
));

$proto28["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto28["m_arguments"][]=$obj;
$proto28["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto28);

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "Closed";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$proto32=array();
$proto32["m_functiontype"] = "SQLF_CUSTOM";
$proto32["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagements.IBC"
));

$proto32["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto32["m_arguments"][]=$obj;
$proto32["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto32);

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "IBC";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$proto36=array();
$proto36["m_functiontype"] = "SQLF_CUSTOM";
$proto36["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagements.rows"
));

$proto36["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto36["m_arguments"][]=$obj;
$proto36["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto36);

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "YTD Count";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$proto40=array();
$proto40["m_functiontype"] = "SQLF_CUSTOM";
$proto40["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagements.Engagements"
));

$proto40["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto40["m_arguments"][]=$obj;
$proto40["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto40);

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "YTD Engagments";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$proto44=array();
$proto44["m_functiontype"] = "SQLF_CUSTOM";
$proto44["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagmentstotal.`rows`"
));

$proto44["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto44["m_arguments"][]=$obj;
$proto44["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto44);

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "Total Count";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$proto48=array();
$proto48["m_functiontype"] = "SQLF_CUSTOM";
$proto48["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagmentstotal.Engagements"
));

$proto48["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto48["m_arguments"][]=$obj;
$proto48["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto48);

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "Total Engagements";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$proto52=array();
$proto52["m_functiontype"] = "SQLF_CUSTOM";
$proto52["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagmentstotal.Wheelhouse"
));

$proto52["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto52["m_arguments"][]=$obj;
$proto52["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto52);

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "Wheelhouse";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$proto56=array();
$proto56["m_functiontype"] = "SQLF_CUSTOM";
$proto56["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagmentstotal.Speculative"
));

$proto56["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto56["m_arguments"][]=$obj;
$proto56["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto56);

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "Speculative";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$proto60=array();
$proto60["m_functiontype"] = "SQLF_CUSTOM";
$proto60["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "bpengagmentstotal.Minimum"
));

$proto60["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "0"
));

$proto60["m_arguments"][]=$obj;
$proto60["m_strFunctionName"] = "ifnull";
$obj = new SQLFunctionCall($proto60);

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "Minimum";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto63=array();
$proto63["m_link"] = "SQLL_MAIN";
			$proto64=array();
$proto64["m_strName"] = "bpengagements";
$proto64["m_columns"] = array();
$proto64["m_columns"][] = "ID";
$proto64["m_columns"][] = "rows";
$proto64["m_columns"][] = "Banker";
$proto64["m_columns"][] = "Engagements";
$proto64["m_columns"][] = "IBC";
$proto64["m_columns"][] = "Closed";
$obj = new SQLTable($proto64);

$proto63["m_table"] = $obj;
$proto63["m_alias"] = "";
$proto65=array();
$proto65["m_sql"] = "";
$proto65["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto65["m_column"]=$obj;
$proto65["m_contained"] = array();
$proto65["m_strCase"] = "";
$proto65["m_havingmode"] = "0";
$proto65["m_inBrackets"] = "0";
$proto65["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto65);

$proto63["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto63);

$proto0["m_fromlist"][]=$obj;
												$proto67=array();
$proto67["m_link"] = "SQLL_CROSSJOIN";
			$proto68=array();
$proto68["m_strHead"] = "SELECT";
$proto68["m_strFieldList"] = "@cnt := 0";
$proto68["m_strFrom"] = "";
$proto68["m_strWhere"] = "";
$proto68["m_strOrderBy"] = "";
$proto68["m_strTail"] = "";
$proto68["cipherer"] = null;
$proto69=array();
$proto69["m_sql"] = "";
$proto69["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto69["m_column"]=$obj;
$proto69["m_contained"] = array();
$proto69["m_strCase"] = "";
$proto69["m_havingmode"] = "0";
$proto69["m_inBrackets"] = "0";
$proto69["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto69);

$proto68["m_where"] = $obj;
$proto71=array();
$proto71["m_sql"] = "";
$proto71["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto71["m_column"]=$obj;
$proto71["m_contained"] = array();
$proto71["m_strCase"] = "";
$proto71["m_havingmode"] = "0";
$proto71["m_inBrackets"] = "0";
$proto71["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto71);

$proto68["m_having"] = $obj;
$proto68["m_fieldlist"] = array();
						$proto73=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "@cnt := 0"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto68["m_fieldlist"][]=$obj;
$proto68["m_fromlist"] = array();
$proto68["m_groupby"] = array();
$proto68["m_orderby"] = array();
$obj = new SQLQuery($proto68);

$proto67["m_table"] = $obj;
$proto67["m_alias"] = "dummy";
$proto75=array();
$proto75["m_sql"] = "";
$proto75["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto75["m_column"]=$obj;
$proto75["m_contained"] = array();
$proto75["m_strCase"] = "";
$proto75["m_havingmode"] = "0";
$proto75["m_inBrackets"] = "0";
$proto75["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto75);

$proto67["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto67);

$proto0["m_fromlist"][]=$obj;
												$proto77=array();
$proto77["m_link"] = "SQLL_RIGHTJOIN";
			$proto78=array();
$proto78["m_strName"] = "bprevstore";
$proto78["m_columns"] = array();
$proto78["m_columns"][] = "ID";
$proto78["m_columns"][] = "Name";
$proto78["m_columns"][] = "y1";
$proto78["m_columns"][] = "y2";
$proto78["m_columns"][] = "y3";
$obj = new SQLTable($proto78);

$proto77["m_table"] = $obj;
$proto77["m_alias"] = "";
$proto79=array();
$proto79["m_sql"] = "bprevstore.Name = bpengagements.Banker";
$proto79["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bprevstore"
));

$proto79["m_column"]=$obj;
$proto79["m_contained"] = array();
$proto79["m_strCase"] = "= bpengagements.Banker";
$proto79["m_havingmode"] = "0";
$proto79["m_inBrackets"] = "0";
$proto79["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto79);

$proto77["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto77);

$proto0["m_fromlist"][]=$obj;
												$proto81=array();
$proto81["m_link"] = "SQLL_INNERJOIN";
			$proto82=array();
$proto82["m_strName"] = "bankers";
$proto82["m_columns"] = array();
$proto82["m_columns"][] = "ID";
$proto82["m_columns"][] = "Name";
$proto82["m_columns"][] = "Start Date";
$proto82["m_columns"][] = "Budget Year";
$proto82["m_columns"][] = "Active";
$proto82["m_columns"][] = "YTD Revenue";
$proto82["m_columns"][] = "Last Year Rev";
$proto82["m_columns"][] = "Prior Year Rev";
$proto82["m_columns"][] = "Last Year Rank";
$proto82["m_columns"][] = "YTD+Last";
$proto82["m_columns"][] = "YTD+Last+Prior";
$proto82["m_columns"][] = "YTD Closing";
$proto82["m_columns"][] = "Last Year Closing";
$proto82["m_columns"][] = "YTD IBC";
$proto82["m_columns"][] = "YTD Engagements";
$proto82["m_columns"][] = "Total Current Engagments";
$proto82["m_columns"][] = "# Wheelhouse";
$proto82["m_columns"][] = "# Speculative";
$proto82["m_columns"][] = "# Minimum";
$proto82["m_columns"][] = "Last Name";
$proto82["m_columns"][] = "First Name";
$obj = new SQLTable($proto82);

$proto81["m_table"] = $obj;
$proto81["m_alias"] = "";
$proto83=array();
$proto83["m_sql"] = "bprevstore.Name = bankers.Name";
$proto83["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bprevstore"
));

$proto83["m_column"]=$obj;
$proto83["m_contained"] = array();
$proto83["m_strCase"] = "= bankers.Name";
$proto83["m_havingmode"] = "0";
$proto83["m_inBrackets"] = "0";
$proto83["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto83);

$proto81["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto81);

$proto0["m_fromlist"][]=$obj;
												$proto85=array();
$proto85["m_link"] = "SQLL_LEFTJOIN";
			$proto86=array();
$proto86["m_strName"] = "bpengagmentstotal";
$proto86["m_columns"] = array();
$proto86["m_columns"][] = "ID";
$proto86["m_columns"][] = "Banker";
$proto86["m_columns"][] = "Engagements";
$proto86["m_columns"][] = "Wheelhouse";
$proto86["m_columns"][] = "Speculative";
$proto86["m_columns"][] = "Minimum";
$proto86["m_columns"][] = "rows";
$obj = new SQLTable($proto86);

$proto85["m_table"] = $obj;
$proto85["m_alias"] = "";
$proto87=array();
$proto87["m_sql"] = "bpengagements.Banker = bpengagmentstotal.Banker";
$proto87["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Banker",
	"m_strTable" => "bpengagements"
));

$proto87["m_column"]=$obj;
$proto87["m_contained"] = array();
$proto87["m_strCase"] = "= bpengagmentstotal.Banker";
$proto87["m_havingmode"] = "0";
$proto87["m_inBrackets"] = "0";
$proto87["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto87);

$proto85["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto85);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto89=array();
						$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bprevstore"
));

$proto89["m_column"]=$obj;
$obj = new SQLGroupByItem($proto89);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
												$proto91=array();
						$obj = new SQLField(array(
	"m_strName" => "y1",
	"m_strTable" => "bprevstore"
));

$proto91["m_column"]=$obj;
$proto91["m_bAsc"] = 0;
$proto91["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto91);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Banker_Productivity = createSqlQuery_Banker_Productivity();
																				$tdataBanker_Productivity[".sqlquery"] = $queryData_Banker_Productivity;
	
if(isset($tdataBanker_Productivity["field2"])){
	$tdataBanker_Productivity["field2"]["LookupTable"] = "carscars_view";
	$tdataBanker_Productivity["field2"]["LookupOrderBy"] = "name";
	$tdataBanker_Productivity["field2"]["LookupType"] = 4;
	$tdataBanker_Productivity["field2"]["LinkField"] = "email";
	$tdataBanker_Productivity["field2"]["DisplayField"] = "name";
	$tdataBanker_Productivity[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Banker_Productivity_events.php"));
$tableEvents["Banker Productivity"] = new eventclass_Banker_Productivity;
$tdataBanker_Productivity[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Banker Productivity");

?>