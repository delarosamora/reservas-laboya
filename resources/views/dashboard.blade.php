@section('title', __('Dashboard'))
<x-layouts.app :title="__('Dashboard')">
    <div class="row g-4">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="menu-icon tf-icons bx bx-restaurant"></i> {{ __('Bookings') }}</h5>
              <h6 class="card-title mb-2">{{ \App\Models\Booking::count() }}</h6>
              <p class="card-text">{{ __('Manage and review all your active bookings.') }}</p>
              <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary" wire:navigate>{{ __('View all') }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="menu-icon tf-icons bx bx-group"></i> {{ __('Members') }}</h5>
              <h6 class="card-title mb-2">{{ \App\Models\Member::count() }}</h6>
              <p class="card-text">{{ __('Access your full member list and details.') }}</p>
              <a href="{{ route('admin.members.index') }}" class="btn btn-primary" wire:navigate>{{ __('View all') }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="menu-icon tf-icons bx bx-party"></i> {{ __('Holidays') }}</h5>
              <h6 class="card-title mb-2">{{ \App\Models\Holiday::count() }}</h6>
              <p class="card-text">{{ __('View and manage holidays and closures.') }}</p>
              <a href="{{ route('admin.holidays.index') }}" class="btn btn-primary" wire:navigate>{{ __('View all') }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="overflow-hidden rounded border" style="aspect-ratio: 16/6;">
            <x-placeholder-pattern class="h-100 w-100" style="stroke: color-mix(in oklab, oklch(.21 .034 264.665) 20%, transparent);" />
          </div>
        </div>
    </div>
</x-layouts.app>
