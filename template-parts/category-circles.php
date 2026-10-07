<?php
/**
 * Category Circles Template Part
 *
 * @package CerciEmre
 */

if (!defined('ABSPATH')) {
	exit;
}

// Default categories matching the design
$default_categories = array(
	array(
		'name' => 'Bal',
		'slug' => 'bal',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 14c0-2.2 1.8-4 4-4s4 1.8 4 4"/></svg>',
	),
	array(
		'name' => 'Tereyağı',
		'slug' => 'tereyagi',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><rect x="3" y="8" width="18" height="10" rx="2"/><path d="M7 8V6a5 5 0 0 1 10 0v2"/></svg>',
	),
	array(
		'name' => 'Zeytinyağı',
		'slug' => 'zeytinyagi',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><path d="M8 2v4l-3 10a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4L16 6V2"/><line x1="8" y1="2" x2="16" y2="2"/></svg>',
	),
	array(
		'name' => 'Pekmez',
		'slug' => 'pekmez',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><path d="M8 2h8v3H8z"/><path d="M6 5h12v2l-1 13a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L6 7V5z"/></svg>',
	),
	array(
		'name' => 'Helva',
		'slug' => 'helva',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><rect x="4" y="8" width="16" height="12" rx="2"/><path d="M4 14h16"/></svg>',
	),
	array(
		'name' => 'Zeytin',
		'slug' => 'zeytin',
		'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1.5"><ellipse cx="12" cy="14" rx="6" ry="7"/><path d="M12 2c0 3-2 5-2 7"/><path d="M10 4c2-1 5 0 6 2"/></svg>',
	),
);

// Try to get WooCommerce product categories
$woo_categories = array();
if (cerci_emre_is_woocommerce()) {
	$product_categories = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'number' => 0, // 0 means no limit (show all)
		'orderby' => 'menu_order',
		'order' => 'ASC',
	));

	if (!is_wp_error($product_categories) && !empty($product_categories)) {
		$woo_categories = $product_categories;
	}
}
?>

<section class="ce-categories" id="ce-categories">
	<div class="ce-container">
		<div class="ce-categories__grid">
			<?php if (!empty($woo_categories)): ?>
				<?php foreach ($woo_categories as $cat):
					$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
					$image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';
					$is_active = (is_product_category() && get_queried_object_id() === $cat->term_id) ? ' active' : '';
					?>
					<a href="<?php echo esc_url(get_term_link($cat)); ?>"
						class="ce-category-item ce-animate<?php echo $is_active; ?>">
						<div class="ce-category-item__image">
							<?php if ($image_url): ?>
								<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($cat->name); ?>">
							<?php else: ?>
								<div
									style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:var(--ce-dark-medium);">
									<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)"
										stroke-width="1.2" opacity="0.6">
										<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
										<circle cx="8.5" cy="8.5" r="1.5"></circle>
										<polyline points="21 15 16 10 5 21"></polyline>
									</svg>
								</div>
							<?php endif; ?>
						</div>
						<span class="ce-category-item__name"><?php echo esc_html($cat->name); ?></span>
					</a>
				<?php endforeach; ?>
			<?php else: ?>
				<?php foreach ($default_categories as $cat): ?>
					<a href="<?php echo cerci_emre_is_woocommerce() ? esc_url(home_url('/product-category/' . $cat['slug'] . '/')) : '#'; ?>"
						class="ce-category-item ce-animate">
						<div class="ce-category-item__image">
							<div
								style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, var(--ce-dark-medium), var(--ce-dark-light));">
								<?php echo $cat['icon']; ?>
							</div>
						</div>
						<span class="ce-category-item__name"><?php echo esc_html($cat['name']); ?></span>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>