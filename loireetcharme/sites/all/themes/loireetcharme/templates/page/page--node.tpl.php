<div id="page-wrapper"><div id="page">



  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>


      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <div id="content" class="column clearfix"><div class="section">
      
      
      <?php print render($page['content']); ?>
      

    </div></div> <!-- /.section, /#content -->

    
  </div></div> <!-- /#main, /#main-wrapper -->

  <div id="footer-wrapper"><div class="section">


  

  <div id="footer" class="clearfix">

     <div id="footer-tel-adresse">
        <p class="tel">02 54 525 525</p>
        <p class="adresse">13, place de l'église</br />41330 MAROLLES </p>
     </div>

     <div id="logo"><a href="/"><img src="/sites/all/themes/loireetcharme/images/logo.png" width="216" height="159" alt="" border="0"/></a></div>
     <?php print render($page['footer']); ?>


  </div> <!-- /#footer -->


  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
<?php 
  $nid = null;
  $image = "fond01.jpg";
  if(arg(0)=='node' && is_numeric(arg(1))){ $nid = arg(1);}

  if($nid==26){
    // home
    $image = "fond01.jpg";
  }else if($nid==18 || $nid==13 || $nid==15 || $nid==14 || $nid==31 ) {
    //Agence
    $image = "fond02.jpg";
 }else if($nid==5 || $nid==25) {
    //Formulaire 
    $image = "fond04.jpg";
 }else if($nid==9 || $nid==10 || $nid==11 || $nid==12 || $nid==32 ) {
    //tourisme
    $image = "fond05.jpg";

 }else if($nid==19) {
    //COntact 
    $image = "fond06.jpg";
  }else if($nid==21 || $nid==20 || $nid==30) {
    //Credit mentions
    $image = "fond07.jpg";
 }
?>
<img class="bg" src="/sites/all/themes/loireetcharme/images/<?php print $image;?>" width="1598" height="932" alt="" />