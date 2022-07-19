<?php
session_start();
if (isset($_POST['email']))
{
 if (empty($_POST['email'])|| empty($_POST['password']))
 { 
 
 	$_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 	header("location: form1.php");
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
 if (empty($_SESSION['error_page2'])) 
 {
 	header("location: form1.php");//redirecting to first page
 }
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
	<form style="width: 20px;" method="POST" action="form3.php">
		<!-- <ul>
			<li>Account setup</li>
			<li>social Account</li>
		</ul> -->
		<fieldset>
			<h3>Social Account...</h3>
			<h4>This is step-2</h4>
			<?php

				if (!empty($_SESSION['error_page2'])) 
				{
 					echo $_SESSION['error_page2'];
 					unset($_SESSION['error_page2']);
				}
?>
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