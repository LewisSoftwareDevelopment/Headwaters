<?php
$strTableName="Revenue Estimates";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="company";

$gstrOrderBy="ORDER BY Paul DESC, McBroom DESC, Company";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Revenue Estimates");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Revenue Estimates"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>