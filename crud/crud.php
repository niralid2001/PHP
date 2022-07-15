
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
   	 	//$tmp_name=$_FILES['files']['tmp_name'];
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

		Name : <input type="text" name="nm"><br>
		Age : <input type="text" name="age"><br>
		gender : <input type="radio" name="gender" value="male">male
		<input type="radio" name="gender" value="female" >female<br>
		hobbies : <input type="checkbox" name="hobbies[]" value="playing" >Playing
		<input type="checkbox" name="hobbies[]" value="singing">singing
		<input type="checkbox" name="hobbies[]" value="dancing">dancing<br>
		city :  <select name="city" id="city">
  							<option value="rajkot">Rajkot</option>
  							<option value="surat">Surat</option>
  							<option value="ahemdabad">Ahemdabad</option>
  							<option value="vadodra">Vadodra</option>
						</select><br>
		file : <input type="file" name="files[]" value="<?php echo "$file_name"?>" multiple ><br>
		<input type="submit" name="submit" >
		
		
</form>

</body>
</html>

