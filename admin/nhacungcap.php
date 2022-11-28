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
				<h4>Nhà cung cấp</h4>
				<h4><a href="them.php">Thêm nhà cung cấp</a></h4>				 
				<table class="table table-bordered ">
					<tr>
						<th>Mã</th>
						<th>Tên nhà cung cấp</th>
						<th>Địa chỉ</th>
						<th>Số ngân hàng</th>
						<th>Mã thuế</th>
                        <th>Số điện thoại</th>
						<th>Mã nv phụ trách</th>
					</tr>
					<?php
					$sql = mysqli_query($conn, "SELECT * FROM supplier "); 
					while($row = mysqli_fetch_array($sql)) { ?>
					<tr>
						<td><?php echo $row['suCode']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['bankAccount']; ?></td>
						<td><?php echo $row['taxCode'] ?></td>
                        <td>
                        <?php
                            $id = $row['suCode'];
                            $stmt = mysqli_query($conn, "SELECT suPhone from suphonenumber WHERE suCode = $id");
                            while($row2 = mysqli_fetch_array($stmt)) { ?>
                            <li > 
                                <?php echo $row2['suPhone']; ?>
                            </li>
                            <?php } ?>  
                         </td>
						<td><?php echo $row['paCode'] ?></td>
						<td><a href="./chitiet.php?id=<?php echo $row['suCode'] ?>">Chi tiết</a></td>
						<td><a href="./themdanhmuc.php?id=<?php echo $row['suCode'] ?>">Thêm danh mục</a></td>
					</tr>
					 <?php } ?> 
				</table>
			</div>		
		</div>
	</div>	
</body>
</html>