 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!-- MetisMenu CSS -->
 <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

 <!-- Custom Fonts -->
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">






 <form action="savesupplier.php" method="post" class = "form-group">
 	<div id="ac">
 		<span>ชื่อผู้ขาย : </span><input type="text" name="name" class = "form-control" />
 		<span>ชื่อผู้ติดต่อ : </span><input type="text" name="cperson" class = "form-control" />
 		<span>ที่อยู่ : </span><input type="text" name="address" class = "form-control" />
 		<span>ติดต่อ*(เฉพาะตัวเลข)  : </span><input type="text" name="contact" class = "form-control"  required/>
 		<span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow"  type="submit" value="บันทึก" class = "form-control" />
 	</div>
 </form>