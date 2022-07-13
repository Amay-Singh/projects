<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>E - Market | Search Results</title>
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
	
	<style>
		#employee{
	border: 1px solid #cccccc;
	border-radius: 2px;
	font-size: 20px;
	color: black;
	padding: 5px;
	height: 150px;
	width: 100%;
}
#employee:hover{
	box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
	background-color: #e6e6e6;
	}
#employee-pic{
border: 1px solid #cccccc;
	border-radius: 5px;
	padding: 5px;
	max-width: 150px;
	max-height: 120px;
}
input.ContentButtons{
			width: 250px;
			padding: 10px;
			font-weight: bold;
			font-size: 125%;
			color: white;
			background: #454545;
			border: none;
		}
		input.ContentButtons:hover {
			color: #454545;
			background: #e6e6e6;
			border: none;
		}	
	</style>
	
</head>

<body class="size-1280">
    <!-- HEADER -->
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
	  
<?php
	$mysqlport = getenv('S2G_MYSQL_PORT');
    $dbhost = "localhost";
    $dbuser = "id6197490_localhost";
    $dbpass = "anusha";

	$option = $_POST['option'];
    $key = $_POST["search"];
	
    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db("id6197490_employees");
	
	if($option=='E')
	{
		$searchabout = "SELECT * FROM empdetails WHERE empid = '$key'";
	$result = mysql_about($searchabout, $connect);
	$row = mysql_fetch_assoc($result);
	$eid=$row['id'];

	/*echo "<pre>";
		print_r($row);
		echo "</pre>";*/
	?>
	<main role="main"> 
	<header class="section-top-padding background-image text-center">
        <h1 class="text-extra-thin text-s-size-30 text-m-size-40 text-size-50 text-line-height-1 margin-bottom-100 margin-top-250" style="font-weight: bold;">
        </h1><br><br>
		 <a target="_blank" href="Employee-photo.jpg">
			<img id="thumbnail" src="Employee-photo.jpg" class="center" alt="Employee" height="150px" width="150px" style="border-radius: 150px; z:1; border: 5px solid black;">
		</a>
       
      </header>
	</main>	
	
<?php
		$searchabout = "SELECT * FROM skills WHERE skill='$key'";
		//echo $searchabout;
		$result = mysql_about($searchabout, $connect);
		$row = mysql_fetch_assoc($result);
		$sid=$row['skillid'];
		$displayabout = "SELECT * FROM empdetails A LEFT JOIN empskills B ON A.id = B.id WHERE skillid = '$sid'";
		$result = mysql_about($displayabout, $connect);
		//$row = mysql_fetch_assoc($result);
		
	?>
	<main role="main"> 
	<header class="section-top-padding background-image text-center">
        <h1 class="text-extra-thin text-s-size-30 text-m-size-40 text-size-50 text-line-height-1 margin-bottom-100 margin-top-250" style="font-weight: bold;">
        </h1><br><br>       
      </header>
	</main>
		<?php
		while($row = mysql_fetch_assoc($result))
		{
		?>
	<section style="padding-bottom: 80px; margin-left: 5%; margin-right: 5%">
			<div id="employee" onclick="location.href='#';" style="cursor: pointer;">
				<div class="row">
					
					<div class="col-sm-10 text-left" style="float: left">
						<table class="text-size-20">
							<tr style="background-color: white; border: none;">
								<td class="text-left" style="background-color: white">Product Name: </td>
								<td class="text-left"><?php echo $row['fname']." ".$row['lname'];?></td>
								<td class="text-left" style="background-color: white">Product Category: </td>
								<td class="text-left"><?php echo $row['fname']." ".$row['lname'];?></td>
							</tr>
							<tr style="background-color: white">
								<td class="text-left" style="background-color: white">Seller Name: </td>
								<td class="text-left" ><?php echo $row['empid'];?></td>
								<td class="text-left" style="background-color: white">Seller Rating: </td>
								<td class="text-left"><?php echo $row['fname']." ".$row['lname'];?></td>
							</tr>
							<tr style="background-color: white">
								<td class="text-left" style="background-color: white">Price: </td>
								<td class="text-left" ><?php echo $row['email'];?></td>
							</tr>
						</table>
					</div>
					<div class="col-sm-2" style="float:right">
						<form>
							<input type="hidden" value="">
							<input type="submit" value="View Product">
						</form>
					</div>
				</div>
			</div>
	</section>
			<?php 
		}
		/*	while($row = mysql_fetch_assoc($result))
	{
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	} */?>
	<form style="text-align: center">
	<input name="back" type="button" onclick="window.location.href='search.php'" class="ContentButtons" id="back" value="Go Back"></button>
	</form>
	
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
</body>	

</html>