<?php

$parents = get_post_ancestors($post->ID);

if($parents):
	$postAncestor = $parents[count($parents)-1];
	$children = wp_list_pages("title_li=&child_of=".$postAncestor."&echo=0&link_before=- &nbsp;");
else:
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&link_before=- &nbsp;");
endif;



if ($post->post_parent)	{
	$ancestors=get_post_ancestors($post->ID);
	$root=count($ancestors)-1;
	$parent = $ancestors[$root];
} else {
	$parent = $post->ID;
}

?>



<?php if ($children): ?>
	<div class="span4">
		<div class="sidebar">
			<ul class="unstyled subnav">
				<?php if ($postAncestor): ?>
					<li class="pageParent pageParentLink">
						<a href="<?php echo get_permalink($postAncestor); ?>">
							<?php echo get_the_title($postAncestor); ?>
						</a>
					</li>
				<?php else: ?>
					<li class="pageParent current_page_item">
						<span><?php echo get_the_title($post->post_parent); ?></span>
					</li>
				<?php endif; ?>
				<?php echo $children; ?>

			</ul>
		</div><!-- END OF sidebar DIV -->
		
		<div class="donateBox">
			<h3>Help us by donating online</h3>
			<a href="<?php echo get_field('donate_url', 'option'); ?>" class="button" target="_blank">Donate</a>
		</div><!-- END OF donateBox DIV -->

		<div class="fbBox">

			<div class="fbTitle">
				<p>Find us on Facebook</p>
			</div>

			<?php if (is_ancestor(12) || is_child_of(12) || is_page(12)): ?>
				<div class="fb-like-box" data-href="<?php echo get_field('facebook_url_sw', 'option'); ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
			<?php else: ?>
				
				<div class="fb-like-box" data-href="<?php echo get_field('facebook_url_wm', 'option'); ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>

			<?php endif; ?>
		</div><!-- END OF fbBox DIV -->


	</div><!-- END OF span4 DIV -->
<?php endif; ?>
