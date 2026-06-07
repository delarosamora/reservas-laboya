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
    @if (empty($messages))
    <p>¡Hola! Qué tal. Soy tu asistente inteligente de la asociación. 🤖</p>
    <p>Estoy aquí para ayudarte a gestionar y consultar todo lo relacionado con las reservas e instalaciones de forma rápida.</p>
    <p>¿Qué puedo hacer por ti?</p>
    <ul>
      <li>📅 Crear una nueva reserva en los turnos disponibles.</li>
      <li>🔍 Consultar tus reservas introduciendo tu número de socio o el código de reserva.</li>
      <li>🏖️ Ver el calendario de vacaciones y días no disponibles de la asociación.</li>
    </ul>
    <p>Dime qué necesitas o selecciona una de las opciones rápidas de abajo para empezar.</p>
    @endif
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
        <button class="btn btn-primary" type="submit" @if($thinking) disabled @endif><i class="icon-base bx bx-send"></i></button>
      </div>
    </div>
</form>
  </div>

</div>

