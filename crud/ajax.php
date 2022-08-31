
<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location:login.php');
    }
    $conn=mysqli_connect('localhost','root','','db');
    if(!empty($_POST['age']))
    {
        $_SESSION["user"]["log_id"];
        $query="SELECT * FROM crud where age=".$_POST['age']." ";
        $result=$conn->query($query);

        if($result->num_rows > 0)
        {
           $arr_users = $result->fetch_all(MYSQLI_ASSOC);
        }
                    
    }
?>
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