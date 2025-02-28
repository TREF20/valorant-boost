<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        Log::info('Index page accessed');
        return view('index');
    }

    public function about()
    {
        Log::info('About page accessed');
        return view('about');
    }

    public function faq()
    {
        Log::info('FAQ page accessed');
        return view('faq');
    }

    public function vpOrder()
    {
        Log::info('VP order page accessed');
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите или зарегистрируйтесь, чтобы заказать VP.');
        }
        return view('vp-order');
    }

    public function submitOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите или зарегистрируйтесь, чтобы сделать заказ.');
        }
    
        Log::info('SubmitOrder called', $request->all());
    
        try {
            $request->validate([
                'valorant_nick' => 'required|string|max:255',
                'discord' => 'required|string|max:255',
                'service' => 'required|string|in:Буст ранга,Продажа VP,Прокачка пропуска,Тренерство', // Добавляем "Продажа VP" обратно
                'vp_amount' => 'nullable|integer|min:100|max:10000',
            ]);
    
            $order = Order::create([
                'valorant_nick' => $request->valorant_nick,
                'discord' => $request->discord,
                'service' => $request->service,
                'user_id' => Auth::id(),
                'vp_amount' => $request->vp_amount, // Сохраняем vp_amount, если есть
            ]);
    
            Log::info('Order created successfully', ['order_id' => $order->id]);
            return redirect()->back()->with('success', 'Заказ отправлен! Скоро свяжемся в Discord.');
        } catch (\Exception $e) {
            Log::error('Order creation failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Ошибка при отправке заказа: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        Log::info('Login page accessed');
        $request->session()->forget('success');
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        Log::info('LoginPost called', $request->only('email'));
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            Log::info('Login successful', ['user_id' => Auth::id()]);
            return redirect()->route('home');
        }

        Log::info('Login failed');
        return back()->withErrors(['email' => 'Неверные email или пароль']);
    }

    public function register(Request $request)
    {
        Log::info('Register page accessed');
        $request->session()->forget('success');
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        Log::info('RegisterPost called', $request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            Log::info('Registration successful', ['user_id' => $user->id]);
            return redirect()->route('home');
        }

        Log::info('Registration failed');
        return back()->withErrors(['email' => 'Ошибка при регистрации']);
    }

    public function logout(Request $request)
    {
        Log::info('Logout called');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}