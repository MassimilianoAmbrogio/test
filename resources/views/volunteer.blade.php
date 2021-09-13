<form action="{{ route("volunteer/update", ["volunteer_id" => $volunteer->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Volunteer</h4>
    </div>
    <!-- User, First Name, Last Name pre-imposted -->
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
            <div class="col-md-6 form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $volunteer->user->email }}">
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>