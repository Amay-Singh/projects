<?php

	$date = $_POST['date'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	
	$conn=oci_connect("SYSTEM","30xx525","localhost/orcl");
	$flag=0;
	$active=1;
	$query="SELECT * from flight where doj='$date' and frm='$from' and tdest='$to'";	
	$s=oci_parse($conn,$query);
	oci_execute($s);
	$i=0;
	while($row=oci_fetch_assoc($s))
	{
			$i=1;
			echo "<pre>";
			print_r($row);
			echo "</pre>";
	}
	if($i==0)
		echo"No Flight Available";
	oci_free_statement($s);
	oci_close($conn);
?>
