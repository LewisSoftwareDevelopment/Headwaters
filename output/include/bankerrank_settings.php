<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankerrank = array();
	$tdatabankerrank[".NumberOfChars"] = 80; 
	$tdatabankerrank[".ShortName"] = "bankerrank";
	$tdatabankerrank[".OwnerID"] = "";
	$tdatabankerrank[".OriginalTable"] = "bankerrank";

//	field labels
$fieldLabelsbankerrank = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankerrank["English"] = array();
	$fieldToolTipsbankerrank["English"] = array();
	$fieldLabelsbankerrank["English"]["ID"] = "ID";
	$fieldToolTipsbankerrank["English"]["ID"] = "";
	$fieldLabelsbankerrank["English"]["Year"] = "Year";
	$fieldToolTipsbankerrank["English"]["Year"] = "";
	$fieldLabelsbankerrank["English"]["Name"] = "Name";
	$fieldToolTipsbankerrank["English"]["Name"] = "";
	$fieldLabelsbankerrank["English"]["Rank"] = "Rank";
	$fieldToolTipsbankerrank["English"]["Rank"] = "";
	if (count($fieldToolTipsbankerrank["English"]))
		$tdatabankerrank[".isUseToolTips"] = true;
}
	
	
	$tdatabankerrank[".NCSearch"] = true;



$tdatabankerrank[".shortTableName"] = "bankerrank";
$tdatabankerrank[".nSecOptions"] = 0;
$tdatabankerrank[".recsPerRowList"] = 1;
$tdatabankerrank[".mainTableOwnerID"] = "";
$tdatabankerrank[".moveNext"] = 1;
$tdatabankerrank[".nType"] = 0;

$tdatabankerrank[".strOriginalTableName"] = "bankerrank";




$tdatabankerrank[".showAddInPopup"] = false;

$tdatabankerrank[".showEditInPopup"] = false;

$tdatabankerrank[".showViewInPopup"] = false;

$tdatabankerrank[".fieldsForRegister"] = array();

$tdatabankerrank[".listAjax"] = false;

	$tdatabankerrank[".audit"] = false;

	$tdatabankerrank[".locking"] = false;

$tdatabankerrank[".listIcons"] = true;
$tdatabankerrank[".edit"] = true;
$tdatabankerrank[".inlineEdit"] = true;
$tdatabankerrank[".inlineAdd"] = true;
$tdatabankerrank[".view"] = true;

$tdatabankerrank[".exportTo"] = true;

$tdatabankerrank[".printFriendly"] = true;

$tdatabankerrank[".delete"] = true;

$tdatabankerrank[".showSimpleSearchOptions"] = false;

$tdatabankerrank[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankerrank[".isUseAjaxSuggest"] = false;
else 
	$tdatabankerrank[".isUseAjaxSuggest"] = true;

$tdatabankerrank[".rowHighlite"] = true;

// button handlers file names

$tdatabankerrank[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankerrank[".isUseTimeForSearch"] = false;




$tdatabankerrank[".allSearchFields"] = array();

$tdatabankerrank[".allSearchFields"][] = "ID";
$tdatabankerrank[".allSearchFields"][] = "Year";
$tdatabankerrank[".allSearchFields"][] = "Name";
$tdatabankerrank[".allSearchFields"][] = "Rank";

$tdatabankerrank[".googleLikeFields"][] = "ID";
$tdatabankerrank[".googleLikeFields"][] = "Year";
$tdatabankerrank[".googleLikeFields"][] = "Name";
$tdatabankerrank[".googleLikeFields"][] = "Rank";


$tdatabankerrank[".advSearchFields"][] = "ID";
$tdatabankerrank[".advSearchFields"][] = "Year";
$tdatabankerrank[".advSearchFields"][] = "Name";
$tdatabankerrank[".advSearchFields"][] = "Rank";

$tdatabankerrank[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatabankerrank[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankerrank[".strOrderBy"] = $tstrOrderBy;

$tdatabankerrank[".orderindexes"] = array();

$tdatabankerrank[".sqlHead"] = "SELECT ID,   `Year`,   Name,   Rank";
$tdatabankerrank[".sqlFrom"] = "FROM bankerrank";
$tdatabankerrank[".sqlWhereExpr"] = "";
$tdatabankerrank[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankerrank[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankerrank[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankerrank = array();
$tableKeysbankerrank[] = "ID";
$tdatabankerrank[".Keys"] = $tableKeysbankerrank;

$tdatabankerrank[".listFields"] = array();

$tdatabankerrank[".viewFields"] = array();
$tdatabankerrank[".viewFields"][] = "ID";
$tdatabankerrank[".viewFields"][] = "Year";
$tdatabankerrank[".viewFields"][] = "Name";
$tdatabankerrank[".viewFields"][] = "Rank";

$tdatabankerrank[".addFields"] = array();
$tdatabankerrank[".addFields"][] = "Year";
$tdatabankerrank[".addFields"][] = "Name";
$tdatabankerrank[".addFields"][] = "Rank";

$tdatabankerrank[".inlineAddFields"] = array();

$tdatabankerrank[".editFields"] = array();
$tdatabankerrank[".editFields"][] = "Year";
$tdatabankerrank[".editFields"][] = "Name";
$tdatabankerrank[".editFields"][] = "Rank";

$tdatabankerrank[".inlineEditFields"] = array();

$tdatabankerrank[".exportFields"] = array();
$tdatabankerrank[".exportFields"][] = "ID";
$tdatabankerrank[".exportFields"][] = "Year";
$tdatabankerrank[".exportFields"][] = "Name";
$tdatabankerrank[".exportFields"][] = "Rank";

$tdatabankerrank[".printFields"] = array();
$tdatabankerrank[".printFields"][] = "ID";
$tdatabankerrank[".printFields"][] = "Year";
$tdatabankerrank[".printFields"][] = "Name";
$tdatabankerrank[".printFields"][] = "Rank";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
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
	
		
		
	$tdatabankerrank["ID"] = $fdata;
//	Year
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Year";
	$fdata["GoodName"] = "Year";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "Year"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Year"; 
		$fdata["FullName"] = "`Year`";
	
		
		
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
	
		
		
	$tdatabankerrank["Year"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "Name"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Name"; 
		$fdata["FullName"] = "Name";
	
		
		
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
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrank["Name"] = $fdata;
//	Rank
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Rank";
	$fdata["GoodName"] = "Rank";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "Rank"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Rank"; 
		$fdata["FullName"] = "Rank";
	
		
		
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
	
		
		
	$tdatabankerrank["Rank"] = $fdata;

	
$tables_data["bankerrank"]=&$tdatabankerrank;
$field_labels["bankerrank"] = &$fieldLabelsbankerrank;
$fieldToolTips["bankerrank"] = &$fieldToolTipsbankerrank;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankerrank"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankerrank"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="bankers";
	$masterParams["mDataSourceTable"]="bankers";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "bankers";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 2;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["bankerrank"][$mIndex] = $masterParams;	
		$masterTablesData["bankerrank"][$mIndex]["masterKeys"][]="Name";
		$masterTablesData["bankerrank"][$mIndex]["detailKeys"][]="Name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankerrank()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   `Year`,   Name,   Rank";
$proto0["m_strFrom"] = "FROM bankerrank";
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
	"m_strTable" => "bankerrank"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Year",
	"m_strTable" => "bankerrank"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankerrank"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Rank",
	"m_strTable" => "bankerrank"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "bankerrank";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "ID";
$proto14["m_columns"][] = "Year";
$proto14["m_columns"][] = "Name";
$proto14["m_columns"][] = "Rank";
$obj = new SQLTable($proto14);

$proto13["m_table"] = $obj;
$proto13["m_alias"] = "";
$proto15=array();
$proto15["m_sql"] = "";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "";
$proto15["m_havingmode"] = "0";
$proto15["m_inBrackets"] = "0";
$proto15["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto15);

$proto13["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto13);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bankerrank = createSqlQuery_bankerrank();
				$tdatabankerrank[".sqlquery"] = $queryData_bankerrank;
	
if(isset($tdatabankerrank["field2"])){
	$tdatabankerrank["field2"]["LookupTable"] = "carscars_view";
	$tdatabankerrank["field2"]["LookupOrderBy"] = "name";
	$tdatabankerrank["field2"]["LookupType"] = 4;
	$tdatabankerrank["field2"]["LinkField"] = "email";
	$tdatabankerrank["field2"]["DisplayField"] = "name";
	$tdatabankerrank[".hasCustomViewField"] = true;
}

$tableEvents["bankerrank"] = new eventsBase;
$tdatabankerrank[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankerrank");

?>