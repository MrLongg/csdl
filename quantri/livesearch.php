<?php
     include_once'./ketnoi.php';
     if(isset($_POST['input'])){

        $input = $_POST['input'];

        $query = "SELECT * From  supplier Where name like '%{$input}%'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {?>
        <div>
            <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>						        
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Address</th>
                            <th>Bank_Account</th>
                            <th>Tax_Code</th>
                            <th>Phone</th>
                            <th >Employee Name</th>
                            <th >Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                while($row = mysqli_fetch_array($result)){
                                $id = $row['suCode'];
                                $name = $row['name'];
                                $address = $row['address'];
                                $bankAccount = $row['bankAccount'];
                                $taxCode = $row['taxCode'];
                                }
                        ?>
                        <tr style="height: 300px;">
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td>
                                <?php
                                      $sql_category = "SELECT * FROM  category, provide where suCode = $id and category.caCode = provide.caCode and provide.suCode = $id";
                                      $query3 = mysqli_query($conn, $sql_category);
                                      while($row_category = mysqli_fetch_array($query3 )){
                                          $name_cate = $row_category['name'];
                                      
                                ?>
                                <?php echo $name_cate?>
                                <br>
                                <?php
                                      }
                                ?>
                            </td>
                            <td><?php echo $address ?></td>
                            <td><?php echo $bankAccount ?></td>
                            <td><?php echo $taxCode ?></td>
                            <td>
                            <?php
                                      $sql_suPhone = "SELECT * FROM suphonenumber Where suCode = $id";
                                      $query1 = mysqli_query($conn, $sql_suPhone);
                                      while($row_suPhone = mysqli_fetch_array($query1 )){
                                          $suPhone = $row_suPhone['suPhone'];
                                      
                                ?>
                                <?php echo  $suPhone?>
                                <br>
                                <?php
                                      }
                                ?>
                            </td>
                            <td data-checkbox="true">
                                <?php
                                    $sql_employee = "SELECT * FROM supplier, employee where suCode = $id and supplier.paCode = employee.emCode";
                                    $query2 = mysqli_query($conn, $sql_employee);
                                    while($row_employee = mysqli_fetch_array($query2)){ 
                                        $fname = $row_employee['fname'];
                                        $lname = $row_employee['lname'];  
                                ?>
                                    <?php echo $fname ?>
                                    <?php echo $lname ?>
                                    <?php 
                                     }
                                ?>
                                </td>
                                <td data-checkbox="true"><a href="quantri.php?page_layout=detail&id=<?php echo $id?>">Detail</a></td>
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