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
          <span style="color: black">WELCOME! <br><br>Please add your company's flight below</span>
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
					<form method="post" action='added.php'>
						<input name="name" type="text" id="name" required class="form"  placeholder="Airways Name"><br><br>
						<input name="sno" type="number" class="form"  id="serialno" placeholder="Serial NO"><br><br>
						<input name="dep" type="text" id="dep" placeholder="Departure"><br><br>
						<input name="arrival" type="text" id="arrival" placeholder="Arrival"><br><br>
						<input name="doj" type="text" id="dod" placeholder="DateOfDeparture"><br><br>
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
      </section>
    </main>
	  </body>
</html>