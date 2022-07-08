<?Php
require "db.php";

$id=$_GET['id'];
if(!is_numeric($id)){
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

// if($stmt = $connection->prepare($count)){
//   $stmt->bind_param('i',$id);
//   $stmt->execute();

//  $result = $stmt->get_result();
//  echo "No of records : ".$result->num_rows."<br>";
//  $row=$result->fetch_object();
//  echo "<table>";
// echo "<tr ><td><b>Name</b></td><td>$row->name</td></tr>
// <tr><td><b>Class</b></td><td>$row->class</td></tr>
// <tr ><td><b>Mark</b></td><td>$row->mark</td></tr>
// <tr><td><b>Address</b></td><td>$row->address</td></tr>
// <tr ><td><b>Image</b></td><td>$row->img</td></tr>
// ";
// echo "</table>";
// }else{
// echo $connection->error;
// }
    }
 ?> 