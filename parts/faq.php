<!-- Блок FAQ -->
<section class="faq-section" id="faq" data-animate-on-scroll>
    <div class="container">
        <div class="faq-header" data-animate="fadeInUp">
            <h2 class="faq-title">Часто задаваемые вопросы</h2>
            <div class="faq-subtitle">Ответы на популярные вопросы об экологической документации</div>
        </div>
        
        <div class="faq-controls" data-animate="fadeInUp" data-animate-delay="150">
            <button class="faq-toggle-btn" id="showAllFaq">
                <span class="faq-toggle-text">Показать все вопросы</span>
                <svg class="faq-toggle-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        
        <div class="faq-container" data-animate="fadeInUp" data-animate-delay="300">
            <div class="faq-list" id="faqList">
                <?php
                $faq_items = carbon_get_theme_option('faq_items');
                if (!empty($faq_items)) {
                    $counter = 1;
                    foreach ($faq_items as $index => $faq) {
                        $is_visible = $counter <= 5; // Первые 10 видны, остальные скрыты
                        $animation_delay = 300 + ($index * 50); // Постепенное появление вопросов
                        ?>
                        <div class="faq-item <?php echo $is_visible ? '' : 'faq-hidden'; ?>" 
                             data-index="<?php echo $counter; ?>"
                             data-animate="fadeInUp" 
                             data-animate-delay="<?php echo $animation_delay; ?>">
                            <div class="faq-question">
                                <div class="faq-number"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>.</div>
                                <h3 class="faq-question-text"><?php echo esc_html($faq['question']); ?></h3>
                                <button class="faq-arrow">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <?php echo wpautop($faq['answer']); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $counter++;
                    }
                } else {
                    echo '<p class="faq-empty" data-animate="fadeIn">Вопросы пока не добавлены.</p>';
                }
                ?>
            </div>
            
            <div class="faq-footer" data-animate="fadeInUp" data-animate-delay="800">
                <p class="faq-total">Всего вопросов: <span id="faqTotal"><?php echo !empty($faq_items) ? count($faq_items) : 0; ?></span></p>
            </div>
        </div>
    </div>
</section>