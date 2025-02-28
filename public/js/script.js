// Модальное окно
const modal = document.getElementById('order-modal');
const orderBtns = document.querySelectorAll('.order-btn, .card-btn');
const closeBtn = document.querySelector('.close-btn');
const successMessage = document.querySelector('.success-message');
const ctaBtn = document.querySelector('.cta-btn');
const reviews = document.querySelectorAll('.review');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const scrollTopBtn = document.querySelector('.scroll-top-btn');

// Модальное окно
if (modal && orderBtns && closeBtn) {
    orderBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Плавная прокрутка для кнопки "Выбрать услугу"
if (ctaBtn) {
    ctaBtn.addEventListener('click', () => {
        document.querySelector('#services').scrollIntoView({ behavior: 'smooth' });
    });
}

// Плавное исчезновение сообщения
if (successMessage) {
    setTimeout(() => {
        successMessage.classList.add('fade-out');
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 500);
    }, 3000);
}

// Карусель отзывов
if (reviews.length > 0 && prevBtn && nextBtn) {
    let currentReview = 0;

    function showReview(index) {
        reviews.forEach((review, i) => {
            review.classList.toggle('active', i === index);
        });
    }

    nextBtn.addEventListener('click', () => {
        currentReview = (currentReview + 1) % reviews.length;
        showReview(currentReview);
    });

    prevBtn.addEventListener('click', () => {
        currentReview = (currentReview - 1 + reviews.length) % reviews.length;
        showReview(currentReview);
    });

    // Показываем первый отзыв при загрузке
    showReview(currentReview);
}

// Кнопка "Наверх"
if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollTopBtn.style.display = 'block';
        } else {
            scrollTopBtn.style.display = 'none';
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// Анимация появления шапки
const logo = document.querySelector('.logo');
const orderBtn = document.querySelector('.order-btn');

window.addEventListener('load', () => {
    logo.style.opacity = '0';
    logo.style.transform = 'translateY(-20px)';

    setTimeout(() => {
        logo.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        logo.style.opacity = '1';
        logo.style.transform = 'translateY(0)';
    }, 200);

    if (orderBtn) {
        orderBtn.style.opacity = '0';
        orderBtn.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            orderBtn.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            orderBtn.style.opacity = '1';
            orderBtn.style.transform = 'translateY(0)';
        }, 400);
    }
});

// Анимация появления секций
const fadeSections = document.querySelectorAll('.fade-section');

function checkFade() {
    fadeSections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight * 0.8;
        if (sectionTop < triggerPoint && !section.classList.contains('visible')) {
            section.classList.add('visible');
        }
    });
}

window.addEventListener('scroll', checkFade);
window.addEventListener('load', checkFade);