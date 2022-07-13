<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$type = $_POST['type'];
	$pass = $_POST['conf-pwd'];
	$state= $_POST['state'];
	$age = $_POST['age'];
	$g=$_POST['gender'];
	$pass=md5($pass);
	$a=$_POST['address'];
	
	if($conn=oci_connect("SYSTEM","30xx525","localhost/orcl"))
		echo "connected";
	else
		echo "not connected";
	$flag=0;
	$active=1;
	$query="INSERT INTO cust(custmail,name,age,hpas,state,stat,mobno,adr,gender) VALUES ('$email','$name','$age','$pass','$state','$type','$mob','$a','$g')";	
	
	$s=oci_parse($conn,$query);
	oci_execute($s);
	header("Location:login.php");
	oci_free_statement($s);
	oci_close($conn);
?>
