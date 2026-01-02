<div
    @if($eventClickEnabled && !Arr::get($event, 'holiday', false))
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    class="card shadow-sm border border-secondary rounded-3 p-2 mb-1 @if (Arr::get($event, 'holiday', false)) text-bg-danger @endif"
    style="cursor: pointer;">

    {{-- Título del Evento --}}
    <p class="small fw-bold mb-1 text-truncate @if (Arr::get($event, 'holiday', false)) @else text-dark @endif">
        {{ $event['title'] }}
    </p>

    {{-- Descripción del Evento --}}
    <p class="mt-1 small text-muted mb-0 text-truncate">
        {{ $event['description'] ?? null }}
    </p>

</div>
