<!-- Акции -->
<section id="promotions" class="promotions-section" data-animate-on-scroll>
    <!-- Фоновая картинка -->
    <img src="<?php echo get_template_directory_uri() . '/assets/img/promo.webp'; ?>" 
         alt="Фон акций" 
         class="promotions-bg-image">
    
    <div class="container">
        <div class="promotions-header" data-animate="fadeInUp">
            <h2 class="promotions-title">Акции</h2>
            <div class="promotions-subtitle">Специальные предложения для наших клиентов</div>
        </div>
        
        <div class="promotions-grid">
            <!-- Акция 1 -->
            <div class="promotion-card" data-animate="fadeInUp" data-animate-delay="150">
                <div class="promotion-card__inner">
                    <div class="promotion-card__header">
                        <h3 class="promotion-card__title">Экологический мини-аудит</h3>
                    </div>
                    <div class="promotion-card__content">
                        <p class="promotion-card__description">
                            Бесплатно проанализируем деятельность предприятия и дадим рекомендации 
                            по пакету необходимых документов в части экологии
                        </p>
                        <div class="promotion-card__discount">Бесплатно</div>
                    </div>
                    <div class="promotion-card__footer">
                        <a href="#" class="promotion-card__button btn callback-btn">Получить аудит</a>
                    </div>
                </div>
                <div class="promotion-card__decor decor-1"></div>
            </div>
            
            <!-- Акция 2 -->
            <div class="promotion-card" data-animate="fadeInUp" data-animate-delay="300">
                <div class="promotion-card__inner">
                    <div class="promotion-card__header">
                        <h3 class="promotion-card__title">Скидка на проектные работы</h3>
                    </div>
                    <div class="promotion-card__content">
                        <p class="promotion-card__description">
                            При заказе экологической отчетности делаем скидку 
                            на проектные работы до 15%
                        </p>
                        <div class="promotion-card__discount">-15%</div>
                    </div>
                    <div class="promotion-card__footer">
                        <a href="#" class="promotion-card__button btn callback-btn">Узнать условия</a>
                    </div>
                </div>
                <div class="promotion-card__decor decor-2"></div>
            </div>
            
            <!-- Акция 3 -->
            <div class="promotion-card" data-animate="fadeInUp" data-animate-delay="450">
                <div class="promotion-card__inner">
                    <div class="promotion-card__header">
                        <h3 class="promotion-card__title">Партнерская программа</h3>
                    </div>
                    <div class="promotion-card__content">
                        <p class="promotion-card__description">
                            Мы платим за рекомендации! Приведите клиента и получите 
                            вознаграждение до 10% от суммы контракта
                        </p>
                        <div class="promotion-card__discount">До 10%</div>
                    </div>
                    <div class="promotion-card__footer">
                        <a href="#" 
                           target="_blank" 
                           class="promotion-card__button btn callback-btn">
                            Стать партнером
                        </a>
                    </div>
                </div>
                <div class="promotion-card__decor decor-3"></div>
            </div>
            
            <!-- Акция 4 -->
            <div class="promotion-card" data-animate="fadeInUp" data-animate-delay="600">
                <div class="promotion-card__inner">
                    <div class="promotion-card__header">
                        <h3 class="promotion-card__title">Постоянным клиентам</h3>
                    </div>
                    <div class="promotion-card__content">
                        <p class="promotion-card__description">
                            Для наших постоянных клиентов предусмотрена 
                            накопительная система скидок до 10%
                        </p>
                        <div class="promotion-card__discount">-10%</div>
                    </div>
                    <div class="promotion-card__footer">
                        <a href="#contact-form" class="promotion-card__button btn callback-btn">Узнать свою скидку</a>
                    </div>
                </div>
                <div class="promotion-card__decor decor-4"></div>
            </div>
        </div>
    </div>
</section>