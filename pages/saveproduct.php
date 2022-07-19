<?php
session_start(); 
include('connect.php');
$unit = $_POST['unit'];
$code = $_POST['code'];
$bname = $_POST['bname'];
$cost = $_POST['cost'];
$price = $_POST['price'];
$suppie = $_POST['supplier'];
$qty = $_POST['qty'];
$categ = $_POST['categ'];
$datedel = $_POST['date_del'];
$dname = $_POST['dname'];    
$sql = "INSERT INTO products (product_code,product_name,cost,price,supplier,qty_left,category,date_delivered,description_name,unit) VALUES (?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($code,$bname,$cost,$price,$suppie,$qty,$categ,$datedel,$dname,$unit,));
header("location: products.php");
?>
// inset data 


// $i = $_POST['ex_date']; $i expiration_date,