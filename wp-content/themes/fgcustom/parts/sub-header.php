<?php
/**
 * Template part for displaying breadcrumbs and social links
 */
?>

<div class="grid-container sub-header">
	<div class=" grid-x grid-margin-x grid-padding-x align-spaced OFFtext-center">

		<div class="breadcrumb small-12 medium-5 small-order-2 medium-order-1">
		<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
		<ul><?php //if (function_exists('be_taxonomy_breadcrumb')) be_taxonomy_breadcrumb(); ?></ul>
		</div>
							
		<div class="social small-12 medium-5 small-order-1 medium-order-2">

			<div class=" grid-x align-spaced">
				<div class="cell small-7"><strong>Share On Social Media</strong></div>
			<?php if( get_field('facebook_link', 'option') ): ?>
			    <div class="cell small-1"><a href="<?php the_field('facebook_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-soc-fb-icon.svg"></a></div>
			<?php endif; ?>

			<?php if( get_field('linkedin_link', 'option') ): ?>
			    <div class="cell small-1"><a href="<?php the_field('linkedin_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-soc-li-icon.svg"></a></div>
			<?php endif; ?>

			<?php if( get_field('twitter_link', 'option') ): ?>
			    <div class="cell small-1"><a href="<?php the_field('twitter_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-soc-tw-icon.svg"></a></div>
			<?php endif; ?>

			<?php if( get_field('email_link', 'option') ): ?>
			    <div class="cell small-1"><a href="<?php the_field('email_link', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgm-soc-em-icon.svg"></a></div>
			<?php endif; ?>
			</div>

		</div>

	</div>
</div>