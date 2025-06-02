<!DOCTYPE html>
<?php
	require_once "connectdb.php";
?>
<html>
<head>
    <title>ตะกร้าสินค้า</title>
    <script>
        function chkadd(ProductID,ProductStockID) {
            if (form.stockno.value == "") {
                alert("กรุณากรอกจำนวนสินค้าที่ต้องการ");
                return false;
            }
            form.action = "changestock_gen.php";
            form.submit();
        }
        
    </script>
</head>
<body>
<form name="form" method="post">
<input type="hidden" name="ProductID" value="<?php echo $_GET["ProductID"]?>">
<input type="hidden" name="ProductStockID" value="<?php echo $_GET["ProductStockID"]?>">
<input type="hidden" name="idmember" value="<?php echo $_GET["idmember"]?>">
    <table width="100%">
        <tr>
            <td colspan="2" align="center">
                <h3>เพิ่มสินค้าลงตะกร้า</h3>
            </td>
        </tr>
        <tr>
            <td align="right">
                กรอกจำนวน:
            </td>
            <td>
                <input type="text" name="stockno">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <button onclick="chkadd(<?php echo $_GET['ProductID']?>,<?php echo $_GET['ProductStockID']?>)">เพิ่มสินค้าลงตะกร้า</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>