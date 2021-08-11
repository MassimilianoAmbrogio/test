@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Drivers</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Drivers</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Age</th>
                <th scope="col">Document Type</th>
                <th scope="col">Driver</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drivers as $driver)
                @php $edit_driver = route("driver/show", ["driver_id" => $driver->id]) @endphp
                @php $delete_driver = route("driver/delete", ["driver_id" => $driver->id]) @endphp
                <tr>
                    <td scope="col">{{ $driver->user_id > 0 ? $driver->user->first_name : '' }} {{ $driver->user_id > 0 ? $driver->user->last_name : '' }}</td>
                    <td scope="col">{{ $driver->age }}</td>
                    <td scope="col">{{ basename($driver->document_type) }}</td>
                    <td scope="col">{{ $driver->driver }}</td>
                    <td scope="col">{{ $driver->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_driver }}"
                           class="btn btn-warning editDriver{{ $driver->id }}"
                           onclick="open_edit_modal({{ $driver->id }},'editDriver','updateModal')">Modifica</a>

                        <a href="{{ $delete_driver }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.driver-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection