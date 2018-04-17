<?php
  session_start();
  include("dbcon.php");
  include("online.php");
  	//	require_once("dbcon.php"); 
		$ses_id =$_SESSION[ses_id];                 //สร้าง session สำหรับเก็บค่า ID
		$ses_username = $_SESSION[ses_username];         //สร้าง session สำหรับเก็บค่า username
		$ses_name = $_SESSION[ses_name]; 

    $mySQL = "SELECT * FROM member WHERE Username = '$_SESSION[ses_username]' ";
    $myQuery = mysqli_query($con,$mySQL);
    $my = mysqli_fetch_array($myQuery);

		if($ses_id <> session_id() or  $ses_username ==""){  //ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
			header("location:index.php");
		}

?>
<!DOCTYPE html>
<html>
<head >
	<meta charset="UTF-8" />
	<title>TutorLawC8 ::.</title>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/validation.min.js"></script>

</head>

<body oncontextmenu="return false;">

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

	  <p class="navbar-text">ยินดีต้อนรับคุณ : <?php echo $my['FullName'] ?> </p>
      <!--  <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li> -->
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


<div class="container-fluid bg-1 text-center">
  <h3 class="margin">สามารถชำระเงินผ่าน PromptPay</h3> <br>
  <img src="file/qrcode.jpg"  style="display:inline" alt="qrcode" width="27%" height="67%">
  

  <h3 class="margin">โอนเงินผ่านบัญชีธนาคาร</h3>
  <img src="file/ktb.jpg" style="display:inline" alt="ktb" width="24%" height="7%">
  <h4>ชื่อบัญชี นายจิตติวัตร ยศหนัก</h4>
  <h4>สาขา ศูนย์ราชการจังหวัดพะเยา </h4> 
  <h4>บัญชีเลขที่ 986-8-21403-3 </h4> 

  <h4>หลังจากที่ท่านชำระเงินแล้ว กรุณาแจ้งชำระเงิน และติดต่อเจ้าหน้าที่ได้ที่เบอร์ 09-8888-7777 </h4>
  <br>
</div>


</body>
</html>

