<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('home') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="card my-5">
    <div class="card-header d-flex justify-content-between align-items-center" >
        <h5 class="mb-0">{{ __('Edit booking') }}</h5>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-lg-2">
          <div class="col">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>{{ __('Date') }}</strong>: {{ $booking->date->format('d/m/Y') }}</li>
              <li class="list-group-item"><strong>{{ __('Shift') }}</strong>: {{ $booking->shift->time }}</li>
            </ul>
          </div>
          <div class="col">
        <form wire:submit="save">
            <div class="row row-cols-1 row-cols-lg-3 mb-6">
            <div class="col">
                <label class="form-label" for="date" id="date-label">{{ __('New date') }}</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-calendar"></i></span>
                    <x-forms.date-input id="date" name="date" wire:model="date" />
                </div>
            </div>
              <div class="col">
                  <label class="form-label" for="shift" id="shift-label">{{ __('New shift') }}</label>
                  <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="icon-base bx bx-card"></i></span>
                      <x-forms.select-input id="shift" name="shift_id" wire:model="shift_id">
                          <option selected>{{ __('Select a shift') }}</option>
                          @foreach ($this->shifts as $shift)
                            <option value="{{ $shift->id }}">{{ $shift->time }}</option>
                          @endforeach
                      </x-forms.select-input>
                  </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
        </form>
          </div>
        </div>
    </div>
  </div>
</div>

