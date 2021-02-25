            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Entry</a>
                                            </li>
                                            <li class="breadcrumb-item active"><?=$title?></li>
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
                                        <a href="<?php  echo base_url();?>home/add_business_rate"><button type="button"
                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <a href="<?php  echo base_url();?>home/add_business_rate_csv"><button type="button"
                                                class="btn btn-success btn-sm waves-effect waves-light"
                                                style="float: right;"><i class="fe-plus mr-1"></i> UPLOAD CSV</button></a>
                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Category</th>
                                                    <th>bidenticationfee (NGN)</th>
                                                    <th>hselevy (NGN)</th>
                                                    <th>professionallevy (NGN)</th>
                                                    <th>refusedisposal (NGN)</th>
                                                    <th>billboard (NGN)</th>
                                                    <th>fire (NGN)</th>
                                                    <th>privateenterprise (NGN)</th>
                                                    <th>evssanitation (NGN)</th>
                                                    <th>total (NGN)</th>
                                                    <th>State</th>
                                                    <th>Government</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($list)) {
                                                    foreach ($list as $key => $val) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td>
                                                        <?php echo $val['category'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['bidenticationfee']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['hselevy']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['professionallevy']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['refusedisposal']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['billboard']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['fire']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['privateenterprise']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['evssanitation']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['total']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['state']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['government']; ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="<?= base_url() . 'home/edit_business_rate/' . $val['id']; ?>"><button
                                                                type="button"
                                                                class="btn btn-warning btn-sm waves-effect waves-light"><i
                                                                    class="mdi mdi-square-edit-outline"></i>
                                                                Edit</button></a>

                                                        <a
                                                            href="<?= base_url() . 'home/delete_business_rate/' . $val['id']; ?>"><button
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