@extends('layouts.app')

@section('title', 'Заказ VP')

@section('hero-wrapper')
    <header class="static">
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
    </header>
@endsection

@section('content')
    <section style="padding: 80px 20px; text-align: center;">
        <h1 style="font-size: 48px; color: #ff4655; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Заказать VP</h1>
        <p style="font-size: 20px; color: #ddd; margin-bottom: 40px;">Выберите количество Valorant Points и оформите заказ!</p>

        <form method="POST" action="{{ route('order.submit') }}" style="display: flex; flex-direction: column; max-width: 400px; margin: 0 auto; gap: 15px;">
            @csrf
            <input type="hidden" name="service" value="Продажа VP">
            <input type="text" name="valorant_nick" placeholder="Ваш ник в Valorant" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <input type="text" name="discord" placeholder="Discord (для связи)" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <select name="vp_amount" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
                <option value="">Выберите количество VP</option>
                <option value="100">100 VP - 100 ₽</option>
                <option value="500">500 VP - 300 ₽</option>
                <option value="1000">1000 VP - 500 ₽</option>
                <option value="2000">2000 VP - 900 ₽</option>
                <option value="5000">5000 VP - 2000 ₽</option>
            </select>
            <button type="submit" style="padding: 10px 20px; background: #ff4655; color: #fff; border: none; border-radius: 5px; font-size: 18px; cursor: pointer;">Заказать</button>
        </form>
    </section>
@endsection