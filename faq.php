<?php if(isset($_GET['text']) && $_GET['text']=='admin'){ include("userheader.php");
?>

 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); }else{ include("header.php"); } ?>

	<section class="about-section" id="about">
<div class="container">
 <div class="row">
         <div class="col-md-12">
  <div class="about_txt">
    <h2>FREQUENTLY ASKED <span>QUESTIONS</span></h2>
    <div class="faq-section">
	   <?PHP
        $term=new Users;
        $valueterms=$term->getfaq();
        if (!empty($valueterms)) {
        foreach ($valueterms as $value) {
    // for ($i = 0; $i < 1; $i++) {
      ?>
	<p><?php//echo $row['text'];?></p>
 <input type="checkbox" id="<?php echo $value['id'];?>" class="form-control">
    <label for="<?php echo $value['id'];?>"  class="form-control"><?php echo $value['question'];?></label>

    <p><?php echo $value['answer'];?></p>
    <?php  
              // }
          }
        }else{
    ?>
    <div class="payment-form-search">
        <p style="text-align: center;">Sorry ! No Result Found.</p>
      </div>
    <?php
          }
    ?>
   </div>
  </div>

 </div>
  </div>
</div>
</section> </div>
<?php if(isset($_GET['text']) && $_GET['text']=='admin'){ include("userfooter.php");}else{ include("footer.php"); } ?>

<style>
   .faq-section{
    margin: 40px 0;
    position: relative;
  }

  /*Hide the paragraphs*/
  .faq-section p{
    display: none;
  }

  /*Hide the checkboxes */
  .faq-section input{
    position: absolute;
    z-index: 2;
    cursor: pointer;
    opacity: 0;
    display: none\9; /* IE8 and below */
    margin: 0;
    width: auto;
    height: 36px;
  }

  /*Show only the clipped intro */
  .faq-section label+p{
    display: block;
    color: #999;
    font-size: .85em;
    transition: all .15s ease-out;
    /* Clipping text */
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  /*If the checkbox is checked, show all paragraphs*/
  .faq-section input[type=checkbox]:checked~p{
    display: block;
    color: #444;
    font-size: 1em;
    /* restore clipping defaults */
    text-overflow: clip;
    white-space: normal;
    overflow: visible;
  }

  /*Style the label*/
  .faq-section label{
    font-size: 1.2em;
    background: #eee;
    display: block;
    position: relative;
    height: 60px;
    padding: 7px 10px;
    font-weight: bold;
    border: 1px solid #ddd;
    border-left: 3px solid #888;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
    transition: all .15s ease-out;
  }

  /*Remove text selection when toggle-ing*/
  .faq-section label::selection{
    background: none;
  }

  .faq-section label:hover{
    background: #f5f5f5;
  }

  /*If the checkbox is checked, style the label accordingly*/
  .faq-section input[type=checkbox]:checked~label{
    border-color: #ff7f50;
    background: #f5deb4;
    background-image: linear-gradient(to bottom, #fff, #f5deb4);
    box-shadow: 0 0 1px rgba(0,0,0,.4);
  }

  /*Label's arrow - default state */
  .faq-section label::before{
    content: '';
    position: absolute;
    right: 4px;
    top: 50%;
    margin-top: -6px;
    border: 6px solid transparent;
    border-left-color: inherit;
  }

  /*Update the right arrow*/
  .faq-section input[type=checkbox]:checked~label::before{
    border: 6px solid transparent;
    border-top-color: inherit;
    margin-top: -3px;
    right: 10px;
  }
</style>

