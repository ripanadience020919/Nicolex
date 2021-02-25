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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Others</a></li>
                                            <li class="breadcrumb-item active">Info</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$title?></h4>
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
                                        <a href="<?php  echo base_url();?>home/add_info"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($list)){
                                                       foreach($list as $key => $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo $val['title'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['description'];?>
                                                    </td>
                                                    <td>
                                                        <?php if($val['status']=='A') { echo "<b style=color:green;>Active</b>"; }else{ echo "<b style=color:orange;>Pending</b>";}?>
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="<?php if($val['status']=='A') { echo base_url('home/status_change_info/'.$val['id'].'/D');} else { echo base_url('home/status_change_info/'.$val['id'].'/A'); }?>"><button type="button" class="btn btn-<?php if($val['status']=='A') { echo "warning";} else { echo "success"; } ?> btn-sm waves-effect waves-light"><?php if($val['status']=='A') { ?>Pending <?php } else {?>Activate<?php } ?></button></a>

                                                        <a href="<?php echo base_url()?>home/edit_info/<?php echo $val['id'];?>"><button type="button" class="btn btn-dark btn-sm waves-effect waves-light">Edit</button></a>

                                                        <a href="<?php echo base_url()?>home/info_details/<?php echo $val['id'];?>"><button type="button" class="btn btn-info btn-sm waves-effect waves-light">View</button></a>

                                                        <a href="<?php echo base_url()?>home/delete_info/<?php echo $val['id'];?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button></a>
                                                    </td>
                                                    
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