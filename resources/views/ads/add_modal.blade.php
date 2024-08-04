<form  method="POST" action="{{ route('ads.create') }}" enctype="multipart/form-data" id="adsForm">
  @csrf
    <div class="modal-header ">
      <h5 class="modal-title" id="modalTopTitle"><i class="bx bx-plus-circle me-1"></i> Ads </h5>
    </div>
    <div class="modal-body ">
      <div class="row">
        <div class="col-12 mb-3">
          <label for="plantitle" class="form-label"><strong>Ads Title</strong></label>
          <input
            type="text"
            id="adstitle"
            name="adstitle"
            class="form-control datepicker"
            placeholder="Title"
            required
            autocomplete="off"
          />
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group">
            <input type="file" class="form-control" id="adsfilename" name="adsfilename" aria-describedby="Upload" aria-label="Upload" accept="image/jpeg, image/png, video/mp4">
            {{-- <button class="btn btn-primary" type="button" id="Upload">Upload</button> --}}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-3">
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>

      @include('modals.security_code')
  
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
      <button type="button" id="ads_submit" class="btn btn-primary" >Save</button>
    </div>
</form>


<script>
    $(document).ready(function() {
        $('#ads_submit').click(function() {
            $('.progress-bar').animate({ width: '100%' }, { 
                duration: 2000, 
                ease: 'linear',
                complete: function() {
                    $('#adsForm').submit();
                }
            });
        });
    });
</script>