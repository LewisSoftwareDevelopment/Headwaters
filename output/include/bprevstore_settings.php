<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabprevstore = array();
	$tdatabprevstore[".NumberOfChars"] = 80; 
	$tdatabprevstore[".ShortName"] = "bprevstore";
	$tdatabprevstore[".OwnerID"] = "";
	$tdatabprevstore[".OriginalTable"] = "bprevstore";

//	field labels
$fieldLabelsbprevstore = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbprevstore["English"] = array();
	$fieldToolTipsbprevstore["English"] = array();
	$fieldLabelsbprevstore["English"]["Name"] = "Name";
	$fieldToolTipsbprevstore["English"]["Name"] = "";
	$fieldLabelsbprevstore["English"]["ID"] = "ID";
	$fieldToolTipsbprevstore["English"]["ID"] = "";
	$fieldLabelsbprevstore["English"]["y1"] = "Y1";
	$fieldToolTipsbprevstore["English"]["y1"] = "";
	$fieldLabelsbprevstore["English"]["y2"] = "Y2";
	$fieldToolTipsbprevstore["English"]["y2"] = "";
	$fieldLabelsbprevstore["English"]["y3"] = "Y3";
	$fieldToolTipsbprevstore["English"]["y3"] = "";
	if (count($fieldToolTipsbprevstore["English"]))
		$tdatabprevstore[".isUseToolTips"] = true;
}
	
	
	$tdatabprevstore[".NCSearch"] = true;



$tdatabprevstore[".shortTableName"] = "bprevstore";
$tdatabprevstore[".nSecOptions"] = 0;
$tdatabprevstore[".recsPerRowList"] = 1;
$tdatabprevstore[".mainTableOwnerID"] = "";
$tdatabprevstore[".moveNext"] = 1;
$tdatabprevstore[".nType"] = 0;

$tdatabprevstore[".strOriginalTableName"] = "bprevstore";




$tdatabprevstore[".showAddInPopup"] = false;

$tdatabprevstore[".showEditInPopup"] = false;

$tdatabprevstore[".showViewInPopup"] = false;

$tdatabprevstore[".fieldsForRegister"] = array();

$tdatabprevstore[".listAjax"] = false;

	$tdatabprevstore[".audit"] = false;

	$tdatabprevstore[".locking"] = false;

$tdatabprevstore[".listIcons"] = true;
$tdatabprevstore[".inlineAdd"] = true;

$tdatabprevstore[".exportTo"] = true;

$tdatabprevstore[".printFriendly"] = true;


$tdatabprevstore[".showSimpleSearchOptions"] = false;

$tdatabprevstore[".showSearchPanel"] = true;

if (isMobile())
	$tdatabprevstore[".isUseAjaxSuggest"] = false;
else 
	$tdatabprevstore[".isUseAjaxSuggest"] = true;

$tdatabprevstore[".rowHighlite"] = true;

// button handlers file names

$tdatabprevstore[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabprevstore[".isUseTimeForSearch"] = false;




$tdatabprevstore[".allSearchFields"] = array();


$tdatabprevstore[".googleLikeFields"][] = "ID";
$tdatabprevstore[".googleLikeFields"][] = "Name";
$tdatabprevstore[".googleLikeFields"][] = "y1";
$tdatabprevstore[".googleLikeFields"][] = "y2";
$tdatabprevstore[".googleLikeFields"][] = "y3";



$tdatabprevstore[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatabprevstore[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY y1 DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabprevstore[".strOrderBy"] = $tstrOrderBy;

$tdatabprevstore[".orderindexes"] = array();
$tdatabprevstore[".orderindexes"][] = array(3, (0 ? "ASC" : "DESC"), "y1");

$tdatabprevstore[".sqlHead"] = "SELECT ID,  Name,  y1,  y2,  y3";
$tdatabprevstore[".sqlFrom"] = "FROM bprevstore";
$tdatabprevstore[".sqlWhereExpr"] = "";
$tdatabprevstore[".sqlTail"] = "GROUP BY y1";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabprevstore[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabprevstore[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbprevstore = array();
$tdatabprevstore[".Keys"] = $tableKeysbprevstore;

$tdatabprevstore[".listFields"] = array();

$tdatabprevstore[".viewFields"] = array();

$tdatabprevstore[".addFields"] = array();

$tdatabprevstore[".inlineAddFields"] = array();

$tdatabprevstore[".editFields"] = array();

$tdatabprevstore[".inlineEditFields"] = array();

$tdatabprevstore[".exportFields"] = array();

$tdatabprevstore[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bprevstore";
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
	
		
		
	$tdatabprevstore["ID"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bprevstore";
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
	
		
		
	$tdatabprevstore["Name"] = $fdata;
//	y1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "y1";
	$fdata["GoodName"] = "y1";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Y1"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "y1"; 
		$fdata["FullName"] = "y1";
	
		
		
				
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
	
		
		
	$tdatabprevstore["y1"] = $fdata;
//	y2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "y2";
	$fdata["GoodName"] = "y2";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Y2"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "y2"; 
		$fdata["FullName"] = "y2";
	
		
		
				
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
	
		
		
	$tdatabprevstore["y2"] = $fdata;
//	y3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "y3";
	$fdata["GoodName"] = "y3";
	$fdata["ownerTable"] = "bprevstore";
	$fdata["Label"] = "Y3"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "y3"; 
		$fdata["FullName"] = "y3";
	
		
		
				
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
	
		
		
	$tdatabprevstore["y3"] = $fdata;

	
$tables_data["bprevstore"]=&$tdatabprevstore;
$field_labels["bprevstore"] = &$fieldLabelsbprevstore;
$fieldToolTips["bprevstore"] = &$fieldToolTipsbprevstore;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bprevstore"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bprevstore"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bprevstore()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  Name,  y1,  y2,  y3";
$proto0["m_strFrom"] = "FROM bprevstore";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY y1 DESC";
$proto0["m_strTail"] = "GROUP BY y1";
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
	"m_strTable" => "bprevstore"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bprevstore"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "y1",
	"m_strTable" => "bprevstore"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "y2",
	"m_strTable" => "bprevstore"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "y3",
	"m_strTable" => "bprevstore"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "bprevstore";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "Name";
$proto16["m_columns"][] = "y1";
$proto16["m_columns"][] = "y2";
$proto16["m_columns"][] = "y3";
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
												$proto19=array();
						$obj = new SQLField(array(
	"m_strName" => "y1",
	"m_strTable" => "bprevstore"
));

$proto19["m_column"]=$obj;
$obj = new SQLGroupByItem($proto19);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
												$proto21=array();
						$obj = new SQLField(array(
	"m_strName" => "y1",
	"m_strTable" => "bprevstore"
));

$proto21["m_column"]=$obj;
$proto21["m_bAsc"] = 0;
$proto21["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto21);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_bprevstore = createSqlQuery_bprevstore();
					$tdatabprevstore[".sqlquery"] = $queryData_bprevstore;
	
if(isset($tdatabprevstore["field2"])){
	$tdatabprevstore["field2"]["LookupTable"] = "carscars_view";
	$tdatabprevstore["field2"]["LookupOrderBy"] = "name";
	$tdatabprevstore["field2"]["LookupType"] = 4;
	$tdatabprevstore["field2"]["LinkField"] = "email";
	$tdatabprevstore["field2"]["DisplayField"] = "name";
	$tdatabprevstore[".hasCustomViewField"] = true;
}

$tableEvents["bprevstore"] = new eventsBase;
$tdatabprevstore[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bprevstore");

?>