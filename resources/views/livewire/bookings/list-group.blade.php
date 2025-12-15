<div class="list-group">
  @foreach ($this->bookings as $booking)
  <div class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
    <div class="w-100">
      <div class="row justify-content-between">
        <div class="col-10">
          <h6 class="mb-1 fw-normal">{{ $booking->name }} {{ $booking->surname }} - {{ $booking->date->format('d/m/Y') }}</h6>
          <small class="text-body-secondary">{{ $booking->shift->time }}</small>
          <div class="user-status">
            <span class="badge text-bg-{{ $booking->status->class }}">{{ $booking->status->name }}</span>
          </div>
        </div>
        <div class="col-2">
          <a class="btn btn-primary btn-sm" href="{{ route('admin.bookings.show', $booking) }}" wire:navigate><i class="icon-base bx bx-show me-1"></i></a>
          <a class="btn btn-warning btn-sm" href="{{ route('admin.bookings.edit', $booking) }}" wire:navigate><i class="icon-base bx bx-edit-alt me-1"></i></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
