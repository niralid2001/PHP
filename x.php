<?php 
session_start();
$conn = mysqli_connect('localhost','root','','db');
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$log_id = $_POST['log_id'];
		$qry = mysqli_query($conn,"SELECT * FROM `login` WHERE `email`= $email AND `log_id`=$log_id");
		$row = mysqli_fetch_array($qry);
		if($row['usertype']=="admin1")
		{
			echo "admin1's data";
		}
		elseif($row['usertype']=="admin2")
		{
			echo "admin2's data";
		}
		else
		{
			echo "all data";
		}

	}

	// admin1 ---admin1 inserted data dislay
	// admin2----admin2 inserted data display
	// // admin3----all data display
	// admin1 table1----admin2 table2
	// if (usertye == user1)
	// {
	// 	insert into table 1
	// }
	// elseif(usertype == user2)
	// {
	// 	insert into table 2
	// }
	// admin3 merge table 1 and table 2 
	// select * from table 1 join table 2 using column

?>