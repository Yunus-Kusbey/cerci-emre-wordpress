<?php
/**
 * 404 Error Page Template
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ce-page">
	<div class="ce-container">
		<div class="ce-404">
			<h1 class="ce-404__title">404</h1>
			<h2 style="margin-bottom:var(--ce-space-md);"><?php esc_html_e( 'Sayfa Bulunamadı', 'cerci-emre' ); ?></h2>
			<p class="ce-404__text">
				<?php esc_html_e( 'Aradığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.', 'cerci-emre' ); ?>
			</p>

			<!-- Search Form -->
			<form role="search" method="get" class="ce-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="ce-search-form__input" placeholder="<?php esc_attr_e( 'Arama yapın...', 'cerci-emre' ); ?>" name="s" />
				<button type="submit" class="ce-search-form__btn"><?php esc_html_e( 'Ara', 'cerci-emre' ); ?></button>
			</form>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-btn ce-btn-primary">
				<?php esc_html_e( 'Ana Sayfaya Dön', 'cerci-emre' ); ?>
				<span class="ce-btn-arrow">→</span>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>
