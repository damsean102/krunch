<?php get_header(); ?>

<?php get_template_part('blocks/breadcrumbs'); ?>

<div class="content error404">
	<div class="container">
		<div class="row-fluid">
			

			<div class="span8 offset2">
				<h1>404 - Page Not Found</h1>

				<p>We're sorry but the page you are looking for is not here.</p>

				<p>Here are some suggestions to help you get where you need to be:</p>

				<ul>
					<li>Check the URL for mistakes, then hit refresh.</li>
					<li>Go to back to our <a href="<?php echo get_permalink(4); ?>">homepage</a></li>
					<li>If you're still having trouble, please feel free to <a href="<?php echo get_permalink(8); ?>">contact us</a></li>
				</ul>
				
			</div><!-- END OF span8 DIV -->

		</div><!-- END OF row-fluid DIV -->
	</div><!-- END OF container DIV -->
</div><!-- END OF content DIV -->

<?php get_footer(); ?>