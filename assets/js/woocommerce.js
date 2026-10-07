/**
 * WooCommerce Custom JavaScript for Çerci Emre
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // 1. AJAX Add to Cart animation / feedback
        $('body').on('adding_to_cart', function(e, button, data) {
            if (button && button.length) {
                button.addClass('loading');
                // Change text or show spinner inside button if needed
                const originalText = button.text();
                button.data('original-text', originalText);
                button.text('Ekleniyor...');
            }
        });

        $('body').on('added_to_cart', function(e, fragments, cart_hash, button) {
            if (button && button.length) {
                button.removeClass('loading');
                button.text('Eklendi ✓');
                
                // Add a small shake/pop animation to the cart icon in header
                const cartIcon = $('#ce-cart-toggle');
                if (cartIcon.length) {
                    cartIcon.addClass('ce-pop-anim');
                    setTimeout(function() {
                        cartIcon.removeClass('ce-pop-anim');
                    }, 500);
                }

                // Restore original text after 2 seconds
                setTimeout(function() {
                    const originalText = button.data('original-text');
                    if (originalText) {
                        button.text(originalText);
                    }
                }, 2000);
            }
        });

        // 2. Quantity input enhancements (+/- buttons)
        // If we want to add custom +/- buttons around WooCommerce quantity inputs
        $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').each(function() {
            var qty = $(this);
            if (qty.find('input[type="number"]').length && !qty.find('.qty-btn').length) {
                qty.addClass('buttons_added');
                qty.prepend('<input type="button" value="-" class="qty-btn minus" />');
                qty.append('<input type="button" value="+" class="qty-btn plus" />');
            }
        });

        $('body').on('click', '.qty-btn', function(e) {
            e.preventDefault();
            
            var btn = $(this),
                input = btn.siblings('input[type="number"]'),
                currentVal = parseFloat(input.val()) || 0,
                max = parseFloat(input.attr('max')) || 9999,
                min = parseFloat(input.attr('min')) || 0,
                step = parseFloat(input.attr('step')) || 1;

            if (btn.hasClass('plus')) {
                if (currentVal < max) {
                    input.val(currentVal + step).trigger('change');
                }
            } else {
                if (currentVal > min) {
                    input.val(currentVal - step).trigger('change');
                }
            }
        });

        // 3. Quick Add to Cart Modal
        const quickAddModal = $('#ce-quick-add-modal');
        const quickAddInner = $('#ce-quick-add-inner');
        const quickAddOverlay = $('#ce-quick-add-overlay');
        const quickAddClose = $('#ce-quick-add-close');

        function closeQuickAddModal() {
            quickAddModal.removeClass('active');
            $('body').css('overflow', '');
        }

        if (quickAddModal.length) {
            quickAddClose.on('click', closeQuickAddModal);
            quickAddOverlay.on('click', closeQuickAddModal);
            
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && quickAddModal.hasClass('active')) {
                    closeQuickAddModal();
                }
            });

            $('body').on('click', '.ce-quick-add-btn', function(e) {
                e.preventDefault();
                const btn = $(this);
                const productId = btn.data('product_id');

                if (!productId) return;

                // Open modal and show loader
                quickAddModal.addClass('active');
                $('body').css('overflow', 'hidden');
                
                quickAddInner.html('<div class="ce-quick-add-modal__loading"><div class="ce-loading__spinner"></div></div>');

                // Fetch product add to cart form via AJAX
                $.ajax({
                    url: cerciEmreWoo.ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'ce_load_quick_add_form',
                        product_id: productId,
                        security: cerciEmreWoo.nonce
                    },
                    success: function(response) {
                        if (response.success && response.data.html) {
                            quickAddInner.html(response.data.html);
                            
                            // Re-init WC scripts for variations if needed
                            if (typeof wc_add_to_cart_variation_params !== 'undefined' && $.fn.wc_variation_form) {
                                quickAddInner.find('.variations_form').each(function() {
                                    $(this).wc_variation_form();
                                });
                            }
                        } else {
                            quickAddInner.html('<p class="ce-error">Ürün yüklenirken bir hata oluştu.</p>');
                        }
                    },
                    error: function() {
                        quickAddInner.html('<p class="ce-error">Bağlantı hatası.</p>');
                    }
                });
            });
            
            // Allow AJAX add to cart to work inside the modal
            // When standard add to cart happens, WC triggers added_to_cart
            $('body').on('added_to_cart', function() {
                if (quickAddModal.hasClass('active')) {
                    setTimeout(closeQuickAddModal, 800); // close after 800ms
                }
            });
        }
    });

})(jQuery);
