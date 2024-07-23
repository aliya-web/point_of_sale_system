<?php
    session_start();

    include("../../Connect.php");
    $prod_id=$_POST['prod_id'];
    $sprice=$_POST['sprice'];
    $s_qty=$_POST['s_qty'];
    $amount=$_POST['amount'];
    $remark=$_POST['remark'];

    $user_id=$_SESSION['user_id'];    

    $qty=mysqli_query($con,"SELECT prod_qty from products where prod_id='$prod_id' ");
    $check_qty=mysqli_fetch_array($qty);
    $check = $check_qty[0];
    if($check < $s_qty){
        echo "
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'ສິນຄ້າບໍ່ພໍຂາຍ',
                    showConfirmButton: false,
                    timer: 1500,
                })
            </script> ";
    }
    else if($check == 0){
        echo "
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'ສິນຄ້າໜົດແລ້ວ!!!',
                    showConfirmButton: false,
                    timer: 1500,
                })
            </script> ";
    }
    else{
        $insert=mysqli_query($con,"INSERT into sells set prod_id='$prod_id',sprice='$sprice',s_qty='$s_qty',amount='$amount',
        s_date=curdate(),s_time=curtime(),s_remark='$remark',user_id='$user_id' ");
        // $insert=mysqli_query($con,"INSERT into sells set prod_id='$prod_id',sprice='$sprice',s_qty='$s_qty',amount='$amount',
        // s_date=curdate(),s_time=curtime(),s_remark='$remark' ");
           if($insert){
                mysqli_query($con,"UPDATE products set prod_qty=prod_qty-'$s_qty' WHERE prod_id='$prod_id' ");
                echo "
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'ຂາຍອອກສຳເລັດ',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        window.setTimeout(function(){
                            location.reload();
                        },1500);
                </script> ";
                }
            }

 
?>