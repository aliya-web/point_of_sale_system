<?php
include("../../Connect.php");
$id= $_POST["eid"];
$sql = "SELECT * FROM categories WHERE cate_id='$id'";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
echo json_encode($row);
?>