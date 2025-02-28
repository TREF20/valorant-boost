@extends('layouts.app')

@section('title', 'FAQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endsection

@section('hero-wrapper')
    <header class="static">
        <div class="logo">Valorant Boost</div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
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
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endauth
            </ul>
        </nav>
        <button class="order-btn pulse">Заказать</button>
    </header>
@endsection

@section('content')
    <section id="faq">
        <h1>Часто задаваемые вопросы</h1>
        <p>Ответы на всё, что вас волнует перед заказом.</p>
        <div class="faq-list">
            <div class="faq-item">
                <h3>Безопасно ли это для моего аккаунта?</h3>
                <p class="answer">Да, мы используем только легальные методы и VPN для защиты. Ваш аккаунт в безопасности, и мы гарантируем полную конфиденциальность.</p>
            </div>
            <div class="faq-item">
                <h3>Сколько времени занимает буст?</h3>
                <p class="answer">От 1 до 5 дней в зависимости от текущего и желаемого ранга. Тренерство проходит по вашему расписанию — от 1 часа и больше.</p>
            </div>
            <div class="faq-item">
                <h3>Могу ли я играть на аккаунте во время буста?</h3>
                <p class="answer">Нет, это может нарушить процесс. Мы советуем подождать, пока работа не будет завершена, чтобы избежать проблем.</p>
            </div>
            <div class="faq-item">
                <h3>Что нужно для заказа?</h3>
                <p class="answer">Вам понадобится указать ник в Valorant, ваш Discord для связи и выбрать услугу. После этого мы начнём работу!</p>
            </div>
            <div class="faq-item">
                <h3>Что если я не доволен результатом?</h3>
                <p class="answer">Мы предлагаем гарантию удовлетворения — если что-то пойдёт не так, свяжитесь с нами, и мы исправим ситуацию.</p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/faq.js') }}"></script>
@endsection