<?php
/**
 * WooCommerce Product Card Template
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
?>

<li <?php wc_product_class( 'ce-product-card', $product ); ?>>
	<div class="ce-product-card__image">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php echo woocommerce_get_product_thumbnail( 'cerci-product-card' ); ?>
			<?php else : ?>
				<div style="width:100%;aspect-ratio:1;display:flex;align-items:center;justify-content:center;background:var(--ce-dark-medium);">
					<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1" opacity="0.4">
						<rect x="3" y="3" width="18" height="18" rx="2"></rect>
						<circle cx="8.5" cy="8.5" r="1.5"></circle>
						<polyline points="21 15 16 10 5 21"></polyline>
					</svg>
				</div>
			<?php endif; ?>
		</a>

		<?php if ( $product->is_on_sale() ) : ?>
			<span class="ce-product-card__badge"><?php esc_html_e( 'İndirim', 'cerci-emre' ); ?></span>
		<?php endif; ?>

		<div class="ce-product-card__actions">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="ce-product-card__action-btn" aria-label="<?php esc_attr_e( 'Hızlı Görüntüle', 'cerci-emre' ); ?>">
				<svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
			</a>
		</div>
	</div>

	<div class="ce-product-card__info">
		<?php
		$categories = get_the_terms( get_the_ID(), 'product_cat' );
		if ( $categories && ! is_wp_error( $categories ) ) :
			$cat = $categories[0];
		?>
			<span class="ce-product-card__category"><?php echo esc_html( $cat->name ); ?></span>
		<?php endif; ?>

		<h3 class="ce-product-card__title">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h3>

		<?php if ( $rating_count = $product->get_rating_count() ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating(), $rating_count ); ?>
		<?php endif; ?>

		<div class="ce-product-card__price">
			<?php echo $product->get_price_html(); ?>
		</div>

		<?php if ( $product->is_in_stock() ) : ?>
			<?php
			echo apply_filters(
				'woocommerce_loop_add_to_cart_link',
				sprintf(
					'<a href="%s" data-quantity="%s" class="%s" %s>%s %s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( 1 ),
					esc_attr( 'ce-product-card__add-to-cart ce-quick-add-btn' ),
					sprintf( 'data-product_id="%s"', esc_attr( $product->get_id() ) ),
					'<svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>',
					esc_html__( 'Sepete Ekle', 'cerci-emre' )
				),
				$product
			);
			?>
		<?php else : ?>
			<span class="ce-product-card__add-to-cart" style="opacity:0.5;cursor:not-allowed;">
				<?php esc_html_e( 'Stokta Yok', 'cerci-emre' ); ?>
			</span>
		<?php endif; ?>
	</div>
</li>
