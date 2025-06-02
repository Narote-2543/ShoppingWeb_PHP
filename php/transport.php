<?php
	require_once "connectdb.php";

    $sql = "SELECT TransportID,TransportDetail,TransportPrice,TransportName FROM db_transport where Flgstatus = 'A'";
    $objQ = mysqli_query($link,$sql);
    mysqli_close($link);
?>
<html>
<head>
    <title>จัดการบริการขนส่ง</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="../css/main.css" rel="stylesheet">
    <script>
        function chkedit(TransportID,Acttype){
            var popup = window.open("transportedit.php?TransportID="+TransportID+"&Acttype="+Acttype, "จัดการสมาชิก", "width=600,height=300");
        }
        function chkdel(TransportID,Acttype){
            if (confirm("ยืนยันที่จะลบข้อมูลสมาชิกหรือไม่?")) {
                form.TransportID.value = TransportID;
                form.Acttype.value = Acttype;
                form.action = "transport_gen.php";
                form.submit();
            }
        }
        function chkadd(add){
            var popup = window.open("transportedit.php?Acttype="+add, "จัดการบริการขนส่ง", "width=600,height=300");
        }
    </script>
</head>
<body>  
    <form name="form" method="post">
        <input type="hidden" name="Acttype" value="">
        <input type="hidden" name="TransportID" value="">
        <div class="container-fluid">
            <div class="row">
                <?php require_once 'sidemenu.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div style="display: flex;align-items:center;justify-content:center;">
                        <h1>รายการขนส่ง</h1>
                    </div>
                    <div>
                        <table width="100%">
                            <thead align="center">
                                <tr style="background-color: D000F1;">
                                    <td><b/>ลำดับ</td>
                                    <td><b/>รหัสบริการขนส่ง</td>
                                    <td><b/>รายละเอียด</td>
                                    <td><b/>ค่าบริการ</td>
                                    <td><b/>แก้ไข</td>
                                    <td><b/>ลบ</td>
                                </tr>
                            </thead>
                            <tr>
                                <?php
                                if (mysqli_num_rows($objQ) > 0) {
                                    $orderNo = 1;
                                    while ($row = mysqli_fetch_array($objQ)) {
                                ?>
                                        <tr style="background-color: F7C3FF;">
                                            <td align="center" width="10%">
                                                <?php echo $orderNo; $orderNo++;?>
                                            </td>
                                            <td align="center" width="20%">
                                                <?php echo $row["TransportID"]?>
                                            </td>
                                            <td  width="30%">
                                                <?php echo $row["TransportName"]?>
                                            </td>
                                            <td  width="20%">
                                                <?php echo $row["TransportPrice"]?> บาท
                                            </td>
                                            <td align="center"  width="10%" onclick="chkedit(<?php echo $row['TransportID']?>,'edit')">
                                                <button type="button" class="btn btn-Warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                                        <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                            <td align="center"  width="10%">
                                                <button type="button" class="btn btn-Danger" onclick="chkdel(<?php echo $row['TransportID']?>,'del')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                
                                }

                                ?>
                            </tr>
                            <tr style="background-color: F7C3FF;">
                                <td colspan="6" align="center">
                                    <button type="button" class="btn btn-Info" onclick="chkadd('add')">เพิ่มข้อมูล</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </form>
    
</body>
</html>