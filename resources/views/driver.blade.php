<form action="{{ route("driver/update", ["driver_id" => $driver->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Driver</h4>
    </div>
    <!-- User, Age, Document Type, Driver pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="user_id" class="control-label">User</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">Seleziona User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $driver->user_id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="age" class="control-label">Age</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Age" value="{{ $driver->age }}" min="18" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="document_type" class="control-label">Document Type</label>
                <input type="file" class="form-control" name="document_type" id="document_type" accept="application/pdf" required>
                <a href="{{ $driver->document_type }}" target="_blank">{{ basename($driver->document_type) }}</a>
            </div>
            <div class="col-md-6 form-group">
                <label for="driver" class="control-label">Driver</label>
                <input type="text" class="form-control" name="driver" id="driver" placeholder="Driver" value="{{ $driver->driver }}" required>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $driver->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $driver->active == 0 ? "selected" : "" }}>Not Active</option>
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