<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */
$url = get_field('base_url', 'option');
$siteurl = site_url($url);
//$siteurl = site_url('/recruiter-kit/');
get_header(); ?>

<?php if ( is_front_page() ) : ?>
<?php
//wp_redirect( $siteurl );
//exit;
?>

<?php else : ?>

<?php endif; ?>

<?php get_template_part( 'parts/sub', 'header' ); ?>

	<div class="content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php get_footer(); ?>