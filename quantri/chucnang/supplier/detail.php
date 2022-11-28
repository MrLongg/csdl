<?php
    $id = $_GET['id'];
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
            $listPage.='<li class="active"><a href="quantri.php?page_layout=detail&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=detail&page='.$i.'">'.$i.'</a></li>';
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
        <?php
        $result = mysqli_query($conn,"SELECT name
                                      FROM supplier
                                      WHERE suCode = $id    
                                        ");
        while($row = mysqli_fetch_array($result)) { ?>
        <h1 class="page-header">Detail for supplier <?php echo $row['name']?></h1>
        <?php } ?>	
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">Name</th>
                            <th data-sortable="true">Length</th>
                            <th data-sortable="true">Quantity</th>
                            <th data-sortable="true">Color</th>
                            <th data-sortable="true">Purchase Price</th>
                            <th data-sortable="true">Sell Price</th>
                            <th data-sortable="true">Date Import</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = mysqli_query($conn, "SELECT *
                                                    FROM provide, category, cacurrentprices
                                                    WHERE provide.suCode = $id AND category.caCode = provide.caCode AND category.caCode = cacurrentprices.caCode
                                                    LIMIT $perPage,$rowPerPage
                                            ");
                        while($row = mysqli_fetch_array($sql)) { ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['name']; ?></td>
                            <td data-checkbox="true"><?php echo $row['length']; ?></td>
                            <td data-checkbox="true"><?php echo $row['quantity']; ?></td>
                            <td data-checkbox="true"><?php echo $row['color']; ?></td>
                            <td data-checkbox="true"><?php echo $row['purPrice']; ?></td>
                            <td data-checkbox="true"><?php echo $row['caPrice']; ?></td>
                            <td data-checkbox="true"><?php echo date('d-m-Y', strtotime($row['dateImport'])) ?></td>
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