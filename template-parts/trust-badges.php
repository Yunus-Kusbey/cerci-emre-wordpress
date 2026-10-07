<?php
/**
 * Trust Badges Template Part
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="ce-trust" id="ce-trust">
	<div class="ce-container">
		<div class="ce-trust__grid">

			<!-- %100 Doğal -->
			<div class="ce-trust__item">
				<div class="ce-trust__icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
						<polyline points="9 12 11 14 15 10"></polyline>
					</svg>
				</div>
				<div class="ce-trust__text">
					<h4><?php esc_html_e( '%100 Doğal', 'cerci-emre' ); ?></h4>
					<p><?php esc_html_e( 'Katkısız ve Saf', 'cerci-emre' ); ?></p>
				</div>
			</div>

			<!-- Geleneksel Üretim -->
			<div class="ce-trust__item">
				<div class="ce-trust__icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2L2 7l10 5 10-5-10-5z"></path>
						<path d="M2 17l10 5 10-5"></path>
						<path d="M2 12l10 5 10-5"></path>
					</svg>
				</div>
				<div class="ce-trust__text">
					<h4><?php esc_html_e( 'Geleneksel Üretim', 'cerci-emre' ); ?></h4>
					<p><?php esc_html_e( 'Doğal Yöntemlerle', 'cerci-emre' ); ?></p>
				</div>
			</div>

			<!-- Güvenli Alışveriş -->
			<div class="ce-trust__item">
				<div class="ce-trust__icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
						<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
					</svg>
				</div>
				<div class="ce-trust__text">
					<h4><?php esc_html_e( 'Güvenli Alışveriş', 'cerci-emre' ); ?></h4>
					<p><?php esc_html_e( 'SSL ile Güvenli Ödeme', 'cerci-emre' ); ?></p>
				</div>
			</div>

			<!-- Hızlı Kargo -->
			<div class="ce-trust__item">
				<div class="ce-trust__icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<rect x="1" y="3" width="15" height="13"></rect>
						<polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
						<circle cx="5.5" cy="18.5" r="2.5"></circle>
						<circle cx="18.5" cy="18.5" r="2.5"></circle>
					</svg>
				</div>
				<div class="ce-trust__text">
					<h4><?php esc_html_e( 'Hızlı Kargo', 'cerci-emre' ); ?></h4>
					<p><?php esc_html_e( "Türkiye'nin Her Yerine", 'cerci-emre' ); ?></p>
				</div>
			</div>

			<!-- Müşteri Memnuniyeti -->
			<div class="ce-trust__item">
				<div class="ce-trust__icon">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
					</svg>
				</div>
				<div class="ce-trust__text">
					<h4><?php esc_html_e( 'Müşteri Memnuniyeti', 'cerci-emre' ); ?></h4>
					<p><?php esc_html_e( 'Bizim İçin Öncelik', 'cerci-emre' ); ?></p>
				</div>
			</div>

		</div>
	</div>
</section>
