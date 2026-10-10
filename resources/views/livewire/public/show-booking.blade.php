<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('consultBookingStatus') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
      @if($booking->isConfirmed())
        <a href="{{ route('editBooking', $booking) }}" class="btn btn-warning" wire:navigate><i class="menu-icon tf-icons bx bx-edit-alt"></i> {{ __('Edit') }}</a>
        <button class="btn btn-danger" wire:click="cancel" wire:confirm.prompt="{{ __('Are you sure? Type the member number to confirm') }}|{{ $booking->member_number }}"><i class="menu-icon tf-icons bx bx-x-circle"></i> {{ __('Cancel') }}</button>
        <a href="{{ route('createBooking') }}" class="btn btn-primary" wire:navigate><i class="menu-icon tf-icons bx bx-book-add"></i> {{ __('Create new booking') }}</a>
      @endif
    </div>
  </div>
  @if($booking->isPendingConfirm())
    <div class="alert alert-primary mb-4">
        <h2><i class="icon-base bx bx-error"></i> {{ __('Booking pending confirm') }}</h2>
        <p>{{ __('Attention! Your booking has not been confirmed. The team is reviewing your booking.') }}</p>
    </div>
  @endif
  @if($booking->isConfirmed())
    <div class="alert alert-success mb-4">
        <h2><i class="icon-base bx bx-check"></i> {{ __('Booking confirmed') }}</h2>
        <p>{{ __('Congrats! Your booking is confirmed') }}</p>
    </div>
  @endif
  @if($booking->isCancelled())
    <div class="alert alert-danger mb-4">
        <h2><i class="icon-base bx bx-block"></i> {{ __('Booking cancelled') }}</h2>
        <p>{{ __('Your booking has been cancelled') }}</p>
    </div>
  @endif
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

