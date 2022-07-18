<?php 

$servername='localhost';
$username='root';
$password='';
$dbname = "db";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
else
{  
   mysqli_select_db($conn, 'form');  
} 
   

?>