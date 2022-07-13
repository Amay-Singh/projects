<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>E - Market | Login</title>
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
    <script type="text/javascript" src="js/jabout-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jabout-ui.min.js"></script>   
	<script src="https://ajax.googleapis.com/ajax/libs/jabout/3.3.1/jabout.min.js"></script>
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
		.forgot:hover{
			text-decoration: underline;
			opacity: 1.3;
			color: #3B5998;
		}
		.error {color: #FF0000;}
		
.form{font-weight: bold; padding-left: 5px; color: #3B5998; width: 50%; height: 40px; font-size: 18px; background-color: transparent; border-radius: 5px; border: 2px solid; border-color: #3B5998;}
		
	</style>
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="index.php" class="logo">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="login.php" style="font-size: 120%; color: black">Login</a></li>
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
				<li><a href="register.php" style="font-size: 120%; color: black">Register</a></li>
				<li><a href="about.php" style="font-size: 120%; color: black">about</a></li>
             </ul> 
          </div>
        </div>
      </nav>
    </header>
    
    <!-- MAIN -->
    <main role="main">    
      <!-- Header -->
      <header class="section-top-padding background-image text-center" style="background-image:url(login.jpg);">
        <h1 class="text-s-size-40 text-m-size-50 text-size-50 text-line-height-1 margin-bottom-100 margin-top-150" style="font-weight: 500; text-outline: 1px black; color: white;">
          WELCOME! <br><br>Please login to continue
        </h1><br>
		<div>
			<br><br><br><br>
		</div>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i><br><br>
      </header>
 
      <section class="section-top-padding background-white" style="padding-bottom: 100px;">
        <div class="line text-center">
          <!-- <i class="icon-sli-search" style="font-size: 40px; text-primary;"></i>  -->
          <h2 class="text-dark text-size-50 text-m-size-40"><b>LOGIN</b></h2>
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
						<br><span style="color:red; font-size: 120%">Invalid username or password</span><br>
				<?php
						$_SESSION['error']=0;
					}
				?>
					<form method="post" action='logo.php'>
						<div id="uname">
							<br>
							<!-- <i class="glyphicon glyphicon-user" style="font-size: 150%; font-weight: bold;"></i>  -->
							<i class="slow icon-sli-user text-primary margin-top-20 text-size-30">
							<input type="text" name="UserName" placeholder="User Name" class="form">
							</i>
						</div>
						<div id="pwd">
							<br>
							<i class="slow icon-sli-lock text-primary margin-top-20 text-size-30">
							<input type="password" name="Password"  placeholder="Password" class="form">
							</i>
							
							<!-- <br><i class="glyphicon glyphicon-exclamation-sign" style="font-size: 150%;"></i><b style="font-size: 100%;"> -->
							<br><br><p style="font-size: 110%; color: #3B5998"><strong><span style="color: red">NOTE: </span></strong> Password is case sensitive and it must contain at least <br>one number, one letter and at least 8 or more characters</p>
						</div>
						<div id="formbuttons">
							<br>
							<input class="ContentButtons" type="submit" value="LOGIN">
							<input class="ContentButtons" type="reset" value="RESET">
						</div>
						<div id="pwd-frgt">
							<br>
							<a class="forgot" href="" style="color: #3B5998; font-weight: bold; font-size: 115%;">Forgotten password?</a>
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
        <a href="https://www.facebook.com/vituniversity"><i class="icon-facebook_circle text-size-40"></i></a> &nbsp; 
        <a href="https://twitter.com/vit_univ"><i class="icon-twitter_circle text-size-40"></i></a> &nbsp;
		  <a href="https://plus.google.com/+VITUniversityVellore"><i class="icon-sli-social-google text-size-40"></i></a> &nbsp;
        <a href="https://www.youtube.com/c/VITUniversityVellore"><i class="icon-sli-social-youtube text-size-40"></i></a> &nbsp;
       <!-- <a href="http://blog.ceiamerica.com/"><i class="icon-instagram_circle text-size-25 text-dark"></i></a> -->                                                                      
      </div>
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line"> 
          <div class="margin2x">
            <div class="s-12 m-6 l-4 xl-4">
               <h2 class="text-white text-strong">Branches</h2><br>
               <p>
					<b class="text-size-20">Vellore, TN: </b><br><i class="text-size-20">MAIN BRANCH <br>Vellore Institute of Technology, <br>Vellore, Tamil Nadu, India - 632014</i> <br><br>
					<b class="text-size-20">Chennai, TN: </b><br><i class="text-size-20">Vellore Institute of Technology, Vandalur - Kelambakkam Road, <br>Chennai, Tamil Nadu - 600 127</i> <br><br>
               </p>
            </div>
            <div class="s-12 m-6 l-4 xl-4">
				<h2 class="text-white text-strong"> </h2><br><br>
               <p>
					<b class="text-size-20">Andhra Pradesh: </b><br><i class="text-size-20">Vellore Institute of Technology, <br>Inavolu, Beside AP Secretariat, <br>Amaravati, Andhra Pradesh - 522237</i> <br><br>
					<b class="text-size-20">Bhopal: </b><br><i class="text-size-20">Vellore Institute of Technology Bhopal, <br>Bhopal-Indore Highway, Kothrikalan, <br>Sehore, Madhya Pradesh - 466114</i>
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
               <a class="text-primary-hover" href="about.php">Submit about</a><br>
               <a class="text-primary-hover" href="privacy-policy.html">Privacy Policy</a><br><br>
			   <h2 class="text-white text-strong margin-m-top-30">Contact Us</h2>
                <b><i class="icon-sli-screen-smartphone text-primary"></i> +91 9876 543 210</b><br>
                <a class="text-primary-hover" href="mailto:info@vit.ac.in"><i class="icon-sli-mouse text-primary"></i> info@vit.ac.in</a><br>
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
            <p class="text-size-14">VIT University</p>
            <p class="text-size-14">Vellore Institute Of Technology</p>
          </div>
          <div class="s-12 l-6">
            <b class="right text-size-13">Developed by <a class="text-primary-hover" href="https://www.anushasinha.cf" title="Anusha Sinha">Anusha Sinha</a></b>
          </div>
        </div>  
      </section>
    </footer>
	
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 
  </body>
</html>