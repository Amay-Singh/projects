<?php
	session_start();
	if (!(isset($_SESSION['eid'])))
		header("Location: index.php");
	else
	{
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>New Skill- Admin</title>
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
   </style>   

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

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
	      <a href="index.php">Infinity</a>
	   </div> 

		<a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a> 

		<nav id="menu-nav-wrap">

			<a href="#0" class="close-button" title="close"><span>Close</span></a>	

	   	<h3>New Skill</h3>  

			<ul class="nav-list">
				<li class="current"><a href="index.php" title="">Home</a></li>
				<li><a href="search.php" title="">Search</a></li>
				<li><a href="admin.php" title="">Details</a></li>
				<li><a href="addskill.php" title="">Add Skills</a></li>
				<li><a href="newemp.php" title="">New Employee</a></li>
				<li><a href="upski.php" title="">Update Skills</a></li>
			<li><a href="chpa.php" title="">Change Password</a></li>
				<li><a href="logout.php" title="">Logout</a></li>
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
						<div style="margin-bottom:100px;">
			  				<h1 style="font-size:60px;" >Enter the new skill to be added.</h1>
						</div>
				  			<h3 class="animate-intro"><center>
							<form name="skill" action="skill.php" method="post">
								<div style="margin-bottom:30px;"><input type="text" name="skill" placeholder="skill name"></div>
								<div><input type="submit" value="Add"></div>
							</center></form>
				  			</h3>						

			  		</div> <!-- end col-twelve --> 
		   	</div> <!-- end row --> 
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->
   </section> <!-- end home -->
	<!-- footer
   ================================================== -->
	

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

</body>

</html>