<form action="{{ route("form_data/passport/update", ["form_data_id" => $form_data->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Passport</h4>
    </div>
    <!-- Passport Number, Passport Expiry Date, Passport Img pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="passport_number" class="control-label">Passport Number</label>
                <input type="number" class="form-control" name="passport_number" id="passport_number" placeholder="Passport Number" value="{{ $form_data->passport_number }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="passport_expiry_date" class="control-label">Passport Expiry Date</label>
                <input type="date" class="form-control" name="passport_expiry_date" id="passport_expiry_date" placeholder="Passport Expiry Date" value="{{ $form_data->passport_expiry_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="passport_img" class="control-label">Passport Img</label>
                <input type="file" class="form-control" name="passport_img" id="passport_img" accept="application/img" required>
                <a href="{{ $form_data->passport_img }}" target="_blank">{{ basename($form_data->passport_img ) }}</a>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>


