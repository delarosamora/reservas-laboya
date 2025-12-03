<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('home') }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="card my-5">
            <div class="card-header d-flex justify-content-between align-items-center" >
              <h5 class="mb-0">{{ __('Create booking') }}</h5>
          </div>
          <div class="card-body">
  <form wire:submit="save">
      <div class="row row-cols-1 row-cols-lg-2 mb-6">
        <div class="col">
            <label class="form-label" for="name" id="name-label">{{ __('Name') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-user"></i></span>
                <x-forms.text-input id="name" name="name" wire:model="name" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="surname" id="name-label">{{ __('Surname') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-user"></i></span>
                <x-forms.text-input id="surname" name="surname" wire:model="surname" />
            </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-lg-3 mb-6">
        <div class="col">
            <label class="form-label" for="member_number" id="member_number-label">{{ __('Member number') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-id-card"></i></span>
                <x-forms.text-input id="member_number" name="member_number" wire:model="member_number" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="email" id="email-label">{{ __('Email') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                <x-forms.text-input id="email" name="email" wire:model="email" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="phone" id="phone-label">{{ __('Phone') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-phone"></i></span>
                <x-forms.text-input id="phone" name="phone" wire:model="phone" />
            </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-lg-3 mb-6">
        <div class="col">
            <label class="form-label" for="number_of_guests" id="number_of_guests-label">{{ __('Number of guests') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-group"></i></span>
                <x-forms.text-input id="number_of_guests" name="number_of_guests" wire:model="number_of_guests" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="date" id="date-label">{{ __('Date') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-calendar"></i></span>
                <x-forms.date-input id="date" name="date" wire:model="date" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="shift" id="shift-label">{{ __('Shift') }}</label>
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
      <div class="row mb-6">
        <div class="col">
            <label class="form-label" for="observations" id="observations-label">{{ __('Observations') }}</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-book-open"></i></span>
                <textarea class="form-control" wire:model="observations"></textarea>
            </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
  </form>
  </div>
  </div>
</div>

