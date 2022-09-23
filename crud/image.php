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
	while($r = mysqli_fetch_array($result))
	{
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
  </script>
  <style type="text/css">
  	.imgg{
  		background-attachment:fixed;
  	}
  </style>
<body>
<center >
	<div class="container">
<div class="row">
	<div id="imgg">
	<img src="photo/<?php echo $r['file'];?>">
	</div>
</div>
</div>
</center> 
</body>
<?php 
}
?> 