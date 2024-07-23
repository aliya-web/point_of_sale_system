
<html>
<style>
*{font-family:'Phetsarath OT';}
#navbar{
  background-color: #5e72e4;
  padding-top: 15px;
  border: none;
  color: black;
}
</style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ລະບົບ ຂາຍເຄື່ອງທຸກຢ່າງ 10.000 ກີບ(Admin)</title>
<link rel="stylesheet" href="../link/icon/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../link/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../link/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../link/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../link/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../link/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../link/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../link/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../link/plugins/summernote/summernote-bs4.min.css">
	<script src="../link/sweetalert/dist/sweetalert2.all.min.js"></script>		
	<script src="../link/jquery.js"></script>
</head>
<body class="">
<?php

session_start();
if(@$_SESSION['checked']<>1){
	echo "<script>alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ'); location='../index.php';
	</script>";
	}
else{

?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
  <!-- <div class="container-fluid"> -->
    <img src="../image/e737667.svg" alt="AdminLTE Logo" class="brand-image img-circle bg-white elevation-3" width="50px" height="50px" style="opacity: .9">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="sells/prod_all.php" target="frame" class="nav-link">ສິນຄ້າທັງໝົດ</a>
              <a class="dropdown-item" href="sells/prod_out.php" target="frame" class="nav-link">ສິນຄ້າທີ່ໝົດແລ້ວ</a>
              <a class="dropdown-item" href="sells/sell_all.php" target="frame" class="nav-link">ສິນຄ້າທີ່ຂາຍອອກທັງໝົດ</a>
            </div>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="sells/menu_sell.php" target="frame" class="nav-link text-white"><b>ໜ້າຫຼັກ</b></a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        &emsp;&emsp;&emsp;&emsp;<h4 class="title text-white p-2"><b><u>ຮ້ານຂາຍເຄື່ອງທຸກຢ່າງ 10.000 ກີບ</u></b></h4>
      </div>
    </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item">
        <a class="nav-link text-white" href="# " role="button">
          <i class="fas fa-user-clock"></i>
          <u><b>
            <?php
            echo $_SESSION['fname']." ".$_SESSION['lname'];
            ?>
          </b></u>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="" href="logout.php" role="button"><button class="btn bg-danger"> 
        <i class="fa fa-power-off" aria-hidden="true"></i>&ensp;ອອກຈາກລະບົບ
        </button></a>
        
      </li>
    </ul>
  <!-- </div> -->
</nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="">


	<iframe width="100%" height="100%" frameborder="0" name="frame" src="sells/menu_sell.php"></iframe>
       
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="footer">
   
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../link/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../link/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../link/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../link/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../link/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../link/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../link/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../link/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../link/plugins/moment/moment.min.js"></script>
<script src="../link/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../link/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../link/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../link/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../link/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../link/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../link/dist/js/pages/dashboard.js"></script>
</body>
</html>

<?php
 }
?>
<!-- update !-->

