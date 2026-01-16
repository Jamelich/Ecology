<!-- Блок с отзывами ВКонтакте и Яндекс.Карт -->
<section class="vk-comments-section" data-animate-on-scroll>
    <div class="vk-comments-container container">
        <!-- Заголовок -->
        <div class="vk-comments-heading" data-animate data-animate-delay="100">
            <h2>Отзывы наших клиентов</h2>
            <div class="vk-comments-line"></div>
            <p class="vk-comments-subtitle">Нам доверяют предприятия по всей России</p>
        </div>

        <!-- Контейнер для виджетов -->
        <div class="widgets-grid">
            <!-- Виджет ВК -->
            <div class="widget-item vk-widget-item">
                <div class="vk-widget-wrapper" data-animate data-animate-delay="200">
                    <!-- Put this script tag to the <head> of your page -->
                    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
                    <script type="text/javascript">
                        VK.init({
                            apiId: 54419407,
                            onlyWidgets: true
                        });
                    </script>

                    <!-- Put this div tag to the place, where the Comments block will be -->
                    <div id="vk_comments"></div>
                    <script type="text/javascript">
                        VK.Widgets.Comments("vk_comments", {
                            limit: 10,
                            attach: "*"
                        });
                    </script>
                </div>
            </div>

            <!-- Виджет Яндекс.Карт -->
            <div class="widget-item yandex-widget-item">
                <div class="vk-widget-wrapper yandex-widget-wrapper" data-animate data-animate-delay="300">
                    <div style="width:100%;height:400px;overflow:hidden;position:relative;">
                        <iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/73769477849?comments"></iframe>
                        <a href="https://yandex.ru/maps/org/sluzhba_spetseko/73769477849/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Служба СпецЭко на карте Красноярского края — Яндекс Карты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>