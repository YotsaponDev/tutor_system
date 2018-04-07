<?php
	session_start();
	error_reporting(~E_NOTICE);
	$book_id = $_REQUEST['book_id']; 
	$act = $_REQUEST['act'];
	include("online.php");
	$ses_id =$_SESSION[ses_id];                 //สร้าง session สำหรับเก็บค่า ID
	$ses_username = $_SESSION[ses_username];         //สร้าง session สำหรับเก็บค่า username
	$ses_name = $_SESSION[ses_name]; 
//	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
//	$PHP_SELF = $_SERVER['PHP_SELF'];

	if($ses_id <> session_id() or  $ses_username ==""){  //ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
		header("location:index.php");
	} 

	//if($book_id == null){
	//	header("Location: tutor.php");
	//}

	if($act=='add' && !empty($book_id))
	{
		if(isset($_SESSION['preorder'][$book_id]))
		{
			//$_SESSION['c_preorder'][$book_id]++;

		//	$d = $_SESSION['c_preorder'][$book_id];
			//echo "$d";
		}
		else
		{
			$_SESSION['preorder'][$book_id]=1;
		}
	}

	if($act=='remove' && !empty($book_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['preorder'][$book_id]);
	}

//	if($act=='update')
//	{
//		$amount_array = $_POST['amount'];
//		foreach($amount_array as $book_id=>$amount)
//		{
//			$_SESSION['preorder'][$book_id]=$amount;
//		}
//	}
?>

<!DOCTYPE html>
<html>
<head >
	<meta charset="UTF-8" />
	<title>.::Tutor-RooM::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/validation.min.js"></script>
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

      <?php
	
		include("dbcon.php");
	//	require_once("dbcon.php"); 
	$mySQL = "SELECT * FROM member WHERE Username = '$_SESSION[ses_username]' ";
  	$myQuery = mysqli_query($con,$mySQL);
  	$my = mysqli_fetch_array($myQuery);

	$bookSQL = "SELECT * FROM package WHERE p_id = $book_id";
  	$bookQuery = mysqli_query($con,$bookSQL);
  	$book = mysqli_fetch_array($bookQuery);

	
?>
	  <p class="navbar-text">ยินดีต้อนรับ : <?php echo $my['FullName'] ?> </p>
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

 <center><b>แพคเกจ/หนังสือที่สั่งซื้อ</b></center><br>

<div class="container">
  <table width="600" border="0" align="center" class="table table-striped">
   

     

   <thead>
    <tr>
      <td>รายการ</td>
      <td>ยอดรวม(บาท)</td>
      <td>ยกเลิกรายการ</td>
    </tr>
	</thead>
<?php
$total=0;
$summ=0;
$ar = array();
if(!empty($_SESSION['preorder']))
{
	include("connect.inc");

	foreach($_SESSION['preorder'] as $book_id=>$qty)
	{

		$myySQL = "SELECT * FROM orders ";
		$myyQuery = mysqli_query($con,$myySQL);
		$myResult = mysqli_fetch_array($myyQuery);
	
		$sql = "SELECT * FROM package WHERE book_id=$book_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['book_price'] * $qty;
		$total += $sum;
		echo "<tbody>";
		echo "<tr>";
		echo "<td>" . $row["book_name"] . "</td>";
		//echo "<td width='46' align='right'>" .number_format($row["book_price"],2) . "</td>";
		//echo "<td width='57' align='right'>";  
		//echo "<input type='text' name='amount[$book_id]' value='$qty' size='2'/></td>";
		echo "<td>".number_format($sum,2)."</td>";
		//remove product
		//echo "<td width='46' align='center'><a href='preorder.php?book_id=$book_id&act=remove'>ลบ</a></td>";
		
		echo "<td><form method='post' action='preorder.php'>";
		echo "<input type='hidden' id='act' name = 'act' value = 'remove' >";	
		echo "<input type='hidden' id='book_id' name = 'book_id' value = '$book_id' >";
		echo "<input type='submit' class='w3-button w3-red w3-round' value=ยกเลิกเล่มนี้>";
		echo "</form><td>";
		echo "</tr>";
		//echo "$qty <br>";
		//$summ = $summ + $qty;
		//echo "sum= $summ <br>";
		//echo "book is $book_id <br>";
		$ar = $book_id;

		//echo "<br>array = $ar <br>";
		$id = $my['Id_member'];
		$f  = $book['Username'];
		$fn = $my['FullName'];
		//echo "$fn";
		date_default_timezone_set("Asia/Bangkok"); 
		$t = date("d-m-Y H:i:sa");
		//echo $t;

	$ordersSQL = "SELECT * FROM orders WHERE Username = '$_SESSION[ses_username]' AND book_id = $book_id ";
  	$ordersQuery = mysqli_query($con,$ordersSQL);
  	$orders = mysqli_fetch_array($ordersQuery);

	$bookSQL = "SELECT * FROM package WHERE book_id = $book_id";
  	$bookQuery = mysqli_query($con,$bookSQL);
  	$book = mysqli_fetch_array($bookQuery);

  	$packageSQL = "SELECT * FROM package WHERE p_id = $book_id";
  	$packageQuery = mysqli_query($con,$packageSQL);
  	$package = mysqli_fetch_array($packageQuery);

		if($act=='insert'){

			if($orders){
				echo"<body onload=\"window.alert('คุณเคยซื้อแพ็คเกจหรือหนังสือนี้แล้ว')\">"; 
			//	header("Location: preorder.php?book_id=$book_id&act='add'");
			}else{
			$mySQL = "INSERT INTO orders (Id_member,Username,FullName,book_id,book_name,book_detail,book_file,book_exam,book_video,book_sound,book_pic,book_price,date_time,confirm,confirmPay,confirmTime,timeCounter)  VALUES ('$id','$my[Username]','$fn','$ar','$book[book_name]','$book[book_detail]','$book[book_file]','$book[book_exam]','$book[book_video]','$book[book_sound]','$book[book_pic]','$book[book_price]','$t',0,0,0,'-')";

				$myQuery = mysqli_query($con,$mySQL);
				echo"<body onload=\"window.alert('สั่งซื้อสำเร็จ')\">";
		//Id,Username,FullName,book_id,book_name,book_detail,book_file,book_pic,book_price,date_time,confirm) <br>
			}
		}
	}
	echo "<tr>";
  	echo "<td><b>ราคารวม</b></td>";
  	echo "<td>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td colspan='3'></td>";
	echo "</tr></tbody>";
	$checktotal = $total;
}
?>
<tfoot>
<tr>
<td><a href="tutor.php">เลือกหนังสือเพิ่มเติม</a></td>
<td colspan="5" align="right">
<div class="send">
 	<form method="post" action="preorder.php" >
		
			<input type="hidden" value="<?php echo $my['Id_member']; ?>" name="Id">	
			<input type="hidden" value="<?php echo $my['Username']; ?>" name="Username">	
			<input type="hidden" value="<?php echo $my['FullName']; ?>" name="FullName">
			<input type="hidden" value="<?php echo $book['book_id']; ?>" name="book_id">
			<input type="hidden" value="<?php echo $book['book_name']; ?>" name="book_name">
			<input type="hidden" value="<?php echo $book['book_detail']; ?>" name="book_detail">	
			<input type="hidden" value="<?php echo $book['book_file']; ?>" name="book_file">
			<input type="hidden" value="<?php echo $book['book_exam']; ?>" name="book_exam">	
			<input type="hidden" value="<?php echo $book['book_video']; ?>" name="book_video">
			<input type="hidden" value="<?php echo $book['book_sound']; ?>" name="book_sound">
			<input type="hidden" value="<?php echo $book['book_pic']; ?>" name="book_pic">	
			<input type="hidden" value="<?php echo $book['book_price']; ?>" name="book_price">	
		<input type="hidden" value="<?php date_default_timezone_set("Asia/Bangkok"); echo date("d-m-Y H:i:sa"); ?>" name="date_time">
			<input type="hidden" value="<?php
$total=0;
$summ=0;
$ar = array();
if(!empty($_SESSION['preorder']))
{
	foreach($_SESSION['preorder'] as $book_id=>$qty)
	{	
	
		$summ = $summ + $qty;
	//	echo "sum= $summ <br>";
	//	echo "book is $book_id <br>";
		$ar = $book_id;

		echo "$ar";
	
	}
}

?>" name="bookNumber">	 
	<?php if($checktotal > 1){ 
	echo "<input type='hidden' id='act' name = 'act' value = 'insert' >" ;	
			echo "<center><input type='submit' name='submit' class='w3-button w3-green w3-round' value='สั่งซื้อ'>";
	echo "</form>";
	}
	?>
</div>
</td>
</tr>
</tfoot>
</table>
</div>
</body>
</html>
