<?php
/**
 * fdg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fdg
 */

if ( ! function_exists( 'fdg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fdg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fdg, use a find and replace
		 * to change 'fdg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fdg', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fdg' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fdg_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fdg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fdg_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fdg_content_width', 640 );
}
add_action( 'after_setup_theme', 'fdg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fdg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fdg' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fdg' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fdg_widgets_init' );

function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fdg_scripts() {
	wp_enqueue_style('gallery', get_template_directory_uri() . '/css/lightgallery.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/all.min.css');

	wp_enqueue_style( 'fdg-style', get_stylesheet_uri() );
	
	
	wp_enqueue_script( 'fdg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'jqueryMin', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '201805072', true );
	wp_enqueue_script( 'jqueryMigrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.0.js', array('jquery'), '201805072', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), '20180507', true );
	wp_enqueue_script( 'gallery', get_template_directory_uri() . '/js/gallery/lightgallery.js', array('jquery'), '20180507', true );
	
	wp_enqueue_script( 'tmax', get_template_directory_uri() . '/js/lib/TweenMax.min.js', array('jquery'), '20180507', true );

	
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20180507', true );


	if ( is_singular() ) {
	}
	if (is_front_page() ) {
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'fdg_scripts' );

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
    }
}



/*	 TUTTI I CUSTOM POST SHOW-TAG*/
function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$post_types = get_post_types();
		$query->set( 'post_type', $post_types );
	return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );




function rudr_custom_html_template($html, $id, $caption, $title, $align, $url, $size, $alt) {
	/*
	$html - default HTML, you can use regular expressions to operate with it
	$id - attachment ID
	$caption - image Caption
	$title - image Title
	$align - image Alignment
	$url - link to media file or to the attachment page (depends on what you selected in media uploader)
	$size - image size (Thumbnail, Medium, Large etc)
	$alt - image Alt Text
	*/
 
	/*
	 * First of all lets operate with image sizes
	 */
	list( $img_src, $width, $height ) = image_downsize($id, $size);
	$hwstring = image_hwstring($width, $height);
 
	/*
 	 * Second thing - get the image URL $image_thumb[0]
	 */
	$image_thumb = wp_get_attachment_image_src( $id, $size );
 
	$out = '<div class="gallery_image">'; // I want to wrap image into this div element
	if($url){ // if user wants to print the link with image
		$out .= '<div class="full-screen" data-src="'. $url . '">';
	}
	$out .= '<img src="'. $image_thumb[0] .'" alt="'.$alt.'" '.$hwstring.'/>';
	if($url){
		$out .= '</div>';
	}
	$out .= '</div>';
	return $out; // the result HTML
}
 
add_filter('image_send_to_editor', 'rudr_custom_html_template', 1, 8);



if( function_exists('acf_add_options_page') ) {
	


	
}




function t5_feed_shortcode( $attrs )
{
    $args = shortcode_atts(
        array (
            'url' => 'http://ec.europa.eu/information_society/newsroom/cf/generaterss.cfm'
        ),
        $attrs
    );

    // a SimplePie instance
    $feed = fetch_feed( $args[ 'url' ] );

    if ( is_wp_error( $feed ) )
        return 'There was an error';

    if ( ! $feed->get_item_quantity() )
        return 'Feed is down.';

    $lis = array();

    foreach ( $feed->get_items(0, 4) as $item )
    {
        if ( '' === $title = esc_attr( strip_tags( $item->get_title() ) ) )
            $title = __( 'Untitled' );

        $lis[] = sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url( strip_tags( $item->get_link() ) ),
            $title
        );
    }

    return '<div class="swiper-container s-rss"><div class="swiper-wrapper"><div class="swiper-slide">' . join( '</div><div class="swiper-slide">', $lis ) . '</div></div></div>';
}

/*

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Name of Widgetized Area',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);*/

function load_js() {
    wp_enqueue_script('jquery');
	  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', 
  	array('jquery'), false, true); 
}
