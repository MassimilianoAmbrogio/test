@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Arrivals Departures Venues</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Arrivals Departures Venues</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arrivals_departures_venues as $arrivals_departures_venue)
                @php $edit_arrivals_departures_venue = route("arrivals_departures_venue/show", ["arrivals_departures_venue_id" => $arrivals_departures_venue->id]) @endphp
                @php $delete_arrivals_departures_venue = route("arrivals_departures_venue/delete", ["arrivals_departures_venue_id" => $arrivals_departures_venue->id]) @endphp
                <tr>
                    <td scope="col">{{ $arrivals_departures_venue->name }}</td>
                    <td scope="col">{{ $arrivals_departures_venue->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_arrivals_departures_venue }}"
                           class="btn btn-warning editArrivalsDeparturesVenue{{ $arrivals_departures_venue->id }}"
                           onclick="open_edit_modal({{ $arrivals_departures_venue->id }},'editArrivalsDeparturesVenue','updateModal')">Modifica</a>

                        <a href="{{ $delete_arrivals_departures_venue }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.arrivals_departures_venue-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection