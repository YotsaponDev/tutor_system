<?php
	session_start();
		
	include("dbcon.php");           //เรียก function สำหรับติดต่อฐานข้อมูลจากหน้า connect.php ขึ้นมา
	/////////////////////////////
	$nameSQL = "SELECT * FROM status ";
	$nameQuery = mysqli_query($con,$nameSQL);
	$nameResult = mysqli_fetch_array($nameQuery);
	//////////////////////////////////////////////////
		$name = $_SESSION['ses_name'];
		$nameSQL = "DELETE FROM `status` WHERE `status`.`name` = '$name'";
		$nameQuery = mysqli_query($con,$nameSQL);
		//////////////////////////////////////////////////
		unset ( $_SESSION['ses_userid'] );
		unset ( $_SESSION['ses_username'] );
		//"UPDATE status SET status_online = '0' WHERE name = $_SESSION['ses_name']";
		session_destroy();
		header("location:http://www.tutorlawc8.com/");
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
