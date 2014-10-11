<?php
/**
 * Template Name: Front Page
 */
?>
<?php get_header(); ?>

	<!--slider-->		
		<?php 
			$featured_category = get_category( ot_get_option( 'featured_category', '0' ) );
			if( !empty( $featured_category ) ){
				$featured_category = $featured_category->slug;
			}else{
				$featured_category = 'featured';
			}
		
		?>
		<?php		
			$args = array(
				'category_name' => $featured_category
			);
		?>
		<div class="center" id="front-page-carousels-preloader">
			<img src="<?php echo get_template_directory_uri(); ?>/images/bx_loader.gif" alt="<?php _e( 'Loading...','klein' ); ?>" />
		</div>
		<div id="front-page-carousels" class="row">
		<?php query_posts( 'hotels=highlight&post_type=hotel' ); // begin query for featured ?>
			<?php if( have_posts() ){ ?>
				<div class="clearfix" id="front-page-slider">
				<?php while( have_posts() ){ ?>
					<?php the_post(); ?>
						<?php if( has_post_thumbnail() ){ ?>
							<div class="front-page-slider-slide">
								<div class="front-page-slider-slide-thumbnail col-md-8">
									
									<a title="<?php echo esc_attr( the_title() ); ?>" href="<?php echo esc_url( the_permalink() ); ?>">
										<?php
											the_post_thumbnail(
												array(604,331)
											);
										?>
									</a>									
								</div>								
								<div class="front-page-slider-slide-detail col-md-4">
									<!--slider section title-->
									<h2>
										<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php echo esc_attr( the_title() ); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
									<!--slider section title end-->
									<!--excerpt-->
									
									<?php the_excerpt(); ?>
									
									<p>
										<a class="btn btn-primary btn-sm btn-mhc" title="<?php echo esc_attr( the_title() ); ?>" href="<?php echo esc_url( the_permalink() ); ?>">
											<?php _e( 'See Evaluations','klein' ); ?>
										</a>
									</p>
									<!--excerpt-->
								</div>
							</div>
						<?php } ?>	
				<?php } // end while ?>
				</div>

			
			<?php } //endif ?>
		<?php wp_reset_query(); ?>
		
	
	<!--end slider-->
	
	
	<!--highlights-->
		
		<div id="front-page-highlights">
			
			<div class="clearfix home-highlights col-md-12">
				<div id="highlights">
				<?php 
					$highlights_category = get_category( ot_get_option( 'highlights_category', '0' ) );
					if( !empty( $highlights_category ) ){
						$highlights_category = $highlights_category->slug;
					}else{
						$highlights_category = 'highlights';
					}
					$args = array(
						'category_name' => $highlights_category
					);
				?>
				<?php query_posts( 'hotels=slider&post_type=hotel' ); // begin query ?>
					<?php //begin loop for highlights content ?>
					<?php if( have_posts() ){ ?>
						<?php while( have_posts() ){ ?>
							<?php the_post(); ?>
							<?php if( has_post_thumbnail() ){ ?>
							<div class="slide klein-carousel">
								<a title="<?php echo esc_attr( the_title() ); ?>" href="<?php echo esc_url( the_permalink() ); ?>">
									<?php the_post_thumbnail( array(225,168) ); ?>
								</a>
								<div class="font-page-highlights-content">
									
									<div class="front-page-highlights-detail">
										<h3>
											<a title="<?php echo esc_attr( the_title() ); ?>" href="<?php echo esc_url( the_permalink() ); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p>
											<a class="btn btn-primary btn-sm btn-mhc-carousel" title="<?php echo esc_attr( the_title() ); ?>" href="<?php echo esc_url( the_permalink() ); ?>">
												<?php _e( 'Read More','klein' ); ?>
											</a>
										</p>
									</div>
								</div>
							</div>
							<?php } ?>
						<?php } // end while ?>
					<?php } ?>
				<?php wp_reset_query(); //reset the query ?>

				</div>
			</div>
			
			<div id="front-page-highlights-nav" class="clearfix col-md-12 break-row-bottom">
				<div class="pull-right">
					<div id="front-page-highlights-prev"></div>
					<div id="front-page-highlights-next"></div>
				</div>	
			</div>
			
		</div>
	<!--highlights end-->
	</div><!-- end #front-page-carousels-->
	<!--teaser-->
	<div id="front-page-teaser" class="baseline">
		<?php the_content(); ?>
	</div>
	<!--teaser end-->
	<!-- widgets area-->

	<!-- widgets area end -->
<?php get_footer(); ?>