<form action="{{ route("reservation_hotel/update", ["reservation_hotel_id" => $reservation_hotel->id]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Reservation Hotel</h4>
    </div>
    <!-- Arrival Date, Departure Date, Num Pax, Lunch, Room, Type, Price pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="arrival_date" class="control-label">Arrival Date</label>
                <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" value="{{ $reservation_hotel->arrival_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="departure_date" class="control-label">Departure Date</label>
                <input type="date" class="form-control" name="departure_date" id="departure_date" placeholder="Departure Date" value="{{ \Carbon\Carbon::parse($reservation_hotel->arrival_date)->addDays($reservation_hotel->nights)->format('Y-m-d') }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="num_pax" class="control-label">Num Pax</label>
                <input type="number" class="form-control" name="num_pax" id="num_pax" placeholder="Num Pax" value="{{ $reservation_hotel->num_pax }}" min="1" required>
            </div>
            <div class="col-md-6 form-check" style="margin-top: 32px;">
                <label class="form-check-label" for="has_lunch">Lunch
                    <input class="form-check-input" type="checkbox" name="has_lunch" id="has_lunch" value="9" {{ $reservation_hotel->has_lunch == '9' ? "checked" : "" }}>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <label class="form-check-label" for="room_type1">Singola
                    <input class="form-check-input radiobutton1" type="radio" name="room_type" id="room_type1" value="singola" {{ $reservation_hotel->room_type == 'singola' ? "checked" : "" }} required>
                </label>
            </div>
            <div class="col-md-3 form-check" style="margin-top: 30px; margin-bottom: 15px;">
                <label class="form-check-label" for="room_type2">Doppia
                    <input class="form-check-input radiobutton2" type="radio" name="room_type" id="room_type2" value="doppia" {{ $reservation_hotel->room_type == 'doppia' ? "checked" : "" }} required>
                </label>
            </div>
            <div class="col-md-6 form-group">
                <label for="price" class="control-label">Price</label>
                <input type="number" class="form-control" name="price" id="price_" placeholder="Price" value="{{ $reservation_hotel->price }}" required readonly>
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
        $('.radiobutton1').click(function(){
            $("#price_").prop("value", 50.99);
        });
        $('.radiobutton2').click(function(){
            $("#price_").prop("value", 150);
        });
    });
</script>