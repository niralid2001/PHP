<?Php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
} 
    $conn=mysqli_connect('localhost','root','','db');
    if(count($_POST)>0) 
    {
        $text=$_POST['text'];
        $sql="SELECT * FROM crud where id='$text' ";
        //$sql="SELECT * FROM table_file where file_id='$text' ";
    }
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title> search data</title>
    </head>
    <body>
        <table border="1" cellpadding="5" cellspacing="0" align="center">
            <tr>
                <td>id</td>
                <td>log_id</td>
                <td>name</td>
                <td>age</td>
                <td>gender</td>
                <td>hobbies</td>
                <td>city</td>
                <td>file</td>
            </tr>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["log_id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["hobbies"]; ?></td>
                <td><?php echo $row["city"]; ?></td>
                <td>
                    <img src="<?php echo 'photo/'.$row["file"]; ?>" width="100" />
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </table>
    </body>
</html>


