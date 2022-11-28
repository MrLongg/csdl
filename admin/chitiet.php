<?php
	include('../db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhà cung cấp</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
		<li class="nav-item">
	        <a class="nav-link" href="donhang.php">Đơn hàng</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="danhmuc.php">Danh mục</a>
	      </li>
	      <li class="nav-item active">
          <a class="nav-link" href="nhacungcap.php">Nhà cung cấp <span class="sr-only">(current)</span></a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="khachhang.php">Khách hàng</a>
	      </li>
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container-fluid">
		<div class="row">			
			<div class="col-md-12">
				<?php 
					$id = $_GET['id'];
					$result = mysqli_query($conn, "SELECT name
												FROM supplier
												WHERE suCode = $id
										");
					while($row = mysqli_fetch_array($result)) { ?>
				
				<h4><?php echo $row['name']?></h4>
				<?php } ?>				 
				<table class="table table-bordered ">
					<tr>
						<th>Tên danh mục</th>
						<th>Chiều dài</th>
						<th>Số lượng</th>
						<th>Màu</th>
						<th>Giá mua</th>
						<th>Giá bán</th>
                        <th>Ngày nhập kho</th>
					</tr>
					<?php
					$sql = mysqli_query($conn, "SELECT *
                                                FROM provide, category, cacurrentprices
                                                WHERE provide.suCode = $id AND category.caCode = provide.caCode AND category.caCode = cacurrentprices.caCode
                    "); 
					while($row = mysqli_fetch_array($sql)) { ?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['length']; ?> m</td>
						<td><?php echo $row['quantity']; ?> cuộn</td>
						<td><?php echo $row['color']; ?></td>
						<td><?php echo $row['purPrice'] ?> Đ</td>
						<td><?php echo $row['caPrice'] ?> Đ</td>
						<td><?php echo date('d-m-Y', strtotime($row['dateImport'])) ?></td>						
					</tr>
					 <?php } ?> 
				</table>
			</div>		
		</div>
	</div>	
</body>
</html>