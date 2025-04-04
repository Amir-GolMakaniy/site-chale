<?php

use App\Livewire\Articles\Create;
use App\Livewire\Articles\Edit;
use App\Livewire\Articles\Index;
use App\Livewire\Articles\Show;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Home::class)->name('home');
Route::get('/articles', Index::class)->name('article-index');
Route::get('/articles/{article}', Show::class)->name('article-show');

Route::prefix('admin')->middleware('auth')->group(function (){
	Route::get('/', \App\Livewire\Admin\Home::class)->name('admin-home');
	Route::get('/article/create', Create::class)->name('article-create');
	Route::get('/article/{article}/edit', Edit::class)->name('article-edit');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
