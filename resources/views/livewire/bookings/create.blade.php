@section('title', __('Create booking'))

<div>
  <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" >
            <h5 class="mb-0">{{ __('Create booking') }}</h5>
        </div>
        <div class="card-body" >
          <livewire:bookings.form />
        </div>
      </div>
      </div>
  </div>
</div>

