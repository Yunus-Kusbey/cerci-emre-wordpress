<?php
/**
 * Front Page Template - Çerci Emre
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<?php get_template_part( 'template-parts/hero-section' ); ?>

<?php get_template_part( 'template-parts/category-circles' ); ?>

<?php get_template_part( 'template-parts/trust-badges' ); ?>

<?php get_template_part( 'template-parts/featured-products' ); ?>

<?php
// About Section
$about_title       = get_theme_mod( 'cerci_about_title', 'Doğallığın Gerçek Lezzeti' );
$about_description = get_theme_mod( 'cerci_about_text', 'Çerci Emre olarak, yıllardır süregelen geleneksel üretim yöntemleriyle, doğanın sunduğu en saf ve katkısız lezzetleri sofralarınıza ulaştırıyoruz. Her bir ürünümüz, doğal kaynaklardan özenle toplanarak, hiçbir katkı maddesi kullanılmadan işlenmektedir.' );
?>
<section class="ce-about ce-section">
	<div class="ce-container">
		<div class="ce-about__grid">
			<div class="ce-about__image ce-animate">
				<?php
				$about_image = get_theme_mod( 'cerci_about_image' );
				if ( $about_image ) : ?>
					<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php echo esc_attr( $about_title ); ?>">
				<?php else : ?>
					<div style="width:100%;aspect-ratio:4/3;background:linear-gradient(135deg, var(--ce-dark-medium), var(--ce-dark-light));border-radius:var(--ce-radius-lg);display:flex;align-items:center;justify-content:center;">
						<svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="var(--ce-gold)" stroke-width="1" opacity="0.5">
							<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
						</svg>
					</div>
				<?php endif; ?>
			</div>
			<div class="ce-about__content ce-animate">
				<p class="ce-subtitle ce-gold-text" style="font-family:var(--ce-font-accent);font-size:1rem;font-style:italic;letter-spacing:0.1em;margin-bottom:var(--ce-space-sm);"><?php esc_html_e( 'Hikayemiz', 'cerci-emre' ); ?></p>
				<h2>
					<?php echo esc_html( $about_title ); ?>
				</h2>
				<p><?php echo esc_html( $about_description ); ?></p>
				<a href="<?php echo esc_url( home_url( '/hakkimizda/' ) ); ?>" class="ce-btn ce-btn-outline">
					<?php esc_html_e( 'Daha Fazla', 'cerci-emre' ); ?>
					<span class="ce-btn-arrow">→</span>
				</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
