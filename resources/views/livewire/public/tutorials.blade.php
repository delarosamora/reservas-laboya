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
    <div class="card-header d-flex justify-content-between align-items-center" >
        <h5 class="mb-0">{{ __('Tutorials') }}</h5>
    </div>
    <div class="card-body">
<div class="accordion" id="tutorials">
  <div class="accordion-item">
    <h2 class="accordion-header" id="radiator-heading">
      <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#radiator" aria-expanded="true" aria-controls="radiator">
        {{ __('Turn on and turn off radiator') }}
      </button>
    </h2>

    <div id="radiator" class="accordion-collapse collapse" aria-labelledby="radiator-heading" data-bs-parent="#tutorials">
      <div class="accordion-body">
        <video controls class="mw-100" src="{{ asset('assets/video/radiator-tutorial.mp4') }}"></video>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="cash-heading">
      <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#cash" aria-expanded="true" aria-controls="cash">
        {{ __('Cash register') }}
      </button>
    </h2>

    <div id="cash" class="accordion-collapse collapse" aria-labelledby="cash-heading" data-bs-parent="#tutorials">
      <div class="accordion-body">
        <video controls class="mw-100" src="{{ asset('assets/video/cash-register.mp4') }}"></video>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>

