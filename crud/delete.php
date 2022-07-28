

<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}      
        $conn=mysqli_connect('localhost','root','','db'); 

        if (isset($_GET['id'])) 
        {

            $id = $_GET['id'];

            $sql = "DELETE FROM `crud` WHERE `id`='$id'";

             $result = $conn->query($sql);

             if ($result == TRUE) {

                echo "Record deleted successfully.";

            }else{

                echo "Error:" . $sql . "<br>" . $conn->error;

            }
            header('Location:view1.php');

        } 


?>