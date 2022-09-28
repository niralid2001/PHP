<?php 

session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');

// SLIDER IMAGE
 $sql="SELECT file FROM crud ";
	 $result1= mysqli_query($conn,$sql);
	// $row = mysqli_fetch_assoc($result1);
$row ="";
	 //$row=mysqli_fetch_row($result1);

	 //$final1 = json_encode($row);
	 //var_dump($result1);
	  
	 // while($row = mysqli_fetch_row ($result1))
		// {
		// 	//print_r($row);
		// }
	

	$query = "select * from crud where id =".$_REQUEST["id"];
	$result= mysqli_query($conn,$query);
	//print_r($query);
	while($r = mysqli_fetch_array($result))
	{
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script  src="http://localhost/PHP-Training/crud/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	let image = [<?php echo $row; ?>];
	
//var image= ['Jellyfish.jpg','koala.jpg','Tulips.jpg','Penguins.jpg','Desert>jpg'];
var i=0;

function prev(){
	if(i<=0) i=image.length;
	i--;
	var slider = document.getElementById("slider");
	slider.setAttribute('src','photo/'+image[i]);
}
function next(){
	if(i>=image.length-1) i=-1;
	i++;
	var slider = document.getElementById("slider");
	slider.setAttribute('src','photo/'+image[i]);
}
</script>
<body>
<center>
	<form method="POST">
	<div class="container">
<div class="row">
	<div>
	 <button class="btn btn-dark" onclick="prev()" name="left">LEFT</button> 
	<img alt="slideshow" src="photo/<?php echo $r['file'];?>" width="800" class="slider" id="slider">
	
	<?php 
		 // if(isset($_POST['left']) && isset($_POST['right']))
		//if(!empty('left') && !empty('right'))
		 // {
		 	while($row = mysqli_fetch_row($result1))
			{ 
				?>
				<img src="photo/<?php echo implode(',',$row);?>" width="800" class="slider" id="slider">
				<?php
		 	} 
		 // }
	 ?>
 <button class="btn btn-dark" onclick="next()" name="right">RIGHT</button>
	</div> 
</div>
</div>
</form>
</center>
</body>
<?php 
}
?> 
