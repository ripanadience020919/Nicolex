            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                            <li class="breadcrumb-item active">All Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$title?></h4>
                                </div>
                            </div>
                        </div>   
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
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Gender</th>
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
                                                        <?php echo $val['username'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['email'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['mobile'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['gender'];?>
                                                    </td>
                                                    <td>
                                                        <?php if($val['status']=='Y') { echo '<span class="badge badge-soft-success">Active</span>'; }else{ echo '<span class="badge badge-soft-danger">Deny</span>';}?>
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="<?php if($val['status']=='Y') { echo base_url('home/status_change_user/'.$val['id'].'/N');} else { echo base_url('home/status_change_user/'.$val['id'].'/Y'); }?>"><button  style="width: 81px;" type="button" class="btn btn-<?php if($val['status']=='Y') { echo "warning";} else { echo "success"; } ?> btn-sm waves-effect waves-light"><?php if($val['status']=='Y') { ?>Deny <?php } else {?>Activated<?php } ?></button></a>

                                                        <a href="<?=base_url().'home/user_details/'.$val['id']; ?>"><button type="button" class="btn btn-info btn-sm waves-effect waves-light"><i class="mdi mdi-file-eye"></i> Details</button></a>

                                                        <a href="<?=base_url().'home/user_payment_history_bisuness/'.$val['id']; ?>"><button type="button" class="btn btn-pink btn-sm waves-effect waves-light"><i class="mdi mdi-history"></i> History</button></a>

                                                        <a href="<?=base_url().'home/user_edit/'.$val['id']; ?>"><button type="button" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i> Edit</button></a>

                                                        <a href="<?=base_url().'home/delete_user/'.$val['id']; ?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light"><i class="mdi mdi-delete"></i> Delete</button></a>
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
                    </div>
                </div>