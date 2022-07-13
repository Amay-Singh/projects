<?php
	session_start();
	$_SESSION['error'] = 0;
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="logo.jpg" type="image/x-icon" />
	<title>E-Market</title>
	<link rel="shortcut icon" href="logo.ico">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
	<link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="js/jabout-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jabout-ui.min.js"></script>   
	<style>
		.background-image{
		opacity: 0.8;
		filter: alpha(opacity=80);
		}
		.margin-top-100{
		margin-top: 100px;
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
			color: #3B5998;
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
#official{
	color: white;
}
#official:hover{
	color: #bfbfbf;
	text-decoration: underline;
}
address{
font-weight: none;
}
		
	</style>
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <?php
		if(!(isset($_SESSION['id'])))
		{
	  ?>
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
				<li><a href="about.php" style="font-size: 120%; color: black">About</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==0)&&($_SESSION['student']==1))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">My Profile</a></li>
				<li><a href="donate.php" style="font-size: 120%; color: black">Donate</a></li>
				<li><a href="buy_sell.php" style="font-size: 120%; color: black">Buy Books</a></li>
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
				<li><a href="buy_sell.php" style="font-size: 120%; color: black">Sell Books</a></li>
				<li><a href="about.php" style="font-size: 120%; color: black">about</a></li>
				<li><a href="password.php" style="font-size: 120%; color: black">Change Password</a></li>
				<li><a href="logout.php" style="font-size: 120%; color: black">Logout</a></li>
             </ul> 
          </div>
        </div>
      </nav>
	  <?php
	  }
	  else if(isset($_SESSION['id'])&&($_SESSION['admin']==0)&&($_SESSION['student']==0))
	  {
	  ?>
	  <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">Profile</a></li>
				<li><a href="search.php" style="font-size: 120%; color: black">Search</a></li>
				
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
             <a href="http://www.vit.ac.in/" class="logo" title="VIT University">
              <img class="logo-white" src="logo.jpg" alt="VIT-logo">
			  <img class="logo-dark" src="logo.jpg" alt="VIT-logo">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
           <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.php" style="font-size: 120%; color: black">Home</a></li>
				<li><a href="dashboard.php" style="font-size: 120%; color: black">My Profile</a></li>
				<li><a href="update.php" style="font-size: 120%; color: black">NGOs</a></li>
				
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
				<li><a href="skill.php" style="font-size: 120%; color: black">Students</a></li>
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
      <header class="section-top-padding background-image text-center" style="background-image:url(index.jpg);">
        <div class=" margin-bottom-80 margin-top-100" style=" background-color: rgba(0, 0, 0, 0.6); margin-right: 4%; margin-left: 4%">
			<br>
			<h1 class="text-extra-thin text-white text-s-size-30 text-m-size-40 text-size-50 text-line-height-1" style="font-weight: bold; padding-top: 3%">About VIT University</h1><br><br>
			<p style="font-size: 120%; color: white;">VIT was established with the aim of providing quality higher education on par with international standards. It persistently seeks and adopts innovative methods to improve the quality of higher education on a consistent basis.The campus has a cosmopolitan atmosphere with students from all corners of the globe. Experienced and learned teachers are strongly encouraged to nurture the students. The global standards set at VIT in the field of teaching and research spur us on in our relentless pursuit of excellence. In fact, it has become a way of life for us. The highly motivated youngsters on the campus are a constant source of pride. Our Memoranda of Understanding with various international universities are our major strength. They provide for an exchange of students and faculty and encourage joint research projects for the mutual benefit of these universities. Many of our students, who pursue their research projects in foreign universities, bring high quality to their work and esteem to India and have done us proud. With steady steps, we continue our march forward. We look forward to meeting you here at VIT.</p><br><br><br><br>
			<i>Visit our </i><a id="official" style="font-size: 120%; font-weight: bold;" href="http://www.vit.ac.in/">OFFICIAL WEBSITE</a><i> to find out more about us</i><br><br><br>
			<br><br><br><br>
		</div>
		</div>
		<div>
		<br><br><br><br><br><br><br>
		</div>
      </header>
	  <section class="section-top-padding text-center margin-bottom-80" style="margin-right: 15%; margin-left: 15%;">
			<h1 class="text-extra-thin text-s-size-30 text-m-size-40 text-size-40 text-line-height-1" style="font-weight: bold; padding-top: 3%">Why This?</h1><br><br>
			<p style="font-size: 120%; color: #808080">This web application is made to provide a platform whose aim is to help the society. A major problem that can be seen nowadays is poverty, may it be in India or in the USA. Poverty is a term that is thrown around but only the people who face it understand what is really means. The world we live in is riddled with irony, people living in poverty starve for food while people who can afford it throw it away.
The aim of this project is to provide a website which can bring people with excess food, which in other cases would be thrown away, to people and organizations whose main objective is to feed the people suffering from starvation. <br><br> This website works on two forms of participants: a person who wants to donate food and a person who will receive the food, which will later be distributed to the poverty struck portion of the population. People who host parties usually end up with excess food which is later thrown away. These people instead would just have to log into our website and in a few easy steps, they can send a request so that the people and the organizations around the area can pick up the food and deliver the food to places where people require it. This is done in two ways: either by setting an address or by giving up a geo location to help these organizations find the location with ease. This website, over the years, will calculate the reliability of the donators by keeping a star-based system which is changed every time a person donates food and is reviewed by the receiver who collects the food. This will help the NGO’s in getting the food faster and can also ensure that the people they are taking care of are in safe hands by letting them view and choose which donators they want to get the food from, thereby preventing confusion among receivers of who will collect it.</p><br><br>
	  </section>
	  <!--   This application was created with the objective of making the maintaining of employees related <br>database much easier and faster. All the employees of CEI India can register here with their details <br>and valid employee ids. They can go ahead and add their other personal details and their skills. The <br>employees can keep updating their skillset on the go as and when they acquire new skills. The main <br>goal of this application is to make it easier for the project heads or other higher officials to decide <br>upon how to make a team when they get new projects. This applications allows the admin or the <br>person-in-charge to look up for employees with the required skill and make a team based on their <br>skill, experience and various other criteria.</p><br><br><br>   -->
    </main>
    
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
	
	<script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 
  </body>
</html>