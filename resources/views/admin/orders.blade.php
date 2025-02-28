@extends('layouts.app')

@section('title', 'Админка - Заказы')

@section('hero-wrapper')
    <header class="static">
        <div class="logo">Valorant Boost</div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
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
    <section id="admin-orders" style="padding: 80px 20px; text-align: center;">
        @if (session('error'))
            <p style="color: #ff4655; font-size: 20px;">{{ session('error') }}</p>
        @else
            <h1 style="font-size: 48px; color: #ff4655; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Список заказов</h1>
            @if (session('success'))
                <p style="color: #ff4655; font-size: 20px;">{{ session('success') }}</p>
            @endif
            @if ($orders->isEmpty())
                <p style="font-size: 20px; color: #ddd;">Пока нет заказов.</p>
            @else
                <table style="width: 90%; margin: 40px auto; border-collapse: collapse; background: #2b2b2b; border-radius: 15px; overflow: hidden;">
                    <thead>
                        <tr style="background: #3b1a1a;">
                            <th style="padding: 15px; font-size: 18px; color: #fff;">ID</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Ник в Valorant</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Discord</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Услуга</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Количество VP</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Дата</th>
                            <th style="padding: 15px; font-size: 18px; color: #fff;">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr style="border-bottom: 1px solid #3b1a1a;">
                                <td style="padding: 15px; color: #ddd;">{{ $order->id }}</td>
                                <td style="padding: 15px; color: #ddd;">{{ $order->valorant_nick }}</td>
                                <td style="padding: 15px; color: #ddd;">{{ $order->discord }}</td>
                                <td style="padding: 15px; color: #ddd;">{{ $order->service }}</td>
                                <td style="padding: 15px; color: #ddd;">{{ $order->vp_amount ?? '-' }}</td>
                                <td style="padding: 15px; color: #ddd;">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td style="padding: 15px; color: #ddd;">
                                    <form method="POST" action="{{ route('admin.orders.toggle', $order->id) }}">
                                        @csrf
                                        <button type="submit" style="padding: 5px 10px; background: {{ $order->is_completed ? '#4CAF50' : '#ff4655' }}; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                                            {{ $order->is_completed ? 'Выполнен' : 'Не выполнен' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </section>
@endsection