<?php
/**
 * The Header for our theme.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->


<!-- Mobile Specific Metas
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> >

<div id="page" class="">

	<header id="masthead" class="container" role="banner">
		<div class="header-main col-xs-12 col-sm-12 col-lg-10">
			<h1 class="site-title col-xs-6 col-sm-3 ">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" width="197" height="146" alt="">
				</a>
			</h1>

			<nav id="primary-navigation" class="site-navigation primary-navigation col-xs-12 col-sm-9 " role="navigation">
			<?php
				if ( is_front_page() ) : ?>
				<div class="col-xs-12 col-sm-12 col-lg-12">
					<span><?php echo get_option('phone');?></span>
					<?php    //if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('top accueil') ) ?>
				</div>
			<?php
				endif
			?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>

	</header><!-- #masthead -->

	<div id="main" class="site-main">