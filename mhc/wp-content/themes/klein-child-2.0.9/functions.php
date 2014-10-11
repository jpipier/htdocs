<?php
/**
 * Enter your custom functions here
 *
 * @package klein
 *
 */
function mhc_scripts(){

	global $wp_version;

		wp_enqueue_style( 'klein-layout', get_stylesheet_directory_uri() . '/css/layout.css', array(), KLEIN_VERSION );

}
/*---------------------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------- Ajout d'un menu Hotel ------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/

register_taxonomy('hotels', 'hotel', array('hierarchical' => true, 'label' => 'Categorie hotel', 'query_var' => true, 'rewrite' => true));

add_action('init', 'create_post_type_hotel');
function create_post_type_hotel() {
    register_post_type('hotel',
    array(
        'labels' => array(
        'name' => __('Hôtel'),
        'singular_name' => __('Hôtel')),
        'public' => true,
        'rewrite' => true,
        'supports' => array('title','editor','thumbnail','image', 'comments'),
        'has_archive' => true)
    );
}



/*---------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------- On crée un excerpt modifiable ------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/

function improved_trim_excerpt( $text, $nb) {
    global $post;
    if ( $text == '' ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
        $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
        $text = strip_tags($text, '<p><a><strong><br /><font><h2><h3><span>');
        $excerpt_length = $nb;
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words)> $excerpt_length) {
            array_pop($words);
            array_push($words, '<span class="excerpt">...</<span>');
            $text = implode(' ', $words);
        }
    }
    return apply_filters('the_excerpt', $text, $nb);
}




/*---------------------------------------------------------------------------------------------------------------------*/
/*----------------------------------------------- Multi_Image_Uploader ------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/



if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_highlight',
		'title' => 'Highlight ',
		'fields' => array (
			array (
				'key' => 'field_533e99b2a6699',
				'label' => 'gallerie photo',
				'name' => 'gallerie_photo',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hotel',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/*---------------------------------------------------------------------------------------------------------------------*/
/*----------------------------------------------- ADD emplacement menu ------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/


function register_my_menu() {
  register_nav_menus(
    array(
      'bottom' => __( 'Menu Footer' )
    )
  );
}
add_action( 'init', 'register_my_menu' );
/*---------------------------------------------------------------------------------------------------------------------*/
/*------------------------------------------------- ADD librairie js --------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/

// add_action('init', 'mhc_insert_js_in_footer');
// function mhc_insert_js_in_footer() {
 
// // On verifie si on est pas dans l'admin
// if( !is_admin() ) :
 
// // On insere le fichier de ses propres fonctions javascript
// wp_register_script('functions', get_stylesheet_directory_uri() .'/js/jquery.carouFredSel-6.2.1-packed.js','',false,true);
// wp_enqueue_script( 'functions' );

// endif;
// }


// // Ajout des scripts dans le footer pour plus de récativité du site.

// add_action('wp_footer','carrousel_script', 30);




function shortcode_hotel($atts, $content=null){
    //$cat = $atts["cat"];
		echo '<div class="listHotel">';
	    	echo '<ul>';
            query_posts( 'post_type=hotel&order=ASC&orderby=date');
			if ( have_posts() ) : while ( have_posts() ) : the_post();
		        echo '<li class="clearfix">';
		        echo '<span class="left"><a href="'; echo the_permalink(); echo '">'; echo the_post_thumbnail(array(150,150)); echo '</span>'; echo '</a>';
		        echo '<h4><a class="left" href="'; echo the_permalink(); echo '">'; echo the_title(); echo '</a></h4><p></p>';
		        echo '<span class=""><a href="'; echo the_permalink(); echo '">'; echo the_excerpt(); echo '</span>'; echo '</a>';
		        echo '</li>';
			endwhile; else:
			endif;

			//Reset Query
			wp_reset_query();
			echo '</ul>';
		echo '</div>';	
}
add_shortcode( 'liste_hotel', 'shortcode_hotel' );



/*---------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------- ADD CUSTOM COMMENTS FORM -----------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/








    // ajout physique d'un champ  
    add_filter( 'comment_form_defaults', 'juiz_manage_default_fields');  
       
    // $default contient tous les messages du formulaire de commentaire  
    // il contient également "comment_field", le textarea du message  
    if ( !function_exists('juiz_manage_default_fields')) {  
        function juiz_manage_default_fields( $default ) {  
       
            $commenter = wp_get_current_commenter();  
       
            // Suppression d'un champ par défaut parmi : author, email, url  
             
            //unset($default['fields']['url']);  
             
            // Ajout des champs dans le tableau "fields"  
             
            $default['fields']['job'] = '<p class="comment-form-job comment-form-author">  
            <label for="job">'. __('Your job') . '</label>  
            <span class="required">*</span>  
            <input id="job" name="job" aria-required="true" size="30" type="text" value="' . esc_attr($commenter['comment_author_job']) . '" />  
            </p>';  
             
            $sel_female = $sel_male = '';  
            if ( $commenter['comment_author_gender'] != '') ${'sel_' . $commenter['comment_author_gender']} = ' checked="checked"';  
             
            $default['fields']['gender'] = '<p class="comment-form-gender">  
            <span class="label_like">'. __('Your gender') . '</span>  
            <label for="female">F</label> <input id="female" '. $sel_female .' name="gender" value="female" type="radio" />  
            <label for="male">M</label> <input id="male" '. $sel_male .' name="gender" value="male" type="radio" />  
            </p>';  
             
            // On retourne le tableau des champs  
             
            return $default;  
        }  
    }  
       
       
    // controle des champs obligatoires à l'enregistrement  
    add_filter( 'preprocess_comment', 'juiz_verify_comment_data' );  
    if ( !function_exists('juiz_verify_comment_data') ) {  
        function juiz_verify_comment_data( $commentdata ) {  
       
            if ( ! isset( $_POST['job'] ) )  
                wp_die( __( 'Error: please fill the required field (job).' ) );  
            elseif ( isset( $_POST['job'] ) AND strlen ( $_POST['job'] ) > 45 )  
                wp_die( __( 'Error: 45 maximum char. for "job" field.' ) );  
             
            return $commentdata;  
        }  
    }  
       
    //ajout en base de données des champs  
    add_action( 'comment_post', 'juiz_save_comment_data' );  
    if ( !function_exists('juiz_save_comment_data') ) {  
        function juiz_save_comment_data( $comment_id ) {  
       
            $comment_cookie_lifetime = apply_filters('comment_cookie_lifetime', 30000000);  
         
            if (isset($_POST['job']) AND strlen ($_POST['job']) < 45) {  
                add_comment_meta( $comment_id, 'job', esc_html( $_POST['job'] ) );  
                setcookie('comment_author_job_' . COOKIEHASH, esc_html( $_POST['job'] ), time() + $comment_cookie_lifetime, COOKIEPATH, COOKIE_DOMAIN);  
            }  
         
            if (isset($_POST['gender']) AND in_array ( $_POST['gender'] , array('male', 'female'))) {  
                add_comment_meta( $comment_id, 'gender', esc_html($_POST['gender']) );  
                setcookie('comment_author_gender_' . COOKIEHASH, esc_html( $_POST['gender']), time() + $comment_cookie_lifetime, COOKIEPATH, COOKIE_DOMAIN);  
            }  
        }  
    }  
       
       
    // pour que get_commenter retourne nos cookies custom  
    add_filter('wp_get_current_commenter', 'juiz_add_custom_comment_cookies');  
    function juiz_add_custom_comment_cookies($cookies) {  
         
        $comment_author_job = '';  
        if ( isset($_COOKIE['comment_author_job_'.COOKIEHASH]) )  
            $comment_author_job = $_COOKIE['comment_author_job_'.COOKIEHASH];  
             
        $comment_author_gender = '';  
        if ( isset($_COOKIE['comment_author_gender_'.COOKIEHASH]) )  
            $comment_author_gender = $_COOKIE['comment_author_gender_'.COOKIEHASH];  
          
         
        $cookies['comment_author_job'] = $comment_author_job;  
        $cookies['comment_author_gender'] = $comment_author_gender;  
         
        return $cookies;  
    }  
       
       
    // afficher l'info job dans la liste des commentaires  
    add_filter( 'get_comment_author_link', 'juiz_attach_custom_info_to_comments_list' );  
    if ( !function_exists('juiz_attach_custom_info_to_comments_list') ) {  
        function juiz_attach_custom_info_to_comments_list( $author ) {  
         
            $job = get_comment_meta( get_comment_ID(), 'job', true );  
            if ( $job )  
                $author .= ' (' . $job . ')';  
             
            return $author;  
        }  
    }  
       
    // afficher l'info gender graphiquement pas loin de l'avatar  
    add_filter ( 'get_avatar', 'juiz_attach_custom_gender_to_avatar');  
    if ( !function_exists('juiz_attach_custom_gender_to_avatar') ) {  
        function juiz_attach_custom_gender_to_avatar( $avatar ) {  
             
            $gender = get_comment_meta( get_comment_ID(), 'gender', true );  
            $gender = $gender ? $gender : 'undefined';  
                $avatar = '<span class="gender ' . $gender . '">' . $avatar . '</span>';  
             
            return $avatar;  
        }  
    }  
       
    // redirection personnalisée après un post de commentaire  
    add_action('comment_post_redirect', 'juiz_new_comment_redirection');  
    if ( !function_exists('juiz_new_comment_redirection') ) {  
        function juiz_new_comment_redirection( $location ) {  
            $location = empty($_POST['redirect_to']) ? get_comment_link($comment_id) : $_POST['redirect_to'] . '#comment-' . $comment_id;  
            return $location;  
        }  
    }  


/*---------------------------------------------------------------------------------------------------------------------*/
/*------------------------------------------ ADD ADMIN MENU PROFIL PAGE -----------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------*/


// à l'initialisation de l'administration
// on informe WordPress des options de notre thème

add_action( 'admin_init', 'mhcOptions' );

function mhcOptions( )
{
    register_setting( 'mhc-profil', 'Members' ); 
    register_setting( 'mhc-profil', 'FAQ' ); 
    register_setting( 'mhc-profil', 'Contact' );      
}


add_action( 'admin_menu', 'mhcAdminMenu' );

function mhcAdminMenu( )
{
    add_menu_page(
        'Gestion page profil :', // le titre de la page
        'Gestion profil',            // le nom de la page dans le menu d'admin
        'administrator',        // le rôle d'utilisateur requis pour voir cette page
        'mhc-page',        // un identifiant unique de la page
        'MhcSettingPage'   // le nom d'une fonction qui affichera la page
    );
}
function MhcSettingPage( ){
?>
    <div class="wrap">
        <h2>Gestion page profil :</h2>

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
                    <th scope="row"><label for="Members">Members</label></th>
                    <td><input type="text" id="Members" name="Members" class="small-text" value="<?php echo get_option( 'Members' ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="FAQ">FAQ</label></th>
                    <td><textarea type="text" id="FAQ" name="FAQ" class="large-text" value="<?php echo get_option( 'FAQ' ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="Contact">Contact</label></th>
                    <td><input type="text" id="Contact" name="Contact" class="small-text" value="<?php echo get_option( 'Contact' ); ?>" /></td>
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

if( !is_admin()){
  wp_deregister_script('jquery');
  wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, '');
  wp_enqueue_script('jquery');
}
