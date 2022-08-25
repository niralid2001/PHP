<!-- <script type="text/javascript">
// ajax script for getting state data
   $(document).on('change','#age', function(){
      var ageID = $(this).val();
      if(ageID){
          $.ajax({
              type:'POST',
              url:'ajax.php',
              data:{'id':age},
              success:function(result){
                  $('#gender').html(result);
                 
              }
          }); 
      }else{
          $('#gender').html('<option value="">gender</option>');
          $('#hobbies').html('<option value=""> hobbies </option>');
          $('#city').html('<option value=""> city </option>') 
      }
  });
    // ajax script for getting  city data
   $(document).on('change','#gender', function(){
      var genderID = $(this).val();
      if(genderID){
          $.ajax({
              type:'POST',
              url:'view1.php',
              data:{'id':gender},
              success:function(result){
                  $('#hobbies').html(result);
                 
              }
          }); 
      }else{
          $('#hobbies').html('<option value="">hobbies</option>');
          $('#city').html('<option value="">city</option>')
          
      }
  });
   $(document).on('change','hobbies',function(){
    var hobbiesID = $(this).val();
    if(hobbiesID){
        $.ajax({
            type:"POST",
            url:'view1.php'
            data:{'id':hobbies},
            success:function(result){
                $('#city').html(result);
            }
        });
    }else{
        $('#city').html('<option value="">city</option>')
    }
   });
   $(document).on('change','city',function(){
    var cityID = $(this).val();
    if(cityID){
        $.ajax({
            type:"POST",
            url:'view1.php'
            data:{'id':city},
            success:function(result){
                $('#city').html(result);
            }
        });
    }
   });

   </script> -->

<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location:login.php');
    }
    $conn=mysqli_connect('localhost','root','','db');

    if(!empty($_POST['id']))
    {
        $query="SELECT gender FROM crud where id=".$_POST['id']." ";
        $result=$db->query($query);

        if($result->num_rows > 0)
        {
           echo '<option value="">gender</option>'; 
           while($row=$result->fetch_assoc())
           {
            echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';
           }
        }
                    
    }
?>