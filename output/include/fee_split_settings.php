<?php
require_once(getabspath("classes/cipherer.php"));
$tdatafee_split = array();
	$tdatafee_split[".NumberOfChars"] = 80; 
	$tdatafee_split[".ShortName"] = "fee_split";
	$tdatafee_split[".OwnerID"] = "";
	$tdatafee_split[".OriginalTable"] = "fee split";

//	field labels
$fieldLabelsfee_split = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsfee_split["English"] = array();
	$fieldToolTipsfee_split["English"] = array();
	$fieldLabelsfee_split["English"]["ID"] = "ID";
	$fieldToolTipsfee_split["English"]["ID"] = "";
	$fieldLabelsfee_split["English"]["Name"] = "Name";
	$fieldToolTipsfee_split["English"]["Name"] = "";
	if (count($fieldToolTipsfee_split["English"]))
		$tdatafee_split[".isUseToolTips"] = true;
}
	
	
	$tdatafee_split[".NCSearch"] = true;



$tdatafee_split[".shortTableName"] = "fee_split";
$tdatafee_split[".nSecOptions"] = 0;
$tdatafee_split[".recsPerRowList"] = 1;
$tdatafee_split[".mainTableOwnerID"] = "";
$tdatafee_split[".moveNext"] = 1;
$tdatafee_split[".nType"] = 0;

$tdatafee_split[".strOriginalTableName"] = "fee split";




$tdatafee_split[".showAddInPopup"] = false;

$tdatafee_split[".showEditInPopup"] = false;

$tdatafee_split[".showViewInPopup"] = false;

$tdatafee_split[".fieldsForRegister"] = array();

$tdatafee_split[".listAjax"] = false;

	$tdatafee_split[".audit"] = false;

	$tdatafee_split[".locking"] = false;

$tdatafee_split[".listIcons"] = true;
$tdatafee_split[".edit"] = true;
$tdatafee_split[".inlineEdit"] = true;
$tdatafee_split[".inlineAdd"] = true;
$tdatafee_split[".view"] = true;

$tdatafee_split[".exportTo"] = true;

$tdatafee_split[".printFriendly"] = true;

$tdatafee_split[".delete"] = true;

$tdatafee_split[".showSimpleSearchOptions"] = false;

$tdatafee_split[".showSearchPanel"] = true;

if (isMobile())
	$tdatafee_split[".isUseAjaxSuggest"] = false;
else 
	$tdatafee_split[".isUseAjaxSuggest"] = true;

$tdatafee_split[".rowHighlite"] = true;

// button handlers file names

$tdatafee_split[".addPageEvents"] = false;

// use timepicker for search panel
$tdatafee_split[".isUseTimeForSearch"] = false;




$tdatafee_split[".allSearchFields"] = array();


$tdatafee_split[".googleLikeFields"][] = "ID";
$tdatafee_split[".googleLikeFields"][] = "Name";



$tdatafee_split[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatafee_split[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatafee_split[".strOrderBy"] = $tstrOrderBy;

$tdatafee_split[".orderindexes"] = array();

$tdatafee_split[".sqlHead"] = "SELECT ID,  Name";
$tdatafee_split[".sqlFrom"] = "FROM `fee split`";
$tdatafee_split[".sqlWhereExpr"] = "";
$tdatafee_split[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatafee_split[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatafee_split[".arrGroupsPerPage"] = $arrGPP;

$tableKeysfee_split = array();
$tableKeysfee_split[] = "ID";
$tdatafee_split[".Keys"] = $tableKeysfee_split;

$tdatafee_split[".listFields"] = array();

$tdatafee_split[".viewFields"] = array();

$tdatafee_split[".addFields"] = array();

$tdatafee_split[".inlineAddFields"] = array();

$tdatafee_split[".editFields"] = array();

$tdatafee_split[".inlineEditFields"] = array();

$tdatafee_split[".exportFields"] = array();

$tdatafee_split[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "fee split";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
		
		
				
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
	
		
		
	$tdatafee_split["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "fee split";
	$fdata["Label"] = "Name"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Name"; 
		$fdata["FullName"] = "Name";
	
		
		
				
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
	
		
		
	$tdatafee_split["Name"] = $fdata;

	
$tables_data["fee split"]=&$tdatafee_split;
$field_labels["fee_split"] = &$fieldLabelsfee_split;
$fieldToolTips["fee split"] = &$fieldToolTipsfee_split;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["fee split"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["fee split"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_fee_split()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  Name";
$proto0["m_strFrom"] = "FROM `fee split`";
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
	"m_strTable" => "fee split"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "fee split"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto9=array();
$proto9["m_link"] = "SQLL_MAIN";
			$proto10=array();
$proto10["m_strName"] = "fee split";
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
$queryData_fee_split = createSqlQuery_fee_split();
		$tdatafee_split[".sqlquery"] = $queryData_fee_split;
	
if(isset($tdatafee_split["field2"])){
	$tdatafee_split["field2"]["LookupTable"] = "carscars_view";
	$tdatafee_split["field2"]["LookupOrderBy"] = "name";
	$tdatafee_split["field2"]["LookupType"] = 4;
	$tdatafee_split["field2"]["LinkField"] = "email";
	$tdatafee_split["field2"]["DisplayField"] = "name";
	$tdatafee_split[".hasCustomViewField"] = true;
}

$tableEvents["fee split"] = new eventsBase;
$tdatafee_split[".hasEvents"] = false;

$cipherer = new RunnerCipherer("fee split");

?>