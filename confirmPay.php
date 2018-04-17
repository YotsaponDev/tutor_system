<?php
session_start();
error_reporting(~E_NOTICE);
	$ID = $_REQUEST['ID']; 
	$act = $_REQUEST['act'];

	$ses_id =$_SESSION[ses_id];           
	$ses_username = $_SESSION[ses_username];     
	$ses_name = $_SESSION[ses_name]; 

	if($ses_id <> session_id() or  $ses_username ==""){ 
		header("location:index.php");
	} 
?>

<?php
$imageupload = $_FILES['imageupload']['tmp_name'];
$imageupload_name = $_FILES['imageupload']['name'];

include("connect.inc");
include("dbcon.php");

$mSQL = "SELECT * FROM orders WHERE ID = '$ID' ";
  	$mQuery = mysqli_query($con,$mSQL);
  	$t = mysqli_fetch_array($mQuery);

  	date_default_timezone_set("Asia/Bangkok"); 
  	$dt = date("d-m-Y H.i.sa"); 

	$mySQL = "SELECT * FROM member WHERE Username = '$ses_username' ";
    $myQuery = mysqli_query($con,$mySQL);
    $my = mysqli_fetch_array($myQuery);


if(isset($_POST['submit'])){
	if($imageupload !== false){
		$arraypic = explode(".",$imageupload_name);//แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
			//$lastname = strtolower($arraypic);
		$filename = $arraypic[0];//ชื่อไฟล์
		$filetype = $arraypic[1];//นามสกุลไฟล์

		if($ID != "-" && $filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif"){

			$newimage = "$t[ID] $dt".".".$filetype;//รวมชื่อไฟล์กับนามสกุลเข้าด้วยกัน
			copy($imageupload,"admin/file/".$newimage); //โฟลเดอร์สำหรับเก็บรูป/ไฟล์รูป

			$showpic = "admin/file/".$newimage;

			$sql = "UPDATE orders SET confirmPay='1',confirmTime='$newimage' WHERE ID = '$ID' ";

			if ($ID != "-" && $con->query($sql) === TRUE) {
    			echo"<body onload=\"window.alert('ยืนยันสลิปสำเร็จ')\">"; 
			}else{
    			echo "Error updating record: " . $con->error;
			}

		}else{
			echo"<body onload=\"window.alert('กรุณาเลือกรูปภาพสลิปและออเดอร์ที่ท่านจะยืนยัน')\">";
		}
	}
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>TutorLawC8 ::.</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/validation.min.js"></script>
<style>
body{margin:0 auto;}
#form_upload{margin:0px auto;}
#showimage{margin:100px auto 20px auto;}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <!-- <a class="navbar-brand" href="#">WebSiteName</a>  -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	  <p class="navbar-text">ยินดีต้อนรับ : <?php echo $my['FullName'] ?> </p>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="tutor.php" style="cursor:pointer"><span class="glyphicon glyphicon-th-list"></span> เลือกซื้อหนังสือ</a></li>
      	<li><a href="preorder.php" style="cursor:pointer"><span class="glyphicon glyphicon-shopping-cart"></span> หนังสือที่สั่งซื้อ</a></li>
      	<li><a href="mybook.php" style="cursor:pointer"><span class="glyphicon glyphicon-book"></span> หนังสือของฉัน</a></li>
        <li><a href="confirmPay.php" style="cursor:pointer"><span class="glyphicon glyphicon-usd"></span> แจ้งชำระเงิน</a></li>
        <li><a href="howToPay.php" style="cursor:pointer"><span class="glyphicon glyphicon-check"></span> วิธีชำระเงิน</a></li>
        <li><a href="/webboard" style="cursor:pointer"><span class="glyphicon glyphicon-tasks"></span> กระดานสนทนา</a></li>
        <li><a href="logout.php" style="cursor:pointer"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ</a></li>
      </ul>
    </div>
  </div>
</nav>

<center><div id="showimage">
<?php 
if($_POST['submit']){ 
//	echo "<img width=150 src='$showpic'";
	}
?>
</div></center>

<?php
	include("connect.inc");
	include("dbcon.php");

	$mySQL = "SELECT * FROM orders WHERE Username = '$_SESSION[ses_username]' AND confirmPay = 0";
  	$my = $con->query($mySQL);
 // 	$fortime = $my->fetch_assoc();
?>

<div id="form_upload">
<form method="post" enctype="multipart/form-data">
<center><h4>สามารถแจ้งการชำระเงินได้ดังนี้</h4>
<h5>1.เมื่อท่านชำระเงินเสร็จแล้วให้ท่านเลือกแพ็คเกจที่ท่านสั่งซื้อแล้วทำการแนบสลิปได้ทันที</h5>
</center>
<center>กรุณาเลือกแพ็คเกจที่ท่านจะยืนยัน <select name="ID">  
    <option> - </option>
	<?php
		if ($my->num_rows > 0) {
    		while($row = $my->fetch_assoc()) {
    			echo "<option value='$row[ID]'> $row[book_name] </option>";
    		}
		}
	?>
	</select> <br><br>

<input name="imageupload" type="file" size="35"/><br/>
<input type="submit" name="submit" value="ยืนยันสลิป"/></center>
</form>
<center><h5>2.สามารถแจ้งสลิปการโอนเงินได้ทาง LINE Application : #####</h5>
<h5>และที่เบอร์โทรศัพท์ 09-8888-7777</h5>
</center>
</div>
</body>
</html>