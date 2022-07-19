<?php
// configuration
include('connect.php');

// new data
$typeunit = $_POST['unitype'];
$unitid = $_POST['unitid'];
// query
$sql = "UPDATE unittype 
        SET unittype=? 
         WHERE unitid=? ";
$q = $db->prepare($sql);
$q->execute(array($typeunit,$unitid));
header("location: addunittpye.php");

?>