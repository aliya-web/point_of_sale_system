<?php
    include("../../Connect.php");
    $id=$_POST['delete_id'];
    $delete=mysqli_query($con,"DELETE FROM class WHERE class_id='$id' ");
?>

