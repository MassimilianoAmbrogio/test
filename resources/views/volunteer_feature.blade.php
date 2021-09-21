<form action="{{ route("volunteer/feature/update", ["volunteer_feature_id" => $volunteer->volunteer_feature->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Feature Volunteer</h4>
    </div>
    <!-- Feature Tipology, Training pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="volunteers_feature_tipology_id" class="control-label">Feature Tipology</label>
                <select class="form-control" name="volunteers_feature_tipology_id" id="volunteers_feature_tipology_id">
                    <option value="">Select Feature Tipology</option>
                    @foreach($features as $feature)
                        <option value="{{ $feature->id }}" {{ $feature->id == $volunteer->volunteer_feature->volunteers_feature_tipology_id ? "selected" : "" }}>{{ $feature->feature_tipology }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group" style="margin-top: 34px;">
                <label class="form-check-label" for="training">Training</label>
                <input class="form-check-input" type="checkbox" name="training" id="training" {{ $volunteer->volunteer_feature->training == "on" ? "checked" : "" }}>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>