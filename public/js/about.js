// Анимация при скролле для таймлайна и ценностей
const timelineItems = document.querySelectorAll('.timeline-item');
const valueItems = document.querySelectorAll('.value-item');

function checkScroll() {
    timelineItems.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight * 0.8;
        if (itemTop < triggerPoint && !item.classList.contains('visible')) {
            item.classList.add('visible');
        }
    });

    valueItems.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight * 0.8;
        if (itemTop < triggerPoint && !item.classList.contains('visible')) {
            item.classList.add('visible');
        }
    });
}

window.addEventListener('scroll', checkScroll);
window.addEventListener('load', checkScroll);

// Пульсация при наведении на value-item
valueItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
        item.style.animation = 'pulseValue 1s infinite';
    });
    item.addEventListener('mouseleave', () => {
        item.style.animation = '';
    });
});