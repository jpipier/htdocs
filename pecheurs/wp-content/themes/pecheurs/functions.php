<?php
// Ajoute le CSS et le JavaScript pour utiliser Bootstrap / les new fontes/ style.css 
function enqueue_bootstrap() {
  wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_style('style-js', get_stylesheet_directory_uri() . '/css/jquery.fullPage.css' );

  wp_enqueue_style('style-fonte', get_stylesheet_directory_uri() . '/fonte/stylesheet.css' );
  wp_enqueue_script('jquery');
  wp_enqueue_script('onepage-js', get_stylesheet_directory_uri() . '/js/jquery.fullPage.min.js', 'jquery' );
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

if(function_exists("register_field_group"))
{
register_field_group(array (
		'id' => 'acf_vignette-n1',
		'title' => 'Vignette n°1',
		'fields' => array (
			array (
				'key' => 'field_5367b09124e7a',
				'label' => 'titre',
				'name' => 'titre_v1',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5367b0b724e7b',
				'label' => 'picto',
				'name' => 'picto_v1',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5367b0de24e7c',
				'label' => 'vignette',
				'name' => 'vignette_v1',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5367b0ef24e7d',
				'label' => 'lien',
				'name' => 'lien_v1',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_vignette-n2',
		'title' => 'vignette n°2',
		'fields' => array (
			array (
				'key' => 'field_5367b15365f3b',
				'label' => 'titre',
				'name' => 'titre_v2',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5367b4ce65f3c',
				'label' => 'picto',
				'name' => 'picto_v2',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5367b4f365f3d',
				'label' => 'vignette',
				'name' => 'vignette_v2',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5367b51665f3e',
				'label' => 'lien',
				'name' => 'lien_v2',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
register_field_group(array (
		'id' => 'acf_vignette-n3',
		'title' => 'Vignette n°3',
		'fields' => array (
			array (
				'key' => 'field_5467b09124e7a',
				'label' => 'titre',
				'name' => 'titre_3',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5467b0b724e7b',
				'label' => 'picto',
				'name' => 'picto_3',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5467b0de24e7c',
				'label' => 'vignette',
				'name' => 'vignette_3',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5467b0ef24e7d',
				'label' => 'lien',
				'name' => 'lien_3',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));	
register_field_group(array (
		'id' => 'acf_vignette-n4',
		'title' => 'Vignette n°4',
		'fields' => array (
			array (
				'key' => 'field_5567b09124e7a',
				'label' => 'titre',
				'name' => 'titre_4',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5567b0b724e7b',
				'label' => 'picto',
				'name' => 'picto_4',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5567b0de24e7c',
				'label' => 'vignette',
				'name' => 'vignette_4',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5567b0ef24e7d',
				'label' => 'lien',
				'name' => 'lien_4',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
register_field_group(array (
		'id' => 'acf_map-contact',
		'title' => 'map contact',
		'fields' => array (
			array (
				'key' => 'field_5368cbf9d3b64',
				'label' => 'google map',
				'name' => 'google_map',
				'type' => 'google_map',
				'required' => 0,
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				
			),
		),
		'menu_order' => 0,
	));

}
add_theme_support('post-thumbnails');

/* ======================================================================================================== */
/* =======================================  #ADD EMPLACEMENT WIDGET ======================================= */
/* ======================================================================================================== */

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Top accueil',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'sidebar',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>'
    ));

};



/* ======================================================================================================== */
/* =============================================  #ADD WIDGET ============================================= */
/* ======================================================================================================== */


/* ======================================================================================================== */
/* =============================================  #ADD ADMIN MENU ========================================= */
/* ======================================================================================================== */


// à l'initialisation de l'administration
// on informe WordPress des options de notre thème

add_action( 'admin_init', 'mhcOptions' );

function mhcOptions( )
{
    register_setting( 'mhc-profil', 'phone' ); 
    register_setting( 'mhc-profil', 'adresse' ); 
    register_setting( 'mhc-profil', 'copyright' );      
}


add_action( 'admin_menu', 'mhcAdminMenu' );

function mhcAdminMenu( )
{
    add_menu_page(
        'Administration générale :', // le titre de la page
        'Administration',            // le nom de la page dans le menu d'admin
        'administrator',        // le rôle d'utilisateur requis pour voir cette page
        'idom-page',        // un identifiant unique de la page
        'MhcSettingPage'   // le nom d'une fonction qui affichera la page
    );
}
function MhcSettingPage( ){
?>
    <div class="wrap">
        <h2>Administration générale :</h2>

        <form method="post" action="options.php">
            <?php
                // cette fonction ajoute plusieurs champs cachés au formulaire
                // pour vous faciliter le travail.
                // elle prend en paramètre le nom du groupe d'options
                // que nous avons défini plus haut.

                settings_fields( 'mhc-profil' );
            ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="phone">Numéro de téléphone</label></th>
                    <td><input type="text" id="phone" name="phone" class="large-text" value="<?php echo get_option( 'phone' ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="adresse">Adresse</label></th>
                    <td><input type="text" id="adresse" name="adresse" class="large-text" value="<?php echo get_option( 'adresse' ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="copyright">Copyright</label></th>
                    <td><input type="text" id="copyright" name="copyright" class="large-text" value="<?php echo get_option( 'copyright' ); ?>" /></td>
                </tr>       

            </table>


            <p class="submit">
                <input type="submit" class="button-primary" value="Mettre à jour" />
            </p>
        </form>
    </div>

<?php
}
require_once( 'admin-options/options.php' );
 
?>
