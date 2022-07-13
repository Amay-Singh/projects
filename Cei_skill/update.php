<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{

							$id=$_SESSION['eid'];
							$fn=$_POST['fname'];
							$ln=$_POST['lname'];
							$a=$_POST['dob'];
							$e=$_POST['em'];
							$ph=$_POST['pno'];
							$ad=$_POST['add'];
							$g=$_POST['g'];
							$in=$_POST['in'];
							$port = getenv('S2G_mysqli_PORT');
							$dbhost = "localhost".$port;
							$dbuser = "root";
							$dbpass = "";
							$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
							mysqli_select_db($connect,'employee_db');
							$query_select="UPDATE emp_details SET fname='$fn',lname='$ln',email='$e',dob='$a',address='$ad',phno='$ph', gender='$g', inter='$in' WHERE id='$id'";
							mysqli_query($connect,$query_select);
							
							header("Location: admin.php");
							mysqli_close($connect);
}
?>
