<?php 
include_once'db.php';
$result = mysqli_query($conn,"SELECT * FROM crud");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD</title>
</head>
<body>

<?php
	if (mysqli_num_rows($result) > 0) {
?>
<br><br><br>
<font size=7><u>DATA</u></font>
  <table border="1" cellpadding="0" cellspacing="0">
  
  <tr>
  	<td>id</td>
    <td>name</td>
    <td>age</td>
    <td>gender</td> 
     <td>hobbies</td> 
      <td>city</td> 
    <td>file</td> 
    
    <td colspan="8" align="center"> action</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result))
 {
?>
<tr>
	<td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["age"]; ?></td>
    <td><?php echo $row["gender"]; ?></td>
    <td><?php echo $row["hobbies"]; ?></td> 
    <td><?php echo $row["city"]; ?></td>   
     <?php echo"<td><img src='photo/".$row["file"]."'  width='100'></td>";?>
    <td><a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')" >Delete</a></td>
    <td><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></td> 
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
</body>
</html>