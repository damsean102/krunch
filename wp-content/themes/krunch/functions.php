<?php

add_theme_support('menus');
add_theme_support('post-thumbnails'); 



function krunch_scripts() {
	global $wp_query;
	global $post;
	

	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery','//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', '', '', true);
	wp_register_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ5fm2Y0y2bTPI6mgq8vvZKaNQsinMn0U', '', '', true);
	wp_register_script( 'bootstrap', get_bloginfo( 'template_url' ).'/js/bootstrap.min.js', '', '', true);
	wp_register_script( 'unslider', get_bloginfo( 'template_url' ).'/js/unslider.min.js', '', '', true);
	wp_register_script( 'unslider-fade', get_bloginfo( 'template_url' ).'/js/unslider.fade.min.js', '', '', true);
	wp_register_script( 'swipe', get_bloginfo( 'template_url' ).'/js/jquery.event.swipe.min.js', '', '', true);
	wp_register_script( 'mixitup', get_bloginfo( 'template_url' ).'/js/jquery.mixitup.js', '', '', true);
	wp_register_script( 'krunch-js', get_bloginfo( 'template_url' ).'/js/krunch.js', '', '', true);

	
	wp_enqueue_script('jquery');
	wp_enqueue_script('googlemaps');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('unslider');
	//wp_enqueue_script('unslider-fade');
	wp_enqueue_script('swipe');
	wp_enqueue_script('mixitup');

	/* Load the Krunch Script --Keep this Last */
	wp_enqueue_script('krunch-js');
}    
add_action('wp_enqueue_scripts', 'krunch_scripts');


function krunch_styles() {
	

	$style_file_version = filemtime( get_stylesheet_directory().'/css/style.css');


	wp_register_style('bootstrap', get_bloginfo( 'template_url' ).'/css/bootstrap.min.css');
	wp_register_style('bootstrap-responsive', get_bloginfo( 'template_url' ).'/css/bootstrap-responsive.min.css');
	wp_register_style('krunch-css', get_bloginfo( 'template_url' ).'/css/style.min.css',100,$style_file_version);

	

	/* Generic Scripts Used on All Pages */
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('bootstrap-responsive');
	wp_enqueue_style('krunch-css');

}
add_action('wp_enqueue_scripts', 'krunch_styles');



// Register Custom Post Type
function banners_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Banners', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Banners', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Banner:', 'text_domain' ),
		'all_items'           => __( 'All Banners', 'text_domain' ),
		'view_item'           => __( 'View Banner', 'text_domain' ),
		'add_new_item'        => __( 'Add New Banner', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Banner', 'text_domain' ),
		'update_item'         => __( 'Update Banner', 'text_domain' ),
		'search_items'        => __( 'Search Banners', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 21,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'banners', $args );

}

// Hook into the 'init' action
add_action( 'init', 'banners_custom_post_type', 0 );


// Register Custom Post Type
function testimonials_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Testimonials', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'           => __( 'All Testimonials', 'text_domain' ),
		'view_item'           => __( 'View Testimonial', 'text_domain' ),
		'add_new_item'        => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'         => __( 'Update Testimonial', 'text_domain' ),
		'search_items'        => __( 'Search Testimonial', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 22,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonial', $args );

}

// Hook into the 'init' action
add_action( 'init', 'testimonials_custom_post_type', 0 );


// Register Custom Taxonomy
function region_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Regions', 'text_domain' ),
		'all_items'                  => __( 'All Regions', 'text_domain' ),
		'parent_item'                => __( 'Parent Region', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Region:', 'text_domain' ),
		'new_item_name'              => __( 'New Region Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Region', 'text_domain' ),
		'edit_item'                  => __( 'Edit Region', 'text_domain' ),
		'update_item'                => __( 'Update Region', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate regions with commas', 'text_domain' ),
		'search_items'               => __( 'Search Regions', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove regions', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used regions', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'region', array( 'testimonial' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'region_custom_taxonomy', 0 );


//Add first and last classes
function add_first_and_last($output) {
  $output = preg_replace('/class="(\w*\s)?menu-item/', 'class="$1first-menu-item menu-item', $output, 1);
  $pos=strripos($output, 'class="menu-item');
  $len=strlen('class="menu-item');
  $rep='class="last-menu-item menu-item';
  //double-check for a later entry with menu-item later in the
  //class list
  if(strripos($output, ' menu-item ')>$pos){
      $pos=strripos($output, ' menu-item ');
      $len=strlen(' menu-item ');
      $rep=' last-menu-item menu-item ';
  }
  $output = substr_replace($output, $rep, $pos, $len);
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');



add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2);
function check_for_submenu($classes, $item) {
	global $wpdb;
	$has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
	if ($has_children > 0) array_push($classes,'hasChildren'); // add the class dropdown to the current list
	return $classes;
}



function fix_empty_search ($query){
    global $wp_query;
    if (isset($_GET['s']) && empty($_GET['s'])){
        $wp_query->is_search=true;
    }
    return $query;
}
add_action('pre_get_posts','fix_empty_search');


add_filter('body_class','browser_body_class');

function browser_body_class($classes = '') {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari webkit';
	elseif($is_chrome) $classes[] = 'chrome webkit';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

//Pagination Function
function krunch_pagination($pages = '', $range = 3) {

	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
		 	$pages = 1;
		}
     }   

     if(1 != $pages)
     {
		echo "<div class='paged pagination'>";


		if ($paged != 1) {
			?>
			<a href="<?php echo get_pagenum_link($paged - 1); ?>" class="prev">&lt;</a>
			<?php
		}

		for ($i=1; $i <= $pages; $i++)
		{
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}

		if ($paged < $pages) {
			?>
			<a href="<?php echo get_pagenum_link($paged + 1); ?>" class="next">&gt;</a>
		<?php
		}
		echo "</div>\n";

     }

     echo "<div class='clearfix'></div>";
}


//Change the amount of words that the_excerpt returns
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Change [...] to ... at the end of the_excerpt
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function sitemap() {
  global $post;

  $args = array(
    'posts_per_page'  => -1,
    'exclude' => $post->ID, '',
    'title_li'  => '',
    'orderby' => 'menu_order title',
    'order' => 'ASC',
    'post_type' => array('post','page','events'),
    'post_status' => 'publish' 
  );

  $allPages = get_posts( $args );

  $html = "<div class='sitemap'><ul class='unstyled'>";
  foreach ($allPages as $page): 

    $html .= "<li class'pos" . ($xyz++%3) . "'><a href='" . get_permalink($page->ID) . "'>" . get_the_title($page->ID) . "</a></li>";

  endforeach;
  $html .= "</ul></div>";
  
  return $html;

}

add_shortcode('sitemap', 'sitemap');



// function add_query_vars_filter( $vars ){
//   $vars[] = "keywords";
//   $vars[] = "expertname";
//   $vars[] = "postcode";
//   return $vars;
// }
// add_filter( 'query_vars', 'add_query_vars_filter' );




function get_blog_image($size) {


	if ( function_exists('get_field') ) :
		$blogIMGID = get_field('main_blog_image');
	endif;


	if ($blogIMGID):
		$blogIMGSRC = wp_get_attachment_image_src($blogIMGID, $size);

		if ($blogIMGSRC[1] > $blogIMGSRC[2]):
			$imgClass = 'landscape';
		elseif($blogIMGSRC[1] < $blogIMGSRC[2]):
			$imgClass = 'portrait';
		else:
			$imgClass = 'square';
		endif;

		return "<div class='imgWrapper'><img src=" . $blogIMGSRC[0] . " class='" . $imgClass . "'></div>";

	else:
		return "<div class='placeholderWrapper'><img src=" . get_bloginfo('template_url') . "/img/logo.png></div>";
	endif;


}

function is_child_of($post_id) {
	global $post; 
	if(is_page() && ($post->post_parent==$post_id)):
		return true;
	else: 
		return false; 
	endif;
}

function is_ancestor($post_id) {
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;


    if ( in_array($post_id, $ancestors) ) {
        return true;
    } else {
        return false;
    }
}

add_filter( 'body_class', 'add_body_classes' );
function add_body_classes($classes) {
	
	if (is_ancestor(10) || is_child_of(10) || is_page(10)):
		$classes[] = 'child-of-kwm';
	elseif (is_ancestor(12) || is_child_of(12) || is_page(12)):
		$classes[] = 'child-of-ksw';
	endif;

	return $classes;
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
      array(
        'title' => 'Grey Button',
        'block' => 'div',
        'classes' => 'button button-grey'
      ),
      array(
        'title' => 'Sub Heading',
        'inline' => 'span',
        'classes' => 'sub-heading'
      ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
	add_editor_style();
}


function googleMapShortcode($atts, $content = null) 
{
    extract(shortcode_atts(array("type" => 'road', "latitude" => '53.130056', "longitude" => '-1.216414', "zoom" => '10', "message" => '', "height" => '300'), $atts));
     
    $mapType = '';
    if($type == "satellite") 
        $mapType = "SATELLITE";
    else if($type == "terrain")
        $mapType = "TERRAIN";  
    else if($type == "hybrid")
        $mapType = "HYBRID";
    else
        $mapType = "ROADMAP";  
         
    echo '<!-- Google Map -->
        <script type="text/javascript">  
        $(document).ready(function() {
			function initializeGoogleMap() {
     
				var myLatlng = new google.maps.LatLng('.$latitude.','.$longitude.');
				var myOptions = {
					center: myLatlng,  
					zoom: '.$zoom.',
					mapTypeId: google.maps.MapTypeId.'.$mapType.'
				};

				var map = new google.maps.Map(document.getElementById("map"), myOptions);

				var contentString = "'.$message.'";
				var infowindow = new google.maps.InfoWindow({
				  content: contentString
				});

				var pinColor = "e61657";
				var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
					new google.maps.Size(21, 34),
					new google.maps.Point(0,0),
					new google.maps.Point(10, 34)
				);

				var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
					
					new google.maps.Size(40, 37),
					new google.maps.Point(0, 0),
					new google.maps.Point(12, 35)
				);
               
              var marker = new google.maps.Marker({
                  position: myLatlng,
                  icon: pinImage,
                  shadow: pinShadow
              });
               
              google.maps.event.addListener(marker, "click", function() {
                  infowindow.open(map,marker);
              });
               
              //marker.setMap(map);
             
          }
          initializeGoogleMap();
     
        });
        </script>';
     
        return '<div id="map" style="width:100%; height:'.$height.'px;" class="googleMap"></div>';
}

add_shortcode('map', 'googleMapShortcode');


// function cure_wp_amnesia_on_query_string($query_string){

// 		if ( isset( $query_string['post_type'] ) ) {
// 			switch ($query_string['post_type']) {
// 				case 'post':
// 					$query_string['posts_per_page'] = 4;
// 					break;
// 				default:
// 					$query_string['posts_per_page'] = 9;				
// 			}
// 		}
// 		if ( isset( $query_string['s'] ) ){ //case SEARCH
// 			//$query_string['posts_per_page'] = 9;
// 		}

// 	return $query_string;
// }

// add_filter('request', 'cure_wp_amnesia_on_query_string');



?>