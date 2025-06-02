<?php 
    require_once "connectdb.php";
    $sql = "SELECT * From db_listsell where FlgStatus = 'R' and listid =".$_POST["listid"] ;
    $objQ = mysqli_query($link,$sql);
    $transport = null;
    $TransportPrice = null;
    if(isset($_POST["transport"])){
        $transport = $_POST["transport"];
        $sql = "SELECT * from db_transport where Flgstatus = 'A' and TransportID =".$transport;
        $objT = mysqli_query($link,$sql);
        if(mysqli_num_rows($objT) > 0){
            $row=mysqli_fetch_array($objT);
            $TransportPrice = $row["TransportPrice"];
        }
           
    }
?>
<head>
    <title>ตะกร้าสินค้า</title>
    <script>
        function pay(){
            if(form.transport.value == 0){
                alert("กรุณาเลือกบริการขนส่ง");
                return false;
            }
            form.Acttype.value = "add";
            form.action = "paygen.php";
            form.submit();
        }
    </script>
</head>
<body>
<div style="display: flex;align-items:center;justify-content:center;">
    <h3>ยืนยันการซื้อสินค้า</h3>
</div>
    <form name="form" method="post">
    <input type="hidden" name="Acttype" value="">
    <input type="hidden" name="listid" value="<?php echo $_POST["listid"];?>">
        <table width="100%">
            <?php
        if(mysqli_num_rows($objQ) > 0){
            $row = mysqli_fetch_array($objQ);
            $totalprice = $row["TotalPrice"]* $row["productQTY"];
            ?>
                <tr>
                    <td align="center" colspan="7"><img src="../img/<?php echo $row["IMG_Product"];?>" style="width:250px;height250px;"></td>
                </tr>
                <tr>
                    <input type="hidden" name="ProductStockID" value="<?php echo $row["ProductStockID"]?>">
                    <td>
                        ชื่อสินค้า :
                    </td>
                    <td>
                        <?php echo $row["ProductStockDetailName"]?>
                    </td>
                    <td>จำนวน</td>
                    <td>
                        <input type="hidden" name="productQTY" value="<?php echo $row["productQTY"]?>">
                        <?php echo $row["productQTY"]?>
                    </td>
                    <td>ชิ้น</td>
                    <td>ราคา</td>
                    <td><?php echo $totalprice?>&nbsp;บาท</td>
                </tr>
                <tr>
                    <td>เลือกบริการขนส่ง :</td>
                    <td>
                        <select name="transport" onchange="form.submit();">
                            <option value="0">--เลือกบริการขนส่ง--</option>
                            <?php 
                            $sql1 = "select * from db_transport where Flgstatus = 'A'";
                            $objM = mysqli_query($link,$sql1);
                            while ($row2 = mysqli_fetch_array($objM)) {
                                $selected = ($transport == $row2["TransportID"]) ? "selected" : "";
                                echo "<option value='" . $row2["TransportID"] . "' " . $selected . ">" . $row2["TransportName"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>ค่าบริการขนส่ง</td>
                    <td><?php echo $TransportPrice?>บาท</td>
                </tr>
                <tr>
                    <td><h3>ราคาที่ต้องชำระทั้งหมด :</h3></td>
                    <td>
                        <h3>
                        <?php $totalprice = $totalprice + $TransportPrice;
                            echo $totalprice;
                        ?>บาท
                        </h3>
                    </td>
                </tr>
                <input type="hidden" name="totalprice" value="<?php echo $totalprice?>">
                <tr>
                    <td colspan="7" align="center">
                        <img src="../img/slip.jpg" style="width:150px;height:200px">
                        <p style="color:red;">บัญชี: 0553997283 กสิกรไทย</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="center">
                        <p>---โอนแล้วกรุณาแนบสลิป---</p>
                        <input type="file" name="slippicture">
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="7"> 
                        <button onclick="pay();">ยืนยัน</button>
                        <button onclick="window.location.href='order.php';">ยกเลิก</button>
                    </td>
                </tr>
                <?php
            
        }else{
            echo "<tr>";
            echo "<td colspan='7' align='center'>";
            echo "ไม่พบข้อมูล";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </form>
</body>