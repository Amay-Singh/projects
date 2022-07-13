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
							$port = getenv('S2G_mysql_PORT');
							$dbhost = "localhost".$port;
							$dbuser = "root";
							$dbpass = "";
							$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
							mysqli_select_db($connect,'employee_db');
							$query_select="SELECT * FROM emp_details where id='$id'";
							$r=mysqli_query($connect,$query_select);
							$result=mysqli_fetch_assoc($r);
							/*echo "<pre>";
							print_r($result);
							echo"</pre>";*/
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
				<li class="navbx text-uppercase"><a href="index.php" title="">Home</a></li>
				<li class="navbx text-uppercase"><a href="search.php" title="">Search</a></li>
				<li class="navbx text-uppercase"><a href="addskill.php" title="">Add Skills</a></li>	
				<?php
					if($_SESSION['stat']=='a')
					{
				?>
				<li class="navbx text-uppercase"><a href="newemp.php" title="">New Employee</a></li>
				<li class="navbx text-uppercase"><a href="nskill.php" title="">New Skill</a></li>	
				<?php
					}
				?>
				<li class="navbx text-uppercase"><a href="upski.php" title="">Update Skills</a></li>
			<li class="navbx text-uppercase"><a href="chpa.php" title="">Change Password</a></li>
				<li class="navbx text-uppercase"><a href="logout.php" title="">Logout</a></li>				
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
				<h2 class="animate-intro"><?php echo "Welcome ".$result['fname']." ".$result['lname']; ?></h2>
			</div>
			</div>
		   	<div style="text_align:center;margin-left:10%">
			<div class="rowdetails"><center>
						<form action = "update.php" method="POST" name="regis">
				<div class="col-six">		   			
			  		
			  				
				  			
								First Name:<div><input type="text"	class="edit" disabled name="fname" placeholder="First Name" value="<?php echo $result['fname']; ?>"><br /></div>
								
								Date Of Birth:<div><input type="date" class="edit" disabled name="dob" placeholder="age" value="<?php echo $result['dob']; ?>" style=" width:100%	;" required><br /></div>
								
								Employee ID:<div><input type="text" id="det" disabled name="eid" placeholder="employee ID" value="<?php echo $result['empid'] ?>" required><br /></div>
								
								Email ID:<div style="display: inline;"><input type="email" class="edit" disabled name="em" placeholder="example@email.com" value="<?php echo $result['email'] ?>" required></div>			

			  		</div> <!-- end col-twelve --> 
					<div class="col-six">		   			
			  		
	
				  			
								
								Last Name:<div><input type="text" class="edit"  disabled name="lname" placeholder="Last Name" value="<?php echo $result['lname']; ?>"><br /></div>
													
								Gender:
								<div style="margin-top: 3%; margin-bottom: 13%"><?php
									if($result['gender']=='m')
									{
								?>
										<div style="float:left"><input type="radio"  class="edit" disabled class="r" name="g" value="m" checked="checked" style="text-align: left;">Male<br /></div>
										<div><input type="radio" class="edit" disabled name="g" value="f" style="margin-left:65%">Female<br /></div>
								<?php
									}
									else
									{
								?>
										<div><input type="radio" class="edit" disabled class="r" name="g" value="m">Male<br /></div>
										<div><input type="radio" style="display: inline;" class="edit" disabled name="g" value="f" checked="checked" style="margin-left:65%">Female<br /></div>
								<?php
									}
								?>
								</div>
								Phone Number:<div><input type="text" class="edit" disabled class="r" name="pno" value="<?php echo $result['phno'] ?>" placeholder= "phone no" required<type><br /></div>
													
								Intercom Number:<div><input type="text" class="edit" disabled name="in" placeholder="Intercom Number" value="<?php echo $result['inter'] ?>"required><br /></div>
			  		</div>
					<div class="col-twelve">
					Address:<div><textarea class="edit" onblur="dis()" disabled name="add" rows=4 cols=60 placeholder="Address"><?php echo $result['address'] ?></textarea><br /></div>
								<input type="submit" value="Update" id="s" style="display:none;">
								</form>
								
					</div>
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

		<?php mysqli_close($connect);}?>
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