@section('title', __('Holidays'))
<div>
  <div class="row py-3">
            <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.holidays.create') }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-circle"></i> {{ __('Add new holiday') }}</a>
    </div>
  </div>
  <div class="row g-4">
    <div class="col">
      <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center" >
      <h5 class="mb-0">{{ __('Holidays') }}</h5>
  </div>
  <div class="card-body">
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>{{ __('Actions') }}</th>
              <th>{{ __('Date') }}</th>
              <th>{{ __('Description') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($this->holidays as $holiday)
              <tr>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('admin.holidays.show', $holiday) }}"><i class="icon-base bx bx-show me-1"></i>{{ __('View') }}</a>
                      <a class="dropdown-item" href="{{ route('admin.holidays.edit', $holiday) }}"><i class="icon-base bx bx-edit-alt me-1"></i>{{ __('Edit') }}</a>
                    </div>
                  </div>
                </td>
                <td>{{ $holiday->date->format('d-m-Y') }}</td>
                <td>{{ $holiday->description }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
    </div>
  </div>
</div>

