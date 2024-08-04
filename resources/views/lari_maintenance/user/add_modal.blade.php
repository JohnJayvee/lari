<form  method="POST" action="{{ route('user.create') }}" >
  @csrf
    <div class="modal-header ">
      <h5 class="modal-title" id="modalTopTitle"><i class="bx bx-plus-circle me-1"></i>Users</h5>
    </div>
    <div class="modal-body ">
      <div class="row">
        <div class="col-4 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>FirstName</strong></label>
          <input
            type="text"
            id="FirstName"
            name="firstname"
            class="form-control datepicker"
            placeholder="FirstName"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-4 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>MiddleName</strong></label>
          <input
            type="text"
            id="middlename"
            name="middlename"
            class="form-control datepicker"
            placeholder="MiddleName"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-4 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>lastName</strong></label>
          <input
            type="text"
            id="lastname"
            name="lastname"
            class="form-control datepicker"
            placeholder="LastName"
            required
            autocomplete="off"
          />
        </div>
      </div>

      <div class="row">
        <div class="col-6 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>Username</strong></label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control datepicker"
            placeholder="Username"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-6 mb-3">
          <div class="form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group">
              <input type="password" class="form-control password" name="password" id="password" placeholder="••••••••••" aria-describedby="password" autocomplete="off"   required>
              <span  class="input-group-text cursor-pointer"><i class="bx bx-hide" id="pass-eye-password"></i></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row  mb-5">
        <div class="col-6">
          <label for="LevelID" class="form-label "><strong>Select Level</strong></label>
          <select class="form-select" name="userlevel" id="userlevel">
            @foreach($level as $list)
              <option value="{{$list->userlevel}}" >{{$list->uleveldescription}}</option>
            @endforeach
          </select>
        </div>

      </div>

  
      @include('modals.security_code')
  

    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
      <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>



<script>
  $(document).ready(function() {
      
      $('#pass-eye-password').click(function() {
          $('#password').attr('type', function(index, attr){
              return attr == 'password' ? 'text' : 'password';
          });

          $(this).toggleClass('bx-show');
      });

  });
</script>