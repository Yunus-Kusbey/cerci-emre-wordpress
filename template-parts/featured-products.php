<?php
/**
 * Featured Products Template Part
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! cerci_emre_is_woocommerce() ) {
	return;
}

$featured_count = 8; // Artırıldı

// Sadece 'öne çıkan' (featured) ürünleri listele
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => $featured_count,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
		),
	),
);

$products = new WP_Query( $args );

if ( ! $products->have_posts() ) {
	return;
}
?>

<section class="ce-featured ce-section" id="ce-featured">
	<div class="ce-container">
		<div class="ce-section-title">
			<span class="ce-subtitle"><?php esc_html_e( 'Doğal Lezzetler', 'cerci-emre' ); ?></span>
			<h2><?php esc_html_e( 'Öne Çıkan Ürünler', 'cerci-emre' ); ?></h2>
		</div>

		<div class="ce-featured__grid">
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<?php
				global $product;
				if ( ! $product ) continue;
				?>
				<div class="ce-product-card ce-animate">
					<div class="ce-product-card__image">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'cerci-product-card' ); ?>
							<?php else : ?>
								<div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:var(--ce-dark-medium);aspect-ratio:1;">
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
							<button class="ce-product-card__action-btn" aria-label="<?php esc_attr_e( 'Favorilere Ekle', 'cerci-emre' ); ?>">
								<svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
							</button>
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
							<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
							   data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
							   data-quantity="1"
							   class="ce-product-card__add-to-cart ce-quick-add-btn"
							   aria-label="<?php echo esc_attr( sprintf( __( '"%s" sepete ekle', 'cerci-emre' ), $product->get_name() ) ); ?>">
								<svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
								<?php esc_html_e( 'Sepete Ekle', 'cerci-emre' ); ?>
							</a>
						<?php else : ?>
							<span class="ce-product-card__add-to-cart" style="opacity:0.5;cursor:not-allowed;">
								<?php esc_html_e( 'Stokta Yok', 'cerci-emre' ); ?>
							</span>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div style="text-align:center;margin-top:var(--ce-space-3xl);">
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="ce-btn ce-btn-outline">
				<?php esc_html_e( 'Tüm Ürünleri Gör', 'cerci-emre' ); ?>
				<span class="ce-btn-arrow">→</span>
			</a>
		</div>
	</div>
</section>
