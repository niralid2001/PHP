<?php 
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
        $conn=mysqli_connect('localhost','root','','db'); 

         if(isset($_GET['admin1_id']) && $_GET['image'])
            {
                $getIamgeName = $_GET['image'];
                $getId = $_GET['admin1_id'];
                $selectSql = "SELECT * FROM `admin1` WHERE `admin1_id`='$getId' ";
                $result1 = $conn->query($selectSql);
                $result=$result1->fetch_assoc();
                // print_r($result);
                // exit();
                
                            $createDeletePath = "photo/".$getIamgeName;
                
                            if(unlink($createDeletePath))
                            {
                                 $deleteSql = "UPDATE `admin1` SET `file`='$getImageName' WHERE `admin1_id`='$getId'";
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

?> 

