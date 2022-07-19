<?php
session_start();
include('connect.php');
$inv = $_POST['invoice'];
$produ = $_POST['product'];
$qty = $_POST['qty'];
$pt = $_POST['pt'];
$v = $_POST['vat'];
$date = date('m/d/Y');
$month = date('F');
$year = date('Y');

$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $produ);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$pric=$row['price'];
$name=$row['product_name'];
$dname=$row['description_name'];
$categ=$row['category'];
$qtyleft=$row['qty_left'];
}

//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$start = $db->prepare($sql);
$start->execute(array($qty,$produ));
$pricanddis=$pric-$discount; //ราคา-กับส่วนลด(บาท)
$sum=$pricanddis*$qty;  //ราคาที่รวมส่วนลดแล้ว มา * จำนวน
$qtysum=$qtyleft-$qty;  //จำนวนที่มี - จำนวนที่ขายออกไป
$vat=$sum*$v; //ราคาที่ *จำนวนมาแล้ว * ส่วนลด
$total=$vat+$sum; //ราคารวม
// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
$start = $db->prepare($sql);
$start->execute(array(':a'=>$inv,':b'=>$produ,':c'=>$qty,':d'=>$sum,':e'=>$name,':f'=>$pric,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$qtysum,':m'=>$dname,':n'=>$vat,':o'=>$total));
header("location: sales.php?id=$pt&invoice=$inv");



?>