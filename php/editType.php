<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	require_once "connectdb.php";
    
    $Acttype = $_POST["Acttype"];
    $nRow = $_POST["nRow"];
If ($Acttype != "") {
    If ($Acttype == "add"){
        $sql="SELECT * FROM db_user WHERE user_login='".$_POST["email"]."' AND user_pwd='".$_POST["password"]."'";
        $objQ= mysqli_query($link,$sql);
        if(mysqli_fetch_array($objQ))
        {
            $AddStockValue=$_POST["AddStockValue"];
            if($AddStockValue == 1)
            {
                $sql="insert into db_producttype (ProductStockName,CreateDate,Flgstatus) values ('".$_POST["NewTypeProduct"]."',now(),'A')";
                if (mysqli_query($link, $sql)) {
                    echo "<script language=\"JavaScript\">";
                    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
                    echo "window.location='list_Product.php';";
                    echo "</script>";
                } else {
                    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($link);
                }
            }
        }
        else
        {
            echo "<script language=\"JavaScript\">";
            echo "alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง!!!');";
            echo "window.location='list_Product.php';";
            echo "</script>";
        }
        mysqli_close($link);
    }
    Elseif ($Acttype == "edit"){

        $productIDs = $_POST["ProductID"];
        $productStockNames = $_POST["ProductStockName"];

        foreach ($productIDs as $index => $productID) {
            $productID = mysqli_real_escape_string($link, $productID);
            $productStockName = mysqli_real_escape_string($link, $productStockNames[$index]);

            $sql = "UPDATE db_producttype SET ProductStockName = '$productStockName',RevisedDate = Now() WHERE ProductID = $productID";

            if (mysqli_query($link, $sql)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('อัพเดทข้อมูลเรียบร้อยแล้ว');";
                echo "window.location='list_Product.php';";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('อัพเดทข้อมูลล้มเหลว!!!');";
                echo "window.location='list_Product.php';";
                echo "</script>";
            }
        }
        mysqli_close($link);
    }
    Elseif($Acttype == "del"){
        $DelStocks = $_POST["DelStock"];
        foreach ($DelStocks as $index => $productID) {
            $productID = mysqli_real_escape_string($link, $productID);

            $sql = "UPDATE db_producttype SET Flgstatus = 'C',RevisedDate = Now() WHERE ProductID = $productID";

            if (mysqli_query($link, $sql)) {
                echo "<script language=\"JavaScript\">";
                echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
                echo "window.location='list_Product.php';";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('ลบข้อมูลล้มเหลว!!!');";
                echo "window.location='list_Product.php';";
                echo "</script>";
            }
        }
        mysqli_close($link);
    }
}
	
?>