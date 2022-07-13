<?php
// Starting session
session_start();
$_SESSION['error']=0;
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>CEI - Skills</title>
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

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="tophome">

	<!-- header 
   ================================================== -->
   <header> 

   	<div class="header-logo" style="text-align:center;">
	      <a href="index.php"><img src="images/logo.jpg" width="100px" height="50px"></a>
	   </div>

  	

		<a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a> 

		<nav id="menu-nav-wrap">

			<a href="#0" class="close-button" title="close"><span>Close</span></a>	

	   	<h3>CEI.</h3>  

			<ul class="nav-list">
				<li class="current"><a class="smoothscroll" href="#home" title="">Home</a></li>
				<li><a class="smoothscroll" href="#about" title="">About</a></li>
				<li><a class="smoothscroll" href="#services" title="">Services</a></li>
				<li><a class="smoothscroll" href="#contact" title="">Contact</a></li>			
		<?php
			if(isset($_SESSION['eid']))
			{
				if(($_SESSION['stat'] =='e'))
				{
		?>	
				<li class="current"><a href="admin.php" title="">Details</a></li>
				<li><a href="addskill.php" title="">Add Skills</a></li>
				<li><a href="search.php" title="">Search</a></li>
		<?php
				}
				else
				{
		?>
				<li><a href="admin.php" title="">Details</a></li>
				<li><a href="addskill.php" title="">Add Skills</a></li>
				<li><a href="search.php" title="">Search</a></li>
				<li><a href="newemp.php" title="">New Employee</a></li>
				<li><a href="nskill.php" title="">New Skill</a></li>
		<?php
				}
		?>
			<li><a href="upski.php" title="">Update Skills</a></li>
			<li><a href="chpa.php" title="">Change Password</a></li>
			<li><a href="logout.php" title="">Logout</a></li>
		<?php
			}
			else
			{
		?>
				<li><a href="logo.php" id="se">Login</a></li>		
		<?php
			}
		?>
		</ul>	
		

			<ul class="header-social-list">
	         <li>
	         	<a href="http://www.facebook.com/computerenterprisesinc"><i class="fa fa-facebook-square"></i></a>
	         </li>
	         <li>
	         	<a href="https://twitter.com/CEIAmerica"><i class="fa fa-twitter"></i></a>
	         </li>
				<li><a href="https://www.linkedin.com/company/cei-ceiamerica-com"><i class="fa fa-linkedin"></i></a></li>
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
			  		
			  				<h3 class="animate-intro">CEI.</h3>
				  			<h1 class="animate-intro">
							We Help Top Firms<br/>
							Cut Cost And Improve QA
				  			</h1>	

				  			<div class="more animate-intro">
				  				<a class="smoothscroll button stroke" href="#about">
				  					Learn More
				  				</a>
				  			</div>							

			  		</div> <!-- end col-twelve --> 
		   	</div> <!-- end row --> 
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->

		<ul class="home-social-list">
	      <li class="animate-intro">
	        	<a href="http://www.facebook.com/computerenterprisesinc"><i class="fa fa-facebook-square"></i></a>
	      </li>
	      <li class="animate-intro">
	        	<a href="https://twitter.com/CEIAmerica"><i class="fa fa-twitter"></i></a>
	      </li>
	      <li class="animate-intro">
				<a href="https://www.linkedin.com/company/cei-ceiamerica-com"><i class="fa fa-linkedin"></i></a>	      
		  </li>				
	   </ul> <!-- end home-social-list -->	

		<div class="scrolldown">
			<a href="#about" class="scroll-icon smoothscroll">		
		   	Scroll Down		   	
		   	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			</a>
		</div>			
   
   </section> <!-- end home -->


   <!-- about
   ================================================== -->
   <section id="about">

   	<div class="row about-wrap">
   		<div class="col-full">

   			<div class="about-profile-bg"></div>

				<div class="intro">
					<h3 class="animate-this">About Us</h3>
	   			<!--<p class="lead animate-this" style="width:'20px';"><span>CEI</span> is a creative digital agency based in Manila, Philippines. We are composed of creative designers and experienced developers.	As a trusted technology partner, CEI delivers solutions that help our customers 
								transform their business and achieve meaningful results. From strategy and custom 
								application development through application management – our technology and digital 
								experience services are tailored to meet each unique need of our customers. Our staffing 
								solutions bring specialized skills to complement our customers’ workforce and project requirements. 
								It has always been our mission to deliver the highest quality services with exceptional customer service. 
								Our mission is a commitment to our customers, partners, employees and shareholders. 
								It shapes CEI’s culture and defines the character of our company – past, present and future.
								</p>-->
					<p style="font-size:20px;">
					<span>CEI</span> is a creative digital agency based in Manila, Philippines. We are composed of creative designers and experienced developers.	As a trusted technology partner, CEI delivers solutions that help our customers 
								transform their business and achieve meaningful results. From strategy and custom 
								application development through application management – our technology and digital 
								experience services are tailored to meet each unique need of our customers. Our staffing 
								solutions bring specialized skills to complement our customers’ workforce and project requirements. 
								It has always been our mission to deliver the highest quality services with exceptional customer service. 
								Our mission is a commitment to our customers, partners, employees and shareholders. 
								It shapes CEI’s culture and defines the character of our company – past, present and future.
								</p>
				</div>   

   		</div> <!-- end col-full  -->
   	</div> <!-- end about-wrap  -->

   </section> <!-- end about -->


   <!-- about
   ================================================== -->
   <section id="services">

   	<div class="overlay"></div>
   	<div class="gradient-overlay"></div>
   	
   	<div class="row narrow section-intro with-bottom-sep animate-this">
   		<div class="col-full">
   			
   				<h3>Services</h3>
   			   <h1>What We Do.</h1>
   			
   			   <p class="lead">We provide a wide variety of services for our clients to help them achieve business excellence. To best manage your projects, we’ve structured our business practice into three divisions; Solutions, Consulting, and Managed Services.</p>
   			
   	   </div> <!-- end col-full -->
   	</div> <!-- end row -->

  


	<!-- contact
   ================================================== -->
   <section id="contact">

      <div class="overlay"></div>

		<div class="row narrow section-intro with-bottom-sep animate-this">
   		<div class="col-twelve">
   			<h3>Contact</h3>
   			<h1>Get In Touch.</h1>

   			<p class="lead">We are always looking for new projects and challenges. For business inquiries, use the contact given below.</p>
   		</div> 
   	</div> <!-- end section-intro -->

   	<div class="row contact-content">

   		

         <div class="col-four tab-full contact-info end animate-this">

         	<h5>Contact Information</h5>

         	<div class="cinfo">
	   			<h6>Where to Find Us</h6>
	   			<p>
	            	Pittsburgh, PA
					Corporate Headquarters
					1000 Omega DriveSuite 1150
					Pittsburgh, PA 15205
	            </p>
				<p>
					Washington, D.C.
					901 K Street NW, Suite 300
					Washington, D.C. 20001

				</p>
				<p>
				Philadelphia, PA
				3025 Chemical Rd.Suite 112
				Plymouth Meeting, PA 19462

				</p>
	   		</div> <!-- end cinfo -->
			
	   		<div class="cinfo">
	   			<h6>Call Us At</h6>
	   			<p>
	   				Phone: (412) 341.3541<br>
				     	Fax: (412) 341.0519

	   		</div>

         </div> <!-- end cinfo --> 

   	</div> <!-- end row contact-content -->
		
	</section> <!-- end contact -->

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
		   <a class="smoothscroll" title="Back to Top" href="#tophome">
		   	<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
		   </a>
		</div>		
   </footer>

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
	<script>
		if($_SESSION['eid']==null)
			document.getElementById('se').style.display = none;
	</script>
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>