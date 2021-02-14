<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
     <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Pay </h3>
            </div>
			<div class="dashboard-select">
			 <div class="row">
			  <div class="col-md-12">
			  <label class="dropdown-date-time dropdown-pay-category">
			   <p> Select Category</p>
                <div class="dd-button"> Select Category  </div>
                   <input type="checkbox" class="dd-input" id="test">
                  <ul class="dd-menu">
                       <li><a href="businesslist.php?text=business">Business</a></li>
					    <li><a href="businesslist.php?text=property">Property</a></li>
						<li><a href="businesslist.php?text=vehicle">Vehicle Radio & Parking Permit</a></li>
                   </ul>
              </label>
				    
				   </div>
		
			 </div>
			</div>
		 </div>

         
   <?php include("userfooter.php"); ?>  
        </div>
  

