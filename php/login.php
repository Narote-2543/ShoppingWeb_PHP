<?php
	session_start();
	require_once "connectdb.php";

	$sql="SELECT * FROM db_user WHERE user_login='".$_POST["email"]."' AND user_pwd='".$_POST["password"]."'";
	$objQ= mysqli_query($link,$sql);
	if($objR=mysqli_fetch_array($objQ))
	{
		$_SESSION["user_id"]=$objR["user_id"];
		echo "<script language=\"JavaScript\">";
		echo "alert('เข้าสู่ระบบเรียบร้อยแล้ว');";
		echo "window.location='list_Product.php';";
		echo "</script>";
	}
	else
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง!!!');";
		echo "window.location='main.php';";
		echo "</script>";
	}
?>