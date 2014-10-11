<?php
if (is_admin()) {
	wp_enqueue_script('adminjs',get_template_directory_uri().'/admin-options/upload.js');	
	}


add_action('admin_menu', 'cwa_menu_options');

function cwa_menu_options() {
    // add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
    add_menu_page('GaleriePhotos','Galerie photos','activate_plugins','options','render_pannel',null, 51);
 	//add_submenu_page('options','Options','activate_plugins','options','render_pannel',null, 81);

}

function render_pannel(){
	wp_enqueue_media();

	if(isset($_POST['pannel_update'])){
		if(!wp_verify_nonce($_POST['pannel_noncename'],'pannel')){
			die('Token non valide');
		}
		foreach ($_POST['options'] as $name => $value) {
			if(empty($value)){
				delete_option($name);
			}else{
				update_option($name, $value);
			}

		}
			
					?>
				<div class="updated fade" id="message">
					<p>Options sauvegardées avec succès</p>
				</div>
			<?php
	}
	?>
	<div class="wrap theme-option-page">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Galerie photos</h2>
		<form action="" method="post">
			<dic class="theme-options-group">
				<table cellspacing="0"class="widefat options-table">
					<thead>
						<tr>
							<th colspan="3">Page Menu</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">
								<label for="header">Page Menu</label>
							</th>
							<td>
								<?php 
								$image = get_option('header');
								$test = explode(',', $image);
									foreach ($test as $tests) {
										?>
										<img src="<?php echo $tests; ?>" alt="" width="200" class="btnAddMedia">
										<?php
									}

								?>
								<!-- <input type="text" id="header" name="options[header]" value="<?php //echo get_option('header',''); ?>"> -->
								<!-- <a href="#" class="button btnAddMedia">upload</a> -->
							</td>
							<td>
								<a href="#" class="button btnAddMedia">upload</a>
							</td>
						</tr>
						
					</tbody>
				</table>

			</div>
			<input type="hidden" name="pannel_noncename" value="<?php echo wp_create_nonce('pannel'); ?>">
			<p class="submit">
				<input type="submit" name="pannel_update" class="button-primary autowidth" value="Sauvegarder">
			</p>
		</form>
	</div>
	<?php
}