<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
	<title>Add Skills</title>
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
		
		
		
		
		
		.autocomplete {
		/*the container must be positioned relative:*/
		position: relative;
		display: inline-block;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
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
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/typeahead.js"></script>
	<script type="text/javascript" rel="stylesheet"></script>
	
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>     

<body style="text-align:center;">
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
 <section id="home">
<?php
	$port = getenv('S2G_mysqli_PORT');
	$dbhost = "localhost".$port;
	$dbuser = "root";
	$dbpass = "";
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($connect,'employee_db');
	$query_select="SELECT skillnam FROM skill";
	$result=mysqli_query($connect,$query_select);
	$i=0;
	while($array=mysqli_fetch_array($result))
	{
	$a[$i]=$array['skillnam'];
	$i++;
	}
	
?>
<!--Make sure the form has the autocomplete function switched off:-->
<div class="overlay"></div>

   	<div class="home-content-table">	
		   <div class="home-content-tablecell">
		   	<div class="row">
		   		<div class="col-twelve">		   			
			  		
			  				<h2 class="animate-intro"> Add Your Skills Below.</h2>
							<br/><br/>
				</div>

<form action="adsk.php" method="post" name="add" autocomplete="off">
	<div class="autocomplete" style="width:300px;">
		<input type="text" name="skill[]" id="skill" class="formboxes" placeholder=" SKILL" style="width: 100%; display: inline; ">
	</div>
								
								
									<!--<input type="text" name="skill[]" id="skill" class="formboxes" placeholder=" SKILL" style="width: 18%; display: inline; ">-->
									<input type="text" class="formboxes" id="version" name="version[]" placeholder=" VERSION USED" style="width: 17%; display:inline;">
									<input type="number" class="formboxes" id="last-used" name="last-used[]" placeholder=" LAST USED" min="1980" max="2018" style="width: 17%; display: inline;	">
					
								<div>
								<br>			
									<input type="number" class="formboxes" id="exp-year" name="exp-year[]" placeholder=" EXPERIENCE (in Years)" min="0" max="30" style="width: 26%;display:inline;"> &nbsp;
									<input type="number" class="formboxes" id="exp-month" name="exp-month[]" placeholder=" EXPERIENCE (in Months)" min="0" max="11" style="width: 26%;display: inline;">
								</div>
								<br>
								<input type="button" class="button removeMe" id="remove" value="Remove Skill" />
								<hr class="break background-primary break-large break-center margin-bottom-50">
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
		</div>
</section>
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




function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

var jsar = new Array();
 <?php 
    for($i=0;$i<count($a);$i++) { ?>
     jsar[<?php echo $i ?>] = '<?php echo $a[$i] ?>';
	 <?php } ?>


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("skill"),jsar);



		
</script>


</html>