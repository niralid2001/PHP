 

<?php 

include_once'db.php'; 

// if (isset($_GET['id'])) {

//     $id = $_GET['id'];
//     //$file = $_GET['file'];

//     $sql = "DELETE  FROM `crud` where `id`='$id'";

//      $result = $conn->query($sql);

//    if ($result == TRUE) {

//         echo "image removed successfully.";

//     }else{

//         echo "Error:" . $sql . "<br>" . $conn->error;

//     }
    //header('Location:view1.php');

//} 
// if(isset($_POST['id']))
// {
//     $images = $_GET['images'];
//    // $file_name=$_FILES['files']['name'];
//     $id = $_POST['id'];
//     $sql1 = "UPDATE `crud` SET `file`='".$images."' WHERE `id`='$id'";
//     $result = $conn->query($sql1);

//     if ($result == TRUE) 
//     {

//         echo "deleted";

//     }
// }
$filename = isset($_GET['id']) ? $_GET['id'] : NULL;

if (!empty($filename)) {
    $delete = unlink("photo/" . $filename);
    if($delete){
        $result = mysql_query("DELETE FROM crud where file="'. mysql_real_escape_string($filename)."' limit 1;")";
        //header("Location:succes_page.php");
            echo "success";
    }else{
        //header("Location:failure_page.php");
        echo "error";
    }
}
else
{
     //header("Location:failure_page.php");
    echo "......error....";
}


?> 

