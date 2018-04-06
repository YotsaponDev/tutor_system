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
        header("location:http://www.tutorlawc8.com/");
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
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    padding: 15px;
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
button {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
/*.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
} */
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
     <!-- <a class="navbar-brand" href="#">WebSiteName</a>  -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

	  <p class="navbar-text">ยินดีต้อนรับ : <?php echo $my['FullName']; ?> </p>
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
  </div>
</div>
</div>
</div>

<?php
include("connect.inc");
  $sql = "select * from book order by book_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);

  
  while($row = mysqli_fetch_array($result))
  {
   // echo "<tr>";
 // echo "<td align='center'><img src='" . $row["book_pic"] ." ' width='150'></td>";
 // echo "<td align='left'>" . $row["book_name"] . "</td>";
 //   echo "<td align='center'>" .number_format($row["book_price"],2). "</td>";
   // echo "<td align='center'><a href='product_detail.php?p_id=$row[p_id]'>คลิก</a></td>";


 // echo " . $row["book_name"] . ";
 //echo "<img src='" . $row["book_pic"] ." ' width='150'> ";
 
  }

  
  ?>

<div id="shop" class="bg-shop">
  <div class="container">
  <div class="row text-center">

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/pk.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ 1 เดือน</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <form method="post" action="preorder.php"> 
            <input type="hidden" id="book_id" name = "book_id" value =81> 
            <input type="hidden" id="act" name = "act" value = "add" >
            <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อ</button></center>
          </form>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/th.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ 2 เดือน</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <form method="post" action="preorder.php"> 
            <input type="hidden" id="book_id" name = "book_id" value =82> 
            <input type="hidden" id="act" name = "act" value = "add" >
            <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อ</button></center>
          </form>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="images/pk.jpg" width="170px" height="150px">
          <p><strong>แพ็คเกจ ถาวร</strong></p>
          <p>อัดแน่นด้วยเนื้อหาทั้ง 12 วิชา</p>
          <form method="post" action="preorder.php"> 
            <input type="hidden" id="book_id" name = "book_id" value =80 > 
            <input type="hidden" id="act" name = "act" value = "add" >
          <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อ</button></center>
          </form>
        </div>
      </div>

          <!--
    <div class="col-sm-4">
      <p>ฟิสิกส์</p>
      <img src="file/img/003.jpg" class="img-responsive margin" style="width:200px; height:300px" alt="Image"> 
      <form method="post" action="preorder.php?book_id=3&act=add">
        <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อวิชานี้</button></center>
      </form>
    </div>
    
    <div class="col-sm-4">
      <p>ฟิสิกส์</p>
      <img src="file/img/003.jpg" class="img-responsive margin" style="width:200px; height:300px" alt="Image"> 
      <form method="post" action="preorder.php?book_id=3&act=add">
        <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อวิชานี้</button></center>
      </form>
    </div>
    
    <div class="col-sm-4">
      <p>ฟิสิกส์</p>
      <img src="file/img/003.jpg" class="img-responsive margin" style="width:200px; height:300px" alt="Image"> 
      <form method="post" action="preorder.php?book_id=3&act=add">
        <center><button type="submit" name="Submit" class="btn"><i class="fa fa-shopping-cart"></i>  สั่งซื้อวิชานี้</button></center>
      </form>
    </div>
    -->

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

  </body>
</html>