<?php
// Starting session
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Login</title>
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
   <link rel="stylesheet" href="css/icons.css"> 

   <style type="text/css" media="screen">
   	#styles { 
   		background: white;
   		padding-top: 12rem;
   		padding-bottom: 12rem;
   	} 
		::placeholder{
		color : black;
		}
		
		



   </style>   

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

    <!--favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">
<?php
	if(!(isset($_SESSION['error'])))
	{
		$_SESSION['error']=0;
	
	}
?>
<!--
	<header>
		<div class="more animate-intro" style="margin-left:15%;margin-top:10%">
				  				<a class="button stroke" href="regis.html">
				  					Register
				  				</a>
				  			</div>	
	</header>
-->

   <!-- home
   ================================================== -->
   <section id="home-login">

   	<div class="overlay"></div>

   	<div class="home-content-table">	
		   <div class="home-content-tablecell">
		   	<div class="row">
		   		<div class="col-twelve">	
						
			  				<h3 class="animate-intro">Login</h3><br/>					
				  			<center>
							<?php
								
								if($_SESSION['error']==1)
								{
							?>
								<span style="color:red;font-size:20px;">Email ID or Password is Incorrect!<br/></span>
							<?php
								}
								else if($_SESSION['error']==2)
								{
							?>
								<span style="color:red;font-size:20px;">Contact Admin!</span><br/>
							<?php
								}
							?>
							<form action = "login.php" method="POST" name="login" style="margin-top: 50px;">
							
							<input type="text"  name="email" placeholder="User Name">
							<input type="password" name="pass" placeholder="password">
							<input type="submit" value="Login">							
							</form>
				  			<center>
													
				  			<div class="more animate-intro">
				  				<a class="button stroke" href="index.php">
				  					Back To Home
				  				</a>
				  			</div>						
				</div> <!-- end col-twelve --> 
		   	</div> <!-- end row --> 
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->

		
   </section> <!-- end home -->


  

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



   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>