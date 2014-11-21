<?php
require_once(getabspath("classes/cipherer.php"));
$tdatame_dead = array();
	$tdatame_dead[".NumberOfChars"] = 80; 
	$tdatame_dead[".ShortName"] = "me_dead";
	$tdatame_dead[".OwnerID"] = "";
	$tdatame_dead[".OriginalTable"] = "me-dead";

//	field labels
$fieldLabelsme_dead = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsme_dead["English"] = array();
	$fieldToolTipsme_dead["English"] = array();
	$fieldLabelsme_dead["English"]["ID"] = "ID";
	$fieldToolTipsme_dead["English"]["ID"] = "";
	$fieldLabelsme_dead["English"]["DClient"] = "DClient";
	$fieldToolTipsme_dead["English"]["DClient"] = "";
	$fieldLabelsme_dead["English"]["DDealtype"] = "DDealtype";
	$fieldToolTipsme_dead["English"]["DDealtype"] = "";
	$fieldLabelsme_dead["English"]["DAmount"] = "DAmount";
	$fieldToolTipsme_dead["English"]["DAmount"] = "";
	$fieldLabelsme_dead["English"]["DSlot"] = "DSlot";
	$fieldToolTipsme_dead["English"]["DSlot"] = "";
	if (count($fieldToolTipsme_dead["English"]))
		$tdatame_dead[".isUseToolTips"] = true;
}
	
	
	$tdatame_dead[".NCSearch"] = true;



$tdatame_dead[".shortTableName"] = "me_dead";
$tdatame_dead[".nSecOptions"] = 0;
$tdatame_dead[".recsPerRowList"] = 1;
$tdatame_dead[".mainTableOwnerID"] = "";
$tdatame_dead[".moveNext"] = 1;
$tdatame_dead[".nType"] = 0;

$tdatame_dead[".strOriginalTableName"] = "me-dead";




$tdatame_dead[".showAddInPopup"] = false;

$tdatame_dead[".showEditInPopup"] = false;

$tdatame_dead[".showViewInPopup"] = false;

$tdatame_dead[".fieldsForRegister"] = array();

$tdatame_dead[".listAjax"] = false;

	$tdatame_dead[".audit"] = false;

	$tdatame_dead[".locking"] = false;

$tdatame_dead[".listIcons"] = true;
$tdatame_dead[".edit"] = true;
$tdatame_dead[".inlineEdit"] = true;
$tdatame_dead[".inlineAdd"] = true;
$tdatame_dead[".view"] = true;

$tdatame_dead[".exportTo"] = true;

$tdatame_dead[".printFriendly"] = true;

$tdatame_dead[".delete"] = true;

$tdatame_dead[".showSimpleSearchOptions"] = false;

$tdatame_dead[".showSearchPanel"] = true;

if (isMobile())
	$tdatame_dead[".isUseAjaxSuggest"] = false;
else 
	$tdatame_dead[".isUseAjaxSuggest"] = true;

$tdatame_dead[".rowHighlite"] = true;

// button handlers file names

$tdatame_dead[".addPageEvents"] = false;

// use timepicker for search panel
$tdatame_dead[".isUseTimeForSearch"] = false;




$tdatame_dead[".allSearchFields"] = array();

$tdatame_dead[".allSearchFields"][] = "ID";
$tdatame_dead[".allSearchFields"][] = "DClient";
$tdatame_dead[".allSearchFields"][] = "DDealtype";
$tdatame_dead[".allSearchFields"][] = "DAmount";
$tdatame_dead[".allSearchFields"][] = "DSlot";

$tdatame_dead[".googleLikeFields"][] = "ID";
$tdatame_dead[".googleLikeFields"][] = "DClient";
$tdatame_dead[".googleLikeFields"][] = "DDealtype";
$tdatame_dead[".googleLikeFields"][] = "DAmount";
$tdatame_dead[".googleLikeFields"][] = "DSlot";


$tdatame_dead[".advSearchFields"][] = "ID";
$tdatame_dead[".advSearchFields"][] = "DClient";
$tdatame_dead[".advSearchFields"][] = "DDealtype";
$tdatame_dead[".advSearchFields"][] = "DAmount";
$tdatame_dead[".advSearchFields"][] = "DSlot";

$tdatame_dead[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatame_dead[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatame_dead[".strOrderBy"] = $tstrOrderBy;

$tdatame_dead[".orderindexes"] = array();

$tdatame_dead[".sqlHead"] = "SELECT ID,   DClient,   DDealtype,   DAmount,   DSlot";
$tdatame_dead[".sqlFrom"] = "FROM `me-dead`";
$tdatame_dead[".sqlWhereExpr"] = "";
$tdatame_dead[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatame_dead[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatame_dead[".arrGroupsPerPage"] = $arrGPP;

$tableKeysme_dead = array();
$tdatame_dead[".Keys"] = $tableKeysme_dead;

$tdatame_dead[".listFields"] = array();
$tdatame_dead[".listFields"][] = "ID";
$tdatame_dead[".listFields"][] = "DClient";
$tdatame_dead[".listFields"][] = "DDealtype";
$tdatame_dead[".listFields"][] = "DAmount";
$tdatame_dead[".listFields"][] = "DSlot";

$tdatame_dead[".viewFields"] = array();
$tdatame_dead[".viewFields"][] = "ID";
$tdatame_dead[".viewFields"][] = "DClient";
$tdatame_dead[".viewFields"][] = "DDealtype";
$tdatame_dead[".viewFields"][] = "DAmount";
$tdatame_dead[".viewFields"][] = "DSlot";

$tdatame_dead[".addFields"] = array();
$tdatame_dead[".addFields"][] = "ID";
$tdatame_dead[".addFields"][] = "DClient";
$tdatame_dead[".addFields"][] = "DDealtype";
$tdatame_dead[".addFields"][] = "DAmount";
$tdatame_dead[".addFields"][] = "DSlot";

$tdatame_dead[".inlineAddFields"] = array();
$tdatame_dead[".inlineAddFields"][] = "ID";
$tdatame_dead[".inlineAddFields"][] = "DClient";
$tdatame_dead[".inlineAddFields"][] = "DDealtype";
$tdatame_dead[".inlineAddFields"][] = "DAmount";
$tdatame_dead[".inlineAddFields"][] = "DSlot";

$tdatame_dead[".editFields"] = array();
$tdatame_dead[".editFields"][] = "ID";
$tdatame_dead[".editFields"][] = "DClient";
$tdatame_dead[".editFields"][] = "DDealtype";
$tdatame_dead[".editFields"][] = "DAmount";
$tdatame_dead[".editFields"][] = "DSlot";

$tdatame_dead[".inlineEditFields"] = array();
$tdatame_dead[".inlineEditFields"][] = "ID";
$tdatame_dead[".inlineEditFields"][] = "DClient";
$tdatame_dead[".inlineEditFields"][] = "DDealtype";
$tdatame_dead[".inlineEditFields"][] = "DAmount";
$tdatame_dead[".inlineEditFields"][] = "DSlot";

$tdatame_dead[".exportFields"] = array();
$tdatame_dead[".exportFields"][] = "ID";
$tdatame_dead[".exportFields"][] = "DClient";
$tdatame_dead[".exportFields"][] = "DDealtype";
$tdatame_dead[".exportFields"][] = "DAmount";
$tdatame_dead[".exportFields"][] = "DSlot";

$tdatame_dead[".printFields"] = array();
$tdatame_dead[".printFields"][] = "ID";
$tdatame_dead[".printFields"][] = "DClient";
$tdatame_dead[".printFields"][] = "DDealtype";
$tdatame_dead[".printFields"][] = "DAmount";
$tdatame_dead[".printFields"][] = "DSlot";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "me-dead";
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
	
		
		
	$tdatame_dead["ID"] = $fdata;
//	DClient
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_dead["DClient"] = $fdata;
//	DDealtype
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_dead["DDealtype"] = $fdata;
//	DAmount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
	
		
		
	$tdatame_dead["DAmount"] = $fdata;
//	DSlot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatame_dead["DSlot"] = $fdata;

	
$tables_data["me-dead"]=&$tdatame_dead;
$field_labels["me_dead"] = &$fieldLabelsme_dead;
$fieldToolTips["me-dead"] = &$fieldToolTipsme_dead;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["me-dead"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["me-dead"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_me_dead()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   DClient,   DDealtype,   DAmount,   DSlot";
$proto0["m_strFrom"] = "FROM `me-dead`";
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
	"m_strTable" => "me-dead"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "DClient",
	"m_strTable" => "me-dead"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "DDealtype",
	"m_strTable" => "me-dead"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "DAmount",
	"m_strTable" => "me-dead"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "DSlot",
	"m_strTable" => "me-dead"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "me-dead";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "DClient";
$proto16["m_columns"][] = "DDealtype";
$proto16["m_columns"][] = "DAmount";
$proto16["m_columns"][] = "DSlot";
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
$queryData_me_dead = createSqlQuery_me_dead();
					$tdatame_dead[".sqlquery"] = $queryData_me_dead;
	
if(isset($tdatame_dead["field2"])){
	$tdatame_dead["field2"]["LookupTable"] = "carscars_view";
	$tdatame_dead["field2"]["LookupOrderBy"] = "name";
	$tdatame_dead["field2"]["LookupType"] = 4;
	$tdatame_dead["field2"]["LinkField"] = "email";
	$tdatame_dead["field2"]["DisplayField"] = "name";
	$tdatame_dead[".hasCustomViewField"] = true;
}

$tableEvents["me-dead"] = new eventsBase;
$tdatame_dead[".hasEvents"] = false;

$cipherer = new RunnerCipherer("me-dead");

?>