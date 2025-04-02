<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WelcomeController;
use Livewire\Volt\Volt;
use App\Livewire\MenuList;
use App\Livewire\CategoryList;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/kategoris', CategoryList::class)->name('categories.index');
Route::get('/menus', MenuList::class)->name('menus.index');

Route::resource('categories', CategoryController::class);
Route::resource('menus', MenuController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('category', 'category')
    ->middleware(['auth', 'verified'])
    ->name('category');

Route::view('menu', 'menu')
    ->middleware(['auth', 'verified'])
    ->name('menu');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
