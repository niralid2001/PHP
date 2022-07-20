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
        $totalfiles = count($_FILES['files']['name']);
        $file = array();
    for($i=0;$i<$totalfiles;$i++)
    {
        $file_name=$_FILES['files']['name'][$i];
        $file_name = explode(".",$file_name);
        $file_name[0]=$file_name[0]. time();
        $file_name = implode(".", $file_name);
        $file[] = $file_name;
        move_uploaded_file($_FILES['files']['tmp_name'][$i],"photo/".$file_name);
    }
        $tmp_name=$_FILES['files']['tmp_name'][$i];
        $hobbies=implode(",", $hobbies);
        // $chk="";  
        // foreach($hobbies as $chk1)  
        // {  
        // $chk .= $chk1.",";  
        // }  

       $sql = "UPDATE `crud` SET `name`='$name',`age`='$age',`gender`='$gender',`hobbies`='$hobbies',`city`='$city', `file`='".implode(",",$file)."' WHERE `id`='$id'"; 
        $result = $conn->query($sql); 

        if ($result == TRUE) 
        {

            echo "Record updated successfully.";

        }
        else
        {

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

        header('Location:view1.php');

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
        <table align="center">
        <tr><td>Name : </td><td> <input type="text" name="nm" value="<?php echo $name ; ?>" ></td></tr><br>
         <tr><td><input type="hidden" name="id" value="<?php echo $id; ?>"></td></tr><br>
        <tr><td>Age :</td><td>  <input type="text" name="age" value="<?php echo $age ;?>"></td></tr><br>
        <tr><td>gender :</td><td>  <input type="radio" name="gender" value="male" <?php if($gender == "male" ) {echo "checked";} ?>>male
            <input type="radio" name="gender" value="female" <?php if($gender == "female" ) {echo "checked";} ?>>female</td></tr><br>
        <tr><td>hobbies : </td><td> <input type="checkbox" name="hobbies[]" value="playing" <?php if(isset($hobbies[0]) && $hobbies[0] == "playing" ) {echo "checked";} ?>>Playing
            <input type="checkbox" name="hobbies[]" value="singing" <?php if(isset($hobbies[1])&& $hobbies[1] == "singing" ) {echo "checked";} ?>>singing
            <input type="checkbox" name="hobbies[]" value= "dancing" <?php if(isset($hobbies[2] ) && $hobbies[2]== "dancing" ) {echo "checked";} ?>>dancing</td></tr><br>
        <tr><td>city : </td><td> <select name="city" id="city">
            <option></option>
                            <option value="rajkot">Rajkot</option>
                            <option value="surat">Surat</option>
                            <option value="ahemdabad">Ahemdabad</option>
                            <option value="vadodra">Vadodra</option>
                        </select></td></tr><br>
        <tr><td>file : </td><td> <input type="file" name="files[]" value="<?php echo $file_name ;?>" multiple>
        <td><img src="photo/<?php echo $file_name;?>" width="100"></td></td></tr>
        <tr><td><input type="submit" name="update" value="update"></td></tr>
        </table>
</form>
</body>
</html>