<?php 
class eventclass_Snapshot  extends eventsBase
{ 
	function eventclass_Snapshot()
	{
	// fill list of events
		$this->events["BeforeProcessReport"]=true;


//	onscreen events
		$this->events["Sanpshot_snippet"] = true;
		$this->events["Sanpshot_snippet1"] = true;
		$this->events["Sanpshot_snippet2"] = true;
		$this->events["Sanpshot_snippet3"] = true;
		$this->events["Sanpshot_snippet4"] = true;
		$this->events["Sanpshot_snippet5"] = true;
		$this->events["Sanpshot_snippet6"] = true;
		$this->events["Sanpshot_snippet7"] = true;
		$this->events["Sanpshot_snippet8"] = true;
		$this->events["Sanpshot_snippet9"] = true;
		$this->events["Sanpshot_snippet10"] = true;
		$this->events["Sanpshot_snippet11"] = true;
		$this->events["Sanpshot_snippet12"] = true;
		$this->events["Sanpshot_snippet13"] = true;
		$this->events["Sanpshot_snippet21"] = true;
		$this->events["Sanpshot_snippet31"] = true;
		$this->events["Sanpshot_snippet41"] = true;
		$this->events["Sanpshot_snippet51"] = true;
		$this->events["Sanpshot_snippet61"] = true;
		$this->events["Sanpshot_snippet71"] = true;
		$this->events["Sanpshot_snippet81"] = true;
		$this->events["Sanpshot_snippet91"] = true;
		$this->events["Sanpshot_snippet101"] = true;
		$this->events["Sanpshot_snippet111"] = true;


	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
				// Report page: Before process
function BeforeProcessReport(&$conn,&$pageObject)
{

		$transdate = date('m-d-Y', time());
   echo $transdate;
   $month = date('m');
  

   if($month == 1){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Jan=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 2){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Feb=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 3){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Mar=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 4){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET April=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 5){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET May=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 6){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET June=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

 if($month == 7){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET July=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 8){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Aug=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 9){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Sep=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 10){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Oct=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 11){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Nov=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 12){
global $conn;
$strSQLInsert = "UPDATE `ellive` SET Dec=(SELECT COUNT(Company) FROM Company WHERE (Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};















   if($month == 1){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Jan=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 2){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Feb=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 3){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Mar=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 4){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET April=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 5){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET May=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 6){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET June=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

 if($month == 7){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET July=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 8){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Aug=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};
   if($month == 9){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Sep=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 10){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Oct=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 11){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Nov=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};

   if($month == 12){
global $conn;
$strSQLInsert = "UPDATE `inmarketloi` SET Dec=(SELECT COUNT(Company) FROM Company WHERE (Status = 'in market' OR Status = 'under loi'))
WHERE ID='1'";
db_exec($strSQLInsert,$conn);
};







;		
} // function BeforeProcessReport

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events
function Sanpshot_snippet(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet1(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet2(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet3(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet4(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet5(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet6(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet7(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet8(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet9(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet10(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet11(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet12(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet13(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet21(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet31(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet41(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet51(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet61(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet71(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet81(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet91(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet101(&$params)
{
// Put your code here.
echo date ("Y");

;
}
function Sanpshot_snippet111(&$params)
{
// Put your code here.
echo date ("Y");

;
}

} 
?>
