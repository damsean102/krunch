<?php get_header(); ?>

<div class="searchResults">
	<div class="container">
		<div class="row-fluid">
			<div class="span8 offset2">
			
				<h1>Search Results: &quot;<?php echo get_search_query(); ?>&quot;</h1>

				<?php if ( have_posts() ) :  // results found?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="searchResult">
							<h2><?php the_title();  ?> <span><?php echo ucwords(get_post_type()); ?></span></h2>
							<p><?php the_excerpt(); ?></p>
							<p> <a href="<?php the_permalink(); ?>" class="button">Read More</a> </p>
						</div><!-- END OF searchResult DIV -->
						
					<?php endwhile; ?>
				<?php else : ?>

					<h1>No Results Found.</h1>

				<?php endif; ?>

			</div>
		</div>
	</div>	
</div>

<?php get_footer(); ?>