<?php
/**
 * Template part for displaying a single post
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="grid-container">
		<div class=" grid-x grid-margin-x grid-padding-x">
			<div class="main small-10 small-offset-1 cell">

				<header class="article-header">	
					<?php the_post_thumbnail('full'); ?>
			    </header> <!-- end article header -->
								
			    <section class="entry-content" itemprop="text">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					<?php //get_template_part( 'parts/content', 'byline' ); ?>
					<?php the_content(); ?>
				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
					<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
				</footer> <!-- end article footer -->
									
				<?php //comments_template(); ?>	
											
			</div>
		</div>
	</div>
</article> <!-- end article -->