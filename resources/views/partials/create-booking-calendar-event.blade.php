<div
    @if($eventClickEnabled && Arr::get($event, 'holiday', false))
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    class="card shadow-sm border border-secondary rounded-3 p-2 mb-1 @if (Arr::get($event, 'holiday', false)) text-bg-danger @elseif(Arr::get($event, 'status', null) == \App\Models\BookingStatus::PENDING_CONFIRM) text-bg-primary @elseif(Arr::get($event, 'status', null) == \App\Models\BookingStatus::CONFIRMED) text-bg-success @endif"
    style="cursor: pointer;">

    {{-- Título del Evento --}}
    <p class="small fw-bold mb-1 text-truncate">
        {{ $event['title'] }}
    </p>

    {{-- Descripción del Evento --}}
    <p class="mt-1 small text-muted mb-0 text-truncate">
        {{ $event['description'] ?? null }}
    </p>

</div>
