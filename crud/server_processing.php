<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','db');
 
$query = $conn->query("SELECT count(id) FROM crud");
$totalRecords = $query->fetch_row()[0];
 
// $length = $_GET['length'];
// $start = $_GET['start'];
 
$sql = "SELECT * FROM crud";
 
if (isset($_GET['text']) && !empty($_GET['text']['value'])) {
    $search = $_GET['text']['value'];
    $sql .= " WHERE name like '%$text%' OR age like '%$text%'";
}
 
//$sql .= " LIMIT $start, $length";
 
$query = $conn->query($sql);
$result = [];
while ($row = $query->fetch_assoc()) {
    $result[] = [
        $row['id'],
        $row['log_id'],
        $row['name'],
        $row['age'],
        $row['gender'],
        $row['hobbies'],
        $row['city'],
        $row['file'],
        '',
    ];
}
 
echo json_encode([
    //'draw' => $_GET['draw'],
    'recordsTotal' => $totalRecords,
    'recordsFiltered' => $totalRecords,
    'data' => $result,
]);