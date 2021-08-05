@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Vehicles</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Vehicles</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Driver</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vehicles as $vehicle)
                @php $edit_vehicle = route("vehicle/show", ["vehicle_id" => $vehicle->id]) @endphp
                @php $delete_vehicle = route("vehicle/delete", ["vehicle_id" => $vehicle->id]) @endphp
                <tr>
                    <td scope="col">{{ $vehicle->driver_id > 0 ? $vehicle->driver->user->first_name : '' }} {{ $vehicle->driver_id > 0 ? $vehicle->driver->user->last_name : '' }}</td>
                    <td scope="col">{{ $vehicle->brand }}</td>
                    <td scope="col">{{ $vehicle->model }}</td>
                    <td scope="col">{{ $vehicle->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_vehicle }}"
                           class="btn btn-warning editVehicle{{ $vehicle->id }}"
                           onclick="open_edit_modal({{ $vehicle->id }},'editVehicle','updateModal')">Modifica</a>

                        <a href="{{ $delete_vehicle }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.vehicle-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection