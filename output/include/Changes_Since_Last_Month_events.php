<?php 
class eventclass_Changes_Since_Last_Month  extends eventsBase
{ 
	function eventclass_Changes_Since_Last_Month()
	{
	// fill list of events
		$this->events["BeforeProcessReport"]=true;


//	onscreen events


	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
				// Report page: Before process
function BeforeProcessReport(&$conn,&$pageObject)
{

		//**********  Insert a record into another table  ************
global $conn;
$strSQLdel = "TRUNCATE `hwreports`.`me-el`";
db_exec($strSQLdel,$conn);
global $conn;
$strSQLdel = "TRUNCATE `hwreports`.`me-dead`";
db_exec($strSQLdel,$conn);
global $conn;
$strSQLdel = "TRUNCATE `hwreports`.`me-close`";
db_exec($strSQLdel,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "insert into `me-close` 
(`CClient`,`CDealtype`,`CAmount`,`CSlot`)
SELECT
`Company`,
`Deal Type`,
`Projected Transaction Size`, 
`Deal Slot`
FROM company
WHERE (Month(`Closed Date`) = Month(CURDATE())-1)";
db_exec($strSQLInsert,$conn);


//**********  Insert a record into another table  ************
global $conn;
$strSQLq = "insert into `me-dead` 
(`DClient`,`DDealtype`,`DAmount`,`DSlot`)
SELECT
`Company`,
`Deal Type`,
`Projected Transaction Size`, 
`Deal Slot`
FROM company
WHERE (Month(`Dead Date`) = Month(CURDATE())-1)";
db_exec($strSQLq,$conn);



//**********  Insert a record into another table  ************
global $conn;
$strSQL2 = "insert into `me-el` 
(`ELClient`,`ELDealType`,`ELAmount`,`ELSlot`)
SELECT
`Company`,
`Deal Type`,
`Projected Transaction Size`, 
`Deal Slot`
FROM company
WHERE (Month(`EL Date`) = Month(CURDATE()))";
db_exec($strSQL2,$conn);

    


// Place event code here.
// Use "Add Action" button to add code snippets.
;		
} // function BeforeProcessReport

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events

} 
?>
