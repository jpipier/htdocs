<?php
// Ajoute le CSS et le JavaScript pour utiliser Bootstrap / les new fontes/ style.css 
function enqueue_bootstrap() {
  wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

register_nav_menus( array(
	'primary'   => __( 'Top primary menu', 'julienpipier' ),
	'bottom' => __( 'Secondary menu in footer', 'julienpipier' ),
	)
);

if( !is_admin()){
  wp_deregister_script('jquery');
  wp_register_script('jquery',get_stylesheet_directory_uri() . '/js/jquery.js' );
  wp_enqueue_script('jquery');
}


register_taxonomy('works', 'work', array('hierarchical' => true, 'label' => 'Categorie work', 'query_var' => true, 'rewrite' => true));

add_action('init', 'create_post_type_work');
function create_post_type_work() {
    register_post_type('work',
    array(
        'labels' => array(
        'name' => __('Work'),
        'singular_name' => __('Work')),
        'public' => true,
        'rewrite' => true,
        'supports' => array('title','editor','thumbnail','image'),
        'has_archive' => true)
    );
}


add_theme_support('post-thumbnails');

// custom excerpt length
function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).' ... <span class="more">Lire la suite de l\'article</span>';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}

function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
 array_pop($content);
 $content = implode(" ",$content).' ... <span class="more">Lire la suite de l\'article</span>';
 } else {
 $content = implode(" ",$content);
 }
 $content = preg_replace('/[.+]/','', $content);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]&gt;', $content);
 return $content;
}


