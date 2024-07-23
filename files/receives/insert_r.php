<?php
session_start();

include("../../Connect.php");
    $prod_id=$_POST['prod_id'];
    $bprice=$_POST['bprice'];
    $r_qty=$_POST['r_qty'];
    $amount=$_POST['amount'];
    $remark=$_POST['remark'];

     $user_id=$_SESSION['user_id'];
    
    $insert=mysqli_query($con,"INSERT into receives set prod_id='$prod_id',r_bprice='$bprice',r_qty='$r_qty',r_amount='$amount',r_date=curdate(),r_time=curtime(),r_remark='$remark',user_id='$user_id' ");
    if($insert){
        mysqli_query($con,"UPDATE products set prod_qty=prod_qty+'$r_qty',bprice='$bprice' WHERE prod_id='$prod_id' ");
         echo "
            <script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                    showConfirmButton: false,
                    timer: 1500,
                })
                window.setTimeout(function(){
                    location.reload();
                },1500);
         </script> ";
        }
?>