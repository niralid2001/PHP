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
<body>
<center >
	<div class="container">
<div class="row">
	<div>
		<button class="left-arrow" id="left-arrow">Left</button>
	<img src="photo/<?php echo $r['file'];?>" width="850">
	<button class="right-arrow" id="right-arrow">Right</button>
	</div>
</div>
</div>
</center> 
</body>
<?php 
}
?> 