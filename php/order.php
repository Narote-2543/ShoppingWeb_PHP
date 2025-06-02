<?php
	require_once "connectdb.php";
    $sql = "SELECT * from db_listsell where Flgstatus='R' and idmember =".$_GET["idmember"];
    $objQ = mysqli_query($link,$sql);
?>
<head>
    <title>ตะกร้าสินค้า</title>
    <script>
        function chkpay(listid){
            form.listid.value = listid;
            form.action = "pay.php";
            form.submit();
        }
        function chkdel(listid){
            form.listid.value = listid;
            form.Acttype.value = "del";
            form.action = "paygen.php";
            form.submit();
        }
    </script>
</head>
<body>
<div style="display: flex;align-items:center;justify-content:center;">
    <h3>รายการสินค้า</h3>
</div>
    <form name="form" method="post">
    <input type="hidden" name="listid" value="">
    <input type="hidden" name="Acttype" value="">
        <table width="100%">
            <tr>
                <thead align="center">
                    <td><b/>ลำดับ</td>
                    <td><b/>รายการ</td>
                    <td><b/>จำนวน</td>
                    <td><b/>ราคาที่ต้องชำระ</td>
                    <td><b/>ชำระเงิน</td>
                    <td><b/>ลบรายการ</td>
                </thead>
            </tr>
            <?php
        if(mysqli_num_rows($objQ) > 0){
            $orderNo = 1;
            while ($row = mysqli_fetch_array($objQ)) {
                ?>
                <tr align="center" style="background-color: #E6AAF1;">
                    <td><?php echo $orderNo; $orderNo++;?></td>
                    <td><?php echo $row["ProductStockDetailName"]?></td>
                    <td><?php echo $row["productQTY"]?></td>
                    <td><?php echo $row["TotalPrice"]* $row["productQTY"]?>&nbsp;บาท</td>
                    <td><button onclick="chkpay(<?php echo $row['listid']?>);">ชำระเงิน</button></td>
                    <td><button onclick="chkdel(<?php echo $row['listid']?>);">ลบ</button></td>
                </tr>
                <?php
            }
        }else{
            echo "<tr>";
            echo "<td colspan='6' align='center'>";
            echo "ไม่พบข้อมูล";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </form>
</body>