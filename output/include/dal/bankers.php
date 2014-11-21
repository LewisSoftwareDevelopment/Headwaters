<?php
$dalTablebankers = array();
$dalTablebankers["ID"] = array("type"=>3,"varname"=>"ID");
$dalTablebankers["Name"] = array("type"=>200,"varname"=>"Name");
$dalTablebankers["Start Date"] = array("type"=>7,"varname"=>"Start_Date");
$dalTablebankers["Budget Year"] = array("type"=>3,"varname"=>"Budget_Year");
$dalTablebankers["Active"] = array("type"=>200,"varname"=>"Active");
$dalTablebankers["YTD Revenue"] = array("type"=>3,"varname"=>"YTD_Revenue");
$dalTablebankers["Last Year Rev"] = array("type"=>3,"varname"=>"Last_Year_Rev");
$dalTablebankers["Prior Year Rev"] = array("type"=>3,"varname"=>"Prior_Year_Rev");
$dalTablebankers["Last Year Rank"] = array("type"=>3,"varname"=>"Last_Year_Rank");
$dalTablebankers["YTD+Last"] = array("type"=>3,"varname"=>"YTD_Last");
$dalTablebankers["YTD+Last+Prior"] = array("type"=>3,"varname"=>"YTD_Last_Prior");
$dalTablebankers["YTD Closing"] = array("type"=>200,"varname"=>"YTD_Closing");
$dalTablebankers["Last Year Closing"] = array("type"=>200,"varname"=>"Last_Year_Closing");
$dalTablebankers["YTD IBC"] = array("type"=>3,"varname"=>"YTD_IBC");
$dalTablebankers["YTD Engagements"] = array("type"=>200,"varname"=>"YTD_Engagements");
$dalTablebankers["Total Current Engagments"] = array("type"=>200,"varname"=>"Total_Current_Engagments");
$dalTablebankers["# Wheelhouse"] = array("type"=>3,"varname"=>"__Wheelhouse");
$dalTablebankers["# Speculative"] = array("type"=>3,"varname"=>"__Speculative");
$dalTablebankers["# Minimum"] = array("type"=>3,"varname"=>"__Minimum");
$dalTablebankers["Last Name"] = array("type"=>200,"varname"=>"Last_Name");
$dalTablebankers["First Name"] = array("type"=>200,"varname"=>"First_Name");
	$dalTablebankers["ID"]["key"]=true;
$dal_info["bankers"]=&$dalTablebankers;

?>