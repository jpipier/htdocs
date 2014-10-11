<?php
/**
 * Template Name: Front Page
 */
?>
<?php get_header(); ?>

	<div class="ContentRevSlider">
		<div class="RevSliderBkg">
			
		</div>
		
	</div>

	<div class="container">
		<div class="row">
			<div class="contentPage col-xs-12 col-sm-12 col-lg-10">
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="entry-content">
								<?php
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );

									edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-## -->
	<?php
					endwhile;
				?>
				<div class="vignettes">
					<div class="vignette margin-right-40">
						<div class="bloc no-border-right">
							<a href="<?php the_field('lien_v1'); ?>">
								<span class="titreVignette">
									<?php the_field('titre_v1'); ?>
								</span>
								<span class="imgPicto">
									<img src="<?php the_field('picto_v1'); ?>" alt="<?php the_field('titre_v1'); ?>">
								</span>
							</a>
						</div>
						<div class="imgVignette">
							<a href="<?php the_field('lien_v1'); ?>">
								<img src="<?php the_field('vignette_v1'); ?>" alt="<?php the_field('titre_v1'); ?>">
							</a>
						</div>
					</div>
					<div class="vignette">
						<div class="imgVignette">
							<a href="<?php the_field('lien_3'); ?>">
								<img src="<?php the_field('vignette_3'); ?>" alt="<?php the_field('titre_3'); ?>">
							</a>
						</div>
						<div class="bloc no-border-left">
							<a href="<?php the_field('lien_3'); ?>">
								<span class="titreVignette">
									<?php the_field('titre_3'); ?>
								</span>
								<span class="imgPicto">
									<img src="<?php the_field('picto_3'); ?>" alt="<?php the_field('titre_3'); ?>">
								</span>
							</a>
						</div>
					</div>
					<div class="vignette margin-right-40">
						<div class="bloc no-border-right">
							<a href="<?php the_field('lien_v2'); ?>">
								<span class="titreVignette">
									<?php the_field('titre_v2'); ?>
								</span>
								<span class="imgPicto">
									<img src="<?php the_field('picto_v2'); ?>" alt="<?php the_field('titre_v2'); ?>">
								</span>
							</a>
						</div>
						<div class="imgVignette">
							<a href="<?php the_field('lien_v2'); ?>">
								<img src="<?php the_field('vignette_v2'); ?>" alt="<?php the_field('titre_v2'); ?>">
							</a>
						</div>
					</div>
					<div class="vignette">
						<div class="imgVignette">
							<a href="<?php the_field('lien_4'); ?>">
								<img src="<?php the_field('vignette_4'); ?>" alt="<?php the_field('titre_4'); ?>">
							</a>
						</div>
						<div class="bloc no-border-left">
							<a href="<?php the_field('lien_4'); ?>">
								<span class="titreVignette">
									<?php the_field('titre_4'); ?>
								</span>
								<span class="imgPicto">
									<img src="<?php the_field('picto_4'); ?>" alt="<?php the_field('titre_4'); ?>">
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php
get_footer();




