<?php
 $connect=mysqli_connect("localhost","root","","db");
    
	$qry = "select * from product where proid='" . $_REQUEST["userid"] . "'";
	$records= mysqli_query($connect,$qry);
	$data = mysqli_fetch_array($records);
                                       
	
    if(isset($_POST['submit']))
    {
       
		$cat =$_POST['category'];
        $pnm =$_POST['proname'];
        $price =$_POST['proprice'];
        $pdesc =$_POST['prodesc'];
		

        if($_FILES["proimg"]["name"]=="")
            $path=$_REQUEST["old_img"];
        else
        {
            $path="images/".$_FILES["proimg"]["name"];
            move_uploaded_file($_FILES["proimg"]["tmp_name"],"../".$path);
            unlink("../".$_REQUEST["old_img"]);
        }
		
        $sql ="update product set catid='$cat',proname='$pnm',proprice='$price',prodesc='$pdesc',proimg='$path' where proid='" . $_REQUEST["userid"] . "'";
        
        if (mysqli_query($connect, $sql)) 
        {
            echo "<script>window.location='product.php';</script>";
        } 
        else 
        {
            echo "Error: " . $sql . "" . mysqli_error($connect);
        } 
    }
    ?>

     <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
                    <div class="col-md-12">
                     <h2>CATEGORY Details </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <div class="row">
                    <div class="col-lg-6 col-md-6">      
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Update Your Category here!...
                            </div>
                            <form method="post" 
                                enctype="multipart/form-data">
                            <div class="panel-body">
                                
                                <select name="category" class="form-control" required>
                                    <?php
                                    $sql1="select * from category";
                                    $all_categories=mysqli_query($connect,$sql1);
                                     while ($category = mysqli_fetch_array(
                                                $all_categories)):; 
                                    ?>
                                    
                                    <option <?php if($data[1]==$category[0])
                                        echo "selected"; ?> value="<?php echo $category[0]; ?>"><?php echo $category[1]; ?></option>

                                    <?php
                                         endwhile; 
                                    ?>
                                </select>

                                <br>
                                <input type="text" value="<?php echo $data['proname']; ?>" name="proname" class="form-control" placeholder="Product Name" />
                                <br>
                                <input type="text" value="<?php echo $data['proprice']; ?>" name="proprice" class="form-control" placeholder="Price" />
                                <br>
                                <input type="text" value="<?php echo $data['prodesc']; ?>" name="prodesc" class="form-control" placeholder="Description" />
                                <br>
                                <img src="../<?php echo $data["proimg"]; ?>" height="100" width="100">

                                <input type="file" name="proimg" class="form-control" placeholder="Select Image" />

                                <input type="text" name="old_img" 
                                        value="<?php echo $data['proimg']; ?>">
                                <input type="text" name="proid" 
                                        value="<?php echo $data['proid']; ?>">   
                            </div>
                            <div class="panel-footer">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary"> 
                            </div> 
                            
                            </form>                     
                        </div>
                    </div>
             
        </div>