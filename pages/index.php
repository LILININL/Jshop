<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="logoc.jpg">
	<title>J Shop</title>

	<div class="loader"></div>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="logoc.jpg">
	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<!-- <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> -->

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
	
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="stylee.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<body>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



    </head>

    <body>
    	<?php
    	function createRandomPassword() {
    		$chars = "003232303232023232023456789";
    		srand((double)microtime()*100000);
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

   <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
			<form method="post" name="admin_form">
		<div id="home" class="tab-pane fade in active">
            <div class="nk-form">
			<div >
    						<h3 ><b>J Shop Login </b></h3>
    					</div>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                 
                    <div class="nk-int-st">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                </div>
                <button id = "btn-login" name = "btn-login"  class="btn  btn-login  btn-float btnn-gradient-border btnn-glow"><i class="notika-icon notika-right-arrow right-arrow-ant"></i> </button>
				
			</form>
            </div>
              <div class="form-group" id="alert-msg"></div>
            <div class="nk-navigation nk-lg-ic">
                <a href="#" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Aphipart</span></a>
                <a href="#" data-ma-block="#l-forget-password"><i>?</i> <span>093-6252277</span></a>
            </div>
        </div>
	</div>

    	<!-- jQuery -->
    	<script src="../vendor/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="../vendor/metisMenu/metisMenu.min.js"></script>

    	<script type="text/javascript">
    		jQuery(function(){
    			$('form[name="admin_form"]').on('submit', function(jlogin){
    				jlogin.preventDefault();

    				var a = $(this).find('input[name="username"]').val();
    				var b = $(this).find('input[name="pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg').html('<div class="alert alert-danger">ต้องกรอกข้อมูลทุกช่อง!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg').html('');
    						}
    					})
    					.done(function(jlogin){
    						if (jlogin == 0){
    							$('#alert-msg').html('<div class="alert alert-danger">ID หรือ รหัสผ่านผิด ติดต่อ ผู้ดูแล!</div>');
    						}else{
    							$("#btn-login").html('<img src="loading-small-mobile.gif" /> ');
								if (jlogin == "admin"){
									setTimeout(' window.location.href = "home.php"; ',1000);
								}else {
									setTimeout(' window.location.href = "cashier/sales.php?id=cash&invoice=<?php echo $finalcode ?>"; ',1000);
								}
    							
    						}
    					});
    				}
    			});

    			$('form[name="cashier_form"]').on('submit', function(jlogin){
    				jlogin.preventDefault();

    				var a = $(this).find('input[name="cashier_username"]').val();
    				var b = $(this).find('input[name="cashier_pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg1').html('<div class="alert alert-danger">ต้องกรอกข้อมูลทุกช่อง!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'cashier/new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg1').html('');
    						}
    					})
    					.done(function(jlogin){
    						if (jlogin == 0){
    							$('#alert-msg1').html('<div class="alert alert-danger">ID หรือ รหัสผ่านผิด ติดต่อ ผู้ดูแล!</div>');
    						}else{
    							$("#btn").html('<img src="loading-small-mobile.gif"/> ');
    							setTimeout(' window.location.href = "cashier/sales.php?id=cash&invoice=<?php echo $finalcode ?>"; ',1000);
    						}
    					});
    				}
    			});
    		});
    	</script>
		 <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>

    </body>

    </html>
