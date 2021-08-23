@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Date Nights</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Date Nights</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Data Inizio</th>
                <th scope="col">Numero Notti</th>
                <th scope="col">Data Fine</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datenights as $datenight)
                <tr>
                    <td scope="col">{{ $datenight->data_inizio }}</td>
                    <td scope="col">{{ $datenight->numero_notti }}</td>
                    <td scope="col">{{ $datenight->data_fine }}</td>
                    <td scope="col">{{ $datenight->active ? "Attivo" : "Non Attivo" }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.datenight-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection
