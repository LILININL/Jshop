<?php
session_start();
include('connect.php');
$invv = $_POST['invoice'];
$productt = $_POST['product'];
$qtyy = $_POST['qty'];
$pointion = $_POST['pt'];
$date = date('m/d/Y');
$month = date('F');
$year = date('Y');
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $productt);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$pricee=$row['price'];
$name=$row['product_name'];
$categ=$row['category'];
$qtyleft=$row['qty_left'];
}
// qty ++ check
$result2 = $db->prepare("SELECT * FROM sales_order WHERE product= :userid");
$result2->bindParam(':userid', $productt);
$result2->execute();
$checkqty = false ;
$qtych =0;

for($i=0; $row = $result2->fetch(); $i++){
if ($row['product']){

    $qtych=$row['qty'];
    $checkqty = true;
    break;    
}
}
echo $qtych;
if ($checkqty == false){
// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)";
$sumpricee=$pricee-$discount;
$modpriceqty=$sumpricee*$qtyy;
$qtydeleteqty=$qtyleft-$qtyy;
$q = $db->prepare($sql);
$q->execute(array(':a'=>$invv,':b'=>$productt,':c'=>$qtyy,':d'=>$modpriceqty,':e'=>$name,':f'=>$pricee,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$qtydeleteqty,));
}
else {
    $qtych = $qtych + $qtyy;
    $sqlupdate = "UPDATE sales_order 
        SET qty=?
		WHERE product=?";
$qq = $db->prepare($sqlupdate);
$qq->execute(array($qtych,$productt));


//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($qtyy,$productt));
}

header("location: sales.php?id=$pointion&invoice=$invv");

?>