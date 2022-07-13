<?php
    $connect=mysqli_connect("localhost","root","","db");
    if(isset($_POST['submit']))
    {
        

        $cat =$_POST['category'];
        $pnm =$_POST['proname'];
        $price =$_POST['proprice'];
        $pdesc =$_POST['prodesc'];
              
        $path="upload/".$_FILES["proimg"]["name"];
        move_uploaded_file($_FILES["proimg"]["tmp_name"],"../".$path);

        $query = "INSERT INTO product (catid,proname,proprice,prodesc,proimg) VALUES ('$cat','$pnm','$price','$pdesc','$path')";
        if (mysqli_query($connect, $query)) 
        {
            echo "<script>alert('Your Product added successfully !');</script>";
        } 
        else 
        {
            echo "Error: " . $query . "" . mysqli_error($connect);
        }
    }
?>
 <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
                    <div class="col-md-12">
                     <h2>PRODUCT Details </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <div class="row">
                    <div class="col-lg-6 col-md-6">      
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Add Your Product here!...
                            </div>
                            <form method="post" enctype="multipart/form-data">
                            <div class="panel-body">         
                                <select name="category" class="form-control" required>
                                    <?php
                                    $sql1="select * from category";
                                    $all_categories=mysqli_query($connect,$sql1);
                                     while ($category = mysqli_fetch_array(
                                                $all_categories,MYSQLI_ASSOC)):;
                                                
                                    ?>
                                    
                                    <option value="<?php echo $category["catid"];?>">
                                      <?php echo $category["catname"];
                                        ?>
                                    </option>
                                    <?php 
                                        endwhile;
                                    ?>
                                </select>
                                <br/>
                                <input type="text" name="proname" class="form-control" placeholder="Product Name" />
                                <br>
                                <input type="text" name="proprice" class="form-control" placeholder="Price" />
                                <br>
                                <input type="text" name="prodesc" class="form-control" placeholder="Description" />
                                <br>
                                <input type="file" name="proimg" class="form-control" placeholder="Select Image" />
                            </div>
                            <div class="panel-footer">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary"> 
                            </div>
                            </form>                     
                        </div>
                    </div>
            
        </div>

<!-- _____________________________________________Display_Product____________________________________________________ -->

 <center>  <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
                    <div class="col-md-12">
                     <h2>DISPLAY PRODUCT PAGE </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5>Product Details here !....</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ProId</th>
                                    <th>CatName</th>
                                    <th>ProName</th>
                                     <th>ProPrice</th>
                                    <th>PrpDesc</th>
                                    <th>proImage</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $connect=mysqli_connect("localhost","root","","db");
                                $query = "select * from  product";
                                $records= mysqli_query($connect,$query);
         
                               
                                    while($data = mysqli_fetch_array($records))
                                        {
                                    ?>
                                      <tr>
                                        <td><?php echo $data['proid']; ?></td>
                                        <td><?php echo $data['catid']; ?></td>
                                        <td><?php echo $data['proname']; ?></td>
                                        <td><?php echo $data['proprice']; ?></td>
                                        <td><?php echo $data['prodesc']; ?></td>
                                        <?php echo "<td><img src='../".$data['proimg']." 'height=50px width=50px> </td>"; ?>
                                        
                                        <td><a href="delete_product.php?userid=<?php echo $data["proid"]; ?>">Delete</a></td>
                                        <td><a href="edit_product.php?userid=<?php echo $data["proid"]; ?>">edit</a></td>
                                      </tr> 
                                    <?php
                                    
                                        }
                                    ?>
                            </tbody>
                        </table>

                    </div>
    
        </div></center> 