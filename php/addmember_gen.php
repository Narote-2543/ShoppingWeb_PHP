<?php
	require_once "connectdb.php";

    $Acttype = $_POST["Acttype"];
   

    if($Acttype == "add"){
        $name = $_POST["name"];
        $idcitizen = $_POST["idcitizen"];
        $age = $_POST["age"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $sql = "SELECT Member_idcitizen from db_member where Member_idcitizen ='".$idcitizen."'";
        $objQ= mysqli_query($link,$sql);
        if(!mysqli_fetch_array($objQ)){
            $sqlinsert = "INSERT into db_member (Member_name,Member_idcitizen,Member_age,Member_phone,Member_email,Member_address,Flgstatus,Cratedate,Member_password) values ('".$name."','".$idcitizen."',".$age.",'".$phone."','".$email."','".$address."','A',Now(),'".$password."')";
            echo $sqlinsert;
            if(mysqli_query($link,$sqlinsert)){
                echo "<script language=\"JavaScript\">";
                echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
                echo "window.close();";
                echo "window.opener.location.reload();";
                echo "</script>";
            }else{
                echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($link);
            }
        }else{
            echo "<script language=\"JavaScript\">";
            echo "alert('มีการสมัครด้วยเลขประจำตัวประชาชนนี้อยู่เเล้ว');";
            echo "window.close();";
            echo "window.opener.location.reload();";
            echo "</script>";
        }
    }else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT idmember,Member_email,Member_password from db_member where Member_email ='".$email."'and Member_password='".$password."'";
        $objQ= mysqli_query($link,$sql);
        if($row=mysqli_fetch_array($objQ)){
            $idmember =$row["idmember"];
            echo "<script language=\"JavaScript\">";
            echo " var newURL = 'sellsystem.php?idmember=' + encodeURIComponent('$idmember');";
            echo "alert('เข้าสู่ระบบเรียบร้อยแล้ว');";
            echo "window.location.href = newURL;";
            echo "</script>";
        }else{
            echo "<script language=\"JavaScript\">";
            echo "alert('เข้าสู่ระบบล้มเหลว!!!');";
            echo "window.location='signinmember.php';";
            echo "</script>";
        }
    }
   
?>