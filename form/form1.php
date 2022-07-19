<?php
session_start();
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
	<form style="width: 20px;" method="POST" action="form2.php">
		<fieldset >
			<h3>Create Account...</h3>
			<h4>This is step-1</h4>
			<?php
				 if (!empty($_SESSION['error'])) 
				 {
					 echo $_SESSION['error'];
					 unset($_SESSION['error']);
 				}
 			?>
			<input type="text" name="email" placeholder="Email"><br><br>
			<input type="password" name="password" placeholder="Password"><br><br>
			<input type="submit" name="next1" value="Next">
		</fieldset>
	</form>
</center>
</body>
</html>