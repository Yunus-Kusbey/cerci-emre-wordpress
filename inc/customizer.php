<?php
/**
 * Customizer Settings - Çerci Emre
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cerci_emre_customize_register( $wp_customize ) {

	/*------------------------------------*\
		Header Settings
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_header_section', array(
		'title'    => esc_html__( 'Üst Kısım (Header)', 'cerci-emre' ),
		'priority' => 20,
	) );

	// Move native Custom Logo control to Header Section
	$custom_logo_control = $wp_customize->get_control( 'custom_logo' );
	if ( $custom_logo_control ) {
		$custom_logo_control->section = 'cerci_header_section';
		$custom_logo_control->priority = 10;
	}

	// Profile Page Dropdown (Hesabım Sayfası Seçimi)
	$wp_customize->add_setting( 'cerci_profile_page_id', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cerci_profile_page_id', array(
		'label'       => esc_html__( 'Profil (Hesabım) Sayfası', 'cerci-emre' ),
		'description' => esc_html__( 'Profil ikonuna tıklanınca hangi sayfaya gidileceğini seçin. Seçmezseniz WooCommerce Hesabım sayfasına gider.', 'cerci-emre' ),
		'section'     => 'cerci_header_section',
		'type'        => 'dropdown-pages',
		'priority'    => 20,
	) );

	// Orders Page Dropdown
	$wp_customize->add_setting( 'cerci_orders_page_id', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cerci_orders_page_id', array(
		'label'       => esc_html__( 'Siparişlerim Sayfası', 'cerci-emre' ),
		'description' => esc_html__( 'Açılır menüdeki "Siparişlerim" linki için sayfa seçin.', 'cerci-emre' ),
		'section'     => 'cerci_header_section',
		'type'        => 'dropdown-pages',
		'priority'    => 21,
	) );

	// Login Page Dropdown
	$wp_customize->add_setting( 'cerci_login_page_id', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cerci_login_page_id', array(
		'label'       => esc_html__( 'Giriş Yap / Üye Ol Sayfası', 'cerci-emre' ),
		'description' => esc_html__( 'Kullanıcı giriş yapmamışsa açılır menüde görünecek olan linkin sayfasını seçin.', 'cerci-emre' ),
		'section'     => 'cerci_header_section',
		'type'        => 'dropdown-pages',
		'priority'    => 22,
	) );

	// Sticky Header Toggle
	$wp_customize->add_setting( 'cerci_header_sticky', array(
		'default'           => true,
		'sanitize_callback' => 'cerci_emre_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'cerci_header_sticky', array(
		'label'   => esc_html__( 'Sabit Header (Aşağı kaydırınca üstte kalır)', 'cerci-emre' ),
		'section' => 'cerci_header_section',
		'type'    => 'checkbox',
	) );

	// Show Search Icon
	$wp_customize->add_setting( 'cerci_header_show_search', array(
		'default'           => true,
		'sanitize_callback' => 'cerci_emre_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'cerci_header_show_search', array(
		'label'   => esc_html__( 'Arama İkonunu Göster', 'cerci-emre' ),
		'section' => 'cerci_header_section',
		'type'    => 'checkbox',
	) );

	// Show Profile Icon
	$wp_customize->add_setting( 'cerci_header_show_profile', array(
		'default'           => true,
		'sanitize_callback' => 'cerci_emre_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'cerci_header_show_profile', array(
		'label'   => esc_html__( 'Profil İkonunu Göster', 'cerci-emre' ),
		'section' => 'cerci_header_section',
		'type'    => 'checkbox',
	) );

	// Show Cart Icon
	$wp_customize->add_setting( 'cerci_header_show_cart', array(
		'default'           => true,
		'sanitize_callback' => 'cerci_emre_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'cerci_header_show_cart', array(
		'label'   => esc_html__( 'Sepet İkonunu Göster', 'cerci-emre' ),
		'section' => 'cerci_header_section',
		'type'    => 'checkbox',
	) );

	// Header Background Color
	$wp_customize->add_setting( 'cerci_header_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_header_bg_color', array(
		'label'   => esc_html__( 'Arka Plan Rengi', 'cerci-emre' ),
		'section' => 'cerci_header_section',
	) ) );

	// Header Text/Link Color
	$wp_customize->add_setting( 'cerci_header_text_color', array(
		'default'           => '#4b5563',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_header_text_color', array(
		'label'   => esc_html__( 'Metin ve İkon Rengi', 'cerci-emre' ),
		'section' => 'cerci_header_section',
	) ) );

	// Header Hover Color
	$wp_customize->add_setting( 'cerci_header_hover_color', array(
		'default'           => '#c8a45c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_header_hover_color', array(
		'label'   => esc_html__( 'Vurgu (Üzerine gelince) Rengi', 'cerci-emre' ),
		'section' => 'cerci_header_section',
	) ) );
	/*------------------------------------*\
		Theme Colors (Genel Renkler)
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_colors_section', array(
		'title'    => esc_html__( 'Tema Renkleri (Genel)', 'cerci-emre' ),
		'priority' => 25,
	) );

	// Global Gold Color
	$wp_customize->add_setting( 'cerci_global_gold_color', array(
		'default'           => '#c8a45c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_global_gold_color', array(
		'label'   => esc_html__( 'Ana Vurgu Rengi (Altın Sarısı vb.)', 'cerci-emre' ),
		'section' => 'cerci_colors_section',
	) ) );

	// Global Text Color
	$wp_customize->add_setting( 'cerci_global_text_color', array(
		'default'           => '#111827',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_global_text_color', array(
		'label'   => esc_html__( 'Genel Metin Rengi', 'cerci-emre' ),
		'section' => 'cerci_colors_section',
	) ) );

	// Footer Background Color
	$wp_customize->add_setting( 'cerci_footer_bg_color', array(
		'default'           => '#111827',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cerci_footer_bg_color', array(
		'label'   => esc_html__( 'Footer (Alt Kısım) Arka Plan Rengi', 'cerci-emre' ),
		'section' => 'cerci_colors_section',
	) ) );
	/*------------------------------------*\
		Hero Section
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_hero_section', array(
		'title'    => esc_html__( 'Hero Bölümü', 'cerci-emre' ),
		'priority' => 30,
	) );

	// Hero Background Image
	$wp_customize->add_setting( 'cerci_hero_bg_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cerci_hero_bg_image', array(
		'label'   => esc_html__( 'Arka Plan Görseli', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
	) ) );

	// Hero Pretitle
	$wp_customize->add_setting( 'cerci_hero_pretitle', array(
		'default'           => 'DOĞALLIĞIN GERÇEK LEZZETİ',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_hero_pretitle', array(
		'label'   => esc_html__( 'Üst Başlık', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
		'type'    => 'text',
	) );

	// Hero Title Line 1
	$wp_customize->add_setting( 'cerci_hero_title_1', array(
		'default'           => 'Doğadan Gelen',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_hero_title_1', array(
		'label'   => esc_html__( 'Başlık Satır 1', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
		'type'    => 'text',
	) );

	// Hero Title Line 2
	$wp_customize->add_setting( 'cerci_hero_title_2', array(
		'default'           => 'SAF LEZZET',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_hero_title_2', array(
		'label'   => esc_html__( 'Başlık Satır 2 (Büyük)', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
		'type'    => 'text',
	) );

	// Hero Description
	$wp_customize->add_setting( 'cerci_hero_description', array(
		'default'           => 'Geleneksel yöntemlerle, katkısız ve doğal ürünleri sofralarınıza ulaştırıyoruz.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'cerci_hero_description', array(
		'label'   => esc_html__( 'Açıklama', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
		'type'    => 'textarea',
	) );

	// Hero Button Text
	$wp_customize->add_setting( 'cerci_hero_btn_text', array(
		'default'           => 'ALIŞVERİŞE BAŞLA',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_hero_btn_text', array(
		'label'   => esc_html__( 'Buton Yazısı', 'cerci-emre' ),
		'section' => 'cerci_hero_section',
		'type'    => 'text',
	) );

	// Hero Button URL
	$wp_customize->add_setting( 'cerci_hero_btn_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'cerci_hero_btn_url', array(
		'label'       => esc_html__( 'Buton URL', 'cerci-emre' ),
		'description' => esc_html__( 'Boş bırakırsanız mağaza sayfasına yönlendirir', 'cerci-emre' ),
		'section'     => 'cerci_hero_section',
		'type'        => 'url',
	) );

	/*------------------------------------*\
		Featured Products
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_featured_section', array(
		'title'    => esc_html__( 'Öne Çıkan Ürünler', 'cerci-emre' ),
		'priority' => 35,
	) );

	// Featured Count
	$wp_customize->add_setting( 'cerci_featured_count', array(
		'default'           => 8,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cerci_featured_count', array(
		'label'   => esc_html__( 'Ürün Sayısı', 'cerci-emre' ),
		'section' => 'cerci_featured_section',
		'type'    => 'number',
		'input_attrs' => array(
			'min' => 2,
			'max' => 16,
		),
	) );

	// Featured Type
	$wp_customize->add_setting( 'cerci_featured_type', array(
		'default'           => 'featured',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_featured_type', array(
		'label'   => esc_html__( 'Ürün Tipi', 'cerci-emre' ),
		'section' => 'cerci_featured_section',
		'type'    => 'select',
		'choices' => array(
			'featured'     => esc_html__( 'Öne Çıkan', 'cerci-emre' ),
			'latest'       => esc_html__( 'En Yeni', 'cerci-emre' ),
			'best_selling' => esc_html__( 'Çok Satanlar', 'cerci-emre' ),
			'on_sale'      => esc_html__( 'İndirimli', 'cerci-emre' ),
		),
	) );

	/*------------------------------------*\
		About Section
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_about_section', array(
		'title'    => esc_html__( 'Hakkımızda Bölümü', 'cerci-emre' ),
		'priority' => 40,
	) );

	// About Image
	$wp_customize->add_setting( 'cerci_about_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cerci_about_image', array(
		'label'   => esc_html__( 'Hakkımızda Görseli', 'cerci-emre' ),
		'section' => 'cerci_about_section',
	) ) );

	// About Title
	$wp_customize->add_setting( 'cerci_about_title', array(
		'default'           => 'Doğallığın Gerçek Lezzeti',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_about_title', array(
		'label'   => esc_html__( 'Başlık', 'cerci-emre' ),
		'section' => 'cerci_about_section',
		'type'    => 'text',
	) );

	// About Text
	$wp_customize->add_setting( 'cerci_about_text', array(
		'default'           => 'Çerci Emre olarak, yıllardır süregelen geleneksel üretim yöntemleriyle, doğanın sunduğu en saf ve katkısız lezzetleri sofralarınıza ulaştırıyoruz.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'cerci_about_text', array(
		'label'   => esc_html__( 'Metin', 'cerci-emre' ),
		'section' => 'cerci_about_section',
		'type'    => 'textarea',
	) );

	/*------------------------------------*\
		Social Media
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_social_section', array(
		'title'    => esc_html__( 'Sosyal Medya', 'cerci-emre' ),
		'priority' => 45,
	) );

	$social_networks = array(
		'facebook'  => 'Facebook',
		'instagram' => 'Instagram',
		'twitter'   => 'Twitter / X',
		'whatsapp'  => 'WhatsApp',
		'youtube'   => 'YouTube',
	);

	foreach ( $social_networks as $key => $label ) {
		$wp_customize->add_setting( 'cerci_social_' . $key, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( 'cerci_social_' . $key, array(
			'label'   => $label . ' URL',
			'section' => 'cerci_social_section',
			'type'    => 'url',
		) );
	}

	/*------------------------------------*\
		Contact Info
	\*------------------------------------*/
	$wp_customize->add_section( 'cerci_contact_section', array(
		'title'    => esc_html__( 'İletişim Bilgileri', 'cerci-emre' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'cerci_phone', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cerci_phone', array(
		'label'   => esc_html__( 'Telefon', 'cerci-emre' ),
		'section' => 'cerci_contact_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'cerci_email', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'cerci_email', array(
		'label'   => esc_html__( 'E-posta', 'cerci-emre' ),
		'section' => 'cerci_contact_section',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'cerci_address', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'cerci_address', array(
		'label'   => esc_html__( 'Adres', 'cerci-emre' ),
		'section' => 'cerci_contact_section',
		'type'    => 'textarea',
	) );
}
add_action( 'customize_register', 'cerci_emre_customize_register' );

/**
 * Sanitize Checkbox
 */
function cerci_emre_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
