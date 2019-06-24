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
			<!-- <li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li> -->
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>
	</div>

	<div class="show-for-small-only">
		<?php //joints_top_nav(); ?>
		INSERT SMALL CUSTOM NAV HERE
	</div>
</div>