<?php 
$connect=mysqli_connect("localhost","root","","db");

$query = "delete from category where catid='" . $_GET["userid"] . "'";

if (mysqli_query($connect, $query)) 
{
    echo "Record deleted successfully";
    header("Location: category.php");
} 
else 
{
    echo "Error deleting record: " . mysqli_error($connect);
}
?>