<!DOCTYPE HTML>
<html>
 <head>
 <title>PHP Multi Page Form</title>
 </head>
 <body>
 <h2>PHP Multi Page Form</h2>
 <?php
 session_start();
 if (isset($_POST['phone'])) 
 {
    if (!empty($_SESSION['post']))
    {
        if (empty($_POST['firstname'])|| empty($_POST['lastname'])|| empty($_POST['phone']))
        { 
            $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
            header("location: form3.php"); 
        } 
        else 
        {
            foreach ($_POST as $key => $value) 
            {
                $_SESSION['post'][$key] = $value;
            } 
            extract($_SESSION['post']); 

            $vpassword = $password ;
            // $connection = mysql_connect("localhost", "root", "","db");
            // $db = mysql_select_db("phpmultipage", $connection); 
            include_once'formdb.php';

            $query = "INSERT INTO `form` (`email`,`password`,`twitter`,`github`,`website`,`firstname`,`lastname`,`phone`) values('$email','$vpassword','$twitter','$github','$website','$firstname','$lastname','$phone')";

            if (mysqli_query($conn,$query) ) 
            {
                echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
            } 
            else 
            {
                echo '<p><span>Form Submission Failed..!!</span></p>';
            } 
            unset($_SESSION['post']); // Destroying session.
        }
    } 
    else 
    {
        header("location: form1.php"); // Redirecting to first page.
    }
 } 
 else 
 {
    header("location: form1.php"); // Redirecting to first page.
 }
?>
 </body>
</html>