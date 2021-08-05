@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Accommodations</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Hotels</button>

    <!-- Table data -->
    <div class="table-responsive">
        <table class="table" style="margin-top: 10px;">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Address</th>
                <th scope="col">Post Code</th>
                <th scope="col">City</th>
                <th scope="col">Phone</th>
                <th scope="col">Accommodation Type</th>
                <th scope="col">User</th>
                <th scope="col">Accommodation Treatment</th>
                <th scope="col">Cluster</th>
                <th scope="col">Checkin Date</th>
                <th scope="col">Nights</th>
                <th scope="col">Checkout Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accommodations as $accommodation)
                @php $edit_accommodation = route("accommodation/show", ["accommodation_id" => $accommodation->id]) @endphp
                @php $delete_accommodation = route("accommodation/delete", ["accommodation_id" => $accommodation->id]) @endphp
                <tr>
                    <td scope="col">{{ $accommodation->name }}</td>
                    <td scope="col">{{ $accommodation->description }}</td>
                    <td scope="col">{{ $accommodation->address }}</td>
                    <td scope="col">{{ $accommodation->post_code }}</td>
                    <td scope="col">{{ $accommodation->city }}</td>
                    <td scope="col">{{ $accommodation->phone }}</td>
                    <td scope="col">{{ $accommodation->accommodation_type_id > 0 ? $accommodation->accommodation_type->name : '' }}</td>
                    <td scope="col">{{ $accommodation->user_id > 0 ? $accommodation->user->first_name : '' }} {{ $accommodation->user_id > 0 ? $accommodation->user->last_name : '' }}</td>
                    <td scope="col">{{ $accommodation->accommodation_treatment_id > 0 ? $accommodation->accommodation_treatment->name : '' }}</td>
                    <td scope="col">{{ $accommodation->cluster_id > 0 ? $accommodation->cluster->name : '' }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($accommodation->checkin_date)->format('d/m/Y') }}</td>
                    <td scope="col">{{ $accommodation->nights }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($accommodation->checkout_date)->format('d/m/Y') }}</td>
                    <td scope="col">{{ $accommodation->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_accommodation }}"
                           class="btn btn-warning editAccommodation{{ $accommodation->id }}"
                           onclick="open_edit_modal({{ $accommodation->id }},'editAccommodation','updateModal')">Modifica</a>

                        <a href="{{ $delete_accommodation }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@include("modals.accommodation-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection