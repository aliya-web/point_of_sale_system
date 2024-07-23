
   <!-- from_type -->
   <script>
    $(document).ready(function () {
        $('.btn_modal').click(function () { 
            $('#modal_form').modal('show');
        });
    });
    </script>

<!-- insert_type -->
<script>
    $(".send").click(function(){
        var fname = $(".fname").val();
        var lname = $(".lname").val();
        var dob = $(".dob").val();
        var gender = $("input[id='gender']:checked").val();
        var prov = $(".prov").val();
        var dis = $(".dis").val();
        var vill = $(".vill").val();
        var status = $(".status").val();
        var user_name = $(".user_name").val();
        var tel = $(".tel").val();
        var password1 = $(".upassword1").val();
        var password2 = $(".upassword2").val();
        var remark = $(".remark").val();
        if(fname==""){
            Swal.fire({
                    position:'center',
                    icon: 'warning',
                    title: 'ການລຸນາປ້ອນຊື່',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
        else if(lname==""){
            Swal.fire({
                    position:'center',
                    icon: 'warning',
                    title: 'ການລຸນາເລືອກເມືອງ',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
        else{
            $.post("insert_u.php",{
                fname : fname,
                lname : lname,
                dob : dob,
                gender : gender,
                prov : prov,
                dis : dis,
                vill : vill,
                status : status,
                user_name : user_name,
                tel : tel,
                password1 : password1,
                password2 : password2,
                remark : remark
            },
            function(output){
                $(".show").html(output);
            })
        }
    })
</script>

    <!-- form_edit_bluid -->
    <script>
    $(document).ready(function () {
    $('.edit_btn').click(function () { 
        $('#modal_edit').modal('show');
        let eid=$(this).attr('id');
        console.log(eid);
        $.ajax({
            type: "post",
            url: "fetch.php",
            data: {eid:eid},
            dataType: "json",
            success: function (data) {
                $('#user_id').val(data.user_id);
                $('#fname1').val(data.fname);
                $('#lname1').val(data.lname);
                $('#dob1').val(data.dob);
                $('#vill1').val(data.vill);
                $('#dis1').val(data.dis);
                $('#prov1').val(data.prov);
                $('#user_name1').val(data.user_name);
                $('#status1').val(data.status);
                $('#tel1').val(data.tel);
                $('#modal_edit').modal('show');
                if(data.gender=="ຊາຍ"){
                    $('.gender2').prop('checked',true);
                }
                else if(data.gender=="ຍິງ"){
                    $('.gender1').prop('checked',true);
                }
            }
        });
    });
});
    </script>

<!-- form_update_room -->
<script>
    $(".go").click(function(){
        var id = $(".user_id").val();

        var fname1 = $(".fname1").val();
        var lname1 = $(".lname1").val();
        var dob1 = $(".dob1").val();
        var gender1 = $("input[id='genders']:checked").val();
        var prov1 = $(".prov1").val();
        var dis1 = $(".dis1").val();
        var vill1 = $(".vill1").val();
        var status1 = $(".status1").val();
        var user_name1 = $(".user_name1").val();
        var tel1 = $(".tel1").val();
        var password12 = $(".upassword12").val();
        var password22 = $(".upassword22").val();
        var remark1 = $(".remark1").val();
        if(password12==""){
            Swal.fire({
                    position:'top',
                    icon: 'warning',
                    title: 'ການລຸນາໃສ່ລະຫັດຜ່ານ',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
        else if(password22==""){
            Swal.fire({
                    position:'top',
                    icon: 'warning',
                    title: 'ການລຸນາໃສ່ລະຫັດຜ່ານ',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
        else if(password22 != password12){
            Swal.fire({
                    position:'top',
                    icon: 'warning',
                    title: 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
        else{
            $.post("update_u.php",{
                user_id : id,

                fname1 : fname1,
                lname1 : lname1,
                dob1 : dob1,
                gender1 : gender1,
                prov1 : prov1,
                dis1 : dis1,
                vill1 : vill1,
                status1 : status1,
                user_name1 : user_name1,
                tel1 : tel1,
                password12 : password12,
                password22 : password22,
                remark1 : remark1
            },
            function(output){
                $(".show").html(output);
            })
        }
    })
</script>

<!-- delete_b -->
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
                var d1=$(this).attr("id");
                Swal.fire({
                 title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່!!!',
                 text: "ກົດ 'ຕົກລົງ' ເພື່ອຢືນຢັນການລົບຂໍ້ມູນ",
                 icon: 'question',
                 showCancelButton: true,
                 confirmButtonColor: 'blue',
                 cancelButtonColor: 'red',
                 confirmButtonText: 'ຕົກລົງ',
                 cancelButtonText: 'ຍົກເລີກ',
                }).then((result)=>{
                if(result.isConfirmed){
                    Swal.fire({
                        position:'top',
                        title:'ລົບຂໍ້ມູນສຳເລັດ',
                        icon: 'success',
                        showConfirmButton:false
                    })
                    setTimeout(()=>{
                        $.ajax({
                            url:'delete_u.php',
                            method:'post',
                            data:{delete_id:d1},
                            success:function(){
                                location.reload();
                            }
                        })
                    },1600);
                }
                });
             })
    })
</script>