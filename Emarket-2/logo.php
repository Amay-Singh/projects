<?php 
	session_start(); 


    $username = $_POST["UserName"];
    $password = $_POST["Password"];
	$conn=oci_connect("SYSTEM","30xx525","localhost/orcl");
	$_SESSION['error'] = 0;
	$password=md5($password);
    $query = "SELECT * FROM cust WHERE custmail = '$username' AND hpas = '$password'";
	$s=oci_parse($conn,$query);
	echo $query;

    oci_execute($s);
	$row = oci_fetch_array($s, OCI_ASSOC);
	
	if(empty($row))
	{
		$_SESSION['error']=1;	
		header("Location:login.php");
	}
    else
    {
		$_SESSION['id'] = $row['custid'];
				header("Location:index.php");
			   
    }
	oci_free_statement($s);
	oci_close($conn);
?>
