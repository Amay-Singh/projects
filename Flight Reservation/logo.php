<?php 
	session_start(); 


    $username = $_POST['UserName'];
    $password = $_POST['Password'];
	echo $username;
	echo $password;
		if($username=='admin'&& $password=='admin')
			header("Location:addflight.php");
		else
		{
	if($conn=oci_connect("SYSTEM","30xx525","localhost/orcl"))
		echo "connected";
	else 
		echo "not connected";
	$_SESSION['error'] = 0;
	$password=md5($password);
    $query = "SELECT * FROM cust WHERE custmail = '$username' AND hpas = '$password'";
	$s=oci_parse($conn,$query);

    oci_execute($s);
	$row = oci_fetch_assoc($s);
	echo "<pre>";
	print_r($row);
	echo"</pre>";
	 
	if(empty($row))
	{
		
		$_SESSION['error']=1;	
		header("Location:login.php");
	}
    else
    {
		$_SESSION['id'] = $row['CUSTID'];
		header("Location:book.php");   
    }
	oci_free_statement($s);
	oci_close($conn);
		}
?>
