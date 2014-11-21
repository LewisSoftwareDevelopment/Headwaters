<?php
$strTableName="Live Engagements by Deal Slot";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="company";

$gstrOrderBy="ORDER BY `Deal Slot` DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Live Engagements by Deal Slot");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Live Engagements by Deal Slot"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>