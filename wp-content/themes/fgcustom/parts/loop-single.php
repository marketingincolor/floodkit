<?php
/**
 * Template part for displaying a single post
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="grid-container">
		<div class=" grid-x grid-margin-x">
			<div class="main small-12 medium-10 medium-offset-1 cell">

				<header class="article-header">	
				<?php if ( is_singular('videos')) : ?>
					<div class="embed-container">
						<?php if( get_field('video_url') ): ?>
						<?php the_field('video_url'); ?>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<?php the_post_thumbnail('full'); ?>
				<?php endif; ?>
			    </header> <!-- end article header -->
								
			    <section class="entry-content" itemprop="text">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					<?php //get_template_part( 'parts/content', 'byline' ); ?>
					<?php the_content(); ?>
				<?php if ( is_singular('videos')) : ?>

				<?php endif; ?>


				<?php if ( is_singular('downloadables')) : ?>
					<div class="entry-title">
						<?php if( get_field('download_url') ): ?>
						<a href="<?php the_field('download_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download-cta.png" alt="Download File"></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
					<p class="tags"><?php //the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
				</footer> <!-- end article footer -->
									
				<?php //comments_template(); ?>	
											
			</div>
		</div>
	</div>
</article> <!-- end article -->