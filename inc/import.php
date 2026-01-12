<?php
/**
 * Одноразовый скрипт импорта проектов из PDF
 * Добавить в functions.php, он запустится сразу и один раз
 * ПОТОМ УДАЛИТЬ ИЗ functions.php!
 */

// Запускаем сразу при загрузке
if (current_user_can('administrator')) {
    run_project_import();
}

function run_project_import() {
    // ОПЦИИ
    $clear_posts = true; // true = удалить все посты перед импортом
    $test_mode = true;   // true = импортировать только 5 записей для теста
    
    // 1. Очистка старых записей (если нужно)
    if ($clear_posts) {
        clear_all_posts('post');
    }
    
    // 2. Создаем рубрики (только если не существуют)
    create_categories_from_work_types();
    
    // 3. Импортируем проекты
    $imported = import_projects($test_mode);
    
    // Сообщение в админку
    add_action('admin_notices', function() use ($imported, $test_mode) {
        echo '<div class="notice notice-success"><p>';
        echo '<strong>Импорт проектов завершен!</strong><br>';
        echo 'Импортировано проектов: ' . $imported . '<br>';
        if ($test_mode) echo 'ТЕСТОВЫЙ РЕЖИМ (только 5 записей)';
        echo '</p></div>';
    });
}

function clear_all_posts($post_type) {
    $posts = get_posts([
        'post_type' => $post_type,
        'numberposts' => -1,
        'post_status' => 'any',
        'fields' => 'ids'
    ]);
    
    foreach ($posts as $post_id) {
        wp_delete_post($post_id, true);
    }
    return count($posts);
}

function create_categories_from_work_types() {
    // ВСЕ уникальные виды работ из колонки "Вид работ" в PDF
    $unique_work_types = [
        'Разработка и согласование прочих СОС',
        'Разработка и согласование прочих СНА, 29',
        'Разработка и согласование проекта СЗЗ',
        'Разработка и согласование проекта ООС',
        'Разработка и согласование проекта ООС, ОДИ',
        'Разработка и согласование проекта ООС, ТР',
        'Разработка и согласование проектов ПМООС, СЗЗ',
        'Разработка и согласование проектов СЗЗ и ООС',
        'Разработка и согласование проекта ООС, ОДП',
        'Декларация о плате НВОС, Отчет по форме 2-ТП (воздух), Отчет по форме 2-ТП (отходы), Отчет ПЭК, Ведение Журнала учёта отходов на предприятии (годовая форма)',
        'Разработка и согласование проекта НДВ, Инвентаризация, ПЭК, НМУ, постановка на учёт объекта НВОС',
        'Разработка и согласование проектов ПДВ, СЗЗ, НМУ',
        'Разработка и согласование проекта СЗЗ и ООС',
    ];
    
    foreach ($unique_work_types as $work_type) {
        $name = trim($work_type);
        
        // Проверяем по ИМЕНИ (а не по слагу)
        if (!term_exists($name, 'category')) {
            $result = wp_insert_term(
                $name, 
                'category', 
                ['slug' => sanitize_title($name)]
            );
            
            // Если ошибка (например, слаг уже существует), пробуем с уникальным слагом
            if (is_wp_error($result) && $result->get_error_code() === 'term_exists') {
                $unique_slug = sanitize_title($name) . '-' . uniqid();
                wp_insert_term($name, 'category', ['slug' => $unique_slug]);
            }
        }
    }
}

function import_projects($test_mode = true) {
    // НОРМАЛЬНЫЕ данные из PDF (референс 16-20)
    // ВНИМАНИЕ: ИНН/ОГРН удалены из названий компаний
    $projects = [
        [
            'title' => 'Индивидуальный предприниматель Абдурахманова Фатма Джеватовна',
            'content' => '«Автомобильная автомойка, расположенная по адресу Темрюкский район, ст.Тамань ул.Пролетарская, 83»',
            'rubric' => 'Разработка и согласование проекта СЗЗ',
            'start_date' => '10.2024',
            'end_date' => '06.2025',
        ],
        [
            'title' => 'ООО «ГК АЛЬФАСТРОЙДЕВЕЛОПМЕНТ»',
            'content' => '«Складское здание по адресу: Московская область, Раменский район, с.п. Софьинское, вблизи п. РАОС, уч. 603 стр. 7-8 (3 очередь)»',
            'rubric' => 'Разработка и согласование проекта ООС',
            'start_date' => '10.2024',
            'end_date' => '05.2025',
        ],
        [
            'title' => 'ООО «ГК АЛЬФАСТРОЙДЕВЕЛОПМЕНТ»',
            'content' => 'МОУ «СОШ № 1» (ДО) здание 2, по адресу: Московская область, г. Егорьевск, 2 микрорайон, д.33а',
            'rubric' => 'Разработка и согласование проекта ООС, ОДИ',
            'start_date' => '09.2024',
            'end_date' => '06.2025',
        ],
        [
            'title' => 'ООО "ИНЖИНИРИНГ-М"',
            'content' => 'Здание учебного корпуса по адресу: г. Вологда, ул. Ильюшина, д. 23, в рамках проекта "Модернизация СПО" Вологда',
            'rubric' => 'Разработка и согласование проекта ООС, ОДИ',
            'start_date' => '07.2024',
            'end_date' => '11.2024',
        ],
        [
            'title' => 'ООО «СЗ «Самолет - Пушкино»',
            'content' => 'Кластер ИЖС «Пушкинский» (1-й этап (очередь) реализации проекта застройки по ДоКРТ), 1-ый этап реализации Документации по планировке территории №1 (ДПТ №1), МЖК-1(малоэтажный жилой комплекс) по адресу: Московская область, г.о. Пушкинский, в районе с. Семёновское, Этап строительства №4 (подэтапы №8-№10)',
            'rubric' => 'Разработка и согласование проекта ООС, ТР',
            'start_date' => '08.2024',
            'end_date' => '09.2024',
        ],
    ];
    
    if ($test_mode) {
        $projects = array_slice($projects, 0, 5);
    }
    
    $imported_count = 0;
    
    foreach ($projects as $project) {
        $category_ids = [];
        if (!empty($project['rubric'])) {
            $term = get_term_by('name', $project['rubric'], 'category');
            if ($term) {
                $category_ids = [$term->term_id];
            }
        }
        
        $post_id = wp_insert_post([
            'post_title'   => wp_strip_all_tags($project['title']),
            'post_content' => wpautop($project['content']),
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_category'=> $category_ids,
        ]);
        
        if ($post_id && !is_wp_error($post_id)) {
            // Заполняем CRB поля
            if (!empty($project['start_date'])) {
                update_post_meta($post_id, '_project_start_date', $project['start_date']);
            }
            if (!empty($project['end_date'])) {
                update_post_meta($post_id, '_project_end_date', $project['end_date']);
            }
            $imported_count++;
        }
    }
    
    return $imported_count;
}