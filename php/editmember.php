<?php
	require_once "connectdb.php";
    $sql = "SELECT * from db_member where Flgstatus='A' and idmember =".$_GET["idmember"];
    $objQ = mysqli_query($link,$sql);
?>
<head>
    <title>ตะกร้าสินค้า</title>
    <script>
        function chkedit(idmember){
            form.Acttype.value = "edit";
            form.idmember.value = idmember;
            form.action = "editmember_gen.php";
            form.submit();
        }
        
    </script>
</head>
<body>
    <form name="form" method="post">
        <input type="hidden" name="Acttype" value="">
        <input type="hidden" name="idmember" value="">
            <?php
            if($row = mysqli_fetch_array($objQ)){
            ?>
            <table width="100%" border="0">
                <tr>
                    <td align="center" colspan="3"><h3>แก้ไขรายการข้อมูล</h3></td>
                </tr>
                <tr>
                    <td align="right">ชื่อและนามสกุล :</td>
                    <td>
                        <input type="text" style="width:300px;" name="MemberName" maxlength="255" value="<?php echo $row["Member_name"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสประจำตัวประชาชน :</td>
                    <td>
                        <input type="text" style="width:300px;" name="Memberidcitizen" maxlength="255" value="<?php echo $row["Member_idcitizen"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">วันเดือนปีเกิด :</td>
                    <td>
                        <input type="date" name="Birthday" value="<?php echo $row["Birthday"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">อายุ :</td>
                    <td>
                        <input type="text" name="Memberage" value="<?php echo $row["Member_age"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">เบอร์ติดต่อ :</td>
                    <td>
                        <input type="text" name="Memberphone" value="<?php echo $row["Member_phone"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">อีเมล์ :</td>
                    <td>
                        <input type="text" name="Memberemail" value="<?php echo $row["Member_email"];?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">ที่อยู่ที่สามารถติดต่อได้ :</td>
                    <td>
                    <textarea name="Memberaddress" style="width:300px;" maxlength="255" ><?php echo $row["Member_address"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button onclick="chkedit(<?php echo $row['idmember']?>);">ยืนยัน</button>
                        <button onclick="form.reset();">ล้างข้อมูล</button>
                    </td>
                </tr>
            </table>
        <?php    
        }
        ?>
    </form>
</body>