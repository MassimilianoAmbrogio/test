<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('datenight/store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserire Date Night</h4>
                </div>
                <!-- Data Inizio, Numero Notti, Data Fine -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="data_inizio" class="control-label">Data Inizio</label>
                            <input type="date" class="form-control" name="data_inizio" id="data_inizio" placeholder="Data Inizio" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="numero_notti" class="control-label">Numero Notti</label>
                            <input type="text" class="form-control" name="numero_notti" id="numero_notti" placeholder="Numero Notti" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="data_fine" class="control-label">Data Fine</label>
                            <input type="date" class="form-control" name="data_fine" id="data_fine" placeholder="Data Fine" required>
                        </div>
                        <!-- Status -->
                        <div class="col-md-6 form-group">
                            <label for="active" class="control-label">Status</label>
                            <select class="form-control" name="active" id="active" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
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