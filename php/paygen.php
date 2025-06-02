<?php
require_once "connectdb.php";

$Acttype = $_POST["Acttype"];

if($Acttype == "del"){

    $listid = $_POST["listid"];
    $sql = "UPDATE db_listsell set Flgstatus = 'C' where listid =".$listid;
    mysqli_query($link,$sql);
    echo "<script language=\"JavaScript\">";
    echo "alert('ลบสินค้าออกจากตะกร้าเรียบร้อย');";
    echo "window.close();";
    echo "window.opener.location.reload();";
    echo "</script>";

}else{

    $listid = $_POST["listid"];
    $ProductStockID = $_POST["ProductStockID"];
    $TransportID = $_POST["transport"];
    $totalprice = $_POST["totalprice"];
    $slippicture = $_POST["slippicture"];
    $productQTY = $_POST["productQTY"];
    $sql1 = "SELECT TransportName from db_transport where TransportID=".$TransportID;
    $objQ = mysqli_query($link,$sql1);
    $row = mysqli_fetch_array($objQ);
    $TransportName = $row["TransportName"];
    $sql = "UPDATE db_listsell set TransportID=".$TransportID.",TransportName='".$TransportName."',SellDate=Now(),TotalPrice=".$totalprice.",Flgstatus='S',IMG_Slip='".$slippicture."' WHERE listid=".$listid;
    mysqli_query($link,$sql);
    $sqlstock = "UPDATE db_productstock Set ProductQTY = ProductQTY -".$productQTY." where ProductStockID=".$ProductStockID;
    mysqli_query($link,$sqlstock);
    echo "<script language=\"JavaScript\">";
    echo "alert('ชำระเงินเรียบร้อย');";
    echo 'var listid = '. $listid .';';
    echo 'var newURL = "slip.php?listid=" + listid;';
    echo "window.location= newURL";
    echo "</script>";

}

?>