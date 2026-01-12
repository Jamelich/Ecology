<?php
// Получаем галерею изображений из Carbon Fields
$gallery_images = carbon_get_theme_option('image_review');

// Проверяем, есть ли изображения
if (empty($gallery_images)) {
    return;
}
?>

<!-- Documents Reviews Section -->
<section id="reviews" class="documents-reviews-section" data-animate-on-scroll>
    <div class="documents-reviews-container">
        <div class="documents-reviews-heading" data-animate data-animate-delay="300">
            <h2 class="documents-reviews-title" data-animate data-animate-delay="400">Благодарности от наших клиентов</h2>
        </div>

        <!-- Main Swiper Slider -->
        <div class="swiper documents-swiper" data-animate data-animate-delay="500">
            <div class="swiper-wrapper">
                <?php foreach ($gallery_images as $index => $image_id):
                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                    $image_full_url = wp_get_attachment_image_url($image_id, 'full');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    if (empty($image_alt)) {
                        $image_alt = 'Благодарственное письмо ' . ($index + 1);
                    }
                    if ($image_url):
                ?>
                        <div class="swiper-slide">
                            <div class="document-item"
                                data-image-url="<?php echo esc_url($image_full_url); ?>"
                                data-image-alt="<?php echo esc_attr($image_alt); ?>"
                                data-animate
                                data-animate-delay="<?php echo ($index % 3) * 200 + 600; ?>">
                                <div class="document-preview-wrapper">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        class="document-preview-image"
                                        loading="lazy"
                                        width="400"
                                        height="566">
                                    <div class="document-zoom-overlay">
                                        <div class="document-zoom-icon">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                <path d="M12 10h-2v2H9v-2H7V9h2V7h1v2h2v1z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev documents-prev" data-animate data-animate-delay="800"></div>
            <div class="swiper-button-next documents-next" data-animate data-animate-delay="800"></div>
            <div class="swiper-pagination documents-pagination" data-animate data-animate-delay="900"></div>
        </div>
    </div>
</section>

<!-- Gallery Popup -->
<div class="documents-popup-overlay">
    <div class="documents-popup-container">
        <div class="documents-popup-close">
            <svg viewBox="0 0 24 24">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
            </svg>
        </div>
        <div class="documents-popup-content">
            <div class="documents-popup-loading">Загрузка изображения...</div>
            <img class="documents-popup-image" src="" alt="">
        </div>
    </div>
</div>