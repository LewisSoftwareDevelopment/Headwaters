<?php
include_once(getabspath("include/company_settings.php"));

function DisplayMasterTableInfo_company($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "company";
	
	$settings = new ProjectSettings($strTableName, PAGE_LIST);
	$cipherer = new RunnerCipherer($strTableName);
	
	$masterQuery = $settings->getSQLQuery();
	
	$viewControls = new ViewControlsContainer($settings, PAGE_LIST);

$where = "";
$mKeys = array();
$showKeys = "";

global $page_styles, $page_layouts, $page_layout_names, $container_styles;

$layout = new TLayout("masterlist","BoldWhite_label2","MobileWhite_label2");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterlistheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterlistfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["company_masterlist"] = $layout;


if($detailtable == "bankers")
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
if($detailtable == "referral company")
{
		$where.= GetFullFieldName("Referral Source-Company", "", false)."=".$cipherer->MakeDBValue("Referral Source-Company",$keys[1-1], "", "", true);
	$showKeys .= " "."Referral Source-Company".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "referral individual")
{
		$where.= GetFullFieldName("Referral Scource-Ind.", "", false)."=".$cipherer->MakeDBValue("Referral Scource-Ind.",$keys[1-1], "", "", true);
	$showKeys .= " "."Referral Scource-Ind.".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
	if(!$where)
	{
		$strTableName = $oldTableName;
		return;
	}
	$str = SecuritySQL("Search");
	if(strlen($str))
		$where.= " and ".$str;

	$strWhere = whereAdd($masterQuery->WhereToSql(),$where);
	if(strlen($strWhere))
		$strWhere = " where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL = AddWhere($strSQL,$where);
	LogInfo($strSQL);
	$rs = db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName = $oldTableName;
		return;
	}
	$keylink = "";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["ID"]));
	

//	ID - 
			$value="";

					$xt->assign("ID_mastervalue", $viewControls->showDBValue("ID", $data, $keylink));

//	Company - 
			$value="";

					$xt->assign("Company_mastervalue", $viewControls->showDBValue("Company", $data, $keylink));

//	EL Date - Short Date
			$value="";

					$xt->assign("EL_Date_mastervalue", $viewControls->showDBValue("EL Date", $data, $keylink));

//	Project Name - 
			$value="";

					$xt->assign("Project_Name_mastervalue", $viewControls->showDBValue("Project Name", $data, $keylink));

//	Status - 
			$value="";

					$xt->assign("Status_mastervalue", $viewControls->showDBValue("Status", $data, $keylink));

//	Deal Type - 
			$value="";

					$xt->assign("Deal_Type_mastervalue", $viewControls->showDBValue("Deal Type", $data, $keylink));

//	Projected Fee - Currency
			$value="";

					$xt->assign("Projected_Fee_mastervalue", $viewControls->showDBValue("Projected Fee", $data, $keylink));

//	Projected Transaction Size - Currency
			$value="";

					$xt->assign("Projected_Transaction_Size_mastervalue", $viewControls->showDBValue("Projected Transaction Size", $data, $keylink));

//	Est. Close Date - Short Date
			$value="";

					$xt->assign("Est__Close_Date_mastervalue", $viewControls->showDBValue("Est. Close Date", $data, $keylink));

//	Primary Banker - 
			$value="";

					$xt->assign("Primary_Banker_mastervalue", $viewControls->showDBValue("Primary Banker", $data, $keylink));

//	Practice Area - 
			$value="";

					$xt->assign("Practice_Area_mastervalue", $viewControls->showDBValue("Practice Area", $data, $keylink));

//	Ownership Class - 
			$value="";

					$xt->assign("Ownership_Class_mastervalue", $viewControls->showDBValue("Ownership Class", $data, $keylink));

//	Industry - 
			$value="";

					$xt->assign("Industry_mastervalue", $viewControls->showDBValue("Industry", $data, $keylink));

//	Referral Type - 
			$value="";

					$xt->assign("Referral_Type_mastervalue", $viewControls->showDBValue("Referral Type", $data, $keylink));

//	Referral Source-Company - 
			$value="";

					$xt->assign("Referral_Source_Company_mastervalue", $viewControls->showDBValue("Referral Source-Company", $data, $keylink));

//	Referral Scource-Ind. - 
			$value="";

					$xt->assign("Referral_Scource_Ind__mastervalue", $viewControls->showDBValue("Referral Scource-Ind.", $data, $keylink));

//	Description - 
			$value="";

					$xt->assign("Description_mastervalue", $viewControls->showDBValue("Description", $data, $keylink));

//	Dead Date - Short Date
			$value="";

					$xt->assign("Dead_Date_mastervalue", $viewControls->showDBValue("Dead Date", $data, $keylink));

//	EL Expiration Date - Short Date
			$value="";

					$xt->assign("EL_Expiration_Date_mastervalue", $viewControls->showDBValue("EL Expiration Date", $data, $keylink));

//	Engagment Fee - Number
			$value="";

					$xt->assign("Engagment_Fee_mastervalue", $viewControls->showDBValue("Engagment Fee", $data, $keylink));

//	Fee Minimum - Number
			$value="";

					$xt->assign("Fee_Minimum_mastervalue", $viewControls->showDBValue("Fee Minimum", $data, $keylink));

//	Final Total Sucess Fee - Number
			$value="";

					$xt->assign("Final_Total_Sucess_Fee_mastervalue", $viewControls->showDBValue("Final Total Sucess Fee", $data, $keylink));

//	Final Transaction Size - Currency
			$value="";

					$xt->assign("Final_Transaction_Size_mastervalue", $viewControls->showDBValue("Final Transaction Size", $data, $keylink));

//	Monthly Retainer - Number
			$value="";

					$xt->assign("Monthly_Retainer_mastervalue", $viewControls->showDBValue("Monthly Retainer", $data, $keylink));

//	Closed Date - Short Date
			$value="";

					$xt->assign("Closed_Date_mastervalue", $viewControls->showDBValue("Closed Date", $data, $keylink));

//	Team Split-1 - Percent
			$value="";

					$xt->assign("Team_Split_1_mastervalue", $viewControls->showDBValue("Team Split-1", $data, $keylink));

//	Team-1 - 
			$value="";

					$xt->assign("Team_1_mastervalue", $viewControls->showDBValue("Team-1", $data, $keylink));

//	Team Split-2 - Percent
			$value="";

					$xt->assign("Team_Split_2_mastervalue", $viewControls->showDBValue("Team Split-2", $data, $keylink));

//	Team-2 - 
			$value="";

					$xt->assign("Team_2_mastervalue", $viewControls->showDBValue("Team-2", $data, $keylink));

//	Team Split-3 - Percent
			$value="";

					$xt->assign("Team_Split_3_mastervalue", $viewControls->showDBValue("Team Split-3", $data, $keylink));

//	Team Split-4 - Percent
			$value="";

					$xt->assign("Team_Split_4_mastervalue", $viewControls->showDBValue("Team Split-4", $data, $keylink));

//	Team Split-5 - Percent
			$value="";

					$xt->assign("Team_Split_5_mastervalue", $viewControls->showDBValue("Team Split-5", $data, $keylink));

//	Team Split-6 - Percent
			$value="";

					$xt->assign("Team_Split_6_mastervalue", $viewControls->showDBValue("Team Split-6", $data, $keylink));

//	Team-3 - 
			$value="";

					$xt->assign("Team_3_mastervalue", $viewControls->showDBValue("Team-3", $data, $keylink));

//	Team-4 - 
			$value="";

					$xt->assign("Team_4_mastervalue", $viewControls->showDBValue("Team-4", $data, $keylink));

//	Team-5 - 
			$value="";

					$xt->assign("Team_5_mastervalue", $viewControls->showDBValue("Team-5", $data, $keylink));

//	Team-6 - 
			$value="";

					$xt->assign("Team_6_mastervalue", $viewControls->showDBValue("Team-6", $data, $keylink));

//	Fee Split-1 - Percent
			$value="";

					$xt->assign("Fee_Split_1_mastervalue", $viewControls->showDBValue("Fee Split-1", $data, $keylink));

//	Fee Split-2 - Percent
			$value="";

					$xt->assign("Fee_Split_2_mastervalue", $viewControls->showDBValue("Fee Split-2", $data, $keylink));

//	Fee Split-3 - Percent
			$value="";

					$xt->assign("Fee_Split_3_mastervalue", $viewControls->showDBValue("Fee Split-3", $data, $keylink));

//	Fee Split-4 - Percent
			$value="";

					$xt->assign("Fee_Split_4_mastervalue", $viewControls->showDBValue("Fee Split-4", $data, $keylink));

//	Fee Split-5 - Percent
			$value="";

					$xt->assign("Fee_Split_5_mastervalue", $viewControls->showDBValue("Fee Split-5", $data, $keylink));

//	Fee Split-6 - Percent
			$value="";

					$xt->assign("Fee_Split_6_mastervalue", $viewControls->showDBValue("Fee Split-6", $data, $keylink));

//	Fee To-1 - 
			$value="";

					$xt->assign("Fee_To_1_mastervalue", $viewControls->showDBValue("Fee To-1", $data, $keylink));

//	Fee To-2 - 
			$value="";

					$xt->assign("Fee_To_2_mastervalue", $viewControls->showDBValue("Fee To-2", $data, $keylink));

//	Fee To-3 - 
			$value="";

					$xt->assign("Fee_To_3_mastervalue", $viewControls->showDBValue("Fee To-3", $data, $keylink));

//	Fee To-4 - 
			$value="";

					$xt->assign("Fee_To_4_mastervalue", $viewControls->showDBValue("Fee To-4", $data, $keylink));

//	Fee To-5 - 
			$value="";

					$xt->assign("Fee_To_5_mastervalue", $viewControls->showDBValue("Fee To-5", $data, $keylink));

//	Fee To-6 - 
			$value="";

					$xt->assign("Fee_To_6_mastervalue", $viewControls->showDBValue("Fee To-6", $data, $keylink));

//	Enterpise Value - 
			$value="";

					$xt->assign("Enterpise_Value_mastervalue", $viewControls->showDBValue("Enterpise Value", $data, $keylink));

//	Fee Details - 
			$value="";

					$xt->assign("Fee_Details_mastervalue", $viewControls->showDBValue("Fee Details", $data, $keylink));

//	Split to Corporate - Number
			$value="";

					$xt->assign("Split_to_Corporate_mastervalue", $viewControls->showDBValue("Split to Corporate", $data, $keylink));

//	Paul - Checkbox
			$value="";

					$xt->assign("Paul_mastervalue", $viewControls->showDBValue("Paul", $data, $keylink));

//	McBroom - Checkbox
			$value="";

					$xt->assign("McBroom_mastervalue", $viewControls->showDBValue("McBroom", $data, $keylink));

//	IBC Date - Short Date
			$value="";

					$xt->assign("IBC_Date_mastervalue", $viewControls->showDBValue("IBC Date", $data, $keylink));

//	Gross Next - 
			$value="";

					$xt->assign("Gross_Next_mastervalue", $viewControls->showDBValue("Gross Next", $data, $keylink));

//	Gross This - 
			$value="";

					$xt->assign("Gross_This_mastervalue", $viewControls->showDBValue("Gross This", $data, $keylink));

//	Month of Close - Short Date
			$value="";

					$xt->assign("Month_of_Close_mastervalue", $viewControls->showDBValue("Month of Close", $data, $keylink));

//	Deal Slot - 
			$value="";

					$xt->assign("Deal_Slot_mastervalue", $viewControls->showDBValue("Deal Slot", $data, $keylink));

//	Pipeline - 
			$value="";

					$xt->assign("Pipeline_mastervalue", $viewControls->showDBValue("Pipeline", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("company", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("company_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>