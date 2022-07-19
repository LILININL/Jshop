<?php
session_start();
include('connect.php');

$fname = $_POST['fname'];
$midnamee = $_POST['mname'];
$lname = $_POST['lname'];
$addres = $_POST['address'];
$contac = $_POST['contact'];
$phoneno = $_POST['memno'];
// query
$sql = "INSERT INTO customer (first_name,address,contact,membership_number,last_name,middle_name,customer_name) VALUES (:a,:b,:c,:d,:e,:f,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$fname,':b'=>$addres,':c'=>$contac,':d'=>$phoneno,':e'=>$lname,':f'=>$midnamee,':h'=>$fname.' '.$midnamee.' '.$lname ));
header("location: customer.php");


?>