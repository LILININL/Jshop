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


    <link rel="shortcut icon" href="logoc.jpg">
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
        <?php
require_once('auth.php');
?>
        <?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*10000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='JSH-'.createRandomPassword();
?>

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="home.php">J shop</a>
                <a class="sidebar-brand brand-logo-mini" href="home.php">J</a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">

                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal"><?php echo $session_admin_name;?></h5>
                                <span><?php echo $row['position'];?></span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="#myModal" class="dropdown-item preview-item" data-toggle="modal">
                                <!-- แก้ป๊อบอัพ -->
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-account-multiple-plus text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">เพิ่มผู้ใช้งาน</p>
                                </div>
                            </a>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">แถบเมนู</span>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="checkStockHome(this)" class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">หน้าหลัก</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a  class="nav-link" data-toggle="collapse" href="#Report"
                        aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-alert"></i>
                        </span>
                        <span class="menu-title">รายงาน</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="Report">
                        <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a onclick="check45(this)" 
                                class="nav-link" href="#">รายงานกำไรขาดทุน</a></li>
                            <li class="nav-item"> <a onclick="check46(this)" class="nav-link" 
                                    href="#">รายงานการขายตามประเภท</a></li>
                            <li class="nav-item"> <a onclick="check1(this)" class="nav-link"
                                    href="#">ประวัติการขาย</a></li>
                            <li class="nav-item"> <a onclick="check2(this)" class="nav-link"
                                    href="#">รายงานคลังสินค้า</a></li>
                            <li class="nav-item"> <a onclick="check3(this)" class="nav-link"
                                    href="#">รายงานสินค้าที่มีปัญหา</a>
                            </li>
                            <li class="nav-item"> <a onclick="check4(this)" class="nav-link"
                                    href="#">ประวัติการซื้อของสมาชิก</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="check5(this)" class="nav-link"
                        href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-sale"></i>
                        </span>
                        <span class="menu-title">ขายสินค้า</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="check6(this)" class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-package-down"></i>
                        </span>
                        <span class="menu-title">สินค้า</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a  class="nav-link" data-toggle="collapse" href="#chartest"
                        aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Chart</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="chartest">
                        <ul class="nav flex-column sub-menu">
                        <li li class="nav-item"> <a onclick="check47(this)" class="nav-link" 
                        href="#">รายละเอียดรายรับรายจ่าย</a></li>
                            <li class="nav-item"> <a onclick="check7(this)" class="nav-link"
                                    href="#">รายละเอียดการขาย</a></li>
                            <li class="nav-item"> <a onclick="check8(this)" class="nav-link"
                                    href="#">การขายรายเดือน</a></li>
                            <li class="nav-item"> <a onclick="check9(this)" class="nav-link"
                                    href="#">การขายรายปี</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="check10(this)" class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-multiple"></i>
                        </span>
                        <span class="menu-title">รายชื่อสมาชิก</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="check11(this)" class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-briefcase-check"></i>
                        </span>
                        <span class="menu-title">รายการสั่งซื้อสินค้า</span>
                    </a>
                </li>
                <li class="nav-item menu-items">

                    <a onclick="check12(this)" class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">แบบฟอร์มใบสั่งซื้อ</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a onclick="check13(this)"  class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-heart"></i>
                        </span>
                        <span class="menu-title">ข้อมูลผู้ขาย</span>
                    </a>
                </li>
            </ul>
        </nav>
     
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="home.php"> J</a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">

                        <?php
              function ThDate()
              {
              //วันภาษาไทย
              $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
              //เดือนภาษาไทย
              $ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );

              //กำหนดคุณสมบัติ
              $week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
              $months = date( "m" )-1; // ค่าเดือน (1-12)
              $day = date( "d" ); // ค่าวันที่(1-31)
              $years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

              return "วัน$ThDay[$week] 
                  ที่ $day  
                  เดือน $ThMonth[$months] 
                  พ.ศ. $years";
              }
                    ?>
                        <div class="mb-0 d-none d-sm-block navbar-profile-name"><?php  echo ThDate(); ?>
                        </div>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        <?php echo $session_admin_name;?></p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0"><?php echo $session_admin_name;?> Menu</h6>
                                <div class="dropdown-divider"></div>
                                <a href="#myModal" data-toggle="modal" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-account-multiple-plus text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">เพิ่มผู้ใช้งาน</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">ออกจากระบบ</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>

                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>

            </nav>
            <?php include('adduser.php'); ?>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container" style="margin-left:15px;">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header ">การขาย </h1>
                        </div>
                    </div>
                    <div class="table-responsive-xl">
                        <div id="maintable" class="table-responsive-xl">
                            <form action="incoming.php" name="incoming" id="incoming" method="post" class="form-group">
                                <input type="hidden" name="pt" class="form-control"
                                    value="<?php echo $_GET['id']; ?>" />
                                <input type="hidden" name="invoice" class="form-control "
                                    value="<?php echo $_GET['invoice']; ?>" />
                                <div class="input-group-prepend">
                                    <label class="input-group-text  bg-primary text-white">เลือกสินค้า</label><br />
                                </div>
                                <select id="seleceproduct" name="product"
                                    class="js-example-basic-single select2-hidden-accessible" style="width:55%"
                                    required>
                                    <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM products");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                $checkQTY = false;
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
                                ?> qty="<?php echo $row['qty_left']; ?>">
                                        JSHP-<?php echo $row['product_id']; ?>
                                        - <?php echo $row['product_name']; ?>
                                        - คงเหลือ <?php echo $row['qty_left']; ?>
                                        - ราคา <?php echo $row['price']; ?>
                                        - ร้าน <?php echo $row['supplier']; ?>
                                    </option>
                                    <?php
          }
          ?>
                                </select>
                                <br />
                                <br />
                                <div class="input-group-prepend">

                                    <label class="input-group-text bg-primary text-white">จำนวนรายการ</label>
                                    <!-- onchange="textChange(this)" -->
                                    <input type="text" id="qtyleft" onchange="qtychena(this)" oninput="maxLengthCheck(this)"  name="qty"  min="1"  maxlength="2"  value="1"
                                        class="form-control" autocomplete="on" onkeypress=" return isNumber(event)"
                                        style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;"
                                        required />
                                </div>
                                <br />
                                <br />
                                <div class="input-group-prepend">
                                    <label
                                        class="input-group-text bg-primary text-white">ส่วนลด(หนึ่งสินค้าต่อหนึ่งส่วนลด)</label>

                                    <input type="text" name="discount" value="0" class="form-control" autocomplete="off"
                                        style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;"
                                        onkeypress=" return isNumber(event)" required />
                                </div>

                                <br>
                                <!--onclick="ButtomChange(this)"-->
                                <input type="submit"  onclick="ButtomChange(this)" class="btn btn-success"
                                    <?php if($checkQTY){ echo "disabled";} ?> value="เพิ่มสินค้า" class="form-control"
                                    style="width: 123px;" />
                            </form>
                            <div class="table-wrapper">
                                <table width="100%" class="table table-hover text-light" id="dataTables-example">
                                    <thead colspan="5" style="border-top:2px solid #FFFFFF">
                                        <tr>

                                            <th style="color:white">ชื่อสินค้า</th>
                                            <th style="color:white">จำนวน</th>
                                            <th style="color:white">ราคา</th>
                                            <th style="color:white">ส่วนลด</th>
                                            <th style="color:white">ราคารวมทั้งหมด</th>
                                            <th style="color:white">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody colspan="5" style="border-top:2px solid #FFFFFF">

                                        <?php
                                    $id=$_GET['invoice'];
                                    include('connect.php');
                                    $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                                    $result->bindParam(':userid', $id);
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        
                                        ?>
                                        <tr class="record" id="recode">

                                            <td id="asd"><?php  echo $row['name']; ?></td>

                                            <td><?php echo $row['qty'];?></td>
                                            <td>
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
                                        $amam=$row['amount'];
                                        $tta= $row['qty']* $row['price'];
                                        echo formatMoney($tta, true);
                                        ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                    href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>">
                                                    ลบ</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td id="tt" name="tt" colspan="4" style="border-top:2px solid #FFFFFF">
                                                <font color="#FFFFFF">รวมยอดทั้งสิ้น :</font></strong>
                                            </td>
                                            <td colspan="3" style="border-top:2px solid #FFFFFF">
                                                <font color="#FFFFFF">
                                                    <?php
                                            function formatMoney($number, $fractional=true) {
                                                if ($fractional) {
                                                $number = sprintf('%.2f', $number);
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
                                            $invve=$_GET['invoice'];
                                            $resultas = $db->prepare("SELECT  amount,qty,sum(price*qty-discount) AS TT
                                            FROM sales_order  WHERE invoice= :invoice");
                                            $resultas->bindParam(':invoice', $invve);
                                            $resultas->execute();
                                            for($i=0; $rowas = $resultas->fetch(); $i++){
                                            $summamount=$rowas['TT'];
                                            echo formatMoney($summamount, true);
                                            }
                                            ?>
                                                    </strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div><br>
                            <a rel="facebox" class="btn btn-danger"
                                href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $summamount ?>&cashier=<?php echo $session_admin_name?>">จ่ายเงิน</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
    <!-- <script>
        jQuery('.record').on('mouseover', function (evt) {
          jQuery(this).find('.mi_dl_ro_w1').toggle();
});
    </script> -->

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

    //เช็คแบบใส่จำนวน
    function qtychena(e) {
        const qty = e.value;
        const stock = $('#seleceproduct option:selected').attr('qty');
        console.log();
        if (parseInt(qty) > parseInt(stock)) {
            alert("จำนวนสินค้าไม่พอ กรุณาระบุจำนวนใหม่อีกครั้ง! หรือ โปรดระบุตัวเลขเท่านั้น!");
            e.value = 1;
        }
    }
    //เช็คแบบปุ่ม 
    function ButtomChange(e) {
        // e.preventDefault();
        const qty = $('#qtyleft').val();
        const stock = $('#seleceproduct option:selected').attr('qty');
        if (parseInt(qty) > parseInt(stock)) {
            alert("จำนวนสินค้าไม่พอ กรุณาระบุจำนวนใหม่อีกครั้ง!");
            e.value = 1;
        }
        // const product_code = $('#seleceproduct option:selected').val();

        // if (product_code2 == "") {
        //     product_code2 = product_code;
        // } else {
        //     product_code2 += "," + product_code;
        // }
        // $("#procode").val(product_code2);
        // $("#incoming").submit();
    }
    </script>
    <!-- <script>
    var sm = document.getElementsByName("Submit2")[0];
    sm.addEventListener("click", checkStock);

    function checkStock() {
        var qty = document.getElementById("incoming");

        if (parseInt(qty.value) <= parseInt(sm.getAttribute("incoming"))) {
            alert("โหลดหน้าถัดไป");
        } else {
            alert("โหลดหน้าเดิม");
        }
    }
    </script> -->

    <!-- <script>
    window.onload = lodedata() {

        var name = sessionStorage.getItem('name');
        if (name !== null) $('#name').val(name);

        var qty = sessionStorage.getItem('qty');
        if (qty !== null) $('#qty').val(qty);

        var price = sessionStorage.getItem('price');
        if (price !== null) $('#price').val(price);

        var discount = sessionStorage.getItem('discount');
        if (discount !== null) $('#discount').val(discount);
    }


    window.onbeforeunload = oolodedata() {
        sessionStorage.setItem("name", $('#name').val());
        sessionStorage.setItem("qty", $('#qty').val());
        sessionStorage.setItem("price", $('#price').val());
        sessionStorage.setItem("discount", $('#discount').val());
    }
    </script> -->
    <script>
    function maxLengthCheck(object)
    {
        if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }
    </script>


    <script type="text/javascript"> 
     function isNumber(evt)
		 {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }
    </script>

    <script type="text/javascript">
    function checkStockHome(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='home.php';
        }
        }
    </script>
      <script type="text/javascript">
    function check45(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='reprotsalecount.php';
        }
        }
    </script>
     <script type="text/javascript">
    function check46(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='reportsalesdetails.php';
        }
        }
    </script>
     <script type="text/javascript">
    function check47(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='profitchart.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check1(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='salesreport.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check2(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='inventory.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check3(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='returned.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check4(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='search_customer.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check5(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='sales.php?id=cash&invoice=<?php echo $finalcode ?>';
        }
        }
    </script>
    <script type="text/javascript">
    function check6(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='products.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check7(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='chart.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check8(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='month_chart.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check9(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='yearly_chart.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check10(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='customer.php';
        }
        }
    </script>
    <script type="text/javascript">
    function check11(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='purchaseslist.php';
        }
        }
    </script>
 <script type="text/javascript">
    function check12(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='orderpo.php';
        }
        }
    </script>
     <script type="text/javascript">
    function check13(e) {
        var carnr;
        carnr = "<?php print($summamount); ?>"
        console.log(carnr);
        if (carnr > 0.00) {
             alert("มีข้อมูลอยู่แล้ว กรุณาลบข้อมูลก่อน");
        }else {
            window.location.href='supplier.php';
        }
        }
    </script>

</body>

</html>