<?php 

session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');

// SLIDER IMAGE
 $sql="SELECT * FROM crud ";
	 $result1= mysqli_query($conn,$sql);
	  
	 // while($r1 = mysqli_fetch_array($result1))
		// {
		// 	print_r($r1);
	 //  exit;
		// }
	

	$query = "select * from crud where id =".$_REQUEST["id"];
	$result= mysqli_query($conn,$query);
	//print_r($query);
	while($r = mysqli_fetch_array($result))
	{
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script >
var image= ['jellyfish.jpg','koala.jpg'];
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
	<div class="container">
<div class="row">
	<div>
	 <button class="btn btn-dark" onclick="prev()" name="left">LEFT</button> 
	<img alt="slideshow" src="photo/<?php echo $r['file'];?>" width="800" class="slider" id="slider">
 <button class="btn btn-dark" onclick="next()" name="right">RIGHT</button>
	</div> 
</div>
</div>
</center>
</body>
<?php 
}
//header('location:image.php');
// $page = $_GET['id'];    
// $sql = "select * from crud LIMIT $page,1";
// while($sql){
//   $next_page = $page+1;
//   $prev_page = $page-1;

//   $next_btn = "<a href='script.php?page=".$next_page."'>Next</a>";
// }
?> 
