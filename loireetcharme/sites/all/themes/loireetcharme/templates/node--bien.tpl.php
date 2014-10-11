  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <div id="" class="bien column clearfix"><div class="section">
      
      <div id="header-bien" class="clearfix col-xs-12  col-sm-12  col-md-12  col-lg-12">
      <?php 
        $nid = 0;
        $price = 0;
         $a = $page['content']['system_main']['nodes'];
         foreach(  $a as $key => $value){
           if(is_numeric($key)){
             $nid = $key;
           }
         }
        $price = $page['content']['system_main']['nodes'][$nid]['body']['#object']->field_bien_prix['und'][0]['value'];
        $price = number_format($price, 0, ',', ' ');
        switch($node->field_bien_taxo['und'][0]['tid']) {
            case 1:
                $type = "Maisons anciennes";
                break;
            case 3:
                $type = "Fermettes - Longères";
                break;
            case 2:
                $type = "Demeures de caractère";
                break;
            case 4:
                $type = "Appartements";
                break;
            case 5:
                $type = "Maisons contemporaines";
                break;
        }
      $v = $node->field_bien_bilanenergie['und'][0]['value'];  
        switch($v) {
            case ($v <= 51):
                $bilan = "a";
                break;
            case ($v <= 90):
                $bilan = "b";
                break;
            case ($v <= 150):
                $bilan = "c";
                break;
            case ($v <= 230):
                $bilan = "d";
                break;
            case ($v <= 330):
                $bilan = "e";
                break;
            case ($v <= 450):
                $bilan = "f";
                break;
            case ($v >= 450):
                $bilan = "g";
                break;
        }



      ?>
        <div id="header-bien-retour">
          <a id="retour_liste" href="/nos-biens-a-la-vente?field_bien_reference_value=&field_bien_taxo_tid=<?php print $nodeLoad->field_bien_taxo['und'][0]['tid']; ?>&field_bien_fourchetteprix_tid=All&sort_by=field_bien_prix_value&sort_order=ASC&sort_price=ASC">Retour liste  <?php print $type ?></a>
          <a href="javascript:print();" class="print">Imprimer</a>
        </div>

        <div id="header-bien-prix"><span><?php if ($price != 0)  print "".$price."&euro; HAI"; else print "<div style='font-size: 13px;'>Nous consulter</div>"; ?></span></div>
      </div>
      <div class="col-xs-12  col-sm-6  col-md-6  col-lg-6"></div>
      <div class="contentBien col-xs-12  col-sm-6  col-md-6  col-lg-6">
        <div id="header-node-bien" class="clearfix">
          <div id="bien-reference">
            <span>Réf <?php print($node->field_bien_reference['und'][0]['value']); ?></span>
            <h1><?php print $title; ?></h1>
          </div>
        </div>
        <div class="desc"><?php print $node->field_bien_resume['und'][0]['value']; ?></div>
        <div class="desc_complete"><?php print($body[0]['value']); ?></div>
        <?php if ($node->field_bien_bilanenergie['und'][0]['value'] != ''){ ?>
          <div class="diagnostic">
            <span>DIAGNOSTIC DE PERFORMANCE ENERGÉTIQUE [en KWhEP/m2.an]</span>
            <div id="bien-bilanenergie-image">
              <img width="263" height="249" alt="" src="sites/all/themes/loireetcharme/images/back-bilan-energie.png">
              <div id="bien-bilanenergie-value" class="bilan-<?php echo $bilan; ?>">
                <div class="field field-name-field-bien-bilanenergie field-type-number-integer field-label-hidden">
                  <div class="field-items"><?php print $node->field_bien_bilanenergie['und'][0]['value']; ?></div>
                </div>
              </div>
            </div>

            <div id="bien-bilanenergie-text">
              <p>Consommations énergétiques pour le chauffage, la production d'eau chaude sanitaire et le refroidissement. [isolation, état des systèmes de chauffage fixes et de climatisation, consommation gloable]</p>
            </div>
          </div>  
        <?php } ?>
          <div id="bien-buttons" class="visible bienBtnMobile">
            <a class="demandeinfo" href="<?php print  url(drupal_get_path_alias("node/19"),array('absolute'=>true));  ?>?ref=<?php print $node->field_bien_reference['und'][0]['value'];?>&t=<?php print $node->title;?>"><img src="sites/all/themes/loireetcharme/images/infoMobile.png"></a>
            <br/>
            <a class="sendtofriend" href="<?php print  url(drupal_get_path_alias("forward"),array('absolute'=>true));  ?>?path=<?php print drupal_get_path_alias("node/$node->nid");?>"><img src="sites/all/themes/loireetcharme/images/sendToFriendMobile.png"></a>
            <br/>

            <a class="sharefb" href="https://www.facebook.com/sharer.php?u=<?php print  url(drupal_get_path_alias("node/$node->nid"),array('absolute'=>true));  ?>&t=loir et charme : <?php print $node->title;?>" target="_blank"><img src="sites/all/themes/loireetcharme/images/shareMobile.png"></a>

          </div>
    </div>
      </div>

    </div></div> <!-- /.section, /#content -->

    
  </div></div> <!-- /#main, /#main-wrapper -->


</div> <!-- /#page, /#page-wrapper -->