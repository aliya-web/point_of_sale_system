
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ລະບົບ ຂາຍເສື້ອຜ້າ(Admin)</title>
  <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../link/icon/css/all.min.css">
  <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="../../link/sweetalert/dist/sweetalert2.all.min.js"></script>		
	<script src="../../link/jquery.js"></script>

  <script>
		$(function() {
			$(".prod_id").keyup(function() {
				var a = $(".prod_id").val();
        // ......................
        $.post("get_img.php",{
              prod_id : a
          },
          function(output){
              $(".choose_img").html(output);
          })

        // ..........
				$.post("get_name.php", {
						prod_id: a
					},
					function(output) {
						$(".prod_name").val(output);
					});
			});
			$(".prod_id").keyup(function() {
				var a = $(".prod_id").val();
				$.post("get_sprice.php", {
						prod_id: a
					},
					function(output) {
						$(".sprice").val(output);
					});
			});
			$(".s_qty").keyup(function() {
				var sprice = parseInt($(".sprice").val());
				var qty = parseInt($(".s_qty").val());
				var totals = parseFloat(sprice * qty) || 0;
				$(".amount").val(totals);
			});
			// ບັນທືກຂໍ້ມູນ
			$(".go").click(function() {
				var prod_id = $(".prod_id").val();
				var sprice = $(".sprice").val();
				var s_qty = $(".s_qty").val();
				var amount = $(".amount").val();
				var remark = $(".remark").val();

				if (prod_id == "") {
					Swal.fire(
						'ກະລຸນາປ້ອນລະຫັດສິນຄ້າກ່ອນ !',
						'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
						'warning',
					)
				} else if (s_qty == "") {
					Swal.fire(
						'ກະລຸນາປ້ອນຈຳນວນ !',
						'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
						'warning',
					)
				} else {
					$.post("insert_s.php", {
							prod_id: prod_id,
							sprice: sprice,
							s_qty: s_qty,
							amount: amount,
							remark: remark
						},
						function(output) {
							$(".show").html(output);
						});
				} //ປິດ else
			});
		});
	</script>

</head>
<style>
*{font-family:'Phetsarath OT';}
  body{
      
    background-color: #5e72e4;
  }
  .card{
    background-color: #ffffff;
    border-radius: 8px;
    margin-top: 1%;
    margin-bottom: 1%;
  }
  .abc{
    margin: 1%;
  }
  .form-control{
      border: none;
      border-bottom: 2px blue solid;
      font-size: 15px;
    }
    label{
      /* color: white; */
      text-shadow: 0 0 0px blue;
      font-size: 15px;
  }
  .table{
      background-color: white;
      /* backdrop-filter: blur(5px); */
      font-size: 15px;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<?php

session_start();
if(@$_SESSION['checked']<>1){
	echo "<script>alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ'); location='../index.php';
	</script>";
	}
else{
?>
<div class="wrapper">
<!-- end navbar -->
<!-- ..........container............ -->
<div class="container-fluid">
<!-- <h4 class="text-center mt-3">ໜ້າລາຍງານການຂາຍ</h4>
<hr color="red" size="3px" width="100%"> -->
  <div class="card">
  <div class="row abc">
  <?php
      include("../../Connect.php");
      $bin = mysqli_query($con, "SELECT * from products as a, sells as b, users as c where b.prod_id=a.prod_id and b.user_id=c.user_id
      and s_date=curdate() and b.bill='0' order by b.s_id desc ");
    ?>
    <div class="col-sm-6">
      <div class="text-form mt-3">
        <form action="">
          <div class="row">
            <div class="col-sm-4">
              
              <div class="form-group">
                <label class=""><b>ຊື່ສິນຄ້າ</b></label>
                <input type="text" class="form-control prod_name" placeholder="ປ້ອນລະຫັດບາໂຄດກ່ອນ..." readonly>
              </div>
              <div class="choose_img text-center mt-2 w-100 h-75"> </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class=""><b>ລະຫັດບາໂຄດ</b></label>
                <input type="text" class="form-control prod_id" placeholder="ປ້ອນລະຫັດບາໂຄດກ່ອນ...">
              </div>
              <div class="form-group mt-2">
                <label class=""><b>ຈຳນວນ</b></label>
                <input type="number" class="form-control s_qty" placeholder="ປ້ອນຈຳນວນກ່ອນ...">
              </div>
              <div class="form-group mt-2">
                <label class=""><b>ໝາຍເຫດ </b></label>
                <textarea type="text" class="form-control remark" rows="1" name="remark"></textarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class=""><b>ລາຄາຂາຍ</b></label>
                <input type="text" class="form-control sprice" placeholder="ປ້ອນລະຫັດບາໂຄດກ່ອນ..." readonly>
              </div>
              <div class="form-group mt-2">
                <label class=""><b>ເງິນລວມ</b></label>
                <input type="text" class="form-control amount" placeholder="ປ້ອນຈຳນວນກ່ອນ..." readonly>
              </div>
              <div class="row mt-2">
                <div class="col-sm-6 text-center mt-2">
                  <div class="form-group mt-3">
                    <button type="button" class="btn btn-block btn-primary form-control go">
                      <i class="fas fa-check-circle"></i> ຂາຍອອກ</button>
                  </div>
                </div>
                <div class="col-sm-6 text-center mt-2">
                  <div class="form-group mt-3">
                    <button type="reset" class="btn btn-block btn-danger form-control" onclick="window.location.reload()">
                    <i class="fas fa-times"></i> ຍົກເລິກ</button>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-6">
      
    <form action="print.php" method="post">
      <div class="row tag-ex">
        <div class="col-sm-12 text-end mt-3">
          <button type="submit" role="button" class="btn bg-primary text-white">
            <i class="fas fa-print"></i> ອອກໃບບິນ
          </button>&emsp;
        </div>
        
      </div>
      <hr color="red">
      <!-- ......................ຕາຕະລາງ ລາຍງານສິນຄ້າ  ........................ -->
      <div class="tables">
            <table class="table table-hover table-bordered table-sm">
              <tr class="text-center alert-danger text-dark">
                <th class="">ລ/ດ</th>
                <th class="">ລະຫັດສິນຄ້າ</th>
                <th width="12%" class="">ຮູບ</th>
                <th class="">ຊື່ສິນຄ້າ</th>
                <th width="6%" class="">ຈຳນວນ</th>
                <th class="">ລາຄາຂາຍ</th>
                <th class="">ເງິນລວມ</th>
                <th class="">ໝາຍເຫດ</th>
              </tr>
              <?php
              $b = 1;
              while ($data2 = mysqli_fetch_array($bin)) {
              ?>
                <tr>
                  <td><input type="hidden" name="print[]" value="<?php echo $data2['s_id'] ?>"><?php echo $b; ?></td>
                  <td><?php echo $data2['prod_id']; ?></td>
                  <td class="text-center"><img src="../image/<?php echo $data2['img'] ?>" alt="" class="w-75 h-75"></td>
                  <td><?php echo $data2['prod_name']; ?></td>
                  <td><?php echo $data2['s_qty']; ?></td>
                  <td><?php echo number_format($data2['sprice']); ?></td>
                  <td><?php echo number_format($data2['amount']); ?></td>
                  <td><?php echo $data2['s_remark']; ?></td>
                </tr>
              <?php
                $b++;
              }
              ?>
            </table>
          </div>
            </form>
        </div>
  </div>
<!-- .....................................ໜ້າລາຍງານການຂາຍສິນຄ້າ............................................. -->
  <div class="row abc">
    
  
  <hr style="height:2px;border-width:0;color:green;background-color:green" color="green">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
          <h4 class="text-dark">&emsp;<b><i class="fa fa-table"></i> ລາຍງານການຂາຍມື້ນີ້</b></h4>
      </div>
      <div class="col-sm-6">
        <?php $count_today=mysqli_query($con, "SELECT sum(amount) from sells where s_date=curdate()");
        $show_count=mysqli_fetch_array($count_today); ?>
        <h5 class="text-end"><b><i class="fas fa-plus-circle"></i> ລາຍໄດ້ວັນນີ້ : &emsp;<?php echo number_format($show_count[0]); ?> ກີບ&emsp;</b></h5>
      </div>
    </div>
    
  <hr color="green">
    
        <!--  -->
        <?php
        include("../../Connect.php");
        $sql = mysqli_query($con, "SELECT * from products as a, sells as b, users as c, class as d where b.prod_id=a.prod_id and b.user_id=c.user_id and a.class_id=d.class_id
        and s_date=curdate() and b.bill<>'0' order by b.s_id desc ");
      ?>
            <table class="table table-hover table-bordered table-sm">
              <tr class="text-center bg-primary text-white">
                <th class="">ລຳດັບ</th>
                <th class="">ລະຫັດສິນຄ້າ</th>
                <th width="10%" class="">ຮູບສິນຄ້າ</th>
                <th class="">ຊື່ສິນຄ້າ</th>
                <th class="">ໂຊນສິນຄ້າ</th>
                <th class="">ຈຳນວນ</th>
                <th class="">ລາຄາຂາຍ</th>
                <th class="">ເງິນລວມ</th>
                <th class="">ວັນທີ ແລະ ເວລາ</th>
                <th class="">ໝາຍເຫດ</th>
                <th class="">ເລກໃບບິນ</th>
              </tr>
              <?php
              $a = 1;
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <td><?php echo $a; ?></td>
                  <td><?php echo $data['prod_id']; ?></td>
                  <td class="text-center"><img src="../image/<?php echo $data['img'] ?>" alt="" class="w-75 h-75"></td>
                  <td><?php echo $data['prod_name']; ?></td>
                  <td><?php echo $data['class_name']; ?></td>
                  <td><?php echo $data['s_qty']; ?></td>
                  <td><?php echo $data['sprice']; ?></td>
                  <td><?php echo $data['amount']; ?></td>
                  <td><?php echo $data['s_date'] . " " . $data['s_time']; ?></td>
                  <td><?php echo $data['s_remark']; ?></td>
                  <td><?php echo $data['bill']; ?></td>
                </tr>
              <?php
                $a++;
              }
              ?>
            </table>
      
      <div class="show" id="show"></div>
    </div>
  </div>
  <!-- ....... -->
</div>
</div>

</div>
<!-- .end wrapper -->
<!-- ....................................................................................................... -->
</body>
</html>

<?php
 }
?>
<!-- update !-->

