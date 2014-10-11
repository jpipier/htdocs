<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package klein
 */

get_header(); ?>

	<?php get_template_part( 'content','header'); ?>
	<div class="row">
		<div id="primary" class="content-area col-md-12 full-content">
			<div id="content" class="site-content eow" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'page' ); ?>
	
	
				<?php endwhile; // end of the loop. ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>
