<?php 
include_once'formdb.php';
session_start();
if(isset($_POST['next1']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$qry = "INSERT INTO  `form`(`email` ,  `password`) VALUES ('$email','$password')";
		if (mysqli_query($conn, $qry)) 
		{
			echo "record created successfully !";
	 	} 
	 	else 
	 	{
			echo "Error: " . $qry . "
				" . mysqli_error($conn);
		}
		
	 	header('Location:form2.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form1</title>
</head>
<body>

<center>
	<form style="width: 20px;" method="POST">
		<!-- <ul>
			<li>Account setup</li>
			<li>social Account</li>
		</ul> -->
		<fieldset >
			<h3>Create Account...</h3>
			<h4>This is step-1</h4>
			<input type="text" name="email" placeholder="Email"><br><br>
			<input type="password" name="password" placeholder="Password"><br><br>
			<input type="submit" name="next1" value="Next">
		</fieldset>
	</form>
</center>
</body>
</html>