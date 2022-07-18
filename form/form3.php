<?php 
include_once'formdb.php';

if(isset($_POST['sub']))
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];

	$qry = "INSERT INTO  `form`(`firstname` ,  `lastname` , `phone`) VALUES ('$firstname','$lastname','$phone')";
		if (mysqli_query($conn, $qry)) 
		{
			echo "record created successfully !";
	 	} 
	 	else 
	 	{
			echo "Error: " . $qry . "
				" . mysqli_error($conn);
		}
		
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form3</title>
</head>
<body>

<center>
	<form style="width: 20px;" method="POST" >
		<!-- <ul>
			<li>Account setup</li>
			<li>social Account</li>
		</ul> -->
		<fieldset >
			<h3>Personal Detail</h3>
			<h4>This is step-3</h4>
			<input type="text" name="firstname" placeholder="First Name"><br><br>
			<input type="text" name="lastname" placeholder="Last Name"><br><br>
			<input type="text" name="phone" placeholder="Phone No"><br><br>
			<input type="submit" name="previous2" value="Previous"> &nbsp;
			<input type="submit" name="sub" value="Submit">
		</fieldset>
	</form>
</center>
</body>
</html>