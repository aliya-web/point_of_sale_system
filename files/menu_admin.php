
<html>
<style>
*{
  font-family:'Phetsarath OT';
}
.wrapper{
  background-color: #5e72e4;
}

aside{
  margin-top: 2% ;
  border-top-right-radius: 15px;
}
#navbar{
  background-color: #5e72e4;
  padding: 15px;
  border: none;
  color: black;
}
span{
 padding-top: top 10%;
 /* padding-bottom:15px; */
}

</style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ຮ້ານຂາຍເຄື່ອງທຸກຢ່າງ 10.000 ກີບ(Admin)</title>
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
<body class="hold-transition sidebar-mini layout-fixed">
<?php
session_start();
if(@$_SESSION['checked']<>1){
	echo "<script> alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ'); location='../index.php';
	</script>";
	}
else{

?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark sticky-top" id="navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav mt-2 mb-1">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Homepage.php" target="frame" class="nav-link text-white"><b>ໜ້າຫຼັກ</b></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mt-1">
        
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
      <a class="" href="logout.php" role="button"><button class="btn bg-danger"> 
        <i class="fa fa-power-off" aria-hidden="true"></i>&ensp;ອອກຈາກລະບົບ
        </button></a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="sidenav-header">
    <a href="#" class="brand-link ">
      <img src="../image/e737667.svg" alt="AdminLTE Logo" class="brand-image" style="opacity: .9">
      <span class="brand-text font-weight-light text-dark">ຮ້ານທຸກຢ່າງ 10 ພັນກີບ</span>
    </a>
    </div>
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- ....................... -->
             <li class="nav-item">
                <a href="../files/products/form_search_pro.php" target="frame" class="nav-link">
                  <i class="fas fa-search"></i>
                  <p>ຄົ້ນຫາຂໍ້ມູນສິນຄ້າ</p>
                </a>
              </li>
          <!-- ....................... -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-angle-right left"></i>
              <p> ສ້າງສິນຄ້າ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#"  target="frame" class="nav-link">	
              <i class="nav-icon fas fa-th"></i>
              <p>ໂຊນສິນຄ້າ<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນສິນຄ້າ -->
                <a href="../files/class/index.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>ລາຍງານຂໍ້ມູນໂຊນສິນຄ້າ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#"  target="frame" class="nav-link">	
              <i class="nav-icon fas fa-font"></i>
              <p> ປະເພດສິນຄ້າ <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນສິນຄ້າ -->
                <a href="../files/categories/index.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>ລາຍງານຂໍ້ມູນປະເພດສິນຄ້າ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
              <p>
                ຂໍ້ມູນສິນຄ້າ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນສິນຄ້າ -->
                <a href="../files/products/form_p.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-plus-circle"></i>
                  <p>ບັນທຶກຂໍ້ມູນສິນຄ້າ</p>
                </a>
              </li>
              <li class="nav-item">
               <!-- ຟາຍລາຍງານຂໍ້ມູນສິນຄ້າ -->
                <a href="../files/products/select_p.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>ລາຍງານຂໍ້ມູນສິນຄ້າ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            	<i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                ຂໍ້ມູນສິນຄ້ານຳເຂົ້າ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນສິນຄ້ານຳເຂົ້າ -->
                <a href="../files/receives/form_r.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-plus-circle"></i>
                  <p>ບັນທຶກຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</p>
                </a>
              </li>
              <li class="nav-item">
                <!-- ຟາຍລາຍງານຂໍ້ມູນສິນຄ້ານໍາເຂົ້າ -->
                <a href="../files/receives/select_r.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>ສະແດງຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                ສິນຄ້າຂາຍອອກ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟາຍລາຍງານຂໍ້ມູນສິນຄ້າຂາຍອອກ -->
                <a href="../files/sells/select_sell.php" target="frame" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>ສະແດງຂໍ້ມູນຂາຍອອກ</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-header"></li>
          <li class="nav-item">
            <a href="../files/users/index.php" target="frame" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>ຂໍ້ມູນພະນັກງານ </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


	<iframe width="100%" height="100%" frameborder="0" name="frame" src="Homepage.php"></iframe>
       
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
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

