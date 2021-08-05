<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('vehicle/store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserisci Vehicle</h4>
                </div>
                <!-- Driver, Brand, Model -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="driver_id" class="control-label">Driver</label>
                            <select class="form-control" name="driver_id" id="driver_id" required>
                                <option value="">Seleziona Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->user->first_name }} {{ $driver->user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="brand" class="control-label">Brand</label>
                            <input type="text" class="form-control" name="brand" id=brand" placeholder="Brand" min="1" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="model" class="control-label">Model</label>
                            <input type="text" class="form-control" name="model" id="model" placeholder="Model" min="1" required>
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