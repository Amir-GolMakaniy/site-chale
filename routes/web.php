<?php

use App\Livewire\Admin\Articles\Form;
use App\Livewire\Articles\Index;
use App\Livewire\Articles\Show;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Home::class)->name('home');
Route::get('/articles', Index::class)->name('articles.index');
Route::get('/articles/{article}', Show::class)->name('articles.show');

Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', \App\Livewire\Admin\Home::class)
		->middleware('role:admin')
		->name('admin.home');

	Route::get('/articles', \App\Livewire\Admin\Articles\Index::class)
		->middleware('role:admin|editor')
		->name('admin.articles.index');

	Route::get('/articles/create', Form::class)
		->middleware('role:admin|editor')
		->name('admin.articles.create');

	Route::get('/articles/{article}/edit', Form::class)
		->middleware('role:admin|editor')
		->name('admin.articles.edit');
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

require __DIR__ . '/auth.php';