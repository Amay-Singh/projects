<?php
 session_start();
 if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
 
	$eid = $_SESSION['eid'];
	$skill = $_POST['skill'];
	$version = $_POST['version'];
	$last = $_POST['last-used'];
	$expy = $_POST['exp-year'];
	$expm = $_POST['exp-month'];
	$n = $_POST['skillsetcount'];
	$mysqliport = getenv('S2G_mysqli_PORT');
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db("employee_db");
	for($i=1; $i<=$n; $i++)
	{
		$skillname = $skill[$i];
		$versionused = $version[$i];
		$lastused = $last[$i];
		$expyr = $expy[$i];
		$expmon = $expm[$i];
		$selectquery = "SELECT * FROM skill WHERE skillnam='$skillname'";
		$result=mysqli_query($selectquery , $connect);
		$fetch=mysqli_fetch_assoc($result);
		if($fetch)
		{
		$sid=$fetch['skillid'];
		$insertquery = "INSERT INTO eskill (skillid, eid, ver, lastused, exp_y, exp_m) 
		VALUES ('$sid', '$eid', '$versionused', '$lastused', '$expyr', '$expmon')";
		mysqli_query($insertquery,$connect);
		}
		else
		{
			continue;
		}
		
	}
	header("Location: admin.php");
}
?>                                                    