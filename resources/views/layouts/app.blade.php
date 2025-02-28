<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Valorant Boost</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('styles')
</head>
<body>
    @yield('hero-wrapper')

    @if (session('success'))
        <div class="success-message" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); background: #ff4655; color: #fff; padding: 10px 20px; border-radius: 5px; z-index: 1000;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="error-message" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); background: #ff4655; color: #fff; padding: 10px 20px; border-radius: 5px; z-index: 1000;">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

    <footer id="contacts" class="footer">
        <div class="footer-content">
            <h2 class="footer-title scroll-anim">Связаться с нами</h2>
            <div class="footer-links scroll-anim">
                <p><span class="footer-icon">📡</span> Discord: <a href="https://discord.gg/boost">discord.gg/boost</a></p>
                <p><span class="footer-icon">✉️</span> Email: <a href="mailto:support@valorantboost.ru">support@valorantboost.ru</a></p>
            </div>
            <p class="footer-note scroll-anim">Онлайн 24/7, ответим за 10 минут!</p>
        </div>
    </footer>

    <button class="scroll-top-btn">↑</button>

    @auth
        <div class="modal" id="order-modal">
            <div class="modal-content">
                <span class="close-btn">×</span>
                <h2>Оформить заказ</h2>
                <form id="order-form" method="POST" action="{{ route('order.submit') }}">
                    @csrf
                    <input type="text" name="valorant_nick" placeholder="Ваш ник в Valorant" required>
                    <input type="text" name="discord" placeholder="Discord (для связи)" required>
                    <select name="service" required>
                        <option value="">Выберите услугу</option>
                        <option value="Буст ранга">Буст ранга</option>
                        <option value="Прокачка пропуска">Прокачка пропуска</option>
                        <option value="Тренерство">Тренерство</option>
                    </select>
                    <button type="submit">Отправить</button>
                </form>
                <a href="{{ route('vp.order') }}" style="display: inline-block; margin-top: 10px; padding: 10px 20px; background: #ff4655; color: #fff; text-decoration: none; border-radius: 5px;">Купить VP</a>
            </div>
        </div>
    @endauth

    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>