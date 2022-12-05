<?php
     include_once'./ketnoi.php';
     if(isset($_POST['input'])){

        $input = $_POST['input'];

        $query = "SELECT * From  category Where name like '%{$input}%'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {?>
        <div>
            <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>						        
                            <th>ID</th>
                            <th>Category</th>
                            <th>Bolt</th>
                            <th>Color</th>
                            <th>Supplier Name</th>
                            <th>Phone Supplier</th>
                            <th>Purchase Price</th>
                            <th >Current Price</th>
                            <th >Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                while($row = mysqli_fetch_array($result)){
                                $id = $row['caCode'];
                                $name = $row['name'];
                                $color = $row['color'];
                                $quantity = $row['quantity'];
                                }
                        ?>
                        <tr style="height: 300px;">
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td>
                                <?php
                                      $sql_category = "SELECT * FROM  bolt where bolt.caCode = $id";
                                      $query3 = mysqli_query($conn, $sql_category);
                                      while($row_category = mysqli_fetch_array($query3 )){
                                          $name_cate = $row_category['length'];
                                      
                                ?>
                                Length :
                                <?php echo $name_cate?>
                                <br>
                                <?php
                                      }
                                ?>
                            </td>
                            <td><?php echo $color ?></td>
                            <td>
                            <?php
                                    $sql_sup = "SELECT * FROM provide, supplier where provide.caCode = $id and provide.suCode = supplier.suCode ";
                                    $query2 = mysqli_query($conn, $sql_sup);
                                    while($row_sup = mysqli_fetch_array($query2)){
                                    $suCode = $row_sup['suCode'];
                                ?>
                                 <?php echo $row_sup['name'] ?>
                                 <br>
                            <?php
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                    $sql_suPhone = "SELECT * FROM suphonenumber WHERE suphonenumber.suCode = $suCode";
                                    $query3  = mysqli_query($conn, $sql_suPhone);
                                    while($row_suphone = mysqli_fetch_array($query3)){
                                ?> 
                                 <?php echo $row_suphone['suPhone'] ?>
                                 <br>
                                 <?php
                                    }
                                ?>  
                            </td>
                            <td>
                            <?php
                                    $sql_puPrice = "SELECT * FROM  provide where $id = provide.caCode";
                                    $query4 = mysqli_query($conn,  $sql_puPrice);
                                    while($row_puPrice =  mysqli_fetch_array($query4))
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
                                    $sql_cuPrice = "SELECT * FROM  cacurrentprices where $id = cacurrentprices.caCode";
                                    $query5 = mysqli_query($conn,  $sql_cuPrice);
                                    while($row_cuPrice =  mysqli_fetch_array($query5))
                                    {
                                ?>
                                <?php echo $row_cuPrice['caPrice'] ?>
                                <br>
                                Date : <?php echo $row_cuPrice['caDate'] ?>
                                <?php
                                    }
                                ?>
                            </td>
                            <td data-sortable="true">
                                <?php echo  $quantity ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>    
        <?php

        }
        else{
            echo "<h6 class = 'text-danger text-center mt-3'>No data Found </h6>";
        }
     }
?>