<?php
//Template Name: Home Template
?>

<?php get_header(); ?>

<?php get_template_part('blocks/banners'); ?>

<?php $theContent = get_the_content(); ?>
<?php if (!empty($theContent)): ?>
	<div class="content">
		<div class="container">
			<div class="row-fluid">
				<div class="span8 offset2">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no content has been found'); ?></p>
					<?php endif; ?>
				</div><!-- END OF span8 DIV -->
			</div><!-- END OF row-fluid DIV -->
		</div><!-- END OF container DIV -->
	</div><!-- END OF content DIV -->
<?php endif; ?>

<?php get_template_part('blocks/two-regions'); ?>
<?php get_template_part('blocks/video'); ?>

<div class="content">
	<?php get_template_part('blocks/random-testimonial'); ?>
</div><!-- END OF content DIV -->


<?php get_footer(); ?>
