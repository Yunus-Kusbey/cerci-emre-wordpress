<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
$header_bg = get_theme_mod( 'cerci_header_bg_color', '#ffffff' );
$header_text = get_theme_mod( 'cerci_header_text_color', '#4b5563' );
$header_hover = get_theme_mod( 'cerci_header_hover_color', '#c8a45c' );
$is_sticky = get_theme_mod( 'cerci_header_sticky', true ) ? 'true' : 'false';
?>
<style>
	:root {
		--ce-header-bg: <?php echo esc_attr( $header_bg ); ?>;
		--ce-header-text: <?php echo esc_attr( $header_text ); ?>;
		--ce-header-hover: <?php echo esc_attr( $header_hover ); ?>;
	}
	.ce-header { background-color: var(--ce-header-bg) !important; }
	.ce-header .ce-nav__link, .ce-header .ce-header__action { color: var(--ce-header-text) !important; }
	.ce-header .ce-nav__link:hover, .ce-header .ce-header__action:hover { color: var(--ce-header-hover) !important; }
	.ce-header .ce-header__action svg { stroke: currentColor; stroke-width: 1.5; fill: none; }
	/* Account SVG specific fixes */
	.ce-header .ce-header__action svg path, .ce-header .ce-header__action svg circle { stroke: currentColor; stroke-width: 1.5; }
</style>
<header class="ce-header" id="ce-header" data-sticky="<?php echo esc_attr( $is_sticky ); ?>">
	<div class="ce-container">
		<div class="ce-header__inner">

			<!-- Left Navigation -->
			<nav class="ce-nav ce-nav--left" id="ce-nav-left" aria-label="<?php esc_attr_e( 'Sol Navigasyon', 'cerci-emre' ); ?>">
				<?php
				if ( has_nav_menu( 'primary-left' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary-left',
						'container'      => false,
						'menu_class'     => 'ce-nav__list',
						'depth'          => 2,
						'walker'         => new Cerci_Emre_Nav_Walker(),
						'fallback_cb'    => false,
					) );
				} else {
					// Default menu items
					?>
					<ul class="ce-nav__list">
						<li class="ce-nav__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'Ana Sayfa', 'cerci-emre' ); ?></a></li>
						<?php if ( cerci_emre_is_woocommerce() ) : ?>
							<li class="ce-nav__item"><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'Ürünler', 'cerci-emre' ); ?></a></li>
						<?php endif; ?>
						<li class="ce-nav__item"><a href="<?php echo esc_url( home_url( '/hakkimizda/' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'Hakkımızda', 'cerci-emre' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</nav>

			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-logo" aria-label="<?php bloginfo( 'name' ); ?>">
				<?php if ( has_custom_logo() ) : ?>
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo_url       = wp_get_attachment_image_url( $custom_logo_id, 'full' );
					?>
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="ce-logo__image">
				<?php else : ?>
					<div class="ce-logo__text">
						<svg width="45" height="40" viewBox="0 0 45 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22.5 2C12 2 5 10 5 18C5 26 12 35 22.5 38C33 35 40 26 40 18C40 10 33 2 22.5 2Z" stroke="#c8a45c" stroke-width="1.5" fill="none"/>
							<path d="M10 20C10 20 15 12 22.5 12C30 12 35 20 35 20" stroke="#c8a45c" stroke-width="1.2" fill="none"/>
							<ellipse cx="22.5" cy="18" rx="6" ry="3" stroke="#c8a45c" stroke-width="1" fill="none"/>
						</svg>
						<span class="ce-logo__brand"><?php esc_html_e( 'ÇERCİ EMRE', 'cerci-emre' ); ?></span>
						<span class="ce-logo__tagline"><?php esc_html_e( 'Doğadan Sofranıza', 'cerci-emre' ); ?></span>
					</div>
				<?php endif; ?>
			</a>

			<!-- Right Navigation -->
			<nav class="ce-nav ce-nav--right" id="ce-nav-right" aria-label="<?php esc_attr_e( 'Sağ Navigasyon', 'cerci-emre' ); ?>">
				<?php
				if ( has_nav_menu( 'primary-right' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary-right',
						'container'      => false,
						'menu_class'     => 'ce-nav__list',
						'depth'          => 2,
						'walker'         => new Cerci_Emre_Nav_Walker(),
						'fallback_cb'    => false,
					) );
				} else {
					?>
					<ul class="ce-nav__list">
						<li class="ce-nav__item"><a href="<?php echo esc_url( home_url( '/vizyonumuz/' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'Vizyonumuz', 'cerci-emre' ); ?></a></li>
						<li class="ce-nav__item"><a href="<?php echo esc_url( home_url( '/misyonumuz/' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'Misyonumuz', 'cerci-emre' ); ?></a></li>
						<li class="ce-nav__item"><a href="<?php echo esc_url( home_url( '/iletisim/' ) ); ?>" class="ce-nav__link"><?php esc_html_e( 'İletişim', 'cerci-emre' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</nav>

			<!-- Header Actions -->
			<div class="ce-header__actions">
				<!-- Search -->
				<?php if ( get_theme_mod( 'cerci_header_show_search', true ) ) : ?>
				<button class="ce-header__action" id="ce-search-toggle" aria-label="<?php esc_attr_e( 'Arama', 'cerci-emre' ); ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<circle cx="11" cy="11" r="8"></circle>
						<path d="M21 21l-4.35-4.35"></path>
					</svg>
				</button>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'cerci_header_show_profile', true ) ) : ?>
				<?php
				$profile_page_id = get_theme_mod( 'cerci_profile_page_id', 0 );
				$profile_url = '';
				if ( ! empty( $profile_page_id ) ) {
					$profile_url = get_permalink( $profile_page_id );
				}
				if ( empty( $profile_url ) ) {
					$profile_url = cerci_emre_is_woocommerce() ? wc_get_page_permalink( 'myaccount' ) : wp_login_url();
				}
				?>
				<!-- Account -->
				<div class="ce-header__profile">
					<a href="<?php echo esc_url( $profile_url ); ?>" class="ce-header__action" aria-label="<?php esc_attr_e( 'Hesabım', 'cerci-emre' ); ?>">
						<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
							<circle cx="12" cy="7" r="4"></circle>
						</svg>
					</a>
					<div class="ce-header__profile-dropdown">
						<?php
						if ( has_nav_menu( 'profile' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'profile',
								'container'      => false,
								'menu_class'     => 'ce-profile-menu',
								'depth'          => 1,
								'fallback_cb'    => false,
							) );
						} else {
							// Varsayılan menü
							$orders_page_id = get_theme_mod( 'cerci_orders_page_id', 0 );
							$login_page_id  = get_theme_mod( 'cerci_login_page_id', 0 );
							
							echo '<ul class="ce-profile-menu">';
							if ( is_user_logged_in() ) {
								$account_url = ! empty( $profile_url ) ? $profile_url : ( cerci_emre_is_woocommerce() ? wc_get_page_permalink( 'myaccount' ) : '#' );
								$orders_url  = ! empty( $orders_page_id ) ? get_permalink( $orders_page_id ) : ( cerci_emre_is_woocommerce() ? wc_get_endpoint_url( 'orders', '', wc_get_page_permalink( 'myaccount' ) ) : '#' );
								
								echo '<li><a href="' . esc_url( $account_url ) . '">' . esc_html__( 'Hesabım', 'cerci-emre' ) . '</a></li>';
								echo '<li><a href="' . esc_url( $orders_url ) . '">' . esc_html__( 'Siparişlerim', 'cerci-emre' ) . '</a></li>';
								echo '<li><a href="' . esc_url( wp_logout_url( home_url() ) ) . '">' . esc_html__( 'Çıkış Yap', 'cerci-emre' ) . '</a></li>';
							} else {
								$login_url = ! empty( $login_page_id ) ? get_permalink( $login_page_id ) : ( ! empty( $profile_url ) ? $profile_url : wp_login_url() );
								echo '<li><a href="' . esc_url( $login_url ) . '">' . esc_html__( 'Giriş Yap / Üye Ol', 'cerci-emre' ) . '</a></li>';
							}
							echo '</ul>';
						}
						?>
					</div>
				</div>
				<?php endif; ?>

				<!-- Cart -->
				<?php if ( get_theme_mod( 'cerci_header_show_cart', true ) && cerci_emre_is_woocommerce() ) : ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="ce-header__action ce-cart-trigger" id="ce-cart-toggle" aria-label="<?php esc_attr_e( 'Sepet', 'cerci-emre' ); ?>">
						<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
							<line x1="3" y1="6" x2="21" y2="6"></line>
							<path d="M16 10a4 4 0 0 1-8 0"></path>
						</svg>
						<span class="ce-header__action-count ce-header__action-count--cart"><?php echo cerci_emre_get_cart_count(); ?></span>
					</a>
				<?php endif; ?>
			</div>

			<!-- Mobile Toggle -->
			<button class="ce-mobile-toggle" id="ce-mobile-toggle" aria-label="<?php esc_attr_e( 'Menü', 'cerci-emre' ); ?>">
				<span></span>
				<span></span>
				<span></span>
			</button>

		</div>
	</div>
</header>

<!-- Mobile Menu -->
<div class="ce-mobile-menu" id="ce-mobile-menu">
	<div class="ce-container">
		<?php
		if ( has_nav_menu( 'mobile' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'mobile',
				'container'      => false,
				'menu_class'     => 'ce-mobile-menu__list',
				'depth'          => 2,
				'fallback_cb'    => false,
			) );
		} else {
			?>
			<ul class="ce-mobile-menu__list">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'Ana Sayfa', 'cerci-emre' ); ?></a></li>
				<?php if ( cerci_emre_is_woocommerce() ) : ?>
					<li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'Ürünler', 'cerci-emre' ); ?></a></li>
				<?php endif; ?>
				<li><a href="<?php echo esc_url( home_url( '/hakkimizda/' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'Hakkımızda', 'cerci-emre' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/vizyonumuz/' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'Vizyonumuz', 'cerci-emre' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/misyonumuz/' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'Misyonumuz', 'cerci-emre' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/iletisim/' ) ); ?>" class="ce-mobile-menu__link"><?php esc_html_e( 'İletişim', 'cerci-emre' ); ?></a></li>
			</ul>
			<?php
		}
		?>
	</div>
</div>

<!-- Search Overlay -->
<div class="ce-search-overlay" id="ce-search-overlay">
	<div class="ce-search-overlay__inner">
		<button class="ce-search-overlay__close" id="ce-search-close" aria-label="<?php esc_attr_e( 'Kapat', 'cerci-emre' ); ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<line x1="18" y1="6" x2="6" y2="18"></line>
				<line x1="6" y1="6" x2="18" y2="18"></line>
			</svg>
		</button>
		<form role="search" method="get" class="ce-search-overlay__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" class="ce-search-overlay__input" placeholder="<?php esc_attr_e( 'Ürün arayın...', 'cerci-emre' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
			<input type="hidden" name="post_type" value="product" />
			<button type="submit" class="ce-search-overlay__submit">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="11" cy="11" r="8"></circle>
					<path d="M21 21l-4.35-4.35"></path>
				</svg>
			</button>
		</form>
	</div>
</div>

<main id="ce-main">
