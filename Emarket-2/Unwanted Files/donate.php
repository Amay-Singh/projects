<?php
	session_start();
?>


<!DOCTYPE html>
<html lang="en-US">

<?php
	$id = $_SESSION['id'];
	$mysqlport = getenv('S2G_MYSQL_PORT');
    $dbhost = "localhost";
    $dbuser = "id6197490_localhost";
    $dbpass = "anusha";

    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db("id6197490_employees");
 
    $search_query = "SELECT * FROM empdetails WHERE id = '$id'";
	$result = mysql_query($search_query,$connect);
	$row=mysql_fetch_assoc($result);
	$fname=$row['fname'];
	$lname=$row['lname'];
	$empid=$row['empid'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$intercom=$row['intercom'];
	$gender=$row['gender'];
	$dob=$row['dob'];
	$photo=$row['photo'];
?>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>CEI Employees | Change Password</title>
	<link rel="shortcut icon" href="images/logo.ico">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
	<link rel="stylesheet" href="css/custom.css">
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
	<style>
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

		form.search-bar input[type=text] {
			padding: 10px;
			font-size: 17px;
			border: 1px solid grey;
			float: left;
			width: 85%;
			background: #ffffff;
		}

		form.search-bar button {
			float: left;
			width: 15%;
			padding: 10px;
			background: white;
			color: #28a5df;
			font-size: 17px;
			border: 1px solid grey;
			border-left: none;
			cursor: pointer;
		}

		form.search-bar button:hover {
			background: #e6e6e6;
		}

		form.search-bar::after {
			content: "";
			clear: both;
			display: table;
		}
		
		input.ContentButtons{
			width: 250px;
			padding: 10px;
			font-weight: bold;
			font-size: 125%;
			color: white;
			background: #3B5998;
			border: none;
		}
		input.ContentButtons:hover {
			color: #3B5998;
			background: #e6e6e6;
			border: none;
		}	
		
		.error {color: #FF0000;}
		
.form {
font-weight: bold; 
padding-left: 5px; 
color: #3B5998 !important; 
width: 50%; 
height: 40px; 
font-size: 18px; 
background-color: transparent; 
border-radius: 5px; 
border: 2px solid; 
border-color: #3B5998 !important;
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
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==0)&&($_SESSION['student']==1))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">My Profile</a></li>
				<li><a href="donate.php" style="font-size: 120%; color: black">Donate</a></li>
				<li><a href="buy_sell.php" style="font-size: 120%; color: black">Buy Books</a></li>
             </ul>
          </div>
          
          <!-- logo -->
          <ul class="logo-menu">
            <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </ul>
          
          <!-- right menu items -->
          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
				<li><a href="buy_sell.php" style="font-size: 120%; color: black">Sell Books</a></li>
				<li><a href="queries.php" style="font-size: 120%; color: black">Queries</a></li>
				<li><a href="password.php" style="font-size: 120%; color: black">Change Password</a></li>
				<li><a href="logout.php" style="font-size: 120%; color: black">Logout</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==0)&&($_SESSION['student']==0))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">Profile</a></li>
				<li><a href="search.php" style="font-size: 120%; color: black">Search</a></li>
				
             </ul>
          </div>
          
          <!-- logo -->
          <ul class="logo-menu">
            <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </ul>
          
          <!-- right menu items -->
          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
				<li><a href="queries.php" style="font-size: 120%; color: black">Queries</a></li>
				<li><a href="password.php" style="font-size: 120%; color: black">Change Password</a></li>
				<li><a href="logout.php" style="font-size: 120%; color: black">Logout</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==1))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">My Profile</a></li>
				<li><a href="update.php" style="font-size: 120%; color: black">NGOs</a></li>
				
             </ul>
          </div>
          
          <!-- logo -->
          <ul class="logo-menu">
            <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </ul>
          
          <!-- right menu items -->
          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
				<li><a href="skill.php" style="font-size: 120%; color: black">Students</a></li>
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
      <header class="section-top-padding background-image text-center" style="background-image:url(images/register.jpg);">
        <h1 class="text-s-size-40 text-m-size-50 text-size-50 text-line-height-1 margin-bottom-100 margin-top-150" style="font-weight: 600; color: white;">
          Change Password <br><br>
        </h1><br><br>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i><br><br>
      </header>
 
      <section class="section-top-padding background-white" style="padding-bottom: 100px;">
        <div class="line text-center">
          <!-- <i class="icon-sli-search" style="font-size: 40px; text-primary;"></i>  -->
          <h2 class="text-dark text-size-50 text-m-size-40"><b>Change Password</b></h2>
          <hr class="break background-primary break-small break-center margin-bottom-50">
        </div>
        <div class="line">
          <div class="margin2x">
            <div class="row" style="margin: 5% 0 5% 0; color: #28a5df">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align: center">
				<?php
					if($_SESSION['error'] == 1)
					{
				?>
						<br><span style="color:red; font-size: 120%">Current password that you have entered is wrong!</span><br>
				<?php
						$_SESSION['error']=0;
					}
					else if($_SESSION['error'] == 2)
					{
				?>	
						<br><span style="color:green; font-size: 120%">Password has been changed successfully!</span><br>
				<?php
						$_SESSION['error']=0;
					}
				
					else if($_SESSION['error'] == 3)
					{
				?>	
						<br><span style="color:yellow; font-size: 120%">Password could not be changed due to some connection issues! Please try again later...</span><br>
				<?php
						$_SESSION['error']=0;
					}
				?>
					<form action="changepassword.php" method="post">
						<input name="curpwd" type="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="form" id="cur-pwd" placeholder="Current Password"><br><br>
						<input name="pwd" type="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="form" id="pwd" placeholder="New Password"><br><br>
						<input name="conf-pwd" type="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="form" id="conf-pwd" onblur="check()" placeholder="Re-enter New Password"><br>
						<p id="errormsg" style="display:none;"></p><br><br>
						<p style="color: #454545 !important"><strong>NOTE:</strong> Password is case sensitive and it must contain <br>at least one number and one letter, and at least 8 or <br>more characters</p><br>
						<input name="submit" type="submit"  class="ContentButtons" id="submit" value="Change Password">&nbsp;
						<input name="reset" type="reset"  class="ContentButtons" id="reset" value="Reset" onclick="reset()">
					</form>
				</div>
				<!-- <div class="col-xs-1">
					<div id="txt" style="font-weight: bold; font-size: 18px;"></div>
				</div> -->
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
					<b class="text-size-20">Pittsburgh, PA: </b><br><i class="text-size-20">Corporate Headquarters, <br>1000 Omega DriveSuite 1150, Pittsburgh, PA 15205</i> <br><br>
					<b class="text-size-20">Washington, D.C.: </b><br><i class="text-size-20">901 K Street NW, Suite 300, <br>Washington, D.C. 20001</i> <br><br>
					<b class="text-size-20">Philadelphia, PA: </b><br><i class="text-size-20">3025 Chemical Rd.Suite 112, <br>Plymouth Meeting, PA 19462</i> <br><br>
					<b class="text-size-20">Virginia Beach, VA: </b><br><i class="text-size-20">1294 Diamond Springs Rd., <br>Suite 200, VA Beach, VA 23455</i>
               </p>
            </div>
            <div class="s-12 m-6 l-4 xl-4">
				<h2 class="text-white text-strong"> </h2><br><br>
               <p>
					<b class="text-size-20">Denver, CO: </b><br><i class="text-size-20">1900 Wazee St.Suite 250, <br>Denver, CO 80202</i> <br><br>
					<b class="text-size-20">Orlando, FL: </b><br><i class="text-size-20">833 North Magnolia Avenue, <br>Orlando, FL 32803</i> <br><br>
					<b class="text-size-20">Chennai, India: </b><br><i class="text-size-20">6th Floor, The Oval, <br>10-12 Venkatanarayana Road, <br>T. Nagar, <br>Chennai 600017, India</i>
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
            <b class="right text-size-13">Developed by <a class="text-primary-hover" href="https://www.anushasinha.cf" title="Anusha Sinha">Anusha Sinha</a></b>
          </div>
        </div>  
      </section>
    </footer>
	<script>
		function check(){
			var p=document.getElementById("pwd").value;
			var c=document.getElementById("conf-pwd").value;
			document.getElementById("errormsg").style.display = 'inline';
			if(p!=c)
			{
				document.getElementById("errormsg").style.display = 'inline';
				document.getElementById("errormsg").style.color = 'red';
				document.getElementById("errormsg").innerHTML = "Passwords Don't Match"; 
			}
			else
			{
				document.getElementById("errormsg").innerHTML = " "; 
			}
			
		}
		function reset(){
			document.getElementById("errormsg").style.display = 'inline';
			document.getElementById("errormsg").innerHTML = " "; 
		}
		
	</script>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 
  </body>
</html>