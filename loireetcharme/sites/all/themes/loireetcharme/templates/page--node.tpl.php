<?php 
  $nid = null;
  $image = "fondHome.jpg";
  if(arg(0)=='node' && is_numeric(arg(1))){ $nid = arg(1);}

  if($nid==26){
    // home
    $image = "fondHome.jpg";
  }else if($nid==18 || $nid==13 || $nid==15 || $nid==14 || $nid==31 ) {
    //Agence
    $image = "fondHome.jpg";
 }else if($nid==5 || $nid==25) {
    //Formulaire 
    $image = "fondHome.jpg";
 }else if($nid==9 || $nid==10 || $nid==11 || $nid==12 || $nid==32 ) {
    //tourisme
    $image = "fondHome.jpg";

 }else if($nid==19) {
    //COntact 
    $image = "fondHome.jpg";
  }else if($nid==21 || $nid==20 || $nid==30) {
    //Credit mentions
    $image = "fondHome.jpg";
 }
?>

<header>
  <div class="bandeau">
    <nav>
      <div class="menuMobile"><a id="nav-toggle" href="#"><span></span></a></div>
      <div class="telMobile"><span>02 54 525 525</span> <a href="facebook.com" class="facebook"></a></div>
      <?php block_render('menu', 'menu-menu-mobile') ?>
    </nav>
      <div class="visuel">
        <?php echo '<img src="'; print file_create_url($node->field_bandeau['und'][0]['uri']); echo '" />'; ?>
        <?php if (drupal_is_front_page()){
          ?>
            <a href="<?php echo $base_path; ?>" class="logoSiteHome"><img src="sites/all/themes/loireetcharme/images/logoSite.png"  alt="logo mobile loire et charme" /></a>
          <?php 
        } else {
          ?>
            <a href="<?php echo $base_path; ?>" class="logoSiteHome"><img src="sites/all/themes/loireetcharme/images/logoSiteSmall.png"  alt="logo mobile loire et charme" /></a>
          <?php
        }
        ?>
      </div>

      <div class="visuelMobile">
        <?php echo '<img src="'; print file_create_url($node->field_bandeau['und'][0]['uri']); echo '" />'; ?>
        <img class="logoMobile" src="sites/all/themes/loireetcharme/images/ombreMobile.png"  alt="logo mobile loire et charme" />
        <img class="logoMobile" src="sites/all/themes/loireetcharme/images/logoMobile.png"  alt="logo mobile loire et charme" />

      </div>
      <div class="menu-wrapper">
        <?php block_render('menu', 'main-menu') ?>
      </div>
  </div>
  <img class="bg" src="sites/all/themes/loireetcharme/images/<?php print $image;?>"  height="409" alt="" />
  <div class="cover"></div>
</header>



<div id="page-wrapper" class="container">
  <div id="page" class="row">

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

  

    <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12">
      <div class="section">
      
      
      <?php print render($page['content']); ?>
      

      </div> <!-- /.section -->
    </div> <!-- /#content -->
  </div> <!-- /#page -->
</div> <!-- /.container -->

<footer>
  <div class="container">
    <div class="row">
      <div id="logo"><a href="/"><img src="sites/all/themes/loireetcharme/images/logoFooter.png" alt="" border="0"/></a></div>
      <div class="adresse">Loire & charme immobilier 13, place de l'église 41330 MAROLLES - 02 54 525 525 </div>
      <div class="right mention">© 2014</div>
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</footer>


