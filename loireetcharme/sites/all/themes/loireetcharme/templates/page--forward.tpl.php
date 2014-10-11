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
      
        <div id="forward-visuel">
        <?php
        $logolc =  '/'.drupal_get_path('theme', 'loireetcharme'). '/images/form-demande-visuel.jpg';
        print '<span><img src="'.$logolc.'" width="269" height="346" /></span>';
          ?>
        </div>
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
<img class="bg" src="/sites/all/themes/loireetcharme/images/bg-home.jpg" width="1598" height="932" alt="" />