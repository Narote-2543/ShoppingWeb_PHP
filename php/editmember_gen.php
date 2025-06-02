<?php
    require_once "connectdb.php";
    $Acttype = $_POST["Acttype"];
    if($Acttype == "edit"){
        $idmember = $_POST["idmember"];
        $MemberName = $_POST["MemberName"];
        $Memberidcitizen = $_POST["Memberidcitizen"];
        $Birthday = $_POST["Birthday"];
        $Memberage = $_POST["Memberage"];
        $Memberphone = $_POST["Memberphone"];
        $Memberemail = $_POST["Memberemail"];
        $Memberaddress = $_POST["Memberaddress"];
        $sql ="UPDATE db_member set Member_name='".$MemberName."',Member_idcitizen='".$Memberidcitizen."',Birthday='".$Birthday."',Member_age=".$Memberage.",Member_phone='".$Memberphone."',Member_email='".$Memberemail."',Member_address='".$Memberaddress."' where idmember =".$idmember;

        if(mysqli_query($link,$sql)){
            echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทข้อมูลสมาชิกเรียบร้อย');";
            echo "window.close();";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }else{
        $idmember = $_POST["idmember"];
        $sql = "UPDATE db_member set Flgstatus='C' where idmember=".$idmember;
        if(mysqli_query($link,$sql)){
            echo "<script language=\"JavaScript\">";
            echo "alert('อัพเดทข้อมูลสมาชิกเรียบร้อย');";
            echo "window.location='memberlist.php';";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }
?>