<!-- _____________________________________________Add Category_____________________________________________    -->
 <?php

    $connect=mysqli_connect("localhost","root","","db");
    
    if(isset($_POST['submit']))
    {
        $catname =$_POST['catname'];
      
        $query = "INSERT INTO category (catname) VALUES ('$catname')";
        if (mysqli_query($connect, $query)) 
        {
            echo "<script>alert('Your Category added successfully !');</script>";
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
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CATEGORY Details </h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Add Your Category here!...
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post">
                        <tr>
                            <td><input type="text" name="catname" placeholder="Add Category" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
                        </tr>
                    </form>
                     </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<!-- _____________________display_Category_______________________________________________________________ -->

<center> <div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
                    <div class="col-md-12">
                     <h2>Display category Details</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5>Display category  here !....</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>catid</th>
                                    <th>catname</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $connect=mysqli_connect("localhost","root","","db");
                                $query = "select * from category";
                                $records= mysqli_query($connect,$query);
         
                               
                                    while($data = mysqli_fetch_array($records))
                                        {
                                ?> 
                                      <tr>
                                        <td><?php echo $data['catid']; ?></td>
                                        <td><?php echo $data['catname']; ?></td>
                                       
                                        <td><a href="delete_category.php?userid=<?php echo $data["catid"]; ?>">Delete</a></td>
                                        <td><a href="edit_category.php?userid=<?php echo $data["catid"]; ?>">edit</a></td>
                                      </tr> 
                                    <?php 
                                    
                                        }
                                    ?>
                            </tbody>
                        </table>

                    </div>
        </div></center>

