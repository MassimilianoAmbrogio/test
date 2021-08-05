<form action="{{ route("accommodation/update", ["accommodation_id" => $accommodation->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Hotel</h4>
    </div>
    <!-- Name, Description, Address, Post Code, City, Phone, Accommodation Type, User, Checkin Date, Nights, Checkout Date pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $accommodation->name }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="description" class="control-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ $accommodation->description }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="address" class="control-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $accommodation->address }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="post_code" class="control-label">Post Code</label>
                <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Post Code" value="{{ $accommodation->post_code }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="city" class="control-label">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="{{ $accommodation->city }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="phone" class="control-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $accommodation->phone }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="accommodation_type_id" class="control-label">Accommodation Type</label>
                <select class="form-control" name="accommodation_type_id" id="accommodation_type_id" required>
                    <option value="">Seleziona Hotel</option>
                    @foreach($accommodation_types as $accommodation_type)
                        <option value="{{ $accommodation_type->id }}" {{ $accommodation_type->id == $accommodation->accommodation_type_id ? "selected" : "" }}>{{ $accommodation_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="user_id" class="control-label">User</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">Seleziona User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $accommodation->user_id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="accommodation_treatment_id" class="control-label">Accommodation Treatment</label>
                <select class="form-control" name="accommodation_treatment_id" id="accommodation_treatment_id" required>
                    <option value="">Seleziona Accommodation Treatment</option>
                    @foreach($accommodation_treatments as $accommodation_treatment)
                        <option value="{{ $accommodation_treatment->id }}" {{ $accommodation_treatment->id == $accommodation->accommodation_treatment_id ? "selected" : "" }}>{{ $accommodation_treatment->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="cluster_id" class="control-label">Cluster</label>
                <select class="form-control" name="cluster_id" id="cluster_id" required>
                    <option value="">Seleziona Cluster</option>
                    @foreach($clusters as $cluster)
                        <option value="{{ $cluster->id }}" {{ $cluster->id == $accommodation->cluster_id ? "selected" : "" }}>{{ $cluster->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="checkin_date" class="control-label">Checkin Date</label>
                <input type="date" class="form-control" name="checkin_date" id="checkin_date" placeholder="Checkin Date" value="{{ $accommodation->checkin_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="nights" class="control-label">Nights</label>
                <input type="text" class="form-control" name="nights" id="nights" placeholder="Nights" min="1" value="{{ $accommodation->nights }}" required>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $accommodation->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $accommodation->active == 0 ? "selected" : "" }}>Not Active</option>
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