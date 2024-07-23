<?php
    require("../../Connect.php");
    $id=$_POST['class_id1'];
    $class_name=$_POST['class_name1'];
    $remark=$_POST['remark1'];
    
    $update=mysqli_query($con,"UPDATE class SET class_name='$class_name', remark='$remark' WHERE class_id='$id' ");
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