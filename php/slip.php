<?php
    require_once "connectdb.php";
    $listid = $_GET["listid"];
    $sql="SELECT * From db_listsell where listid=".$listid;
    $objQ=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($objQ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จยืนยันการชำระเงิน</title>
    <style>
        /* เพิ่มสไตล์ CSS สำหรับหน้าเว็บไซต์ของคุณที่นี่ */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            /* border-collapse: collapse; */
            margin: 20px auto;
        }
        th, td {
            border: 0px;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>ใบเสร็จยืนยันการชำระเงิน</h1>
    <div style="display: flex;align-items:center;justify-content:center">
        <img src="../img/logo.png" style="width:200px;height: 100px;">
    </div>
    <table border="0">
        <tr>
            <td>ชื่อลูกค้า</td>
            <td>
                <?php echo $row["memberName"]?>
            </td>
        </tr>
        <tr>
            <td>ประเภท</td>
            <td>
                <?php echo $row["ProductStockName"]?>
            </td>
        </tr>
        <tr>
            <td>ชื่อสินค้า</td>
            <td>
                <?php echo $row["ProductStockDetailName"]?>
            </td>
        </tr>
        <tr>
            <td>จำนวน</td>
            <td>
                <?php echo $row["productQTY"]?> ชิ้น
            </td>
        </tr>
        <tr>
            <td>วันที่ชำระเงิน</td>
            <td>
                <?php echo $row["SellDate"]?>
            </td>
        </tr>
        <tr>
            <td>ราคาที่ชำระ</td>
            <td>
                <?php echo $row["TotalPrice"]?> บาท
            </td>
        </tr>
        
    </table>
</body>
</html>
