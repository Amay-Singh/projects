<?php
	session_start();

	$empid = $_POST['EmpId'];
	$email = $_POST['Email'];
	$p = md5(rand());
	$pass=substr("$p", 0, 15);
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
	$insertquery = "INSERT INTO empdetails (empid, email,  pwd) VALUES ('$empid', '$email', '$pass')";
	
	if(mysql_query($insertquery , $connect))
	{
		$_SESSION['error'] = 1;
		header("Location:add.php");
	}
	else
	{
		$_SESSION['error'] = 2;
		header("Location:add.php");
	}
	mysql_close($connect);
?>
