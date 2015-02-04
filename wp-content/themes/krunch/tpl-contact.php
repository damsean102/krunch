<?php
//Template Name: Contact Page
?>

<?php get_header(); ?>

<?php get_template_part('blocks/maps'); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>

<div class="content contact">
	<div class="container">
		<div class="row-fluid">
			<div class="span5">
				<h1><?php the_title(); ?></h1>
				
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no content has been found'); ?></p>
					<?php endif; ?>
				
			</div><!-- END OF span5 DIV -->

			<div class="span7">
				<?php 
					$form = get_field('select_a_form');
					gravity_form_enqueue_scripts($form->id, true);
					gravity_form($form->id, true, true, false, '', true, 1); 
				?>
			</div>
		</div>

	</div><!-- END OF container DIV -->
</div><!-- END OF content DIV -->

<?php

$bgImgID = get_field('region_bg_image');
$bgImgSRC = wp_get_attachment_image_src($bgImgID, 'full');

?>

<div class="regions regions-contact">
	<div class="container">
		
		<div class="row-fluid">
			<div class="span12">
				<h3>Contact Us</h3>
			</div>
		</div>

		<div class="row-fluid">

			<div class="span6">
				<div class="region region-wm">
					<div class="badge">
						<p>KWM</p>
					</div><!-- END OF badge DIV -->
					
					<div class="regionContent">
						<h3>Krunch West Midlands</h3>
						<?php echo get_field('kwm_address', 'option'); ?>
						<p><?php echo get_field('kwm_phone', 'option'); ?></p>
						<p><a href="mailto:<?php echo get_field('kwm_email', 'option'); ?>"><?php echo get_field('kwm_email', 'option'); ?></a></p>
					</div>

				</div><!-- END OF region DIV -->
			</div><!-- END OF span6 DIV -->
			<div class="span6">
				<div class="region region-sw">
					<div class="badge">
						<p>KSW</p>
					</div><!-- END OF badge DIV -->

					<div class="regionContent">
						<h3>Krunch South West</h3>
						<?php echo get_field('ksw_address', 'option'); ?>
						<p><?php echo get_field('ksw_phone', 'option'); ?></p>
						<p><a href="mailto:<?php echo get_field('ksw_email', 'option'); ?>"><?php echo get_field('ksw_email', 'option'); ?></a></p>
					</div>

				</div><!-- END OF region DIV -->	
			</div><!-- END OF span6 DIV -->

		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF regions DIV -->

<div class="content contact">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="centered">Key Contacts</h3>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<h4 class="centered"><?php echo get_field('key_contacts_title_left'); ?></h4>
				<div class="keyContacts kwm">
					<?php echo get_field('key_contacts_left_content'); ?>	
				</div><!-- END OF keyContacts DIV -->
				
			</div>
			<div class="span6">
				<h4 class="centered"><?php echo get_field('key_contacts_title_right'); ?></h4>
				<div class="keyContacts ksw">
					<?php echo get_field('key_contacts_right_content'); ?>	
				</div><!-- END OF keyContacts DIV -->
				
			</div>
		</div><!-- END OF row DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF content/contact DIV -->

<?php get_footer(); ?>