<?php
	require_once "connectdb.php";
?>
<html>
<head>
    <title>เข้าสู่ระบบ</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="../css/main.css" rel="stylesheet">
    <style>
        body {
            background-color: purple;
        }
        .card-header {
            background-color: darkpurple;
            color: white;
        }
        .btn-primary {
            background-color: blue;
        }
        .btn-primary:hover {
            background-color: darkblue;
        }
    </style>
    <script>
        function openpopup(){
            var popupWindow = window.open("addmember.php", "เพิ่มสมาชิก", "width=400,height=600");
        }
        function chksignin(){
            form.Acttype.value = "signin";
            form.action = "addmember_gen.php";
            form.submit();
        }
    </script>
</head>
<body>  
    <!-- <form name="form" method="post">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </form> -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="color:black;">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form name="form" method="post">
                            <input type="hidden" name="Acttype" value="">
                            <div class="mb-3">
                                <label for="username" class="form-label">อีเมล์</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <p class="mt-3">หากยังไม่มีบัญชีผู้ใช้  <a href="#" onclick="openpopup()" style="color:red;">คลิกที่นี่เพื่อสมัคร</a></p>
                            <button type="button" class="btn btn-outline-primary mt-3" onclick="chksignin()">เข้าสู่ระบบ</button>
                            <button type="button" class="btn btn-outline-danger mt-3" onclick="window.location.href='main.php'">กลับสู่หน้าหลัก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>