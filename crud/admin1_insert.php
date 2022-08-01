
<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login.php');
}
		$conn=mysqli_connect('localhost','root','','db');
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
				$file = array();
			for($i=0;$i<$totalfiles;$i++)
			{
				$file_name=$_FILES['files']['name'][$i];
				$file_name = explode(".",$file_name);
				$file_name[0]=$file_name[0]. time();
				$file_name = implode(".", $file_name);
				$file[] = $file_name;
				move_uploaded_file($_FILES['files']['tmp_name'][$i],"photo/".$file_name);
			}
		   	 	$tmp_name=$_FILES['files']['tmp_name'][$i];   
		   	 	$hobbies = implode(",",$hobbies);
		      	 	//$hobbies = explode(",",$hobbies);
		  //     	$chk="";  
				// foreach($hobbies as $chk1)  
		  //  		{  
		  //     	$chk .= $chk1.",";  
		  //  		}

				$qry = "INSERT INTO  `admin1`(`name` ,  `age` ,`gender` ,`hobbies` ,`city` , `file`) VALUES ('$name','$age','$gender','$hobbies','$city','".implode(",",$file)."')";
				if (mysqli_query($conn, $qry)) 
				{
					
					echo "record created successfully !";
			 	} 
			 	else 
			 	{
					echo "Error: " . $qry . "
						" . mysqli_error($conn);
				}
				
			header('Location:admin1_view.php');
			}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>CRUD</title>
			<!-- form validation link-->
		     <script src="http://localhost/PHP-Training/crud/js/jquery-3.6.0.min.js"></script>
		</head>
		<body>
			<!-- form validation -->
			<script type="text/javascript">
		$(document).ready(function () 
		{
		    $('#button').click(function() 
		    {

		    	if( document.form.nm.value == "" ) 
		    	{
		            alert( "Please provide your name!" );
		            document.form.nm.focus() ;
		            return false;
		        }

		        if( document.form.age.value == "" ) 
		    	{
		            alert( "Please provide your age!" );
		            document.form.age.focus() ;
		            return false;
		        }

		        checked = $("input[type=radio]:checked").length;
		      	if(!checked) 
		     	{
		       		alert("You must check at least gender.");
		       	
		        	return false;
		      	}
		      
		      	checked = $("input[type=checkbox]:checked").length;
		      	if(!checked) 
		     	{
		       		alert("You must check at least one checkbox.");
		       
		        	return false;
		      	}

		      	if( document.form.city.value == "-1" ) 
		      	{
		            alert( "Please provide your city!" );
		             document.form.city.focus() ;
		            return false;
		        }

		     	if($('#files')[0].files.length === 0)
		     	{
			        alert("Please attact files!");
			        $('#files').focus();

			        return false;
		   		}

		    });
		});

		</script>
			<form method="POST" enctype="multipart/form-data" name="form">
				<table align="center">
				<tr><td>Name :</td><td> <input type="text" name="nm" ></td></tr><br>
				<tr><td>Age :</td><td> <input type="text" name="age" ></td></tr><br>
				<tr><td>gender :</td><td> <input type="radio" name="gender" value="male" >male
				<input type="radio" name="gender" value="female" >female</td></tr><br>
				<tr><td>hobbies : </td><td><input type="checkbox" name="hobbies[]" value="playing">Playing
				<input type="checkbox" name="hobbies[]" value="singing" >singing
				<input type="checkbox" name="hobbies[]" value="dancing" >dancing</td></tr><br>
				<tr><td>city : </td><td> <select name="city">
									<option disabled selected value="-1">[select city]</option>
		  							<option value="rajkot">Rajkot</option>
		  							<option value="surat">Surat</option>
		  							<option value="ahemdabad">Ahemdabad</option>
		  							<option value="vadodra">Vadodra</option>
								</select></td></tr><br>
				<tr><td>file : </td><td><input type="file" name="files[]" value="<?php echo "$file_name"?>" multiple id="files"></td></tr><br>
				<tr><td><input type="reset" ></td><td><input type="submit" name="submit" id="button">&nbsp;<a href="logout.php">logout</a></td></tr>
				</table>
				 
		</form>

		</body>
		</html>


