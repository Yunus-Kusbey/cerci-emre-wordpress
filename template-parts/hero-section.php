<?php
/**
 * Hero Section Template Part
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_pretitle   = get_theme_mod( 'cerci_hero_pretitle', 'DOĞALLIĞIN GERÇEK LEZZETİ' );
$hero_title_1    = get_theme_mod( 'cerci_hero_title_1', 'Doğadan Gelen' );
$hero_title_2    = get_theme_mod( 'cerci_hero_title_2', 'SAF LEZZET' );
$hero_desc       = get_theme_mod( 'cerci_hero_description', 'Geleneksel yöntemlerle, katkısız ve doğal ürünleri sofralarınıza ulaştırıyoruz.' );
$hero_btn_text   = get_theme_mod( 'cerci_hero_btn_text', 'ALIŞVERİŞE BAŞLA' );
$hero_btn_url    = get_theme_mod( 'cerci_hero_btn_url', '#' );
$hero_bg         = get_theme_mod( 'cerci_hero_bg_image' );

if ( ! $hero_btn_url || $hero_btn_url === '#' ) {
	$hero_btn_url = cerci_emre_is_woocommerce() ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
}
?>

<section class="ce-hero" id="ce-hero">
	<div class="ce-hero__bg">
		<?php if ( $hero_bg ) : ?>
			<img src="<?php echo esc_url( $hero_bg ); ?>" alt="<?php echo esc_attr( $hero_title_1 . ' ' . $hero_title_2 ); ?>" loading="eager">
		<?php else : ?>
			<!-- Default gradient background when no image set -->
			<div style="width:100%;height:100%;background:linear-gradient(135deg, var(--ce-dark) 0%, var(--ce-dark-medium) 30%, var(--ce-dark-light) 50%, var(--ce-dark) 100%);"></div>
		<?php endif; ?>
	</div>
	<div class="ce-hero__overlay"></div>

	<div class="ce-container">
		<div class="ce-hero__content">
			<p class="ce-hero__pretitle">
				<?php echo esc_html( $hero_pretitle ); ?>
			</p>
			<h1 class="ce-hero__title">
				<span><?php echo esc_html( $hero_title_1 ); ?></span>
				<span class="ce-hero__title-accent"><?php echo esc_html( $hero_title_2 ); ?></span>
			</h1>
			<p class="ce-hero__description">
				<?php echo esc_html( $hero_desc ); ?>
			</p>
			<div class="ce-hero__cta">
				<a href="<?php echo esc_url( $hero_btn_url ); ?>" class="ce-btn ce-btn-primary">
					<?php echo esc_html( $hero_btn_text ); ?>
					<span class="ce-btn-arrow">→</span>
				</a>
			</div>
		</div>
	</div>
</section>
