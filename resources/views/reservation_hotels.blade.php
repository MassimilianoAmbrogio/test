@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Reservation Hotel</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Reservation Hotel</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Arrival Date</th>
                <th scope="col">Nights</th>
                <th scope="col">Num Pax</th>
                <th scope="col">Has Lunch</th>
                <th scope="col">Room Type</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ronaldo as $pippo)
                @php $edit_reservation_hotel = route("reservation_hotel/show", ["reservation_hotel_id" => $pippo->id]) @endphp
                @php $delete_reservation_hotel = route("reservation_hotel/delete", ["reservation_hotel_id" => $pippo->id]) @endphp
                <tr>
                    <td scope="col">{{ \Carbon\Carbon::parse($pippo->arrival_date)->format('d/m/Y') }}</td>
                    <td scope="col">{{ $pippo->nights }}</td>
                    <td scope="col">{{ $pippo->num_pax }}</td>
                    <td scope="col">{{ $pippo->has_lunch }}</td>
                    <td scope="col">{{ $pippo->room_type }}</td>
                    <td scope="col">{{ $pippo->price }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_reservation_hotel }}"
                           class="btn btn-warning editReservationHotel{{ $pippo->id }}"
                           onclick="open_edit_modal({{ $pippo->id }},'editReservationHotel','updateModal')">Modifica</a>

                        <a href="{{ $delete_reservation_hotel }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.reservation_hotel-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection