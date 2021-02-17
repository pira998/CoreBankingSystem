<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/public/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/public/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CBS
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
   
    <link href="/public/assets/css/material-dashboard.css" rel="stylesheet"/>


    <link rel="stylesheet" href="/public/assets/css/card.css" />
    <link rel="stylesheet/less" type="text/css" href="/public/assets/scss/card.less" />
    <link rel="stylesheet" href="/public/assets/css/table.css">
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
</head>


<body class="">
    <?php

    // $username = $_SESSION['customer'];
    // $sql = "SELECT * FROM `customer_info` where username='$username';";
    // $array = mysqli_query($connection, $sql);
    // $obj = mysqli_fetch_array($array);
    // $customer = new customer($obj);

    ?>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="/public/assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="/index.php" class="simple-text logo-normal">
                   CBS
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  ">
                        <a class="nav-link" href="/customer/index">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/customer/profile/index/<?php echo $_SESSION['customer_id'];?>">
                            <i class="material-icons">person</i>
                            <p>Customer Profile</p>
                        </a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="/customer/fixedDeposits/index/<?php echo $_SESSION['customer_id'];?>">
                            <i class="material-icons">person</i>
                            <p>Fixed Deposits</p>
                        </a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="/customer/transactions/index/<?php echo $_SESSION['customer_id'];?>">
                            <i class="material-icons">person</i>
                            <p>Transactions</p>
                        </a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="/customer/loanRequests/index/<?php echo $_SESSION['customer_id'];?>">
                            <i class="material-icons">person</i>
                            <p>Loans Requests</p>
                        </a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="/customer/loans/index/<?php echo $_SESSION['customer_id'];?>">
                            <i class="material-icons">person</i>
                            <p>Loans</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">

                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/customer/profile/logout">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->



            <div class="fixed-plugin">
                <div class="dropdown show-dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Filters</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger active-color">
                                <div class="badge-colors ml-auto mr-auto">
                                    <span class="badge filter badge-purple" data-color="purple"></span>
                                    <span class="badge filter badge-azure" data-color="azure"></span>
                                    <span class="badge filter badge-green" data-color="green"></span>
                                    <span class="badge filter badge-warning" data-color="orange"></span>
                                    <span class="badge filter badge-danger" data-color="danger"></span>
                                    <span class="badge filter badge-rose active" data-color="rose"></span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="header-title">Images</li>
                        <li class="active">
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="/public/assets/img/sidebar-1.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="/public/assets/img/sidebar-2.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="/public/assets/img/sidebar-3.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="/public/assets/img/sidebar-4.jpg" alt="">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>