<?php

$bgImgID = get_field('region_bg_image');
$bgImgSRC = wp_get_attachment_image_src($bgImgID, 'full');

?>

<div class="regions" style="background: url('<?php echo $bgImgSRC[0]; ?>') center top no-repeat;">
	<div class="container">
		
		<div class="row-fluid">
			<div class="span12">
				<h3>Around the UK</h3>
			</div>
		</div>

		<div class="row-fluid">

			<div class="span6">
				<div class="region region-wm">

					<div class="regionContent">
						<?php echo get_field('region_kwm_text'); ?>
						<p><a href="<?php echo get_permalink(10); ?>" class="buttonBordered">Find out more</a></p>
					</div>

				</div><!-- END OF region DIV -->
			</div><!-- END OF span6 DIV -->
			<div class="span6">
				<div class="region region-sw">
					
					<div class="regionContent">
						<?php echo get_field('region_ksw_text'); ?>
						<p><a href="<?php echo get_permalink(12); ?>" class="buttonBordered">Find out more</a></p>
					</div>

				</div><!-- END OF region DIV -->	
			</div><!-- END OF span6 DIV -->

		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF regions DIV -->