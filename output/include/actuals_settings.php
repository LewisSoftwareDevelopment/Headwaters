<?php
require_once(getabspath("classes/cipherer.php"));
$tdataactuals = array();
	$tdataactuals[".NumberOfChars"] = 80; 
	$tdataactuals[".ShortName"] = "actuals";
	$tdataactuals[".OwnerID"] = "";
	$tdataactuals[".OriginalTable"] = "actuals";

//	field labels
$fieldLabelsactuals = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsactuals["English"] = array();
	$fieldToolTipsactuals["English"] = array();
	$fieldLabelsactuals["English"]["ID"] = "ID";
	$fieldToolTipsactuals["English"]["ID"] = "";
	$fieldLabelsactuals["English"]["YTD_Net_Actual"] = "YTD Net Actual";
	$fieldToolTipsactuals["English"]["YTD Net Actual"] = "";
	$fieldLabelsactuals["English"]["This_Year_Buget_Gross"] = "This Year Buget Gross";
	$fieldToolTipsactuals["English"]["This Year Buget Gross"] = "";
	$fieldLabelsactuals["English"]["This_Year_Budget_Net"] = "This Year Budget Net";
	$fieldToolTipsactuals["English"]["This Year Budget Net"] = "";
	$fieldLabelsactuals["English"]["YTDnetact"] = "YTDnetact";
	$fieldToolTipsactuals["English"]["YTDnetact"] = "";
	$fieldLabelsactuals["English"]["YTDgross"] = "YTDgross";
	$fieldToolTipsactuals["English"]["YTDgross"] = "";
	$fieldLabelsactuals["English"]["YTDgrossact"] = "YTDgrossact";
	$fieldToolTipsactuals["English"]["YTDgrossact"] = "";
	if (count($fieldToolTipsactuals["English"]))
		$tdataactuals[".isUseToolTips"] = true;
}
	
	
	$tdataactuals[".NCSearch"] = true;



$tdataactuals[".shortTableName"] = "actuals";
$tdataactuals[".nSecOptions"] = 0;
$tdataactuals[".recsPerRowList"] = 1;
$tdataactuals[".mainTableOwnerID"] = "";
$tdataactuals[".moveNext"] = 1;
$tdataactuals[".nType"] = 0;

$tdataactuals[".strOriginalTableName"] = "actuals";




$tdataactuals[".showAddInPopup"] = false;

$tdataactuals[".showEditInPopup"] = false;

$tdataactuals[".showViewInPopup"] = false;

$tdataactuals[".fieldsForRegister"] = array();

$tdataactuals[".listAjax"] = false;

	$tdataactuals[".audit"] = false;

	$tdataactuals[".locking"] = false;

$tdataactuals[".listIcons"] = true;
$tdataactuals[".edit"] = true;




$tdataactuals[".showSimpleSearchOptions"] = false;

$tdataactuals[".showSearchPanel"] = true;

if (isMobile())
	$tdataactuals[".isUseAjaxSuggest"] = false;
else 
	$tdataactuals[".isUseAjaxSuggest"] = true;

$tdataactuals[".rowHighlite"] = true;

// button handlers file names

$tdataactuals[".addPageEvents"] = false;

// use timepicker for search panel
$tdataactuals[".isUseTimeForSearch"] = false;




$tdataactuals[".allSearchFields"] = array();

$tdataactuals[".allSearchFields"][] = "YTD Net Actual";
$tdataactuals[".allSearchFields"][] = "This Year Buget Gross";
$tdataactuals[".allSearchFields"][] = "This Year Budget Net";

$tdataactuals[".googleLikeFields"][] = "ID";
$tdataactuals[".googleLikeFields"][] = "YTD Net Actual";
$tdataactuals[".googleLikeFields"][] = "This Year Buget Gross";
$tdataactuals[".googleLikeFields"][] = "This Year Budget Net";
$tdataactuals[".googleLikeFields"][] = "YTDgrossact";
$tdataactuals[".googleLikeFields"][] = "YTDnetact";
$tdataactuals[".googleLikeFields"][] = "YTDgross";


$tdataactuals[".advSearchFields"][] = "YTD Net Actual";
$tdataactuals[".advSearchFields"][] = "This Year Buget Gross";
$tdataactuals[".advSearchFields"][] = "This Year Budget Net";

$tdataactuals[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataactuals[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataactuals[".strOrderBy"] = $tstrOrderBy;

$tdataactuals[".orderindexes"] = array();

$tdataactuals[".sqlHead"] = "SELECT actuals.ID,  actuals.`YTD Net Actual`,  actuals.`This Year Buget Gross`,  actuals.`This Year Budget Net`,  YTDgrossact,  (SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`)) AS YTDnetact,  (SELECT  SUM(`YTD Revenue`) FROM bankers) as YTDgross";
$tdataactuals[".sqlFrom"] = "FROM actuals  , company";
$tdataactuals[".sqlWhereExpr"] = "";
$tdataactuals[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataactuals[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataactuals[".arrGroupsPerPage"] = $arrGPP;

$tableKeysactuals = array();
$tableKeysactuals[] = "ID";
$tdataactuals[".Keys"] = $tableKeysactuals;

$tdataactuals[".listFields"] = array();
$tdataactuals[".listFields"][] = "YTD Net Actual";
$tdataactuals[".listFields"][] = "This Year Buget Gross";
$tdataactuals[".listFields"][] = "This Year Budget Net";

$tdataactuals[".viewFields"] = array();

$tdataactuals[".addFields"] = array();

$tdataactuals[".inlineAddFields"] = array();

$tdataactuals[".editFields"] = array();
$tdataactuals[".editFields"][] = "YTD Net Actual";
$tdataactuals[".editFields"][] = "This Year Buget Gross";
$tdataactuals[".editFields"][] = "This Year Budget Net";

$tdataactuals[".inlineEditFields"] = array();

$tdataactuals[".exportFields"] = array();

$tdataactuals[".printFields"] = array();

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "actuals.ID";
	
		
		
				
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
	
		
		
	$tdataactuals["ID"] = $fdata;
//	YTD Net Actual
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "YTD Net Actual";
	$fdata["GoodName"] = "YTD_Net_Actual";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "YTD Net Actual"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "YTD Net Actual"; 
		$fdata["FullName"] = "actuals.`YTD Net Actual`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataactuals["YTD Net Actual"] = $fdata;
//	This Year Buget Gross
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "This Year Buget Gross";
	$fdata["GoodName"] = "This_Year_Buget_Gross";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "This Year Buget Gross"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "This Year Buget Gross"; 
		$fdata["FullName"] = "actuals.`This Year Buget Gross`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataactuals["This Year Buget Gross"] = $fdata;
//	This Year Budget Net
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "This Year Budget Net";
	$fdata["GoodName"] = "This_Year_Budget_Net";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "This Year Budget Net"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		
		$fdata["bEditPage"] = true; 
	
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "This Year Budget Net"; 
		$fdata["FullName"] = "actuals.`This Year Budget Net`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Currency");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdataactuals["This Year Budget Net"] = $fdata;
//	YTDgrossact
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "YTDgrossact";
	$fdata["GoodName"] = "YTDgrossact";
	$fdata["ownerTable"] = "actuals";
	$fdata["Label"] = "YTDgrossact"; 
	$fdata["FieldType"] = 3;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "YTDgrossact"; 
		$fdata["FullName"] = "YTDgrossact";
	
		
		
				
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
	
		
		
	$tdataactuals["YTDgrossact"] = $fdata;
//	YTDnetact
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "YTDnetact";
	$fdata["GoodName"] = "YTDnetact";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTDnetact"; 
	$fdata["FieldType"] = 14;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "YTDnetact"; 
		$fdata["FullName"] = "(SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`))";
	
		
		
				
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
	
		
		
	$tdataactuals["YTDnetact"] = $fdata;
//	YTDgross
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "YTDgross";
	$fdata["GoodName"] = "YTDgross";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = "YTDgross"; 
	$fdata["FieldType"] = 14;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "YTDgross"; 
		$fdata["FullName"] = "(SELECT  SUM(`YTD Revenue`) FROM bankers)";
	
		
		
				
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
	
		
		
	$tdataactuals["YTDgross"] = $fdata;

	
$tables_data["actuals"]=&$tdataactuals;
$field_labels["actuals"] = &$fieldLabelsactuals;
$fieldToolTips["actuals"] = &$fieldToolTipsactuals;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["actuals"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["actuals"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_actuals()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "actuals.ID,  actuals.`YTD Net Actual`,  actuals.`This Year Buget Gross`,  actuals.`This Year Budget Net`,  YTDgrossact,  (SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`)) AS YTDnetact,  (SELECT  SUM(`YTD Revenue`) FROM bankers) as YTDgross";
$proto0["m_strFrom"] = "FROM actuals  , company";
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
	"m_strTable" => "actuals"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "YTD Net Actual",
	"m_strTable" => "actuals"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "This Year Buget Gross",
	"m_strTable" => "actuals"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "This Year Budget Net",
	"m_strTable" => "actuals"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "YTDgrossact",
	"m_strTable" => "actuals"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "(SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`))"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "YTDnetact";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$proto18=array();
$proto18["m_strHead"] = "SELECT";
$proto18["m_strFieldList"] = "SUM(`YTD Revenue`)";
$proto18["m_strFrom"] = "FROM bankers";
$proto18["m_strWhere"] = "";
$proto18["m_strOrderBy"] = "";
$proto18["m_strTail"] = "";
$proto18["cipherer"] = null;
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

$proto18["m_where"] = $obj;
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

$proto18["m_having"] = $obj;
$proto18["m_fieldlist"] = array();
						$proto23=array();
			$proto24=array();
$proto24["m_functiontype"] = "SQLF_SUM";
$proto24["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "YTD Revenue",
	"m_strTable" => "bankers"
));

$proto24["m_arguments"][]=$obj;
$proto24["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto24);

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto18["m_fieldlist"][]=$obj;
$proto18["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "bankers";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "ID";
$proto27["m_columns"][] = "Name";
$proto27["m_columns"][] = "Start Date";
$proto27["m_columns"][] = "Budget Year";
$proto27["m_columns"][] = "Active";
$proto27["m_columns"][] = "YTD Revenue";
$proto27["m_columns"][] = "Last Year Rev";
$proto27["m_columns"][] = "Prior Year Rev";
$proto27["m_columns"][] = "Last Year Rank";
$proto27["m_columns"][] = "YTD+Last";
$proto27["m_columns"][] = "YTD+Last+Prior";
$proto27["m_columns"][] = "YTD Closing";
$proto27["m_columns"][] = "Last Year Closing";
$proto27["m_columns"][] = "YTD IBC";
$proto27["m_columns"][] = "YTD Engagements";
$proto27["m_columns"][] = "Total Current Engagments";
$proto27["m_columns"][] = "# Wheelhouse";
$proto27["m_columns"][] = "# Speculative";
$proto27["m_columns"][] = "# Minimum";
$proto27["m_columns"][] = "Last Name";
$proto27["m_columns"][] = "First Name";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_alias"] = "";
$proto28=array();
$proto28["m_sql"] = "";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "";
$proto28["m_havingmode"] = "0";
$proto28["m_inBrackets"] = "0";
$proto28["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto18["m_fromlist"][]=$obj;
$proto18["m_groupby"] = array();
$proto18["m_orderby"] = array();
$obj = new SQLQuery($proto18);

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "YTDgross";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto30=array();
$proto30["m_link"] = "SQLL_MAIN";
			$proto31=array();
$proto31["m_strName"] = "actuals";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "ID";
$proto31["m_columns"][] = "YTD Net Actual";
$proto31["m_columns"][] = "This Year Buget Gross";
$proto31["m_columns"][] = "This Year Budget Net";
$proto31["m_columns"][] = "YTDgrossact";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_alias"] = "";
$proto32=array();
$proto32["m_sql"] = "";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "";
$proto32["m_havingmode"] = "0";
$proto32["m_inBrackets"] = "0";
$proto32["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto0["m_fromlist"][]=$obj;
												$proto34=array();
$proto34["m_link"] = "SQLL_CROSSJOIN";
			$proto35=array();
$proto35["m_strName"] = "company";
$proto35["m_columns"] = array();
$proto35["m_columns"][] = "ID";
$proto35["m_columns"][] = "Company";
$proto35["m_columns"][] = "Deal Slot";
$proto35["m_columns"][] = "IBC Date";
$proto35["m_columns"][] = "EL Date";
$proto35["m_columns"][] = "Project Name";
$proto35["m_columns"][] = "Status";
$proto35["m_columns"][] = "Deal Type";
$proto35["m_columns"][] = "Projected Fee";
$proto35["m_columns"][] = "Projected Transaction Size";
$proto35["m_columns"][] = "Est. Close Date";
$proto35["m_columns"][] = "Primary Banker";
$proto35["m_columns"][] = "Practice Area";
$proto35["m_columns"][] = "Ownership Class";
$proto35["m_columns"][] = "Industry";
$proto35["m_columns"][] = "Referral Type";
$proto35["m_columns"][] = "Referral Source-Company";
$proto35["m_columns"][] = "Referral Scource-Ind.";
$proto35["m_columns"][] = "Description";
$proto35["m_columns"][] = "Dead Date";
$proto35["m_columns"][] = "EL Expiration Date";
$proto35["m_columns"][] = "Engagment Fee";
$proto35["m_columns"][] = "Fee Minimum";
$proto35["m_columns"][] = "Final Total Sucess Fee";
$proto35["m_columns"][] = "Final Transaction Size";
$proto35["m_columns"][] = "Monthly Retainer";
$proto35["m_columns"][] = "Closed Date";
$proto35["m_columns"][] = "Team Split-1";
$proto35["m_columns"][] = "Team-1";
$proto35["m_columns"][] = "Team Split-2";
$proto35["m_columns"][] = "Team-2";
$proto35["m_columns"][] = "Team Split-3";
$proto35["m_columns"][] = "Team Split-4";
$proto35["m_columns"][] = "Team Split-5";
$proto35["m_columns"][] = "Team Split-6";
$proto35["m_columns"][] = "Team-3";
$proto35["m_columns"][] = "Team-4";
$proto35["m_columns"][] = "Team-5";
$proto35["m_columns"][] = "Team-6";
$proto35["m_columns"][] = "Fee Split-1";
$proto35["m_columns"][] = "Fee Split-2";
$proto35["m_columns"][] = "Fee Split-3";
$proto35["m_columns"][] = "Fee Split-4";
$proto35["m_columns"][] = "Fee Split-5";
$proto35["m_columns"][] = "Fee Split-6";
$proto35["m_columns"][] = "Fee To-1";
$proto35["m_columns"][] = "Fee To-2";
$proto35["m_columns"][] = "Fee To-3";
$proto35["m_columns"][] = "Fee To-4";
$proto35["m_columns"][] = "Fee To-5";
$proto35["m_columns"][] = "Fee To-6";
$proto35["m_columns"][] = "Enterpise Value";
$proto35["m_columns"][] = "Fee Details";
$proto35["m_columns"][] = "Split to Corporate";
$proto35["m_columns"][] = "Paul";
$proto35["m_columns"][] = "McBroom";
$proto35["m_columns"][] = "Month of Close";
$proto35["m_columns"][] = "Gross This";
$proto35["m_columns"][] = "Gross Next";
$proto35["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto35);

$proto34["m_table"] = $obj;
$proto34["m_alias"] = "";
$proto36=array();
$proto36["m_sql"] = "";
$proto36["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
$proto36["m_strCase"] = "";
$proto36["m_havingmode"] = "0";
$proto36["m_inBrackets"] = "0";
$proto36["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto36);

$proto34["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto34);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_actuals = createSqlQuery_actuals();
							$tdataactuals[".sqlquery"] = $queryData_actuals;
	
if(isset($tdataactuals["field2"])){
	$tdataactuals["field2"]["LookupTable"] = "carscars_view";
	$tdataactuals["field2"]["LookupOrderBy"] = "name";
	$tdataactuals["field2"]["LookupType"] = 4;
	$tdataactuals["field2"]["LinkField"] = "email";
	$tdataactuals["field2"]["DisplayField"] = "name";
	$tdataactuals[".hasCustomViewField"] = true;
}

include_once(getabspath("include/actuals_events.php"));
$tableEvents["actuals"] = new eventclass_actuals;
$tdataactuals[".hasEvents"] = true;

$cipherer = new RunnerCipherer("actuals");

?>