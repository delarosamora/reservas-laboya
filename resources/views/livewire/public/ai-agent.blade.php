<div>
    <!-- Encabezado y Breadcrumbs -->
    <div class="row py-3">
        <div class="col text-start">
            @include('partials.breadcrumbs')
        </div>
        <div class="col text-end">
            <a href="{{ route('home') }}" class="btn btn-secondary" wire:navigate>
                <i class="menu-icon tf-icons bx bx-arrow-back"></i> {{ __('Back') }}
            </a>
        </div>
    </div>

    <!-- Contenedor del Chat con Scroll Automático mediante Alpine.js -->
    <div
        x-data="{ scrollBottom() { $el.scrollTop = $el.scrollHeight } }"
        x-init="scrollBottom()"
        x-effect="$nextTick(() => scrollBottom())"
        class="d-flex flex-column border border-light rounded p-3 overflow-auto bg-white mb-3"
        style="height: 60vh;"
    >
        <!-- Estado Vacío: Bienvenida -->
        @if (empty($messages))
            <div class="m-auto text-center py-4" style="max-width: 500px;">
                <div class="text-primary mb-3">
                    <i class="bx bx-bot fs-1"></i>
                </div>
                <h4 class="fw-bold mb-3">¡Hola! Qué tal. Soy tu asistente inteligente. 🤖</h4>
                <p class="text-muted">Estoy aquí para ayudarte a gestionar y consultar todo lo relacionado con las reservas e instalaciones de forma rápida.</p>

                <div class="card bg-light border-0 text-start p-3 my-4">
                    <h6 class="fw-bold text-secondary text-uppercase tracking-wider small mb-3">¿Qué puedo hacer por ti?</h6>
                    <ul class="list-unstyled mb-0" style="gap: 0.5rem; display: flex; flex-direction: column;">
                        <li>📅 <strong>Crear una nueva reserva</strong> en los turnos disponibles.</li>
                        <li>🔍 <strong>Consultar tus reservas</strong> con tu número de socio o código.</li>
                        <li>🏖️ <strong>Ver el calendario de vacaciones</strong> de la asociación.</li>
                    </ul>
                </div>
                <p class="text-muted small italic">Dime qué necesitas en el cuadro de abajo para empezar.</p>
            </div>
        @endif

        <!-- Listado de Mensajes -->
        @foreach ($messages as $message)
            @if ($message['role'] == 'user')
                <!-- Burbuja del Usuario (Derecha) -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="bg-primary text-white p-2 px-3 rounded shadow-sm text-end" style="max-width: 75%; width: fit-content; border-bottom-right-radius: 0 !important;">
                        {{ $message['content'] }}
                    </div>
                </div>
            @else
                <!-- Burbuja de la IA (Izquierda) -->
                <div class="d-flex justify-content-start mb-3">
                    <div class="bg-light text-dark p-2 px-3 rounded shadow-sm" style="max-width: 85%; width: fit-content; border-top-left-radius: 0 !important;">
                        <!-- El markdown parseado se adapta al texto del chat -->
                        <div class="lh-sm" style="font-size: 0.95rem;">
                            {!! Str::markdown($message['content']) !!}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <!-- Indicador de "Pensando..." -->
        @if($thinking)
            <div class="d-flex justify-content-start mb-3">
                <div class="bg-light text-muted p-2 px-3 rounded" style="border-top-left-radius: 0 !important;">
                    <i class="bx bx-dots-horizontal-rounded bx-flashing fs-4 align-middle"></i> Procesando...
                </div>
            </div>
        @endif
    </div>

    <!-- Formulario de Envío -->
    <form wire:submit="sendMessage">
        <div class="row g-2 align-items-center">
            <div class="col-10 col-md-11">
                <x-forms.text-input wire:model="input" placeholder="{{ __('Ask a question ...') }}" />
            </div>
            <div class="col-2 col-md-1 d-grid">
                <button class="btn btn-primary" type="submit" @if($thinking) disabled @endif>
                    <i class="icon-base bx bx-send"></i>
                </button>
            </div>
        </div>
    </form>
</div>
