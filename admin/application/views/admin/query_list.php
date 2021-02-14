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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Support Requests</a></li>
                                            <li class="breadcrumb-item active">Query List</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$title?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Query</th>
                                                    <th>PCN No</th>
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
                                                    <input type="hidden" name="id" id="id<?php echo $val['id']?>" value="<?php echo $val['id']?>">
                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo $val['name'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['email'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['mobile'];?>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" rows="5" readOnly><?php echo $val['query'];?></textarea>
                                                    </td>
                                                    <?php
                                                        if ($val['pcnno'] !='') {
                                                    ?>
                                                    <td>
                                                        <?php echo $val['pcnno'];?>
                                                    </td>
                                                    <?php
                                                        }else{
                                                    ?>
                                                    <td>Not Applicable</td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td>
                                                        <div id="s<?php echo $val['id']?>">
                                                        <select class="form-control" id="example-select">
                                                            <option value="0"
                                                            <?php if ($val['status'] == 0) {
                                                              echo "selected";
                                                            }?>>Pending</option>
                                                            <option value="1"
                                                            <?php if (($val['status'] == 1)) {
                                                              echo "selected";
                                                            }?>
                                                            >In Progress</option>
                                                            <option value="2"
                                                            <?php if (($val['status'] == 2)) {
                                                              echo "selected";
                                                            }?>
                                                            >Solved</option>
                                                        </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?php echo $val['id'];?>"><button type="button" class="btn btn-success btn-sm waves-effect waves-light">Attend</button></a>
                                                        <a href="<?php echo base_url().'home/later_answer/'.$val['id']?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Deny</button></a>
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
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Button trigger modal -->
<?php
     if(!empty($list)){
       foreach($list as $key => $val){
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $val['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>home/send_answer" method="POST">
            <input type="hidden" name="uid" value="<?php echo $val['id']?>">
            <input type="hidden" name="to_email" value="<?php echo $val['email']?>">
            <textarea class="form-control" rows="10" name="msg"></textarea><br>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Send</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<?php 
        }
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
        if(!empty($list)){
            foreach($list as $key => $val){
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("div#s<?php echo $val['id']?> select").change(function(){
            var a = $(this).val();
            var b = $("#id<?php echo $val['id']?>").val();
            // alert(b)
            $.ajax({
                url:"<?php echo base_url();?>home/updateorderstatus",
                method:"POST",
                data:{status:a,q_id:b},
                success:function(data){
                    // alert(data)
                    window.location.reload();
                  }
            });
         });
    });
</script>
<?php
            }
       } 
?>