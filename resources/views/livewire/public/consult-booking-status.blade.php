<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('home') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="card my-5">
      <div class="card-body">
      <h5 class="card-title">{{ __('Consult my booking status') }}</h5>
      <h6 class="mb-0">{{ __('Select a booking') }}</h6>
      <livewire:bookings.public-calendar week-starts-at="1" :day-click-enabled="false" :drag-and-drop-enabled="false" before-calendar-view="partials/before-calendar-view" />
      </div>
  </div>
</div>
