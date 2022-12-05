
<?php
	if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $rowPerPage=5;
    $perPage=$page*$rowPerPage-$rowPerPage;

	$totalRows=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM supplier"));
    $totalPages=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=supplier&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=supplier&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Supplier</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themquangcao" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Add Supplier</a>			
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Name</th>
                            <th data-sortable="true">Category Name</th>
                            <th data-sortable="true">Address</th>
                            <th data-sortable="true">Bank_Account</th>
                            <th data-sortable="true">Tax_Code</th>
                            <th data-sortable="true">Phone</th>
                            <th data-sortable="true">Employee Name</th>
                            <th data-sortable="true">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            	$sql="SELECT * FROM supplier LIMIT $perPage,$rowPerPage";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_array($query)){ 
                                $su_Code = $row['suCode'];
                                $sql_suPhone = "SELECT * FROM suphonenumber Where suCode = $su_Code";
                                $query1 = mysqli_query($conn, $sql_suPhone);
                            
                           
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['suCode']; ?></td>
                            <td data-checkbox="true"><?php echo $row['name']; ?></td>
                            <td data-checkbox="true">
                                <?php
                                    $sql_category = "SELECT * FROM  category, provide where suCode = $su_Code and category.caCode = provide.caCode and provide.suCode = $su_Code";
                                    $query3 = mysqli_query($conn, $sql_category);
                                    while($row_category = mysqli_fetch_array($query3 )){
                                ?>
                                 <?php echo $row_category['name'] ?>
                                 <br>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-checkbox="true"><?php echo $row['address']; ?></td>
                            <td data-checkbox="true"><?php echo $row['bankAccount']; ?></td>
                            <td data-checkbox="true"><?php echo $row['taxCode']; ?></td>
                            <td data-checkbox="true">
                                <?php 
                                    while($row_Phone = mysqli_fetch_array($query1)){ 
                                    echo $row_Phone['suPhone'] 
                                ?>
                                <br>
                                <?php 
                                     }
                                ?>
                                </td>
                                <td data-checkbox="true">
                                <?php
                                    $sql_employee = "SELECT * FROM supplier, employee where suCode = $su_Code and supplier.paCode = employee.emCode";
                                    $query2 = mysqli_query($conn, $sql_employee);
                                    while($row_employee = mysqli_fetch_array($query2)){          
                                ?>
                                    <?php echo $row_employee['fname'] ?>
                                    <?php echo $row_employee['lname'] ?>
                                    <?php 
                                     }
                                ?>
                                </td>
                                <td data-checkbox="true"><a href="quantri.php?page_layout=detail&id=<?php echo $row['suCode']?>">Detail</a></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </tbody>
                </table>
				<ul class="pagination" style="float: right;">
                    <?php  
                        echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	