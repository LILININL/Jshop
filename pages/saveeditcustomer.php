<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['cname'];
$f = $_POST['fname'];
$m = $_POST['mname'];
$l = $_POST['lname'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
// query
$sql = "UPDATE customer 
        SET customer_name=?, first_name=?,middle_name=?,last_name=?, address=?, contact=?, membership_number=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$f,$m,$l,$b,$c,$d,$id));
header("location: customer.php");

?>