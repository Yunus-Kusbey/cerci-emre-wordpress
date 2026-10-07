<?php
/**
 * Widgets - Çerci Emre
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Widget functionality is handled in functions.php via cerci_emre_widgets_init()
// This file is reserved for custom widget classes if needed in future

/**
 * Custom WooCommerce widget styles
 */
function cerci_emre_widget_styles() {
	if ( ! is_admin() ) {
		?>
		<style>
			/* Widget: Product Categories */
			.widget_product_categories ul li {
				padding: 8px 0;
				border-bottom: 1px solid rgba(200, 164, 92, 0.1);
			}
			.widget_product_categories ul li:last-child {
				border-bottom: none;
			}
			.widget_product_categories ul li a {
				color: var(--ce-gray-light);
				font-size: 0.9rem;
				transition: all 0.3s;
			}
			.widget_product_categories ul li a:hover {
				color: var(--ce-gold);
				padding-left: 8px;
			}
			.widget_product_categories ul li .count {
				color: var(--ce-gray);
				font-size: 0.8rem;
			}

			/* Widget: Price Filter */
			.widget_price_filter .price_slider_wrapper {
				padding-top: 16px;
			}
			.widget_price_filter .price_slider_amount {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-top: 16px;
			}
			.widget_price_filter .price_slider_amount .price_label {
				color: var(--ce-gray-light);
				font-size: 0.9rem;
			}
			.widget_price_filter .price_slider_amount .price_label span {
				color: var(--ce-gold);
				font-weight: 600;
			}

			/* Widget: Search */
			.widget_search .search-form {
				display: flex;
			}
			.widget_search .search-field {
				flex: 1;
				background-color: var(--ce-dark-medium);
				color: var(--ce-white);
				border: 1px solid rgba(200, 164, 92, 0.2);
				border-right: none;
				border-radius: var(--ce-radius-sm) 0 0 var(--ce-radius-sm);
				padding: 10px 14px;
				font-size: 0.9rem;
			}
			.widget_search .search-field:focus {
				border-color: var(--ce-gold);
				outline: none;
			}
			.widget_search .search-submit {
				background-color: var(--ce-gold);
				color: var(--ce-black);
				border: 1px solid var(--ce-gold);
				border-radius: 0 var(--ce-radius-sm) var(--ce-radius-sm) 0;
				padding: 10px 16px;
				font-weight: 600;
				cursor: pointer;
				transition: all 0.3s;
			}
			.widget_search .search-submit:hover {
				background-color: var(--ce-gold-light);
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'cerci_emre_widget_styles' );
