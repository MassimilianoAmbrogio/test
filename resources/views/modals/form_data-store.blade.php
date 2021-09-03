<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('form_data/store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserisci Form Data</h4>
                </div>
                <!-- Name, Last Name, Number Flight Arrival, Airline Arrival, Departure City, Arrival Date, Arrival Hour, Number Flight Departure, Airline Departure, Arrival City, Departure Date, Departure Hour, Passport Number, Passport Expiry Date, Passport Img, Hotel Necessary/Not Necessary, Tipology Room, Special Request -->
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
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="number_flight_arrival" class="control-label">Number Flight Arrival</label>
                            <input type="number" class="form-control" name="number_flight_arrival" id="number_flight_arrival" placeholder="Number Flight Arrival" min="1" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="airline_arrival" class="control-label">Airline Arrival</label>
                            <input type="text" class="form-control" name="airline_arrival" id="airline_arrival" placeholder="Airline Arrival" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="departure_city" class="control-label">Departure City</label>
                            <input type="text" class="form-control" name="departure_city" id="departure_city" placeholder="Departure City" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="arrival_date" class="control-label">Arrival Date</label>
                            <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="arrival_hour" class="control-label">Arrival Hour</label>
                            <input type="time" class="form-control" name="arrival_hour" id="arrival_hour" placeholder="Arrival Hour" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="number_flight_departure" class="control-label">Number Flight Departure</label>
                            <input type="number" class="form-control" name="number_flight_departure" id="number_flight_departure" placeholder="Number Flight Departure" min="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="airline_departure" class="control-label">Airline Departure</label>
                            <input type="text" class="form-control" name="airline_departure" id="airline_departure" placeholder="Airline Departure" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="arrival_city" class="control-label">Arrival City</label>
                            <input type="text" class="form-control" name="arrival_city" id="arrival_city" placeholder="Arrival City" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="departure_date" class="control-label">Departure Date</label>
                            <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="departure_hour" class="control-label">Departure Hour</label>
                            <input type="time" class="form-control" name="departure_hour" id="departure_hour" placeholder="Departure Hour" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="passport_number" class="control-label">Passport Number</label>
                            <input type="number" class="form-control" name="passport_number" id="passport_number" placeholder="Passport Number" min="1" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="passport_expiry_date" class="control-label">Passport Expiry Date</label>
                            <input type="date" class="form-control" name="passport_expiry_date" id="passport_expiry_date" placeholder="Passport Expiry Date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="passport_img" class="control-label">Passport Img</label>
                            <input type="file" class="form-control" name="passport_img" id="passport_img" accept="application/img" required>
                        </div>
                        <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="mostra" required>
                            <label class="form-check-label" for="flexRadioDefault1">Hotel Necessary</label>
                        </div>
                        <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="nascondi" required>
                            <label class="form-check-label" for="flexRadioDefault2">Hotel Not Necessary</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="special_request" class="control-label">Special Request</label>
                            <textarea name="special_request" id="special_request" cols="57" required></textarea>
                        </div>
                        <div class="col-md-6 form-group" id="content">
                            <label for="tipology_room" class="control-label">Tipology Room</label>
                            <select class="form-control" name="tipology_room" id="tipology_room" required>
                                <option value="">Select Typology</option>
                                <option value="1">Singola</option>
                                <option value="0">Doppia</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
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