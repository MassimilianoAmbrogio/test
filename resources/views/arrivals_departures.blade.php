@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Arrivals Departures</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Arrivals Departures</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Arrival/Departure</th>
                <th scope="col">Transport</th>
                <th scope="col">Date Arrival/Date Departure</th>
                <th scope="col">Hour Arrival/Hour Departure</th>
                <th scope="col">Place Arrival/Place Departure</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arrivals_departures as $arrivals_departure)
                @php $edit_arrivals_departure = route("arrivals_departure/show", ["arrivals_departure_id" => $arrivals_departure->id]) @endphp
                @php $delete_arrivals_departure = route("arrivals_departure/delete", ["arrivals_departure_id" => $arrivals_departure->id]) @endphp
                <tr>
                    <td scope="col">{{ $arrivals_departure->user_id > 0 ? $arrivals_departure->user->first_name : ''}} {{ $arrivals_departure->user_id > 0 ? $arrivals_departure->user->last_name : ''}}</td>
                    <td scope="col">{{ $arrivals_departure->arrival_departure_id > 0 ? $arrivals_departure->arrival_departure->name : ''}}</td>
                    <td scope="col">{{ $arrivals_departure->transport_id > 0 ? $arrivals_departure->transport->name : ''}}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($arrivals_departure->date_arrival_departure)->format('d/m/Y') }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($arrivals_departure->date_arrival_departure." ".$arrivals_departure->hour_arrival_departure)->format("H:i") }}</td>
                    <td scope="col">{{ $arrivals_departure->place_arrival_departure_id > 0 ? $arrivals_departure->place_arrival_departure->name : '' }}</td>
                    <td scope="col">{{ $arrivals_departure->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_arrivals_departure }}"
                           class="btn btn-warning editArrivalsDeparture{{ $arrivals_departure->id }}"
                           onclick="open_edit_modal({{ $arrivals_departure->id }},'editArrivalsDeparture','updateModal')">Modifica</a>

                        <a href="{{ $delete_arrivals_departure }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.arrivals_departure-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection