<?php
include 'db.php';
$searchErr = '';
$employee_details='';
if(isset($_GET['search']))
{
    if(!empty($_GET['record']))
    {
        $search = $_GET['record'];
        $stmt = $conn->prepare("select * from crud where id like '%$id%' or name like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}

?>

<?php 
include 'db.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM crud WHERE id='$id'";
    $query_num = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_num>0))
    {
        foreach($query_num as $row)
        {
            echo $row['name'];
        }
    }
    else
    {
        echo "no recorde found";
    }
}
?>