<?php
// configuration
include('connect.php');

// new data
$type = $_POST['typee'];
$typid = $_POST['typid'];
// query
$sql = "UPDATE producttype 
        SET typeproduct=? 
         WHERE idtype=? ";
$q = $db->prepare($sql);
$q->execute(array($type,$typid));
header("location: typeproduct.php");

?>