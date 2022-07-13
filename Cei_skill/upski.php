<?php
// Starting session
session_start();
if (!(isset($_SESSION['eid'])))
	header("Location: index.php");
else
{
?>
<!DOCTYPE html>
<html>

<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Details</title>
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

   <style type="text/css" media="screen">
   	#styles { 
   		background: white;
   		padding-top: 12rem;
   		padding-bottom: 12rem;
   	}      	

		
   </style>   

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<?php
							$id=$_SESSION['eid'];
							$port = getenv('S2G_mysqli_PORT');
							$dbhost = "localhost".$port;
							$dbuser = "root";
							$dbpass = "";
							$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
							mysqli_select_db($connect,'employee_db');
							$countquery = "SELECT * FROM eskill A LEFT JOIN skill B ON A.skillid = B.skillid WHERE eid = '$id'";
							$r=mysqli_query($connect,$countquery);
	?> 

	<!-- header 
   ================================================== -->
   <header> 

   	<div class="header-logo">
	      <a href="index.php">Details</a>
	   </div> 

		<a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a> 

		<nav id="menu-nav-wrap">

			<a href="#0" class="close-button" title="close"><span>Close</span></a>	

	   	<h3>Details</h3>  

			<ul class="nav-list">
				<li><a href="index.php" title="">Home</a></li>
				<li><a href="search.php" title="">Search</a></li>
				<li><a href="addskill.php" title="">Add Skills</a></li>	
				<?php
					if($_SESSION['stat']=='a')
					{
				?>
				<li><a href="newemp.php" title="">New Employee</a></li>
				<li><a href="nskill.php" title="">New Skill</a></li>	
				<?php
					}
				?>
			<li><a href="chpa.php" title="">Change Password</a></li>
				<li><a href="logout.php" title="">Logout</a></li>				
			</ul>	
		</nav>  <!-- end #menu-nav-wrap -->

	</header> <!-- end header -->  


   <!-- home
   ================================================== -->
  <section id="home">
   	<div class="home-content-table-details" id="details">	
		   <div class="home-content-tablecell">
		   <div class="rowdetails">
			<div class="col-twelve">
				<h2 class="animate-intro">Update Your Skills</h2>
			</div>
			</div>
	
		   	<div style="text_align:center;margin-left:10%">
			<div class="rowdetails"><center>		
					
					
					
					
					
								<form action="updateskill.php" method="post" name="upd">
								<?php
								$i=0;
			while($skill = mysqli_fetch_assoc($r))
			{
				$i++;
				?>
							
						<div id="skillset" class="controls controls-row">
							<br>
								<div>
									<input type="hidden" name="sid[]" id="sid"  value="<?php echo $skill['id']; ?>">
									<input type="text" name="skill[]" id="skill" disabled placeholder=" SKILL" value="<?php echo $skill['skillnam']; ?>" style="width: 30%; display: inline; ">
									<input type="text" class="edit" disabled id="version" name="version[]" placeholder=" VERSION USED	" value="<?php echo $skill['ver']; ?>" style="width: 20%; display:inline;">
									<input type="number" class="edit" disabled id="last-used" name="last-used[]" placeholder=" LAST USED" value="<?php echo $skill['lastused']; ?>" min="1980" max="2018" style="width: 30%; display: inline;	">
								</div>
								<div>
								<br>			
									<input type="number" class="edit" disabled id="exp-year" name="exp-year[]" placeholder=" EXPERIENCE (in Years)" value="<?php echo $skill['exp_y']; ?>" min="0" max="30" style="width: 40%;display:inline;"> &nbsp;
									<input type="number" class="edit" disabled id="exp-month" name="exp-month[]" placeholder=" EXPERIENCE (in Months)" value="<?php echo $skill['exp_m']; ?>" min="0" max="11" style="width: 40%;display: inline;">
									
								</div>
								<div>
									<?php
										if($skill['activ']=='a')
										{
									?>
											Not Active:<input type="radio" name="del[<?php echo $skill['id']?>]" value="na">
											Active<input type="radio" name="del[<?php echo $skill['id']?>]" value="a" checked="checked">
									<?php
										}
										else
										{
									?>
											Not Active:<input type="radio" name="del[<?php echo $skill['id']?>]" value="na" checked="checked">
											Active<input type="radio" name="del[<?php echo $skill['id']?>]" value="a" >
									<?php
										}
									?>
								</div>
								<br>
								<hr class="break background-primary break-large break-center margin-bottom-50">
						</div>
								
								
								
			<?php
			}
			?>
								<input type="hidden" value="<?php echo $i ?>" name="size"> 
								<input type="submit" value="Update" id="s" style="display:none;">
								</form>
								
					
					<div class="col-twelve">	
					
					<button onclick="unlock()" id="b">Unlock</button>
								
					</div>
					
		   	</center></div> <!-- end row --> 
			</div>
		   </div> <!-- end home-content-tablecell --> 		   
		</div> <!-- end home-content-table -->
	 </section> <!-- end home -->

   
	<section id="foot">
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

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
</section>
<?php 
}
	?>
<script>

function unlock()
{
	
	
    $(".edit").prop('disabled',false);
    document.getElementById('b').style.display = "none";
	document.getElementById('s').style.display = "block";
}

</script>

</body>

</html>