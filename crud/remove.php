<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
        $conn=mysqli_connect('localhost','root','','db'); 

         if(isset($_GET['id']) && $_GET['image'])
            {
                $getIamgeName = $_GET['image'];
                $getId = $_GET['id'];
                $selectSql = "SELECT * FROM `crud` WHERE `id`='$getId' ";
                $result1 = $conn->query($selectSql);
                $result=$result1->fetch_assoc();
                // print_r($result);
                // exit();
                
                            $createDeletePath = "photo/".$getIamgeName;
                
                            if(unlink($createDeletePath))
                            {
                                 $deleteSql = "UPDATE `crud` SET `file`='$getImageName' WHERE `id`='$getId'";
                                $rsDelete = mysqli_query($conn, $deleteSql);    
                                
                                if ($rsDelete == TRUE) 
                                {
                                    // $d = "DELETE  FROM `crud` where `file`='$getIamgeName' ";
                                    // $rs = mysqli_query($conn, $d);
                                    echo "Remove file successfully.";
                                    // header('Location:view1.php');


                                }
                                else
                                {

                                    echo "Error:" . $deleteSql . "<br>" . $conn->error;

                                }
                                $array = [$getIamgeName];
                                $a=array_filter($array);
                                 //$a = array_splice($array, 0);
                                print_r($a);
                                exit();

                            }
            }

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
                    //     //header('Location:view1.php');

                    // } 
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
                    // $filename = isset($_GET['id']) ? $_GET['id'] : NULL;

                    // if (!empty($filename)) {
                    //     $delete = unlink("photo/" . $filename);
                    //     if($delete){
                    //         $result = mysql_query("DELETE `file` FROM `crud` where `file`="$filename limit 1;")";
                    //         //header("Location:succes_page.php");
                    //             echo "success";
                    //     }else{
                    //         //header("Location:failure_page.php");
                    //         echo "error";
                    //     }
                    // }
                    // else
                    // {
                    //      //header("Location:failure_page.php");
                    //     echo "......error....";
                    // }

?> 

