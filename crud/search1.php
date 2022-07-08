<?php
include 'db.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['search']))
{
    if(!empty($_POST['record']))
    {
        $search = $_POST['record'];
        $stmt = $conn->prepare("select * from crud where id like '%$search%' or name like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>