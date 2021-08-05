<form action="{{ route("vehicle/update", ["vehicle_id" => $vehicle->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Vehicle</h4>
    </div>
    <!-- Driver, Brand, Model pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="driver_id" class="control-label">Driver</label>
                <select class="form-control" name="driver_id" id="driver_id" required>
                    <option value="">Seleziona Driver</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ $driver->id == $vehicle->driver_id ? "selected" : "" }}>{{ $driver->user->first_name }} {{ $driver->user->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="brand" class="control-label">Brand</label>
                <input type="text" class="form-control" name="brand" id=brand" placeholder="Brand" value="{{ $vehicle->brand }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="model" class="control-label">Model</label>
                <input type="text" class="form-control" name="model" id="model" placeholder="Model" value="{{ $vehicle->model }}" min="1" required>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $vehicle->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $vehicle->active == 0 ? "selected" : "" }}>Not Active</option>
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