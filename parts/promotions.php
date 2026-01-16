<!-- Акции -->
<section id="promotions" class="promotions-section" data-animate-on-scroll>
    <!-- Фоновая картинка -->
    <img src="<?php echo get_template_directory_uri() . '/assets/img/promo.webp'; ?>" 
         alt="Фон акций" 
         class="promotions-bg-image">
    
    <div class="container">
        <div class="promotions-header" data-animate="fadeInUp">
            <h2 class="promotions-title">Акции</h2>
            <div class="promotions-subtitle">Специальные предложения для наших клиентов</div>
        </div>
        
        <div class="promotions-grid">
            <?php
            // Получаем акции из Carbon Fields
            $promotions = carbon_get_theme_option( 'promotions' );
            $delay = 150; // начальная задержка для анимации
            
            if ( $promotions && is_array( $promotions ) ) :
                $counter = 0;
                foreach ( $promotions as $promotion ) :
                    $counter++;
                    ?>
                    <!-- Акция <?php echo $counter; ?> -->
                    <div class="promotion-card" data-animate="fadeInUp" data-animate-delay="<?php echo $delay; ?>">
                        <div class="promotion-card__inner">
                            <div class="promotion-card__header">
                                <h3 class="promotion-card__title"><?php echo esc_html( $promotion['title'] ); ?></h3>
                            </div>
                            <div class="promotion-card__content">
                                <p class="promotion-card__description">
                                    <?php echo esc_html( $promotion['description'] ); ?>
                                </p>
                                <div class="promotion-card__discount"><?php echo esc_html( $promotion['discount'] ); ?></div>
                            </div>
                            <div class="promotion-card__footer">
                                <a href="<?php echo esc_url( $promotion['button_link'] ); ?>" 
                                   class="promotion-card__button btn callback-btn">
                                    <?php echo esc_html( $promotion['button_text'] ); ?>
                                </a>
                            </div>
                        </div>
                        <div class="promotion-card__decor decor-<?php echo $counter; ?>"></div>
                    </div>
                    <?php
                    $delay += 150; // увеличиваем задержку для следующей карточки
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>