@section('title', __('Create holiday'))

<div>
  <div class="row py-3">
            <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.holidays.index') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" >
            <h5 class="mb-0">{{ __('Create holiday') }}</h5>
            <small class="text-body float-end">{{ __('Create holiday') }}</small>
        </div>
        <div class="card-body" >
          <livewire:holidays.form />
        </div>
      </div>
      </div>
  </div>
</div>

