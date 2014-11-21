<?php
$strTableName="changes last month end";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="changes last month end";

$gstrOrderBy="ORDER BY ELClinet DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("changes last month end");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["changes last month end"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>