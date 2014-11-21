<?php
$strTableName="bprevstore";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="bprevstore";

$gstrOrderBy="ORDER BY y1 DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("bprevstore");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["bprevstore"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>