// mobile-menu.js
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const headerNavigation = document.querySelector('.header-navigation');

    if (mobileMenuToggle && headerNavigation) {
        mobileMenuToggle.addEventListener('click', function () {
            headerNavigation.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
        });

        // Закрытие меню при клике на ссылку
        const menuLinks = headerNavigation.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                headerNavigation.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            });
        });

        // Закрытие меню при клике вне его области
        document.addEventListener('click', function (event) {
            if (!headerNavigation.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                headerNavigation.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        });
    }
});

// Функционал для FAQ
document.addEventListener('DOMContentLoaded', function() {
    const faqSection = document.getElementById('faq');
    if (!faqSection) return;
    
    // 1. Активация/деактивация вопросов
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Закрываем все вопросы
            faqItems.forEach(el => {
                el.classList.remove('active');
                el.querySelector('.faq-answer').style.maxHeight = null;
            });
            
            // Если вопрос не был активен, открываем его
            if (!isActive) {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
    
    // 2. Кнопка "Показать все вопросы"
    const showAllBtn = document.getElementById('showAllFaq');
    const faqList = document.getElementById('faqList');
    const hiddenItems = document.querySelectorAll('.faq-hidden');
    let allVisible = false;
    
    if (showAllBtn && hiddenItems.length > 0) {
        showAllBtn.addEventListener('click', function() {
            allVisible = !allVisible;
            
            if (allVisible) {
                // Показываем все
                hiddenItems.forEach(item => {
                    item.classList.add('visible');
                });
                showAllBtn.querySelector('.faq-toggle-text').textContent = 'Скрыть вопросы';
                showAllBtn.classList.add('active');
            } else {
                // Скрываем лишние (оставляем первые 10)
                hiddenItems.forEach(item => {
                    item.classList.remove('visible');
                });
                showAllBtn.querySelector('.faq-toggle-text').textContent = 'Показать все вопросы';
                showAllBtn.classList.remove('active');
            }
        });
    }
    
    // 3. Автоматическое открытие первого вопроса если ни один не открыт
    setTimeout(() => {
        const hasActive = document.querySelector('.faq-item.active');
        if (!hasActive && faqItems.length > 0) {
            const firstItem = faqItems[0];
            const firstAnswer = firstItem.querySelector('.faq-answer');
            
            firstItem.classList.add('active');
            firstAnswer.style.maxHeight = firstAnswer.scrollHeight + 'px';
        }
    }, 1000);
});