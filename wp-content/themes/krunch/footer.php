		<div class="clearfix"></div>
	</div><!-- END OF main DIV -->
</div><!-- END OF wrapper DIV -->



<div class="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
				<img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" class="logo">
				<p class="footerDetails">Krunch UK, registered charity number 1114961, is a company limited by guarantee registered in England and Wales under number 5364024 having its registered office at Sandwell Christian Centre, Langley Crescent, Oldbury, West Midlands B68 8RE.</p>
			</div>
			
		<?php if (get_top_parent_id() !== 12): ?>
			<div class="span3 offset2 tablet-span6">
				<div class="contactDetails kwm">
					<h3>Krunch West Midlands</h3>
					<?php echo get_field('kwm_address', 'option'); ?>
					<p><?php echo get_field('kwm_phone', 'option'); ?></p>
					<p><a href="mailto:<?php echo get_field('kwm_email', 'option'); ?>"><?php echo get_field('kwm_email', 'option'); ?></a></p>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if (get_top_parent_id() !== 10): ?>
			<div class="span3 tablet-span6">
				<div class="contactDetails ksw">
					<h3>Krunch South West</h3>
					<?php echo get_field('ksw_address', 'option'); ?>
					<p><?php echo get_field('ksw_phone', 'option'); ?></p>
					<p><a href="mailto:<?php echo get_field('ksw_email', 'option'); ?>"><?php echo get_field('ksw_email', 'option'); ?></a></p>
				</div>
			</div>
		<?php endif; ?>

		</div><!-- END OF row DIV -->

		<div class="row-fluid">
			<div class="span6">
				<p class="copyright">&copy; Copyright <?php echo date("Y"); ?> All Content Krunch UK</p>
			</div>
			<div class="span6">
				<?php
					$args = array(
						'theme_location' => '',
						'menu' => 'Main Menu',
						'container' => 'div',
						'container_class' => 'menu-footer-container',
						'container_id' => '',
						'menu_class' => 'menu-footer inline',
						'menu_id' => '',
						'echo' => true,
						'before' => '',
						'after' => '<span>|</span>',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => ''
					);
				
					wp_nav_menu( $args ); ?>
			</div>
		</div>
	</div><!-- END OF container DIV -->
</div><!-- END OF footer DIV -->


<?php if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '192.168.0.140'): ?>

	<!--Loads in the Grunt Task Live Reloads Script for Development Only -->
	<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>:8080/livereload.js"></script>
	
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>