<?php
	session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{	
	
	$n=$_POST['size'];
	$del=$_POST['del'];
	$id=$_POST['sid'];
	$version = $_POST['version'];
	$last = $_POST['last-used'];
	$expy = $_POST['exp-year'];
	$expm = $_POST['exp-month'];
	$port = getenv('S2G_mysqli_PORT');
	$dbhost = "localhost".$port;
	$dbuser = "root";
	$dbpass = "";
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($connect,'employee_db');
	for($i=0; $i<$n; $i++)
	{
		$s=$id[$i];
		$query_select="UPDATE eskill SET ver='$version[$i]',lastused='$last[$i]',exp_y='$expy[$i]',exp_m='$expm[$i]',activ='$del[$s]' WHERE id='$s'";
		mysqli_query($connect,$query_select);
	}
	
	header("Location: upski.php");
}
?>