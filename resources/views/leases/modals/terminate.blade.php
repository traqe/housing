<!-- Modal -->
<div class="modal fade" id="terminateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lease Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('lease-decision') }}" enctype="multipart/form-data">
          {{csrf_field()}}

          <input type="hidden" name="decision" value="4">
          <input type="hidden" name="lease_id" value="{{$data->id}}">

          <div class="form-group">
            <label for="gender">Reason</label>
            <textarea class="form-control" name="reason" rows="2"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>