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
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Revenue</a></li>
                                            <li class="breadcrumb-item active">Local Goverment Revenue Ranking</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Local Goverment Revenue Ranking</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">
                                            <?php
                                                $success = $this->session->userdata('success');
                                                if ($success != "") { 
                                            ?>
                                                    <div class="alert alert-success"><b><?php echo $success ?></b></div>
                                                <?php }else{ ?>
                                                <?php
                                                    $failure = $this->session->userdata('failure');
                                                if ($failure != "") { ?>
                                                    <div class="alert alert-danger"><b><?php echo $failure ?></b></div>
                                            <?php 
                                                } 
                                            }
                                            ?>
                                        </h4>
                                        <!-- <a href="<?php  echo base_url();?>Admin/addhotelcategory"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a> -->
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Rank</th>
                                                    <th>State</th>
                                                    <th>Government</th>
                                                    <th>Date Of Payment</th>
                                                    <th>Revenue (NGN)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($rev_his)){
                                                       foreach($rev_his as $key => $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo $val['state']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['government']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['paymentdate']?>
                                                    </td>
                                                    <?php
                                                        if ($val['trans_amount']  !='') {
                                                    ?>
                                                    <td>
                                                        <?php echo number_format((float)$val['trans_amount'], 2, '.', '');?>
                                                    </td>
                                                    <?php
                                                        }else{
                                                    ?>
                                                    <td>
                                                        <?php 
                                                        $zero = 0;
                                                        echo number_format((float)$zero, 2, '.', '');?>
                                                    </td>
                                                    <?php
                                                        }
                                                    ?>
                                                </tr>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->