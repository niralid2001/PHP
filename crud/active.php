<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');
$status=$_GET['id'];
if($status=='active')
{
     mysqli_query($conn,"UPDATE `crud` SET `status` = 'inactive' ");
     header('Location:view1.php');
}
else
{
    mysqli_query($conn,"UPDATE `crud` SET `status` = 'active' ");
    header('Location:view1.php');
}

?>