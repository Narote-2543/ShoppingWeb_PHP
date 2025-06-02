<?php
	require_once "connectdb.php";
    if (isset($_GET["productID"])) {
        $productID = $_GET["productID"];
    }

    $sql="SELECT ProductStockID,ProductID,ProductStockDetailName,ProductStockDetail,IMG_Product,ProductPrice,ProductQTY FROM db_productstock where ProductID = ".$productID." and Flgstatus = 'A'";
    $objQ = mysqli_query($link,$sql);
    // $numRows = mysqli_num_rows($objQ);
    mysqli_close($link);
?>
<html>
<head>
    <title>รายละเอียดสินค้า</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css" >
</head>
<script>
    function openPopup(SubActtype,ProductStockID,productID) {
        var popupWindow1 = window.open("addProduct.php?productID="+productID+"&ProductStockID="+ProductStockID+"&SubActtype="+SubActtype, "Popup Title", "width=700,height=400,top=0,left=0");

    }
    function chkadd(SubActtype,productID) {
        var popupWindow2 = window.open("addProduct.php?productID="+productID+"&SubActtype="+SubActtype, "Popup Title", "width=700,height=400,top=0,left=0");

    }
    // function chkadd() 
    // {
    //     if(form.NewTypeProduct.value == ""){
    //         alert("กรุณากรอกชื่อสินค้า");
    //         form.NewTypeProduct.focus();
    //         return false;
    //     }
    //     form.SubActtype.value = "add";
    //     form.action='editType.php';
    //     form.submit();

    // };
    // function chkedit()
    // {
    //     var popupWindow1 = window.open("addProduct.php?productID="+productID+"&ProductStockID="+ProductStockID+"&SubActtype="+SubActtype, "Popup Title", "width=700,height=400,top=0,left=0");
    // }
    // function chkedit(productID) 
    // {   
    //     form.SubActtype.value = "edit";
    //     form.action='gen.php?productID='+productID;
    //     form.submit();
    // };
    function chkdel() 
    {   
        var checkboxes = document.getElementsByName("DelStock[]");
        var isChecked = false;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break; 
            }
        }

        if (!isChecked) {
            alert("กรุณาเลือกรายการที่ต้องการลบ");
            return false;
        }
        form.SubActtype.value = "del";
        form.action='gen.php';
        form.submit();
    };
    // function GotoDetail(productID) 
    // {   
    //     form.action='productdetail.php?productID=' + productID;
    //     form.submit();
    // };
</script>
<body>
    <form name="form" method="post">
    <input type="hidden" name="productID" value="<?php echo $productID?>">
    <input type="hidden" name="SubActtype" value="">
    <div class="container-fluid">
        <div class="row">
            <?php require_once 'sidemenu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div style="display: flex;align-items:center;justify-content:center;">
                    <h1>รายการสินค้า</h1>
                </div>
                <div>
                    <table width="100%" border="1">
                        <tr>
                            <thead align="center">
                                <td width="5%">ลำดับที่</td>
                                <td width="20%">ชื่อสินค้า</td>
                                <td width="35%">รายละเอียดสินค้า</td>
                                <td width="20%">ภาพประกอบ</td>
                                <td width="5%">จำนวน</td>
                                <td width="5%">ราคาต่อชิ้น</td>
                                <td width="5%">แก้ไข</td>
                                <td width="5%">ลบ</td>
                            </thead>
                        </tr>
                        <?php
                        if (mysqli_num_rows($objQ) > 0) {
                            $orderNo = 1;
                            while ($row = mysqli_fetch_array($objQ)) {
                    ?> 
                        <tr align="center">
                            <input type="hidden" name="ProductStockID[]" value="<?php echo $row["ProductStockID"];?>">
                            <td ><?php echo $orderNo; $orderNo++;?></td>
                            <td >
                                <textarea name="ProductStockDetailName[]" class="TextboxB" value="<?php echo $row["ProductStockDetailName"]?>" readonly><?php echo $row["ProductStockDetailName"]?></textarea>
                            </td>
                            <td >
                                <textarea name="ProductStockDetail[]" class="TextboxB" value="<?php echo $row["ProductStockDetail"]?>" readonly><?php echo $row["ProductStockDetail"]?></textarea>
                            </td>
                            <td >
                                <img src="../img/<?php echo $row["IMG_Product"];?>" style="width:90%;height:90%;" />
                            </td>
                            <td><?php echo $row["ProductQTY"]?></td>
                            <td><?php echo $row["ProductPrice"]?></td>
                            <td >
                                <!-- <input type="checkbox" name="DelStock[]" value="<?php echo $row["ProductID"];?>"> -->
                                <button type="button" onclick="openPopup('edit',<?php echo $row['ProductStockID'];?>,<?php echo $productID?>);">แก้ไขข้อมูล</button>
                            </td>
                            <td >
                                <input type="checkbox" name="DelStock[]" value="<?php echo $row["ProductStockID"];?>">
                            </td>
                        </tr>
                    <?php
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='8' align='center'>";
                            echo "ไม่พบข้อมูล";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                        <tr align="center">
                            <td colspan="8">
                                <button type="button" id="adddata" name="adddata" class="btn btn-primary" onclick="chkadd('add',<?php echo $productID?>);">เพิ่มรายการ</button>&nbsp;
                                <!-- <button type="button" class="btn btn-success" name="editdata" onclick="chkedit(<?php echo $productID?>);">บันทึกข้อมูลแก้ไข</button>&nbsp; -->
                                <button type="button" class="btn btn-danger" name="deldata" onclick="chkdel();">ลบรายการที่เลือก</button>&nbsp;
                                <button type="button" class="btn btn-warning" onclick="window.location.href='list_Product.php'">กลับไปเมนูก่อนหน้า</button>
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