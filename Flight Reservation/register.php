<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>Airplane Ticket Reservation Registration</title>
	<style>
		.background-image{
		opacity: 0.9;
		filter: alpha(opacity=90);
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
	
	textarea{
		resize: none;
	}
		
	</style>
	<script type= "text/javascript" src = "js/countries.js"></script>
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-primary-dott full-width sticky">          
      </nav>
    </header>
    
    <!-- MAIN -->
    <main role="main">    
      <!-- Header -->
      <header class="section-top-padding background-image text-center" style="background-image:url(register.jpg);">
        <h1 class="text-s-size-40 text-m-size-50 text-size-50 text-line-height-1 margin-bottom-100 margin-top-150" style="font-weight: 500; text-outline: 1px black; color: white;">
          <span style="color: black">WELCOME! <br><br>Please register below</span>
        </h1><br>
		<div>
			<br><br><br><br>
		</div>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i><br><br>
      </header>
 
      <section class="section-top-padding background-white" style="padding-bottom: 100px;">
        <div class="line text-center">
          <!-- <i class="icon-sli-search" style="font-size: 40px; text-primary;"></i>  -->
          <h2 class="text-dark text-size-50 text-m-size-40"><b>REGISTER</b></h2>
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
					<form method="post" action='regis.php'>
						<input name="name" type="text" id="name" required class="form"  placeholder="Name"><br><br>
						<input name="email" type="email" class="form"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" placeholder="Email ID"><br><br>
						<input name="mob" type="text" class="form"  required class="form-control" pattern="[0-9]{10}" size="10" id="mob" placeholder="Mobile"><br><br>
						<input name="age" type="numeber" class="form" required placeholder="Age"><br><br>
						<select required class="form" name="type">
							<option value="S">User</option>
							<option value="B">Admin</option>
						</select><br><br>
						<div>
						<input type ="radio" name="gender" value="m" checked>Male
						<input type="radio" name="gender"  value="f">Female
						<div>
						<textarea name="address" rows="2" placeholder="Address" class="form"></textarea><br><br>
						<input name="state" type="text" class="form" required placeholder="State"><br><br>
						<input name="pwd" type="password" required class="form" id="pwd" placeholder="Password"><br><br>
						<input name="conf-pwd" type="password" required class="form" id="conf-pwd" onblur="check()" placeholder="Re-enter Password"><br>
						<div id="formbuttons">
							<br>
							<input name="submit" type="submit"  class="ContentButtons" id="submit" value="Register">&nbsp;
							<input name="reset" type="reset"  class="ContentButtons" id="reset" value="Reset" onclick="check()">
						</div>
					</form>
					<div id="txtregion"></div>
<div id="txtplacename"></div>
				</div>
				<div class="col-xs-2"></div>
			</div>
          </div>
        </div>
      </section>
    </main>
    
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