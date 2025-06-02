<?php
	require_once "connectdb.php";

	if (isset($_POST['ProductType'])) {
		$ProductType = $_POST['ProductType'];
	}
	$sql ="SELECT ps.ProductStockID,ps.ProductStockDetailName,ps.ProductStockDetail,ps.ProductPrice,ps.ProductQTY,ps.IMG_Product,pt.ProductID,pt.ProductStockName from db_producttype as pt inner join db_productstock as ps on pt.ProductID=ps.ProductID where ps.Flgstatus='A'";
	if (isset($ProductType)) {
		$sql = $sql." and pt.ProductID =".$ProductType;
	}
	$sql = $sql." order by pt.ProductID,ps.ProductStockID";
	$objQ=mysqli_query($link,$sql);
	if(isset($_GET['idmember'])){
		$idmember = $_GET['idmember'];
	}
?>
<html>
<head>
    <title>จัดการบริการขนส่ง</title>
	<link rel="icon" href="../img/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script>
		function changstock(ProductID,ProductStockID,idmember){
			var popupWindow = window.open("changestock.php?ProductID="+ProductID+"&ProductStockID="+ProductStockID+"&idmember="+idmember, "เลือกสินค้าลงตะกร้า", "width=500,height=300");
		}
		function chkorder(idmember){
			var popup = window.open("order.php?idmember="+idmember, "สินค้าในตะกร้า", "width=800,height=500");
		}
	</script>
</head>
<body>  
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
	<div class="container">
		<button class="btn btn-outline-success me-auto" type="button" onclick="window.location.href='main.php'">กลับหน้าหลัก</button>
		<button type="button" class="btn btn-outline-primary ms-auto" onclick="chkorder(<?php echo $_GET['idmember']?>)">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
				<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
			</svg>
		</button>
	</div>
</nav>
    <form name="form" method="post">
        <div class="container">
			<br>
			<div class="col-md-6 mx-auto"><label>เลือกประเภทสินค้าที่ต้องการ</label>
			<?php
				$sql = "SELECT ProductID, ProductStockName FROM db_producttype WHERE Flgstatus = 'A'";
				$objL = mysqli_query($link, $sql);
				echo '<select name="ProductType" class="form-select" aria-label="Default select example" onchange="form.submit();">';
				echo '<option value="0">ทั้งหมด</option>';
				while ($row = mysqli_fetch_assoc($objL)) {
					$selected = ($_POST['ProductType'] == $row['ProductID']) ? 'selected' : ''; // เพิ่มเงื่อนไขเพื่อตรวจสอบว่า option นี้ถูกเลือกหรือไม่
					echo '<option value="' . $row['ProductID'] . '" ' . $selected . '>' . $row['ProductStockName'] . '</option>';
				}
				echo '</select>';                    
			?>

			</div>
			<br>
            <table width="100%" border="1" style="border: 1px solid;border-collapse: collapse;">
				<thead align="center" style="border: 1px solid;border-collapse: collapse;">
					<tr style="border: 1px solid;border-collapse: collapse;background-color:CC00FF;">
						<td width="5%" style="border: 1px solid;border-collapse: collapse;"><b/>ลำดับ</td>
						<td width="20%" style="border: 1px solid;border-collapse: collapse;"><b/>รายการ</td>
						<td width="30%" style="border: 1px solid;border-collapse: collapse;"><b/>รายละเอียดสินค้า</td>
						<td width="10%" style="border: 1px solid;border-collapse: collapse;"><b/>ราคา</td>
						<td width="10%" style="border: 1px solid;border-collapse: collapse;"><b/>จำนวนคงเหลือ</td>
						<td width="15%" style="border: 1px solid;border-collapse: collapse;"><b/>รูปประกอบสินค้า</td>
						<td width="15%" style="border: 1px solid;border-collapse: collapse;"><b/>เลือก</td>
					</tr>
				</thead>
				<?php 
				if (mysqli_num_rows($objQ) > 0) {
					$orderNo = 1;
					while ($row = mysqli_fetch_array($objQ)) {
				?>
					<tr align="center" style="border: 1px solid;border-collapse: collapse;background-color:EB9BFF;">
						<input type="hidden" name="ProductID" value="<?php echo $row["ProductID"]?>">
						<input type="hidden" name="ProductStockID" value="<?php echo $row["ProductStockID"]?>">
						<td style="border: 1px solid;border-collapse: collapse;"><?php echo $orderNo;$orderNo++;?></td>
						<td style="border: 1px solid;border-collapse: collapse;"><?php echo $row["ProductStockDetailName"]?></td>
						<td style="border: 1px solid;border-collapse: collapse;"><?php echo $row["ProductStockDetail"]?></td>
						<td style="border: 1px solid;border-collapse: collapse;"><?php echo $row["ProductPrice"]?></td>
						<td style="border: 1px solid;border-collapse: collapse;"><?php echo $row["ProductQTY"]?></td>
						<td style="border: 1px solid;border-collapse: collapse;"><img src="../img/<?php echo $row["IMG_Product"]?>" style="width:90%;height:90%;"></td>
						<td style="border: 1px solid;border-collapse: collapse;"><button class="btn btn-secondary" onclick="changstock(<?php echo $row['ProductID']?>,<?php echo $row['ProductStockID']?>,<?php echo $_GET['idmember']?>)">เลือกสินค้า</button></td>
					</tr>
				<?php
					}
				}
				else{
					echo "<tr>";
					echo "<td colspan='7' align='center'>";
					echo "ไม่พบข้อมูล";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</table>
        </div>
    </form>
    
</body>
</html>