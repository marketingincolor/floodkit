<?php
/**
 * Template part for displaying SLIDER images on Home Page
 * slider 
 */
?>

<div class="grid-container-fluid home-slider"> 

  <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>

  <?php 
  $args = array( 'posts_per_page' => 4, 'category_name' => 'featured' );
  //$show_posts = get_posts( $args );
  $the_query = new WP_Query( $args ); 
  $total = $the_query->found_posts;
   
  if ( $the_query->have_posts() ) : ?>

    <div class="orbit-wrapper">
      <div class="orbit-controls hide-for-medium">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&lsaquo;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&rsaquo;</button>
      </div>

      <ul class="orbit-container">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <li class="orbit-slide">
          <figure class="orbit-figure">
            <img class="orbit-image" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
            <figcaption class="orbit-caption grid-x grid-padding-x">
              <div class="orbit-caption-meta medium-8 medium-offset-2">
              <h2><?php the_title(); ?></h2>
              <h4><?php the_excerpt(); ?></h4>
              <p><a href="<?php the_permalink(); ?>" class="slide-cta-button">Read More</a></p>
              </div>
            </figcaption>
          </figure>
        </li>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>

    </div>

    <nav class="orbit-bullets">
      <?php for($i=1; $i<=$total; $i++){ $j=$i-1; ?>
          <button data-slide="<?php echo $j; ?>"><span class="show-for-sr">Slide details</span></button>
      <?php } ?>
    </nav>

  <?php else : endif; ?>

  </div>

</div>

