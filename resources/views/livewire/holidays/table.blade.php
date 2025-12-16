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
              <th>{{ __('Description') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($this->holidays as $holiday)
              <tr>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('admin.holidays.show', $holiday) }}" wire:navigate><i class="icon-base bx bx-show me-1"></i>{{ __('View') }}</a>
                      <a class="dropdown-item" href="{{ route('admin.holidays.edit', $holiday) }}" wire:navigate><i class="icon-base bx bx-edit-alt me-1"></i>{{ __('Edit') }}</a>
                    </div>
                  </div>
                </td>
                <td>{{ $holiday->date->format('d/m/Y') }}</td>
                <td>{{ $holiday->description }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div> {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
