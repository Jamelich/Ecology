<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'wpprog_theme_options');
function wpprog_theme_options()
{
    // страница опций
    Container::make('theme_options', __('Опции темы'))
        ->set_icon('dashicons-admin-generic')
        // ->set_page_parent('options-general.php')
        ->add_tab(__('Уникальное торговое предложение'), array(
            Field::make('media_gallery', 'utp_slider_pc', 'Галерея ПК')
                ->set_type(['image'])
                ->set_help_text('Если картинка только одна, будет просто баннер, если больше - слайдер'),
            Field::make('media_gallery', 'utp_slider_mob', 'Галерея Моб')
                ->set_type(['image'])
                ->set_help_text('Если картинка только одна, будет просто баннер, если больше - слайдер')
        ))

        ->add_tab(__('Блок раскрытия информации (о компании)'), array(
            Field::make('rich_text', 'reneval_text', 'Текст блока')->set_width(80),
            Field::make('media_gallery', 'reneval_gallery', 'Фото блока для слайдера')->set_type(['image'])
        ))

        ->add_tab(__('Блок суперпредложения'), array(
            Field::make('image', 'super_offer_photo', __('Фото'))->set_value_type('url')->set_width(25),
            Field::make('text', 'super_offer_name', __('Название'))->set_width(25),
            Field::make('text', 'super_offer_subheader', __('Подзаголовок'))->set_width(45),
            Field::make('rich_text', 'super_offer_desc', __('Описание')),
            Field::make('complex', 'super_offer_table', __('Строки таблицы'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'date', __('Дата сдачи')),
                    Field::make('rich_text', 'name', __('Наименование отчетности')),
                    Field::make('text', 'price', __('Стоимость')),
                    Field::make('date', 'deadline_date', __('Дата дедлайна'))
                        ->set_storage_format('Y-m-d'),
                ))
        ))

        ->add_tab(__('Блок отстройки от конкурентов'), array(
            Field::make('complex', 'compare_items', __('Услуги для сравнения'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'compare_service_title', __('Название услуги')),
                    Field::make('text', 'compare_competitor_price', __('Цена у конкурентов'))
                        ->set_attribute('placeholder', 'от 5 000'),
                    Field::make('text', 'compare_our_price', __('Наша цена'))
                        ->set_attribute('placeholder', 'от 4 000'),
                    Field::make('text', 'compare_saving_amount', __('Сумма экономии'))
                        ->set_attribute('placeholder', '1 000'),
                    Field::make('text', 'compare_saving_percent', __('Процент экономии'))
                        ->set_attribute('placeholder', '20')
                        ->set_attribute('max', '100')
                        ->set_attribute('type', 'number'),
                ))
        ))

        ->add_tab(__('Лид-блок'), array(
            Field::make('image', 'photo_man', __('Фото менеджера'))->set_value_type('url')->set_width(50),
            Field::make('image', 'bg_manager_photo', 'Фоновое фото')->set_value_type('url')->set_width(50)
        ))

        ->add_tab(__('Видеоотзывы'), array(
            Field::make('complex', 'video_reviews', __('Видеоотзывы'))
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'link_rutube', __('Ссылка на видеоотзыв Rutube'))
                        ->set_help_text('Ссылка на видео Rutube в таком виде: https://rutube.ru/video/2da5d9e385fb9491382d847330c04265/?r=wd')
                        ->set_width(50),
                    Field::make('image', 'preview_rutube', 'Фото заглушка')->set_value_type('url')
                        ->set_width(50)
                ))
        ))

        ->add_tab(__('Слайдер с документами (рекомендательные письма/отзывы)'), array(
            Field::make('media_gallery', 'image_review', 'Галерея с отзывами')
                ->set_type(['image'])
        ))

        ->add_tab(__('Акции'), array(
            Field::make('complex', 'promotions', __('Акции'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', __('Заголовок акции')),
                    Field::make('textarea', 'description', __('Описание акции')),
                    Field::make('text', 'discount', __('Скидка/бонус')),
                    Field::make('text', 'button_text', __('Текст кнопки')),
                    Field::make('text', 'button_link', __('Ссылка кнопки')),
                ))

        ))

        ->add_tab(__('Слайдер с логотипами клиентов'), array(
            Field::make('media_gallery', 'image_logo', 'Логотипы')
                ->set_type(['image'])
        ))

        ->add_tab(__('Блок FAQ'), array(
            Field::make('complex', 'faq_items', __('Вопросы и ответы'))
                ->add_fields(array(
                    Field::make('text', 'question', __('Вопрос'))
                        ->set_required(true),
                    Field::make('rich_text', 'answer', __('Ответ'))
                        ->set_required(true),
                ))
                ->set_layout('tabbed-horizontal')
        ))

        ->add_tab(__('Контакты'), array(
            Field::make('text', 'phone1', __('Номер телефона 1'))->set_width(50),
            Field::make('text', 'phone2', __('Номер телефона 2'))->set_width(50),
            Field::make('text', 'address', __('Адрес'))->set_width(33),
            Field::make('text', 'email', __('Почта'))->set_width(33),
            Field::make('text', 'worktime', __('Время работы'))->set_width(33),
            Field::make('text', 'vk_link', __('Ссылка на ВК'))->set_width(33),
            Field::make('text', 'tg_link', __('Ссылка на Telegram'))->set_width(33),
            Field::make('text', 'max_link', __('Ссылка на Max'))->set_width(33),
            Field::make('rich_text', 'rekv', __('Реквизиты'))->set_width(50),
            Field::make('rich_text', 'code_map', __('Код карты'))->set_width(50),
            Field::make('image', 'manager_photo', 'Фото менеджера')->set_value_type('url')->set_width(10),
            Field::make('rich_text', 'slogan', __('Девиз компании (слоган)'))->set_width(50),
            Field::make('text', 'manager_phone', 'Телефон менеджера')->set_width(33),
            Field::make('text', 'manager_name', 'Имя менеджера')->set_width(33),
            Field::make('text', 'manager_job_title', 'Должность')->set_width(33),
            Field::make('text', 'yandex_maps_api_key', __('API ключ Яндекс Карт'))->set_help_text('Получите ключ на https://developer.tech.yandex.ru/'),
        ));

    Container::make('post_meta', 'Данные проекта')
        ->where('post_type', '=', 'post') // Только для стандартных записей
        ->add_fields([
            Field::make('text', 'project_number', 'Номер из ПДФ')
                ->set_help_text('Номер строки из таблицы ПДФ')
                ->set_width(33),
            Field::make('text', 'project_start_date', 'Дата начала работ')
                ->set_help_text('Вводите в любом формате: 04.2025, апрель 2025, 2025-04-01 и т.д.')
                ->set_width(33),
            Field::make('text', 'project_end_date', 'Дата окончания работ')
                ->set_help_text('Вводите в любом формате: 06.2025, июнь 2025, 2025-06-01 и т.д.')
                ->set_width(33),
        ]);

    // ======= ВТОРОЙ КОНТЕЙНЕР =======
    // ======= РАЗДЕЛ "УСЛУГИ" =======
    Container::make('theme_options', __('Услуги'))
        ->set_icon('dashicons-clipboard')

        ->add_tab(__('Экологическое проектирование'), array(
            Field::make('complex', 'services_design_air', __('Воздух'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_design_waste', __('Отходы'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_design_water', __('Вода'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_design_construction', __('Документация для строительных организаций'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),
        ))

        ->add_tab(__('Экологическая отчетность'), array(
            Field::make('complex', 'services_reporting_declarations', __('Декларации и формы отчетности'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_reporting_ker', __('Комплексное экологическое разрешение'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_reporting_registration', __('Постановка на учет и учетные мероприятия'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),

            Field::make('complex', 'services_reporting_calculations', __('Расчеты, сборы, нормативы'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽")')),
                )),
        ))

        ->add_tab(__('Экологическое сопровождение'), array(
            Field::make('complex', 'services_support', __('Услуги сопровождения'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽" или "Цена по запросу")')),
                )),
        ))

        ->add_tab(__('Анализы'), array(
            Field::make('complex', 'services_analyses', __('Лабораторные анализы'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'name', __('Название услуги')),
                    Field::make('text', 'price', __('Цена (формат: "от X XXX ₽" или "Цена по запросу")')),
                )),
        ));
}

// Удаление автоматических <br> и <p> в Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');


// Добавляем колонку с миниатюрой для стандартных записей (post)
add_filter('manage_posts_columns', 'add_post_thumbnail_column');

function add_post_thumbnail_column($columns)
{
    $new_columns = array();

    foreach ($columns as $key => $title) {
        $new_columns[$key] = $title;
        if ($key === 'title') {
            $new_columns['post_thumbnail'] = 'Миниатюра';
        }
    }
    return $new_columns;
}

add_action('manage_posts_custom_column', 'display_post_thumbnail_column', 10, 2);

function display_post_thumbnail_column($column_name, $post_id)
{
    if ($column_name === 'post_thumbnail') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(80, 80));
        } else {
            echo '<div style="width:80px; height:80px; background:#f0f0f0; display:flex; align-items:center; justify-content:center; color:#999; font-size:11px; font-weight:bold; border:1px solid #ddd;">no image</div>';
        }
    }
}
