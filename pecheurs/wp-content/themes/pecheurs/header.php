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


	</header><!-- #masthead -->

	<div id="fullpage" class="main">
		<div id="test">
			<section class="section " id="section0">
				<div class="container-fluid">
					<div class="row">
						
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="GoDown">

							<div class="logo">
								<img src="<?php echo get_stylesheet_directory_uri().'/images/logo.png'; ?>" alt="">
							</div>
							<div class="nomSite">
								<h1><?php echo get_bloginfo( 'name', 'display' ); ?></h1>
							<h2><?php echo get_bloginfo( 'description' );?></h2>
							</div>
							<div class="down">
								<a href="#presentation">
									<img src="<?php echo get_stylesheet_directory_uri().'/images/arrow-down.png'; ?>">
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>