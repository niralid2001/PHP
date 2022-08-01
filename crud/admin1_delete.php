

<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}      
        $conn=mysqli_connect('localhost','root','','db'); 

        if (isset($_GET['admin1_id'])) 
        {

            $id = $_GET['admin1_id'];

            $sql = "DELETE FROM `admin1` WHERE `admin1_id`='$id'";

             $result = $conn->query($sql);

             if ($result == TRUE) {

                echo "Record deleted successfully.";

            }else{

                echo "Error:" . $sql . "<br>" . $conn->error;

            }
            header('Location:admin1_view.php');

        } 


?>