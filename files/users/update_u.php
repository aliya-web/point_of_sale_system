<?php
    include("../../Connect.php");

    $id=$_POST['user_id'];

    $fname=$_POST['fname1'];
    $lname=$_POST['lname1'];
    $dob=$_POST['dob1'];
    $gender=$_POST['gender1'];
    $prov=$_POST['prov1'];
    $dis=$_POST['dis1'];
    $vill=$_POST['vill1'];
    $status=$_POST['status1'];
    $user_name=$_POST['user_name1'];
    $tel=$_POST['tel1'];
    $password1=$_POST['password12'];
    $password2=$_POST['password22'];
    $remark=$_POST['remark1'];

    // $select=mysqli_query($con,"SELECT * FROM users WHERE password=md5('$password1') ");
    // $check=mysqli_num_rows($select);
    
    // if($check <> 0){

        $insert=mysqli_query($con,"UPDATE users set fname='$fname',lname='$lname',gender='$gender',dob='$dob',prov='$prov',dis='$dis',vill='$vill',user_name='$user_name',status='$status',tel='$tel',password=md5('$password1'),u_remark='$remark' WHERE user_id='$id' ");
        if($insert){
            echo"
            <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'ແກ້ໄຂ້ສຳເລັດ',
                showConfirmButton: false,
                timer: 1500
            })
            window.setTimeout(function(){
                location='index.php';
            } ,1500);
            </script>";
        }
    // }else{
    //     echo"       
    //     <script>
    //     Swal.fire({
    //         position: 'top',
    //         icon: 'error',
    //         title: 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ',
    //         showConfirmButton: false,
    //         timer: 1500
    //     })
    //     </script>";
    // }

?>

