<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');

$columns = array('id','log_id','name','age','gender','hobbies','city','file');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) ? (strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC') : "";
$up_or_down="";
$search=isset($_GET['text']) && $_GET['text']!= "" ? $_GET['text'] : "";
$age=isset($_GET['age']) && $_GET['age']!= "" ? $_GET['age'] : "";
$gender=isset($_GET['gender']) && $_GET['gender']!= "" ? $_GET['gender'] : "";
$hobbies=isset($_GET['hobbies']) && $_GET['hobbies']!= "" ? $_GET['hobbies'] : "";
$city=isset($_GET['city']) && $_GET['city']!= "" ? $_GET['city'] : "";

$log_id = $_SESSION['user']['log_id'];
$admintype = $_SESSION['user']['admintype'];

$ss="";

    if(!empty($search)) 
    {
        $ss.=" AND ((crud.id LIKE '%".$search."%') OR (crud.log_id LIKE '%".$search."%') OR (crud.name LIKE '%".$search."%') OR (crud.age LIKE '%".$search."%') OR (crud.gender LIKE '%".$search."%') OR (crud.hobbies LIKE '%".$search."%') OR (crud.city LIKE '%".$search."%'))";
    } 
     if(!empty($age)) 
    {
        $ss.=" AND age='$age'";
    }
    if(!empty($gender)) 
    {
        $ss.=" AND gender='$gender'";
    }
    if(!empty($hobbies))
    {
        $ss.=" AND hobbies='$hobbies'";
    }
    if(!empty($city)) 
    {
        $ss.=" AND city='$city'";
    }
     //total record in database
    
    if($admintype == "superadmin")
    {
        $var="";
    }
    else
    {
        $var= " AND log_id = '$log_id'";
    }
     $sql="SELECT count(*) FROM crud where 1=1 $var $ss";
     $result = mysqli_query($conn, $sql);     
     $row =mysqli_fetch_array($result);
     $total_rows = $row[0]; 
     $limit = 3; 
     $total_pages = ceil($total_rows / $limit);   

            // update the active page number

            if (isset($_GET["page"])) {    

                $page_number  = $_GET["page"];    

            }    

            else {    

              $page_number=1;    

            }       

            // get the initial page number
            $initial_page = ($page_number-1) * $limit;
            if($admintype == "superadmin")
            {
                $sql="SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id,crud.status FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id where 1=1 $ss";
                
                if(!empty($column))
                {
                    $sql.=" ORDER BY  $column  $sort_order LIMIT $initial_page, $limit";
                }
            }
            else
            {
                $sql ="SELECT crud.id,crud.log_id,crud.name,crud.age,crud.gender,crud.hobbies,crud.city,table_file.file,table_file.file_id,crud.status FROM crud LEFT JOIN table_file ON crud.id=table_file.file_id WHERE log_id = '$log_id' $ss";

                if(!empty($column))
                {
                    $sql.=" ORDER BY  $column  $sort_order LIMIT $initial_page, $limit";
                }
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
// $(document).ready(function(){
//    $('#age').on('change', function(){
//       var age = $(this).val();
//       var gender = $('#gender').val();
//       var hobbies = $('#hobbies').val();
//       var city = $('#city').val();
//       if(age){
//           $.ajax({
//               type:'POST',
//               url:'ajax.php',
//               data:{'age':age,'gender':gender,'hobbies':hobbies,'city':city},
//               success:function(html){
//                   $('#tblUser tbody').html(html);
                 
//               }
//           }); 
//       }
//   });
// });
// $(document).ready(function(){
//    $('#gender').on('change', function(){
//       var gender = $(this).val();
//       var age = $('#age').val();
//       var hobbies = $('#hobbies').val();
//       var city = $('#city').val();
//       if(gender){
//           $.ajax({
//               type:'POST',
//               url:'ajax.php',
//               data:{'gender':gender,'age':age,'hobbies':hobbies,'city':city},
//               success:function(html){
//                   $('#tblUser tbody').html(html);
                 
//               }
//           }); 
//       }
//   });
// });
// $(document).ready(function(){
//    $('#hobbies').on('change', function(){
//       var hobbies = $(this).val();
//       var age = $('#age').val();
//       var gender = $('#gender').val();
//       var city = $('#city').val();
//       if(hobbies){
//           $.ajax({
//               type:'POST',
//               url:'ajax.php',
//               data:{'hobbies':hobbies,'age':age,'gender':gender,'city':city},
//               success:function(html){
//                   $('#tblUser tbody').html(html);
                 
//               }
//           }); 
//       }
//   });
// });
// $(document).ready(function(){
//    $('#city').on('change', function(){
//       var city = $(this).val();
//       var age = $('#age').val();
//       var gender = $('#gender').val();
//       var hobbies = $('#hobbies').val();
//       if(city){
//           $.ajax({
//               type:'POST',
//               url:'ajax.php',
//               data:{'city':city,'age':age,'gender':gender,'hobbies':hobbies},
//               success:function(html){
//                   $('#tblUser tbody').html(html);
                 
//               }
//           }); 
//       } 
//   });
// });
            // search by ajax
// $(document).ready(function(){
//    $('#text').keyup( function(){
//       var text = $(this).val();
//       if(text){
//           $.ajax({
//               type:'POST',
//               url:'ajax.php',
//               data:{'text':text},
//               success:function(html){
//                   $('#tblUser tbody').html(html);
                 
//               }
//           }); 
//       } 
//   });
// });
function selectredirect()
{
    var age = document.getElementById("age").value;
    var gender = document.getElementById("gender").value;
    var hobbies = document.getElementById("hobbies").value;
    var city = document.getElementById("city").value;
    window.location.href = 'view1.php?column=id&order=<?php echo '$asc_or_desc'; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age='+age+'&gender='+gender+'&hobbies='+hobbies+'&city='+city;
    
}
function deleteConfirm(){
     var result = confirm("Do you really want to delete records?");
    if(result){
        var checkbox = '#checkbox';
        console.log(checkbox);
        return false;
         for (var i =0; i <= checkbox.length ; i++) 
        {
            if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
            }
            else
            {
             $('.checkbox').each(function(){
                this.checked = false;
            });
            }

        }  
        return true;
    }else{
        return false;
    }

//      $('#checkbox').on('click',function(){
//         var checkbox = '#checkbox';
//         for (var i =0; i <= checkbox.length ; i++) 
//         {
//             if(this.checked){
//             $('.checkbox').each(function(){
//                 this.checked = true;
//             });
//             }
//             else
//             {
//              $('.checkbox').each(function(){
//                 this.checked = false;
//             });
//             }

//         }  
// })
 }
// $(document).ready(function(){
//     $('#form2').on('click',function(){
//         if(this.checked){
//             $('.checkbox').each(function(){
//                 this.checked = true;
//             });
//         }else{
//              $('.checkbox').each(function(){
//                 this.checked = false;
//             });
//         }
//     });



  </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" /> -->

        <table id="tblUser" cellpadding="15" cellspacing="0" border="1">
            <thead>
                <th>select</th>
                <th><a href="view1.php?column=id&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">id <i class="fa fa-sort" <?php echo $column == 'id' ? '-' . $up_or_down :''; ?>></i></a></th>

                <th><a href="view1.php?column=log_id&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">log_id <i class="fa fa-sort" <?php echo $column == 'log_id' ? '-' . $up_or_down : ''; ?>></i></a></th>

                <th><a href="view1.php?column=name&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">name<i class="fa fa-sort" <?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>></i></a></th>

                <th><a href="view1.php?column=age&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">age<i class="fa fa-sort" <?php echo $column == 'age' ? '-' . $up_or_down : ''; ?>></i></a><br>
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
                    <select name="age" id="age" onchange="selectredirect()">
                        <option disabled selected value="">choose age for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount;$i++)
                            {
                                $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row["age"];?>" <?php if($age==$row["age"]) {echo "selected";}?> > <?php echo $row["age"]; ?> </option>
                        <?php 
                            }
                        ?>
                    </select></th>

                <th><a href="view1.php?column=gender&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">gender<i class="fa fa-sort" <?php echo $column == 'gender' ? '-' . $up_or_down : ''; ?>></i></a> <br>
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
                    <select name="gender" id="gender" onchange="selectredirect()" >
                        <option disabled selected value="">choose gender for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount1;$i++)
                            {
                                $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row1["gender"]; ?>" <?php if($gender==$row1["gender"]) {echo "selected";}?> ><?php echo $row1["gender"]; ?></option>
                        <?php 
                            }
                        ?>
                               </select></th>

                <th><a href="view1.php?column=hobbies&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">hobbies<i class="fa fa-sort" <?php echo $column == 'hobbies' ? '-' . $up_or_down : ''; ?>></i></a><br>
                    <select name="hobbies[]" id="hobbies" multiple="multiple" onchange="selectredirect()">
                        <option disabled selected value="" >choose hobbies for record</option>
                        <option value="playing" <?php if( $hobbies == "playing" ) {echo "selected";}?>>Playing</option>
                        <option value="singing" <?php if( $hobbies == "singing" ) {echo "selected";}?>>Singing</option>
                        <option value="dancing" <?php if( $hobbies == "dancing" ) {echo "selected";}?>>Dancing</option>
                         <!-- <?php 
                            $row2=$_POST['hobbies'];
                            foreach ($row2 as $r)
                            {
                        ?>
                         <option value="<?php echo $r["hobbies"]; ?>" <?php if($hobbies==$r["hobbies"]) {echo "selected";}?>><?php echo $r["hobbies"]; ?></option>  
                        <?php 
                            }
                        ?> -->
                               </select></th>

                <th><a href="view1.php?column=city&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age;?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">city<i class="fa fa-sort" <?php echo $column == 'city' ? '-' . $up_or_down : ''; ?>></i></a> <br>
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
                    <select name="city" id="city" onchange="selectredirect()">
                        <option disabled selected value="">choose city for record</option>
                        <?php 
                            for($i=1;$i<=$rowcount3;$i++)
                            {
                                $row3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
                        ?>
                        <option value="<?php echo $row3["city"]; ?>" <?php if($city==$row3["city"]) {echo "selected";}?> ><?php echo $row3["city"]; ?></option>
                        <?php 
                            }
                        ?>
                            </select></th>

                <th><a href="view1.php?column=file&order=<?php echo $asc_or_desc; ?>&page=<?php echo $page_number; ?>&search=<?php echo $search; ?>&age=<?php echo $age; ?>&gender=<?php echo $gender; ?>&hobbies=<?php echo $hobbies; ?>&city=<?php echo $city; ?>">file<i class="fa fa-sort" <?php echo $column == 'file' ? '-' . $up_or_down : ''; ?>></i></a></th>
                <th align="center"> status </th>
                <th align="center"> action </th>
            </thead>
            <tbody align="center">
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            <td><form method="POST" id="form2" enctype="multipart/form-data"><input name="checkbox[]" type="checkbox" value="<?php echo $user['id']; ?>" id="checkbox"></form></td>
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
                             <td><?php echo $user['status'];?></td>
                             <td>
                                <a href="update.php?id=<?php echo $user["id"]; ?>">Update</a>&nbsp;&nbsp;
                                <a href="delete.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>&nbsp;&nbsp;
                                <a href="active.php?id=<?php echo $user["id"]; ?>&status=<?php echo $user["status"]; ?>&page=<?php echo $page_number; ?>">
                                    <?php 
                                        if($user['status']=='active')
                                        {
                                            echo "Inactive";
                                        }
                                        else
                                        {
                                            echo "Active";
                                        }
                                    ?>
                                </a>
                            </td>
                            
                        </tr>

                    <?php } ?>
                    
                <?php } ?>  
                <a href="logout.php"><font size="6">logout</font></a><br><br>
                <button><a href="view1.php">Clear Sorting</a></button>
                    <center><a href="crud.php"><font size="4">Add new data </font></a>     
                     <form method="GET" id="search_form" action="view1.php">
                        <input type="text" name="text" placeholder="Search by id" id="text" value="<?php echo $search; ?>">
                        <button type="submit" name="search" id="search">Search</button>
                    </form> </center>                                            
            </tbody>
        </table>
<!-- datatable -->
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
<!-- over datatable -->

<!-- Pagination -->
    <br><form method="POST" enctype="multipart/form-data"><input type="submit" name="delete" value="DELETE" onclick="deleteConfirm()">
        <input type="hidden" name="checkbox[]" value="<?php echo $user['id']; ?>" id="hidden">
    </form>
        <center><?php  
        if(empty($_GET['search']))
        {
            //$sql = "SELECT COUNT(*) FROM crud";     

           // $result = mysqli_query($conn, $sql);     

           // $row = mysqli_fetch_row($result);     

            //$total_rows = $row[0];              

        echo "<br>";            

            // get the required number of pages

            //$total_pages = ceil($total_rows / $limit);     

            $pageURL = "";             

            if($page_number>=2){   

                echo "<a href='view1.php?colum=$colums&order=$asc_or_desc&age=$age&gender=$gender&hobbies=$hobbies&city=$city&page=".($page_number-1)."&search=$search '>  Prev </a>";   

            }                          

            for ($i=1; $i<=$total_pages; $i++) {   

              if ($i == $page_number) {   

                  $pageURL .= "<a class = 'active' href='view1.php?colum=$colums&order=$asc_or_desc&age=$age&gender=$gender&hobbies=$hobbies&city=$city&page="  

                                                    .$i."&search=$search'>".$i." </a>";   

              }               

              else  {   

                  $pageURL .= "<a href='view1.php?colum=$colums&order=$asc_or_desc&age=$age&gender=$gender&hobbies=$hobbies&city=$city&page=".$i."&search=$search'>   

                                                    ".$i." </a>";     

              }   

            };     

            echo $pageURL;    

            if($page_number<$total_pages){   

                echo "<a href='view1.php?colum=$colums&order=$asc_or_desc&age=$age&gender=$gender&hobbies=$hobbies&city=$city&page=".($page_number+1)."&search=$search' >  Next </a>";   

            }     
        }
          ?>    
    </center> 
    <?php

// Check if delete button active, start this 

if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];
    //  foreach ( $checkbox as $id ) {
    //     $sql1 = "DELETE FROM crud WHERE id=".$id;
    // }
    for($i=0;$i<count(array($checkbox));$i++)
    {

        $del_id = $_POST['checkbox'][$i];
        $sql1 = "DELETE FROM crud WHERE id=".$del_id;
        //$sql1.= "('".implode("','",array_values($_POST['checkbox']))."')";
        //$result = mysqli_query($conn,$sql1);
        print_r($sql1);
    } 
   

    if($result)
    {
        echo "recorde deleted";
    }
}
?> 