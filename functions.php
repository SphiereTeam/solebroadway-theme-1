<?php
/**
 * Solebroadway Theme 1 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Solebroadway_Theme_1
 */

if ( ! function_exists( 'solebroadway_theme_1_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function solebroadway_theme_1_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Solebroadway Theme 1, use a find and replace
	 * to change 'solebroadway-theme-1' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'solebroadway-theme-1', get_template_directory() . '/languages' );

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
		'menu-under-header' => esc_html__( 'Menu Under Header', 'solebroadway-theme-1' ),
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
	add_theme_support( 'custom-background', apply_filters( 'solebroadway_theme_1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'solebroadway_theme_1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function solebroadway_theme_1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'solebroadway_theme_1_content_width', 640 );
}
add_action( 'after_setup_theme', 'solebroadway_theme_1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function solebroadway_theme_1_widgets_init() {

	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'shop-filter-sidebar' );
	unregister_sidebar( 'home-slider-sidebar' );

	//shop filter sidebar
	$args_shop_filter_sidebar = array(
		'id'			=> 'shop-filter-sidebar',
		'name'			=> __( 'Shop Filter Sidebar', 'solebroadway_theme_1' ),
		'description'	=> __( 
								'Widgets here shows up either on the left side or on top of the shop page.',
								'solebroadway_theme_1' 
							),
		'before_title'	=> '<p class="widget-title">',
		'after_title'	=> '</p>',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	);
	register_sidebar( $args_shop_filter_sidebar );

    //home page slider sidebar
	$args_slider_sidebar = array(
		'id'			=> 'home-slider-sidebar',
		'name'			=> __( 'Home Slider Sidebar', 'solebroadway_theme_1' ),
		'description'	=> __( 'Widgets here shows up on the home page under categories section.', 'solebroadway_theme_1' ),
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
		'before_widget'	=> '<section id="%1$s" class="home-slider-sidebar widget %2$s">',
		'after_widget'	=> '</section>',
	);
	register_sidebar( $args_slider_sidebar );
}
add_action( 'widgets_init', 'solebroadway_theme_1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function solebroadway_theme_1_scripts() {

	//start bootstrap 3.3.7
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.3.7', true );
	//end bootstrap 3.3.7

	//start photoswipe
	if( is_product() ){
		wp_enqueue_style( 'photoswipe-css', get_template_directory_uri() . '/photoswipe/photoswipe.css' );
		wp_enqueue_style( 'photoswipe-ui-css', get_template_directory_uri() . '/photoswipe/default-skin/default-skin.css' );

		wp_enqueue_script( 'photoswipe-js', get_template_directory_uri() . '/photoswipe/photoswipe.min.js', array(), '1.0', true );
		wp_enqueue_script( 'photoswipe-ui-js', get_template_directory_uri() . '/photoswipe/photoswipe-ui-default.min.js', array(), '1.0', true );

		wp_enqueue_script( 'custom-photoswipe-js', get_template_directory_uri() . '/js/photoswipe/custom.photoswipe.js', array(), '1.0', true );
	}
	//end photoswipe

	//style.css
	wp_enqueue_style( 'solebroadway-theme-1-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'solebroadway-theme-1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//skip link
	wp_enqueue_script( 'solebroadway-theme-1-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//start sticky navbar
	wp_enqueue_script( 'jquery-sticky-js', get_template_directory_uri() . '/js/sticky/jquery.sticky.js', array('jquery'), '0.1', true );

	if( is_admin_bar_showing() ){
		if( is_front_page() ){
			wp_enqueue_script( 'custom-sticky-admin-front-js', get_template_directory_uri() . '/js/sticky/custom.sticky.admin.front.js', array('jquery-sticky-js'), '0.1', true );
		}else{
			wp_enqueue_script( 'custom-sticky-admin-js', get_template_directory_uri() . '/js/sticky/custom.sticky.admin.js', array('jquery-sticky-js'), '0.1', true );
		}
	}else{
		if( is_front_page() ){
			wp_enqueue_script( 'custom-sticky-js', get_template_directory_uri() . '/js/sticky/custom.sticky.front.js', array('jquery-sticky-js'), '0.1', true );
		}else{
			wp_enqueue_script( 'custom-sticky-js', get_template_directory_uri() . '/js/sticky/custom.sticky.js', array('jquery-sticky-js'), '0.1', true );
		}
	}
	//end sticky navbar

	//font-awesome
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );

	//start progressjs
	wp_enqueue_style( 'progress-css', get_template_directory_uri() . '/progressjs/progressjs.min.css' );
	wp_enqueue_script( 'progress-js', get_template_directory_uri() . '/progressjs/progress.min.js', array(), false, false );
	wp_enqueue_script( 'progress-start', get_template_directory_uri() . '/progressjs/progress.start.js', array('progress-js'), false, true );
	//end progressjs
}
add_action( 'wp_enqueue_scripts', 'solebroadway_theme_1_scripts' );


/**
 * Enqueue google fonts
 */
function solebroadway_theme_1_google_fonts() {
	$query_args = array(
		'family' => 'Rajdhani:400,600|Source+Sans+Pro:400,400i,700,700i'
	);

	//Lato:400,700|Source+Sans+Pro:400,700
	//Oswald:500,700|Quattrocento:400,700
	//Josefin+Sans:400,700|Playfair+Display:400,400i,700
	//Roboto+Mono:400,400i,700,700i|Rubik:400,700,900
	//Rajdhani:400,600|Source+Sans+Pro:400,400i,700,700i
	
	wp_enqueue_style( 'sf_child_theme_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}           
add_action('wp_enqueue_scripts', 'solebroadway_theme_1_google_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Custom Navigation Walker
 */
require_once('wp-bootstrap-navwalker.php');

/**
 * Setup compatibility with WooCommerce
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'solebroadway_theme_1_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'solebroadway_theme_1_wrapper_end', 10);

function solebroadway_theme_1_wrapper_start() {
  echo '<div class="container-fluid">';
}

function solebroadway_theme_1_wrapper_end() {
  echo '</div>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * Add footer menu.
 */
function solebroadway_theme_1_add_footer_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'solebroadway_theme_1_add_footer_menu' );

/**
 * Modify breadcrumbs html markup
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'solebroadway_theme_1_woocommerce_breadcrumbs' );
function solebroadway_theme_1_woocommerce_breadcrumbs() {
	return array(
			'delimiter'   => ' &#47; ',
			'wrap_before' => '<nav class="breadcrumb" itemprop="breadcrumb">',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		);
}

/**
 * Remove the main breadcrumbs
 */
function solebroadway_theme_1_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'solebroadway_theme_1_remove_wc_breadcrumbs' );
	

/** 
 * Remove the "shop" title on the main shop page.
 */
add_filter( 'woocommerce_show_page_title' , 'solebroadway_theme_1_hide_page_title' );
function solebroadway_theme_1_hide_page_title() {
	
	return false;
	
}

/** 
 * Remove descriptions on archive/category pages.
 */
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

/** 
 * Remove the product rating display on product loops
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/** 
 * Remove add to cart btn on product loops
 */
add_action( 'woocommerce_after_shop_loop_item', 'solebroadway_theme_1_remove_add_to_cart_buttons', 1 );
function solebroadway_theme_1_remove_add_to_cart_buttons() {
	if( is_product_category() || is_shop()) { 
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
}

/**
 * Remove Product Description Title on Single Product Page
 */
add_filter('woocommerce_product_description_heading', 'solebroadway_theme_1_product_description_heading');
function solebroadway_theme_1_product_description_heading() {
	return '';
}

/**
 * Remove Additional Information Title on Single Product Page
 */
add_filter('woocommerce_product_additional_information_heading', 'solebroadway_theme_1_additional_info_heading');
function solebroadway_theme_1_additional_info_heading(){
	return '';
}

/**
 * === start woocommerce_single_product_summary ===
 */

// Remove product title from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Remove product ratings from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// Remove product price from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

//Remove product excerpt from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

//Remove product add to cart from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

//Remove product single meta from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//Remove product single sharing from single product page summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/**
 * === end woocommerce_single_product_summary ===
 */

/**
 * Remove description, reviews from product tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['description'] );
	unset( $tabs['reviews'] );
	return $tabs;
}

/**
 * Modify add to cart messages
 */
add_filter( 'wc_add_to_cart_message', 'solebroadway_theme_1_add_to_cart_message', 10, 2 );
function solebroadway_theme_1_add_to_cart_message( $message, $product_id ) {
	$to_cart = esc_url( wc_get_page_permalink( 'cart' ) );
	$to_shop = esc_url( wc_get_page_permalink( 'shop' ) );
    $message = sprintf(
    			'<p>%s</p><div class="add-to-cart-btns"><a href="%s" class="button wc-forwards">%s</a><a href="%s" class="button wc-forwards">%s</a></div>', 
    			__( get_the_title($product_id) . ' added to your cart.', 'woocommerce'),
    			$to_cart,
    			__('Cart', 'woocommerce'),
				$to_shop,
				__('Shop', 'woocommerce')
			);
    return $message; 
}

/**
 * Modify checkout login message
 */ 
function solebroadway_theme_1_woocommerce_checkout_login_message( $var ) {
	$var = "<p>" . __( 'Returning customer?', 'woocommerce' ) . "</p>";
    return $var; 
}; 
add_filter( 'woocommerce_checkout_login_message', 'solebroadway_theme_1_woocommerce_checkout_login_message', 10, 1 ); 

/**
 * Modify checkout coupon message
 */
function solebroadway_theme_1_woocommerce_checkout_coupon_message( $var ) {

	$var1 = "<p>" . __( 'Have a coupon?', 'woocommerce' ) . "</p>";
	$var2 = "<a href='#' class='showcoupon'>" . __( 'Enter your code', 'woocommerce' ) . "</a>";
    return $var1 . $var2; 
}; 
add_filter( 'woocommerce_checkout_coupon_message', 'solebroadway_theme_1_woocommerce_checkout_coupon_message', 10, 1 ); 

/**
 * Modify the number of related products displayed
 */
add_filter( 'woocommerce_output_related_products_args', 'solebroadway_theme_1_related_products_args' );
  function solebroadway_theme_1_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 4; // arranged in 4 columns
	return $args;
}

/**
 * Modify the number of product upsells
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'solebroadway_theme_1_output_upsells', 15 );

if ( ! function_exists( 'solebroadway_theme_1_output_upsells' ) ) {
	function solebroadway_theme_1_output_upsells() {
	    woocommerce_upsell_display( 1,1 ); // Display 1 products in rows of 1
	}
}

/**
 * Limit search to products only
 */
function solebroadway_theme_1_search( $query ){
	if( $query->is_search() && !is_admin() ){
		$query->set( 'post_type', array('product') );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'solebroadway_theme_1_search' );


