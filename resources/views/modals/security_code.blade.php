

<div class="row">
  <div class="col mb-3">
    <div class="form-password-toggle">
      <label class="form-label" for="unhashedpassword"><strong>Admin Password</strong></label>
      <div class="input-group">
        <input type="password" class="form-control password" name="unhashedpassword" id="unhashedpassword" placeholder="••••••••••" aria-describedby="password" autocomplete="off"   required>
        <span  class="input-group-text cursor-pointer"><i class="bx bx-hide" id="pass-eye-password-admin"></i></span>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
        $('#pass-eye-password-admin').click(function() {
            $('#unhashedpassword').attr('type', function(index, attr){
                return attr == 'password' ? 'text' : 'password';
            });

            $(this).toggleClass('bx-show');

        });
  });
</script>