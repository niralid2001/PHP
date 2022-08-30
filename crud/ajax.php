
<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location:login.php');
    }
    $conn=mysqli_connect('localhost','root','','db');
    $id=$_POST['id'];
    if(!empty($_POST['age']))
    {
        $query="SELECT gender FROM crud where id=".$_POST['id']." ";
        $result=$db->query($query);

        if($result->num_rows > 0)
        {
           echo '<option value="">gender</option>'; 
           while($row=$result->fetch_assoc())
           {
            echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';
           }
        }
                    
    }
?>