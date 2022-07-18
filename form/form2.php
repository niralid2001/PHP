<?php 
include_once'formdb.php';

if(isset($_POST['next2']))
{
	$twitter = $_POST['twitter'];
	$github = $_POST['github'];
	$website = $_POST['website'];

	$qry = "INSERT INTO  `form`(`twitter` ,  `github` , `website`) VALUES ('$twitter','$github','$website')";
		if (mysqli_query($conn, $qry)) 
		{
			echo "record created successfully !";
	 	} 
	 	else 
	 	{
			echo "Error: " . $qry . "
				" . mysqli_error($conn);
		}
		
	 header('Location:form3.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form2</title>
</head>
<body>

<center>
	<form style="width: 20px;" method="POST">
		<!-- <ul>
			<li>Account setup</li>
			<li>social Account</li>
		</ul> -->
		<fieldset>
			<h3>Social Account...</h3>
			<h4>This is step-2</h4>
			<input type="text" name="twitter" placeholder="twitter link address"><br><br>
			<input type="text" name="github" placeholder="github link address"><br><br>
			<input type="text" name="website" placeholder="your website link address"><br><br>
			<input type="submit" name="previous1" value="Previous"> &nbsp;
			<input type="submit" name="next2" value="Next">
		</fieldset>
	</form>
</center>
</body>
</html>