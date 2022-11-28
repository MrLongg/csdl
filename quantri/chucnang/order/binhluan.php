
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
	

    $totalRows=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
    $totalPages=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=blsp&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=blsp&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Orders</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
			<div class="panel-body" style="position: relative;">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Customer Name</th>
                            <th data-sortable="true">Empolyee Name</th>
                            <th data-sortable="true">Order Details</th>
                            <th data-sortable="true">Total</th>
                            <th data-sortable="true">Partial Payment</th>
                            <th data-sortable="true">Arrearage  </th>
                            <th data-sortable="true">Order Status</th>
                            <th data-sortable="true">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  
                            $sql="SELECT * FROM orders LIMIT $perPage,$rowPerPage";
                            $query=mysqli_query($conn,$sql);
                            while($row= mysqli_fetch_array($query)) {
                            $or_Code = $row['orCode'];
                            $sql_order = "SELECT * FROM  customer where  customer.cuCode =  $or_Code ";
                            $query1 =  mysqli_query($conn, $sql_order);
                        ?>
                        <tr>
                            <td data-checkbox="true"><?php echo $row['orCode']; ?></td>
                            <td data-checkbox="true">
                            <?php  
                                while($row_order = mysqli_fetch_array($query1)){
                            ?>
                            <?php
                                echo $row_order['fname'];
                            ?>
                            <?php
                                echo $row_order['lname'];
                            ?>
                             <?php  
                            }
                            ?>
                            </td>
                            
                            <td data-checkbox="true">
                            <?php
                                $sql_em = "SELECT * FROM  customer, employee where customer.cuCode =  $or_Code and customer.offCode = employee.emCode";
                                $query2 =  mysqli_query($conn, $sql_em);
                                while($row_em = mysqli_fetch_array($query2)){
                            ?>
                            <?php echo $row_em['fname']?>
                            <?php echo $row_em['lname']?>
                            <?php  
                            }
                            ?>
                            </td>
                            <td data-checkbox="true">
                                <?php
                                    $sql_order = "SELECT * FROM  bolt, category where bolt.orCode = $or_Code and bolt.caCode = category.caCode";
                                    $query3 = mysqli_query($conn, $sql_order);
                                    while($row_order = mysqli_fetch_array($query3 )){
                                ?>
                                 <?php echo $row_order['name'] ?>
                                 <br>
                                 Length: 
                                 <?php echo $row_order['length'] ?>
                                 <br>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-checkbox="true"><?php echo $row['total'];?> <br>
                                Date: <?php echo $row['time'];?></td> 
                            <td data-checkbox="true">
                                <?php
                                    $sql_partial = "SELECT * FROM customer, cupartialpayments WHERE customer.cuCode =  $or_Code and customer.cuCode = cupartialpayments.cuCode";
                                    $query4 = mysqli_query($conn, $sql_partial);
                                    while($row_partial = mysqli_fetch_array($query4)){
                                ?>
                                Price: <?php echo $row_partial['amount'] ?>
                                <br>
                                Date : <?php echo $row_partial['cuDate'] ?>
                                <br>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-checkbox="true">
                            <?php
                                    $sql_arr = "SELECT * FROM customer WHERE customer.cuCode =  $or_Code ";
                                    $query5 = mysqli_query($conn, $sql_arr);
                                    while($row_arr= mysqli_fetch_array($query5)){
                                ?>
                                Price: <?php echo $row_arr['arrearage'] ?>
                                <?php
                                    }
                                ?>
                            </td>			        
                            <td data-checkbox="true"><?php echo $row['currentStatus'];?>
                            </td> 
                            <td data-checkbox="true"><?php echo $row['reason'];?></td>    
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