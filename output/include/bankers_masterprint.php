<?php
include_once(getabspath("include/bankers_settings.php"));

function DisplayMasterTableInfo_bankers($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="bankers";

//$strSQL = "SELECT  ID,  Name,  `Start Date`,  `Budget Year`,  Active,  `YTD Revenue`,  `Last Year Rev`,  `Prior Year Rev`,  `Last Year Rank`,  (`ytd revenue` + `last year rev`) AS `YTD+Last`,  `YTD Closing`,  `Last Year Closing`,  `YTD IBC`,  `YTD Engagements`,  `Total Current Engagments`,  `# Wheelhouse`,  `# Speculative`,  `# Minimum`,  `Last Name`,  `First Name`  FROM bankers  ORDER BY Name  ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["bankers_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="bankerrev")
{
		$where.= GetFullFieldName("Name", "", false)."=".$cipherer->MakeDBValue("Name",$keys[1-1], "", "", true);
	$showKeys .= " "."Name".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="bankerrank")
{
		$where.= GetFullFieldName("Name", "", false)."=".$cipherer->MakeDBValue("Name",$keys[1-1], "", "", true);
	$showKeys .= " "."Name".": ".$keys[1-1];
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

//	Name - 
			$xt->assign("Name_mastervalue", $viewControls->showDBValue("Name", $data, $keylink));

//	Start Date - Short Date
			$xt->assign("Start_Date_mastervalue", $viewControls->showDBValue("Start Date", $data, $keylink));

//	Budget Year - 
			$xt->assign("Budget_Year_mastervalue", $viewControls->showDBValue("Budget Year", $data, $keylink));

//	Active - Checkbox
			$xt->assign("Active_mastervalue", $viewControls->showDBValue("Active", $data, $keylink));

//	YTD Revenue - 
			$xt->assign("YTD_Revenue_mastervalue", $viewControls->showDBValue("YTD Revenue", $data, $keylink));

//	Last Year Rev - 
			$xt->assign("Last_Year_Rev_mastervalue", $viewControls->showDBValue("Last Year Rev", $data, $keylink));

//	Prior Year Rev - 
			$xt->assign("Prior_Year_Rev_mastervalue", $viewControls->showDBValue("Prior Year Rev", $data, $keylink));

//	Last Year Rank - 
			$xt->assign("Last_Year_Rank_mastervalue", $viewControls->showDBValue("Last Year Rank", $data, $keylink));

//	YTD+Last - 
			$xt->assign("YTD_Last_mastervalue", $viewControls->showDBValue("YTD+Last", $data, $keylink));

//	YTD Closing - 
			$xt->assign("YTD_Closing_mastervalue", $viewControls->showDBValue("YTD Closing", $data, $keylink));

//	Last Year Closing - 
			$xt->assign("Last_Year_Closing_mastervalue", $viewControls->showDBValue("Last Year Closing", $data, $keylink));

//	YTD IBC - 
			$xt->assign("YTD_IBC_mastervalue", $viewControls->showDBValue("YTD IBC", $data, $keylink));

//	YTD Engagements - 
			$xt->assign("YTD_Engagements_mastervalue", $viewControls->showDBValue("YTD Engagements", $data, $keylink));

//	Total Current Engagments - 
			$xt->assign("Total_Current_Engagments_mastervalue", $viewControls->showDBValue("Total Current Engagments", $data, $keylink));

//	# Wheelhouse - 
			$xt->assign("__Wheelhouse_mastervalue", $viewControls->showDBValue("# Wheelhouse", $data, $keylink));

//	# Speculative - 
			$xt->assign("__Speculative_mastervalue", $viewControls->showDBValue("# Speculative", $data, $keylink));

//	# Minimum - 
			$xt->assign("__Minimum_mastervalue", $viewControls->showDBValue("# Minimum", $data, $keylink));

//	Last Name - 
			$xt->assign("Last_Name_mastervalue", $viewControls->showDBValue("Last Name", $data, $keylink));

//	First Name - 
			$xt->assign("First_Name_mastervalue", $viewControls->showDBValue("First Name", $data, $keylink));
	$xt->display("bankers_masterprint.htm");
	$strTableName=$oldTableName;

}

?>