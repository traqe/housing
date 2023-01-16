<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mark Up %</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('store-costing-project-markup') }}">
                    {{csrf_field()}}

                    <input type="hidden" value="{{ $costId }}" name="cost_id" />

                    <div class="form-group">
                        <label for="gender">Markup Percentage</label>
                        <input type="text" name="mark_up" class="form-control" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
        </form>
        </div>

    </div>
</div>