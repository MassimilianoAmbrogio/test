<form action="{{ route("volunteer/update", ["volunteer_id" => $volunteer->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Volunteer</h4>
    </div>
    <!-- Date Of Birth, Gender pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="date_of_birth" class="control-label">Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" value="{{ $volunteer->volunteer_age->date_of_birth }}">
            </div>
            <div class="col-md-6 form-group">
                <label for="gender" class="control-label">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="1" {{ $volunteer->volunteers_age_gender == 1 ? "selected" : "" }}>M</option>
                    <option value="2" {{ $volunteer->volunteers_age_gender == 2 ? "selected" : "" }}>F</option>
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