<?php
/**
 * Template part for displaying Grid of Posts on Home Page
 */
?>

<div class="content grid-container" style="margin-bottom:2em; margin-top:1em;">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="small-12 cell">
			<div class="grid-x grid-margin-x grid-padding-x archive-grid" data-equalizer> <!--Begin Grid--> 

			<?php $find = get_category_by_slug( 'featured' );
			$omit = $find->term_id;
			$args = array( 'posts_per_page' => 3, 'category__not_in' => $omit );
			$article_query = new WP_Query( $args ); 
			if ( $article_query->have_posts() ) :
				while ( $article_query->have_posts() ) : $article_query->the_post(); ?>

				<!--Item: -->
				<div class="small-12 medium-4 large-4 cell panel" data-equalizer-watch>
				
					<article id="post-<?php the_ID(); ?>" <?php //post_class(''); ?> role="article">
						<section class="featured-image" itemprop="text">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
						</section> <!-- end article section -->

						<header class="article-header">
							<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header> <!-- end article header -->	
										
						<section class="entry-content" itemprop="text">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">VIEW <span class="orange">&gt;</span></a>
						</section> <!-- end article section -->				    							
					</article> <!-- end article -->
					
				</div>

			<?php endwhile; //endforeach;
			wp_reset_postdata();
			else :
			endif; ?>

			</div>  <!--End Grid --> 

		</div>
	</div>
</div>

<div class="content grid-container" style="margin-bottom:2em; margin-top:1em;">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="small-12 cell">
			<div class="grid-x grid-margin-x grid-padding-x archive-grid"> <!--Begin Grid--> 

			<?php $args = array( 'posts_per_page' => 3, 'post_type' => 'videos' );
			$video_query = new WP_Query( $args ); 
			if ( $video_query->have_posts() ) :
				while ( $video_query->have_posts() ) : $video_query->the_post(); ?>

				<!--Item: -->
				<div class="small-12 medium-4 large-4 cell panel">
				
					<article id="post-<?php the_ID(); ?>" <?php //post_class(''); ?> role="article">
						<section class="featured-image" itemprop="text">
						<?php if ( get_field('video_url') ) : ?>
								<?php the_field('video_url'); ?>
						<?php else : ?>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
						<?php endif; ?>
						</section> <!-- end article section -->

						<header class="article-header">
							<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>	
							<?php //get_template_part( 'parts/content', 'byline' ); ?>				
						</header> <!-- end article header -->	
										
						<section class="entry-content" itemprop="text">
							<?php //the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?> 
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">VIEW <span class="orange">&gt;</span></a>
						</section> <!-- end article section -->				    							
					</article> <!-- end article -->
					
				</div>

			<?php endwhile; //endforeach;
			wp_reset_postdata();
			else :
			endif; ?>

			</div>  <!--End Grid --> 

		</div>
	</div>
</div>
