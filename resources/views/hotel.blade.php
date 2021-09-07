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
                <input class="form-check-input radiobutton1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="mostra" {{ $form_data->hotel == 'mostra' ? "checked" : "" }} required>
                <label class="form-check-label" for="flexRadioDefault1">Hotel Necessary</label>
            </div>
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <input class="form-check-input radiobutton2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="nascondi" {{ $form_data->hotel == 'nascondi' ? "checked" : "" }} required>
                <label class="form-check-label" for="flexRadioDefault2">Hotel Not Necessary</label>
            </div>
            <div class="col-md-6 form-group {{ $form_data->hotel == 'nascondi' ? "hidden" : "" }}" id="content2">
                <label for="tipology_room" class="control-label">Tipology Room</label>
                <select class="form-control" name="tipology_room" id="tipology_room">
                    <option value="">Select Typology</option>
                    <option value="1" {{ $form_data->tipology_room == 1 ? "selected" : "" }}>Singola</option>
                    <option value="2" {{ $form_data->tipology_room == 2 ? "selected" : "" }}>Doppia</option>
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

<script>
    $(document).ready(function() {
        $('.radiobutton1').click(function() {
            if ($(this).is(':checked')) {
                $("div#content2").removeClass('hidden');
            }
        });
        $('.radiobutton2').click(function() {
            if ($(this).is(':checked')) {
                $("div#content2").addClass('hidden');
            }
        });
    });
</script>