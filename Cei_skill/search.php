<?php
// Starting session
session_start();
//if (!(isset($_SESSION['eid'])))
//	header("Location: index.php");
//else
//{
$_SESSION['sid']=NULL;
$_SESSION['type']=NULL;
if(!(isset($_SESSION['adminupdate'])))
	$_SESSION['adminupdate']=0;
?>
<!DOCTYPE html>

<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Search</title>
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
	.formboxes_sel{
			color: #28a5df; 
		width: 50%; 
		font-size: 18px; 
		background-color: transparent; 
		border-radius: 5px; 
		border: 2px solid #28a5df;
		}
		select[multiple="true"]
		{
			height: 100%
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
	<!-- header 
   ================================================== -->
   <header> 

   	<div class="header-logo">
	      <a href="index.php">Search</a>
	   </div> 

		<a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a> 

		<nav id="menu-nav-wrap">

			<a href="#0" class="close-button" title="close"><span>Close</span></a>	

	   	<h3>Search.</h3>  

			<ul class="nav-list">
				<li ><a href="index.php" title="">Home</a></li>
				<li class="navbx text-uppercase"><a href="admin.php" title="">Details</a></li>
				<li class="navbx text-uppercase"><a href="addskill.php" title="">Add Skills</a></li>
				<?php
					if($_SESSION['stat']=='a')	
					{
				?>
				<li class="navbx text-uppercase"><a href="newemp.php" title="">New Employee</a></li>
				<li class="navbx text-uppercase"><a href="nskill.php" title="">New Skill</a></li>	
				<?php
					}
				?>
				<li class="navbx text-uppercase"><a href="upski.php" title="">Update Skills</a></li>
			<li class="navbx text-uppercase"><a href="chpa.php" title="">Change Password</a></li>
				<li class="navbx text-uppercase"><a href="logout.php" title="">Logout</a></li>					
			</ul>	
		</nav>  <!-- end #menu-nav-wrap -->

	</header> <!-- end header -->  


   <!-- home
   ================================================== -->
   <section id="home">

   	<div class="overlay"></div>

   	<div class="home-content-table">	
		   <div class="home-content-tablecell">
		   	<div class="row">
		   		<div class="col-twelve">
					<?php
		if($_SESSION['adminupdate'] == 1)
		{
	  ?>
	  <b style="color: green"><br/>User's account has been blocked<br/></b>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
		else if($_SESSION['adminupdate'] == 2)
		{
	  ?>
	  <b style="color: green"><br/>User's account has been unblocked<br/></b>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
		else if($_SESSION['adminupdate'] == 3)
		{
	  ?>
	  <b style="color: green"><br/>User has been given admin access<br/></b>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
		else if($_SESSION['adminupdate'] == 4)
		{
	  ?>
	  <b style="color: green"><br/>User's admin access has been removed<br/></b>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
		else if($_SESSION['adminupdate'] == 5)
		{
	  ?>
	  <p style="color: green"><br/>User's account details could not be updated<br/></p>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
		else if($_SESSION['adminupdate'] == 0)
		{
	  ?>
	  <b><br/><br/></b>
	  <?php
		$_SESSION['adminupdate'] = 0;
		}
	?>
	<?php
										//echo "trigger";
										$port = getenv('S2G_mysqli_PORT');
										$dbhost = 'localhost'.$port;	
										$dbuser = 'root';
										$dbpass = '';
										$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
										mysqli_select_db($connect,'employee_db');
										$query_select='SELECT skillnam FROM skill';
										$result=mysqli_query($connect,$query_select);
										
										//$r=mysqli_fetch_array($result);
										
										//print_r($r);
										?>
			  		<br/><h2 style="color: white; font-size:150%">Please Enter Search Keyword</h2><br/><br/>
			  				<center>
							<form action = "search1.php" method="POST" name="regis">
								<div id="kw"><input type="text"  name="keyword" placeholder="Keyword" ></div><br/>
								<div>Search Using : &nbsp; &nbsp; &nbsp;
									<input type="radio"  name="type" required value="e" onchange="emp()" checked>Employee ID &nbsp; &nbsp;</input>
									<input type="radio"  name="type" value="s" onchange="sk()">Skill</input>
								</div><br/>
								<input type="submit" value="Search">
							</form>
							</center>
			  		</div> <!-- end col-twelve --> 
		   	</div> <!-- end row --> 
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->
	 </section> <!-- end home -->


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
//}
?>
   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
</section>

<script type="text/javascript">
	function emp()
	{
		document.getElementById("kw").innerHTML = "<input type='text'  name='keyword' placeholder='Keyword' />";
	}
	function sk()
	{
		var innerdata ="<select id='sel' name='keyword[]' class='formboxes_sel' placeholder= 'SKILL' style='width:18%;'>";
			innerdata =innerdata+"<option value=''>---</option>";
									<?php
											while($r=mysqli_fetch_array($result))
											{
										?>
											innerdata =innerdata +"<option value='<?php echo $r['skillnam']; ?>'><?php echo $r['skillnam']; ?></option>";
										<?php
											}
										?>
									innerdata = innerdata +"</select>";
									innerdata = innerdata +"<button id = 'but' type='button' onclick='toggle(this)'>Multiple</button>";
		document.getElementById("kw").innerHTML = innerdata;
	}
	function toggle(button)
	{
		if(document.getElementById("sel").hasAttribute("multiple"))
		{
			document.getElementById("sel").removeAttribute("multiple");
			document.getElementById("but").innerHTML = "Multiple";
		}		
		else
		{
			document.getElementById("sel").setAttribute("multiple","true");
			document.getElementById("but").innerHTML = "Single";	
		}
	}

</script>

</body>
</html>