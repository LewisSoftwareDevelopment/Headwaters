<?php
require_once(getabspath("classes/cipherer.php"));
$tdatabankerrank_Chart = array();
	$tdatabankerrank_Chart[".ShortName"] = "bankerrank_Chart";
	$tdatabankerrank_Chart[".OwnerID"] = "";
	$tdatabankerrank_Chart[".OriginalTable"] = "bankerrank";

//	field labels
$fieldLabelsbankerrank_Chart = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsbankerrank_Chart["English"] = array();
	$fieldToolTipsbankerrank_Chart["English"] = array();
	$fieldLabelsbankerrank_Chart["English"]["ID"] = "ID";
	$fieldToolTipsbankerrank_Chart["English"]["ID"] = "";
	$fieldLabelsbankerrank_Chart["English"]["Year"] = "Year";
	$fieldToolTipsbankerrank_Chart["English"]["Year"] = "";
	$fieldLabelsbankerrank_Chart["English"]["Name"] = "Name";
	$fieldToolTipsbankerrank_Chart["English"]["Name"] = "";
	$fieldLabelsbankerrank_Chart["English"]["Rank"] = "Rank";
	$fieldToolTipsbankerrank_Chart["English"]["Rank"] = "";
	if (count($fieldToolTipsbankerrank_Chart["English"]))
		$tdatabankerrank_Chart[".isUseToolTips"] = true;
}
	
	
	$tdatabankerrank_Chart[".NCSearch"] = true;

	$tdatabankerrank_Chart[".ChartRefreshTime"] = 0;


$tdatabankerrank_Chart[".shortTableName"] = "bankerrank_Chart";
$tdatabankerrank_Chart[".nSecOptions"] = 0;
$tdatabankerrank_Chart[".recsPerRowList"] = 1;
$tdatabankerrank_Chart[".mainTableOwnerID"] = "";
$tdatabankerrank_Chart[".moveNext"] = 1;
$tdatabankerrank_Chart[".nType"] = 3;

$tdatabankerrank_Chart[".strOriginalTableName"] = "bankerrank";




$tdatabankerrank_Chart[".showAddInPopup"] = false;

$tdatabankerrank_Chart[".showEditInPopup"] = false;

$tdatabankerrank_Chart[".showViewInPopup"] = false;

$tdatabankerrank_Chart[".fieldsForRegister"] = array();

$tdatabankerrank_Chart[".listAjax"] = false;

	$tdatabankerrank_Chart[".audit"] = false;

	$tdatabankerrank_Chart[".locking"] = false;

$tdatabankerrank_Chart[".listIcons"] = true;
$tdatabankerrank_Chart[".edit"] = true;
$tdatabankerrank_Chart[".inlineEdit"] = true;
$tdatabankerrank_Chart[".inlineAdd"] = true;
$tdatabankerrank_Chart[".view"] = true;



$tdatabankerrank_Chart[".delete"] = true;

$tdatabankerrank_Chart[".showSimpleSearchOptions"] = false;

$tdatabankerrank_Chart[".showSearchPanel"] = true;

if (isMobile())
	$tdatabankerrank_Chart[".isUseAjaxSuggest"] = false;
else 
	$tdatabankerrank_Chart[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatabankerrank_Chart[".addPageEvents"] = false;

// use timepicker for search panel
$tdatabankerrank_Chart[".isUseTimeForSearch"] = false;




$tdatabankerrank_Chart[".allSearchFields"] = array();

$tdatabankerrank_Chart[".allSearchFields"][] = "ID";
$tdatabankerrank_Chart[".allSearchFields"][] = "Year";
$tdatabankerrank_Chart[".allSearchFields"][] = "Name";
$tdatabankerrank_Chart[".allSearchFields"][] = "Rank";

$tdatabankerrank_Chart[".googleLikeFields"][] = "ID";
$tdatabankerrank_Chart[".googleLikeFields"][] = "Year";
$tdatabankerrank_Chart[".googleLikeFields"][] = "Name";
$tdatabankerrank_Chart[".googleLikeFields"][] = "Rank";


$tdatabankerrank_Chart[".advSearchFields"][] = "ID";
$tdatabankerrank_Chart[".advSearchFields"][] = "Year";
$tdatabankerrank_Chart[".advSearchFields"][] = "Name";
$tdatabankerrank_Chart[".advSearchFields"][] = "Rank";

$tdatabankerrank_Chart[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatabankerrank_Chart[".strOrderBy"] = $tstrOrderBy;

$tdatabankerrank_Chart[".orderindexes"] = array();

$tdatabankerrank_Chart[".sqlHead"] = "SELECT ID,  `Year`,  Name,  Rank";
$tdatabankerrank_Chart[".sqlFrom"] = "FROM bankerrank";
$tdatabankerrank_Chart[".sqlWhereExpr"] = "";
$tdatabankerrank_Chart[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatabankerrank_Chart[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatabankerrank_Chart[".arrGroupsPerPage"] = $arrGPP;

$tableKeysbankerrank_Chart = array();
$tableKeysbankerrank_Chart[] = "ID";
$tdatabankerrank_Chart[".Keys"] = $tableKeysbankerrank_Chart;

$tdatabankerrank_Chart[".listFields"] = array();
$tdatabankerrank_Chart[".listFields"][] = "ID";
$tdatabankerrank_Chart[".listFields"][] = "Year";
$tdatabankerrank_Chart[".listFields"][] = "Name";
$tdatabankerrank_Chart[".listFields"][] = "Rank";

$tdatabankerrank_Chart[".viewFields"] = array();
$tdatabankerrank_Chart[".viewFields"][] = "ID";
$tdatabankerrank_Chart[".viewFields"][] = "Year";
$tdatabankerrank_Chart[".viewFields"][] = "Name";
$tdatabankerrank_Chart[".viewFields"][] = "Rank";

$tdatabankerrank_Chart[".addFields"] = array();
$tdatabankerrank_Chart[".addFields"][] = "Year";
$tdatabankerrank_Chart[".addFields"][] = "Name";
$tdatabankerrank_Chart[".addFields"][] = "Rank";

$tdatabankerrank_Chart[".inlineAddFields"] = array();
$tdatabankerrank_Chart[".inlineAddFields"][] = "Year";
$tdatabankerrank_Chart[".inlineAddFields"][] = "Name";
$tdatabankerrank_Chart[".inlineAddFields"][] = "Rank";

$tdatabankerrank_Chart[".editFields"] = array();
$tdatabankerrank_Chart[".editFields"][] = "Year";
$tdatabankerrank_Chart[".editFields"][] = "Name";
$tdatabankerrank_Chart[".editFields"][] = "Rank";

$tdatabankerrank_Chart[".inlineEditFields"] = array();
$tdatabankerrank_Chart[".inlineEditFields"][] = "Year";
$tdatabankerrank_Chart[".inlineEditFields"][] = "Name";
$tdatabankerrank_Chart[".inlineEditFields"][] = "Rank";

$tdatabankerrank_Chart[".exportFields"] = array();
$tdatabankerrank_Chart[".exportFields"][] = "ID";
$tdatabankerrank_Chart[".exportFields"][] = "Year";
$tdatabankerrank_Chart[".exportFields"][] = "Name";
$tdatabankerrank_Chart[".exportFields"][] = "Rank";

$tdatabankerrank_Chart[".printFields"] = array();
$tdatabankerrank_Chart[".printFields"][] = "ID";
$tdatabankerrank_Chart[".printFields"][] = "Year";
$tdatabankerrank_Chart[".printFields"][] = "Name";
$tdatabankerrank_Chart[".printFields"][] = "Rank";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "bankerrank";
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
	
	$fdata["ViewFormats"]["chart"] = $vdata;
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
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrank_Chart["ID"] = $fdata;
//	Year
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Year";
	$fdata["GoodName"] = "Year";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "Year"; 
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
	
		$fdata["strField"] = "Year"; 
		$fdata["FullName"] = "`Year`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
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
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrank_Chart["Year"] = $fdata;
//	Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Name";
	$fdata["GoodName"] = "Name";
	$fdata["ownerTable"] = "bankerrank";
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
	
	$fdata["ViewFormats"]["chart"] = $vdata;
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
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrank_Chart["Name"] = $fdata;
//	Rank
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Rank";
	$fdata["GoodName"] = "Rank";
	$fdata["ownerTable"] = "bankerrank";
	$fdata["Label"] = "Rank"; 
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
	
		$fdata["strField"] = "Rank"; 
		$fdata["FullName"] = "Rank";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
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
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatabankerrank_Chart["Rank"] = $fdata;

	$tdatabankerrank_Chart[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">bankerrank Chart</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="0">
			<attr value="name">Year</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">2</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '</attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="1">
		<attr value="name">Name</attr>
	</attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';

	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="head">'.xmlencode("Chart Title").'</attr>
<attr value="foot">'.xmlencode("Legend Title").'</attr>
<attr value="y_axis_label">'.xmlencode("Year").'</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">true</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">true</attr>
<attr value="maxbarscroll">10</attr>';
$tdatabankerrank_Chart[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="0">
		<attr value="name">ID</attr>
		<attr value="label">'.xmlencode("ID").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="1">
		<attr value="name">Year</attr>
		<attr value="label">'.xmlencode("Year").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="2">
		<attr value="name">Name</attr>
		<attr value="label">'.xmlencode("Name").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdatabankerrank_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Rank</attr>
		<attr value="label">'.xmlencode("Rank").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdatabankerrank_Chart[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">bankerrank Chart</attr>
<attr value="short_table_name">bankerrank_Chart</attr>
</attr>

</chart>';
	
$tables_data["bankerrank Chart"]=&$tdatabankerrank_Chart;
$field_labels["bankerrank_Chart"] = &$fieldLabelsbankerrank_Chart;
$fieldToolTips["bankerrank Chart"] = &$fieldToolTipsbankerrank_Chart;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["bankerrank Chart"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["bankerrank Chart"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_bankerrank_Chart()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  `Year`,  Name,  Rank";
$proto0["m_strFrom"] = "FROM bankerrank";
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
	"m_strTable" => "bankerrank"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Year",
	"m_strTable" => "bankerrank"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Name",
	"m_strTable" => "bankerrank"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Rank",
	"m_strTable" => "bankerrank"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "bankerrank";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "ID";
$proto14["m_columns"][] = "Year";
$proto14["m_columns"][] = "Name";
$proto14["m_columns"][] = "Rank";
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
$queryData_bankerrank_Chart = createSqlQuery_bankerrank_Chart();
				$tdatabankerrank_Chart[".sqlquery"] = $queryData_bankerrank_Chart;
	
if(isset($tdatabankerrank_Chart["field2"])){
	$tdatabankerrank_Chart["field2"]["LookupTable"] = "carscars_view";
	$tdatabankerrank_Chart["field2"]["LookupOrderBy"] = "name";
	$tdatabankerrank_Chart["field2"]["LookupType"] = 4;
	$tdatabankerrank_Chart["field2"]["LinkField"] = "email";
	$tdatabankerrank_Chart["field2"]["DisplayField"] = "name";
	$tdatabankerrank_Chart[".hasCustomViewField"] = true;
}

$tableEvents["bankerrank Chart"] = new eventsBase;
$tdatabankerrank_Chart[".hasEvents"] = false;

$cipherer = new RunnerCipherer("bankerrank Chart");

?>