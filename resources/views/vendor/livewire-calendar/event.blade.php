<div
    @if($eventClickEnabled)
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    class="card shadow-sm border border-secondary rounded-3 p-2 mb-1"
    style="cursor: pointer;">

    {{-- Título del Evento --}}
    <p class="small fw-bold mb-1 text-dark text-truncate">
        {{ $event['title'] }}
    </p>

    {{-- Descripción del Evento --}}
    <p class="mt-1 small text-muted mb-0 text-truncate">
        {{ $event['description'] ?? 'No description' }}
    </p>

</div>
