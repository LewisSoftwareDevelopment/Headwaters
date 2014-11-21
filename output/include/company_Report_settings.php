<?php
require_once(getabspath("classes/cipherer.php"));
$tdatacompany_Report = array();
	$tdatacompany_Report[".NumberOfChars"] = 80; 
	$tdatacompany_Report[".ShortName"] = "company_Report";
	$tdatacompany_Report[".OwnerID"] = "";
	$tdatacompany_Report[".OriginalTable"] = "company";

//	field labels
$fieldLabelscompany_Report = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscompany_Report["English"] = array();
	$fieldToolTipscompany_Report["English"] = array();
	$fieldLabelscompany_Report["English"]["ID"] = "ID";
	$fieldToolTipscompany_Report["English"]["ID"] = "";
	$fieldLabelscompany_Report["English"]["Company"] = "Company";
	$fieldToolTipscompany_Report["English"]["Company"] = "";
	$fieldLabelscompany_Report["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipscompany_Report["English"]["Deal Slot"] = "";
	$fieldLabelscompany_Report["English"]["IBC_Date"] = "IBC Date";
	$fieldToolTipscompany_Report["English"]["IBC Date"] = "";
	$fieldLabelscompany_Report["English"]["EL_Date"] = "EL Date";
	$fieldToolTipscompany_Report["English"]["EL Date"] = "";
	$fieldLabelscompany_Report["English"]["Project_Name"] = "Project Name";
	$fieldToolTipscompany_Report["English"]["Project Name"] = "";
	$fieldLabelscompany_Report["English"]["Status"] = "Status";
	$fieldToolTipscompany_Report["English"]["Status"] = "";
	$fieldLabelscompany_Report["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipscompany_Report["English"]["Deal Type"] = "";
	$fieldLabelscompany_Report["English"]["Projected_Fee"] = "Projected Fee";
	$fieldToolTipscompany_Report["English"]["Projected Fee"] = "";
	$fieldLabelscompany_Report["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipscompany_Report["English"]["Projected Transaction Size"] = "";
	$fieldLabelscompany_Report["English"]["Est__Close_Date"] = "Est. Close Date";
	$fieldToolTipscompany_Report["English"]["Est. Close Date"] = "";
	$fieldLabelscompany_Report["English"]["Primary_Banker"] = "Primary Banker";
	$fieldToolTipscompany_Report["English"]["Primary Banker"] = "";
	$fieldLabelscompany_Report["English"]["Practice_Area"] = "Practice Area";
	$fieldToolTipscompany_Report["English"]["Practice Area"] = "";
	$fieldLabelscompany_Report["English"]["Ownership_Class"] = "Ownership Class";
	$fieldToolTipscompany_Report["English"]["Ownership Class"] = "";
	$fieldLabelscompany_Report["English"]["Industry"] = "Industry";
	$fieldToolTipscompany_Report["English"]["Industry"] = "";
	$fieldLabelscompany_Report["English"]["Referral_Type"] = "Referral Type";
	$fieldToolTipscompany_Report["English"]["Referral Type"] = "";
	$fieldLabelscompany_Report["English"]["Referral_Source_Company"] = "Referral Source-Company";
	$fieldToolTipscompany_Report["English"]["Referral Source-Company"] = "";
	$fieldLabelscompany_Report["English"]["Referral_Scource_Ind_"] = "Referral Scource-Ind.";
	$fieldToolTipscompany_Report["English"]["Referral Scource-Ind."] = "";
	$fieldLabelscompany_Report["English"]["Description"] = "Description";
	$fieldToolTipscompany_Report["English"]["Description"] = "";
	$fieldLabelscompany_Report["English"]["Dead_Date"] = "Dead Date";
	$fieldToolTipscompany_Report["English"]["Dead Date"] = "";
	$fieldLabelscompany_Report["English"]["EL_Expiration_Date"] = "EL Expiration Date";
	$fieldToolTipscompany_Report["English"]["EL Expiration Date"] = "";
	$fieldLabelscompany_Report["English"]["Engagment_Fee"] = "Engagment Fee";
	$fieldToolTipscompany_Report["English"]["Engagment Fee"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Minimum"] = "Fee Minimum";
	$fieldToolTipscompany_Report["English"]["Fee Minimum"] = "";
	$fieldLabelscompany_Report["English"]["Final_Total_Sucess_Fee"] = "Final Total Sucess Fee";
	$fieldToolTipscompany_Report["English"]["Final Total Sucess Fee"] = "";
	$fieldLabelscompany_Report["English"]["Final_Transaction_Size"] = "Final Transaction Size";
	$fieldToolTipscompany_Report["English"]["Final Transaction Size"] = "";
	$fieldLabelscompany_Report["English"]["Monthly_Retainer"] = "Monthly Retainer";
	$fieldToolTipscompany_Report["English"]["Monthly Retainer"] = "";
	$fieldLabelscompany_Report["English"]["Closed_Date"] = "Closed Date";
	$fieldToolTipscompany_Report["English"]["Closed Date"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_1"] = "Team Split-1";
	$fieldToolTipscompany_Report["English"]["Team Split-1"] = "";
	$fieldLabelscompany_Report["English"]["Team_1"] = "Team-1";
	$fieldToolTipscompany_Report["English"]["Team-1"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_2"] = "Team Split-2";
	$fieldToolTipscompany_Report["English"]["Team Split-2"] = "";
	$fieldLabelscompany_Report["English"]["Team_2"] = "Team-2";
	$fieldToolTipscompany_Report["English"]["Team-2"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_3"] = "Team Split-3";
	$fieldToolTipscompany_Report["English"]["Team Split-3"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_4"] = "Team Split-4";
	$fieldToolTipscompany_Report["English"]["Team Split-4"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_5"] = "Team Split-5";
	$fieldToolTipscompany_Report["English"]["Team Split-5"] = "";
	$fieldLabelscompany_Report["English"]["Team_Split_6"] = "Team Split-6";
	$fieldToolTipscompany_Report["English"]["Team Split-6"] = "";
	$fieldLabelscompany_Report["English"]["Team_3"] = "Team-3";
	$fieldToolTipscompany_Report["English"]["Team-3"] = "";
	$fieldLabelscompany_Report["English"]["Team_4"] = "Team-4";
	$fieldToolTipscompany_Report["English"]["Team-4"] = "";
	$fieldLabelscompany_Report["English"]["Team_5"] = "Team-5";
	$fieldToolTipscompany_Report["English"]["Team-5"] = "";
	$fieldLabelscompany_Report["English"]["Team_6"] = "Team-6";
	$fieldToolTipscompany_Report["English"]["Team-6"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_1"] = "Fee Split-1";
	$fieldToolTipscompany_Report["English"]["Fee Split-1"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_2"] = "Fee Split-2";
	$fieldToolTipscompany_Report["English"]["Fee Split-2"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_3"] = "Fee Split-3";
	$fieldToolTipscompany_Report["English"]["Fee Split-3"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_4"] = "Fee Split-4";
	$fieldToolTipscompany_Report["English"]["Fee Split-4"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_5"] = "Fee Split-5";
	$fieldToolTipscompany_Report["English"]["Fee Split-5"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Split_6"] = "Fee Split-6";
	$fieldToolTipscompany_Report["English"]["Fee Split-6"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_1"] = "Fee To-1";
	$fieldToolTipscompany_Report["English"]["Fee To-1"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_2"] = "Fee To-2";
	$fieldToolTipscompany_Report["English"]["Fee To-2"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_3"] = "Fee To-3";
	$fieldToolTipscompany_Report["English"]["Fee To-3"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_4"] = "Fee To-4";
	$fieldToolTipscompany_Report["English"]["Fee To-4"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_5"] = "Fee To-5";
	$fieldToolTipscompany_Report["English"]["Fee To-5"] = "";
	$fieldLabelscompany_Report["English"]["Fee_To_6"] = "Fee To-6";
	$fieldToolTipscompany_Report["English"]["Fee To-6"] = "";
	$fieldLabelscompany_Report["English"]["Enterpise_Value"] = "Enterpise Value";
	$fieldToolTipscompany_Report["English"]["Enterpise Value"] = "";
	$fieldLabelscompany_Report["English"]["Fee_Details"] = "Fee Details";
	$fieldToolTipscompany_Report["English"]["Fee Details"] = "";
	$fieldLabelscompany_Report["English"]["Split_to_Corporate"] = "Split to Corporate";
	$fieldToolTipscompany_Report["English"]["Split to Corporate"] = "";
	$fieldLabelscompany_Report["English"]["Paul"] = "Paul";
	$fieldToolTipscompany_Report["English"]["Paul"] = "";
	$fieldLabelscompany_Report["English"]["McBroom"] = "Mc Broom";
	$fieldToolTipscompany_Report["English"]["McBroom"] = "";
	if (count($fieldToolTipscompany_Report["English"]))
		$tdatacompany_Report[".isUseToolTips"] = true;
}
	
	
	$tdatacompany_Report[".NCSearch"] = true;



$tdatacompany_Report[".shortTableName"] = "company_Report";
$tdatacompany_Report[".nSecOptions"] = 0;
$tdatacompany_Report[".recsPerRowList"] = 1;
$tdatacompany_Report[".mainTableOwnerID"] = "";
$tdatacompany_Report[".moveNext"] = 1;
$tdatacompany_Report[".nType"] = 2;

$tdatacompany_Report[".strOriginalTableName"] = "company";




$tdatacompany_Report[".showAddInPopup"] = false;

$tdatacompany_Report[".showEditInPopup"] = false;

$tdatacompany_Report[".showViewInPopup"] = false;

$tdatacompany_Report[".fieldsForRegister"] = array();

$tdatacompany_Report[".listAjax"] = false;

	$tdatacompany_Report[".audit"] = false;

	$tdatacompany_Report[".locking"] = false;

$tdatacompany_Report[".listIcons"] = true;
$tdatacompany_Report[".edit"] = true;
$tdatacompany_Report[".inlineEdit"] = true;
$tdatacompany_Report[".inlineAdd"] = true;
$tdatacompany_Report[".view"] = true;

$tdatacompany_Report[".exportTo"] = true;

$tdatacompany_Report[".printFriendly"] = true;

$tdatacompany_Report[".delete"] = true;

$tdatacompany_Report[".showSimpleSearchOptions"] = false;

$tdatacompany_Report[".showSearchPanel"] = true;

if (isMobile())
	$tdatacompany_Report[".isUseAjaxSuggest"] = false;
else 
	$tdatacompany_Report[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdatacompany_Report[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacompany_Report[".isUseTimeForSearch"] = false;




$tdatacompany_Report[".allSearchFields"] = array();

$tdatacompany_Report[".allSearchFields"][] = "Company";
$tdatacompany_Report[".allSearchFields"][] = "Deal Slot";
$tdatacompany_Report[".allSearchFields"][] = "IBC Date";
$tdatacompany_Report[".allSearchFields"][] = "EL Date";
$tdatacompany_Report[".allSearchFields"][] = "Project Name";
$tdatacompany_Report[".allSearchFields"][] = "Status";
$tdatacompany_Report[".allSearchFields"][] = "ID";
$tdatacompany_Report[".allSearchFields"][] = "Deal Type";
$tdatacompany_Report[".allSearchFields"][] = "Projected Fee";
$tdatacompany_Report[".allSearchFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".allSearchFields"][] = "Est. Close Date";
$tdatacompany_Report[".allSearchFields"][] = "Primary Banker";
$tdatacompany_Report[".allSearchFields"][] = "Practice Area";
$tdatacompany_Report[".allSearchFields"][] = "Ownership Class";
$tdatacompany_Report[".allSearchFields"][] = "Industry";
$tdatacompany_Report[".allSearchFields"][] = "Referral Type";
$tdatacompany_Report[".allSearchFields"][] = "Referral Source-Company";
$tdatacompany_Report[".allSearchFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".allSearchFields"][] = "Description";
$tdatacompany_Report[".allSearchFields"][] = "Dead Date";
$tdatacompany_Report[".allSearchFields"][] = "EL Expiration Date";
$tdatacompany_Report[".allSearchFields"][] = "Engagment Fee";
$tdatacompany_Report[".allSearchFields"][] = "Fee Minimum";
$tdatacompany_Report[".allSearchFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".allSearchFields"][] = "Final Transaction Size";
$tdatacompany_Report[".allSearchFields"][] = "Monthly Retainer";
$tdatacompany_Report[".allSearchFields"][] = "Closed Date";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-1";
$tdatacompany_Report[".allSearchFields"][] = "Team-1";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-2";
$tdatacompany_Report[".allSearchFields"][] = "Team-2";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-3";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-4";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-5";
$tdatacompany_Report[".allSearchFields"][] = "Team Split-6";
$tdatacompany_Report[".allSearchFields"][] = "Team-3";
$tdatacompany_Report[".allSearchFields"][] = "Team-4";
$tdatacompany_Report[".allSearchFields"][] = "Team-5";
$tdatacompany_Report[".allSearchFields"][] = "Team-6";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-1";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-2";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-3";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-4";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-5";
$tdatacompany_Report[".allSearchFields"][] = "Fee Split-6";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-1";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-2";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-3";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-4";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-5";
$tdatacompany_Report[".allSearchFields"][] = "Fee To-6";
$tdatacompany_Report[".allSearchFields"][] = "Enterpise Value";
$tdatacompany_Report[".allSearchFields"][] = "Fee Details";
$tdatacompany_Report[".allSearchFields"][] = "Split to Corporate";
$tdatacompany_Report[".allSearchFields"][] = "Paul";
$tdatacompany_Report[".allSearchFields"][] = "McBroom";

$tdatacompany_Report[".googleLikeFields"][] = "Company";
$tdatacompany_Report[".googleLikeFields"][] = "Deal Slot";
$tdatacompany_Report[".googleLikeFields"][] = "IBC Date";
$tdatacompany_Report[".googleLikeFields"][] = "EL Date";
$tdatacompany_Report[".googleLikeFields"][] = "Project Name";
$tdatacompany_Report[".googleLikeFields"][] = "Status";
$tdatacompany_Report[".googleLikeFields"][] = "ID";
$tdatacompany_Report[".googleLikeFields"][] = "Deal Type";
$tdatacompany_Report[".googleLikeFields"][] = "Projected Fee";
$tdatacompany_Report[".googleLikeFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".googleLikeFields"][] = "Est. Close Date";
$tdatacompany_Report[".googleLikeFields"][] = "Primary Banker";
$tdatacompany_Report[".googleLikeFields"][] = "Practice Area";
$tdatacompany_Report[".googleLikeFields"][] = "Ownership Class";
$tdatacompany_Report[".googleLikeFields"][] = "Industry";
$tdatacompany_Report[".googleLikeFields"][] = "Referral Type";
$tdatacompany_Report[".googleLikeFields"][] = "Referral Source-Company";
$tdatacompany_Report[".googleLikeFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".googleLikeFields"][] = "Description";
$tdatacompany_Report[".googleLikeFields"][] = "Dead Date";
$tdatacompany_Report[".googleLikeFields"][] = "EL Expiration Date";
$tdatacompany_Report[".googleLikeFields"][] = "Engagment Fee";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Minimum";
$tdatacompany_Report[".googleLikeFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".googleLikeFields"][] = "Final Transaction Size";
$tdatacompany_Report[".googleLikeFields"][] = "Monthly Retainer";
$tdatacompany_Report[".googleLikeFields"][] = "Closed Date";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-1";
$tdatacompany_Report[".googleLikeFields"][] = "Team-1";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-2";
$tdatacompany_Report[".googleLikeFields"][] = "Team-2";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-3";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-4";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-5";
$tdatacompany_Report[".googleLikeFields"][] = "Team Split-6";
$tdatacompany_Report[".googleLikeFields"][] = "Team-3";
$tdatacompany_Report[".googleLikeFields"][] = "Team-4";
$tdatacompany_Report[".googleLikeFields"][] = "Team-5";
$tdatacompany_Report[".googleLikeFields"][] = "Team-6";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-1";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-2";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-3";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-4";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-5";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Split-6";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-1";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-2";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-3";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-4";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-5";
$tdatacompany_Report[".googleLikeFields"][] = "Fee To-6";
$tdatacompany_Report[".googleLikeFields"][] = "Enterpise Value";
$tdatacompany_Report[".googleLikeFields"][] = "Fee Details";
$tdatacompany_Report[".googleLikeFields"][] = "Split to Corporate";
$tdatacompany_Report[".googleLikeFields"][] = "Paul";
$tdatacompany_Report[".googleLikeFields"][] = "McBroom";


$tdatacompany_Report[".advSearchFields"][] = "Company";
$tdatacompany_Report[".advSearchFields"][] = "Deal Slot";
$tdatacompany_Report[".advSearchFields"][] = "IBC Date";
$tdatacompany_Report[".advSearchFields"][] = "EL Date";
$tdatacompany_Report[".advSearchFields"][] = "Project Name";
$tdatacompany_Report[".advSearchFields"][] = "Status";
$tdatacompany_Report[".advSearchFields"][] = "ID";
$tdatacompany_Report[".advSearchFields"][] = "Deal Type";
$tdatacompany_Report[".advSearchFields"][] = "Projected Fee";
$tdatacompany_Report[".advSearchFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".advSearchFields"][] = "Est. Close Date";
$tdatacompany_Report[".advSearchFields"][] = "Primary Banker";
$tdatacompany_Report[".advSearchFields"][] = "Practice Area";
$tdatacompany_Report[".advSearchFields"][] = "Ownership Class";
$tdatacompany_Report[".advSearchFields"][] = "Industry";
$tdatacompany_Report[".advSearchFields"][] = "Referral Type";
$tdatacompany_Report[".advSearchFields"][] = "Referral Source-Company";
$tdatacompany_Report[".advSearchFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".advSearchFields"][] = "Description";
$tdatacompany_Report[".advSearchFields"][] = "Dead Date";
$tdatacompany_Report[".advSearchFields"][] = "EL Expiration Date";
$tdatacompany_Report[".advSearchFields"][] = "Engagment Fee";
$tdatacompany_Report[".advSearchFields"][] = "Fee Minimum";
$tdatacompany_Report[".advSearchFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".advSearchFields"][] = "Final Transaction Size";
$tdatacompany_Report[".advSearchFields"][] = "Monthly Retainer";
$tdatacompany_Report[".advSearchFields"][] = "Closed Date";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-1";
$tdatacompany_Report[".advSearchFields"][] = "Team-1";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-2";
$tdatacompany_Report[".advSearchFields"][] = "Team-2";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-3";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-4";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-5";
$tdatacompany_Report[".advSearchFields"][] = "Team Split-6";
$tdatacompany_Report[".advSearchFields"][] = "Team-3";
$tdatacompany_Report[".advSearchFields"][] = "Team-4";
$tdatacompany_Report[".advSearchFields"][] = "Team-5";
$tdatacompany_Report[".advSearchFields"][] = "Team-6";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-1";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-2";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-3";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-4";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-5";
$tdatacompany_Report[".advSearchFields"][] = "Fee Split-6";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-1";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-2";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-3";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-4";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-5";
$tdatacompany_Report[".advSearchFields"][] = "Fee To-6";
$tdatacompany_Report[".advSearchFields"][] = "Enterpise Value";
$tdatacompany_Report[".advSearchFields"][] = "Fee Details";
$tdatacompany_Report[".advSearchFields"][] = "Split to Corporate";
$tdatacompany_Report[".advSearchFields"][] = "Paul";
$tdatacompany_Report[".advSearchFields"][] = "McBroom";

$tdatacompany_Report[".isTableType"] = "report";

	



// Access doesn't support subqueries from the same table as main




$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacompany_Report[".strOrderBy"] = $tstrOrderBy;

$tdatacompany_Report[".orderindexes"] = array();

$tdatacompany_Report[".sqlHead"] = "SELECT Company,  `Deal Slot`,  `IBC Date`,  `EL Date`,  `Project Name`,  Status,  ID,  `Deal Type`,  `Projected Fee`,  `Projected Transaction Size`,  `Est. Close Date`,  `Primary Banker`,  `Practice Area`,  `Ownership Class`,  Industry,  `Referral Type`,  `Referral Source-Company`,  `Referral Scource-Ind.`,  Description,  `Dead Date`,  `EL Expiration Date`,  `Engagment Fee`,  `Fee Minimum`,  `Final Total Sucess Fee`,  `Final Transaction Size`,  `Monthly Retainer`,  `Closed Date`,  `Team Split-1`,  `Team-1`,  `Team Split-2`,  `Team-2`,  `Team Split-3`,  `Team Split-4`,  `Team Split-5`,  `Team Split-6`,  `Team-3`,  `Team-4`,  `Team-5`,  `Team-6`,  `Fee Split-1`,  `Fee Split-2`,  `Fee Split-3`,  `Fee Split-4`,  `Fee Split-5`,  `Fee Split-6`,  `Fee To-1`,  `Fee To-2`,  `Fee To-3`,  `Fee To-4`,  `Fee To-5`,  `Fee To-6`,  `Enterpise Value`,  `Fee Details`,  `Split to Corporate`,  Paul,  McBroom";
$tdatacompany_Report[".sqlFrom"] = "FROM company";
$tdatacompany_Report[".sqlWhereExpr"] = "";
$tdatacompany_Report[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacompany_Report[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacompany_Report[".arrGroupsPerPage"] = $arrGPP;

$tableKeyscompany_Report = array();
$tableKeyscompany_Report[] = "ID";
$tdatacompany_Report[".Keys"] = $tableKeyscompany_Report;

$tdatacompany_Report[".listFields"] = array();
$tdatacompany_Report[".listFields"][] = "Company";
$tdatacompany_Report[".listFields"][] = "Deal Slot";
$tdatacompany_Report[".listFields"][] = "IBC Date";
$tdatacompany_Report[".listFields"][] = "EL Date";
$tdatacompany_Report[".listFields"][] = "Project Name";
$tdatacompany_Report[".listFields"][] = "Status";
$tdatacompany_Report[".listFields"][] = "ID";
$tdatacompany_Report[".listFields"][] = "Deal Type";
$tdatacompany_Report[".listFields"][] = "Projected Fee";
$tdatacompany_Report[".listFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".listFields"][] = "Est. Close Date";
$tdatacompany_Report[".listFields"][] = "Primary Banker";
$tdatacompany_Report[".listFields"][] = "Practice Area";
$tdatacompany_Report[".listFields"][] = "Ownership Class";
$tdatacompany_Report[".listFields"][] = "Industry";
$tdatacompany_Report[".listFields"][] = "Referral Type";
$tdatacompany_Report[".listFields"][] = "Referral Source-Company";
$tdatacompany_Report[".listFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".listFields"][] = "Description";
$tdatacompany_Report[".listFields"][] = "Dead Date";
$tdatacompany_Report[".listFields"][] = "EL Expiration Date";
$tdatacompany_Report[".listFields"][] = "Engagment Fee";
$tdatacompany_Report[".listFields"][] = "Fee Minimum";
$tdatacompany_Report[".listFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".listFields"][] = "Final Transaction Size";
$tdatacompany_Report[".listFields"][] = "Monthly Retainer";
$tdatacompany_Report[".listFields"][] = "Closed Date";
$tdatacompany_Report[".listFields"][] = "Team Split-1";
$tdatacompany_Report[".listFields"][] = "Team-1";
$tdatacompany_Report[".listFields"][] = "Team Split-2";
$tdatacompany_Report[".listFields"][] = "Team-2";
$tdatacompany_Report[".listFields"][] = "Team Split-3";
$tdatacompany_Report[".listFields"][] = "Team Split-4";
$tdatacompany_Report[".listFields"][] = "Team Split-5";
$tdatacompany_Report[".listFields"][] = "Team Split-6";
$tdatacompany_Report[".listFields"][] = "Team-3";
$tdatacompany_Report[".listFields"][] = "Team-4";
$tdatacompany_Report[".listFields"][] = "Team-5";
$tdatacompany_Report[".listFields"][] = "Team-6";
$tdatacompany_Report[".listFields"][] = "Fee Split-1";
$tdatacompany_Report[".listFields"][] = "Fee Split-2";
$tdatacompany_Report[".listFields"][] = "Fee Split-3";
$tdatacompany_Report[".listFields"][] = "Fee Split-4";
$tdatacompany_Report[".listFields"][] = "Fee Split-5";
$tdatacompany_Report[".listFields"][] = "Fee Split-6";
$tdatacompany_Report[".listFields"][] = "Fee To-1";
$tdatacompany_Report[".listFields"][] = "Fee To-2";
$tdatacompany_Report[".listFields"][] = "Fee To-3";
$tdatacompany_Report[".listFields"][] = "Fee To-4";
$tdatacompany_Report[".listFields"][] = "Fee To-5";
$tdatacompany_Report[".listFields"][] = "Fee To-6";
$tdatacompany_Report[".listFields"][] = "Enterpise Value";
$tdatacompany_Report[".listFields"][] = "Fee Details";
$tdatacompany_Report[".listFields"][] = "Split to Corporate";
$tdatacompany_Report[".listFields"][] = "Paul";
$tdatacompany_Report[".listFields"][] = "McBroom";

$tdatacompany_Report[".viewFields"] = array();
$tdatacompany_Report[".viewFields"][] = "Company";
$tdatacompany_Report[".viewFields"][] = "Deal Slot";
$tdatacompany_Report[".viewFields"][] = "IBC Date";
$tdatacompany_Report[".viewFields"][] = "EL Date";
$tdatacompany_Report[".viewFields"][] = "Project Name";
$tdatacompany_Report[".viewFields"][] = "Status";
$tdatacompany_Report[".viewFields"][] = "ID";
$tdatacompany_Report[".viewFields"][] = "Deal Type";
$tdatacompany_Report[".viewFields"][] = "Projected Fee";
$tdatacompany_Report[".viewFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".viewFields"][] = "Est. Close Date";
$tdatacompany_Report[".viewFields"][] = "Primary Banker";
$tdatacompany_Report[".viewFields"][] = "Practice Area";
$tdatacompany_Report[".viewFields"][] = "Ownership Class";
$tdatacompany_Report[".viewFields"][] = "Industry";
$tdatacompany_Report[".viewFields"][] = "Referral Type";
$tdatacompany_Report[".viewFields"][] = "Referral Source-Company";
$tdatacompany_Report[".viewFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".viewFields"][] = "Description";
$tdatacompany_Report[".viewFields"][] = "Dead Date";
$tdatacompany_Report[".viewFields"][] = "EL Expiration Date";
$tdatacompany_Report[".viewFields"][] = "Engagment Fee";
$tdatacompany_Report[".viewFields"][] = "Fee Minimum";
$tdatacompany_Report[".viewFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".viewFields"][] = "Final Transaction Size";
$tdatacompany_Report[".viewFields"][] = "Monthly Retainer";
$tdatacompany_Report[".viewFields"][] = "Closed Date";
$tdatacompany_Report[".viewFields"][] = "Team Split-1";
$tdatacompany_Report[".viewFields"][] = "Team-1";
$tdatacompany_Report[".viewFields"][] = "Team Split-2";
$tdatacompany_Report[".viewFields"][] = "Team-2";
$tdatacompany_Report[".viewFields"][] = "Team Split-3";
$tdatacompany_Report[".viewFields"][] = "Team Split-4";
$tdatacompany_Report[".viewFields"][] = "Team Split-5";
$tdatacompany_Report[".viewFields"][] = "Team Split-6";
$tdatacompany_Report[".viewFields"][] = "Team-3";
$tdatacompany_Report[".viewFields"][] = "Team-4";
$tdatacompany_Report[".viewFields"][] = "Team-5";
$tdatacompany_Report[".viewFields"][] = "Team-6";
$tdatacompany_Report[".viewFields"][] = "Fee Split-1";
$tdatacompany_Report[".viewFields"][] = "Fee Split-2";
$tdatacompany_Report[".viewFields"][] = "Fee Split-3";
$tdatacompany_Report[".viewFields"][] = "Fee Split-4";
$tdatacompany_Report[".viewFields"][] = "Fee Split-5";
$tdatacompany_Report[".viewFields"][] = "Fee Split-6";
$tdatacompany_Report[".viewFields"][] = "Fee To-1";
$tdatacompany_Report[".viewFields"][] = "Fee To-2";
$tdatacompany_Report[".viewFields"][] = "Fee To-3";
$tdatacompany_Report[".viewFields"][] = "Fee To-4";
$tdatacompany_Report[".viewFields"][] = "Fee To-5";
$tdatacompany_Report[".viewFields"][] = "Fee To-6";
$tdatacompany_Report[".viewFields"][] = "Enterpise Value";
$tdatacompany_Report[".viewFields"][] = "Fee Details";
$tdatacompany_Report[".viewFields"][] = "Split to Corporate";
$tdatacompany_Report[".viewFields"][] = "Paul";
$tdatacompany_Report[".viewFields"][] = "McBroom";

$tdatacompany_Report[".addFields"] = array();
$tdatacompany_Report[".addFields"][] = "Company";
$tdatacompany_Report[".addFields"][] = "Deal Slot";
$tdatacompany_Report[".addFields"][] = "IBC Date";
$tdatacompany_Report[".addFields"][] = "EL Date";
$tdatacompany_Report[".addFields"][] = "Project Name";
$tdatacompany_Report[".addFields"][] = "Status";
$tdatacompany_Report[".addFields"][] = "Deal Type";
$tdatacompany_Report[".addFields"][] = "Projected Fee";
$tdatacompany_Report[".addFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".addFields"][] = "Est. Close Date";
$tdatacompany_Report[".addFields"][] = "Primary Banker";
$tdatacompany_Report[".addFields"][] = "Practice Area";
$tdatacompany_Report[".addFields"][] = "Ownership Class";
$tdatacompany_Report[".addFields"][] = "Industry";
$tdatacompany_Report[".addFields"][] = "Referral Type";
$tdatacompany_Report[".addFields"][] = "Referral Source-Company";
$tdatacompany_Report[".addFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".addFields"][] = "Description";
$tdatacompany_Report[".addFields"][] = "Dead Date";
$tdatacompany_Report[".addFields"][] = "EL Expiration Date";
$tdatacompany_Report[".addFields"][] = "Engagment Fee";
$tdatacompany_Report[".addFields"][] = "Fee Minimum";
$tdatacompany_Report[".addFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".addFields"][] = "Final Transaction Size";
$tdatacompany_Report[".addFields"][] = "Monthly Retainer";
$tdatacompany_Report[".addFields"][] = "Closed Date";
$tdatacompany_Report[".addFields"][] = "Team Split-1";
$tdatacompany_Report[".addFields"][] = "Team-1";
$tdatacompany_Report[".addFields"][] = "Team Split-2";
$tdatacompany_Report[".addFields"][] = "Team-2";
$tdatacompany_Report[".addFields"][] = "Team Split-3";
$tdatacompany_Report[".addFields"][] = "Team Split-4";
$tdatacompany_Report[".addFields"][] = "Team Split-5";
$tdatacompany_Report[".addFields"][] = "Team Split-6";
$tdatacompany_Report[".addFields"][] = "Team-3";
$tdatacompany_Report[".addFields"][] = "Team-4";
$tdatacompany_Report[".addFields"][] = "Team-5";
$tdatacompany_Report[".addFields"][] = "Team-6";
$tdatacompany_Report[".addFields"][] = "Fee Split-1";
$tdatacompany_Report[".addFields"][] = "Fee Split-2";
$tdatacompany_Report[".addFields"][] = "Fee Split-3";
$tdatacompany_Report[".addFields"][] = "Fee Split-4";
$tdatacompany_Report[".addFields"][] = "Fee Split-5";
$tdatacompany_Report[".addFields"][] = "Fee Split-6";
$tdatacompany_Report[".addFields"][] = "Fee To-1";
$tdatacompany_Report[".addFields"][] = "Fee To-2";
$tdatacompany_Report[".addFields"][] = "Fee To-3";
$tdatacompany_Report[".addFields"][] = "Fee To-4";
$tdatacompany_Report[".addFields"][] = "Fee To-5";
$tdatacompany_Report[".addFields"][] = "Fee To-6";
$tdatacompany_Report[".addFields"][] = "Enterpise Value";
$tdatacompany_Report[".addFields"][] = "Fee Details";
$tdatacompany_Report[".addFields"][] = "Split to Corporate";
$tdatacompany_Report[".addFields"][] = "Paul";
$tdatacompany_Report[".addFields"][] = "McBroom";

$tdatacompany_Report[".inlineAddFields"] = array();
$tdatacompany_Report[".inlineAddFields"][] = "Company";
$tdatacompany_Report[".inlineAddFields"][] = "Deal Slot";
$tdatacompany_Report[".inlineAddFields"][] = "IBC Date";
$tdatacompany_Report[".inlineAddFields"][] = "EL Date";
$tdatacompany_Report[".inlineAddFields"][] = "Project Name";
$tdatacompany_Report[".inlineAddFields"][] = "Status";
$tdatacompany_Report[".inlineAddFields"][] = "Deal Type";
$tdatacompany_Report[".inlineAddFields"][] = "Projected Fee";
$tdatacompany_Report[".inlineAddFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".inlineAddFields"][] = "Est. Close Date";
$tdatacompany_Report[".inlineAddFields"][] = "Primary Banker";
$tdatacompany_Report[".inlineAddFields"][] = "Practice Area";
$tdatacompany_Report[".inlineAddFields"][] = "Ownership Class";
$tdatacompany_Report[".inlineAddFields"][] = "Industry";
$tdatacompany_Report[".inlineAddFields"][] = "Referral Type";
$tdatacompany_Report[".inlineAddFields"][] = "Referral Source-Company";
$tdatacompany_Report[".inlineAddFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".inlineAddFields"][] = "Description";
$tdatacompany_Report[".inlineAddFields"][] = "Dead Date";
$tdatacompany_Report[".inlineAddFields"][] = "EL Expiration Date";
$tdatacompany_Report[".inlineAddFields"][] = "Engagment Fee";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Minimum";
$tdatacompany_Report[".inlineAddFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".inlineAddFields"][] = "Final Transaction Size";
$tdatacompany_Report[".inlineAddFields"][] = "Monthly Retainer";
$tdatacompany_Report[".inlineAddFields"][] = "Closed Date";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-1";
$tdatacompany_Report[".inlineAddFields"][] = "Team-1";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-2";
$tdatacompany_Report[".inlineAddFields"][] = "Team-2";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-3";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-4";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-5";
$tdatacompany_Report[".inlineAddFields"][] = "Team Split-6";
$tdatacompany_Report[".inlineAddFields"][] = "Team-3";
$tdatacompany_Report[".inlineAddFields"][] = "Team-4";
$tdatacompany_Report[".inlineAddFields"][] = "Team-5";
$tdatacompany_Report[".inlineAddFields"][] = "Team-6";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-1";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-2";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-3";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-4";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-5";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Split-6";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-1";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-2";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-3";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-4";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-5";
$tdatacompany_Report[".inlineAddFields"][] = "Fee To-6";
$tdatacompany_Report[".inlineAddFields"][] = "Enterpise Value";
$tdatacompany_Report[".inlineAddFields"][] = "Fee Details";
$tdatacompany_Report[".inlineAddFields"][] = "Split to Corporate";
$tdatacompany_Report[".inlineAddFields"][] = "Paul";
$tdatacompany_Report[".inlineAddFields"][] = "McBroom";

$tdatacompany_Report[".editFields"] = array();
$tdatacompany_Report[".editFields"][] = "Company";
$tdatacompany_Report[".editFields"][] = "Deal Slot";
$tdatacompany_Report[".editFields"][] = "IBC Date";
$tdatacompany_Report[".editFields"][] = "EL Date";
$tdatacompany_Report[".editFields"][] = "Project Name";
$tdatacompany_Report[".editFields"][] = "Status";
$tdatacompany_Report[".editFields"][] = "Deal Type";
$tdatacompany_Report[".editFields"][] = "Projected Fee";
$tdatacompany_Report[".editFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".editFields"][] = "Est. Close Date";
$tdatacompany_Report[".editFields"][] = "Primary Banker";
$tdatacompany_Report[".editFields"][] = "Practice Area";
$tdatacompany_Report[".editFields"][] = "Ownership Class";
$tdatacompany_Report[".editFields"][] = "Industry";
$tdatacompany_Report[".editFields"][] = "Referral Type";
$tdatacompany_Report[".editFields"][] = "Referral Source-Company";
$tdatacompany_Report[".editFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".editFields"][] = "Description";
$tdatacompany_Report[".editFields"][] = "Dead Date";
$tdatacompany_Report[".editFields"][] = "EL Expiration Date";
$tdatacompany_Report[".editFields"][] = "Engagment Fee";
$tdatacompany_Report[".editFields"][] = "Fee Minimum";
$tdatacompany_Report[".editFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".editFields"][] = "Final Transaction Size";
$tdatacompany_Report[".editFields"][] = "Monthly Retainer";
$tdatacompany_Report[".editFields"][] = "Closed Date";
$tdatacompany_Report[".editFields"][] = "Team Split-1";
$tdatacompany_Report[".editFields"][] = "Team-1";
$tdatacompany_Report[".editFields"][] = "Team Split-2";
$tdatacompany_Report[".editFields"][] = "Team-2";
$tdatacompany_Report[".editFields"][] = "Team Split-3";
$tdatacompany_Report[".editFields"][] = "Team Split-4";
$tdatacompany_Report[".editFields"][] = "Team Split-5";
$tdatacompany_Report[".editFields"][] = "Team Split-6";
$tdatacompany_Report[".editFields"][] = "Team-3";
$tdatacompany_Report[".editFields"][] = "Team-4";
$tdatacompany_Report[".editFields"][] = "Team-5";
$tdatacompany_Report[".editFields"][] = "Team-6";
$tdatacompany_Report[".editFields"][] = "Fee Split-1";
$tdatacompany_Report[".editFields"][] = "Fee Split-2";
$tdatacompany_Report[".editFields"][] = "Fee Split-3";
$tdatacompany_Report[".editFields"][] = "Fee Split-4";
$tdatacompany_Report[".editFields"][] = "Fee Split-5";
$tdatacompany_Report[".editFields"][] = "Fee Split-6";
$tdatacompany_Report[".editFields"][] = "Fee To-1";
$tdatacompany_Report[".editFields"][] = "Fee To-2";
$tdatacompany_Report[".editFields"][] = "Fee To-3";
$tdatacompany_Report[".editFields"][] = "Fee To-4";
$tdatacompany_Report[".editFields"][] = "Fee To-5";
$tdatacompany_Report[".editFields"][] = "Fee To-6";
$tdatacompany_Report[".editFields"][] = "Enterpise Value";
$tdatacompany_Report[".editFields"][] = "Fee Details";
$tdatacompany_Report[".editFields"][] = "Split to Corporate";
$tdatacompany_Report[".editFields"][] = "Paul";
$tdatacompany_Report[".editFields"][] = "McBroom";

$tdatacompany_Report[".inlineEditFields"] = array();
$tdatacompany_Report[".inlineEditFields"][] = "Company";
$tdatacompany_Report[".inlineEditFields"][] = "Deal Slot";
$tdatacompany_Report[".inlineEditFields"][] = "IBC Date";
$tdatacompany_Report[".inlineEditFields"][] = "EL Date";
$tdatacompany_Report[".inlineEditFields"][] = "Project Name";
$tdatacompany_Report[".inlineEditFields"][] = "Status";
$tdatacompany_Report[".inlineEditFields"][] = "Deal Type";
$tdatacompany_Report[".inlineEditFields"][] = "Projected Fee";
$tdatacompany_Report[".inlineEditFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".inlineEditFields"][] = "Est. Close Date";
$tdatacompany_Report[".inlineEditFields"][] = "Primary Banker";
$tdatacompany_Report[".inlineEditFields"][] = "Practice Area";
$tdatacompany_Report[".inlineEditFields"][] = "Ownership Class";
$tdatacompany_Report[".inlineEditFields"][] = "Industry";
$tdatacompany_Report[".inlineEditFields"][] = "Referral Type";
$tdatacompany_Report[".inlineEditFields"][] = "Referral Source-Company";
$tdatacompany_Report[".inlineEditFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".inlineEditFields"][] = "Description";
$tdatacompany_Report[".inlineEditFields"][] = "Dead Date";
$tdatacompany_Report[".inlineEditFields"][] = "EL Expiration Date";
$tdatacompany_Report[".inlineEditFields"][] = "Engagment Fee";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Minimum";
$tdatacompany_Report[".inlineEditFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".inlineEditFields"][] = "Final Transaction Size";
$tdatacompany_Report[".inlineEditFields"][] = "Monthly Retainer";
$tdatacompany_Report[".inlineEditFields"][] = "Closed Date";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-1";
$tdatacompany_Report[".inlineEditFields"][] = "Team-1";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-2";
$tdatacompany_Report[".inlineEditFields"][] = "Team-2";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-3";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-4";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-5";
$tdatacompany_Report[".inlineEditFields"][] = "Team Split-6";
$tdatacompany_Report[".inlineEditFields"][] = "Team-3";
$tdatacompany_Report[".inlineEditFields"][] = "Team-4";
$tdatacompany_Report[".inlineEditFields"][] = "Team-5";
$tdatacompany_Report[".inlineEditFields"][] = "Team-6";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-1";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-2";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-3";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-4";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-5";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Split-6";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-1";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-2";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-3";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-4";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-5";
$tdatacompany_Report[".inlineEditFields"][] = "Fee To-6";
$tdatacompany_Report[".inlineEditFields"][] = "Enterpise Value";
$tdatacompany_Report[".inlineEditFields"][] = "Fee Details";
$tdatacompany_Report[".inlineEditFields"][] = "Split to Corporate";
$tdatacompany_Report[".inlineEditFields"][] = "Paul";
$tdatacompany_Report[".inlineEditFields"][] = "McBroom";

$tdatacompany_Report[".exportFields"] = array();
$tdatacompany_Report[".exportFields"][] = "Company";
$tdatacompany_Report[".exportFields"][] = "Deal Slot";
$tdatacompany_Report[".exportFields"][] = "IBC Date";
$tdatacompany_Report[".exportFields"][] = "EL Date";
$tdatacompany_Report[".exportFields"][] = "Project Name";
$tdatacompany_Report[".exportFields"][] = "Status";
$tdatacompany_Report[".exportFields"][] = "ID";
$tdatacompany_Report[".exportFields"][] = "Deal Type";
$tdatacompany_Report[".exportFields"][] = "Projected Fee";
$tdatacompany_Report[".exportFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".exportFields"][] = "Est. Close Date";
$tdatacompany_Report[".exportFields"][] = "Primary Banker";
$tdatacompany_Report[".exportFields"][] = "Practice Area";
$tdatacompany_Report[".exportFields"][] = "Ownership Class";
$tdatacompany_Report[".exportFields"][] = "Industry";
$tdatacompany_Report[".exportFields"][] = "Referral Type";
$tdatacompany_Report[".exportFields"][] = "Referral Source-Company";
$tdatacompany_Report[".exportFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".exportFields"][] = "Description";
$tdatacompany_Report[".exportFields"][] = "Dead Date";
$tdatacompany_Report[".exportFields"][] = "EL Expiration Date";
$tdatacompany_Report[".exportFields"][] = "Engagment Fee";
$tdatacompany_Report[".exportFields"][] = "Fee Minimum";
$tdatacompany_Report[".exportFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".exportFields"][] = "Final Transaction Size";
$tdatacompany_Report[".exportFields"][] = "Monthly Retainer";
$tdatacompany_Report[".exportFields"][] = "Closed Date";
$tdatacompany_Report[".exportFields"][] = "Team Split-1";
$tdatacompany_Report[".exportFields"][] = "Team-1";
$tdatacompany_Report[".exportFields"][] = "Team Split-2";
$tdatacompany_Report[".exportFields"][] = "Team-2";
$tdatacompany_Report[".exportFields"][] = "Team Split-3";
$tdatacompany_Report[".exportFields"][] = "Team Split-4";
$tdatacompany_Report[".exportFields"][] = "Team Split-5";
$tdatacompany_Report[".exportFields"][] = "Team Split-6";
$tdatacompany_Report[".exportFields"][] = "Team-3";
$tdatacompany_Report[".exportFields"][] = "Team-4";
$tdatacompany_Report[".exportFields"][] = "Team-5";
$tdatacompany_Report[".exportFields"][] = "Team-6";
$tdatacompany_Report[".exportFields"][] = "Fee Split-1";
$tdatacompany_Report[".exportFields"][] = "Fee Split-2";
$tdatacompany_Report[".exportFields"][] = "Fee Split-3";
$tdatacompany_Report[".exportFields"][] = "Fee Split-4";
$tdatacompany_Report[".exportFields"][] = "Fee Split-5";
$tdatacompany_Report[".exportFields"][] = "Fee Split-6";
$tdatacompany_Report[".exportFields"][] = "Fee To-1";
$tdatacompany_Report[".exportFields"][] = "Fee To-2";
$tdatacompany_Report[".exportFields"][] = "Fee To-3";
$tdatacompany_Report[".exportFields"][] = "Fee To-4";
$tdatacompany_Report[".exportFields"][] = "Fee To-5";
$tdatacompany_Report[".exportFields"][] = "Fee To-6";
$tdatacompany_Report[".exportFields"][] = "Enterpise Value";
$tdatacompany_Report[".exportFields"][] = "Fee Details";
$tdatacompany_Report[".exportFields"][] = "Split to Corporate";
$tdatacompany_Report[".exportFields"][] = "Paul";
$tdatacompany_Report[".exportFields"][] = "McBroom";

$tdatacompany_Report[".printFields"] = array();
$tdatacompany_Report[".printFields"][] = "Company";
$tdatacompany_Report[".printFields"][] = "Deal Slot";
$tdatacompany_Report[".printFields"][] = "IBC Date";
$tdatacompany_Report[".printFields"][] = "EL Date";
$tdatacompany_Report[".printFields"][] = "Project Name";
$tdatacompany_Report[".printFields"][] = "Status";
$tdatacompany_Report[".printFields"][] = "ID";
$tdatacompany_Report[".printFields"][] = "Deal Type";
$tdatacompany_Report[".printFields"][] = "Projected Fee";
$tdatacompany_Report[".printFields"][] = "Projected Transaction Size";
$tdatacompany_Report[".printFields"][] = "Est. Close Date";
$tdatacompany_Report[".printFields"][] = "Primary Banker";
$tdatacompany_Report[".printFields"][] = "Practice Area";
$tdatacompany_Report[".printFields"][] = "Ownership Class";
$tdatacompany_Report[".printFields"][] = "Industry";
$tdatacompany_Report[".printFields"][] = "Referral Type";
$tdatacompany_Report[".printFields"][] = "Referral Source-Company";
$tdatacompany_Report[".printFields"][] = "Referral Scource-Ind.";
$tdatacompany_Report[".printFields"][] = "Description";
$tdatacompany_Report[".printFields"][] = "Dead Date";
$tdatacompany_Report[".printFields"][] = "EL Expiration Date";
$tdatacompany_Report[".printFields"][] = "Engagment Fee";
$tdatacompany_Report[".printFields"][] = "Fee Minimum";
$tdatacompany_Report[".printFields"][] = "Final Total Sucess Fee";
$tdatacompany_Report[".printFields"][] = "Final Transaction Size";
$tdatacompany_Report[".printFields"][] = "Monthly Retainer";
$tdatacompany_Report[".printFields"][] = "Closed Date";
$tdatacompany_Report[".printFields"][] = "Team Split-1";
$tdatacompany_Report[".printFields"][] = "Team-1";
$tdatacompany_Report[".printFields"][] = "Team Split-2";
$tdatacompany_Report[".printFields"][] = "Team-2";
$tdatacompany_Report[".printFields"][] = "Team Split-3";
$tdatacompany_Report[".printFields"][] = "Team Split-4";
$tdatacompany_Report[".printFields"][] = "Team Split-5";
$tdatacompany_Report[".printFields"][] = "Team Split-6";
$tdatacompany_Report[".printFields"][] = "Team-3";
$tdatacompany_Report[".printFields"][] = "Team-4";
$tdatacompany_Report[".printFields"][] = "Team-5";
$tdatacompany_Report[".printFields"][] = "Team-6";
$tdatacompany_Report[".printFields"][] = "Fee Split-1";
$tdatacompany_Report[".printFields"][] = "Fee Split-2";
$tdatacompany_Report[".printFields"][] = "Fee Split-3";
$tdatacompany_Report[".printFields"][] = "Fee Split-4";
$tdatacompany_Report[".printFields"][] = "Fee Split-5";
$tdatacompany_Report[".printFields"][] = "Fee Split-6";
$tdatacompany_Report[".printFields"][] = "Fee To-1";
$tdatacompany_Report[".printFields"][] = "Fee To-2";
$tdatacompany_Report[".printFields"][] = "Fee To-3";
$tdatacompany_Report[".printFields"][] = "Fee To-4";
$tdatacompany_Report[".printFields"][] = "Fee To-5";
$tdatacompany_Report[".printFields"][] = "Fee To-6";
$tdatacompany_Report[".printFields"][] = "Enterpise Value";
$tdatacompany_Report[".printFields"][] = "Fee Details";
$tdatacompany_Report[".printFields"][] = "Split to Corporate";
$tdatacompany_Report[".printFields"][] = "Paul";
$tdatacompany_Report[".printFields"][] = "McBroom";

//	Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Company";
	$fdata["GoodName"] = "Company";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Company"; 
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
	
		$fdata["strField"] = "Company"; 
		$fdata["FullName"] = "Company";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Company"] = $fdata;
//	Deal Slot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Deal Slot";
	$fdata["GoodName"] = "Deal_Slot";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Deal Slot"; 
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
	
		$fdata["strField"] = "Deal Slot"; 
		$fdata["FullName"] = "`Deal Slot`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Deal Slot"] = $fdata;
//	IBC Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "IBC Date";
	$fdata["GoodName"] = "IBC_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "IBC Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "IBC Date"; 
		$fdata["FullName"] = "`IBC Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["IBC Date"] = $fdata;
//	EL Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "EL Date";
	$fdata["GoodName"] = "EL_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "EL Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EL Date"; 
		$fdata["FullName"] = "`EL Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["EL Date"] = $fdata;
//	Project Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Project Name";
	$fdata["GoodName"] = "Project_Name";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Project Name"; 
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
	
		$fdata["strField"] = "Project Name"; 
		$fdata["FullName"] = "`Project Name`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Project Name"] = $fdata;
//	Status
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "Status";
	$fdata["GoodName"] = "Status";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Status"; 
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
	
		$fdata["strField"] = "Status"; 
		$fdata["FullName"] = "Status";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Status"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "company";
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
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["ID"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "Deal Type";
	$fdata["GoodName"] = "Deal_Type";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Deal Type"; 
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
	
		$fdata["strField"] = "Deal Type"; 
		$fdata["FullName"] = "`Deal Type`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Deal Type"] = $fdata;
//	Projected Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "Projected Fee";
	$fdata["GoodName"] = "Projected_Fee";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Projected Fee"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Projected Fee"; 
		$fdata["FullName"] = "`Projected Fee`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Projected Fee"] = $fdata;
//	Projected Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "Projected Transaction Size";
	$fdata["GoodName"] = "Projected_Transaction_Size";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Projected Transaction Size"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Projected Transaction Size"; 
		$fdata["FullName"] = "`Projected Transaction Size`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Projected Transaction Size"] = $fdata;
//	Est. Close Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "Est. Close Date";
	$fdata["GoodName"] = "Est__Close_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Est. Close Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Est. Close Date"; 
		$fdata["FullName"] = "`Est. Close Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Est. Close Date"] = $fdata;
//	Primary Banker
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "Primary Banker";
	$fdata["GoodName"] = "Primary_Banker";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Primary Banker"; 
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
	
		$fdata["strField"] = "Primary Banker"; 
		$fdata["FullName"] = "`Primary Banker`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Primary Banker"] = $fdata;
//	Practice Area
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "Practice Area";
	$fdata["GoodName"] = "Practice_Area";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Practice Area"; 
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
	
		$fdata["strField"] = "Practice Area"; 
		$fdata["FullName"] = "`Practice Area`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=250";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Practice Area"] = $fdata;
//	Ownership Class
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "Ownership Class";
	$fdata["GoodName"] = "Ownership_Class";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Ownership Class"; 
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
	
		$fdata["strField"] = "Ownership Class"; 
		$fdata["FullName"] = "`Ownership Class`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Ownership Class"] = $fdata;
//	Industry
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "Industry";
	$fdata["GoodName"] = "Industry";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Industry"; 
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
	
		$fdata["strField"] = "Industry"; 
		$fdata["FullName"] = "Industry";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=500";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Industry"] = $fdata;
//	Referral Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "Referral Type";
	$fdata["GoodName"] = "Referral_Type";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Referral Type"; 
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
	
		$fdata["strField"] = "Referral Type"; 
		$fdata["FullName"] = "`Referral Type`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Referral Type"] = $fdata;
//	Referral Source-Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "Referral Source-Company";
	$fdata["GoodName"] = "Referral_Source_Company";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Referral Source-Company"; 
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
	
		$fdata["strField"] = "Referral Source-Company"; 
		$fdata["FullName"] = "`Referral Source-Company`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Referral Source-Company"] = $fdata;
//	Referral Scource-Ind.
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "Referral Scource-Ind.";
	$fdata["GoodName"] = "Referral_Scource_Ind_";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Referral Scource-Ind."; 
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
	
		$fdata["strField"] = "Referral Scource-Ind."; 
		$fdata["FullName"] = "`Referral Scource-Ind.`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Referral Scource-Ind."] = $fdata;
//	Description
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "Description";
	$fdata["GoodName"] = "Description";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Description"; 
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
	
		$fdata["strField"] = "Description"; 
		$fdata["FullName"] = "Description";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=2000";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Description"] = $fdata;
//	Dead Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "Dead Date";
	$fdata["GoodName"] = "Dead_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Dead Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Dead Date"; 
		$fdata["FullName"] = "`Dead Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Dead Date"] = $fdata;
//	EL Expiration Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "EL Expiration Date";
	$fdata["GoodName"] = "EL_Expiration_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "EL Expiration Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EL Expiration Date"; 
		$fdata["FullName"] = "`EL Expiration Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["EL Expiration Date"] = $fdata;
//	Engagment Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "Engagment Fee";
	$fdata["GoodName"] = "Engagment_Fee";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Engagment Fee"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Engagment Fee"; 
		$fdata["FullName"] = "`Engagment Fee`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Engagment Fee"] = $fdata;
//	Fee Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "Fee Minimum";
	$fdata["GoodName"] = "Fee_Minimum";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Minimum"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Minimum"; 
		$fdata["FullName"] = "`Fee Minimum`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Minimum"] = $fdata;
//	Final Total Sucess Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "Final Total Sucess Fee";
	$fdata["GoodName"] = "Final_Total_Sucess_Fee";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Final Total Sucess Fee"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Final Total Sucess Fee"; 
		$fdata["FullName"] = "`Final Total Sucess Fee`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Final Total Sucess Fee"] = $fdata;
//	Final Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "Final Transaction Size";
	$fdata["GoodName"] = "Final_Transaction_Size";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Final Transaction Size"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Final Transaction Size"; 
		$fdata["FullName"] = "`Final Transaction Size`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Final Transaction Size"] = $fdata;
//	Monthly Retainer
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "Monthly Retainer";
	$fdata["GoodName"] = "Monthly_Retainer";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Monthly Retainer"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Monthly Retainer"; 
		$fdata["FullName"] = "`Monthly Retainer`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Monthly Retainer"] = $fdata;
//	Closed Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "Closed Date";
	$fdata["GoodName"] = "Closed_Date";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Closed Date"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Closed Date"; 
		$fdata["FullName"] = "`Closed Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Closed Date"] = $fdata;
//	Team Split-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "Team Split-1";
	$fdata["GoodName"] = "Team_Split_1";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-1"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-1"; 
		$fdata["FullName"] = "`Team Split-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-1"] = $fdata;
//	Team-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "Team-1";
	$fdata["GoodName"] = "Team_1";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-1"; 
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
	
		$fdata["strField"] = "Team-1"; 
		$fdata["FullName"] = "`Team-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-1"] = $fdata;
//	Team Split-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "Team Split-2";
	$fdata["GoodName"] = "Team_Split_2";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-2"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-2"; 
		$fdata["FullName"] = "`Team Split-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-2"] = $fdata;
//	Team-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "Team-2";
	$fdata["GoodName"] = "Team_2";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-2"; 
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
	
		$fdata["strField"] = "Team-2"; 
		$fdata["FullName"] = "`Team-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-2"] = $fdata;
//	Team Split-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "Team Split-3";
	$fdata["GoodName"] = "Team_Split_3";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-3"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-3"; 
		$fdata["FullName"] = "`Team Split-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-3"] = $fdata;
//	Team Split-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "Team Split-4";
	$fdata["GoodName"] = "Team_Split_4";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-4"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-4"; 
		$fdata["FullName"] = "`Team Split-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-4"] = $fdata;
//	Team Split-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "Team Split-5";
	$fdata["GoodName"] = "Team_Split_5";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-5"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-5"; 
		$fdata["FullName"] = "`Team Split-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-5"] = $fdata;
//	Team Split-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "Team Split-6";
	$fdata["GoodName"] = "Team_Split_6";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team Split-6"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Team Split-6"; 
		$fdata["FullName"] = "`Team Split-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team Split-6"] = $fdata;
//	Team-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "Team-3";
	$fdata["GoodName"] = "Team_3";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-3"; 
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
	
		$fdata["strField"] = "Team-3"; 
		$fdata["FullName"] = "`Team-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-3"] = $fdata;
//	Team-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "Team-4";
	$fdata["GoodName"] = "Team_4";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-4"; 
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
	
		$fdata["strField"] = "Team-4"; 
		$fdata["FullName"] = "`Team-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-4"] = $fdata;
//	Team-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "Team-5";
	$fdata["GoodName"] = "Team_5";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-5"; 
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
	
		$fdata["strField"] = "Team-5"; 
		$fdata["FullName"] = "`Team-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-5"] = $fdata;
//	Team-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "Team-6";
	$fdata["GoodName"] = "Team_6";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Team-6"; 
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
	
		$fdata["strField"] = "Team-6"; 
		$fdata["FullName"] = "`Team-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Team-6"] = $fdata;
//	Fee Split-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "Fee Split-1";
	$fdata["GoodName"] = "Fee_Split_1";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-1"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-1"; 
		$fdata["FullName"] = "`Fee Split-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-1"] = $fdata;
//	Fee Split-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "Fee Split-2";
	$fdata["GoodName"] = "Fee_Split_2";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-2"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-2"; 
		$fdata["FullName"] = "`Fee Split-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-2"] = $fdata;
//	Fee Split-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "Fee Split-3";
	$fdata["GoodName"] = "Fee_Split_3";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-3"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-3"; 
		$fdata["FullName"] = "`Fee Split-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-3"] = $fdata;
//	Fee Split-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "Fee Split-4";
	$fdata["GoodName"] = "Fee_Split_4";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-4"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-4"; 
		$fdata["FullName"] = "`Fee Split-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-4"] = $fdata;
//	Fee Split-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "Fee Split-5";
	$fdata["GoodName"] = "Fee_Split_5";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-5"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-5"; 
		$fdata["FullName"] = "`Fee Split-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-5"] = $fdata;
//	Fee Split-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "Fee Split-6";
	$fdata["GoodName"] = "Fee_Split_6";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Split-6"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Fee Split-6"; 
		$fdata["FullName"] = "`Fee Split-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee Split-6"] = $fdata;
//	Fee To-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "Fee To-1";
	$fdata["GoodName"] = "Fee_To_1";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-1"; 
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
	
		$fdata["strField"] = "Fee To-1"; 
		$fdata["FullName"] = "`Fee To-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-1"] = $fdata;
//	Fee To-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "Fee To-2";
	$fdata["GoodName"] = "Fee_To_2";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-2"; 
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
	
		$fdata["strField"] = "Fee To-2"; 
		$fdata["FullName"] = "`Fee To-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-2"] = $fdata;
//	Fee To-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "Fee To-3";
	$fdata["GoodName"] = "Fee_To_3";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-3"; 
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
	
		$fdata["strField"] = "Fee To-3"; 
		$fdata["FullName"] = "`Fee To-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-3"] = $fdata;
//	Fee To-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "Fee To-4";
	$fdata["GoodName"] = "Fee_To_4";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-4"; 
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
	
		$fdata["strField"] = "Fee To-4"; 
		$fdata["FullName"] = "`Fee To-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-4"] = $fdata;
//	Fee To-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "Fee To-5";
	$fdata["GoodName"] = "Fee_To_5";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-5"; 
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
	
		$fdata["strField"] = "Fee To-5"; 
		$fdata["FullName"] = "`Fee To-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-5"] = $fdata;
//	Fee To-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "Fee To-6";
	$fdata["GoodName"] = "Fee_To_6";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee To-6"; 
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
	
		$fdata["strField"] = "Fee To-6"; 
		$fdata["FullName"] = "`Fee To-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Fee To-6"] = $fdata;
//	Enterpise Value
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "Enterpise Value";
	$fdata["GoodName"] = "Enterpise_Value";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Enterpise Value"; 
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
	
		$fdata["strField"] = "Enterpise Value"; 
		$fdata["FullName"] = "`Enterpise Value`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Enterpise Value"] = $fdata;
//	Fee Details
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "Fee Details";
	$fdata["GoodName"] = "Fee_Details";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Fee Details"; 
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
	
		$fdata["strField"] = "Fee Details"; 
		$fdata["FullName"] = "`Fee Details`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=2000";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany_Report["Fee Details"] = $fdata;
//	Split to Corporate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "Split to Corporate";
	$fdata["GoodName"] = "Split_to_Corporate";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Split to Corporate"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Split to Corporate"; 
		$fdata["FullName"] = "`Split to Corporate`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Split to Corporate"] = $fdata;
//	Paul
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "Paul";
	$fdata["GoodName"] = "Paul";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Paul"; 
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
	
		$fdata["strField"] = "Paul"; 
		$fdata["FullName"] = "Paul";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["Paul"] = $fdata;
//	McBroom
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "McBroom";
	$fdata["GoodName"] = "McBroom";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Mc Broom"; 
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
	
		$fdata["strField"] = "McBroom"; 
		$fdata["FullName"] = "McBroom";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["report"] = $vdata;
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
	
		
		
	$tdatacompany_Report["McBroom"] = $fdata;

	
$tables_data["company Report"]=&$tdatacompany_Report;
$field_labels["company_Report"] = &$fieldLabelscompany_Report;
$fieldToolTips["company Report"] = &$fieldToolTipscompany_Report;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["company Report"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["company Report"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_company_Report()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Company,  `Deal Slot`,  `IBC Date`,  `EL Date`,  `Project Name`,  Status,  ID,  `Deal Type`,  `Projected Fee`,  `Projected Transaction Size`,  `Est. Close Date`,  `Primary Banker`,  `Practice Area`,  `Ownership Class`,  Industry,  `Referral Type`,  `Referral Source-Company`,  `Referral Scource-Ind.`,  Description,  `Dead Date`,  `EL Expiration Date`,  `Engagment Fee`,  `Fee Minimum`,  `Final Total Sucess Fee`,  `Final Transaction Size`,  `Monthly Retainer`,  `Closed Date`,  `Team Split-1`,  `Team-1`,  `Team Split-2`,  `Team-2`,  `Team Split-3`,  `Team Split-4`,  `Team Split-5`,  `Team Split-6`,  `Team-3`,  `Team-4`,  `Team-5`,  `Team-6`,  `Fee Split-1`,  `Fee Split-2`,  `Fee Split-3`,  `Fee Split-4`,  `Fee Split-5`,  `Fee Split-6`,  `Fee To-1`,  `Fee To-2`,  `Fee To-3`,  `Fee To-4`,  `Fee To-5`,  `Fee To-6`,  `Enterpise Value`,  `Fee Details`,  `Split to Corporate`,  Paul,  McBroom";
$proto0["m_strFrom"] = "FROM company";
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
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC Date",
	"m_strTable" => "company"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Date",
	"m_strTable" => "company"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Project Name",
	"m_strTable" => "company"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "company"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Fee",
	"m_strTable" => "company"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "Est. Close Date",
	"m_strTable" => "company"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Practice Area",
	"m_strTable" => "company"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "Ownership Class",
	"m_strTable" => "company"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "Industry",
	"m_strTable" => "company"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Type",
	"m_strTable" => "company"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Source-Company",
	"m_strTable" => "company"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Scource-Ind.",
	"m_strTable" => "company"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "Description",
	"m_strTable" => "company"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "Dead Date",
	"m_strTable" => "company"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Expiration Date",
	"m_strTable" => "company"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "Engagment Fee",
	"m_strTable" => "company"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Minimum",
	"m_strTable" => "company"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "Final Total Sucess Fee",
	"m_strTable" => "company"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "Final Transaction Size",
	"m_strTable" => "company"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "Monthly Retainer",
	"m_strTable" => "company"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "Closed Date",
	"m_strTable" => "company"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-1",
	"m_strTable" => "company"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-1",
	"m_strTable" => "company"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-2",
	"m_strTable" => "company"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-2",
	"m_strTable" => "company"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-3",
	"m_strTable" => "company"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-4",
	"m_strTable" => "company"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-5",
	"m_strTable" => "company"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-6",
	"m_strTable" => "company"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-3",
	"m_strTable" => "company"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-4",
	"m_strTable" => "company"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-5",
	"m_strTable" => "company"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-6",
	"m_strTable" => "company"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-1",
	"m_strTable" => "company"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-2",
	"m_strTable" => "company"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-3",
	"m_strTable" => "company"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-4",
	"m_strTable" => "company"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-5",
	"m_strTable" => "company"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-6",
	"m_strTable" => "company"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-1",
	"m_strTable" => "company"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-2",
	"m_strTable" => "company"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-3",
	"m_strTable" => "company"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-4",
	"m_strTable" => "company"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-5",
	"m_strTable" => "company"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-6",
	"m_strTable" => "company"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "Enterpise Value",
	"m_strTable" => "company"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Details",
	"m_strTable" => "company"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "Split to Corporate",
	"m_strTable" => "company"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "Paul",
	"m_strTable" => "company"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "McBroom",
	"m_strTable" => "company"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto117=array();
$proto117["m_link"] = "SQLL_MAIN";
			$proto118=array();
$proto118["m_strName"] = "company";
$proto118["m_columns"] = array();
$proto118["m_columns"][] = "ID";
$proto118["m_columns"][] = "Company";
$proto118["m_columns"][] = "Deal Slot";
$proto118["m_columns"][] = "IBC Date";
$proto118["m_columns"][] = "EL Date";
$proto118["m_columns"][] = "Project Name";
$proto118["m_columns"][] = "Status";
$proto118["m_columns"][] = "Deal Type";
$proto118["m_columns"][] = "Projected Fee";
$proto118["m_columns"][] = "Projected Transaction Size";
$proto118["m_columns"][] = "Est. Close Date";
$proto118["m_columns"][] = "Primary Banker";
$proto118["m_columns"][] = "Practice Area";
$proto118["m_columns"][] = "Ownership Class";
$proto118["m_columns"][] = "Industry";
$proto118["m_columns"][] = "Referral Type";
$proto118["m_columns"][] = "Referral Source-Company";
$proto118["m_columns"][] = "Referral Scource-Ind.";
$proto118["m_columns"][] = "Description";
$proto118["m_columns"][] = "Dead Date";
$proto118["m_columns"][] = "EL Expiration Date";
$proto118["m_columns"][] = "Engagment Fee";
$proto118["m_columns"][] = "Fee Minimum";
$proto118["m_columns"][] = "Final Total Sucess Fee";
$proto118["m_columns"][] = "Final Transaction Size";
$proto118["m_columns"][] = "Monthly Retainer";
$proto118["m_columns"][] = "Closed Date";
$proto118["m_columns"][] = "Team Split-1";
$proto118["m_columns"][] = "Team-1";
$proto118["m_columns"][] = "Team Split-2";
$proto118["m_columns"][] = "Team-2";
$proto118["m_columns"][] = "Team Split-3";
$proto118["m_columns"][] = "Team Split-4";
$proto118["m_columns"][] = "Team Split-5";
$proto118["m_columns"][] = "Team Split-6";
$proto118["m_columns"][] = "Team-3";
$proto118["m_columns"][] = "Team-4";
$proto118["m_columns"][] = "Team-5";
$proto118["m_columns"][] = "Team-6";
$proto118["m_columns"][] = "Fee Split-1";
$proto118["m_columns"][] = "Fee Split-2";
$proto118["m_columns"][] = "Fee Split-3";
$proto118["m_columns"][] = "Fee Split-4";
$proto118["m_columns"][] = "Fee Split-5";
$proto118["m_columns"][] = "Fee Split-6";
$proto118["m_columns"][] = "Fee To-1";
$proto118["m_columns"][] = "Fee To-2";
$proto118["m_columns"][] = "Fee To-3";
$proto118["m_columns"][] = "Fee To-4";
$proto118["m_columns"][] = "Fee To-5";
$proto118["m_columns"][] = "Fee To-6";
$proto118["m_columns"][] = "Enterpise Value";
$proto118["m_columns"][] = "Fee Details";
$proto118["m_columns"][] = "Split to Corporate";
$proto118["m_columns"][] = "Paul";
$proto118["m_columns"][] = "McBroom";
$proto118["m_columns"][] = "Month of Close";
$proto118["m_columns"][] = "Gross This";
$proto118["m_columns"][] = "Gross Next";
$proto118["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto118);

$proto117["m_table"] = $obj;
$proto117["m_alias"] = "";
$proto119=array();
$proto119["m_sql"] = "";
$proto119["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto119["m_column"]=$obj;
$proto119["m_contained"] = array();
$proto119["m_strCase"] = "";
$proto119["m_havingmode"] = "0";
$proto119["m_inBrackets"] = "0";
$proto119["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto119);

$proto117["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto117);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_company_Report = createSqlQuery_company_Report();
																																																								$tdatacompany_Report[".sqlquery"] = $queryData_company_Report;
	
if(isset($tdatacompany_Report["field2"])){
	$tdatacompany_Report["field2"]["LookupTable"] = "carscars_view";
	$tdatacompany_Report["field2"]["LookupOrderBy"] = "name";
	$tdatacompany_Report["field2"]["LookupType"] = 4;
	$tdatacompany_Report["field2"]["LinkField"] = "email";
	$tdatacompany_Report["field2"]["DisplayField"] = "name";
	$tdatacompany_Report[".hasCustomViewField"] = true;
}

$tableEvents["company Report"] = new eventsBase;
$tdatacompany_Report[".hasEvents"] = false;

$cipherer = new RunnerCipherer("company Report");

?>