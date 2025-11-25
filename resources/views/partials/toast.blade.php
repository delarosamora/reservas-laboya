@if(session('success'))
  <div
      class="bs-toast toast fade show bg-success position-absolute bottom-0 end-0 mb-4 me-4"
      role="alert"
      aria-live="assertive"
      aria-atomic="true">
      <div class="toast-header">
        <i class="icon-base bx bx-bell icon-xs me-2"></i>
        <div class="me-auto fw-medium">{{ __('Success') }}</div>
        <button
          type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
      <div class="toast-body">{{ session('success') }}</div>
  </div>
@endif
