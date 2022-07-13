
<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
?><!DOCTYPE html>
<html>

<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Change Password</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css"> 

   <style type="text/css" media="screen">
   	#styles { 
   		background: white;
   		padding-top: 12rem;
   		padding-bottom: 12rem;
   	}      	
	input:disabled{
	}
	#show{
		  color : white;
	}
   </style>   

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">
		<?php
			
			$id=$_SESSION['eid'];
			$b = $_POST['cp'];
			$port = getenv('S2G_mysqli_PORT');
			$dbhost = "localhost".$port;
			$dbuser = "root";
			$dbpass = "";
			$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
			mysqli_select_db($connect,'employee_db');
			$query_select="SELECT * FROM emp_details where id='$id'";
			$result=mysqli_query($connect,$query_select);
			$row = mysqli_fetch_assoc($result);
			if(!(empty($row)))
			{
				$eid=$row['empid'];
				$hp=$b.$eid;
				$hp=md5($hp);
				$query_select="SELECT * FROM emp_details where id='$id' AND hpass='$hp'";
				$result=mysqli_query($connect,$query_select);
				$row = mysqli_fetch_assoc($result);
			
		?>
		
	<!-- header 
   ================================================== -->
   <header> 

   	<div class="header-logo">
	      <a href="index.php">Change Password</a>
	   </div> 

		
	</header> <!-- end header -->  


   <!-- home
   ================================================== -->
   <?php
				if(!(empty($row)))
				{			
   ?>
					<section id="home">

						<div class="overlay"></div>
	
							<div class="home-content-table">	
							<div class="home-content-tablecell">
							<div class="row">
							<div class="col-twelve">		   			
								<h2 style="color: white; font-size:150%">Please New Password</h2>
									<center><form action = "chp2.php" method="POST" name="regis">
										<div><input type="password" id="pass" name="p" placeholder="password"><br /></div>
										<div><input type="password" id="cpass" name="cp" placeholder="Confirm Password" onblur="pcheck()" ><p id="ptext" style="border-style: outset; border-radius = 4px; width:20px;display:none;"></p><br /></div>
										<div><input type="checkbox" onclick="visi()" id="show">Show Password<br /></div>
										<input type="submit" value="Change Password">
										<input type="text" style="display:none;" value="<?php echo $eid;?>" name="empid">
									</center></form>
		
								<button type="button" onclick="window.location.href='index.php'">Home</button>							

							</div> <!-- end col-twelve --> 
						</div> <!-- end row --> 
						</div> <!-- end home-content-tablecell --> 		   
						</div> <!-- end home-content-table -->
					</section> <!-- end home -->
	<?php
				}
				else
				{	
					//echo "<pre>";
					//print_r($row);
					//echo "</pre>";
					header("Location: chpa.php");
				}
			}
			else
			{
				header("Location: chpa.php");
			}
	?>

   <!-- styles
   ================================================== -->
	<section id="foot">
   	<div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Infinity 2016.</span> 
		         	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	
		         </div>		               
	      	</div>

      	</div>   	

      </div> <!-- end footer-bottom -->

      <div id="go-top">
		   <a class="smoothscroll" title="Back to Top" href="#top">
		   	<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
		   </a>
		</div>		
   </footer>

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 
   <?php
}
   ?>

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
   
</section>
<script>
function pcheck()
	{
		var x=document.getElementById('pass').value;
		var y=document.getElementById('cpass').value;
		document.getElementById('ptext').style.display='inline'
		if(x==y)
		{
			document.getElementById('ptext').style.color = 'green';
			document.getElementById('ptext').innerHTML="Passwords Match";
		}
		else
		{
			document.getElementById('ptext').style.color = 'red';	
			document.getElementById('ptext').innerHTML="Passwords Dont Match";
		}
	}


	function visi() {
		var x = document.getElementById("pass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		var x = document.getElementById("cpass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

</script>


</body>

</html>