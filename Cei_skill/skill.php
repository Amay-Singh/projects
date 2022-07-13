<?php
// Starting session
	session_start();
	if (!(isset($_SESSION['eid'])))
		header("Location: index.php");
	else
	{
		$id=$_SESSION['eid'];
		$port = getenv('S2G_mysqli_PORT');
		$dbhost = "localhost".$port;
		$dbuser = "root";
		$dbpass = "";
		$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
		mysqli_select_db($connect,'employee_db');
		$s=$_POST['skill'];
		$query_select="INSERT INTO skill(skillnam) VALUE ('$s')";
		if(mysqli_query($query_select,$connect))
		{	
			header("Location: nskill.php");
		}
	}
?> 
