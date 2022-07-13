<?php

	$name = $_POST['name'];
	$sno = $_POST['sno'];
	$dept = $_POST['dep'];
	$arriv = $_POST['arrival'];
	$date=$_POST['doj'];
	
	if($conn=oci_connect("SYSTEM","30xx525","localhost/orcl"))
		echo "connected";
	else
		echo "not connected";
	$flag=0;
	$active=1;
	$query="INSERT INTO bus(name,serialno,frm,tdest,doj) VALUES('$name','$sno','$dept','$arriv','$date')";	
	$s=oci_parse($conn,$query);
	oci_execute($s);
	header("Location:login.php");
	oci_free_statement($s);
	oci_close($conn);
?>
