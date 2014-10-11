<?php
/**
 * Template Name: work
 */
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
									 $terms = get_terms("works");
										 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
										     echo "<ul id='filter'>";
										     echo '<li class="current"><a href="#">All</a></li>';
										     foreach ( $terms as $term ) {
										       echo "<li class=''><a href='#'>". $term->name . "</a></li>";
										        
										     }
										     echo "</ul>";
										 }
									
					               
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', '' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );	

									edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-## -->
				<?php
					endwhile;
				
				echo '<div class="listWork">';
			    	echo '<ul id="portfolio">';
		            query_posts( 'post_type=work&order=ASC&orderby=date');
					if ( have_posts() ) : while ( have_posts() ) : the_post();
					$terms = get_the_terms($post->ID, 'works');
				        echo '<li class="work '?><?php foreach($terms as $term){ echo $term->name.' ';}; ?><?php echo' ">';
				        	echo '<h5 class="workTitle"><a href="'; echo the_permalink(); echo '">'; echo the_title(); echo '</a></h5>';
					        echo '<span class="workThumb"><a href="'; echo the_permalink(); echo '">'; echo the_post_thumbnail(); echo '</span>'; echo '</a>';
					        
					        echo '<span class="workExcerpt"><a href="'; echo the_permalink(); echo '">'; echo excerpt(20); echo '</span>'; echo '</a>';
				        echo '</li>';
					endwhile; else:
					endif;

					//Reset Query
					wp_reset_query();
					echo '</ul>';
				echo '</div>';
?>
			</div><!-- end.contentPage -->
		</div><!-- end.row -->
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">

$(document).ready(function() {
    $('ul#filter a').click(function() {
        $(this).css('outline','none');
        $('ul#filter .current').removeClass('current');
        $(this).parent().addClass('current');
         
        var filterVal = $(this).text().toLowerCase().replace(' ','-');
                 
        if(filterVal == 'all') {
            $('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
        } else {
            $('ul#portfolio li').each(function() {
                if(!$(this).hasClass(filterVal)) {
                    $(this).fadeOut('normal').addClass('hidden');
                } else {
                    $(this).fadeIn('slow').removeClass('hidden');
                }
            });
        }
         
        return false;
    });
});

	</script>
<?php 
	get_footer();
?>

