<?php 
require_once "connectdb.php";

$SubActtype = $_POST["SubActtype"];


If($SubActtype == "add"){
    $ProductStockDetailName = $_POST["ProductStockDetailName"];
    $ProductStockDetail = $_POST["ProductStockDetail"];
    $IMG_Product = $_POST["IMG_Product"];
    $productID = $_POST["productID"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductQTY = $_POST["ProductQTY"];

    if(isset($_FILES['IMG_Product'])){
        $file_name = $_FILES['IMG_Product']['name']; 
        $file_tmp = $_FILES['IMG_Product']['tmp_name']; 
        
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script language=\"JavaScript\">";
            echo "alert('กรุณาอัปโหลดไฟล์ที่เป็นชนิด jpg,png,jpeg และ gif เท่านั้น');";
            echo "window.close();";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
        $upload_directory = '../img/'; 
        move_uploaded_file($file_tmp, $upload_directory.$file_name);
    }

    $sql = "insert into db_productstock (ProductID,ProductStockDetailName,ProductStockDetail,CreateDate,Flgstatus,IMG_Product,ProductPrice,ProductQTY) values (".$productID.",'".$ProductStockDetailName."','".$ProductStockDetail."',Now(),'A','".$file_name."',".$ProductPrice.",".$ProductQTY.")";
    if (mysqli_query($link, $sql)) {
        echo "<script language=\"JavaScript\">";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.close();";
        echo "window.opener.location.reload();";
        echo "</script>";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($link);
    }

}Elseif($SubActtype == "edit"){
    $productID = $_POST["productID"];
    $ProductStockID = $_POST["ProductStockID"];
    $ProductStockDetailName = $_POST["ProductStockDetailName"];
    $ProductStockDetail = $_POST["ProductStockDetail"];
    $IMG_Product = $_POST["IMG_Product"];
    $ProductQTY = $_POST["ProductQTY"];
    $ProductPrice = $_POST["ProductPrice"];
    
    $sql = "UPDATE db_productstock set ProductStockDetailName ='".$ProductStockDetailName."',ProductStockDetail ='".$ProductStockDetail."',IMG_Product ='".$IMG_Product."',ProductQTY=".$ProductQTY.",ProductPrice=".$ProductPrice." where productID =".$productID." and ProductStockID=".$ProductStockID;
    
    if (mysqli_query($link, $sql)) {
        echo "<script language=\"JavaScript\">";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.close();";
        echo "window.opener.location.reload();";
        echo "</script>";
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล: " . mysqli_error($link);
    }
}Elseif($SubActtype == "del"){
    $DelStocks = $_POST["DelStock"];
    $productID = $_POST["productID"];
    foreach ($DelStocks as $index => $ProductStockID) {
        $ProductStockID = mysqli_real_escape_string($link, $ProductStockID);
        $sql = "UPDATE db_productstock set Flgstatus = 'C' where productID =".$productID." and ProductStockID=".$ProductStockID;

        if (mysqli_query($link, $sql)) {
            echo "<script language=\"JavaScript\">";
            echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
            echo 'var productID = ' . $productID . ';';
            echo 'var newURL = "productdetail.php?productID=" + productID;';
            echo 'window.location.href = newURL;';
            echo "</script>";
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ลบข้อมูลล้มเหลว!!!');";
            echo "window.location='productdetail.php';";
            echo "</script>";
        }
    }
}

?>