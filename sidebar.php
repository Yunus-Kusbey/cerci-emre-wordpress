<?php
/**
 * Sidebar Template
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<aside class="ce-sidebar" role="complementary">
	<?php
	if ( cerci_emre_is_woocommerce() && ( is_shop() || is_product_category() || is_product_tag() ) ) {
		dynamic_sidebar( 'sidebar-shop' );
	} else {
		dynamic_sidebar( 'sidebar-blog' );
	}
	?>
</aside>
