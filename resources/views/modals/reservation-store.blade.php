<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('reservation/store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Inserire Prenotazione</h4>
                </div>
                <!-- Accommodation, Room, Arrival Date, Nights, Qty -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="accommodation_id" class="control-label">Accommodation</label>
                            <select class="form-control" name="accommodation_id" id="accommodation_id" required>
                                <option value="">Seleziona Prenotazione</option>
                                @foreach($accommodations as $accommodation)
                                    <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="room_id" class="control-label">Room</label>
                            <select class="form-control" name="room_id" id="room_id" required>
                                <option value="">Seleziona Stanza</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="arrival_date" class="control-label">Arrival Date</label>
                            <input type="date" class="form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nights" class="control-label">Nights</label>
                            <input type="text" class="form-control" name="nights" id="nights" placeholder="Nights" min="1" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="qty" class="control-label">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" min="1" required>
                        </div>
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