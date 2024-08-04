
@if (session('login_failed'))
    <div class="bg-toast-custom-gold">
        <div class="bs-toast toast bounceInDown show toast-custom-gold m-3 bg-label-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="bx bx-bug bx-flashing  me-2"></i>
            <div class="me-auto fw-semibold">{{ session('title') }}</div>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@if (session('login_success'))
    <div class="bg-toast-custom-gold">
        <div class="bs-toast toast bounceInDown show toast-custom-gold m-3 bg-label-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="bx bx-check-square bx-flashing  me-2"></i>
            <div class="me-auto fw-semibold">{{ session('title') }}</div>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@if (session('login_warning'))
    <div class="bg-toast-custom-gold">
        <div class="bs-toast toast bounceInDown show toast-custom-gold m-3 bg-label-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="bx bx-error-alt bx-flashing  me-2"></i>
            <div class="me-auto fw-semibold">{{ session('title') }}</div>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif
