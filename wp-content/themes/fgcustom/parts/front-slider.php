<?php
/**
 * Template part for displaying SLIDER images on Home Page
 * slider 
 */
?>

<div class="grid-container-fluid home-slider"> 

  <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>

    <div class="orbit-wrapper">
      <div class="orbit-controls hide-for-medium">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
      </div>
      <ul class="orbit-container">

      <?php if( have_rows('slider') ):
        while ( have_rows('slider') ) : the_row(); ?>

        <li class="orbit-slide">
          <figure class="orbit-figure">
            <img class="orbit-image" src="<?php the_sub_field('hp_slide_image'); ?>" alt="<?php the_sub_field('hp_slide_title'); ?>">
            <figcaption class="orbit-caption grid-x grid-padding-x">
              <div class="orbit-caption-meta medium-8 medium-offset-2">
              <h2><?php the_sub_field('hp_slide_title'); ?></h2>
              <h4><?php the_sub_field('hp_slide_text'); ?></h4>
              <p><a href="<?php the_sub_field('hp_slide_link'); ?>" class="slide-cta-button"><?php the_sub_field('hp_slide_button'); ?></a></p>
              </div>
            </figcaption>
          </figure>
        </li>

      <?php 
        endwhile;
      else : // no rows found
      endif; ?>

      </ul>
    </div>

    <nav class="orbit-bullets">
      <button data-slide="0"><span class="show-for-sr">First slide details.</span></button>
      <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
      <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
      <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
    </nav>

  </div>

</div>