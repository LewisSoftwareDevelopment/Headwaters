<?php
require_once(getabspath("classes/cipherer.php"));
$tdatareferral_individual = array();
	$tdatareferral_individual[".NumberOfChars"] = 80; 
	$tdatareferral_individual[".ShortName"] = "referral_individual";
	$tdatareferral_individual[".OwnerID"] = "";
	$tdatareferral_individual[".OriginalTable"] = "referral individual";

//	field labels
$fieldLabelsreferral_individual = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsreferral_individual["English"] = array();
	$fieldToolTipsreferral_individual["English"] = array();
	$fieldLabelsreferral_individual["English"]["ID"] = "ID";
	$fieldToolTipsreferral_individual["English"]["ID"] = "";
	$fieldLabelsreferral_individual["English"]["Name"] = "Name";
	$fieldToolTipsreferral_individual["English"]["Name"] = "";
	$fieldLabelsreferral_individual["English"]["Last_Name"] = "Last Name";
	$fieldToolTipsreferral_individual["English"]["Last Name"] = "";
	$fieldLabelsreferral_individual["English"]["First_Name"] = "First Name";
	$fieldToolTipsreferral_individual["English"]["First Name"] = "";
	if (count($fieldToolTipsreferral_individual["English"]))
		$tdatareferral_individual[".isUseToolTips"] = true;
}
	
	
	$tdatareferral_individual[".NCSearch"] = true;



$tdatareferral_individual[".shortTableName"] = "referral_individual";
$tdatareferral_individual[".nSecOptions"] = 0;
$tdatareferral_individual[".recsPerRowList"] = 1;
$tdatareferral_individual[".mainTableOwnerID"] = "";
$tdatareferral_individual[".moveNext"] = 1;
$tdatareferral_individual[".nType"] = 0;

$tdatareferral_individual[".strOriginalTableName"] = "referral individual";




$tdatareferral_individual[".showAddInPopup"] = false;

$tdatareferral_individual[".showEditInPopup"] = false;

$tdatareferral_individual[".showViewInPopup"] = false;

$tdatareferral_individual[".fieldsForRegister"] = array();

$tdatareferral_individual[".listAjax"] = false;

	$tdatareferral_individual[".audit"] = false;

	$tdatareferral_individual[".locking"] = false;

$tdatareferral_individual[".listIcons"] = true;
$tdatareferral_individual[".edit"] = true;
$tdatareferral_individual[".inlineEdit"] = true;
$tdatareferral_individual[".inlineAdd"] = true;
$tdatareferral_individual[".view"] = true;

$tdatareferral_individual[".exportTo"] = true;

$tdatareferral_individual[".printFriendly"] = true;

$tdatareferral_individual[".delete"] = true;

$tdatareferral_individual[".showSimpleSearchOptions"] = false;

$tdatareferral_individual[".showSearchPanel"] = true;

if (isMobile())
	$tdatareferral_individual[".isUseAjaxSuggest"] = false;
else 
	$tdatareferral_individual[".isUseAjaxSuggest"] = true;

$tdatareferral_individual[".rowHighlite"] = true;

// button handlers file names

$tdatareferral_individual[".addPageEvents"] = false;

// use timepicker for search panel
$tdatareferral_individual[".isUseTimeForSearch"] = false;




$tdatareferral_individual[".allSearchFields"] = array();

$tdatareferral_individual[".allSearchFields"][] = "ID";
$tdatareferral_individual[".allSearchFields"][] = "Name";
$tdatareferral_individual[".allSearchFields"][] = "Last Name";
$tdatareferral_individual[".allSearchFields"][] = "First Name";

$tdatareferral_individual[".googleLikeFields"][] = "ID";
$tdatareferral_individual[".googleLikeFields"][] = "Name";
$tdatareferral_individual[".googleLikeFields"][] = "Last Name";
$tdatareferral_individual[".googleLikeFields"][] = "First Name";


$tdatareferral_individual[".advSearchFields"][] = "ID";
$tdatareferral_individual[".advSearchFields"][] = "Name";
$tdatareferral_individual[".advSearchFields"][] = "Last Name";
$tdatareferral_individual[".advSearchFields"][] = "First Name";

$tdatareferral_individual[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatareferral_individual[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatareferral_individual[".strOrderBy"] = $tstrOrderBy;

$tdatareferral_individual[".orderindexes"] = array();

$tdatareferral_individual[".sqlHead"] = "SELECT ID,   Name,   `Last Name`,   `First Name`";
$tdatareferral_individual[".sqlFrom"] = "FROM `referral individual`";
$tdatareferral_individual[".sqlWhereExpr"] = "";
$tdatareferral_individual[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatareferral_individual[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatareferral_individual[".arrGroupsPerPage"] = $arrGPP;

$tableKeysreferral_individual = array();
$tableKeysreferral_individual[] = "ID";
$tdatareferral_individual[".Keys"] = $tableKeysreferral_individual;

$tdatareferral_individual[".listFields"] = array();
$tdatareferral_individual[".listFields"][] = "First Name";
$tdatareferral_individual[".listFields"][] = "Last Name";
$tdatareferral_individual[".listFields"][] = "ID";
$tdatareferral_individual[".listFields"][] = "Name";

$tdatareferral_individual[".viewFields"] = array();
$tdatareferral_individual[".viewFields"][] = "ID";
$tdatareferral_individual[".viewFields"][] = "Name";
$tdatareferral_individual[".viewFields"][] = "Last Name";
$tdatareferral_individual[".viewFields"][] = "First Name";

$tdatareferral_individual[".addFields"] = array();
$tdatareferral_individual[".addFields"][] = "Name";
$tdatareferral_individual[".addFields"][] = "Last Name";
$tdatareferral_individual[".addFields"][] = "First Name";

$tdatareferral_individual[".inlineAddFields"] = array();
$tdatareferral_individual[".inlineAddFields"][] = "Last Name";
$tdatareferral_individual[".inlineAddFields"][] = "First Name";
$tdatareferral_individual[".inlineAddFields"][] = "Name";

$tdatareferral_individual[".editFields"] = array();
$tdatareferral_individual[".editFields"][] = "Name";
$tdatareferral_individual[".editFields"][] = "Last Name";
$tdatareferral_individual[".editFields"][] = "First Name";

$tdatareferral_individual[".inlineEditFields"] = array();
$tdatareferral_individual[".inlineEditFields"][] = "Last Name";
$tdatareferral_individual[".inlineEditFields"][] = "First Name";
$tdatareferral_individual[".inlineEditFields"][] = "Name";

$tdatareferral_individual[".exportFields"] = array();
$tdatareferral_individual[".exportFields"][] = "ID";
$tdatareferral_individual[".exportFields"][] = "Name";
$tdatareferral_individual[".exportFields"][] = "Last Name";
$tdatareferral_individual[".exportFields"][] = "First Name";

$tdatareferral_individual[".printFields"] = array();
$tdatareferral_individual[".printFields"][] = "ID";
$tdatareferral_individual[".printFields"][] = "Name";
$tdatareferral_individual[".printFields"][] = "Last Name";
$tdatareferral_individual[".printFields"][] = "First Name";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "referral individual";
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
	
		
		
	$tdatareferral_individual["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "referral individual";
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
	
		
		
	$tdatareferral_individual["Name"] = $fdata;
//	Last Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Last Name";
	$fdata["GoodName"] = "Last_Name";
	$fdata["ownerTable"] = "referral individual";
	$fdata["Label"] = "Last Name"; 
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
	
		$fdata["strField"] = "Last Name"; 
		$fdata["FullName"] = "`Last Name`";
	
		
		
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
	
		
		
	$tdatareferral_individual["Last Name"] = $fdata;
//	First Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "First Name";
	$fdata["GoodName"] = "First_Name";
	$fdata["ownerTable"] = "referral individual";
	$fdata["Label"] = "First Name"; 
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
	
		$fdata["strField"] = "First Name"; 
		$fdata["FullName"] = "`First Name`";
	
		
		
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
	
		
		
	$tdatareferral_individual["First Name"] = $fdata;

	
$tables_data["referral individual"]=&$tdatareferral_individual;
$field_labels["referral_individual"] = &$fieldLabelsreferral_individual;
$fieldToolTips["referral individual"] = &$fieldToolTipsreferral_individual;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["referral individual"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["referral individual"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="company";
	$masterParams["mDataSourceTable"]="company";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "company";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "1";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 2;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["referral individual"][$mIndex] = $masterParams;	
		$masterTablesData["referral individual"][$mIndex]["masterKeys"][]="Referral Scource-Ind.";
		$masterTablesData["referral individual"][$mIndex]["detailKeys"][]="Name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_referral_individual()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   Name,   `Last Name`,   `First Name`";
$proto0["m_strFrom"] = "FROM `referral individual`";
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
	"m_strTable" => "referral individual"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "referral individual"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Last Name",
	"m_strTable" => "referral individual"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "First Name",
	"m_strTable" => "referral individual"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "referral individual";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "ID";
$proto14["m_columns"][] = "Name";
$proto14["m_columns"][] = "Last Name";
$proto14["m_columns"][] = "First Name";
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
$queryData_referral_individual = createSqlQuery_referral_individual();
				$tdatareferral_individual[".sqlquery"] = $queryData_referral_individual;
	
if(isset($tdatareferral_individual["field2"])){
	$tdatareferral_individual["field2"]["LookupTable"] = "carscars_view";
	$tdatareferral_individual["field2"]["LookupOrderBy"] = "name";
	$tdatareferral_individual["field2"]["LookupType"] = 4;
	$tdatareferral_individual["field2"]["LinkField"] = "email";
	$tdatareferral_individual["field2"]["DisplayField"] = "name";
	$tdatareferral_individual[".hasCustomViewField"] = true;
}

$tableEvents["referral individual"] = new eventsBase;
$tdatareferral_individual[".hasEvents"] = false;

$cipherer = new RunnerCipherer("referral individual");

?>