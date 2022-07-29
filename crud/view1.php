<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
        $conn=mysqli_connect('localhost','root','','db');
         
        $sql = "SELECT id,name,age,gender,hobbies,city,file FROM crud ";
        $result = $conn->query($sql);
        $arr_users = [];
        if ($result->num_rows > 0) {
            $arr_users = $result->fetch_all(MYSQLI_ASSOC);
        }
        ?>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <table id="tblUser">
            <thead>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>gender</th>
                <th>hobbies</th>
                <th>city</th>
                <th>file</th>
                <th align="center"> action </th>
            </thead>
            <tbody>
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
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
                                <a href="delete.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Are yosure?')">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                    <a href="logout.php"><font size="6">logout</font></a><br><br>
                    <center><a href="crud.php"><font size="4">Add new data </font></a></center>
                <?php } ?>       
                            
            </tbody>
        </table>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
        jQuery(document).ready(function($) {
            $('#tblUser').DataTable();
        } );
        </script>
