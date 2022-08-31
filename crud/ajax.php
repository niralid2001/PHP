
<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location:login.php');
    }
    $conn=mysqli_connect('localhost','root','','db');
    if(!empty($_POST['age']))
    {
        $query="SELECT * FROM crud where age=".$_POST['age']." ";
        $result=$conn->query($query);

        if($result->num_rows > 0)
        {
           $arr_users = $result->fetch_all(MYSQLI_ASSOC);
        }
                    
    }
?>