<?php
require_once('auth.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J Shop</title>

    <link rel="shortcut icon" href="logo.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- main CSS
		============================================ -->

    <!-- Custom CSS -->
    <!-- <link href="dist/css/sb-admin-2.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="stylee.css">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
    <script type="text/javascript">
    function fncSubmit() {
        if (document.getElementById('select').value == "0") {
            alert('PLEASE SELECT LIST');
            return false;
        }
    }
    </script>

</head>

<body>

    <?php include('navfixed.php');?>
    <div id="page-wrapper">

        <div class="container">

            <div class="row">

                <h1 class="page-header">การขาย </h1>

                <div id="maintable">
                    <div style="margin-top: -10px; margin-bottom: 60px;">
                    </div>
                    <form action="incoming.php" method="post" class="form-group"
                        onSubmit="JavaScript:return fncSubmit();">
                        <input type="hidden" name="pt" class="form-control" value="<?php echo $_GET['id']; ?>" />
                        <input type="hidden" name="invoice" class="form-control"
                            value="<?php echo $_GET['invoice']; ?>" />
                        <div class="cmp-tb-hd">
                            <label>
                                <h2>เลือกสินค้า</h2>
                            </label>
                            <br />
                        </div>

                        <div class="bootstrap-select fm-cmp-mg">
                            <select id="seleceproduct" name="product" style="width:500px;" class="selectpicker">
                                <?php
                
                include('connect.php');
                $result = $db->prepare("SELECT * FROM products");
                $result->bindParam(':userid', $res);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>

                                <option value="<?php echo $row['product_code'];?>" <?php
                    if($row['qty_left'] == 0)
                    {
                      echo'disabled';
                      $checkQTY = true;
                    }else{
                      $checkQTY = false;
                    }
                    ?>>
                                    <?php echo $row['product_code']; ?>
                                    - <?php echo $row['product_name']; ?>
                                    - <?php echo $row['description_name']; ?>
                                    - <?php echo $row['qty_left']; ?>

                                </option>
                                <?php
                }
                ?>
                            </select>
                        </div>
                        <br />
                        <label>จำนวนสินค้า</label>
                        <input type="number" name="qtyleap" onchange="textChange(this)" name="qty" value="1" min="1"
                            class="form-control" autocomplete="off"
                            style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
                        <label>ส่วนลด(บาท,ลดต่อชิ้น)</label>
                        <input type="text" name="discount" value="0" class="form-control" autocomplete="off"
                            style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
                        <label>ภาษี(7%):</label>
                        <input type="text" name="vat" value="0.07" class="form-control" autocomplete="off"
                            style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
                        <br>
                        <input type="submit" class="btn btn-primary" value="เพิ่มสินค้า" class="form-control"
                            style="width: 123px; " />
                    </form>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th> รหัสสินค้า </th>
                                <th> ชื่อสินค้า </th>
                                <th> รายละเอี่ยดสินค้า </th>
                                <th> ประเภท </th>
                                <th> จำนวน </th>
                                <th> ราคา </th>
                                <th> ส่วนลด </th>
                                <th> รวมเงิน </th>
                                <th> ภาษี </th>
                                <th> จำนวนเงินทั้งหมด </th>
                                <th> ลบชิ้นนี้ </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                
                $id=$_GET['invoice'];
                include('connect.php');
                $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                $result->bindParam(':userid', $id);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                            <tr class="record">
                                <td> <?php echo $row['product'];  ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dname']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['qty']; ?> </td>
                                <td required>
                                    <?php  
                      $ppp=$row['price'];
                      echo formatMoney($ppp, true);
                      ?>
                                </td>
                                <td>
                                    <?php
                      $ddd=$row['discount'];
                      echo formatMoney($ddd, true);
                      ?>
                                </td>

                                <td>
                                    <?php
                      $amoun=$row['amount'];
                      
                      echo formatMoney($amoun, true);
                      ?>
                                </td>
                                <td>
                                    <?php
                      $vvv=$row['vat'];
                      echo formatMoney($vvv, true);
                      ?>
                                </td>
                                <td>
                                    <?php
                      $tta=$row['total_amount'];
                      echo formatMoney($tta, true);
                      ?> บาท
                                </td>

                                <td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id'];
                     ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"> ลบ</a></td>
                            </tr>
                            <?php
                }
                ?>
                            <tr>
                                <td colspan="9"><strong style="font-size: 12px; color: #222222;">ทั้งหมด:</strong>
                                </td>
                                <td colspan="3"><strong style="font-size: 12px; color: #222222;">
                                        <?php
                    function formatMoney($number, $fractional=true) {
                      if ($fractional) {
                        $number = sprintf( $number);
                      }
                      while (false) {
                        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '฿1,฿2', $number);
                        if ($replaced != $number) {
                          $number = $replaced;
                        } else {
                          break;
                        }
                      }
                      return $number; 
                    }
                    $invv=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $invv);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $amountprice=$rowas['sum(total_amount)'];
                      echo formatMoney($amountprice, true);
                    }
                    ?> บาท
                                    </strong></td>
                            </tr>

                        </tbody>
                    </table><br>
                    <a rel="facebox" class="btn btn-primary"
                        href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $amountprice ?>&cashier=<?php echo $session_cashier_name?>&p_amount=<?php echo $amoun?>">ชำระเงิน</a>


                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
    </div>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>

    <link href="vendor/chosen.min.css" rel="stylesheet" media="screen">
    <script src="vendor/chosen.jquery.min.js"></script>
    <script>
    $(function() {
        $(".chzn-select").chosen();

    });
    </script>

    </script>
    <script>
    $(function() {
        $(".chzn-select").chosen();


    });
    //เช็คแบบใส่จำนวน
    function textChange(e) {
        const qty = e.value;
        const stock = $('#seleceproduct option:selected').attr('qty');
        if (qty > stock) {
            alert("จำนวนสินค้าไม่พอ กรุณาระบุจำนวนใหม่อีกครั้ง!");
            e.value = 1;
        }
    }


    // เช็คแบบปุ่ม 
    function ButtomChange(e) {
        e.preventDefault();
        const qty = $('#qtyleap').val();
        const stock = $('#seleceproduct option:selected').attr('qty');
        if (qty > stock) {
            alert("จำนวนสินค้าไม่พอ กรุณาระบุจำนวนใหม่อีกครั้ง!");
            e.value = 1;
        }
    }
    </script>
</body>

</html>