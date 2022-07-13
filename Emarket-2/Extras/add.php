<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>CEI Employees | Add</title>
	<link rel="shortcut icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
	<!--BLOODHOUND-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/typeahead.js"></script>
	<link href="css/typeahead.css"  rel="stylesheet" />
	<script type="text/javascript" rel="stylesheet"></script>		
	
	<style>
		.background-image{
		opacity: 0.7;
		filter: alpha(opacity=70);
		}
		.margin-top-250{
		margin-top: 250px;
		}
		.margin-bottom-100{
		margin-bottom: 100px;
		}
		* {
			box-sizing: border-box;
		}
		input.ContentButtons{
			width: 250px;
			padding: 10px;
			font-weight: bold;
			font-size: 125%;
			color: white;
			background: #28a5df;
			border: none;
		}
		input.ContentButtons:hover {
			color: #28a5df;
			background: #e6e6e6;
			border: none;
		}	
		.form-control{
		width: 100%;
		}
		
		.formboxes{
		color: #28a5df; 
		width: 50%; 
		height: 40px; 
		font-size: 18px; 
		background-color: transparent; 
		border-radius: 5px; 
		border: 2px solid #28a5df; 
		}
	</style>
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <?php
			if(!isset($_SESSION['id']))
	  {
		  header("Location:index.php");
	  ?>
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==1))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="index.php" class="logo">
              <img class="logo-white" src="CEI_Logo.jpg" alt="cei-logo">
			  <img class="logo-dark" src="CEI_Logo.jpg" alt="cei-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">Dashboard</a></li>
				<li><a href="update.php" style="font-size: 120%; color: black">Update</a></li>
				<li><a href="add.php" style="font-size: 120%; color: black">New Employee</a></li>
				
             </ul>
          </div>
          
          <!-- logo -->
          <ul class="logo-menu">
            <a href="https://www.ceiamerica.com/" class="logo" title="Computer Enterprises, Inc.">
              <img class="logo-white" src="CEI_Logo.jpg" alt="cei-logo">
			  <img class="logo-dark" src="CEI_Logo.jpg" alt="cei-logo">
            </a>
          </ul>
          
          <!-- right menu items -->
          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
				<li><a href="skill.php" style="font-size: 120%; color: black">New Skill</a></li>
				<li><a href="search.php" style="font-size: 120%; color: black">Search</a></li>
				<li><a href="password.php" style="font-size: 120%; color: black">Change Password</a></li>
				<li><a href="logout.php" style="font-size: 120%; color: black">Logout</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
		}
	  ?>
    </header>
    
    <!-- MAIN -->
    <main role="main">    
      <!-- Header -->
      <header class="section-top-padding background-image text-center" style="background-image:url(add.jpg);">
        <h1 class="text-extra-thin text-s-size-30 text-m-size-40 text-size-50 text-line-height-1 margin-bottom-100 margin-top-250" style="font-weight: bold;">
          Add <span style="color: white">new </span><span style="color: red">employee</span><!--<span style="color: #21a2de"> details!</span>-->
        </h1><br><br><br>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i>
      </header>
 
      <section class="section-top-padding background-white" style="padding-bottom: 100px;">
        <div class="line">
          <div class="margin2x">
            <div class="row" style="margin: 5% 0 5% 0; color: #28a5df">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align: center">
				<?php
					if($_SESSION['error'] == 1)
					{
				?>
						<br><span style="color:green">New employee has been successfully added to the database</span><br>
				<?php
						$_SESSION['error']=0;
					}
					else if($_SESSION['error'] == 2)
					{
				?>	
						<br><span style="color:red">New employee could not be added to the database</span><br>
				<?php
						$_SESSION['error']=0;
					}
				?>
					<form method="post" action="addemp.php">
						<div id="empid">
							<br>
							<input type="text" required name="EmpId" pattern="[c]+[e]+[i]+\d{6}" placeholder="Employee ID" class="formboxes" style="padding-left: 2px;">
						</div>
						<div id="email">
							<br>
							<input type="email" required name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email ID" class="formboxes" style="padding-left: 2px;">
						</div>
						<div id="formbuttons">
							<br><br>
							<input class="ContentButtons" type="submit" value="ADD EMPLOYEE"/>
							<input class="ContentButtons" type="reset" value="RESET">
						</div>
					</form>
				</div>
				<div class="col-xs-2"></div>
			</div>
          </div>
        </div>
      </section>
    </main>
    
    <!-- FOOTER -->
    <footer>
      <!-- Social -->
	  <div class="section-small-padding background-dark text-center">
		<b style="font-size: 125%; color: white;">Connect with us on:<b><br>
	  </div>
      <div class="background-primary padding text-center">
        <a href="http://www.facebook.com/computerenterprisesinc"><i class="icon-facebook_circle text-size-25 text-dark"></i></a> 
        <a href="https://twitter.com/CEIAmerica"><i class="icon-twitter_circle text-size-25 text-dark"></i></a>
		<a href="https://www.linkedin.com/company/cei-ceiamerica-com"><i class="icon-linked_in_circle text-size-25 text-dark"></i></a>  
        <a href="https://www.youtube.com/user/ceiamerica/featured"><i class="icon-sli-social-youtube text-size-25 text-dark"></i></a>
       <!-- <a href="http://blog.ceiamerica.com/"><i class="icon-instagram_circle text-size-25 text-dark"></i></a> -->                                                                      
      </div>
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line"> 
          <div class="margin2x">
            <div class="s-12 m-6 l-4 xl-4">
               <h2 class="text-white text-strong">Main Offices</h2>
               <p>
					<b class="text-size-20">Pittsburgh, PA: </b><address>Corporate Headquarters, <br>1000 Omega DriveSuite 1150, Pittsburgh, PA 15205</address> <br>
					<b class="text-size-20">Washington, D.C.: </b><address>901 K Street NW, Suite 300, <br>Washington, D.C. 20001</address> <br>
					<b class="text-size-20">Philadelphia, PA: </b><address>3025 Chemical Rd.Suite 112, <br>Plymouth Meeting, PA 19462</address> <br>
					<b class="text-size-20">Virginia Beach, VA: </b><address>1294 Diamond Springs Rd., <br>Suite 200, VA Beach, VA 23455</address>
               </p>
            </div>
            <div class="s-12 m-6 l-4 xl-4">
				<h2 class="text-white text-strong"> </h2><br><br>
               <p>
					<b class="text-size-20">Denver, CO: </b><address>1900 Wazee St.Suite 250, <br>Denver, CO 80202</address> <br>
					<b class="text-size-20">Orlando, FL: </b><address>833 North Magnolia Avenue, <br>Orlando, FL 32803</address> <br>
					<b class="text-size-20">Chennai, India: </b><address>6th Floor, The Oval, <br>10-12 Venkatanarayana Road, <br>T. Nagar, <br>Chennai 600017, India</address>
               </p>
            </div>
            <div class="s-12 m-6 l-4 xl-4">
               <h2 class="text-white text-strong margin-m-top-30">Support</h2>
               <a class="text-primary-hover" href="page.html">FAQ</a><br>      
               <a class="text-primary-hover" href="queries.php">Submit Queries</a><br>
               <a class="text-primary-hover" href="privacy-policy.html">Privacy Policy</a><br><br>
			   <h2 class="text-white text-strong margin-m-top-30">Contact Us</h2>
                <b><i class="icon-sli-screen-smartphone text-primary"></i> +91 9876 543 210</b><br>
                <a class="text-primary-hover" href="mailto:abc@ceiamerica.com"><i class="icon-sli-mouse text-primary"></i> abc@ceiamerica.com</a><br>
                <a class="text-primary-hover" href="mailto:abc123@ceiamerica.com"><i class="icon-sli-mouse text-primary"></i> abc123@ceiamerica.com</a>
            </div>
          </div>  
        </div>    
      </section>
      <div class="background-dark">
         <div class="line">
            <hr class="break margin-top-bottom-0" style="border-color: #777;">
         </div>
      </div>
      <!-- Bottom Footer -->
      <section class="padding-2x background-dark full-width">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-14">CEI</p>
            <p class="text-size-14">Computer Enterprises, Inc.</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12 text-primary-hover" href="anushasinha.html" title="Anusha Sinha">Developed by Anusha Sinha</a>
          </div>
        </div>  
      </section>
    </footer>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 

	</body>
</html>