<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabpengagmentstotal = array();
	$tdatabpengagmentstotal[".NumberOfChars"] = 80; 
	$tdatabpengagmentstotal[".ShortName"] = "bpengagmentstotal";
	$tdatabpengagmentstotal[".OwnerID"] = "";
	$tdatabpengagmentstotal[".OriginalTable"] = "bpengagmentstotal";

//	field labels
$fieldLabelsbpengagmentstotal = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbpengagmentstotal["English"] = array();
	$fieldToolTipsbpengagmentstotal["English"] = array();
	$fieldLabelsbpengagmentstotal["English"]["ID"] = "ID";
	$fieldToolTipsbpengagmentstotal["English"]["ID"] = "";
	$fieldLabelsbpengagmentstotal["English"]["Banker"] = "Banker";
	$fieldToolTipsbpengagmentstotal["English"]["Banker"] = "";
	$fieldLabelsbpengagmentstotal["English"]["Wheelhouse"] = "Wheelhouse";
	$fieldToolTipsbpengagmentstotal["English"]["Wheelhouse"] = "";
	$fieldLabelsbpengagmentstotal["English"]["Speculative"] = "Speculative";
	$fieldToolTipsbpengagmentstotal["English"]["Speculative"] = "";
	$fieldLabelsbpengagmentstotal["English"]["Minimum"] = "Minimum";
	$fieldToolTipsbpengagmentstotal["English"]["Minimum"] = "";
	$fieldLabelsbpengagmentstotal["English"]["rows"] = "Rows";
	$fieldToolTipsbpengagmentstotal["English"]["rows"] = "";
	$fieldLabelsbpengagmentstotal["English"]["Engagements"] = "Engagements";
	$fieldToolTipsbpengagmentstotal["English"]["Engagements"] = "";
	if (count($fieldToolTipsbpengagmentstotal["English"]))
		$tdatabpengagmentstotal[".isUseToolTips"] = true;
}
	
	
	$tdatabpengagmentstotal[".NCSearch"] = true;



$tdatabpengagmentstotal[".shortTableName"] = "bpengagmentstotal";
$tdatabpengagmentstotal[".nSecOptions"] = 0;
$tdatabpengagmentstotal[".recsPerRowList"] = 1;
$tdatabpengagmentstotal[".mainTableOwnerID"] = "";
$tdatabpengagmentstotal[".moveNext"] = 1;
$tdatabpengagmentstotal[".nType"] = 0;

$tdatabpengagmentstotal[".strOriginalTableName"] = "bpengagmentstotal";




$tdatabpengagmentstotal[".showAddInPopup"] = false;

$tdatabpengagmentstotal[".showEditInPopup"] = false;

$tdatabpengagmentstotal[".showViewInPopup"] = false;

$tdatabpengagmentstotal[".fieldsForRegister"] = array();

$tdatabpengagmentstotal[".listAjax"] = false;

	$tdatabpengagmentstotal[".audit"] = false;

	$tdatabpengagmentstotal[".locking"] = false;

$tdatabpengagmentstotal[".listIcons"] = true;
$tdatabpengagmentstotal[".edit"] = true;
$tdatabpengagmentstotal[".inlineEdit"] = true;
$tdatabpengagmentstotal[".inlineAdd"] = true;
$tdatabpengagmentstotal[".view"] = true;

$tdatabpengagmentstotal[".exportTo"] = true;

$tdatabpengagmentstotal[".printFriendly"] = true;

$tdatabpengagmentstotal[".delete"] = true;

$tdatabpengagmentstotal[".showSimpleSearchOptions"] = false;

$tdatabpengagmentstotal[".showSearchPanel"] = true;

if (isMobile())
	$tdatabpengagmentstotal[".isUseAjaxSuggest"] = false;
else 
	$tdatabpengagmentstotal[".isUseAjaxSuggest"] = true;

$tdatabpengagmentstotal[".rowHighlite"] = true;

// button handlers file names

$tdatabpengagmentstotal[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabpengagmentstotal[".isUseTimeForSearch"] = false;




$tdatabpengagmentstotal[".allSearchFields"] = array();


$tdatabpengagmentstotal[".googleLikeFields"][] = "ID";
$tdatabpengagmentstotal[".googleLikeFields"][] = "rows";
$tdatabpengagmentstotal[".googleLikeFields"][] = "Banker";
$tdatabpengagmentstotal[".googleLikeFields"][] = "Engagements";
$tdatabpengagmentstotal[".googleLikeFields"][] = "Wheelhouse";
$tdatabpengagmentstotal[".googleLikeFields"][] = "Speculative";
$tdatabpengagmentstotal[".googleLikeFields"][] = "Minimum";



$tdatabpengagmentstotal[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatabpengagmentstotal[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabpengagmentstotal[".strOrderBy"] = $tstrOrderBy;

$tdatabpengagmentstotal[".orderindexes"] = array();

$tdatabpengagmentstotal[".sqlHead"] = "SELECT ID,  `rows`,  Banker,  Engagements,  Wheelhouse,  Speculative,  Minimum";
$tdatabpengagmentstotal[".sqlFrom"] = "FROM bpengagmentstotal";
$tdatabpengagmentstotal[".sqlWhereExpr"] = "";
$tdatabpengagmentstotal[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabpengagmentstotal[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabpengagmentstotal[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbpengagmentstotal = array();
$tableKeysbpengagmentstotal[] = "ID";
$tdatabpengagmentstotal[".Keys"] = $tableKeysbpengagmentstotal;

$tdatabpengagmentstotal[".listFields"] = array();

$tdatabpengagmentstotal[".viewFields"] = array();

$tdatabpengagmentstotal[".addFields"] = array();

$tdatabpengagmentstotal[".inlineAddFields"] = array();

$tdatabpengagmentstotal[".editFields"] = array();

$tdatabpengagmentstotal[".inlineEditFields"] = array();

$tdatabpengagmentstotal[".exportFields"] = array();

$tdatabpengagmentstotal[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bpengagmentstotal";
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
	
		
		
	$tdatabpengagmentstotal["ID"] = $fdata;
//	rows
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "rows";
	$fdata["GoodName"] = "rows";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Rows"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "rows"; 
		$fdata["FullName"] = "`rows`";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["rows"] = $fdata;
//	Banker
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Banker";
	$fdata["GoodName"] = "Banker";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Banker"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Banker"; 
		$fdata["FullName"] = "Banker";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["Banker"] = $fdata;
//	Engagements
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Engagements";
	$fdata["GoodName"] = "Engagements";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Engagements"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Engagements"; 
		$fdata["FullName"] = "Engagements";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["Engagements"] = $fdata;
//	Wheelhouse
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Wheelhouse";
	$fdata["GoodName"] = "Wheelhouse";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Wheelhouse"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Wheelhouse"; 
		$fdata["FullName"] = "Wheelhouse";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["Wheelhouse"] = $fdata;
//	Speculative
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Speculative";
	$fdata["GoodName"] = "Speculative";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Speculative"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Speculative"; 
		$fdata["FullName"] = "Speculative";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["Speculative"] = $fdata;
//	Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "Minimum";
	$fdata["GoodName"] = "Minimum";
	$fdata["ownerTable"] = "bpengagmentstotal";
	$fdata["Label"] = "Minimum"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Minimum"; 
		$fdata["FullName"] = "Minimum";
	
		
		
				
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
	
		
		
	$tdatabpengagmentstotal["Minimum"] = $fdata;

	
$tables_data["bpengagmentstotal"]=&$tdatabpengagmentstotal;
$field_labels["bpengagmentstotal"] = &$fieldLabelsbpengagmentstotal;
$fieldToolTips["bpengagmentstotal"] = &$fieldToolTipsbpengagmentstotal;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bpengagmentstotal"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bpengagmentstotal"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bpengagmentstotal()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  `rows`,  Banker,  Engagements,  Wheelhouse,  Speculative,  Minimum";
$proto0["m_strFrom"] = "FROM bpengagmentstotal";
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
	"m_strTable" => "bpengagmentstotal"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "rows",
	"m_strTable" => "bpengagmentstotal"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Banker",
	"m_strTable" => "bpengagmentstotal"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Engagements",
	"m_strTable" => "bpengagmentstotal"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Wheelhouse",
	"m_strTable" => "bpengagmentstotal"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Speculative",
	"m_strTable" => "bpengagmentstotal"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "Minimum",
	"m_strTable" => "bpengagmentstotal"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "bpengagmentstotal";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "ID";
$proto20["m_columns"][] = "Banker";
$proto20["m_columns"][] = "Engagements";
$proto20["m_columns"][] = "Wheelhouse";
$proto20["m_columns"][] = "Speculative";
$proto20["m_columns"][] = "Minimum";
$proto20["m_columns"][] = "rows";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bpengagmentstotal = createSqlQuery_bpengagmentstotal();
							$tdatabpengagmentstotal[".sqlquery"] = $queryData_bpengagmentstotal;
	
if(isset($tdatabpengagmentstotal["field2"])){
	$tdatabpengagmentstotal["field2"]["LookupTable"] = "carscars_view";
	$tdatabpengagmentstotal["field2"]["LookupOrderBy"] = "name";
	$tdatabpengagmentstotal["field2"]["LookupType"] = 4;
	$tdatabpengagmentstotal["field2"]["LinkField"] = "email";
	$tdatabpengagmentstotal["field2"]["DisplayField"] = "name";
	$tdatabpengagmentstotal[".hasCustomViewField"] = true;
}

$tableEvents["bpengagmentstotal"] = new eventsBase;
$tdatabpengagmentstotal[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bpengagmentstotal");

?>