<?php

session_start();
if(@$_SESSION['checked']<>1){
echo"<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='../index.php';</script>";
}
else{

?>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ລະບົບ ຮ້ານທຸກຢ່າງ 10 ພັນ(Admin)</title>
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

<style>
  *{
    font-family: phetsarath ot;
  }
  body{
    
    /* background-color: rgba(255, 255, 255, 0.7); */
    /* background-color: #6654F1; */
    background-color: #eff4f8;
    /* background-color:rgba(94, 114, 228, 0.2); */
  }
  .a1,.a2,.a3,.a4,.a5,.a6,.a7,.a8,.a9{
    background-color: #ffff;
    border: #fc00fa solid 2px;
    /* border-left: #6654f1 solid 2px; */
    border-bottom: #6654f1 solid 2px;
    border-radius: 5px;
  }
  .ion,.fas{
    color:#fc00fa ;
  }
  /* .a1{
    background-image: linear-gradient(-225deg, #EACCF8 30%, #6654F1 100%);
    background-color: #EACCF8;
  }
  .a2{
    background-image: linear-gradient(-225deg, #f1d3ed 20%, #18c709 100%);
    background-color: #EACCF8;
  }
  .a3{
    background-image: linear-gradient(-225deg, #fdabdd 20%, #ef33b1 100%);
    background-color: #EACCF8;
  }
  .a4{
    background-image: linear-gradient(-225deg, #f1d3ed 20%, #2CD8D5 100%);
    background-color: #EACCF8;
  }
  .a5{
    background-image: linear-gradient(-225deg, #ffcac9 10%, #ff383c 100%);
    background-color: #EACCF8;
  }
  .a6{
    background-image: linear-gradient(-225deg, #f7ec38 20%, #fc013d 100%);
    background-color: #EACCF8;
  }
  .a7{
    background-image: linear-gradient(-225deg, #ffe53b 20%, #00ff5b 100%);
    background-color: #EACCF8;
  }
  .a8{
    background-image: linear-gradient(-225deg, #ffcac9 10%, #fc00fa 100%);
    background-color: #EACCF8;
  }
  .a9{
    background-image: linear-gradient(-225deg, #f1d3ed 20%, #1f2f98 100%);
    background-color: #EACCF8;
  } */
</style>
<?php
  include("../Connect.php");
   
  //  ................buy amount.......................
   $Bamount=mysqli_query($con,"SELECT sum(r_amount) from receives");
   $show_bamount=mysqli_fetch_array($Bamount);
  //  ..............sell amount.............
  $Samount=mysqli_query($con,"SELECT sum(amount) from sells");
  $show_samount=mysqli_fetch_array($Samount);
  // ..............sell amount curdate.................
  $S_curdate=mysqli_query($con,"SELECT sum(amount) from sells where s_date=curdate()");
  $show_scurdate=mysqli_fetch_array($S_curdate);
  // .........count qty...............................
  $c_prod=mysqli_query($con,"SELECT count(prod_id) from products");
  $show_cprod=mysqli_fetch_array($c_prod);
  // .........count qty...............................
  $c_qty=mysqli_query($con,"SELECT count(prod_id) from products where prod_qty<'5' and prod_qty >0 ");
  $show_cqty=mysqli_fetch_array($c_qty);
  // ............. out ..................
  $out_qty=mysqli_query($con,"SELECT count(prod_id) from products where prod_qty=0 ");
  $show_out=mysqli_fetch_array($out_qty);
  // .............................
  $profit=$show_samount[0]-$show_bamount[0];
  // .................................
  $today_profit=mysqli_query($con,"SELECT sum(b.amount)-sum(a.bprice*b.s_qty) FROM products as a, sells as b where a.prod_id=b.prod_id and b.s_date=curdate()");
  $show_today_profit=mysqli_fetch_array($today_profit);
  // ....................................
  $today_amount=mysqli_query($con,"SELECT sum(a.bprice*b.s_qty) FROM products as a, sells as b where a.prod_id=b.prod_id and b.s_date=curdate()");
  $show_today_amount=mysqli_fetch_array($today_amount);
?>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="container-fluid">
      <div class="row p-3 mt-3">
          <div class="col-lg-4 col-4">
            <div class="small-box a1">
              <div class="inner">
                <h4><?= number_format($show_bamount[0]); ?> ກີບ</h4>

                <p>ລາຍຈ່າຍທັງໝົດ</p>
              </div>
              <div class="icon ">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="fas fa-coins"></i>
              </div>
              <a href="#" class="small-box-footer bg-primary">ລາຍຈ່າຍທັງໝົດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a2">
              <div class="inner">
                <h4><?= number_format($show_samount[0]); ?> ກີບ</h4>

                <p>ລາຍຮັບທັງໝົດ</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
                <!-- <i class="fas fa-chart-bar"></i> -->
              </div>
              <a href="#" class="small-box-footer bg-primary">ລາຍຮັບທັງໝົດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a3">
              <div class="inner">
	              <h4><?= number_format($profit); ?> ກີບ</h4>
                <p>ກຳໄລທັງໝົດ</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-add-circle"></i>
              </div>
              <a href="#" class="small-box-footer bg-primary" >ກຳໄລທັງໝົດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a4">
              <div class="inner">
                <h4><?= number_format($show_today_amount[0]); ?> ກີບ</h4>

                <p>ຕົ້ນທືນວັນນີ້</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
                <!-- <i class="fas fa-coins"></i> -->
              </div>
              <a href="#" class="small-box-footer bg-primary">ຕົ້ນທືນວັນນີ້ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a7">
              <div class="inner">
                <h4><?= number_format($show_scurdate[0]); ?> ກີບ</h4>

                <p>ລາຍໄດ້ວັນນີ້</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer bg-primary">ລາຍໄດ້ວັນນີ້ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a8">
              <div class="inner">
                <h4><?= number_format($show_today_profit[0]); ?> ກີບ</h4>

                <p>ກຳໄລວັນນີ້</p>
              </div>
              <div class="icon">
                <i class="ion ion-plus"></i>
              </div>
              <a href="#" class="small-box-footer bg-primary">ກຳໄລວັນນີ້ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a9">
              <div class="inner">
	              <h4><?= number_format($show_cprod[0]); ?> ລາຍການ</h4>
                <p>ສິ້ນຄ້າທັງໝົດ</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
                <!-- <i class="ion ion-ios-cart"></i> -->
              </div>
              <a href="products/select_p.php" class="small-box-footer bg-primary" >ເບິ່ງລາຍລະອຽດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a5">
              <div class="inner">
	              <h4><?= number_format($show_cqty[0]); ?> ລາຍການ</h4>
                <p>ສິ້ນຄ້າໃກ້ຈະໝົດ</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-ios-cart-outline"></i> -->
                <i class="ion ion-ios-cart"></i>
              </div>
              <a href="products/select_min_p.php" class="small-box-footer bg-primary" >ເບິ່ງລາຍລະອຽດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="small-box a6">
              <div class="inner">
	              <h4><?= number_format($show_out[0]); ?> ລາຍການ</h4>
                <p>ສິ້ນຄ້າທີ່ໝົດແລ້ວ</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="products/select_out_p.php" class="small-box-footer bg-primary" >ເບິ່ງລາຍລະອຽດ <i class="fas fa-dollar-sign text-light"></i></a>
            </div>
          </div>
      </div>
      <!-- .............................. -->
   </div>
   <div class="container-fluid"></div>

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
<!-- ...... -->
<?php
  }
?>

</html>