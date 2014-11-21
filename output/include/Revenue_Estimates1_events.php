<?php 
class eventclass_Revenue_Estimates1  extends eventsBase
{ 
	function eventclass_Revenue_Estimates1()
	{
	// fill list of events
		$this->events["BeforeProcessReport"]=true;


//	onscreen events
		$this->events["Revenue_Estimates1_snippet5"] = true;
		$this->events["Revenue_Estimates1_snippet6"] = true;
		$this->events["Revenue_Estimates1_snippet7"] = true;
		$this->events["Revenue_Estimates1_snippet61"] = true;
		$this->events["Revenue_Estimates1_snippet51"] = true;
		$this->events["Revenue_Estimates1_snippet71"] = true;


	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
				// Report page: Before process
function BeforeProcessReport(&$conn,&$pageObject)
{

		
;		
} // function BeforeProcessReport

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events
function Revenue_Estimates1_snippet5(&$params)
{
global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result2 = mysqli_query($conn,"SELECT (SUM(company.`Gross This`) + (SELECT  SUM(`YTD Revenue`) FROM bankers)) as YTDgrossact From Company");

while($row2 = mysqli_fetch_array($result2)) {
echo "$".number_format($row2['YTDgrossact']);
}  

;
}
function Revenue_Estimates1_snippet6(&$params)
{

global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT SUM(`YTD Revenue`)as YTDgross From Bankers");

while($row = mysqli_fetch_array($result)) {
echo "$".number_format($row['YTDgross']);
}  

;
}
function Revenue_Estimates1_snippet7(&$params)
{
global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result3 = mysqli_query($conn,"SELECT (SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`)) AS YTDnetact From Company, Actuals");

while($row3 = mysqli_fetch_array($result3)) {
echo "$".number_format($row3['YTDnetact']);
}  
;
}
function Revenue_Estimates1_snippet61(&$params)
{

global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT SUM(`YTD Revenue`)as YTDgross From Bankers");

while($row = mysqli_fetch_array($result)) {
echo "$".number_format($row['YTDgross']);
}  

;
}
function Revenue_Estimates1_snippet51(&$params)
{
global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result2 = mysqli_query($conn,"SELECT (SUM(company.`Gross This`) + (SELECT  SUM(`YTD Revenue`) FROM bankers)) as YTDgrossact From Company");

while($row2 = mysqli_fetch_array($result2)) {
echo "$".number_format($row2['YTDgrossact']);
}  

;
}
function Revenue_Estimates1_snippet71(&$params)
{
global $conn;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result3 = mysqli_query($conn,"SELECT (SUM(company.`Gross This` * company.`Split to Corporate`) + (actuals.`YTD Net Actual`)) AS YTDnetact From Company, Actuals");

while($row3 = mysqli_fetch_array($result3)) {
echo "$".number_format($row3['YTDnetact']);
}  
;
}

} 
?>
