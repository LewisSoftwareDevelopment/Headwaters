<?php
require_once(getabspath("classes/cipherer.php"));
$tdatareferral_company = array();
	$tdatareferral_company[".NumberOfChars"] = 80; 
	$tdatareferral_company[".ShortName"] = "referral_company";
	$tdatareferral_company[".OwnerID"] = "";
	$tdatareferral_company[".OriginalTable"] = "referral company";

//	field labels
$fieldLabelsreferral_company = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsreferral_company["English"] = array();
	$fieldToolTipsreferral_company["English"] = array();
	$fieldLabelsreferral_company["English"]["ID"] = "ID";
	$fieldToolTipsreferral_company["English"]["ID"] = "";
	$fieldLabelsreferral_company["English"]["Name"] = "Name";
	$fieldToolTipsreferral_company["English"]["Name"] = "";
	if (count($fieldToolTipsreferral_company["English"]))
		$tdatareferral_company[".isUseToolTips"] = true;
}
	
	
	$tdatareferral_company[".NCSearch"] = true;



$tdatareferral_company[".shortTableName"] = "referral_company";
$tdatareferral_company[".nSecOptions"] = 0;
$tdatareferral_company[".recsPerRowList"] = 1;
$tdatareferral_company[".mainTableOwnerID"] = "";
$tdatareferral_company[".moveNext"] = 1;
$tdatareferral_company[".nType"] = 0;

$tdatareferral_company[".strOriginalTableName"] = "referral company";




$tdatareferral_company[".showAddInPopup"] = false;

$tdatareferral_company[".showEditInPopup"] = false;

$tdatareferral_company[".showViewInPopup"] = false;

$tdatareferral_company[".fieldsForRegister"] = array();

$tdatareferral_company[".listAjax"] = false;

	$tdatareferral_company[".audit"] = false;

	$tdatareferral_company[".locking"] = false;

$tdatareferral_company[".listIcons"] = true;
$tdatareferral_company[".edit"] = true;
$tdatareferral_company[".inlineEdit"] = true;
$tdatareferral_company[".inlineAdd"] = true;
$tdatareferral_company[".view"] = true;

$tdatareferral_company[".exportTo"] = true;

$tdatareferral_company[".printFriendly"] = true;

$tdatareferral_company[".delete"] = true;

$tdatareferral_company[".showSimpleSearchOptions"] = false;

$tdatareferral_company[".showSearchPanel"] = true;

if (isMobile())
	$tdatareferral_company[".isUseAjaxSuggest"] = false;
else 
	$tdatareferral_company[".isUseAjaxSuggest"] = true;

$tdatareferral_company[".rowHighlite"] = true;

// button handlers file names

$tdatareferral_company[".addPageEvents"] = false;

// use timepicker for search panel
$tdatareferral_company[".isUseTimeForSearch"] = false;




$tdatareferral_company[".allSearchFields"] = array();

$tdatareferral_company[".allSearchFields"][] = "ID";
$tdatareferral_company[".allSearchFields"][] = "Name";

$tdatareferral_company[".googleLikeFields"][] = "ID";
$tdatareferral_company[".googleLikeFields"][] = "Name";


$tdatareferral_company[".advSearchFields"][] = "ID";
$tdatareferral_company[".advSearchFields"][] = "Name";

$tdatareferral_company[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatareferral_company[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatareferral_company[".strOrderBy"] = $tstrOrderBy;

$tdatareferral_company[".orderindexes"] = array();

$tdatareferral_company[".sqlHead"] = "SELECT ID,   Name";
$tdatareferral_company[".sqlFrom"] = "FROM `referral company`";
$tdatareferral_company[".sqlWhereExpr"] = "";
$tdatareferral_company[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatareferral_company[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatareferral_company[".arrGroupsPerPage"] = $arrGPP;

$tableKeysreferral_company = array();
$tableKeysreferral_company[] = "ID";
$tdatareferral_company[".Keys"] = $tableKeysreferral_company;

$tdatareferral_company[".listFields"] = array();
$tdatareferral_company[".listFields"][] = "ID";
$tdatareferral_company[".listFields"][] = "Name";

$tdatareferral_company[".viewFields"] = array();
$tdatareferral_company[".viewFields"][] = "ID";
$tdatareferral_company[".viewFields"][] = "Name";

$tdatareferral_company[".addFields"] = array();
$tdatareferral_company[".addFields"][] = "Name";

$tdatareferral_company[".inlineAddFields"] = array();
$tdatareferral_company[".inlineAddFields"][] = "Name";

$tdatareferral_company[".editFields"] = array();
$tdatareferral_company[".editFields"][] = "Name";

$tdatareferral_company[".inlineEditFields"] = array();
$tdatareferral_company[".inlineEditFields"][] = "Name";

$tdatareferral_company[".exportFields"] = array();
$tdatareferral_company[".exportFields"][] = "ID";
$tdatareferral_company[".exportFields"][] = "Name";

$tdatareferral_company[".printFields"] = array();
$tdatareferral_company[".printFields"][] = "ID";
$tdatareferral_company[".printFields"][] = "Name";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "referral company";
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
	
		
		
	$tdatareferral_company["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "referral company";
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatareferral_company["Name"] = $fdata;

	
$tables_data["referral company"]=&$tdatareferral_company;
$field_labels["referral_company"] = &$fieldLabelsreferral_company;
$fieldToolTips["referral company"] = &$fieldToolTipsreferral_company;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["referral company"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["referral company"] = array();

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
	$masterTablesData["referral company"][$mIndex] = $masterParams;	
		$masterTablesData["referral company"][$mIndex]["masterKeys"][]="Referral Source-Company";
		$masterTablesData["referral company"][$mIndex]["detailKeys"][]="Name";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_referral_company()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   Name";
$proto0["m_strFrom"] = "FROM `referral company`";
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
	"m_strTable" => "referral company"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "referral company"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto9=array();
$proto9["m_link"] = "SQLL_MAIN";
			$proto10=array();
$proto10["m_strName"] = "referral company";
$proto10["m_columns"] = array();
$proto10["m_columns"][] = "ID";
$proto10["m_columns"][] = "Name";
$obj = new SQLTable($proto10);

$proto9["m_table"] = $obj;
$proto9["m_alias"] = "";
$proto11=array();
$proto11["m_sql"] = "";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "";
$proto11["m_havingmode"] = "0";
$proto11["m_inBrackets"] = "0";
$proto11["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto11);

$proto9["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto9);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_referral_company = createSqlQuery_referral_company();
		$tdatareferral_company[".sqlquery"] = $queryData_referral_company;
	
if(isset($tdatareferral_company["field2"])){
	$tdatareferral_company["field2"]["LookupTable"] = "carscars_view";
	$tdatareferral_company["field2"]["LookupOrderBy"] = "name";
	$tdatareferral_company["field2"]["LookupType"] = 4;
	$tdatareferral_company["field2"]["LinkField"] = "email";
	$tdatareferral_company["field2"]["DisplayField"] = "name";
	$tdatareferral_company[".hasCustomViewField"] = true;
}

$tableEvents["referral company"] = new eventsBase;
$tdatareferral_company[".hasEvents"] = false;

$cipherer = new RunnerCipherer("referral company");

?>