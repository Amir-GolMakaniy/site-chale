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
	Route::prefix('articles')->middleware('role:admin|editor')->group(function () {
		Route::get('/', \App\Livewire\Admin\Articles\Index::class)
			->name('admin.articles.index');

		Route::get('/create', Form::class)
			->name('admin.articles.create');

		Route::get('/{article}/edit', Form::class)
			->name('admin.articles.edit');
	});

	Route::prefix('categories')->middleware('role:admin|editor')->group(function () {
		Route::get('/', \App\Livewire\Admin\Categories\Index::class)
			->name('admin.categories.index');

		Route::get('/create', \App\Livewire\Admin\Categories\Form::class)
			->name('admin.categories.create');

		Route::get('/{category}/edit', \App\Livewire\Admin\Categories\Form::class)
			->name('admin.categories.edit');
	});
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