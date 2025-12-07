@extends('components.layouts.public')
@section('content')
<div class="row py-3">
  <div class="col text-start">
    @include('partials.breadcrumbs')
  </div>
</div>
<div class="card my-5">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ config('app.name') }}</h5>
        <p class="card-text">
          {{ __('Book your table in seconds') }}
        </p>
        <a href="{{ route('createBooking') }}" class="btn btn-xl btn-primary my-2" wire:navigate>{{ __('Make a booking') }}</a>
        <a href="{{ route('consultBookingStatus') }}" class="btn btn-xl btn-primary my-2" wire:navigate>{{ __('Consult my booking status') }}</a>
      </div>
    </div>
    <div class="col-md-4">
      <img class="card-img card-img-right" src="{{asset('assets/img/illustrations/restaurant.png')}}" alt="Card image" />
    </div>
  </div>
</div>
@endsection
