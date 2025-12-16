<div>
    <div class="row mb-4">
    <div class="col">
    <div class="input-group input-group-merge">
      <span class="input-group-text" id="search-label"><i
          class="icon-base bx bx-search"></i></span>
          <x-forms.text-input id="search" name="search" wire:model.live="search" placeholder="{{ __('Search') }}..." aria-label="{{ __('Search') }}..."
        aria-describedby="search-label" />
    </div>
    </div>
  </div>
  <div class="list-group">
    @foreach ($this->bookings as $booking)
    <div class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
      <div class="w-100">
        <div class="d-flex justify-content-between">
          <div class="col-10">
            <h6 class="mb-1 fw-normal">{{ $booking->full_name }}</h6>
            <small class="text-body-secondary">{{ $booking->date->format('d/m/Y') }} {{ $booking->shift->time }}</small>
            <div class="user-status">
              <small><span class="badge text-bg-{{ $booking->status->class }}">{{ $booking->status->name }}</span></small>
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
</div>
