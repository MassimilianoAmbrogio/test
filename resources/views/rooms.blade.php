@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Rooms</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Rooms</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                @php $edit_room = route("room/show", ["room_id" => $room->id]) @endphp
                @php $delete_room = route("room/delete", ["room_id" => $room->id]) @endphp
                <tr>
                    <td scope="col">{{ $room->name }}</td>
                    <td scope="col">{{ $room->qty }}</td>
                    <td scope="col">{{ $room->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_room }}"
                           class="btn btn-warning editRoom{{ $room->id }}"
                           onclick="open_edit_modal({{ $room->id }},'editRoom','updateModal')">Modifica</a>

                        <a href="{{ $delete_room }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.room-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection