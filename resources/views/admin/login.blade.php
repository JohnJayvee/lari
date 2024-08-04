@include('templates.meta')
<div class="d-flex justify-content-center align-items-center h-100">
    <div class="row w-25">
      <div class="col-12">
          <form id="goldlogin" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" action="/authenticate" method="POST" novalidate="novalidate">
            @csrf
            <div class="mb-3 fv-plugins-icon-container">
              <input type="text" class="form-control focus" id="email" name="username" placeholder="Enter username" autofocus="" autocomplete="off" required>
            </div>
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
              <div class="d-flex justify-content-between">
              </div>
              <div class="input-group input-group-merge has-validation">
                <input type="password" class="form-control password" name="password" placeholder="••••••••" aria-describedby="password" autocomplete="off" required>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide pass-eye"></i></span>
              </div>
            </div>
            <div class="divider"></div>
            <div class="col-lg-12 mb-lg-2">
                    <small class="text-danger"> {{ isset($error['invalid']) ? $error['invalid'] : '' }} </small>
            </div>
              <button class="btn btn-primary d-grid w-100">
                Sign in
              </button>
          <input type="hidden"></form>

        </div>
      </div>
      {{-- @include('templates.footer.footer')  --}}
    </div>
  </div>
  @include('script.masterscript')


<script>
      $(document).ready(function() {
          // focus in input on load.
          $(".focus").focus();
      });
</script>