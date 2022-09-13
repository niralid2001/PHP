<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');
$id=$_GET['id'];
$status=$_GET['status'];
if($status=='active')
{
     mysqli_query($conn,"UPDATE `crud` SET `status` = 'inactive' where `id`=$id ");
     header('Location:view1.php');
}
else
{
    mysqli_query($conn,"UPDATE `crud` SET `status` = 'active' where `id`=$id ");
    header('Location:view1.php');
}

?>