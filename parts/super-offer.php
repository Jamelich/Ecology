<section id="super-offer" class="super-offer-section" data-animate-on-scroll>
    <div class="super-offer-bg" style="background-image: url('<?php echo carbon_get_theme_option('super_offer_photo'); ?>');"></div>
    <div class="super-offer-overlay">
        <div class="super-offer-container">
            <div class="super-offer-content">
                <div class="super-offer-text-wrapper">
                    <?php if ($super_offer_subheader = carbon_get_theme_option('super_offer_subheader')): ?>
                        <div class="super-offer-subheader" data-animate="fadeInDown">
                            <?php echo esc_html($super_offer_subheader); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($super_offer_name = carbon_get_theme_option('super_offer_name')): ?>
                        <h2 class="super-offer-title" data-animate="fadeInLeft" data-animate-delay="100">
                            <?php echo esc_html($super_offer_name); ?>
                        </h2>
                    <?php endif; ?>
                    
                    <?php if ($super_offer_desc = carbon_get_theme_option('super_offer_desc')): ?>
                        <div class="super-offer-description" data-animate="fadeInUp" data-animate-delay="200">
                            <?php echo wpautop($super_offer_desc); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="super-offer-action" data-animate="fadeInUp" data-animate-delay="300">
                        <a href="#order" class="super-offer-link">Заказать сейчас</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>