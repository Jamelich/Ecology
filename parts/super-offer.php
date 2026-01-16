<section id="super-offer" class="super-offer-section" data-animate-on-scroll>
    <div class="super-offer-bg" style="background-image: url('<?php echo carbon_get_theme_option('super_offer_photo'); ?>');"></div>
    <div class="super-offer-overlay">
        <div class="super-offer-container">
            <div class="super-offer-content">
                <div class="super-offer-text-wrapper">
                    <?php if ($super_offer_subheader = carbon_get_theme_option('super_offer_subheader')): ?>
                        <div class="super-offer-subheader" data-animate="fadeInDown">
                            <?php echo esc_html($super_offer_subheader); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($super_offer_name = carbon_get_theme_option('super_offer_name')): ?>
                        <h2 class="super-offer-title" data-animate="fadeInLeft" data-animate-delay="100">
                            <?php echo esc_html($super_offer_name); ?>
                        </h2>
                    <?php endif; ?>

                    <div class="super-offer-description">
                        <!-- Десктопная версия таблицы -->
                        <table class="super-offer-table">
                            <thead>
                                <tr>
                                    <th>Даты сдачи отчетности</th>
                                    <th>Наименование отчетности</th>
                                    <th>Таймер, до конца осталось</th>
                                    <th>Стоимость</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $table_rows = carbon_get_theme_option('super_offer_table');
                                if ($table_rows && is_array($table_rows)) :
                                    $counter = 1;
                                    foreach ($table_rows as $row) :
                                ?>
                                <tr>
                                    <td><?php echo esc_html($row['date']); ?></td>
                                    <td><?php echo wpautop(esc_html($row['name'])); ?></td>
                                    <td id="timer-desktop-<?php echo $counter; ?>">-</td>
                                    <td>
                                        <button class="price-button callback-btn"><?php echo esc_html($row['price']); ?></button>
                                    </td>
                                </tr>
                                <?php
                                        $counter++;
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>

                        <!-- Мобильная версия (карточки) -->
                        <div class="super-offer-table-mobile">
                            <?php
                            $table_rows = carbon_get_theme_option('super_offer_table');
                            if ($table_rows && is_array($table_rows)) :
                                $counter = 1;
                                foreach ($table_rows as $row) :
                            ?>
                            <div class="super-offer-card">
                                <div class="super-offer-card-row">
                                    <div class="super-offer-card-label">Дата сдачи:</div>
                                    <div class="super-offer-card-value date"><?php echo esc_html($row['date']); ?></div>
                                </div>
                                
                                <div class="super-offer-card-row name-row">
                                    <div class="super-offer-card-label">Наименование:</div>
                                    <div class="super-offer-card-value name"><?php echo wpautop(esc_html($row['name'])); ?></div>
                                </div>
                                
                                <div class="super-offer-card-row">
                                    <div class="super-offer-card-label">Таймер:</div>
                                    <div class="super-offer-card-value timer" id="timer-mobile-<?php echo $counter; ?>">-</div>
                                </div>
                                
                                <div class="super-offer-card-row">
                                    <div class="super-offer-card-label">Стоимость:</div>
                                    <div class="super-offer-card-value price">
                                        <button class="price-button callback-btn"><?php echo esc_html($row['price']); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    $counter++;
                                endforeach;
                            endif;
                            ?>
                        </div>

                    </div>

                    <p>Проверьте себя: какие формы Росприроднадзора нужно сдать вашей организации. Свяжитесь с нами, и мы бесплатно проконсультируем.
                        За искажение данных в отчетности Росприроднадзор может наложить штраф до 500 000 руб.
                        Заполняйте отчетность правильно, без ошибок и исправлений, в соответствии с правилами заполнения и сдавайте вовремя!</p>
                </div>
            </div>
        </div>
    </div>
</section>