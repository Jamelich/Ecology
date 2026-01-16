<?php
// Одноразовый скрипт для заполнения услуг
add_action('admin_init', 'fill_services_onetime');
function fill_services_onetime() {
    if (get_option('services_filled_v1')) return;
    
    // 1. ВОЗДУХ
    $air_services = array(
        array('name' => 'Проект ПДВ', 'price' => 'от 27 000 ₽'),
        array('name' => 'Проект НДВ', 'price' => 'от 27 000 ₽'),
        array('name' => 'Проект санитарно-защитной зоны (СЗЗ)', 'price' => 'от 70 000 ₽'),
        array('name' => 'Оценка риска для проекта СЗЗ', 'price' => 'от 75 000 ₽'),
        array('name' => 'Контроль выбросов', 'price' => 'от 800 ₽'),
        array('name' => 'Инвентаризация выбросов', 'price' => 'от 13 500 ₽'),
        array('name' => 'План мероприятий при НМУ', 'price' => 'от 18 000 ₽'),
        array('name' => 'Расчет парниковых газов', 'price' => 'от 4 500 ₽'),
        array('name' => 'Мероприятия по охране окружающей среды. Раздел ООС', 'price' => 'от 40 000 ₽'),
        array('name' => 'Разработка ОВОС (оценка воздействия на окружающую среду)', 'price' => 'от 45 000 ₽')
    );
    carbon_set_theme_option('services_design_air', $air_services);
    
    // 2. ОТХОДЫ
    $waste_services = array(
        array('name' => 'Проект нормативов образования отходов и лимитов на их размещение (ПНООЛР)', 'price' => 'от 13 500 ₽'),
        array('name' => 'Паспорт отходов/паспортизация отходов', 'price' => 'от 4 000 ₽'),
        array('name' => 'Расчет класса опасности', 'price' => 'от 3 600 ₽'),
        array('name' => 'Программа экологического контроля (ПЭК)', 'price' => 'от 9 900 ₽'),
        array('name' => 'Инвентаризация отходов', 'price' => 'от 13 500 ₽')
    );
    carbon_set_theme_option('services_design_waste', $waste_services);
    
    // 3. ВОДА
    $water_services = array(
        array('name' => 'Проект нормативов допустимых сбросов (НДС)', 'price' => 'от 115 000 ₽'),
        array('name' => 'Проект зоны санитарной охраны (ЗСО)', 'price' => 'от 75 000 ₽'),
        array('name' => 'Решение о водопользовании', 'price' => 'от 75 000 ₽'),
        array('name' => 'Регистрация водного объекта в ГВР', 'price' => 'от 75 000 ₽')
    );
    carbon_set_theme_option('services_design_water', $water_services);
    
    // 4. ДОКУМЕНТАЦИЯ ДЛЯ СТРОИТЕЛЬНЫХ ОРГАНИЗАЦИЙ
    $construction_services = array(
        array('name' => 'Отчет ИЭИ (Инженерно-экологические изыскания)', 'price' => 'от 35 000 ₽'),
        array('name' => 'Раздел ООС/ПМООС для разных категорий объектов (Мероприятия по охране окружающей среды)', 'price' => 'от 35 000 ₽'),
        array('name' => 'Раздел ЭЭ (Энергоэффективность)', 'price' => 'от 30 000 ₽'),
        array('name' => 'Проект СЗЗ (Санитарно-защитной зоны)', 'price' => 'от 70 000 ₽'),
        array('name' => 'Паспорта на строительные отходы', 'price' => 'от 3 500 ₽'),
        array('name' => 'Постановка на учет объекта НВОС', 'price' => 'от 10 000 ₽')
    );
    carbon_set_theme_option('services_design_construction', $construction_services);
    
    // 5. ДЕКЛАРАЦИИ И ФОРМЫ ОТЧЕТНОСТИ
    $declarations_services = array(
        array('name' => 'Декларация платы за НВОС', 'price' => 'от 8 500 ₽'),
        array('name' => '2-ТП Отчеты', 'price' => 'от 4 200 ₽'),
        array('name' => 'Отчет по ПЭК', 'price' => 'от 9 900 ₽'),
        array('name' => 'Журнал учета движения отходов', 'price' => 'от 5 500 ₽'),
        array('name' => 'Декларация ДВОС (для 2 категории)', 'price' => 'от 18 000 ₽'),
        array('name' => 'Отчеты по воде', 'price' => 'от 6 000 ₽'),
        array('name' => 'Отчетность по формам 3.1 3.2 3.3', 'price' => 'от 14 500 ₽')
    );
    carbon_set_theme_option('services_reporting_declarations', $declarations_services);
    
    // 6. КОМПЛЕКСНОЕ ЭКОЛОГИЧЕСКОЕ РАЗРЕШЕНИЕ
    $ker_services = array(
        array('name' => 'КЭР (Комплексное экологическое разрешение)', 'price' => 'от 95 000 ₽'),
        array('name' => 'НДТ – наилучшие доступные технологии', 'price' => 'от 95 000 ₽'),
        array('name' => 'ППЭЭ – программа повышения экологической эффективности', 'price' => 'от 285 000 ₽')
    );
    carbon_set_theme_option('services_reporting_ker', $ker_services);
    
    // 7. ПОСТАНОВКА НА УЧЕТ
    $registration_services = array(
        array('name' => 'Постановка на государственный учет объекта НВОС/Актуализация категории', 'price' => 'от 13 500 ₽'),
        array('name' => 'Отчетность по категориям НВОС', 'price' => 'от 3 500 ₽')
    );
    carbon_set_theme_option('services_reporting_registration', $registration_services);
    
    // 8. РАСЧЕТЫ, СБОРЫ, НОРМАТИВЫ
    $calculations_services = array(
        array('name' => 'Экологический сбор', 'price' => 'от 11 000 ₽'),
        array('name' => 'Кадастр отходов', 'price' => 'от 9 500 ₽')
    );
    carbon_set_theme_option('services_reporting_calculations', $calculations_services);
    
    // 9. СОПРОВОЖДЕНИЕ
    $support_services = array(
        array('name' => 'Экологическое сопровождение предприятий', 'price' => 'от 4 500 ₽'),
        array('name' => 'Экологический аудит', 'price' => 'Цена по запросу'),
        array('name' => 'ESG-консалтинг', 'price' => 'Цена по запросу'),
        array('name' => 'Юридическое сопровождение (Юрист по экологическому праву)', 'price' => 'Цена по запросу')
    );
    carbon_set_theme_option('services_support', $support_services);
    
    // 10. АНАЛИЗЫ
    $analyses_services = array(
        array('name' => 'Анализ отходов', 'price' => 'Цена по запросу'),
        array('name' => 'Количественный химанализ (КХА)', 'price' => 'Цена по запросу'),
        array('name' => 'Анализ выбросов', 'price' => 'Цена по запросу'),
        array('name' => 'Определение класса токсичности отходов', 'price' => 'Цена по запросу'),
        array('name' => 'Биотестирование', 'price' => 'Цена по запросу')
    );
    carbon_set_theme_option('services_analyses', $analyses_services);
    
    update_option('services_filled_v1', true);
    
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible"><p>Услуги успешно добавлены! Теперь можно удалить скрипт заполнения.</p></div>';
    });
}