<!-- Блок с отзывами ВКонтакте -->
<section class="vk-comments-section" data-animate-on-scroll>
    <div class="vk-comments-container container">
        <!-- Заголовок -->
        <div class="vk-comments-heading" data-animate data-animate-delay="100">
            <h2>Отзывы наших клиентов</h2>
            <div class="vk-comments-line"></div>
            <p class="vk-comments-subtitle">Нам доверяют предприятия по всей России</p>
        </div>

        <!-- Контейнер для виджета ВК -->
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
</section>