<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);

    session_destroy();
    header("location:../index.php");
    exit;
?>