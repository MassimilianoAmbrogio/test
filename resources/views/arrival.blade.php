<form action="{{ route("form_data/arrival/update", ["form_data_id" => $form_data->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Arrival</h4>
    </div>
    <!-- Number Flight Arrival, Airline Arrival, Departure City, Arrival Date, Arrival Hour pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="number_flight_arrival" class="control-label">Number Flight Arrival</label>
                <input type="number" class="form-control" name="number_flight_arrival" id="number_flight_arrival" placeholder="Number Flight Arrival" value="{{ $form_data->number_flight_arrival }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="airline_arrival" class="control-label">Airline Arrival</label>
                <input type="text" class="form-control" name="airline_arrival" id="airline_arrival" placeholder="Airline Arrival" value="{{ $form_data->airline_arrival }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="departure_city" class="control-label">Departure City</label>
                <input type="text" class="form-control" name="departure_city" id="departure_city" placeholder="Departure City" value="{{ $form_data->departure_city }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_date" class="control-label">Arrival Date</label>
                <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" value="{{ $form_data->arrival_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_hour" class="control-label">Arrival Hour</label>
                <input type="time" class="form-control" name="arrival_hour" id="arrival_hour" placeholder="Arrival Hour" value="{{ $form_data->arrival_hour }}" required>
            </div>
        </div>
    </div>
    <!-- Bottons submit and close -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit changes</button>
    </div>
</form>