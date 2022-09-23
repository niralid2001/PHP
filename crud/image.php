<?php 

session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');

	$query = "select * from crud where id =".$_REQUEST["id"];
	$result= mysqli_query($conn,$query);
	//print_r($query);
	while($r = mysqli_fetch_row($result))
	{
?>
<body>
<center >
<div class="col-lg-6">
	<!-- <img class="img-fluid" src="<?php echo $r['file_name']; ?>" alt="">					 -->
	<img src="photo/<?php echo $r['file'];?>" width="100">
</div>
</center> 
</body>
<?php 
}
?> 