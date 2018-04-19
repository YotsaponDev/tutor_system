<?php
	session_start();
  include("online.php");
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
	  <p class="navbar-text">ยินดีต้อนรับ : <?php echo $my['FullName'] ?> </p>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="tutor.php" style="cursor:pointer"><span class="glyphicon glyphicon-th-list"></span> เลือกซื้อหนังสือ</a></li>
      	<li><a href="preorder.php" style="cursor:pointer"><span class="glyphicon glyphicon-shopping-cart"></span> หนังสือที่สั่งซื้อ</a></li>
      	<li><a href="mybook.php" style="cursor:pointer"><span class="glyphicon glyphicon-book"></span> หนังสือของฉัน</a></li>
        <li><a  style="cursor:pointer"><span class="glyphicon glyphicon-usd"></span> แจ้งชำระเงิน</a></li>
        <li><a  style="cursor:pointer"><span class="glyphicon glyphicon-check"></span> วิธีชำระเงิน</a></li>
        <li><a href="logout.php" style="cursor:pointer"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
	include("connect.inc");
	include("dbcon.php");

	$mySQL = "SELECT * FROM orders WHERE Username = '$_SESSION[ses_username]' AND proofpay = 0";
  	$my = $con->query($mySQL);
  //	$my = mysqli_fetch_array($myQuery);
?>


<form id ="name" action="proofpay.php" method="post" enctype="multipart/form-data">
    Select image to upload: <br>

    <select name="ID">
    <option> - </option>
	<?php
		if ($my->num_rows > 0) {
    		while($row = $my->fetch_assoc()) {
    			echo "<option value='$row[ID]'> $row[book_name] </option>";
    		}
		}
	?>
	</select> 

    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" value="1" name="proofpay">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php
$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image



if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
		$sql = "UPDATE orders SET proofpay='1' WHERE ID = '$ID' ";

		if ($con->query($sql) === TRUE) {
    		echo"<body onload=\"window.alert('ยืนยันสลิปสำเร็จ')\">"; 
		} else {
    		echo "Error updating record: " . $con->error;
		}

        echo "File is an image - " . $check["mime"] . ".";
        echo "<br> $book_id";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$conn->close();
?>
   

</body>
</html>
