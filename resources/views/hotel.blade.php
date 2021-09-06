<form action="{{ route("form_data/hotel/update", ["form_data_id" => $form_data->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Hotel</h4>
    </div>
    <!-- Hotel Necessary/Not Necessary, Tipology Room pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="{{ $form_data->hotel }}" required>
                <label class="form-check-label" for="flexRadioDefault1">Hotel Necessary</label>
            </div>
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="{{ $form_data->hotel }}" required>
                <label class="form-check-label" for="flexRadioDefault2">Hotel Not Necessary</label>
            </div>
            <div class="col-md-6 form-group" id="content">
                <label for="tipology_room" class="control-label">Tipology Room</label>
                <select class="form-control" name="tipology_room" id="tipology_room">
                    <option value="">Select Typology</option>
                    <option value="1" {{ $form_data->tipology_room == 1 ? "selected" : "" }}>Singola</option>
                    <option value="0" {{ $form_data->tipology_room == 0 ? "selected" : "" }}>Doppia</option>
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