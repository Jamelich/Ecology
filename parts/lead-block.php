<section class="lead-contacts-section" data-animate-on-scroll>
    <div class="lead-container">
        <div class="lead-contacts-wrapper">
            <!-- Левая часть с контактами -->
            <div class="lead-contacts-info">
                <!-- Заголовок и текст сверху -->
                <div class="lead-main-heading" data-animate="fadeInLeft">
                    <h2>Разрабатываем и согласовываем экологическую документацию</h2>
                    <div class="lead-main-subtitle">Получить бесплатную консультацию, круглосуточно по всей России</div>
                    <div class="lead-main-availability">Мы онлайн</div>
                </div>

                <!-- 4 карточки контактов -->
                <div class="lead-contact-cards">
                    <!-- Карточка 1: Телефон -->
                    <div class="lead-contact-card" data-animate="fadeInUp" data-animate-delay="100">
                        <h3 class="lead-card-title">Тел.</h3>
                        <div class="lead-card-content">
                            <a href="tel:+79885277107" class="lead-contact-link">+7 988 527 71 07</a>
                        </div>
                    </div>

                    <!-- Карточка 2: Эл. почта -->
                    <div class="lead-contact-card" data-animate="fadeInUp" data-animate-delay="150">
                        <h3 class="lead-card-title">Эл. почта</h3>
                        <div class="lead-card-content">
                            <a href="mailto:sesecol@mail.ru" class="lead-contact-link">sesecol@mail.ru</a>
                        </div>
                    </div>

                    <!-- Карточка 3: Соц. сети -->
                    <div class="lead-contact-card" data-animate="fadeInUp" data-animate-delay="200">
                        <h3 class="lead-card-title">Соц.сети</h3>
                        <div class="lead-card-content">
                            <div class="lead-card-social">
                                <div class="lead-social-item">
                                    <svg class="lead-social-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.509l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.05 5.56-5.022c.241-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.652-.64.136-.954l11.566-4.458c.538-.196 1.006.128.832.941z"></path>
                                    </svg>
                                    <a href="https://t.me/spececo_service" target="_blank" class="lead-social-link">Телеграмм</a>
                                </div>
                                <div class="lead-social-item">
                                    <svg class="lead-social-icon" viewBox="0 0 448 512" fill="currentColor">
                                        <path d="M31.4907 63.4907C0 94.9813 0 145.671 0 247.04V264.96C0 366.329 0 417.019 31.4907 448.509C62.9813 480 113.671 480 215.04 480H232.96C334.329 480 385.019 480 416.509 448.509C448 417.019 448 366.329 448 264.96V247.04C448 145.671 448 94.9813 416.509 63.4907C385.019 32 334.329 32 232.96 32H215.04C113.671 32 62.9813 32 31.4907 63.4907ZM75.6 168.267H126.747C128.427 253.76 166.133 289.973 196 297.44V168.267H244.16V242C273.653 238.827 304.64 205.227 315.093 168.267H363.253C359.313 187.435 351.46 205.583 340.186 221.579C328.913 237.574 314.461 251.071 297.733 261.227C316.41 270.499 332.907 283.63 346.132 299.751C359.357 315.873 369.01 334.618 374.453 354.747H321.44C316.555 337.262 306.614 321.61 292.865 309.754C279.117 297.899 262.173 290.368 244.16 288.107V354.747H238.373C136.267 354.747 78.0267 284.747 75.6 168.267Z"></path>
                                    </svg>
                                    <a href="https://vk.com/spececo_service" target="_blank" class="lead-social-link">ВК</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Карточка 4: Личная встреча -->
                    <div class="lead-contact-card" data-animate="fadeInUp" data-animate-delay="250">
                        <h3 class="lead-card-title">Личная встреча</h3>
                        <div class="lead-card-content">
                            <p>Свяжитесь с нами для согласования времени и места встречи</p>
                        </div>
                    </div>
                </div>

                <!-- Кнопка -->
                <a href="#" class="lead-consultation-btn callback-btn" data-animate="fadeInUp" data-animate-delay="300">
                    Получить бесплатную консультацию
                </a>
            </div>

            <!-- Правая часть с фото менеджера -->
            <?php if ($manager_photo = carbon_get_theme_option('photo_man')): ?>
                <div class="lead-manager-photo" data-animate="fadeInRight">
                    <img src="<?php echo esc_url($manager_photo); ?>" alt="Менеджер">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>