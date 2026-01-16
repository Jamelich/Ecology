<?php

// Подключаем свои стили
add_action('wp_enqueue_scripts', 'esa_add_style', 25);
function esa_add_style()
{

    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array());
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array());
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css', array());

    wp_enqueue_style('global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/global.css'));
    // wp_enqueue_style('esa-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/header.css'));
    wp_enqueue_style('utp-banner', get_stylesheet_directory_uri() . '/assets/css/utp-banner.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/utp-banner.css'));
    wp_enqueue_style('about-reneval', get_stylesheet_directory_uri() . '/assets/css/about-reneval.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/about-reneval.css'));
    wp_enqueue_style('super-offer', get_stylesheet_directory_uri() . '/assets/css/super-offer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/super-offer.css'));
    wp_enqueue_style('offer', get_stylesheet_directory_uri() . '/assets/css/offer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/offer.css'));
    wp_enqueue_style('arguments', get_stylesheet_directory_uri() . '/assets/css/arguments.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/arguments.css'));
    wp_enqueue_style('video-reviews', get_stylesheet_directory_uri() . '/assets/css/video-reviews.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/video-reviews.css'));
    wp_enqueue_style('keys', get_stylesheet_directory_uri() . '/assets/css/keys.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/keys.css'));
    wp_enqueue_style('image-review', get_stylesheet_directory_uri() . '/assets/css/image-review.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/image-review.css'));

    wp_enqueue_style('compare', get_stylesheet_directory_uri() . '/assets/css/compare.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/compare.css'));
    wp_enqueue_style('client-logos', get_stylesheet_directory_uri() . '/assets/css/client-logos.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/client-logos.css'));
    wp_enqueue_style('lead-block', get_stylesheet_directory_uri() . '/assets/css/lead-block.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/lead-block.css'));
    wp_enqueue_style('promotions', get_stylesheet_directory_uri() . '/assets/css/promotions.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/promotions.css'));

    wp_enqueue_style('faq', get_stylesheet_directory_uri() . '/assets/css/faq.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/faq.css'));
    wp_enqueue_style('steps', get_stylesheet_directory_uri() . '/assets/css/steps.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/steps.css'));
    wp_enqueue_style('map', get_stylesheet_directory_uri() . '/assets/css/map.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/map.css'));
    wp_enqueue_style('vk', get_stylesheet_directory_uri() . '/assets/css/vk.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/vk.css'));
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/footer.css'));

    // wp_enqueue_style('popup', get_stylesheet_directory_uri() . '/assets/css/popup.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/popup.css'));

    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.5');
    wp_enqueue_script('animate', get_stylesheet_directory_uri() . '/assets/js/animate.js', array(), '1.0.6');
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array());
    wp_enqueue_script('swiper-init', get_stylesheet_directory_uri() . '/assets/js/swiper-init.js', array(), '1.0.5');
    wp_enqueue_script('keys', get_stylesheet_directory_uri() . '/assets/js/keys.js', array(), '1.0.5');
    wp_enqueue_script('menu', get_stylesheet_directory_uri() . '/assets/js/menu.js', array(), '1.0.6');
    wp_enqueue_script('super-offer', get_stylesheet_directory_uri() . '/assets/js/super-offer.js', array(), '1.0.5');
}

// Поддержка миниатюр
add_theme_support('post-thumbnails'); // для всех типов постов

add_theme_support('custom-logo', array(
    'height'      => 72,
    'width'       => 160,
    'flex-height' => true,
    'flex-width'  => true,
));

// Регистрация меню
function esa_register_menus()
{
    register_nav_menus(array(
        'primary' => 'Основное меню в шапке',
        'footer-menu-1' => 'Меню в футере 1',
        'footer-menu-2' => 'Меню в футере 2'
    ));
}
add_action('after_setup_theme', 'esa_register_menus');

require_once(__DIR__ . '/inc/esa-functions.php');
// require_once(__DIR__ . '/inc/import_crb.php');

add_action('wp_ajax_keyses_load_more_posts', 'keyses_load_more_posts_handler');
add_action('wp_ajax_nopriv_keyses_load_more_posts', 'keyses_load_more_posts_handler');

function keyses_load_more_posts_handler() {
    // Проверка nonce
    if (!isset($_POST['nonce']) || empty($_POST['nonce'])) {
        wp_die('Nonce not set');
    }
    
    if (!wp_verify_nonce($_POST['nonce'], 'keyses_posts_grid_nonce')) {
        wp_die('Invalid nonce');
    }
    
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) : $query->the_post();
            $categories = get_the_category();
            $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Без категории';
            
            if (has_post_thumbnail()) {
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            } else {
                $image_url = get_template_directory_uri() . '/assets/img/placeholder.webp';
            }
            
            $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20, '...');
            ?>
            
            <article class="keyses-post-card" data-keyses-post-id="<?php the_ID(); ?>">
                <div class="keyses-post-card__image-wrapper">
                    <img src="<?php echo esc_url($image_url); ?>" 
                         alt="<?php the_title_attribute(); ?>" 
                         class="keyses-post-card__image">
                    <div class="keyses-post-card__overlay"></div>
                    <span class="keyses-post-card__category">
                        <?php echo $category_name; ?>
                    </span>
                    <div class="keyses-post-card__content">
                        <h3 class="keyses-post-card__title"><?php the_title(); ?></h3>
                        <div class="keyses-post-card__excerpt">
                            <?php echo wp_kses_post($excerpt); ?>
                        </div>
                        <?php if (is_user_logged_in() && current_user_can('edit_post', get_the_ID())): ?>
                            <a href="<?php echo get_edit_post_link(get_the_ID()); ?>" class="keyses-post-card__link">
                                <span>Редактировать</span>
                                <svg class="keyses-post-card__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            
        <?php endwhile;
        
        wp_reset_postdata();
        
        $output = ob_get_clean();
        
        wp_send_json_success(array(
            'html' => $output,
            'max_pages' => $query->max_num_pages,
            'current_page' => $page
        ));
    } else {
        wp_send_json_error('No posts found');
    }
    
    wp_die();
}