<form wire:submit="save">
    <div class="row row-cols-1 row-cols-lg-3 mb-6">
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
      <div class="col">
          <label class="form-label" for="nif" id="name-label">{{ __('Nif') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-id-card"></i></span>
              <x-forms.text-input id="nif" name="nif" wire:model="nif" />
          </div>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 mb-6">
      <div class="col">
          <label class="form-label" for="number" id="number-label">{{ __('Number') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-id-card"></i></span>
              <x-forms.text-input id="number" name="number" wire:model="number" />
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
    <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
</form>

