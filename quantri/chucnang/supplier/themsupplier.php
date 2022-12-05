<?php  
    $sqlps="SELECT *
            FROM partnerstaff, employee
            WHERE partnerstaff.paCode = employee.emCode";
    $queryps= mysqli_query($conn, $sqlps);
    if(isset($_POST['them']))
    {
        $ten=$_POST['ten'];
        $taikhoan=$_POST['taikhoan'];
        $diachi=$_POST['diachi'];
        $mathue=$_POST['mathue'];
        $sdt1=$_POST['sdt1'];
        $sdt2=$_POST['sdt2'];
        $sdt3=$_POST['sdt3'];
        $manv=$_POST['manv'];
        $result = mysqli_query($conn, "ALTER table supplier AUTO_INCREMENT 1");
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
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add New Supplier</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Supplier</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên supplier</label>
                            <input type="text" class="form-control" name="ten" required="">
                        </div>
                        <div class="form-group">
                            <label>Số tài khoản ngân hàng</label>
                            <input type="text" class="form-control" name="taikhoan" required="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" required="">
                        </div>
                        <div class="form-group">
                            <label>Mã số thuế</label>
                            <input type="text" class="form-control" name="mathue" required="">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại 1</label>
                            <input type="text" class="form-control" name="sdt1" required="">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại 2</label>
                            <input type="text" class="form-control" name="sdt2">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại 3</label>
                            <input type="text" class="form-control" name="sdt3">
                        </div>
                        <div class="form-group">
                            <label>Mã nhân viên phụ trách</label>
                            <select name="manv" class="form-control">
                                <option value="unselect" selected>Lựa chọn nhân viên phụ trách</option>
                                <?php
                                    while($row= mysqli_fetch_array($queryps)){
                                ?>
                                <option value="<?php echo $row['paCode']; ?>"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="them">Thêm mới</button>
                    <!-- <button type="reset" class="btn btn-default" name="reset">Làm mới</button> -->
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
