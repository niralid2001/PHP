<?php 
session_start();
	$conn=mysqli_connect('localhost','root','','db');
	if(isset($_POST['sub']))
	{
		$email = $_POST['email'];
		$ps = $_POST['password'];

		$query = mysqli_query($conn, "select * from login where email='$email' and password='$ps'");
		$row = mysqli_fetch_array($query);
		if(mysqli_num_rows($query)>0)
		{
			//echo "login successfully";
			$_SESSION['user']=$row;
			header('Location:view1.php');
			exit();
			//echo "admin1's dashboard";
		}
		
		else 
		{
			//echo "<script>alert(login failed);</script>";
			echo "login failed";
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login User</title>
	<script src="http://localhost/PHP-Training/crud/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<form method="POST" enctype="multipart/form-data" name="form">
		<table align="center">
		<tr><td>Email :</td><td> <input type="text" name="email" ></td></tr><br>
		<tr><td>password :</td><td> <input type="password" name="password" ></td></tr><br>
		
		<tr><td><input type="reset" ></td><td><input type="submit" name="sub" id="sub" value="login">&nbsp;<a href="logout.php">logout</a></td></tr>
		</table>
		 
</form>

</body>
</html>

<!-- https://youtu.be/wODW8RLBPt0 -->