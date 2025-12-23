{{-- Contenedor de la celda del día --}}
<div
    ondragenter="onLivewireCalendarEventDragEnter(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragleave="onLivewireCalendarEventDragLeave(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragover="onLivewireCalendarEventDragOver(event);"
    ondrop="onLivewireCalendarEventDrop(event, '{{ $componentId }}', '{{ $day }}', {{ $day->year }}, {{ $day->month }}, {{ $day->day }}, '{{ $dragAndDropClasses }}');"
    class="border-end border-bottom flex-shrink-0"
    style="width: 14.2857%; min-height: 6rem;">
    {{-- Eliminamos 'col' y fijamos el ancho para 1/7 --}}

    {{-- Wrapper for Drag and Drop --}}
    <div
        class="w-100 h-100"
        id="{{ $componentId }}-{{ $day }}">

        <div
            @if($dayClickEnabled)
                wire:click="onDayClick({{ $day->year }}, {{ $day->month }}, {{ $day->day }})"
            @endif
            class="w-100 h-100 p-2 d-flex flex-column
                {{-- Lógica de Fondo: Día actual, Día del mes, Día fuera del mes --}}
                {{ $dayInMonth ? ($isToday ? 'bg-warning-subtle' : 'bg-white') : 'bg-body-secondary text-muted' }}">

            {{-- Número de Día y Contador de Eventos --}}
            <div class="d-flex align-items-center mb-1">
                <p class="small fw-bold mb-0 {{ $dayInMonth ? ' text-dark ' : 'text-secondary' }}">
                    {{ $day->format('j') }}
                </p>

                <p class="small text-secondary ms-3 mb-0">
                    @if($events->isNotEmpty())
                        {{ $events->count() }} {{ Str::plural('event', $events->count()) }}
                    @endif
                </p>
            </div>

            {{-- Contenedor de Eventos con Scroll --}}
            <div class="p-1 mt-1 flex-grow-1 overflow-y-auto">

                <div class="d-grid gap-1">
                    @foreach($events as $event)
                        <div
                            @if($dragAndDropEnabled)
                                draggable="true"
                            @endif
                            ondragstart="onLivewireCalendarEventDragStart(event, '{{ $event['id'] }}')">

                            @include($eventView, [
                                'event' => $event,
                            ])
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
