<?php
	$args = array(
		'posts_per_page'   => 1,
		'offset'           => 0,
		'orderby'          => 'rand',
		'order'            => 'DESC',
		'post_type'        => 'testimonial',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	if (is_page(10) || is_child_of(10) || is_ancestor(10)):
		//Child or Ancestor of Krunch WM
		$args['tax_query'][] = array(
			'taxonomy' => 'region',
			'field'	=> 'id',
			'terms' => '4'
		);

	elseif (is_page(12) || is_child_of(12) || is_ancestor(12)):
		//Child or Ancestor of Krunch SW

		$args['tax_query'][] = array(
			'taxonomy' => 'region',
			'field'	=> 'id',
			'terms' => '3'
		);

		// $args['tax_query']['taxonomy'] = 'region';
		// $args['tax_query']['field'] = 'id';
		// $args['tax_query']['terms'] = 3;
	endif;

	$testimonials = get_posts( $args );
?>

<?php if ($testimonials): ?>

<div class="clearfix"></div>

<div class="testimonial">
	<h3>Testimonial</h3>

	<?php foreach ($testimonials as $post): setup_postdata($post); ?>

		<div class="container">
			<div class="row-fluid">
				<div class="span10 offset1">
					<div class="testimonialContent">
						<?php echo get_the_content(); ?>	
					</div><!-- END OF testimonialContent DIV -->
					

					<p class="testimonialName"><?php echo get_field('testimonial_name'); ?></p>	
				</div><!-- END OF span10 DIV -->
			</div><!-- END OF row-fluid DIV -->
		</div><!-- END OF container DIV -->
		
		

	<?php endforeach; 
	wp_reset_postdata();
	?>	
</div>




<?php endif; ?>