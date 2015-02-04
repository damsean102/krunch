<?php 
	$banners = get_field('select_a_banner');

if ($banners): ?>
	<div class="bannerWrapper <?php if(is_page(4)): echo 'homeBanner'; endif; ?>">
		<div class="banner">
			<ul>
				<?php foreach( $banners as $post): setup_postdata($post);

					$bannerID = get_post_thumbnail_id();
					$bannerSRC = wp_get_attachment_image_src( $bannerID, 'banner');

					$bannerPosition = get_field('banner_position');

					$bannerText = get_field('banner_text');
					
					if ($bannerPosition):
						$bannerPosition = 'center ' . $bannerPosition;
					else:
						$bannerPosition = 'center center';
					endif;

					?>
					
					<li>
					<?php if(is_page(4)):?><div class="overlay"></div><?php endif; ?>
					<div class="slide" style="background: url(<?php echo $bannerSRC[0]; ?>); background-position: <?php echo $bannerPosition; ?>; background-size: cover;">
					<?php if ($bannerText): ?> 
						<div class="bannerContent">
							<?php echo $bannerText; ?>
						</div>
					<?php endif; ?>
					</div></li>

				<?php endforeach; wp_reset_postdata(); ?>

			</ul>
		</div><!-- END OF banner DIV -->	
	</div>
<?php else: ?>
	<!-- Display fallback Image -->
<?php endif; ?>
   