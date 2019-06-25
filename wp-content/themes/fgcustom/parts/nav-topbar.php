<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/responsive-navigation/
 */
?>

<div class="top-bar" id="main-menu">
	<div class="top-bar-left">
		<ul class="menu">
			<li><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>
	</div>
	<div class="top-bar-alt show-for-medium" style="flex:0 1 auto; margin-left:auto; -webkit-flex: 0 1 auto; -webkit-box-flex:0;">
		<ul class="medium-horizontal menu dropdown">
			<li class="menu-item menu-item-type-cta">
				<a href="../contact-us" class="menu-item-cta" title="Need Expert Help? Contact Floodgate" style="padding:0;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-header-cta.png" /></a>
			</li>
		</ul>
	</div>
	<div class="show-for-small-only" style="width:100%;">

		<div class="grid-container fluid home-mobile-nav">
			<div class="grid-x grid-margin-x text-center align-spaced">
				<div class="orange-link cell small-4">
					<a href="<?php echo site_url('/videos'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-mob-navicon-vid.svg">Videos</a>
				</div>
				<div class="orange-link cell small-4">
					<a href="<?php echo site_url('/articles'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-mob-navicon-art.svg">Articles</a>
				</div>
				<div class="orange-link cell small-4">
					<a href="<?php echo site_url('/downloadables'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-mob-navicon-dnl.svg">Downloadables</a>
				</div>
			</div>
		</div>

	</div>
</div>