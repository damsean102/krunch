<?php get_header(); ?>

<?php get_template_part('blocks/banners'); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>

<div class="content singlePost">
	<div class="container">
		<div class="row-fluid">
			

			<div class="span8 offset2">
				<h1><?php the_title(); ?></h1>
				
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php if (has_post_thumbnail($post_id)):

							echo get_the_post_thumbnail($post_id, 'full');
							
						endif; ?>

						<?php the_content(); ?>

					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no content has been found'); ?></p>
					<?php endif; ?>
				
			</div><!-- END OF span8 DIV -->

		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF content DIV -->

<?php get_template_part('blocks/random-testimonial'); ?>

<?php get_footer(); ?>