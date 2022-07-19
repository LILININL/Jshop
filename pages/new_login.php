<?php 
	include ('connect.php');

	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
	$query = $db->prepare($sql);
	$query->execute(array($user,$pass));
	$row = $query->fetch();

	if ($query->rowCount() > 0){
		session_start();
		$_SESSION['SESS_MEMBER_ID'] = $row['id'];
		$_SESSION['SESS_ADMIN_ID'] = $row['position'];
		echo $row['position'];
	}else{
		echo 0;
	}

?>
