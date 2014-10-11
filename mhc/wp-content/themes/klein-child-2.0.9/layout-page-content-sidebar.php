<?php
/**
 * Page Content Sidebar
 *
 * @package klein
 */

get_header(); ?>

	<?php get_template_part( 'content','header'); ?>
	
	<div class="row">
		<div id="primary" class="content-area col-md-8 col-sm-8 content-area">
			<div id="content" class="site-content" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'content', 'page' ); ?>
		

		
				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->
		
		<div id="secondary" class="widget-area col-md-4 col-sm-4 omega" role="complementary">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
