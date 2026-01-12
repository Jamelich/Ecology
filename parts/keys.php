<?php
/**
 * Template Name: Keyses Posts Grid Block
 * 
 * Выводит сетку постов WordPress с ленивой загрузкой
 * Использует стандартные функции WordPress
 * 
 * Структура:
 * - HTML разметка сетки
 * - PHP логика вывода постов
 */

// Создаем nonce для использования в шаблоне
$keyses_nonce = wp_create_nonce('keyses_posts_grid_nonce');
?>

<section id="keyses" class="keyses-section keyses-posts-grid">
    <div class="keyses-container container">
        <h2 class="keyses-section-title">Свежие проекты компании</h2>
        <p class="keyses-section-subtitle">Примеры реализованных проектов в области экологии</p>
        
        <div class="keyses-posts-grid-wrapper" id="keysesPostsGrid">
            <div class="keyses-posts-grid-inner" id="keysesPostsGridInner">
                <?php
                // Первоначальная загрузка 4 постов
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
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
                else : ?>
                    <p class="keyses-no-posts">Посты не найдены.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
        // Проверяем, есть ли еще посты для подгрузки
        $total_posts = wp_count_posts()->publish;
        $total_pages = ceil($total_posts / 4);
        ?>
        
        <?php if ($total_pages > 1) : ?>
        <div class="keyses-posts-grid-load-more">
            <button class="keyses-btn keyses-btn-load-more" 
                    id="keysesLoadMorePosts" 
                    data-keyses-page="1" 
                    data-keyses-total-pages="<?php echo esc_attr($total_pages); ?>">
                <span class="keyses-btn-text">Показать еще</span>
                <span class="keyses-btn-loading" style="display: none;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="keyses-loading-spinner">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" stroke-dasharray="90" stroke-dashoffset="0">
                            <animateTransform attributeName="transform" type="rotate" from="0 12 12" to="360 12 12" dur="1s" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </span>
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Локализация скрипта
window.keysesPostsGridAjax = {
    ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
    nonce: '<?php echo esc_js($keyses_nonce); ?>'
};
</script>