<!DOCTYPE html>
<?php
	require_once "connectdb.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function chkadd(){
            if(form.name.value == ""){
                alert("กรุณากรอกชื่อ");
                return false;
            }
            if(form.idcitizen.value == ""){
                alert("กรุณากรอกเลขประจำตัวประชาชน");
                return false;
            }
            if(form.age.value == ""){
                alert("กรุณากรอกอายุ");
                return false;
            }
            if(form.phone.value == ""){
                alert("กรุณากรอกเบอร์โทรศัพท์");
                return false;
            }
            if(form.email.value == ""){
                alert("กรุณากรอกอีเมล์");
                return false;
            }
            if(form.address.value == ""){
                alert("กรุณากรอกที่อยู่ที่สามารถติดต่อได้");
                return false;
            }
            if(form.password.value == ""){
                alert("กรุณากรอกรหัสผ่าน");
                return false;
            }
            form.Acttype.value = "add";
            form.action = "addmember_gen.php";
            form.submit();
        }
    </script>
</head>
<body>
<form name="form" method="post">
<input type="hidden" name="Acttype" value="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">สมัครสมาชิก</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" name="name" required>
                            <label for="firstName" class="form-label"> เลขประจำตัวประชาชน </label>
                            <input type="text" class="form-control" name="idcitizen" maxlength="13" required>
                            <label for="firstName" class="form-label"> อายุ  </label>
                            <input type="text" class="form-control" name="age" required>
                            <label for="firstName" class="form-label"> เบอร์โทรศัพท์  </label>
                            <input type="text" class="form-control" name="phone" required>
                            <label for="firstName" class="form-label"> อีเมล์  </label>
                            <input type="text" class="form-control" name="email" required>
                            <label for="firstName" class="form-label"> ที่อยู่ที่สามารถติดต่อได้  </label>
                            <input type="text" class="form-control" name="address" required>
                            <label for="firstName" class="form-label"> รหัสผ่าน  </label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="chkadd();">สมัคร</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
