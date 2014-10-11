<?php

/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div id="tabContainer" class="">
    <div class="tabs">
      <ul>
        <li id="tabHeader_1"><?php echo __('Reviews ') ?><?php
				printf( 
					_nx( __('(1)','klein'), 
						 __('(%1$s)', 'klein'), 
						get_comments_number(), 
						'comments title', 
						'klein' 
					),
					number_format_i18n( get_comments_number() ), 
						'<span>' . get_the_title() . '</span>' 
					);
			?>					
		</li>
        <li id="tabHeader_2"><?php echo the_field('titre_tab_2') ?></li>
        <li id="tabHeader_3"><?php echo the_field('titre_tab_3') ?></li>
      </ul>
    </div>
    <div class="tabscontent <?php if( !is_user_logged_in() ){ echo 'notlog'; } ?>">
      <div class="tabpage" id="tabpage_1">
        <?php if( !is_user_logged_in()){
			echo __('<span class="content-notLog" >
					YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
					OR POST REVIEWS<br/>
					Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
			</span>');
        } else {
        	//echo "<p>".the_field('content_tab_1')."</p>";
		// If comments are open or we have at least one comment, load up the comment template
		

			        
						global $current_user;
						get_currentuserinfo();
						$user = $current_user->user_login;
						$postid = get_the_ID();
						global $table_prefix, $wpdb;

			        ?>

			        <div class='headerComments'>
			        	<div><?php echo __('Global note'); ?></div>
			        	<div class="btnReview">
			        		<?php

			        		$query = $wpdb->query(" SELECT * FROM wp_comments WHERE comment_post_ID = $postid AND comment_author = '$user' ");

			        		if($query == 1){ ?>

								note

			        		<?php } else { ?>
							<a data-toggle="modal" id="klein-comments-btn" class="btn btn-review btn-primary" href="#klein_comments_modal" title="<?php _e( 'Add your review !', 'klein' ); ?>"> <?php _e( 'Add your review !', 'klein' ); ?></a>
			        	
							<div class="modal fade" id="klein_comments_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
								
											<div id="comments-modal-body" class="left">
												<?php comment_form(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
			        	</div>
			    	</div>
		<?php
						comments_template('/comments.php');
			} 
		?>
			
        
      </div>
      <div class="tabpage" id="tabpage_2">
        <?php if( !is_user_logged_in()){
			echo __('<span class="content-notLog" >
					YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
					OR POST REVIEWS<br/>
					Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
			</span>');
        } else {
        	echo "<p>".the_field('content_tab_2')."</p>";

        } ?>
      </div>
      <div class="tabpage" id="tabpage_3">
        <?php if( !is_user_logged_in()){
			echo __('<span class="content-notLog" >
					YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
					OR POST REVIEWS<br/>
					Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
			</span>');
        } else { ?>
		<div class="gmap"><?php
			$location = get_field('content_tab_3');
			if( !empty($location) ):
			?>
			<div class="acf-map">
				<div id="map" style="width: 630px; height: 380px; margin-top:-10px;"></div>
			</div>
			<?php endif; 
		echo '</div>';
        } 
?>
    	</div>
      </div>
    </div>
</div>
<?php
$id = bp_displayed_user_id();
$args = array(
	'user_id' => "$id" // use user_id

);
$comments = get_comments($args);
//var_dump($comments);
foreach($comments as $comment) :
	echo($comment->comment_author .'<br/>');
	echo($comment->comment_date .'<br/>');
	echo($comment->comment_content .'<br/>');
endforeach;

?>

<?php do_action( 'bp_before_member_activity_post_form' ); ?>

<?php
if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
	bp_get_template_part( 'activity/post-form' );

do_action( 'bp_after_member_activity_post_form' );
do_action( 'bp_before_member_activity_content' ); ?>

<div class="activity" role="main">

	<?php bp_get_template_part( 'activity/activity-loop' ) ?>

</div><!-- .activity -->

<?php do_action( 'bp_after_member_activity_content' ); ?>
