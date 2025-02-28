<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::post('/order', [PageController::class, 'submitOrder'])->name('order.submit');
Route::get('/vp-order', [PageController::class, 'vpOrder'])->name('vp.order'); // Новый маршрут

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'loginPost']);
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [PageController::class, 'registerPost']);
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/admin/orders/{id}/toggle', [AdminController::class, 'toggleComplete'])->name('admin.orders.toggle');
});