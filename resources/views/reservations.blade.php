@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Reservations</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Reservations</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Accommodation</th>
                <th scope="col">Room</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Nights</th>
                <th scope="col">Qty</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                @php $edit_reservation = route("reservation/show", ["reservation_id" => $reservation->id]) @endphp
                @php $delete_reservation = route("reservation/delete", ["reservation_id" => $reservation->id]) @endphp
                <tr>
                    <td scope="col">{{ $reservation->accommodation->name }}</td>
                    <td scope="col">{{ $reservation->room->name }}</td>
                    <td scope="col">{{ $reservation->arrival_date }}</td>
                    <td scope="col">{{ $reservation->nights }}</td>
                    <td scope="col">{{ $reservation->qty }}</td>
                    <td scope="col">{{ $reservation->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_reservation }}"
                           class="btn btn-warning editReservation{{ $reservation->id }}"
                           onclick="open_edit_modal({{ $reservation->id }},'editReservation','updateModal')">Modifica</a>

                        <a href="{{ $delete_reservation }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.reservation-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection