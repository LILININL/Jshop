<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="utf-8">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J Shop</title>
    <link rel="shortcut icon" href="logoc.jpg">

     <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jshop</title>
  <!-- plugins:css -->
<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        })
    })
    </script>


</head>

<body class="dark-edition">
<div class="container-scroller">
    <?php include('navfixed.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container"  style="margin-left:20px; margin-top: -60px;" >
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header"><?php echo $_GET['name'];  ?>แบบฟอร์มใบสั่งซื้อของ </h1>
                    </div>
                </div>
                <form action="savepurchase.php" method="post" class="form-group">
                    <input type="hidden" name="invoice" class="form-control" value="<?php echo $_GET['invoice']; ?>" />
                    <?php
        $today = date('Y-m-d');
        ?>
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white">วันที่  </label><input type="text" style="width: 600px;" class="form-control" name="date"
                        value="<?php echo $today; ?>" />
                    </div>
                    <br/>
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white">Supplier  </label><input type="text" style="width: 600px;" class="form-control"
                        name="supplier" value="<?php echo $_GET['name']; ?>">
                    </div>
                    <br/>
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white">วันที่ส่งมอบ  </label><input type="date" style="width: 600px;" class="form-control"
                        name="date_delivered" required />
                    </div>
                    <br/>
                    <!-- <input type="hidden" class="form-control" value="<?php echo $_GET['name']; ?>" /> -->
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white">เลือกสินค้า</label><br />
                    </div>
                    <select name="product" style="width:65%" class="js-example-basic-single select2-hidden-accessible" required>
                        <?php
         include('connect.php');
         $id =$_GET['name'];
         $result = $db->prepare("SELECT * FROM products WHERE supplier = :supp");
         $result->bindParam(':supp', $id);
         $result->execute();
         for($i=0; $row = $result->fetch(); $i++){
          ?>
         <option value="<?php echo $row['product_code']; ?>"> -ชื่อสินค้า- "<?php echo $row['product_name']; ?>" -รายละเอียดสินค้า-
         "<?php echo $row['description_name']; ?>"  -ประเภท- "<?php echo $row['category']; ?>"</option>
          <?php
        }
        ?>
                    </select><br/>
                    <br/>
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white" >จำนวนรายการ(ตัวเลขเท่านั้น) </label>
                    <input type="text" name="qty" class="form-control" value="" placeholder="จำนวน" autocomplete="off"
                        style="width: 68px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" pattern="^([0-9][0-9]?|)$" required />
                    </div><br/>
                    <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white"> สถาณะ </label>
                    <input type="text" name="status" value="รอดำเนินการ" class="form-control" style="width: 600px;">
                    </div><br/>

                    <button id="Submit" onclick="myFunction() " class="btn btn-primary"
                        type="submit">เพิ่มสินค้า</button>
                        <button id="Submit2" onclick="myFunction2() " class="btn btn-success"
                        type="submit">สั่งสินค้า</button>
                </form>
                <div>
                    <!-- แสดง ลิส  -->
                    <!-- <?php
    $id=$_GET['invoice'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
      echo 'รหัสใบเสร็จ : '.$rowaz['invoice_number'].'<br>';
      echo 'วันที่สั่งซื้อ: '.$rowaz['date_order'].'<br>';
      echo 'Supplier : '.$rowaz['suplier'].'<br>';
      echo 'วันที่ส่งมอบ : '.$rowaz['date_deliver'].'<br>';
      echo 'สถาณะ : '.$rowaz['status'].'<br>';
    }
    ?> -->
                    <table  class="table table-hover text-light"
                        id="dataTables-example">
                        <thead  style="border-top:2px solid #FFFFFF">
                            <tr>
                                <th style="color:white"> ชื่อสินค้า </th>
                                <th style="color:white"> จำนวนสินค้า </th>
                                <th style="color:white"> ค่าใช้จ่าย </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
     $id=$_GET['invoice'];
     include('connect.php');
     $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
     $result->bindParam(':userid', $id);
     $result->execute();
     for($i=0; $row = $result->fetch(); $i++){
      ?>
    <tr class="record" name="datapur" id="datapur" colspan="2" style="border-top:2px solid #FFFFFF">
    <td colspan="1" style="border-top:2px solid #FFFFFF"><?php
          $rrrrrrr=$row['name'];
          $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
          }
          ?></td>
                                <td ><?php echo $row['qty']; ?></td>
                                <td >
                                    <?php
            $dfdf=$row['cost'];
            echo formatMoney($dfdf, true);
            ?>
                                </td>
                            </tr>
                            <?php
      }
      ?>
                            <tr>
        <td colspan="2" style="border-top:2px solid #FFFFFF"><strong style="font-size: 12px; color: #FFFFFF;">ยอดรวม:</strong></td>
        <td colspan="1" style="border-top:2px solid #FFFFFF"><strong style="font-size: 12px; color: #FFFFFF;">
                                        <?php
         function formatMoney($number, $fractional=false) {
          if ($fractional) {
           $number = sprintf('%.2f', $number);
         }
         while (true) {
           $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
           if ($replaced != $number) {
            $number = $replaced;
          } else {
            break;
          }
        }
        return $number;
      }
      $sdsd=$_GET['invoice'];
      $resultas = $db->prepare("SELECT sum(cost) FROM purchases_item WHERE invoice= :a");
      $resultas->bindParam(':a', $sdsd);
      $resultas->execute();
      for($i=0; $rowas = $resultas->fetch(); $i++){
        $fgfg=$rowas['sum(cost)'];
        echo formatMoney($fgfg, true);
      }
      ?>
                                    </strong></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="pull-right">
                    <!-- <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m ">
                        ปริ้น
                    </button> -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
    <script src="vendors/chosen.jquery.min.js"></script>
            <script>
            $(function() {
                $(".js-example-basic-single select2-hidden-accessible").chosen();
            });
            </script>
            <script>
            function myFunction2() {
                // let btnsubmit = document.getElementById('Submit');
                // btnsubmit.textContent = 'สั่งสินค้า';
                if (
                    document.getElementById('datapur').value == "") {
                    return false;
                } else {

                    //ทำงานถูกต้อง
                    alert('ทำการเพิ่มแบบฟอร์มสั่งซื้อแล้ว !');
                    // window.location.href="savepurchaselist.php"
                    window.location.href = "purchaseslist.php";
                    return true;
                }
            }
            </script>
   

</body>

</html>