<?php
/*
$n_accueil = node_load(6);
$n_form_vendeur = node_load(5);
$n_form_aquereur = node_load(25);
$n_form_contact = node_load(19);
*/
global $base_url;
$toload = array(
  '26'=>26,
  '18'=>18,
  '5'=>5,
  '25'=>25,
  '19'=>19,
);

$nodes = node_load_multiple($toload);

//print_r($nodes);
$n_images = $nodes[26];
$n_accueil = $nodes[18];
$n_form_vendeur  = $nodes[5];
$n_form_aquereur = $nodes[25];
$n_form_contact  = $nodes[19];

//print $base_url;

//$fanpage = '<div class="fb-fanpage clearfix"><a href="http://www.thefamousfanpages.com" target="_blank"><img src="'.$base_url.'/sites/all/themes/loireetcharme/images/fb-footer-fanpage.png" width="486" height="51" alt="" /></a></div>';
$fanpage = '<div class="fb-fanpage clearfix"><a target="_blank" class="hide-text" href="http://www.thefamousfanpages.com/" id="powered">Powered by Thefamousfanpages</a></div>';

 $fanpageadresse = '<div class="fb-adresse"><p>Loire & Charme, 13 place de l\'église - 41330 Marolles - Tél : 02 54 525 525</p></div>';

?>

<div id="fb-conteneur test">
  <div id="fb-menu" class="clearfix">
    <ul>
      <li><a href="#lagence" id="mlagence">L'agence</a></li>
      <li><a href="#nosbiens" id="mnosbiens" >Nos biens à la vente</a></li>
      <li id="limdemandes"><a href="#demandes" id="mdemandes">Demande personnalisée</a>
        <ul>
          <li><a href="#vendeur" id="mvendeur">Vendeurs</a></li>
          <li><a href="#acquereur" id="maquereur">Acquéreurs</a></li>
        </ul>
      </li>
    <li><a href="#contact" id="mcontact" >Contact</a></li>
    <li><a href="http://www.loireetcharme.com" id="msiteweb" target="_blank" >Site Web</a></li>
    <li><a href="https://www.facebook.com/pages/Loire-Charme/238932189531063" id="mfacebook" target="_blank">Facebook</a></li>
    </ul>
  </div>
  <div id="fb-accueil">
    
     <div id="fb-accueil-caroussel">

		<!--<div class="field field-name-field-site-image field-type-image field-label-hidden">-->
			
			<div class="fb-fond-image">
				<div class="field-items">
				  <?php 
				  
				  //print_r( $n_images->field_fb_image );
				  
				  foreach($n_images->field_site_image['und'] as $k => $v){
				  //foreach($n_accueil->field_fb_image['und'] as $k => $v){
					//print_r();
					$output = theme('image', array('path' => $v['uri']));     
					print $output;
					//print '';
					
				  }  
				 
				?>
				</div>
			</div><div class="fb-shadow-right">&nbsp;</div><div class="fb-shadow-below">&nbsp;</div>

	</div>
    <div id="fb-accueil-content">
      <h1><?php print $n_accueil->title ?></h1>
      <?php print $n_accueil->body['und']['0']['value'] ?>
	  <?php print $fanpageadresse;?>
    </div>
    <?php //print $fanpage;?>

  </div>
  <div id="fb-nosbiens">
    <div id="fb-nobiens-header"><p>Vous désirez acheter une maison de charme ou une demeure de caractère ?<br /> Voici nos toutes dernières offres :</p></div>
    <?php 
      	$biens = views_embed_view('facebookbiens', 'block_1');
        print $biens;
    ?>
    
    <div id="fb-toutesoffres"><p><a href="<?php print  $base_url?>/nos-biens-a-la-vente">Voir toutes nos offres</a></p></div>

        <?php //print $fanpage;?>
  </div>
  <div id="fb-form-vendeur">
     <div id="fb-form-vendeur-form">
      <?php 
      $form_vendeur = !empty($n_form_vendeur->webform['components']) ? drupal_get_form('webform_client_form_' . $n_form_vendeur->nid, $n_form_vendeur, null, false) : '';
      //print_r($form);
      print $n_form_vendeur->body["und"][0]['value'];
      print drupal_render( $form_vendeur) ?>
    </div>
        <?php //print $fanpage;?>
  </div>

  <div id="fb-form-aquereur">
    <div id="fb-form-aquereur-form">
      <?php 
      $form_aquereur = !empty($n_form_aquereur->webform['components']) ? drupal_get_form('webform_client_form_' . $n_form_aquereur->nid, $n_form_aquereur, null, false) : '';
      //print_r($form);
       print $n_form_aquereur->body["und"][0]['value'];
      print drupal_render( $form_aquereur) ?>
    </div>
    <?php //print $fanpage; ?>

  </div>

  <div id="fb-form-contact">
    <div id="fb-form-contact-form">
      <?php 
        $form_contact = !empty($n_form_contact->webform['components']) ? drupal_get_form('webform_client_form_' . $n_form_contact->nid, $n_form_contact, null, false) : '';
        print $n_form_contact->body["und"][0]['value'];
        print drupal_render( $form_contact);
      ?>  
    </div>
    <div id="fb-map-container" class="clearfix">
      <div id="map">
		<iframe width="475" height="335" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.fr/maps/ms?msa=0&amp;msid=217765196762619136230.0004bbd72d1a953b47425&amp;hl=fr&amp;ie=UTF8&amp;t=m&amp;ll=47.721311,1.137085&amp;spn=0.154747,0.32547&amp;z=11&amp;output=embed"></iframe><br /><small>Afficher <a href="http://maps.google.fr/maps/ms?msa=0&amp;msid=217765196762619136230.0004bbd72d1a953b47425&amp;hl=fr&amp;ie=UTF8&amp;t=m&amp;ll=47.721311,1.137085&amp;spn=0.154747,0.32547&amp;z=11&amp;source=embed" style="color:#0000FF;text-align:left">Loire Et Charme</a> sur une carte plus grande</small>
	  </div>
    </div>
    <?php print $fanpageadresse;?>
    
  </div>

</div>
<?php print $fanpage;?> 

<!--
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=AIzaSyAZJUFq4broVCvLQo3wVAgfS4oBPEUvd08" type="text/javascript"></script>
-->
<script type="text/javascript">
<!--
/*
if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(47.648878, 1.307211), 11);
        map.setUIToDefault();

         var point = new GLatLng(47.648878, 1.307211);
        map.addOverlay(new GMarker(point));
}
*/
//-->
</script>