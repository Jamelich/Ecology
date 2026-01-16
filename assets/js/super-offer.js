// super-offer.js - Таймеры обратного отсчета для таблицы (обновленная версия)

document.addEventListener('DOMContentLoaded', function() {
    // Функция для парсинга даты из таблицы
    function parseDateFromTable(dateStr) {
        // Убираем лишние пробелы
        dateStr = dateStr.trim();
        
        // Если это "На дату ввоза партии" - возвращаем null
        if (dateStr.includes('На дату ввоза партии')) {
            return null;
        }
        
        // Парсим дату вида "22 января" или "2 февраля" и т.д.
        const months = {
            'января': 0,
            'февраля': 1,
            'марта': 2,
            'апреля': 3,
            'мая': 4,
            'июня': 5,
            'июля': 6,
            'августа': 7,
            'сентября': 8,
            'октября': 9,
            'ноября': 10,
            'декабря': 11
        };
        
        const parts = dateStr.split(' ');
        if (parts.length < 2) return null;
        
        const day = parseInt(parts[0]);
        const monthName = parts[1].toLowerCase();
        const month = months[monthName];
        
        if (isNaN(day) || month === undefined) return null;
        
        const currentYear = new Date().getFullYear();
        let date = new Date(currentYear, month, day, 23, 59, 59);
        
        // Если дата уже прошла в этом году, берем следующий год
        if (date < new Date()) {
            date = new Date(currentYear + 1, month, day, 23, 59, 59);
        }
        
        return date;
    }

    // Функция для расчета оставшегося времени
    function getTimeRemaining(endtime) {
        if (!endtime) return null;
        
        const total = endtime.getTime() - Date.now();
        
        if (total <= 0) {
            return {
                total: 0,
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                expired: true
            };
        }
        
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));
        
        return {
            total,
            days,
            hours,
            minutes,
            seconds,
            expired: false
        };
    }

    // Функция для форматирования таймера (десктопная версия)
    function formatTimerDesktop(time) {
        if (!time) return '-';
        
        if (time.expired) {
            return '<span style="color:#ff6b6b;font-weight:bold;">Истек</span>';
        }
        
        const daysStr = time.days < 10 ? '0' + time.days : time.days;
        const hoursStr = time.hours < 10 ? '0' + time.hours : time.hours;
        const minutesStr = time.minutes < 10 ? '0' + time.minutes : time.minutes;
        const secondsStr = time.seconds < 10 ? '0' + time.seconds : time.seconds;
        
        return `
            <div style="display: flex; flex-direction: column; align-items: center; gap: 2px;">
                <div style="display: flex; gap: 4px; font-size: 0.8rem;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <span style="font-size: 0.9rem; font-weight: bold; color: var(--color-eco-vibrant);">${daysStr}</span>
                        <span style="font-size: 0.6rem; opacity: 0.8;">дн</span>
                    </div>
                    <div style="align-self: center;">:</div>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <span style="font-size: 0.9rem; font-weight: bold; color: var(--color-eco-vibrant);">${hoursStr}</span>
                        <span style="font-size: 0.6rem; opacity: 0.8;">час</span>
                    </div>
                    <div style="align-self: center;">:</div>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <span style="font-size: 0.9rem; font-weight: bold; color: var(--color-eco-vibrant);">${minutesStr}</span>
                        <span style="font-size: 0.6rem; opacity: 0.8;">мин</span>
                    </div>
                    <div style="align-self: center;">:</div>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <span style="font-size: 0.9rem; font-weight: bold; color: var(--color-eco-vibrant);">${secondsStr}</span>
                        <span style="font-size: 0.6rem; opacity: 0.8;">сек</span>
                    </div>
                </div>
            </div>
        `;
    }

    // Функция для форматирования таймера (мобильная версия)
    function formatTimerMobile(time) {
        if (!time) return '-';
        
        if (time.expired) {
            return '<span style="color:#ff6b6b;font-weight:bold;">Истек</span>';
        }
        
        const daysStr = time.days < 10 ? '0' + time.days : time.days;
        const hoursStr = time.hours < 10 ? '0' + time.hours : time.hours;
        const minutesStr = time.minutes < 10 ? '0' + time.minutes : time.minutes;
        const secondsStr = time.seconds < 10 ? '0' + time.seconds : time.seconds;
        
        // Более компактный формат для мобильных
        return `
            <div style="display: flex; align-items: center; gap: 6px; justify-content: center;">
                <div style="display: flex; flex-direction: column; align-items: center; min-width: 30px;">
                    <span style="font-size: 0.85rem; font-weight: bold; color: var(--color-eco-vibrant);">${daysStr}</span>
                    <span style="font-size: 0.55rem; opacity: 0.8;">дн</span>
                </div>
                <span style="color: var(--color-eco-vibrant);">:</span>
                <div style="display: flex; flex-direction: column; align-items: center; min-width: 30px;">
                    <span style="font-size: 0.85rem; font-weight: bold; color: var(--color-eco-vibrant);">${hoursStr}</span>
                    <span style="font-size: 0.55rem; opacity: 0.8;">час</span>
                </div>
                <span style="color: var(--color-eco-vibrant);">:</span>
                <div style="display: flex; flex-direction: column; align-items: center; min-width: 30px;">
                    <span style="font-size: 0.85rem; font-weight: bold; color: var(--color-eco-vibrant);">${minutesStr}</span>
                    <span style="font-size: 0.55rem; opacity: 0.8;">мин</span>
                </div>
                <span style="color: var(--color-eco-vibrant);">:</span>
                <div style="display: flex; flex-direction: column; align-items: center; min-width: 30px;">
                    <span style="font-size: 0.85rem; font-weight: bold; color: var(--color-eco-vibrant);">${secondsStr}</span>
                    <span style="font-size: 0.55rem; opacity: 0.8;">сек</span>
                </div>
            </div>
        `;
    }

    // Основная функция инициализации таймеров для десктопной таблицы
    function initializeDesktopTimers() {
        const table = document.querySelector('.super-offer-table');
        if (!table) return [];
        
        const rows = table.querySelectorAll('tbody tr');
        const cleanupFunctions = [];
        
        rows.forEach((row, index) => {
            const dateCell = row.querySelector('td:nth-child(1)');
            const timerCell = document.getElementById(`timer-desktop-${index + 1}`);
            
            if (!dateCell || !timerCell) return;
            
            const dateText = dateCell.textContent.trim();
            const endDate = parseDateFromTable(dateText);
            
            function updateTimer() {
                const time = getTimeRemaining(endDate);
                timerCell.innerHTML = formatTimerDesktop(time);
                
                // Если осталось меньше 3 дней, добавляем предупреждение
                if (time && !time.expired && time.days < 3) {
                    timerCell.style.color = '#ff6b6b';
                    timerCell.style.fontWeight = 'bold';
                }
            }
            
            // Обновляем сразу
            updateTimer();
            
            // Если есть дата для отсчета, запускаем интервал
            if (endDate) {
                const intervalId = setInterval(updateTimer, 1000);
                cleanupFunctions.push(() => clearInterval(intervalId));
            }
        });
        
        return cleanupFunctions;
    }

    // Функция инициализации таймеров для мобильной версии
    function initializeMobileTimers() {
        const mobileCards = document.querySelectorAll('.super-offer-card');
        if (!mobileCards.length) return [];
        
        const cleanupFunctions = [];
        
        mobileCards.forEach((card, index) => {
            // Находим элемент с датой в карточке
            const dateElement = card.querySelector('.super-offer-card-value.date');
            const timerElement = document.getElementById(`timer-mobile-${index + 1}`);
            
            if (!dateElement || !timerElement) return;
            
            const dateText = dateElement.textContent.trim();
            const endDate = parseDateFromTable(dateText);
            
            function updateTimer() {
                const time = getTimeRemaining(endDate);
                timerElement.innerHTML = formatTimerMobile(time);
                
                // Если осталось меньше 3 дней, добавляем предупреждение
                if (time && !time.expired && time.days < 3) {
                    timerElement.style.color = '#ff6b6b';
                    timerElement.style.fontWeight = 'bold';
                }
            }
            
            // Обновляем сразу
            updateTimer();
            
            // Если есть дата для отсчета, запускаем интервал
            if (endDate) {
                const intervalId = setInterval(updateTimer, 1000);
                cleanupFunctions.push(() => clearInterval(intervalId));
            }
        });
        
        return cleanupFunctions;
    }

    // Основная функция инициализации всех таймеров
    function initializeAllTimers() {
        const cleanupFunctions = [];
        
        // Инициализируем таймеры для десктопной версии
        const desktopCleanup = initializeDesktopTimers();
        cleanupFunctions.push(...desktopCleanup);
        
        // Инициализируем таймеры для мобильной версии
        const mobileCleanup = initializeMobileTimers();
        cleanupFunctions.push(...mobileCleanup);
        
        // Очистка интервалов
        window.addEventListener('beforeunload', () => {
            cleanupFunctions.forEach(cleanup => cleanup());
        });
        
        // Также очищаем при переходе на другую страницу в SPA (если используется)
        return cleanupFunctions;
    }

    // Запускаем инициализацию
    let timersCleanup = initializeAllTimers();

    // Обновляем таймеры при изменении размера окна (на случай динамического переключения между версиями)
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Очищаем старые таймеры
            timersCleanup.forEach(cleanup => cleanup());
            
            // Переинициализируем таймеры
            timersCleanup = initializeAllTimers();
        }, 250);
    });
});