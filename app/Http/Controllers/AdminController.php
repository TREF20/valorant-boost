<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Добавляем импорт для Log

class AdminController extends Controller
{
    public function orders(Request $request)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'У вас нет доступа к админке');
        }

        $orders = Order::all();
        Log::info('Orders retrieved', ['count' => $orders->count()]);
        return view('admin.orders', compact('orders'));
    }

    public function toggleComplete(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'У вас нет доступа к админке');
        }

        $order = Order::findOrFail($id);
        $order->is_completed = !$order->is_completed;
        $order->save();

        return redirect()->back()->with('success', 'Статус заказа обновлён');
    }
}