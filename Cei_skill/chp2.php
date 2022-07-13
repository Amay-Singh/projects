<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
							
							$id=$_SESSION['eid'];
							$eid=$_POST['empid'];
							$pass=$_POST['p'];
							$hp=$pass.$eid;
							$hp=md5($hp);
							$port = getenv('S2G_mysqli_PORT');
							$dbhost = "localhost".$port;
							$dbuser = "root";
							$dbpass = "";
							$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
							mysqli_select_db($connect,'employee_db');
							$query_select="UPDATE emp_details SET password='$pass', hpass='$hp' WHERE id='$id'";
							mysqli_query($query_select,$connect);
							
								header("Location: admin.php");
							
}
?> 