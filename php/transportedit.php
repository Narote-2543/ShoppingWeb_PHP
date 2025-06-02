<?php
	require_once "connectdb.php";
    $Acttype = $_GET["Acttype"];
   
?>
<head>
    <title>ตะกร้าสินค้า</title>
    <script>
        function chkadd(){
            form.Acttype.value = "add";
            form.action = "transport_gen.php";
            form.submit();
        }
        function chkedit(TransportID){
            form.Acttype.value = "edit";
            form.TransportID.value = TransportID;
            form.action = "transport_gen.php";
            form.submit();
        }
        
    </script>
</head>
<body>
    <form name="form" method="post">
        <input type="hidden" name="Acttype" value="">
        <input type="hidden" name="TransportID" value="">
        <?php 
        if($Acttype == "add"){
        ?>
            <table width="100%" border="0">
                <tr>
                    <td align="center" colspan="3"><h3>เพิ่มรายการข้อมูล</h3></td>
                </tr>
                <tr>
                    <td align="right">ชื่อบริษัท :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportName" maxlength="255">
                    </td>
                </tr>
                <tr>
                    <td align="right">รายละเอียด :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportDetail" maxlength="255">
                    </td>
                </tr>
                <tr>
                    <td align="right">ค่าบริการ :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportPrice" maxlength="255">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="chkadd()">ยืนยัน</button>
                        <button onclick="">ยกเลิก</button>
                    </td>
                </tr>
            </table>
        <?php
        }else{
            $sql = "SELECT * from db_transport where Flgstatus='A' and TransportID =".$_GET["TransportID"];
            $objQ = mysqli_query($link,$sql);
            if($row= mysqli_fetch_array($objQ)){
        ?>
            <table width="100%" border="0">
                <tr>
                    <td align="center" colspan="3"><h3>แก้ไขรายการข้อมูล</h3></td>
                </tr>
                <tr>
                    <td align="right">ชื่อบริษัท :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportName" maxlength="255" value="<?php echo $row["TransportName"]?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">รายละเอียด :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportDetail" maxlength="255" value="<?php echo $row["TransportDetail"]?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">ค่าบริการ :</td>
                    <td>
                        <input type="text" style="width:300px;" name="TransportPrice" maxlength="255" value="<?php echo $row["TransportPrice"]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="chkedit(<?php echo $row['TransportID']?>)">ยืนยัน</button>
                        <button onclick="">ยกเลิก</button>
                    </td>
                </tr>
            </table>
        <?php
            }
        ?>
             
        <?php    
        }
        ?>
    </form>
</body>