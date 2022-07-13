<?php
	session_start();

	$skill = $_POST['skillname'];
	$mysqlport = getenv('S2G_MYSQL_PORT');
	$dbhost = "localhost".$mysqlport;
	$dbuser = 'id6197490_localhost';
	$dbpass = 'anusha';
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	
	/* if($connect)
		echo "connection successful";
	else	
		echo "not connected";
	*/
	
	mysql_select_db('id6197490_employees');
	$insertquery = "INSERT INTO skills (skill) VALUE ('$skill')";
	if(mysql_query($insertquery , $connect))
	{
		$_SESSION['error'] = 1;
		header("Location:skill.php");
	}
	else
	{
		$_SESSION['error'] = 2;
		header("Location:skill.php");
	}
	//echo "New Skill could not be added to te database! Please try again after sometime...";
	mysql_close($connect);
?>

