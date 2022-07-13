<?php
// Starting session
session_start();

		$a = $_POST['email'];
		$b = $_POST['pass'];
		$port = getenv('S2G_mysqli_PORT');
		$dbhost = "localhost".$port;
		$dbuser = "root";
		$dbpass = "";
		$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
		mysqli_select_db($connect,'employee_db');
		$query_select="SELECT * FROM emp_details where email='$a' OR empid='$a' OR phno='$a'";
		$result=mysqli_query($connect,$query_select);
		
		$row = mysqli_fetch_assoc($result);
		$eid=$row['empid'];
		$hp=$b.$eid;
		$hp=md5($hp);
		$query_select="SELECT * FROM emp_details where (email='$a' OR empid='$a' OR phno='$a') AND hpass='$hp'";
		$result=mysqli_query($connect,$query_select);
		$row = mysqli_fetch_assoc($result);
		if(empty($row))
		{
			$_SESSION['error']=1;
			header("Location: logo.php");
		}
		else if($row['activeindi']!='a')
		{
			$_SESSION['error']=2;
			header("Location: logo.php");
	
		}
		else 
		{
			$_SESSION['eid']=$row['id'];
			$_SESSION['error']=0;
			if($row['admin']=='1'){
				$_SESSION['stat']='a';
				
			}
			else{
				$_SESSION['stat']='e';
				
			}
			header("Location: admin.php");
		}

	?>
