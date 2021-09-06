<form action="{{ route("form_data/departure/update", ["form_data_id" => $form_data->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Departure</h4>
    </div>
    <!-- Number Flight Departure, Airline Departure, Arrival City, Departure Date, Departure Hour pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="number_flight_departure" class="control-label">Number Flight Departure</label>
                <input type="number" class="form-control" name="number_flight_departure" id="number_flight_departure" placeholder="Number Flight Departure" value="{{ $form_data->number_flight_departure }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="airline_departure" class="control-label">Airline Departure</label>
                <input type="text" class="form-control" name="airline_departure" id="airline_departure" placeholder="Airline Departure" value="{{ $form_data->airline_departure }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_city" class="control-label">Arrival City</label>
                <input type="text" class="form-control" name="arrival_city" id="arrival_city" placeholder="Arrival City" value="{{ $form_data->arrival_city }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="departure_date" class="control-label">Departure Date</label>
                <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" value="{{ $form_data->departure_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="departure_hour" class="control-label">Departure Hour</label>
                <input type="time" class="form-control" name="departure_hour" id="departure_hour" placeholder="Departure Hour" value="{{ $form_data->departure_hour }}" required>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>