<?php
session_start();
include('connect.php');
$a = $_POST['unitl'];

    $sql = "SELECT unittype FROM unittype WHERE unittype='$a'";
    $sql = $db->prepare($sql);
    $sql->execute();
    $count = $sql->rowCount();
        if ($count == 1) {
             echo "<script>";
			 echo "alert('ไม่สามารถบันทึกข้อมูลได้ มีข้อมูลหน่วยนับสินค้านี้อยู่ในระบบแล้ว !!!');";
			 echo "window.location='addunittpye.php';";
          	 echo "</script>";
        } else { 
            $sql = "INSERT INTO unittype (unittype) VALUES (?)";
            $q = $db->prepare($sql);
            $q->execute(array($a));
            echo "alert('บันทึกข้อมูลเรียบร้อย !');";
			echo "window.location='addunittpye.php';";
          	echo "</script>";    
        }
?>
