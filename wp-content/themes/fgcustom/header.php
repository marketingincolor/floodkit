<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>
<!doctype html>
  <html class="no-js"  <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
		
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header" role="banner">
					<div class="grid-container">			
						<!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory (offcanvas-topbar)-->
						<?php get_template_part( 'parts/nav', 'topbar' ); ?>
	 				</div>
				</header> <!-- end .header -->

			<?php if ( is_single() || is_archive() ) : ?>
				<div class="custom-top-bar" id="main-menu">
					<div class="orange-bgnd sub-nav" data-responsive-toggle="mob-top-bar-menu" data-hide-for="medium">
						<button class="menu-icon" type="button" data-toggle></button>
						<div class="orange-bgnd mob-top-bar" id="mob-top-bar-menu" style="display:none;">
							<?php joints_off_canvas_nav(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
