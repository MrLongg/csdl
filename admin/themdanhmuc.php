<?php
	include('../db/connect.php');
?>
<?php
	$id = $_GET['id']; 
	if(isset($_POST['them']))
    {
		
		$ten = $_POST['ten'];
		$mau = $_POST['mau'];
        $soluong = $_POST['soluong'];
		$chieudai = $_POST['chieudai'];
        $giamua = $_POST['gia'];
        $ngaynhap = $_POST['ngaynhap'];		
		$result1 = mysqli_query($conn,"INSERT INTO category(quantity, name, color)
                                        values ('$soluong','$ten', '$mau')");
        $iddanhmuc = mysqli_insert_id($conn);
		$result2 = mysqli_query($conn, "INSERT INTO provide(caCode, length, dateImport, purPrice, quantity, suCode)
										values ('$iddanhmuc', '$chieudai', '$ngaynhap', '$giamua', '$soluong', '$id')");
	}
	
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm danh mục</title>
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
	<div class="container">
		<div class="row">		
				<div class="col-md-4">
                <?php
                    $sql = mysqli_query($conn, "SELECT name
                                                FROM supplier
                                                WHERE suCode = $id
                                        ");
                    while($row = mysqli_fetch_array($sql)) { ?>
                    <h4>Thêm danh mục cho <?php echo $row['name']?></h4>
                <?php } ?>				 
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên danh mục</label>
					<input type="text" class="form-control" name="ten" placeholder="Tên danh mục"><br>					
					<label>Màu</label>
					<input type="text" class="form-control" name="mau" placeholder="Màu"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" placeholder="Số lượng cuộn"><br>
					<label>Chiều dài</label>
					<input type="text" class="form-control" name="chieudai" placeholder="Chiều dài"><br>
					<label>Giá mua</label>
					<input type="text" class="form-control" name="gia" placeholder="Giá mua"><br>
                    <label>Ngày nhập kho</label>
					<input type="date" class="form-control" name="ngaynhap" placeholder="Ngày nhập kho"><br>
					<input type="submit" name="them" value="Thêm danh mục" class="btn btn-default">
				</form>
				</div>
		</div>
	</div>
	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</body>
</html>