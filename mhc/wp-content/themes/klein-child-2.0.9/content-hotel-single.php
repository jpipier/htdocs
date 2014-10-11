<?php
/**
 * The template for displaying video content (single page)
 *
 * @package Klein
 *
 */
?>
<?php global $post; ?>

	
	<div class="content-area">
		
		<div id="content" <?php echo post_class(); ?> role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="clearfix">
					<div class="blog-content">
							<?php if( has_post_thumbnail() ){ ?>
								<div class="clearfix center entry-content-thumbnail hotel-img left">
									<?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
								</div>
							<?php } ?>
						<div class="blog-pad entry-content left">
							<?php the_content(); ?>
						</div>
					</div>
					
					<div class="clearfix"></div>
						<div id="tabContainer" class="">
						    <div class="tabs">
						      <ul>
						        <li id="tabHeader_1"><?php echo __('Reviews ') ?><?php
										printf( 
											_nx( __('(1)','klein'), 
												 __('(%1$s)', 'klein'), 
												get_comments_number(), 
												'comments title', 
												'klein' 
											),
											number_format_i18n( get_comments_number() ), 
												'<span>' . get_the_title() . '</span>' 
											);
									?>					
								</li>
						        <li id="tabHeader_2"><?php echo the_field('titre_tab_2') ?></li>
						        <li id="tabHeader_3"><?php echo the_field('titre_tab_3') ?></li>
						      </ul>
						    </div>
						    <div class="tabscontent <?php if( !is_user_logged_in() ){ echo 'notlog'; } ?>">
						      <div class="tabpage" id="tabpage_1">
						        <?php if( !is_user_logged_in()){
									echo __('<span class="content-notLog" >
											YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
											OR POST REVIEWS<br/>
											Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
									</span>');
						        } else {
						        	//echo "<p>".the_field('content_tab_1')."</p>";
								// If comments are open or we have at least one comment, load up the comment template
								

									        
												global $current_user;
												get_currentuserinfo();
												$user = $current_user->user_login;
												$postid = get_the_ID();
												global $table_prefix, $wpdb;

									        ?>

									        <div class='headerComments'>
									        	<div><?php echo __('Global note'); ?></div>
									        	<div class="btnReview">
									        		<?php

									        		$query = $wpdb->query(" SELECT * FROM wp_comments WHERE comment_post_ID = $postid AND comment_author = '$user' ");

									        		if($query == 1){ ?>

														note

									        		<?php } else { ?>
													<a data-toggle="modal" id="klein-comments-btn" class="btn btn-review btn-primary" href="#klein_comments_modal" title="<?php _e( 'Add your review !', 'klein' ); ?>"> <?php _e( 'Add your review !', 'klein' ); ?></a>
									        	
													<div class="modal fade" id="klein_comments_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-body">
														
																	<div id="comments-modal-body" class="left">
																		<?php comment_form(); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>
									        	</div>
									    	</div>
								<?php
												comments_template('/comments.php');
									} 
								?>
									
						        
						      </div>
						      <div class="tabpage" id="tabpage_2">
						        <?php if( !is_user_logged_in()){
									echo __('<span class="content-notLog" >
											YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
											OR POST REVIEWS<br/>
											Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
									</span>');
						        } else {
						        	echo "<p>".the_field('content_tab_2')."</p>";

						        } ?>
						      </div>
						      <div class="tabpage" id="tabpage_3">
						        <?php if( !is_user_logged_in()){
									echo __('<span class="content-notLog" >
											YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
											OR POST REVIEWS<br/>
											Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
									</span>');
						        } else { ?>
								<div class="gmap"><?php
									$location = get_field('content_tab_3');
									if( !empty($location) ):
									?>
									<div class="acf-map">
										<div id="map" style="width: 630px; height: 380px; margin-top:-10px;"></div>
									</div>
									<?php endif; 
								echo '</div>';
						        } 
?>
						    	</div>
						      </div>
						    </div>
						</div>
		
					
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->



	</div><!-- #content area -->
</div><!-- #primary -->
		<div id="secondary" class="widget-area col-md-4 col-sm-4 omega" role="complementary">
			<?php get_sidebar('mhc'); ?>
		</div>
 <script>
window.onload=function() {

  // get tab container
  var container = document.getElementById("tabContainer");
    // set current tab
    var navitem = container.querySelector(".tabs ul li");
    //store which tab we are on
    var ident = navitem.id.split("_")[1];
    navitem.parentNode.setAttribute("data-current",ident);
    //set current tab with class of activetabheader
    navitem.setAttribute("class","tabActiveHeader");

    //hide two tab contents we don't need
    var pages = container.querySelectorAll(".tabpage");
    for (var i = 1; i < pages.length; i++) {
      pages[i].style.display="none";
    }

    //this adds click event to tabs
    var tabs = container.querySelectorAll(".tabs ul li");
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].onclick=displayPage;
    }
}

// on click of one of tabs
function displayPage() {
  var current = this.parentNode.getAttribute("data-current");
  //remove class of activetabheader and hide old contents
  document.getElementById("tabHeader_" + current).removeAttribute("class");
  document.getElementById("tabpage_" + current).style.display="none";

  var ident = this.id.split("_")[1];
  //add class of activetabheader to new active tab and show contents
  this.setAttribute("class","tabActiveHeader");
  document.getElementById("tabpage_" + ident).style.display="block";
  this.parentNode.setAttribute("data-current",ident);
}

</script>



<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

<script type="text/javascript">
  //<![CDATA[
	function load() {
	var lat = <?php echo $location['lat']; ?>;
	var lng = <?php echo $location['lng']; ?>;
// coordinates to latLng
	var latlng = new google.maps.LatLng(lat, lng);
// map Options
	var myOptions = {
	zoom: 12,
	center: latlng,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	zoomControl: false,
    panControl: false,
    streetViewControl :false,
    overviewMapControl: false,
    mapTypeControl: false,
    scrollwheel: false,
    disableDoubleClickZoom: true,
	styles: [
		{
			stylers: [
		        { saturation: -100 },
		        { lightness: -8 },
		        { gamma: 1.18 }
		    ]
      	}
      ]


   };
//draw a map
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	var marker = new google.maps.Marker({
	position: map.getCenter(),
	map: map
   });
}
// call the function
   load();
//]]>
</script>