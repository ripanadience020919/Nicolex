            

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
                                            <li class="breadcrumb-item active">Payment Analysys</li>
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
                                <form method="post" action="#" id="feedInput">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-box">
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="product-name">Start Date<span class="text-danger">*</span></label>
                                                            <input type="date" id="sd"  name="sd" class="form-control" placeholder="e.g : AvTa" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="product-name">End Date<span class="text-danger">*</span></label>
                                                            <input type="date" id="ed"  name="ed" class="form-control" placeholder="e.g : AvTa" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="product-name">Category<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="example-select" name="category">
                                                            <option value="">Select Category</option>
                                                            <option value="Bus">Business</option>
                                                            <option value="Pro">Property</option>
                                                            <option value="Veh">Vehicle</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="product-name">Select State<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="example-select" name="state">
                                                            <option value="">Select State</option>
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
                                                        <div class="col-md-4">
                                                            <label for="product-name">Select Government<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="example-select" name="gov">
                                                            <option value="">Select Government</option>
                                                            <?php
                                                                $state = getGovernments();
                                                                foreach ($state as $value) {
                                                            ?>
                                                            <option value="<?php echo $value;?>"><?php echo $value;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end card-box -->
                                        </div> <!-- end col -->
                                        <div class="col-12">
                                            <div class="text-center mb-3">
                                                <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                                <input type="submit" id="submit" value="Submit" class="btn w-sm btn-success">
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </form>
                                        <div class="row">
                                            <div class="col-4">
                                                <div id="chartContainer" style="height: 300px; width: 100%;"></div> 
                                            </div>
                                            <div class="col-4">
                                                <div id="chartContainer2" style="height: 300px; width: 100%;"></div> 
                                            </div>
                                            <div class="col-4">
                                                <div id="chartContainer3" style="height: 300px; width: 100%;"></div> 
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-4"></div>
                                            <div class="col-4">
                                                <div id="chartContainer4" style="height: 300px; width: 100%;"></div> 
                                            </div>
                                            <div class="col-4"></div>
                                        </div>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                </div>


<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script type="text/javascript">
    var j12 = $.noConflict(true);
</script>
<script type="text/javascript">
    window.onload = function() {
        var options3 = {
            title: {
                text: "This Year Payment Analysis"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString:"#,##0.#"%"",
                dataPoints: [
                    { label: "Vehicle", y: <?=$year_vehicle_pa->amount?> },
                    { label: "Business", y: <?=$year_vehicle_pa->amount?> },
                    { label: "Property", y: <?=$year_vehicle_pa->amount?> }
                ]
            }]
        };
        j12("#chartContainer3").CanvasJSChart(options3);
        var options2 = {
            title: {
                text: "This Month Payment Analysis"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString:"#,##0.#"%"",
                dataPoints: [
                    { label: "Vehicle", y: <?=$month_vehicle_pa->amount?> },
                    { label: "Business", y: <?=$month_vehicle_pa->amount?> },
                    { label: "Property", y: <?=$month_vehicle_pa->amount?> }
                ]
            }]
        };
        j12("#chartContainer2").CanvasJSChart(options2);
        var options = {
            title: {
                text: "Today Payment Analysis"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString:"#,##0.#"%"",
                dataPoints: [
                    { label: "Vehicle", y: <?=$today_vehicle_pa->amount?> },
                    { label: "Business", y: <?=$today_business_pa->amount?> },
                    { label: "Property", y: <?=$today_property_pa->amount?> }
                ]
            }]
        };
        j12("#chartContainer").CanvasJSChart(options);
    }

    j12(document).ready(function(){
    j12('form#feedInput').submit(function(e) {
    var form = $(this);
    e.preventDefault();
      // var fdate = j12("#sd").val();
      // alert(fdate)
      // var tdate = j12("#ed").val();
      // alert(tdate)
      j12.ajax({
        url:"<?php echo base_url();?>home/getdata",
        method:"POST",
        data: form.serialize(), // <--- THIS IS THE CHANGE
        dataType: "html",
        success:function(data){
        // alert(data)
          var result = data.split('|');
          var options4 = {
            title: {
                text: "Filter Specific Payment Analysis"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString:"#,##0.#"%"",
                dataPoints: [
                    { label: "Vehicle", y: result[2] },
                    { label: "Business", y: result[0] },
                    { label: "Property", y: result[1] }
                ]
            }]
        };
        j12("#chartContainer4").CanvasJSChart(options4);
        }
      });
    });
});
</script>
