<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Menu Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function chkout(){
            Swal.fire({
                title: 'ยืนยันที่จะออกจากระบบ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "main.php";
                }
            });
        }
    </script>
    <style>
        li:hover{
            background-color: #B1B1B1;
        }
    </style>
</head>
<body>
    <div class="container-fluid" id="sideMenu">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-fixed top-0" style="height: 100%;">
                <div class="position-sticky">
                    <div class="text-center mb-3">
                        <img src="../img/logo.png" class="img-fluid">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="list_Product.php">
                                แสดงรายการสินค้า
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="memberlist.php">
                                จัดการสมาชิก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transport.php">
                                รายการขนส่ง
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alllist.php">
                                รายการสั่งซื้อทั้งหมด
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="chkout()" href="#">
                                ออกจากระบบ
                            </a>
                        </li>
                        <iframe src="https://giphy.com/embed/kZqbBT64ECtjy" width="200" height="400" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                    </ul>
                </div>
            </nav>

            <!-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                 เนื้อหาหน้าเว็บ
            </main> -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
