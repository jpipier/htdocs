<?php
/**
 * @file
 * Zen theme's implementation to display a block.
 *
 * Available variables:
 * - $title: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be "block-user".
 *   - first: The first block in the region.
 *   - last: The last block in the region.
 *   - odd: An odd-numbered block in the region's list of blocks.
 *   - even: An even-numbered block in the region's list of blocks.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see zen_preprocess_block()
 * @see template_process()
 * @see zen_process_block()
 */
global $user;

?>
<div id="<?php print $block_html_id; ?>" data-node-id="<?php print arg(1); ?>" class="bloc-galerie <?php print $classes; ?>"<?php print $attributes; ?>>
<div id="cadre_galerie">
<div id="cadre_galerie_2"> 
  <div id="galerie">
    <?php print $content; ?>
    <div class="loupe"></div><div id="thumb-back"></div>
    <div id="thumb-tray" class="load-item">
      
      
    </div><div id="thumb-forward"></div>
  </div>
</div>  
</div>  
  <div class="view-footer clearfix">

    

    <div id="bien-logolc">

    <?php

      $logolc =  ''.drupal_get_path('theme', 'loireetcharme'). '/images/logocontact.png';

        print '<img src="'.$logolc.'" width="191" height="96" />';

    ?>

    </div>

    <?php 

      if (arg(0) == 'node' && is_numeric(arg(1)) ){

        $node = node_load(arg(1));

       

      }

      //print_r($node);

    ?>

    

    <div id="bien-buttons">

     <a class="demandeinfo" href="<?php print  url(drupal_get_path_alias("node/19"),array('absolute'=>true));  ?>?ref=<?php print $node->field_bien_reference['und'][0]['value'];?>&t=<?php print $node->title;?>">Demande d'information</a>

     <br/>

     <a class="sendtofriend" href="<?php print  url(drupal_get_path_alias("forward"),array('absolute'=>true));  ?>?path=<?php print drupal_get_path_alias("node/$node->nid");?>">Envoyer à un ami</a>

      <br/>

    

      <a class="sharefb" href="https://www.facebook.com/sharer.php?u=<?php print  url(drupal_get_path_alias("node/$node->nid"),array('absolute'=>true));  ?>&t=loir et charme : <?php print $node->title;?>" target="_blank">Partager</a>



    </div>

    </div>
  

</div><!-- /.block -->
