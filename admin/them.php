<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['them']))
    {
		$ten = $_POST['ten'];
		$taikhoan = $_POST['taikhoan'];
        $diachi = $_POST['diachi'];
		$mathue = $_POST['mathue'];
        $sdt1 = $_POST['sdt1'];
        $sdt2 = $_POST['sdt2'];
        $sdt3 = $_POST['sdt3'];
        $manv = $_POST['manv'];
		$result1 = mysqli_query($conn,"INSERT INTO supplier(bankAccount, name, address, taxCode, paCode)
                                        values ('$taikhoan','$ten', '$diachi', '$mathue', '$manv')");
		$id = mysqli_insert_id($conn);
		if(!empty($sdt1) && !empty($sdt2) && !empty($sdt3))
		{
			$result2 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt1')");
			$result3 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt2')");
			$result4 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt3')");
		}
		if(!empty($sdt1) && !empty($sdt2) && empty($sdt3))
		{
			$result5 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt1')");
			$result6 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt2')");
		}
		if(!empty($sdt1) && empty($sdt2) && empty($sdt3))
		{
			$result7 = mysqli_query($conn, "INSERT INTO suphonenumber(suCode, suPhone)
											values ('$id', '$sdt1')");
		}
	}
	
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm nhà cung cấp</title>
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
				<h4>Thêm nhà cung cấp</h4>				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên nhà cung cấp</label>
					<input type="text" class="form-control" name="ten" placeholder="Tên nhà cung cấp"><br>					
					<label>Số tài khoản ngân hàng</label>
					<input type="text" class="form-control" name="taikhoan" placeholder="Số tài khoản ngân hàng"><br>
					<label>Địa chỉ</label>
					<input type="text" class="form-control" name="diachi" placeholder="Địa chỉ"><br>
					<label>Mã số thuế</label>
					<input type="text" class="form-control" name="mathue" placeholder="Mã số thuế"><br>
					<label>Số điện thoại 1</label>
					<input type="text" class="form-control" name="sdt1" placeholder="Số điện thoại 1"><br>
                    <label>Số điện thoại 2</label>
					<input type="text" class="form-control" name="sdt2" placeholder="Số điện thoại 2"><br>
                    <label>Số điện thoại 3</label>
					<input type="text" class="form-control" name="sdt3" placeholder="Số điện thoại 3"><br>
					<label>Mã nhân viên phụ trách</label>
					<input type="text" class="form-control" name="manv" placeholder="Mã nhân viên phụ trách"><br>
					<input type="submit" name="them" value="Thêm nhà cung cấp" class="btn btn-default">
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