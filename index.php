<?php
		session_start(); //เปิด session
    include("dbcon.php");
    include("online.php");
    $mySQL = "SELECT * FROM member WHERE Username = '$_SESSION[ses_username]' ";
    $myQuery = mysqli_query($con,$mySQL);
    $my = mysqli_fetch_array($myQuery);
  
      $ses_id =$_SESSION[ses_id];                 //สร้าง session สำหรับเก็บค่า ID
      $ses_username = $_SESSION[ses_username];         //สร้าง session สำหรับเก็บค่า username
      $ses_name = $_SESSION[ses_name]; 
    //	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
    //	$PHP_SELF = $_SERVER['PHP_SELF'];
  
      if($ses_id <> session_id() or  $ses_username ==""){  //ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
      //  header("location:http://www.tutorlawc8.com/");
      } else{
      	header("location:http://www.tutorlawc8.com/tutor.php");
      }
?>

<!DOCTYPE html>
<html>
<head >
	<meta charset="UTF-8" />
	<title>TutorLawC8 ::.</title>
	<link rel="shortcut icon" href="images/ico/ico.ico">   
<!--	 <link rel="stylesheet" type="text/css" href="css/index.css"> --> 
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/validation.min.js"></script>
<!-- <script type="text/javascript" src="script/login.js"></script> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset="utf-8" />  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />

</script>
  <style>
  .container {
      padding: 20px 100px;
  }
.carousel-inner img {
     
      margin: auto;
      align-items: right;
  }
    .carousel-caption {
      right: auto;
   left: 49%;
  }

  .triangle {
    margin: 0 auto;
    text-align:center;
    width: 0;
    height: 0;
    border-top: 30px solid white;
    border-left: 585px outset transparent;
    border-right: 585px outset transparent;
    position: relative;
}

   .navbar {
      background-color: #2d2d30;

  }
    .navbar-nav li a:hover {
      color: #fff !important;
  }
   .bg-contact {
      background: white;
      color: #2d2d30;
  }
  .bg-contact h3 {color: #2d2d30;}
  .bg-contact p {font-style: italic;}

  .bg-shop {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-shop h3 {color: #fff;}
  .bg-shop p {font-style: italic;}

  .thumbnail {
      padding: 0 0 15px 0;
      border: solid 1px;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
    .thumbnail-sub {
      padding: 0 0 15px 0;
      border: solid 1px;
      border-radius: 0;
  }
  .thumbnail-sub img {
      margin-bottom: 10px;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  footer {
      background-color: #2d2d30;
      color: #fff;
      padding: 15px;
  }
  footer a {
      color: #fff;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  </style>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a href="#" class="brand">
                        <img src="images/logo1.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	<!--  <p class="navbar-text">Tutor Room. </p>
      <!--  <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal" data-target="#myModalRegister" style="cursor:pointer"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
        <li><a data-toggle="modal" data-target="#myModalLogin" style="cursor:pointer"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--  ----------------------------------------end---------------------------------------  -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="triangle"></div>
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" >
      <div class="item active">
        <img src="images/s1.png" alt="Los Angeles" style="height:350px;">
        <div class="carousel-caption">
          <h3 style="color: black">  TUTORLAWC8.COM ยินดีต้อนรับ</h3>
          <p style="color: black">เราได้รวบรวมวิชาระดับสูงไว้ในที่นี่ที่เดียว</p>
          <p style="color: black"></p>
        	<p style="color: black">เรียนกับ TutorlawC8 ช่วยชาติลดหย่อนภาษี</p>
        	
     	</div>
      </div>

      <div class="item">
        <img src="images/s2.png" alt="Chicago" style="height:350px;">
        <div class="carousel-caption">
          <h3 style="color: black"> TUTORLAWC8 ขอนำเสนอ แพ็คเกจ แบบถาวร</h3>
          <p style="color: black">ครบทุกเนื้อหาสาระวิชา</p>
          <p style="color: black">คลิปวิดีโออธิบายเนื้อหา</p>
          <p style="color: black">และตัวอย่างข้อสอบ</p>
        
     	</div>
      </div>

      </div>


    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<div id="sub">
  <div class="container">
<div class = "row text-center">
  <h2>เนื้อหาวิชาทั้งหมด</h2><br>
  <h4>เราได้เตรียมพร้อมให้คุณก่อนสอบ</h4>
  <div class="row text-center">

<?php
  $bookSQL = "SELECT * FROM book ";
   $bookQuery = $con->query($bookSQL);
    while($book = $bookQuery->fetch_assoc()) { 
    	
    echo "<div class='col-sm-4'>";
      echo "<div class='thumbnail-sub'>";
  
      echo " <img src=' $book[book_pic] ' width='135' height = '165'>";
      echo " <p><strong> $book[book_name] </strong></p> ";
        
     echo "</div><br>";
    echo "</div>";

}
?>

   <!-- <div class="col-sm-4">
      <div class="thumbnail-sub">
        <img src="images/pk.jpg" alt="New York" width="145px" height="165px">
        <p><strong>New York</strong></p>
        <p>We built New York</p>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="thumbnail-sub">
        <img src="images/pk.jpg" alt="San Francisco" width="145px" height="165px">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>  -->
  </div>
</div>
</div>
</div>



<div id="shop" class="bg-shop">
  <div class="container">
 	<div class="row text-center">

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/pk.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ 1 เดือน</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <button class="btn" data-toggle="modal" data-target="#myModalLogin">สั่งซื้อ</button>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/th.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ 2 เดือน</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <button class="btn" data-toggle="modal" data-target="#myModalLogin">สั่งซื้อ</button>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/pk.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ ถาวร</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <button class="btn" data-toggle="modal" data-target="#myModalLogin">สั่งซื้อ</button>
        </div>
      </div>

    </div>
  </div>
</div

  <!-- /////////////////////////////////////////start  contact ////////////////////////////// -->
<div id="tour" class="bg-contact">
  <div class="container">
    <h3 class="text-center">ติดต่อเรา</h3>
    <p class="text-center">อีเมล์: info@tutorlawc8.com</p>
    <p class="text-center">โทรศัพท์:  09-8888-7777</p>
    <p class="text-center">พูดคุยกันได้<a href="http://tutorlawc8.com/webboard/">ที่นี่</a></p>
    </div>
  </div>
  <!-- //////////////////////////////////////////// end contact ////////////////////////////// -->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Copyright © www.tutorlawc8.com : Since 2018 </p> 
</footer>


<!--  popup Register   //////////////////////////////////////////////////////////////////////////-->
	<div class="row">
<!-- Modal -->
<div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<center> <h4 class="modal-title" id="myModalLabel">สมัครสมาชิก</h4>
      </div>
      <div class="modal hide" id="myModalRegister">
         
            <button type="button" class="close" data-dismiss="modal">x</button>
          </div>
	<!------------------Popup detail -->	

		  <div class="register_container" id="wrapper">
		  <form class="w3-container w3-card-4" method="post" action="register.php"  onsubmit="return Validate()" name="vform" >
			<br>
			<label class="w3-text-blue" for="username">ชื่อผู้ใช้</label>
			<input class="w3-input w3-border" type="text" id="txtUsername" name="txtUsername">
			<div id="username_error"></div>
		
			<label class="w3-text-blue" for="password">รหัสผ่าน</label>
			<input class="w3-input w3-border" type="password" id="txtPassword" name="txtPassword">
			<div id="password_error"></div>	
			
			<label class="w3-text-blue" for="password">ป้อนรหัสผ่านอีกครั้ง</label>
			<input class="w3-input w3-border" type="password" id="txtConPassword" name="txtConPassword">
			<div id="conpassword_error"></div>

			<label class="w3-text-blue" for="name">ชื่อ - นามสกุล</label>
			<input class="w3-input w3-border" type="text" id="txtFullName" name="txtFullName">
			<div id="fullname_error"></div>

			<label class="w3-text-blue" for="email">อีเมล</label>
			<input class="w3-input w3-border" type="email" id="email" name="email">
			<div id="email_error"></div>

			<label class="w3-text-blue" for="tel">เบอร์โทรศัพท์</label>
			<input class="w3-input w3-border" type="text" id="tel" name="tel">
			<div id="tel_error"></div>			
						<br>
			<center><input type="submit" name="btn-save" class="w3-button w3-green w3-round" id="btn-submit" value="สมัครสมาชิก">
			<input type="reset" name="Reset" class="w3-button w3-red w3-round" value="ยกเลิก"> </center><br>
		  </form>
		</div>
          <div class="modal-footer">
        
			<br>
          </div>
        </div>

    </div>
  </div>
</div>

	</div>


<!------------------------------------end popup register  --------------------------------------------------- -->
<!--  popup login -----------------   -->

	<div class="row">
<!-- Modal -->
<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
       <center> <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
      </div>
      <div class="modal hide" id="myModalLogin">
         
            <button type="button" class="close" data-dismiss="modal">x</button>
          </div>
	<!------------------Popup detail ---- -->	
		  <div class="regis">
		  <form class="w3-container w3-card-4" method="post" action="c_login.php">
			<br>
			<p><label class="w3-text-blue" for="username">ชื่อผู้ใช้</label>
			<input class="w3-input w3-border" type="text" id="txtUsername" name="txtUsername"></p>
		
			<p><label class="w3-text-blue" for="password">รหัสผ่าน</label>
			<input class="w3-input w3-border" type="password" id="txtPassword" name="txtPassword"></p>
			
						<br>
			<center><input type="submit" name="Submit" class="w3-button w3-green w3-round" value="เข้าสู่ระบบ">
			<input type="reset" name="Reset" class="w3-button w3-red w3-round" value="ยกเลิก"> </center><br>
		  </form>
		</div>
          <div class="modal-footer">
        
			<br>
          </div>
        </div>

    </div>
  </div>
</div>

	</div>

<!------------------------------------end popup login  --------------------------------------------------- -->

</body>
</html>

<script type="text/javascript">
	var txtUsername = document.forms["vform"]["txtUsername"];
	var txtPassword = document.forms["vform"]["txtPassword"];
	var txtConPassword = document.forms["vform"]["txtConPassword"];
	var txtFullName = document.forms["vform"]["txtFullName"];
	var email = document.forms["vform"]["email"];
	var tel = document.forms["vform"]["tel"];

	var username_error = document.getElementById("username_error");
	var password_error = document.getElementById("password_error");
	var conpassword_error = document.getElementById("conpassword_error");
	var fullname_error = document.getElementById("fullname_error");
	var email_error = document.getElementById("email_error");
	var tel_error = document.getElementById("tel_error");

	txtUsername.addEventListener("blur", usernameVerify, true);
	txtPassword.addEventListener("blur", passwordVerify, true);
	txtConPassword.addEventListener("blur", conpasswordVerify, true);
	txtFullName.addEventListener("blur", fullnameVerify, true);
	email.addEventListener("blur", emailVerify, true);
	tel.addEventListener("blur", telVerify, true);

	function Validate(){
		if(txtUsername.value == ""){
			username_error.textContent = "กรุณากรอกชื่อผู้ใช้";
			txtUsername.focus();
			return false;
		}
		if(txtPassword.value == ""){
			password_error.textContent = "กรุณากรอกรหัสผ่าน";
			txtPassword.focus();
			return false;
		}
		if(txtConPassword.value == ""){
			conpassword_error.textContent = "กรุณากรอกรหัสผ่านให้เหมือนกันอีกครั้ง";
			txtConPassword.focus();
			return false;
		}
		if(txtFullName.value == ""){
			fullname_error.textContent = "กรุณากรอกชื่อ - นามสกุล";
			txtFullName.focus();
			return false;
		}
		if(email.value == ""){
			email_error.textContent = "กรุณากรอกอีเมล";
			email.focus();
			return false;
		}
		if(tel.value == ""){
			tel_error.textContent = "กรุณากรอกเบอร์โทรศัพท์";
			tel.focus();
			return false;
		}
		if(txtPassword.value != txtConPassword.value){
			conpassword_error.innerHTML = "รหัสผ่านไม่ตรงกัน";
			txtConPassword.focus();
			return false;
		}
	}	
	function usernameVerify(){
		if(txtUsername.value != ""){
			username_error.innerHTML = "";
		}
	}
	function passwordVerify(){
		if(txtPassword.value != ""){
			password_error.innerHTML = "";
		}
	}
	function conpasswordVerify(){
		if(txtPassword.value != txtConPassword.value){
			conpassword_error.innerHTML = "กรุณากรอกรหัสผ่านให้เหมือนกันอีกครั้ง";
		}else{
			conpassword_error.innerHTML = "";
		}
	}
	function fullnameVerify(){
		if(txtFullName.value != ""){
			fullname_error.innerHTML = "";
		}
	}
	function emailVerify(){
		if(email.value != ""){
			email_error.innerHTML = "";
		}
	}
	function telVerify(){
		if(tel.value != ""){
			tel_error.innerHTML = "";
		}
	}		
				
</script>


