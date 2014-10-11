<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>


    <div class="view-footer clearfix">
    
    <div id="bien-logolc">
    <?php
      $logolc =  '/'.drupal_get_path('theme', 'loireetcharme'). '/images/logocontact.png';
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



  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>