<?php
    include("../../Connect.php");

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $prov=$_POST['prov'];
    $dis=$_POST['dis'];
    $vill=$_POST['vill'];
    $status=$_POST['status'];
    $user_name=$_POST['user_name'];
    $tel=$_POST['tel'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $remark=$_POST['remark'];

    $select=mysqli_query($con,"SELECT * FROM users WHERE user_name='$user_name' AND tel='$tel' ");
    $check=mysqli_num_rows($select);
    if($password1<>$password2){
        echo "<script>
            Swal.fire({
                title:'ລະຫັດຢືນຢັນບໍຕົງກັບລະຫັດຜ່ານ',
                text:'ກົດ ຕົກລົງ ເພື່ອປ້ອນຄືນ',
                icon: 'warning'
            })
        </script>";
    }else if($check <> 0){
        echo "<script>
            Swal.fire({
                title: 'ຜູ້ໃຊ້ນີ້ມີຢູ່ແລ້ວ',
                text: 'ກົດ ຕົກລົງ ເພື່ອປ້ອນຄືນ',
                icon:'warning'
            })
        </script>";
    }else{
        $password=md5($password1);
        $insert=mysqli_query($con,"INSERT INTO users set fname='$fname',lname='$lname',gender='$gender',dob='$dob',vill='$vill',dis='$dis',prov='$prov',status='$status',tel='$tel',user_name='$user_name',password='$password' ");
        if($insert){
            echo"
            <script>
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
            </script>";
        }
    }

?>

