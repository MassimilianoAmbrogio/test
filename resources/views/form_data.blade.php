<form action="{{ route("form_data/update", ["form_data_id" => $form_data->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Form Data</h4>
    </div>
    <!-- Name, Last Name, Number Flight Arrival, Airline Arrival, Departure City, Arrival Date, Arrival Hour, Number Flight Departure, Airline Departure, Arrival City, Departure Date, Departure Hour, Passport Number, Passport Expiry Date, Passport Img, Hotel Necessary/Not Necessary, Tipology Room, Special Request pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $form_data->first_name }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="last_name" class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $form_data->last_name }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="number_flight_arrival" class="control-label">Number Flight Arrival</label>
                <input type="number" class="form-control" name="number_flight_arrival" id="number_flight_arrival" placeholder="Number Flight Arrival" value="{{ $form_data->number_flight_arrival }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="airline_arrival" class="control-label">Airline Arrival</label>
                <input type="text" class="form-control" name="airline_arrival" id="airline_arrival" placeholder="Airline Arrival" value="{{ $form_data->airline_arrival }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="departure_city" class="control-label">Departure City</label>
                <input type="text" class="form-control" name="departure_city" id="departure_city" placeholder="Departure City" value="{{ $form_data->departure_city }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_date" class="control-label">Arrival Date</label>
                <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" value="{{ $form_data->arrival_date }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="arrival_hour" class="control-label">Arrival Hour</label>
                <input type="time" class="form-control" name="arrival_hour" id="arrival_hour" placeholder="Arrival Hour" value="{{ $form_data->arrival_hour }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="number_flight_departure" class="control-label">Number Flight Departure</label>
                <input type="number" class="form-control" name="number_flight_departure" id="number_flight_departure" placeholder="Number Flight Departure" value="{{ $form_data->number_flight_departure }}" min="1" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="airline_departure" class="control-label">Airline Departure</label>
                <input type="text" class="form-control" name="airline_departure" id="airline_departure" placeholder="Airline Departure" value="{{ $form_data->airline_departure }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_city" class="control-label">Arrival City</label>
                <input type="text" class="form-control" name="arrival_city" id="arrival_city" placeholder="Arrival City" value="{{ $form_data->arrival_city }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="departure_date" class="control-label">Departure Date</label>
                <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" value="{{ $form_data->departure_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="departure_hour" class="control-label">Departure Hour</label>
                <input type="time" class="form-control" name="departure_hour" id="departure_hour" placeholder="Departure Hour" value="{{ $form_data->departure_hour }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="passport_number" class="control-label">Passport Number</label>
                <input type="number" class="form-control" name="passport_number" id="passport_number" placeholder="Passport Number" value="{{ $form_data->passport_number }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="passport_expiry_date" class="control-label">Passport Expiry Date</label>
                <input type="date" class="form-control" name="passport_expiry_date" id="passport_expiry_date" placeholder="Passport Expiry Date" value="{{ $form_data->passport_expiry_date }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="passport_img" class="control-label">Passport Img</label>
                <input type="file" class="form-control" name="passport_img" id="passport_img" accept="application/img" required>
                <a href="{{ $form_data->passport_img }}" target="_blank">{{ basename($form_data->passport_img ) }}</a>
            </div>
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <input class="form-check-input radiobutton1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="mostra" {{ $form_data->hotel == 'mostra' ? "checked" : "" }} required>
                <label class="form-check-label" for="flexRadioDefault1">Hotel Necessary</label>
            </div>
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <input class="form-check-input radiobutton2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="nascondi" {{ $form_data->hotel == 'nascondi' ? "checked" : "" }} required>
                <label class="form-check-label" for="flexRadioDefault2">Hotel Not Necessary</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="special_request" class="control-label">Special Request</label>
                <textarea name="special_request" id="special_request" cols="57" required>{{ $form_data->special_request }}</textarea>
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
        <div class="row">
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $form_data->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $form_data->active == 0 ? "selected" : "" }}>Not Active</option>
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