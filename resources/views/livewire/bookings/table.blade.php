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
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>{{ __('Actions') }}</th>
              <th>{{ __('Date') }}</th>
              <th>{{ __('Shift') }}</th>
              <th>{{ __('Status') }}</th>
              <th>{{ __('Name') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($this->bookings as $booking)
              <tr>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('admin.bookings.show', $booking) }}" wire:navigate><i class="icon-base bx bx-show me-1"></i>{{ __('View') }}</a>
                      <a class="dropdown-item" href="{{ route('admin.bookings.edit', $booking) }}" wire:navigate><i class="icon-base bx bx-edit-alt me-1"></i>{{ __('Edit') }}</a>
                    </div>
                  </div>
                </td>
                <td>{{ $booking->date->format('d/m/Y') }}</td>
                <td>{{ $booking->shift->time }}</td>
                <td><span class="badge text-bg-{{ $booking->status->class }}">{{ $booking->status->name }}</span></td>
                <td>{{ $booking->name }} {{ $booking->surname }}</td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div> {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
