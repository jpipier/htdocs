<?php

/**
 * BuddyPress - Users Settings
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="clearfix">
	<ul>
		<?php if ( bp_core_can_edit_settings() ) : ?>

			<?php //bp_get_options_nav(); ?>

		<?php endif; ?>
	</ul>
</div>
<div id="tabContainerProfil" class="">
				<div class="tabsSettings">
                  <ul>
                  	<li><a href="#tab1"><?php echo __('General'); ?></a></li>
                    <li><a href="#tab2"><?php echo __('Email'); ?></a></li>
                    <li><a href="#tab3"><?php echo __('Delet Account'); ?></a></li>                    
                  </ul>
                 </div>

                <section class="block">
					<article class="tabpage" id="tab1">
              			<?php bp_get_template_part( 'members/single/profile/edit' );?>
              		</article>                  
	                <article class="tabpage" id="tab2">
	                  	<?php bp_get_template_part( 'members/single/settings/general' ); ?>
	                </article>
	                <article class="tabpage" id="tab3">
	                  	<?php bp_get_template_part( 'members/single/settings/delete-account' ); ?>
	                </article>
                 </section>
</div>

<script>
$(function(){
  $('.tabsSettings ul li:first').addClass('tabActiveHeader');
  $('.block article').hide();
  $('.block article:first').show();
  $('.tabsSettings ul li').on('click',function(){
    $('.tabsSettings ul li').removeClass('tabActiveHeader');
    $(this).addClass('tabActiveHeader')
    $('.block article').hide();
    var activeTab = $(this).find('a').attr('href');
    $(activeTab).show();
    return false;
  });
})
</script>