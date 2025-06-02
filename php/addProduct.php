<?php
    require_once "connectdb.php";
    $productID = $_GET["productID"];
    $SubActtype = $_GET["SubActtype"];
?>
<html>
<head>
    <title>เพิ่มรายการ</title>
</head>
<script>
    function chkadd()
    {
        if(form.ProductStockDetailName.value == ""){
            alert("กรุณากรอกชื่อสินค้า");
            form.ProductStockDetailName.focus();
            return false;
        }
        if(form.ProductStockDetail.value == ""){
            alert("กรุณากรอกรายละเอียดสินค้า");
            form.ProductStockDetail.focus();
            return false;
        }
        if(form.IMG_Product.value == ""){
            alert("กรุณากรอกรายละเอียดสินค้า");
            form.IMG_Product.focus();
            return false;
        }
        form.SubActtype.value = "add";
        form.action = "gen.php";
        form.submit();
    }
    function chkedit()
    {
        if(form.ProductStockDetailName.value == ""){
            alert("กรุณากรอกชื่อสินค้า");
            form.ProductStockDetailName.focus();
            return false;
        }
        if(form.ProductStockDetail.value == ""){
            alert("กรุณากรอกรายละเอียดสินค้า");
            form.ProductStockDetail.focus();
            return false;
        }
        if(form.IMG_Product.value == ""){
            alert("กรุณาเพิ่มรูปภาพสินค้า");
            form.IMG_Product.focus();
            return false;
        }
        form.SubActtype.value = "edit";
        form.action = "gen.php";
        form.submit();
    }
</script>
<body>
    <form name="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="SubActtype" value="">
        <input type="hidden" name="productID" value="<?php echo $productID?>">
        <?php if($SubActtype == "add"){?>
            <table width="100%" border="0">
                <tr>
                    <td align="center" colspan="3"><h3>เพิ่มรายการข้อมูล</h3></td>
                </tr>
                <tr>
                    <td align="right">ชื่อสินค้า :</td>
                    <td>
                        <input type="text" name="ProductStockDetailName" maxlength="255">
                    </td>
                </tr>
                <tr>
                    <td align="right">รายละเอียดสินค้า :</td>
                    <td>
                        <textarea name="ProductStockDetail" style="width:300px;height:100px;" maxlength="255"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">จำนวนสินค้า :</td>
                    <td>
                        <input type="text" name="ProductQTY">
                    </td>
                </tr>
                <tr>
                    <td align="right">ราคาสินค้า :</td>
                    <td>
                        <input type="text" name="ProductPrice">
                    </td>
                </tr>
                <tr>
                    <td align="right">เพิ่มรูปภาพประกอบ :</td>
                    <td>
                        <input type="file" name="IMG_Product">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="chkadd();">ยืนยัน</button>
                        <button onclick="form.reset();">ล้างข้อมูล</button>
                    </td>
                </tr>
            </table>
        <?php }
        Else { 
            $ProductStockID = $_GET["ProductStockID"];
            $sql = "SELECT ProductStockID,ProductID,ProductStockDetailName,ProductStockDetail,IMG_Product,ProductPrice,ProductQTY from db_productstock where ProductStockID=".$ProductStockID."";
            $objQ = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($objQ)
            ?>
            <table width="100%" border="0">
                <input type="hidden" name="ProductStockID" value="<?php echo $row["ProductStockID"]?>">
                <tr>
                    <td align="center" colspan="3"><h3>แก้ไขรายการข้อมูล</h3></td>
                </tr>
                <tr>
                    <td align="right">ชื่อสินค้า :</td>
                    <td>
                        <input type="text" style="width:300px;" name="ProductStockDetailName" maxlength="255" value="<?php echo $row["ProductStockDetailName"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">รายละเอียดสินค้า :</td>
                    <td>
                        <textarea name="ProductStockDetail" style="width:300px;height:100px;" maxlength="255" value="<?php echo $row["ProductStockDetail"];?>"><?php echo $row["ProductStockDetail"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">จำนวนสินค้า :</td>
                    <td>
                        <input type="text" name="ProductQTY" value="<?php echo $row["ProductQTY"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">ราคาสินค้า :</td>
                    <td>
                        <input type="text" name="ProductPrice" value="<?php echo $row["ProductPrice"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">เพิ่มรูปภาพประกอบ :</td>
                    <td>
                        <input type="file" name="IMG_Product">
                    </td>
                </tr>
                <tr>
                    <td align="right">ข้อมูลเดิม :</td>
                    <td>
                        <?php echo $row["IMG_Product"];?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="chkedit();">ยืนยัน</button>
                        <button onclick="form.reset();">ล้างข้อมูล</button>
                    </td>
                </tr>
            </table>
        <?php    
        }
        ?>
    </form>
</body>
</html>