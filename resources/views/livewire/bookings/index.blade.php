@section('title', __('Bookings'))
<div>
  <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary" wire:navigate><i class="menu-icon tf-icons bx bx-plus-circle"></i> {{ __('Add new booking') }}</a>
    </div>
  </div>
  <div class="row g-4">
    <div class="col">
      <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center" >
      <h5 class="mb-0">{{ __('Bookings') }}</h5>
  </div>
  <div class="card-body">
  <div class="nav-align-top">
    <ul class="nav nav-pills mb-4" role="tablist">
      <li class="nav-item">
        <button
          type="button"
          class="nav-link active"
          role="tab"
          data-bs-toggle="tab"
          data-bs-target="#navs-pills-top-calendar"
          aria-controls="navs-pills-top-calendar"
          aria-selected="true">
          <i class="icon-base bx bx-calendar"></i> {{ __('Calendar') }}
        </button>
      </li>
      @if($agent->isDesktop())
      <li class="nav-item">
        <button
          type="button"
          class="nav-link"
          role="tab"
          data-bs-toggle="tab"
          data-bs-target="#navs-pills-top-table"
          aria-controls="navs-pills-top-table"
          aria-selected="false">
          <i class="icon-base bx bx-table"></i> {{ __('Table') }}
        </button>
      </li>
      @else
      <li class="nav-item">
        <button
          type="button"
          class="nav-link"
          role="tab"
          data-bs-toggle="tab"
          data-bs-target="#navs-pills-top-list"
          aria-controls="navs-pills-top-list"
          aria-selected="false">
          <i class="icon-base bx bx-list-ul"></i> {{ __('List') }}
        </button>
      </li>
      @endif
    </ul>
    <div class="tab-content p-1">
      <div class="tab-pane fade show active" id="navs-pills-top-calendar" role="tabpanel">
        <livewire:bookings.admin-calendar week-starts-at="1" :day-click-enabled="false" :drag-and-drop-enabled="false" />
      </div>
      @if($agent->isDesktop())
      <div class="tab-pane fade" id="navs-pills-top-table" role="tabpanel">
        <livewire:bookings.table />
      </div>
      @else
      <div class="tab-pane fade" id="navs-pills-top-list" role="tabpanel">
        <livewire:bookings.list-group />
      </div>
      @endif
    </div>
  </div>
  </div>
</div>
    </div>
  </div>
</div>

