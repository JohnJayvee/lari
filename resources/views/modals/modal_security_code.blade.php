
      <form method="POST" action="{{$action}}">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalTopTitle">{{ $message ? $message : 'Security Code'}}</h5>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id" name="id" class="form-control" value="{{$id}}"/>
            @include('modals.security_code')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
      </form>