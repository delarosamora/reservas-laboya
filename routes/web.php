<?php

use App\Http\Controllers\BookingController;
use App\Livewire\Bookings\Create as CreateBooking;
use App\Livewire\Bookings\Index as IndexBooking;
use App\Livewire\Bookings\Show as ShowBooking;
use App\Livewire\Bookings\Edit as EditBooking;

use App\Livewire\Holidays\Create as CreateHoliday;
use App\Livewire\Holidays\Index as IndexHoliday;
use App\Livewire\Holidays\Show as ShowHoliday;
use App\Livewire\Holidays\Edit as EditHoliday;

use App\Livewire\Members\Create as CreateMember;
use App\Livewire\Members\Index as IndexMember;
use App\Livewire\Members\Show as ShowMember;
use App\Livewire\Members\Edit as EditMember;
use App\Livewire\Public\CreateBooking as PublicCreateBooking;
use App\Livewire\Public\ShowBooking as PublicShowBooking;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::get('create-booking', PublicCreateBooking::class)->name('createBooking');
Route::get('show-booking/{code}', PublicShowBooking::class)->name('showBooking');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Route::prefix('admin')->group(function () {

      Route::prefix('/bookings')->group(function () {
        Route::get('/', IndexBooking::class)->name('admin.bookings.index');
        Route::get('/create', CreateBooking::class)->name('admin.bookings.create');
        Route::get('/{booking}', ShowBooking::class)->name('admin.bookings.show');
        Route::get('/{booking}/edit', EditBooking::class)->name('admin.bookings.edit');
        Route::get('/{booking}/confirm', [BookingController::class, 'confirm'])->name('admin.bookings.confirm');
        Route::get('/{booking}/cancel', [BookingController::class, 'cancel'])->name('admin.bookings.cancel');
      });
      Route::prefix('/members')->group(function () {
        Route::get('/', IndexMember::class)->name('admin.members.index');
        Route::get('/create', CreateMember::class)->name('admin.members.create');
        Route::get('/{member}', ShowMember::class)->name('admin.members.show');
        Route::get('/{member}/edit', EditMember::class)->name('admin.members.edit');
      });

      Route::prefix('/holidays')->group(function () {
        Route::get('/', IndexHoliday::class)->name('admin.holidays.index');
        Route::get('/create', CreateHoliday::class)->name('admin.holidays.create');
        Route::get('/{holiday}', ShowHoliday::class)->name('admin.holidays.show');
        Route::get('/{holiday}/edit', EditHoliday::class)->name('admin.holidays.edit');
      });
  });

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__ . '/auth.php';
