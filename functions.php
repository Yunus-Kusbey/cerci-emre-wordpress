<?php
/**
 * Çerci Emre - Theme Functions
 *
 * @package CerciEmre
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

define('CERCI_EMRE_VERSION', '1.0.0');
define('CERCI_EMRE_DIR', get_template_directory());
define('CERCI_EMRE_URI', get_template_directory_uri());

/*------------------------------------*\
	Theme Setup
\*------------------------------------*/

if (!function_exists('cerci_emre_setup')) {
	function cerci_emre_setup()
	{

		// Translation support
		load_theme_textdomain('cerci-emre', CERCI_EMRE_DIR . '/languages');

		// Theme supports
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo', array(
			'height' => 80,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		add_theme_support('customize-selective-refresh-widgets');
		add_theme_support('align-wide');
		add_theme_support('editor-styles');
		add_theme_support('custom-background', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		));

		// WooCommerce Support
		add_theme_support('woocommerce', array(
			'thumbnail_image_width' => 400,
			'single_image_width' => 600,
			'product_grid' => array(
				'default_rows' => 4,
				'min_rows' => 1,
				'max_rows' => 100,
				'default_columns' => 4,
				'min_columns' => 2,
				'max_columns' => 4,
			),
		));
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');

		// Image sizes
		add_image_size('cerci-hero', 1920, 1080, true);
		add_image_size('cerci-category', 300, 300, true);
		add_image_size('cerci-product-card', 500, 500, true);
		add_image_size('cerci-blog-thumb', 600, 400, true);

		// Content width
		if (!isset($content_width)) {
			$GLOBALS['content_width'] = 1320;
		}

		// Register menus
		register_nav_menus(array(
			'primary-left' => esc_html__('Ana Menü (Sol)', 'cerci-emre'),
			'primary-right' => esc_html__('Ana Menü (Sağ)', 'cerci-emre'),
			'mobile' => esc_html__('Mobil Menü', 'cerci-emre'),
			'profile' => esc_html__('Profil Menüsü', 'cerci-emre'),
			'footer' => esc_html__('Footer Menü', 'cerci-emre'),
		));
	}
}
add_action('after_setup_theme', 'cerci_emre_setup');

/*------------------------------------*\
	Scripts & Styles
\*------------------------------------*/

if (!function_exists('cerci_emre_scripts')) {
	function cerci_emre_scripts()
	{

		// Google Fonts
		wp_enqueue_style(
			'cerci-emre-fonts',
			'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700;800;900&display=swap',
			array(),
			null
		);

		// Main stylesheet
		wp_enqueue_style(
			'cerci-emre-style',
			get_stylesheet_uri(),
			array(),
			filemtime(get_stylesheet_directory() . '/style.css')
		);

		// WooCommerce styles
		if (class_exists('WooCommerce')) {
			wp_enqueue_style(
				'cerci-emre-woocommerce',
				CERCI_EMRE_URI . '/assets/css/woocommerce.css',
				array('cerci-emre-style'),
				CERCI_EMRE_VERSION
			);
		}

		// Main JavaScript
		wp_enqueue_script(
			'cerci-emre-main',
			CERCI_EMRE_URI . '/assets/js/main.js',
			array('jquery'),
			CERCI_EMRE_VERSION,
			true
		);

		// WooCommerce JavaScript
		if (class_exists('WooCommerce')) {
			wp_enqueue_script(
				'cerci-emre-woocommerce',
				CERCI_EMRE_URI . '/assets/js/woocommerce.js',
				array('jquery'),
				CERCI_EMRE_VERSION,
				true
			);

			wp_localize_script('cerci-emre-woocommerce', 'cerciEmreWoo', array(
				'ajaxUrl' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('cerci-emre-nonce'),
				'cartUrl' => wc_get_cart_url(),
				'shopUrl' => wc_get_page_permalink('shop'),
			));
		}

		// Localize main script
		wp_localize_script('cerci-emre-main', 'cerciEmre', array(
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'siteUrl' => home_url('/'),
		));

		// Comment reply script
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'cerci_emre_scripts');

/*------------------------------------*\
	Widgets
\*------------------------------------*/

if (!function_exists('cerci_emre_widgets_init')) {
	function cerci_emre_widgets_init()
	{

		register_sidebar(array(
			'name' => esc_html__('Blog Sidebar', 'cerci-emre'),
			'id' => 'sidebar-blog',
			'description' => esc_html__('Blog sayfası widget alanı', 'cerci-emre'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));

		register_sidebar(array(
			'name' => esc_html__('Mağaza Sidebar', 'cerci-emre'),
			'id' => 'sidebar-shop',
			'description' => esc_html__('Mağaza sayfası widget alanı', 'cerci-emre'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Widget 1', 'cerci-emre'),
			'id' => 'footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="ce-footer__title">',
			'after_title' => '</h4>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Widget 2', 'cerci-emre'),
			'id' => 'footer-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="ce-footer__title">',
			'after_title' => '</h4>',
		));
	}
}
add_action('widgets_init', 'cerci_emre_widgets_init');

/*------------------------------------*\
	Custom Walker Nav Menu
\*------------------------------------*/

class Cerci_Emre_Nav_Walker extends Walker_Nav_Menu
{

	public function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'ce-nav__item';

		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= $indent . '<li' . $class_names . '>';

		$atts = array();
		$atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = !empty($item->target) ? $item->target : '';
		$atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
		$atts['href'] = !empty($item->url) ? $item->url : '';
		$atts['class'] = 'ce-nav__link';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters('the_title', $item->title, $item->ID);

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

/*------------------------------------*\
	Helper Functions
\*------------------------------------*/

/**
 * Check if WooCommerce is active
 */
function cerci_emre_is_woocommerce()
{
	return class_exists('WooCommerce');
}

/**
 * Get cart count
 */
function cerci_emre_get_cart_count()
{
	if (cerci_emre_is_woocommerce() && WC()->cart) {
		return WC()->cart->get_cart_contents_count();
	}
	return 0;
}

/**
 * Custom excerpt length
 */
function cerci_emre_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'cerci_emre_excerpt_length');

/**
 * Custom excerpt more
 */
function cerci_emre_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'cerci_emre_excerpt_more');

/**
 * Add body classes
 */
function cerci_emre_body_classes($classes)
{
	$classes[] = 'cerci-emre';

	if (is_front_page()) {
		$classes[] = 'ce-front-page';
	}

	if (cerci_emre_is_woocommerce()) {
		$classes[] = 'ce-woocommerce';
	}

	return $classes;
}
add_filter('body_class', 'cerci_emre_body_classes');

/**
 * AJAX Cart fragment update
 */
function cerci_emre_cart_count_fragment($fragments)
{
	$fragments['.ce-header__action-count--cart'] = '<span class="ce-header__action-count ce-header__action-count--cart">' . cerci_emre_get_cart_count() . '</span>';
	return $fragments;
}
if (cerci_emre_is_woocommerce()) {
	add_filter('woocommerce_add_to_cart_fragments', 'cerci_emre_cart_count_fragment');
}

/*------------------------------------*\
	Include Files
\*------------------------------------*/

// Customizer
require_once CERCI_EMRE_DIR . '/inc/customizer.php';

// WooCommerce integration
if (cerci_emre_is_woocommerce()) {
	require_once CERCI_EMRE_DIR . '/inc/woocommerce.php';
}

// Widgets
require_once CERCI_EMRE_DIR . '/inc/widgets.php';

/*------------------------------------*\
	Elementor Support
\*------------------------------------*/

/**
 * Add Elementor support to theme
 */
function cerci_emre_elementor_support()
{
	// Register Elementor support
	add_theme_support('elementor');

	// Register Elementor locations
	if (did_action('elementor/loaded')) {
		// Allow Elementor on all post types
		$cpt_support = get_option('elementor_cpt_support', array('page', 'post'));
		if (!in_array('product', $cpt_support)) {
			$cpt_support[] = 'product';
			update_option('elementor_cpt_support', $cpt_support);
		}

		// Set Elementor default settings
		update_option('elementor_disable_color_schemes', 'yes');
		update_option('elementor_disable_typography_schemes', 'yes');
	}
}
add_action('after_setup_theme', 'cerci_emre_elementor_support', 99);

/**
 * Register Elementor Theme Locations
 */
function cerci_emre_elementor_register_locations($elementor_theme_manager)
{
	$elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'cerci_emre_elementor_register_locations');

/**
 * Enqueue theme styles in Elementor editor
 */
function cerci_emre_elementor_editor_styles()
{
	wp_enqueue_style(
		'cerci-emre-editor',
		get_stylesheet_uri(),
		array(),
		CERCI_EMRE_VERSION
	);
	wp_enqueue_style(
		'cerci-emre-fonts-editor',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700;800;900&display=swap',
		array(),
		null
	);
}
add_action('elementor/editor/after_enqueue_styles', 'cerci_emre_elementor_editor_styles');

/**
 * Add Elementor widget categories
 */
function cerci_emre_elementor_widget_categories($elements_manager)
{
	$elements_manager->add_category(
		'cerci-emre',
		array(
			'title' => esc_html__('Çerci Emre', 'cerci-emre'),
			'icon' => 'fa fa-plug',
		)
	);
}
add_action('elementor/elements/categories_registered', 'cerci_emre_elementor_widget_categories');

/**
 * Output Dynamic Customizer CSS
 */
function cerci_emre_customizer_css() {
	$gold_color   = get_theme_mod( 'cerci_global_gold_color', '#c8a45c' );
	$text_color   = get_theme_mod( 'cerci_global_text_color', '#111827' );
	$footer_bg    = get_theme_mod( 'cerci_footer_bg_color', '#111827' );
	
	// Create dynamic style block overriding CSS custom properties (variables)
	$css = ":root {";
	
	if ( ! empty( $gold_color ) ) {
		$css .= "--ce-gold: " . esc_attr( $gold_color ) . ";";
	}
	if ( ! empty( $text_color ) ) {
		$css .= "--ce-white: " . esc_attr( $text_color ) . ";";
	}
	
	$css .= "}";
	
	// Specific footer override
	if ( ! empty( $footer_bg ) ) {
		$css .= ".ce-footer { background-color: " . esc_attr( $footer_bg ) . " !important; }";
	}

	echo '<style type="text/css" id="cerci-emre-customizer-css">' . $css . '</style>';
}
add_action( 'wp_head', 'cerci_emre_customizer_css', 100 );
