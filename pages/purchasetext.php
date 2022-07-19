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

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="stylee.css">
    <link href="../css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="../js/datepicker.js" rel="stylesheet">

    <link href="../js/bootstrap-datepicker.min.js" rel="stylesheet">

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

<body>

    <?php include('navfixed.php');?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $_GET['name'];  ?>แบบฟอร์มใบสั่งซื้อของ </h1>
                </div>

                <form method="post" class="form-group">
                    <input type="hidden" name="invoice" class="form-control" value="<?php echo $_GET['invoice']; ?>" />
                    <?php
        $today = date('Y-m-d');
        ?>

                    <label>วันที่ : </label><input type="text" style="width: 600px;" class="form-control" name="date"
                        value="<?php echo $today; ?>" /><br />

                    <label>Supplier : </label><input type="text" style="width: 600px;" class="form-control"
                        name="supplier" value="<?php echo $_GET['name']; ?>"><br />

                    <label>วันที่ส่งมอบ : </label><input type="date" style="width: 600px;" class="form-control"
                        name="date_delivered" required /><br />

                    <input type="hidden" class="form-control" value="<?php echo $_GET['name']; ?>" />

                    <label>เลือกสินค้า</label><br /><br />
                    <select name="product" id="product" style="width: 600px;" class="chzn-select" required>
                        <?php
         include('connect.php');
         $id =$_GET['name'];
         $result = $db->prepare("SELECT * FROM products WHERE supplier = :supp");
         $result->bindParam(':supp', $id);
         $result->execute();
         for($i=0; $row = $result->fetch(); $i++){
          ?>
                        <option value="<?php echo $row['product_code']; ?>"><?php echo $row['product_name']; ?> -
                            <?php echo $row['description_name']; ?></option>
                        <?php
        }
        ?>
                    </select><br /><br />
                    <label>จำนวนรายการ </label>
                    <input type="text" name="qty" id="qty" class="form-control" value="1" placeholder="จำนวน"
                        autocomplete="off"
                        style="width: 68px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" required />
                    <label> สถาณะ </label>
                    <input type="text" name="status" value="รอดำเนินการ" class="form-control" style="width: 600px;">
                    <br />

                    <input type="hidden" id="price" style="width: 600px;" class="form-control" name="price"
                        value="<?php echo $row['cost']; ?>">
                </form>
               
                <button class="btn btn-primary btnn-gradient-border btnn-glow" id="addproduct" onclick="addtotable()">เพิ่มสินค้า</button>
                <br>
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
                    <table  width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th name="nameproduct12"> ชื่อสินค้า </th>
                                <th> จำนวนสินค้า </th>
                                <th> ราคาสินค้า </th>

                            </tr>

                        </thead>
                        <tbody id="tabledatapro">

                            <?php
     $id=$_GET['invoice'];
     include('connect.php');
     $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
     $result->bindParam(':userid', $id);
     $result->execute();
     for($i=0; $row = $result->fetch(); $i++){
      ?>
                            <tr class="record" name="datapur" id="datapur">
                                <td><?php
          $rrrrrrr=$row['name'];
          $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
          $resultss->bindParam(':asas', $rrrrrrr);
          $resultss->execute();
          for($i=0; $rowss = $resultss->fetch(); $i++){
            echo $rowss['product_name'];
          }
          ?></td>
                                <td align="right"><?php echo $row['qty']; ?></td>
                                <td align="right">
                                    <?php
            $dfdf=$row['cost'];
            echo formatMoney($dfdf, true);
            ?>
                                    <!-- <a class="btn btn-danger delbutton" title="ล้างรายการทั้งหมด">
            <i class="fa fa-trash"></i>
        </a> -->
                                </td>

                            </tr>

                            <?php
      }
      ?>
                            <tr>
                                <td colspan="2"><strong style="font-size: 12px; color: #222222;">ยอดรวม:</strong></td>
                                <td align="right" colspan="2"><strong style="font-size: 12px; color: #222222;">
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

                                    </strong>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="pull-right">

                    <button id="Submit" onclick="myFunction()" class="btn btn-primary btn-m btnn-gradient-border btnn-glow">
                        สั่ง
                    </button>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->


            <!-- jQuery -->
            <script src="../vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="../vendor/metisMenu/metisMenu.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="../dist/js/sb-admin-2.js"></script>

            <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
            <script src="vendors/chosen.jquery.min.js"></script>
            <script>
            $(function() {
                $(".chzn-select").chosen();

            });
            </script>


            <script type="text/javascript">
            $('#product').on('change', function() {
                let productCode = $(this).val();
                $.post( "getPrice.php", { product_code: productCode }).done(function( data ) {
                    $('#price').val(data);
                });
            })

            function addtotable() {
                let productname = $('#product option:selected').val();
                let qty = $('#qty').val();
                let price = $('#price').val();
                let tabledatapro = $('#tabledatapro');
                let tr = "<tr><td>"+ productname +"</td><td>"+ qty +"</td><td>"+ price +"</td></tr>";
                tabledatapro.append(tr);

            }

            function myFunction() {
                if (document.getElementById('datapur').value == "") {
                    return false;
                } else
                    //ทำงานถูกต้อง
                    alert('ทำการเพิ่มแบบฟอร์มสั่งซื้อแล้ว !');
                // window.location.href="savepurchaselist.php"
                window.location.href = "purchaseslist.php";
                return true;
            }
            </script>
            <script type="text/javascript">
            $(function() {
                $(".delbutton").click(function() {

                    if (confirm("ลบและจบการสร้างแบบฟอร์มสั่งซื้อ ?")) {
                        $.ajax({
                            type: "GET",
                            url: "delepurchase.php",
                            data: info,

                            success: function() {}
                        });
                        //  window.location.href="orderpo.php";
                        $(this).parents(".record").animate({
                                backgroundColor: "#fbc7c7"
                            }, "fast")
                            .animate({
                                opacity: "hide"
                            }, "slow");
                    }
                    return false;
                });
            });
            </script>
</body>

</html>