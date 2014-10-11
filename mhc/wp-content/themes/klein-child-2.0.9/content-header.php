<?php
/**
 * Contains header for for contents
 * 
 * @package Klein
 *
 */
?>
<?php 
	if ( !is_page('Members') ){
?>

	<div class="row">

		<div class="col-md-12" id="content-header">
			<h1 class="entry-title" id="bp-klein-page-title">
				<?php the_title(); ?>
			</h1>
		</div>

	<?php if(function_exists('bcn_display')){ ?>
		<div class="klein-breadcrumbs col-md-12">
			<?php bcn_display(); ?>
		</div>
	<?php } ?>
	
</div>
<?php } ?>