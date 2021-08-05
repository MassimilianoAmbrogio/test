<form action="{{ route("arrivals_departure/update", ["arrivals_departure_id" => $arrivals_departure->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modifica Arrivals Departures</h4>
    </div>
    <!-- User, Arrival/Departure, Transport, Date Arrival/Date Departure, Hour Arrival/Hour Departure, Place Arrival/Place Departure pre-imposted -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="user_id" class="control-label">User</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">Seleziona User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $arrivals_departure->user_id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="arrival_departure_id" class="control-label">Arrival/Departure</label>
                <select class="form-control" name="arrival_departure_id" id="arrival_departure_id" required>
                    <option value="">Seleziona Arrival/Departure</option>
                    @foreach($arrivals_departures_types as $arrivals_departures_type)
                        <option value="{{ $arrivals_departures_type->id }}" {{ $arrivals_departures_type->id == $arrivals_departure->arrival_departure_id ? "selected" : "" }}>{{ $arrivals_departures_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="transport_id" class="control-label">Transport</label>
                <select class="form-control" name="transport_id" id="transport_id" required>
                    <option value="">Seleziona Transport</option>
                    @foreach($arrivals_departures_means as $arrivals_departures_mean)
                        <option value="{{ $arrivals_departures_mean->id }}" {{ $arrivals_departures_mean->id == $arrivals_departure->transport_id ? "selected" : "" }}>{{ $arrivals_departures_mean->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="date_arrival_departure" class="control-label">Date Arrival/Date Departure </label>
                <input type="date" class="form-control" name="date_arrival_departure" id="date_arrival_departure" placeholder="Date Arrival" value="{{ $arrivals_departure->date_arrival_departure }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="hour_arrival_departure" class="control-label">Hour Arrival/Hour Departure</label>
                <input type="time" class="form-control" name="hour_arrival_departure" id="hour_arrival_departure" placeholder="Hour Arrival" value="{{ $arrivals_departure->hour_arrival_departure }}" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="place_arrival_departure_id" class="control-label">Place Arrival/Place Departure</label>
                <select class="form-control" name="place_arrival_departure_id" id="place_arrival_departure_id" required>
                    <option value="">Seleziona Place Arrival/Place Departure</option>
                    @foreach($arrivals_departures_venues as $arrivals_departures_venue)
                        <option value="{{ $arrivals_departures_venue->id }}" {{ $arrivals_departures_venue->id == $arrivals_departure->place_arrival_departure_id ? "selected" : "" }}>{{ $arrivals_departures_venue->name }} </option>
                    @endforeach
                </select>
            </div>
            <!-- Status pre-imposted -->
            <div class="col-md-6 form-group">
                <label for="active" class="control-label">Status</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="">Seleziona Status</option>
                    <option value="1" {{ $arrivals_departure->active == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $arrivals_departure->active == 0 ? "selected" : "" }}>Not Active</option>
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