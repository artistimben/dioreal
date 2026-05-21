<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;

// Public Front-end Routes (clean URLs + legacy .html support)
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/index.html', function() {
    return redirect()->route('home');
});

Route::get('/hakkimizda', [PageController::class, 'hakkimizda'])->name('hakkimizda');
Route::get('/hakkimizda.html', [PageController::class, 'hakkimizda']);

Route::get('/oteller', [PageController::class, 'oteller'])->name('oteller');
Route::get('/oteller.html', [PageController::class, 'oteller']);

Route::get('/yatlar', [PageController::class, 'yatlar'])->name('yatlar');
Route::get('/yatlar.html', [PageController::class, 'yatlar']);

Route::get('/restoranlar', [PageController::class, 'restoranlar'])->name('restoranlar');
Route::get('/restoranlar.html', [PageController::class, 'restoranlar']);

Route::get('/gezi-rehberi', [PageController::class, 'geziRehberi'])->name('gezi-rehberi');
Route::get('/gezi-rehberi.html', [PageController::class, 'geziRehberi']);

Route::get('/etkinlikler', [PageController::class, 'etkinlikler'])->name('etkinlikler');
Route::get('/etkinlikler.html', [PageController::class, 'etkinlikler']);

Route::get('/journal', [PageController::class, 'journal'])->name('journal');
Route::get('/journal.html', [PageController::class, 'journal']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Dashboard Route
Route::get('/admin', [PageController::class, 'admin'])->middleware('admin')->name('admin');
Route::get('/admin.html', function() {
    return redirect()->route('admin');
});

// JSON API Routes
Route::get('/api/load', [ApiController::class, 'load']);
Route::post('/api/save', [ApiController::class, 'save'])->middleware('admin');
Route::post('/api/delete', [ApiController::class, 'delete'])->middleware('admin');
