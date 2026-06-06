<div>
    <div class="row py-3">
    <div class="col text-start">
      @include('partials.breadcrumbs')
    </div>
    <div class="col text-end">
      <a href="{{ route('home') }}" class="btn btn-secondary" wire:navigate><i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}</a>
    </div>
  </div>
  <div>
  <div class="row row-cols-1 border border-light rounded p-2 overflow-scroll" style="height: 60vh">
  @foreach ($messages as $message)

    @if ($message['role'] == 'user')
    <div class="col bg-light p-2 rounded ms-auto w-auto my-1" style="height: fit-content">{{ $message['content'] }}</div>
    @else
    <div class="col my-1">{!! Str::markdown($message['content']) !!}</div>
    @endif

  @endforeach
  </div>
  <form wire:submit="sendMessage">

    <div class="row mt-1">
      <div class="col-10">
        <x-forms.text-input wire:model="input" placeholder="{{ __('Ask a question ...') }}" />
      </div>
      <div class="col-2">
        <button class="btn btn-primary" type="submit"><i class="icon-base bx bx-send"></i></button>
      </div>
    </div>
</form>
  </div>

</div>

