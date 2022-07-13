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
	$result1 = mysql_query($search_query,$connect);
	$row=mysql_fetch_assoc($result1);
	$fname=$row['fname'];
	$lname=$row['lname'];
	$empid=$row['empid'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$intercom=$row['intercom'];
	$gender=$row['gender'];
	$dob=$row['dob'];
	//$photo=$row['photo'];
	/*$count=0;
	$ctr=0;*/
	
	//exit;
	//echo $skills['ctr']; 
	/*for($i = 1; $i <= $ctr; $i++)
	{
		$skillname['$i'] = $res['$i']['skillid'];
		$versionused['$i'] = $res['$i']['version'];
		$last['$i'] = $res['$i']['last'];
		$expyr['$i'] = $res['$i']['expy'];
		$expmon['$i'] = $res['$i']['expm'];
		$count=$count+1;
	}*/
?>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.jpg" type="image/x-icon" />
	<title>CEI Employees | Dashboard</title>
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
	<script type="text/javascript" rel="stylesheet">
	</script>		
	
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
		textarea{
		resize: none;
		overflow: auto;
		font-family: inherit;
		color: #28a5df; 
		border-color: #28a5df;
		width: 50%;
		font-size: 18px; 
		background-color: transparent; 
		border-radius: 5px; 
		border: 2px solid; 
		margin-top: 15px;
		}
		.extraSkillTemplate {
			display:none;
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
		
		.skillsetboxes{
		color: #28a5df; 
		height: 40px; 
		font-size: 18px; 
		background-color: transparent; 
		border-radius: 5px; 
		border: 2px solid #28a5df;
		}

		#addRow{
		color: #28a5df; 
		font-size: 18px;
		font-weight: bold;
		}
		
		#remove{
		color: #28a5df; 
		font-size: 18px;
		font-weight: bold;
		background-color: white;
		}
		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
			color: #ccc;
			opacity: 1; /* Firefox */
		}
		.typeahead { 
			border: 2px solid #28a5df;
			border-radius: 5px;
			font-size:18px;
			text-transform:uppercase; 
		}
		.error{
			color: #ff0000;
		}
		
		.center {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		
	</style>
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <?php
			if(isset($_SESSION['id'])&&($_SESSION['admin']==0))
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
          Hi <?php echo $row['fname']." ".$row['lname']."!";?><br><br>
		  Welcome to your Dashboard
        </h1><br><br>
		 <a target="_blank" href="Employee-photo.jpg">
			<img id="thumbnail" src="Employee-photo.jpg" class="center" alt="Employee" height="150px" width="150px" style="border-radius: 150px; z:1; border: 5px solid black;">
		</a>
       <i class="slow icon-sli-arrow-down text-white margin-top-20 text-size-30"></i>
      </header>
 
      <section class="section-top-padding background-white" style="padding-bottom: 100px;">
        <div class="line">
			<h2 class="text-dark text-size-40 text-center text-m-size-30"><b>EMPLOYEE DETAILS</b></h2>
			<hr class="break background-primary break-small break-center margin-bottom-50">	
			
			<h3 class="text-dark text-size-30 text-center" style="font-weight: bold;">PERSONAL DETAILS</h3>
			
		<div class="row" style=" padding-left: 0; margin-left: 0;">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin: 2% 2% 0 10%;">
				<table class="text-size-20">
				<tr style="background-color: white; border: none;">
					<td>     </td>
					<td class="text-left" style="background-color: white">Name</td>
					<td class="text-left"><?php echo $row['fname']." ".$row['lname'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >Employee ID</td>
					<td class="text-left" ><?php echo $row['empid'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >Email ID</td>
					<td class="text-left" ><?php echo $row['email'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >Mobile No.</td>
					<td class="text-left" ><?php echo $row['mobile'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >Intercom Extension</td>
					<td class="text-left" ><?php echo $row['intercom'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >Gender</td>
					<td class="text-left" ><?php echo $row['gender'];?></td>
				</tr>
				<tr style="background-color: white">
					<td>     </td>
					<td class="text-left" >D.O.B.</td>
					<td class="text-left" ><?php echo $row['dob'];?></td>
				</tr>
				</table>
				<br><br><br>
			</div>
			<!--<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin: 2% 0 0 10%;">
				
					<br><br>
						<br><br>
						<br><br>
						<br><br>
						<br><br>
						<br><br>
						<br><br>
						<br><br><br>
			</div>-->
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
		</div>
		<h3 class="text-dark text-size-30 text-center" style="font-weight: bold;">SKILLSET</h3>
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
						<?php 
							/*for($i = 1; $i <= $count; $i++)
							{*/
						
						$countquery = "SELECT * FROM empskills A LEFT JOIN skills B ON A.skillid = B.skillid WHERE id = '$id' AND A.ai='1'";
	//echo $countquery;
	$result = mysql_query($countquery, $connect);
	//print_r($result);
	while($skills = mysql_fetch_assoc($result)){
		//echo "<pre>"; print_r($skills); echo "</pre>";
	
	
						?>
						<tr class="text-center">
							<td style="text-transform: uppercase"><?php echo $skills['skill']; ?></td>
							<td><?php echo $skills['version']; ?></td>
							<td><?php echo $skills['lastused']; ?></td>
							<td><?php 
								if($skills['expy']==1&&$skills['expm']==1)
									echo $skills['expy']." year ".$skills['expm']." month";
								else if($skills['expy']==0&&$skills['expm']==1)
									echo $skills['expm']." month";
								else if($skills['expy']==0&&$skills['expm']!=1)
									echo $skills['expm']." months";
								else if($skills['expy']==1&&$skills['expm']!=1)
									echo $skills['expy']." year ".$skills['expm']." months";
								else if($skills['expy']!=1&&$skills['expm']==1)
									echo $skills['expy']." years ".$skills['expm']." month";
								else
									echo $skills['expy']." years ".$skills['expm']." months";?></td>
						</tr>
						<?php
							}
							//echo "$count";
						?>
						<!--<tr>
							<td>CSS</td>
							<td>3.0</td>
							<td>2018</td>
							<td>2 years 11 months</td>
						</tr>-->
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
	
	<script>
		$(document).ready(function () {
			$('<div/>', {
				'class' : 'extraSkill', html: GetHtml()
			}).appendTo('#extraskills-container');
			
			$('#addRow').click(function () {
				$('<div/>', {
					'class' : 'extraSkill', html: GetHtml()
				}).hide().appendTo('#extraskills-container').slideDown('slow'); 
			});
			
			$('body').on('click', '.removeMe', function (){
				$(this).parents('.extraSkill').slideUp('slow');
			});
		})
		function GetHtml()
		{
			var len = $('.extraSkill').length;
			var $html = $('.extraSkillTemplate').clone();
			$html.find('[name=skill]')[0].name="skill" + len;
			$html.find('[name=version]')[0].name="version" + len;
			$html.find('[name=last-used]')[0].name="last-used" + len;
			$html.find('[name=exp-year]')[0].name="exp-year" + len;
			$html.find('[name=exp-month]')[0].name="exp-month" + len;
			return $html.html();    
		}
	</script>
	</body>
</html>