<?php

use App\Livewire\Members\Create as CreateMember;
use App\Livewire\Members\Index as IndexMember;
use App\Livewire\Members\Show as ShowMember;
use App\Livewire\Members\Edit as EditMember;
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
        Route::get('/', IndexMember::class)->name('admin.members.index');
        Route::get('/create', CreateMember::class)->name('admin.members.create');
        Route::get('/{member}', ShowMember::class)->name('admin.members.show');
        Route::get('/{member}/edit', EditMember::class)->name('admin.members.edit');
      });
  });

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__ . '/auth.php';
