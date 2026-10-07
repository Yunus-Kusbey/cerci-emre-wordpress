<?php
/**
 * WooCommerce Integration - Çerci Emre
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove default WooCommerce wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Custom WooCommerce wrappers
 */
function cerci_emre_woocommerce_wrapper_before() {
	echo '<div class="ce-woo-wrap">';
}
add_action( 'woocommerce_before_main_content', 'cerci_emre_woocommerce_wrapper_before' );

function cerci_emre_woocommerce_wrapper_after() {
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'cerci_emre_woocommerce_wrapper_after' );

/**
 * Remove default sidebar from WooCommerce
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Change products per page
 */
function cerci_emre_products_per_page( $cols ) {
	return 12;
}
add_filter( 'loop_shop_per_page', 'cerci_emre_products_per_page' );

/**
 * Change product columns
 */
function cerci_emre_loop_columns() {
	return 4;
}
add_filter( 'loop_shop_columns', 'cerci_emre_loop_columns' );

/**
 * Related products count
 */
function cerci_emre_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'cerci_emre_related_products_args' );

/**
 * Remove default product link open/close
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

/**
 * Remove default product thumbnail, title, price, rating, add to cart from loop
 * (We handle these in our custom content-product.php template)
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

/**
 * Customize breadcrumb
 */
function cerci_emre_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => ' <span style="color:var(--ce-gray);margin:0 8px;">›</span> ',
		'wrap_before' => '<nav class="woocommerce-breadcrumb" style="margin-bottom:var(--ce-space-xl);">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => esc_html__( 'Ana Sayfa', 'cerci-emre' ),
	);
}
add_filter( 'woocommerce_breadcrumb_defaults', 'cerci_emre_woocommerce_breadcrumbs' );

/**
 * Style the add to cart message
 */
function cerci_emre_add_to_cart_message_html( $message, $products ) {
	return $message;
}
add_filter( 'wc_add_to_cart_message_html', 'cerci_emre_add_to_cart_message_html', 10, 2 );

/**
 * Customize ordering dropdown
 */
function cerci_emre_catalog_ordering_class( $args ) {
	$args['class'] = 'ce-select';
	return $args;
}

/**
 * Ensure cart contents update when products are added via AJAX
 */
function cerci_emre_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="ce-header__action-count ce-header__action-count--cart"><?php echo cerci_emre_get_cart_count(); ?></span>
	<?php
	$fragments['.ce-header__action-count--cart'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'cerci_emre_header_add_to_cart_fragment' );

/**
 * Single product gallery thumbnail columns
 */
function cerci_emre_product_thumbnails_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'cerci_emre_product_thumbnails_columns' );

/**
 * WooCommerce result count styling
 */
function cerci_emre_result_count_style() {
	?>
	<style>
		.woocommerce .woocommerce-result-count {
			color: var(--ce-gray);
			font-size: 0.85rem;
		}
		.woocommerce .woocommerce-ordering select {
			background-color: var(--ce-dark);
			color: var(--ce-white);
			border: 1px solid rgba(200, 164, 92, 0.3);
			border-radius: var(--ce-radius-sm);
			padding: 8px 16px;
			font-size: 0.85rem;
			cursor: pointer;
		}
		.woocommerce .woocommerce-ordering select:focus {
			border-color: var(--ce-gold);
			outline: none;
		}
		/* Single product dark theme overrides */
		.ce-single-product .woocommerce-product-gallery {
			background-color: var(--ce-dark);
			border-radius: var(--ce-radius-lg);
			overflow: hidden;
		}
		.ce-single-product .woocommerce-product-gallery__image {
			border-radius: var(--ce-radius-md);
			overflow: hidden;
		}
		.ce-single-product .summary .product_meta {
			color: var(--ce-gray);
			font-size: 0.85rem;
			border-top: 1px solid rgba(200, 164, 92, 0.1);
			padding-top: var(--ce-space-lg);
			margin-top: var(--ce-space-lg);
		}
		.ce-single-product .summary .product_meta span {
			display: block;
			margin-bottom: var(--ce-space-sm);
		}
		.ce-single-product .summary .product_meta a {
			color: var(--ce-gold);
		}
		/* Single Product Gallery on mobile */
		@media (max-width: 768px) {
			.ce-single-product > .wc-product-class > div:first-child,
			#product > div:first-child {
				grid-template-columns: 1fr !important;
			}
		}
	</style>
	<?php
}
add_action( 'wp_head', 'cerci_emre_result_count_style' );

/**
 * Quick Add to Cart Modal HTML
 */
function cerci_emre_quick_add_modal() {
	if ( ! function_exists('is_woocommerce') ) {
		return;
	}
	?>
	<div class="ce-quick-add-modal" id="ce-quick-add-modal">
		<div class="ce-quick-add-modal__overlay" id="ce-quick-add-overlay"></div>
		<div class="ce-quick-add-modal__content">
			<button class="ce-quick-add-modal__close" id="ce-quick-add-close" aria-label="<?php esc_attr_e( 'Kapat', 'cerci-emre' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<line x1="18" y1="6" x2="6" y2="18"></line>
					<line x1="6" y1="6" x2="18" y2="18"></line>
				</svg>
			</button>
			<div class="ce-quick-add-modal__inner" id="ce-quick-add-inner">
				<div class="ce-quick-add-modal__loading">
					<div class="ce-loading__spinner"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'wp_footer', 'cerci_emre_quick_add_modal' );

/**
 * Quick Add AJAX Endpoint
 */
function cerci_emre_load_quick_add_form() {
	check_ajax_referer( 'cerci-emre-nonce', 'security' );

	$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
	if ( ! $product_id ) {
		wp_send_json_error( array( 'message' => 'Geçersiz ürün.' ) );
	}

	$product = wc_get_product( $product_id );
	if ( ! $product ) {
		wp_send_json_error( array( 'message' => 'Ürün bulunamadı.' ) );
	}

	ob_start();
	
	global $post;
	$post = get_post( $product_id );
	setup_postdata( $post );
	
	?>
	<div class="ce-quick-add-product">
		<div class="ce-quick-add-product__image">
			<?php echo $product->get_image( 'woocommerce_single' ); ?>
		</div>
		<div class="ce-quick-add-product__details">
			<h3 class="ce-quick-add-product__title"><?php echo esc_html( $product->get_name() ); ?></h3>
			<div class="ce-quick-add-product__price"><?php echo $product->get_price_html(); ?></div>
			
			<div class="ce-quick-add-product__form">
				<?php woocommerce_template_single_add_to_cart(); ?>
			</div>
		</div>
	</div>
	<?php
	
	wp_reset_postdata();
	
	$html = ob_get_clean();
	wp_send_json_success( array( 'html' => $html ) );
}
add_action( 'wp_ajax_ce_load_quick_add_form', 'cerci_emre_load_quick_add_form' );
add_action( 'wp_ajax_nopriv_ce_load_quick_add_form', 'cerci_emre_load_quick_add_form' );
