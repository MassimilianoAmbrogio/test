<form action="{{ route("reservation/update", ["reservation_id" => $reservation->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Prenotazione</h4>
    </div>
    <!-- Accommodation, Room, Arrival Date, Nights, Qty pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="accommodation_id" class="control-label">Accommodation</label>
                <select class="form-control" name="accommodation_id" id="accommodation_id" required>
                    <option value="">Seleziona Prenotazione</option>
                    @foreach($accommodations as $accommodation)
                        <option value="{{ $accommodation->id }}" {{ $accommodation->id == $reservation->accommodation_id ? "selected" : "" }}>{{ $accommodation->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="room_id" class="control-label">Room</label>
                <select class="form-control" name="room_id" id="room_id" required>
                    <option value="">Seleziona Stanza</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $room->id == $reservation->room_id ? "selected" : "" }}>{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_date" class="control-label">Arrival Date</label>
                <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" value="{{ $reservation->arrival_date }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="nights" class="control-label">Nights</label>
                <input type="number" class="form-control" name="nights" id="nights" placeholder="Nights" value="{{ $reservation->nights }}" min="1" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="qty" class="control-label">Qty</label>
                <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="{{ $reservation->qty }}" min="1" required>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $room->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $room->active == 0 ? "selected" : "" }}>Not Active</option>
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