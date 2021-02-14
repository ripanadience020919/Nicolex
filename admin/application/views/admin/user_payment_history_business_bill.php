            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php 
                $id = isset($id) ? $id : 'ADD';
                $submit_url = ($id=='ADD') ? 'user_add_submit' : 'user_edit_submit' ;
            ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <a href="<?=base_url().'home/user_payment_history_bisuness/'.$id ?>" class="btn btn-success" style="margin-top: 17px;">Bisuness</a>
                                    <a href="<?=base_url().'home/user_payment_history_property/'.$id ?>" class="btn btn-info" style="margin-top: 17px;">Property</a>
                                    <a href="<?=base_url().'home/user_payment_history_vehicle/'.$id ?>" class="btn btn-blue" style="margin-top: 17px;">Vehicle</a>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Others</a></li>
                                            <li class="breadcrumb-item active">Info</li>
                                        </ol>
                                    </div>
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
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Size</th>
                                                    <th>Contact Mobile</th>
                                                    <th>State</th>
                                                    <th>Payment Status</th>
                                                    <th>Amount (NGN)</th>
                                                    <th>Transaction Reference No.</th>
                                                    <th>Transaction Id</th>
                                                    <th>Payment Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($list)){ foreach($list as $key => $val){
                                                    $date=date_create($val['paymentdate']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td><?=$val['name'];?></td>    
                                                    <td><?=$val['address'];?></td>    
                                                    <td><?=$val['email'];?></td>    
                                                    <td><?=$val['size'];?></td>        
                                                    <td><?=$val['personmobile'];?></td>    
                                                    <td><?=$val['state'];?></td>
                                                    <?php
                                                            if ($val['billstatus'] == 'C') {
                                                    ?>
                                                    <td>Successful</td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td>Pending</td>
                                                    <?php
                                                            }
                                                    ?>
                                                    <?php
                                                        if ($val['trans_amount'] !='') {
                                                    ?>
                                                    <td><?=$val['trans_amount'];?></td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td>NA</td>
                                                    <?php
                                                            }
                                                    ?>
                                                    <?php
                                                        if ($val['tx_ref'] !='') {
                                                    ?>
                                                    <td><?=$val['tx_ref'];?></td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td>NA</td>
                                                    <?php
                                                            }
                                                    ?>
                                                    <?php
                                                        if ($val['transaction_id'] !='') {
                                                    ?>
                                                    <td><?=$val['transaction_id'];?></td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td>NA</td>
                                                    <?php
                                                            }
                                                    ?>
                                                    <?php
                                                        if ($val['paymentdate'] !='') {
                                                    ?>
                                                    <td><?php echo date('d-m-Y',strtotime($val['paymentdate']));?></td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                    <td>NA</td>
                                                    <?php
                                                            }
                                                    ?>
                                                </tr>
                                                <?php }}?>
                                            </tbody>
                                        </table>                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                </div> 