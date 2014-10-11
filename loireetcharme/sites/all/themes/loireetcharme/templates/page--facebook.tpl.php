<!--<script src="http://connect.facebook.net/fr_FR/all.js#appId= &xfbml=1"></script> -->
<!-- 
<script type="text/javascript">

  FB.init({ appId: '197372460364204', status: true, cookie: true, xfbml: true });
  FB.Event.subscribe('xfbml.render', function(response) {
  FB.Canvas.setAutoResize();
});
</script>
//-->


<div id="fb-loading"></div>
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

   
      
      
      <?php print render($page['content']); ?>
      

  

    
  </div></div> <!-- /#main, /#main-wrapper -->



</div></div> <!-- /#page, /#page-wrapper -->
