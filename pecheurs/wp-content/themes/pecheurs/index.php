<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>

<?php
				$pages = get_pages(array('sort_column' => 'menu_order'));
				$i = 1;
				foreach ($pages as $page_data) {
					$nb = $i++;
				    $content = apply_filters('the_content', $page_data->post_content); 
				    $title = $page_data->post_title;
				    $thumbnail = $page_data->the_post_thumbnail;
				    echo '<section class="section " id="section'.$nb.'">';
						echo '<div class="container">';
							echo '<div class="row'.$nb.'">';
								switch ($page_data->post_name) {
										case 'presentation':
											echo wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu col-sm-11 col-md-11 col-lg-11' ) );
								    		echo "<div class='content col-sm-11 col-md-11 col-lg-11'>".$content."</div>";
								    		break;

								    	case 'menu'	:
								    		echo '<div class="slider col-sm-6 col-md-6 col-lg-6">';
								    		?>
												<div class='slider-top'></div>
												<div class='slider-bottom'><?php echo get_the_post_thumbnail($page_data->ID); ?></div>
											<?php
								    		echo'</div>';
								    		echo '<div class="col-sm-5 col-md-5 col-lg-5">'.$content.'</div>';
								    		break;

								    	case 'nous-contacter':
								    		echo '<div class="col-lg-12">'.$content.'</div>';
								    		echo '<div class="col-lg-12">'.get_field("maps").'</div>';
								    		break;

								    	case 'gallerie-photo':
								    		echo '<div class="col-lg-12">';	
								    		echo '<h2>'.$title.'...</h2>';	
									    		echo '<div class="bkg-gallerie">';						
									    			$image = get_option('header');
													$gallerie = explode(',', $image);
														foreach ($gallerie as $galleries) {
													?>
															<a href="<?php echo $galleries; ?>"><img src="<?php echo $galleries; ?>" alt="" width="250"></a>
													<?php

														}

												echo '</div>';
											echo '</div>';
								    		break;

								    	case 'maps':
								    	?>
										<div class="gmap">
											<pre>
											<?php  
											var_dump(get_field('maps'));?>
											</pre>
											<?php
											$location = get_field('maps');
											if( empty($location) ):
											?>
											<div class="acf-map">
												<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
											</div>
											<?php endif; ?>
										</div>
										<?php
										break;

								}
				    		echo '</div>';
				    	echo '</div>';
				    echo '</section>';
				}
	$pagemenu = get_pages( array( 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=> '0') ); 

	echo"<ul id='nav' class='nav menu'>";
			foreach ($pagemenu as $pagemenu_data) {
			 	$caption = $pagemenu_data->post_title;
				$pageslug = $pagemenu_data->post_name;
		//Start Page Menu
		echo "<li class='$pageslug'><a href='#$pageslug'>$caption</a></li>\n";
		}
	echo"</ul>";
				?>

</div>
</div>


<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
       			css3: true,
       			autoScrolling: true,
       			menu: '#nav',
       			anchors:['Accueil', <?php  
						$paget = get_pages(array('sort_column' => 'menu_order')); 
						foreach ($paget as $page_datar) {
							$pageslug = $page_datar->post_name;
							    	echo "'".$pageslug."',"; 
						}?>
				],
       		});
		});
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {
 
/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
 
function render_map( $el ) {
 
	// var
	var $markers = $el.find('.marker');
 
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
 
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
 
	// add a markers reference
	map.markers = [];
 
	// add markers
	$markers.each(function(){
 
    	add_marker( $(this), map );
 
	});
 
	// center map
	center_map( map );
 
}
 
/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/
 
function add_marker( $marker, map ) {
 
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
 
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});
 
	// add to array
	map.markers.push( marker );
 
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
 
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
 
			infowindow.open( map, marker );
 
		});
	}
 
}
 
/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/
 
function center_map( map ) {
 
	// vars
	var bounds = new google.maps.LatLngBounds();
 
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
 
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
		bounds.extend( latlng );
 
	});
 
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
 
}
 
/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
 
$(document).ready(function(){
 
	$('.acf-map').each(function(){
 
		render_map( $(this) );
 
	});
 
});
 
})(jQuery);
</script>
<?php
 get_footer();
