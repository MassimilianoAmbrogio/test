<form action="{{ route("user/privilege/update", ["user_id" => $user->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Privilege</h4>
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
            $privilege_id = "";
            foreach($user->privilege as $privilege){
                $privilege_id = $privilege->id;
            }
        @endphp
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="privilege_id" class="control-label">Privileges</label>
                <select class="form-control" name="privilege_id" id="privilege_id" required>
                    <option value="">Seleziona Privilegio</option>
                    @foreach($privileges as $privilege)
                        <option value="{{ $privilege->id }}" {{ $privilege->id == $privilege_id ? "selected" : "" }}>{{ $privilege->name }}</option>
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