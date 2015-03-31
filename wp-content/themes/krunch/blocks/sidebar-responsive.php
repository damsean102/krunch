<?php

$currentPage = $post->ID;

$topParent = get_top_parent_id();

$args = array(
		'child_of'     => $topParent,
		'sort_order'   => 'ASC',
		'sort_column'  => 'menu_order',
		'hierarchical' => '',
		//'exclude'      => $currentPage,
		'include'      => '',
		'meta_key'     => '',
		'meta_value'   => '',
		'authors'      => '',
		'exclude_tree' => '',
		'post_type' => 'page'
);

?>


<div class="span4 ">
	<div class="responsiveSubMenu">
		<form action="<?php bloginfo('url'); ?>" method="get">
			 <?php $subPages = get_pages($args);

			if ($subPages): ?>
				<select id="mobileSubNav" name="subpages">

					<option selected >Select a page</option>
					<option value="<?php echo get_permalink($topParent); ?>"><?php echo get_the_title($topParent); ?></option>
					
		
					<?php 
					foreach ($subPages as $post): setup_postdata();
						$ancestorCount = get_post_ancestors($post);
					?>

						<option value="<?php echo get_permalink(); ?>"><?php if (count($ancestorCount) >= 2): echo "-- "; else: echo "- "; endif; ?><?php echo get_the_title(); ?></option>

				<?php 
					endforeach;
					wp_reset_postdata();
				?>
				</select>
			<?php endif; ?>

			<noscript>
				<input type="submit" name="submit" value="Go" />
			 </noscript>

		</form>	
	</div>	
</div>