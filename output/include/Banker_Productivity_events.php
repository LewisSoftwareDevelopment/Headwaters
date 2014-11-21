<?php 
class eventclass_Banker_Productivity  extends eventsBase
{ 
	function eventclass_Banker_Productivity()
	{
	// fill list of events
		$this->events["BeforeProcessReport"]=true;


//	onscreen events
		$this->events["Banker_Productivity_snippet2"] = true;
		$this->events["Banker_Productivity_snippet3"] = true;
		$this->events["Banker_Productivity_snippet4"] = true;
		$this->events["Banker_Productivity_snippet5"] = true;
		$this->events["Banker_Productivity_snippet21"] = true;
		$this->events["Banker_Productivity_snippet31"] = true;
		$this->events["Banker_Productivity_snippet41"] = true;
		$this->events["Banker_Productivity_snippet51"] = true;
		$this->events["Banker_Productivity_snippet6"] = true;
		$this->events["Banker_Productivity_snippet7"] = true;
		$this->events["Banker_Productivity_snippet8"] = true;
		$this->events["Banker_Productivity_snippet9"] = true;


	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
				// Report page: Before process
function BeforeProcessReport(&$conn,&$pageObject)
{

		


//**********  Insert a record into another table  ************
global $conn;
$strSQLdel = "TRUNCATE `hwreports`.`bprevstore`";
db_exec($strSQLdel,$conn);


global $conn;
$strSQLdel2 = "TRUNCATE `hwreports`.`bpengagements`";
db_exec($strSQLdel2,$conn);


global $conn;
$strSQLdel3 = "TRUNCATE `hwreports`.`bpengagmentstotal`";
db_exec($strSQLdel3,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "insert into bprevstore (`Name`,`y1`,`y2`,`y3`)
SELECT
Name,
MAX(case when `Year`='2014' then `Revenue total` end) AS `2014`,
SUM(if(`Year`='2013', `Revenue total`, 0)) AS `2013`,
SUM(if(`Year`='2012', `Revenue total`, 0)) AS `2012`
FROM bankerrev
GROUP BY Name";
db_exec($strSQLInsert,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "insert into bpengagmentstotal(`rows`,`Banker`,`Engagements`,`Wheelhouse`,`Speculative`,`Minimum`)
SELECT
COUNT(*) AS `Rows`,
`Primary Banker`,
group_concat(company) AS `Total Count`,
SUM(`Deal Slot` = 'wheelhouse') AS Wheelhouse,
SUM(`Deal Slot` = 'speculative') AS Speculative,
SUM(`Deal Slot` = 'minimum') AS Minimum
FROM company
WHERE Status = 'on hold' OR Status = 'in market' OR Status = 'pre market' OR Status = 'under loi' OR Status = 'inactive'
GROUP BY `Primary Banker`
ORDER BY `Primary Banker`";
db_exec($strSQLInsert,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "insert into bpengagements(`rows`,`Banker`,`Engagements`,`IBC`,`Closed`)
SELECT
COUNT(*) AS `Rows`,
`Primary Banker`,
group_concat(company) AS `company Count`,
COUNT(`IBC Date`) AS IBC,
COUNT(`Closed Date`) AS Closed
FROM company
WHERE (Year(`EL Date`) =YEAR(CURDATE()))
GROUP BY `Primary Banker`
ORDER BY `Primary Banker`";
db_exec($strSQLInsert,$conn);





;		
} // function BeforeProcessReport

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events
function Banker_Productivity_snippet2(&$params)
{
// Put your code here.
echo date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet3(&$params)
{
// Put your code here.
echo date ("Y") -2, " Revenue";

;
}
function Banker_Productivity_snippet4(&$params)
{
// Put your code here.
echo "YTD + ", date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet5(&$params)
{
// Put your code here.
echo "YTD + ", date ("y") -1," & ",  date ("y") -2," Revenue";

;
}
function Banker_Productivity_snippet21(&$params)
{
// Put your code here.
echo date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet31(&$params)
{
// Put your code here.
echo date ("Y") -2, " Revenue";

;
}
function Banker_Productivity_snippet41(&$params)
{
// Put your code here.
echo "YTD + ", date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet51(&$params)
{
// Put your code here.
echo "YTD + ", date ("y") -1," & ",  date ("y") -2," Revenue";

;
}
function Banker_Productivity_snippet6(&$params)
{
// Put your code here.
echo date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet7(&$params)
{
// Put your code here.
echo date ("Y") -2, " Revenue";

;
}
function Banker_Productivity_snippet8(&$params)
{
// Put your code here.
echo "YTD + ", date ("Y") -1, " Revenue";

;
}
function Banker_Productivity_snippet9(&$params)
{
// Put your code here.
echo "YTD + ", date ("y") -1," & ",  date ("y") -2," Revenue";

;
}

} 
?>
