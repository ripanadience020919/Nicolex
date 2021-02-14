            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php 
                $id = isset($id) ? $id : 'ADD';
                $submit_url = ($id=='ADD') ? 'user_add_submit' : 'user_edit_submit' ;
                // $submit_url = 'acknowledgement_edite';
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                            <li class="breadcrumb-item active"><?=$title?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$title?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-box">
                                    <form class="parsley-examples" method="POST" action="<?=base_url().'home/'.$submit_url?>">
                                        <input type="hidden" name="idaa" id="idaa">
                                        <div class="form-group">
                                            <label for="userName">Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" required placeholder="Enter name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="userName">User Name<span class="text-danger">*</span></label>
                                            <input type="text" name="username" id="username" required placeholder="Enter user name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Email Id<span class="text-danger">*</span></label>
                                            <input type="email" name="email" required placeholder="Enter email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address1" required placeholder="Enter Address" class="form-control" id="address1">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Address II ( If Different From One Above ) </label>
                                            <input type="text" name="address2" placeholder="Enter Address II" class="form-control" id="address2">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Gender <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="gender" id="gender" required>
                                                <option selected="">Select Type</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Date of Birth </label>
                                            <input type="date" name="dob" required="" class="form-control" id="dob">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Mobile Number( xxxxxxxxxx) <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" required placeholder="Enter Mobile Number" class="form-control" id="mobile">
                                        </div>
                                        <div class="form-group" style="display: <?=($id!='ADD')?'none':''?>;">
                                            <label for="pass1">Password<span class="text-danger">*</span></label>
                                            <input id="password" name="password" type="password" placeholder="Enter Password" <?=($id!='ADD')?'none':'required'?> class="form-control">
                                        </div>
                                        <div class="form-group" style="display: <?=($id!='ADD')?'none':''?>;">
                                            <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                            <input data-parsley-equalto="#pass1" type="password" <?=($id!='ADD')?'none':'required'?> placeholder="Enter Confirm Password" class="form-control" id="passWord2">
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Add User
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <script type="text/javascript">
                    // $("#name").val('na');
                    if ('<?=$id?>'!='ADD') {
                        document.getElementById("idaa").value = "<?=$show->id?>";
                        document.getElementById("name").value = "<?=$show->name?>";
                        document.getElementById("username").value = "<?=$show->username?>";
                        document.getElementById("email").value = "<?=$show->email?>";
                        document.getElementById("mobile").value = "<?=$show->mobile?>";
                        document.getElementById("gender").value = "<?=$show->gender?>";
                        document.getElementById("dob").value = "<?=$show->dob?>";
                        document.getElementById("address1").value = "<?=$show->address1?>";
                        document.getElementById("address2").value = "<?=$show->address2?>";
                        document.getElementById("password").value = "<?=$show->password?>";
                    }
                </script>