document.addEventListener('DOMContentLoaded', function () {
    // Пример инициализации JavaScript (можно добавить в существующий файл со слайдерами)
    const clientLogosSwiper = new Swiper('.client-logos-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 800,
        grabCursor: true,
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 35,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 40,
            }
        },
        navigation: {
            nextEl: '.logos-next',
            prevEl: '.logos-prev',
        },
        pagination: {
            el: '.logos-pagination',
            clickable: true,
        }
    });
})

document.addEventListener('DOMContentLoaded', function () {
    const swiperEl = document.querySelector('.about-company-swiper');

    if (swiperEl) {
        // Проверяем iOS устройство
        const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        const isMac = /Macintosh/.test(navigator.userAgent);

        const swiper = new Swiper(swiperEl, {
            // Базовые настройки
            direction: 'horizontal',
            loop: true,
            speed: 600,
            grabCursor: true,

            // Пагинация
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Навигация
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Автопрокрутка
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Адаптивность
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            },

            // iOS специфичные настройки
            touchEventsTarget: 'container',
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: true,
            shortSwipes: true,
            longSwipes: true,
            longSwipesRatio: 0.5,
            longSwipesMs: 300,
            followFinger: true,
            threshold: 5,

            // iOS оптимизации
            edgeSwipeDetection: isIOS || isMac,
            edgeSwipeThreshold: 20,
            iOSEdgeSwipeDetection: isIOS,
            resistance: true,
            resistanceRatio: 0.85,

            // Эффекты перехода
            effect: 'slide',

            // Предзагрузка изображений для плавности
            preloadImages: true,
            updateOnImagesReady: true,

            // Lazy loading
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 2,
                loadOnTransitionStart: true,
            },

            // Keyboard навигация для macOS
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },

            // Mousewheel для macOS
            mousewheel: {
                forceToAxis: true,
                invert: false,
                thresholdDelta: 20,
                sensitivity: 1,
            },

            // Параллакс эффект
            parallax: true,
        });

        // Дополнительные оптимизации для iOS
        if (isIOS) {
            // Убираем rubber-band эффект в Safari
            document.body.style.overscrollBehaviorY = 'none';

            // Фикс для 120Hz ProMotion дисплеев
            swiper.params.speed = 400;

            // Включаем inertia на iOS
            swiper.params.freeMode = {
                enabled: true,
                momentum: true,
                momentumRatio: 1,
                momentumBounce: true,
                momentumBounceRatio: 1,
                minimumVelocity: 0.02,
                sticky: false
            };
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // Инициализация слайдера для ПК
    const pcSwiper = document.querySelector('.utp-swiper-pc');
    if (pcSwiper) {
        new Swiper(pcSwiper, {
            direction: 'horizontal',
            loop: true,
            speed: 600,
            grabCursor: true,

            // Пагинация
            pagination: {
                el: '.utp-pagination-pc',
                clickable: true,
                dynamicBullets: true,
            },

            // Навигация
            navigation: {
                nextEl: '.utp-next-pc',
                prevEl: '.utp-prev-pc',
            },

            // Автопрокрутка
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Эффекты перехода
            effect: 'slide',

            // Предзагрузка изображений
            preloadImages: true,
            updateOnImagesReady: true,
        });
    }

    // Инициализация слайдера для мобильных
    const mobSwiper = document.querySelector('.utp-swiper-mob');
    if (mobSwiper) {
        new Swiper(mobSwiper, {
            direction: 'horizontal',
            loop: true,
            speed: 600,
            grabCursor: true,

            // Пагинация
            pagination: {
                el: '.utp-pagination-mob',
                clickable: true,
                dynamicBullets: true,
            },

            // Навигация
            navigation: {
                nextEl: '.utp-next-mob',
                prevEl: '.utp-prev-mob',
            },

            // Автопрокрутка
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Эффекты перехода
            effect: 'slide',

            // Предзагрузка изображений
            preloadImages: true,
            updateOnImagesReady: true,
        });
    }
});

// Video Reviews Slider Initialization
document.addEventListener('DOMContentLoaded', function () {
    // Initialize desktop Swiper (if exists)
    const desktopSwiper = document.querySelector('.video-reviews-swiper-pc');
    if (desktopSwiper) {
        const videoSwiperPc = new Swiper('.video-reviews-swiper-pc', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            speed: 600,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.video-next-pc',
                prevEl: '.video-prev-pc',
            },
            pagination: {
                el: '.video-pagination-pc',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                769: {
                    slidesPerView: 2,
                    spaceBetween: 25
                },
                1025: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    }

    // Initialize mobile Swiper (if exists)
    const mobileSwiper = document.querySelector('.video-reviews-swiper-mob');
    if (mobileSwiper) {
        const videoSwiperMob = new Swiper('.video-reviews-swiper-mob', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 600,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.video-next-mob',
                prevEl: '.video-prev-mob',
            },
            pagination: {
                el: '.video-pagination-mob',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30
                }
            }
        });
    }

    // Video Popup Logic
    const videoPopup = document.querySelector('.video-popup-overlay');
    const videoPopupClose = document.querySelector('.video-popup-close');
    const videoPopupIframe = document.querySelector('.video-popup-iframe');
    const videoPopupContent = document.querySelector('.video-popup-content');
    const videoPreviewItems = document.querySelectorAll('.video-preview-item');

    // Open popup on preview click
    videoPreviewItems.forEach(item => {
        item.addEventListener('click', function () {
            const embedUrl = this.getAttribute('data-embed-url');
            if (embedUrl) {
                // Show loading
                videoPopupContent.style.display = 'block';

                // Set iframe source
                videoPopupIframe.src = embedUrl;

                // Show popup
                videoPopup.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    // Close popup
    function closeVideoPopup() {
        videoPopup.classList.remove('active');
        document.body.style.overflow = '';

        // Stop video playback
        videoPopupIframe.src = '';
        videoPopupIframe.src = 'about:blank';
    }

    videoPopupClose.addEventListener('click', closeVideoPopup);
    videoPopup.addEventListener('click', function (e) {
        if (e.target === videoPopup) {
            closeVideoPopup();
        }
    });

    // Close popup on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && videoPopup.classList.contains('active')) {
            closeVideoPopup();
        }
    });

    // Remove loading when iframe loads
    videoPopupIframe.addEventListener('load', function () {
        const loadingElement = document.querySelector('.video-popup-loading');
        if (loadingElement) {
            loadingElement.style.display = 'none';
        }
    });

    // Lazy load preview images
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target.querySelector('.video-preview-image');
                if (img && !img.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(entry.target);
            }
        });
    }, {
        rootMargin: '100px'
    });

    // Observe all video preview items
    document.querySelectorAll('.video-preview-item').forEach(item => {
        observer.observe(item);
    });
});

// Фотогалерея с письмами
// Documents Reviews Slider Initialization
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Swiper with 3 slides
    const documentsSwiper = new Swiper('.documents-swiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        speed: 600,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.documents-next',
            prevEl: '.documents-prev',
        },
        pagination: {
            el: '.documents-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 15
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            }
        }
    });

    // Gallery Popup Logic
    const popupOverlay = document.querySelector('.documents-popup-overlay');
    const popupClose = document.querySelector('.documents-popup-close');
    const popupImage = document.querySelector('.documents-popup-image');
    const popupLoading = document.querySelector('.documents-popup-loading');

    const documentItems = document.querySelectorAll('.document-item');

    // Open popup on document item click
    documentItems.forEach(item => {
        item.addEventListener('click', function () {
            const imageUrl = this.getAttribute('data-image-url');
            const imageAlt = this.getAttribute('data-image-alt');

            openPopup(imageUrl, imageAlt);
        });
    });

    function openPopup(url, alt) {
        // Show loading
        popupLoading.style.display = 'block';
        popupImage.style.display = 'none';

        // Load image
        popupImage.src = url;
        popupImage.alt = alt;

        // Show popup
        popupOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Image loaded callback
    popupImage.addEventListener('load', function () {
        popupLoading.style.display = 'none';
        popupImage.style.display = 'block';
    });

    // Error handling
    popupImage.addEventListener('error', function () {
        popupLoading.textContent = '...';
        popupLoading.style.display = 'block';
        popupImage.style.display = 'none';
    });

    // Close popup
    function closePopup() {
        popupOverlay.classList.remove('active');
        document.body.style.overflow = '';

        // Reset for next open
        popupImage.src = '';
    }

    popupClose.addEventListener('click', closePopup);
    popupOverlay.addEventListener('click', function (e) {
        if (e.target === popupOverlay) {
            closePopup();
        }
    });

    // Close popup on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
            closePopup();
        }
    });

    // Lazy load preview images
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target.querySelector('.document-preview-image');
                if (img && !img.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(entry.target);
            }
        });
    }, {
        rootMargin: '100px'
    });

    // Observe all document items
    documentItems.forEach(item => {
        observer.observe(item);
    });
});