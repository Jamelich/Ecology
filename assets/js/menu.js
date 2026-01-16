// Мобильное меню
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenuContainer = document.querySelector('.mobile-menu-container');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const body = document.body;

    if (mobileMenuToggle && mobileMenuContainer) {
        // Открыть меню
        mobileMenuToggle.addEventListener('click', function () {
            mobileMenuContainer.classList.add('active');
            mobileMenuToggle.classList.add('active');
            body.style.overflow = 'hidden';
        });

        // Закрыть меню
        function closeMobileMenu() {
            mobileMenuContainer.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            body.style.overflow = '';
        }

        mobileMenuClose.addEventListener('click', closeMobileMenu);

        // Закрыть меню при клике на ссылку
        const mobileMenuLinks = mobileMenuContainer.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Закрыть меню при клике вне его
        mobileMenuContainer.addEventListener('click', function (e) {
            if (e.target === mobileMenuContainer) {
                closeMobileMenu();
            }
        });

        // Закрыть меню при нажатии Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && mobileMenuContainer.classList.contains('active')) {
                closeMobileMenu();
            }
        });
    }
});