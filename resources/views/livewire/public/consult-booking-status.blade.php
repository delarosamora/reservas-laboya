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
        @if($agent->isDesktop())
          <h6 class="mb-0">{{ __('Select a booking') }}</h6>
          <livewire:bookings.public-calendar week-starts-at="1" :day-click-enabled="false" :drag-and-drop-enabled="false" />
        @else
          <div class="modal d-block" id="fullscreenModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalFullTitle">{{ __('Select a booking') }}</h5>
                </div>
                <div class="modal-body p-0">
                  <livewire:bookings.public-calendar week-starts-at="1" :day-click-enabled="false" :drag-and-drop-enabled="false" />
                </div>
                <div class="modal-footer">
                  <a href="{{ route('home') }}" class="btn btn-secondary mt-4" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
  </div>
</div>
