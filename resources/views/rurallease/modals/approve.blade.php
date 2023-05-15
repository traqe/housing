<!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lease Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('rurallease-decision') }}" enctype="multipart/form-data">
          {{csrf_field()}}

          <input type="hidden" name="decision" value="1">
          <input type="hidden" name="lease_id" value="{{$rurallease->id}}">

          <div class="form-group">
            <label for="gender">Receipt Number</label>
            <input type="text" name="receipt_number" class="form-control" placeholder="Receipt Number..." required>
          </div>
          <div class="form-group">
            <label for="gender">Amount</label>
            <input type="text" name="amount" class="form-control" placeholder="Amount.." required>
          </div>
          <div class="form-group">
            <label for="gender">Narration</label>
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