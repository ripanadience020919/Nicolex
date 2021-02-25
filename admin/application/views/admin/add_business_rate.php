        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('home/add_business_rate_data') : base_url('home/edit_business_rate_data') ;
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
                                            <div class="col-md-6">
                                                <label for="product-name">Business<span class="text-danger">*</span></label>
                                                <select class="form-control" name="bid" id="bid">
                                                    <option value="">Select</option>
                                                    <?php
                                                    if ($user_id=='ADD') 
                                                    {
                                                        if (!empty($busi)) 
                                                        {
                                                            foreach ($busi as $key => $value)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        if (!empty($busi)) 
                                                        {
                                                            foreach ($busi as $key => $value)
                                                            {
                                                                if ($value['id'] == $list->bid)
                                                                {
                                                                    $c = "selected";
                                                                }
                                                                else
                                                                {
                                                                    $c = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $value['id']; ?>"<?php echo $c; ?>><?php echo $value['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    } 
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">Category<span class="text-danger">*</span></label>
                                                <select class="form-control" name="category" id="category">
                                                    <option value="">Select</option>
                                                    <?php
                                                    if ($user_id=='ADD') 
                                                    {
                                                        if (!empty($size)) 
                                                        {
                                                            foreach ($size as $key => $value)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $value['sizeofbusiness']; ?>"><?php echo $value['sizeofbusiness']; ?></option>
                                                                <?php
                                                            }
                                                        } 
                                                    }
                                                    else
                                                    {
                                                        if (!empty($size)) 
                                                        {
                                                            foreach ($size as $key => $value)
                                                            {
                                                                if ($value['sizeofbusiness'] == $list->category)
                                                                {
                                                                    $c = "selected";
                                                                }
                                                                else
                                                                {
                                                                    $c = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $value['sizeofbusiness']; ?>"<?php echo $c; ?>><?php echo $value['sizeofbusiness']; ?></option>
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
                                                <label for="product-name">bidenticationfee<span class="text-danger">*</span></label>
                                                <input type="text" id="bidenticationfee"  name="bidenticationfee" class="form-control" placeholder="bidenticationfee" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">hselevy<span class="text-danger">*</span></label>
                                                <input type="text" id="hselevy"  name="hselevy" class="form-control" placeholder="hselevy" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">professionallevy<span class="text-danger">*</span></label>
                                                <input type="text" id="professionallevy"  name="professionallevy" class="form-control" placeholder="professionallevy" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product-name">refusedisposal<span class="text-danger">*</span></label>
                                                <input type="text" id="refusedisposal"  name="refusedisposal" class="form-control" placeholder="refusedisposal" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">billboard<span class="text-danger">*</span></label>
                                                <input type="text" id="billboard"  name="billboard" class="form-control" placeholder="billboard" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">fire<span class="text-danger">*</span></label>
                                                <input type="text" id="fire"  name="fire" class="form-control" placeholder="fire" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product-name">privateenterprise<span class="text-danger">*</span></label>
                                                <input type="text" id="privateenterprise"  name="privateenterprise" class="form-control" placeholder="privateenterprise" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">evssanitation<span class="text-danger">*</span></label>
                                                <input type="text" id="evssanitation"  name="evssanitation" class="form-control" placeholder="evssanitation" required>
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
                                    <a href ="<?php echo base_url();?>home/business_rate" class="btn w-sm btn-danger waves-effect">Cancel</a>
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
        document.getElementById("bidenticationfee").value = "<?=$list->bidenticationfee?>";
        document.getElementById("hselevy").value = "<?=$list->hselevy?>";
        document.getElementById("professionallevy").value = "<?=$list->professionallevy?>";
        document.getElementById("refusedisposal").value = "<?=$list->refusedisposal?>";
        document.getElementById("billboard").value = "<?=$list->billboard?>";
        document.getElementById("fire").value = "<?=$list->fire?>";
        document.getElementById("privateenterprise").value = "<?=$list->privateenterprise?>";
        document.getElementById("evssanitation").value = "<?=$list->evssanitation?>";
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
