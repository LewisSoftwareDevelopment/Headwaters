<?php
require_once(getabspath("classes/cipherer.php"));
$tdatacompany = array();
	$tdatacompany[".NumberOfChars"] = 80; 
	$tdatacompany[".ShortName"] = "company";
	$tdatacompany[".OwnerID"] = "";
	$tdatacompany[".OriginalTable"] = "company";

//	field labels
$fieldLabelscompany = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelscompany["English"] = array();
	$fieldToolTipscompany["English"] = array();
	$fieldLabelscompany["English"]["ID"] = "ID";
	$fieldToolTipscompany["English"]["ID"] = "";
	$fieldLabelscompany["English"]["Company"] = "Company";
	$fieldToolTipscompany["English"]["Company"] = "";
	$fieldLabelscompany["English"]["EL_Date"] = "EL Date";
	$fieldToolTipscompany["English"]["EL Date"] = "";
	$fieldLabelscompany["English"]["Project_Name"] = "Project Name";
	$fieldToolTipscompany["English"]["Project Name"] = "";
	$fieldLabelscompany["English"]["Status"] = "Status";
	$fieldToolTipscompany["English"]["Status"] = "";
	$fieldLabelscompany["English"]["Deal_Type"] = "Deal Type";
	$fieldToolTipscompany["English"]["Deal Type"] = "";
	$fieldLabelscompany["English"]["Projected_Fee"] = "Projected Fee";
	$fieldToolTipscompany["English"]["Projected Fee"] = "";
	$fieldLabelscompany["English"]["Est__Close_Date"] = "Est. Close Date";
	$fieldToolTipscompany["English"]["Est. Close Date"] = "";
	$fieldLabelscompany["English"]["Primary_Banker"] = "Primary Banker";
	$fieldToolTipscompany["English"]["Primary Banker"] = "";
	$fieldLabelscompany["English"]["Practice_Area"] = "Practice Area";
	$fieldToolTipscompany["English"]["Practice Area"] = "";
	$fieldLabelscompany["English"]["Ownership_Class"] = "Ownership Class";
	$fieldToolTipscompany["English"]["Ownership Class"] = "";
	$fieldLabelscompany["English"]["Industry"] = "Industry";
	$fieldToolTipscompany["English"]["Industry"] = "";
	$fieldLabelscompany["English"]["Referral_Type"] = "Referral Type";
	$fieldToolTipscompany["English"]["Referral Type"] = "";
	$fieldLabelscompany["English"]["Referral_Source_Company"] = "Referral Source-Company";
	$fieldToolTipscompany["English"]["Referral Source-Company"] = "";
	$fieldLabelscompany["English"]["Referral_Scource_Ind_"] = "Referral Scource-Ind.";
	$fieldToolTipscompany["English"]["Referral Scource-Ind."] = "";
	$fieldLabelscompany["English"]["Description"] = "Description";
	$fieldToolTipscompany["English"]["Description"] = "";
	$fieldLabelscompany["English"]["Dead_Date"] = "Dead Date";
	$fieldToolTipscompany["English"]["Dead Date"] = "";
	$fieldLabelscompany["English"]["EL_Expiration_Date"] = "EL Expiration Date";
	$fieldToolTipscompany["English"]["EL Expiration Date"] = "";
	$fieldLabelscompany["English"]["Engagment_Fee"] = "Engagment Fee";
	$fieldToolTipscompany["English"]["Engagment Fee"] = "";
	$fieldLabelscompany["English"]["Fee_Minimum"] = "Fee Minimum";
	$fieldToolTipscompany["English"]["Fee Minimum"] = "";
	$fieldLabelscompany["English"]["Final_Total_Sucess_Fee"] = "Final Total Sucess Fee";
	$fieldToolTipscompany["English"]["Final Total Sucess Fee"] = "";
	$fieldLabelscompany["English"]["Final_Transaction_Size"] = "Final Transaction Size";
	$fieldToolTipscompany["English"]["Final Transaction Size"] = "";
	$fieldLabelscompany["English"]["Monthly_Retainer"] = "Monthly Retainer";
	$fieldToolTipscompany["English"]["Monthly Retainer"] = "";
	$fieldLabelscompany["English"]["Closed_Date"] = "Closed Date";
	$fieldToolTipscompany["English"]["Closed Date"] = "";
	$fieldLabelscompany["English"]["Team_Split_1"] = "Team Split-1";
	$fieldToolTipscompany["English"]["Team Split-1"] = "";
	$fieldLabelscompany["English"]["Team_1"] = "Team-1";
	$fieldToolTipscompany["English"]["Team-1"] = "";
	$fieldLabelscompany["English"]["Team_Split_2"] = "Team Split-2";
	$fieldToolTipscompany["English"]["Team Split-2"] = "";
	$fieldLabelscompany["English"]["Team_2"] = "Team-2";
	$fieldToolTipscompany["English"]["Team-2"] = "";
	$fieldLabelscompany["English"]["Team_Split_3"] = "Team Split-3";
	$fieldToolTipscompany["English"]["Team Split-3"] = "";
	$fieldLabelscompany["English"]["Team_Split_4"] = "Team Split-4";
	$fieldToolTipscompany["English"]["Team Split-4"] = "";
	$fieldLabelscompany["English"]["Team_Split_5"] = "Team Split-5";
	$fieldToolTipscompany["English"]["Team Split-5"] = "";
	$fieldLabelscompany["English"]["Team_Split_6"] = "Team Split-6";
	$fieldToolTipscompany["English"]["Team Split-6"] = "";
	$fieldLabelscompany["English"]["Team_3"] = "Team-3";
	$fieldToolTipscompany["English"]["Team-3"] = "";
	$fieldLabelscompany["English"]["Team_4"] = "Team-4";
	$fieldToolTipscompany["English"]["Team-4"] = "";
	$fieldLabelscompany["English"]["Team_5"] = "Team-5";
	$fieldToolTipscompany["English"]["Team-5"] = "";
	$fieldLabelscompany["English"]["Team_6"] = "Team-6";
	$fieldToolTipscompany["English"]["Team-6"] = "";
	$fieldLabelscompany["English"]["Fee_Split_1"] = "Fee Split-1";
	$fieldToolTipscompany["English"]["Fee Split-1"] = "";
	$fieldLabelscompany["English"]["Fee_Split_2"] = "Fee Split-2";
	$fieldToolTipscompany["English"]["Fee Split-2"] = "";
	$fieldLabelscompany["English"]["Fee_Split_3"] = "Fee Split-3";
	$fieldToolTipscompany["English"]["Fee Split-3"] = "";
	$fieldLabelscompany["English"]["Fee_Split_4"] = "Fee Split-4";
	$fieldToolTipscompany["English"]["Fee Split-4"] = "";
	$fieldLabelscompany["English"]["Fee_Split_5"] = "Fee Split-5";
	$fieldToolTipscompany["English"]["Fee Split-5"] = "";
	$fieldLabelscompany["English"]["Fee_Split_6"] = "Fee Split-6";
	$fieldToolTipscompany["English"]["Fee Split-6"] = "";
	$fieldLabelscompany["English"]["Fee_To_1"] = "Fee To-1";
	$fieldToolTipscompany["English"]["Fee To-1"] = "";
	$fieldLabelscompany["English"]["Fee_To_2"] = "Fee To-2";
	$fieldToolTipscompany["English"]["Fee To-2"] = "";
	$fieldLabelscompany["English"]["Fee_To_3"] = "Fee To-3";
	$fieldToolTipscompany["English"]["Fee To-3"] = "";
	$fieldLabelscompany["English"]["Fee_To_4"] = "Fee To-4";
	$fieldToolTipscompany["English"]["Fee To-4"] = "";
	$fieldLabelscompany["English"]["Fee_To_5"] = "Fee To-5";
	$fieldToolTipscompany["English"]["Fee To-5"] = "";
	$fieldLabelscompany["English"]["Fee_To_6"] = "Fee To-6";
	$fieldToolTipscompany["English"]["Fee To-6"] = "";
	$fieldLabelscompany["English"]["Projected_Transaction_Size"] = "Projected Transaction Size";
	$fieldToolTipscompany["English"]["Projected Transaction Size"] = "";
	$fieldLabelscompany["English"]["Enterpise_Value"] = "Enterpise Value";
	$fieldToolTipscompany["English"]["Enterpise Value"] = "";
	$fieldLabelscompany["English"]["Fee_Details"] = "Fee Details";
	$fieldToolTipscompany["English"]["Fee Details"] = "";
	$fieldLabelscompany["English"]["Split_to_Corporate"] = "Split to Corporate";
	$fieldToolTipscompany["English"]["Split to Corporate"] = "";
	$fieldLabelscompany["English"]["Paul"] = "Paul";
	$fieldToolTipscompany["English"]["Paul"] = "";
	$fieldLabelscompany["English"]["McBroom"] = "Mc Broom";
	$fieldToolTipscompany["English"]["McBroom"] = "";
	$fieldLabelscompany["English"]["IBC_Date"] = "IBC Date";
	$fieldToolTipscompany["English"]["IBC Date"] = "";
	$fieldLabelscompany["English"]["Gross_Next"] = "Gross Next";
	$fieldToolTipscompany["English"]["Gross Next"] = "";
	$fieldLabelscompany["English"]["Gross_This"] = "Gross This";
	$fieldToolTipscompany["English"]["Gross This"] = "";
	$fieldLabelscompany["English"]["Month_of_Close"] = "Month of Close";
	$fieldToolTipscompany["English"]["Month of Close"] = "";
	$fieldLabelscompany["English"]["Deal_Slot"] = "Deal Slot";
	$fieldToolTipscompany["English"]["Deal Slot"] = "";
	$fieldLabelscompany["English"]["Pipeline"] = "Pipeline";
	$fieldToolTipscompany["English"]["Pipeline"] = "";
	if (count($fieldToolTipscompany["English"]))
		$tdatacompany[".isUseToolTips"] = true;
}
	
	
	$tdatacompany[".NCSearch"] = true;



$tdatacompany[".shortTableName"] = "company";
$tdatacompany[".nSecOptions"] = 0;
$tdatacompany[".recsPerRowList"] = 1;
$tdatacompany[".mainTableOwnerID"] = "";
$tdatacompany[".moveNext"] = 1;
$tdatacompany[".nType"] = 0;

$tdatacompany[".strOriginalTableName"] = "company";




$tdatacompany[".showAddInPopup"] = false;

$tdatacompany[".showEditInPopup"] = false;

$tdatacompany[".showViewInPopup"] = false;

$tdatacompany[".fieldsForRegister"] = array();

if (!isMobile())
	$tdatacompany[".listAjax"] = true;
else 
	$tdatacompany[".listAjax"] = false;

	$tdatacompany[".audit"] = false;

	$tdatacompany[".locking"] = false;

$tdatacompany[".listIcons"] = true;
$tdatacompany[".edit"] = true;
$tdatacompany[".inlineEdit"] = true;
$tdatacompany[".inlineAdd"] = true;
$tdatacompany[".view"] = true;

$tdatacompany[".exportTo"] = true;

$tdatacompany[".printFriendly"] = true;

$tdatacompany[".delete"] = true;

$tdatacompany[".showSimpleSearchOptions"] = false;

$tdatacompany[".showSearchPanel"] = true;

if (isMobile())
	$tdatacompany[".isUseAjaxSuggest"] = false;
else 
	$tdatacompany[".isUseAjaxSuggest"] = true;

$tdatacompany[".rowHighlite"] = true;

// button handlers file names

$tdatacompany[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacompany[".isUseTimeForSearch"] = false;




$tdatacompany[".allSearchFields"] = array();

$tdatacompany[".allSearchFields"][] = "ID";
$tdatacompany[".allSearchFields"][] = "Company";
$tdatacompany[".allSearchFields"][] = "EL Date";
$tdatacompany[".allSearchFields"][] = "IBC Date";
$tdatacompany[".allSearchFields"][] = "Est. Close Date";
$tdatacompany[".allSearchFields"][] = "Project Name";
$tdatacompany[".allSearchFields"][] = "EL Expiration Date";
$tdatacompany[".allSearchFields"][] = "Status";
$tdatacompany[".allSearchFields"][] = "Deal Type";
$tdatacompany[".allSearchFields"][] = "Deal Slot";
$tdatacompany[".allSearchFields"][] = "Closed Date";
$tdatacompany[".allSearchFields"][] = "Dead Date";
$tdatacompany[".allSearchFields"][] = "Primary Banker";
$tdatacompany[".allSearchFields"][] = "Practice Area";
$tdatacompany[".allSearchFields"][] = "Industry";
$tdatacompany[".allSearchFields"][] = "Projected Transaction Size";
$tdatacompany[".allSearchFields"][] = "Enterpise Value";
$tdatacompany[".allSearchFields"][] = "Final Transaction Size";
$tdatacompany[".allSearchFields"][] = "Projected Fee";
$tdatacompany[".allSearchFields"][] = "Fee Minimum";
$tdatacompany[".allSearchFields"][] = "Engagment Fee";
$tdatacompany[".allSearchFields"][] = "Fee Details";
$tdatacompany[".allSearchFields"][] = "Split to Corporate";
$tdatacompany[".allSearchFields"][] = "Monthly Retainer";
$tdatacompany[".allSearchFields"][] = "Final Total Sucess Fee";
$tdatacompany[".allSearchFields"][] = "Ownership Class";
$tdatacompany[".allSearchFields"][] = "Referral Type";
$tdatacompany[".allSearchFields"][] = "Referral Source-Company";
$tdatacompany[".allSearchFields"][] = "Referral Scource-Ind.";
$tdatacompany[".allSearchFields"][] = "Description";
$tdatacompany[".allSearchFields"][] = "Team Split-1";
$tdatacompany[".allSearchFields"][] = "Team-1";
$tdatacompany[".allSearchFields"][] = "Team Split-2";
$tdatacompany[".allSearchFields"][] = "Team-2";
$tdatacompany[".allSearchFields"][] = "Team Split-3";
$tdatacompany[".allSearchFields"][] = "Team-3";
$tdatacompany[".allSearchFields"][] = "Team Split-4";
$tdatacompany[".allSearchFields"][] = "Team-4";
$tdatacompany[".allSearchFields"][] = "Team Split-5";
$tdatacompany[".allSearchFields"][] = "Team-5";
$tdatacompany[".allSearchFields"][] = "Team Split-6";
$tdatacompany[".allSearchFields"][] = "Team-6";
$tdatacompany[".allSearchFields"][] = "Fee Split-1";
$tdatacompany[".allSearchFields"][] = "Fee To-1";
$tdatacompany[".allSearchFields"][] = "Fee Split-2";
$tdatacompany[".allSearchFields"][] = "Fee To-2";
$tdatacompany[".allSearchFields"][] = "Fee Split-3";
$tdatacompany[".allSearchFields"][] = "Fee To-3";
$tdatacompany[".allSearchFields"][] = "Fee Split-4";
$tdatacompany[".allSearchFields"][] = "Fee To-4";
$tdatacompany[".allSearchFields"][] = "Fee Split-5";
$tdatacompany[".allSearchFields"][] = "Fee To-5";
$tdatacompany[".allSearchFields"][] = "Fee Split-6";
$tdatacompany[".allSearchFields"][] = "Fee To-6";
$tdatacompany[".allSearchFields"][] = "Paul";
$tdatacompany[".allSearchFields"][] = "McBroom";
$tdatacompany[".allSearchFields"][] = "Pipeline";
$tdatacompany[".allSearchFields"][] = "Month of Close";
$tdatacompany[".allSearchFields"][] = "Gross This";
$tdatacompany[".allSearchFields"][] = "Gross Next";

$tdatacompany[".googleLikeFields"][] = "ID";
$tdatacompany[".googleLikeFields"][] = "Company";
$tdatacompany[".googleLikeFields"][] = "EL Date";
$tdatacompany[".googleLikeFields"][] = "Project Name";
$tdatacompany[".googleLikeFields"][] = "Status";
$tdatacompany[".googleLikeFields"][] = "Deal Type";
$tdatacompany[".googleLikeFields"][] = "Projected Fee";
$tdatacompany[".googleLikeFields"][] = "Projected Transaction Size";
$tdatacompany[".googleLikeFields"][] = "Est. Close Date";
$tdatacompany[".googleLikeFields"][] = "Primary Banker";
$tdatacompany[".googleLikeFields"][] = "Practice Area";
$tdatacompany[".googleLikeFields"][] = "Ownership Class";
$tdatacompany[".googleLikeFields"][] = "Industry";
$tdatacompany[".googleLikeFields"][] = "Referral Type";
$tdatacompany[".googleLikeFields"][] = "Referral Source-Company";
$tdatacompany[".googleLikeFields"][] = "Referral Scource-Ind.";
$tdatacompany[".googleLikeFields"][] = "Description";
$tdatacompany[".googleLikeFields"][] = "Dead Date";
$tdatacompany[".googleLikeFields"][] = "EL Expiration Date";
$tdatacompany[".googleLikeFields"][] = "Engagment Fee";
$tdatacompany[".googleLikeFields"][] = "Fee Minimum";
$tdatacompany[".googleLikeFields"][] = "Final Total Sucess Fee";
$tdatacompany[".googleLikeFields"][] = "Final Transaction Size";
$tdatacompany[".googleLikeFields"][] = "Monthly Retainer";
$tdatacompany[".googleLikeFields"][] = "Closed Date";
$tdatacompany[".googleLikeFields"][] = "Team Split-1";
$tdatacompany[".googleLikeFields"][] = "Team-1";
$tdatacompany[".googleLikeFields"][] = "Team Split-2";
$tdatacompany[".googleLikeFields"][] = "Team-2";
$tdatacompany[".googleLikeFields"][] = "Team Split-3";
$tdatacompany[".googleLikeFields"][] = "Team Split-4";
$tdatacompany[".googleLikeFields"][] = "Team Split-5";
$tdatacompany[".googleLikeFields"][] = "Team Split-6";
$tdatacompany[".googleLikeFields"][] = "Team-3";
$tdatacompany[".googleLikeFields"][] = "Team-4";
$tdatacompany[".googleLikeFields"][] = "Team-5";
$tdatacompany[".googleLikeFields"][] = "Team-6";
$tdatacompany[".googleLikeFields"][] = "Fee Split-1";
$tdatacompany[".googleLikeFields"][] = "Fee Split-2";
$tdatacompany[".googleLikeFields"][] = "Fee Split-3";
$tdatacompany[".googleLikeFields"][] = "Fee Split-4";
$tdatacompany[".googleLikeFields"][] = "Fee Split-5";
$tdatacompany[".googleLikeFields"][] = "Fee Split-6";
$tdatacompany[".googleLikeFields"][] = "Fee To-1";
$tdatacompany[".googleLikeFields"][] = "Fee To-2";
$tdatacompany[".googleLikeFields"][] = "Fee To-3";
$tdatacompany[".googleLikeFields"][] = "Fee To-4";
$tdatacompany[".googleLikeFields"][] = "Fee To-5";
$tdatacompany[".googleLikeFields"][] = "Fee To-6";
$tdatacompany[".googleLikeFields"][] = "Enterpise Value";
$tdatacompany[".googleLikeFields"][] = "Fee Details";
$tdatacompany[".googleLikeFields"][] = "Split to Corporate";
$tdatacompany[".googleLikeFields"][] = "Paul";
$tdatacompany[".googleLikeFields"][] = "McBroom";
$tdatacompany[".googleLikeFields"][] = "IBC Date";
$tdatacompany[".googleLikeFields"][] = "Gross Next";
$tdatacompany[".googleLikeFields"][] = "Gross This";
$tdatacompany[".googleLikeFields"][] = "Month of Close";
$tdatacompany[".googleLikeFields"][] = "Deal Slot";
$tdatacompany[".googleLikeFields"][] = "Pipeline";


$tdatacompany[".advSearchFields"][] = "ID";
$tdatacompany[".advSearchFields"][] = "Company";
$tdatacompany[".advSearchFields"][] = "EL Date";
$tdatacompany[".advSearchFields"][] = "IBC Date";
$tdatacompany[".advSearchFields"][] = "Est. Close Date";
$tdatacompany[".advSearchFields"][] = "Project Name";
$tdatacompany[".advSearchFields"][] = "EL Expiration Date";
$tdatacompany[".advSearchFields"][] = "Status";
$tdatacompany[".advSearchFields"][] = "Deal Type";
$tdatacompany[".advSearchFields"][] = "Deal Slot";
$tdatacompany[".advSearchFields"][] = "Closed Date";
$tdatacompany[".advSearchFields"][] = "Dead Date";
$tdatacompany[".advSearchFields"][] = "Primary Banker";
$tdatacompany[".advSearchFields"][] = "Practice Area";
$tdatacompany[".advSearchFields"][] = "Industry";
$tdatacompany[".advSearchFields"][] = "Projected Transaction Size";
$tdatacompany[".advSearchFields"][] = "Enterpise Value";
$tdatacompany[".advSearchFields"][] = "Final Transaction Size";
$tdatacompany[".advSearchFields"][] = "Projected Fee";
$tdatacompany[".advSearchFields"][] = "Fee Minimum";
$tdatacompany[".advSearchFields"][] = "Engagment Fee";
$tdatacompany[".advSearchFields"][] = "Fee Details";
$tdatacompany[".advSearchFields"][] = "Split to Corporate";
$tdatacompany[".advSearchFields"][] = "Monthly Retainer";
$tdatacompany[".advSearchFields"][] = "Final Total Sucess Fee";
$tdatacompany[".advSearchFields"][] = "Ownership Class";
$tdatacompany[".advSearchFields"][] = "Referral Type";
$tdatacompany[".advSearchFields"][] = "Referral Source-Company";
$tdatacompany[".advSearchFields"][] = "Referral Scource-Ind.";
$tdatacompany[".advSearchFields"][] = "Description";
$tdatacompany[".advSearchFields"][] = "Team Split-1";
$tdatacompany[".advSearchFields"][] = "Team-1";
$tdatacompany[".advSearchFields"][] = "Team Split-2";
$tdatacompany[".advSearchFields"][] = "Team-2";
$tdatacompany[".advSearchFields"][] = "Team Split-3";
$tdatacompany[".advSearchFields"][] = "Team-3";
$tdatacompany[".advSearchFields"][] = "Team Split-4";
$tdatacompany[".advSearchFields"][] = "Team-4";
$tdatacompany[".advSearchFields"][] = "Team Split-5";
$tdatacompany[".advSearchFields"][] = "Team-5";
$tdatacompany[".advSearchFields"][] = "Team Split-6";
$tdatacompany[".advSearchFields"][] = "Team-6";
$tdatacompany[".advSearchFields"][] = "Fee Split-1";
$tdatacompany[".advSearchFields"][] = "Fee To-1";
$tdatacompany[".advSearchFields"][] = "Fee Split-2";
$tdatacompany[".advSearchFields"][] = "Fee To-2";
$tdatacompany[".advSearchFields"][] = "Fee Split-3";
$tdatacompany[".advSearchFields"][] = "Fee To-3";
$tdatacompany[".advSearchFields"][] = "Fee Split-4";
$tdatacompany[".advSearchFields"][] = "Fee To-4";
$tdatacompany[".advSearchFields"][] = "Fee Split-5";
$tdatacompany[".advSearchFields"][] = "Fee To-5";
$tdatacompany[".advSearchFields"][] = "Fee Split-6";
$tdatacompany[".advSearchFields"][] = "Fee To-6";
$tdatacompany[".advSearchFields"][] = "Paul";
$tdatacompany[".advSearchFields"][] = "McBroom";
$tdatacompany[".advSearchFields"][] = "Pipeline";
$tdatacompany[".advSearchFields"][] = "Month of Close";
$tdatacompany[".advSearchFields"][] = "Gross This";
$tdatacompany[".advSearchFields"][] = "Gross Next";

$tdatacompany[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
			


$tdatacompany[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacompany[".strOrderBy"] = $tstrOrderBy;

$tdatacompany[".orderindexes"] = array();

$tdatacompany[".sqlHead"] = "SELECT company.ID,  company.Company,  company.`EL Date`,  company.`Project Name`,  company.Status,  company.`Deal Type`,  company.`Projected Fee`,  company.`Projected Transaction Size`,  company.`Est. Close Date`,  company.`Primary Banker`,  company.`Practice Area`,  company.`Ownership Class`,  company.Industry,  company.`Referral Type`,  company.`Referral Source-Company`,  company.`Referral Scource-Ind.`,  company.Description,  company.`Dead Date`,  company.`EL Expiration Date`,  company.`Engagment Fee`,  company.`Fee Minimum`,  company.`Final Total Sucess Fee`,  company.`Final Transaction Size`,  company.`Monthly Retainer`,  company.`Closed Date`,  company.`Team Split-1`,  company.`Team-1`,  company.`Team Split-2`,  company.`Team-2`,  company.`Team Split-3`,  company.`Team Split-4`,  company.`Team Split-5`,  company.`Team Split-6`,  company.`Team-3`,  company.`Team-4`,  company.`Team-5`,  company.`Team-6`,  company.`Fee Split-1`,  company.`Fee Split-2`,  company.`Fee Split-3`,  company.`Fee Split-4`,  company.`Fee Split-5`,  company.`Fee Split-6`,  company.`Fee To-1`,  company.`Fee To-2`,  company.`Fee To-3`,  company.`Fee To-4`,  company.`Fee To-5`,  company.`Fee To-6`,  company.`Enterpise Value`,  company.`Fee Details`,  company.`Split to Corporate`,  company.Paul,  company.McBroom,  company.`IBC Date`,  company.`Gross Next`,  company.`Gross This`,  company.`Month of Close`,  company.`Deal Slot`,  company.Pipeline";
$tdatacompany[".sqlFrom"] = "FROM company  LEFT OUTER JOIN bankers ON company.`Primary Banker` = bankers.Name";
$tdatacompany[".sqlWhereExpr"] = "";
$tdatacompany[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = -1;
$tdatacompany[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacompany[".arrGroupsPerPage"] = $arrGPP;

$tableKeyscompany = array();
$tableKeyscompany[] = "ID";
$tdatacompany[".Keys"] = $tableKeyscompany;

$tdatacompany[".listFields"] = array();
$tdatacompany[".listFields"][] = "ID";
$tdatacompany[".listFields"][] = "Company";
$tdatacompany[".listFields"][] = "EL Date";
$tdatacompany[".listFields"][] = "IBC Date";
$tdatacompany[".listFields"][] = "Est. Close Date";
$tdatacompany[".listFields"][] = "Project Name";
$tdatacompany[".listFields"][] = "EL Expiration Date";
$tdatacompany[".listFields"][] = "Status";
$tdatacompany[".listFields"][] = "Deal Type";
$tdatacompany[".listFields"][] = "Deal Slot";
$tdatacompany[".listFields"][] = "Closed Date";
$tdatacompany[".listFields"][] = "Dead Date";
$tdatacompany[".listFields"][] = "Primary Banker";
$tdatacompany[".listFields"][] = "Practice Area";
$tdatacompany[".listFields"][] = "Industry";
$tdatacompany[".listFields"][] = "Projected Transaction Size";
$tdatacompany[".listFields"][] = "Enterpise Value";
$tdatacompany[".listFields"][] = "Final Transaction Size";
$tdatacompany[".listFields"][] = "Projected Fee";
$tdatacompany[".listFields"][] = "Fee Minimum";
$tdatacompany[".listFields"][] = "Engagment Fee";
$tdatacompany[".listFields"][] = "Fee Details";
$tdatacompany[".listFields"][] = "Split to Corporate";
$tdatacompany[".listFields"][] = "Monthly Retainer";
$tdatacompany[".listFields"][] = "Final Total Sucess Fee";
$tdatacompany[".listFields"][] = "Ownership Class";
$tdatacompany[".listFields"][] = "Referral Type";
$tdatacompany[".listFields"][] = "Referral Source-Company";
$tdatacompany[".listFields"][] = "Referral Scource-Ind.";
$tdatacompany[".listFields"][] = "Description";
$tdatacompany[".listFields"][] = "Team Split-1";
$tdatacompany[".listFields"][] = "Team-1";
$tdatacompany[".listFields"][] = "Team Split-2";
$tdatacompany[".listFields"][] = "Team-2";
$tdatacompany[".listFields"][] = "Team Split-3";
$tdatacompany[".listFields"][] = "Team-3";
$tdatacompany[".listFields"][] = "Team Split-4";
$tdatacompany[".listFields"][] = "Team-4";
$tdatacompany[".listFields"][] = "Team Split-5";
$tdatacompany[".listFields"][] = "Team-5";
$tdatacompany[".listFields"][] = "Team Split-6";
$tdatacompany[".listFields"][] = "Team-6";
$tdatacompany[".listFields"][] = "Fee Split-1";
$tdatacompany[".listFields"][] = "Fee To-1";
$tdatacompany[".listFields"][] = "Fee Split-2";
$tdatacompany[".listFields"][] = "Fee To-2";
$tdatacompany[".listFields"][] = "Fee Split-3";
$tdatacompany[".listFields"][] = "Fee To-3";
$tdatacompany[".listFields"][] = "Fee Split-4";
$tdatacompany[".listFields"][] = "Fee To-4";
$tdatacompany[".listFields"][] = "Fee Split-5";
$tdatacompany[".listFields"][] = "Fee To-5";
$tdatacompany[".listFields"][] = "Fee Split-6";
$tdatacompany[".listFields"][] = "Fee To-6";
$tdatacompany[".listFields"][] = "Paul";
$tdatacompany[".listFields"][] = "McBroom";
$tdatacompany[".listFields"][] = "Pipeline";
$tdatacompany[".listFields"][] = "Month of Close";
$tdatacompany[".listFields"][] = "Gross This";
$tdatacompany[".listFields"][] = "Gross Next";

$tdatacompany[".viewFields"] = array();
$tdatacompany[".viewFields"][] = "ID";
$tdatacompany[".viewFields"][] = "Company";
$tdatacompany[".viewFields"][] = "EL Date";
$tdatacompany[".viewFields"][] = "IBC Date";
$tdatacompany[".viewFields"][] = "Est. Close Date";
$tdatacompany[".viewFields"][] = "Project Name";
$tdatacompany[".viewFields"][] = "EL Expiration Date";
$tdatacompany[".viewFields"][] = "Status";
$tdatacompany[".viewFields"][] = "Deal Type";
$tdatacompany[".viewFields"][] = "Deal Slot";
$tdatacompany[".viewFields"][] = "Closed Date";
$tdatacompany[".viewFields"][] = "Dead Date";
$tdatacompany[".viewFields"][] = "Primary Banker";
$tdatacompany[".viewFields"][] = "Practice Area";
$tdatacompany[".viewFields"][] = "Industry";
$tdatacompany[".viewFields"][] = "Projected Transaction Size";
$tdatacompany[".viewFields"][] = "Enterpise Value";
$tdatacompany[".viewFields"][] = "Final Transaction Size";
$tdatacompany[".viewFields"][] = "Projected Fee";
$tdatacompany[".viewFields"][] = "Fee Minimum";
$tdatacompany[".viewFields"][] = "Engagment Fee";
$tdatacompany[".viewFields"][] = "Fee Details";
$tdatacompany[".viewFields"][] = "Split to Corporate";
$tdatacompany[".viewFields"][] = "Monthly Retainer";
$tdatacompany[".viewFields"][] = "Final Total Sucess Fee";
$tdatacompany[".viewFields"][] = "Ownership Class";
$tdatacompany[".viewFields"][] = "Referral Type";
$tdatacompany[".viewFields"][] = "Referral Source-Company";
$tdatacompany[".viewFields"][] = "Referral Scource-Ind.";
$tdatacompany[".viewFields"][] = "Description";
$tdatacompany[".viewFields"][] = "Team Split-1";
$tdatacompany[".viewFields"][] = "Team-1";
$tdatacompany[".viewFields"][] = "Team Split-2";
$tdatacompany[".viewFields"][] = "Team-2";
$tdatacompany[".viewFields"][] = "Team Split-3";
$tdatacompany[".viewFields"][] = "Team-3";
$tdatacompany[".viewFields"][] = "Team Split-4";
$tdatacompany[".viewFields"][] = "Team-4";
$tdatacompany[".viewFields"][] = "Team Split-5";
$tdatacompany[".viewFields"][] = "Team-5";
$tdatacompany[".viewFields"][] = "Team Split-6";
$tdatacompany[".viewFields"][] = "Team-6";
$tdatacompany[".viewFields"][] = "Fee Split-1";
$tdatacompany[".viewFields"][] = "Fee To-1";
$tdatacompany[".viewFields"][] = "Fee Split-2";
$tdatacompany[".viewFields"][] = "Fee To-2";
$tdatacompany[".viewFields"][] = "Fee Split-3";
$tdatacompany[".viewFields"][] = "Fee To-3";
$tdatacompany[".viewFields"][] = "Fee Split-4";
$tdatacompany[".viewFields"][] = "Fee To-4";
$tdatacompany[".viewFields"][] = "Fee Split-5";
$tdatacompany[".viewFields"][] = "Fee To-5";
$tdatacompany[".viewFields"][] = "Fee Split-6";
$tdatacompany[".viewFields"][] = "Fee To-6";
$tdatacompany[".viewFields"][] = "Paul";
$tdatacompany[".viewFields"][] = "McBroom";
$tdatacompany[".viewFields"][] = "Pipeline";
$tdatacompany[".viewFields"][] = "Month of Close";
$tdatacompany[".viewFields"][] = "Gross This";
$tdatacompany[".viewFields"][] = "Gross Next";

$tdatacompany[".addFields"] = array();
$tdatacompany[".addFields"][] = "Company";
$tdatacompany[".addFields"][] = "EL Date";
$tdatacompany[".addFields"][] = "IBC Date";
$tdatacompany[".addFields"][] = "Est. Close Date";
$tdatacompany[".addFields"][] = "Project Name";
$tdatacompany[".addFields"][] = "EL Expiration Date";
$tdatacompany[".addFields"][] = "Status";
$tdatacompany[".addFields"][] = "Deal Type";
$tdatacompany[".addFields"][] = "Deal Slot";
$tdatacompany[".addFields"][] = "Closed Date";
$tdatacompany[".addFields"][] = "Dead Date";
$tdatacompany[".addFields"][] = "Primary Banker";
$tdatacompany[".addFields"][] = "Practice Area";
$tdatacompany[".addFields"][] = "Industry";
$tdatacompany[".addFields"][] = "Projected Transaction Size";
$tdatacompany[".addFields"][] = "Enterpise Value";
$tdatacompany[".addFields"][] = "Final Transaction Size";
$tdatacompany[".addFields"][] = "Projected Fee";
$tdatacompany[".addFields"][] = "Fee Minimum";
$tdatacompany[".addFields"][] = "Engagment Fee";
$tdatacompany[".addFields"][] = "Fee Details";
$tdatacompany[".addFields"][] = "Split to Corporate";
$tdatacompany[".addFields"][] = "Monthly Retainer";
$tdatacompany[".addFields"][] = "Final Total Sucess Fee";
$tdatacompany[".addFields"][] = "Ownership Class";
$tdatacompany[".addFields"][] = "Referral Type";
$tdatacompany[".addFields"][] = "Referral Source-Company";
$tdatacompany[".addFields"][] = "Referral Scource-Ind.";
$tdatacompany[".addFields"][] = "Description";
$tdatacompany[".addFields"][] = "Team Split-1";
$tdatacompany[".addFields"][] = "Team-1";
$tdatacompany[".addFields"][] = "Team Split-2";
$tdatacompany[".addFields"][] = "Team-2";
$tdatacompany[".addFields"][] = "Team Split-3";
$tdatacompany[".addFields"][] = "Team-3";
$tdatacompany[".addFields"][] = "Team Split-4";
$tdatacompany[".addFields"][] = "Team-4";
$tdatacompany[".addFields"][] = "Team Split-5";
$tdatacompany[".addFields"][] = "Team-5";
$tdatacompany[".addFields"][] = "Team Split-6";
$tdatacompany[".addFields"][] = "Team-6";
$tdatacompany[".addFields"][] = "Fee Split-1";
$tdatacompany[".addFields"][] = "Fee To-1";
$tdatacompany[".addFields"][] = "Fee Split-2";
$tdatacompany[".addFields"][] = "Fee To-2";
$tdatacompany[".addFields"][] = "Fee Split-3";
$tdatacompany[".addFields"][] = "Fee To-3";
$tdatacompany[".addFields"][] = "Fee Split-4";
$tdatacompany[".addFields"][] = "Fee To-4";
$tdatacompany[".addFields"][] = "Fee Split-5";
$tdatacompany[".addFields"][] = "Fee To-5";
$tdatacompany[".addFields"][] = "Fee Split-6";
$tdatacompany[".addFields"][] = "Fee To-6";
$tdatacompany[".addFields"][] = "Paul";
$tdatacompany[".addFields"][] = "McBroom";
$tdatacompany[".addFields"][] = "Pipeline";
$tdatacompany[".addFields"][] = "Month of Close";
$tdatacompany[".addFields"][] = "Gross This";
$tdatacompany[".addFields"][] = "Gross Next";

$tdatacompany[".inlineAddFields"] = array();
$tdatacompany[".inlineAddFields"][] = "ID";
$tdatacompany[".inlineAddFields"][] = "Company";
$tdatacompany[".inlineAddFields"][] = "EL Date";
$tdatacompany[".inlineAddFields"][] = "IBC Date";
$tdatacompany[".inlineAddFields"][] = "Est. Close Date";
$tdatacompany[".inlineAddFields"][] = "Project Name";
$tdatacompany[".inlineAddFields"][] = "EL Expiration Date";
$tdatacompany[".inlineAddFields"][] = "Status";
$tdatacompany[".inlineAddFields"][] = "Deal Type";
$tdatacompany[".inlineAddFields"][] = "Deal Slot";
$tdatacompany[".inlineAddFields"][] = "Closed Date";
$tdatacompany[".inlineAddFields"][] = "Dead Date";
$tdatacompany[".inlineAddFields"][] = "Primary Banker";
$tdatacompany[".inlineAddFields"][] = "Practice Area";
$tdatacompany[".inlineAddFields"][] = "Industry";
$tdatacompany[".inlineAddFields"][] = "Projected Transaction Size";
$tdatacompany[".inlineAddFields"][] = "Enterpise Value";
$tdatacompany[".inlineAddFields"][] = "Final Transaction Size";
$tdatacompany[".inlineAddFields"][] = "Projected Fee";
$tdatacompany[".inlineAddFields"][] = "Fee Minimum";
$tdatacompany[".inlineAddFields"][] = "Engagment Fee";
$tdatacompany[".inlineAddFields"][] = "Fee Details";
$tdatacompany[".inlineAddFields"][] = "Split to Corporate";
$tdatacompany[".inlineAddFields"][] = "Monthly Retainer";
$tdatacompany[".inlineAddFields"][] = "Final Total Sucess Fee";
$tdatacompany[".inlineAddFields"][] = "Ownership Class";
$tdatacompany[".inlineAddFields"][] = "Referral Type";
$tdatacompany[".inlineAddFields"][] = "Referral Source-Company";
$tdatacompany[".inlineAddFields"][] = "Referral Scource-Ind.";
$tdatacompany[".inlineAddFields"][] = "Description";
$tdatacompany[".inlineAddFields"][] = "Team Split-1";
$tdatacompany[".inlineAddFields"][] = "Team-1";
$tdatacompany[".inlineAddFields"][] = "Team Split-2";
$tdatacompany[".inlineAddFields"][] = "Team-2";
$tdatacompany[".inlineAddFields"][] = "Team Split-3";
$tdatacompany[".inlineAddFields"][] = "Team-3";
$tdatacompany[".inlineAddFields"][] = "Team Split-4";
$tdatacompany[".inlineAddFields"][] = "Team-4";
$tdatacompany[".inlineAddFields"][] = "Team Split-5";
$tdatacompany[".inlineAddFields"][] = "Team-5";
$tdatacompany[".inlineAddFields"][] = "Team Split-6";
$tdatacompany[".inlineAddFields"][] = "Team-6";
$tdatacompany[".inlineAddFields"][] = "Fee Split-1";
$tdatacompany[".inlineAddFields"][] = "Fee To-1";
$tdatacompany[".inlineAddFields"][] = "Fee Split-2";
$tdatacompany[".inlineAddFields"][] = "Fee To-2";
$tdatacompany[".inlineAddFields"][] = "Fee Split-3";
$tdatacompany[".inlineAddFields"][] = "Fee To-3";
$tdatacompany[".inlineAddFields"][] = "Fee Split-4";
$tdatacompany[".inlineAddFields"][] = "Fee To-4";
$tdatacompany[".inlineAddFields"][] = "Fee Split-5";
$tdatacompany[".inlineAddFields"][] = "Fee To-5";
$tdatacompany[".inlineAddFields"][] = "Fee Split-6";
$tdatacompany[".inlineAddFields"][] = "Fee To-6";
$tdatacompany[".inlineAddFields"][] = "Paul";
$tdatacompany[".inlineAddFields"][] = "McBroom";
$tdatacompany[".inlineAddFields"][] = "Pipeline";
$tdatacompany[".inlineAddFields"][] = "Month of Close";
$tdatacompany[".inlineAddFields"][] = "Gross This";
$tdatacompany[".inlineAddFields"][] = "Gross Next";

$tdatacompany[".editFields"] = array();
$tdatacompany[".editFields"][] = "Company";
$tdatacompany[".editFields"][] = "EL Date";
$tdatacompany[".editFields"][] = "IBC Date";
$tdatacompany[".editFields"][] = "Est. Close Date";
$tdatacompany[".editFields"][] = "Project Name";
$tdatacompany[".editFields"][] = "EL Expiration Date";
$tdatacompany[".editFields"][] = "Status";
$tdatacompany[".editFields"][] = "Deal Type";
$tdatacompany[".editFields"][] = "Deal Slot";
$tdatacompany[".editFields"][] = "Closed Date";
$tdatacompany[".editFields"][] = "Dead Date";
$tdatacompany[".editFields"][] = "Primary Banker";
$tdatacompany[".editFields"][] = "Practice Area";
$tdatacompany[".editFields"][] = "Industry";
$tdatacompany[".editFields"][] = "Projected Transaction Size";
$tdatacompany[".editFields"][] = "Enterpise Value";
$tdatacompany[".editFields"][] = "Final Transaction Size";
$tdatacompany[".editFields"][] = "Projected Fee";
$tdatacompany[".editFields"][] = "Fee Minimum";
$tdatacompany[".editFields"][] = "Engagment Fee";
$tdatacompany[".editFields"][] = "Fee Details";
$tdatacompany[".editFields"][] = "Split to Corporate";
$tdatacompany[".editFields"][] = "Monthly Retainer";
$tdatacompany[".editFields"][] = "Final Total Sucess Fee";
$tdatacompany[".editFields"][] = "Ownership Class";
$tdatacompany[".editFields"][] = "Referral Type";
$tdatacompany[".editFields"][] = "Referral Source-Company";
$tdatacompany[".editFields"][] = "Referral Scource-Ind.";
$tdatacompany[".editFields"][] = "Description";
$tdatacompany[".editFields"][] = "Team Split-1";
$tdatacompany[".editFields"][] = "Team-1";
$tdatacompany[".editFields"][] = "Team Split-2";
$tdatacompany[".editFields"][] = "Team-2";
$tdatacompany[".editFields"][] = "Team Split-3";
$tdatacompany[".editFields"][] = "Team-3";
$tdatacompany[".editFields"][] = "Team Split-4";
$tdatacompany[".editFields"][] = "Team-4";
$tdatacompany[".editFields"][] = "Team Split-5";
$tdatacompany[".editFields"][] = "Team-5";
$tdatacompany[".editFields"][] = "Team Split-6";
$tdatacompany[".editFields"][] = "Team-6";
$tdatacompany[".editFields"][] = "Fee Split-1";
$tdatacompany[".editFields"][] = "Fee To-1";
$tdatacompany[".editFields"][] = "Fee Split-2";
$tdatacompany[".editFields"][] = "Fee To-2";
$tdatacompany[".editFields"][] = "Fee Split-3";
$tdatacompany[".editFields"][] = "Fee To-3";
$tdatacompany[".editFields"][] = "Fee Split-4";
$tdatacompany[".editFields"][] = "Fee To-4";
$tdatacompany[".editFields"][] = "Fee Split-5";
$tdatacompany[".editFields"][] = "Fee To-5";
$tdatacompany[".editFields"][] = "Fee Split-6";
$tdatacompany[".editFields"][] = "Fee To-6";
$tdatacompany[".editFields"][] = "Paul";
$tdatacompany[".editFields"][] = "McBroom";
$tdatacompany[".editFields"][] = "Pipeline";
$tdatacompany[".editFields"][] = "Month of Close";
$tdatacompany[".editFields"][] = "Gross This";
$tdatacompany[".editFields"][] = "Gross Next";

$tdatacompany[".inlineEditFields"] = array();
$tdatacompany[".inlineEditFields"][] = "ID";
$tdatacompany[".inlineEditFields"][] = "Company";
$tdatacompany[".inlineEditFields"][] = "EL Date";
$tdatacompany[".inlineEditFields"][] = "IBC Date";
$tdatacompany[".inlineEditFields"][] = "Est. Close Date";
$tdatacompany[".inlineEditFields"][] = "Project Name";
$tdatacompany[".inlineEditFields"][] = "EL Expiration Date";
$tdatacompany[".inlineEditFields"][] = "Status";
$tdatacompany[".inlineEditFields"][] = "Deal Type";
$tdatacompany[".inlineEditFields"][] = "Deal Slot";
$tdatacompany[".inlineEditFields"][] = "Closed Date";
$tdatacompany[".inlineEditFields"][] = "Dead Date";
$tdatacompany[".inlineEditFields"][] = "Primary Banker";
$tdatacompany[".inlineEditFields"][] = "Practice Area";
$tdatacompany[".inlineEditFields"][] = "Industry";
$tdatacompany[".inlineEditFields"][] = "Projected Transaction Size";
$tdatacompany[".inlineEditFields"][] = "Enterpise Value";
$tdatacompany[".inlineEditFields"][] = "Final Transaction Size";
$tdatacompany[".inlineEditFields"][] = "Projected Fee";
$tdatacompany[".inlineEditFields"][] = "Fee Minimum";
$tdatacompany[".inlineEditFields"][] = "Engagment Fee";
$tdatacompany[".inlineEditFields"][] = "Fee Details";
$tdatacompany[".inlineEditFields"][] = "Split to Corporate";
$tdatacompany[".inlineEditFields"][] = "Monthly Retainer";
$tdatacompany[".inlineEditFields"][] = "Final Total Sucess Fee";
$tdatacompany[".inlineEditFields"][] = "Ownership Class";
$tdatacompany[".inlineEditFields"][] = "Referral Type";
$tdatacompany[".inlineEditFields"][] = "Referral Source-Company";
$tdatacompany[".inlineEditFields"][] = "Referral Scource-Ind.";
$tdatacompany[".inlineEditFields"][] = "Description";
$tdatacompany[".inlineEditFields"][] = "Team Split-1";
$tdatacompany[".inlineEditFields"][] = "Team-1";
$tdatacompany[".inlineEditFields"][] = "Team Split-2";
$tdatacompany[".inlineEditFields"][] = "Team-2";
$tdatacompany[".inlineEditFields"][] = "Team Split-3";
$tdatacompany[".inlineEditFields"][] = "Team-3";
$tdatacompany[".inlineEditFields"][] = "Team Split-4";
$tdatacompany[".inlineEditFields"][] = "Team-4";
$tdatacompany[".inlineEditFields"][] = "Team Split-5";
$tdatacompany[".inlineEditFields"][] = "Team-5";
$tdatacompany[".inlineEditFields"][] = "Team Split-6";
$tdatacompany[".inlineEditFields"][] = "Team-6";
$tdatacompany[".inlineEditFields"][] = "Fee Split-1";
$tdatacompany[".inlineEditFields"][] = "Fee To-1";
$tdatacompany[".inlineEditFields"][] = "Fee Split-2";
$tdatacompany[".inlineEditFields"][] = "Fee To-2";
$tdatacompany[".inlineEditFields"][] = "Fee Split-3";
$tdatacompany[".inlineEditFields"][] = "Fee To-3";
$tdatacompany[".inlineEditFields"][] = "Fee Split-4";
$tdatacompany[".inlineEditFields"][] = "Fee To-4";
$tdatacompany[".inlineEditFields"][] = "Fee Split-5";
$tdatacompany[".inlineEditFields"][] = "Fee To-5";
$tdatacompany[".inlineEditFields"][] = "Fee Split-6";
$tdatacompany[".inlineEditFields"][] = "Fee To-6";
$tdatacompany[".inlineEditFields"][] = "Paul";
$tdatacompany[".inlineEditFields"][] = "McBroom";
$tdatacompany[".inlineEditFields"][] = "Pipeline";
$tdatacompany[".inlineEditFields"][] = "Month of Close";
$tdatacompany[".inlineEditFields"][] = "Gross This";
$tdatacompany[".inlineEditFields"][] = "Gross Next";

$tdatacompany[".exportFields"] = array();
$tdatacompany[".exportFields"][] = "ID";
$tdatacompany[".exportFields"][] = "Company";
$tdatacompany[".exportFields"][] = "EL Date";
$tdatacompany[".exportFields"][] = "IBC Date";
$tdatacompany[".exportFields"][] = "Est. Close Date";
$tdatacompany[".exportFields"][] = "Project Name";
$tdatacompany[".exportFields"][] = "EL Expiration Date";
$tdatacompany[".exportFields"][] = "Status";
$tdatacompany[".exportFields"][] = "Deal Type";
$tdatacompany[".exportFields"][] = "Deal Slot";
$tdatacompany[".exportFields"][] = "Closed Date";
$tdatacompany[".exportFields"][] = "Dead Date";
$tdatacompany[".exportFields"][] = "Primary Banker";
$tdatacompany[".exportFields"][] = "Practice Area";
$tdatacompany[".exportFields"][] = "Industry";
$tdatacompany[".exportFields"][] = "Projected Transaction Size";
$tdatacompany[".exportFields"][] = "Enterpise Value";
$tdatacompany[".exportFields"][] = "Final Transaction Size";
$tdatacompany[".exportFields"][] = "Projected Fee";
$tdatacompany[".exportFields"][] = "Fee Minimum";
$tdatacompany[".exportFields"][] = "Engagment Fee";
$tdatacompany[".exportFields"][] = "Fee Details";
$tdatacompany[".exportFields"][] = "Split to Corporate";
$tdatacompany[".exportFields"][] = "Monthly Retainer";
$tdatacompany[".exportFields"][] = "Final Total Sucess Fee";
$tdatacompany[".exportFields"][] = "Ownership Class";
$tdatacompany[".exportFields"][] = "Referral Type";
$tdatacompany[".exportFields"][] = "Referral Source-Company";
$tdatacompany[".exportFields"][] = "Referral Scource-Ind.";
$tdatacompany[".exportFields"][] = "Description";
$tdatacompany[".exportFields"][] = "Team Split-1";
$tdatacompany[".exportFields"][] = "Team-1";
$tdatacompany[".exportFields"][] = "Team Split-2";
$tdatacompany[".exportFields"][] = "Team-2";
$tdatacompany[".exportFields"][] = "Team Split-3";
$tdatacompany[".exportFields"][] = "Team-3";
$tdatacompany[".exportFields"][] = "Team Split-4";
$tdatacompany[".exportFields"][] = "Team-4";
$tdatacompany[".exportFields"][] = "Team Split-5";
$tdatacompany[".exportFields"][] = "Team-5";
$tdatacompany[".exportFields"][] = "Team Split-6";
$tdatacompany[".exportFields"][] = "Team-6";
$tdatacompany[".exportFields"][] = "Fee Split-1";
$tdatacompany[".exportFields"][] = "Fee To-1";
$tdatacompany[".exportFields"][] = "Fee Split-2";
$tdatacompany[".exportFields"][] = "Fee To-2";
$tdatacompany[".exportFields"][] = "Fee Split-3";
$tdatacompany[".exportFields"][] = "Fee To-3";
$tdatacompany[".exportFields"][] = "Fee Split-4";
$tdatacompany[".exportFields"][] = "Fee To-4";
$tdatacompany[".exportFields"][] = "Fee Split-5";
$tdatacompany[".exportFields"][] = "Fee To-5";
$tdatacompany[".exportFields"][] = "Fee Split-6";
$tdatacompany[".exportFields"][] = "Fee To-6";
$tdatacompany[".exportFields"][] = "Paul";
$tdatacompany[".exportFields"][] = "McBroom";
$tdatacompany[".exportFields"][] = "Pipeline";
$tdatacompany[".exportFields"][] = "Month of Close";
$tdatacompany[".exportFields"][] = "Gross This";
$tdatacompany[".exportFields"][] = "Gross Next";

$tdatacompany[".printFields"] = array();
$tdatacompany[".printFields"][] = "ID";
$tdatacompany[".printFields"][] = "Company";
$tdatacompany[".printFields"][] = "EL Date";
$tdatacompany[".printFields"][] = "IBC Date";
$tdatacompany[".printFields"][] = "Est. Close Date";
$tdatacompany[".printFields"][] = "Project Name";
$tdatacompany[".printFields"][] = "EL Expiration Date";
$tdatacompany[".printFields"][] = "Status";
$tdatacompany[".printFields"][] = "Deal Type";
$tdatacompany[".printFields"][] = "Deal Slot";
$tdatacompany[".printFields"][] = "Closed Date";
$tdatacompany[".printFields"][] = "Dead Date";
$tdatacompany[".printFields"][] = "Primary Banker";
$tdatacompany[".printFields"][] = "Practice Area";
$tdatacompany[".printFields"][] = "Industry";
$tdatacompany[".printFields"][] = "Projected Transaction Size";
$tdatacompany[".printFields"][] = "Enterpise Value";
$tdatacompany[".printFields"][] = "Final Transaction Size";
$tdatacompany[".printFields"][] = "Projected Fee";
$tdatacompany[".printFields"][] = "Fee Minimum";
$tdatacompany[".printFields"][] = "Engagment Fee";
$tdatacompany[".printFields"][] = "Fee Details";
$tdatacompany[".printFields"][] = "Split to Corporate";
$tdatacompany[".printFields"][] = "Monthly Retainer";
$tdatacompany[".printFields"][] = "Final Total Sucess Fee";
$tdatacompany[".printFields"][] = "Ownership Class";
$tdatacompany[".printFields"][] = "Referral Type";
$tdatacompany[".printFields"][] = "Referral Source-Company";
$tdatacompany[".printFields"][] = "Referral Scource-Ind.";
$tdatacompany[".printFields"][] = "Description";
$tdatacompany[".printFields"][] = "Team Split-1";
$tdatacompany[".printFields"][] = "Team-1";
$tdatacompany[".printFields"][] = "Team Split-2";
$tdatacompany[".printFields"][] = "Team-2";
$tdatacompany[".printFields"][] = "Team Split-3";
$tdatacompany[".printFields"][] = "Team-3";
$tdatacompany[".printFields"][] = "Team Split-4";
$tdatacompany[".printFields"][] = "Team-4";
$tdatacompany[".printFields"][] = "Team Split-5";
$tdatacompany[".printFields"][] = "Team-5";
$tdatacompany[".printFields"][] = "Team Split-6";
$tdatacompany[".printFields"][] = "Team-6";
$tdatacompany[".printFields"][] = "Fee Split-1";
$tdatacompany[".printFields"][] = "Fee To-1";
$tdatacompany[".printFields"][] = "Fee Split-2";
$tdatacompany[".printFields"][] = "Fee To-2";
$tdatacompany[".printFields"][] = "Fee Split-3";
$tdatacompany[".printFields"][] = "Fee To-3";
$tdatacompany[".printFields"][] = "Fee Split-4";
$tdatacompany[".printFields"][] = "Fee To-4";
$tdatacompany[".printFields"][] = "Fee Split-5";
$tdatacompany[".printFields"][] = "Fee To-5";
$tdatacompany[".printFields"][] = "Fee Split-6";
$tdatacompany[".printFields"][] = "Fee To-6";
$tdatacompany[".printFields"][] = "Paul";
$tdatacompany[".printFields"][] = "McBroom";
$tdatacompany[".printFields"][] = "Pipeline";
$tdatacompany[".printFields"][] = "Month of Close";
$tdatacompany[".printFields"][] = "Gross This";
$tdatacompany[".printFields"][] = "Gross Next";

//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "company.ID";
	
		
		
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
	
		
		
	$tdatacompany["ID"] = $fdata;
//	Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
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
		$fdata["FullName"] = "company.Company";
	
		
		
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
	
		$edata["inputStyle"] = " width:145px;";
	$edata["controlWidth"] = 145;
	
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Company"] = $fdata;
//	EL Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
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
		$fdata["FullName"] = "company.`EL Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["EL Date"] = $fdata;
//	Project Name
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
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
		$fdata["FullName"] = "company.`Project Name`";
	
		
		
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
	
		
		
	$tdatacompany["Project Name"] = $fdata;
//	Status
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
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
		$fdata["FullName"] = "company.Status";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Pre Market";
	$edata["LookupValues"][] = "In Market";
	$edata["LookupValues"][] = "Under LOI";
	$edata["LookupValues"][] = "Inactive";
	$edata["LookupValues"][] = "On Hold";
	$edata["LookupValues"][] = "Dead";
	$edata["LookupValues"][] = "Closed";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Status"] = $fdata;
//	Deal Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
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
		$fdata["FullName"] = "company.`Deal Type`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				$edata["LCType"] = 3;
			
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Advisory";
	$edata["LookupValues"][] = "Capital Formation - Debt";
	$edata["LookupValues"][] = "Capital Formation - Equity";
	$edata["LookupValues"][] = "Joint Venture";
	$edata["LookupValues"][] = "M&A - Sell-side";
	$edata["LookupValues"][] = "M&A - Buy-side";
	$edata["LookupValues"][] = "MBO";
	$edata["LookupValues"][] = "Restructuring";
	$edata["LookupValues"][] = "Valuation";
	$edata["LookupValues"][] = "PIPE";
	$edata["LookupValues"][] = "Fairness Opinion";
	$edata["LookupValues"][] = "Sale - Leaseback";
	$edata["LookupValues"][] = "Debt";
	$edata["LookupValues"][] = "Divestiture";
	$edata["LookupValues"][] = "Equity";
	$edata["LookupValues"][] = "Private Placement";
	$edata["LookupValues"][] = "Recapitalization";
	$edata["LookupValues"][] = "Sale - Leaseback";
	$edata["LookupValues"][] = "Licensing";

		$edata["Multiselect"] = true; 
	$edata["SelectSize"] = 1;
//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		$edata["inputStyle"] = " width:148px;";
	$edata["controlWidth"] = 148;
	
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Deal Type"] = $fdata;
//	Projected Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
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
		$fdata["FullName"] = "company.`Projected Fee`";
	
		
		
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
	
		
		
	$tdatacompany["Projected Fee"] = $fdata;
//	Projected Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
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
		$fdata["FullName"] = "company.`Projected Transaction Size`";
	
		
		
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
	
		
		
	$tdatacompany["Projected Transaction Size"] = $fdata;
//	Est. Close Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
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
		$fdata["FullName"] = "company.`Est. Close Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Est. Close Date"] = $fdata;
//	Primary Banker
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
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
		$fdata["FullName"] = "company.`Primary Banker`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 1;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
	$edata["autoCompleteFields"][] = array('masterF'=>"Team-1", 'lookupF'=>"Name");
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Primary Banker"] = $fdata;
//	Practice Area
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
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
		$fdata["FullName"] = "company.`Practice Area`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Business Services";
	$edata["LookupValues"][] = "Chemicals & Plastics";
	$edata["LookupValues"][] = "Consumer Products";
	$edata["LookupValues"][] = "Corporate";
	$edata["LookupValues"][] = "Energy & Natural Resources";
	$edata["LookupValues"][] = "Financial Institutions";
	$edata["LookupValues"][] = "Financial Technology";
	$edata["LookupValues"][] = "Healthcare";
	$edata["LookupValues"][] = "Industrials";
	$edata["LookupValues"][] = "LATAM";
	$edata["LookupValues"][] = "Life Sciences";
	$edata["LookupValues"][] = "Mining & Minerals";
	$edata["LookupValues"][] = "Other";
	$edata["LookupValues"][] = "Professional IT Services";
	$edata["LookupValues"][] = "Recycling & Waste";
	$edata["LookupValues"][] = "Restructuring";
	$edata["LookupValues"][] = "Supply Chain & Logistics ";
	$edata["LookupValues"][] = "TMT";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Practice Area"] = $fdata;
//	Ownership Class
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
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
		$fdata["FullName"] = "company.`Ownership Class`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Public";
	$edata["LookupValues"][] = "Private Equity Owned";
	$edata["LookupValues"][] = "Privately Owned";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Ownership Class"] = $fdata;
//	Industry
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
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
		$fdata["FullName"] = "company.Industry";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Industrials - Aerospace/Defense";
	$edata["LookupValues"][] = "Industrials - Automotive";
	$edata["LookupValues"][] = "Industrials - Building Products & Construction Services";
	$edata["LookupValues"][] = "Industrials - Construction Svcs and Homebuilders";
	$edata["LookupValues"][] = "Industrials - Chemicals";
	$edata["LookupValues"][] = "Industrials - Plastics";
	$edata["LookupValues"][] = "Industrials - Forest and Paper Products";
	$edata["LookupValues"][] = "Industrials - Packaging";
	$edata["LookupValues"][] = "Industrials - Technology";
	$edata["LookupValues"][] = "Industrials - Technology - Photonics";
	$edata["LookupValues"][] = "Industrials - Technology - Controls, Instruments & Sensors";
	$edata["LookupValues"][] = "Industrials - Technology - Power Transmission Equipment";
	$edata["LookupValues"][] = "Industrials - Technology - Highly Engineered Components";
	$edata["LookupValues"][] = "Industrials - Technology - Robotics";
	$edata["LookupValues"][] = "Industrials - Manufacturing, Equipment & Materials";
	$edata["LookupValues"][] = "Industrials - Manufacturing, Equipment & Materials - Agricultural Equipment & Materials";
	$edata["LookupValues"][] = "Industrials - Manufacturing, Equipment & Materials - Maritime Shipbuilding & Port Equipment";
	$edata["LookupValues"][] = "Industrials - Manufacturing, Equipment & Materials - Capital Equipment Manufacturers";
	$edata["LookupValues"][] = "Industrials - Manufacturing, Equipment & Materials - Metals Fabrication, Steel & Scrap";
	$edata["LookupValues"][] = "Industrials - Basic Industrial Equipment";
	$edata["LookupValues"][] = "Industrials - Outsourced Manufacturing";
	$edata["LookupValues"][] = "Industrials - Other";
	$edata["LookupValues"][] = "Consumer & Retail - Food Processing and Distribution";
	$edata["LookupValues"][] = "Consumer & Retail - Food and Beverage";
	$edata["LookupValues"][] = "Consumer & Retail - Organic/Natural Foods/Nutraceuticals (Healthy Living)";
	$edata["LookupValues"][] = "Consumer & Retail - Food Retailing";
	$edata["LookupValues"][] = "Consumer & Retail - Specialty Retailing";
	$edata["LookupValues"][] = "Consumer & Retail - Restaurants and Related Equipment";
	$edata["LookupValues"][] = "Consumer & Retail - Branded Consumer/Private Label";
	$edata["LookupValues"][] = "Consumer & Retail - Gas Retail / Convenience Store";
	$edata["LookupValues"][] = "Consumer & Retail - Car Dealers / Auto Repair & Service";
	$edata["LookupValues"][] = "Consumer & Retail - Agribusiness";
	$edata["LookupValues"][] = "Consumer & Retail - Apparel";
	$edata["LookupValues"][] = "Consumer & Retail - Other";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Telecom";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Telecom - Network Hardware";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Telecom - Services";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Telecom - Cable";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Tech";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Tech - Hardware";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Tech - Software";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Tech - Wireless";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media - Internet Media and Marketing";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media - TV & Radio";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media - Outdoor Advertising";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media - Printing";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Media - Publishing";
	$edata["LookupValues"][] = "Technology/Media/Telecom - Other";
	$edata["LookupValues"][] = "Entertainment - Gaming (Facilities based)";
	$edata["LookupValues"][] = "Entertainment - On Line Gaming";
	$edata["LookupValues"][] = "Entertainment - Hospitality";
	$edata["LookupValues"][] = "Entertainment - Leisure (Properties/Services)";
	$edata["LookupValues"][] = "Entertainment - Movies and Film/Theaters";
	$edata["LookupValues"][] = "Entertainment - Amusement Parks/Arcades/Specialty Entertainment";
	$edata["LookupValues"][] = "Entertainment - Other";
	$edata["LookupValues"][] = "Energy & Natural Resources - Oil & Gas";
	$edata["LookupValues"][] = "Energy & Natural Resources - Oil & Gas - E&P";
	$edata["LookupValues"][] = "Energy & Natural Resources - Oil & Gas - Refining & Storage";
	$edata["LookupValues"][] = "Energy & Natural Resources - Oil & Gas - Pipelines";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services - Oilfield Services";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services - Donwstream Equipment & Services";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services - Transportation & Marketing";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services - Drilling & Energy Fluids";
	$edata["LookupValues"][] = "Energy & Natural Resources - Energy Services - Engineering & Global Services";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Wind";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Solar";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Geothermal";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Hydro";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Biofuels";
	$edata["LookupValues"][] = "Energy & Natural Resources - Alternative - Clean Tech";
	$edata["LookupValues"][] = "Energy & Natural Resources - Forestry, Paper & Pulp";
	$edata["LookupValues"][] = "Energy & Natural Resources - Project Finance";
	$edata["LookupValues"][] = "Energy & Natural Resources - Refining";
	$edata["LookupValues"][] = "Energy & Natural Resources - Pipeline";
	$edata["LookupValues"][] = "Energy & Natural Resources - Mining";
	$edata["LookupValues"][] = "Energy & Natural Resources - Mining - Base, Precious & Specialty Metals";
	$edata["LookupValues"][] = "Energy & Natural Resources - Mining - Coal & Uranium";
	$edata["LookupValues"][] = "Energy & Natural Resources - Mining - Industrial Minerals";
	$edata["LookupValues"][] = "Energy & Natural Resources - Utilities";
	$edata["LookupValues"][] = "Energy & Natural Resources - Power Generation";
	$edata["LookupValues"][] = "Energy & Natural Resources - Power Generatsion - Regulated & IPP";
	$edata["LookupValues"][] = "Energy & Natural Resources - Power Generatsion - Infrastructure";
	$edata["LookupValues"][] = "Energy & Natural Resources - Power Generatsion - Related Process Technology";
	$edata["LookupValues"][] = "Energy & Natural Resources - Water and Water Rights";
	$edata["LookupValues"][] = "Energy & Natural Resources - Other";
	$edata["LookupValues"][] = "Healthcare - Services";
	$edata["LookupValues"][] = "Healthcare - Services - SNF/ALF";
	$edata["LookupValues"][] = "Healthcare - Services - Home health care";
	$edata["LookupValues"][] = "Healthcare - Services - Acute Care Services";
	$edata["LookupValues"][] = "Healthcare - Services - Outpatient Services";
	$edata["LookupValues"][] = "Healthcare - Services - Death Care";
	$edata["LookupValues"][] = "Healthcare - Services - Distribution";
	$edata["LookupValues"][] = "Healthcare - Services - Pharmacy/PBM";
	$edata["LookupValues"][] = "Healthcare - Services - Diagnostics/Labs";
	$edata["LookupValues"][] = "Healthcare - Devices";
	$edata["LookupValues"][] = "Healthcare - Pharmaceuticals";
	$edata["LookupValues"][] = "Healthcare - Biotech / Life Sciences";
	$edata["LookupValues"][] = "Healthcare - Medical Information/Technology (HCIT)";
	$edata["LookupValues"][] = "Healthcare - Other";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Specialty Distribution";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Value-Added Distribution";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Local, LTL & OTR Transportation";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Third Party Logistics";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Specialty Transportation";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Maritime Shipping & Ports";
	$edata["LookupValues"][] = "Business Services - Distribution, Transportation & Logistics - Rail";
	$edata["LookupValues"][] = "Business Services - Staffing & Recruitment";
	$edata["LookupValues"][] = "Business Services - Staffing & Recruitment - Executive Search Management";
	$edata["LookupValues"][] = "Business Services - Staffing & Recruitment - HR Outsourcing";
	$edata["LookupValues"][] = "Business Services - Franchising";
	$edata["LookupValues"][] = "Business Services - Franchising - Franchisors";
	$edata["LookupValues"][] = "Business Services - Franchising - Multi-Unit Franchisees";
	$edata["LookupValues"][] = "Business Services - Education and Training";
	$edata["LookupValues"][] = "Business Services - Education & Training - Educational Technology";
	$edata["LookupValues"][] = "Business Services - Education & Training - IT/Software Training";
	$edata["LookupValues"][] = "Business Services - Education & Training - Vocational/Trade Schools";
	$edata["LookupValues"][] = "Business Services - Education & Training - Sales & Management Development";
	$edata["LookupValues"][] = "Business Services - Education & Training - Proprietary Skills Training";
	$edata["LookupValues"][] = "Business Services - Professional Services & Consulting";
	$edata["LookupValues"][] = "Business Services - Professional Services & Consulting - Engineering";
	$edata["LookupValues"][] = "Business Services - Professional Services & Consulting - Management Consulting";
	$edata["LookupValues"][] = "Business Services - Waste Management & Recycling";
	$edata["LookupValues"][] = "Business Services - Engineering, Architecture, Design Firms";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security - Alarm & Monitoring";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security - Systems Integrators";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security - Guard Services";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security - Biometrics";
	$edata["LookupValues"][] = "Business Services - Physical & Cyber Security - Compliance & Risk Management";
	$edata["LookupValues"][] = "Business Services - Support Services";
	$edata["LookupValues"][] = "Business Services - Support Services - BPO";
	$edata["LookupValues"][] = "Business Services - Support Services - Call Centers";
	$edata["LookupValues"][] = "Business Services - Information Technology Services";
	$edata["LookupValues"][] = "Business Services - Information Technology Services - Consulting";
	$edata["LookupValues"][] = "Business Services - Information Technology Services - Outsourcing";
	$edata["LookupValues"][] = "Business Services - Information Technology Services - Staffing";
	$edata["LookupValues"][] = "Business Services - Other";
	$edata["LookupValues"][] = "Financial Services - Banks";
	$edata["LookupValues"][] = "Financial Services - Insurance";
	$edata["LookupValues"][] = "Financial Services - Financial Technology & Services";
	$edata["LookupValues"][] = "Financial Services - Specialty Finance Companies";
	$edata["LookupValues"][] = "Financial Services - Leasing Companies/Equipment Rental";
	$edata["LookupValues"][] = "Financial Services - Investment Management";
	$edata["LookupValues"][] = "Financial Services - Other";
	$edata["LookupValues"][] = "Real Estate - REITs";
	$edata["LookupValues"][] = "Real Estate - Developers";
	$edata["LookupValues"][] = "Real Estate - Real Estate Management";
	$edata["LookupValues"][] = "Real Estate - Other";
	$edata["LookupValues"][] = "Other";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Industry"] = $fdata;
//	Referral Type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
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
		$fdata["FullName"] = "company.`Referral Type`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "IBS to Practice";
	$edata["LookupValues"][] = "Corporate to Practice";
	$edata["LookupValues"][] = "Practice to Practice";
	$edata["LookupValues"][] = "MA to Practice";
	$edata["LookupValues"][] = "SC to Practice";
	$edata["LookupValues"][] = "Sole Sourced";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Referral Type"] = $fdata;
//	Referral Source-Company
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
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
		$fdata["FullName"] = "company.`Referral Source-Company`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "referral company";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Referral Source-Company"] = $fdata;
//	Referral Scource-Ind.
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
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
		$fdata["FullName"] = "company.`Referral Scource-Ind.`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "referral individual";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Referral Scource-Ind."] = $fdata;
//	Description
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
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
		$fdata["FullName"] = "company.Description";
	
		
		
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
	
		
		
	$tdatacompany["Description"] = $fdata;
//	Dead Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
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
		$fdata["FullName"] = "company.`Dead Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Dead Date"] = $fdata;
//	EL Expiration Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
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
		$fdata["FullName"] = "company.`EL Expiration Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["EL Expiration Date"] = $fdata;
//	Engagment Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
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
		$fdata["FullName"] = "company.`Engagment Fee`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdatacompany["Engagment Fee"] = $fdata;
//	Fee Minimum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
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
		$fdata["FullName"] = "company.`Fee Minimum`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdatacompany["Fee Minimum"] = $fdata;
//	Final Total Sucess Fee
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
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
		$fdata["FullName"] = "company.`Final Total Sucess Fee`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdatacompany["Final Total Sucess Fee"] = $fdata;
//	Final Transaction Size
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
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
		$fdata["FullName"] = "company.`Final Transaction Size`";
	
		
		
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
	
		
		
	$tdatacompany["Final Transaction Size"] = $fdata;
//	Monthly Retainer
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
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
		$fdata["FullName"] = "company.`Monthly Retainer`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdatacompany["Monthly Retainer"] = $fdata;
//	Closed Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
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
		$fdata["FullName"] = "company.`Closed Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Closed Date"] = $fdata;
//	Team Split-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
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
		$fdata["FullName"] = "company.`Team Split-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-1"] = $fdata;
//	Team-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
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
		$fdata["FullName"] = "company.`Team-1`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-1"] = $fdata;
//	Team Split-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
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
		$fdata["FullName"] = "company.`Team Split-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-2"] = $fdata;
//	Team-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
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
		$fdata["FullName"] = "company.`Team-2`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-2"] = $fdata;
//	Team Split-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
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
		$fdata["FullName"] = "company.`Team Split-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-3"] = $fdata;
//	Team Split-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
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
		$fdata["FullName"] = "company.`Team Split-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-4"] = $fdata;
//	Team Split-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
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
		$fdata["FullName"] = "company.`Team Split-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-5"] = $fdata;
//	Team Split-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
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
		$fdata["FullName"] = "company.`Team Split-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Team Split-6"] = $fdata;
//	Team-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
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
		$fdata["FullName"] = "company.`Team-3`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-3"] = $fdata;
//	Team-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
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
		$fdata["FullName"] = "company.`Team-4`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-4"] = $fdata;
//	Team-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
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
		$fdata["FullName"] = "company.`Team-5`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-5"] = $fdata;
//	Team-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
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
		$fdata["FullName"] = "company.`Team-6`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "bankers";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Team-6"] = $fdata;
//	Fee Split-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
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
		$fdata["FullName"] = "company.`Fee Split-1`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-1"] = $fdata;
//	Fee Split-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
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
		$fdata["FullName"] = "company.`Fee Split-2`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-2"] = $fdata;
//	Fee Split-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
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
		$fdata["FullName"] = "company.`Fee Split-3`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-3"] = $fdata;
//	Fee Split-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
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
		$fdata["FullName"] = "company.`Fee Split-4`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-4"] = $fdata;
//	Fee Split-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
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
		$fdata["FullName"] = "company.`Fee Split-5`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-5"] = $fdata;
//	Fee Split-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
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
		$fdata["FullName"] = "company.`Fee Split-6`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Percent");
	
		
		
		
			
		
		
		
		
		
		
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
	
		
		
	$tdatacompany["Fee Split-6"] = $fdata;
//	Fee To-1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
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
		$fdata["FullName"] = "company.`Fee To-1`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-1"] = $fdata;
//	Fee To-2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
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
		$fdata["FullName"] = "company.`Fee To-2`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-2"] = $fdata;
//	Fee To-3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
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
		$fdata["FullName"] = "company.`Fee To-3`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-3"] = $fdata;
//	Fee To-4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
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
		$fdata["FullName"] = "company.`Fee To-4`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-4"] = $fdata;
//	Fee To-5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
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
		$fdata["FullName"] = "company.`Fee To-5`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-5"] = $fdata;
//	Fee To-6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
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
		$fdata["FullName"] = "company.`Fee To-6`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Name";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Name";
	
		
	$edata["LookupTable"] = "fee split";
	$edata["LookupOrderBy"] = "Name";
	
		
		
		
		
		$edata["AllowToAdd"] = true; 
	
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Fee To-6"] = $fdata;
//	Enterpise Value
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
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
		$fdata["FullName"] = "company.`Enterpise Value`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "< \$10mm";
	$edata["LookupValues"][] = "\$10mm - \$25mm";
	$edata["LookupValues"][] = "\$25mm - \$75mm";
	$edata["LookupValues"][] = "\$75mm - \$100mm";
	$edata["LookupValues"][] = "< \$150mm";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Enterpise Value"] = $fdata;
//	Fee Details
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
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
		$fdata["FullName"] = "company.`Fee Details`";
	
		
		
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
	
		
		
	$tdatacompany["Fee Details"] = $fdata;
//	Split to Corporate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
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
		$fdata["FullName"] = "company.`Split to Corporate`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdatacompany["Split to Corporate"] = $fdata;
//	Paul
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
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
		$fdata["FullName"] = "company.Paul";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Checkbox");
	
		
		
		
			
		
		
		
		
		
		
		
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Checkbox");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Paul"] = $fdata;
//	McBroom
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
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
		$fdata["FullName"] = "company.McBroom";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Checkbox");
	
		
		
		
			
		
		
		
		
		
		
		
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Checkbox");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["McBroom"] = $fdata;
//	IBC Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
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
		$fdata["FullName"] = "company.`IBC Date`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["IBC Date"] = $fdata;
//	Gross Next
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "Gross Next";
	$fdata["GoodName"] = "Gross_Next";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Gross Next"; 
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
	
		$fdata["strField"] = "Gross Next"; 
		$fdata["FullName"] = "company.`Gross Next`";
	
		
		
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
	
		
		
	$tdatacompany["Gross Next"] = $fdata;
//	Gross This
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "Gross This";
	$fdata["GoodName"] = "Gross_This";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Gross This"; 
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
	
		$fdata["strField"] = "Gross This"; 
		$fdata["FullName"] = "company.`Gross This`";
	
		
		
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
	
		
		
	$tdatacompany["Gross This"] = $fdata;
//	Month of Close
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "Month of Close";
	$fdata["GoodName"] = "Month_of_Close";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Month of Close"; 
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
	
		$fdata["strField"] = "Month of Close"; 
		$fdata["FullName"] = "company.`Month of Close`";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Month of Close"] = $fdata;
//	Deal Slot
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
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
		$fdata["FullName"] = "company.`Deal Slot`";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Wheelhouse";
	$edata["LookupValues"][] = "Speculative";
	$edata["LookupValues"][] = "Minimum";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Deal Slot"] = $fdata;
//	Pipeline
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "Pipeline";
	$fdata["GoodName"] = "Pipeline";
	$fdata["ownerTable"] = "company";
	$fdata["Label"] = "Pipeline"; 
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
	
		$fdata["strField"] = "Pipeline"; 
		$fdata["FullName"] = "company.Pipeline";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
					$edata["LookupType"] = 0;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "Corporate Revenue Pipeline";
	$edata["LookupValues"][] = "IBS - Non-Corporate Pipeline";
	$edata["LookupValues"][] = "Standard Margine Pipeline - Non-Corporate";

	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatacompany["Pipeline"] = $fdata;

	
$tables_data["company"]=&$tdatacompany;
$field_labels["company"] = &$fieldLabelscompany;
$fieldToolTips["company"] = &$fieldToolTipscompany;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["company"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="bankers";
	$detailsParam["dDataSourceTable"]="bankers";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="bankers";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="1";
	$detailsParam["previewOnList"]= 2;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["company"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Primary Banker";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-1";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-2";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-3";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-4";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-5";
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Team-6";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";

$dIndex = 2-1;
			$strOriginalDetailsTable="referral company";
	$detailsParam["dDataSourceTable"]="referral company";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="referral_company";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="1";
	$detailsParam["previewOnList"]= 2;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["company"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Referral Source-Company";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";

$dIndex = 3-1;
			$strOriginalDetailsTable="referral individual";
	$detailsParam["dDataSourceTable"]="referral individual";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="referral_individual";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="1";
	$detailsParam["previewOnList"]= 2;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["company"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["company"][$dIndex]["masterKeys"][]="Referral Scource-Ind.";
		$detailsTablesData["company"][$dIndex]["detailKeys"][]="Name";

	
// tables which are master tables for current table (detail)
$masterTablesData["company"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_company()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "company.ID,  company.Company,  company.`EL Date`,  company.`Project Name`,  company.Status,  company.`Deal Type`,  company.`Projected Fee`,  company.`Projected Transaction Size`,  company.`Est. Close Date`,  company.`Primary Banker`,  company.`Practice Area`,  company.`Ownership Class`,  company.Industry,  company.`Referral Type`,  company.`Referral Source-Company`,  company.`Referral Scource-Ind.`,  company.Description,  company.`Dead Date`,  company.`EL Expiration Date`,  company.`Engagment Fee`,  company.`Fee Minimum`,  company.`Final Total Sucess Fee`,  company.`Final Transaction Size`,  company.`Monthly Retainer`,  company.`Closed Date`,  company.`Team Split-1`,  company.`Team-1`,  company.`Team Split-2`,  company.`Team-2`,  company.`Team Split-3`,  company.`Team Split-4`,  company.`Team Split-5`,  company.`Team Split-6`,  company.`Team-3`,  company.`Team-4`,  company.`Team-5`,  company.`Team-6`,  company.`Fee Split-1`,  company.`Fee Split-2`,  company.`Fee Split-3`,  company.`Fee Split-4`,  company.`Fee Split-5`,  company.`Fee Split-6`,  company.`Fee To-1`,  company.`Fee To-2`,  company.`Fee To-3`,  company.`Fee To-4`,  company.`Fee To-5`,  company.`Fee To-6`,  company.`Enterpise Value`,  company.`Fee Details`,  company.`Split to Corporate`,  company.Paul,  company.McBroom,  company.`IBC Date`,  company.`Gross Next`,  company.`Gross This`,  company.`Month of Close`,  company.`Deal Slot`,  company.Pipeline";
$proto0["m_strFrom"] = "FROM company  LEFT OUTER JOIN bankers ON company.`Primary Banker` = bankers.Name";
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
	"m_strTable" => "company"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Company",
	"m_strTable" => "company"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Date",
	"m_strTable" => "company"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Project Name",
	"m_strTable" => "company"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Status",
	"m_strTable" => "company"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Type",
	"m_strTable" => "company"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Fee",
	"m_strTable" => "company"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Projected Transaction Size",
	"m_strTable" => "company"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "Est. Close Date",
	"m_strTable" => "company"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "Practice Area",
	"m_strTable" => "company"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "Ownership Class",
	"m_strTable" => "company"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "Industry",
	"m_strTable" => "company"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Type",
	"m_strTable" => "company"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Source-Company",
	"m_strTable" => "company"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "Referral Scource-Ind.",
	"m_strTable" => "company"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "Description",
	"m_strTable" => "company"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "Dead Date",
	"m_strTable" => "company"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "EL Expiration Date",
	"m_strTable" => "company"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "Engagment Fee",
	"m_strTable" => "company"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Minimum",
	"m_strTable" => "company"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "Final Total Sucess Fee",
	"m_strTable" => "company"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "Final Transaction Size",
	"m_strTable" => "company"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "Monthly Retainer",
	"m_strTable" => "company"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "Closed Date",
	"m_strTable" => "company"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-1",
	"m_strTable" => "company"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-1",
	"m_strTable" => "company"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-2",
	"m_strTable" => "company"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-2",
	"m_strTable" => "company"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-3",
	"m_strTable" => "company"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-4",
	"m_strTable" => "company"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-5",
	"m_strTable" => "company"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "Team Split-6",
	"m_strTable" => "company"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-3",
	"m_strTable" => "company"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-4",
	"m_strTable" => "company"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-5",
	"m_strTable" => "company"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "Team-6",
	"m_strTable" => "company"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-1",
	"m_strTable" => "company"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-2",
	"m_strTable" => "company"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-3",
	"m_strTable" => "company"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-4",
	"m_strTable" => "company"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-5",
	"m_strTable" => "company"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Split-6",
	"m_strTable" => "company"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-1",
	"m_strTable" => "company"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-2",
	"m_strTable" => "company"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-3",
	"m_strTable" => "company"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-4",
	"m_strTable" => "company"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-5",
	"m_strTable" => "company"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee To-6",
	"m_strTable" => "company"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "Enterpise Value",
	"m_strTable" => "company"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "Fee Details",
	"m_strTable" => "company"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "Split to Corporate",
	"m_strTable" => "company"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "Paul",
	"m_strTable" => "company"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "McBroom",
	"m_strTable" => "company"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "IBC Date",
	"m_strTable" => "company"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross Next",
	"m_strTable" => "company"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
						$proto117=array();
			$obj = new SQLField(array(
	"m_strName" => "Gross This",
	"m_strTable" => "company"
));

$proto117["m_expr"]=$obj;
$proto117["m_alias"] = "";
$obj = new SQLFieldListItem($proto117);

$proto0["m_fieldlist"][]=$obj;
						$proto119=array();
			$obj = new SQLField(array(
	"m_strName" => "Month of Close",
	"m_strTable" => "company"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "";
$obj = new SQLFieldListItem($proto119);

$proto0["m_fieldlist"][]=$obj;
						$proto121=array();
			$obj = new SQLField(array(
	"m_strName" => "Deal Slot",
	"m_strTable" => "company"
));

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "";
$obj = new SQLFieldListItem($proto121);

$proto0["m_fieldlist"][]=$obj;
						$proto123=array();
			$obj = new SQLField(array(
	"m_strName" => "Pipeline",
	"m_strTable" => "company"
));

$proto123["m_expr"]=$obj;
$proto123["m_alias"] = "";
$obj = new SQLFieldListItem($proto123);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto125=array();
$proto125["m_link"] = "SQLL_MAIN";
			$proto126=array();
$proto126["m_strName"] = "company";
$proto126["m_columns"] = array();
$proto126["m_columns"][] = "ID";
$proto126["m_columns"][] = "Company";
$proto126["m_columns"][] = "Deal Slot";
$proto126["m_columns"][] = "IBC Date";
$proto126["m_columns"][] = "EL Date";
$proto126["m_columns"][] = "Project Name";
$proto126["m_columns"][] = "Status";
$proto126["m_columns"][] = "Deal Type";
$proto126["m_columns"][] = "Projected Fee";
$proto126["m_columns"][] = "Projected Transaction Size";
$proto126["m_columns"][] = "Est. Close Date";
$proto126["m_columns"][] = "Primary Banker";
$proto126["m_columns"][] = "Practice Area";
$proto126["m_columns"][] = "Ownership Class";
$proto126["m_columns"][] = "Industry";
$proto126["m_columns"][] = "Referral Type";
$proto126["m_columns"][] = "Referral Source-Company";
$proto126["m_columns"][] = "Referral Scource-Ind.";
$proto126["m_columns"][] = "Description";
$proto126["m_columns"][] = "Dead Date";
$proto126["m_columns"][] = "EL Expiration Date";
$proto126["m_columns"][] = "Engagment Fee";
$proto126["m_columns"][] = "Fee Minimum";
$proto126["m_columns"][] = "Final Total Sucess Fee";
$proto126["m_columns"][] = "Final Transaction Size";
$proto126["m_columns"][] = "Monthly Retainer";
$proto126["m_columns"][] = "Closed Date";
$proto126["m_columns"][] = "Team Split-1";
$proto126["m_columns"][] = "Team-1";
$proto126["m_columns"][] = "Team Split-2";
$proto126["m_columns"][] = "Team-2";
$proto126["m_columns"][] = "Team Split-3";
$proto126["m_columns"][] = "Team Split-4";
$proto126["m_columns"][] = "Team Split-5";
$proto126["m_columns"][] = "Team Split-6";
$proto126["m_columns"][] = "Team-3";
$proto126["m_columns"][] = "Team-4";
$proto126["m_columns"][] = "Team-5";
$proto126["m_columns"][] = "Team-6";
$proto126["m_columns"][] = "Fee Split-1";
$proto126["m_columns"][] = "Fee Split-2";
$proto126["m_columns"][] = "Fee Split-3";
$proto126["m_columns"][] = "Fee Split-4";
$proto126["m_columns"][] = "Fee Split-5";
$proto126["m_columns"][] = "Fee Split-6";
$proto126["m_columns"][] = "Fee To-1";
$proto126["m_columns"][] = "Fee To-2";
$proto126["m_columns"][] = "Fee To-3";
$proto126["m_columns"][] = "Fee To-4";
$proto126["m_columns"][] = "Fee To-5";
$proto126["m_columns"][] = "Fee To-6";
$proto126["m_columns"][] = "Enterpise Value";
$proto126["m_columns"][] = "Fee Details";
$proto126["m_columns"][] = "Split to Corporate";
$proto126["m_columns"][] = "Paul";
$proto126["m_columns"][] = "McBroom";
$proto126["m_columns"][] = "Month of Close";
$proto126["m_columns"][] = "Gross This";
$proto126["m_columns"][] = "Gross Next";
$proto126["m_columns"][] = "Pipeline";
$obj = new SQLTable($proto126);

$proto125["m_table"] = $obj;
$proto125["m_alias"] = "";
$proto127=array();
$proto127["m_sql"] = "";
$proto127["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto127["m_column"]=$obj;
$proto127["m_contained"] = array();
$proto127["m_strCase"] = "";
$proto127["m_havingmode"] = "0";
$proto127["m_inBrackets"] = "0";
$proto127["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto127);

$proto125["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto125);

$proto0["m_fromlist"][]=$obj;
												$proto129=array();
$proto129["m_link"] = "SQLL_LEFTJOIN";
			$proto130=array();
$proto130["m_strName"] = "bankers";
$proto130["m_columns"] = array();
$proto130["m_columns"][] = "ID";
$proto130["m_columns"][] = "Name";
$proto130["m_columns"][] = "Start Date";
$proto130["m_columns"][] = "Budget Year";
$proto130["m_columns"][] = "Active";
$proto130["m_columns"][] = "YTD Revenue";
$proto130["m_columns"][] = "Last Year Rev";
$proto130["m_columns"][] = "Prior Year Rev";
$proto130["m_columns"][] = "Last Year Rank";
$proto130["m_columns"][] = "YTD+Last";
$proto130["m_columns"][] = "YTD+Last+Prior";
$proto130["m_columns"][] = "YTD Closing";
$proto130["m_columns"][] = "Last Year Closing";
$proto130["m_columns"][] = "YTD IBC";
$proto130["m_columns"][] = "YTD Engagements";
$proto130["m_columns"][] = "Total Current Engagments";
$proto130["m_columns"][] = "# Wheelhouse";
$proto130["m_columns"][] = "# Speculative";
$proto130["m_columns"][] = "# Minimum";
$proto130["m_columns"][] = "Last Name";
$proto130["m_columns"][] = "First Name";
$obj = new SQLTable($proto130);

$proto129["m_table"] = $obj;
$proto129["m_alias"] = "";
$proto131=array();
$proto131["m_sql"] = "company.`Primary Banker` = bankers.Name";
$proto131["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Primary Banker",
	"m_strTable" => "company"
));

$proto131["m_column"]=$obj;
$proto131["m_contained"] = array();
$proto131["m_strCase"] = "= bankers.Name";
$proto131["m_havingmode"] = "0";
$proto131["m_inBrackets"] = "0";
$proto131["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto131);

$proto129["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto129);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_company = createSqlQuery_company();
																																																												$tdatacompany[".sqlquery"] = $queryData_company;
	
if(isset($tdatacompany["field2"])){
	$tdatacompany["field2"]["LookupTable"] = "carscars_view";
	$tdatacompany["field2"]["LookupOrderBy"] = "name";
	$tdatacompany["field2"]["LookupType"] = 4;
	$tdatacompany["field2"]["LinkField"] = "email";
	$tdatacompany["field2"]["DisplayField"] = "name";
	$tdatacompany[".hasCustomViewField"] = true;
}

$tableEvents["company"] = new eventsBase;
$tdatacompany[".hasEvents"] = false;

$cipherer = new RunnerCipherer("company");

?>