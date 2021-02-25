            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admins</a>
                                            </li>
                                            <li class="breadcrumb-item active">All Admin List</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Admin List</h4>
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
                                            <?php } else { ?>
                                            <?php
                                                $failure = $this->session->userdata('failure');
                                                if ($failure != "") { ?>
                                            <div class="alert alert-danger"><b><?php echo $failure ?></b></div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </h4>
                                        <a href="<?php  echo base_url();?>home/add_admins"><button type="button"
                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Profile Photo</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>State</th>
                                                    <th>Goverment</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($rev)) {
                                                    foreach ($rev as $key => $val) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td>
                                                        <img src="<?php  echo base_url().'assets/admin/uploads/admins/'.$val['photo']?>" height="100px" width="100px">
                                                    </td>
                                                    <td>
                                                        <?php echo $val['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['opassword']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['phone']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['state']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['LG']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($val['status'] == 1) {
                                                        ?>
                                                        <a
                                                            href="<?= base_url() . 'home/block_admins/' . $val['id']; ?>"><button
                                                                type="button"
                                                                class="btn btn-secondary btn-sm waves-effect waves-light"><i
                                                                    class="mdi mdi-account-lock"></i>
                                                                Block</button></a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <a
                                                            href="<?= base_url() . 'home/unblock_admins/' .$val['id']; ?>"><button
                                                                type="button"
                                                                class="btn btn-success btn-sm waves-effect waves-light"><i
                                                                    class="mdi mdi-account-key"></i>
                                                                UnBlock</button></a>
                                                        <?php
                                                            }
                                                        ?>
                                                        <a
                                                            href="<?= base_url() . 'home/add_admins/' . $val['id']; ?>"><button
                                                                type="button"
                                                                class="btn btn-warning btn-sm waves-effect waves-light"><i
                                                                    class="mdi mdi-square-edit-outline"></i>
                                                                Edit</button></a>

                                                        <a
                                                            href="<?= base_url() . 'home/delete_admin/' . $val['id']; ?>"><button
                                                                type="button"
                                                                class="btn btn-danger btn-sm waves-effect waves-light"><i
                                                                    class="mdi mdi-delete"></i> Delete</button></a>
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