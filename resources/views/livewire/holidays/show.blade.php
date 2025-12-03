@section('title', __('Holidays'))

<div>
  <div class="row py-3">
            <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.holidays.index') }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
      <a href="{{ route('admin.holidays.edit', $holiday) }}" class="btn btn-warning"><i class="menu-icon tf-icons bx bx-edit-alt"></i> {{ __('Edit') }}</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center" >
              <h5 class="mb-0">{{ $holiday->date->format('d-m-Y') }}</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>{{ __('Date') }}</strong>: {{ $holiday->date->format('d-m-Y')}}</li>
              <li class="list-group-item"><strong>{{ __('Description') }}</strong>: {{ $holiday->description }}</li>
            </ul>
          </div>
        </div>
      </div>
  </div>
</div>
