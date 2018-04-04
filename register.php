<?php
include_once('dbcon.php');
		
$usernameSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
$usernameQuery = mysqli_query($con,$usernameSQL);
$usernameResult = mysqli_fetch_array($usernameQuery);
//------------------------------------------------------------------------------
if($usernameResult){		
	echo "มีชื่อผู้ใช้นี้แล้ว";
}else if($_POST["txtUsername"] ==""){
	header("Location: index.php");

}else{		
$usernameSQL = "INSERT INTO member (Username,Pass,FullName,Email,Tel,Stat,view) VALUES ('".$_POST["txtUsername"]."',
'".$_POST["txtPassword"]."','".$_POST["txtFullName"]."','".$_POST["email"]."','".$_POST["tel"]."','member',0)";

		$usernameQuery = mysqli_query($con,$usernameSQL);
	
	echo"<body onload=\"window.alert('สมัครสมาชิกสำเร็จ');return history.go(-1)\">"; 
		
}

	mysqli_close();
?>
