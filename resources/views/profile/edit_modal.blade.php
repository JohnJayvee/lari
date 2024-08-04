<form  method="POST" action="{{ route('customers.profile.update',[$customers->customerid]) }}" >
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $customers->customerid }}"/>
  <input type="hidden" id="managerid" name="managerid" value="{{ $customers->customerid }}"/>
    <div class="modal-header ">
      <h5 class="modal-title" id="modalTopTitle"><i class="bx bx-pencil me-1"></i> Member </h5>
    </div>
    <div class="modal-body ">
      <div class="row">
        <div class="col-4 mb-3">
          <label for="firstname" class="form-label"><strong>FirstName</strong></label>
          <input
            type="text"
            id="firstname"
            name="firstname"
            class="form-control"
            placeholder="FirstName"
            value="{{ $customers->firstname}}"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-4 mb-3">
          <label for="middlename" class="form-label"><strong>MiddleName</strong></label>
          <input
            type="text"
            id="middlename"
            name="middlename"
            class="form-control"
            placeholder="MiddleName"
            value="{{ $customers->middlename}}"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-4 mb-3">
          <label for="lastname" class="form-label"><strong>lastName</strong></label>
          <input
            type="text"
            id="lastname"
            name="lastname"
            class="form-control"
            placeholder="LastName"
            value="{{ $customers->lastname}}"
            required
            autocomplete="off"
          />
        </div>
      </div>

      <div class="row">
        <div class="col-6 mb-3">
          <label for="username" class="form-label"><strong>Username</strong></label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control"
            placeholder="Username"
            value="{{ $customers->username}}"
            required
            autocomplete="off"
          />
        </div>

        <div class="col-6 mb-3">
          <div class="form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group">
              <input type="password" class="form-control password" name="password" id="password" placeholder="••••••••••" aria-describedby="password" autocomplete="off"  value="{{ $customers->unhashedpassword}}" required>
              <span  class="input-group-text cursor-pointer"><i class="bx bx-hide" id="pass-eye-password"></i></span>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-6 mb-3">
          <label for="email" class="form-label"><strong>Email</strong></label>
          <input
            type="email"
            id="email"
            name="email"
            class="form-control"
            placeholder="Email"
            value="{{ $customers->email}}"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-6 mb-3">
          <label for="contactno" class="form-label"><strong>Contact No</strong></label>
          <input
            type="number"
            id="contactno"
            name="contactno"
            class="form-control"
            placeholder="contact No"
            value="{{ $customers->contactno}}"
            required
            autocomplete="off"
          />
        </div>
      </div>


      <div class="row">
        <div class="col-6 mb-3">
          <label for="birthdate" class="form-label"><strong>Birthdate</strong></label>
          <input
            type="text"
            id="birthdate"
            name="birthdate"
            class="form-control datepicker"
            placeholder="Birthday"
            value="{{ $customers->birthdate}}"
            required
            autocomplete="off"
          />
        </div>
        <div class="col-6 mb-3">
          <label for="gender" class="form-label "><strong>Gender</strong></label>
          <select class="form-select" name="gender" id="gender" required>
            <option value="" >Select</option>
            <option value="Male" {{ $customers->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Famale"{{ $customers->gender == 'Famale' ? 'selected' : '' }} >Female</option>
            <option value="Others"{{ $customers->gender == 'Others'? 'selected' : '' }} >Others</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-4 mb-3">
          <label for="civilstatus" class="form-label "><strong>Civil Status</strong></label>
          <select class="form-select" name="civilstatus" id="civilstatus" required>
            <option value="" >Select</option>
            <option value="Single" {{ $customers->civilstatus == 'Single' ? 'selected' : '' }}>Single</option>
            <option value="Married" {{ $customers->civilstatus == 'Married' ? 'selected' : '' }}>Married</option>
            <option value="Widow / Widower" {{ $customers->civilstatus == 'Widow / Widower' ? 'selected' : '' }}>Widow / Widower</option>
          </select>
        </div>


        <div class="col-8 mb-3">
          <label for="planid" class="form-label "><strong>Plan</strong></label>
          <select class="form-select" name="planid" id="planid" required>
            <option value="" >Select Plan</option>
            @foreach($plans as $list)
              <option value="{{$list->planid}}" {{$list->planid == $customers->currentplan? 'selected' : '' }}>{{$list->plantitle.' - '. number_format($list->planprice, 2, '.', ',')}}</option>
            @endforeach 
          </select>
        </div>
      </div>

          
      <div class="row">
        <div class="col-12 mb-3">
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse {!!  $customers->currentplan == 5 ? 'show' : '' !!}" >
              <table class="table table-bordered table-hover">
                <tr>
                  <th class="text-center text-sm font-bold whitespace-nowrap">Payment</th>
                  <th class="text-center text-sm font-bold whitespace-nowrap">Status</th>
                </tr>
                @foreach($customer_with_intallment as $installment_list)
                    @if($installment_list->CustomerID == $customers->customerid)
                      <tr class=" bg-gray-200 border-white" >
                        <td class=" text-xs text-right p-1 w-50">{!! '<span class="badge  bg-label-success">₱ '. number_format($installment_list->Payment, 2, '.', ',').'</span>'  !!}</td>
                        <td class=" text-xs text-center p-1 w-25"> 
                          <input class="form-check-input" type="checkbox"  id="installmentid{{ $installment_list->InstallmentID }}" name="installmentid[]" {{ $installment_list->Paid == 1? 'Checked' : '' }} value="{{$installment_list->InstallmentID}}">
                        </td>
                      </tr>
                    @endif
                @endforeach
              </table>
          </div>
        </div>
      </div>


      
      <div class="row">
        <div class="col-4 mb-3">
          <label for="categoryid" class="form-label "><strong>Role</strong></label>
          <select class="form-select" name="categoryid" id="categoryid" required>
            <option value="" >Select Role</option>
            @foreach($role as $list)
              <option value="{{$list->categoryid}}" {{$list->categoryid == $customers->customertype? 'selected' : '' }} >{{$list->categoryname}}</option>
            @endforeach 
          </select>
        </div>

        <div class="col-8 mb-3">
          <label for="address" class="form-label"><strong>Address</strong></label>
          <input
            type="text"
            id="address"
            name="address"
            class="form-control"
            placeholder="Address"
            value="{{ $customers->address }}"
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


<script>
  $(document).ready(function() {

      $('#categoryid').val(2);
      $('#categoryid').attr('disabled',true);

      $(".datepicker").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            todayHighlight: true
      });

      $('#planid').change(function() {
          if ($(this).val() == 5) {  
              $('#panelsStayOpen-collapseOne').addClass('show');
          } else {
              $('#panelsStayOpen-collapseOne').removeClass('show');
          }
      });

      
      $('#pass-eye-password').click(function() {
          $('#password').attr('type', function(index, attr){
              return attr == 'password' ? 'text' : 'password';
          });

          $(this).toggleClass('bx-show');
      });

  });
</script>