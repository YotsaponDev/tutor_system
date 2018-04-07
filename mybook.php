<?php
  session_start();
  include("dbcon.php");
  include("online.php");
  	//	require_once("dbcon.php"); 
		$ses_id =$_SESSION[ses_id];                 //สร้าง session สำหรับเก็บค่า ID
		$ses_username = $_SESSION[ses_username];         //สร้าง session สำหรับเก็บค่า username
		$ses_name = $_SESSION[ses_name]; 

    $mySQL = "SELECT * FROM member WHERE Username = '$ses_username' ";
    $myQuery = mysqli_query($con,$mySQL);
    $my = mysqli_fetch_array($myQuery);

		if($ses_id <> session_id() or  $ses_username ==""){  //ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
			header("location:index.php");
		}

    $viewSQL = "SELECT * FROM member WHERE Username = '$ses_username' ";
    $viewQuery = mysqli_query($con,$viewSQL);
    $view = mysqli_fetch_array($viewQuery); 

    if($view[view] == 0){
      $sql = "UPDATE member SET view=1 WHERE Username = '$ses_username' ";
      $result2=mysqli_query($con,$sql);
    }else{
      $v1 = $view[view];
      $v1 = $v1 + 1;
      $sql2 = "UPDATE member SET view='$v1' WHERE Username = '$ses_username' ";
      $result3=mysqli_query($con,$sql2);
    }

//echo $view[view] + 1;

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
.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
}
</style>
<script language="JavaScript">

  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>

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

<br>
<?php

date_default_timezone_set("Asia/Bangkok"); 
    $t = date("d-m-YH:i:s");

  $timeSQL = "SELECT * FROM timecount WHERE Username = '$ses_username'";
   $timeQuery = $con->query($timeSQL);
   // $timeQuery = mysqli_query($con,$timeSQL);
   // $time = mysqli_fetch_array($timeQuery);

    echo $time[timeCounter];
//include("dbcon.php");
  $p2SQL = "SELECT * FROM book WHERE book_id IN (1,3,4)";  // เลือกหนังสือที่จะแสดงใน package 2
    $p2Query = $con->query($p2SQL);
//---------------------------------------------------
    $bookSQL = "SELECT * FROM book ";
    $bookQuery = $con->query($bookSQL);
   // $book = mysqli_fetch_array($bookQuery);

    $sql = "SELECT * FROM orders WHERE Username = '$ses_username' ";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
  
?> 
<div class="container-fluid text-center">
<div class="row">
<?php
    while($row = $result->fetch_assoc()) {
      //  echo "Username: " . $row["username"]. ";  Name: " . $row["name"]. "<br>";
  //  $id = $row["id"];
   // $username = $row["username"];

/*
    if($row['book_id'] == 80){
      while($b = $bookQuery->fetch_assoc()) {
?>
    <div class="col-sm-4">
<?php

            echo "<p> $b[book_name] </p>";

            echo "<img src=' $b[book_pic] ' width='100' height = '140'> <br>"; 
            echo "$b[book_detail] <br>";
            echo "$b[book_price] <br>";

          if ($row['confirm'] == 0){
              echo "หนังสืออยู่ระหว่างการตรวจสอบยอดเงิน  <br><br>" ;
          }else{
              if($row['timeCounter'] < $t){
                $del = "DELETE FROM orders WHERE Username = '$ses_username' AND book_id = '80' ";
                if ($con->query($del) === TRUE) {
                    echo"Package หมดอายุ";
                } else {
                    echo "Error updating record: " . $con->error;
                }
              }else{
                
                echo "<a href= " . $b["book_file"] .">โหลด</a> <br>";
              }
          } 

?>
    </div>
<?php
        } //colse while
     
    }  
 */
    ///-------------------------------------------------------------------------
      if($row['book_id'] < 79){
    ?>
      <div class="col-sm-4">
<?php
            echo "<p> $row[book_name] </p>";
            echo "<img src=' $row[book_pic] ' width='120' height = '120' class='img-circle'> <br>"; 
            echo "$row[book_detail] <br>";
            echo "$row[book_price] <br>";

        if ($row['confirm'] == 0){
            echo "หนังสืออยู่ระหว่างการตรวจสอบยอดเงิน  <br><br>" ;
        }else{
       ;
            echo "<a href= " . $b["book_file"] .">โหลด</a> <br>";

        } 
?>
    </div>
<?php
      }
//-------------------------------------------------------------------------
if($row['book_id'] >= 80){
      while($b = $bookQuery->fetch_assoc()) {
        if ($b['book_id'] == 79){
          break;
        }
?>
<div class="col-sm-4">
<div class="w3-card-4" style="width:100%" >
    <header class="w3-container w3-light-gray">
      <h4><?php echo $b[book_name]; ?></h4>
    </header>
    <br>
<?php

            echo "<img src=' $b[book_pic] ' width='120' height = '120'  class='img-circle'> <br>"; 
            echo "$b[book_detail] <br> <br>";
          //  echo " $b[book_price] <br>";

          if ($row['confirm'] == 0){
              echo "หนังสืออยู่ระหว่างการตรวจสอบยอดเงิน  <br><br>" ;
          }else{
              if($row['timeCounter'] < $t){
                $del = "DELETE FROM orders WHERE Username = '$ses_username' AND book_id = '$row[book_id]' ";
                if ($con->query($del) === TRUE) {
                    echo"Package หมดอายุ";
                } else {
                    echo "Error updating record: " . $con->error;
                }
              }else{

                 echo "<iframe frameborder='0' width='100%' height='45%' src='//www.dailymotion.com/embed/video/x6g4523' allowfullscreen='' ></iframe>"; 

                echo "<audio controls>";
                echo "<source src='horse.ogg' type='audio/ogg'>";
                echo "<source src=" . $b["book_sound"] . " type='audio/mpeg'>";
                echo "</audio> <br>";
                echo "รหัสผ่านดูวิดีโอ : tutorlawc8ok<br>";
                echo "เนื้อหา : <a href= " . $b["book_file"] .">ดาวน์โหลด</a> <br>";
                echo "ตัวอย่างข้อสอบ : <a href= " . $b["book_exam"] .">ดาวน์โหลด</a> <br>";
              }
          } 

?>
<!--  <button class="w3-button w3-block w3-green">+ Connect</button>
<button class="w3-button w3-block w3-blue">+ dfsfft</button>    -->
    </div>
    <br><br>
  </div>
<?php
        } //colse while
     
    }
   //--------------------------------------------------   
    }
      } else {
        echo "คุณไม่มีหนังสือที่สั่งซื้อ";
      }

$con->close();
?>
  </div>
</div>

</body>
</html>

