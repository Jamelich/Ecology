<?php
/**
 * Блок "Сравнение с конкурентами"
 */

// Получаем услуги из Carbon Fields
$services = carbon_get_theme_option('compare_items');
if (!$services || !is_array($services)) {
    $services = [];
}
?>

<section class="section-competition" id="competition" data-animate-on-scroll>
    <div class="container">
        <h2 class="competition-title" data-animate data-animate-delay="100">
            Мы регулярно мониторим цены конкурентов,<br>
            чтобы для Вас сделать лучшее предложение на рынке
        </h2>
        
        <div class="competition-wrapper" data-animate data-animate-delay="200">
            <div class="competition-table">
                <!-- Шапка таблицы -->
                <div class="competition-header" data-animate data-animate-delay="100">
                    <div class="competition-header__item service-column">Услуга</div>
                    <div class="competition-header__item">Цена у конкурентов, руб.</div>
                    <div class="competition-header__item">Наша цена, руб.</div>
                    <div class="competition-header__item">Ваша выгода, руб. (%)</div>
                </div>
                
                <!-- Строки с услугами -->
                <?php foreach ($services as $index => $service): ?>
                <div class="competition-row <?php echo $index % 2 === 0 ? 'even' : 'odd'; ?>" 
                     data-animate 
                     data-animate-delay="<?php echo 200 + ($index * 100); ?>">
                    <div class="competition-cell service-column">
                        <span class="service-title"><?php echo esc_html($service['compare_service_title']); ?></span>
                    </div>
                    
                    <div class="competition-cell competitor-price">
                        <span class="price-amount"><?php echo esc_html($service['compare_competitor_price']); ?></span>
                        <div class="price-line"></div>
                    </div>
                    
                    <div class="competition-cell our-price">
                        <span class="price-amount"><?php echo esc_html($service['compare_our_price']); ?></span>
                        <div class="price-badge">ЭКОНОМИЯ</div>
                    </div>
                    
                    <div class="competition-cell saving">
                        <span class="saving-amount"><?php echo esc_html($service['compare_saving_amount']); ?></span>
                        <span class="saving-percent">(<?php echo esc_html($service['compare_saving_percent']); ?>%)</span>
                        <div class="saving-progress">
                            <div class="progress-bar" style="width: <?php echo min(intval($service['compare_saving_percent']), 100); ?>%"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="competition-footer" data-animate data-animate-delay="800">
            <div class="competition-cta" data-animate data-animate-delay="300">
                <p>Узнайте точную стоимость для вашего проекта</p>
                <a href="#contact" class="btn-competition callback-btn">
                    <span>Получить индивидуальный расчет</span>
                    <i>→</i>
                </a>
            </div>
        </div>
    </div>
</section>