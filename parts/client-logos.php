<?php
// Получаем галерею логотипов из Carbon Fields
$logo_images = carbon_get_theme_option('image_logo');

// Проверяем, есть ли изображения
if (empty($logo_images)) {
    return;
}
?>

<!-- Client Logos Section -->
<section id="clients" class="client-logos-section" data-animate-on-scroll>
    <!-- Декоративные элементы -->
    <div class="client-logos-decor client-logos-decor-1"></div>
    <div class="client-logos-decor client-logos-decor-2"></div>
    
    <div class="container client-logos-container">
        <div class="client-logos-heading" data-animate data-animate-delay="300">
            <h2 class="client-logos-title" data-animate data-animate-delay="400">Клиенты</h2>
            <p class="client-logos-subtitle" data-animate data-animate-delay="500">
                Компании, которые доверяют нам и выбирают наше оборудование
            </p>
        </div>

        <!-- Logos Swiper Slider -->
        <div class="swiper client-logos-swiper" data-animate data-animate-delay="600">
            <div class="swiper-wrapper">
                <?php foreach ($logo_images as $index => $image_id):
                    $image_url = wp_get_attachment_image_url($image_id, 'medium');
                    $image_full_url = wp_get_attachment_image_url($image_id, 'full');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    if (empty($image_alt)) {
                        $image_alt = 'Логотип клиента ' . ($index + 1);
                    }
                    if ($image_url):
                ?>
                        <div class="swiper-slide">
                            <div class="logo-item"
                                data-animate
                                data-animate-delay="<?php echo ($index % 4) * 100 + 700; ?>">
                                <div class="logo-overlay"></div>
                                <div class="logo-image-wrapper">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        class="logo-image"
                                        loading="lazy"
                                        width="180"
                                        height="120">
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev logos-prev" data-animate data-animate-delay="900"></div>
            <div class="swiper-button-next logos-next" data-animate data-animate-delay="900"></div>
            <div class="swiper-pagination logos-pagination" data-animate data-animate-delay="1000"></div>
        </div>
    </div>
</section>