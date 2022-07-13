<?php
include_once'db.php';
 
$sql = "SELECT id,name,age,gender,hobbies,city,file FROM crud";
$result = $conn->query($sql);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<table id="tblUser">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>gender</th>
        <th>hobbies</th>
        <th>city</th>
        <th>file</th>
        <th colspan="8" align="center"> action </th>
    </thead>
    <tbody>
        <?php if(!empty($arr_users)) { ?>
            <?php foreach($arr_users as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['hobbies']; ?></td>
                    <td><?php echo $user['city']; ?></td>
                    <?php echo"<td><img src='photo/".$user["file"]."'  width='100'></td>";?>
                    <!-- <td><a href="delete.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Are yosure?')" >Delete</a></td>
                      <td><a href="update.php?id=<?php echo $user["id"]; ?>">Update</a></td>  -->
                    </tr>
                    
            <?php } ?>
        <?php } ?>
        
                     
                
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );
</script>