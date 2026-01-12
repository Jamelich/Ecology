<?php get_header(); ?>

<?php get_template_part('parts/utp-banner'); /* Блок УТП. Если в настройках только 1 картинка,выведется просто баннер, если больше - будет слайдер */ ?>
<?php get_template_part('parts/about-reneval'); /* Блок раскрытия информации (о компании) */ ?>
<?php get_template_part('parts/super-offer'); /* Блоу супероффер */ ?>
<?php /* get_template_part('parts/material');*/ ?>
<?php /* get_template_part('parts/gallery');*/ ?>
<?php get_template_part('parts/compare');/* Блок отстройки от конкурентов */ ?>
<?php get_template_part('parts/offer'); /* Список услуг */ ?>
<?php get_template_part('parts/client-logos'); /* Список услуг */ ?>
<?php get_template_part('parts/video-reviews'); /* Блок с видеоотзывами */ ?>
<?php get_template_part('parts/keys'); /* Блок с кейсами */ ?>
<?php get_template_part('parts/arguments'); /* Блок аргументации клиента */ ?>
<?php get_template_part('parts/lead-block'); /* Блок с фото менеджера и контактами */ ?>
<?php get_template_part('parts/image-review'); /* Блок с благодарностями */ ?>
<?php get_template_part('parts/promotions'); /* Блок с акциями */ ?>
<?php get_template_part('parts/faq'); ?>
<?php get_template_part('parts/steps'); ?>
<?php get_template_part('parts/map'); ?>
<?php get_template_part('parts/vk');?>

<?php get_footer();
