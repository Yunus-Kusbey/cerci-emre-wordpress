<?php
/**
 * Footer Template - Çerci Emre
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

</main><!-- #ce-main -->

<footer class="ce-footer" id="ce-footer">
	<div class="ce-footer__main">
		<div class="ce-container">
			<div class="ce-footer__simple">
				<div class="ce-footer__brand" style="text-align:center;">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-logo" style="justify-content:center;">
						<div class="ce-logo__text">
							<span class="ce-logo__brand"><?php esc_html_e( 'ÇERCİ EMRE', 'cerci-emre' ); ?></span>
							<span class="ce-logo__tagline"><?php esc_html_e( 'Doğadan Sofranıza', 'cerci-emre' ); ?></span>
						</div>
					</a>
					<p style="margin-top:1rem;">
						<?php esc_html_e( 'Geleneksel yöntemlerle, katkısız ve doğal ürünleri sofralarınıza ulaştırıyoruz.', 'cerci-emre' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="ce-container">
		<div class="ce-footer__bottom">
			<p class="ce-footer__copyright">
				&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Tüm hakları saklıdır.', 'cerci-emre' ); ?>
			</p>
		</div>
	</div>
</footer>

<!-- Scroll to Top -->
<button class="ce-scroll-top" id="ce-scroll-top" aria-label="<?php esc_attr_e( 'Yukarı', 'cerci-emre' ); ?>">
	<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<polyline points="18 15 12 9 6 15"></polyline>
	</svg>
</button>

<!-- Mini Cart Overlay -->
<div class="ce-mini-cart-overlay" id="ce-mini-cart-overlay"></div>
<div class="ce-mini-cart" id="ce-mini-cart">
    <div class="ce-mini-cart__header">
        <h3><?php esc_html_e('Sepetiniz', 'cerci-emre'); ?></h3>
        <button class="ce-mini-cart__close" id="ce-mini-cart-close" aria-label="<?php esc_attr_e('Kapat', 'cerci-emre'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <div class="ce-mini-cart__content">
        <?php if ( class_exists( 'WooCommerce' ) ) { the_widget( 'WC_Widget_Cart', 'title=' ); } ?>
    </div>
</div>

<?php wp_footer(); ?>
<!-- Social Proof & Free Shipping Scripts -->
<script>
(function () {
    const styleId = "ikas-social-proof-style";

    const injectStyles = () => {
        if (document.getElementById(styleId)) return;
        const style = document.createElement("style");
        style.id = styleId;
        style.innerHTML = `
            .meks-slider-container { display: block !important; overflow: hidden !important; position: relative !important; width: 100% !important; box-sizing: border-box !important; pointer-events: none; z-index: 10; }
            .meks-slider-wrapper { transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1); }
            .meks-row { display: flex !important; align-items: center !important; white-space: nowrap !important; font-family: inherit !important; }
            .meks-emoji { margin-right: 6px; }
            .meks-bold { font-weight: 700; color: #000; }
            .meks-green { color: #16a34a !important; font-weight: 600; }
            .meks-orange { color: #ea580c !important; font-weight: 600; }
            
            /* LIST SETTING */
            .is-list { height: 26px !important; background: #f8f9fb !important; border-radius: 4px !important; margin: 10px 0 5px 0 !important; padding: 0 8px !important; }
            .is-list .meks-row { height: 26px !important; font-size: 11px !important; color: #444 !important; }
            
            /* DETAIL SETTING */
            .is-detail { height: 24px !important; background: transparent !important; border: none !important; margin: 12px 0 8px 0 !important; padding: 0 !important; }
            .is-detail .meks-row { height: 24px !important; font-size: 13px !important; color: #333 !important; }
        `;
        document.head.appendChild(style);
    };

    const getStableNumber = (name, min, max, offset) => {
        let hash = 0;
        const str = (name || "default") + offset;
        for (let i = 0; i < str.length; i++) {
            hash = str.charCodeAt(i) + ((hash << 5) - hash);
        }
        return min + (Math.abs(hash) % (max - min + 1));
    };

    const createSlider = (target, typeClass, name, position = "after") => {
        if (!target || target.parentNode.querySelector(":scope > .meks-slider-container")) return;

        let view = getStableNumber(name, 8, 16, "view");
        let fav = getStableNumber(name, 40, 70, "fav");
        let cart = getStableNumber(name, 9, 18, "cart");
        let sales = getStableNumber(name, 6, 12, "sales");

        const container = document.createElement("div");
        container.className = `meks-slider-container ${typeClass}`;
        
        let rowsHtml = '';
        if (typeClass === "is-detail") {
            rowsHtml += `<div class="meks-row"><span class="meks-emoji">👀</span><span>Şu an <span class="meks-bold">${view} kişi</span> inceliyor!</span></div>`;
        }
        
        rowsHtml += `
            <div class="meks-row"><span class="meks-emoji">⭐️</span><span>Bu ürünü <span class="meks-bold">${fav} kişi</span> favoriledi!</span></div>
            <div class="meks-row"><span class="meks-emoji">🛒</span><span class="meks-orange"><span class="meks-bold">${cart} kişi</span> sepetine ekledi!</span></div>
            <div class="meks-row"><span class="meks-emoji">✅</span><span class="meks-green">Bugün <span class="meks-bold">${sales} adet</span> satıldı</span></div>
        `;

        container.innerHTML = `<div class="meks-slider-wrapper">${rowsHtml}</div>`;
        
        if (position === "before") {
            target.parentNode.insertBefore(container, target);
        } else {
            target.parentNode.insertBefore(container, target.nextSibling);
        }
    };

    const runSliderSystem = () => {
        // DETAIL PAGE
        const detailName = document.querySelector(".product_title");
        if (detailName) {
            createSlider(detailName, "is-detail", document.title, "after");
        }

        // LIST PAGE
        const listItems = document.querySelectorAll("h3.ce-product-card__title, .woocommerce-loop-product__title");
        listItems.forEach((item) => {
            createSlider(item, "is-list", item.innerText, "before");
        });
    };

    let currentIndex = 0;
    setInterval(() => {
        currentIndex++;
        document.querySelectorAll(".is-detail .meks-slider-wrapper").forEach(el => {
            el.style.transform = `translateY(-${(currentIndex % 4) * 24}px)`;
        });
        document.querySelectorAll(".is-list .meks-slider-wrapper").forEach(el => {
            el.style.transform = `translateY(-${(currentIndex % 3) * 26}px)`;
        });
    }, 3800);

    const init = () => {
        injectStyles();
        let checkCount = 0;
        const poller = setInterval(() => {
            runSliderSystem();
            checkCount++;
            if (checkCount > 10) { 
                clearInterval(poller);
                setInterval(runSliderSystem, 3000);
            }
        }, 1000);

        const observer = new MutationObserver(() => {
            runSliderSystem();
        });
        observer.observe(document.body, { childList: true, subtree: true });
    };

    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        init();
    } else {
        document.addEventListener('DOMContentLoaded', init);
    }
})();
</script>
<script>
(function () {
  const kargoEkle = () => {
    // Find all prices on the page
    const priceElements = document.querySelectorAll('.ce-product-card__price, .price');
    priceElements.forEach(priceEl => {
      if (priceEl.querySelector('.kargo-ucretsiz-badge')) return;

      const raw = priceEl.innerText.trim();
      const textMatches = raw.match(/[\d,\.]+/g);
      if(!textMatches) return;
      
      const fiyatText = textMatches[textMatches.length-1].replace(/[\.,]/g, function(match, offset, str) {
          return offset === str.lastIndexOf(',') || offset === str.lastIndexOf('.') ? '.' : '';
      });
      const fiyat = parseFloat(fiyatText);

      if (isNaN(fiyat) || fiyat < 1500) return;

      const badge = document.createElement('span');
      badge.className = 'kargo-ucretsiz-badge';
      badge.innerHTML = '🚚 Kargo Ücretsiz';
      badge.style.cssText = 'display:inline-block;background:#16a34a;color:#fff;font-size:12px;font-weight:700;padding:4px 8px;border-radius:4px;margin-top:6px;vertical-align:middle; width: 100%; text-align: center;';

      priceEl.appendChild(badge);
    });
  };

  const init = () => {
    let checkCount = 0;
    const poller = setInterval(() => {
      kargoEkle();
      checkCount++;
      if (checkCount > 10) {
        clearInterval(poller);
        setInterval(kargoEkle, 3000);
      }
    }, 1000);
  };

  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    init();
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var cartToggle = document.getElementById('ce-cart-toggle');
    var miniCart = document.getElementById('ce-mini-cart');
    var miniCartOverlay = document.getElementById('ce-mini-cart-overlay');
    var miniCartClose = document.getElementById('ce-mini-cart-close');

    if (cartToggle && miniCart) {
        cartToggle.addEventListener('click', function(e) {
            e.preventDefault();
            miniCart.classList.add('is-open');
            miniCartOverlay.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        });

        function closeMiniCart() {
            miniCart.classList.remove('is-open');
            miniCartOverlay.classList.remove('is-active');
            document.body.style.overflow = '';
        }

        if (miniCartClose) miniCartClose.addEventListener('click', closeMiniCart);
        if (miniCartOverlay) miniCartOverlay.addEventListener('click', closeMiniCart);
    }
    
    // WooCommerce AJAX cart update event bind
    jQuery(document.body).on('added_to_cart', function() {
        if(miniCart && miniCartOverlay) {
            miniCart.classList.add('is-open');
            miniCartOverlay.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Only run on cart page
    if (document.body.classList.contains('woocommerce-cart')) {
        var cartTotals = document.querySelector('.woocommerce-cart .cart_totals');
        
        // Wait briefly for WooCommerce to render its HTML fully if needed
        setTimeout(function() {
            if (cartTotals && !document.querySelector('.ce-cart-custom-actions')) {
                var actionsWrapper = document.createElement('div');
                actionsWrapper.className = 'ce-cart-custom-actions';

                // 1. Clear Cart Button
                var clearCartBtn = document.createElement('a');
                clearCartBtn.href = '?empty-cart=true'; 
                clearCartBtn.className = 'ce-btn-clear-cart';
                clearCartBtn.innerText = 'Sepeti Temizle';
                clearCartBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var removeButtons = document.querySelectorAll('.woocommerce-cart-form .product-remove a.remove');
                    if (removeButtons.length > 0) {
                        // Click all remove buttons
                        removeButtons.forEach(btn => btn.click());
                    }
                });

                // 2. Continue Shopping Button
                var continueBtn = document.createElement('a');
                // Use a default shop url, or parse it from breadcrumbs if possible. Defaulting to /shop/
                continueBtn.href = '/shop/'; 
                continueBtn.className = 'ce-btn-continue-shopping';
                continueBtn.innerText = 'Alışverişe Devam Et';

                actionsWrapper.appendChild(clearCartBtn);
                actionsWrapper.appendChild(continueBtn);

                cartTotals.appendChild(actionsWrapper);
            }
            
            // Subtotal fix - sometimes WC duplicates shipping. 
            // We ensure it visually looks clean by relying on CSS.
        }, 500);
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.body.classList.contains('woocommerce-checkout')) {
        // Top Return Link
        var pageHeader = document.querySelector('.woocommerce-checkout .ce-page__header .ce-container') || document.querySelector('.woocommerce-checkout .ce-section-title') || document.querySelector('.woocommerce-checkout .woocommerce');
        if (pageHeader && !document.querySelector('.ce-btn-return-top')) {
            var backTopLink = document.createElement('a');
            backTopLink.href = '?page_id=' + (window.wc_cart_page_id || 'cart'); // fallback to relative if needed, normally /cart/ or /sepet/
            // simple check for cart url
            var cartUrl = '/sepet/';
            var navLinks = document.querySelectorAll('a');
            for(var i=0; i<navLinks.length; i++) {
                if(navLinks[i].href && navLinks[i].href.indexOf('sepet') !== -1) {
                    cartUrl = navLinks[i].href;
                    break;
                }
            }
            backTopLink.href = cartUrl;
            backTopLink.className = 'ce-btn-return-top';
            backTopLink.innerHTML = '&lt; Sepete Geri Dön';
            backTopLink.style.cssText = 'color: #6b7280; text-decoration: none; font-weight: 500; margin-bottom: 10px; display: inline-block; font-size: 0.95rem;';
            pageHeader.insertBefore(backTopLink, pageHeader.firstChild);
        }

        // Bottom Return Button (after AJAX updates)
        if(typeof jQuery !== 'undefined') {
            jQuery(document.body).on('updated_checkout', function() {
                var paymentDiv = document.querySelector('#payment .place-order');
                if (paymentDiv && !document.querySelector('.ce-btn-return-cart')) {
                    var backCartBtn = document.createElement('a');
                    backCartBtn.href = document.querySelector('.ce-btn-return-top') ? document.querySelector('.ce-btn-return-top').href : '/sepet/';
                    backCartBtn.className = 'ce-btn-return-cart';
                    backCartBtn.innerText = 'Sepete Geri Dön';
                    paymentDiv.appendChild(backCartBtn);
                }
            });
            // trigger once manually for initial load
            jQuery(document.body).trigger('updated_checkout');
        }
    }
});
</script>

<!-- Mobile Bottom Navigation -->
<div class="ce-mobile-bottom-nav">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-mobile-nav-item">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
			<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
			<polyline points="9 22 9 12 15 12 15 22"></polyline>
		</svg>
		<span><?php esc_html_e( 'Anasayfa', 'cerci-emre' ); ?></span>
	</a>
	<a href="#" class="ce-mobile-nav-item ce-mobile-search-trigger">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
			<circle cx="11" cy="11" r="8"></circle>
			<path d="M21 21l-4.35-4.35"></path>
		</svg>
		<span><?php esc_html_e( 'Arama', 'cerci-emre' ); ?></span>
	</a>
	<?php
	$profile_page_id = get_theme_mod( 'cerci_profile_page_id', 0 );
	$profile_url = ! empty( $profile_page_id ) ? get_permalink( $profile_page_id ) : ( cerci_emre_is_woocommerce() ? wc_get_page_permalink( 'myaccount' ) : wp_login_url() );
	?>
	<a href="<?php echo esc_url( $profile_url ); ?>" class="ce-mobile-nav-item">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
			<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
			<circle cx="12" cy="7" r="4"></circle>
		</svg>
		<span><?php esc_html_e( 'Profil', 'cerci-emre' ); ?></span>
	</a>
	<?php if ( cerci_emre_is_woocommerce() ) : ?>
	<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="ce-mobile-nav-item ce-cart-trigger">
		<div class="ce-mobile-nav-icon-wrap">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
				<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<path d="M16 10a4 4 0 0 1-8 0"></path>
			</svg>
			<span class="ce-mobile-nav-count"><?php echo cerci_emre_get_cart_count(); ?></span>
		</div>
		<span><?php esc_html_e( 'Sepet', 'cerci-emre' ); ?></span>
	</a>
	<?php endif; ?>
</div>

</body>
</html>
