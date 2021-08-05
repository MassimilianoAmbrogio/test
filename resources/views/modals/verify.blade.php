<div class="modal fade" id="recoveryPasswordModal" tabindex="-1" role="dialog" aria-labelledby="recoveryPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user/password/recovery') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Recupera Password</h4>
                </div>
                <!-- Email -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email_confirmation" class="control-label">Conferma Email</label>
                            <input type="email_confirmation" class="form-control" name="email_confirmation" id="email_confirmation" placeholder="Conferma Email" required>
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