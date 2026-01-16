<?php
$text = carbon_get_theme_option('reneval_text');
$gallery = carbon_get_theme_option('reneval_gallery');

if (empty($text) && empty($gallery)) {
    return;
}

$has_multiple_images = !empty($gallery) && count($gallery) > 1;
?>

<section class="section-about-company" id="about-company" data-animate-on-scroll>
    <h2>О компании</h2>
    <p class="about-subtitle">Служба|Спец Эко – это специальная экологическая служба, которая была создана экологами-профессионалами, для защиты предприятий от санкций, грозящих в случае нарушения экологического законодательства</p>
    <div class="container">
        <div class="about-company-wrapper">
            <?php if (!empty($text)): ?>
                <div class="about-company-text" data-animate data-animate-delay="100">
                    <div class="about-company-content">
                        <?php echo apply_filters('the_content', $text); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($gallery)): ?>
                <div class="about-company-slider <?php echo $has_multiple_images ? 'has-slider' : 'single-image'; ?>"
                    data-animate data-animate-delay="200">
                    <?php if ($has_multiple_images): ?>
                        <!-- Swiper -->
                        <div class="swiper about-company-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $image_id):
                                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    $image_caption = wp_get_attachment_caption($image_id);
                                    if ($image_url): ?>
                                        <div class="swiper-slide">
                                            <div class="slide-image-wrapper">
                                                <img src="<?php echo esc_url($image_url); ?>"
                                                    alt="<?php echo esc_attr($image_alt); ?>"
                                                    loading="lazy">
                                                <?php if ($image_caption): ?>
                                                    <div class="slide-caption"><?php echo esc_html($image_caption); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <!-- Навигация -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    <?php else: ?>
                        <!-- Одно изображение -->
                        <?php
                        $first_image_id = $gallery[0];
                        $image_url = wp_get_attachment_image_url($first_image_id, 'large');
                        $image_alt = get_post_meta($first_image_id, '_wp_attachment_image_alt', true);
                        ?>
                        <div class="single-banner">
                            <div class="banner-image-wrapper">
                                <img src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_alt); ?>"
                                    loading="lazy">
                            </div>
                            <div class="dop_text_about">
                                <p>"Мы стремимся предоставлять клиентам сервис высшего уровня с гарантией лучшей цены и качества в максимально сжатые сроки.</p>
                                <p>Многолетний опыт и знание региональных требований позволяет оказывать квалифицированную помощь Клиентам в решении возникающих вопросов в части экологии, что гарантирует безусловное исполнение взятых на себя обязательств."</p>
                                <p><strong>Анна Наумова,</strong></p>
                                <p><strong>Руководитель Службы|Спец Эко</strong></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <!-- Статистика 1 -->
                    <div class="stat-card">
                        <div class="stat-number">18 лет</div>
                        <div class="stat-label">в экологии</div>
                        <div class="stat-divider"></div>
                        <div class="stat-desc">Опыт работы в экологической сфере</div>
                    </div>

                    <!-- Статистика 2 -->
                    <div class="stat-card">
                        <div class="stat-number">1 000 +</div>
                        <div class="stat-label">Проектов успешно выполнено</div>
                        <div class="stat-divider"></div>
                        <div class="stat-desc">и прошли согласование</div>
                    </div>

                    <!-- Статистика 3 -->
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            </svg>
                        </div>
                        <div class="stat-label">Опытные специалисты</div>
                        <div class="stat-divider"></div>
                        <div class="stat-desc">Работы выполняются только опытными и квалифицированными специалистами - экологами</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</section>