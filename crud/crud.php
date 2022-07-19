
<?php 
include_once'db.php';
//$result = mysqli_query($conn,"SELECT * FROM crud");
$sub = "submit";


if(isset($_POST['submit']))
	{
		$name = $_POST['nm'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$hobbies = $_POST['hobbies'];
		$city = $_POST['city'];
		$totalfiles = count($_FILES['files']['name']);

	for($i=0;$i<$totalfiles;$i++){
		$file_name=$_FILES['files']['name'][$i];}
		$file_name=$file_name. time();
   	 	$tmp_name=$_FILES['files']['tmp_name'];
   	 	$hobbies = implode(",",$hobbies);
      	 	//$hobbies = explode(",",$hobbies);
  //     	$chk="";  
		// foreach($hobbies as $chk1)  
  //  		{  
  //     	$chk .= $chk1.",";  
  //  		}

		$qry = "INSERT INTO  `crud`(`name` ,  `age` ,`gender` ,`hobbies` ,`city` , `file`) VALUES ('$name','$age','$gender','$hobbies','$city','$file_name')";
		if (mysqli_query($conn, $qry)) 
		{
			move_uploaded_file($_FILES["files"]["tmp_name"][$i],"photo/".$file_name);
			echo "record created successfully !";
	 	} 
	 	else 
	 	{
			echo "Error: " . $qry . "
				" . mysqli_error($conn);
		}
		
	header('Location:view1.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<table align="center">
		<tr><td>Name :</td><td> <input type="text" name="nm"></td></tr><br>
		<tr><td>Age :</td><td> <input type="text" name="age"></td></tr><br>
		<tr><td>gender :</td><td> <input type="radio" name="gender" value="male">male
		<input type="radio" name="gender" value="female" >female</td></tr><br>
		<tr><td>hobbies : </td><td><input type="checkbox" name="hobbies[]" value="playing" >Playing
		<input type="checkbox" name="hobbies[]" value="singing">singing
		<input type="checkbox" name="hobbies[]" value="dancing">dancing</td></tr><br>
		<tr><td>city : </td><td> <select name="city" id="city">
  							<option value="rajkot">Rajkot</option>
  							<option value="surat">Surat</option>
  							<option value="ahemdabad">Ahemdabad</option>
  							<option value="vadodra">Vadodra</option>
						</select></td></tr><br>
		<tr><td>file : </td><td><input type="file" name="files[]" value="<?php echo "$file_name"?>" multiple ></td></tr><br>
		<tr><td><input type="submit" name="submit" ></td></tr>
		</table>
		
</form>

</body>
</html>

