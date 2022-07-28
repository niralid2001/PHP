<?Php
session_start();
if(isset($_SESSION["user"]))
{ 
        $conn=mysqli_connect('localhost','root','','db');
        $id=$_GET['id'];
        if(!is_numeric($id))
        {
            echo "Data Error";
            exit;
        }




        //$count="SELECT *  FROM crud where id=?";
        if (isset($_GET['record'])) 
        {

            $id = $_GET['id']; 

            $sql = "SELECT * FROM `crud` WHERE `id`='$id'";

            $result = $conn->query($sql); 

            if ($result->num_rows > 0) 
            {        

                while ($row = $result->fetch_assoc())
                 {

                    $name = $row['name'];

                    $age = $row['age'];     
                    $gender = $row['gender'];
                    $hobbies = $row['hobbies'];
                    $city = $row['city'];
                    $file_name = $row['file'];
                    $id = $row['id'];
                    //$hobbies = explode(",",$hobbies);

                } 
            }

         }
}
 ?> 