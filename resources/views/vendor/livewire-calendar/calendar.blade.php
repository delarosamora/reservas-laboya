<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="d-flex">
        <div class="table-responsive w-100">
            <div class="d-inline-block w-100 overflow-hidden border rounded" style="min-width: 800px">

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
