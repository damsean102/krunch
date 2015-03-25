<?php
//Template Name: Region News Template
get_header(); ?>

<?php get_template_part('blocks/banners'); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>


<?php
	if (get_top_parent_id() == 10):
		$catID = 4;
	elseif (get_top_parent_id() == 12):
		$catID = 3;
	endif;

?>

<div class="content">
	<div class="container">


		<div class="row-fluid">
			
			
			<?php get_template_part('blocks/sidebar'); ?>
			

			<div class="span8">

				<h1><?php the_title(); ?></h1>

				<div id="newsWrapper">
					<?php 

						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

						$args = array(
							'posts_per_page'   => 9,
							'offset'           => 0,
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'paged'            => $paged,
							'post_type'        => 'post',
							'post_status'      => 'publish',
							'tax_query' => array(
									array(
										'taxonomy' => 'region',
										'terms'    => $catID,
									),
								)
						);
						$postsQuery = new WP_Query($args);

						$count = 0;

						if ( $postsQuery->have_posts() ): ?>

							<?php while ($postsQuery->have_posts()):
								$postsQuery->the_post(); ?>

								<?php //if ($count == 3): echo "</div><div class='row-fluid'>"; $count=0; endif; ?>

								<?php
									$catArray = array();
									$categories = get_the_category();

									foreach ($categories as $cat):

										if (!empty($cat->slug)):
											array_push($catArray, $cat->slug);
										endif;

									endforeach;
								?>



								<div class="mix mix-<?php echo ($xyz++%3); ?> <?php echo implode(" ", $catArray); ?>">

									<div class="newsItem">
										
										<?php 
										if (has_post_thumbnail($post_id)):

											echo get_the_post_thumbnail($post_id, 'medium');
										else:
											echo "<img src='" . get_bloginfo('template_url') . "/img/logo.png' class='placeholderIMG'>";
										endif; ?>

										<h3><?php the_title(); ?></h3>

										<?php echo wpautop(get_the_excerpt()); ?>

										<a href="<?php echo get_permalink(); ?>">Read More</a>
									</div><!-- END OF newsItem DIV -->
									
								</div><!-- END OF span4 DIV -->

							<?php $count++; ?>
								
							<?php endwhile; ?>

						<?php krunch_pagination($postsQuery->max_num_pages); ?>
						
					<?php else: ?>
						<p>We have been unable to load any news stories. Please check back soon.</p>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
					
				</div><!-- END OF newsWrapper DIV -->
			</div><!-- END OF span12 DIV -->
				
		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF content DIV -->

<?php get_template_part('blocks/random-testimonial'); ?>

<?php get_footer(); ?>