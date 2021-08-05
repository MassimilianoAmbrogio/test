@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Arrivals Departures Types</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Arrivals Departures Types</button>

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
            @foreach($arrivals_departures_types as $arrivals_departures_type)
                @php $edit_arrivals_departures_type = route("arrivals_departures_type/show", ["arrivals_departures_type_id" => $arrivals_departures_type->id]) @endphp
                @php $delete_arrivals_departures_type = route("arrivals_departures_type/delete", ["arrivals_departures_type_id" => $arrivals_departures_type->id]) @endphp
                <tr>
                    <td scope="col">{{ $arrivals_departures_type->name }}</td>
                    <td scope="col">{{ $arrivals_departures_type->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_arrivals_departures_type }}"
                           class="btn btn-warning editArrivalsDeparturesType{{ $arrivals_departures_type->id }}"
                           onclick="open_edit_modal({{ $arrivals_departures_type->id }},'editArrivalsDeparturesType','updateModal')">Modifica</a>

                        <a href="{{ $delete_arrivals_departures_type }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.arrivals_departures_type-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection