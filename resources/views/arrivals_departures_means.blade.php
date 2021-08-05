@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Arrivals Departures Means</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Arrivals Departures Means</button>

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
            @foreach($arrivals_departures_means as $arrivals_departures_mean)
                @php $edit_arrivals_departures_mean = route("arrivals_departures_mean/show", ["arrivals_departures_mean_id" => $arrivals_departures_mean->id]) @endphp
                @php $delete_arrivals_departures_mean = route("arrivals_departures_mean/delete", ["arrivals_departures_mean_id" => $arrivals_departures_mean->id]) @endphp
                <tr>
                    <td scope="col">{{ $arrivals_departures_mean->name }}</td>
                    <td scope="col">{{ $arrivals_departures_mean->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_arrivals_departures_mean }}"
                           class="btn btn-warning editArrivalsDeparturesMean{{ $arrivals_departures_mean->id }}"
                           onclick="open_edit_modal({{ $arrivals_departures_mean->id }},'editArrivalsDeparturesMean','updateModal')">Modifica</a>

                        <a href="{{ $delete_arrivals_departures_mean }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.arrivals_departures_mean-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection