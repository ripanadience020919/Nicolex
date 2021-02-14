<?php include("header.php"); ?>
<section class="slider-bottom-part" id="Services">
 <div class="container">
 <div class="page_head">
   <h2>Our <span> Services</span> </h2>
   </div>
    <div class="row">
	<?PHP
        $ser=new Users;
        $service=$ser->getdata('services');      
        foreach ($service as $serve) {
               for($i=0;$i<1;$i++){
                ?>   
              
	   <div class="col-md-6">
	    <div class="slide_inner">
		  <img src="images/<?php echo $serve['img'];?>" alt="">
		  <h3><?php echo $serve['heading'];?></h3>
		  <p><?php echo $serve['content'];?></p>
		</div>
	   </div>
				 <?php  }
        } ?>
	  
	</div>
 </div>
</section>

<?php include("footer.php"); ?>