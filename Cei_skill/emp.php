<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{

							$eid=$_POST['eid'];
							$emid=$_POST['emid'];
							$port = getenv('S2G_mysqli_PORT');
							$dbhost = "localhost".$port;
							$dbuser = "root";
							$dbpass = "";
							$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
							$pa=rand();
							$hp=$pa.$eid;
							$hp=md5($hp);
							
							mysqli_select_db($connect,'employee_db');

							$query_select="INSERT INTO emp_details(empid,email,password,hpass) VALUES ('$eid','$emid','$pa','$hp')";
							
							mysqli_query($connect,$query_select);
							mysqli_close($connect);
							header("Location: newemp.php");
}
?>	