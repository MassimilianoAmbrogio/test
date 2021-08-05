@extends('layouts.app')

@section('content-main')

    <!-- Title -->
    <h1 style="margin-top: 10px; text-align: center;">Accommodation Treatments</h1>

    <!-- Button new modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#storeModal" style="margin-top: 10px;">New Accommodation Treatments</button>

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
            @foreach($accommodation_treatments as $accommodation_treatment)
                @php $edit_accommodation_treatment = route("accommodation_treatment/show", ["accommodation_treatment_id" => $accommodation_treatment->id]) @endphp
                @php $delete_accommodation_treatment = route("accommodation_treatment/delete", ["accommodation_treatment_id" => $accommodation_treatment->id]) @endphp
                <tr>
                    <td scope="col">{{ $accommodation_treatment->name }}</td>
                    <td scope="col">{{ $accommodation_treatment->active ? "Attivo" : "Non Attivo" }}</td>
                    <td class="text-right">
                        <a href="javascript:void(0)"
                           data-href="{{ $edit_accommodation_treatment }}"
                           class="btn btn-warning editAccommodationTreatment{{ $accommodation_treatment->id }}"
                           onclick="open_edit_modal({{ $accommodation_treatment->id }},'editAccommodationTreatment','updateModal')">Modifica</a>

                        <a href="{{ $delete_accommodation_treatment }}" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include("modals.accommodation_treatment-store")

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

@endsection