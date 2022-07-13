<?php

   session_start();

   if(isset($_SESSION['log']) && $_SESSION['log']==true){
     header("Location: index.php");
   }

   $error="";

   if (isset($_POST['submit'])){

     $db = mysqli_connect("localhost","root","","loan_management");

     $username = $_POST['username'];
     $password = $_POST['password'];
     $error = "";
     $success = "";

     $sql_e = "SELECT * FROM user WHERE user_name='$username'";

     $res_e = mysqli_query($db, $sql_e) or die( mysqli_error($db));


     if(mysqli_num_rows($res_e) > 0){

       $row = mysqli_fetch_assoc($res_e);
       $pwd = $row['password'];
       $fin = $row['financer'];
       $f=false;
       if($fin==1) $f=true;

       if(md5($password)==$pwd){
         $success = "Success";
         $_SESSION['login'] = 'loggedin.php';
         $_SESSION['username'] = $username;
         $_SESSION['state'] = "Log Out";

         if($f) $_SESSION['user_type'] = "f";
         else $_SESSION['user_type'] = "c";

         $_SESSION['log'] = true;

         echo "<script type='text/javascript'>alert('$success');</script>";
         header('location: index.php');
       }
       else{
         $error = "Incorrect Password";
         echo "<script type='text/javascript'>alert('$error');</script>";
       }

     }
     else{
       $error = "User Name Not Found";
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
        $list = "<li class='navbx text-uppercase'><a href='index.php'>Home</a></li>
                 <li class='navbx text-uppercase'><a href='#about'>About</a></li>
                 <li class='navbx text-uppercase'><a href='#contact'>Contact</a></li>
                 <li class='active navbx text-uppercase'><a href='login.php'>Log in</a></li>
                 <li class='navbx text-uppercase'><a href='signup.php'>Sign up</a></li>";

        // if($_SESSION['log']==true){
     
        //   if($_SESSION['user_type'] == "c"){
        //     $list .=  "<li class='navbx text-uppercase'><a href='index.php'>Home</a></li>
        //                 <li class='active navbx text-uppercase'><a href='getloan.php'>Get Loan</a></li>
        //                    <li class='navbx text-uppercase'><a href='customerTable.php'>Customer Table</a></li>";
        //   }
        //   elseif($_SESSION['user_type'] == "f"){
        //     $list .=  "<li class='navbx text-uppercase'><a href='finTable.php'>Financier Table</a></li>
        //                <li class='navbx text-uppercase'><a href='loanapplicants.php'>Loan Applicants</a></li>
        //                <li class='navbx text-uppercase'><a href='acceptedloans.php'>Accepted Loans</a></li>";
        //   }
        //  }
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#"><span>Log In</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>               -->
        <div class="main-content-inner container pt-4 pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card pad-25">
                            <div class="card-body row"> 
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <form action="" method="post">

                                                <div class="form-group">
                                                    <label for="TextInput">Enter User Name</label>
                                                    <input type="text" name="username" class="form-control" placeholder="User Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                </div>
                                                <p style="color: red;"><?php echo $error; ?></p>
                                                <div class="row mb-2 rmber-area">
                                                <div class="col-6">
                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                </div>
                                                <div class="col-12 p-0 pb-2">
                                                    <p class="text-muted dont">Don't have an account? <a href="signup.php">Sign up</a></p>
                                                </div>
                                                <input type="submit" name="submit" value="Log In" class="btn btn-lg btn-primary text-uppercase" type="submit"  align="center"></input>
                                        </form>
                                </div>
                                <div class="col-lg-6 col-md-6 d-none d-md-block">
                                    <h2></h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                        

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
