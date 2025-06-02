<?php
require_once "connectdb.php";

if (isset($_POST["stockno"], $_POST["ProductID"], $_POST["ProductStockID"], $_POST["idmember"])) {
    $stockno = $_POST["stockno"];
    $ProductID = $_POST["ProductID"];
    $ProductStockID = $_POST["ProductStockID"];
    $idmember = $_POST["idmember"];
    
    $sql = "SELECT ps.ProductStockID,ps.ProductStockDetailName,ps.ProductStockDetail,ps.ProductPrice,ps.ProductQTY,ps.IMG_Product,pt.ProductID,pt.ProductStockName from db_producttype as pt inner join db_productstock as ps on pt.ProductID=ps.ProductID where ps.ProductID=".$ProductID." and ProductStockID=".$ProductStockID." and ps.Flgstatus='A'";
    $objQ=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($objQ);
    $ProductStockDetailName = $row["ProductStockDetailName"];
    $IMG_Product = $row["IMG_Product"];
    $ProductStockName = $row["ProductStockName"];
    $ProductPrice = $row["ProductPrice"];
    $sqlmember = "SELECT Member_name from db_member where idmember =".$idmember;
    $objM=mysqli_query($link,$sqlmember);
    $rowM=mysqli_fetch_array($objM);
    $MemberName = $rowM["Member_name"];
    $sqlinsert = "INSERT into db_listsell (ProductStockID,idmember,memberName,ProductStockDetailName,ProductStockName,productQTY,Flgstatus,CreateDate,TotalPrice,IMG_Product) values(".$ProductStockID.",".$idmember.",'".$MemberName."','".$ProductStockDetailName."','".$ProductStockName."',".$stockno.",'R',NOW(),".$ProductPrice.",'".$IMG_Product."')";
    if(mysqli_query($link,$sqlinsert)){
        echo "<script language=\"JavaScript\">";
        echo "alert('เพิ่มสินค้าลงตะกร้าเรียบร้อยเเล้ว');";
        echo "window.close();";
        echo "window.opener.location.reload();";
        echo "</script>";
    }

    // $redirectURL = "sellsystem.php?stockno=$stockno&ProductStockDetailName='$ProductStockDetailName'&ProductStockName='$ProductStockName'";
    // header("Location: $redirectURL");
    // exit;
    
} else {
    echo "ยังไม่ได้เลือกสินค้า";
}
?>