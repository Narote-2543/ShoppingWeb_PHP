<?php
    require_once "connectdb.php";
    $Acttype = $_POST["Acttype"];
    if($Acttype == "edit"){
        $TransportID = $_POST["TransportID"];
        $TransportName = $_POST["TransportName"];
        $TransportDetail = $_POST["TransportDetail"];
        $TransportPrice = $_POST["TransportPrice"];
        $sql ="UPDATE db_transport set TransportName='".$TransportName."',TransportDetail='".$TransportDetail."',TransportPrice=".$TransportPrice." where TransportID =".$TransportID;

        if(mysqli_query($link,$sql)){
            echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทข้อมูลขนส่งเรียบร้อย');";
            echo "window.close();";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }elseif(($Acttype == "del")){
        $TransportID = $_POST["TransportID"];
        $sql = "UPDATE db_transport set Flgstatus='C' where TransportID=".$TransportID;
        if(mysqli_query($link,$sql)){
            echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทข้อมูลขนส่งเรียบร้อย');";
            echo "window.location='transport.php';";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }else{
        $TransportID = $_POST["TransportID"];
        $TransportName = $_POST["TransportName"];
        $TransportDetail = $_POST["TransportDetail"];
        $TransportPrice = $_POST["TransportPrice"];
        $sql = "INSERT into db_transport (TransportDetail,TransportPrice,TransportName,CreateDate,Flgstatus) VALUES ('".$TransportDetail."',".$TransportPrice.",'".$TransportName."',Now(),'A') ";
        if(mysqli_query($link,$sql)){
            echo "<script language=\"JavaScript\">";
            echo "alert('เพิ่มข้อมูลขนส่งเรียบร้อย');";
            echo "window.close();";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }
?>