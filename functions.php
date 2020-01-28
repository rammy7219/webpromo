<?php
/**
 * WebPromo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WebPromo
 */

if ( ! function_exists( 'webpromo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webpromo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WebPromo, use a find and replace
		 * to change 'webpromo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webpromo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Post Formats

		add_theme_support('post-formats', array('aside', 'gallery'));

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
			'primary' => esc_html__( 'Primary', 'webpromo' ),
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
		add_theme_support( 'custom-background', apply_filters( 'webpromo_custom_background_args', array(
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
add_action( 'after_setup_theme', 'webpromo_setup' );

function webpromo_add_editor_style(){
	add_editor_style('dist/css/editor-style.css');
}
add_action('admin_init', 'webpromo_add_editor_style');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webpromo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'webpromo_content_width', 1140 );
}
add_action( 'after_setup_theme', 'webpromo_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function webpromo_scripts() {
	wp_enqueue_style( 'webpromo_bs-css', get_template_directory_uri() . '/dist/css/bootstrap.min.css');

	wp_enqueue_style('webpromo_font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	wp_enqueue_style( 'webpromo-style', get_stylesheet_uri() );

	wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', false, '', true);

	wp_enqueue_script('popper');

	wp_enqueue_script( 'webpromo_tether', get_template_directory_uri() . '/src/js/tether.min.js', array(), '20170115', true );

	wp_enqueue_script( 'webpromo_bootstrap', get_template_directory_uri() . '/src/js/bootstrap.min.js', array( 'jquery'), '20170915', true );

	wp_enqueue_script( 'webpromo_bootstrap_hover', get_template_directory_uri() . '/src/js/bootstrap-hover.js', array( 'jquery'), '20170115', true );

	wp_enqueue_script( 'webpromo-nav-scroll', get_template_directory_uri() . '/src/js/nav-scroll.js', array( 'jquery'), '20170115', true );

	wp_enqueue_script( 'webpromo-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webpromo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets File.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Bootstrap Navwalker File.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Side bar widget.
 */
function webpromo_init_widget($id){
	register_sidebar(array(
	  'name'  => 'Sidebar',
	  'id'    => 'sidebar',
	  'before_widget' => '<div class="sidebar-module">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4>',
	  'after_title'   => '</h4>'
	));
  
	register_sidebar(array(
	  'name'  => 'Box1',
	  'id'    => 'box1',
	  'before_widget' => '<div class="box">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
	));
  
	register_sidebar(array(
	  'name'  => 'Box2',
	  'id'    => 'box2',
	  'before_widget' => '<div class="box">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
	));
  
	register_sidebar(array(
	  'name'  => 'Box3',
	  'id'    => 'box3',
	  'before_widget' => '<div class="box">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
	));
  }
  
  add_action('widgets_init', 'webpromo_init_widget');

  /**
 * Change WordPress Logo on Signup Page
 */

function my_login_logo_one() { 
	?> 
	<style type="text/css"> 
		body.login{
			background: #fff;
		}
		body.login div#login h1 a {
		background-image: url('http://localhost:8000/web2dezine/wp-content/uploads/2019/07/w2d_logos_small.png');  //Add your own logo image in this url 
		padding-bottom: 30px; 
	} 
	</style>
	 <?php 
	} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

	function custom_link_to_logo() {
		//code to attach url to our logo
		return "http://web2dezine.com";
	}

	add_filter("login_headerurl", "custom_link_to_logo");