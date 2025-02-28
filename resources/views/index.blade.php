@extends('layouts.app')

@section('title', 'Буст и валюта')

@section('hero-wrapper')
    <div class="hero-wrapper">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('videos/0226.mp4') }}" type="video/mp4">
            Ваш браузер не поддерживает видео.
        </video>
        <div class="overlay">
            <header class="sticky">
                <div class="logo">Valorant Boost</div>
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('vp.order') }}">Купить VP</a></li>
                        <li><a href="{{ route('home') }}#services">Услуги</a></li>
                        <li><a href="{{ route('home') }}#pricing">Цены</a></li>
                        <li><a href="{{ route('about') }}">О нас</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('home') }}#contacts">Контакты</a></li>
                        @auth
                            @if (Auth::user()->is_admin)
                                <li><a href="{{ route('admin.orders') }}">Админка</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endauth
                    </ul>
                </nav>
                @auth
                    <button class="order-btn pulse">Заказать</button>
                @endauth
            </header>

            <section id="hero">
                <h1 class="scroll-anim">Стань легендой Valorant!</h1>
                <p class="scroll-anim">Буст ранга, валюта VP и прокачка на любой вкус.</p>
                <button class="cta-btn pulse scroll-anim">Выбрать услугу</button>
            </section>
        </div>
    </div>
@endsection

@section('content')
    <section id="advantages" class="fade-section">
        <h2 class="scroll-anim">Почему выбирают нас?</h2>
        <div class="advantage-cards">
            <div class="advantage scroll-anim"><h3>Быстро</h3><p>Ваш ранг или валюта будут готовы в кратчайшие сроки.</p></div>
            <div class="advantage scroll-anim"><h3>Надёжно</h3><p>Гарантия безопасности вашего аккаунта.</p></div>
            <div class="advantage scroll-anim"><h3>Дешево</h3><p>Лучшие цены на рынке бустинга.</p></div>
        </div>
    </section>

    <section id="how-it-works" class="fade-section">
        <h2 class="scroll-anim">Как это работает?</h2>
        <div class="steps">
            <div class="step scroll-anim">
                <span class="step-number">1</span>
                <h3>Выберите услугу</h3>
                <p>Оформите заказ через форму.</p>
            </div>
            <div class="step scroll-anim">
                <span class="step-number">2</span>
                <h3>Связь в Discord</h3>
                <p>Мы уточним детали.</p>
            </div>
            <div class="step scroll-anim">
                <span class="step-number">3</span>
                <h3>Получите результат</h3>
                <p>Наслаждайтесь игрой!</p>
            </div>
        </div>
    </section>

    <section id="services" class="fade-section">
        <h2 class="scroll-anim">Наши услуги</h2>
        <div class="service-cards">
            <div class="card scroll-anim"><h3>Буст ранга</h3><p>От Железа до Радианта за пару дней.</p><span class="price">От 500 ₽</span><button class="card-btn pulse">Заказать</button></div>
            <div class="card scroll-anim"><h3>Продажа VP</h3><p>Покупай валюту дешевле, чем в игре.</p><span class="price">От 300 ₽</span><button class="card-btn pulse">Заказать</button></div>
            <div class="card scroll-anim"><h3>Прокачка пропуска</h3><p>Все награды без усилий. Все сделаем за вас</p><span class="price">От 700 ₽</span><button class="card-btn pulse">Заказать</button></div>
            <div class="card scroll-anim"><h3>Тренерство</h3><p>Уроки от игроков Радианта. Покажем уровень</p><span class="price">От 1000 ₽/час</span><button class="card-btn pulse">Заказать</button></div>
        </div>
    </section>

    <section id="reviews" class="fade-section">
        <h2 class="scroll-anim">Отзывы клиентов</h2>
        <div class="review-slider">
            <div class="review active"><p class="scroll-anim">"Подняли с Серебра до Платины за 2 дня!"</p><span>- Алексей</span></div>
            <div class="review"><p class="scroll-anim">"VP пришло моментально, дешево."</p><span>- Катя</span></div>
            <div class="review"><p class="scroll-anim">"Тренер Дима 'HulkeR' показал, как держать аим!"</p><span>- Настя</span></div>
        </div>
        <div class="slider-controls">
            <button class="prev-btn">◄</button>
            <button class="next-btn">►</button>
        </div>
    </section>

    <section id="pricing" class="fade-section">
        <h2 class="scroll-anim">Тарифы</h2>
        <div class="pricing-table">
            <div class="plan scroll-anim"><h3>Базовый</h3><p>Буст до Золота</p><span>800 ₽</span><button class="card-btn pulse">Заказать</button></div>
            <div class="plan scroll-anim"><h3>Премиум</h3><p>Буст до Бессмертного</p><span>2500 ₽</span><button class="card-btn pulse">Заказать</button></div>
        </div>
    </section>
@endsection