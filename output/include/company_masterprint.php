<?php
include_once(getabspath("include/company_settings.php"));

function DisplayMasterTableInfo_company($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="company";

//$strSQL = "SELECT  company.ID,  company.Company,  company.`EL Date`,  company.`Project Name`,  company.Status,  company.`Deal Type`,  company.`Projected Fee`,  company.`Projected Transaction Size`,  company.`Est. Close Date`,  company.`Primary Banker`,  company.`Practice Area`,  company.`Ownership Class`,  company.Industry,  company.`Referral Type`,  company.`Referral Source-Company`,  company.`Referral Scource-Ind.`,  company.Description,  company.`Dead Date`,  company.`EL Expiration Date`,  company.`Engagment Fee`,  company.`Fee Minimum`,  company.`Final Total Sucess Fee`,  company.`Final Transaction Size`,  company.`Monthly Retainer`,  company.`Closed Date`,  company.`Team Split-1`,  company.`Team-1`,  company.`Team Split-2`,  company.`Team-2`,  company.`Team Split-3`,  company.`Team Split-4`,  company.`Team Split-5`,  company.`Team Split-6`,  company.`Team-3`,  company.`Team-4`,  company.`Team-5`,  company.`Team-6`,  company.`Fee Split-1`,  company.`Fee Split-2`,  company.`Fee Split-3`,  company.`Fee Split-4`,  company.`Fee Split-5`,  company.`Fee Split-6`,  company.`Fee To-1`,  company.`Fee To-2`,  company.`Fee To-3`,  company.`Fee To-4`,  company.`Fee To-5`,  company.`Fee To-6`,  company.`Enterpise Value`,  company.`Fee Details`,  company.`Split to Corporate`,  company.Paul,  company.McBroom,  company.`IBC Date`,  company.`Gross Next`,  company.`Gross This`,  company.`Month of Close`,  company.`Deal Slot`,  company.Pipeline  FROM company  LEFT OUTER JOIN bankers ON company.`Primary Banker` = bankers.Name  ";

	$cipherer = new RunnerCipherer($strTableName);
	$settings = new ProjectSettings($strTableName, PAGE_PRINT);
	
	$masterQuery = $settings->getSQLQuery();
	$viewControls = new ViewControlsContainer($settings, PAGE_PRINT);

$where="";

global $pageObject, $page_styles, $page_layouts, $page_layout_names, $container_styles;
$layout = new TLayout("masterprint","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["company_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="bankers")
{
		$where.= GetFullFieldName("Primary Banker", "", false)."=".$cipherer->MakeDBValue("Primary Banker",$keys[1-1], "", "", true);
	$showKeys .= " "."Primary Banker".": ".$keys[1-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-1", "", false)."=".$cipherer->MakeDBValue("Team-1",$keys[2-1], "", "", true);
	$showKeys .= " "."Team-1".": ".$keys[2-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-2", "", false)."=".$cipherer->MakeDBValue("Team-2",$keys[3-1], "", "", true);
	$showKeys .= " "."Team-2".": ".$keys[3-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-3", "", false)."=".$cipherer->MakeDBValue("Team-3",$keys[4-1], "", "", true);
	$showKeys .= " "."Team-3".": ".$keys[4-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-4", "", false)."=".$cipherer->MakeDBValue("Team-4",$keys[5-1], "", "", true);
	$showKeys .= " "."Team-4".": ".$keys[5-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-5", "", false)."=".$cipherer->MakeDBValue("Team-5",$keys[6-1], "", "", true);
	$showKeys .= " "."Team-5".": ".$keys[6-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("Team-6", "", false)."=".$cipherer->MakeDBValue("Team-6",$keys[7-1], "", "", true);
	$showKeys .= " "."Team-6".": ".$keys[7-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="referral company")
{
		$where.= GetFullFieldName("Referral Source-Company", "", false)."=".$cipherer->MakeDBValue("Referral Source-Company",$keys[1-1], "", "", true);
	$showKeys .= " "."Referral Source-Company".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="referral individual")
{
		$where.= GetFullFieldName("Referral Scource-Ind.", "", false)."=".$cipherer->MakeDBValue("Referral Scource-Ind.",$keys[1-1], "", "", true);
	$showKeys .= " "."Referral Scource-Ind.".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if(!$where)
{
	$strTableName=$oldTableName;
	return;
}
	$str = SecuritySQL("Export");
	if(strlen($str))
		$where.=" and ".$str;
	
	$strWhere = whereAdd($masterQuery->m_where->toSql($masterQuery),$where);
	if(strlen($strWhere))
		$strWhere=" where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL=AddWhere($strSQL,$where);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName=$oldTableName;
		return;
	}
	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));
	

//	ID - 
			$xt->assign("ID_mastervalue", $viewControls->showDBValue("ID", $data, $keylink));

//	Company - 
			$xt->assign("Company_mastervalue", $viewControls->showDBValue("Company", $data, $keylink));

//	EL Date - Short Date
			$xt->assign("EL_Date_mastervalue", $viewControls->showDBValue("EL Date", $data, $keylink));

//	Project Name - 
			$xt->assign("Project_Name_mastervalue", $viewControls->showDBValue("Project Name", $data, $keylink));

//	Status - 
			$xt->assign("Status_mastervalue", $viewControls->showDBValue("Status", $data, $keylink));

//	Deal Type - 
			$xt->assign("Deal_Type_mastervalue", $viewControls->showDBValue("Deal Type", $data, $keylink));

//	Projected Fee - Currency
			$xt->assign("Projected_Fee_mastervalue", $viewControls->showDBValue("Projected Fee", $data, $keylink));

//	Projected Transaction Size - Currency
			$xt->assign("Projected_Transaction_Size_mastervalue", $viewControls->showDBValue("Projected Transaction Size", $data, $keylink));

//	Est. Close Date - Short Date
			$xt->assign("Est__Close_Date_mastervalue", $viewControls->showDBValue("Est. Close Date", $data, $keylink));

//	Primary Banker - 
			$xt->assign("Primary_Banker_mastervalue", $viewControls->showDBValue("Primary Banker", $data, $keylink));

//	Practice Area - 
			$xt->assign("Practice_Area_mastervalue", $viewControls->showDBValue("Practice Area", $data, $keylink));

//	Ownership Class - 
			$xt->assign("Ownership_Class_mastervalue", $viewControls->showDBValue("Ownership Class", $data, $keylink));

//	Industry - 
			$xt->assign("Industry_mastervalue", $viewControls->showDBValue("Industry", $data, $keylink));

//	Referral Type - 
			$xt->assign("Referral_Type_mastervalue", $viewControls->showDBValue("Referral Type", $data, $keylink));

//	Referral Source-Company - 
			$xt->assign("Referral_Source_Company_mastervalue", $viewControls->showDBValue("Referral Source-Company", $data, $keylink));

//	Referral Scource-Ind. - 
			$xt->assign("Referral_Scource_Ind__mastervalue", $viewControls->showDBValue("Referral Scource-Ind.", $data, $keylink));

//	Description - 
			$xt->assign("Description_mastervalue", $viewControls->showDBValue("Description", $data, $keylink));

//	Dead Date - Short Date
			$xt->assign("Dead_Date_mastervalue", $viewControls->showDBValue("Dead Date", $data, $keylink));

//	EL Expiration Date - Short Date
			$xt->assign("EL_Expiration_Date_mastervalue", $viewControls->showDBValue("EL Expiration Date", $data, $keylink));

//	Engagment Fee - Number
			$xt->assign("Engagment_Fee_mastervalue", $viewControls->showDBValue("Engagment Fee", $data, $keylink));

//	Fee Minimum - Number
			$xt->assign("Fee_Minimum_mastervalue", $viewControls->showDBValue("Fee Minimum", $data, $keylink));

//	Final Total Sucess Fee - Number
			$xt->assign("Final_Total_Sucess_Fee_mastervalue", $viewControls->showDBValue("Final Total Sucess Fee", $data, $keylink));

//	Final Transaction Size - Currency
			$xt->assign("Final_Transaction_Size_mastervalue", $viewControls->showDBValue("Final Transaction Size", $data, $keylink));

//	Monthly Retainer - Number
			$xt->assign("Monthly_Retainer_mastervalue", $viewControls->showDBValue("Monthly Retainer", $data, $keylink));

//	Closed Date - Short Date
			$xt->assign("Closed_Date_mastervalue", $viewControls->showDBValue("Closed Date", $data, $keylink));

//	Team Split-1 - Percent
			$xt->assign("Team_Split_1_mastervalue", $viewControls->showDBValue("Team Split-1", $data, $keylink));

//	Team-1 - 
			$xt->assign("Team_1_mastervalue", $viewControls->showDBValue("Team-1", $data, $keylink));

//	Team Split-2 - Percent
			$xt->assign("Team_Split_2_mastervalue", $viewControls->showDBValue("Team Split-2", $data, $keylink));

//	Team-2 - 
			$xt->assign("Team_2_mastervalue", $viewControls->showDBValue("Team-2", $data, $keylink));

//	Team Split-3 - Percent
			$xt->assign("Team_Split_3_mastervalue", $viewControls->showDBValue("Team Split-3", $data, $keylink));

//	Team Split-4 - Percent
			$xt->assign("Team_Split_4_mastervalue", $viewControls->showDBValue("Team Split-4", $data, $keylink));

//	Team Split-5 - Percent
			$xt->assign("Team_Split_5_mastervalue", $viewControls->showDBValue("Team Split-5", $data, $keylink));

//	Team Split-6 - Percent
			$xt->assign("Team_Split_6_mastervalue", $viewControls->showDBValue("Team Split-6", $data, $keylink));

//	Team-3 - 
			$xt->assign("Team_3_mastervalue", $viewControls->showDBValue("Team-3", $data, $keylink));

//	Team-4 - 
			$xt->assign("Team_4_mastervalue", $viewControls->showDBValue("Team-4", $data, $keylink));

//	Team-5 - 
			$xt->assign("Team_5_mastervalue", $viewControls->showDBValue("Team-5", $data, $keylink));

//	Team-6 - 
			$xt->assign("Team_6_mastervalue", $viewControls->showDBValue("Team-6", $data, $keylink));

//	Fee Split-1 - Percent
			$xt->assign("Fee_Split_1_mastervalue", $viewControls->showDBValue("Fee Split-1", $data, $keylink));

//	Fee Split-2 - Percent
			$xt->assign("Fee_Split_2_mastervalue", $viewControls->showDBValue("Fee Split-2", $data, $keylink));

//	Fee Split-3 - Percent
			$xt->assign("Fee_Split_3_mastervalue", $viewControls->showDBValue("Fee Split-3", $data, $keylink));

//	Fee Split-4 - Percent
			$xt->assign("Fee_Split_4_mastervalue", $viewControls->showDBValue("Fee Split-4", $data, $keylink));

//	Fee Split-5 - Percent
			$xt->assign("Fee_Split_5_mastervalue", $viewControls->showDBValue("Fee Split-5", $data, $keylink));

//	Fee Split-6 - Percent
			$xt->assign("Fee_Split_6_mastervalue", $viewControls->showDBValue("Fee Split-6", $data, $keylink));

//	Fee To-1 - 
			$xt->assign("Fee_To_1_mastervalue", $viewControls->showDBValue("Fee To-1", $data, $keylink));

//	Fee To-2 - 
			$xt->assign("Fee_To_2_mastervalue", $viewControls->showDBValue("Fee To-2", $data, $keylink));

//	Fee To-3 - 
			$xt->assign("Fee_To_3_mastervalue", $viewControls->showDBValue("Fee To-3", $data, $keylink));

//	Fee To-4 - 
			$xt->assign("Fee_To_4_mastervalue", $viewControls->showDBValue("Fee To-4", $data, $keylink));

//	Fee To-5 - 
			$xt->assign("Fee_To_5_mastervalue", $viewControls->showDBValue("Fee To-5", $data, $keylink));

//	Fee To-6 - 
			$xt->assign("Fee_To_6_mastervalue", $viewControls->showDBValue("Fee To-6", $data, $keylink));

//	Enterpise Value - 
			$xt->assign("Enterpise_Value_mastervalue", $viewControls->showDBValue("Enterpise Value", $data, $keylink));

//	Fee Details - 
			$xt->assign("Fee_Details_mastervalue", $viewControls->showDBValue("Fee Details", $data, $keylink));

//	Split to Corporate - Number
			$xt->assign("Split_to_Corporate_mastervalue", $viewControls->showDBValue("Split to Corporate", $data, $keylink));

//	Paul - Checkbox
			$xt->assign("Paul_mastervalue", $viewControls->showDBValue("Paul", $data, $keylink));

//	McBroom - Checkbox
			$xt->assign("McBroom_mastervalue", $viewControls->showDBValue("McBroom", $data, $keylink));

//	IBC Date - Short Date
			$xt->assign("IBC_Date_mastervalue", $viewControls->showDBValue("IBC Date", $data, $keylink));

//	Gross Next - 
			$xt->assign("Gross_Next_mastervalue", $viewControls->showDBValue("Gross Next", $data, $keylink));

//	Gross This - 
			$xt->assign("Gross_This_mastervalue", $viewControls->showDBValue("Gross This", $data, $keylink));

//	Month of Close - Short Date
			$xt->assign("Month_of_Close_mastervalue", $viewControls->showDBValue("Month of Close", $data, $keylink));

//	Deal Slot - 
			$xt->assign("Deal_Slot_mastervalue", $viewControls->showDBValue("Deal Slot", $data, $keylink));

//	Pipeline - 
			$xt->assign("Pipeline_mastervalue", $viewControls->showDBValue("Pipeline", $data, $keylink));
	$xt->display("company_masterprint.htm");
	$strTableName=$oldTableName;

}

?>