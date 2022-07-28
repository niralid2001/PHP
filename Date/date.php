
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DATE</title>
</head>
<body ><center><font size="7"><u>SELECT DATE</u></font><br><br>
<form  method="POST">
             <table cellspacing="10">
                <tr>
                    <td id="text">Start Date:</td>
                    <td><input id="date1" type="date" name="date1"></td>
                </tr>
                <tr>
                    <td id="text">End Date:</td>
                    <td><input id="date2" type="date" name="date2"></td>
                </tr>
                <tr>
                    <td id="text"><input id="button1" type="submit" value="Check different" name="submit"></td>
                    <td><input id="button2" type="reset" value="Reset"></td>
                </tr>

             </table>
        </form>
</body>
</html>

<?php
 
  if(isset($_POST['submit']))
  {
	  	if($_POST['date1'] > $_POST['date2'])
	  	{
	  		echo "plzzz...select End-date is grater than start-date";
	  	}
	  	else
	  	{


		  	$start_date = strtotime($_POST['date1']);
		  	$end_date = strtotime($_POST['date2']);
		 	$interval = $end_date - $start_date;
		 	$days  = $interval / 86400;
		 	echo "Different between start & end : $days days";
		  	//echo "Difference between two dates: "
		      //. ($end_date - $start_date)/60/60/24;
	  }
  }
?>
