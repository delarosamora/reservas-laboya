<form wire:submit="save">
    <div class="row row-cols-1 row-cols-lg-2 mb-6">
      <div class="col">
          <label class="form-label" for="name" id="name-label">{{ __('Name') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-user"></i></span>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  aria-describedby="name-label" wire:model="name">
          </div>
            @error('name')
            <div class="invalid-feedback d-block">
            {{ $message }}
            </div>
            @enderror
      </div>
      <div class="col">
          <label class="form-label" for="surname" id="name-label">{{ __('Surname') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-user"></i></span>
              <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"  aria-describedby="surname-label" wire:model="surname">
          </div>
          @error('surname')
          <div class="invalid-feedback d-block">
          {{ $message }}
          </div>
          @enderror
      </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 mb-6">
      <div class="col">
          <label class="form-label" for="number" id="number-label">{{ __('Number') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-id-card"></i></span>
              <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"  aria-describedby="number-label" wire:model="number">
          </div>
            @error('number')
            <div class="invalid-feedback d-block">
            {{ $message }}
            </div>
            @enderror
      </div>
      <div class="col">
          <label class="form-label" for="email" id="email-label">{{ __('Email') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"  aria-describedby="email-label" wire:model="email">
          </div>
              @error('email')
              <div class="invalid-feedback d-block">
              {{ $message }}
              </div>
              @enderror
      </div>
      <div class="col">
          <label class="form-label" for="phone" id="phone-label">{{ __('Phone') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-phone"></i></span>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"  aria-describedby="phone-label" wire:model="phone">
          </div>
              @error('phone')
              <div class="invalid-feedback d-block">
              {{ $message }}
              </div>
              @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>

