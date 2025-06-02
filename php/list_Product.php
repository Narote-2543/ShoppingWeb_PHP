<?php
	require_once "connectdb.php";

    $sql="SELECT ProductID,ProductStockName FROM db_producttype where Flgstatus = 'A'";
    $objQ = mysqli_query($link,$sql);
    $numRows = mysqli_num_rows($objQ);
?>
<html>
<head>
    <title>แสดงรายการสินค้า</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css" >
</head>
<body>  
    <form name="form" method="post">
    <input type="hidden" name="nRow" value="<?php echo $numRows;?>">
    <input type="hidden" name="Acttype" value="">
    <div class="container-fluid">
        <div class="row">
            <?php require_once 'sidemenu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div style="display: flex;align-items:center;justify-content:center;">
                    <h1>รายการสินค้า</h1>
                </div>
                <div style="display: flex;align-items:center;justify-content:center;">
                    <h1>SandShop</h1>
                </div>
                <div>
                    <table width="100%" border="1">
                        <thead align="center">
                            <tr style="background-color:BAF1FC;">
                                <td><b/>ลำดับ</td>
                                <td><b/>รายการประเภทสินค้า</td>
                                <td><b/>รายการย่อย</td>
                                <td><b/>ลบข้อมูล</td>
                            </tr>
                        </thead>
                    <?php
                        if (mysqli_num_rows($objQ) > 0) {
                            $orderNo = 1;
                            while ($row = mysqli_fetch_array($objQ)) {
                    ?> 
                        <tr align="center" style="background-color:C8FFE1;">
                            <input type="hidden" name="ProductID[]" value="<?php echo $row["ProductID"];?>">
                            <td ><?php echo $orderNo; $orderNo++;?></td>
                            <td >
                                <textarea name="ProductStockName[]" class="TextboxA" value="<?php echo $row["ProductStockName"]?>"><?php echo $row["ProductStockName"]?></textarea>
                            </td>
                            <td >
                                <button type="button" name="StockDetailID" value="<?php echo $row["ProductID"];?>" onclick="GotoDetail(this.value);" class="btn btn-info">ดูรายการย่อย</button>
                            </td>
                            <td >
                                <input type="checkbox" name="DelStock[]" value="<?php echo $row["ProductID"];?>">
                            </td>
                        </tr>
                    <?php
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4' align='center'>";
                            echo "ไม่พบข้อมูล";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                        <tr align="center" style="background-color:C8FFE1;">
                            <td colspan="4">
                                <button type="button" id="adddata" name="adddata" class="btn btn-primary" onclick="openPopup();">เพิ่มรายการ</button>&nbsp;
                                <button type="button" class="btn btn-success" name="editdata" onclick="chkedit();">บันทึกข้อมูลแก้ไข</button>&nbsp;
                                <button type="button" class="btn btn-danger" name="deldata" onclick="chkdel();">ลบรายการที่เลือก</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="popup">
                    <div class="close-btn">&times;</div>
                    <input type="hidden" name="AddStockValue" value="1">
                    <div class="form">
                        <h2>กรอกชื่อสินค้าหรือประเภทสินค้าที่จะเพิ่ม</h2>
                        <div class="form-element">
                            <label for="Product">ชื่อสินค้า</label>
                            <input type="text" id="Product" name="NewTypeProduct" placeholder="กรอกสินค้าที่ต้องการเพิ่ม">
                        </div>
                        <h5>ยืนยันการเพิ่มรายการ</h5>
                        <div class="form-element">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-element">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter password">
                        </div>
                        <!-- <div class="form-element">
                            <input type="checkbox" id="rememberMe">
                            <label for="remember -me">Remember Me</label>
                        </div> -->
                        <div class="form-element">
                            <!-- <input type="submit" id="login" name="login" value="Login" onsubmit="loginWithEmail"> -->
                            <button type="submit" id="addStock" value="addStock" name="addStock" onclick="chkadd();">เพิ่มรายการ</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </form>
    
</body>
<script>
    function openPopup() {
        document.querySelector('.popup').classList.add('active');
    };
    document.querySelector('.close-btn').addEventListener('click',function(){
        document.querySelector('.popup').classList.remove('active');
    });
    function chkadd() 
    {
        if(form.NewTypeProduct.value == ""){
            alert("กรุณากรอกชื่อสินค้า");
            form.NewTypeProduct.focus();
            return false;
        }
        form.Acttype.value = "add";
        form.action='editType.php';
        form.submit();

    };
    function chkedit() 
    {   
        form.Acttype.value = "edit";
        form.action='editType.php';
        form.submit();
    };

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
        form.Acttype.value = "del";
        form.action='editType.php';
        form.submit();
    };
    function GotoDetail(productID) 
    {   
        form.action='productdetail.php?productID=' + productID;
        form.submit();
    };
</script>
</html>