<?php
$strTableName="Referral Utilization";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="company";

$gstrOrderBy="ORDER BY ifnull(coalesce(sum(`Referral Type` = 'IBS to Practice'), 0), 0) DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Referral Utilization");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Referral Utilization"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>