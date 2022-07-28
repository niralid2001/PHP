<?php 
session_start();
if(isset($_SESSION["user"]))
{
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
                if($file_name!="")
                {
                    $file_name = explode(".",$file_name);
                    $file_name[0]=$file_name[0]. time();
                    $file_name = implode(".", $file_name);
                    $file[] = $file_name;
                    move_uploaded_file($_FILES['files']['tmp_name'][$i],"photo/".$file_name); 
                }
            }
            $images = array_merge($_POST['images'],$file);
            $images = implode(",",$images);
                $tmp_name=$_FILES['files']['tmp_name'][$i];
                $hobbies=implode(",", $hobbies);
                // $chk="";  
                // foreach($hobbies as $chk1)  
                // {  
                // $chk .= $chk1.",";  
                // }  

               $sql = "UPDATE `crud` SET `name`='$name',`age`='$age',`gender`='$gender',`hobbies`='$hobbies',`city`='$city', `file`='".$images."' WHERE `id`='$id'"; 
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
                   
               //       print_r($hobbies);
               // exit();

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
                <tr><td>hobbies : </td><td> <input type="checkbox" name="hobbies[]" value="playing" <?php if(in_array("playing", $hobbies) ) {echo "checked";} ?>>Playing
                    <input type="checkbox" name="hobbies[]" value="singing" <?php if(in_array("singing", $hobbies) ) {echo "checked";} ?>>singing
                    <input type="checkbox" name="hobbies[]" value= "dancing" <?php if(in_array("dancing", $hobbies) ) {echo "checked";} ?>>dancing </td></tr><br>
                <tr><td>city : </td><td> <select name="city" id="city">
                    <option disabled></option>
                                    <option value="rajkot" <?php if( $city == "rajkot" ) {echo "selected";}?>>Rajkot</option>
                                    <option value="surat" <?php if( $city == "surat" ) {echo "selected";}?>>Surat</option>
                                    <option value="ahemdabad" <?php if( $city == "ahemdabad" ) {echo "selected";}?>>Ahemdabad</option>
                                    <option value="vadodra" <?php if( $city == "vadodra" ) {echo "selected";}?>>Vadodra</option>
                                </select></td></tr><br>
                <tr><td>file : </td><td> <input type="file" name="files[]" value="<?php echo $file_name ;?>" multiple id="files">
                <td><!-- <img src="photo/<?php echo $file_name;?>" width="100"> -->
                    <?php  $images=explode(',',$file_name); 
                                      foreach($images as $image) {
                                   ?>
                                   <input type="hidden" name="images[]" value="<?php echo $image;?>">
                                  <img src="<?php echo 'photo/'.$image;?>" width="100" />
                                     
                                  <!-- <input type="button" name="btn" value="remove" >  -->

                                  <?php } ?><br> 
                                  Click here to remove files<br>
                                   <a href="remove.php?image=<?php echo "$image"; ?>&id=<?php echo $id; ?>" onclick="return confirm('Are you sure to remove all files ?')">Remove all files</a>
                </td></td></tr>
                <tr><td><input type="submit" name="update" value="update"></td></tr>
                </table>
        </form>
        </body>
        </html>
<?php 
}
?>