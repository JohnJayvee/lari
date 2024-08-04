

<form  method="POST" action="{{ route('plans.update') }}" >
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $plans->planid }}"/>
    <div class="modal-header ">
      <h5 class="modal-title" id="modalTopTitle"><i class="bx bx-pencil me-1"></i> Plans </h5>
    </div>
    <div class="modal-body ">
      <div class="row">
        <div class="col-6 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>Plan Title</strong></label>
          <input
            type="text"
            id="plantitle"
            name="plantitle"
            class="form-control datepicker"
            placeholder="Title"
            value="{{  $plans->plantitle  }}"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-6 mb-3">
          <label for="nameSlideTop" class="form-label"><strong>Price</strong></label>
          <input
            type="number"
            id="planprice"
            name="planprice"
            class="form-control datepicker"
            placeholder="Price"
            value="{{  number_format( $plans->planprice , 2, '.', '')  }}"
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


