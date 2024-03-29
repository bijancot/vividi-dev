<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$slider_active = get_post_meta( get_the_ID(), 'trav_page_slider', true );
		$slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;
		if ( class_exists( 'RevSlider' ) && $slider != 'Deactivated' ) {
			echo '<div id="slideshow">';
			putRevSlider( $slider );
			echo '</div>';
		} ?>

		<section id="content">
			<div class="container">
				<div id="main" class="entry-content">
					<?php if ( has_post_thumbnail() ) { ?>
						<figure class="image-container block">
							<?php the_post_thumbnail(); ?>
						</figure>
					<?php } ?>
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
					<?php // comments_template(); ?>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
get_footer();