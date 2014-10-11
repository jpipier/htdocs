<?php
/**
 * The Template for displaying all single posts.
 *
 * @package klein
 *
 */

get_header(); ?>
<?php global $post; ?>


<?php get_template_part( 'content','header'); ?>

<div class="row">
	<div id="primary" class="col-md-8 col-sm-8">
		<?php get_template_part( 'content-hotel-single', get_post_format() ); ?>
	</div>
	<div id="secondary" class="widget-area col-md-4 col-sm-4" role="complementary">
		<?php get_sidebar( 'hotel' ); ?>
	</div>
</div>

<?php get_footer(); ?>