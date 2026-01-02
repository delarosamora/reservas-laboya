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
        <h5 class="mb-0">{{ __('Show holiday') }}</h5>
    </div>
    <div class="card-body">
              <div class="row">
            <div class="col-12 col-md-9">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('Date') }}</strong>: {{ $holiday->date->format('d/m/Y') }}</li>
                <li class="list-group-item"><strong>{{ __('Description') }}</strong>: {{ $holiday->description }}</li>
              </ul>
            </div>
            <div class="col-12 col-md-3">
              <img class="card-img card-img-right" src="{{asset('assets/img/illustrations/holiday.png')}}" alt="Card image" />
            </div>
          </div>
    </div>
  </div>
</div>

