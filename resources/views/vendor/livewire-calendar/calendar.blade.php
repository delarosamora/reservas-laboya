<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div>
      <div class="d-flex justify-content-between align-items-center mb-3">

          {{-- 1. Botón Anterior (Se mantiene igual) --}}
          <button
              wire:click="goToPreviousMonth"
              class="btn btn-outline-secondary btn-sm me-2" {{-- btn-sm para ahorrar espacio en móvil --}}
              title="Mes Anterior"
          >
              <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i>
              <span class="d-none d-sm-inline">{{ __('Previous') }}
          </button>

          {{-- 2. MES Y AÑO ACTUAL (Ajuste del título para responsive) --}}
          <div class="flex-grow-1 text-center mx-1 mx-sm-3">
              {{-- Usamos h5 o h4 y lo ajustamos en móvil con fs-* --}}
              <h4 class="my-0 fs-6 fs-sm-5 fs-md-4 text-nowrap">
                  {{ __($startsAt->format('F')) }} {{ __($startsAt->format('Y')) }}
              </h4>
          </div>

          {{-- 3. Botón Hoy --}}
          <button
              wire:click="goToCurrentMonth"
              class="btn btn-outline-primary btn-sm mx-1 mx-sm-2" {{-- btn-sm y mx-1/2 --}}
              title="Mes Actual"
          >
              {{ __('Today') }}
          </button>

          {{-- 4. Botón Siguiente (Se mantiene igual) --}}
          <button
              wire:click="goToNextMonth"
              class="btn btn-outline-secondary btn-sm ms-2" {{-- btn-sm para ahorrar espacio en móvil --}}
              title="Mes Siguiente"
          >
              <span class="d-none d-sm-inline">{{ __('Next') }}</span> {{-- Oculta "Siguiente" en pantallas muy pequeñas --}}
              <i class="menu-icon tf-icons bx bx-right-arrow-alt"></i>
          </button>
      </div>
    </div>

    <div class="d-flex">
        <div class="table-responsive w-100">
            <div class="d-inline-block w-100 overflow-hidden border rounded">

                {{-- Fila de Días de la Semana (Encabezados) --}}
                {{-- CAMBIO CRUCIAL: Usamos d-flex, flex-nowrap y g-0 --}}
                <div class="d-flex flex-row flex-nowrap g-0 w-100">
                    @foreach($monthGrid->first() as $day)
                        {{-- **NOTA**: La vista $dayOfWeekView ya NO debe usar 'col' --}}
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    {{-- Fila de Días (Semanas) --}}
                    {{-- CAMBIO CRUCIAL: Usamos d-flex, flex-nowrap y g-0 --}}
                    <div class="d-flex flex-row flex-nowrap g-0 w-100">
                        @foreach($week as $day)
                            {{-- **NOTA**: La vista $dayView ya NO debe usar 'col' --}}
                            @include($dayView, [
                                'componentId' => $componentId,
                                'day' => $day,
                                'dayInMonth' => $day->isSameMonth($startsAt),
                                'isToday' => $day->isToday(),
                                'events' => $getEventsForDay($day, $events),
                            ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
