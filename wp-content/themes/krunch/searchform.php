<form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s">Search:</label>
		<input type="text" placeholder="Search..." value="<?php get_search_query(); ?>" name="s" id="s" />
		<input type="submit" class="button" id="searchsubmit" value="Search" />
	</div>
</form>