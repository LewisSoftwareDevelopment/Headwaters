<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankerrev = array();
	$tdatabankerrev[".NumberOfChars"] = 80; 
	$tdatabankerrev[".ShortName"] = "bankerrev";
	$tdatabankerrev[".OwnerID"] = "";
	$tdatabankerrev[".OriginalTable"] = "bankerrev";

//	field labels
$fieldLabelsbankerrev = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankerrev["English"] = array();
	$fieldToolTipsbankerrev["English"] = array();
	$fieldLabelsbankerrev["English"]["Name"] = "Name";
	$fieldToolTipsbankerrev["English"]["Name"] = "";
	$fieldLabelsbankerrev["English"]["Year"] = "Year";
	$fieldToolTipsbankerrev["English"]["Year"] = "";
	$fieldLabelsbankerrev["English"]["Revenue_total"] = "Revenue Total";
	$fieldToolTipsbankerrev["English"]["Revenue total"] = "";
	$fieldLabelsbankerrev["English"]["ID"] = "ID";
	$fieldToolTipsbankerrev["English"]["ID"] = "";
	if (count($fieldToolTipsbankerrev["English"]))
		$tdatabankerrev[".isUseToolTips"] = true;
}
	
	
	$tdatabankerrev[".NCSearch"] = true;



$tdatabankerrev[".shortTableName"] = "bankerrev";
$tdatabankerrev[".nSecOptions"] = 0;
$tdatabankerrev[".recsPerRowList"] = 1;
$tdatabankerrev[".mainTableOwnerID"] = "";
$tdatabankerrev[".moveNext"] = 1;
$tdatabankerrev[".nType"] = 0;

$tdatabankerrev[".strOriginalTableName"] = "bankerrev";




$tdatabankerrev[".showAddInPopup"] = false;

$tdatabankerrev[".showEditInPopup"] = false;

$tdatabankerrev[".showViewInPopup"] = false;

$tdatabankerrev[".fieldsForRegister"] = array();

$tdatabankerrev[".listAjax"] = false;

	$tdatabankerrev[".audit"] = false;

	$tdatabankerrev[".locking"] = false;

$tdatabankerrev[".listIcons"] = true;
$tdatabankerrev[".edit"] = true;
$tdatabankerrev[".inlineEdit"] = true;
$tdatabankerrev[".inlineAdd"] = true;
$tdatabankerrev[".view"] = true;

$tdatabankerrev[".exportTo"] = true;

$tdatabankerrev[".printFriendly"] = true;

$tdatabankerrev[".delete"] = true;

$tdatabankerrev[".showSimpleSearchOptions"] = false;

$tdatabankerrev[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankerrev[".isUseAjaxSuggest"] = false;
else 
	$tdatabankerrev[".isUseAjaxSuggest"] = true;

$tdatabankerrev[".rowHighlite"] = true;

// button handlers file names

$tdatabankerrev[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankerrev[".isUseTimeForSearch"] = false;




$tdatabankerrev[".allSearchFields"] = array();

$tdatabankerrev[".allSearchFields"][] = "Year";
$tdatabankerrev[".allSearchFields"][] = "Revenue total";
$tdatabankerrev[".allSearchFields"][] = "Name";
$tdatabankerrev[".allSearchFields"][] = "ID";

$tdatabankerrev[".googleLikeFields"][] = "Year";
$tdatabankerrev[".googleLikeFields"][] = "Revenue total";
$tdatabankerrev[".googleLikeFields"][] = "Name";
$tdatabankerrev[".googleLikeFields"][] = "ID";


$tdatabankerrev[".advSearchFields"][] = "Year";
$tdatabankerrev[".advSearchFields"][] = "Revenue total";
$tdatabankerrev[".advSearchFields"][] = "Name";
$tdatabankerrev[".advSearchFields"][] = "ID";

$tdatabankerrev[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatabankerrev[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankerrev[".strOrderBy"] = $tstrOrderBy;

$tdatabankerrev[".orderindexes"] = array();

$tdatabankerrev[".sqlHead"] = "SELECT `Year`,  `Revenue total`,  Name,  ID";
$tdatabankerrev[".sqlFrom"] = "FROM bankerrev";
$tdatabankerrev[".sqlWhereExpr"] = "";
$tdatabankerrev[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankerrev[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankerrev[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankerrev = array();
$tableKeysbankerrev[] = "ID";
$tdatabankerrev[".Keys"] = $tableKeysbankerrev;

$tdatabankerrev[".listFields"] = array();
$tdatabankerrev[".listFields"][] = "Year";
$tdatabankerrev[".listFields"][] = "Revenue total";
$tdatabankerrev[".listFields"][] = "Name";

$tdatabankerrev[".viewFields"] = array();
$tdatabankerrev[".viewFields"][] = "Year";
$tdatabankerrev[".viewFields"][] = "Revenue total";
$tdatabankerrev[".viewFields"][] = "Name";

$tdatabankerrev[".addFields"] = array();
$tdatabankerrev[".addFields"][] = "Year";
$tdatabankerrev[".addFields"][] = "Revenue total";
$tdatabankerrev[".addFields"][] = "Name";

$tdatabankerrev[".inlineAddFields"] = array();
$tdatabankerrev[".inlineAddFields"][] = "Year";
$tdatabankerrev[".inlineAddFields"][] = "Revenue total";
$tdatabankerrev[".inlineAddFields"][] = "Name";

$tdatabankerrev[".editFields"] = array();
$tdatabankerrev[".editFields"][] = "Year";
$tdatabankerrev[".editFields"][] = "Revenue total";
$tdatabankerrev[".editFields"][] = "Name";

$tdatabankerrev[".inlineEditFields"] = array();
$tdatabankerrev[".inlineEditFields"][] = "Year";
$tdatabankerrev[".inlineEditFields"][] = "Revenue total";
$tdatabankerrev[".inlineEditFields"][] = "Name";

$tdatabankerrev[".exportFields"] = array();
$tdatabankerrev[".exportFields"][] = "Year";
$tdatabankerrev[".exportFields"][] = "Revenue total";
$tdatabankerrev[".exportFields"][] = "Name";
$tdatabankerrev[".exportFields"][] = "ID";

$tdatabankerrev[".printFields"] = array();
$tdatabankerrev[".printFields"][] = "Year";
$tdatabankerrev[".printFields"][] = "Revenue total";
$tdatabankerrev[".printFields"][] = "Name";
$tdatabankerrev[".printFields"][] = "ID";

//	Year
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Year";
	$fdata["GoodName"] = "Year";
	$fdata["ownerTable"] = "bankerrev";
	$fdata["Label"] = "Year"; 
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
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrev["Year"] = $fdata;
//	Revenue total
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Revenue total";
	$fdata["GoodName"] = "Revenue_total";
	$fdata["ownerTable"] = "bankerrev";
	$fdata["Label"] = "Revenue Total"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Revenue total"; 
		$fdata["FullName"] = "`Revenue total`";
	
		
		
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
	
		
		
	$tdatabankerrev["Revenue total"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bankerrev";
	$fdata["Label"] = "Name"; 
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
	
		
		
	$tdatabankerrev["Name"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bankerrev";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
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
	
		
		
	$tdatabankerrev["ID"] = $fdata;

	
$tables_data["bankerrev"]=&$tdatabankerrev;
$field_labels["bankerrev"] = &$fieldLabelsbankerrev;
$fieldToolTips["bankerrev"] = &$fieldToolTipsbankerrev;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankerrev"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankerrev"] = array();

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
	$masterTablesData["bankerrev"][$mIndex] = $masterParams;	
		$masterTablesData["bankerrev"][$mIndex]["masterKeys"][]="Name";
		$masterTablesData["bankerrev"][$mIndex]["detailKeys"][]="Name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankerrev()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "`Year`,  `Revenue total`,  Name,  ID";
$proto0["m_strFrom"] = "FROM bankerrev";
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
	"m_strName" => "Year",
	"m_strTable" => "bankerrev"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Revenue total",
	"m_strTable" => "bankerrev"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankerrev"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "bankerrev"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "bankerrev";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "ID";
$proto14["m_columns"][] = "Year";
$proto14["m_columns"][] = "Revenue total";
$proto14["m_columns"][] = "Name";
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
$queryData_bankerrev = createSqlQuery_bankerrev();
				$tdatabankerrev[".sqlquery"] = $queryData_bankerrev;
	
if(isset($tdatabankerrev["field2"])){
	$tdatabankerrev["field2"]["LookupTable"] = "carscars_view";
	$tdatabankerrev["field2"]["LookupOrderBy"] = "name";
	$tdatabankerrev["field2"]["LookupType"] = 4;
	$tdatabankerrev["field2"]["LinkField"] = "email";
	$tdatabankerrev["field2"]["DisplayField"] = "name";
	$tdatabankerrev[".hasCustomViewField"] = true;
}

$tableEvents["bankerrev"] = new eventsBase;
$tdatabankerrev[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankerrev");

?>