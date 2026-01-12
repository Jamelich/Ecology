<?php
/**
 * Блок "Наши услуги компании TexoБорнЭксперт" в виде карточек
 * Префикс: esa-offer
 */

$esa_service_categories = [
    [
        'title' => 'Экологическое проектирование',
        'subtitle' => 'Проектирование и согласование экологической документации для любых объектов. Разработка проектов НДВ, СЗЗ, ЗСО, НДС, ПНООЛР и других решений в области охраны окружающей среды.',
        'sections' => [
            [
                'name' => 'Воздух',
                'services' => [
                    ['name' => 'Проект ПДВ', 'original_price' => 30000],
                    ['name' => 'Проект НДВ', 'original_price' => 30000],
                    ['name' => 'Проект санитарно-защитной зоны (СЗЗ)', 'original_price' => 75000],
                    ['name' => 'Оценка риска для проекта СЗЗ', 'original_price' => 80000],
                    ['name' => 'Контроль выбросов', 'original_price' => 900],
                    ['name' => 'Инвентаризация выбросов', 'original_price' => 15000],
                    ['name' => 'План мероприятий при НМУ', 'original_price' => 20000],
                    ['name' => 'Расчет парниковых газов', 'original_price' => 5000],
                    ['name' => 'Разработка ООС (оценка воздействия на окружающую среду)', 'original_price' => 50000]
                ]
            ],
            [
                'name' => 'Отходы',
                'services' => [
                    ['name' => 'Проект нормативов образования отходов и лимитов на их размещение (ПНООЛР)', 'original_price' => 15000],
                    ['name' => 'Паспорт отходов/паспортизация отходов', 'original_price' => 4200],
                    ['name' => 'Расчет класса опасности', 'original_price' => 4000],
                    ['name' => 'Побочные продукты животноводства', 'original_price' => 30000],
                    ['name' => 'Программа экологического контроля (ПЭК)', 'original_price' => 10900],
                    ['name' => 'Инвентаризация отходов', 'original_price' => 15000],
                    ['name' => 'Лицензия по обращению с опасными отходами', 'original_price' => 250000],
                    ['name' => 'Внесение в реестр утилизаторов отходов', 'original_price' => 1000000]
                ]
            ],
            [
                'name' => 'Вода',
                'services' => [
                    ['name' => 'Проект нормативов допустимых сбросов (НДС)', 'original_price' => 120000],
                    ['name' => 'Проект зоны санитарной охраны (ЗСО)', 'original_price' => 80000],
                    ['name' => 'Решение о водопользовании', 'original_price' => 80000],
                    ['name' => 'Регистрация водного объекта в ГВР', 'original_price' => 80000]
                ]
            ],
            [
                'name' => 'Лес',
                'services' => [
                    ['name' => 'Проект освоения лесов', 'original_price' => 30000]
                ]
            ]
        ]
    ],
    [
        'title' => 'Экологическая отчетность и НВОС',
        'subtitle' => 'Отчетность по экологии, НВОС, ПЭК, журналам учета отходов и декларациям. Постановка на учет объектов, расчет платы, контроль источников негативного воздействия.',
        'sections' => [
            [
                'name' => 'Декларации и формы отчетности',
                'services' => [
                    ['name' => 'Декларация платы за НВОС', 'original_price' => 8500],
                    ['name' => '2-ТП Отчеты', 'original_price' => 4200],
                    ['name' => 'Форма № 2-Медотходы', 'original_price' => 6500],
                    ['name' => 'Отчет по ПЭК', 'original_price' => 9900],
                    ['name' => 'Журнал учета движения отходов', 'original_price' => 6000],
                    ['name' => 'Декларация ДВОС (для 2 категории)', 'original_price' => 20000],
                    ['name' => 'Отчеты по воде', 'original_price' => 6500],
                    ['name' => 'Отчетность по формам 3.1 3.2 3.3', 'original_price' => 15600]
                ]
            ],
            [
                'name' => 'Комплексное экологическое разрешение',
                'services' => [
                    ['name' => 'КЭР (Комплексное экологическое разрешение)', 'original_price' => 100000],
                    ['name' => 'НДТ – наилучшие доступные технологии', 'original_price' => 100000],
                    ['name' => 'ППЭЭ – программа повышения экологической эффективности', 'original_price' => 300000],
                    ['name' => 'ОВОС – оценка воздействия на окружающую среду', 'original_price' => 90000]
                ]
            ],
            [
                'name' => 'Постановка на учет и учетные мероприятия',
                'services' => [
                    ['name' => 'Постановка на государственный учет объекта НВОС/Актуализация категории', 'original_price' => 15000],
                    ['name' => 'Отчетность по категориям НВОС', 'original_price' => 3900]
                ]
            ],
            [
                'name' => 'Расчеты, сборы, нормативы',
                'services' => [
                    ['name' => 'Экологический сбор', 'original_price' => 12000],
                    ['name' => 'Кадастр отходов', 'original_price' => 10500]
                ]
            ]
        ]
    ],
    [
        'title' => 'Комплексное экологическое сопровождение предприятий и организаций',
        'subtitle' => 'Полный комплекс услуг: контроль, аудит, разработка, отчетность.',
        'services' => [
            ['name' => 'Экологическое сопровождение предприятий и организаций', 'original_price' => 5000],
            ['name' => 'Экологический аудит', 'original_price' => 0],
            ['name' => 'ESG-консалтинг', 'original_price' => 0],
            ['name' => 'Юридическое сопровождение (Юрист по экологическому праву)', 'original_price' => 0],
            ['name' => 'Специальная оценка условий труда (СОУТ) на предприятиях', 'original_price' => 0],
            ['name' => 'Вступление в реестр медицинских организаций', 'original_price' => 0]
        ]
    ],
    [
        'title' => 'Анализы',
        'subtitle' => 'Проводим исследования на официальной основе. Все протоколы соответствуют требованиям законодательства и надзорных органов.',
        'services' => [
            ['name' => 'Анализ отходов', 'original_price' => 0],
            ['name' => 'Количественный химанализ (КХА)', 'original_price' => 0],
            ['name' => 'Анализ выбросов', 'original_price' => 0],
            ['name' => 'Определение класса токсичности отходов', 'original_price' => 0],
            ['name' => 'Биотестирование', 'original_price' => 0]
        ]
    ],
    [
        'title' => 'Обучение',
        'subtitle' => 'Поможем получить и систематизировать знания в сфере экологического проектирования и лицензирования, а также охраны труда.',
        'sections' => [
            [
                'name' => 'Обучение по проектированию экологической документации',
                'services' => [
                    ['name' => 'Обучение по разработке и проектированию ПДВ для предприятий', 'original_price' => 0],
                    ['name' => 'Обучение разработке и согласованию проекта санитарно-защитной зоны (проектирование СЗЗ)', 'original_price' => 0]
                ]
            ],
            [
                'name' => 'Обучение по экологии и охране труда для организаций',
                'services' => [
                    ['name' => 'Обращение с отходами', 'original_price' => 0],
                    ['name' => 'Охрана труда', 'original_price' => 0],
                    ['name' => 'Оказание первой помощи', 'original_price' => 0],
                    ['name' => 'Пожарная безопасность', 'original_price' => 0],
                    ['name' => 'Гражданская оборона и защита от ЧС', 'original_price' => 0]
                ]
            ]
        ]
    ]
];
?>

<section class="esa-offer-section" id="esa-offer">
    <div class="container">
        <h2 class="esa-offer-title">
            Наши услуги
        </h2>
        <p class="esa-offer-subtitle">
            Комплекс экологических услуг для предприятий и организаций любого масштаба.
        </p>

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
                                        <?php foreach ($section['services'] as $service): 
                                            if ($service['original_price'] > 0) {
                                                $discount = rand(1, 3) * 500;
                                                $our_price = max($service['original_price'] - $discount, 1000);
                                                $price_display = 'от ' . number_format($our_price, 0, '', ' ') . ' ₽';
                                            } else {
                                                $price_display = 'Цена по запросу';
                                            }
                                        ?>
                                            <li class="esa-offer-price-item">
                                                <span class="esa-offer-service-name"><?php echo esc_html($service['name']); ?></span>
                                                <div class="esa-offer-price-wrapper">
                                                    <span class="esa-offer-our-price"><?php echo $price_display; ?></span>
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
                                    <?php foreach ($category['services'] as $service): 
                                        if ($service['original_price'] > 0) {
                                            $discount = rand(1, 3) * 500;
                                            $our_price = max($service['original_price'] - $discount, 1000);
                                            $price_display = 'от ' . number_format($our_price, 0, '', ' ') . ' ₽';
                                        } else {
                                            $price_display = 'Цена по запросу';
                                        }
                                    ?>
                                        <li class="esa-offer-price-item">
                                            <span class="esa-offer-service-name"><?php echo esc_html($service['name']); ?></span>
                                            <div class="esa-offer-price-wrapper">
                                                <span class="esa-offer-our-price"><?php echo $price_display; ?></span>
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

        <div class="esa-offer-notice">
            <p>
                <strong>Внимание:</strong> Окончательная стоимость рассчитывается индивидуально 
                после анализа конкретных задач и особенностей вашего предприятия.
                Указанные цены являются ориентировочными.
            </p>
        </div>
    </div>
</section>