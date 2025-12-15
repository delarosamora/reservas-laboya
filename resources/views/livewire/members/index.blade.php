@section('title', __('Members'))
<div>
  <div class="row py-3">
            <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.members.create') }}" class="btn btn-primary" wire:navigate><i class="menu-icon tf-icons bx bx-plus-circle"></i> {{ __('Add new member') }}</a>
    </div>
  </div>
  <div class="row g-4">
    <div class="col">
      <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center" >
      <h5 class="mb-0">{{ __('Members') }}</h5>
  </div>
  <div class="card-body">
    @if($agent->isDesktop())
      <livewire:members.table />
    @else
      <livewire:members.list-group />
    @endif
  </div>
</div>
    </div>
  </div>
</div>

