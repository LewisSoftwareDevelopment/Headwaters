<?php
$dalTableusers = array();
$dalTableusers["ID"] = array("type"=>3,"varname"=>"ID");
$dalTableusers["user"] = array("type"=>200,"varname"=>"user");
$dalTableusers["password"] = array("type"=>200,"varname"=>"password");
$dalTableusers["Name"] = array("type"=>200,"varname"=>"Name");
	$dalTableusers["ID"]["key"]=true;
$dal_info["users"]=&$dalTableusers;

?>