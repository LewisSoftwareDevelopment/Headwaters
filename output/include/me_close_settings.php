<?php
require_once(getabspath("classes/cipherer.php"));
$tdatame_close = array();
	$tdatame_close[".NumberOfChars"] = 80; 
	$tdatame_close[".ShortName"] = "me_close";
	$tdatame_close[".OwnerID"] = "";
	$tdatame_close[".OriginalTable"] = "me-close";

//	field labels
$fieldLabelsme_close = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsme_close["English"] = array();
	$fieldToolTipsme_close["English"] = array();
	$fieldLabelsme_close["English"]["ID"] = "ID";
	$fieldToolTipsme_close["English"]["ID"] = "";
	$fieldLabelsme_close["English"]["CClient"] = "CClient";
	$fieldToolTipsme_close["English"]["CClient"] = "";
	$fieldLabelsme_close["English"]["CDealtype"] = "CDealtype";
	$fieldToolTipsme_close["English"]["CDealtype"] = "";
	$fieldLabelsme_close["English"]["CAmount"] = "CAmount";
	$fieldToolTipsme_close["English"]["CAmount"] = "";
	$fieldLabelsme_close["English"]["CSlot"] = "CSlot";
	$fieldToolTipsme_close["English"]["CSlot"] = "";
	if (count($fieldToolTipsme_close["English"]))
		$tdatame_close[".isUseToolTips"] = true;
}
	
	
	$tdatame_close[".NCSearch"] = true;



$tdatame_close[".shortTableName"] = "me_close";
$tdatame_close[".nSecOptions"] = 0;
$tdatame_close[".recsPerRowList"] = 1;
$tdatame_close[".mainTableOwnerID"] = "";
$tdatame_close[".moveNext"] = 1;
$tdatame_close[".nType"] = 0;

$tdatame_close[".strOriginalTableName"] = "me-close";




$tdatame_close[".showAddInPopup"] = false;

$tdatame_close[".showEditInPopup"] = false;

$tdatame_close[".showViewInPopup"] = false;

$tdatame_close[".fieldsForRegister"] = array();

$tdatame_close[".listAjax"] = false;

	$tdatame_close[".audit"] = false;

	$tdatame_close[".locking"] = false;

$tdatame_close[".listIcons"] = true;
$tdatame_close[".inlineAdd"] = true;

$tdatame_close[".exportTo"] = true;

$tdatame_close[".printFriendly"] = true;


$tdatame_close[".showSimpleSearchOptions"] = false;

$tdatame_close[".showSearchPanel"] = true;

if (isMobile())
	$tdatame_close[".isUseAjaxSuggest"] = false;
else 
	$tdatame_close[".isUseAjaxSuggest"] = true;

$tdatame_close[".rowHighlite"] = true;

// button handlers file names

$tdatame_close[".addPageEvents"] = false;

// use timepicker for search panel
$tdatame_close[".isUseTimeForSearch"] = false;




$tdatame_close[".allSearchFields"] = array();

$tdatame_close[".allSearchFields"][] = "ID";
$tdatame_close[".allSearchFields"][] = "CClient";
$tdatame_close[".allSearchFields"][] = "CDealtype";
$tdatame_close[".allSearchFields"][] = "CAmount";
$tdatame_close[".allSearchFields"][] = "CSlot";

$tdatame_close[".googleLikeFields"][] = "ID";
$tdatame_close[".googleLikeFields"][] = "CClient";
$tdatame_close[".googleLikeFields"][] = "CDealtype";
$tdatame_close[".googleLikeFields"][] = "CAmount";
$tdatame_close[".googleLikeFields"][] = "CSlot";


$tdatame_close[".advSearchFields"][] = "ID";
$tdatame_close[".advSearchFields"][] = "CClient";
$tdatame_close[".advSearchFields"][] = "CDealtype";
$tdatame_close[".advSearchFields"][] = "CAmount";
$tdatame_close[".advSearchFields"][] = "CSlot";

$tdatame_close[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatame_close[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatame_close[".strOrderBy"] = $tstrOrderBy;

$tdatame_close[".orderindexes"] = array();

$tdatame_close[".sqlHead"] = "SELECT ID,  CClient,  CDealtype,  CAmount,  CSlot";
$tdatame_close[".sqlFrom"] = "FROM `me-close`";
$tdatame_close[".sqlWhereExpr"] = "";
$tdatame_close[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatame_close[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatame_close[".arrGroupsPerPage"] = $arrGPP;

$tableKeysme_close = array();
$tdatame_close[".Keys"] = $tableKeysme_close;

$tdatame_close[".listFields"] = array();
$tdatame_close[".listFields"][] = "ID";
$tdatame_close[".listFields"][] = "CClient";
$tdatame_close[".listFields"][] = "CDealtype";
$tdatame_close[".listFields"][] = "CAmount";
$tdatame_close[".listFields"][] = "CSlot";

$tdatame_close[".viewFields"] = array();

$tdatame_close[".addFields"] = array();
$tdatame_close[".addFields"][] = "ID";
$tdatame_close[".addFields"][] = "CClient";
$tdatame_close[".addFields"][] = "CDealtype";
$tdatame_close[".addFields"][] = "CAmount";
$tdatame_close[".addFields"][] = "CSlot";

$tdatame_close[".inlineAddFields"] = array();
$tdatame_close[".inlineAddFields"][] = "ID";
$tdatame_close[".inlineAddFields"][] = "CClient";
$tdatame_close[".inlineAddFields"][] = "CDealtype";
$tdatame_close[".inlineAddFields"][] = "CAmount";
$tdatame_close[".inlineAddFields"][] = "CSlot";

$tdatame_close[".editFields"] = array();

$tdatame_close[".inlineEditFields"] = array();

$tdatame_close[".exportFields"] = array();
$tdatame_close[".exportFields"][] = "ID";
$tdatame_close[".exportFields"][] = "CClient";
$tdatame_close[".exportFields"][] = "CDealtype";
$tdatame_close[".exportFields"][] = "CAmount";
$tdatame_close[".exportFields"][] = "CSlot";

$tdatame_close[".printFields"] = array();
$tdatame_close[".printFields"][] = "ID";
$tdatame_close[".printFields"][] = "CClient";
$tdatame_close[".printFields"][] = "CDealtype";
$tdatame_close[".printFields"][] = "CAmount";
$tdatame_close[".printFields"][] = "CSlot";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "me-close";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
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
	
		
		
	$tdatame_close["ID"] = $fdata;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_close["CClient"] = $fdata;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_close["CDealtype"] = $fdata;
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
	
		
		
	$tdatame_close["CAmount"] = $fdata;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_close["CSlot"] = $fdata;

	
$tables_data["me-close"]=&$tdatame_close;
$field_labels["me_close"] = &$fieldLabelsme_close;
$fieldToolTips["me-close"] = &$fieldToolTipsme_close;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["me-close"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["me-close"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_me_close()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  CClient,  CDealtype,  CAmount,  CSlot";
$proto0["m_strFrom"] = "FROM `me-close`";
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
	"m_strTable" => "me-close"
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
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "me-close";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "CClient";
$proto16["m_columns"][] = "CDealtype";
$proto16["m_columns"][] = "CAmount";
$proto16["m_columns"][] = "CSlot";
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
$queryData_me_close = createSqlQuery_me_close();
					$tdatame_close[".sqlquery"] = $queryData_me_close;
	
if(isset($tdatame_close["field2"])){
	$tdatame_close["field2"]["LookupTable"] = "carscars_view";
	$tdatame_close["field2"]["LookupOrderBy"] = "name";
	$tdatame_close["field2"]["LookupType"] = 4;
	$tdatame_close["field2"]["LinkField"] = "email";
	$tdatame_close["field2"]["DisplayField"] = "name";
	$tdatame_close[".hasCustomViewField"] = true;
}

$tableEvents["me-close"] = new eventsBase;
$tdatame_close[".hasEvents"] = false;

$cipherer = new RunnerCipherer("me-close");

?>