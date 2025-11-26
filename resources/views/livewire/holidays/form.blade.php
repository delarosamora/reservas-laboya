<form wire:submit="save">
    <div class="row row-cols-1 row-cols-lg-2 mb-6">
      <div class="col">
          <label class="form-label" for="date" id="date-label">{{ __('Date') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-calendar"></i></span>
              <x-forms.date-input id="date" name="date" wire:model="date" />
          </div>
      </div>
      <div class="col">
          <label class="form-label" for="description" id="description-label">{{ __('Description') }}</label>
          <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="icon-base bx bx-note"></i></span>
              <x-forms.text-input id="description" name="description" wire:model="description" />
          </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>

