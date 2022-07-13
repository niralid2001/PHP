<?php

    $connect=mysqli_connect("localhost","root","","db");
    
	$query = "select * from category where catid='" . $_GET["userid"] . "'";
	$records= mysqli_query($connect,$query);
	$data = mysqli_fetch_array($records);
                                       
	
    if(isset($_POST['submit']))
    {
        $cname =$_POST['catname'];
      
        $sql = "update category set catname='$cname' where catid='" . $_GET["userid"] . "'";
        if (mysqli_query($connect, $sql)) 
        {
            //echo "<script>alert('Your Category UPDATED successfully !');</script>";
			header("Location: category.php");
        } 
        else 
        {
            echo "Error: " . $sql . "" . mysqli_error($connect);
        }       
    }
?>
 <!-- /. NAV SIDE  -->
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
                            <form method="post">
                            <div class="panel-body">
                                <input type="text" value="<?php echo $data['catname']; ?>" name="catname" class="form-control" placeholder="Add Category" />
                            </div>
                            <div class="panel-footer">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary"> 
                            </div> 
							
                            </form>                     
                        </div>
                    </div>
             
        </div>