<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$columns = array('id','log_id','name','age','gender','hobbies','city','file');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

            $conn=mysqli_connect('localhost','root','','db');
            $log_id = $_SESSION['user']['log_id'];
            $admintype = $_SESSION['user']['admintype'];
            if($admintype == "superadmin")
            {
                $sql="SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id ORDER BY  $column  $sort_order ";
            }
            else
            {
                $sql = "SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id WHERE log_id = '$log_id' ORDER BY  $column  $sort_order"; 
            }
            $result = $conn->query($sql);
            $arr_users = [];
            if ($result->num_rows > 0) 
            {
                    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
            }        
?>
<!-- ajax code -->
    <script src="http://localhost/PHP-Training/crud/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
// ajax script for getting state data
$(document).ready(function(){
   $('#age').on('change', function(){
      var age = $(this).val();
      var gender = $('#gender').val();
      var hobbies = $('#hobbies').val();
      var city = $('#city').val();
      if(age){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'age':age,'gender':gender,'hobbies':hobbies,'city':city},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      }
  });
});
$(document).ready(function(){
   $('#gender').on('change', function(){
      var gender = $(this).val();
      var age = $('#age').val();
      var hobbies = $('#hobbies').val();
      var city = $('#city').val();
      if(gender){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'gender':gender,'age':age,'hobbies':hobbies,'city':city},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      }
  });
});
$(document).ready(function(){
   $('#hobbies').on('change', function(){
      var hobbies = $(this).val();
      var age = $('#age').val();
      var gender = $('#gender').val();
      var city = $('#city').val();
      if(hobbies){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'hobbies':hobbies,'age':age,'gender':gender,'city':city},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      }
  });
});
$(document).ready(function(){
   $('#city').on('change', function(){
      var city = $(this).val();
      var age = $('#age').val();
      var gender = $('#gender').val();
      var hobbies = $('#hobbies').val();
      if(city){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'city':city,'age':age,'gender':gender,'hobbies':hobbies},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      } 
  });
});
$(document).ready(function(){
   $('#text').on('keypress', function(){
      var text = $(this).val();
      if(text){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'text':text},
              success:function(html){
                  $('#tblUser tbody').html(html);
                 
              }
          }); 
      } 
  });
});
  </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" /> -->
        <table id="tblUser" cellpadding="15" cellspacing="0" border="1">
            <thead>
                
                <th><a href="view1.php?column=id&order=<?php echo $asc_or_desc; ?>">id <i class="fa fa-sort" <?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>></i></a></th>
                <th><a href="view1.php?column=log_id&order=<?php echo $asc_or_desc; ?>">log_id <i class="fa fa-sort" <?php echo $column == 'log_id' ? '-' . $up_or_down : ''; ?>></i></a></th>
                <th><a href="view1.php?column=name&order=<?php echo $asc_or_desc; ?>">name<i class="fa fa-sort" <?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>></i></a></th>
                <th><a href="view1.php?column=age&order=<?php echo $asc_or_desc; ?>">age<i class="fa fa-sort" <?php echo $column == 'age' ? '-' . $up_or_down : ''; ?>></i></a><br>
                    <!-- Dynamic dropdown -->
                    <?php
                    $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query=mysqli_query($conn,"SELECT distinct age FROM crud ");
                    }
                    else
                    {
                        $query=mysqli_query($conn,"SELECT distinct age FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount=mysqli_num_rows($query); 
                    ?>
                    <select name="age" id="age">
                        <option disabled selected value="-1">choose age for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount;$i++)
                            {
                                $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row["age"]; ?>"><?php echo $row["age"]; ?></option>
                        <?php 
                            }
                        ?>
                    </select></th>
                <th><a href="view1.php?column=gender&order=<?php echo $asc_or_desc; ?>">gender<i class="fa fa-sort" <?php echo $column == 'gender' ? '-' . $up_or_down : ''; ?>></i></a> <br>
                   <?php
                    error_reporting (E_ALL ^ E_NOTICE);
                   $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        //$age = $_POST['age'];
                        $query1=mysqli_query($conn,"SELECT distinct gender FROM crud");
                    }
                    else
                    {
                        $query1=mysqli_query($conn,"SELECT distinct gender FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount1=mysqli_num_rows($query1); 
                    ?>
                    <select name="gender" id="gender">
                        <option disabled selected value="-1">choose gender for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount1;$i++)
                            {
                                $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row1["gender"]; ?>"><?php echo $row1["gender"]; ?></option>
                        <?php 
                            }
                        ?>
                               </select></th>
                <th><a href="view1.php?column=hobbies&order=<?php echo $asc_or_desc; ?>">hobbies<i class="fa fa-sort" <?php echo $column == 'hobbies' ? '-' . $up_or_down : ''; ?>></i></a><br>
                    <select name="hobbies[]" id="hobbies" multiple>
                        <option disabled tabindex="-1">choose hobbies for record</option>
                        <option value="playing">Playing</option>
                        <option value="singing">Singing</option>
                        <option value="dancing">Dancing</option>
                        <?php 
                            $row2=$_POST['hobbies'];
                            foreach ($row2 as $r)
                            {
                        ?>
                         <option value="<?php echo $r["hobbies"]; ?>"><?php echo $r["hobbies"]; ?></option> 
                        <?php 
                            }
                        ?>
                               </select></th>
                <th><a href="view1.php?column=city&order=<?php echo $asc_or_desc; ?>">city<i class="fa fa-sort" <?php echo $column == 'city' ? '-' . $up_or_down : ''; ?>></i></a> <br>
                   <?php
                    $admintype = $_SESSION['user']['admintype'];
                    if($admintype == "superadmin")
                    {
                        $query3=mysqli_query($conn,"SELECT distinct city FROM crud ");
                    }
                    else
                    {
                        $query3=mysqli_query($conn,"SELECT distinct city FROM crud WHERE log_id = '$log_id'");
                    }
                    $rowcount3=mysqli_num_rows($query3); 
                    ?>
                    <select name="city" id="city">
                        <option disabled selected value="-1">choose city for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount3;$i++)
                            {
                                $row3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row3["city"]; ?>"><?php echo $row3["city"]; ?></option>
                        <?php 
                            }
                        ?>
                            </select></th>
                <th><a href="view1.php?column=file&order=<?php echo $asc_or_desc; ?>">file<i class="fa fa-sort" <?php echo $column == 'file' ? '-' . $up_or_down : ''; ?>></i></a></th>
                <th align="center"> action </th>
            </thead>
            <tbody align="center">
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['log_id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['age']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['hobbies']; ?></td>
                            <td><?php echo $user['city']; ?></td>
                             <td>
                                   <?php  $images=explode(',',$user["file"]); 
                                      foreach($images as $image) {
                                   ?>
                                  <img src="<?php echo 'photo/'.$image; ?>" width="100" />
                                  <?php } ?>
                             </td>
                             <td>
                                <a href="update.php?id=<?php echo $user["id"]; ?>">Update</a>&nbsp;&nbsp;
                                <a href="delete.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                    
                <?php } ?>  
                <a href="logout.php"><font size="6">logout</font></a><br><br>
                <button><a href="view1.php">Clear Sorting</a></button>
                    <center><a href="crud.php"><font size="4">Add new data </font></a>     
                     <form method="post">
                        <input type="text" name="text" placeholder="Search by id" id="text">
                        <!-- <button type="submit" name="search" id="search">Search</button> -->
                    </form> </center>                                            
            </tbody>
        </table>

    <!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
        jQuery(document).ready(function($) {     
            $('#tblUser').DataTable(
     //         {
     //     "processing": true,
     //     "serverSide": true,
     //    "ajax": "server_processing.php"
     // } 
    );
        } );
        </script> -->
