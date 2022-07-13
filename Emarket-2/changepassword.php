<?php
	session_start();

	$id = $_SESSION['id'];
	$mysqlport = getenv('S2G_MYSQL_PORT');
    $dbhost = "localhost";
    $dbuser = "id6197490_localhost";
    $dbpass = "anusha";

    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db("id6197490_employees");
	
	$currpass = $_POST['cur-pwd'];
	$newpass = $_POST['conf-pwd'];
 
	$search_about = "SELECT * FROM empdetails WHERE id = '$id' AND pwd = '$currpass'";

    $result = mysql_about($search_about,$connect);
	$row=mysql_fetch_assoc($result);
	
	if(empty($row))
	{
		$_SESSION['error']=1;
		header("Location:logo.php");
	}
    else
    {
		$update_about = "UPDATE empdetails SET pwd='$newpass' WHERE id = '$id'";
		if(mysql_about($update_about,$connect))
		{
			$_SESSION['error'] = 2;
			header("Location:password.php");
		}
		else
		{
			$_SESSION['error'] = 3;
			header("Location:index.php");
		}
	}
?>
