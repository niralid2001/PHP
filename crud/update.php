<?php 

include_once'db.php';

    if (isset($_POST['update'])) 
    {
       

        $id = $_POST['id'];
        $name = $_POST['nm'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $hobbies = $_POST['hobbies'];
        $city = $_POST['city'];
        $file_name=$_FILES['file']['name'];
        //$file_name=$file_name. time();
        $tmp_name=$_FILES['file']['tmp_name'];
        $hobbies=implode(",", $hobbies);
        // $chk="";  
        // foreach($hobbies as $chk1)  
        // {  
        // $chk .= $chk1.",";  
        // }  

       $sql = "UPDATE `crud` SET `name`='$name',`age`='$age',`gender`='$gender',`hobbies`='$hobbies',`city`='$city', `file`='$file_name' WHERE `id`='$id'"; 
       move_uploaded_file($tmp_name,"photo/".$file_name);
        $result = $conn->query($sql); 

        if ($result == TRUE) 
        {

            echo "Record updated successfully.";

        }
        else
        {

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

        header('Location:view.php');

    } 

if (isset($_GET['id'])) 
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
            $hobbies = explode(",",$hobbies);

        } 
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        Name : <input type="text" name="nm" value="<?php echo $name ; ?>" ><br>
         <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        Age : <input type="text" name="age" value="<?php echo $age ;?>"><br>
        gender : <input type="radio" name="gender" value="male" checked>male
        <input type="radio" name="gender" value="female" checked>female<br>
        hobbies : <input type="checkbox" name="hobbies[]" value="playing" checked>Playing
        <input type="checkbox" name="hobbies[]" value="singing" checked="1">singing
        <input type="checkbox" name="hobbies[]" value= "dancing" checked="1">dancing<br>
        city : <select name="city" id="city" >
                            <option value="rajkot" selected="1" >Rajkot</option>
                            <option value="surat" selected="1">Surat</option>
                            <option value="ahemdabad" selected="1">Ahemdabad</option>
                            <option value="vadodra" selected="1">Vadodra</option>
                        </select><br>
        file : <input type="file" name="file" value="<?php echo $file_name ;?>">
        <td><img src="photo/<?php echo $file_name;?>" width="100"></td>
        <input type="submit" name="update" value="update">
        
</form>
</body>
</html>