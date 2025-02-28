// Анимация появления FAQ при скролле
const faqItems = document.querySelectorAll('.faq-item');

function checkFaq() {
    faqItems.forEach((item, index) => {
        const itemTop = item.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight * 0.8;
        if (itemTop < triggerPoint && !item.classList.contains('visible')) {
            setTimeout(() => {
                item.classList.add('visible');
            }, index * 150); // Задержка для эффекта "волны"
        }
    });
}

window.addEventListener('scroll', checkFaq);
window.addEventListener('load', checkFaq);

// Аккордеон для FAQ с подсветкой
faqItems.forEach(item => {
    const header = item.querySelector('h3');
    header.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        faqItems.forEach(i => i.classList.remove('active')); // Закрываем все
        if (!isActive) {
            item.classList.add('active'); // Открываем текущий с анимацией
        }
    });
});