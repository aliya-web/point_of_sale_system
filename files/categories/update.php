<?php
    require("../../Connect.php");
    $id=$_POST['cate_id1'];
    $cate_name=$_POST['cate_name1'];
    $remark=$_POST['remark1'];
    
    $update=mysqli_query($con,"UPDATE categories SET cate_name='$cate_name', c_remark='$remark' WHERE cate_id='$id' ");
    if($update){
        echo "<script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                showConfirmButton: false,
                timer: 1000
            })
            window.setTimeout(function(){
                location='index.php';
            },1000);
        ;</script>";
    }else{
        echo "<script>alet('ແກ້ໄຂຂໍ້ມູນລົ້ມເຫຼວ'); location='index.php';</script>";
    }
?>