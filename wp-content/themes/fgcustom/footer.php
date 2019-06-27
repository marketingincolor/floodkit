<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">
					<div class="grid-container">
						<div class="inner-footer grid-x grid-margin-x grid-padding-x Xalign-middle">
							
							<div class="small-12 medium-12 large-12 cell align-self-bottom" style="margin-top:2.5em;">
		    					<div class="footer-cta">
		    						<h2><?php the_field('footer_cta_text', 'option'); ?></h2>
		    						<a href="<?php the_field('footer_cta_link', 'option'); ?>" class="footer-cta-button"><?php the_field('footer_cta_button', 'option'); ?></a>
		    					</div>
		    				</div>
							
							<div class="small-12 medium-12 large-12 cell align-self-bottom">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | All Rights Reserved</p>
							</div>
						
						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>

	</body>
	
</html> <!-- end page -->