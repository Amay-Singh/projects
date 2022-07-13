<?php
	session_start();
	if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Add Skills</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
		
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
		.formboxes_sel{
			color: #28a5df; 
		width: 50%; 
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
		width: 250px;
			padding: 10px;
			font-weight: bold;
			font-size: 125%;
			color: white;
			background: #28a5df;
			border: none;	
		}
		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
			color: grey;
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
		
	</style>
   <style type="text/css" media="screen">
   	#styles { 
   		background: white;
   		padding-top: 12rem;
   		padding-bottom: 12rem;
   	}      	
   </style>   

    <!--script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
	
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
	<!--BLOODHOUND-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/typeahead.js"></script>
	<script type="text/javascript" rel="stylesheet"></script>



   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top" style="text-align:center;">

	<!-- header 
   ================================================== -->
   <header> 

   	<div class="header-logo">
	      <a href="index.php">Cei</a>
	   </div> 

		<a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a> 

		<nav id="menu-nav-wrap">

			<a href="#0" class="close-button" title="close"><span>Close</span></a>	

	   	<h3>Add Skills.</h3>  
		<ul class="nav-list">
				<li class="current"><a href="index.php" title="">Home</a></li>
				<li><a href="admin.php" title="">Details</a></li>
				<li><a href="search.php" title="">Search</a></li>
		<?php

				if(($_SESSION['stat'] =='a'))
				{
		?>				
				<li><a href="newemp.php" title="">New Employee</a></li>
				<li><a href="nskill.php" title="">New Skill</a></li>
		<?php
				}
		?>
			<li><a href="upski.php" title="">Update Skills</a></li>
			<li><a href="chpa.php" title="">Change Password</a></li>
			<li><a href="logout.php" title="">Logout</a></li>
		</ul>		
		</nav>  <!-- end #menu-nav-wrap -->

	</header> <!-- end header -->  


   <!-- home
   ================================================== -->
   <section id="home">

   	<div class="overlay"></div>

   	<div class="home-content-table">	
		   <div class="home-content-tablecell">
		   	<div class="row">
		   		<div class="col-twelve">		   			
			  		
			  				<h2 class="animate-intro"> Add Your Skills Below.</h2>
							<br/><br/>
				</div>
				<form action="adsk.php" method="post" name="add">
							<div class="extraSkillTemplate" style="display : none;">
						<div id="skillset" class="controls controls-row">
							<br>
								<div>
									<!--<input type="text" name="skill[]" id="skill" class="formboxes" placeholder=" SKILL" style="width: 18%; display: inline; ">-->
									<?php
										//echo "trigger";
										$port = getenv('S2G_mysqli_PORT');
										$dbhost = "localhost".$port;	
										$dbuser = "root";
										$dbpass = "";
										$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
										mysqli_select_db($connect,'employee_db');
										$query_select="SELECT skillnam FROM skill";
										$result=mysqli_query($connect,$query_select);
										//$r=mysqli_fetch_array($result);
										
										//print_r($r);
										?>
									<select name="skill[]" id="skill" class="formboxes_sel" placeholder= "SKILL" style="width:18%;display:inline;">
										<option value="">---</option>
										<?php
											while($r=mysqli_fetch_array($result))
											{
										?>
											<option value="<?php echo $r['skillnam']; ?>"><?php echo $r['skillnam']; ?></option> 
										<?php
											}
										?>
									</select>
									<input type="text" class="formboxes" id="version" name="version[]" placeholder=" VERSION USED" style="width: 17%; display:inline;">
									<input type="number" class="formboxes" id="last-used" name="last-used[]" placeholder=" LAST USED" min="1980" max="2018" style="width: 17%; display: inline;	">
								</div>
								<div>
								<br>			
									<input type="number" class="formboxes" id="exp-year" name="exp-year[]" placeholder=" EXPERIENCE (in Years)" min="0" max="30" style="width: 26%;display:inline;"> &nbsp;
									<input type="number" class="formboxes" id="exp-month" name="exp-month[]" placeholder=" EXPERIENCE (in Months)" min="0" max="11" style="width: 26%;display: inline;">
								</div>
								<br>
								<input type="button" class="button removeMe" id="remove" value="Remove Skill" />
								<hr class="break background-primary break-large break-center margin-bottom-50">
						</div>
						</div>
						<div id="extraskills-container"></div>
						<a href="javascript:void(0)" id="addRow"> Add another skill</a><br>
						<input type="hidden" id="count" class="skillsetcount" name="skillsetcount" style="color: white; border: none">
						<!--<div id="extra">
							<br>
							<textarea rows="5" cols="50" name="extra-info" placeholder="Extra Information..."></textarea>
						</div>-->
						<div id="formbuttons">
							<br><br>
							<input class="ContentButtons" type="submit" value="UPDATE SKILLS"/>
							<input class="ContentButtons" type="reset" value="RESET">
						</div>
					</form>
							
		  		 <!-- end col-twelve --> 
		   	</div> <!-- end row --> 
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->

		
	
   
   </section> <!-- end home -->
   	<div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Infinity 2016.</span> 
		         	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	
		         </div>		               
	      	</div>

      	</div>   	

      </div> <!-- end footer-bottom -->

      <div id="go-top">
		   <a class="smoothscroll" title="Back to Top" href="#top">
		   	<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
		   </a>
		</div>		
   </footer>

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 
  <?php
}
  ?>

   <!-- Java Script
   ==================================================-->
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
   
    
</body>
<script>
		var i=1;
		window.onscroll = function() {GetLength()};
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
			$html.find('[id=skill]')[0].id="skill" + len;
			$html.find('[id=version]')[0].id="version" + len;
			$html.find('[id=last-used]')[0].id="last-used" + len;
			$html.find('[id=exp-year]')[0].id="exp-year" + len;
			$html.find('[id=exp-month]')[0].id="exp-month" + len;
			return $html.html(); 
		}
		
		function GetLength()
		{
			i = $('.extraSkill').length;
			document.getElementById('count').value=i;
			//return len;
		}
		
	</script>

</html>