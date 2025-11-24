<?php

use App\Livewire\Members\Create;
use App\Livewire\Members\Index;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Route::prefix('admin')->group(function () {
      Route::prefix('/members')->group(function () {
        Route::get('/', Index::class)->name('admin.members.index');
        Route::get('/create', Create::class)->name('admin.members.create');
      });
  });

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__ . '/auth.php';
