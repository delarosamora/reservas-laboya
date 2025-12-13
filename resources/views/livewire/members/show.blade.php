@section('title', $member->full_name)

<div>
  <div class="row py-3">
            <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.members.index') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
      <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-warning" wire:navigate><i class="menu-icon tf-icons bx bx-edit-alt"></i> {{ __('Edit') }}</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center" >
              <h5 class="mb-0">{{ $member->full_name}}</h5>
              <small class="text-body float-end">{{ __('Member number') }}: {{ $member->number }}</small>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>{{ __('Name') }}</strong>: {{ $member->name }}</li>
              <li class="list-group-item"><strong>{{ __('Surname') }}</strong>: {{ $member->surname }}</li>
              <li class="list-group-item"><strong>{{ __('Email') }}</strong>: {{ $member->email }}</li>
              <li class="list-group-item"><strong>{{ __('Phone') }}</strong>: {{ $member->phone }}</li>
              <li class="list-group-item"><strong>{{ __('Number') }}</strong>: {{ $member->number }}</li>
              <li class="list-group-item"><strong>{{ __('Nif') }}</strong>: {{ $member->nif }}</li>
            </ul>
          </div>
        </div>
      </div>
  </div>
</div>
