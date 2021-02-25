        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('home/add_property_rate_data') : base_url('home/edit_property_rate_data') ;
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
                                            <li class="breadcrumb-item active"><?=$display?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form id="queikform" action="<?=$submit_url?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="type" id="type">
                                                    <option value="">Select</option>
                                                    <?php
                                                    if ($user_id=='ADD') 
                                                    {
                                                        if (!empty($type)) 
                                                        {
                                                            foreach ($type as $key => $value)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $value['typeofproperty']; ?>"><?php echo $value['typeofproperty']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        if (!empty($type)) 
                                                        {
                                                            foreach ($type as $key => $value)
                                                            {
                                                                if ($value['typeofproperty'] == $list->type)
                                                                {
                                                                    $c = "selected";
                                                                }
                                                                else
                                                                {
                                                                    $c = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $value['typeofproperty']; ?>"<?php echo $c; ?>><?php echo $value['typeofproperty']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product-name">identification<span class="text-danger">*</span></label>
                                                <input type="text" id="identification"  name="identification" class="form-control" placeholder="identification" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">landuse<span class="text-danger">*</span></label>
                                                <input type="text" id="landuse"  name="landuse" class="form-control" placeholder="landuse" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">wastesystem<span class="text-danger">*</span></label>
                                                <input type="text" id="wastesystem"  name="wastesystem" class="form-control" placeholder="wastesystem" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product-name">radiationfee<span class="text-danger">*</span></label>
                                                <input type="text" id="radiationfee"  name="radiationfee" class="form-control" placeholder="radiationfee" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">infrastructre<span class="text-danger">*</span></label>
                                                <input type="text" id="infrastructre"  name="infrastructre" class="form-control" placeholder="infrastructre" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">polution<span class="text-danger">*</span></label>
                                                <input type="text" id="polution"  name="polution" class="form-control" placeholder="polution" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">State<span class="text-danger">*</span></label>
                                                <select class="form-control" name="state" id="state" onchange="getGOVT();">
                                                    <option value="">Select</option>
                                                    <?php
                                                    if ($user_id=='ADD') 
                                                    {
                                                        if (!empty($state)) 
                                                        {
                                                            foreach ($state as $key => $value) 
                                                            {
                                                                ?>
                                                                <option value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    } 
                                                    else
                                                    {
                                                        if (!empty($state)) 
                                                        {
                                                            foreach ($state as $key => $value) 
                                                            {
                                                                if ($value['state'] == $list->state)
                                                                {
                                                                    $c = "selected";
                                                                }
                                                                else
                                                                {
                                                                    $c = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $value['state']; ?>"<?php echo $c; ?>><?php echo $value['state']; ?></option>
                                                                <?php
                                                            }
                                                        } 
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">GOVT.<span class="text-danger">*</span></label>
                                                <select class="form-control" id="goverment" name="goverment">
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id">
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href ="<?php echo base_url();?>home/property_rate" class="btn w-sm btn-danger waves-effect">Cancel</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("identification").value = "<?=$list->identification?>";
        document.getElementById("landuse").value = "<?=$list->landuse?>";
        document.getElementById("wastesystem").value = "<?=$list->wastesystem?>";
        document.getElementById("radiationfee").value = "<?=$list->radiationfee?>";
        document.getElementById("infrastructre").value = "<?=$list->infrastructre?>";
        document.getElementById("polution").value = "<?=$list->polution?>";
        setTimeout(function(){
          getGOVT_edit();
        }, 1000);
    }
    function getGOVT_edit(e)
    { 
        // alert('test');
        // event.preventDefault();
        //attvalue
        var form1 = $('#queikform')[0];
        // alert(form1);
        var data = new FormData(form1);
        var url2="<?php echo base_url(); ?>home/get_govt1";
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
            $('#goverment').html(data);
            //ajaxindicatorstop();
          },
          error: function (e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
            }
        }); 
    }
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
        var url2="<?php echo base_url(); ?>home/get_govt1";
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
            $('#goverment').html(data);
            //ajaxindicatorstop();
          },
          error: function (e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
            }
        }); 
    }
</script>
