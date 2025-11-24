@section('title', __('Create member'))

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center" >
      <h5 class="mb-0">{{ __('Create member') }}</h5>
      <small class="text-body float-end">{{ __('Create member') }}</small>
  </div>
  <div class="card-body" >
    <livewire:members.form />
  </div>
</div>

