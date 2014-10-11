<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package klein
 */
?>
</div><!-- .mhc-content -->
	</div><!-- #main -->
	
		<div id="footer-widgets">
			<div class="container">
				<div class="newsFooter">
					<h3><?php echo __('Some News'); ?></h3>
					<?php
				        query_posts('category_name="news-'.get_locale().'"&order=DESC&orderby=date&posts_per_page=3');
						if ( have_posts() ) : while ( have_posts() ) : the_post();
									echo '<article class="clearfix">';
										echo the_date('d/m/Y', '<span class="date">', '</span>');
							        	echo '<span class="titre">'; echo the_title(); echo '</span>';
										echo '<span class="content-news">';echo improved_trim_excerpt( '', 5 ); echo '</span>';
							        echo '</article>';
								endwhile; else:
								endif;
							wp_reset_query();
					?>
				</div>
				<div class="newsFooter followUs">
					<h3><?php echo __('Follow us'); ?></h3>
					<h4><?php echo __('Suscribe to our mailing list :'); ?></h4>
						<form>
							<INPUT type="text" value="<?php echo __('Enter your email here'); ?>" name="Nom de l'élément">
						</form>
					<h4><?php echo __("Don't loose the feed"); ?></h4>
					<a href="http://www.twitter.com/mhc"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="twitter"></a>
					<a href="http://www.facebook.com/mhc"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="facebook"></a>
				</div>
			</div>		
		</div>

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<?php
					$copyright = ot_get_option( 'copyright_text', 'Copyright &copy 2013 Klein WordPress Theme (Co. Reg. No. 123456789). All Rights Reserved. Your Company Inc.' );
				?>
				<div class="menu-footer left">
					<?php wp_nav_menu( array('theme_location' => 'bottom' )); ?>
				</div>
				<div id="copyright-text" class="right">
					<?php echo $copyright; ?>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #footer -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>