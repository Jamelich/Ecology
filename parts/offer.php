<?php
/**
 * Блок "Наши услуги в виде карточек
 * Префикс: esa-offer
 */

// Получаем данные из Carbon Fields
$design_air = carbon_get_theme_option('services_design_air');
$design_waste = carbon_get_theme_option('services_design_waste');
$design_water = carbon_get_theme_option('services_design_water');
$design_construction = carbon_get_theme_option('services_design_construction');
$reporting_declarations = carbon_get_theme_option('services_reporting_declarations');
$reporting_ker = carbon_get_theme_option('services_reporting_ker');
$reporting_registration = carbon_get_theme_option('services_reporting_registration');
$reporting_calculations = carbon_get_theme_option('services_reporting_calculations');
$support = carbon_get_theme_option('services_support');
$analyses = carbon_get_theme_option('services_analyses');

// Формируем структуру аналогично оригинальному массиву
$esa_service_categories = [];

// 1. Экологическое проектирование
if ($design_air || $design_waste || $design_water || $design_construction) {
    $design_sections = [];
    
    if ($design_air && is_array($design_air)) {
        $design_sections[] = [
            'name' => 'Воздух',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $design_air)
        ];
    }
    
    if ($design_waste && is_array($design_waste)) {
        $design_sections[] = [
            'name' => 'Отходы',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $design_waste)
        ];
    }
    
    if ($design_water && is_array($design_water)) {
        $design_sections[] = [
            'name' => 'Вода',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $design_water)
        ];
    }
    
    if ($design_construction && is_array($design_construction)) {
        $design_sections[] = [
            'name' => 'Документация для проектных и строительных организаций',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $design_construction)
        ];
    }
    
    if (!empty($design_sections)) {
        $esa_service_categories[] = [
            'title' => 'Экологическое проектирование',
            'subtitle' => 'Разработка и согласование проектной экологической документации "под ключ"',
            'sections' => $design_sections
        ];
    }
}

// 2. Экологическая отчетность
if ($reporting_declarations || $reporting_ker || $reporting_registration || $reporting_calculations) {
    $reporting_sections = [];
    
    if ($reporting_declarations && is_array($reporting_declarations)) {
        $reporting_sections[] = [
            'name' => 'Декларации и формы отчетности',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $reporting_declarations)
        ];
    }
    
    if ($reporting_ker && is_array($reporting_ker)) {
        $reporting_sections[] = [
            'name' => 'Комплексное экологическое разрешение',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $reporting_ker)
        ];
    }
    
    if ($reporting_registration && is_array($reporting_registration)) {
        $reporting_sections[] = [
            'name' => 'Постановка на учет и учетные мероприятия',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $reporting_registration)
        ];
    }
    
    if ($reporting_calculations && is_array($reporting_calculations)) {
        $reporting_sections[] = [
            'name' => 'Расчеты, сборы, нормативы',
            'services' => array_map(function($item) {
                return ['name' => $item['name'], 'price_display' => $item['price']];
            }, $reporting_calculations)
        ];
    }
    
    if (!empty($reporting_sections)) {
        $esa_service_categories[] = [
            'title' => 'Экологическая отчетность',
            'subtitle' => '',
            'sections' => $reporting_sections
        ];
    }
}

// 3. Комплексное экологическое сопровождение
if ($support && is_array($support)) {
    $esa_service_categories[] = [
        'title' => 'Комплексное экологическое сопровождение предприятий',
        'subtitle' => 'Полный комплекс услуг: аудит, разработка, сдача отчетности, контроль, защита интересов Вашего предприятия.',
        'services' => array_map(function($item) {
            return ['name' => $item['name'], 'price_display' => $item['price']];
        }, $support)
    ];
}

// 4. Анализы
if ($analyses && is_array($analyses)) {
    $esa_service_categories[] = [
        'title' => 'Анализы',
        'subtitle' => 'Проводим официально исследования/измерения согласно требованиям природоохранного законодательства и надзорных органов.',
        'services' => array_map(function($item) {
            return ['name' => $item['name'], 'price_display' => $item['price']];
        }, $analyses)
    ];
}
?>

<section class="esa-offer-section" id="esa-offer">
    <div class="container">
        <h2 class="esa-offer-title">
            Наши услуги
        </h2>
        <p class="esa-offer-subtitle">
            Комплекс экологических услуг для предприятий любого масштаба.
        </p>

        <?php if (!empty($esa_service_categories)): ?>
            <?php foreach ($esa_service_categories as $catIndex => $category): ?>
                <div class="esa-offer-category">
                    <h3 class="esa-offer-category-title"><?php echo esc_html($category['title']); ?></h3>
                    <?php if (!empty($category['subtitle'])): ?>
                        <p class="esa-offer-category-subtitle"><?php echo esc_html($category['subtitle']); ?></p>
                    <?php endif; ?>

                    <div class="esa-offer-wrapper">
                        <?php if (isset($category['sections'])): ?>
                            <?php foreach ($category['sections'] as $sectionIndex => $section): ?>
                                <div class="esa-offer-card">
                                    <div class="esa-offer-card-header">
                                        <h4 class="esa-offer-card-title"><?php echo esc_html($section['name']); ?></h4>
                                    </div>
                                    <div class="esa-offer-card-body">
                                        <ul class="esa-offer-prices-list">
                                            <?php foreach ($section['services'] as $service): ?>
                                                <li class="esa-offer-price-item">
                                                    <span class="esa-offer-service-name"><?php echo esc_html($service['name']); ?></span>
                                                    <div class="esa-offer-price-wrapper">
                                                        <span class="esa-offer-our-price"><?php echo esc_html($service['price_display']); ?></span>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php elseif (isset($category['services'])): ?>
                            <div class="esa-offer-card esa-offer-card-wide">
                                <div class="esa-offer-card-header">
                                    <h4 class="esa-offer-card-title"><?php echo esc_html($category['title']); ?></h4>
                                </div>
                                <div class="esa-offer-card-body">
                                    <ul class="esa-offer-prices-list">
                                        <?php foreach ($category['services'] as $service): ?>
                                            <li class="esa-offer-price-item">
                                                <span class="esa-offer-service-name"><?php echo esc_html($service['name']); ?></span>
                                                <div class="esa-offer-price-wrapper">
                                                    <span class="esa-offer-our-price"><?php echo esc_html($service['price_display']); ?></span>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="esa-offer-notice">
                <p>Услуги пока не добавлены. Заполните раздел "Услуги" в админке.</p>
            </div>
        <?php endif; ?>

        <div class="esa-offer-notice">
            <p>
                <strong>Внимание:</strong> Окончательная стоимость рассчитывается индивидуально
                после анализа конкретных задач и особенностей вашего предприятия.
                Указанные цены являются ориентировочными.
            </p>
        </div>
    </div>
</section>