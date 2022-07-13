		<?php
		// Starting session
		session_start();
		if (!(isset($_SESSION['eid'])))
			header("Location: index.php");
		else
		{
			$port = getenv('S2G_mysqli_PORT');
					$dbhost = "localhost".$port;
					$dbuser = "root";
					$dbpass = "";
					$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
					mysqli_select_db($connect,'employee_db');
					if((isset($_SESSION['sid']))&&(isset($_SESSION['type'])))
					{
						$a = $_SESSION['sid'];
						$b = $_SESSION['type'];
						$c = count($a);
					} 
					else
					{
						$a = $_POST['keyword'];
						$b = $_POST['type'];
						$_SESSION['sid']=$a;	
						$_SESSION['type']=$b;
						
						$c = count($a);
					}
					if($b=='s')
					{
						$t=0;
						for($i=0;$i<$c;$i++)
						{
						$searchquery = "SELECT * FROM skill WHERE skillnam='$a[$i]'";
						//echo $searchquery;
						$result = mysqli_query($connect,$searchquery);
						$row = mysqli_fetch_assoc($result);
						$s_id=$row['skillid'];
						$displayquery = "SELECT COUNT(eid) FROM emp_details A LEFT JOIN eskill B ON A.id = B.eid AND B.activ = 'a' WHERE skillid = '$s_id'";
						$result = mysqli_query($connect,$displayquery);
						$r=mysqli_fetch_array($result);	
						$t+=$r[0];
						}
					}
					
		?>
		<!DOCTYPE html>
		<html>

		<head>

		   <!--- basic page needs
		   ================================================== -->
		   <meta charset="utf-8">
			<title>Search</title>
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
			input:disabled{
			}
			#employee{
			border: 1px solid #cccccc;
			border-radius: 2px;
			font-size: 20px;
			color: black;
			padding: 5px;
			height: 250px;
			width: 100%;
		}
		#employee:hover{
			box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
			background-color:black;
			}
			h4{
				color:white;
			}
		   </style>   

		   <!-- script
		   ================================================== -->
			<script src="js/modernizr.js"></script>
			<script src="js/pace.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		   <!-- favicons
			================================================== -->
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
			<link rel="icon" href="favicon.ico" type="image/x-icon">

		</head>

		<body id="top">
			<!-- header 
		   ================================================== -->
		   <header> 
			
			<div class="header-logo">
				  <a href="index.php">Search</a>
			   </div> 

				<a id="header-menu-trigger" href="#0">
					<span class="header-menu-text">Menu</span>
					<span class="header-menu-icon"></span>
				</a> 

				<nav id="menu-nav-wrap">

					<a href="#0" class="close-button" title="close"><span>Close</span></a>	

				<h3>Search.</h3>  

					<ul class="nav-list">
						<li ><a href="index.php" title="">Home</a></li>
						<li><a href="admin.php" title="">Details</a></li>
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
						<li><a href="logout.php" title="">Logout</a></li>					
					</ul>	
				</nav>  <!-- end #menu-nav-wrap -->
				<?php
					if($b=='s')
					{
				?>
					<h4>No Of Result(s): <?php echo $t; ?></h4>
				<?php
					}
				?>
			</header> <!-- end header -->  
							
			<?php
					
					
					
			if($b=='e')
			{
					
					$query_select="SELECT * FROM emp_details where email='$a' OR empid='$a' OR phno='$a' OR fname LIKE '%$a%'";
					$result=mysqli_query($connect,$query_select);
						
					$row = mysqli_fetch_assoc($result);
					$eid=$row['id'];
					if(!(empty($row)))
					{
			?>
			

		   <!-- home
		   ================================================== -->
		   <section id="home">

			<div class="overlay"></div>
			<h2 class=" text-center text-m-size-30" style="padding-top: 15%"><b>EMPLOYEE DETAILS</b></h2>
					
			<h2 class="text-size-30 text-center" style="font-weight: bold; margin: 0">PERSONAL DETAILS</h2>
			<div class="home-content-table">	
				   <div class="home-content-tablecell">
					<div class="row_ns">
						<div class="col-twelve">
					<table border="5px">
						<tr>
							<td style="padding-left: 10px">Name</th>
							<td><?php echo $row['fname']." ".$row['lname'];?></td>
						</tr>
						<tr>
							<td style="padding-left: 10px">Date Of Birth</th>
							<td><?php echo $row['dob']; ?></td>
						<tr>
						<!--<tr>
							<th>Skills</th>
							<td><?php// echo $row['dob']; ?></td>
						<tr>-->
						<tr>
							<td style="padding-left: 10px">Gender</th>
							<td><?php echo $row['gender'] ?></td>
						</tr>
						<tr>
							<td style="padding-left: 10px">Employee ID</th>
							<td><?php echo $row['empid'] ?></td>
						</tr>
						<tr>
							<td style="padding-left: 10px">Intercom No</th>
							<td><?php echo $row['inter'] ?></td>
						</tr>
						<tr>
							<td style="padding-left: 10px">Phone Number</th>
							<td><?php echo $row['phno']?></td>
						</tr>
					</table>
					
					</div> <!-- end col-twelve --> 
					</div> <!-- end row --> 
				   </div> <!-- end home-content-tablecell --> 		   
				</div> <!-- end home-content-table -->
				
				
				<h2 class="text-size-30 text-center" style="font-weight: bold;">SKILLSET</h2>
				<div class="home-content-table">	
				   <div class="home-content-tablecell">
					<div class="row">
						<div class="col-twelve">
					
							
						<div class="text-center">
								<table border="5px" class="text-size-20">
								<center>
								<tr class="text-center" style="font-weight: bold;">
									<td style=" padding-left: 5%">SKILL</th>
									<td style=" padding-left: 5%">VERSION USED</th>
									<td style=" padding-left: 5">EXPERIENCE</th>
								</tr>
								</center>
				<?php 
									/*for($i = 1; $i <= $count; $i++)
									{*/
								
								$countquery = "SELECT * FROM eskill A LEFT JOIN skill B ON A.skillid = B.skillid AND A.activ = 'a' WHERE eid = '$eid' AND A.activ = 'a'";
							//echo $countquery;
					$result = mysqli_query($connect,$countquery);
					//print_r($result);
					if($result)
					{
						while($skills = mysqli_fetch_assoc($result))
						{	
				?>
								<tr class="text-center">
									<td style="text-transform: uppercase; padding-left: 5%"><?php echo $skills['skillnam']; ?></td>
									<td style=" padding-left: 5%"><?php echo $skills['ver']; ?></td>
									<td style=" padding-left: 3/%"><?php 
										if($skills['exp_y']==1&&$skills['exp_m']==1)
											echo $skills['exp_y']." year ".$skills['exp_m']." month";
										else if($skills['exp_y']==0&&$skills['exp_m']==1)
											echo $skills['exp_m']." month";
										else if($skills['exp_y']==0&&$skills['exp_m']!=1)
											echo $skills['exp_m']." months";
										else if($skills['exp_y']==1&&$skills['exp_m']!=1)
											echo $skills['exp_y']." year ".$skills['exp_m']." months";
										else if($skills['exp_y']!=1&&$skills['exp_m']==1)
											echo $skills['exp_y']." years ".$skills['exp_m']." month";
										else
											echo $skills['exp_y']." years ".$skills['exp_m']." months";?>
										</td>
								</tr>
								<?php
						}
					}
					else{ 
					?>
				
						<tr><td colspan='3'><center><h3>The User Has No Skills</center></h3></td></tr>
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
								
								<!-- <p>Skill:<br><br>ver:<br><br>Last Used:<br><br>Experience:<br></p>
								<hr class="break background-primary break-large break-center margin-bottom-50">
								<br>
								<p>Skill:<br><br>ver:<br><br>Last Used:<br><br>Experience:<br></p>  	 colspan="3" -->
							
							<form action="action.php" method="post" name="fact">
			<?php
				if($_SESSION['stat']=='a')
				{	
					if($row['activeindi']=='a')
					{
			?>
						<input type="submit" name="action" value="Block">
			<?php
					}
					else
					{
			?>
						<input type="submit" name="action" value="Unblock">
			<?php
					}
					if($row['admin']=='0')
					{
			?>
						<input type="submit" name="action" value="Give Admin Access">
			<?php
					}
					else
					{
			?>
						<input type="submit" name="action" value="Remove Admin Access">
			<?php
					}
				}
			?>
			</form>
			<?php
			}
			?>
			<button type="button" onclick="window.location.href='search.php'">Back</button>
						</div>
					</div>
				</div>
				</div>
				</div>
				
				
			 </section> <!-- end home -->

			<?php
			}
			if($b=='s')
			{
			?>
			<section id="home">

			<h2 class="text-size-40 text-center text-m-size-30" style="padding-top: 15%"><b>EMPLOYEE DETAILS</b><br/><br/></h2>
			<div style="padding-bottom: 80px; margin-left: 5%; margin-right: 5%;">
			<?php	
				
			
				for($i=0;$i<$c;$i++)
				{
					$searchquery = "SELECT * FROM skill WHERE skillnam='$a[$i]'";
					//echo $searchquery;
					$result = mysqli_query($connect,$searchquery);
					$row = mysqli_fetch_assoc($result);
					$s_id=$row['skillid'];
					$displayquery = "SELECT * FROM emp_details A LEFT JOIN eskill B ON A.id = B.eid AND B.activ = 'a' LEFT JOIN skill C ON B.skillid = C.skillid AND B.activ = 'a' WHERE B.skillid = '$s_id'";
					$result = mysqli_query($connect,$displayquery);
					//$row = mysqli_fetch_assoc($result);
					//echo $displayquery;
					if($result)
					{
					while($row = mysqli_fetch_assoc($result))
					{
			?>		
						<a href="disp.php?hid=<?php echo $row['empid'] ?>">
						<div id="employee" style=" margin-bottom: 2%">
							<div class="row">
							
								<div class="col-twelve text-left" style="float: left; color: white;">
									<table class="text-size-20">
										<tr>
											<td class="text-left">Name</td>
											<td class="text-left"><?php echo $row['fname']." ".$row['lname'];?></td>
										</tr>
										<tr>
											<td class="text-left" >Employee ID</td>
											<td class="text-left" ><?php echo $row['empid'];?></td>
										</tr>
										<tr>
											<td class="text-left" >Email ID</td>
											<td class="text-left" ><?php echo $row['email'];?></td>
										</tr>
										<tr>
											<td class="text-left" >Skill</td>
											<td class="text-left" ><?php echo $row['skillnam'];?></td>
										</tr>
									</table>
								</div>
							<!--<div class="col-sm-6" style="float:right">
								<img id="employee-pic" src="Employee-photo.jpg" alt="Employee">
							</div>-->
							</div>
						</div>
						</a>
			<?php 
					}
					}
					else
					{
			?>
			
						<h2><center>The Skills You Search for Doesnt Not Exist.</center></h2>
			<?php
					}
				}
				
			?>
			
					<!--<center><button type="button" onclick="window.location.href='search.php'">Back</button></center>-->
				
			<?php
						/*	while($row = mysqli_fetch_assoc($result))
			{
				echo "<pre>";
				print_r($row);
				echo "</pre>";
			} */?>
				
				
			
			<!-- <button type="button" onclick="window.location.href='search.php'">Back</button>	
		<form style="text-align: center">
			<input name="back" type="button" onclick="window.location.href='search.php'" class="ContentButtons" id="back" value="Go Back"></button>
			</form>	-->
			
			<center>
					<div class="more animate-intro" style="text_align:center;">
										<a class="button stroke" href="search.php">
											Back
										</a>
									</div>		
				</center>
				</div>
				</section>
			<?php
			}
			?>
			<!--<form style="text-align: center">
			<input name="back" type="button" onclick="window.location.href='search.php'" class="ContentButtons" id="back" value="Go Back"></button>
			</form>-->
			

		   <!-- styles
		   ================================================== -->
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
		<?php
			}
		?>
		   <!-- Java Script
		   ================================================== --> 
		   <script src="js/jquery-2.1.3.min.js"></script>
		   <script src="js/plugins.js"></script>
		   <script src="js/main.js"></script>
		</section>
		</body>
		</html>
