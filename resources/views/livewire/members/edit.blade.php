@section('title', __('Edit member'))

<div>
  <div class="row py-3">
    <div class="col text-end">
      <a href="{{ route('admin.members.show', $member) }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" >
            <h5 class="mb-0">{{ __('Edit member') }}</h5>
            <small class="text-body float-end">{{ __('Member number') }}: {{ $member->number }}</small>
        </div>
        <div class="card-body" >
          <livewire:members.form :member="$member" />
        </div>
      </div>
      </div>
  </div>
</div>
