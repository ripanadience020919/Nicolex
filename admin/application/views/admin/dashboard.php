            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                <i class="fe-heart font-22 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">NGN&nbsp;<span data-plugin="counterup"><?php echo $this_year;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">THIS YEAR TOTAL REVENUE</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">NGN&nbsp;<span data-plugin="counterup"><?php echo $this_day;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">TODAY's REVENUE</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">NGN&nbsp;<span data-plugin="counterup"><?php echo $this_week;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">THIS WEEK's REVENUE</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                <i class="fe-eye font-22 avatar-title text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">NGN&nbsp;<span data-plugin="counterup"><?php echo $this_month;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">THIS MONTH's REVENUE</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <!-- <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div> -->

                                    <h4 class="header-title mb-3">TOP 5 LOCAL GOVERMENT REVENUE RANKING</h4>

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th colspan="4">Rank</th>
                                                    <th colspan="4">Local Goverment</th>
                                                    <th colspan="4">Revenue (NGN)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($rev)) {
                                                        foreach ($rev as $key => $value) {
                                                            if ($key < 5) {
                                                ?>
                                                <tr>
                                                    <td colspan="4">
                                                        <?php echo $key+1;?>
                                                    </td>
                                                    <td colspan="4">
                                                        <?php echo $value['government']?>
                                                    </td>
    
                                                    <td colspan="4">
                                                        <?php echo $value['trans_amount']?>
                                                    </td>
                                                </tr>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <th>
                                                    <a href="<?php echo base_url();?>home/get_LGs_rev">VIEW MORE</a>
                                                </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mb-3">Revenue History</h4>

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Marketplaces</th>
                                                    <th>Date</th>
                                                    <th>Payouts</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                                    </td>
    
                                                    <td>
                                                        Oct 15, 2018
                                                    </td>
    
                                                    <td>
                                                        $5848.68
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Freelance</h5>
                                                    </td>
    
                                                    <td>
                                                        Oct 12, 2018
                                                    </td>
    
                                                    <td>
                                                        $1247.25
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-success text-success">Paid</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                                    </td>
    
                                                    <td>
                                                        Oct 10, 2018
                                                    </td>
    
                                                    <td>
                                                        $815.89
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-success text-success">Paid</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                                    </td>
    
                                                    <td>
                                                        Oct 03, 2018
                                                    </td>
    
                                                    <td>
                                                        $248.75
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-danger text-danger">Overdue</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                                    </td>
    
                                                    <td>
                                                        Sep 21, 2018
                                                    </td>
    
                                                    <td>
                                                        $978.21
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                                    </td>
    
                                                    <td>
                                                        Sep 15, 2018
                                                    </td>
    
                                                    <td>
                                                        $358.10
                                                    </td>
    
                                                    <td>
                                                        <span class="badge bg-soft-success text-success">Paid</span>
                                                    </td>
    
                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                