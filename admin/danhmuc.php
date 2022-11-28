<?php
	include('../db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh mục</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
		<li class="nav-item">
	        <a class="nav-link" href="donhang.php">Đơn hàng</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="danhmuc.php">Danh mục <span class="sr-only">(current)</a>
	      </li>
	      <li class="nav-item">
          <a class="nav-link" href="nhacungcap.php">Nhà cung cấp</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="khachhang.php">Khách hàng</span></a>
	      </li>
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-12">
				<h4>Danh mục</h4>
				<table class="table table-bordered ">
					<tr>
						<th>Mã</th>
						<th>Tên</th>
						<th>Màu</th>
						<th>Số lượng</th>
						<th>Giá bán</th>
						<th>Ngày cập nhật giá</th>
					</tr>
					
					<?php
					$sql = mysqli_query($conn, "SELECT * FROM category, cacurrentprices WHERE category.caCode = cacurrentprices.caCode"); 
					while($row = mysqli_fetch_array($sql)) { ?>
					<tr>
						<td><?php echo $row['caCode']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['color']; ?></td>
						<td><?php echo $row['quantity']; ?> cuộn</td>
						<td><?php echo $row['caPrice'] ?> Đ</td>
						<td><?php echo date('d-m-Y', strtotime($row['caDate'])) ?></td>					
					</tr>
					 <?php } ?>
				</table>
			</div>

			
		</div>
	</div>
	
</body>
</html>