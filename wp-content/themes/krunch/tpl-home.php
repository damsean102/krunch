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


<div class="content homeContent">
	<div class="container">
		<div class="row-fluid">
			<div class="span8">
				
			
				<?php
					$args = array(
						'posts_per_page'   => 2,
						'offset'           => 0,
						'category'         => '',
						'orderby'          => 'post_date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'post_status'      => 'publish',
						'suppress_filters' => true
					);
					$latestNews = get_posts($args);

				?>

				<?php if ($latestNews): ?>
					<h3>Latest News</h3>

					<?php foreach ($latestNews as $post): setup_postdata($post); ?>
						
						<div class="newsPost">
							<div class="row-fluid">
								<div class="span2">
									<?php 
										if (has_post_thumbnail($post_id)):

											echo get_the_post_thumbnail($post_id, 'thumbnail');
										else:
											echo "<img src='" . get_bloginfo('template_url') . "/img/logo.png' class='placeholderIMG'>";
										endif; ?>
								</div>
								<div class="span10">
									<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

									<?php echo wpautop(get_the_excerpt()); ?>

									<p><a href="<?php echo get_permalink(); ?>" class="button">Read More</a></p>
								</div>
							</div>
						</div><!-- END OF newsPost DIV -->


					<?php endforeach;
					wp_reset_postdata();
					?>
				<?php endif; ?>
			</div><!-- END OF span8 DIV -->

			<div class="span4">
				<h3>Latest From Twitter</h3>

				<?php get_template_part('blocks/widget-twitter'); ?>
			</div><!-- END OF span4 DIV -->

		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->	
</div><!-- END OF content DIV -->


<div class="content">
	<?php get_template_part('blocks/random-testimonial'); ?>
</div><!-- END OF content DIV -->


<?php get_footer(); ?>