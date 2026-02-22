<?php // routes/breadcrumbs.php

use App\Models\Booking;
use App\Models\Holiday;
use App\Models\Member;
use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('home'));
});

Breadcrumbs::for('consultBookingStatus', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Consult my booking status') , route('consultBookingStatus'));
});

Breadcrumbs::for('createBooking', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Create booking') , route('createBooking'));
});

Breadcrumbs::for('showBooking', function (BreadcrumbTrail $trail, Booking $booking) {
    $trail->parent('consultBookingStatus');
    $trail->push(__('Show booking') , route('showBooking', $booking));
});

Breadcrumbs::for('showHoliday', function (BreadcrumbTrail $trail, Holiday $holiday) {
    $trail->parent('consultBookingStatus');
    $trail->push(__('Show holiday') , route('showHoliday', $holiday));
});

Breadcrumbs::for('editBooking', function (BreadcrumbTrail $trail, Booking $booking) {
    $trail->parent('showBooking', $booking);
    $trail->push(__('Edit booking') , route('editBooking', $booking));
});

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home') , route('dashboard'));
});

Breadcrumbs::for('admin.bookings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Bookings') , route('admin.bookings.index'));
});

Breadcrumbs::for('admin.bookings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.bookings.index');
    $trail->push(__('Create booking') , route('admin.bookings.create'));
});

Breadcrumbs::for('admin.bookings.show', function (BreadcrumbTrail $trail, Booking $booking) {
    $trail->parent('admin.bookings.index');
    $trail->push(__('Show booking') , route('admin.bookings.show', $booking));
});

Breadcrumbs::for('admin.bookings.edit', function (BreadcrumbTrail $trail, Booking $booking) {
    $trail->parent('admin.bookings.show', $booking);
    $trail->push(__('Edit booking') , route('admin.bookings.edit', $booking));
});

//

Breadcrumbs::for('admin.members.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Members') , route('admin.members.index'));
});

Breadcrumbs::for('admin.members.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.members.index');
    $trail->push(__('Create member') , route('admin.members.create'));
});

Breadcrumbs::for('admin.members.show', function (BreadcrumbTrail $trail, Member $member) {
    $trail->parent('admin.members.index');
    $trail->push(__('Show member') , route('admin.members.show', $member));
});

Breadcrumbs::for('admin.members.edit', function (BreadcrumbTrail $trail, Member $member) {
    $trail->parent('admin.members.show', $member);
    $trail->push(__('Edit member') , route('admin.members.edit', $member));
});

//

Breadcrumbs::for('admin.holidays.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Holidays') , route('admin.holidays.index'));
});

Breadcrumbs::for('admin.holidays.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.holidays.index');
    $trail->push(__('Create holiday') , route('admin.holidays.create'));
});

Breadcrumbs::for('admin.holidays.show', function (BreadcrumbTrail $trail, Holiday $holiday) {
    $trail->parent('admin.holidays.index');
    $trail->push(__('Show holiday') , route('admin.holidays.show', $holiday));
});

Breadcrumbs::for('admin.holidays.edit', function (BreadcrumbTrail $trail, Holiday $holiday) {
    $trail->parent('admin.holidays.show', $holiday);
    $trail->push(__('Edit holiday') , route('admin.holidays.edit', $holiday));
});

