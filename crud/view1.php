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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <table id="tblUser">
            <thead>
                
                <th>id</th>
                <th>log_id</th>
                <th>name</th>
                <th>age</th>
                <th>gender <br><select name="gender" >
                                    <option disabled selected value="-1">choose gender for record</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                               </select></th>
                <th>hobbies</th>
                <th>city <br><select name="city">
                                    <option disabled selected value="-1">choose city for record</option>
                                    <option value="rajkot">Rajkot</option>
                                    <option value="surat">Surat</option>
                                    <option value="ahemdabad">Ahemdabad</option>
                                    <option value="vadodra">Vadodra</option>
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
                        <button type="submit" name="search" >Search</button>
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
