<?php
// Получаем видеоотзывы из Carbon Fields
$video_reviews = carbon_get_theme_option('video_reviews');

// Проверяем, есть ли видеоотзывы
if (empty($video_reviews)) {
    return;
}

// Функция для извлечения ID видео из Rutube
function get_rutube_video_id($url) {
    $pattern = '/rutube\.ru\/video\/([a-z0-9]+)/';
    preg_match($pattern, $url, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}

// Функция для получения embed кода Rutube
function get_rutube_embed_code($url) {
    $video_id = get_rutube_video_id($url);
    if (!$video_id) {
        return '';
    }
    
    return 'https://rutube.ru/play/embed/' . $video_id . '?sTitle=false&sAuthor=false&autoplay=1';
}

$has_multiple = count($video_reviews) > 1;
$use_slider_pc = count($video_reviews) >= 3; // Слайдер на ПК если 3 или больше элементов
?>

<!-- Video Reviews Section -->
<section class="video-reviews-section" data-animate-on-scroll>
    <div class="video-reviews-container">
        <div class="video-reviews-heading">
            <h2 class="video-reviews-title" data-animate="fadeInUp" data-animate-delay="0">Видеоотзывы наших клиентов</h2>
        </div>

        <?php if (!$use_slider_pc): ?>
            <!-- Desktop grid (less than 3 items) -->
            <div class="video-reviews-grid">
                <?php foreach ($video_reviews as $index => $review): 
                    $embed_url = get_rutube_embed_code($review['link_rutube']);
                    $preview_url = $review['preview_rutube'] ?? '';
                    if (empty($embed_url) || empty($preview_url)) continue;
                ?>
                    <div class="video-preview-item" 
                         data-video-index="<?php echo $index; ?>"
                         data-embed-url="<?php echo esc_url($embed_url); ?>"
                         data-animate="fadeInUp"
                         data-animate-delay="<?php echo ($index * 150) + 100; ?>">
                        <div class="video-preview-wrapper">
                            <img src="<?php echo esc_url($preview_url); ?>" 
                                 alt="Видеоотзыв <?php echo $index + 1; ?>" 
                                 class="video-preview-image"
                                 loading="lazy">
                            <div class="video-play-overlay">
                                <div class="video-play-button">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Desktop Swiper (3 or more items) -->
            <div class="swiper video-reviews-swiper-pc" data-animate="fadeInUp" data-animate-delay="100">
                <div class="swiper-wrapper">
                    <?php foreach ($video_reviews as $index => $review): 
                        $embed_url = get_rutube_embed_code($review['link_rutube']);
                        $preview_url = $review['preview_rutube'] ?? '';
                        if (empty($embed_url) || empty($preview_url)) continue;
                    ?>
                        <div class="swiper-slide">
                            <div class="video-preview-item" 
                                 data-video-index="<?php echo $index; ?>"
                                 data-embed-url="<?php echo esc_url($embed_url); ?>">
                                <div class="video-preview-wrapper">
                                    <img src="<?php echo esc_url($preview_url); ?>" 
                                         alt="Видеоотзыв <?php echo $index + 1; ?>" 
                                         class="video-preview-image"
                                         loading="lazy">
                                    <div class="video-play-overlay">
                                        <div class="video-play-button">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="swiper-button-prev video-prev-pc"></div>
                <div class="swiper-button-next video-next-pc"></div>
                <div class="swiper-pagination video-pagination-pc"></div>
            </div>
        <?php endif; ?>

        <!-- Mobile Swiper (always slider) -->
        <div class="swiper video-reviews-swiper-mob" data-animate="fadeInUp" data-animate-delay="100">
            <div class="swiper-wrapper">
                <?php foreach ($video_reviews as $index => $review): 
                    $embed_url = get_rutube_embed_code($review['link_rutube']);
                    $preview_url = $review['preview_rutube'] ?? '';
                    if (empty($embed_url) || empty($preview_url)) continue;
                ?>
                    <div class="swiper-slide">
                        <div class="video-preview-item" 
                             data-video-index="<?php echo $index; ?>"
                             data-embed-url="<?php echo esc_url($embed_url); ?>">
                            <div class="video-preview-wrapper">
                                <img src="<?php echo esc_url($preview_url); ?>" 
                                     alt="Видеоотзыв <?php echo $index + 1; ?>" 
                                     class="video-preview-image"
                                     loading="lazy">
                                <div class="video-play-overlay">
                                    <div class="video-play-button">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="swiper-button-prev video-prev-mob"></div>
            <div class="swiper-button-next video-next-mob"></div>
            <div class="swiper-pagination video-pagination-mob"></div>
        </div>
    </div>
</section>

<!-- Video Popup -->
<div class="video-popup-overlay">
    <div class="video-popup-container">
        <div class="video-popup-close">
            <svg viewBox="0 0 24 24">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
            </svg>
        </div>
        <div class="video-popup-content">
            <div class="video-popup-loading">Загрузка видео...</div>
            <iframe class="video-popup-iframe" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>