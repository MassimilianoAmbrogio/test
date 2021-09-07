<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <form action="{{ route('reservation_hotel/store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserisci Reservation Hotel</h4>
                </div>
                <!-- Name, Last Name, Number Flight Arrival, Airline Arrival, Departure City, Arrival Date, Arrival Hour, Number Flight Departure, Airline Departure, Arrival City, Departure Date, Departure Hour, Passport Number, Passport Expiry Date, Passport Img, Hotel Necessary/Not Necessary, Tipology Room, Special Request -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="arrival_date" class="control-label">Arrival Date</label>
                            <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="departure_date" class="control-label">Departure Date</label>
                            <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="num_pax" class="control-label">Num Pax</label>
                            <input type="number" class="form-control" name="num_pax" id="num_pax" placeholder="Num Pax" min="1" required>
                        </div>
                        <div class="col-md-6 form-check" style="margin-top: 32px;">
                            <input class="form-check-input" type="checkbox" id="has_lunch" value="1">
                            <label class="form-check-label" for="has_lunch">Lunch</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                            <input class="form-check-input" type="radio" name="room_type" id="room_type1" value="singola" required>
                            <label class="form-check-label" for="room_type1">Singola</label>
                        </div>
                        <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                            <input class="form-check-input" type="radio" name="room_type" id="room_type2" value="doppia" required>
                            <label class="form-check-label" for="room_type2">Doppia</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="price" class="control-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price" min="1" required>
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