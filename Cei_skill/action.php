<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
			if($_SESSION['p']=='d')
				$eid=$_SESSION['seid'];
			else
				$eid=$_SESSION['sid'];
			$a = $_POST['action'];
			$port = getenv('S2G_mysqli_PORT');
			$dbhost = "localhost".$port;
			$dbuser = "root";
			$dbpass = "";
			$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
			mysqli_select_db($connect,'employee_db');
			if($a=='Block')
			{
				$query_select="UPDATE emp_details SET activeindi='ad' WHERE email='$eid' OR empid='$eid' OR phno='$eid'";
				$_SESSION['adminupdate'] = 1;
			}
			else if($a=='Unblock')
			{
				$query_select="UPDATE emp_details SET activeindi='a' WHERE email='$eid' OR empid='$eid' OR phno='$eid'";
				$_SESSION['adminupdate'] = 2;
			}
			else if($a=='Give Admin Access')
			{
				$query_select="UPDATE emp_details SET admin='1' WHERE email='$eid' OR empid='$eid' OR phno='$eid'";
				$_SESSION['adminupdate'] = 3;				
			}
			else if($a=='Remove Admin Access')
			{
				$query_select="UPDATE emp_details SET admin='0' WHERE email='$eid' OR empid='$eid' OR phno='$eid'";
				$_SESSION['adminupdate'] = 4;				
			}
			else
			{
				$_SESSION['adminupdate'] = 5;
			}
			mysqli_query($connect,$query_select);
			header("Location: search.php");
}
?>