<div class="border-end border-bottom bg-secondary text-white p-2 d-flex align-items-center justify-content-center flex-shrink-0"
     style="width: 14.2857%; min-height: 3rem;">
     {{-- Eliminamos 'col' y fijamos el ancho para 1/7 --}}

    <p class="small fw-bold mb-0 d-none d-lg-block">
        {{ __($day->format('l')) }}
    </p>
    <p class="small fw-bold mb-0 d-block d-lg-none">
        {{ __($day->format('D')) }}
    </p>

</div>
