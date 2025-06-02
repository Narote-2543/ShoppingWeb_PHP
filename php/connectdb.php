<?php
	$db_host="localhost";
	$db_username="root";
	$db_pwd="";
	$db_name="SandShop_db";
	$link=mysqli_connect($db_host ,$db_username ,$db_pwd, $db_name) or die ('MySQL Connect Failed!!'.mysqli_connect_error());
	mysqli_query($link,'SET NAMES utf8');
	mysqli_select_db($link,$db_name) or die ('Cannot Open Database!!'.mysqli_connect_error());
?>