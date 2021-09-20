<form action="{{ route("volunteer/feature/update", ["volunteer_id" => $volunteer->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Feature Volunteer</h4>
    </div>
    <!-- Feature Tipology, Training pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="feature_tipology" class="control-label">Feature Tipology</label>
                <select class="form-control" name="feature_tipology" id="feature_tipology">
                    <option value="">Select Feature Tipology</option>
                    <option value="1" {{ $volunteer->volunteer_feature->feature_tipology == 1 ? "selected" : "" }}>Arrival Area</option>
                    <option value="2" {{ $volunteer->volunteer_feature->feature_tipology == 2 ? "selected" : "" }}>Hotel Area</option>
                    <option value="3" {{ $volunteer->volunteer_feature->feature_tipology == 3 ? "selected" : "" }}>Competition Area</option>
                </select>
            </div>
            <div class="col-md-6 form-group" style="margin-top: 34px;">
                <label class="form-check-label" for="training">Training</label>
                <input class="form-check-input" type="checkbox" name="training" id="training" {{ $volunteer->volunteer_feature->training == "checked" ? : "" }}>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>