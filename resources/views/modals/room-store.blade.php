<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('room/store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserire Stanza</h4>
                </div>
                <!-- Name, Qty -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="qty" class="control-label">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" min="1" required>
                        </div>
                        <!-- Status -->
                        <div class="col-md-6 form-group">
                            <label for="active" class="control-label">Status</label>
                            <select class="form-control" name="active" id="active" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Bottons submit and close -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>