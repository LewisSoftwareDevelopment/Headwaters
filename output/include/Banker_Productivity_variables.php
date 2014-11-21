<?php
$strTableName="Banker Productivity";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="bpengagements";

$gstrOrderBy="ORDER BY bprevstore.y1 DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Banker Productivity");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Banker Productivity"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>