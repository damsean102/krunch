<?php
//Template Name: Regional Contact Page
?>

<?php get_header(); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>

<div class="content regional-contact contact">
	<div class="container">
		<div class="row-fluid">

			<div class="span6">
				<h1><?php the_title(); ?></h1>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no content has been found'); ?></p>
				<?php endif; ?>
			</div>


			<div class="span6">
				<?php 
					$form = get_field('select_a_form');
					gravity_form_enqueue_scripts($form->id, true);
					gravity_form($form->id, false, true, false, '', true, 1); 
				?>
			</div>
				
		</div>

	</div><!-- END OF container DIV -->
</div><!-- END OF content DIV -->

<?php get_template_part('blocks/maps'); ?>

<div class="content contact">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="centered">Key Contacts</h3>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset3">
				<div class="keyContacts">
					<?php echo get_field('key_contacts_content'); ?>	
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>