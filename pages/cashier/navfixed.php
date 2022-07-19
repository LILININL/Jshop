<?php
require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
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
 <link rel="stylesheet" href="stylee.css">
 <div class="loader"></div>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">J Shop Cashier</a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right  ">
	 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> <?php echo $session_cashier_name; ?> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
					<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>ออกจากระบบ</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->


<!-- 
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						
				
							<li>
								<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">เงินสด</a>
							</li>
							<!-- <li>
								<a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">โอนเงิน</a>
							</li> -->
						
					</li>
				</div>
			</div> 
			<!-- /.navbar-static-side -->
		</nav>
