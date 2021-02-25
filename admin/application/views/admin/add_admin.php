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
                            <?php
                                if (!empty($rev['id'])) {
                            ?>
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admins</a></li>
                                        <li class="breadcrumb-item active">Edit a Admin</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit a Admin</h4>
                            </div>
                            <?php
                                } else {
                            ?>
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admins</a></li>
                                        <li class="breadcrumb-item active">Add a Admin</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add a Admin</h4>
                            </div>
                            <?php
                                } 
                            ?>

                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                            if (!empty($rev)) {
                    ?>
                    <form id="queikform1" action="<?php echo base_url();?>home/store_admin" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <input type="hidden" name="sub_admin_id"
                                    value="<?php if(!empty($rev['id'])){echo $rev['id'];} ?>">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Username<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="username" name="username" class="form-control"
                                                    placeholder="Enter Username" value="<?php if(!empty($rev['username'])){echo $rev['username'];} ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Password<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Enter Password" value="<?php if(!empty($rev['opassword'])){echo $rev['opassword'];} ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Phone<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    placeholder="Enter Phone No" value="<?php if(!empty($rev['phone'])){echo $rev['phone'];} ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Enter Email" value="<?php if(!empty($rev['email'])){echo $rev['email'];} ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Select State<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="example-select" onchange="getGOVT_edit();" name="state">
                                                <option value="0">Select a State</option>
                                                <?php
                                                    $state = getStates();
                                                    foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value;?>"
                                                    <?php if ($rev['state'] == $value) {echo "selected";} ?>
                                                        ><?php echo $value;?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Select Government<span class="text-danger">*</span></label>
                                                <select class="form-control govermentt" id="example-select" name="LG[]" multiple>
                                                <option value="0">Select a Government</option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-image">Profile Image<span class="text-danger">*</span></label>
                                                <input type="file" data-plugins="dropify" name="photo" value="<?php if(!empty($rev['photo'])){echo $rev['photo'];} ?>" data-height="300">

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>home/all_admins"
                                        class="btn w-sm btn-danger waves-effect">Cancel</a>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                    <?php
                            }else{
                    ?>
                    <form id="queikform" action="<?php echo base_url();?>home/store_admin" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Username<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="username" name="username" class="form-control"
                                                    placeholder="Enter Username" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Password<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Phone<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    placeholder="Enter Phone No" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Select State<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="example-select" onchange="getGOVT();" name="state">
                                                <option value="0">Select a State</option>
                                                <?php
                                                    $state = getStates();
                                                    foreach ($state as $value) {
                                                ?>
                                                <option value="<?php echo $value;?>"><?php echo $value;?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Select Government<span class="text-danger">*</span></label>
                                                <select class="form-control goverment" id="example-select" name="LG[]" multiple>
                                                <option value="0">Select a Government</option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-image">Profile Image<span class="text-danger">*</span></label>
                                                <input type="file" data-plugins="dropify" name="photo" data-height="300" required="required">

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>home/all_admins"
                                        class="btn w-sm btn-danger waves-effect">Cancel</a>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                    <?php
                        }
                    ?>


                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);" class="text-muted font-weight-bold"
                                            data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
                setTimeout(function(){
                  getGOVT_edit();
                }, 1000);
            </script>
            <script type="text/javascript">
                function getGOVT(e)
                { 
                    // alert('test');
                    event.preventDefault();
                    //attvalue
                    var form1 = $('#queikform')[0];
                    // alert(form1);
                    var data = new FormData(form1);
                    var url2="<?php echo base_url(); ?>home/get_govt";
                    $.ajax({
                      type: "POST",
                      enctype: 'multipart/form-data',
                      url: url2,
                      data: data,
                      processData: false,
                      contentType: false,
                      cache: false,
                      timeout: 600000,
                      success: function (data) {
                        // alert(data);
                        $('.goverment').html(data);
                        //ajaxindicatorstop();
                      },
                      error: function (e) {
                        alert("ERROR : ", e);
                        //ajaxindicatorstop();
                        }
                    }); 
                }

                function getGOVT_edit(e)
                { 
                    // alert('test');
                    // event.preventDefault();
                    //attvalue
                    var form1 = $('#queikform1')[0];
                    // alert(form1);
                    var data = new FormData(form1);
                    var url2="<?php echo base_url(); ?>home/get_govt_edit";
                    $.ajax({
                      type: "POST",
                      enctype: 'multipart/form-data',
                      url: url2,
                      data: data,
                      processData: false,
                      contentType: false,
                      cache: false,
                      timeout: 600000,
                      success: function (data) {
                        // alert(data);
                        $('.govermentt').html(data);
                        //ajaxindicatorstop();
                      },
                      error: function (e) {
                        alert("ERROR : ", e);
                        //ajaxindicatorstop();
                        }
                    }); 
                }
            </script>