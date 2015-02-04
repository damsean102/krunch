<?php get_header(); ?>

<?php get_template_part('blocks/banners'); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>

<div class="content">
	<div class="container">
		<div class="row-fluid">
			
			
			<?php include 'blocks/sidebar.php'; ?>
			
			<div class="<?php if ($children): echo 'span8'; else: echo 'span10 offset1'; endif; ?>">

				<h1><?php the_title(); ?></h1>
					<?php if (is_page(10)): echo "<p class='sub-heading'>Sandwell</p>"; endif; ?>
				
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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