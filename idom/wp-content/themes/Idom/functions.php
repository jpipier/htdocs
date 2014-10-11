<?php
// Ajoute le CSS et le JavaScript pour utiliser Bootstrap
function enqueue_bootstrap() {
  wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );

 
  // Ces deux lignes ne sont utiles que si vous utilisez les fonctionnalites JavaScript
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

register_nav_menus( array(
	'primary'   => __( 'Top primary menu', 'julienpipier' ),
	'bottom' => __( 'Secondary menu in footer', 'julienpipier' ),
) );

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

};



/* ======================================================================================================== */
/* =============================================  #ADD WIDGET ============================================= */
/* ======================================================================================================== */




/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('Devis', 'text_domain'), // Name
			array( 'description' => __( 'Widget devis', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance, $instanceLink ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$link = apply_filters( 'widget_title', $instanceLink['link'] );


		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			echo $link;
		echo $args['after_widget'];
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance, $instanceLink ) {
		if ( isset( $instance[ 'title' ]) AND isset( $instanceLink[ 'link' ] ) ) {
			$title = $instance[ 'title' ];
			$link = $instanceLink[ 'link' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
			$link = __( 'New link', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titre:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instanceLink = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instanceLink['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
		return $instanceLink;
	}

} // class Foo_Widget



// register Foo_Widget widget
function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );





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










    function add_box() {
        foreach ( $this->page as $page ) {
            add_meta_box( $this->id, $this->title, array( $this, 'meta_box_callback' ), $page, 'normal', 'high');
        }
    }
    
    function meta_box_callback() {
        global $post;
        // Use nonce for verification
        wp_nonce_field( 'custom_meta_box_nonce_action', 'custom_meta_box_nonce_field' );
        
        // Begin the field table and loop
        echo '<table class="form-table meta_box">';
        foreach ( $this->fields as $field) {
            
            if ( $field['type'] == 'section' ) {
                echo '<tr><th colspan="2"><h2>' . $field['label'] . '</h2></th></tr>';
                $sanitizer = null;
            }
            
            else {
            
                // get data for this field
                unset( $sanitizer );
                extract( $field );
                
                if ( !empty( $desc ) )
                    $desc = '<span class="description">' . $desc . '</span>';
                    
                // get sanitized value of this field
                $sanitizer = isset( $sanitizer ) ? $sanitizer : 'sanitize_text_field';
                $meta = get_post_meta( $post->ID, $id, true );
                if ( is_array( $meta ) )
                    $meta = meta_box_array_map_r( 'meta_box_sanitize', $meta, $sanitizer );
                else
                    $meta = meta_box_sanitize( $meta, $sanitizer );
                    
                // begin a table row with
                echo '<tr>
                        <th><label for="' . esc_attr( $id ) . '">' . $label . '</label></th>
                        <td>';
                        switch( $type ) {
                            // basic
                            case 'text':
                            case 'url':
                            case 'email':
                            case 'tel':
                            case 'number':
                            default:
                                echo '<input type="' . $type . '" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" value="' . $meta . '" class="regular-text" size="30" />
                                        <br />' . $desc;
                            break;
                            // textarea
                            case 'textarea':
                                echo '<textarea name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" cols="60" rows="4">' . esc_textarea( $meta ) . '</textarea>
                                        <br />' . $desc;
                            break;
                            // editor
                            case 'editor':
                                echo wp_editor( $meta, $id, $settings ) . '<br />' . $desc;
                            break;
                            // checkbox
                            case 'checkbox':
                                echo '<input type="checkbox" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" ' . checked( $meta, true, false ) . ' value="1" />
                                        <label for="' . esc_attr( $id ) . '">' . $desc . '</label>';
                            break;
                            // select, chosen
                            case 'select':
                            case 'chosen':
                                echo '<select name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '"' , $type == 'chosen' ? ' class="chosen"' : '' , isset( $multiple ) && $multiple == true ? ' multiple="multiple"' : '' , '>
                                        <option value="">Select One</option>'; // Select One
                                foreach ( $options as $option )
                                    echo '<option' . selected( $meta, $option['value'], false ) . ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
                                echo '</select><br />' . $desc;
                            break;
                            // radio
                            case 'radio':
                                echo '<ul class="meta_box_items">';
                                foreach ( $options as $option )
                                    echo '<li><input type="radio" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '-' . $option['value'] . '" value="' . $option['value'] . '" ' . checked( $meta, $option['value'], false ) . ' />
                                            <label for="' . esc_attr( $id ) . '-' . $option['value'] . '">' . $option['label'] . '</label></li>';
                                echo '</ul>' . $desc;
                            break;
                            // checkbox_group
                            case 'checkbox_group':
                                echo '<ul class="meta_box_items">';
                                foreach ( $options as $option )
                                    echo '<li><input type="checkbox" value="' . $option['value'] . '" name="' . esc_attr( $id ) . '[]" id="' . esc_attr( $id ) . '-' . $option['value'] . '"' , is_array( $meta ) && in_array( $option['value'], $meta ) ? ' checked="checked"' : '' , ' /> 
                                            <label for="' . esc_attr( $id ) . '-' . $option['value'] . '">' . $option['label'] . '</label></li>';
                                echo '</ul>' . $desc;
                            break;
                            // color
                            case 'color':
                                $meta = $meta ? $meta : '#';
                                echo '<input type="text" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" value="' . $meta . '" size="10" />
                                    <br />' . $desc;
                                echo '<div id="colorpicker-' . esc_attr( $id ) . '"></div>
                                    <script type="text/javascript">
                                    jQuery(function(jQuery) {
                                        jQuery("#colorpicker-' . esc_attr( $id ) . '").hide();
                                        jQuery("#colorpicker-' . esc_attr( $id ) . '").farbtastic("#' . esc_attr( $id ) . '");
                                        jQuery("#' . esc_attr( $id ) . '").bind("blur", function() { jQuery("#colorpicker-' . esc_attr( $id ) . '").slideToggle(); } );
                                        jQuery("#' . esc_attr( $id ) . '").bind("focus", function() { jQuery("#colorpicker-' . esc_attr( $id ) . '").slideToggle(); } );
                                    });
                                    </script>';
                            break;
                            // post_select, post_chosen
                            case 'post_select':
                            case 'post_chosen':
                                if ( isset( $multiple ) && $multiple == true )
                                    echo '<select data-placeholder="Select One" name="' . esc_attr( $id ) . '[]" id="' . esc_attr( $id ) . '"' , $type == 'post_chosen' ? ' class="chosen"' : '' , ' multiple="multiple">';
                                else
                                    echo '<select data-placeholder="Select One" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '"' , $type == 'post_chosen' ? ' class="chosen"' : '' , '>';
                                echo '<option value=""></option>'; // Select One
                                $posts = get_posts( array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' ) );
                                foreach ( $posts as $item ) {
                                    $selected = is_array( $meta ) ? selected( in_array( $item->ID, $meta ), true, false ) : selected( $item->ID, $meta, false );
                                    echo '<option value="' . $item->ID . '"' . $selected . '>' . $item->post_title . '</option>';
                                }
                                $post_type_object = get_post_type_object( $post_type );
                                echo '</select> &nbsp;<span class="description"><a href="' . admin_url( 'edit.php?post_type=' . $post_type . '">Manage ' . $post_type_object->label ) . '</a></span><br />' . $desc;
                            break;
                            // post_checkboxes
                            case 'post_checkboxes':
                                $posts = get_posts( array( 'post_type' => $post_type, 'posts_per_page' => -1 ) );
                                echo '<ul class="meta_box_items">';
                                foreach ( $posts as $item ) 
                                    echo '<li><input type="checkbox" value="' . $item->ID . '" name="' . esc_attr( $id ) . '[]" id="' . esc_attr( $id ) . '-' . $item->ID . '"' , is_array( $meta ) && in_array( $item->ID, $meta ) ? ' checked="checked"' : '' , ' />
                                            <label for="' . esc_attr( $id ) . '-' . $item->ID . '">' . $item->post_title . '</label></li>';
                                $post_type_object = get_post_type_object( $post_type );
                                echo '</ul> ' . $desc , ' &nbsp;<span class="description"><a href="' . admin_url( 'edit.php?post_type=' . $post_type . '">Manage ' . $post_type_object->label ) . '</a></span>';
                            break;
                            // post_drop_sort
                            case 'post_drop_sort':
                                //areas
                                $post_type_object = get_post_type_object( $post_type );
                                echo '<p>' . $desc . ' &nbsp;<span class="description"><a href="' . admin_url( 'edit.php?post_type=' . $post_type . '">Manage ' . $post_type_object->label ) . '</a></span></p><div class="post_drop_sort_areas">';
                                foreach ( $areas as $area ) {
                                    echo '<ul id="area-' . $area['id'] .'" class="sort_list">
                                            <li class="post_drop_sort_area_name">' . $area['label'] . '</li>';
                                            if ( is_array( $meta ) ) {
                                                $items = explode( ',', $meta[$area['id']] );
                                                foreach ( $items as $item ) {
                                                    $output = $display == 'thumbnail' ? get_the_post_thumbnail( $item, array( 204, 30 ) ) : get_the_title( $item ); 
                                                    echo '<li id="' . $item . '">' . $output . '</li>';
                                                }
                                            }
                                    echo '</ul>
                                        <input type="hidden" name="' . esc_attr( $id ) . '[' . $area['id'] . ']" 
                                        class="store-area-' . $area['id'] . '" 
                                        value="' , $meta ? $meta[$area['id']] : '' , '" />';
                                }
                                echo '</div>';
                                // source
                                $exclude = null;
                                if ( !empty( $meta ) ) {
                                    $exclude = implode( ',', $meta ); // because each ID is in a unique key
                                    $exclude = explode( ',', $exclude ); // put all the ID's back into a single array
                                }
                                $posts = get_posts( array( 'post_type' => $post_type, 'posts_per_page' => -1, 'post__not_in' => $exclude ) );
                                echo '<ul class="post_drop_sort_source sort_list">
                                        <li class="post_drop_sort_area_name">Available ' . $label . '</li>';
                                foreach ( $posts as $item ) {
                                    $output = $display == 'thumbnail' ? get_the_post_thumbnail( $item->ID, array( 204, 30 ) ) : get_the_title( $item->ID ); 
                                    echo '<li id="' . $item->ID . '">' . $output . '</li>';
                                }
                                echo '</ul>';
                            break;
                            // date
                            case 'date':
                                echo '<input type="text" class="datepicker" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" value="' . $meta . '" size="30" />
                                        <br />' . $desc;
                            break;
                            // slider
                            case 'slider':
                            $value = $meta != '' ? intval( $meta ) : '0';
                                echo '<div id="' . esc_attr( $id ) . '-slider"></div>
                                        <input type="text" name="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '" value="' . $value . '" size="5" />
                                        <br />' . $desc;
                            break;
                            // image
                            case 'image':
                                $image = get_template_directory_uri() . '/metaboxes/images/image.png';  
                                echo '<span class="meta_box_default_image" style="display:none">' . $image . '</span>';
                                if ( $meta ) {
                                    $image = wp_get_attachment_image_src( intval( $meta ), 'medium' );
                                    $image = $image[0];
                                }               
                                echo    '<input name="' . esc_attr( $id ) . '" type="hidden" class="meta_box_upload_image" value="' . $meta . '" />
                                            <img src="' . $image . '" class="meta_box_preview_image" alt="" />
                                                <input class="meta_box_upload_image_button button" type="button" rel="' . $post->ID . '" value="Choose Image" />
                                                <small>&nbsp;<a href="#" class="meta_box_clear_image_button">Remove Image</a></small>
                                                <br clear="all" />' . $desc;
                            break;
                            // file
                            case 'file':        
                                $iconClass = 'meta_box_file';
                                if ( $meta ) $iconClass .= ' checked';
                                echo    '<input name="' . esc_attr( $id ) . '" type="hidden" class="meta_box_upload_file" value="' . $meta . '" />
                                            <span class="' . $iconClass . '"></span>
                                            <span class="meta_box_filename">' . $meta . '</span>
                                                <input class="meta_box_upload_file_button button" type="button" rel="' . $post->ID . '" value="Choose File" />
                                                <small>&nbsp;<a href="#" class="meta_box_clear_file_button">Remove File</a></small>
                                                <br clear="all" />' . $desc;
                            break;
                            // repeatable
                            case 'repeatable':
                                $field_titles = wp_list_pluck( $repeatable_fields, 'repeatable_label' );
                                $field_titles = array_filter( $field_titles ); // remove empty values
                                echo '<table id="' . esc_attr( $id ) . '-repeatable" class="meta_box_repeatable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><span class="sort_label"></span></th>
                                            <th>Fields</th>
                                            <th><a class="meta_box_repeatable_add" href="#"></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                $i = 0;
                                // create an empty array
                                if ( $meta == '' ) {
                                    $keys = wp_list_pluck( $repeatable_fields, 'repeatable_id' );
                                    $meta = array ( array_fill_keys( $keys, null ) );
                                }
                                $meta = array_values( $meta );
                                foreach( $meta as $row ) {
                                    echo '<tr>
                                            <td><span class="sort hndle"></span></td><td>';
                                    foreach ( $repeatable_fields as $repeatable_field ) {
                                        extract( $repeatable_field );
                                        echo '<label>' . $repeatable_label .'</label><p>';
                                        switch ( $repeatable_type ) {
                                            // checkbox
                                            case 'checkbox':
                                                $checked = isset( $meta[$i][$repeatable_id] ) ? $meta[$i][$repeatable_id] : '';
                                                echo '<p><input type="checkbox" name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" id="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" value="1"' . checked( $checked, $repeatable_id, false ) . ' style="display:inline;" /> <label style="display:inline;" for="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']">' . $repeatable_label .'</label></p>';
                                            break;
                                            // radio
                                            case 'radio':
                                                $checked = isset( $meta[$i][$repeatable_id] ) ? $meta[$i][$repeatable_id] : '';
                                                echo '<p><input type="radio" name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" id="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" value="' . $repeatable_id . '"' . checked( $checked, $repeatable_id, false ) . ' style="margin-top:7px" /></p>';
                                            break;
                                            // text
                                            case 'text':
                                                echo '<input type="text" name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" value="' . $meta[$i][$repeatable_id] . '" size="30" class="regular-text" placeholder="' . $repeatable_label .'" />';
                                            break;
                                            // textarea
                                            case 'textarea':
                                                echo '<textarea name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" cols="30" rows="4" placeholder="' . $repeatable_label .'">' . $meta[$i][$repeatable_id] . '</textarea>';
                                            break;
                                            // image
                                            case 'image':
                                            $image = get_template_directory_uri() . '/metaboxes/images/image.png';  
                                            echo '<span class="meta_box_default_image" style="display:none">' . $image . '</span>';
                                            if ( $meta[$i][$repeatable_id] ) {
                                                $image = $meta[$i][$repeatable_id];
                                                if ( intval( $image ) ) {
                                                    $image = wp_get_attachment_image_src( $image, 'medium' );
                                                    $image = $image[0];
                                                }
                                            }               
                                            echo    '<input name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" type="hidden" class="meta_box_upload_image" value="' . intval( $meta[$i][$repeatable_id] ) . '" />
                                                        <img src="' . $image . '" class="meta_box_preview_image" alt="" />
                                                            <input class="meta_box_upload_image_button button" type="button" rel="' . $post->ID . '" value="Choose Image" />
                                                            <small>&nbsp; <a href="#" class="meta_box_clear_image_button">Remove Image</a></small>
                                                            <br clear="all" />';
                                            break;
                                            // unique id
                                            case 'id':
                                                echo '<input type="hidden" name="' . esc_attr( $id ) . '[' . $i . '][' . $repeatable_id .']" value="' , $meta[$i][$repeatable_id] != '' ? $meta[$i][$repeatable_id] : substr( ereg_replace("[^0-9]", "", uniqid() ), 3, 2 ) , '" size="5" class="repeatable_id" readonly="readonly" />';
                                            break;
                                        } // end switch
                                        echo '</p>';
                                    } // end each field
                                    echo '</td><td><a class="meta_box_repeatable_remove" href="#"></a></td></tr>';
                                    $i++;
                                } // end each row
                                echo '</tbody>';
                                echo '
                                    <tfoot>
                                        <tr>
                                            <th><span class="sort_label"></span></th>
                                            <th>Fields</th>
                                            <th><a class="meta_box_repeatable_add" href="#"></a></th>
                                        </tr>
                                    </tfoot>';
                                echo '</table>
                                    ' . $desc;
                            break;
                        } //end switch
                echo '</td></tr>';
            } // end ! $type = section
        } // end foreach
        echo '</table>'; // end table
    }
    
    // Save the Data
    function save_box( $post_id ) {
        $post_type = get_post_type();
        
        // verify nonce
        if ( ! ( in_array( $post_type, $this->page )) || !isset( $_POST['custom_meta_box_nonce_field'] ) || !wp_verify_nonce( $_POST['custom_meta_box_nonce_field'],  'custom_meta_box_nonce_action' ) ) 
            return $post_id;
        // check autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;
        // check permissions
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        
        // loop through fields and save the data
        foreach ( $this->fields as $field ) {
            if( $field['type'] == 'section' ) {
                $sanitizer = null;
                continue;
            }
            if( $field['type'] == 'tax_select' ) {
                // save taxonomies
                if ( isset( $_POST[$field['id']] ) )
                    $term = $_POST[$field['id']];
                wp_set_object_terms( $post_id, $term, $field['id'] );
            }
            else {
                // save the rest
                $old = get_post_meta( $post_id, $field['id'], true );
                if ( isset( $_POST[$field['id']] ) )
                    $new = $_POST[$field['id']];
                if ( isset( $new ) && $new != $old ) {
                    $sanitizer = isset( $field['sanitizer'] ) ? $field['sanitizer'] : 'sanitize_text_field';
                    if ( is_array( $new ) )
                        $new = meta_box_array_map_r( 'meta_box_sanitize', $new, $sanitizer );
                    else
                        $new = meta_box_sanitize( $new, $sanitizer );
                    update_post_meta( $post_id, $field['id'], $new );
                } elseif ( isset( $new ) && '' == $new && $old ) {
                    delete_post_meta( $post_id, $field['id'], $old );
                }
            }
        } // end foreach
    }


?>