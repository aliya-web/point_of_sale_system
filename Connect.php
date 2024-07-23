<?php
    $server="localhost";
    $user="root";
    $password="";
    $db_name="db_android";
    // $db_name="db_amshop";
    $con=mysqli_connect($server,$user,$password,$db_name);
    mysqli_set_charset($con,"utf8");
    
    // if($con){
    //     echo "ການເຊື່ອມໂຍງສຳເລັດ";
    // }else{
    //     echo "ການເຊື່ອມໂຍງລົ້ມເຫຼວ";
    // }
?>