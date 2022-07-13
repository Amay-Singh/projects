<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">


<?php
	$id = $_SESSION['id'];
	$mysqlport = getenv('S2G_MYSQL_PORT');
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";

    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db("employees");
 
    $search_query = "SELECT * FROM empdetails WHERE id = '$id'";
	$result = mysql_query($search_query,$connect);
	$row=mysql_fetch_assoc($result);
?>

<head>
	<title>CEI Employees | Dashboard</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
		
		<style>
		body{
			margin: 0;
			padding: 0;
		}
		.ContentButtons{
			width: 150px;
			padding: 10px;
			font-size: 2rem;
			color: #28a5df;
			background: white;
			border: 1px solid grey;
		}
		.ContentButtons:hover {
			color: #28a5df;
			background: #e6e6e6;
		}
		.background-image{
		opacity: 0.7;
		filter: alpha(opacity=70);
		}
		.margin-top-150{
		margin-top: 150px;
		}
		.margin-bottom-100{
		margin-bottom: 100px;
		}
		* {
			box-sizing: border-box;
		}
		#thumbnail {
			border: 1px solid #cccccc;
			border-radius: 5px;
			padding: 5px;
			width: 150px;
		}
	
		#thumbnail:hover {
			box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);  <!-- (#008cba)  -->
		}
		
		address{
			font-size: 1.6rem;
			font-style: italic;
		}
		
		p{
			font-size: 2rem;
			color: black;
		}
		
		h2{
			font-size: 2rem;
		}
		</style>
	</head>
  
  
<body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <?php
		if(!(isset($_SESSION['id'])))
		{
			header("Location:index.php");
	  ?>
	  
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==0))
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
				<li><a href="update.php" style="font-size: 120%; color: black">Update</a></li>
				<li><a href="password.php" style="font-size: 120%; color: black">Change Password</a></li>
				<li><a href="logout.php" style="font-size: 120%; color: black">Logout</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
	  }
	  else
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
				<li><a href="newskill.php" style="font-size: 120%; color: black">New Skill</a></li>
				<li><a href="search.html" style="font-size: 120%; color: black">Search</a></li>
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


	
	<main role="main">    
      <!-- Header -->
       <header class="section-top-padding background-image text-center" style="background-image:url(images/register.jpg);">
        <h1 class="text-s-size-40 text-m-size-50 text-size-50 text-line-height-1 margin-bottom-100 margin-top-150" style="font-weight: 600; color: white;">
          Hi <?php echo $row['fname']." ".$row['lname']."!";?><br><br>
		  Welcome to your Dashboard
        </h1><br><br>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i><br><br>
        <!-- Image -->
        <!-- <img class="margin-top-20 center" src="App.jpg" height="50px" width="70px" alt="Apps"> -->
        
        <!-- dark full width arrow object -->
        <!-- <img class="arrow-object" src="img/arrow-object-dark.svg" alt=""> -->
      </header>
	
	<div id="maincontent" class="container-fluid" style="margin: 15% 0 10% 0;">
		<h2 class="text-dark text-size-40 text-center text-m-size-30"><b>EMPLOYEE DETAILS</b></h2>
		<hr class="break background-primary break-small break-center margin-bottom-50">		
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: center; margin: 2% 0 0 0;">
				<form>
					<h3 class="text-dark text-size-30 text-right" style="font-weight: bold; margin-right: 10%">PERSONAL DETAILS</h3>
					<br><br>
					<div class="text-left">
						<p>Name: <?php echo $row['fname']." ".$row['lname'];?><br><br>Employee ID: <?php echo $row['empid'];?><br><br>Email ID: <?php echo $row['email'];?><br><br>Mobile No.: <?php echo $row['mobile'];?><br><br>
							Intercom Extension: <?php echo $row['intercom'];?><br><br>Gender: <?php echo $row['gender'];?><br><br>D.O.B.: <?php echo $row['dob'];?></p><br><br><br>
					</div>
					<h3 class="text-dark text-size-30 text-right" style="font-weight: bold; margin-right: 25%">SKILLSET</h3>
					
					
				</form>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2" style="text-align: right; margin-top: 8%">
				<br><br>
				<a target="_blank" href="Employee-photo.jpg">
					<img id="thumbnail" src="Employee-photo.jpg" alt="Employee">
				</a>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="text-align: center; margin: 2% 0 0 0;">
				<div class="text-center">
						<table class="text-size-20">
						<tr class="text-center">
							<th>SKILL</th>
							<th>VERSION USED</th>
							<th>LAST USED</th>
							<th>EXPERIENCE</th>
						</tr>
						<tr>
							<td>HTML</td>
							<td>5.0</td>
							<td>2018</td>
							<td>3 years 1 month</td>
						</tr>
							<td>CSS</td>
							<td>3.0</td>
							<td>2018</td>
							<td>2 years 11 months</td>
						</tr>
						</table>
						
						<!-- <p>Skill:<br><br>Version:<br><br>Last Used:<br><br>Experience:<br></p>
						<hr class="break background-primary break-large break-center margin-bottom-50">
						<br>
						<p>Skill:<br><br>Version:<br><br>Last Used:<br><br>Experience:<br></p>  	 colspan="3" -->
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		</div>
	</div>
	</main>
	
	
		<footer>
			<div class="section-small-padding background-dark text-center">
		<b style="font-size: 1.7rem; color: white;">Connect with us on:<b><br>
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
            <!--<div class="s-12 m-6 l-3 xl-2">
               <h4 class="text-white text-strong margin-m-top-30">Term of Use</h4>
               <a class="text-primary-hover" href="page.html">Terms and Conditions</a><br>
               <a class="text-primary-hover" href="page.html">Refund Policy</a><br>
               <a class="text-primary-hover" href="page.html">Disclaimer</a>
            </div> -->
            <div class="s-12 m-6 l-4 xl-4">
               <h2 class="text-white text-strong margin-m-top-30">Support</h2>
               <a class="text-primary-hover" href="page.html">FAQ</a><br>      
               <a class="text-primary-hover" href="queries.php">Submit Queries</a><br>
               <a class="text-primary-hover" href="privacy-policy.html">Privacy Policy</a><br><br>
			   <h2 class="text-white text-strong margin-m-top-30">Contact Us</h2>
                <b><i class="icon-sli-screen-smartphone text-primary"></i> +91 9876 543 210</b><br>
                <a class="text-primary-hover" href="mailto:contact@sampledomain.com"><i class="icon-sli-mouse text-primary"></i> abc@ceiamerica.com</a><br>
                <a class="text-primary-hover" href="mailto:office@sampledomain.com"><i class="icon-sli-mouse text-primary"></i> abc123@ceiamerica.com</a>
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
	<?php mysql_close($connect);?>
	</body>

	</html>
