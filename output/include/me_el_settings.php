<?php
require_once(getabspath("classes/cipherer.php"));
$tdatame_el = array();
	$tdatame_el[".NumberOfChars"] = 80; 
	$tdatame_el[".ShortName"] = "me_el";
	$tdatame_el[".OwnerID"] = "";
	$tdatame_el[".OriginalTable"] = "me-el";

//	field labels
$fieldLabelsme_el = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsme_el["English"] = array();
	$fieldToolTipsme_el["English"] = array();
	$fieldLabelsme_el["English"]["ID"] = "ID";
	$fieldToolTipsme_el["English"]["ID"] = "";
	$fieldLabelsme_el["English"]["ELClient"] = "ELClient";
	$fieldToolTipsme_el["English"]["ELClient"] = "";
	$fieldLabelsme_el["English"]["ELDealType"] = "ELDeal Type";
	$fieldToolTipsme_el["English"]["ELDealType"] = "";
	$fieldLabelsme_el["English"]["ELAmount"] = "ELAmount";
	$fieldToolTipsme_el["English"]["ELAmount"] = "";
	$fieldLabelsme_el["English"]["ELSlot"] = "ELSlot";
	$fieldToolTipsme_el["English"]["ELSlot"] = "";
	if (count($fieldToolTipsme_el["English"]))
		$tdatame_el[".isUseToolTips"] = true;
}
	
	
	$tdatame_el[".NCSearch"] = true;



$tdatame_el[".shortTableName"] = "me_el";
$tdatame_el[".nSecOptions"] = 0;
$tdatame_el[".recsPerRowList"] = 1;
$tdatame_el[".mainTableOwnerID"] = "";
$tdatame_el[".moveNext"] = 1;
$tdatame_el[".nType"] = 0;

$tdatame_el[".strOriginalTableName"] = "me-el";




$tdatame_el[".showAddInPopup"] = false;

$tdatame_el[".showEditInPopup"] = false;

$tdatame_el[".showViewInPopup"] = false;

$tdatame_el[".fieldsForRegister"] = array();

$tdatame_el[".listAjax"] = false;

	$tdatame_el[".audit"] = false;

	$tdatame_el[".locking"] = false;

$tdatame_el[".listIcons"] = true;
$tdatame_el[".edit"] = true;
$tdatame_el[".inlineEdit"] = true;
$tdatame_el[".inlineAdd"] = true;
$tdatame_el[".view"] = true;

$tdatame_el[".exportTo"] = true;

$tdatame_el[".printFriendly"] = true;

$tdatame_el[".delete"] = true;

$tdatame_el[".showSimpleSearchOptions"] = false;

$tdatame_el[".showSearchPanel"] = true;

if (isMobile())
	$tdatame_el[".isUseAjaxSuggest"] = false;
else 
	$tdatame_el[".isUseAjaxSuggest"] = true;

$tdatame_el[".rowHighlite"] = true;

// button handlers file names

$tdatame_el[".addPageEvents"] = false;

// use timepicker for search panel
$tdatame_el[".isUseTimeForSearch"] = false;




$tdatame_el[".allSearchFields"] = array();

$tdatame_el[".allSearchFields"][] = "ID";
$tdatame_el[".allSearchFields"][] = "ELClient";
$tdatame_el[".allSearchFields"][] = "ELDealType";
$tdatame_el[".allSearchFields"][] = "ELAmount";
$tdatame_el[".allSearchFields"][] = "ELSlot";

$tdatame_el[".googleLikeFields"][] = "ID";
$tdatame_el[".googleLikeFields"][] = "ELClient";
$tdatame_el[".googleLikeFields"][] = "ELDealType";
$tdatame_el[".googleLikeFields"][] = "ELAmount";
$tdatame_el[".googleLikeFields"][] = "ELSlot";


$tdatame_el[".advSearchFields"][] = "ID";
$tdatame_el[".advSearchFields"][] = "ELClient";
$tdatame_el[".advSearchFields"][] = "ELDealType";
$tdatame_el[".advSearchFields"][] = "ELAmount";
$tdatame_el[".advSearchFields"][] = "ELSlot";

$tdatame_el[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatame_el[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatame_el[".strOrderBy"] = $tstrOrderBy;

$tdatame_el[".orderindexes"] = array();

$tdatame_el[".sqlHead"] = "SELECT ID,  ELClient,  ELDealType,  ELAmount,  ELSlot";
$tdatame_el[".sqlFrom"] = "FROM `me-el`";
$tdatame_el[".sqlWhereExpr"] = "";
$tdatame_el[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatame_el[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatame_el[".arrGroupsPerPage"] = $arrGPP;

$tableKeysme_el = array();
$tableKeysme_el[] = "ID";
$tdatame_el[".Keys"] = $tableKeysme_el;

$tdatame_el[".listFields"] = array();
$tdatame_el[".listFields"][] = "ID";
$tdatame_el[".listFields"][] = "ELClient";
$tdatame_el[".listFields"][] = "ELDealType";
$tdatame_el[".listFields"][] = "ELAmount";
$tdatame_el[".listFields"][] = "ELSlot";

$tdatame_el[".viewFields"] = array();
$tdatame_el[".viewFields"][] = "ID";
$tdatame_el[".viewFields"][] = "ELClient";
$tdatame_el[".viewFields"][] = "ELDealType";
$tdatame_el[".viewFields"][] = "ELAmount";
$tdatame_el[".viewFields"][] = "ELSlot";

$tdatame_el[".addFields"] = array();
$tdatame_el[".addFields"][] = "ELClient";
$tdatame_el[".addFields"][] = "ELDealType";
$tdatame_el[".addFields"][] = "ELAmount";
$tdatame_el[".addFields"][] = "ELSlot";

$tdatame_el[".inlineAddFields"] = array();
$tdatame_el[".inlineAddFields"][] = "ELClient";
$tdatame_el[".inlineAddFields"][] = "ELDealType";
$tdatame_el[".inlineAddFields"][] = "ELAmount";
$tdatame_el[".inlineAddFields"][] = "ELSlot";

$tdatame_el[".editFields"] = array();
$tdatame_el[".editFields"][] = "ELClient";
$tdatame_el[".editFields"][] = "ELDealType";
$tdatame_el[".editFields"][] = "ELAmount";
$tdatame_el[".editFields"][] = "ELSlot";

$tdatame_el[".inlineEditFields"] = array();
$tdatame_el[".inlineEditFields"][] = "ELClient";
$tdatame_el[".inlineEditFields"][] = "ELDealType";
$tdatame_el[".inlineEditFields"][] = "ELAmount";
$tdatame_el[".inlineEditFields"][] = "ELSlot";

$tdatame_el[".exportFields"] = array();
$tdatame_el[".exportFields"][] = "ID";
$tdatame_el[".exportFields"][] = "ELClient";
$tdatame_el[".exportFields"][] = "ELDealType";
$tdatame_el[".exportFields"][] = "ELAmount";
$tdatame_el[".exportFields"][] = "ELSlot";

$tdatame_el[".printFields"] = array();
$tdatame_el[".printFields"][] = "ID";
$tdatame_el[".printFields"][] = "ELClient";
$tdatame_el[".printFields"][] = "ELDealType";
$tdatame_el[".printFields"][] = "ELAmount";
$tdatame_el[".printFields"][] = "ELSlot";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "me-el";
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
	
		
		
	$tdatame_el["ID"] = $fdata;
//	ELClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
		$fdata["FullName"] = "ELClient";
	
		
		
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
	
		
		
	$tdatame_el["ELClient"] = $fdata;
//	ELDealType
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
	
		
		
	$tdatame_el["ELDealType"] = $fdata;
//	ELAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
	
		
		
	$tdatame_el["ELAmount"] = $fdata;
//	ELSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
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
	
		
		
	$tdatame_el["ELSlot"] = $fdata;

	
$tables_data["me-el"]=&$tdatame_el;
$field_labels["me_el"] = &$fieldLabelsme_el;
$fieldToolTips["me-el"] = &$fieldToolTipsme_el;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["me-el"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["me-el"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_me_el()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  ELClient,  ELDealType,  ELAmount,  ELSlot";
$proto0["m_strFrom"] = "FROM `me-el`";
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
	"m_strTable" => "me-el"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "ELClient",
	"m_strTable" => "me-el"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "ELDealType",
	"m_strTable" => "me-el"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "ELAmount",
	"m_strTable" => "me-el"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "ELSlot",
	"m_strTable" => "me-el"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "me-el";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "ELClient";
$proto16["m_columns"][] = "ELDealType";
$proto16["m_columns"][] = "ELAmount";
$proto16["m_columns"][] = "ELSlot";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_alias"] = "";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_me_el = createSqlQuery_me_el();
					$tdatame_el[".sqlquery"] = $queryData_me_el;
	
if(isset($tdatame_el["field2"])){
	$tdatame_el["field2"]["LookupTable"] = "carscars_view";
	$tdatame_el["field2"]["LookupOrderBy"] = "name";
	$tdatame_el["field2"]["LookupType"] = 4;
	$tdatame_el["field2"]["LinkField"] = "email";
	$tdatame_el["field2"]["DisplayField"] = "name";
	$tdatame_el[".hasCustomViewField"] = true;
}

$tableEvents["me-el"] = new eventsBase;
$tdatame_el[".hasEvents"] = false;

$cipherer = new RunnerCipherer("me-el");

?>