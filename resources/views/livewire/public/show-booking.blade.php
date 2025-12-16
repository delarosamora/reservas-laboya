<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('home') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
      @if($booking->isNotCancelled())
        <a href="{{ route('editBooking', $booking) }}" class="btn btn-warning" wire:navigate><i class="menu-icon tf-icons bx bx-edit-alt"></i> {{ __('Edit') }}</a>
        <button class="btn btn-danger" wire:click="cancel" wire:confirm="{{ __('Are you sure?') }}"><i class="menu-icon tf-icons bx bx-x-circle"></i> {{ __('Cancel') }}</button>
      @endif
    </div>
  </div>
  <div class="card my-5">
    <div class="card-header d-flex justify-content-between align-items-center" >
        <h5 class="mb-0">{{ __('Show booking') }}</h5>
    </div>
    <div class="card-body">
              <div class="row row-cols-1 row-cols-lg-2">
            <div class="col">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('Status') }}</strong>: <span class="badge text-bg-{{ $booking->status->class }}">{{ $booking->status->name }}</span></li>
                <li class="list-group-item"><strong>{{ __('Date') }}</strong>: {{ $booking->date->format('d/m/Y') }}</li>
                <li class="list-group-item"><strong>{{ __('Shift') }}</strong>: {{ $booking->shift->time }}</li>
                <li class="list-group-item"><strong>{{ __('Name') }}</strong>: {{ $booking->name }}</li>
                <li class="list-group-item"><strong>{{ __('Surname') }}</strong>: {{ $booking->surname }}</li>
                <li class="list-group-item"><strong>{{ __('Nif') }}</strong>: {{ $booking->nif }}</li>
                <li class="list-group-item"><strong>{{ __('Member number') }}</strong>: {{ $booking->member_number }}</li>
              </ul>
            </div>
            <div class="col">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('Email') }}</strong>: {{ $booking->email }}</li>
                <li class="list-group-item"><strong>{{ __('Phone') }}</strong>: {{ $booking->phone }}</li>
                <li class="list-group-item"><strong>{{ __('Number of guests') }}</strong>: {{ $booking->number_of_guests }}</li>
                <li class="list-group-item"><strong>{{ __('Observations') }}</strong>: {{ $booking->observations }}</li>
                <li class="list-group-item"><strong>{{ __('Code') }}</strong>: {{ $booking->code }}</li>
                <li class="list-group-item"><strong>{{ __('Created date') }}</strong>: {{ $booking->created_at->format('d/m/Y H:i') }}</li>
              </ul>
            </div>
          </div>
    </div>
  </div>
</div>

