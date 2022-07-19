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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->


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
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <?php 
                              include('connect.php');
                              $today = date('m/d/Y');
                              $sql = "SELECT sum(amount) FROM sales WHERE date = ?";
                              $query = $db->prepare($sql);
                              $query->execute(array($today));
                              $fetch = $query->fetchAll();
                              foreach ($fetch as $key => $value) {
                                $data = $value['sum(amount)'];
                              }
                              $json = json_encode($data);
                              ?>
                                    <h3 class="mb-0"> <?php 
                                echo "<font style = 'color:green;'>" .  formatMoney($data, true) . "  บาท" ,"</font>" ;  
                                ?> </h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-scale-balance"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">ยอดขายวันนี้</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?php  
                          include('connect.php');
                          $date = date_create('now')->format('m/d/Y');                          
                          $result = $db->prepare("SELECT date,SUM(B.price*qty) as allPrice,SUM(cost*qty) as allCost ,SUM((B.price - cost)*qty) as Profit FROM `sales_order` as A INNER JOIN products as B  on A.product = B.product_code  
                          where date = '$date' ");                         
                          $result->execute(); 
                          for($i=0; $row = $result->fetch(); $i++){
                          $Profit = $row['Profit'];                     
                          if ($Profit == NULL){
                            echo "<font style = 'color:green;'>" ."0". "  บาท" ,"</font>";
                          }else{
                            echo "<font style = 'color:green;'>" .$Profit. "  บาท", "</font>";
                          }
                          ?></h3>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">กำไรของวันนี้</h6>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <a href="view_productqty.php"></a>
            <div class="col-xl-3 col-sm-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <a href="view_productqty.php">
                                        <h3 class="mb-0"><?php 
                          include('connect.php');
                          $result = $db->prepare("SELECT * FROM products where qty_left <= 5 ORDER BY product_id DESC");
                          $result->execute();
                          $rowcount = $result->rowcount();
                          ?>
                                            <?php echo "<font style = 'color:red;'>".$rowcount. "  ชิ้น" ,"</font>" ;?>
                                        </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-flattr"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">รายการสินค้าที่ต้องสั่งเพิ่ม</h6></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?php  
                          include('connect.php');
                          $result = $db->prepare("SELECT SUM(cost) FROM `purchases_item` WHERE status = 'ได้รับ';");
                          $result->execute(); 
                          $number_of_rows = $result->fetchColumn(); 
                          echo $number_of_rows;
                          if ($number_of_rows == NULL){
                            echo "0";
                          }
                          ?> </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-warning">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                                              
                        </div>
                        <h6 class="text-muted font-weight-normal">ยอดรายจ่ายออเดอร์สินค้ารวมทั้งหมด</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php 
                        include('connect.php'); 
                        @ini_set('display_errors', '0');
                        $sql = "SELECT a.name ,SUM(qty) AS qtya,SUM(qty*a.price) AS pp , SUM(cost*qty) AS cost, SUM(qty*a.price)-SUM(cost*qty) AS balacne FROM sales_order AS a INNER JOIN products AS b ON a.product=b.product_code GROUP BY product ORDER BY `a`.`qty` DESC LIMIT 0,5";
                        $query = $db->prepare($sql); 
                        $query->execute();
                        $fetch = $query->fetchAll();
                        foreach ($fetch as $key => $value) {
                          
                            $dataa[] = array('title'=>$value['name'], 'value'=>$value['qtya']);
                        }
                        $chart = json_encode($dataa);
                        ?>
            <?php 
                        include('connect.php');
                        $sql = "SELECT *, month as mon, SUM(amount) as qcount FROM sales GROUP BY month";
                        $query = $db->prepare($sql); 
                        $query->execute();
                        $fetch = $query->fetchAll();
                        foreach ($fetch as $key => $value) {
							          $data1 = array();
                            $data1[] = array('titlemon'=>$value['mon'], 'value1'=>$value['qcount']);
                        }
                        $d = json_encode($data1);
                        ?>
            <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">อันดับสินค้าขายดี</h4>
                        <div id="charttt" style="height:250px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ยอดการขายรายเดือน</h4>
                        <div id="chartdiv" style="height:250px"></div>
                    </div>
                </div>

            </div>
            <div>
                <div class="row ">
                    <div class="col-auto grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order Status</h4>
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color:white"> ชื่อผู้ขาย </th>
                                                <th style="color:white"> เลขที่ใบเสร็จ </th>
                                                <th style="color:white"> ชื่อสินค้า </th>
                                                <th style="color:white"> วันที่สั่ง </th>
                                                <th style="color:white"> กำหนดส่งมอบ </th>
                                                <th style="color:white"> จำนวนสินค้า </th>
                                                <th style="color:white"> ราคา </th>
                                                <th style="color:white"> สถานะ </th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

                          include('connect.php');
                          $result = $db->prepare("SELECT * FROM purchases ORDER BY transaction_id desc limit 0,4");
                          $result->execute();
                          for($i=0; $row = $result->fetch(); $i++){
                          ?>
                                            <tr>
                                                <td style="color:white">
                                                    <?php echo $row['suplier']; ?>
                                                </td>
                                                <td style="color:white">
                                                    <span class="pl-2">JSH-<?php echo $row['transaction_id']; ?></span>
                                                </td>
                                                <td style="color:white"> <?php
                            $rrrrrrr=$row['p_name'];
                            $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                            $resultss->bindParam(':asas', $rrrrrrr);
                            $resultss->execute();
                            for($i=0; $rowss = $resultss->fetch(); $i++){
                              echo $rowss['product_name'];
                            }
                            ?> </td>
                                                <td style="color:white"><?php echo $row['date_order']; ?> </td>
                                                <td style="color:white"> <?php echo $row['date_deliver']; ?> </td>
                                                <td style="color:white"> <?php echo $row['qty']; ?> </td>
                                                <td style="color:white"><?php
                $dsdsd=$row['cost'];
                echo formatMoney($dsdsd, true);
                ?></td>
                                                <td>
                                                    <?php if
                                ($row['status'] == 'ส่งคืน') {echo  "<div class='badge badge-info'><font style = 'color:#FFFFFF'>".$row['status'] ,"</font>"."</div>";}
                                if($row['status'] == 'ยกเลิก') {echo "<div class='badge badge-danger'><font style = 'color:#FFFFFF'>".$row['status'] ,"</font>"."</div>";}
                                if($row['status'] == 'ได้รับ') {echo "<div class='badge badge-success'><font style = 'color:#FFFFFF'>".$row['status'] ,"</font>"."</div>";}
                                if($row['status'] == 'รอดำเนินการ') {echo "<div class='badge badge-warning'><font style = 'color:#FFFFFF'>".$row['status'] ,"</font>"."</div>";}
                                      ?>
                                                </td>
                                            </tr>
                                            <?php
            }
            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">รูปนักเรียนเพิ่มกำลังใจ</h4>
                                <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel"
                                    id="owl-carousel-basic">
                                    <div class="item">
                                        <img src="assets/images/dashboard/1.png" width="310px" height="216px" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/dashboard/2.jpg" width="310px" height="216px" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/dashboard/3.jpg" width="310px" height="216px" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/dashboard/4.jpg" width="310px" height="216px" alt="">
                                    </div>
                                </div>
                                <div class="d-flex py-4">
                                    <div class="preview-list w-100">
                                        <div class="preview-item p-0">

                                            <div class="preview-item-content d-flex flex-grow">
                                                <div class="flex-grow">
                                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                        <h6 class="preview-subject"><?php echo $session_admin_name;?>
                                                        </h6>
                                                    </div>
                                                    <p class="text-muted"><?php echo $session_admin_name;?> to be
                                                        working now.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="orayt">
                        <?php 
						include('connect.php');
						$today = date('m/d/Y');
						$sql = "SELECT sum(amount) FROM sales WHERE date = ?";
						$query = $db->prepare($sql);
						$query->execute(array($today));
						$fetch = $query->fetchAll();
						foreach ($fetch as $key => $value) {
							$data = $value['sum(amount)'];
						}
						$json = json_encode($data);
						?>
                    </div>
                </div>
                <script src="js/jquery.js"></script>

                <script src="plugins/amcharts/amcharts.js" type="text/javascript"></script>
                <script src="plugins/amcharts/themes/light.js" type="text/javascript"></script>
                <script src="plugins/amcharts/pie.js" type="text/javascript"></script>
                <script type="text/javascript">
                var raw = '<?php echo $chart; ?>';
                var dataa = JSON.parse(raw);
                var chart = AmCharts.makeChart("charttt", {
                    "type": "pie",
                    "theme": "light",
                    "dataProvider": dataa,
                    "titleField": "title",
                    "valueField": "value",
                    "labelRadius": 25,

                    "radius": "37%",
                    "innerRadius": "40%",
                    "labelText": " [[title]] ([[percents]]%)",
                    "export": {
                        "enabled": true
                    },
                    "depth3D": 10,
                    "angle": 17,
                    "fontFamily": "Helvetica",
                    "fontSize": 13,
                    "balloonText": "[[value]]",
                    "color": "#FFFFFF",
                    // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
                    "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000',
                        '#00CC00',
                        '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000'
                    ]
                });
                </script>
                <script src="plugins/amcharts/amcharts.js" type="text/javascript"></script>
                <script src="plugins/amcharts/pie.js" type="text/javascript"></script>
                <script src="plugins/amcharts/serial.js" type="text/javascript"></script>
                <script src="plugins/export/export.min.js" type="text/javascript"></script>
                <link rel="stylesheet" href="plugins/export/export.css" type="text/css" media="all" />
                <script src="plugins/amcharts/themes/light.js" type="text/javascript"></script>
                <!-- <script src="assets/js/chart.js"></script> -->
                <script type="text/javascript">
                var raw = '<?php echo $d; ?>';
                var data = JSON.parse(raw);
                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "serial",
                    "theme": "light",
                    "dataProvider": data,
                    "valueAxes": [{
                        "gridColor": "#FFFFFF",
                        "gridAlpha": 1,
                        "dashLength": 0
                    }],
                    "gridAboveGraphs": true,
                    "startDuration": 5,
                    "graphs": [{
                        "balloonText": "[[category]]: <b>Total Sales [[value1]]</b>",
                        "fillAlphas": 1,
                        "lineAlpha": 0.2,
                        "type": "column",
                        "valueField": "value1"
                    }],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "titlemon",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "gridAlpha": 1,
                        "tickPosition": "start",
                        "tickLength": 20
                    },
                    "export": {
                        "enabled": true
                    },
                    "color": "#FFFFFF",



                });
                </script>


                <!-- plugins:js -->
                <script src="assets/vendors/js/vendor.bundle.base.js"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <!-- <script src="assets/vendors/chart.js/Chart.min.js"></script> -->
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
                <script src="assets/js/todolist.js"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="assets/js/dashboard.js"></script>
                <!-- End custom js for this page -->
                <!-- Custom js for this page -->

                <script>
                $('.carousel').carousel({
                    interval: 10000 //changes the speed
                })
                </script>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>