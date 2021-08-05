<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user/store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserisci User</h4>
                </div>
                <!-- Name, Last Name -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="first_name" class="control-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <!-- Email, Status, Password -->
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="active" class="control-label">Status</label>
                            <select class="form-control" name="active" id="active" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="password_confirmation" class="control-label">Conferma Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Conferma Password" required>
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