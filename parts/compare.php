<?php
/**
 * Блок "Сравнение с конкурентами"
 */

$services = [
    [
        'title' => 'Экологическая отчетность',
        'competitor_price' => 'от 5 000',
        'our_price' => 'от 4 000',
        'saving' => '1 000',
        'percent' => '20'
    ],
    [
        'title' => 'Разработка и согласование проекта санитарно-защитной зоны (проект СЗЗ)',
        'competitor_price' => 'от 85 000',
        'our_price' => 'от 70 000',
        'saving' => '15 000',
        'percent' => '18'
    ],
    [
        'title' => 'Разработка и согласование проекта нормативов предельно допустимых выбросов (проект ПДВ)',
        'competitor_price' => 'от 30 000',
        'our_price' => 'от 27 000',
        'saving' => '3 000',
        'percent' => '10'
    ],
    [
        'title' => 'Разработка и согласование раздела проектной документации «Мероприятия по охране окружающей среды» (раздел ООС)',
        'competitor_price' => 'от 40 000',
        'our_price' => 'от 35 000',
        'saving' => '5 000',
        'percent' => '13'
    ],
    [
        'title' => 'Паспортизация отходов',
        'competitor_price' => 'от 5 500',
        'our_price' => 'от 4 000',
        'saving' => '1 500',
        'percent' => '27'
    ]
];
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
                        <span class="service-title"><?php echo esc_html($service['title']); ?></span>
                    </div>
                    
                    <div class="competition-cell competitor-price">
                        <span class="price-amount"><?php echo esc_html($service['competitor_price']); ?></span>
                        <div class="price-line"></div>
                    </div>
                    
                    <div class="competition-cell our-price">
                        <span class="price-amount"><?php echo esc_html($service['our_price']); ?></span>
                        <div class="price-badge">ЭКОНОМИЯ</div>
                    </div>
                    
                    <div class="competition-cell saving">
                        <span class="saving-amount"><?php echo esc_html($service['saving']); ?></span>
                        <span class="saving-percent">(<?php echo esc_html($service['percent']); ?>%)</span>
                        <div class="saving-progress">
                            <div class="progress-bar" style="width: <?php echo min($service['percent'], 100); ?>%"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="competition-footer" data-animate data-animate-delay="800">
            <div class="competition-cta" data-animate data-animate-delay="300">
                <p>Узнайте точную стоимость для вашего проекта</p>
                <a href="#contact" class="btn-competition">
                    <span>Получить расчет</span>
                    <i>→</i>
                </a>
            </div>
        </div>
    </div>
</section>