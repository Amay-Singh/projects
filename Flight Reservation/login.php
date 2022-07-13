<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>Reservation System | Login</title>
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
    
    <header>
    
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
    
  
	
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 
  </body>
</html>