<form action="{{ route("user/update", ["user_id" => $user->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica User</h4>
    </div>
    <!-- Name, Last Name pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $user->first_name }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="last_name" class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $user->last_name }}" required>
            </div>
        </div>
        <!-- Email, Status, Password pre-imposted -->
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="email" class="control-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Stato</option>
                    <option value="1" {{ $user->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $user->active == 0 ? "selected" : "" }}>Not Active</option>
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