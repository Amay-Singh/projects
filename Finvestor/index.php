<?php

   session_start();

   if(empty($_SESSION['login'])){
     $_SESSION['login'] = "login.php";
     $_SESSION['state'] = "Log In";
     $_SESSION['username'] = "";
     $_SESSION['user_type'] = "";
     $_SESSION['log'] = false;
   }

   $list = "";

   if($_SESSION['log']==true){

     if($_SESSION['user_type'] == "c"){
       $list .=  "<li class='navbx text-uppercase dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dashboard<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                      <li class='navbx1 text-uppercase'><a href='getloan.php'>Get Loan</a></li>
                      <li class='navbx1 text-uppercase'><a href='customerTable.php'>Customer Table</a></li>
                  </ul>";
     }
     elseif($_SESSION['user_type'] == "f"){
       $list .=  "<li class='navbx text-uppercase dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dashboard<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                        <li class='navbx1 text-uppercase'><a href='finTable.php'>Financier Table</a></li>
                        <li class='navbx1 text-uppercase'><a href='loanapplicants.php'>Loan Applicants</a></li>
                        <li class='navbx1 text-uppercase'><a href='acceptedloans.php'>Accepted Loans</a></li>
                  </ul>";
     }
    }
     $list .= "<li class='navbx text-uppercase'><a href=".$_SESSION['login'].">".$_SESSION['state']."</a></li>
     <li class='navbx text-uppercase'><a href='signup.php'>Sign Up</a></li>";

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="assets/images/icon/icon.ico">

    <title>Finvestor</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
</head>
<body>

	<div class="image">
	<nav class="navbar  navbar-fixed-top navspace">
  		<div class="container">
 			<div class="navbar-header">
 				<button type="button" class="navbar-toggle collapsed" style="color:green;" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          	</button>
				<a class="navbar-brand brandpad" href="index.php"><img src="assets/images/icon/logo2.png" width="200" height="53" class="align-top" alt=""></a>
        	</div>
        	<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav navbar-right nabbar-pill">
		            <li class="active navbx text-uppercase"><a href="index.php">Home</a></li>
		            <li class="navbx text-uppercase"><a href="#about">About</a></li>
		            <li class="navbx text-uppercase"><a href="#contact">Contact</a></li>
                <?php echo $list; ?>


		        </ul>
        	</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container picturebox">
  <div class="row">
		<div class=" col-lg-5 col-md-5 col-sm-0 col-xs-10 bx text-light">
		<div class="box1">
			<h3>We at Finvestor understand that funds behave like blood in business bodies. Taking this fact under consideration we believe in patiently analyzing the business needs of our client and advising with the sufficient target funds on a minimum cost of capital.
Our products can be defined in one word as “tailor made” as, we have expertise in analyzing your financial and business position and momentous need of funds.

We have expert team of professional financial counselors who handle your business and financial needs with a personal touch.<h3>
      </br>
      </br>
      </br>
      </br>
		</div>
		<div class="box2">
			<h3></h3>
      </br>
      </br></br>
      </br>
		</div>
		</div>
	</div>
	</div>

  </div>

	<div class="main-content">
    <div class="first">
		<div class="container">
			<div class="row text-center">
				
				<p>100% Legal And Safe</p>


			</div>
    </div>
    </div>
	</div>



		<section class="page-section p-10" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">Loan request and accept based on credit score.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <center><h4 class="service-heading">E-Commerce</h4></center>
          <p class="text-muted">Your one step for loans from private financers!!!</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Responsive Design</h4>
          <p class="text-muted">Easy to look at and interactive based web design.</p>
        </div>
		<div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Made in India!!!</h4>
          <p class="text-muted">Tailor made to suit Indian financial needs.</p>
        </div>
      </div>
    </div>
  </section>

   <section>
      <div class="second">
        <div class="container">
          <div class="row text-center">
            <h1 class="text-uppercase">get in touch with us today</h1>
            <button class="btn btn-primary text-uppercase" ><a href="login.php"><font color="yellow">get started today</font></a></button>
          </div>
        </div>
      </div>
    </section>


	</div>

  <footer>
    <!-- <div class="foot">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">

          </div>
        </div>
      </div>
    </div> -->
    <h5 class="p-3">COPYRIGHTS@Finvestor 2020.</h5>
  </footer>

</body>
</html>
