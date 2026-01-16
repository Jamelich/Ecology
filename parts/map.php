<!-- Простой блок с картой -->
<section class="simple-map-section" data-animate-on-scroll>
    <div class="simple-map-container container">
        <!-- Заголовок -->
        <div class="simple-map-heading" data-animate data-animate-delay="100">
            <h2>Работаем по всей России</h2>
            <p class="client-logos-subtitle" data-animate data-animate-delay="150">
                Наши партнеры есть в каждом регионе
            </p>
            <div class="simple-map-line"></div>
        </div>

        <!-- Карта из Carbon Fields -->
        <div class="map-iframe-wrapper" data-animate data-animate-delay="200">
            <?php echo carbon_get_theme_option('code_map'); ?>
        </div>
    </div>
</section>