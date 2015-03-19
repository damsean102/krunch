<!DOCTYPE html>
<html>
<head>
	<!-- <meta name="viewport" content="width=1170"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="initialize();">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1551679685049385&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	


<div class="wrapper">
	<div class="main">
		

<div class="header <?php if (is_page(4)): echo 'homeHeader'; endif; ?>">

	

	<div class="container">
		<div class="row-fluid">
			<div class="span3">
				<a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" class="logo"></a>

				<div class="responsiveMenuIcons">
					<ul class="inline">
						<li class="respMenu <?php if (is_page(4)): echo "respMenuHome"; endif; ?>"><p><a href="#">&#9776;</a></p></li>
					</ul>
				</div>
			</div>
			<div class="span9">
				
				<div class="socialIcons">

					<div class="searchFormHeader hide">
						<?php get_search_form(); ?>	
					</div><!-- END OF searchFormHeader DIV -->

				<?php

					if (get_top_parent_id() == 10):
						$facebookUrl = get_field('facebook_url_wm', 'option');
						$twitterUrl = get_field('twitter_url_wm', 'option');
					elseif (get_top_parent_id() == 12):
						$facebookUrl = get_field('facebook_url_sw', 'option');
						$twitterUrl = get_field('twitter_url_sw', 'option');
					endif;

				?>	
					
					<?php if (is_page(4)): ?>
						<ul class="inline">
							<li class="search"><a href="#" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/img/search-white.png"></a></li>
						</ul>
					<?php else: ?>

						<ul class="inline">
							<li class="search"><a href="#" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/img/search.png"></a></li>

							<?php if (get_top_parent_id() == 10 || get_top_parent_id() == 12): ?>

								<?php if ($facebookUrl): ?>
									<li class="fb"><a href="<?php echo $facebookUrl; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/img/fb.png"></a></li>
								<?php endif; ?>

								<?php if ($twitterUrl): ?>
									<li class="tw"><a href="<?php echo $twitterUrl; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/img/tw.png"></a></li>
								<?php endif; ?>

							<?php endif; ?>

						</ul>

					<?php endif; ?>

				</div><!-- END OF socialIcons DIV -->

				
				<div class="clearfix"></div>
 
					<?php $navArgs = array(
						'menu' => 'Main Menu',
						'container' => 'div',
						'container_class' => 'menu-main-menu-container',
						'container_id' => '',
						'menu_class' => 'main-menu inline',
						'menu_id' => '',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<div id="respClose">X</div><ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => ''
					);
				
					wp_nav_menu( $navArgs ); ?>

					<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!-- END OF header DIV -->
