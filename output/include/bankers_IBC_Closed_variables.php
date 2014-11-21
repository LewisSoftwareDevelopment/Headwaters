<?php
$strTableName="bankers IBC/Closed";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="bankers";

$gstrOrderBy="ORDER BY `Primary Banker`";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("bankers IBC/Closed");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["bankers IBC/Closed"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>