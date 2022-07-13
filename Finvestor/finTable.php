<?php

  session_start();


  if($_SESSION['log']!=true || $_SESSION['user_type'] != 'f'){
    header("Location: index.php");
  }

  $db = mysqli_connect("localhost","root","","loan_management");

  $uname = $_SESSION['username'];
  $sql_fin = "SELECT * FROM user WHERE user_name='$uname'";
  $res_fin = mysqli_query($db, $sql_fin) or die( mysqli_error($db));
  $financer = mysqli_fetch_assoc($res_fin);
  $fid = $financer['user_id'];

  $sql_loanc = "SELECT * FROM loan_contract WHERE f_id='$fid'";
  $res_loanc = mysqli_query($db, $sql_loanc) or die( mysqli_error($db));


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
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
        <?php
        $list = "";

        if($_SESSION['log']==true){

          if($_SESSION['user_type'] == "c"){
            $list .=  "<li class='navbx text-uppercase'><a href='index.php'>Home</a></li>
                        <li class='navbx text-uppercase'><a href='getloan.php'>Get Loan</a></li>
                           <li class='navbx text-uppercase'><a href='customerTable.php'>Customer Table</a></li>";
          }
          elseif($_SESSION['user_type'] == "f"){
            $list .=  "<li class='navbx text-uppercase'><a href='index.php'>Home</a></li>
            <li class='active navbx text-uppercase'><a href='finTable.php'>Financier Table</a></li>
                       <li class='navbx text-uppercase'><a href='loanapplicants.php'>Loan Applicants</a></li>
                       <li class='navbx text-uppercase'><a href='acceptedloans.php'>Accepted Loans</a></li>";
          }
         }
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
        <!-- <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="index.php"><i class="ti-dashboard"></i><span>home</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-toggle-off"></i><span>financier</span></a>
                                    </li>
                                    <li class="mega-menu">
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
                                </ul>
                            </nav>
                        </div>
                    </div>  -->
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
        <!-- header area end -->
        <!-- page title area end -->
         <!-- <div class="page-title-area container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#"><span>Financier Table</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- main content area end -->
        <div class="main-content-inner container">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-4">
                        <div class="card pad-25">
                            <div class="card-body">
                                <h4 class="header-title">Financier Table</h4>
                                <p class="header-tag">Click name to get complete Customer details</p>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center" style="width:100%;">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Adress</th>
                                                <th>Phone Number</th>
                                                <th>Loan Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              while($loancontract = mysqli_fetch_assoc($res_loanc)){

                                                $cid = $loancontract['c_id'];
                                                $lid = $loancontract['loan_id'];

                                                $sql_cus = "SELECT * FROM customer WHERE customer_number='$cid'";
                                                $res_cus = mysqli_query($db, $sql_cus) or die( mysqli_error($db));


                                                while ($customer= mysqli_fetch_assoc($res_cus)) {
                                            ?>
                                            <tr>
                                                <td><a href="customerinfo.php?cid=<?php echo $cid?>&lid=<?php echo $lid ?>"><?php echo $customer['customer_name']; ?></a></td>
                                                <td><?php echo $customer['age']; ?></td>
                                                <td><?php echo $customer['address'];?></td>
                                                <td>+91-<?php echo $customer['phone_number']; ?></td>
                                                <td>INR <?php echo $loancontract['loan_amount']; ?></td>
                                            </tr>
                                            <?php
                                                }
                                              }
                                             ?>
                                        </tbody>
                                    </table>
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
     <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
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
