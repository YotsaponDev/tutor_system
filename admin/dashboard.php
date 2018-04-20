<?php

session_start();
error_reporting(~E_NOTICE);



  $ses_id =$_SESSION[ses_id];           
  $ses_username = $_SESSION[ses_username];     
  $ses_name = $_SESSION[ses_name]; 

  if($ses_id <> session_id() or  $ses_username ==""){ 
    header("location:http://www.tutorlawc8.com/");
  } 

    if($ses_username != "admin001"){
    session_destroy();
    header("location:http://www.tutorlawc8.com/");
  }


  include("dbcon.php");
    $chSQL = "SELECT * FROM member WHERE Username = '$_SESSION[ses_username]' ";
    $chQuery = mysqli_query($con,$chSQL);
    $ch = mysqli_fetch_array($chQuery);

  if($ch[Stat] == "member"){
    session_destroy();
    header("location:http://www.tutorlawc8.com/");
  }

?>


    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Management</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Tutorlawc8.com</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">แผงควบคุม</span>
          </a>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pre-Confirm">
          <a class="nav-link" href="preconfirm.php">
            <i class="fa fa-fw fa fa-hourglass-start"></i>
            <span class="nav-link-text">รอการยืนยัน</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Confirm">
          <a class="nav-link" href="confirm.php">
            <i class="fa fa-fw fa fa-check-square-o"></i>
            <span class="nav-link-text">ยืนยันแล้ว</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Books">
          <a class="nav-link" href="book.php">
            <i class="fa fa-fw fa fa-book"></i>
            <span class="nav-link-text">รายวิชา</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Books">
          <a class="nav-link" href="addbook.php">
            <i class="fa fa-fw fa fa-cloud-upload"></i>
            <span class="nav-link-text">เพิ่มวิชา</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Books">
          <a class="nav-link" href="member.php">
            <i class="fa fa-fw fa fa-user"></i>
            <span class="nav-link-text">สมาชิก</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">แผงควบคุม</a>
        </li>
        <li class="breadcrumb-item active">แสดงแผงควบคุม</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
<?php 
     $userSQL = "SELECT COUNT(Stat) AS 'member' FROM member ";
    $userQuery = mysqli_query($con,$userSQL);
    $user = mysqli_fetch_array($userQuery);

    $sum = $user[member];
    $sum = $sum - 1;
?>

              <div class="mr-5"><?php echo "สมาชิกทั้งหมด $sum คน"; ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              </span>
            </a>
          </div>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////- -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-eye"></i>
              </div>
              <div class="mr-5"><?php include("online_monitor.php"); ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              </span>
            </a>
          </div>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////- -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-book"></i>
              </div>
<?php
    $bookSQL = "SELECT COUNT(book_id) AS Sum_book FROM book ";
    $bookQuery = mysqli_query($con,$bookSQL);
    $book = mysqli_fetch_array($bookQuery);
?>
              <div class="mr-5"><?php echo "วิชาทั้งหมด $book[Sum_book]  วิชา"; ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              </span>
            </a>
          </div>
        </div>
         <!-- ///////////////////////////////////////////////////////////////////////////////- -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo $ch[Stat]; ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              </span>
            </a>
          </div>
        </div>
      </div>
       <!-- ///////////////////////////////////////////////////////////////////////////////- -->

      <div class="row">
       
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © www.tutorlawc8.com : Since 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">คุณจะออกจากระบบหรือไม่</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="logout.php">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>