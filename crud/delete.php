

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
            $file_id= $_GET['id'];

            $sql = "DELETE FROM `crud` WHERE `id`='$id'";
            $sql1 = "DELETE FROM `table_file` WHERE `file_id`='$id'";
            $result1 = $conn->query($sql1);
             $result = $conn->query($sql);

             if (($result && $result1) == TRUE) {

                echo "Record deleted successfully.";

            }else{

                echo "Error:" . $sql . "<br>" . $conn->error;

            }
            header('Location:view1.php');

        } 


?>