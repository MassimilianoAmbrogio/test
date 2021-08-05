<form action="{{ route("accommodation_type/update", ["accommodation_type_id" => $accommodation_type->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Tipologia Hotel</h4>
    </div>
    <!-- Name pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $accommodation_type->name }}" required>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Stato</option>
                    <option value="1" {{ $accommodation_type->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $accommodation_type->active == 0 ? "selected" : "" }}>Not Active</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>