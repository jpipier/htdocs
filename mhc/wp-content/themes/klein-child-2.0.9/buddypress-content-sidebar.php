<?php
/**
 * BuddyPress Content Sidebar
 *
 * @package klein
 */ 
?>

	<div id="primary" class="bp-content-area col-md-12 col-sm-8">
		
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary --> 


