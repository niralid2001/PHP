
<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location:login.php');
    }
    $conn=mysqli_connect('localhost','root','','db');
    $query="SELECT * FROM crud where 1=1";
    if(!empty($_POST['age']))
    {
        $query.=" AND age='".$_POST['age']."'";
    }
    if(!empty($_POST['gender']))
    {
        $query.=" AND gender='".$_POST['gender']."'";
    }
    if(!empty($_POST['hobbies']))
    {
        $query.=" OR hobbies='".$_POST['hobbies']."'";
        for($i=1;$i<=$query;$i++)
        {
             echo $_POST['hobbies']; 
        }

    }
    if(!empty($_POST['city']))
    {
        $query.=" AND city='".$_POST['city']."'";
    }

    $result=$conn->query($query);
    if($result->num_rows > 0)
    {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
    else
    {
        $arr_users = array();
    }
?>
<?php 
if(!empty($arr_users)) { ?>
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