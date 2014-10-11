<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_member_header' ); ?>
<div class="clearfix"></div>
<div class="row blocProfil">

	<div class="col-md-8 col-sm-4">
		<div id="item-header-content">
			<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
				<h5 class="user-nicename"><?php bp_displayed_user_username(); ?></h5>
				<span class="subUser-nicename">54,Helsko (USA)</span>
			<?php endif; ?>

			<?php do_action( 'bp_before_member_header_meta' ); ?>
	
			<div id="item-meta">
				<div class="HotelAfinitie"><?php echo __('Hotelery afinities'); ?> :

				</div>
				
			</div><!-- #item-meta -->

		</div><!-- #item-header-content -->
		<div class="btn-edit">
			<a href="settings/">Edit my profile</a>
		</div>
	</div>
	<div>
		<div id="item-header-avatar">
			<?php bp_displayed_user_avatar( 'type=full' ); ?>
		</div><!-- #item-header-avatar -->
	</div>
</div>

<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>