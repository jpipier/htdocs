<?php
$pages = get_pages(array('sort_column' => 'menu_order'));
				$i = 1;
				foreach ($pages as $page_data) {
					$nb = $i++;
				    $content = apply_filters('the_content', $page_data->post_content); 
						echo wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
						echo "<div class='content'>".$content()."</div>";
				}
?>