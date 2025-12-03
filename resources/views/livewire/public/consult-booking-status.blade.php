<div>
  <div class="row py-3">
    <div class="col text-start">
      <a href="{{ route('home') }}" class="btn btn-secondary"><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div class="card my-5">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ __('Consult my booking status') }}</h5>
          <p class="card-text">
            {{ __('Introduce the code of your booking to consult the status') }}
          </p>
          <form wire:submit="consult">
          <div class="row mb-6">
            <div class="col">
                <label class="form-label" for="code" id="code-label">{{ __('Code') }}</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-barcode"></i></span>
                    <x-forms.text-input id="code" name="code" wire:model="code" />
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <img class="card-img card-img-right" src="{{asset('assets/img/illustrations/restaurant.png')}}" alt="Card image" />
      </div>
    </div>
  </div>
</div>
