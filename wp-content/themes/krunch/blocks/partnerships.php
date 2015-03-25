
<?php if( have_rows('partnerships') ):
$i = 0;
?>

	<div class="row-fluid">

		<?php while ( have_rows('partnerships') ) : the_row();

				$logoID = get_sub_field('partner_logo');
				$logoSRC = wp_get_attachment_image_src( $logoID, 'medium');
				$link = get_sub_field('partner_link');

				if ($i == 3): echo "</div><!-- END OF row-fluid DIV --><div class='row-fluid'>"; $i=0; endif;
			?>

				<div class="span4">
					<div class="partner">
						<?php if ($link): ?><a href="<?php echo $link ?>" target="_blank"><?php endif; ?>
							<?php if ($logoSRC): ?><img src="<?php echo $logoSRC[0]; ?>"><?php endif; ?>
						<?php if ($link): ?></a><?php endif; ?>	
					</div><!-- END OF partner DIV -->
				</div><!-- END OF span4 DIV -->

				<?php $i++; ?>

		<?php endwhile; ?>

	</div><!-- END OF row-fluid DIV -->

<?php endif; ?>