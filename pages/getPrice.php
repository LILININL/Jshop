<?php
session_start();
include('connect.php');
$b = $_POST['product_code'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
$row = $result->fetch();
echo $row['cost'];
?>