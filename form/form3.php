<?php
session_start();
if (isset($_POST['twitter']))
{
 if (empty($_POST['twitter'])|| empty($_POST['github']) || empty($_POST['website']))
 { 
 	$_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; 
 	header("location: form2.php"); 
 } 
 else 
 {
 	foreach ($_POST as $key => $value) 
 	{
 		$_SESSION['post'][$key] = $value;
 	}
 }
} 
else 
{
 if (empty($_SESSION['error_page3'])) 
 {
 	header("location: form1.php");
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
	<form style="width: 20px;" method="POST" action="form4.php">
		<!-- <ul>
			<li>Account setup</li>
			<li>social Account</li>
		</ul> -->
		<fieldset >
			<h3>Personal Detail</h3>
			<h4>This is step-3</h4>
			<?php
 			if (!empty($_SESSION['error_page3'])) 
 			{
 				echo $_SESSION['error_page3'];
 				unset($_SESSION['error_page3']);
 			}
 			?>
			<input type="text" name="firstname" placeholder="First Name"><br><br>
			<input type="text" name="lastname" placeholder="Last Name"><br><br>
			<input type="text" name="phone" placeholder="Phone No"><br><br>
			<input name="previous2" value="Previous" onclick="location.href='form2.php'" type="button"> &nbsp;
			<input type="submit" name="sub" value="Submit">
		</fieldset>
	</form>
</center>
</body>
</html>