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
                                                    <th colspan="4">Action</th>
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
                                                    <?php
                                                            if (!empty($value['trans_amount'])) {
                                                    ?>
                                                    <td colspan="4">
                                                        <?php echo number_format((float)$value['trans_amount'], 2, '.', '');?>
                                                    </td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td colspan="4">
                                                        <?php echo number_format((float)0, 2, '.', '');?>
                                                    </td>
                                                    <?php
                                                            }
                                                    ?>
                                                    <td colspan="4">
                                                        <a href="<?php  echo base_url().'home/rev_history/'.$value['government']?>"><button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        >Revenue History</button>
                                                        </a>
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
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                