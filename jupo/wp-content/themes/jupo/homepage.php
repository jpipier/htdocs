<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
			
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12 col-lg-12'); ?>>


						</article><!-- #post-## -->
				<?php
					endwhile;
				?>

			</div><!-- end.contentPage -->
		</div><!-- end.row -->
	</div>
<?php 
	get_footer();
?>


