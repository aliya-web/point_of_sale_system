<?php
    session_start();//1

    include('../../Connect.php');
    $cate_name=$_POST['cate_name'];
    $remark=$_POST['remark'];

    $user_id=$_SESSION['user_id'];//2

    $select=mysqli_query($con,"SELECT * FROM categories where cate_name='$cate_name' ");
    $check=mysqli_num_rows($select);
    if($check <> 0){
        echo "<script>
            Swal.fire(
                'ປະເພດສິນຄ້ານີ້ມີຢູ່ແລ້ວ',
                'ກົດ ok ເພື່ອດຳເນີນການຕໍ່',
                'warning'
            )
          
        </script>";
    }else{
        $insert=mysqli_query($con,"INSERT into categories(cate_name,c_remark,user_id) values('$cate_name','$remark','$user_id')");//3
        // $insert=mysqli_query($con,"INSERT into categories(cate_name,c_remark) values('$cate_name','$remark')");//3

            if($insert){
                echo "<script>
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: 'ການບັນທືກສຳເລັດ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.setTimeout(function(){
                            location.reload();
                        } ,1500);
                    </script> ";
            }
    }

    // echo "ປະເພດສິນຄ້າ: $cate_name <br>
    // ໝາຍເຫດ: $remark";
?>

<!-- 
      window.setTimeout(function(){
                location.reload();
            })
 -->