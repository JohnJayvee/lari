  
  <form  method="POST" action="{{ route('level.create') }}" >
    @csrf
      <div class="modal-header ">
        <h5 class="modal-title" id="modalTopTitle"><i class="bx bx-pencil me-1"></i>Level</h5>
      </div>
      <div class="modal-body ">
        <div class="row">
          <div class="col mb-3">
            <label for="nameSlideTop" class="form-label"><strong>Level Description</strong></label>
            <input
              type="text"
              id="level"
              name="level"
              class="form-control datepicker"
              placeholder="Level"
              required
              required
              autocomplete="off"
            />
          </div>
        </div>


        @include('modals.security_code')

    
  
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary" >Save</button>
      </div>
  </form>
  
