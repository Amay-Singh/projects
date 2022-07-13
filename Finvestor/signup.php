<?php

   session_start();


   $error="";

   if (isset($_POST['submit1'])){

     $fin=1;
     $db = mysqli_connect("localhost","root","","loan_management");

     $username = $_POST['username'];
     $password = $_POST['password1'];
     $password1 = $_POST['password2'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $num = (int)$_POST['num'];

     $error = "";
     $success = "";

     $sql_e = "SELECT * FROM user WHERE user_name='$username'";
     $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

     $uid = hexdec(uniqid())%100000;

     $sql_id = "SELECT * FROM user WHERE user_id='$uid'";
     $res_id = mysqli_query($db, $sql_id) or die( mysqli_error($db));

     while(mysqli_num_rows($res_id) != 0) $uid = hexdec(uniqid())%100000;

     if(mysqli_num_rows($res_e) == 0){


       if($password==$password1){

         $pwd = md5($password);

         $success = "Success";

         $sql_e = "INSERT INTO user (user_id,user_name,password,financer) VALUES ('$uid','$username','$pwd','$fin')";
         $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

         $sql_e = "INSERT INTO financier (financier_number,financier_name,phone_number,email) VALUES ('$uid','$name','$num','$email')";
         $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

         echo "<script type='text/javascript'>alert('$success');</script>";
         header('location: loggedin.php');
       }
       else{
         $error = "Passwords Don't Match";
         echo "<script type='text/javascript'>alert('$error');</script>";
       }

     }
     else{
       $error = "User Name Is Taken";
       echo "<script type='text/javascript'>alert('$error');</script>";
     }
   }

   if (isset($_POST['submit2'])){

     $fin=0;
     $db = mysqli_connect("localhost","root","","loan_management");

     $username = $_POST['username1'];
     $password = $_POST['password3'];
     $password1 = $_POST['password4'];
     $name = $_POST['name1'];
     $email = $_POST['email1'];
     $num = (int)$_POST['num1'];
     $addr = $_POST['addr1']."\n".$_POST['addr2']."\n".$_POST['addr3'];
     $age = $_POST['age'];

     $error = "";
     $success = "";

     $sql_e = "SELECT * FROM user WHERE user_name='$username'";
     $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

     $uid = hexdec(uniqid())%100000;

     $sql_id = "SELECT * FROM user WHERE user_id='$uid'";
     $res_id = mysqli_query($db, $sql_id) or die( mysqli_error($db));

     while(mysqli_num_rows($res_id) != 0) $uid = hexdec(uniqid())%100000;

     if(mysqli_num_rows($res_e) == 0){


       if($password==$password1){

         $pwd = md5($password);

         $success = "Success";

         $sql_e = "INSERT INTO user (user_id,user_name,password,financer) VALUES ('$uid','$username','$pwd','$fin')";
         $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

         $sql_e = "INSERT INTO customer (customer_number,customer_name,phone_number,email,address,age) VALUES ('$uid','$name','$num','$email','$addr','$age')";
         $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));

         echo "<script type='text/javascript'>alert('$success');</script>";
         header('location: loggedin.php');
       }
       else{
         $error = "Passwords Don't Match";
         echo "<script type='text/javascript'>alert('$error');</script>";
       }

     }
     else{
       $error = "User Name Is Taken";
       echo "<script type='text/javascript'>alert('$error');</script>";
     }
   }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Finvestor</title>
    <link rel="icon" href="assets/images/icon/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {font-family: Arial;}

    /* Style the tab */
    .tab {
        margin-top: 14px;
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #fff;

    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
      color: #768387;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
      color: #54b24c;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
    </style>

</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center bg-blue">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/icon/logo2.png" width="200" height="53" alt="FinvestorLogo"></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <?php
        $list = "";

        if($_SESSION['log']==true){
     
          if($_SESSION['user_type'] == "c"){
            $list .=  "<li class='navbx text-uppercase'><a href='index.php'>Home</a></li>
                        <li class='navbx text-uppercase'><a href='getloan.php'>Get Loan</a></li>
                           <li class='navbx text-uppercase'><a href='customerTable.php'>Customer Table</a></li>";
          }
          elseif($_SESSION['user_type'] == "f"){
            $list .=  "<li class='navbx text-uppercase'><a href='finTable.php'>Financier Table</a></li>
                       <li class='navbx text-uppercase'><a href='loanapplicants.php'>Loan Applicants</a></li>
                       <li class='navbx text-uppercase'><a href='acceptedloans.php'>Accepted Loans</a></li>";
          }
         }
         $list .= "<li class='navbx text-uppercase'><a href=".$_SESSION['login'].">".$_SESSION['state']."</a></li>
                    <li class='active navbx text-uppercase'><a href='signup.php'>Sign Up</a></li>";
        ?>
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 d-none d-lg-block">
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <?php echo $list; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!-- nav and search button -->
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
        <!-- header area end -->
        <!-- page title area end -->
        <!-- <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#"><span>Sign Up</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Financier')" id="defaultOpen">Financier</button>
              <button class="tablinks" onclick="openCity(event, 'Customer')">Customer</button>
            </div>

            <div id="Financier" class="tabcontent">
            <div class="main-content-inner container pt-4 pb-4">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card pad-25">
                            <div class="card-body row">
                                <div class="col-lg-3 col-md-3 d-none d-md-block"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h4 class="header-title">Sign Up As Financier</h4> <br>
                                        <form action="#" method="post">

                                                <div class="form-group">
                                                    <label for="TextInput">Enter User Name</label>
                                                    <input type="text" name="username" class="form-control" placeholder="User Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Phone Number</label>
                                                    <input type="number" name="num" class="form-control" placeholder="Phone Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Password</label>
                                                    <input type="password" name="password1" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Password Again</label>
                                                    <input type="password" name="password2" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="col-12 p-0 pb-2">
                                                    <p class="text-muted dont">Aldready have an account? <a href="login.php">Log in</a></p>
                                                </div>
                                                <p style="color: red;"><?php echo $error; ?></p>
                                                <input type="submit" name="submit1" value="Sign Up" class="btn btn-lg btn-primary text-uppercase" type="submit"></input>

                                        </form>
                                </div>
                                <div class="col-lg-3 col-md-3 d-none d-md-block"></div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div id="Customer" class="tabcontent">
              <div class="main-content-inner container pt-4 pb-4">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card pad-25">
                            <div class="card-body row">
                                <div class="col-lg-3 col-md-3 d-none d-md-block"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h4 class="header-title">Sign Up As Customer</h4> <br>
                                    <form action="#" method="post">

                                            <div class="form-group">
                                                <label for="TextInput">Enter User Name</label>
                                                <input type="text" name="username1" class="form-control" placeholder="User Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Name</label>
                                                <input type="text" name="name1" class="form-control" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Email</label>
                                                <input type="email" name="email1" class="form-control" placeholder="example@example.com" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Phone Number</label>
                                                <input type="number" name="num1" class="form-control" placeholder="Phone Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Address</label>
                                                <input type="text" name="addr1" class="form-control" placeholder="Street" required>
                                                <input type="text" name="addr2" class="form-control" placeholder="Area" required>
                                                <input type="text" name="addr3" class="form-control" placeholder="City" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Age</label>
                                                <input type="text" name="age" class="form-control" placeholder="Age" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Password</label>
                                                <input type="password" name="password3" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="TextInput">Enter Password Again</label>
                                                <input type="password" name="password4" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="col-12 p-0 pb-2">
                                                <p class="text-muted dont">Aldready have an account? <a href="login.php">Log in</a></p>
                                            </div>
                                            <p style="color: red;"><?php echo $error; ?></p>
                                            <input type="submit" name="submit2" value="Sign Up" class="btn btn-lg btn-primary text-uppercase" type="submit"></input>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-3 d-none d-md-block"></div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>


            <script>
            function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";

              evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();
            </script>


        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved. Finvestor.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
