<?php
// Получаем галереи для ПК и мобильных
$pc_gallery = carbon_get_theme_option('utp_slider_pc');
$mob_gallery = carbon_get_theme_option('utp_slider_mob');

// Проверяем, есть ли хоть одна галерея
if (empty($pc_gallery) && empty($mob_gallery)) {
    return;
}

// Определяем тип отображения для каждой версии
$pc_has_multiple = !empty($pc_gallery) && count($pc_gallery) > 1;
$mob_has_multiple = !empty($mob_gallery) && count($mob_gallery) > 1;
?>

<!-- UTP Слайдер -->
<section class="utp-slider-section">
    <!-- ПК версия -->
    <?php if (!empty($pc_gallery)): ?>
    <div class="utp-slider utp-slider-pc <?php echo $pc_has_multiple ? 'has-slider' : 'single-image'; ?>">
        <?php if ($pc_has_multiple): ?>
        <!-- Swiper для ПК -->
        <div class="swiper utp-swiper-pc">
            <div class="swiper-wrapper">
                <?php foreach ($pc_gallery as $image_id): 
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    if (empty($image_alt)) {
                        $image_alt = 'Уникальное торговое предложение';
                    }
                    if ($image_url): ?>
                    <div class="swiper-slide">
                        <div class="slide-image">
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="<?php echo esc_attr($image_alt); ?>"
                                 loading="lazy">
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            
            <!-- Навигация для ПК -->
            <div class="swiper-button-prev utp-prev-pc"></div>
            <div class="swiper-button-next utp-next-pc"></div>
            <div class="swiper-pagination utp-pagination-pc"></div>
        </div>
        <?php else: ?>
        <!-- Одно изображение для ПК -->
        <?php 
        $first_image_id = $pc_gallery[0];
        $image_url = wp_get_attachment_image_url($first_image_id, 'full');
        $image_alt = get_post_meta($first_image_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $image_alt = 'Уникальное торговое предложение';
        }
        ?>
        <div class="utp-banner utp-banner-pc">
            <img src="<?php echo esc_url($image_url); ?>" 
                 alt="<?php echo esc_attr($image_alt); ?>"
                 loading="lazy">
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <!-- Мобильная версия -->
    <?php if (!empty($mob_gallery)): ?>
    <div class="utp-slider utp-slider-mob <?php echo $mob_has_multiple ? 'has-slider' : 'single-image'; ?>">
        <?php if ($mob_has_multiple): ?>
        <!-- Swiper для мобильных -->
        <div class="swiper utp-swiper-mob">
            <div class="swiper-wrapper">
                <?php foreach ($mob_gallery as $image_id): 
                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    if (empty($image_alt)) {
                        $image_alt = 'Уникальное торговое предложение';
                    }
                    if ($image_url): ?>
                    <div class="swiper-slide">
                        <div class="slide-image">
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="<?php echo esc_attr($image_alt); ?>"
                                 loading="lazy">
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            
            <!-- Навигация для мобильных -->
            <div class="swiper-button-prev utp-prev-mob"></div>
            <div class="swiper-button-next utp-next-mob"></div>
            <div class="swiper-pagination utp-pagination-mob"></div>
        </div>
        <?php else: ?>
        <!-- Одно изображение для мобильных -->
        <?php 
        $first_image_id = $mob_gallery[0];
        $image_url = wp_get_attachment_image_url($first_image_id, 'large');
        $image_alt = get_post_meta($first_image_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $image_alt = 'Уникальное торговое предложение';
        }
        ?>
        <div class="utp-banner utp-banner-mob">
            <img src="<?php echo esc_url($image_url); ?>" 
                 alt="<?php echo esc_attr($image_alt); ?>"
                 loading="lazy">
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>
