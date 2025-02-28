@extends('layouts.app')

@section('title', 'Регистрация')

@section('hero-wrapper')
    <header class="static">
        <div class="logo">Valorant Boost</div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('login') }}">Вход</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            </ul>
        </nav>
    </header>
@endsection

@section('content')
    <section style="padding: 80px 20px; text-align: center;">
        <h1 style="font-size: 48px; color: #ff4655; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Регистрация</h1>
        @if ($errors->any())
            <div style="color: #ff4655; font-size: 18px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; max-width: 400px; margin: 0 auto; gap: 15px;">
            @csrf
            <input type="text" name="name" placeholder="Имя" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <input type="email" name="email" placeholder="Email" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <input type="password" name="password" placeholder="Пароль" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" required style="padding: 10px; border: none; border-radius: 5px; background: #2b2b2b; color: #fff;">
            <button type="submit" style="padding: 10px 20px; background: #ff4655; color: #fff; border: none; border-radius: 5px; font-size: 18px; cursor: pointer;">Зарегистрироваться</button>
        </form>
    </section>
@endsection