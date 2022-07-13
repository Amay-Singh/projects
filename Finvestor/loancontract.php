<?php

  include 'modules.php';

  session_start();



  if($_SESSION['log']!=true || $_SESSION['user_type'] != 'f'){
    header("Location: index.php");
  }

  if(!isset($_GET['cid'])){
    header("Location: acceptedloans.php");
  }


  #financer id pass through url

  $db = mysqli_connect("localhost","root","","loan_management");
  $uname = $_SESSION['username'];

  $sql_fin = "SELECT * FROM user WHERE user_name='$uname'";

  $res_fin = mysqli_query($db, $sql_fin) or die( mysqli_error($db));
  $financer = mysqli_fetch_assoc($res_fin);
  $fid = $financer['user_id'];
  $cid = $_GET['cid'];

  $error = "Enter All Fields Correctly";

  if (isset($_POST['submit'])) {

    $amount = $_POST['amt'];
    $rate = $_POST['rate'];
    $itype = $_POST['itype'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $sts = '1';



    if($itype == "Daily")$itype = "d";
    elseif($itype == "Monthly")$itype = "m";
    elseif($itype == "Weekly")$itype = "w";
    elseif($itype == "Yearly")$itype = "y";
    else $itype = "";

    $n = diffDate($start_date,$due_date,$itype);
    $a = simple_interest($amount,$rate,$n);
    $amount = $a[0];

    $amt_per = ceil(($amount/$n));
    $amount = ceil($amount);

    if(!is_numeric($amount)) $amount="";

    if($itype == "" || $amount =="" || $start_date =="" || $due_date=="" || $rate=="") $error="Enter All Fields Correctly!";
    else if($rate<0) $error = "Rate Cannot be Negative";
    else if($n<=0 || !checkDT($start_date,$due_date)) $error = "Incorrect Date Interval";
    else{

      $sql_req = "INSERT INTO loan_contract (f_id,c_id,loan_status_code,contract_start,contract_end,interest_rate,loan_amount,loan_payment_amount,amt_per_payment,interest_type) VALUES ('$fid','$cid','$sts','$start_date','$due_date','$rate','$amount','$amount','$amt_per','$itype')";
    #  echo $sql_req;
    #  echo $fid.','.$cid.','.$sts.','.$start_date.','.$due_date.','.$rate.','.$amount.','.$amount.','.$amt_per.','.$itype;
      $results = mysqli_query($db, $sql_req) or die( mysqli_error($db));

      $error="";

      $sql_lid = "SELECT * FROM loan_contract WHERE c_id='$cid' AND f_id='$fid'";
      $res_lid = mysqli_query($db, $sql_lid)or die( mysqli_error($db));
      $lid = mysqli_fetch_assoc($res_lid)['loan_id'];


      $sql_pmt = "INSERT INTO loan_payment (loan_id,date_payment,amount_payment,paid,carry_on,description,next_due) VALUES ('$lid','$start_date','$amt_per','0','0','Start','$start_date')";
      $results = mysqli_query($db, $sql_pmt)or die( mysqli_error($db));

      $sql_rq = "DELETE FROM loan_request WHERE c_id='$cid'";
      $results = mysqli_query($db, $sql_rq)or die( mysqli_error($db));
      echo "<script>alert('Loan Initiated!')</script>";

      header("Location: customerinfo.php?cid=".$cid."&lid=".$lid);

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
                    <div class="col-md-9 clearfix text-right">

                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0 color-green">
                                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="loggedin.php">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li class="active">
                                        <a href=""><i class="ti-dashboard"></i><span>Loan Details</span></a>
                                        <!-- <ul class="submenu">
                                            <li><a href="#">Table</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
        <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="acceptedloans.php"><span>Accepted Loans</span></a></li>
                                <li><span>Loan Details</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-12 mt-5 mb-5">
                                <div class="card">
                                    <div class="card-body" align="center">
                                        <h4 class="header-title">Enter Loan Details</h4>
                                        <form action="#" method="post" style="width:50%;">

                                                <div class="form-group">
                                                    <label for="TextInput">Enter Loan Amount <em>in Rupees</em></label>
                                                    <input type="text" name="amt" class="form-control" placeholder="Loan Amount" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="TextInput">Enter Rate Of Interest <em>in Percentage</label>
                                                    <input type="text" name="rate" class="form-control" placeholder="Interest %" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Select">Interest Payable</label>
                                                    <select name="itype" class="form-control" style="height:1%">
                                                        <option>Daily</option>
                                                        <option>Weekly</option>
                                                        <option>Monthly</option>
                                                        <option>Annually</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-date-input" class="col-form-label">Start Date</label>
                                                    <input class="form-control" type="date" value="0000-00-00" name="start_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-date-input" class="col-form-label">Due Date</label>
                                                    <input class="form-control" type="date" value="0000-00-00" name="due_date" required>
                                                </div>
                                                <p style="color: red;"><?php echo $error; ?></p>
                                                <input type="submit" name="submit" value="Send Request" class="btn btn-lg btn-primary text-uppercase" type="submit" style="width: 30%;"></input>
                                        </form>
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
