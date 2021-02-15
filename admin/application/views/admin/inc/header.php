<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?php echo $title; ?> | Nicolex Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon1.ico"> -->

    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-creative.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/app-creative.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap-creative-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- third party css -->
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- icons -->
    <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>assets/images/users/user-1.jpg" alt="user-image"
                                class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?php echo $this->session->userdata('username') ?><i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a> -->

                            <!-- <?php
                                    if (($this->session->userdata('role') == 1) || $this->session->userdata('role') == 2) {
                                    ?>
    
                                
                                <a href="<?php echo base_url() ?>home/reset_password" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Reset Password</span>
                                </a>

                                <?php
                                    }
                                ?> -->

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <?php
                            if ($this->session->userdata('role') == 1) {
                            ?>
                            <a href="<?php echo base_url(); ?>home/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <?php
                            } elseif ($this->session->userdata('role') == 2) {
                            ?>
                            <a href="<?php echo base_url(); ?>manager/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <?php
                            } else {
                            ?>
                            <a href="<?php echo base_url(); ?>deliveryboy/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <?php
                            }
                            ?>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo base_url(); ?>home/dashboard" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <!-- <img src="<?php echo base_url(); ?>assets/images/logo-sm1.png" alt="" height="50px" width="50px"> -->
                            <span class="logo-lg-text-light">Nicolex Admin</span>
                        </span>
                        <span class="logo-lg">
                            <!-- <img src="<?php echo base_url(); ?>assets/images/logo-sm1.png" alt="" height="50px" width="50px"> -->
                            <span class="logo-lg-text-light">Nicolex Admin</span>
                        </span>
                    </a>

                    <a href="<?php echo base_url(); ?>home/dashboard" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <!-- <img src="<?php echo base_url(); ?>assets/images/logo-sm1.png" alt="" height="50px" width="50px"> -->
                            <span class="logo-lg-text-light">Nicolex Admin</span>
                        </span>
                        <span class="logo-lg">
                            <!-- <img src="<?php echo base_url(); ?>assets/images/logo-sm1.png" alt="" height="50px" width="50px"> -->
                            <span class="logo-lg-text-light">Nicolex Admin</span>
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topnav shadow-lg">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="<?php echo base_url(); ?>">
                                    <i class="fe-airplay mr-1"></i> Dashboard
                                </a>
                            </li>
                            <?php
                            if ($this->session->userdata('role') == 1) {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Exemptions <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/businessexemptionslist"
                                        class="dropdown-item">
                                        Business Exemption</a>
                                    <a href="<?php echo base_url(); ?>home/vrpexemptionslist" class="dropdown-item">
                                        Vehicle Radio & Parking Permit Exemption</a>
                                    <a href="<?php echo base_url(); ?>home/propertyexemptionslist"
                                        class="dropdown-item">
                                        Property Exemption</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Others <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/faq_list" class="dropdown-item"> FaQ </a>
                                    <a href="<?php echo base_url(); ?>home/info_list" class="dropdown-item"> Info </a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Users <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/user_add" class="dropdown-item"> User Add
                                    </a>
                                    <a href="<?php echo base_url(); ?>home/user_list" class="dropdown-item"> User List
                                    </a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Support Requests <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/query_list" class="dropdown-item"> Query List
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Payments <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/payment_analysis"
                                        class="dropdown-item">Payment Analysis</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-tag mr-1"></i> Master
                                    Entry <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <a href="<?php echo base_url(); ?>home/state_with_gov" class="dropdown-item">State
                                        With Goverment</a>
                                    <a href="<?php echo base_url(); ?>home/business_size" class="dropdown-item">Size
                                        of Business</a>
                                    <a href="<?php echo base_url(); ?>home/business_type" class="dropdown-item">Business
                                        Type</a>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul> <!-- end navbar-->
                    </div> <!-- end .collapsed-->
                </nav>
            </div> <!-- end container-fluid -->
        </div> <!-- end topnav-->