        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  // $submit_url = ($user_id=='ADD') ? base_url('home/add_faq_data') : base_url('home/edit_faq_data') ;
?>
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
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li> -->
                                            <li class="breadcrumb-item active">  FaQ </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">FaQ Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form  action="" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Question<span class="text-danger">*</span></label>
                                                <input type="text" id="question"  name="question" class="form-control" value="<?php if(!empty($list->question)) { echo $list->question; } ?>" placeholder="Question" required disabled>
                                            </div>
                                          </div>
                                        </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Answer<span class="text-danger">*</span></label>
                                                <textarea id="answer"  name="answer" class="form-control" placeholder="Answer" rows="10" required disabled><?php if(!empty($list->answer)) { echo $list->answer; } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" value="<?php if(!empty($list->id)) { echo $list->id; } ?>" name="id">
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href ="<?php echo base_url();?>home/faq_list" class="btn w-sm btn-danger waves-effect">Back</a>
                                    <!-- <input type="submit" value="Save" class="btn w-sm btn-success"> -->
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
                                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript">
    /*if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("question").value = "<?=$list->question?>";
        document.getElementById("answer").value = "<?=$list->answer?>";
    }*/
</script>