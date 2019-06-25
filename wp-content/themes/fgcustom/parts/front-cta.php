<?php
/**
 * Template part for displaying CTA on Home Page
 */
?>
<div class="grid-container home-cta">

	<div class="grid-x grid-margin-x text-center align-spaced">

	<?php
	if( have_rows('cta_links') ):
	    while ( have_rows('cta_links') ) : the_row(); ?>

		<div class="cta-item cell small-6 medium-3" style="background: url('<?php the_sub_field('hp_cta_image'); ?>') no-repeat top center / cover;">
			<div class="cta-meta"> 
				<h3><a href="<?php echo site_url();?><?php the_sub_field('hp_cta_link'); ?>"><?php the_sub_field('hp_cta_title');?></a></h3>
				<div class="hide-for-small-only"><a class="cta-link" href="<?php echo site_url();?><?php the_sub_field('hp_cta_link'); ?>"><?php the_sub_field('hp_cta_button'); ?> <span class="orange">&gt;</span></a></div>
			</div>
		</div>


	<?php endwhile;
	else :
	    // no rows found
	endif;
	?>

	</div>

</div>