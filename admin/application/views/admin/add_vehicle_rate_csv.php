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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Entry</a></li>
                                        <li class="breadcrumb-item active">Upload Vehicle Rate CSV</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Upload Vehicle Rate CSV</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form action="<?php echo base_url();?>csv_import/import_veh_rate_csv" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Upload Vehicle Rate CSV<span
                                                        class="text-danger">*</span></label>
                                                <a href="<?php  echo base_url();?>assets/admin/uploads/csv/Vehicle_rate_csv_format.csv" download><button type="button"
                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                style="float: right;"><i class="fe-download mr-1"></i> Download Format</button></a>
                                                <input type="file" data-plugins="dropify" name="csv_file" id="csv_file" accept=".csv" data-height="300" required="required">

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>home/add_business_rate_csv"
                                        class="btn w-sm btn-danger waves-effect">Cancel</a>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>


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