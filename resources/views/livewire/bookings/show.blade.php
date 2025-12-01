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
        <button class="btn btn-danger" wire:click="cancel" wire:confirm="{{ __('Are you sure?') }}"><i class="menu-icon tf-icons bx bx-x-circle"></i> {{ __('Cancel') }}</button>
      @endcan
    </div>
  </div>
  <div class="nav-align-top">
    <ul class="nav nav-pills mb-4" role="tablist">
      <li class="nav-item">
        <button
          type="button"
          class="nav-link active"
          role="tab"
          data-bs-toggle="tab"
          data-bs-target="#navs-pills-top-info"
          aria-controls="navs-pills-top-info"
          aria-selected="true">
          <i class="icon-base bx bx-info-circle"></i> {{ __('Information') }}
        </button>
      </li>
      <li class="nav-item">
        <button
          type="button"
          class="nav-link"
          role="tab"
          data-bs-toggle="tab"
          data-bs-target="#navs-pills-top-member"
          aria-controls="navs-pills-top-member"
          aria-selected="false">
          <i class="icon-base bx bx-user"></i> {{ __('Member') }}
        </button>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="navs-pills-top-info" role="tabpanel">
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
      <div class="tab-pane fade" id="navs-pills-top-member" role="tabpanel">
        @if($booking->member()->exists())
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>{{ __('Name') }}</strong>: {{ $booking->member->name }}</li>
              <li class="list-group-item"><strong>{{ __('Surname') }}</strong>: {{ $booking->member->surname }}</li>
              <li class="list-group-item"><strong>{{ __('Email') }}</strong>: {{ $booking->member->email }}</li>
              <li class="list-group-item"><strong>{{ __('Phone') }}</strong>: {{ $booking->member->phone }}</li>
              <li class="list-group-item"><strong>{{ __('Number') }}</strong>: {{ $booking->member->number }}</li>
            </ul>
        @else
        {{ __('Member not found') }}
        @endif
      </div>
    </div>
  </div>
</div>
