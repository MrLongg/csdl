
<?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $rowPerPage=5;
    $perPage=$page*$rowPerPage-$rowPerPage;
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM category"));
    $totalPage=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPage;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
        }else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Categories</h1>
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
                            <th data-sortable="true">Category Name</th>
                            <th data-sortable="true">Bolt</th>
                            <th data-sortable="true">Color</th>
                            <th data-sortable="true">Supplier Name</th>
                            <th data-sortable="true">Purchase Price</th>
                            <th data-sortable="true">Current Price</th>
                            <th data-sortable="true">Quantity</th>
                            <th data-sortable="true">Quantity Warehouse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $sql="SELECT * FROM category ORDER BY caCode ASC LIMIT $perPage,$rowPerPage";
                            $query = mysqli_query($conn,$sql);
                            while($row= mysqli_fetch_array($query)) {
                                $ca_Code = $row['caCode'];
                        ?>
                        <tr>
                            <td data-checkbox="true"><?php echo $row['caCode']; ?></td>
                            <td data-checkbox="true"><?php echo $row['name']; ?></td>	
                            <td data-checkbox="true">
                                
                                <?php
                                    $sql_bolt = "SELECT * FROM bolt WHERE bolt.caCode =  $ca_Code";
                                    $query1 = mysqli_query($conn, $sql_bolt);  
                                    while($row_bolt = mysqli_fetch_array($query1)) {
                                        
                                ?>
                                Length :
                                <?php 
                                      
                                      echo $row_bolt ['length']; 
                                ?>
                            <br>
                                <?php
                                    }
                                ?>
                            </td>                            
                            <td data-checkbox="true"><?php echo $row['color']; ?></td>	
                            <td data-checkbox="true">
                                <?php
                                    $sql_sup = "SELECT * FROM provide, supplier where provide.caCode = $ca_Code and provide.suCode = supplier.suCode ";
                                    $query4 = mysqli_query($conn, $sql_sup);
                                    while($row_sup = mysqli_fetch_array($query4)){
                                ?>
                                 <?php echo $row_sup['name'] ?>
                                 <br>
                                <?php
                                    }
                                ?>
                            </td>
                            </td>
                            <td data-checkbox="true">
                            <?php
                                    $sql_puPrice = "SELECT * FROM  provide where $ca_Code = provide.caCode";
                                    $query3 = mysqli_query($conn,  $sql_puPrice);
                                    while($row_puPrice =  mysqli_fetch_array($query3))
                                    {
                                ?>
                                <?php echo $row_puPrice['purPrice'] ?>
                                <br>
                                Date : <?php echo $row_puPrice['dateImport'] ?>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-checkbox="true">
                                <?php
                                    $sql_cuPrice = "SELECT * FROM  cacurrentprices where $ca_Code = cacurrentprices.caCode";
                                    $query2 = mysqli_query($conn,  $sql_cuPrice);
                                    while($row_cuPrice =  mysqli_fetch_array($query2))
                                    {
                                ?>
                                <?php echo $row_cuPrice['caPrice'] ?>
                                <br>
                                Date : <?php echo $row_cuPrice['caDate'] ?>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-checkbox="true"><?php echo $row['quantity'];?></td>
                            <?php
                                    $sql_quantity = "SELECT * FROM  provide where $ca_Code = provide.caCode";
                                    $query5 = mysqli_query($conn,  $sql_puPrice);
                                    while($row_quanti =  mysqli_fetch_array($query5))
                                    {
                                ?>	
                            <td data-checkbox="true"><?php echo $row_quanti['quantity'];?>
                                <?php
                                    }
                                ?>
                            </td>				        
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
