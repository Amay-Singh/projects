<?php

  include 'modules.php';

  session_start();



  if($_SESSION['log']!=true || $_SESSION['user_type'] != 'c'){
    header("Location: index.php");
  }

  if(!isset($_GET['fid'])){
    header("Location: customerTable.php");
  }



  $db = mysqli_connect("localhost","root","","loan_management");
  $uname = $_SESSION['username'];

  $sql_cus = "SELECT * FROM user WHERE user_name='$uname'";

  $res_cus = mysqli_query($db, $sql_cus) or die( mysqli_error($db));
  $customer = mysqli_fetch_assoc($res_cus);
  $cid = $customer['user_id'];
  $fid = $_GET['fid'];
  $lid = $_GET['lid'];

  $sql_loanc = "SELECT * FROM loan_contract WHERE f_id='$fid' AND c_id='$cid' AND loan_id='$lid'";
  $res_loanc = mysqli_query($db, $sql_loanc) or die( mysqli_error($db));
  $loancontract = mysqli_fetch_assoc($res_loanc);
  #echo $loancontract['loan_id'];


  $sql_fin = "SELECT * FROM financier WHERE financier_number='$fid'";
  $res_fin = mysqli_query($db, $sql_fin) or die( mysqli_error($db));
  $financer= mysqli_fetch_assoc($res_fin);

  $lid = $loancontract['loan_id'];
  $sql_lnpmt = "SELECT * FROM loan_payment WHERE loan_id='$lid'";
  $res_lnpmt = mysqli_query($db, $sql_lnpmt) or die( mysqli_error($db));

  $lnsts = $loancontract['loan_status_code'];
  $sql_lnsts = "SELECT * FROM loan_status WHERE loan_status_code='$lnsts'";

  $per = $loancontract['amt_per_payment'];
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
                            <a href="index.php"><img src="assets/images/icon/logo2.png" width="200" height="53" class="align-top" alt="FinvestorLogo"></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">

                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0 color-green">
                                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?><i class="fa fa-angle-down"></i></h4>
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
                                    <li>
                                        <a href="index.php"><i class="ti-dashboard"></i><span>Home</span></a>
                                    </li>
                                    <li>
                                        <a href="customerTable.php"><i class="fa fa-toggle-off"></i><span>Customer</span></a>
                                    </li>

                                    <!-- <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-palette"></i><span>UI Features</span></a>
                                        <ul class="submenu">
                                            <li><a href="accordion.html">Accordion</a></li>
                                            <li><a href="alert.html">Alert</a></li>
                                            <li><a href="badge.html">Badge</a></li>
                                            <li><a href="button.html">Button</a></li>
                                            <li><a href="button-group.html">Button Group</a></li>
                                            <li><a href="cards.html">Cards</a></li>
                                            <li><a href="dropdown.html">Dropdown</a></li>
                                            <li><a href="list-group.html">List Group</a></li>
                                            <li><a href="media-object.html">Media Object</a></li>
                                            <li><a href="modal.html">Modal</a></li>
                                            <li><a href="pagination.html">Pagination</a></li>
                                            <li><a href="popovers.html">Popover</a></li>
                                            <li><a href="progressbar.html">Progressbar</a></li>
                                            <li><a href="tab.html">Tab</a></li>
                                            <li><a href="typography.html">Typography</a></li>
                                            <li><a href="form.html">Form</a></li>
                                            <li><a href="grid.html">grid system</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                                        <ul class="submenu">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="login2.html">Login 2</a></li>
                                            <li><a href="login3.html">Login 3</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="register2.html">Register 2</a></li>
                                            <li><a href="register3.html">Register 3</a></li>
                                            <li><a href="register4.html">Register 4</a></li>
                                            <li><a href="screenlock.html">Lock Screen</a></li>
                                            <li><a href="screenlock2.html">Lock Screen 2</a></li>
                                            <li><a href="reset-pass.html">reset password</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                            <li><a href="500.html">Error 500</a></li>
                                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-slice"></i><span>icons</span></a>
                                        <ul class="submenu">
                                            <li><a href="fontawesome.html">fontawesome icons</a></li>
                                            <li><a href="themify.html">themify icons</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-table"></i>
                                            <span>Tables</span></a>
                                        <ul class="submenu">
                                            <li><a href="table-basic.html">basic table</a></li>
                                            <li><a href="table-layout.html">table layout</a></li>
                                            <li><a href="datatable.html">datatable</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-lg-3 clearfix">
                        <div class="search-box">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
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
                                <li><a href="customerTable.php"><span>Customer Table</span></a></li>
                                <li><span>Financier Info.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card pad-25">
                            <div class="card-body">
                                <div class="customer-area">
                                    <div class="customer-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>FINANCIER INFORMATION</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span>#<?php echo $fid;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="customer-details">
                                                <h5 id="customer-name"><?php echo $financer['financier_name']; ?></h5>
                                                <p id="customer-address"><?php echo $financer['email'] ?> </br>
                                                <p id="customer-phone">+91-<?php echo $financer['phone_number']?></p>

                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                                <li>Invoice Date : <?php echo showDt($loancontract['contract_start']);?></li>
                                                <li>Due Date : <?php echo showDt($loancontract['contract_end']);?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                                        <table class="table table-bordered table-hover text-right">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th class="text-center" style="width: 5%;">ID</th>
                                                    <th class="text-left" style="width: 30%; min-width: 100px;">Description</th>
                                                    <th>Type</th>
                                                    <th>Installment Amount</th>
                                                    <th>Total Amount</th>
                                                    <th>Carry On</th>
                                                    <th>Paid</th>
                                                    <th>Payment Date</th>
                                                    <th>Next Due</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                              $sum=0;
                                              $carryon = 0;
                                              $carrysum = 0;
                                              $amt=0;
                                              $next_due = "";
                                              $paid = "";

                                              $res_lnsts = mysqli_query($db, $sql_lnsts) or die( mysqli_error($db));
                                              $loan_status  = mysqli_fetch_assoc($res_lnsts);
                                              $sts = $loan_status['loan_status_description'];

                                              $skip = true;

                                              while($loan_payment = mysqli_fetch_assoc($res_lnpmt)){

                                                if($skip){
                                                  $skip=false;
                                                  $next_due=$loan_payment['next_due'];
                                                  continue;
                                                }

                                                $amt = $loan_payment['amount_payment'];
                                                $paid = "Not Paid";
                                                if($loan_payment['paid']=='1') $paid = "Paid";
                                             ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $loan_payment['payment_id'];?></td>
                                                    <td class="text-left" style="width:30%;"><?php echo $loan_payment['description'];?></td>
                                                    <td><?php
                                                      if($loancontract['interest_type'] == "d"){
                                                        echo "Daily";
                                                      }
                                                      elseif($loancontract['interest_type'] == "m"){
                                                        echo "Monthly";
                                                      }
                                                      elseif($loancontract['interest_type'] == "y"){
                                                        echo "Annually";
                                                      }
                                                      elseif($loancontract['interest_type'] == "w"){
                                                        echo "Weekly";
                                                      }
                                                      else{
                                                        echo "-";
                                                      }
                                                     ?></td>
                                                    <td><?php echo $per; ?></td>
                                                    <td>INR <?php echo $per+$carryon; $sum+=$amt; $carrysum+=$carryon;$carryon = $loan_payment['carry_on'];?></td>
                                                    <td>INR <?php echo  $carryon;?></td>
                                                    <td><?php echo $paid;
                                                      if($paid=="Paid"){
                                                        $carryon=0;
                                                      }
                                                      elseif($paid=="Not Paid"){
                                                        $carryon += $per;
                                                      }
                                                    ?></td>
                                                    <td><?php echo showDt($loan_payment['date_payment']); ?></td>
                                                    <td><?php echo showDt($loan_payment['next_due']); $next_due=$loan_payment['next_due'];?></td>
                                                    <td><?php echo $sts; ?></td>
                                                </tr>

                                                <?php
                                                  }

                                                  $next_due_calc = addDate($next_due,$loancontract['interest_type']);
                                                  $new_amt = $loancontract['loan_amount']-$sum+$carrysum;

                                                  $pend = "total pending :";

                                                  if($new_amt<=0){
                                                    $new_amt=0;
                                                    $pend="Amount :";
                                                  }
                                                 ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4"><?php echo $pend; ?></td>
                                                    <td>INR <?php echo $new_amt;?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
