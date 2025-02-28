@extends('layouts.app')

@section('title', 'О нас')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
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
    <section id="about">
        <h1>О нас</h1>
        <p>Мы — команда, вдохновлённая Valorant, созданная для вашего успеха.</p>
    </section>
    <section id="timeline" class="scroll-section">
        <h2>Наша история</h2>
        <div class="timeline">
            <div class="timeline-item left">
                <div class="content"><h3>2020</h3><p>Группа друзей начала играть в бета-версию Valorant, мечтая о больших победах.</p></div>
            </div>
            <div class="timeline-item right">
                <div class="content"><h3>2021</h3><p>Мы запустили первые услуги буста, помогая игрокам подниматься по рангам.</p></div>
            </div>
            <div class="timeline-item left">
                <div class="content"><h3>2023</h3><p>Расширили спектр услуг: добавили тренерство и продажу VP.</p></div>
            </div>
            <div class="timeline-item right">
                <div class="content"><h3>2025</h3><p>Стали лидерами в СНГ, обслуживая сотни игроков ежемесячно!</p></div>
            </div>
        </div>
    </section>
    <section id="values" class="scroll-section">
        <h2>Наши ценности</h2>
        <div class="values-grid">
            <div class="value-item"><h3>Страсть</h3><p>Мы любим Valorant и вкладываем душу в каждый заказ.</p></div>
            <div class="value-item"><h3>Профессионализм</h3><p>Наши игроки — топ-уровня, от Радианта и выше.</p></div>
            <div class="value-item"><h3>Честность</h3><p>Прозрачные цены и никаких скрытых условий.</p></div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endsection