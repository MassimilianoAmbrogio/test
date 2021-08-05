<form action="{{ route("user/role/update", ["user_id" => $user->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Role</h4>
    </div>
    <!-- Name, Last Name pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $user->first_name }}" required readonly>
            </div>
            <div class="col-md-6 form-group">
                <label for="last_name" class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $user->last_name }}" required readonly>
            </div>
        </div>
        <!-- Roles pre-imposted -->
        @php
            $role_id = "";
            foreach($user->role as $role){
                $role_id = $role->id;
            }
        @endphp
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="role_id" class="control-label">Roles</label>
                <select class="form-control" name="role_id" id="role_id" required>
                    <option value="">Seleziona Ruolo</option>
                    @foreach($roles as $role)
                       <option value="{{ $role->id }}" {{ $role->id == $role_id ? "selected" : "" }}>{{ $role->name }}</option>
                    @endforeach
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