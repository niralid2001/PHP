<center><?php 
session_start();
if(isset($_SESSION["user"]))
{ 
    $conn=mysqli_connect('localhost','root','','db');
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
    </body>
    <?php 
          $limit = 5;    

            // update the active page number

            if (isset($_GET["page"])) {    

                $page_number  = $_GET["page"];    

            }    

            else {    

              $page_number=1;    

            }       

            // get the initial page number

            $initial_page = ($page_number-1) * $limit;       

            // get data of selected rows per page 

            $getQuery = "SELECT * FROM crud LIMIT $initial_page, $limit";     

            $result = mysqli_query ($conn, $getQuery);    

        ?>

    <?php
    	if (mysqli_num_rows($result) > 0) {
    ?>
    <br><br><br>
    <font size=7><u>DATA</u></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="record" placeholder="search recorde by id..." value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>">
    <input type="submit" name="search" value="search"  onclick="location.href = 'http://localhost/PHP-training%20loopcon/crud/search1.php';">



      <table border="1" cellpadding="0" cellspacing="0">
      
      <tr>
      	<td>id</td>
        <td>name</td>
        <td>age</td>
        <td>gender</td> 
         <td>hobbies</td> 
          <td>city</td> 
        <td>file</td> 
        
        <td colspan="8" align="center"> action </td>
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


     <div class="Items">
    <center><?php  

            $getQuery = "SELECT COUNT(*) FROM crud";     

            $result = mysqli_query($conn, $getQuery);     

            $row = mysqli_fetch_row($result);     

            $total_rows = $row[0];              

        echo "</br>";            

            // get the required number of pages

            $total_pages = ceil($total_rows / $limit);     

            $pageURL = "";             

            if($page_number>=2){   

                echo "<a href='view.php?page=".($page_number-1)."'>  Prev </a>";   

            }                          

            for ($i=1; $i<=$total_pages; $i++) {   

              if ($i == $page_number) {   

                  $pageURL .= "<a class = 'active' href='view.php?page="  

                                                    .$i."'>".$i." </a>";   

              }               

              else  {   

                  $pageURL .= "<a href='view.php?page=".$i."'>   

                                                    ".$i." </a>";     

              }   

            };     

            echo $pageURL;    

            if($page_number<$total_pages){   

                echo "<a href='view.php?page=".($page_number+1)."'>  Next </a>";   

            }     

          ?>    

          </div>    

          <!-- <div class="inline">   

          <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   

          placeholder="<?php echo $page_number."/".$total_pages; ?>" required>   

          <button onClick="go2Page();">Go</button>   

         </div>  -->   

        </div>   

      </div>  

    </center>   

      <script>   

        function go2Page()   

        {   

            var page = document.getElementById("page").value;   

            page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   

            window.location.href = 'view.php?page='+page;   

        }   

      </script>  
    </body>
    </html>
    <?PHP 
}
    ?>
</center>
