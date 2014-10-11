
<?php get_header(); ?>
	<div class="ContentRevSlider">
		<div class="thumbnailBkg">
			<?php the_post_thumbnail(); ?>
		</div>
		
	</div>
	<div class="container">
		<div class="row">
			<div class="contentPage col-xs-12 col-sm-12 col-lg-10">
				<div class="breadcrumb">

					<p><?php // Breadcrumb navigation
						if (is_page() && !is_front_page() || is_single() || is_category()) {
							echo '<ul>';
							echo '<li><a title="Accueil" rel="nofollow" href="http://idomservice.com/">Accueil</a></li> > ';

							if (is_page()) {
							$ancestors = get_post_ancestors($post);

								if ($ancestors) {
								$ancestors = array_reverse($ancestors);

									foreach ($ancestors as $crumb) {
										echo '<li><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li> > ';
									}
								}
							}

							if (is_single()) {
								$category = get_the_category();
								echo '<li><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
							}

							if (is_category()) {
								$category = get_the_category();
								echo '<li>'.$category[0]->cat_name.'</li>';
							}

							// Current page
							if (is_page() || is_single()) {
								echo '<li class="current">'.get_the_title().'</li>';
							}
							echo '</ul>';
						}
						?>
					</p>
				</div>
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12 col-lg-9'); ?>>
							<?php 
								the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
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
							<div class="linkChild">
								<ul>
								    <?php
								        $id = $post->post_parent;
								        $exclude = $post->ID;
								        wp_list_pages("title_li=&child_of=$id&exclude=$exclude");
									?>
								</ul>
							</div>
						</article><!-- #post-## -->
				<?php
					endwhile;
				?>
				<?php get_sidebar(); ?>
			</div><!-- end.contentPage -->
		</div><!-- end.row -->
	</div>
<?php 
	get_footer();
?>


