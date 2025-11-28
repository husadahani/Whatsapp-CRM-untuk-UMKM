<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('home');
});

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register placeholder
Route::get('/register', function () {
    return redirect('/login')->with('status', 'Fitur registrasi akan segera hadir!');
})->name('register');

// User Panel Routes (Protected)
Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {
    Route::get('/', [PanelController::class, 'dashboard'])->name('dashboard');
    Route::get('/devices', [PanelController::class, 'devices'])->name('devices');
    Route::get('/contacts', [PanelController::class, 'contacts'])->name('contacts');
    Route::get('/chats', [PanelController::class, 'chats'])->name('chats');
    Route::get('/broadcast', [PanelController::class, 'broadcast'])->name('broadcast');
    Route::get('/autoreply', [PanelController::class, 'autoreply'])->name('autoreply');
    Route::get('/settings', [PanelController::class, 'settings'])->name('settings');
    Route::get('/api', [PanelController::class, 'api'])->name('api');
});

// Admin Panel Routes (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/subscriptions', [AdminController::class, 'subscriptions'])->name('subscriptions');
    Route::get('/plans', [AdminController::class, 'plans'])->name('plans');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');
    Route::get('/devices', [AdminController::class, 'devices'])->name('devices');
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::get('/broadcasts', [AdminController::class, 'broadcasts'])->name('broadcasts');
    Route::get('/servers', [AdminController::class, 'servers'])->name('servers');
    Route::get('/api-logs', [AdminController::class, 'apiLogs'])->name('api-logs');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

// Dashboard redirect
Route::get('/dashboard', function () {
    return redirect()->route('panel.dashboard');
})->middleware(['auth'])->name('dashboard');
