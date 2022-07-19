<?php
session_start();
include 'connect.php';            // <----- เรียก file connection

 //Get User Challenge
 function UserChallenge($UserName)         // <----- Function ขอ Challenge ของ User นั้นๆ
 {
	$sql = "SELECT * FROM `User` WHERE `UserName` = '".$UserName."'";
	$query = mysql_query($sql);
	$nums = mysql_num_rows($query);
	
	if($nums == 1)
	{
		$rows = mysql_fetch_assoc($query);
		$UserChallenge = $rows['UserChallenge'];
	}
	else
	{
		$UserChallenge = 0;
	}
	
	return $UserChallenge;
}

function Login($UserName,$Password)           // <----- Function Login
{
	$sql = "SELECT * FROM `User` WHERE `UserName` = '".$UserName."' AND `Password` = '".$Password."'";
	$query = mysql_query($sql);
	$nums = mysql_num_rows($query);
	
	if($nums == 1)
	{
		$rows = mysql_fetch_assoc($query);
		$_SESSION['UniqId'] = $rows['Uniq_Id'];
		$_SESSION['UserName'] = $rows['UserName'];
		$_SESSION['RoleId'] = $rows['Role_ID'];
		
		$return = $_SESSION['UniqId'];
	}
	else
	{
		$return = 0;
	}
	
	return $return;
}

// Require User Challenge
if($_REQUEST['User'])
{
	$UserName = $_REQUEST['User'];
	$Return = UserChallenge($UserName);
	
	echo json_encode($Return);
	return;
}

// Login
if($_REQUEST['login'])
{
	list($UserName,$Password) = explode('|',$_REQUEST['login']);
	$Login = Login($UserName,$Password);
	
	echo json_encode($Login);
	return;
}
?>