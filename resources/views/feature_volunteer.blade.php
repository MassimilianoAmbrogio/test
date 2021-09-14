<form action="{{ route("volunteer/feature/update", ["volunteer_id" => $volunteer->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Feature Volunteer</h4>
    </div>
    <!-- First Name, Last Name, Feature Tipology, Training pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $volunteer->first_name }}">
            </div>
            <div class="col-md-6 form-group">
                <label for="last_name" class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $volunteer->last_name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="feature_tipology" class="control-label">Feature Tipology</label>
                <select class="form-control" name="feature_tipology" id="feature_tipology">
                    <option value="">Select Feature Tipology</option>
                    <option value="1" {{ $volunteer->feature_tipology == 1 ? "selected" : "" }}>Arrival Area</option>
                    <option value="2" {{ $volunteer->feature_tipology == 2 ? "selected" : "" }}>Hotel Area</option>
                    <option value="3" {{ $volunteer->feature_tipology == 3 ? "selected" : "" }}>Competition Area</option>
                </select>
            </div>
            <div class="col-md-6 form-group" style="margin-top: 34px;">
                <label class="form-check-label" for="training">Training</label>
                <input class="form-check-input" type="checkbox" name="training" id="training" {{ $volunteer->training == "checked" ? : "" }}>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>