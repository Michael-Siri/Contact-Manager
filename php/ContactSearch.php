<?php

//show all contacts
include "Config.php";

//NEEDS MORE FIELDS, probably
//GOTTA FILL OUT THE FIELDS
//user ID needs to be SESSION 


// reset to $_SESSION['userid']  suuuper important
//  $_POST['userid'];


//FOR TESTING
//$userid = mysqli_real_escape_string($conn,$_POST['userid']);

$userid = $_SESSION['userid'];//user ID
$searchData = mysqli_real_escape_string($conn,$_POST['Search']); //Search form input
//THIS IS WHERE WE WILL ADD MORE FIELDS AS NECESSARY
$sql="SELECT * FROM `Contact Information` WHERE `UID` = '" .$userid. "' AND ((`First Name` LIKE '" .$searchData. "') OR (`Last Name` LIKE '" .$searchData. "'))";

//search for first and last name but we can do whatever
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $rows[] = $row;
}

echo json_encode($rows);

?>
