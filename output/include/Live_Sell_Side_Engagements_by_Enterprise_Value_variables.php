<?php
$strTableName="Live Sell-Side Engagements by Enterprise Value";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="company";

$gstrOrderBy="ORDER BY `Projected Transaction Size` DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Live Sell-Side Engagements by Enterprise Value");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Live Sell-Side Engagements by Enterprise Value"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>