<?php
/**
 * sparcwp functions and definitions
 *
 * @package sparcwp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'sparcwp_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function sparcwp_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
		
		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( 'sparcwp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	
    }


	/**
	 * This theme uses wp_nav_menu() in one location.
	*/ 
    register_nav_menus(
            array(
                'primary' => 'Main Menu',
                'footer_menu' => 'Footer Menu'
            )
        );

}
endif; // sparcwp_setup
add_action( 'after_setup_theme', 'sparcwp_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function sparcwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sparcwp' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4 Column', 'sparcwp' ),
		'id'            => 'footer-widgets-four-column',
		'description'   => __( 'Each widget added will be 25% width', 'sparcwp' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s four-column">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Full Width', 'sparcwp' ),
		'id'            => 'footer-widgets-full-width',
		'description'   => __( 'Wrap footer blocks in cols if needed', 'sparcwp' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'sparcwp_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function sparcwp_scripts() {
    
    // load default stylesheet
    wp_enqueue_style( 'sparcwp-default-style', get_stylesheet_uri() );

	// load vendor styles
    wp_enqueue_style( 'sparcwp-vendorcss', get_template_directory_uri() . '/css/vendor.css' );

    // load sparcwp styles
    wp_enqueue_style( 'sparcwp-customcss', get_template_directory_uri() . '/css/sparcwp.css' );

    // load pattern library display styles ONLY on pattern-library template
    if (is_page_template('page-pattern-library.php') ) {
    	wp_enqueue_style( 'sparcwp-patternscss', get_template_directory_uri() . '/css/pattern-library.css' );
    	wp_enqueue_script('sparcwp-patternsjs', get_template_directory_uri().'/js/pattern-lib.js', array('jquery'),'',true );
    }
    // load bootstrap js
    wp_enqueue_script('sparcwp-bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery') );

    // load custom js
    wp_enqueue_script( 'sparcwp-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery') );

    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'sparcwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Customizer additions and removals.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Load pattern library functions.
 */
require get_template_directory() . '/includes/pattern-functions.php';


/**
 * Add custom shortcodes
 */
function sparcshortcode_title( ){
   return get_the_title();
}
add_shortcode( 'page_title', 'sparcshortcode_title' );


function featured_image() {
if (has_post_thumbnail() ) {
    $image_id = get_post_thumbnail_id();  
    $image_url = wp_get_attachment_image_src($image_id,'full');  
    $image_url = $image_url[0]; 
    $result = '<img src="'.$image_url.'" />';
    return $result;
}
return;
}
add_shortcode ('featured-image', 'sparcshortcode_featured-image');

/**
*Remove auto p tags from PAGES ONLY
*/
function sparcwp_wpautop_correction() {	
	if( is_page() ) {		
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );			
	}
}
add_action('pre_get_posts', 'sparcwp_wpautop_correction');
