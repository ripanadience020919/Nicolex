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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Entry</a></li>
                                        <li class="breadcrumb-item active">Edit Use Type Of Vehicle Radio & Parking</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Use Type Of Vehicle Radio & Parking</h4>
                            </div>
                            <?php
                                } else {
                            ?>
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Entry</a></li>
                                        <li class="breadcrumb-item active">Add Use Type Of Vehicle Radio & Parking</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Use Type Of Vehicle Radio & Parking</h4>
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
                    <form action="<?php echo base_url();?>home/store_vrp_use_type" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Use Type Of Vehicle Radio & Parking<span
                                                        class="text-danger">*</span></label>
                                                <input type="hidden" name="use_type_id"
                                                    value="<?php if(!empty($rev['id'])){echo $rev['id'];} ?>">
                                                <input type="text" id="use_type" name="use_type" class="form-control"
                                                    placeholder="Enter Property Type"
                                                    value="<?php if(!empty($rev['usetypeofvrp'])){echo $rev['usetypeofvrp'];} ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>home/vrp_use_type"
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
                    <form action="<?php echo base_url();?>home/store_vrp_use_type" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Use Type Of Vehicle Radio & Parking<span class="text-danger">*</span></label>
                                                <input type="text" id="use_type" name="use_type" class="form-control"
                                                    placeholder="Enter Use Type" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>home/vrp_use_type"
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