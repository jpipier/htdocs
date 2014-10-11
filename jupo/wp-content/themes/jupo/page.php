<?php

get_header(); ?>

	<div id="main" class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12">
			
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12 col-lg-12'); ?>>
							<?php 
								the_title( '<div class="entry-header"><h1 class="entry-title">', '</h1></div>' );
							?>
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

			</div><!-- end.contentPage -->
		</div><!-- end.row -->
	</div>
<?php 
	get_footer();
?>


