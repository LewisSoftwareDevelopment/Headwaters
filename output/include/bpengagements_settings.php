<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabpengagements = array();
	$tdatabpengagements[".NumberOfChars"] = 80; 
	$tdatabpengagements[".ShortName"] = "bpengagements";
	$tdatabpengagements[".OwnerID"] = "";
	$tdatabpengagements[".OriginalTable"] = "bpengagements";

//	field labels
$fieldLabelsbpengagements = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbpengagements["English"] = array();
	$fieldToolTipsbpengagements["English"] = array();
	$fieldLabelsbpengagements["English"]["Rows"] = "Rows";
	$fieldToolTipsbpengagements["English"]["Rows"] = "";
	$fieldLabelsbpengagements["English"]["ID"] = "ID";
	$fieldToolTipsbpengagements["English"]["ID"] = "";
	$fieldLabelsbpengagements["English"]["Banker"] = "Banker";
	$fieldToolTipsbpengagements["English"]["Banker"] = "";
	$fieldLabelsbpengagements["English"]["Engagements"] = "Engagements";
	$fieldToolTipsbpengagements["English"]["Engagements"] = "";
	$fieldLabelsbpengagements["English"]["IBC"] = "IBC";
	$fieldToolTipsbpengagements["English"]["IBC"] = "";
	$fieldLabelsbpengagements["English"]["Closed"] = "Closed";
	$fieldToolTipsbpengagements["English"]["Closed"] = "";
	if (count($fieldToolTipsbpengagements["English"]))
		$tdatabpengagements[".isUseToolTips"] = true;
}
	
	
	$tdatabpengagements[".NCSearch"] = true;



$tdatabpengagements[".shortTableName"] = "bpengagements";
$tdatabpengagements[".nSecOptions"] = 0;
$tdatabpengagements[".recsPerRowList"] = 1;
$tdatabpengagements[".mainTableOwnerID"] = "";
$tdatabpengagements[".moveNext"] = 1;
$tdatabpengagements[".nType"] = 0;

$tdatabpengagements[".strOriginalTableName"] = "bpengagements";




$tdatabpengagements[".showAddInPopup"] = false;

$tdatabpengagements[".showEditInPopup"] = false;

$tdatabpengagements[".showViewInPopup"] = false;

$tdatabpengagements[".fieldsForRegister"] = array();

$tdatabpengagements[".listAjax"] = false;

	$tdatabpengagements[".audit"] = false;

	$tdatabpengagements[".locking"] = false;

$tdatabpengagements[".listIcons"] = true;
$tdatabpengagements[".inlineAdd"] = true;

$tdatabpengagements[".exportTo"] = true;

$tdatabpengagements[".printFriendly"] = true;


$tdatabpengagements[".showSimpleSearchOptions"] = false;

$tdatabpengagements[".showSearchPanel"] = true;

if (isMobile())
	$tdatabpengagements[".isUseAjaxSuggest"] = false;
else 
	$tdatabpengagements[".isUseAjaxSuggest"] = true;

$tdatabpengagements[".rowHighlite"] = true;

// button handlers file names

$tdatabpengagements[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabpengagements[".isUseTimeForSearch"] = false;




$tdatabpengagements[".allSearchFields"] = array();


$tdatabpengagements[".googleLikeFields"][] = "ID";
$tdatabpengagements[".googleLikeFields"][] = "Rows";
$tdatabpengagements[".googleLikeFields"][] = "Banker";
$tdatabpengagements[".googleLikeFields"][] = "Engagements";
$tdatabpengagements[".googleLikeFields"][] = "IBC";
$tdatabpengagements[".googleLikeFields"][] = "Closed";



$tdatabpengagements[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatabpengagements[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabpengagements[".strOrderBy"] = $tstrOrderBy;

$tdatabpengagements[".orderindexes"] = array();

$tdatabpengagements[".sqlHead"] = "SELECT ID,  `rows`,  Banker,  Engagements,  IBC,  Closed";
$tdatabpengagements[".sqlFrom"] = "FROM bpengagements";
$tdatabpengagements[".sqlWhereExpr"] = "";
$tdatabpengagements[".sqlTail"] = "GROUP BY Banker";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabpengagements[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabpengagements[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbpengagements = array();
$tdatabpengagements[".Keys"] = $tableKeysbpengagements;

$tdatabpengagements[".listFields"] = array();

$tdatabpengagements[".viewFields"] = array();

$tdatabpengagements[".addFields"] = array();

$tdatabpengagements[".inlineAddFields"] = array();

$tdatabpengagements[".editFields"] = array();

$tdatabpengagements[".inlineEditFields"] = array();

$tdatabpengagements[".exportFields"] = array();

$tdatabpengagements[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bpengagements";
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
	
		
		
	$tdatabpengagements["ID"] = $fdata;
//	Rows
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Rows";
	$fdata["GoodName"] = "Rows";
	$fdata["ownerTable"] = "bpengagements";
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
	
		
		
	$tdatabpengagements["Rows"] = $fdata;
//	Banker
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Banker";
	$fdata["GoodName"] = "Banker";
	$fdata["ownerTable"] = "bpengagements";
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabpengagements["Banker"] = $fdata;
//	Engagements
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Engagements";
	$fdata["GoodName"] = "Engagements";
	$fdata["ownerTable"] = "bpengagements";
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
	
		
		
	$tdatabpengagements["Engagements"] = $fdata;
//	IBC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "IBC";
	$fdata["GoodName"] = "IBC";
	$fdata["ownerTable"] = "bpengagements";
	$fdata["Label"] = "IBC"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "IBC"; 
		$fdata["FullName"] = "IBC";
	
		
		
				
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
	
		
		
	$tdatabpengagements["IBC"] = $fdata;
//	Closed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Closed";
	$fdata["GoodName"] = "Closed";
	$fdata["ownerTable"] = "bpengagements";
	$fdata["Label"] = "Closed"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Closed"; 
		$fdata["FullName"] = "Closed";
	
		
		
				
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
	
		
		
	$tdatabpengagements["Closed"] = $fdata;

	
$tables_data["bpengagements"]=&$tdatabpengagements;
$field_labels["bpengagements"] = &$fieldLabelsbpengagements;
$fieldToolTips["bpengagements"] = &$fieldToolTipsbpengagements;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bpengagements"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bpengagements"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bpengagements()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  `rows`,  Banker,  Engagements,  IBC,  Closed";
$proto0["m_strFrom"] = "FROM bpengagements";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY Banker";
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
	"m_strTable" => "bpengagements"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "rows",
	"m_strTable" => "bpengagements"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Banker",
	"m_strTable" => "bpengagements"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Engagements",
	"m_strTable" => "bpengagements"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC",
	"m_strTable" => "bpengagements"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Closed",
	"m_strTable" => "bpengagements"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "bpengagements";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "ID";
$proto18["m_columns"][] = "rows";
$proto18["m_columns"][] = "Banker";
$proto18["m_columns"][] = "Engagements";
$proto18["m_columns"][] = "IBC";
$proto18["m_columns"][] = "Closed";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
												$proto21=array();
						$obj = new SQLField(array(
	"m_strName" => "Banker",
	"m_strTable" => "bpengagements"
));

$proto21["m_column"]=$obj;
$obj = new SQLGroupByItem($proto21);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bpengagements = createSqlQuery_bpengagements();
						$tdatabpengagements[".sqlquery"] = $queryData_bpengagements;
	
if(isset($tdatabpengagements["field2"])){
	$tdatabpengagements["field2"]["LookupTable"] = "carscars_view";
	$tdatabpengagements["field2"]["LookupOrderBy"] = "name";
	$tdatabpengagements["field2"]["LookupType"] = 4;
	$tdatabpengagements["field2"]["LinkField"] = "email";
	$tdatabpengagements["field2"]["DisplayField"] = "name";
	$tdatabpengagements[".hasCustomViewField"] = true;
}

$tableEvents["bpengagements"] = new eventsBase;
$tdatabpengagements[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bpengagements");

?>