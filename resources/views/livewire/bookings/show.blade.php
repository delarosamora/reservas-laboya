@section('title', __('Booking'))

<div>
  <div class="row py-3">
    <div class="col text-end">
      <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
      <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning"><i class="menu-icon tf-icons bx bx-edit-alt"></i> {{ __('Edit') }}</a>
      @can('confirm', $booking)
        <button class="btn btn-success" wire:click="confirm" wire:confirm="{{ __('Are you sure?') }}"><i class="menu-icon tf-icons bx bx-check-circle"></i> {{ __('Confirm') }}</button>
      @endcan
      @can('cancel', $booking)
        <button class="btn btn-danger" wire:click="confirm" wire:confirm="{{ __('Are you sure?') }}"><i class="menu-icon tf-icons bx bx-x-circle"></i> {{ __('Cancel') }}</button>
      @endcan
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">{{ $booking->date->format('d/m/Y') }}</h5>
              <small class="text-body float-end">{{ __('Shift') }}: {{ $booking->shift->time }}</small>
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
  </div>
</div>
