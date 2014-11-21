<?php
include_once(getabspath("include/bankers_settings.php"));

function DisplayMasterTableInfo_bankers($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "bankers";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["bankers_masterlist"] = $layout;


if($detailtable == "bankerrev")
{
		$where.= GetFullFieldName("Name", "", false)."=".$cipherer->MakeDBValue("Name",$keys[1-1], "", "", true);
	$showKeys .= " "."Name".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "bankerrank")
{
		$where.= GetFullFieldName("Name", "", false)."=".$cipherer->MakeDBValue("Name",$keys[1-1], "", "", true);
	$showKeys .= " "."Name".": ".$keys[1-1];
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

//	Name - 
			$value="";

					$xt->assign("Name_mastervalue", $viewControls->showDBValue("Name", $data, $keylink));

//	Start Date - Short Date
			$value="";

					$xt->assign("Start_Date_mastervalue", $viewControls->showDBValue("Start Date", $data, $keylink));

//	Budget Year - 
			$value="";

					$xt->assign("Budget_Year_mastervalue", $viewControls->showDBValue("Budget Year", $data, $keylink));

//	Active - Checkbox
			$value="";

					$xt->assign("Active_mastervalue", $viewControls->showDBValue("Active", $data, $keylink));

//	YTD Revenue - 
			$value="";

					$xt->assign("YTD_Revenue_mastervalue", $viewControls->showDBValue("YTD Revenue", $data, $keylink));

//	Last Year Rev - 
			$value="";

					$xt->assign("Last_Year_Rev_mastervalue", $viewControls->showDBValue("Last Year Rev", $data, $keylink));

//	Prior Year Rev - 
			$value="";

					$xt->assign("Prior_Year_Rev_mastervalue", $viewControls->showDBValue("Prior Year Rev", $data, $keylink));

//	Last Year Rank - 
			$value="";

					$xt->assign("Last_Year_Rank_mastervalue", $viewControls->showDBValue("Last Year Rank", $data, $keylink));

//	YTD+Last - 
			$value="";

					$xt->assign("YTD_Last_mastervalue", $viewControls->showDBValue("YTD+Last", $data, $keylink));

//	YTD Closing - 
			$value="";

					$xt->assign("YTD_Closing_mastervalue", $viewControls->showDBValue("YTD Closing", $data, $keylink));

//	Last Year Closing - 
			$value="";

					$xt->assign("Last_Year_Closing_mastervalue", $viewControls->showDBValue("Last Year Closing", $data, $keylink));

//	YTD IBC - 
			$value="";

					$xt->assign("YTD_IBC_mastervalue", $viewControls->showDBValue("YTD IBC", $data, $keylink));

//	YTD Engagements - 
			$value="";

					$xt->assign("YTD_Engagements_mastervalue", $viewControls->showDBValue("YTD Engagements", $data, $keylink));

//	Total Current Engagments - 
			$value="";

					$xt->assign("Total_Current_Engagments_mastervalue", $viewControls->showDBValue("Total Current Engagments", $data, $keylink));

//	# Wheelhouse - 
			$value="";

					$xt->assign("__Wheelhouse_mastervalue", $viewControls->showDBValue("# Wheelhouse", $data, $keylink));

//	# Speculative - 
			$value="";

					$xt->assign("__Speculative_mastervalue", $viewControls->showDBValue("# Speculative", $data, $keylink));

//	# Minimum - 
			$value="";

					$xt->assign("__Minimum_mastervalue", $viewControls->showDBValue("# Minimum", $data, $keylink));

//	Last Name - 
			$value="";

					$xt->assign("Last_Name_mastervalue", $viewControls->showDBValue("Last Name", $data, $keylink));

//	First Name - 
			$value="";

					$xt->assign("First_Name_mastervalue", $viewControls->showDBValue("First Name", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("bankers", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("bankers_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>