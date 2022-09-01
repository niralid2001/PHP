<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}

            $conn=mysqli_connect('localhost','root','','db');
            $log_id = $_SESSION['user']['log_id'];
            $admintype = $_SESSION['user']['admintype'];
            if($admintype == "superadmin")
            {
                $sql="SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id ";
            }
            else
            {
                $sql = "SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id WHERE log_id = '$log_id' "; 
            }
            $result = $conn->query($sql);
            $arr_users = [];
            if ($result->num_rows > 0) 
            {
                    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
            }        
?>
<!-- ajax code -->
    <script src="http://localhost/PHP-Training/crud/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
// ajax script for getting state data
$(document).ready(function(){
   $('#age').on('change', function(){
      var age = $(this).val();
      if(age){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'age':age},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      }else{
          $('#gender').html('<option value="">gender</option>');
          // $('#hobbies').html('<option value=""> hobbies </option>');
          // $('#city').html('<option value=""> city </option>') 
      }
  });
});
  </script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <table id="tblUser">
            <thead>
                
                <th>id</th>
                <th>log_id</th>
                <th>name</th>
                <th>age<br>
                    <!-- Dynamic dropdown -->
                    <?php
                    $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query=mysqli_query($conn,"SELECT distinct age FROM crud ");
                    }
                    else
                    {
                        $query=mysqli_query($conn,"SELECT distinct age FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount=mysqli_num_rows($query); 
                    ?>
                    <select name="age" id="age">
                        <option disabled selected value="-1">choose age for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount;$i++)
                            {
                                $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row["age"]; ?>"><?php echo $row["age"]; ?></option>
                        <?php 
                            }
                        ?>
                    </select></th>
                <th>gender <br>
                   <?php
                   $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query1=mysqli_query($conn,"SELECT distinct gender FROM crud ");
                    }
                    else
                    {
                        $query1=mysqli_query($conn,"SELECT distinct gender FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount1=mysqli_num_rows($query1); 
                    ?>
                    <select name="gender" id="gender">
                        <option disabled selected value="-1">choose gender for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount1;$i++)
                            {
                                $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row1["gender"]; ?>"><?php echo $row1["gender"]; ?></option>
                        <?php 
                            }
                        ?>
                               </select></th>
                <th>hobbies<br>
                   <?php
                    $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query2=mysqli_query($conn,"SELECT distinct hobbies FROM crud ");
                    }
                    else
                    {
                        $query2=mysqli_query($conn,"SELECT distinct hobbies FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount2=mysqli_num_rows($query2); 
                    ?>
                    <select name="hobbies" id="hobbies">
                        <option disabled selected value="-1">choose hobbies for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount2;$i++)
                            {
                                $row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row2["hobbies"]; ?>"><?php echo $row2["hobbies"]; ?></option>
                        <?php 
                            }
                        ?>
                               </select></th>
                <th>city <br>
                   <?php
                    $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query3=mysqli_query($conn,"SELECT distinct city FROM crud ");
                    }
                    else
                    {
                        $query3=mysqli_query($conn,"SELECT distinct city FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount3=mysqli_num_rows($query3); 
                    ?>
                    <select name="city" id="city">
                        <option disabled selected value="-1">choose city for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount3;$i++)
                            {
                                $row3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row3["city"]; ?>"><?php echo $row3["city"]; ?></option>
                        <?php 
                            }
                        ?>
                            </select></th>
                <th>file</th>
                <th align="center"> action </th>
            </thead>
            <tbody align="center">
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['log_id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['age']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['hobbies']; ?></td>
                            <td><?php echo $user['city']; ?></td>
                             <td>
                                   <?php  $images=explode(',',$user["file"]); 
                                      foreach($images as $image) {
                                   ?>
                                  <img src="<?php echo 'photo/'.$image; ?>" width="100" />
                                  <?php } ?>
                             </td>
                             <td>
                                <a href="update.php?id=<?php echo $user["id"]; ?>">Update</a>&nbsp;&nbsp;
                                <a href="delete.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                    
                <?php } ?>  
                <a href="logout.php"><font size="6">logout</font></a><br><br>
                    <center><a href="crud.php"><font size="4">Add new data </font></a>     
                     <form method="post" action="search.php">
                        <input type="text" name="text" placeholder="Search by id">
                        <button type="submit" name="search" id="search">Search</button>
                    </form> </center>                                            
            </tbody>
        </table>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
        jQuery(document).ready(function($) {     
            $('#tblUser').DataTable();
        } );
        </script>
