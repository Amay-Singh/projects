<?php
	session_start();


	$fname = $_POST['FirstName'];
	$lname = $_POST['LastName'];
	$mobile = $_POST['Mobile'];
	$intercom = $_POST['Intercom'];
	$gender = $_POST['Gender'];
	$dob = $_POST['DOB'];
	//$photo = $_POST['Photo'];
	$id = $_SESSION['id'];
	$skill = $_POST['skill'];
	$version = $_POST['version'];
	$last = $_POST['last-used'];
	$expy = $_POST['exp-year'];
	$expm = $_POST['exp-month'];
	$n = $_POST['skillsetcount'];
	$_SESSION['skillcount'] = $n;
	$mysqlport = getenv('S2G_MYSQL_PORT');
	$dbhost = "localhost".$mysqlport;
	$dbuser = 'id6197490_localhost';
	$dbpass = 'anusha';
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	
	$i = 1;
	$count = 0;
	/* if($connect)
		echo "connection successful";
	else	
		echo "not connected";
	*/
	
 
	mysql_select_db('id6197490_employees');
	$updatequery = "UPDATE empdetails SET fname = '$fname', lname = '$lname', mobile = '$mobile', intercom = '$intercom', gender = '$gender', dob = '$dob' WHERE id='$id'";
	
	if(mysql_query($updatequery , $connect))
		$var=1;
	else
		$var=0;
	
	/*for($i=1; $i<=$n; $i++)
	{
		$skillname = $skill[$i];
		$versionused = $version[$i];
		$lastused = $last[$i];
		$expyr = $expy[$i];
		$expmon = $expm[$i];
		echo "$skillname" . " " . "$versionused" . " " . "$lastused" . " " . "$expyr" . " " . "$expmon";
		echo "<br>";
	}*/
	
	
		$selectquery1 = "SELECT * FROM empdetails WHERE id='$id'";
		$result=mysql_query($selectquery1 , $connect);
		$fetch=mysql_fetch_assoc($result);
		$eid=$fetch['id'];
	
	for($i=1; $i<=$n; $i++)
	{
		$skillname = $skill[$i];
		$versionused = $version[$i];
		$lastused = $last[$i];
		$expyr = $expy[$i];
		$expmon = $expm[$i];
		$selectquery2 = "SELECT * FROM skills WHERE skill='$skillname'";
		$result=mysql_query($selectquery2 , $connect);
		$fetch=mysql_fetch_assoc($result);
		$sid=$fetch['skillid'];
		$insertquery2 = "INSERT INTO empskills (skillid, id, version, lastused, expy, expm) VALUES ('$sid', '$eid', '$versionused', '$lastused', '$expyr', '$expmon')";	
		if(mysql_query($insertquery2 , $connect))
			$count = $count + 1;
	}
	if(($var==1)&&($count==$n))
	{
		$_SESSION['error'] = 1;
		header("Location: update.php");
	}
	else if(($var==1)&&($count!=$n))
	{
		$_SESSION['error'] = 2;
		header("Location: update.php");
	}
	else if(($var==1)&&($count==$n))
	{
		$_SESSION['error'] = 3;
		header("Location: update.php");
	}
	else
	{
		$_SESSION['error'] = 4;
		header("Location: update.php");
	}
	mysql_close($connect);
?>